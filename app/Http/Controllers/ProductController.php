<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
  
        if($admin_id){
           return Redirect::to('dashboard');
        }else{
           return Redirect::to('admin')->send();
        }
      }

    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();



        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }
    public function all_product(Request $request)
    {
        $this->AuthLogin();
    
        $keywords = $request->input('search');
        $query = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id');
        
        if (!empty($keywords)) {
            $query->where(function ($q) use ($keywords) {
                $q->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                  ->orWhere('tbl_product.product_price', 'like', '%' . $keywords . '%')
                  ->orWhere('tbl_product.product_quantity', 'like', '%' . $keywords . '%')
                  ->orWhere('tbl_category_product.category_name', 'like', '%' . $keywords . '%')
                  ->orWhere('tbl_brand.brand_name', 'like', '%' . $keywords . '%');
            });
        }
        
        $results = $query->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand.brand_name')->get();
        
    
        $all_product = $query->paginate(5); 
    
        return view('admin.all_product')->with('all_product', $all_product);
    }
    


    public function save_product(Request $request){
        $this->AuthLogin();
        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
    
        $get_image = $request->file('product_image');
    
        $path = 'public/upload/product/';
        $path_gallery = 'public/upload/gallery/';
    
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

            File::copy($path . $new_image, $path_gallery . $new_image);
    
            $data['product_image'] = $new_image;
        }
        $pro_id = DB::table('tbl_product')->insertGetId($data);
        if($get_image){
            DB::table('tbl_gallery')->insert([
                'gallery_name' => $new_image,
                'gallery_image' => $new_image,
                'product_id' => $pro_id
            ]);
        }
    
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }
    

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','kích hoạt sản phẩm thành công');
        return

        Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product = view('admin.edit_product')
        ->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_quantity']=$request->product_quantity;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image ->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');  
        }
        
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
       Session::put('message','Cập nhật sản phẩm thành công');
       return Redirect::to('all-product'); 
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        
    return Redirect::to('all-product');
    }
//end admin page
    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

       

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

    foreach($details_product as $key => $value){
        $category_id = $value->category_id;
        $product_id = $value->product_id;
    }
        
     $gallery = DB::table('tbl_gallery')->where('product_id',$product_id)->get();
    
    $related_product = DB::table('tbl_product')
    ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
    ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
    ->where('tbl_product.category_id', $category_id)
    ->whereNotIn('tbl_product.product_id', [$product_id])
    ->select('tbl_product.*', 'tbl_brand.brand_name') // Lấy thêm tên thương hiệu
    ->limit(3)
    ->get();


    return view('pages.sanpham.show_details')
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('product_details', $details_product)
            ->with('gallery',$gallery)
            ->with('relate',$related_product);
            
}

}
