<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class CustomersController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');

        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function edit_customer($customer_id)
    {
        $this->AuthLogin();
        $edit_customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->get();
        $manager_customer = view('admin.edit_customer')->with('edit_customer', $edit_customer);

        return view('admin_layout')->with('admin.edit_customer', $manager_customer);
    }
    
    public function update_customer(Request $request, $customer_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công');

        return Redirect::to('all-customer');
    }

    public function delete_customer($customer_id)
    {
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id', $customer_id)->delete();
        Session::put('message', 'xóa danh mục thành công');

        return Redirect::to('all-customer');
    }



    public function all_customer()
    {
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customers')->paginate(6);
        $manager_customer = view('admin.all_customer')->with('all_customer', $all_customer);

        return view('admin_layout')->with('admin.all_customer', $manager_customer);
    }

    public function history(Request $request)
    {
        if (!Session::get('customer_id')) {
            return redirect('/login-checkout')->with('error', 'Vui lòng đăng nhập');
        }

        $keywords = $request->input('search');

        $query = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->where('tbl_order.customer_id', Session::get('customer_id'))
            ->select('tbl_order.*', 'tbl_customers.customer_name');

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->where('tbl_order.order_code', 'LIKE', '%' . $keywords . '%')
                    ->orWhere('tbl_order.order_total', 'LIKE', '%' . $keywords . '%')
                    ->orWhere('tbl_order.order_date', 'LIKE', '%' . $keywords . '%');
            });
        }

        $all_order = $query->orderBy('tbl_order.order_id', 'desc')->paginate(5);

        $category = DB::table('tbl_category_product')
            ->where('category_status', '1')
            ->orderBy('category_id', 'desc')
            ->get();

        $brand = DB::table('tbl_brand')
            ->where('brand_status', '1')
            ->orderBy('brand_id', 'desc')
            ->get();

        return view('pages.history.history', compact('all_order', 'category', 'brand'));
    }

    public function view_history_order($orderId)
    {
        $order_info = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
            ->select(
                'tbl_order.*',
                'tbl_customers.customer_name',
                'tbl_customers.customer_phone',
                'tbl_customers.customer_email',
                'tbl_shipping.*',
                'tbl_payment.payment_method'
            )
            ->where('tbl_order.order_id', $orderId)
            ->first();

        $order_details = DB::table('tbl_order_details')
            ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_details.order_id', $orderId)
            ->select('tbl_order_details.*', 'tbl_product.product_quantity', 'tbl_product.product_name')
            ->get();

        $category = DB::table('tbl_category_product')
            ->where('category_status', '1')
            ->orderBy('category_id', 'desc')
            ->get();

        $brand = DB::table('tbl_brand')
            ->where('brand_status', '1')
            ->orderBy('brand_id', 'desc')
            ->get();

        return view('pages.history.view_history_order', compact('order_info', 'order_details', 'category', 'brand'));
    }

// khách hàng tự cập nhật tt của họ
    public function customer_edit($customer_id)
    {
        if (!Session::get('customer_id')) {
            return redirect('/login-checkout')->with('error', 'Vui lòng đăng nhập');
        }
        $edit_customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

        if (!$edit_customer) {
            return redirect()->back()->with('error', 'Không tìm thấy khách hàng');
        }

        $category = DB::table('tbl_category_product')
            ->where('category_status', '1')
            ->orderBy('category_id', 'desc')
            ->get();

        $brand = DB::table('tbl_brand')
            ->where('brand_status', '1')
            ->orderBy('brand_id', 'desc')
            ->get();

        return view('pages.customer.customer_edit', compact('edit_customer', 'category', 'brand'));
    }


   public function customer_update(Request $request, $customer_id)
{
    $currentPassword = $request->current_password;
    $newPassword = $request->new_password;
    $confirmNewPassword = $request->confirm_new_password;

    $data = [];
    $data['customer_name'] = $request->customer_name;
    $data['customer_email'] = $request->customer_email;
    $data['customer_phone'] = $request->customer_phone;
    $data['customer_address'] = $request->customer_address;

    if ($currentPassword || $newPassword || $confirmNewPassword) {

        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

        if (!$customer || md5($currentPassword) !== $customer->customer_password) {
            return redirect()->back()->with('message', 'Mật khẩu hiện tại không đúng');
        }

        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('message', 'Mật khẩu mới không khớp');
        }

        $data['customer_password'] = md5($newPassword);
    }

    DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);

    return redirect()->back()->with('message', 'Cập nhật tài khoản thành công');
}

    
}
