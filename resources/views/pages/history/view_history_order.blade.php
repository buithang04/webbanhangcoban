@extends('layout')
@section('content')

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
        <div class="panel-heading bg-primary text-white">
            Chi tiết đơn hàng <span style="text-transform: none;">({{ $order_info->order_code }})</span>
        </div>

        <div class="table-responsive p-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Giá</th>
                        <th class="text-right">Tổng</th>
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
                            <td class="text-center">{{ $detail->product_sales_quantity }}</td>
                            <td class="text-right">{{ number_format($detail->product_price, 0, ',', '.') }} VNĐ</td>
                            <td class="text-right">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Tổng đơn hàng:</th>
                        <th class="text-right text-danger">{{ number_format($total, 0, ',', '.') }} VNĐ</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="panel-footer text-right">
            <a href="{{ URL::to('/history') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Quay lại lịch sử mua hàng
            </a>
        </div>
    </div>
</div>


@endsection