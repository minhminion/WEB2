-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 02:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `authenID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `authenRole` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`authenID`, `authenRole`) VALUES
('0', 'Admin'),
('1', 'Sale'),
('2', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `brandName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`) VALUES
('001', 'Razer'),
('002', 'Asus'),
('003', 'Logitech'),
('004', 'Cosair'),
('005', 'Steelseries');

-- --------------------------------------------------------

--
-- Table structure for table `cetorgry`
--

CREATE TABLE `cetorgry` (
  `cetorgryID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cetorgryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cetorgry`
--

INSERT INTO `cetorgry` (`cetorgryID`, `cetorgryName`) VALUES
('001', 'Bàn Phím'),
('002', 'Chuột'),
('003', 'Tai Nghe'),
('004', 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `productPrice`, `productAmount`, `productCetorgry`, `productBrand`, `IMG`, `state`) VALUES
('001', 'Asus Cerberus', 'ANB%acas', 890000, 10, '001', '002', 'bp1.jpg', 1),
('002', 'Asus ROG Claymore', 'ANB%acas', 4490000, 10, '001', '002', 'bp2.jpg', 1),
('003', 'Asus ROG Strix Flare COD', 'ANB%acas', 4390000, 10, '001', '002', 'bp3.jpg', 1),
('004', 'Asus ROG Keypad Claymore Bond', 'ANB%acas', 1390000, 10, '001', '002', 'bp4.jpg', 1),
('005', 'Asus ROG Claymore Core', 'ANB%acas', 3800000, 10, '001', '002', 'bp5.jpg', 1),
('006', 'Corsair K68 - Blue Led', 'ANB%acas', 2590000, 0, '001', '004', 'bp10.jpg', 1),
('007', 'Bàn Phím Corsair K70 RGB MK.2 Low Profile', 'ANB%acas', 405000, 0, '001', '004', 'bp6.jpg', 1),
('008', 'Corsair K65 LUX RGB', '', 3150000, 0, '001', '004', 'bp7.jpg', 1),
('009', 'Corsair K95 RGB Platinum Gunmetal', '', 5190000, 0, '001', '004', 'bp8.jpg', 1),
('010', 'Corsair K63', '', 1990000, 0, '001', '004', 'bp9.jpg', 1),
('011', 'Logitech G512 RGB', '', 3000000, 0, '001', '003', 'bp11.jpg', 1),
('012', 'Logitech G613', '', 2500000, 0, '001', '003', 'bp12.jpg', 1),
('013', 'Razer Blackwidow Tournament Quartz Pink Edition', '', 3390000, 0, '001', '001', 'bp17.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userAuthentication` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPass`, `userAuthentication`, `state`) VALUES
('001', 'minhmnion', '$2y$10$ePrfBoEb4Cf2itkXAgt/g.DyZIOmFxYdK44JgxnNayMIvLUI.p.BO', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`authenID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `cetorgry`
--
ALTER TABLE `cetorgry`
  ADD PRIMARY KEY (`cetorgryID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_Brand` (`productBrand`) USING BTREE,
  ADD KEY `FK_Cetogry` (`productCetorgry`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userAuthentication` (`userAuthentication`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productBrand`) REFERENCES `brand` (`brandID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`productCetorgry`) REFERENCES `cetorgry` (`cetorgryID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userAuthentication`) REFERENCES `authentication` (`authenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;