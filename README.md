<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">🛒 Website Bán Hàng Cơ Bản - Laravel Project</h2>

<p align="center">
  Một dự án website bán hàng đơn giản, sử dụng Laravel framework. Hỗ trợ đặt hàng, quản lý sản phẩm, đơn hàng, người dùng và thanh toán.
</p>

---

## 🚀 Tính năng nổi bật

- 🔐 Đăng ký / Đăng nhập cho khách hàng và quản trị viên
- 🔑 Đăng nhập bằng Google
- 📦 Quản lý sản phẩm, danh mục, thương hiệu
- 🛒 Giỏ hàng và đặt hàng
- 💳 Thanh toán: tiền mặt, chuyển khoản PayOS
- 📧 Gửi email xác nhận đơn hàng
- 📊 Thống kê tổng đơn hàng, doanh thu, người dùng
- 🧾 Lịch sử mua hàng khách hàng
- 🧑‍💼 Quản trị toàn diện dành cho admin

---

## 🛠️ Công nghệ sử dụng

| Thành phần       | Công nghệ         |
|------------------|-------------------|
| Backend          | Laravel 10.x      |
| Frontend         | Blade + Bootstrap |
| Database         | MySQL             |
| Package OAuth    | Laravel Socialite |
| Local server     | XAMPP             |

---

## ⚙️ Hướng dẫn cài đặt

### 

```bash
git clone https://github.com/buithang04/webbanhangcoban.git
cd webbanhangcoban
2. Cài đặt Composer & NPM
composer install
npm install && npm run dev
3. Tạo file .env và cấu hình
cp .env.example .env
4. Tạo khóa ứng dụng và migrate CSDL
php artisan key:generate
php artisan migrate --seed
5. Khởi động server
chạy trên XAMPP
