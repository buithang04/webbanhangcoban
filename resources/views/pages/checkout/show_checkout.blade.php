@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>


		<div class="register-req">
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
							<form action="{{URL::to('/save-checkout-customer')}} " method="post">
								{{@csrf_field()}}
								<input type="text" name="shipping_email" placeholder="Email">
								<input type="text" name="shipping_name" placeholder="Họ và tên người nhận">
								<input type="text" name="shipping_address" placeholder="Địa chỉ">
								<input type="text" name="shipping_phone" placeholder="phone">
								<textarea name="shipping_notes" placeholder="Ghi chú đơn hàng" rows="8"></textarea>
								<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
							</form>
						</div>

					</div>
				</div>

			</div>
		</div>
		<div class="review-payment">
			<h2>Xem lại giỏ hàng</h2>
		</div>


		
	</div>
</section>

@endsection