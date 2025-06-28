<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
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

    public function add_gallery($product_id)
    {

        $pro_id = $product_id;

        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }



    public function insert_gallery(Request $request, $pro_id)
    {
        $get_image = $request->file('file');
        if ($get_image) {
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move('public/upload/gallery', $new_image);
                $data['gallery_name'] = $new_image;
                $data['gallery_image'] = $new_image;
                $data['product_id'] = $pro_id;
                DB::table('tbl_gallery')->insert($data);
            }
        }

        Session::put('message', 'Thêm thư viện thành công');
        return Redirect()->back();
    }



    public function update_gallery_name(Request $request)
    {
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;

        DB::table('tbl_gallery')
            ->where('gallery_id', $gal_id)
            ->update(['gallery_name' => $gal_text]);
    }




    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = DB::table('tbl_gallery')->where('gallery_id', $gal_id)->first();
    
        if ($gallery && file_exists(public_path('upload/gallery/' . $gallery->gallery_image))) {
            unlink(public_path('upload/gallery/' . $gallery->gallery_image));
        }
        DB::table('tbl_gallery')->where('gallery_id', $gal_id)->delete();
    }




    public function update_gallery(Request $request)
    {
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
    
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
    
            $get_image->move(public_path('upload/gallery'), $new_image);
    
            $gallery = DB::table('tbl_gallery')->where('gallery_id', $gal_id)->first();
    
            if ($gallery && file_exists(public_path('upload/gallery/' . $gallery->gallery_image))) {
                unlink(public_path('upload/gallery/' . $gallery->gallery_image));
            }
    
            DB::table('tbl_gallery')->where('gallery_id', $gal_id)->update([
                'gallery_image' => $new_image
            ]);
    
            return response()->json(['success' => true, 'message' => 'Cập nhật ảnh thành công']);
        }
    
        return response()->json(['success' => false, 'message' => 'Không có ảnh được gửi']);
    }
    

    
    



    public function select_gallery(Request $request)
    {
        $product_id = $request->pro_id;
        $gallery = DB::table('tbl_gallery')->where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '<form>
                    ' . csrf_field() . '
        <table class="table table-hover">
                    <thead>
                        <tr><th>Thứ tự</th>
                            <th>Tên hình ảnh</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>

                        </tr>
                    </thead>
                    <tbody>
                   
                    ';
        if ($gallery_count > 0) {
            $i = 0;
            foreach ($gallery as $key => $gal) {
                $i++;
                $output .= '
                    
                   <tr>    
    <td>' . $i . '</td>
    <td contenteditable
    class="edit_gal_name"
    data-gal_id="' . $gal->gallery_id . '"
    title="' . $gal->gallery_name . '"
    style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . $gal->gallery_name . '</td>




    <td width="200px" >
        <img src="' . url('public/upload/gallery/' . $gal->gallery_image) . '" 
             class="img-thumbnail" width="100px" height="100px">
        <input type="file" class="file_image" style="margin-top: 5px;" data-gal_id="'. $gal->gallery_id .'" id="file-'. $gal->gallery_id .'" name="file" accept="file/*" />     
    </td>

    <td>
        <button type="button" data-gal_id="' . $gal->gallery_id . '" 
                class="btn btn-xs btn-danger delete-gallery">
            Xóa
        </button>
    </td>
</tr>

                        
                        ';
            }
        } else {
            $output .= '  <tr>
                            <td colspan="4" > Sản phẩm chưa có thư viện ảnh</td>
                            
                        </tr>
                        ';
        }

        $output .= '  </tbody>
                        </table>
                        </form>
    ';
        echo $output;
    }
}
