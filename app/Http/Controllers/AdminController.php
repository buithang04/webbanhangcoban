<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Session;
use App\Http\Requests;
use App\Models\Customer;
use App\Models\SocialCustomer;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{     


    public function AuthLogin(){
      $admin_id = Session::get('admin_id');

      if($admin_id){
         return Redirect::to('dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function index(){
       return view("admin_login");
    }

    public function show_dashboard(){
         $this->AuthLogin();
      $order_count1 = DB::table('tbl_order')
      ->where('order_status', '1')->count();
      $order_count2 = DB::table('tbl_order')
      ->where('order_status', '2')->count();

      $total_revenue = DB::table('tbl_order')
         ->where('order_status', '1')
         ->sum('order_total'); 

      $user_count = DB::table('tbl_customers')->count(); 

      return view('admin.dashboard', compact('order_count1','order_count2', 'total_revenue', 'user_count'));
   }

   public function dashboard(Request $request){
         $admin_email = $request -> admin_email;
         $admin_password = md5($request -> admin_password);

         $result = DB :: table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
         if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
         }else {
            
            return Redirect::to('/admin');
      }
     }
// dang nhap google customer
public function login_customer_google()
{
    config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
    return Socialite::driver('google')->redirect();
}

public function callback_customer_google()
{
    config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
    $googleUser = Socialite::driver('google')->stateless()->user();
    $socialAccount = $this->findOrCreateCustomer($googleUser, 'google');

    if ($socialAccount) {
        $customer = $socialAccount->customer;
        Session::put('customer_name', $customer->customer_name);
        Session::put('customer_id', $customer->customer_id);

        return redirect('/trang-chu')->with('message', 'Đăng nhập customer thành công');
    }

    return redirect('/login-checkout')->with('error', 'Đăng nhập thất bại');
}

public function findOrCreateCustomer($googleUser, $provider)
{
    $existingAccount = SocialCustomer::where('provider_user_id', $googleUser->id)
        ->where('provider_user_email', $googleUser->email)
        ->first();

    if ($existingAccount) {
        return $existingAccount;
    }
    $customer = Customer::where('customer_email', $googleUser->email)->first();

    if (!$customer) {
        $customer = Customer::create([
            'customer_name' => $googleUser->name,
            'customer_email' => $googleUser->email,
            'customer_password' => '', 
            'customer_phone' => '',
            'customer_address' => ''
        ]);
    }

    $socialAccount = new SocialCustomer([
        'provider_user_id' => $googleUser->id,
        'provider_user_email' => $googleUser->email,
        'provider' => strtoupper($provider),
    ]);

    $socialAccount->customer()->associate($customer);
    $socialAccount->save();

    return $socialAccount;
}





   public function logout(){
      Session::put('admin_name',null);
      Session::put('admin_id',null);
      return Redirect::to('/admin');
   }

   
}
 

