-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2019 lúc 01:05 PM
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
-- Cơ sở dữ liệu: `web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` char(10) NOT NULL,
  `nameSP` varchar(100) NOT NULL,
  `priceSP` double NOT NULL,
  `ENABLE` tinyint(1) NOT NULL,
  `IMG` char(10) NOT NULL,
  `HANG` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `nameSP`, `priceSP`, `ENABLE`, `IMG`, `HANG`) VALUES
('bp1', 'Asus Cerberus', 890000, 1, 'bp1.jpg', 'Asus'),
('bp10', 'Corsair K68 - Blue Led', 2590000, 1, 'bp10.jpg', 'Corsair'),
('bp11', 'Logitech G512 RGB', 3000000, 1, 'bp11.jpg', 'Logitech'),
('bp12', 'Logitech G613', 2500000, 1, 'bp12.jpg', 'Logitech'),
('bp17', 'Razer Blackwidow Tournament Quartz Pink Edition', 3390000, 1, 'bp17.jpg', 'Razer'),
('bp2', 'Asus ROG Claymore', 4490000, 1, 'bp2.jpg', 'Asus'),
('bp3', 'Asus ROG Strix Flare COD', 4390000, 1, 'bp3.jpg', 'Asus'),
('bp4', 'Asus ROG Keypad Claymore Bond', 1390000, 1, 'bp4.jpg', 'Asus'),
('bp5', 'Asus ROG Claymore Core', 3800000, 1, 'bp5.jpg', 'Asus'),
('bp6', 'Bàn phím Corsair K70 RGB MK.2 Low Profile', 405000, 1, 'bp6.jpg', 'Corsair'),
('bp7', 'Corsair K65 LUX RGB', 3150000, 1, 'bp7.jpg', 'Corsair'),
('bp8', 'Corsair K95 RGB Platinum Gunmetal', 5190000, 1, 'bp8.jpg', 'Corsair'),
('bp9', 'Corsair K63', 1990000, 1, 'bp9.jpg', 'Corsair');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
