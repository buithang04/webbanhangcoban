@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật tài khoản khách hàng
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
                            @foreach($edit_customer as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-customer/'.$edit_value->customer_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàngc</label>
                                    <input type="text" value="{{$edit_value->customer_name}}"  name="customer_name" class="form-control"  >
                                </div>
                                 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu</label>
                                    <input type="password" value="{{$edit_value->customer_password}}"  name="customer_password" class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại</label>
                                    <input type="phone" value="{{$edit_value->customer_phone}}"  name="customer_phone" class="form-control"  >
                                </div>
                                 
                                <button type="submit" name="update_customer" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection