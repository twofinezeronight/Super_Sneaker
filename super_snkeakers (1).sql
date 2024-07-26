-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2023 lúc 04:00 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `super_snkeakers`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hoten_nguoinhan` varchar(50) NOT NULL DEFAULT '0',
  `diachi_nguoinhan` varchar(50) NOT NULL DEFAULT '0',
  `dienthoai_nguoinhan` varchar(50) NOT NULL DEFAULT '0',
  `hoten_nguoidat` varchar(50) DEFAULT NULL,
  `diachi_nguoidat` varchar(50) DEFAULT NULL,
  `dienthoai_nguoidat` varchar(50) DEFAULT NULL,
  `email_nguoidat` varchar(50) DEFAULT NULL,
  `total` varchar(50) NOT NULL,
  `ship` varchar(50) NOT NULL DEFAULT '0',
  `voucher` varchar(50) NOT NULL DEFAULT '0',
  `pttt` varchar(50) NOT NULL,
  `total_payment` varchar(50) NOT NULL,
  `madh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `quantity` int(99) NOT NULL,
  `price` double(10,0) NOT NULL DEFAULT 0,
  `thanhtien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Air Force 1'),
(2, 'Air Jordan 1'),
(3, 'Air Max'),
(4, 'Dunk'),
(5, 'Cortez'),
(6, 'Blazer'),
(7, 'Pegasus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `ngaybl` varchar(50) NOT NULL,
  `noidung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `ngaybl`, `noidung`) VALUES
(8, 1, 13, '12:08:16 08/12/2023', 'sang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(10,0) NOT NULL DEFAULT 0,
  `img` varchar(200) NOT NULL,
  `view` int(11) NOT NULL,
  `new` tinyint(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `bestseller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_category`, `name`, `price`, `img`, `view`, `new`, `hot`, `bestseller`) VALUES
(1, 1, 'Nike Air Force 1 Wild', 4109000, 'cat1_sp1.jpg', 1, 0, 0, 0),
(2, 1, 'Nike Air Force 1 \'07', 2929000, 'cat1_sp2.jpg', 0, 0, 0, 1),
(3, 1, 'Nike Air Force 1 GTX', 4699000, 'cat1_sp3.jpg', 0, 1, 0, 0),
(4, 2, 'Air Jordan 1 Mid', 3669000, 'cat2_sp1.jpg', 0, 0, 0, 0),
(5, 2, 'Air Jordan 1 Low SE', 3669000, 'cat2_sp2.jpg', 0, 0, 0, 0),
(6, 2, 'Air Jordan 1', 5869000, 'cat2_sp3.jpg', 0, 1, 0, 0),
(7, 3, 'Nike Air Max Pulse Roam', 4699000, 'cat3_sp1.jpg', 1, 0, 0, 0),
(8, 3, 'Nike Air Max 90 GORE-TEX', 4669000, 'cat3_sp2.jpg', 0, 0, 1, 0),
(9, 3, 'Nike Air Max Furyosa NRG', 4669000, 'cat3_sp3.jpg', 0, 1, 0, 0),
(10, 4, 'Nike Dunk Low SE', 3239000, 'cat4_sp1.jpg', 0, 0, 1, 0),
(11, 4, 'Nike Dunk Low Retro Premium', 3519000, 'cat4_sp2.jpg', 1, 0, 0, 0),
(12, 4, 'Nike Dunk High Retro', 3369000, 'cat4_sp3.jpg', 0, 0, 0, 0),
(13, 5, 'Nike Cortez SE', 2929000, 'cat5_sp1.jpg', 0, 0, 1, 0),
(14, 5, 'Nike Cortez', 2499000, 'cat5_sp2.jpg', 0, 0, 0, 0),
(15, 5, 'Nike Cortez Basic SL', 1429000, 'cat5_sp3.jpg', 1, 0, 0, 0),
(16, 6, 'Nike SB Zoom Blazer Low Pro GT', 2349000, 'cat6_sp1.jpg', 0, 0, 1, 0),
(17, 6, 'Nike Blazer Mid \'77 Next Nature', 2929000, 'cat6_sp2.jpg', 0, 0, 0, 1),
(18, 6, 'Nike Blazer Low Platform', 2779000, 'cat6_sp3.jpg', 0, 0, 0, 1),
(19, 7, 'Nike Pegasus Shield', 3959000, 'cat7_sp1.jpg', 0, 0, 0, 1),
(20, 7, 'Nike Pegasus Trail 4 GORE-TEX', 4699000, 'cat7_sp2.jpg', 0, 1, 0, 0),
(21, 7, 'Nike Pegasus Trail 4', 3829000, 'cat7_sp3.jpg', 0, 0, 0, 0),
(32, 1, 'Sang', 5000000, 'z4843371659353_1dbb37c61a50e0f693108aafc802ede1.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL DEFAULT '0',
  `dienthoai` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `role` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `diachi`, `dienthoai`, `email`, `role`) VALUES
(1, 'sang', '111', 'Sang Nguyễn', 'Hà Nội', '0338071984', 'sangnguyen2004@gmail.com', 1),
(18, 'thanhsang', '123', '', '0', '0', '0', 0),
(19, 'sangne', '234', '', '0', '0', '0', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
