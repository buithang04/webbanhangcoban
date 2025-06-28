@extends('layout')
@section('content')


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->

						<h2>Đăng nhập tài khoản</h2>
						@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						<form action="{{URL::to('/login-customer')}}" method="post" >
						{{@csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account"  placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>

					<ul style="margin-top: 5px;" class="list-login">
						<li>
							<a href="{{url('login-customer-google')}}"> 
								<img width="10%" src="{{asset('public/frontend/img/gg.png')}}" 
								alt="Đăng nhập bằng tài khoản google"></a>
						</li>
					</ul>


					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí </h2>
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul style="margin: 0; padding-left: 18px;">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form action="{{ URL::to('/add-customer')}}" method="post">
						{{@csrf_field()}}
							<input type="text" name="customer_name" placeholder="Họ và tên"/>
							<input type="email" name="customer_email" placeholder="Địa chỉ Email"/>
							<input type="password" name="customer_password" placeholder="Mật khẩu"/>
                            <input type="phone" name="customer_phone" placeholder="Số điện thoại"/>
							<input type="phone" name="customer_address" placeholder="Địa chỉ"/>
							<button type="submit" name="" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>

			
		</div>
	</section><!--/form-->


@endsection  