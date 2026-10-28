<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequireShopAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->session()->get('admin_id');
        if (!$id || !DB::table('tbl_admin')->where('admin_id', $id)->exists()) {
            return redirect('/admin')->with('error', 'Vui lòng đăng nhập quản trị.');
        }
        return $next($request);
    }
}
