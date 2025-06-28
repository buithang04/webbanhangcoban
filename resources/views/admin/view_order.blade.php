@extends('admin_layout')
@section('admin_content')

<!-- Thông tin người mua -->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">Thông tin người mua</div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người mua</th>
            <th>Số điện thoại</th>
            <th>Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_info->customer_name }}</td>
            <td>{{ $order_info->customer_phone }}</td>
            <td>
              @if($order_info->payment_method == 1)
                Chuyển khoản
              @elseif($order_info->payment_method == 2)
                Tiền mặt
              @else
                Chưa rõ
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


<br><br>

<!-- Thông tin vận chuyển -->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">Thông tin vận chuyển</div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_info->shipping_name }}</td>
            <td>{{ $order_info->shipping_address }}</td>
            <td>{{ $order_info->shipping_phone }}</td>
            <td>
              @if($order_info->payment_method == 1)
                Chuyển khoản
              @elseif($order_info->payment_method == 2)
                Tiền mặt
              @else
                Chưa rõ
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br>

<!-- Chi tiết đơn hàng -->
<div class="table-agile-info">
  <div class="panel panel-default">
  <div class="panel-heading">
  Liệt kê chi tiết đơn hàng<span style="text-transform: none;">({{ $order_info->order_code }})</span>
</div>

    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng kho</th>
            <th>Số lượng đặt</th>
            <th>Giá</th>
            <th>Tổng giá</th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0; @endphp
          @foreach($order_details as $detail)
          @php
          $subtotal = $detail->product_price * $detail->product_sales_quantity;
          $total += $subtotal;
          @endphp
          <tr>
            <td>{{ $detail->product_name }}</td>
            <td>{{ $detail->product_quantity }}</td>
            <td>{{ $detail->product_sales_quantity }}</td>
            <td>{{ number_format($detail->product_price, 0, ',', '.') }} VNĐ</td>
            <td>{{ number_format($subtotal, 0, ',', '.') }} VNĐ</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4" style="text-align:right;"><strong>Tổng đơn hàng:</strong></td>
            <td><strong style="color:red">{{ number_format($total, 0, ',', '.') }} VNĐ</strong></td>
          </tr>
        </tbody>
      </table>
    </div>
    @if(Session::has('message'))
    <div class="alert alert-success" style="font-weight: bold; text-align: center; color:red;">
        {{ Session::get('message') }}
    </div>
@endif
    <div style="padding: 20px">
      <form action="{{ route('update.order.status') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order_info->order_id }}">
        <select name="order_status" class="form-control" onchange="this.form.submit()">
          <option value="">--Chọn trạng thái--</option>
          <option value="1" {{ $order_info->order_status == 1 ? 'selected' : '' }}>Đã xử lý</option>
          <option value="2" {{ $order_info->order_status == 2 ? 'selected' : '' }}>Chưa xử lý</option>
        </select>
      </form>

    </div>

  </div>
</div>

@endsection