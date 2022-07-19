-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 18, 2022 lúc 02:54 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `t_clothes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(5, 'Áo Nam 2022', 0, '', '', 'ao-nam-2022', 1, '2022-06-20 10:07:40', '2022-07-01 01:41:36'),
(8, 'Áo hè đẹp', 5, '', '', 'ao-he-dep', 1, '2022-06-20 10:08:26', '2022-06-20 10:08:26'),
(10, 'Quần Nam', 0, '', '', 'quan-nam', 1, '2022-07-01 01:41:59', '2022-07-01 01:41:59'),
(11, 'Quần Âu Nam', 10, '', '', 'quan-au-nam', 1, '2022-07-01 01:42:21', '2022-07-01 01:42:21'),
(12, 'Thắt Lưng Nam', 0, '', '', 'that-lung-nam', 1, '2022-07-01 01:42:48', '2022-07-11 08:02:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_27_171257_create_menus_table', 1),
(6, '2022_06_01_160006_create_products_table', 1),
(7, '2022_06_11_022725_create_sliders_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `thumb`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Áo Phông Nam Regular', '', '', 8, 300000, 250000, '/storage/uploads/2022/07/01/PL0105__6__thumb.jpg', 'ao-phong-nam-regular', 1, '2022-07-01 01:41:01', '2022-07-01 01:41:47'),
(2, 'Áo Polo Hè', '', '', 5, 250000, 200000, '/storage/uploads/2022/07/01/AP0101__1__thumb.jpg', 'ao-polo-he', 1, '2022-07-01 01:44:18', '2022-07-01 01:44:18'),
(3, 'Áo Phông Reluar', '', '', 8, 250000, 0, '/storage/uploads/2022/07/01/AP0108__12__thumb.jpg', 'ao-phong-reluar', 1, '2022-07-01 01:45:06', '2022-07-01 01:45:06'),
(4, 'Thắt Lưng cao cấp', '', '', 12, 200000, 180000, '/storage/uploads/2022/07/01/DL0064__2__thumb.jpg', 'that-lung-cao-cap', 1, '2022-07-01 01:45:41', '2022-07-01 01:45:41'),
(5, 'Thắt lưng da bò', '', '', 12, 280000, 250000, '/storage/uploads/2022/07/01/DL0067__2__thumb.jpg', 'that-lung-da-bo', 1, '2022-07-01 01:46:26', '2022-07-01 01:46:26'),
(6, 'Thắt lưng da bò 0124', '', '', 12, 230000, 200000, '/storage/uploads/2022/07/01/DL0068__1__thumb.jpg', 'that-lung-da-bo-0124', 1, '2022-07-01 01:47:26', '2022-07-01 01:47:26'),
(7, 'Quần Âu Nam 012', '', '', 11, 400000, 350000, '/storage/uploads/2022/07/01/QA1724__0__thumb.jpg', 'quan-au-nam-012', 1, '2022-07-01 01:47:57', '2022-07-01 01:47:57'),
(8, 'Quần Âu Nam 021', '', '', 11, 500000, 450000, '/storage/uploads/2022/07/01/QA1729__0__thumb.jpg', 'quan-au-nam-021', 1, '2022-07-01 01:48:29', '2022-07-10 10:47:30'),
(9, 'Quần Âu Nam 022', '', '', 11, 390000, 360000, '/storage/uploads/2022/07/01/QA1730__2__thumb.jpg', 'quan-au-nam-022', 1, '2022-07-01 01:48:54', '2022-07-01 01:48:54'),
(10, 'Áo Phông Nam Regular 01', '', '', 8, 300000, 250000, '/storage/uploads/2022/07/01/PL0105__6__thumb.jpg', 'ao-phong-nam-regular-1', 1, '2022-06-30 18:41:01', '2022-06-30 18:41:47'),
(11, 'Áo Polo Hè 012', '', '', 5, 250000, 200000, '/storage/uploads/2022/07/01/AP0101__1__thumb.jpg', 'ao-polo-he-2', 1, '2022-06-30 18:44:18', '2022-06-30 18:44:18'),
(12, 'Áo Phông Reluar 245', '', '', 8, 250000, 215000, '/storage/uploads/2022/07/01/AP0108__12__thumb.jpg', 'ao-phong-reluar-245', 1, '2022-06-30 18:45:06', '2022-07-10 10:53:26'),
(13, 'Thắt Lưng cao cấp 02', '', '', 12, 200000, 180000, '/storage/uploads/2022/07/01/DL0064__2__thumb.jpg', 'that-lung-cao-cap4', 1, '2022-06-30 18:45:41', '2022-06-30 18:45:41'),
(14, 'Thắt lưng da bò 03', '', '', 12, 280000, 250000, '/storage/uploads/2022/07/01/DL0067__2__thumb.jpg', 'that-lung-da-bo5', 1, '2022-06-30 18:46:26', '2022-06-30 18:46:26'),
(15, 'Thắt lưng da bò 01214', '', '', 12, 230000, 200000, '/storage/uploads/2022/07/01/DL0068__1__thumb.jpg', 'that-lung-da-bo-01246', 1, '2022-06-30 18:47:26', '2022-06-30 18:47:26'),
(16, 'Quần Âu Nam 0124', '', '', 11, 400000, 350000, '/storage/uploads/2022/07/01/QA1724__0__thumb.jpg', 'quan-au-nam-0127', 1, '2022-06-30 18:47:57', '2022-06-30 18:47:57'),
(17, 'Quần Âu Nam 0211', '', '', 11, 380000, 300000, '/storage/uploads/2022/07/01/QA1729__0__thumb.jpg', 'quan-au-nam-0218', 1, '2022-06-30 18:48:29', '2022-06-30 18:48:29'),
(18, 'Quần Âu Nam 0224', '', '', 11, 390000, 360000, '/storage/uploads/2022/07/01/QA1730__2__thumb.jpg', 'quan-au-nam-0229', 1, '2022-06-30 18:48:54', '2022-06-30 18:48:54'),
(19, 'Áo Phông Nam Regular 0', '', '', 8, 300000, 250000, '/storage/uploads/2022/07/01/PL0105__6__thumb.jpg', 'ao-phong-nam-regular10', 1, '2022-06-30 18:41:01', '2022-06-30 18:41:47'),
(20, 'Áo Polo Hè 05', '', '', 5, 250000, 200000, '/storage/uploads/2022/07/09/AP0108__12__thumb.jpg', 'ao-polo-he-05', 1, '2022-06-30 18:44:18', '2022-07-09 11:54:59'),
(21, 'Áo Phông Reluar 06', '', '', 8, 250000, 0, '/storage/uploads/2022/07/01/AP0108__12__thumb.jpg', 'ao-phong-reluar12', 1, '2022-06-30 18:45:06', '2022-06-30 18:45:06'),
(22, 'Thắt Lưng cao cấp 07', '', '', 12, 200000, 180000, '/storage/uploads/2022/07/01/DL0064__2__thumb.jpg', 'that-lung-cao-cap13', 1, '2022-06-30 18:45:41', '2022-06-30 18:45:41'),
(23, 'Thắt lưng da bò 07', '', '', 12, 280000, 250000, '/storage/uploads/2022/07/01/DL0067__2__thumb.jpg', 'that-lung-da-bo14', 1, '2022-06-30 18:46:26', '2022-06-30 18:46:26'),
(24, 'Thắt lưng da bò 01248', '', '', 12, 230000, 200000, '/storage/uploads/2022/07/01/DL0068__1__thumb.jpg', 'that-lung-da-bo-012415', 1, '2022-06-30 18:47:26', '2022-06-30 18:47:26'),
(25, 'Quần Âu Nam 0224', '', '', 11, 400000, 350000, '/storage/uploads/2022/07/01/QA1724__0__thumb.jpg', 'quan-au-nam-0224', 1, '2022-06-30 18:47:57', '2022-07-11 09:55:59'),
(26, 'Quần Âu Nam 0210', '', '', 11, 380000, 300000, '/storage/uploads/2022/07/01/QA1729__0__thumb.jpg', 'quan-au-nam-0210', 1, '2022-06-30 18:48:29', '2022-07-11 10:35:45'),
(27, 'Quần Âu Nam 02210', '', '', 11, 390000, 360000, '/storage/uploads/2022/07/01/QA1730__2__thumb.jpg', 'quan-au-nam-02218', 1, '2022-06-30 18:48:54', '2022-06-30 18:48:54'),
(28, 'Áo Phông Nam Regular 12', '', '', 8, 300000, 250000, '/storage/uploads/2022/07/01/PL0105__6__thumb.jpg', 'ao-phong-nam-regular19', 1, '2022-06-30 18:41:01', '2022-06-30 18:41:47'),
(29, 'Áo Polo Hè 13', '', '', 5, 250000, 200000, '/storage/uploads/2022/07/01/AP0101__1__thumb.jpg', 'ao-polo-he20', 1, '2022-06-30 18:44:18', '2022-06-30 18:44:18'),
(30, 'Áo Phông Reluar 14', '', '', 8, 250000, 249000, '/storage/uploads/2022/07/01/AP0108__12__thumb.jpg', 'ao-phong-reluar-14', 1, '2022-06-30 18:45:06', '2022-07-11 09:54:12'),
(31, 'Thắt Lưng cao cấp 15', '', '', 12, 200000, 180000, '/storage/uploads/2022/07/01/DL0064__2__thumb.jpg', 'that-lung-cao-cap22', 1, '2022-06-30 18:45:41', '2022-06-30 18:45:41'),
(32, 'Thắt lưng da bò 16', '', '', 12, 280000, 250000, '/storage/uploads/2022/07/01/DL0067__2__thumb.jpg', 'that-lung-da-bo23', 1, '2022-06-30 18:46:26', '2022-06-30 18:46:26'),
(33, 'Thắt lưng da bò 0117', '', '', 12, 230000, 200000, '/storage/uploads/2022/07/01/DL0068__1__thumb.jpg', 'that-lung-da-bo-012244', 1, '2022-06-30 18:47:26', '2022-06-30 18:47:26'),
(34, 'Quần Âu Nam 0118 ', '', '', 11, 400000, 350000, '/storage/uploads/2022/07/01/QA1724__0__thumb.jpg', 'quan-au-nam-01225', 1, '2022-06-30 18:47:57', '2022-06-30 18:47:57'),
(35, 'Quần Âu Nam 019', '', '', 11, 380000, 300000, '/storage/uploads/2022/07/01/QA1729__0__thumb.jpg', 'quan-au-nam-02126', 1, '2022-06-30 18:48:29', '2022-06-30 18:48:29'),
(36, 'Quần Âu Nam 02220', '', '', 11, 390000, 360000, '/storage/uploads/2022/07/01/QA1730__2__thumb.jpg', 'quan-au-nam-02227', 1, '2022-06-30 18:48:54', '2022-06-30 18:48:54'),
(37, 'Áo Phông Nam Regular 21', '', '', 8, 230000, 215000, '/storage/uploads/2022/07/01/PL0105__6__thumb.jpg', 'ao-phong-nam-regular-21', 1, '2022-06-30 18:41:01', '2022-07-11 09:51:55'),
(38, 'Áo Polo Hè 22', '', '<h2>THUỘC T&Iacute;NH SẢN PHẨM</h2>\r\n\r\n<p><strong>Chất liệu:</strong></p>\r\n\r\n<p>&nbsp; ►95% Cotton gi&uacute;p &aacute;o mềm mại, xốp nhẹ, khả năng thấm h&uacute;t tốt, tho&aacute;ng kh&iacute; v&agrave; bay rũ tự nhi&ecirc;n.</p>\r\n\r\n<p>&nbsp; ►5% Spandex tạo độ co gi&atilde;n, thoải m&aacute;i khi vận động.</p>\r\n\r\n<p><strong>Kiểu d&aacute;ng:&nbsp;</strong></p>\r\n\r\n<p>&nbsp; ►Phom Regular&nbsp;rộng r&atilde;i kh&ocirc;ng qu&aacute; b&oacute; , tạo cảm gi&aacute;c thoải mải cho người mặc, ph&ugrave; hợp với v&oacute;c d&aacute;ng người Việt.</p>\r\n\r\n<p><strong>Chi tiết:</strong></p>\r\n\r\n<p>&nbsp; ►&Aacute;o được thiết kế với cổ bo tr&ograve;n, ống tay rộng, ph&ugrave; hợp với thời tiết m&ugrave;a h&egrave;.</p>\r\n\r\n<p>&nbsp; ►Phần m&aacute;c &aacute;o được in nhiệt ch&igrave;m tinh tế, kh&ocirc;ng g&acirc;y cảm gi&aacute;c kh&oacute; chịu cho người mặc.</p>\r\n\r\n<p>&nbsp; ►Kiểu d&aacute;ng trơn đơn giản rễ mặc.</p>\r\n\r\n<p>&nbsp; ►M&agrave;u sắc cơ bản dễ phối đồ.</p>', 5, 240000, 210000, '/storage/uploads/2022/07/01/AP0101__1__thumb.jpg', 'ao-polo-he-22', 1, '2022-06-30 18:44:18', '2022-07-13 06:21:28'),
(39, 'Áo Phông Reluar 23', '', '<p>&Aacute;o Polo lu&ocirc;n l&agrave; sản phẩm chủ đạo của Old Sailor với&nbsp;thiết kế đặc biệt.</p>\r\n\r\n<p>Cảm gi&aacute;c chỉ ri&ecirc;ng của đ&agrave;n &ocirc;ng, đơn giản, lịch thiệp v&agrave; sang trọng g&oacute;i gọn trong chiếc &aacute;o Polo.</p>\r\n\r\n<p>Chất liệu:&nbsp; Cotton</p>\r\n\r\n<p>Kiểu form: Basic</p>\r\n\r\n<p>Size M -&gt; 5XL.</p>\r\n\r\n<p>M&agrave;u: X&aacute;m</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng v&agrave; bảo quản &Aacute;o&nbsp;</strong><strong>POLO</strong><strong>&nbsp;</strong><strong>của Old Sailor &ndash; The Big Size.</strong></p>\r\n\r\n<p><br />\r\n+ Khi mới mua về n&ecirc;n giặt lần đầu ti&ecirc;n, nhiệt độ th&igrave; b&igrave;nh thường.</p>\r\n\r\n<p>+ Việc bảo quản vải thun c&aacute; sấu dễ d&agrave;ng, lưu &yacute; kh&ocirc;ng giặt nhiệt độ qu&aacute; n&oacute;ng.</p>\r\n\r\n<p>+ C&oacute; thể giặt bằng m&aacute;y, c&oacute; thể sấy</p>\r\n\r\n<p>+ Tr&aacute;nh d&ugrave;ng thuốc tẩy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o polo nam, &aacute;o polo old sailor, &aacute;o polo the big size, &aacute;o polo for man, &aacute;o polo đi l&agrave;m, &aacute;o polo đi chơi, &aacute;o polo nam H&agrave;n Quốc, &aacute;o polo nam đẹp, &aacute;o polo nam form rộng, &aacute;o polo nam form rộng, &Aacute;o polo nam bigize, &aacute;o polo old sailor bigsize, &aacute;o polo the big size, &aacute;o polo for man big size, &aacute;o polo đi l&agrave;m big size, &aacute;o polo đi chơi big size, &aacute;o polo nam H&agrave;n Quốc big size, &aacute;o polo nam đẹp big size, &aacute;o polo nam form rộng big size, &aacute;o polo nam form rộng big size</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>', 8, 234000, 195000, '/storage/uploads/2022/07/01/AP0108__12__thumb.jpg', 'ao-phong-reluar-23', 1, '2022-06-30 18:45:06', '2022-07-11 08:51:37'),
(40, 'Thắt Lưng cao cấp 24', '', '', 12, 200000, 180000, '/storage/uploads/2022/07/01/DL0064__2__thumb.jpg', 'that-lung-cao-cap31', 1, '2022-06-30 18:45:41', '2022-06-30 18:45:41'),
(41, 'Quần Âu Nam 02225', '', '', 11, 390000, 360000, '/storage/uploads/2022/07/01/QA1730__2__thumb.jpg', 'quan-au-nam-02225', 1, '2022-06-30 18:48:54', '2022-07-03 06:13:47'),
(42, 'quần nam check', '', '', 10, 360000, 300000, '/storage/uploads/2022/07/10/PL0105__6__thumb.jpg', 'quan-nam-check', 1, '2022-07-10 08:49:31', '2022-07-13 07:08:03'),
(43, 'Thắt Lưng cao cấp 016', 'Thắt Lưng cao cấp 016', '<p>Thắt Lưng cao cấp 016</p>', 12, 0, 0, '/storage/uploads/2022/07/15/dsc07785.jpg', 'that-lung-cao-cap-016', 1, '2022-07-15 10:54:33', '2022-07-15 10:54:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Slider số 1', '#', '/storage/uploads/2022/06/22/Bia_web.png', 1, 1, '2022-06-21 23:18:59', '2022-06-21 23:25:45'),
(2, 'Slider số 2', '#', '/storage/uploads/2022/06/22/atino.png', 2, 1, '2022-06-21 23:19:31', '2022-06-21 23:25:55'),
(3, 'Slider số 3', '#', '/storage/uploads/2022/06/22/Cover_facebook_3.png', 3, 1, '2022-06-21 23:19:51', '2022-06-21 23:26:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost.com', NULL, '$2y$10$uYs56U9XAfAybG9hBpXQy.ToAeiLGWmaCdQstGrADO5RB68VjdE82', 'AYVPabzjdFwkw9Lcx5PCxr6qime4mT4ZVcD0HwBDnrNFkuIvqTH2ORm1yQ7j', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_menu_id_foreign` (`menu_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
