@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <div class="row w3-res-tb">
    <div class="input-group">
          <form method="GET" action="{{ url('/manage-order') }}">
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
            <th>Mã đơn hàng</th>
            <th>Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th>Ngày đặt hàng</th>
            <th>Tình trạng</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $key => $order)
          <tr>
            <td>{{$order->order_code}}</td>
            <td>{{$order->customer_name}}</td>
            <td>{{$order->order_total}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{ $order->order_status == 1 ? 'Đã xử lý' : 'Chưa xử lý' }}</td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class=""
              style="font-size: 20px;">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>

                <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng?')"  href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class=""
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
            Hiển thị {{ $all_order->firstItem() }} - {{ $all_order->lastItem() }} / {{ $all_order->total() }} sản phẩm
          </small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <div class="pagination pagination-sm m-t-none m-b-none" style="display:inline-block;">
            {{ $all_order->appends(['search' => request()->search])->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection