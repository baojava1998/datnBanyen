-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2020 lúc 11:30 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datnbanyen1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hdon`
--

CREATE TABLE `chitiet_hdon` (
  `id` int(10) UNSIGNED NOT NULL,
  `idHoaDon` int(10) UNSIGNED NOT NULL,
  `idChiTiet_Sp` int(10) UNSIGNED NOT NULL,
  `SoLuong` int(10) UNSIGNED NOT NULL,
  `Gia` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_sp`
--

CREATE TABLE `chitiet_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TomTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idSanPham` int(10) UNSIGNED NOT NULL,
  `Gia` double NOT NULL,
  `KhuyenMai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_sp`
--

INSERT INTO `chitiet_sp` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `idSanPham`, `Gia`, `KhuyenMai`, `created_at`, `updated_at`) VALUES
(1, 'a', NULL, 'a', 'a', 1, 100, 1, NULL, NULL),
(2, 'Yến xào best', 'yen-xao-best', '<p>Yến xào best</p>', '<p>Yến xào best</p>', 1, 555555555, NULL, '2020-11-12 03:38:17', '2020-11-12 03:38:17'),
(5, 'aaaa', 'aaaa', '<p>sssss</p>', '<p>qqqqqq</p>', 1, 111111, NULL, '2020-11-12 20:47:33', '2020-11-12 20:47:33'),
(6, 'yến sàoooooo bâ', 'yen-saoooooo-ba', '<p>yến sàoooooo bâ</p>', '<p>yến sàoooooo bâ</p>', 6, 555555555555, NULL, '2020-11-12 21:41:13', '2020-11-12 21:41:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idChiTiet_Sp` int(10) UNSIGNED NOT NULL,
  `NoiDung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `idSanPham` int(10) UNSIGNED NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh`
--

INSERT INTO `hinh` (`id`, `idSanPham`, `Hinh`, `created_at`, `updated_at`) VALUES
(47, 1, 'imga.jpg', '2020-11-12 03:23:21', '2020-11-12 03:23:21'),
(50, 1, '1601193933610.jpg', '2020-11-12 03:45:00', '2020-11-12 03:45:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_KhachHang` int(10) UNSIGNED NOT NULL,
  `Tong` double NOT NULL,
  `ThanhToan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sanpham`
--

CREATE TABLE `loai_sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sanpham`
--

INSERT INTO `loai_sanpham` (`id`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 'Yến Sào', 'yen-sao', NULL, '2020-11-03 21:26:23'),
(2, 'Nước yến', 'nuoc-yen', NULL, '2020-11-03 20:22:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_09_021546_Tao_TheLoai', 2),
('2016_06_09_021610_Tao_LoaiTin', 3),
('2016_06_09_021813_Tao_TinTuc', 4),
('2016_06_09_022526_Tao_Slide', 5),
('2016_06_09_022904_Tao_Comment', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idLoaiSanPham` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `Ten`, `TenKhongDau`, `idLoaiSanPham`, `created_at`, `updated_at`) VALUES
(1, 'Yến sào Đà Nẵng', 'yen sao da nang', 1, NULL, NULL),
(6, 'Tổ Yến chưng đường phèn', 'to-yen-chung-duong-phen', 2, '2020-11-10 19:56:13', '2020-11-10 19:56:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `Ten`, `Hinh`, `NoiDung`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Slide 1-1', 'SACj_bg-404.jpg', '<p>Nội dung</p>', 'google.com', '2020-08-05 17:00:00', '2020-08-15 07:58:43'),
(4, 'slide2', 'eAGr_2.jpg', '<p>abc</p>', 'facebook.com', '2020-08-15 07:54:50', '2020-08-15 07:56:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Đức Phú', 'phubui2702@gmail.com', 1, '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', 'NJlABAo3Mgw7qFqo18kxSDVE7vmVVdQQXL5CbdTERpfLeTq3Dg0MNTAUArCH', '2016-06-09 03:05:09', '2016-06-18 07:06:27'),
(2, 'User_2', 'phubui2703@gmail.com', 0, '$2y$10$VSYdTPHgu6iQ0NBouPmQTe2nxENOouLMEcjQiG54cFNlUbEInurxC', NULL, '2016-06-09 03:05:09', NULL),
(3, 'User_3', 'user_3@mymail.com', 0, '$2y$10$DES3NL8tozlU99dvO9o4lOfYyYcaM9n86gJcJV5.fz2G8b6qLa6Gq', NULL, '2016-06-09 03:05:09', NULL),
(4, 'User_4', 'user_4@mymail.com', 0, '$2y$10$xqfx9motmrCAEuEjCyQroOo/eFqum1hPhgwnz5LSLkhdyGHvf6l8O', NULL, '2016-06-09 03:05:10', NULL),
(5, 'User_5', 'user_5@mymail.com', 0, '$2y$10$rTviORV94uWv/KcNK7s0UeGwlQ2DSN5UGSOAzMkZ6sGgfr9nE2fSq', NULL, '2016-06-09 03:05:10', NULL),
(6, 'User_6', 'user_6@mymail.com', 0, '$2y$10$AwcqOIqwnPM9ZkYE1e6x.OkQAjY5V7H.WP73VVod/2mGNp1Y0zWUy', NULL, '2016-06-09 03:05:10', NULL),
(7, 'User_7', 'user_7@mymail.com', 0, '$2y$10$nSJhdDCm7zfF5uZpkhEuQufsLAqc1OZZnTME4AcTIx/2PsnnbrpZ6', NULL, '2016-06-09 03:05:10', NULL),
(8, 'User_8', 'user_8@mymail.com', 0, '$2y$10$s1ik567.aaB/ZbykP5zBR.20Ps5Qd6EPkhHFGdSQwERYmX1G/CnEK', NULL, '2016-06-09 03:05:10', NULL),
(9, 'User_9', 'user_9@mymail.com', 0, '$2y$10$/GQdzMM1G0CsrEF7RnQy4eHCkO2SqTNbE6QyRXCBtOuvyqIaFoMnm', NULL, '2016-06-09 03:05:10', NULL),
(16, 'Huỳnh Duy Bảo', 'baojava1998@gmail.com', 1, '$2y$10$RCyPeqZpMJFZl4.vVj..B.sE7TUSjv8I0dkECaNZndsOaJbYnV/J6', NULL, '2020-08-09 13:40:24', '2020-09-08 07:21:34'),
(17, 'Phan Duy Hiếu', 'min@gmail.com', 1, '$2y$10$qbTW6GR7iqH4XSX1zQVAJeBUEEmOLte.qVY2hiPk80tKz5PUh3FSC', NULL, '2020-08-13 12:02:50', '2020-08-13 12:02:50'),
(18, 'baopro', 'baopro@gmail.com', 0, '$2y$10$LbXdhq4LP1R.YWY8LHOBSuCBi1w/UBLXpaD2AKXh7yIl4kEvuE/xa', NULL, '2020-08-17 09:25:48', '2020-08-17 09:25:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_hdon`
--
ALTER TABLE `chitiet_hdon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idChiTiet_Sp` (`idChiTiet_Sp`),
  ADD KEY `idHoaDon` (`idHoaDon`);

--
-- Chỉ mục cho bảng `chitiet_sp`
--
ALTER TABLE `chitiet_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD KEY `idChiTiet_Sp` (`idChiTiet_Sp`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoaiSanPham` (`idLoaiSanPham`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
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
-- AUTO_INCREMENT cho bảng `chitiet_hdon`
--
ALTER TABLE `chitiet_hdon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_sp`
--
ALTER TABLE `chitiet_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_hdon`
--
ALTER TABLE `chitiet_hdon`
  ADD CONSTRAINT `chitiet_hdon_ibfk_1` FOREIGN KEY (`idHoaDon`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `chitiet_hdon_ibfk_2` FOREIGN KEY (`idChiTiet_Sp`) REFERENCES `chitiet_sp` (`id`);

--
-- Các ràng buộc cho bảng `chitiet_sp`
--
ALTER TABLE `chitiet_sp`
  ADD CONSTRAINT `chitiet_sp_ibfk_1` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idChiTiet_Sp`) REFERENCES `chitiet_sp` (`id`);

--
-- Các ràng buộc cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD CONSTRAINT `hinh_ibfk_1` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaiSanPham`) REFERENCES `loai_sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
