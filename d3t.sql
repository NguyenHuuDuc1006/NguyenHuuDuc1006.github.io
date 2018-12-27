-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2018 lúc 05:11 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `d3t`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertises`
--

CREATE TABLE `advertises` (
  `advertiseId` int(11) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `advertiseName` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `advertises`
--

INSERT INTO `advertises` (`advertiseId`, `image`, `advertiseName`, `description`) VALUES
(1, 'sl1.jpg', 'slide1', ''),
(3, 'sl3.jpg', 'slide3', ''),
(5, 'sl4.jpg', 'slide4', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `subCategoryID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `categoryName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categoryID`, `subCategoryID`, `categoryName`, `description`, `created`) VALUES
(2, '', 'Điện thoại', 'Thiết bị cầm tay đa dạng thể loại và kích thước', '2018-10-22 14:56:40'),
(3, '', 'Tablet', 'Sản phẩm cầm tay kích thước to hơn điện thoại', '2018-10-22 14:56:40'),
(4, '', 'Phụ kiện', 'Các phụ kiện đi kèm với thiết bị di động', '2018-10-22 14:56:40'),
(5, '', 'Ưu đãi', 'Thêm các ưu đãi cho khách hàng', '2018-10-22 14:56:40'),
(6, '2', 'Iphone', 'Sẩn phẩm của Apple', '2018-10-22 14:56:40'),
(7, '2', 'Sam Sung', '', '2018-10-22 14:56:40'),
(8, '2', 'Sony', '', '2018-10-22 14:56:40'),
(9, '2', 'Xiaomi', '', '2018-10-22 14:56:40'),
(10, '2', 'Nokia', '', '2018-10-22 14:56:40'),
(11, '3', 'Ipad', '', '2018-10-22 14:58:29'),
(12, '3', 'SamSung', '', '2018-10-22 14:58:04'),
(13, '3', 'Sony', '', '2018-10-22 14:59:26'),
(14, '3', 'Xiaomi', '', '2018-10-22 14:59:26'),
(15, '3', 'Nokia', '', '2018-10-22 14:59:46'),
(16, '15', 'kjhkjh', '', '2018-10-30 12:55:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `gender` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `gender`, `password`, `email`, `phone`, `address`, `status`, `fullName`, `birthDate`, `avatar`) VALUES
(90, 'Male', '123', '1@g.vn', '123', 'au co', '', 'tung', '1/1/1991', ''),
(91, 'Male', '123456', 'duc123@gmail.com', '0968752145', 'abc', '', 'Nguyễn Hữu Đức', '10/06/1996', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employeeName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` mediumint(20) NOT NULL,
  `birthDate` date NOT NULL,
  `avarta` text COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `productID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `shipperID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shipperDate` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productCode` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `supplierID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `discount` float NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productCode`, `productName`, `supplierID`, `categoryID`, `quantity`, `unitPrice`, `discount`, `status`, `description`, `image`, `created`) VALUES
(1, 'SP001', 'Iphone 6s Plus', 'S001', '6', 50, 12000000, 10, 1, 'Dòng sản phẩm cao cấp của Apple', 'cr1.png', '2018-10-30 04:05:17'),
(2, 'SP002', 'Iphone 7 Plus', 'S001', '6', 40, 15000000, 30, 1, 'Sản phẩm mới của Apple', 'cr2.png', '2018-10-30 04:05:17'),
(3, 'SP003', 'Galaxy 4', 'S002', '7', 40, 8000000, 20, 1, 'Dòng sản phẩm cao cấp', 'cr3.png', '2018-10-30 04:05:17'),
(4, 'SP004', 'Sam Sung J3', 'S003', '7', 50, 10000000, 30, 1, 'Đáng tin cậy', 'cr4.png', '2018-10-30 04:05:17'),
(5, 'SP005', 'Iphone 8S', 'S001', '6', 30, 15000000, 10, 1, 'Được nhiều người dùng mua nhất', 'cr5.png', '2018-10-30 04:05:17'),
(6, 'SP006', 'Sam Sung Galaxy S3', 'S002', '7', 45, 9000000, 15, 1, 'Lại còn phải hỏi', 'cr6.png', '2018-10-30 04:05:17'),
(7, 'SP007', 'Iphone X', 'S001', '6', 20, 30000000, 10, 1, 'Dòng sản phẩm hot nhất hiện nay', 'cr7.png', '2018-10-30 04:05:17'),
(8, 'SP008', 'Xao Mi 10', 'S004', '9', 35, 11000000, 20, 1, 'Mẫu mã bền và đẹp', 'cr8.png', '2018-10-30 04:05:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippers`
--

CREATE TABLE `shippers` (
  `id` int(11) NOT NULL,
  `shipperID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` mediumint(20) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `shipperID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` mediumint(20) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`advertiseId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertises`
--
ALTER TABLE `advertises`
  MODIFY `advertiseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
