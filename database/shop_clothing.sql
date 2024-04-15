-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2024 lúc 08:34 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_clothing`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `fullname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `name`, `role`, `fullname`) VALUES
(3, 'user2@gmail.com', '$2y$12$OL4gLTL0egpk7/fNS4/fkeeBVo.LhhB5yYJEtNpClgAV47BVrN/4O', 'user2', 'user', 'user2'),
(8, 'admin3@gmail.com', '$2y$10$ln1tnbVL06o6o9DRMAIOVOE59QAnDRpXZn3B4x8vHAX6vHUnwNW1K', 'admin3', 'admin', 'admin3'),
(11, 'user@gmail.com', '$2y$12$KS6QDffkaIRM0F6HXm2vbOMZcEZUMFmnG2qTCo1iHOWJ4.t8sLDYO', 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `note` varchar(300) NOT NULL,
  `payment` varchar(150) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` double NOT NULL,
  `size` varchar(11) NOT NULL,
  `total` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `action` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `address`, `note`, `payment`, `productID`, `price`, `size`, `total`, `quantity`, `action`) VALUES
(12, 'huynh nam', 32694443, 'huynhnam@gmail.com', 'gò vấp ', '', 'cod', 17, 315000, 'XS', 1575000, 5, 'Xác nhận'),
(13, 'như huỳnh', 33225584, 'nhuhuynh@gmail.com', 'quan 9', '', 'bank_transfer', 19, 315000, 'XXXS', 2205000, 7, 'Xác nhận'),
(14, 'như huỳnh', 33225584, 'nhuhuynh@gmail.com', 'quan 9', '', 'bank_transfer', 20, 445000, 'XS', 4450000, 10, 'Xác nhận'),
(15, 'như huỳnh', 33225584, 'nhuhuynh@gmail.com', 'quan 9', '', 'bank_transfer', 22, 409.5, 'XXXS', 2047.5, 5, 'Hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `category` varchar(300) NOT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`, `discount`) VALUES
(13, 'Áo sơ mi samray Old Sailor', 'Được làm từ chất liệu vải Cotton tạo cảm giác dễ chịu và thoáng mát cho tất cả mọi người, từ công sở cho tới đi chơi hay chỉ đơn giản là mặc tại nhà, Áo sơ mi của chúng tôi cực kì dễ phối đồ bởi thiết kế đơn giản và tinh gọn.', 316000, 'uploads/z5272890565953_5bf5177b3efd8390031a8e609f37895b.jpg', 'Áo sơ mi', 20),
(16, 'Áo sơ mi coban vải nano ', 'Áo sơ mi nano coban ', 475000, 'uploads/ea1530883d6ee830b17f2.jpg', 'Áo sơ mi', 20),
(17, 'Áo thun block core Old Sailor', 'Áo thun block core Old Sailor - ATDE88576 - đen - Big size upto 5XL', 315000, 'uploads/90007d487a9ad0c4898b77.jpg', 'Áo thun', 0),
(18, 'Áo thun thể thao Old Sailor', 'Áo thun thể thao Old Sailor - ATDX33009 - Big size upto 5XL', 295000, 'uploads/2020d1a7-b5c3-4c79-b02b-91222619463a.jpg', 'Áo thun', 10),
(19, 'Áo thun họa tiết Retro Door', 'Áo thun họa tiết Retro Door Old Sailor - ATDE26022 - đen - Big Size Upto 5XL', 315000, 'uploads/f00ead54-8024-4d78-91e0-2fbb2fa4488b.jpg', 'Áo thun', 0),
(20, 'Quần kaki basic nam', 'Quần kaki basic nam form slim-fit Old Sailor - QKDE31007 - Big size upto 42', 445000, 'uploads/582e9c12-29dd-4f8d-9d96-a7340420fb48.jpg', 'Quần kaki', 0),
(21, 'Quần khaki nam basic - BLACK ', 'Quần khaki nam basic Old Sailor - O.S.L KAKI BASIC - BLACK - QKDE11082 - Big Size upto 40', 455000, 'uploads/369338fc1314cf4a960523.jpg', 'Quần kaki', 0),
(22, 'Quần khaki nam basic- BEIGE ', 'Quần khaki nam basic Old Sailor - O.S.L KAKI BASIC - BEIGE - QKBE26011- Big Size upto 40', 455, 'uploads/IMG_0306-192.jpg', 'Quần kaki', 10),
(23, 'Quần short thun nam-SHXC88549', 'Quần short thun nam Old Sailor - SHXC88549 - Big Size upto 5XL', 252000, 'uploads/z5318898531927_13509698a01d9f63a45c2335f76eda0e.jpg', 'Quần ngắn', 0),
(24, 'Quần lửng nam Old Sailor', 'Quần lửng nam Old Sailor - O.S.L DENIM PREMIUM SHORT - 6890 - Big size upto 42', 355000, 'uploads/z5304214740462_56e5c815a29d7d099b15ccfec0c0b3f0.jpg', 'Quần ngắn', 30),
(25, 'Quần lửng kaki túi hộp Old Sailor', 'Quần lửng kaki túi hộp Old Sailor - SHXA31008 - Big size upto 40', 325, 'uploads/8de1c840fea854f60db91.jpg', 'Quần ngắn', 30),
(26, 'Quần lửng kaki túi hộp - SHDE31008', 'Quần lửng kaki túi hộp Old Sailor - SHDE31008 - Big size upto 40', 325000, 'uploads/IMG_3997.jpg', 'Quần ngắn', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order` (`productID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product_order` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
