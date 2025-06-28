<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

session_start();

class CheckoutController extends Controller
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




    public function login_checkout()
    {

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();


        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request)
{
    $validated = $request->validate([
        'customer_name'     => 'required',
        'customer_phone'    => 'required',
        'customer_email'    => 'required|email|unique:tbl_customers,customer_email',
        'customer_address'  => 'required',
        'customer_password' => 'required|min:6',
    ], [
        'customer_name.required' => 'Vui lòng nhập họ tên.',
        'customer_phone.required' => 'Vui lòng nhập số điện thoại.',
        'customer_email.required' => 'Vui lòng nhập email.',
        'customer_email.email' => 'Email không hợp lệ.',
        'customer_email.unique' => 'Email đã được sử dụng.',
        'customer_address.required' => 'Vui lòng nhập địa chỉ.',
        'customer_password.required' => 'Vui lòng nhập mật khẩu.',
        'customer_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
    ]);

    $data = [
        'customer_name' => $request->customer_name,
        'customer_phone' => $request->customer_phone,
        'customer_email' => $request->customer_email,
        'customer_address' => $request->customer_address,
        'customer_password' => md5($request->customer_password),
    ];

    $customer_id = DB::table('tbl_customers')->insertGetId($data);

    Session::put('customer_id', $customer_id);
    Session::put('customer_name', $request->customer_name);

    return Redirect::to('/checkout');
}



    public function checkout()
    {
        $customer_id = Session::get('customer_id');
        $customer_info = null;

        if ($customer_id) {
            $customer_info = DB::table('tbl_customers')
                ->where('customer_id', $customer_id)
                ->first();
        }

        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();

        return view('pages.checkout.show_checkout')
            ->with('category', $cate_product)
            ->with('brand',    $brand_product)
            ->with('customer_info', $customer_info);
    }



    public function save_checkout_customer(Request $request)
    {
        if (
            empty($request->shipping_email) ||
            empty($request->shipping_name) ||
            empty($request->shipping_address) ||
            empty($request->shipping_phone)
        ) {
            return redirect()->back()->with('error', 'Vui lòng điền đầy đủ thông tin.');
        }

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes ?? '';
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }


//     public function order_place(Request $request)
// {
//     if ($request->has('payment_option') && !empty($request->payment_option)) {
//         $payment_method = $request->payment_option;

//         $data['payment_method'] = $payment_method;
//         $data['payment_status'] = '2'; 

//         $payment_id = DB::table('tbl_payment')->insertGetId($data);
//     } else {
//         return redirect()->back()->with('error', 'Vui lòng chọn phương thức thanh toán');
//     }

//     $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
//     $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
//     $title_mail = "Đơn hàng xác nhận ngày " . $today;

//     $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
//     $order_data = [
//         'customer_id' => Session::get('customer_id'),
//         'shipping_id' => Session::get('shipping_id'),
//         'payment_id' => $payment_id,
//         'order_total' => Cart::total(0) . ' VND',
//         'order_code' => $checkout_code,
//         'order_status' => $data['payment_status'],
//         'order_date' => $order_date,
//     ];

//     $order_id = DB::table('tbl_order')->insertGetId($order_data);

//     $content = Cart::content();
//     $cart_array = [];
//     foreach ($content as $v_content) {
//         $order_d_data = [
//             'order_id' => $order_id,
//             'product_id' => $v_content->id,
//             'product_name' => $v_content->name,
//             'product_price' => $v_content->price,
//             'product_sales_quantity' => $v_content->qty,
//         ];

//         DB::table('tbl_order_details')->insert($order_d_data);

//         $cart_array[] = [
//             'product_name' => $v_content->name,
//             'product_price' => $v_content->price,
//             'product_qty' => $v_content->qty,
//         ];
//     }

//     $shipping_info = DB::table('tbl_shipping')
//         ->where('shipping_id', Session::get('shipping_id'))
//         ->first();

//     $customer_info = DB::table('tbl_customers')
//         ->where('customer_id', Session::get('customer_id'))
//         ->first();

//     $shipping_array = [
//         'customer_name' => $customer_info->customer_name,
//         'shipping_email' => $shipping_info->shipping_email,
//         'shipping_name' => $shipping_info->shipping_name,
//         'shipping_address' => $shipping_info->shipping_address,
//         'shipping_phone' => $shipping_info->shipping_phone,
//         'shipping_notes' => $shipping_info->shipping_notes,
//         'payment_method' => $payment_method
//     ];

//     // Gửi email
//     Mail::send('pages.mail.mail_order', [
//         'shipping_array' => $shipping_array,
//         'code' => ['order_code' => $checkout_code],
//         'cart_array' => $cart_array,
//     ], function ($message) use ($title_mail, $shipping_info) {
//         $message->to($shipping_info->shipping_email)->subject($title_mail);
//         $message->from('bxthang04@gmail.com', 'BXT-Shop');
//     });

//     Cart::destroy();

//     $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
//     $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

//     return view('pages.checkout.handcash')
//         ->with('category', $cate_product)
//         ->with('brand', $brand_product);
// }


public function order_place(Request $request)
{
    if (!$request->has('payment_option')) {
        return redirect()->back()->with('error', 'Vui lòng chọn phương thức thanh toán');
    }

    $payment_method = $request->payment_option;
    $data['payment_method'] = $payment_method;
    $data['payment_status'] = '2'; 
    $payment_id = DB::table('tbl_payment')->insertGetId($data);

    if ($payment_method == '1') {
        // Chuyển sang PayOSController để xử lý
        return app(\App\Http\Controllers\PayOSController::class)->createFromOrderPlace($request, $payment_id);
    }

    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
    $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
    $title_mail = "Đơn hàng xác nhận ngày " . $today;

    $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
    $order_data = [
        'customer_id' => Session::get('customer_id'),
        'shipping_id' => Session::get('shipping_id'),
        'payment_id' => $payment_id,
        'order_total' => Cart::total(0) . ' VND',
        'payos_order_code' => 0,
        'order_code' => $checkout_code,
        'order_status' => $data['payment_status'],
        'order_date' => $order_date,
    ];

    $order_id = DB::table('tbl_order')->insertGetId($order_data);

    $content = Cart::content();
    $cart_array = [];
    foreach ($content as $v_content) {
        $order_d_data = [
            'order_id' => $order_id,
            'product_id' => $v_content->id,
            'product_name' => $v_content->name,
            'product_price' => $v_content->price,
            'product_sales_quantity' => $v_content->qty,
        ];

        DB::table('tbl_order_details')->insert($order_d_data);

        $cart_array[] = [
            'product_name' => $v_content->name,
            'product_price' => $v_content->price,
            'product_qty' => $v_content->qty,
        ];
    }

    $shipping_info = DB::table('tbl_shipping')->where('shipping_id', Session::get('shipping_id'))->first();
    $customer_info = DB::table('tbl_customers')->where('customer_id', Session::get('customer_id'))->first();

    $shipping_array = [
        'customer_name' => $customer_info->customer_name,
        'shipping_email' => $shipping_info->shipping_email,
        'shipping_name' => $shipping_info->shipping_name,
        'shipping_address' => $shipping_info->shipping_address,
        'shipping_phone' => $shipping_info->shipping_phone,
        'shipping_notes' => $shipping_info->shipping_notes,
        'payment_method' => $payment_method
    ];

    Mail::send('pages.mail.mail_order', [
        'shipping_array' => $shipping_array,
        'code' => ['order_code' => $checkout_code],
        'cart_array' => $cart_array,
    ], function ($message) use ($title_mail, $shipping_info) {
        $message->to($shipping_info->shipping_email)->subject($title_mail);
    });

    Cart::destroy();

    $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

    return view('pages.checkout.handcash')
        ->with('category', $cate_product)
        ->with('brand', $brand_product);
}




    public function payment()
    {

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();


        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function logout_checkout()
    {
        Session::flush();

        return Redirect::to('/login-checkout');
    }



    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password =  md5($request->password_account);

        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout')->with('error', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function delete_order($orderId)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id', $orderId)->delete();
        Session::put('message', 'xóa đơn hàng thành công');

        return Redirect::to('manage-order');
    }



    public function manage_order(Request $request)
    {
        $this->AuthLogin();

        $keywords = $request->input('search');

        $query = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->select('tbl_order.*', 'tbl_customers.customer_name');

        if (!empty($keywords)) {
            $query->where('tbl_customers.customer_name', 'like', '%' . $keywords . '%')
                ->orWhere('tbl_order.order_code', 'like', '%' . $keywords . '%');
        }

        $all_order = $query->orderBy('tbl_order.order_id', 'desc')->paginate(5);

        $manager_order = view('admin.manage_order')->with('all_order', $all_order);

        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }


    public function view_order($orderId)
    {
        $this->AuthLogin();

        $order_info = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
            ->select(
                'tbl_order.*',
                'tbl_customers.*',
                'tbl_shipping.*',
                'tbl_payment.payment_method'
            )
            ->where('tbl_order.order_id', $orderId)
            ->first();

        $order_details = DB::table('tbl_order_details')
            ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_details.order_id', $orderId)
            ->select('tbl_order_details.*', 'tbl_product.product_quantity')
            ->get();

        return view('admin.view_order')
            ->with('order_info', $order_info)
            ->with('order_details', $order_details);
    }





    public function update_order_status(Request $request)
{
    $order_id = $request->order_id;
    $order_status = $request->order_status;

    $order = DB::table('tbl_order')->where('order_id', $order_id)->first();
    if (!$order) {
        return back()->with('message', 'Không tìm thấy đơn hàng.');
    }

    $old_status = $order->order_status;

    if ($order_status != $old_status) {
        $order_details = DB::table('tbl_order_details')->where('order_id', $order_id)->get();

        if ($order_status == 1 && $old_status != 1) {
            
            $insufficient_products = [];
            foreach ($order_details as $detail) {
                $product = DB::table('tbl_product')->where('product_id', $detail->product_id)->first();
                if (!$product || $product->product_quantity < $detail->product_sales_quantity) {
                    $insufficient_products[] = $detail->product_name;
                }
            }

            if (!empty($insufficient_products)) {
                return back()->with('message', 'Không đủ hàng cho các sản phẩm: ' . implode(', ', $insufficient_products));
            }

           
            foreach ($order_details as $detail) {
                DB::table('tbl_product')->where('product_id', $detail->product_id)
                    ->decrement('product_quantity', $detail->product_sales_quantity);
            }

            
            $shipping_info = DB::table('tbl_shipping')->where('shipping_id', $order->shipping_id)->first();
            $customer_info = DB::table('tbl_customers')->where('customer_id', $order->customer_id)->first();

            $shipping_array = [
                'customer_name' => $customer_info->customer_name ?? 'Khách hàng',
                'shipping_email' => $shipping_info->shipping_email ?? '',
                'shipping_name' => $shipping_info->shipping_name ?? '',
                'shipping_address' => $shipping_info->shipping_address ?? '',
                'shipping_phone' => $shipping_info->shipping_phone ?? '',
                'shipping_notes' => $shipping_info->shipping_notes ?? '',
                'payment_method' => $order->payment_id 
            ];

            $cart_array = [];
            foreach ($order_details as $item) {
                $cart_array[] = [
                    'product_name' => $item->product_name,
                    'product_price' => $item->product_price,
                    'product_qty' => $item->product_sales_quantity
                ];
            }

            $title_mail = "Đơn hàng đã được xác nhận ngày " . Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');

            Mail::send('pages.mail.confirm_order', [
                'shipping_array' => $shipping_array,
                'code' => ['order_code' => $order->order_code],
                'cart_array' => $cart_array,
            ], function ($message) use ($title_mail, $shipping_info) {
                $message->to($shipping_info->shipping_email)->subject($title_mail);
            });

        } elseif ($order_status == 2 && $old_status == 1) {
            foreach ($order_details as $detail) {
                DB::table('tbl_product')->where('product_id', $detail->product_id)
                    ->increment('product_quantity', $detail->product_sales_quantity);
            }
        }
    }

    DB::table('tbl_order')->where('order_id', $order_id)
        ->update(['order_status' => $order_status]);

    return back()->with('message', 'Cập nhật trạng thái đơn hàng thành công!');
}


}
