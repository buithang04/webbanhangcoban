<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayOSController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// frontend
Route::get('/',['HomeController'] );
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'search']);

//danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);


// backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::match(['get', 'post'], '/admin-dashboard', [AdminController::class, 'dashboard']);

//login google
Route::get('/login-google', [LoginController::class, 'login_google']);
Route::get('/google/callback', [LoginController::class, 'callback_google']);


//login google by customer
Route::get('/login-customer-google', [AdminController::class, 'login_customer_google']);
Route::get('/customer/google/callback', [AdminController::class, 'callback_customer_google']);




//customer
Route::get('/edit-customer/{customer_id}', [CustomersController::class, 'edit_customer']);
Route::get('/delete-customer/{customer_id}', [CustomersController::class, 'delete_customer']);
Route::get('/all-customer', [CustomersController::class, 'all_customer']);
Route::post('/update-customer/{customer_id}', [CustomersController::class, 'update_customer']);
Route::get('/history', [CustomersController::class, 'history']);
Route::get('/view-history-order/{orderId}', [CustomersController::class, 'view_history_order']);
// Khách hàng tự chỉnh sử thông tin
Route::get('/customer-edit/{customer_id}', [CustomersController::class, 'customer_edit']);
Route::post('/customer-update/{customer_id}', [CustomersController::class, 'customer_update']);






//category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);


Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);

//brand product

Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);


Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);

//product

Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);


Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

//cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);

//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);

Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);

Route::post('/login-customer', [CheckoutController::class, 'login_customer']);

Route::post('/order-place', [CheckoutController::class, 'order_place']);

Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);




//order
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/delete-order/{orderId}', [CheckoutController::class, 'delete_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);
Route::post('/update-order-status', [CheckoutController::class, 'update_order_status'])->name('update.order.status');

//gallery
Route::get('/add-gallery/{product_id}', [GalleryController::class, 'add_gallery']);
Route::post('/select-gallery', [GalleryController::class, 'select_gallery']);
Route::post('/insert-gallery/{pro_id}', [GalleryController::class, 'insert_gallery']);
Route::post('/update-gallery-name', [GalleryController::class, 'update_gallery_name']);
Route::post('/delete-gallery', [GalleryController::class, 'delete_gallery']);
Route::post('/update-gallery', [GalleryController::class, 'update_gallery']);



//payos
Route::get('/payos/create', [PayOSController::class, 'create']);
Route::get('/checkout-success', [PayOSController::class, 'paymentSuccess']);
Route::get('/checkout-cancel', [PayOSController::class, 'paymentCancel']);
Route::post('/payos/webhook', [PayOSController::class, 'webhook']);

Route::post('/payos/webhook', [PayOSController::class, 'webhook']);
