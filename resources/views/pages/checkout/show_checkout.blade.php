@extends('layout')
@section('content')

<section id="cart_items">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>


		<div class="col-sm-12 register-req">
			<p>Hãy đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">

				<div class="col-sm-12 clearfix">
					<div class="bill-to">
						<p>Điền thông tin gửi hàng</p>
						<div class="form-one">
							@if(Session::has('error'))
							<div style="color: red; margin-bottom: 10px;">
								{{ Session::get('error') }}
							</div>
							@endif
							<form action="{{ url('/save-checkout-customer') }}" method="POST">
								@csrf
								<input type="email" name="shipping_email" placeholder="Email"
									value="{{ old('shipping_email', $customer_info->customer_email  ?? '') }}" required>

								<input type="text" name="shipping_name" placeholder="Họ và tên người nhận"
									value="{{ old('shipping_name',  $customer_info->customer_name   ?? '') }}" required>

								<input type="text" name="shipping_address" placeholder="Địa chỉ"
									value="{{ old('shipping_address', $customer_info->customer_address ?? '') }}" required>

								<input type="tel" name="shipping_phone" placeholder="Số điện thoại"
									value="{{ old('shipping_phone', $customer_info->customer_phone  ?? '') }}" required>

								<textarea name="shipping_notes" placeholder="Ghi chú đơn hàng" rows="5">
								{{ old('shipping_notes') }}
								</textarea>

								<button type="submit" class="btn btn-primary btn-sm">Gửi đơn hàng</button>
							</form>

						</div>

					</div>
				</div>

			</div>
		</div>
		<div class="review-payment">
			<a href="{{URL::to('/show-cart')}}">
				<h2>Xem lại giỏ hàng</h2>
			</a>
		</div>



</section>

@endsection