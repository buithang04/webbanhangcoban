@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->

<style>
.lSSlideOuter .lSPager.lSGallery img {
    display: block;
    height: 140px;
    max-width: 100%;
}
li.active {
    border: 2px solid rgb(255, 162, 0);
}
</style>
	<div class="col-sm-5">
				<ul id="imageGallery">
			@foreach($gallery as $key => $gal)
			<li  data-thumb="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}" data-src="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}">
			<img width="100%" src="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}" />
			</li>
			@endforeach
			
			</ul>
		
			
			

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$value->product_name}}</h2>
			<p>Mã ID: {{$value->product_id}}</p>
			<img src="images/product-details/rating.png" alt="" />

			<form action="{{URL::to('/save-cart')}}" method="post">
				{{@csrf_field()}}
				<span>
					<span>{{number_format($value->product_price).' VND'}}</span>
					<label>Số lượng:</label>
					<input type="number" name="qty" min="1" value="1" />
					<input type="hidden" name="productid_hidden" value="{{$value->product_id}}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm giỏ hàng
					</button>
				</span>
			</form>
			<p><b>Số lượng trong kho: </b> {{$value->product_quantity}}</p>
			<p><b>Điều kiện:</b> Mới</p>
			<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
			<p><b>Danh mục:</b> {{$value->category_name}}</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->
@endforeach
@foreach($product_details as $key => $value)
<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

			<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="details">

			<p>{!!$value->product_desc!!}</p>

		</div>

		<div class="tab-pane fade" id="companyprofile">

			<p>{!!$value->product_content!!}</p>

		</div>






		<div class="tab-pane fade " id="reviews">
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>

				<form action="#">
					<span>
						<input type="text" placeholder="Your Name" />
						<input type="email" placeholder="Email Address" />
					</span>
					<textarea name=""></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>


	</div><!--/category-tab-->
	@endforeach
	<div class="recommended_items"><!--recommended_items-->
		<br>
		<h2 class="title text-center">Sản phẩm liên quan</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					@foreach($relate as $key => $lienquan)
					<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/upload/product/'.$lienquan->product_image)}}" alt="" style="height: 250px; width: 200px" />
									<h2>{{number_format($lienquan->product_price).' VND'}}</h2>
									<p>{{$lienquan->product_name}}</p>
									<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem Chi tiết</a>
								</div>
							</div>
						</div>
					</div>
					</a>
					@endforeach
				
				</div>
			</div><!--/recommended_items-->
		</div>
	</div>
	@endsection