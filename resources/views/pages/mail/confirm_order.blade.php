<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng đã được xác nhận và gửi đi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; color: #333;">
    <div class="container" style="background-color: #ffffff; border-radius: 10px; padding: 30px; border: 1px solid #dee2e6; margin-top: 20px;">
        <div class="text-center" style="margin-bottom: 30px;">
            <h2 style="color: #007bff;">BXT-SHOPPER - ĐƠN HÀNG ĐÃ XÁC NHẬN</h2>
            <p style="color: #6c757d;">(Đây là email tự động, vui lòng không phản hồi)</p>
        </div>

        <p>Xin chào <strong style="color: #007bff;">{{ $shipping_array['customer_name'] }}</strong>,</p>
        <p>Chúng tôi vui mừng thông báo đơn hàng <strong>#{{ $code['order_code'] }}</strong> của bạn đã được <span style="color: green;"><strong>xác nhận</strong></span> và <strong>đang được gửi đi</strong> đến địa chỉ nhận hàng bạn đã cung cấp.</p>

        <h4 style="margin-top: 25px; color: #17a2b8;">Thông tin đơn hàng</h4>
        <ul>
            <li><strong>Mã đơn hàng:</strong> {{ $code['order_code'] }}</li>
            <li><strong>Thời gian xác nhận:</strong> {{ now()->format('d/m/Y H:i') }}</li>
            <li><strong>Hình thức mua:</strong> Giao hàng tận nơi</li>
        </ul>

        <h4 style="color: #17a2b8;">Người nhận hàng</h4>
        <ul>
            <li><strong>Email:</strong> {{ $shipping_array['shipping_email'] ?? 'Không có' }}</li>
            <li><strong>Họ tên:</strong> {{ $shipping_array['shipping_name'] ?? 'Không có' }}</li>
            <li><strong>Địa chỉ:</strong> {{ $shipping_array['shipping_address'] ?? 'Không có' }}</li>
            <li><strong>Điện thoại:</strong> {{ $shipping_array['shipping_phone'] ?? 'Không có' }}</li>
            <li><strong>Ghi chú:</strong> {{ $shipping_array['shipping_notes'] ?? 'Không có' }}</li>
            <li><strong>Thanh toán:</strong> {{ $shipping_array['payment_method'] == 1 ? 'Chuyển khoản' : 'Thanh toán khi nhận hàng' }}</li>
        </ul>

        <h4 style="color: #17a2b8;">Sản phẩm đã đặt</h4>
        <table class="table table-bordered" style="background-color: #ffffff;">
            <thead style="background-color: #007bff; color: #fff;">
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
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
                <tr style="background-color: #f1f1f1;">
                    <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
                    <td><strong>{{ number_format($total, 0, ',', '.') }} VND</strong></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 20px;">Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, vui lòng liên hệ:</p>
        <ul>
            <li>Email: <strong>bxthang04@gmail.com</strong></li>
            <li>Hotline/Zalo: <strong>0326608210</strong></li>
        </ul>

        <p style="margin-top: 30px; font-style: italic;">Cảm ơn bạn đã mua sắm tại <strong style="color: #007bff;">BXT-SHOPPER</strong>. Chúc bạn một ngày tốt lành!</p>
    </div>
</body>
</html>
