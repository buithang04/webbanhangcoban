<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
  
        if($admin_id){
           return Redirect::to('dashboard');
        }else{
           return Redirect::to('admin')->send();
        }
      }




    public function login_checkout(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_customer(Request $request ){

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        
        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/checkout');

    }

    public function checkout(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);


    }


    public function save_checkout_customer(Request $request){
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
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;
        
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);

        return Redirect::to('/payment');


    }

    public function order_place(Request $request){
        //get payment_method
        
        if ($request->has('payment_option') && !empty($request->payment_option)) {
            $payment_method = $request->payment_option;
        
            $data['payment_method'] = $payment_method;
            $data['payment_status'] = '2'; 
        
            $payment_id = DB::table('tbl_payment')->insertGetId($data);
        } else {
            return redirect()->back()->with('error', 'Vui lòng chọn phương thức thanh toán');
        }
        
        // insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total(0).' VND';
        
        
        $order_data['order_status'] = $data['payment_status']; 
    
        
       
        
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details

        $content = Cart::content();
        foreach($content as $v_content){
             $order_d_data['order_id'] = $order_id;
        $order_d_data['product_id'] = $v_content->id;
        $order_d_data['product_name'] = $v_content->name;
        $order_d_data['product_price'] = $v_content->price;
        $order_d_data['product_sales_quantity'] = $v_content->qty;

        DB::table('tbl_order_details')->insertGetId($order_d_data);
        }
       if($data['payment_method'] ==1 ){
        echo 'Thanh toán bằng thẻ ATM';
       }else{
        Cart::destroy();
        
        
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        

        return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
       }

        //return Redirect::to('/payment');
        
    }




    public function payment(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();


        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function logout_checkout(){
        Session::flush();

        return Redirect::to('/login-checkout');
    }



    public function login_customer(Request $request){
        $email = $request->email_account;
        $password =  md5($request->password_account);

        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();

        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
    }

    public function delete_order($orderId){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','xóa đơn hàng thành công');
        
    return Redirect::to('manage-order');
    }



    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manage_order',$manager_order);

        
    }

    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*','tbl_product.product_quantity')
        ->where('tbl_order.order_id',$orderId)
        ->first();

        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        
    }

    public function update_order_status(Request $request)
{
    $order_id = $request->order_id;
    $order_status = $request->order_status;
    $product_id = $request->product_id;
    $sales_qty = (int) $request->product_sales_quantity;

    $order = DB::table('tbl_order')->where('order_id', $order_id)->first();
    if (!$order) {
        return back()->with('message', 'Không tìm thấy đơn hàng.');
    }

    $old_status = $order->order_status;

    $product = DB::table('tbl_product')->where('product_id', $product_id)->first();
    if (!$product) {
        return back()->with('message', 'Không tìm thấy sản phẩm.');
    }

    $current_qty = (int) $product->product_quantity;
    $new_qty = $current_qty;

    if ($order_status != $old_status) {
        if ($order_status == 1 && $old_status != 1) {
            if ($current_qty < $sales_qty || $current_qty == 0) {
                return back()->with('message', 'Số lượng trong kho không đủ!');
            }
            $new_qty = $current_qty - $sales_qty;
        } elseif ($order_status == 2 && $old_status == 1) {
            $new_qty = $current_qty + $sales_qty;
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update([
            'product_quantity' => $new_qty
        ]);
    }

    DB::table('tbl_order')
        ->where('order_id', $order_id)
        ->update(['order_status' => $order_status]);

    return back()->with('message', 'Cập nhật thành công!');
}

    

}




    

