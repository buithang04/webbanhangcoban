-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 11:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_24_075642_create_tbl_admin_table', 1),
(6, '2025_03_30_021711_create_tbl_category_product', 2),
(7, '2025_03_30_022337_create_tbl_category_product', 3),
(8, '2025_03_30_050613_create_tbl_brand_product', 4),
(9, '2025_03_30_050748_create_tbl_brand_product', 5),
(10, '2025_03_30_055733_create_tbl_product', 6),
(11, '2025_04_05_095701_tbl_customer', 7),
(12, '2025_04_05_104100_tbl_shipping', 8),
(13, '2025_04_06_141736_tbl_payment', 9),
(14, '2025_04_06_141816_tbl_order', 9),
(15, '2025_04_06_141907_tbl_order_details', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'thang', '0326608210', '2025-03-29 09:59:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(2, 'samsung', '111', 0, NULL, NULL),
(3, 'apple', 'apple', 0, NULL, NULL),
(4, 'apple', 'apple', 0, NULL, NULL),
(5, 'Gucci', 'cci là một thương hiệu thời trang cao cấp của Ý, nổi tiếng toàn cầu với phong cách sang trọng, tinh tế và táo bạo. Được thành lập năm 1921 tại Florence, Gucci nổi bật với các sản phẩm như túi xách, giày dép, quần áo và phụ kiện cao cấp, thường mang biểu tượng hai chữ G lồng vào nhau. Thương hiệu kết hợp giữa di sản thủ công truyền thống và thiết kế hiện đại, thường mang yếu tố phá cách, độc đáo và đậm dấu ấn cá nhân.', 1, NULL, NULL),
(6, 'Dior', 'Dior là thương hiệu thời trang cao cấp của Pháp, nổi tiếng với sự thanh lịch, nữ tính và tinh tế. Thành lập năm 1946 bởi Christian Dior, thương hiệu này làm nên tên tuổi với những thiết kế tôn dáng, đặc biệt là phong cách “New Look” mang tính cách mạng. Dior cung cấp đa dạng sản phẩm như thời trang, nước hoa, mỹ phẩm và phụ kiện, kết hợp giữa cổ điển và hiện đại, thể hiện đẳng cấp và sự sang trọng vượt thời gian.', 1, NULL, NULL),
(7, 'Versace', 'Versace là thương hiệu thời trang cao cấp của Ý, được thành lập năm 1978 bởi Gianni Versace. Thương hiệu nổi tiếng với phong cách táo bạo, quyến rũ và biểu tượng Medusa đặc trưng', 1, NULL, NULL),
(8, 'Adidas', 'Adidas là thương hiệu thể thao toàn cầu đến từ Đức, nổi tiếng với các sản phẩm giày, quần áo và phụ kiện thể thao. Thành lập năm 1949, Adidas được nhận diện qua logo ba sọc đặc trưng. Thương hiệu kết hợp giữa hiệu suất, phong cách và công nghệ, được ưa chuộng trong cả thể thao chuyên nghiệp lẫn thời trang đường phố.', 1, NULL, NULL),
(9, 'Puma', 'Puma là thương hiệu thể thao nổi tiếng của Đức, thành lập năm 1948, chuyên sản xuất giày, quần áo và phụ kiện thể thao. Puma nổi bật với thiết kế năng động, thời trang và hiệu suất cao, được sử dụng rộng rãi trong các môn thể thao như bóng đá, điền kinh và cả thời trang đường phố. Biểu tượng con báo đang nhảy là đặc trưng của thương hiệu.', 1, NULL, NULL),
(10, 'Stussy', 'Stüssy là thương hiệu thời trang đường phố (streetwear) đến từ Mỹ, được thành lập vào đầu thập niên 1980 bởi Shawn Stussy. Thương hiệu nổi bật với phong cách trẻ trung, năng động và cá tính, kết hợp giữa văn hóa lướt sóng, hip-hop và skate. Logo chữ ký tay của Stüssy đã trở thành biểu tượng quen thuộc trong giới streetwear toàn cầu.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 'ps4', '111', 0, NULL, NULL),
(5, '111', '11', 0, NULL, NULL),
(7, 'Đồ nam', 'Quần áo dành cho nam giới', 1, NULL, NULL),
(8, 'Đồ nữ', 'Quần áo dành cho nữ giới', 1, NULL, NULL),
(9, 'Đồ trẻ em', 'Quần áo dành cho trẻ em', 1, NULL, NULL),
(10, 'Túi sách', 'Túi sách, balo, phụ kiện dành cho cả nam và nữ', 1, NULL, NULL),
(11, 'Mắt kính', 'phụ kiện', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(1, 'Thang', 'thang@gmail.com', 'c33367701511b4f6020ec61ded352059', '123456789', NULL, NULL),
(3, 'Hoang', 'Hoang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(11, 1, 12, 14, '2000000.00 VND', '2', NULL, NULL),
(12, 1, 13, 15, '2000000.00 VND', '2', NULL, NULL),
(14, 1, 14, 17, '2000000.00 VND', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(9, 10, 12, 'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses', '2000000', 1, NULL, NULL),
(10, 11, 12, 'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses', '2000000', 1, NULL, NULL),
(11, 12, 12, 'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses', '2000000', 1, NULL, NULL),
(12, 14, 12, 'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses', '2000000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(13, '2', '2', NULL, NULL),
(14, '2', '2', NULL, NULL),
(15, '2', '2', NULL, NULL),
(16, '2', '2', NULL, NULL),
(17, '2', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_quantity`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(8, 7, 'Áo thun in hình Stussy', '5', 10, 'Áo thun vừa vặn thoải mái bằng vải thun cotton 220gsm trọng lượng trung bình. Đồ họa in lụa ở mặt trước.\r\n- Tay ngắn\r\n- Cổ áo có gân', 'Áo thun', '300000', '1905131_OLIV_198.webp', 1, NULL, NULL),
(9, 7, 'ÁO THUN MAC TEE MÀU SẮC NHUỘM', '3', 10, 'Áo thun nhuộm màu vừa vặn thoải mái bằng vải thun cotton 220gsm trọng lượng trung bình. Đồ họa mặt trước được in lụa bằng mực gốc nước để tạo cảm giác mềm mại khi chạm vào.\r\n- Tay ngắn\r\n- Cổ áo có gân\r\n- Vừa vặn thoải mái\r\n- Unisex\r\n- Chất liệu: 100% cotton\r\n- Nhập khẩu', 'Áo thun chính hãng', '350000', '1905086_ELMM_149.webp', 1, NULL, NULL),
(10, 8, 'Áo Khoác Nữ Gucci Grey With GG Logo Embroidered', '2', 5, 'Áo Khoác Nữ Gucci Grey With GG Logo Embroidered - 717469 XKCQX 1060 Màu Xám được làm từ chất vải cao cấp mang lại cảm giác thoải mái cho người mặc. Form áo chuẩn đẹp, đường may tinh tế, tỉ mỉ từng chi tiết.\r\nÁo mềm mịn, không nhăn, không xù, không phai màu.\r\nThiết kế gam màu bắt mắt\r\nLogo gucic trải khắp tạo điểm nhấn', 'áo khác nữ', '5000000', 'ao-khoac-nu-gucci-grey-with-gg-logo-embroidered-717469-xkcqx-1060-mau-xam-1-jpg-1735616015-3112202410333559.webp', 1, NULL, NULL),
(11, 8, 'Áo Len Nữ Gucci With GG Monogram Logo', '2', 5, 'Áo Len Nữ Gucci With GG Monogram Logo - 731007XKCM8 1040 Màu Đỏ được làm từ vải len cao cấp mang lại cảm giác thoải mái cho người mặc. Form áo chuẩn đẹp, đường may tinh tế, tỉ mỉ từng chi tiết.', 'Áo len nữ', '5500000', 'ao-len-nu-gucci-with-gg-monogram-logo-731007xkcm8-1040-mau-do-size-s-67736be5a5a90-3112202410582919.webp', 1, NULL, NULL),
(12, 11, 'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses', '1', 5, 'Kính mát Gucci GG0746S 001 Men\'s Sunglasses với màu mắt xám có khả năng ngăn mờ lóa, bảo vệ tối đa cho đôi mắt khỏi khói bụi và tia UV. Mắt kính dáng vuông bo góc sành điệu, đeo lên vừa vặn với khuôn mặt đồng thời mang lại cảm giác dễ chịu khi sử dụng lâu dài.', 'Mắt kính', '2000000', 'kinh-mat-nam-gucci-gg0746s-001-men-s-sunglasses-mau-xam-den-size-57-651531ae47fbc-2809202314563090.webp', 1, NULL, NULL),
(13, 11, 'Gọng Kính Nữ Versace Cat Eye', '2', 7, 'Gọng Kính Nữ Versace Cat Eye 0VE3344F 5434 Màu Hồng được làm từ chất liệu nhựa Acetate cao cấp, thiết kế rất thời trang hợp với xu hướng hiện đại của nhiều bạn trẻ hiện nay.', 'Mắt kính', '1200000', 'gong-kinh-nu-versace-cat-eye-0ve3344f-5434-mau-hong-6791ca26d5efe-2301202511483834.webp', 1, NULL, NULL),
(14, 10, 'Balo Adidas Adicolor Backpack', '2', 8, 'Balo Adidas Adicolor Backpack IJ0761 Màu Đen được làm từ chất liệu vải dệt từ 100% polyester tái chế cao cấp, bền đẹp lâu dài trong quá trình sử dụng. Form balo ấn tượng với các đường may vô cùng tỉ mỉ, chắc chắn, tinh tế đến từng chi tiết. \r\nKích thước balo: 12.5cm x 30.5cm x 42cm', 'Balo', '500000', 'balo-adidas-adicolor-backpack-ij0761-mau-den-656eac8488f11-0512202311522023.webp', 1, NULL, NULL),
(15, 10, 'Túi Đeo Chéo Nữ Versace Jeans Couture Handbag', '2', 7, 'Túi Đeo Chéo Nữ Versace Jeans Couture Handbag Màu Hồng được làm từ chất liệu da cao cấp, form túi với các đường nét vô cùng tỉ mỉ và sắc sảo. Ngăn trong túi tiện lợi chứa đựng những vật dụng cần thiết như điện thoại, ví tiền....\r\n\r\nKích thước túi: 20x 12 x 6.cm\r\n\r\nSở hữu một chiếc túi thời trang, không chỉ đơn giản là một vật dụng chứa những vật dụng cần thiết, mà còn thể hiện được tính ngăn nắp, cùng gu thời trang sành điệu.', 'túi đeo nữ', '300000', 'tui-deo-cheo-nu-versace-jeans-couture-handbag-mau-hong-kem-tui-nho-n-hm-67e9f70b25134-3103202508593971.webp', 1, NULL, NULL),
(16, 8, 'Áo Phông Nữ Dior White With Tree Frame Printed Tshirt', '1', 6, 'Áo Phông Nữ Dior White With Tree Frame Printed Tshirt 3WBM23TEEU Màu Trắng được làm từ cotton có khả năng thấm hút tốt mang lại cảm giác thoải mái cho người mặc. Form áo chuẩn đẹp, đường may tinh tế, tỉ mỉ từng chi tiết làm hài lòng ngay cả với khách hàng khó tính.', 'Áo Dior White With Tree Frame Printed Tshirt 3WBM23TEEU là một mẫu áo Dior dành cho các chàng trai yêu thích sự đơn giản nhưng không kém phần tinh tế và nổi bật.', '3500000', 'ao-phong-nu-dior-white-with-tree-frame-printed-tshirt-3wbm23teeu-mau-trang-6508199f6953e-1809202316342348.webp', 1, NULL, NULL),
(17, 8, 'Khăn Nữ Dior Mitzah Silk Toile De Jouy Flowers', '2', 6, 'Khăn Dior Mitzah Silk Toile De Jouy Flowers Màu Xanh Navy được may từ chất liệu vải lụa cao cấp mang đến sự mềm mại khi cầm lên tay. Với những cô nàng thanh lịch, yêu thích sự nhẹ nhàng nhưng không kém phần sang trọng, thì những chiếc khăn họa tiết sẽ là gợi ý hoàn hảo để thể hiện được phong cách riêng của mình.', 'Sản phẩm thích hợp với các trang phục như: áo dài, vest, đồng phục công ty,... Ngoài ra bạn có thể dùng khăn để cột cổ áo sơ mi - tăng thêm vẻ thanh lịch và tinh tế của trang phục.', '3500000', 'khan-dior-mitzah-silk-toile-de-jouy-flowers-mau-xanh-navy-676a20a65a4ef-2412202409470265.webp', 1, NULL, NULL),
(18, 9, 'Áo thun PUMA x PLAYMOBIL® cho trẻ em', '1', 9, 'Kiểu dáng vừa vặn\r\n160 gsm, vải Jersey\r\nCổ tròn\r\nTay áo ngắn\r\nĐồ họa in chất liệu cao su PLAYMOBIL® ở mặt trước\r\nHình in chất liệu cao su về hợp tác thương hiệu PUMA x PLAYMOBIL®\r\nPUMA cho trẻ em: Khuyên dùng cho trẻ nhỏ từ 4 đến 8 tuổi', 'áo trẻ em', '350000', 'Áo-thun-PUMA-x-PLAYMOBIL®-cho-trẻ-em21.avif', 1, NULL, NULL),
(19, 9, 'Ba lô PUMA x PLAYMOBIL® cho trẻ em', '1', 9, 'Hình dạng ba lô cổ điển\r\nNgăn đựng chính có khóa kéo\r\nTúi có khóa kéo phía trước\r\nIn họa tiết PLAYMOBIL® toàn bộ\r\nCó chi tiết về hợp tác thương hiệu PUMA x PLAYMOBIL®\r\nPUMA cho trẻ em: Khuyên dùng cho trẻ nhỏ từ 4 đến 8 tuổi', 'Balo trẻ em', '350000', 'Ba-lô-PUMA-x-PLAYMOBIL®-cho-trẻ-em76.avif', 1, NULL, NULL),
(20, 7, 'Áo thun tennis adidas Heritage', '2', 8, 'Vừa vặn\r\nCổ tròn có gân\r\n58% cotton, 42% polyester (tái chế)\r\nAEROREADY\r\nCác đường xẻ ở gấu áo\r\nMàu sắc: Trắng phấn\r\nMã sản phẩm: JC6742', 'áo nam', '350000', 'adidas_Heritage_Tennis_Tee_White_JC6742_HM136.avif', 1, NULL, NULL),
(21, 7, 'Áo thun không tay bóng rổ adidas', '2', 8, 'Dáng rộng\r\nCổ tròn có gân\r\n100% cotton\r\nMàu sắc: Putty Beige', 'áo bóng rổ', '1000000', 'adidas_Basketball_Sleeveless_Tee_Gender_Neutral_Beige_JD6135_21_model51.avif', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(11, 'thang', '6 ngo 33 duong an tho , an khanh , hoai duc , ha noi', '0904430029', 'thang@gmail.com', '1', NULL, NULL),
(12, 'thang', '6 ngo 33 duong an tho , an khanh , hoai duc , ha noi', '0904430029', 'thang@gmail.com', '12', NULL, NULL),
(13, 'thang', '6 ngo 33 duong an tho , an khanh , hoai duc , ha noi', '1111111', 'thang@gmail.com', '11', NULL, NULL),
(14, 'aiia', '6 ngo 33 duong an tho , an khanh , hoai duc , ha noi', '11111', 'thang@gmail.com', '11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
