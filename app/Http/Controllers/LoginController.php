<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Models\Login;
use App\Models\Social;

class LoginController extends Controller
{
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback_google()
{
    try {
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users, 'google');

    
        if (!$authUser) {
            return redirect('/admin')->with('error', 'Tài khoản Google này chưa được cấp quyền truy cập.');
        }

 
        $admin = Login::find($authUser->user); 

        if (!$admin) {
            return redirect('/admin')->with('error', 'Không tìm thấy tài khoản quản trị.');
        }

        Session::put('admin_name', $admin->admin_name);
        Session::put('admin_id', $admin->admin_id);

        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    } catch (\Throwable $e) {
        return redirect('/admin')->with('error', 'Lỗi đăng nhập Google: ' . $e->getMessage());
    }
}


   public function findOrCreateUser($users, $provider)
{
    
    $authUser = Social::where('provider_user_id', $users->id)->first();

    if ($authUser) {
        return $authUser;
    }

    
    $login = Login::where('admin_email', $users->email)->first();

    if (!$login) {
        
        return null;
    }


    $social = new Social([
        'provider_user_id' => $users->id,
        'provider' => strtoupper($provider)
    ]);

    $social->login()->associate($login);
    $social->save();

    return $social;
}


}