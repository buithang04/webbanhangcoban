@extends('layout')
@section('content')

<section class="bxt-home-intro" aria-labelledby="latest-products-title">
    <p class="bxt-eyebrow">BXT / NEW SEASON</p>
    <h2 id="latest-products-title">Phong cách chuyển động</h2>
    <p class="bxt-lede">Những thiết kế được chọn lọc cho nhịp sống hiện đại — tối giản, tự tin và luôn sẵn sàng.</p>
    <div class="bxt-shop-links" aria-label="Khám phá danh mục">
        @foreach($category as $cate)
            <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}} <span aria-hidden="true">↗</span></a>
        @endforeach
    </div>
</section>

<div class="features_items bxt-product-section">
    <div class="bxt-section-heading">
        <div>
            <p class="bxt-eyebrow">BXT SELECTS</p>
            <h2>Sản phẩm mới nhất</h2>
        </div>
        <a class="bxt-view-all" href="{{URL::to('/trang-chu')}}">Xem tất cả <span aria-hidden="true">↗</span></a>
    </div>
    <div class="row bxt-product-grid">
    @foreach($all_product as $key => $product)
        <div class="product-card-link col-sm-4">
            <article class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a class="bxt-product-image" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" aria-label="Xem {{$product->product_name}}">
                            <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="{{$product->product_name}}" loading="lazy" />
                        </a>
                        <div class="bxt-product-meta">
                            <p class="bxt-product-category">BXT / {{$product->brand_name ?? 'COLLECTION'}}</p>
                            <h3>{{$product->product_name}}</h3>
                            <p class="bxt-product-price">{{number_format($product->product_price).' VND'}}</p>
                        </div>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default"><span aria-hidden="true">＋</span> Xem chi tiết</a>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
    </div>
</div>
<div class="pagination-area text-center">
    {!! $all_product->onEachSide(1)->links('pagination::bootstrap-4') !!}
</div>

@endsection