@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-3">
        <div class="input-group">
          <form method="GET" action="{{ url('/all-product') }}">
            <div class="input-group">
              <input type="text" name="search" class="input-sm form-control" placeholder="Tìm sản phẩm..." value="{{ request()->search }}">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="submit">Tìm</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if ($message) {
        echo '<span style="
            color: red;
            font-size: 16px;
            width: 100%;
            text-align: center;
            font-weight: bold;
        ">' . $message . '</span>';
        Session::put('message', null);
      }
      ?>

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Tên sản phẩm</th>
            <th>Thư viện ảnh</th>
            <th>Số lượng</th>
            <th>giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>

            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)

          <tr>

            <td>{{$pro->product_name}}</td>
            <td><a href="{{url('add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</a></td>
            <td>{{$pro->product_quantity}}</td>
            <td>{{$pro->product_price}}</td>
            <td><img src="public/upload/product/{{$pro->product_image}}" height="100" width="100"> </td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                if ($pro->product_status == 1) {
                ?>
                  <a href="{{ URL::to('/unactive-product/'.$pro->product_id) }}"
                    style="text-decoration: none; font-size: 20px; color: green;">
                    <i class="fa fa-thumbs-up"></i>
                  </a>
                <?php
                } else {
                ?>
                  <a href="{{ URL::to('/active-product/'.$pro->product_id) }}"
                    style="text-decoration: none; font-size: 20px; color: red;">
                    <i class="fa fa-thumbs-down"></i>
                  </a>
                <?php
                }
                ?>

              </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""
                style="font-size: 20px;">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""
                style="font-size: 20px;">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5">
          <small class="text-muted inline m-t-sm m-b-sm">
            Hiển thị {{ $all_product->firstItem() }} - {{ $all_product->lastItem() }} / {{ $all_product->total() }} sản phẩm
          </small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <div class="pagination pagination-sm m-t-none m-b-none" style="display:inline-block;">
            {{ $all_product->appends(['search' => request()->search])->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </footer>

  </div>
</div>

@endsection