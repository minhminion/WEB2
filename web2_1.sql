-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2019 lúc 04:06 AM
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
('003', 'Tai Nghe'),
('004', 'Phụ kiện');

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
('003', 'Nguyễn Văn ', 'Tho', 'minhdatsg2000@gmail.com');

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
('001', 'Asus Cerberus', 'ANB%acas', 890000, 10, '001', '002', 'bp1.jpg', 1),
('002', 'Asus ROG Claymore', 'ANB%acas', 4490000, 10, '001', '002', 'bp2.jpg', 1),
('003', 'Asus ROG Strix Flare COD', 'ANB%acas', 4390000, 10, '001', '002', 'bp3.jpg', 1),
('004', 'Asus ROG Keypad Claymore Bond', 'ANB%acas', 1390000, 10, '001', '002', 'bp4.jpg', 1),
('005', 'Asus ROG Claymore Core', 'ANB%acas', 3800000, 10, '001', '002', 'bp5.jpg', 1),
('006', 'Corsair K68 - Blue Led', 'ANB%acas', 2590000, 10, '001', '004', 'bp10.jpg', 1),
('007', 'Bàn Phím Corsair K70 RGB MK.2 Low Profile', 'ANB%acas', 405000, 10, '001', '004', 'bp6.jpg', 1),
('008', 'Corsair K65 LUX RGB', '', 3150000, 10, '001', '004', 'bp7.jpg', 1),
('009', 'Corsair K95 RGB Platinum Gunmetal', '', 5190000, 0, '001', '004', 'bp8.jpg', 1),
('010', 'Corsair K63', '', 1990000, 0, '001', '004', 'bp9.jpg', 1),
('011', 'Logitech G512 RGB', '', 3000000, 0, '001', '003', 'bp11.jpg', 1),
('012', 'Logitech G613', '', 2500000, 0, '001', '003', 'bp12.jpg', 1),
('013', 'Razer Blackwidow Tournament Quartz Pink Edition', '', 3390000, 0, '001', '001', 'bp17.jpg', 1);

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
(2, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dwad', '0934837765', 'minhminion2015@gmail.com', 'adsdsa', 13455500, '2019-05-11 04:29:07', 1),
(3, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dasdas', '0934837765', 'minhminion2015@gmail.com', 'dwad', 7548000, '2019-05-11 06:27:58', 0),
(4, 'minhminion', 'Lưu', 'Bảo Minh', 'TP.Hồ Chí Minh', 'dasda', '00000000000', 'minhminion2015@gmail.com', '', 13455500, '2019-05-12 04:04:49', 0);

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
(4, '008', 'Corsair K65 LUX RGB', 1, 3150000, 3150000);

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
('001', 'minhminion', '$2y$10$8tMsdv23IAmJ3l6DPVZtluhj3l0/lf.24D./P.ALcGYYM.LD937xC', '0', 1),
('002', 'thanos', '$2y$10$KAzm0pURxfuKPfsXF6iG.er4Zl0H/6Vcziuy0FV59w/z9zegaJkyW', '2', 1),
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
