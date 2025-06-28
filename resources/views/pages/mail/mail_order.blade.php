<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng - BXT-Shopper</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #2c3e50;
            padding: 30px;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #3498db;
            font-weight: 600;
        }
        .section-title {
            color: #16a085;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 5px;
            margin-top: 30px;
        }
        .info-list li {
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #7f8c8d;
            text-align: center;
        }
        .highlight {
            color: #e67e22;
        }
        .table > thead > tr {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container email-container">
        <div class="text-center">
            <h2>BXT-SHOPPER</h2>
            <p style="margin-top: -10px;">Cảm ơn bạn đã tin tưởng mua hàng tại BXT-Shop!</p>
            <p><em>Đây là email tự động, vui lòng không phản hồi.</em></p>
        </div>

        <p>Xin chào <strong class="highlight">{{ $shipping_array['customer_name'] }}</strong>,</p>
        <p>Bạn hoặc ai đó đã đặt hàng tại BXT-Shop với thông tin như sau:</p>

        <h4 class="section-title">Thông tin đơn hàng</h4>
        <ul class="info-list">
            <li><strong>Mã đơn hàng:</strong> {{ $code['order_code'] }}</li>
            <li><strong>Dịch vụ:</strong> Đặt hàng trực tuyến</li>
        </ul>

        <h4 class="section-title">Thông tin người nhận</h4>
        <ul class="info-list">
            <li><strong>Email:</strong> {{ $shipping_array['shipping_email'] ?? 'Không có' }}</li>
            <li><strong>Họ tên:</strong> {{ $shipping_array['shipping_name'] ?? 'Không có' }}</li>
            <li><strong>Địa chỉ:</strong> {{ $shipping_array['shipping_address'] ?? 'Không có' }}</li>
            <li><strong>Điện thoại:</strong> {{ $shipping_array['shipping_phone'] ?? 'Không có' }}</li>
            <li><strong>Ghi chú:</strong> {{ $shipping_array['shipping_notes'] ?? 'Không có' }}</li>
            <li><strong>Hình thức thanh toán:</strong> 
                {{ $shipping_array['payment_method'] == 1 ? 'Chuyển khoản' : 'Thanh toán khi nhận hàng' }}
            </li>
        </ul>

        <h4 class="section-title">Chi tiết đơn hàng</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $total = 0; 
                    $i = 1;
                @endphp
                @foreach($cart_array as $item)
                    @php
                        $subtotal = $item['product_qty'] * $item['product_price'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item['product_name'] }}</td>
                        <td>{{ number_format($item['product_price'], 0, ',', '.') }} VND</td>
                        <td>{{ $item['product_qty'] }}</td>
                        <td>{{ number_format($subtotal, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
                    <td><strong>{{ number_format($total, 0, ',', '.') }} VND</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Mọi thắc mắc vui lòng liên hệ: <strong>bxthang04@gmail.com</strong> hoặc SĐT: <strong>0326608210</strong></p>
            <p>Cảm ơn bạn đã mua hàng tại <strong>BXT-SHOPPER</strong>!</p>
        </div>
    </div>
</body>
</html>
