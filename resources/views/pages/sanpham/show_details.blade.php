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






		<div class="tab-pane fade" id="reviews">
    <div class="col-sm-12">
        <!-- Thông tin người đánh giá -->
        <ul class="list-inline">
            <li><i class="fa fa-user"></i> Nguyễn Văn A</li>
            <li><i class="fa fa-clock-o"></i> 14:35</li>
            <li><i class="fa fa-calendar-o"></i> 17/07/2025</li>
        </ul>

        <!-- Nội dung đánh giá -->
        <p>
            Sản phẩm chất lượng tốt, giao hàng nhanh và đóng gói cẩn thận. Tôi rất hài lòng với dịch vụ của shop. 
            Sẽ tiếp tục ủng hộ trong những lần mua hàng tiếp theo.
        </p>

        <!-- Tiêu đề form -->
        <p><strong>Gửi đánh giá của bạn</strong></p>

        <!-- Form đánh giá -->
        <form action="#" method="POST">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input type="text" name="name" class="form-control" placeholder="Họ tên của bạn" required />
                </div>
                <div class="col-sm-6 form-group">
                    <input type="email" name="email" class="form-control" placeholder="Địa chỉ email" required />
                </div>
            </div>
            <div class="form-group">
                <textarea name="review" class="form-control" rows="4" placeholder="Nội dung đánh giá" required></textarea>
            </div>

            

            <button type="submit" class="btn btn-primary pull-right">Gửi đánh giá</button>
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
									<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" class="btn btn-default "><i class="fa fa-shopping-cart"></i>Xem Chi tiết</a>
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