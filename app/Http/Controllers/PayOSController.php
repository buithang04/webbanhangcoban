<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Services\PayOSService;
use Carbon\Carbon;

class PayOSController extends Controller
{
    protected $payOS;

    public function __construct(PayOSService $payOS)
    {
        $this->payOS = $payOS;
    }

    public function createFromOrderPlace(Request $request, $payment_id)
    {
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');
        $cart = Cart::content();

        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();
        $items = [];
        $total = 0;
        $checkout_code = intval(substr(strval(microtime(true) * 10000), -6));
        $orderCode  = substr(md5(microtime()), rand(0, 26), 5);
        
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        

        $order_data = [
            'customer_id' => $customer_id,
            'shipping_id' => $shipping_id,
            'payment_id' => $payment_id,
            'payos_order_code' => $checkout_code,
            'order_total' => 0,
            'order_status' => '2',
            'order_code' => $orderCode,
            'order_date' => $order_date,
        ];

        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        foreach ($cart as $item) {
            if ((int)$item->qty <= 0) continue;

            DB::table('tbl_order_details')->insert([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'product_price' => $item->price,
                'product_sales_quantity' => $item->qty,
            ]);

            $items[] = [
                'name' => $item->name,
                'quantity' => (int)$item->qty,
                'price' => (int)$item->price
            ];

            $total += $item->price * $item->qty;
        }

        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_total' => $total]);

        $payosData = [
            'orderCode' => $checkout_code,
            'amount' => (int)$total,
            'description' => 'Thanh toán đơn hàng #' . $orderCode,
            'returnUrl' => config('payos.return_url'),
            'cancelUrl' => config('payos.cancel_url'),
            'buyerName' => $customer->customer_name,
            'buyerEmail' => $customer->customer_email,
            'buyerPhone' => $customer->customer_phone,
            'items' => $items,
        ];

        try {
            $response = $this->payOS->createPaymentLink($payosData);
            return redirect($response['checkoutUrl']);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function paymentSuccess()
    {
        $customer_id = Session::get('customer_id');

        $order = DB::table('tbl_order')
            ->where('customer_id', $customer_id)
            ->orderBy('order_id', 'desc')
            ->first();

            $this->sendOrderMail($order->order_id);
            
            Cart::destroy();
        

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.success')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function paymentCancel()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.cancel')->with('category', $cate_product)->with('brand', $brand_product);
    }

    protected function sendOrderMail($order_id)
    {
        $order = DB::table('tbl_order')->where('order_id', $order_id)->first();
        $customer = DB::table('tbl_customers')->where('customer_id', $order->customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where('shipping_id', $order->shipping_id)->first();
        $order_details = DB::table('tbl_order_details')->where('order_id', $order_id)->get();

        $cart_array = [];
        foreach ($order_details as $item) {
            $cart_array[] = [
                'product_name' => $item->product_name,
                'product_price' => $item->product_price,
                'product_qty' => $item->product_sales_quantity,
            ];
        }

        $shipping_array = [
            'customer_name' => $customer->customer_name ?? 'Khách hàng',
            'shipping_email' => $shipping->shipping_email,
            'shipping_name' => $shipping->shipping_name,
            'shipping_address' => $shipping->shipping_address,
            'shipping_phone' => $shipping->shipping_phone,
            'shipping_notes' => $shipping->shipping_notes,
            'payment_method' => 1
        ];

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày " . $today;

        try {
            Mail::send('pages.mail.mail_order', [
                'shipping_array' => $shipping_array,
                'code' => ['order_code' => $order->order_code],
                'cart_array' => $cart_array,
            ], function ($message) use ($title_mail, $shipping) {
                $message->from(config('mail.from.address'), config('mail.from.name'))
                        ->to($shipping->shipping_email)
                        ->subject($title_mail);
            });
        } catch (\Exception $e) {
            // Nếu cần log lỗi thì thêm Log ở đây
        }
    }
}
