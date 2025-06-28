@extends('layout')
@section('content')

<div class="features_items">
	<!--features_items-->
    <br>
	<h2 class="title text-center">Sản phẩm mới nhất</h2>
	@foreach($all_product as $key => $product)
	<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
		<div class="col-sm-4">
			<div class="product-image-wrapper">

				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" style="height: 250px; width: 200px" />
						<h2>{{number_format($product->product_price).' VND'}}</h2>
						<p>
							{{$product->product_name}}
						</p>
						<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem Chi tiết</a>
					</div>

				</div>

			</div>
		</div>
	</a>
	@endforeach
</div><!--features_items-->
<div class="pagination-area text-center" style="margin-top: 20px;">
    {!! $all_product->onEachSide(1)->links('pagination::bootstrap-4') !!}
</div>





@endsection