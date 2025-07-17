@extends('layout')
@section('content')

                    <div class="features_items">
						<br>
                         <!--features_items-->
						 @foreach($category_name as $key => $name)
						<h2 class="title text-center">{{$name->category_name}}</h2>
						@endforeach
						@foreach($category_by_id as $key => $product)
						<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">

								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt=""  style="height: 250px; width: 200px"/>
											<h2>{{number_format($product->product_price).' VND'}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default "><i class="fa fa-shopping-cart"></i>Xem Chi tiết</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										
									</ul>
								</div>
							</div>
						</div>
						</a>
						@endforeach
					</div><!--features_items-->

                    

@endsection  