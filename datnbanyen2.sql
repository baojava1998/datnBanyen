-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2020 lúc 03:26 AM
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
  `TomTat` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
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
(22, 'HỒNG YẾN LÀM SẠCH HỘP 100GAM ( CÓ HỘP QUÀ)', 'hong-yen-lam-sach-hop-100gam-co-hop-qua-', '<p>Trọng lượng: 100g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline: <span style=\"font-size:16px\"><strong>0373504938</strong></span></p>', '<p>&nbsp;Hồng Yến làm sạch hộp 100g tại cửa hàng&nbsp;<strong>Đỗ Bảo Vy&nbsp;</strong>của chúng tôi là sản phẩm có nguồn gốc từ yến nuôi trong nhà tại Khánh Hòa. Hồng yến có màu vàng nhạt và thay đổi từ màu vàng quả quýt đến màu lòng đỏ trứng gà. So với Bạch Yến thì Hồng Yến có giá cao hơn nhiều.</p>\r\n\r\n<p>Hồng Yến làm sạch hộp 100g giữ nguyên được màu sắc, hương vị và hình dáng ban đầu. Theo đó, thành phần của sản phẩm bao gồm nhiều khoáng chất, vi lượng, Protein…</p>\r\n\r\n<p><span style=\"color:rgb(128, 0, 0); font-size:14pt\">❂&nbsp;<strong>Cách chế biến yến sào thông dụng</strong></span></p>\r\n\r\n<p>Yến sào có thể chế biến theo nhiều phương pháp khác nhau nhưng để đảm bảo dưỡng chất và hương vị thì yến chưng được đánh giá cao nhất. Đối với các món ăn khác có sử dụng yến sào, người tiêu dùng cũng nên chưng yến trước rồi thêm vào sau khi món ăn đã hoàn thành. Dưới đây là phương pháp chưng yến khoa học và đảm bảo:</p>\r\n\r\n<p><strong>➢&nbsp;Dùng nồi chưng yến chuyên dụng:</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cân tổ yến và ngâm tổ yến trong nước tinh khiết sao cho ngập hết tổ trong 1 giờ.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Khi tổ yến mềm và tách ra vớt ra rá dầy để ráo nước.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Sử dụng nồi chưng yến cho nước ngập mức tiêu chuẩn và đặt bát đựng yến vào.</p>\r\n\r\n<p>✧&nbsp;Bước 4: Dùng nước tinh khiết đổ vào bát đựng yến sao cho ngập hết tổ yến.</p>\r\n\r\n<p>✧&nbsp;Bước 5: Chọn thời gian chưng từ 45 phút – 1 giờ. Chưng khoảng 40 phút nước bắt đầu sôi, đợi thêm 25 phút là yến chín. Trước khi lấy yến ra kh oảng 5 phút thì cho đường phèn vào nồi trộn đều</p>\r\n\r\n<p><strong>➢&nbsp;Dùng bếp ga và chảo</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cho yến đã làm sạch vào bát, thêm đường phèn trộn đều lên và nước đủ ăn.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Bắc nồi, chảo chưng lên bếp, đặt chén yến vào đổ nước ngập 1/3 chén yến.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Đậy nắp nồi, chảo đun lửa to đến khi sôi thì nhỏ lửa chưng thêm 25-30 phút là có thể dùng được.</p>', 12, 4300000, NULL, '2020-11-17 01:01:42', '2020-11-17 01:01:42'),
(23, 'YẾN SÀO KHÁNH HÒA LÀM SẠCH HỘP 100G LOẠI 1 (CÓ HỘP QUÀ)', 'yen-sao-khanh-hoa-lam-sach-hop-100g-loai-1-co-hop-qua-', '<p>Trọng lượng: 100g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline: <span style=\"font-size:16px\"><strong>0373504938</strong></span></p>', '<p>➢ Tổ Yến Khánh Hòa làm sạch hộp 100g loại 1 tại cửa hàng&nbsp;<strong>Đỗ Bảo Vy&nbsp;</strong>của chúng tôi là sản phẩm có nguồn gốc từ yến nuôi trong nhà tại Khánh Hòa. Đây là loại tổ yến nuôi có vẻ ngoài bắt mắt, với các sợi yến nhỏ, sợi dài xếp đều nhau. Thích hợp làm quà biếu tặng.</p>\r\n\r\n<p>Tổ Yến Sào Khánh Hòa làm sạch hộp 100g loại 1 giữ nguyên được màu sắc, hương vị và hình dáng ban đầu. Theo đó, thành phần của sản phẩm bao gồm nhiều khoáng chất, vi lượng, Protein…</p>\r\n\r\n<p><span style=\"color:rgb(128, 0, 0); font-size:14pt\">❂&nbsp;<strong>Cách chế biến yến sào thông dụng</strong></span></p>\r\n\r\n<p>Yến sào có thể chế biến theo nhiều phương pháp khác nhau nhưng để đảm bảo dưỡng chất và hương vị thì yến chưng được đánh giá cao nhất. Đối với các món ăn khác có sử dụng yến sào, người tiêu dùng cũng nên chưng yến trước rồi thêm vào sau khi món ăn đã hoàn thành. Dưới đây là phương pháp chưng yến khoa học và đảm bảo:</p>\r\n\r\n<p><strong>➢&nbsp;Dùng nồi chưng yến chuyên dụng:</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cân tổ yến và ngâm tổ yến trong nước tinh khiết sao cho ngập hết tổ trong 1 giờ.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Khi tổ yến mềm và tách ra vớt ra rá dầy để ráo nước.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Sử dụng nồi chưng yến cho nước ngập mức tiêu chuẩn và đặt bát đựng yến vào.</p>\r\n\r\n<p>✧&nbsp;Bước 4: Dùng nước tinh khiết đổ vào bát đựng yến sao cho ngập hết tổ yến.</p>\r\n\r\n<p>✧&nbsp;Bước 5: Chọn thời gian chưng từ 45 phút – 1 giờ. Chưng khoảng 40 phút nước bắt đầu sôi, đợi thêm 25 phút là yến chín. Trước khi lấy yến ra kh oảng 5 phút thì cho đường phèn vào nồi trộn đều</p>\r\n\r\n<p><strong>➢&nbsp;Dùng bếp ga và chảo</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cho yến đã làm sạch vào bát, thêm đường phèn trộn đều lên và nước đủ ăn.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Bắc nồi, chảo chưng lên bếp, đặt chén yến vào đổ nước ngập 1/3 chén yến.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Đậy nắp nồi, chảo đun lửa to đến khi sôi thì nhỏ lửa chưng thêm 25-30 phút là có thể dùng được.</p>', 13, 3800000, 20, '2020-11-17 02:05:22', '2020-11-17 02:05:22'),
(24, 'YẾN SÀO KHÁNH HÒA CHÂN YẾN LÀM SẠCH HỘP 100G', 'yen-sao-khanh-hoa-chan-yen-lam-sach-hop-100g', '<p>Trọng lượng: 100g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373504938</strong></span></p>', '<p>➢ Chân yến làm sạch hộp 100g tại cửa hàng&nbsp;<strong>Đỗ Bảo Vy&nbsp;</strong>của chúng tôi là sản phẩm có nguồn gốc từ yến nuôi trong nhà tại Khánh Hòa. Đây là phần chắc chắn nhất của tổ yến, được chim yến “dày công” tạo dựng trong quá trình làm tổ vì chân yến phải chắc và vững chãi thì tổ yến mới có thể tồn tại được.</p>\r\n\r\n<p>Chân yến làm sạch hộp 100g giữ nguyên được màu sắc, hương vị và hình dáng ban đầu. Theo đó, thành phần của sản phẩm bao gồm nhiều khoáng chất, vi lượng, Protein…</p>\r\n\r\n<p><span style=\"color:rgb(128, 0, 0); font-size:14pt\">❂&nbsp;<strong>Cách chế biến yến sào thông dụng</strong></span></p>\r\n\r\n<p>Yến sào có thể chế biến theo nhiều phương pháp khác nhau nhưng để đảm bảo dưỡng chất và hương vị thì yến chưng được đánh giá cao nhất. Đối với các món ăn khác có sử dụng yến sào, người tiêu dùng cũng nên chưng yến trước rồi thêm vào sau khi món ăn đã hoàn thành. Dưới đây là phương pháp chưng yến khoa học và đảm bảo:</p>\r\n\r\n<p><strong>➢&nbsp;Dùng nồi chưng yến chuyên dụng:</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cân tổ yến và ngâm tổ yến trong nước tinh khiết sao cho ngập hết tổ trong 1 giờ.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Khi tổ yến mềm và tách ra vớt ra rá dầy để ráo nước.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Sử dụng nồi chưng yến cho nước ngập mức tiêu chuẩn và đặt bát đựng yến vào.</p>\r\n\r\n<p>✧&nbsp;Bước 4: Dùng nước tinh khiết đổ vào bát đựng yến sao cho ngập hết tổ yến.</p>\r\n\r\n<p>✧&nbsp;Bước 5: Chọn thời gian chưng từ 45 phút – 1 giờ. Chưng khoảng 40 phút nước bắt đầu sôi, đợi thêm 25 phút là yến chín. Trước khi lấy yến ra kh oảng 5 phút thì cho đường phèn vào nồi trộn đều</p>\r\n\r\n<p><strong>➢&nbsp;Dùng bếp ga và chảo</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cho yến đã làm sạch vào bát, thêm đường phèn trộn đều lên và nước đủ ăn.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Bắc nồi, chảo chưng lên bếp, đặt chén yến vào đổ nước ngập 1/3 chén yến.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Đậy nắp nồi, chảo đun lửa to đến khi sôi thì nhỏ lửa chưng thêm 25-30 phút là có thể dùng được.</p>', 14, 3600000, 10, '2020-11-17 02:18:23', '2020-11-17 02:18:23'),
(25, 'YẾN SÀO KHÁNH HÒA CHÂN YẾN THÔ HỘP 100G', 'yen-sao-khanh-hoa-chan-yen-tho-hop-100g', '<p>Trọng lượng: 100g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373504938</strong></span></p>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div class=\"giasp\" style=\"box-sizing: border-box; line-height: 24px; overflow: hidden; font-family: Roboto, sans-serif; font-size: 14px;\">&nbsp;</div>', '<p>➢ Chân yến Thô hộp 100g tại cửa hàng&nbsp;<strong>Đỗ Bảo Vy&nbsp;</strong>của chúng tôi là sản phẩm có nguồn gốc từ yến nuôi trong nhà tại Khánh Hòa. Đây là phần chắc chắn nhất của tổ yến, được chim yến “dày công” tạo dựng trong quá trình làm tổ vì chân yến phải chắc và vững chãi thì tổ yến mới có thể tồn tại được.</p>\r\n\r\n<p>Chân yến Thô hộp 100g giữ nguyên được màu sắc, hương vị và hình dáng ban đầu. Theo đó, thành phần của sản phẩm bao gồm nhiều khoáng chất, vi lượng, Protein…</p>\r\n\r\n<p><span style=\"color:rgb(128, 0, 0); font-size:14pt\">❂&nbsp;<strong>Cách chế biến yến sào thông dụng</strong></span></p>\r\n\r\n<p>Yến sào có thể chế biến theo nhiều phương pháp khác nhau nhưng để đảm bảo dưỡng chất và hương vị thì yến chưng được đánh giá cao nhất. Đối với các món ăn khác có sử dụng yến sào, người tiêu dùng cũng nên chưng yến trước rồi thêm vào sau khi món ăn đã hoàn thành. Dưới đây là phương pháp chưng yến khoa học và đảm bảo:</p>\r\n\r\n<p><strong>➢&nbsp;Dùng nồi chưng yến chuyên dụng:</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cân tổ yến và ngâm tổ yến trong nước tinh khiết sao cho ngập hết tổ trong 1 giờ.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Khi tổ yến mềm và tách ra vớt ra rá dầy để ráo nước.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Sử dụng nồi chưng yến cho nước ngập mức tiêu chuẩn và đặt bát đựng yến vào.</p>\r\n\r\n<p>✧&nbsp;Bước 4: Dùng nước tinh khiết đổ vào bát đựng yến sao cho ngập hết tổ yến.</p>\r\n\r\n<p>✧&nbsp;Bước 5: Chọn thời gian chưng từ 45 phút – 1 giờ. Chưng khoảng 40 phút nước bắt đầu sôi, đợi thêm 25 phút là yến chín. Trước khi lấy yến ra kh oảng 5 phút thì cho đường phèn vào nồi trộn đều</p>\r\n\r\n<p><strong>➢&nbsp;Dùng bếp ga và chảo</strong></p>\r\n\r\n<p>✧&nbsp;Bước 1: Cho yến đã làm sạch vào bát, thêm đường phèn trộn đều lên và nước đủ ăn.</p>\r\n\r\n<p>✧&nbsp;Bước 2: Bắc nồi, chảo chưng lên bếp, đặt chén yến vào đổ nước ngập 1/3 chén yến.</p>\r\n\r\n<p>✧&nbsp;Bước 3: Đậy nắp nồi, chảo đun lửa to đến khi sôi thì nhỏ lửa chưng thêm 25-30 phút là có thể dùng được.</p>', 15, 3300000, NULL, '2020-11-17 02:20:37', '2020-11-17 02:20:37'),
(26, 'Nước Yến Sào Sanest Nhân Sâm Fucoidan Khánh Hòa', 'nuoc-yen-sao-sanest-nhan-sam-fucoidan-khanh-hoa', '<p>Trọng lượng: 100g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373504938</strong></span></p>', '<p>Nước Yến Sào Sanest Nhân Sâm Fucoidan Khánh Hòa&nbsp;là sản phẩm được chế biến từ nguồn Yến sào đảo thiên nhiên và giữ nguyên tính năng của Yến sào đảo thiên nhiên, Công ty Yến sào Khánh Hòa chế biến từ nguồn Yến sào đảo thiên nhiên trực tiếp khai thác tại các đảo Yến Khánh Hòa, và được chế biến theo phương pháp cổ truyền kết hợp với khoa học công nghệ hiện đại trên dây chuyền thiết bị kỹ thuật tiên tiến của Châu Âu.</p>\r\n\r\n<p>Tổ yến được hình thành từ nước bọt của loài chim yến, phân bố nhiều ở vùng biển Nam Trung Bộ. Nhiều nhất là ở Nha Trang Khánh Hòa, đây cũng là nơi cho yến với chất lượng tổ tốt nhất, nhiều thành phần dinh dưỡng, là yến tự nhiên đảm bảo chất lượng. Yến sào là nguồn tài nguyên thiên nhiên quý hiếm, từng dùng trong các buổi Yến tiệc thời phong kiến.</p>\r\n\r\n<h2>Chứng Nhận Chất Lượng Nước Yến Sào Sanest.</h2>\r\n\r\n<p>Do các giá trị dinh dưỡng mà nước yến sanest callagen Khánh Hòa mang lại rất cao cho con người. Do đó, được nhà nước công nhận là thương hiệu nổi tiếng của Việt Nam. Sản phẩm còn được chính người tiêu dùng bình chọn tốt nhất hiện nay. Chúng tôi khẳng định rằng giá trị nước yến và các giấy chứng nhận hoàn toàn minh bạch và đúng sự thật.</p>\r\n\r\n<p>Sản phẩm nước yến Sanest đã đạt được các chứng nhận về tiêu chuẩn về chất lượng, tiêu chuẩn về hệ thống quản lý tiên tiến về môi trường:</p>\r\n\r\n<p>Chứng nhận tiêu chuẩn ISO 9001:2008</p>\r\n\r\n<p>Chứng nhận tiêu chuẩn chất lượng 14001:2004</p>\r\n\r\n<p>Chứng nhận tiêu chuẩn HACCP</p>\r\n\r\n<p>Tiêu chuẩn chất lượng mã số : 31/2013/YTKH-TNCB</p>\r\n\r\n<p>Tiêu chuẩn cơ sở số : 01/2012/TCCS.</p>', 16, 130000, 5, '2020-11-17 02:42:59', '2020-11-17 02:42:59'),
(28, 'Nước Yến Tươi Chưng Hạt Sen', 'nuoc-yen-tuoi-chung-hat-sen', '<p>Trọng lượng: 80g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373504938</strong></span></p>', '<p>Nước Yến được chưng sẵn thủ công tại nhà theo yêu cầu của khách hàng, khách hàng có thể chọn vị theo yêu cầu. Yến hũ chưng làm của&nbsp;<a href=\"https://vuayen.vn/\" style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: rgb(40, 40, 40); text-decoration-line: none;\">vuayen.vn</a>&nbsp;bảo đảm quy trình sạch và tốt cho sức khỏe của mọi người!</p>\r\n\r\n<ul>\r\n	<li>Chưng bằng phương pháp cách thủy thủ công, giữ được độ mềm dẻo nguyên hương vị của tổ yến.</li>\r\n	<li>Tổ yến tươi nguyên chất, nói không với yến giả, mủ chôm, yến được lấy từ Khánh Hòa.</li>\r\n	<li>Cam Kết không chất bảo quản, chất tạo mùi, chất phụ gia.</li>\r\n	<li>Chế biến theo yêu cầu của khách hàng.</li>\r\n</ul>\r\n\r\n<h2>Thành Phần Nước Yến Tươi Chưng Hạt Sen.</h2>\r\n\r\n<p>Tổ yến tươi nguyên chất.</p>\r\n\r\n<p>Hạt Sen, nước tinh khiết, đường phèn,</p>\r\n\r\n<p>Không phụ gia, không chất bảo quản</p>\r\n\r\n<p>Hạt sen chứa nhiều gluxit, lipit, canxi, photpho và các vitamin…100g sen tươi cung cấp tới 162g calo, 30g gluxit, 9,5g protit và hàng loạt các vitamin nhóm A, C,…&nbsp; tôt cho bà bầu và thai nhi.</p>\r\n\r\n<h2>Cách Dùng Nước Yến Tươi Chưng Hạt Sen.</h2>\r\n\r\n<p>Cho bé dùng 1 lọ Nước Yến Chưng Đường Phèn vào lúc sáng sớm trước khi ăn bụng còn đói, buổi tối hoặc giữa các buổi. Lưu ý là dùng lúc bụng đói để cơ thể hấp thu các chất dinh dưỡng có trong tổ yến một cách tốt nhất.</p>\r\n\r\n<p>Trẻ em từ 1-5 tuồi nên dùng 1 hũ/ngày, người trưởng thành nên dùng 1-2 hũ/ngày (dùng liên tục hàng ngày để có hiệu quả tốt nhất). Trẻ em dưới 1 tuổi nên lấy thìa và dùng nước yến chỉ chưng không đường.</p>', 19, 100000, 10, '2020-11-17 02:59:10', '2020-11-17 02:59:10'),
(29, 'Nước Yến Chưng Nhụy Hoa Nghệ Tây Saffron', 'nuoc-yen-chung-nhuy-hoa-nghe-tay-saffron', '<p>Trọng lượng: 200g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373504938</strong></span></p>', '<p>Nước Yến được chưng sẵn thủ công tại nhà theo yêu cầu của khách hàng, khách hàng có thể chọn vị theo yêu cầu. Yến hũ chưng làm của&nbsp;<a href=\"https://vuayen.vn/\" style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: rgb(40, 40, 40); text-decoration-line: none;\">vuayen.vn</a>&nbsp;bảo đảm quy trình sạch và tốt cho sức khỏe của mọi người!</p>\r\n\r\n<p>Chưng bằng phương pháp cách thủy thủ công, giữ được độ mềm dẻo nguyên hương vị của tổ yến.</p>\r\n\r\n<p>Tổ yến tươi nguyên chất, nói không với yến giả, mủ chôm, yến được lấy từ Khánh Hòa.</p>\r\n\r\n<p>Cam Kết không chất bảo quản, chất tạo mùi, chất phụ gia.</p>\r\n\r\n<p>Chế biến theo yêu cầu của khách hàng.</p>\r\n\r\n<p>Đóng hũ thủy tinh uống trong 1 lần.</p>\r\n\r\n<h2>Thành Phần Nước Yến Chưng Nhụy Hoa Nghệ Tây Saffron.</h2>\r\n\r\n<p>Tổ yến tươi nguyên chất.</p>\r\n\r\n<p>Nước tinh khiết, đường phèn, Hoa Nghệ Tây Saffron.</p>\r\n\r\n<p>Không phụ gia, không chất bảo quản.</p>\r\n\r\n<p>Hoa Nghệ Tây Saffron được coi là loại thảo dược quý giá có nhiều tác dụng với sức khỏe và chăm sóc làm đẹp. Có nhiều quốc gia trồng nghệ tây nhưng nhiều nhất và chiếm đến 80% sản lượng trên thế giới là Iran. Nhụy hoa nghệ tây chính là “vàng đỏ” của Iran bởi giá trị kinh tế mà nó mang lại cho đất nước này..</p>\r\n\r\n<p>Nhụy Hoa Nghệ Tây Saffron Chứa các tinh chất crocin, crocetin, picrocrotin và safranal,Hợp chất cấu thành của hoa nghệ tây như flavonoids, tannins, anthocyanins, alkaloids và saponins…</p>\r\n\r\n<h2>Cách Dùng Nước Yến Chưng Nhụy Hoa Nghệ Tây Saffron.</h2>\r\n\r\n<p>Cho bé dùng 1 lọ Nước Yến Chưng Hoa Nghệ Tây Saffron vào lúc sáng sớm trước khi ăn bụng còn đói, buổi tối hoặc giữa các buổi. Lưu ý là dùng lúc bụng đói để cơ thể hấp thu các chất dinh dưỡng có trong tổ yến một cách tốt nhất.</p>\r\n\r\n<p>Trẻ em từ 1-5 tuồi nên dùng 1 hũ/ngày, người trưởng thành nên dùng 1-2 hũ/ngày (dùng liên tục hàng ngày để có hiệu quả tốt nhất). Trẻ em dưới 1 tuổi nên lấy thìa và dùng nước yến chỉ chưng không đường.</p>\r\n\r\n<p>Ngon hơn thì uống lạnh.</p>\r\n\r\n<p>Lắc đều trước khi uống.</p>\r\n\r\n<p>Ngon hơn khi uống nước yến lạnh.</p>\r\n\r\n<p>Để nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp.</p>', 20, 140000, NULL, '2020-11-17 03:04:35', '2020-11-17 03:04:35'),
(30, 'Nước Yến Chưng Hạt Chia', 'nuoc-yen-chung-hat-chia', '<p>Trọng lượng: 150g</p>\r\n\r\n<p><strong>Ưu đãi và quà tặng khuyến mãi:</strong></p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 14px;\">\r\n<p>– Giảm 200.000 đồng/hộp khi mua &gt; 5 hộp 100g</p>\r\n\r\n<div class=\"content\" style=\"box-sizing: border-box;\">\r\n<p>– Tặng đường phèn</p>\r\n\r\n<p>– Hoàn tiền 200% nếu phát hiện hàng giả</p>\r\n\r\n<p>– Miễn phí vận chuyển trên toàn quốc</p>\r\n</div>\r\n</div>\r\n\r\n<p>Bảng giá chi tiết và các phân biệt từng sản phẩm yến sào khánh hòa.</p>\r\n\r\n<p>Cần tư vấn thêm vui lòng gọi hotline:&nbsp;<span style=\"font-size:12pt\"><strong>0373804938</strong></span></p>', '<p>Nước Yến được chưng sẵn thủ công tại nhà theo yêu cầu của khách hàng, khách hàng có thể chọn vị theo yêu cầu. Yến hũ chưng làm của&nbsp;<a href=\"https://vuayen.vn/\" style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: rgb(40, 40, 40); text-decoration-line: none;\">vuayen.vn</a>&nbsp;bảo đảm quy trình sạch và tốt cho sức khỏe của mọi người!</p>\r\n\r\n<p>Chưng bằng phương pháp cách thủy thủ công, giữ được độ mềm dẻo nguyên hương vị của tổ yến.</p>\r\n\r\n<p>Tổ yến tươi nguyên chất, nói không với yến giả, mủ chôm, yến được lấy từ Khánh Hòa.</p>\r\n\r\n<p>Cam Kết không chất bảo quản, chất tạo mùi, chất phụ gia.</p>\r\n\r\n<p>Chế biến theo yêu cầu của khách hàng.</p>\r\n\r\n<p>Đóng hũ thủy tinh uống trong 1 lần.</p>\r\n\r\n<h2>Thành Phần Nước Yến Chưng Hạt Chia.</h2>\r\n\r\n<p>Tổ yến tươi nguyên chất.</p>\r\n\r\n<p>Nước tinh khiết, đường phèn, hạt chia.</p>\r\n\r\n<p>Không phụ gia, không chất bảo quản.</p>\r\n\r\n<p>Hạt chia có chứa hàm lượng axit béo omega-3 khá cao, giàu chất xơ, cung cấp Vitamin B3 và vitamin B1, Khoáng chất selenium…cung cấp dưỡng chất và khoáng chất cần thiết cho cơ thể.</p>\r\n\r\n<h2>Cách Dùng Nước Yến Chưng Hạt Chia.</h2>\r\n\r\n<p>Cho bé dùng 1 lọ Nước Yến Chưng Hạt Chia vào lúc sáng sớm trước khi ăn bụng còn đói, buổi tối hoặc giữa các buổi. Lưu ý là dùng lúc bụng đói để cơ thể hấp thu các chất dinh dưỡng có trong tổ yến một cách tốt nhất.</p>\r\n\r\n<p>Trẻ em từ 1-5 tuồi nên dùng 1 hũ/ngày, người trưởng thành nên dùng 1-2 hũ/ngày (dùng liên tục hàng ngày để có hiệu quả tốt nhất). Trẻ em dưới 1 tuổi nên lấy thìa và dùng nước yến chỉ chưng không đường.</p>\r\n\r\n<p>Ngon hơn thì uống lạnh.</p>\r\n\r\n<p>Lắc đều trước khi uống.</p>\r\n\r\n<p>Ngon hơn khi uống nước yến lạnh.</p>\r\n\r\n<p>Để nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp.</p>', 21, 402000, 10, '2020-11-17 03:07:49', '2020-11-17 03:07:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idChiTiet_Sp` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idChiTiet_Sp`, `NoiDung`, `created_at`, `updated_at`) VALUES
(1, 16, 22, 'ngon quá ngon', NULL, NULL),
(2, 17, 22, 'quá ngon đi', NULL, NULL),
(3, 18, 30, 'oke ngon', NULL, NULL);

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
(124, 12, 'hong-yen-tinh-che-4.jpg', '2020-11-17 02:08:56', '2020-11-17 02:08:56'),
(125, 12, 'hong-yen-tinh-che-3.jpg', '2020-11-17 02:08:56', '2020-11-17 02:08:56'),
(126, 12, 'hong-yen-tinh-che-2.jpg', '2020-11-17 02:08:56', '2020-11-17 02:08:56'),
(127, 13, '6.jpg', '2020-11-17 02:09:50', '2020-11-17 02:09:50'),
(128, 13, '8.jpg', '2020-11-17 02:09:50', '2020-11-17 02:09:50'),
(129, 13, '3.jpg', '2020-11-17 02:09:51', '2020-11-17 02:09:51'),
(130, 14, 'chan-yen-tinh-che-3.jpg', '2020-11-17 02:18:22', '2020-11-17 02:18:22'),
(131, 14, 'chan-yen-tinh-che-2.jpg', '2020-11-17 02:18:22', '2020-11-17 02:18:22'),
(132, 14, 'chan-yen-tinh-che-1.jpg', '2020-11-17 02:18:22', '2020-11-17 02:18:22'),
(133, 15, 'chan-yen-tho-2-1.jpg', '2020-11-17 02:20:35', '2020-11-17 02:20:35'),
(134, 15, 'chan-bach-yen-tho-4.jpg', '2020-11-17 02:20:35', '2020-11-17 02:20:35'),
(135, 15, 'chan-yen-tho-1-1.jpg', '2020-11-17 02:20:35', '2020-11-17 02:20:35'),
(136, 16, 'Nước-Yến-Sào-Sanest-Nhân-Sâm-Fucoidan-2.jpg', '2020-11-17 02:42:58', '2020-11-17 02:42:58'),
(137, 16, 'Nước-Yến-Sào-Sanest-Nhân-Sâm-Fucoidan-1-1-600x404.png', '2020-11-17 02:42:58', '2020-11-17 02:42:58'),
(139, 16, 'Nước-Yến-Sào-Sanest-Nhân-Sâm-Fucoidan-.png', '2020-11-17 02:47:04', '2020-11-17 02:47:04'),
(141, 19, 'Nước-Yến-Tươi-Chưng-Hạt-Sen-4-600x400.jpg', '2020-11-17 02:59:09', '2020-11-17 02:59:09'),
(142, 19, 'Nước-Yến-Tươi-Chưng-Hạt-Sen-2-600x450.jpg', '2020-11-17 02:59:09', '2020-11-17 02:59:09'),
(143, 19, 'Nước-Yến-Tươi-Chưng-Hạt-Sen.jpg', '2020-11-17 02:59:09', '2020-11-17 02:59:09'),
(144, 20, 'Nước-Yến-Chưng-Hoa-Nghệ-Tây-Saffron-1-600x708.jpg', '2020-11-17 03:04:34', '2020-11-17 03:04:34'),
(145, 20, 'Nước-Yến-Chưng-Hoa-Nghệ-Tây-Saffron.jpg', '2020-11-17 03:04:34', '2020-11-17 03:04:34'),
(146, 20, 'yen-chung-saffron-mon-an-cho-suc-khoe-va-nhan-sac2-.jpg', '2020-11-17 03:04:34', '2020-11-17 03:04:34'),
(147, 21, 'Nước-Yến-Chưng-Hạt-Chia-3.png', '2020-11-17 03:07:44', '2020-11-17 03:07:44'),
(148, 21, '21077700_1953429561592621_5156536263609804340_n.jpg', '2020-11-17 03:07:44', '2020-11-17 03:07:44'),
(149, 21, 'Nước-Yến-Chưng-Lá-Dứa-Hạt-Chia-2.png', '2020-11-17 03:07:45', '2020-11-17 03:07:45');

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
(12, 'HỒNG YẾN LÀM SẠCH HỘP 100GAM ( CÓ HỘP QUÀ)', 'hong-yen-lam-sach-hop-100gam-co-hop-qua-', 1, '2020-11-17 00:53:56', '2020-11-17 00:53:56'),
(13, 'YẾN SÀO KHÁNH HÒA LÀM SẠCH HỘP 100G LOẠI 1 (CÓ HỘP QUÀ)', 'yen-sao-khanh-hoa-lam-sach-hop-100g-loai-1-co-hop-qua-', 1, '2020-11-17 02:04:02', '2020-11-17 02:04:02'),
(14, 'YẾN SÀO KHÁNH HÒA CHÂN YẾN LÀM SẠCH HỘP 100G', 'yen-sao-khanh-hoa-chan-yen-lam-sach-hop-100g', 1, '2020-11-17 02:15:48', '2020-11-17 02:15:48'),
(15, 'YẾN SÀO KHÁNH HÒA CHÂN YẾN THÔ HỘP 100G', 'yen-sao-khanh-hoa-chan-yen-tho-hop-100g', 1, '2020-11-17 02:19:16', '2020-11-17 02:19:16'),
(16, 'Nước Yến Sào Sanest Nhân Sâm Fucoidan Khánh Hòa', 'nuoc-yen-sao-sanest-nhan-sam-fucoidan-khanh-hoa', 2, '2020-11-17 02:39:32', '2020-11-17 02:39:32'),
(19, 'Nước Yến Tươi Chưng Hạt Sen', 'nuoc-yen-tuoi-chung-hat-sen', 2, '2020-11-17 02:55:45', '2020-11-17 02:55:45'),
(20, 'Nước Yến Chưng Nhụy Hoa Nghệ Tây Saffron', 'nuoc-yen-chung-nhuy-hoa-nghe-tay-saffron', 2, '2020-11-17 03:00:25', '2020-11-17 03:00:25'),
(21, 'Nước Yến Chưng Hạt Chia', 'nuoc-yen-chung-hat-chia', 2, '2020-11-17 03:05:35', '2020-11-17 03:05:35');

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
(6, 'baobtm', '46I8_2.jpg', '<p>baobtm1111</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -34px; top: 38.6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 'baobtm.com', '2020-11-16 21:39:51', '2020-11-16 22:00:09'),
(7, 'bán yến', 'TiIN_hero-1.jpg', '<p>bán yến</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -62px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 'baobanyen.com', '2020-11-16 21:51:38', '2020-11-16 21:51:38');

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
