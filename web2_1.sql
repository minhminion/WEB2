-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2019 lúc 03:59 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authentication`
--

CREATE TABLE `authentication` (
  `authenID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `authenRole` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authentication`
--

INSERT INTO `authentication` (`authenID`, `authenRole`) VALUES
('0', 'Admin'),
('1', 'Sale'),
('2', 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `billID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `billPurchaser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `billDate` datetime NOT NULL,
  `billDelivery` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `billTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brandID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `brandName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`) VALUES
('001', 'Razer'),
('002', 'Asus'),
('003', 'Logitech'),
('004', 'Cosair'),
('005', 'Steelseries');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cetorgry`
--

CREATE TABLE `cetorgry` (
  `cetorgryID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cetorgryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cetorgry`
--

INSERT INTO `cetorgry` (`cetorgryID`, `cetorgryName`) VALUES
('001', 'Bàn Phím'),
('002', 'Chuột'),
('003', 'Tai Nghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `userID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`userID`, `firstName`, `lastName`, `email`) VALUES
('001', 'Lưu', 'Bảo Minh', 'minhminion2015@gmail.com'),
('002', 'Nguyễn Văn', 'Thỏ', 'thanos1234@gmail.com'),
('003', 'Nguyễn Văn ', 'Tho', 'minhdatsg2000@gmail.com'),
('004', 'Em ', 'Tôi', 'emtoi@yahoo.com.vn'),
('005', 'Nguyễn Văn ', 'ABC', 'sale123@gmail.com'),
('006', 'Nguyễn', 'Thị Mộng', 'mong@gmail.com'),
('007', 'Em ', 'Yêu', 'emyeudau@gmail.com'),
('008', 'Mai', 'Tram', 'maitram@gmail.com'),
('009', 'Trương', 'Tam Phong', '3wind@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productAmount` int(11) NOT NULL,
  `productCetorgry` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `productBrand` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `IMG` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `productPrice`, `productAmount`, `productCetorgry`, `productBrand`, `IMG`, `state`) VALUES
('001', 'Asus Cerberus', 'ANB%acasaaadasdasdsadasdasdasdasdasdasdasdasd', 890000, 50, '001', '002', 'bp1.jpg', 1),
('002', 'Asus ROG Claymore', 'ANB%acas', 4490000, 50, '001', '002', 'bp2.jpg', 1),
('003', 'Asus ROG Strix Flare COD', 'ANB%acas', 4390000, 50, '001', '002', 'bp3.jpg', 1),
('004', 'Asus ROG Keypad Claymore Bond', 'ANB%acas', 1390000, 50, '001', '002', 'bp4.jpg', 1),
('005', 'Asus ROG Claymore Core', 'ANB%acas', 3800000, 50, '001', '002', 'bp5.jpg', 1),
('006', 'Corsair K68 - Blue Led', 'ANB%acas', 2590000, 50, '001', '004', 'bp10.jpg', 1),
('007', 'Bàn Phím Corsair K70 RGB MK.2 Low Profile', 'ANB%acas', 405000, 50, '001', '004', 'bp6.jpg', 1),
('008', 'Corsair K65 LUX RGB', '', 3150000, 50, '001', '004', 'bp7.jpg', 1),
('009', 'Corsair K95 RGB Platinum Gunmetal', '', 5190000, 50, '001', '004', 'bp8.jpg', 1),
('010', 'Corsair K63', '', 1990000, 50, '001', '004', 'bp9.jpg', 1),
('011', 'Logitech G512 RGB', '', 3000000, 50, '001', '003', 'bp11.jpg', 1),
('012', 'Logitech G613', '', 2500000, 50, '001', '003', 'bp12.jpg', 1),
('013', 'Razer Blackwidow Tournament Quartz Pink Edition', 'Bàn phím giả cơ chuyên Game Marvo K616 Led 7 màu tự chuyển được thiết kế đẹp mắt với hệ thống đèn led chuyển theo cụm màu tùy thích, Đèn Led cực kỳ nổi bật tỏa khắp bàn phím làm nổi bật các chữ và hình ảnh các logo, đường nét.%%%%Phím được khắc laser chống bay chữ, các nút phím theo chuẩn chơi game tạo cảm giác bám tốt vào ngón tay, gõ chữ cực êm.%%%%Chân đế bàn phím chịu được lực cao.%%%%Các chữ nổi bật màu sắc, sử dụng êm nhẹ, dễ dàng.%%%%Có khả năng chống nước, va đập', 3390000, 50, '001', '001', '013.png', 1),
('014', 'Logitech G Pro', '', 2000000, 50, '001', '003', '014.jpg', 1),
('015', 'Logitech G610 Orion', '', 2090000, 50, '001', '003', '015.png', 1),
('016', 'Logitech G213 Prodigy', '', 950000, 50, '001', '003', '016.png', 1),
('017', 'Razer Blackwidow Elite', '', 4490000, 50, '001', '001', '017.png', 1),
('018', 'Razer BlackWidow X Chroma Mercury Edition', '', 3890000, 50, '001', '001', '018.jpg', 1),
('019', 'Razer Blackwidow X Chroma Gunmetal', '', 3890000, 50, '001', '001', '019.png', 1),
('020', 'Razer Cynosa Chroma', '', 1390000, 50, '001', '001', '020.jpg', 1),
('021', 'Steelseries Apex M750 TKL PUBG Edition', '', 3350000, 50, '001', '005', '021.png', 1),
('022', 'Steelseries Apex M750 TKL', '', 2990000, 50, '001', '005', '022.png', 1),
('023', 'Steelseries Apex M750', '', 3390000, 50, '001', '005', '023.png', 1),
('024', 'Steelseries Apex M500', '', 2390000, 50, '001', '005', '024.png', 1),
('025', 'ASUS Espada GT200 Gaming Mouse', '', 790000, 50, '002', '002', '025.png', 1),
('026', 'Asus ROG Gladius II', '', 1990000, 50, '002', '002', '026.jpg', 1),
('027', 'Asus ROG Spatha RGB Wireless', '', 3880000, 50, '002', '002', '027.jpg', 1),
('028', 'Asus ROG Pugio', '', 1590000, 50, '002', '002', '028.jpg', 1),
('029', 'Asus ROG Strix Impact', '', 990000, 50, '002', '002', '029.jpg', 1),
('030', 'Corsair Glaive RGB', '', 1950000, 50, '002', '004', '030.png', 1),
('031', 'Corsair Harpoon RGB', '', 450000, 50, '002', '004', '031.png', 1),
('032', 'Corsair Vengeance M65 Pro RGB Black', '', 1390000, 50, '002', '004', '032.jpg', 1),
('033', 'Corsair Darkcore RGB Wireless', '', 2390000, 50, '002', '004', '033.png', 1),
('034', 'Logitech G903 Lightspeed Wireless', '', 3790000, 50, '002', '003', '034.jpg', 1),
('035', 'Logitech G403 Prodigy Wired', '', 1000000, 50, '002', '003', '035.jpg', 1),
('036', 'Razer Lancehead Tournament Edition', '', 2000000, 50, '002', '001', '036.jpg', 1),
('037', 'Razer Mamba Elite', '', 2350000, 50, '002', '001', '037.jpg', 1),
('038', 'SteelSeries Rival 310 PUBG Edition', '', 1590000, 50, '002', '005', '038.jpg', 1),
('039', 'SteelSeries Rival 650', '', 2790000, 50, '002', '005', '039.jpg', 1),
('040', 'Asus ROG Centurion True 7', '', 6680000, 50, '003', '002', '040.jpg', 1),
('041', 'Asus ROG Strix Fusion 300', '', 2990000, 50, '003', '002', '041.jpg', 1),
('042', 'Corsair HS50 Stereo Gaming Carbon', '', 1590000, 50, '003', '004', '042.png', 1),
('043', 'Corsair VOID Pro Wireless RGB', '', 3150000, 50, '003', '004', '043.png', 1),
('044', 'Logitech G933', '', 4000000, 50, '003', '003', '044.png', 1),
('045', 'Logitech G433', '', 2500000, 50, '003', '003', '045.jpg', 1),
('046', 'Razer Kraken Tournament Green', '', 2690000, 50, '003', '001', '046.png', 1),
('047', 'Razer Kraken Pro V2 Quartz Pink Edition', '', 1990000, 50, '003', '001', '047.jpg', 1),
('048', 'SteelSeries Arctis 5 PUBG Edition', '', 3290000, 50, '003', '005', '048.jpg', 1),
('049', 'SteelSeries Arctis 3 Black Edition 2019 Edition', '', 1790000, 50, '003', '005', '049.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

CREATE TABLE `receipt` (
  `receiptID` int(11) NOT NULL,
  `userName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `receiptTotal` int(11) NOT NULL,
  `receiptDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `receipt`
--

INSERT INTO `receipt` (`receiptID`, `userName`, `firstName`, `lastName`, `country`, `address`, `phone`, `email`, `description`, `receiptTotal`, `receiptDate`, `status`) VALUES
(1, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', 'minhminion2015@gmail.com', 'asdsa', 13455500, '2019-05-11 04:27:44', 1),
(2, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dwad', '0934837765', 'minhminion2015@gmail.com', 'adsdsa', 13455500, '2019-04-11 04:29:07', 1),
(3, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', 'minhminion2015@gmail.com', 'dwad', 7548000, '2019-05-11 06:27:58', 1),
(4, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dasda', '00000000000', 'minhminion2015@gmail.com', '', 13455500, '2018-06-12 04:04:49', 1),
(5, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', '282 Nguyễn Tri Phương', '0934837765', 'minhminion2015@gmail.com', 'Em đặt cho vui ', 14637000, '2019-12-14 05:53:49', 1),
(6, 'emtoi', 'Em ', 'Tôi', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', 'emtoi@yahoo.com.vn', 'Em đặt cho vui thôi ạ', 13455500, '2019-05-14 13:50:01', 1),
(7, 'minhminion', 'Lưu', 'Bị', 'TP.Hồ Chí Minh', '001 Nguyễn Trãi ', '0934837765', 'minhminion2015@gmail.com', 'Em lại đặt cho vui', 38233000, '2019-05-15 11:01:44', 1),
(8, 'Saler', 'Nguyễn Văn', 'ABC', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', 'sale123@gmail.com', 'asdsad', 8984500, '2019-05-15 15:10:21', 1),
(9, 'Saler', 'Nguyễn Văn', 'ABC', 'TP.Hồ Chí Minh', 'dasds', '1231', 'sale123@gmail.com', '', 3697500, '2019-05-15 15:11:47', 1),
(10, '3wind', 'Trương', 'Tam Phong', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', '3wind@gmail.com', 'asdsda', 16107500, '2019-05-15 15:18:56', 0);

--
-- Bẫy `receipt`
--
DELIMITER $$
CREATE TRIGGER `DeleteReceipt` BEFORE DELETE ON `receipt` FOR EACH ROW DELETE FROM receiptdetail WHERE receiptdetail.receiptID = OLD.receiptID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receiptdetail`
--

CREATE TABLE `receiptdetail` (
  `receiptID` int(11) NOT NULL,
  `productID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `receiptdetail`
--

INSERT INTO `receiptdetail` (`receiptID`, `productID`, `productName`, `quality`, `price`, `total`) VALUES
(1, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(1, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(1, '005', 'Asus ROG Claymore Core', 1, 3800000, 3800000),
(1, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000),
(2, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(2, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(2, '005', 'Asus ROG Claymore Core', 1, 3800000, 3800000),
(2, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000),
(3, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(4, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(4, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(4, '005', 'Asus ROG Claymore Core', 1, 3800000, 3800000),
(4, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000),
(5, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(5, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(5, '004', 'Asus ROG Keypad Claymore Bond', 1, 1390000, 1390000),
(5, '005', 'Asus ROG Claymore Core', 1, 3800000, 3800000),
(5, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000),
(6, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(6, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(6, '005', 'Asus ROG Claymore Core', 1, 3800000, 3800000),
(6, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000),
(7, '002', 'Asus ROG Claymore', 1, 4490000, 4490000),
(7, '003', 'Asus ROG Strix Flare COD', 1, 4390000, 4390000),
(7, '009', 'Corsair K95 RGB Platinum Gunmetal', 1, 5190000, 5190000),
(7, '018', 'Razer BlackWidow X Chroma Mercury Edition', 2, 3890000, 7780000),
(7, '041', 'Asus ROG Strix Fusion 300', 1, 2990000, 2990000),
(7, '044', 'Logitech G933', 1, 4000000, 4000000),
(7, '046', 'Razer Kraken Tournament Green', 6, 2690000, 16140000),
(8, '013', 'Razer Blackwidow Tournament Quartz Pink Edition', 1, 3390000, 3390000),
(8, '017', 'Razer Blackwidow Elite', 1, 4490000, 4490000),
(8, '046', 'Razer Kraken Tournament Green', 1, 2690000, 2690000),
(9, '036', 'Razer Lancehead Tournament Edition', 1, 2000000, 2000000),
(9, '037', 'Razer Mamba Elite', 1, 2350000, 2350000),
(10, '009', 'Corsair K95 RGB Platinum Gunmetal', 1, 5190000, 5190000),
(10, '017', 'Razer Blackwidow Elite', 1, 4490000, 4490000),
(10, '034', 'Logitech G903 Lightspeed Wireless', 1, 3790000, 3790000),
(10, '039', 'SteelSeries Rival 650', 1, 2790000, 2790000),
(10, '046', 'Razer Kraken Tournament Green', 1, 2690000, 2690000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userAuthentication` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPass`, `userAuthentication`, `state`) VALUES
('009', '3wind', '$2y$10$ziLl0.mIuvg/2TCWizL54.i9eu6vAkZ2PVqbyS37ydfRt3Hzg.age', '2', 1),
('004', 'emtoi', '$2y$10$lsuE8ygqk6MaofLqdVzXwO71Ti.NZlDW/iBdg/OFrkwkbmBjSLZBi', '2', 1),
('007', 'emyeudau', '$2y$10$DxouoqYKDW2YMEgqnFE5IO4QrZo/y6fgKiZ8gSfsUb1q.Z56SFg3K', '2', 1),
('008', 'maitram', '$2y$10$d3tdkpL.Mosoy4NXlb3RiuyPidMrIZtrNaJAKyOFjfU5L4yu05LmG', '2', 1),
('001', 'minhminion', '$2y$10$x2vtcz9pLVTYZfQL/zSTuePwlm9F0LC/BZPJu67CV4BjpSoGxrgH.', '0', 1),
('006', 'Mongg', '$2y$10$MIW.ipx6J1OYWxFdip1sc.DGkzLRVR2Uir34r8CpmY73so0v0ES/.', '2', 1),
('005', 'Saler', '$2y$10$lHg0ItOfCeGXzcfnxkKTZuAvBV0o1/js3m.E8XtlglPfA7rSkJYza', '1', 1),
('002', 'thanos', '$2y$10$4bXZG2f826LiZ8JZHbpolucNwWx558vBockiOnuaygvKL8C4rSGxS', '1', 1),
('003', 'thor123', '$2y$10$qe2nznYrdti6zsLjTXNSWO5T8ZJiNJvxdCZoP8yKWrhmCuKSXG3B.', '2', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`authenID`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `billPurchaser` (`billPurchaser`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Chỉ mục cho bảng `cetorgry`
--
ALTER TABLE `cetorgry`
  ADD PRIMARY KEY (`cetorgryID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_Brand` (`productBrand`) USING BTREE,
  ADD KEY `FK_Cetogry` (`productCetorgry`) USING BTREE;

--
-- Chỉ mục cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receiptID`),
  ADD KEY `userName` (`userName`),
  ADD KEY `userName_2` (`userName`),
  ADD KEY `receiptDate` (`receiptDate`);

--
-- Chỉ mục cho bảng `receiptdetail`
--
ALTER TABLE `receiptdetail`
  ADD PRIMARY KEY (`receiptID`,`productID`) USING BTREE,
  ADD KEY `receiptID` (`receiptID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`) USING BTREE,
  ADD KEY `userAuthentication` (`userAuthentication`),
  ADD KEY `userID` (`userID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productBrand`) REFERENCES `brand` (`brandID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`productCetorgry`) REFERENCES `cetorgry` (`cetorgryID`);

--
-- Các ràng buộc cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`);

--
-- Các ràng buộc cho bảng `receiptdetail`
--
ALTER TABLE `receiptdetail`
  ADD CONSTRAINT `receiptdetail_ibfk_1` FOREIGN KEY (`receiptID`) REFERENCES `receipt` (`receiptID`),
  ADD CONSTRAINT `receiptdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userAuthentication`) REFERENCES `authentication` (`authenID`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `customer` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
