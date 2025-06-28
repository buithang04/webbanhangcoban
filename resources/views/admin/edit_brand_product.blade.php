@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu sản phẩm
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo '<span style="
                                    color: red;
                                    font-size: 16px;
                                    width: 100%;
                                    text-align: center;
                                    font-weight: bold;
                                ">'.$message.'</span>';
                                Session::put('message', null);
                            }
                        ?>
                       
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$edit_value->brand_name}}"  name="brand_product_name" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <img src="{{ URL::to('public/upload/brand/'.$edit_value->brand_image)}}" height="100" width="100">
                                    <input type="file" class="form-control" name="brand_product_image" id="exampleInputEmail1" >
                                </div>
                                 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{$edit_value->brand_desc}}</textarea>
                                </div>
                                 
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection