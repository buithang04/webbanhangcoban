@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật tài khoản khách hàng
            </header>

            @if(Session::get('message'))
            <span style="color: red; font-size: 16px; display: block; text-align: center; font-weight: bold;">
                {{ Session::get('message') }}
            </span>
            {{ Session::put('message', null) }}
            @endif

            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/customer-update/'.$edit_customer->customer_id)}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" value="{{ $edit_customer->customer_name }}" name="customer_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{ $edit_customer->customer_email }}" name="customer_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới">
                        </div>

                        <div class="form-group">
                            <label>Nhập lại mật khẩu mới</label>
                            <input type="password" name="confirm_new_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" value="{{ $edit_customer->customer_phone }}" name="customer_phone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" value="{{ $edit_customer->customer_address }}" name="customer_address" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-info">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection