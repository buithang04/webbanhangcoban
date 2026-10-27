# BXT-shopper

Website thương mại điện tử thời trang được xây dựng bằng Laravel. Project mô phỏng một cửa hàng trực tuyến hoàn chỉnh với catalog sản phẩm, thương hiệu, giỏ hàng, đặt hàng và khu vực quản trị.

## Tổng quan

BXT-shopper sử dụng giao diện tối giản đen–trắng, typography thống nhất và bố cục responsive cho desktop/mobile. Catalog hiện có 50 sản phẩm mẫu, hình ảnh sản phẩm được lưu trong `public/upload/product` và dữ liệu MySQL được đóng gói trong `shopquanao.sql`.

## Cài đặt trên Windows/XAMPP

### 1. Clone project

```bash
git clone https://github.com/buithang04/webbanhangcoban.git
cd webbanhangcoban
```

### 2. Cài dependency

```bash
composer install
npm install
```

### 3. Tạo file môi trường

```bash
copy .env.example .env
php artisan key:generate
```

Mở `.env` và cấu hình MySQL:

```env
APP_URL=http://localhost/webbanhangcoban
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopquanao
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Tạo database MySQL

1. Mở XAMPP Control Panel và Start Apache, MySQL.
2. Mở [phpMyAdmin](http://localhost/phpmyadmin).
3. Tạo database `shopquanao` với charset `utf8mb4`.
4. Import file `shopquanao.sql`.

Hoặc dùng command line:

```bash
mysql -u root -p -e "CREATE DATABASE shopquanao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p shopquanao < shopquanao.sql
```

### 5. Chạy project

Nếu dùng XAMPP, đặt project trong `C:\xampp\htdocs` và truy cập:

```text
http://localhost/webbanhangcoban/
```

Nếu chạy Laravel development server:

```bash
php artisan serve
```

Mở `http://127.0.0.1:8000`.

Trong một terminal khác, chạy Vite khi cần phát triển frontend:

```bash
npm run dev
```

Build frontend production:

```bash
npm run build
```

## Lệnh hữu ích

```bash
php artisan route:list
php artisan optimize:clear
php artisan view:cache
php artisan test
```


## Tác giả

**buithang04**

Repository: [github.com/buithang04/webbanhangcoban](https://github.com/buithang04/webbanhangcoban)

