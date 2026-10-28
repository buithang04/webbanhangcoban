<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function save_cart(Request $request){

       

        $validated = $request->validate(['productid_hidden' => 'required|integer|min:1', 'qty' => 'required|integer|min:1|max:99']);
        $productId = $validated['productid_hidden'];
        $quantity = $validated['qty'];

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->where('product_status', 1)->first();
        if (!$product_info || $quantity > $product_info->product_quantity) return back()->with('error', 'Sản phẩm không hợp lệ hoặc không đủ hàng.');

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = "123";
        $data['options']['image'] = $product_info->product_image;
        
        Cart::add($data);
        return Redirect::to('/show-cart');  
        
    }

    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $validated = $request->validate(['rowId_cart' => 'required|string', 'cart_quantity' => 'required|integer|min:1|max:99']);
        $rowId = $validated['rowId_cart'];
        $qty = $validated['cart_quantity'];
        $line = Cart::get($rowId);
        if (!$line) return back()->with('error', 'Không tìm thấy sản phẩm trong giỏ.');
        $product = DB::table('tbl_product')->where('product_id', $line->id)->first();
        if (!$product || $qty > $product->product_quantity) return back()->with('error', 'Không đủ hàng.');

        Cart::update($rowId, $qty);
        
        
        return Redirect::to('/show-cart');
    }
    
}
