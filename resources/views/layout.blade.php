<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BXT shopper</title>
	<link href="{{ asset('public/frontend/css/font-awesome.min.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/prettyPhoto.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/price-range.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/animate.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/main.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/responsive.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/bootstrap.min.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/lightslider.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/prettify.css') }}?v={{ time() }}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/lightgallery.min.css') }}?v={{ time() }}" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="{{ asset('public/frontend/img/ico/favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('public/frontend/img/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('public/frontend/img/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('public/frontend/img/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('public/frontend/img/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0326608210 </a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> bxthang04@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ URL :: to ('/trang-chu') }}"><img style="width: 140px; height: 40px;" src="{{ asset('public/frontend/img/logo1.png') }}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							
								<!-- <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li> -->

								<?php
								$customer_id =  Session::get('customer_id',);
								if ($customer_id != null) {
								?>
									<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
								} else {
								?>
									<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php

								}
								?>
								




								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								
								<?php
								
								$customer_id =  Session::get('customer_id',);
								if ($customer_id != null) {
								?>
									<li><a href="{{URL::to('/customer-edit/'.Session::get('customer_id'))}}"><i class="fa fa-user"></i> Tài khoản</a></li>
									<li><a href="{{URL::to('/history')}}"><i class="fa fa-list-alt"></i> Lịch sử mua hàng</a></li>
									<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a>
									{{Session::get('customer_name')}}
								</li>
									

									
								<?php
								} else {
								?>
									<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php

								}
								?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ URL :: to ('/trang-chu') }}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="{{ URL :: to ('/trang-chu') }}">Sản phẩm<i class="fa fa-angle-down"></i></a>
								</li>
							
								
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="post">
							{{@csrf_field()}}

							<div class="search_box pull-right">
								<input type="text" name="keywords_submit" placeholder="Tìm kiếm" />
								<input type="submit" style="margin-top:0; color:black" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>BXT</span>-SHOPPER</h1>
									<h2>Thiên đường mua sắm</h2>
									<p>Thiên đường mua sắm trực tuyến dành cho mọi nhu cầu! Tại đây, chúng tôi tự hào mang đến hàng ngàn sản phẩm đa dạng thời trang, mẫu mã đến từ các thương hiệu uy tín </p>
									
								</div>
								<div class="col-sm-6">
									<img style="width: 484px; height: 441px;" src="{{ asset('public/frontend/img/girl1.png') }}" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>BXT</span>-SHOPPER</h1>
									<h2>Uy tín</h2>
									<p>Chúng tôi hiểu rằng khi mua sắm trực tuyến, sự tin cậy và uy tín là điều bạn đặt lên hàng đầu. Đó là lý do tại sao chúng tôi luôn nỗ lực xây dựng một nền tảng mà bạn có thể hoàn toàn an tâm khi lựa chọn sản phẩm và thực hiện giao dịch.</p>
									
								</div>
								<div class="col-sm-6">
									<img style="width: 484px; height: 441px;" src="{{ asset('public/frontend/img/girl2.png') }}" class="girl img-responsive" alt="" />
									
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>BXT</span>-SHOPPER</h1>
									<h2>Khách hàng là sự ưu tiên</h2>
									<p>chúng tôi tin rằng lắng nghe khách hàng không chỉ là một khẩu hiệu, mà là nền tảng cho mọi hoạt động của chúng tôi. Chúng tôi hiểu rằng mỗi ý kiến, mỗi câu hỏi và mỗi phản hồi từ bạn đều vô cùng quý giá. Chính vì vậy, chúng tôi luôn đặt khách hàng làm sự ưu tiên hàng đầu trong mọi quyết định và hành động.</p>
									
								</div>
								<div class="col-sm-6">
									<img style="width: 484px; height: 441px;" src="{{ asset('public/frontend/img/girl3.png') }}" class="girl img-responsive" alt="" />
									
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $key => $cate)


							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->

							<h2>Thương hiệu sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key => $brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>

						</div><!--/brands_products-->


					</div>
				</div>

				<div class="col-sm-9 padding-right">
					@yield('content')

				</div>
			</div>
		</div>
	</section>

	<footer id="footer" style="background-color: #f9f9f9; padding: 40px 0; border-top: 1px solid #ddd;">
    <div class="container">
        <div class="row">
            <!-- Logo và giới thiệu -->
            <div class="col-md-4">
				<h3 class="text-uppercase" style="color: #B4B1AB;">
					<strong style="color: #FE980F">BXT</strong><strong>-Shopper</strong></h3>
                <p style="color: #777;">Chuyên cung cấp thời trang chất lượng, giá cả hợp lý và dịch vụ tận tâm đến mọi khách hàng.</p>
                <img src="{{ asset('public/frontend/img/logo1.png') }}" alt="Logo Footer" style="max-width: 150px;">
            </div>

            <!-- Liên kết nhanh -->
            <div class="col-md-2">
                <h5 class="text-uppercase mb-3">Thông tin</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">Về chúng tôi</a></li>
                    <li><a href="#" class="text-muted">Liên hệ</a></li>
                    <li><a href="#" class="text-muted">Tin tức</a></li>
                    <li><a href="#" class="text-muted">Tuyển dụng</a></li>
                </ul>
            </div>

            <!-- Chính sách -->
            <div class="col-md-2">
                <h5 class="text-uppercase mb-3">Chính sách</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">Đổi trả hàng</a></li>
                    <li><a href="#" class="text-muted">Bảo mật</a></li>
                    <li><a href="#" class="text-muted">Giao hàng</a></li>
                    <li><a href="#" class="text-muted">Thanh toán</a></li>
                </ul>
            </div>

            <!-- Đăng ký nhận tin -->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-3">Đăng ký nhận tin</h5>
                <form action="#" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">Gửi</button>
                        </div>
                    </div>
                    <small class="text-muted">Chúng tôi sẽ gửi thông tin khuyến mãi & cập nhật mới nhất đến bạn.</small>
                </form>
            </div>
        </div>

        <hr>

        <!-- Bản quyền -->
        <div class="row">
            <div class="col-md-6">
                <p class="text-muted mb-0">&copy; {{ date('Y') }} BXT-Shopper. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-muted ml-2"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook  </a>

                <a href="#" class="text-muted ml-2">  <i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>

            </div>
        </div>
    </div>
</footer>




	<script src="{{ asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{ asset('public/frontend/js/main.js')}}"></script>
	<script src="{{ asset('public/frontend/js/lightslider.js')}}"></script>
	<script src="{{ asset('public/frontend/js/prettify.js')}}"></script>
	<script src="{{ asset('public/frontend/js/lightgallery-all.min.js')}}"></script>

	<script>
		 $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
	</script>
</body>

</html>