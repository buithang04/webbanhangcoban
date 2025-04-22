<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
  
        if($admin_id){
           return Redirect::to('dashboard');
        }else{
           return Redirect::to('admin')->send();
        }
      }

      public function edit_customer($customer_id){
        $this->AuthLogin();
        $edit_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();
        $manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);

        return view('admin_layout')->with('admin.edit_customer',$manager_customer);
    }  


    public function update_customer(Request $request,$customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name']=$request->customer_name;
        $data['customer_password']= md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;
        DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        
    return Redirect::to('all-customer');
    }


    public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','xóa danh mục thành công');
        
    return Redirect::to('all-customer');
    }



    public function all_customer (){
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customers')->get();
        $manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);

        return view('admin_layout')->with('admin.all_customer',$manager_customer);
    }
}
