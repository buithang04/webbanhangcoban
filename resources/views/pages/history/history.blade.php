@extends('layout')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading text-center" style="font-size: 20px; font-weight: bold; color: #2c3e50;">
      LỊCH SỬ MUA HÀNG
    </div>

    <!-- Tìm kiếm -->
    <div class="row w3-res-tb" style="padding: 15px 25px;">
      <form method="GET" action="{{ url('/history') }}" class="form-inline">
        <div class="form-group">
          <input type="text" name="search" class="form-control input-sm" placeholder="Tìm mã đơn hàng..." value="{{ request()->search }}">
        </div>
        <button class="btn btn-sm " type="submit"><i class="fa fa-search"></i> Tìm</button>
      </form>
    </div>

    <!-- Thông báo -->
    @if(Session::get('message'))
      <div class="alert alert-info text-center">
        {{ Session::get('message') }}
        @php Session::put('message', null); @endphp
      </div>
    @endif

    <!-- Danh sách đơn hàng -->
    <div class="table-responsive">
      <table class="table table-bordered table-hover text-center">
        <thead>
          <tr style="text-align: center;">
            <th>Mã đơn hàng</th>
            <th>Người đặt</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Xem chi tiết</th>
          </tr>
        </thead>
        <tbody>
          @forelse($all_order as $order)
            <tr>
              <td>{{$order->order_code}}</td>
              <td>{{$order->customer_name }}</td>
              <td>{{$order->order_total}}</td>
              <td>{{$order->order_date}}</td>
              <td>
                @if($order->order_status == 1)
                  <span class=""><i class=""></i> Đã gửi hàng</span>
                @else
                  <span class=""><i class=""></i> Chưa xử lý</span>
                @endif
              </td>
              <td>
                <a href="{{ URL::to('/view-history-order/'.$order->order_id) }}" class="">
                  <i class="fa fa-eye"></i> Xem chi tiết
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6">Bạn chưa có đơn hàng nào.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Phân trang -->
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6">
          <small class="text-muted inline m-t-sm m-b-sm">
            Hiển thị {{ $all_order->firstItem() }} - {{ $all_order->lastItem() }} / {{ $all_order->total() }} đơn hàng
          </small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">
          <div class="pagination pagination-sm m-t-none m-b-none">
            {{ $all_order->appends(['search' => request()->search])->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
