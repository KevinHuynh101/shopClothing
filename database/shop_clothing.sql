-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2024 lúc 06:23 AM
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
(6, '0', 23344, 'kimd@gmail.com', 'diachi', 'ghi chu', 'cod', 4, 111111, 'XXXS', 111111, 1, 'Xác nhận'),
(7, 'huynh nam', 32699999, 'kimdong@gmail.com', 'quận 9 , tp.hcm', '', 'cod', 4, 111111, 'XXXS', 111111, 1, 'Xác nhận'),
(8, 'huynh nam', 32699999, 'kimdong@gmail.com', 'quận 9 , tp.hcm', '', 'cod', 3, 499999.5, 'XXS', 499999.5, 1, 'Hủy'),
(9, 'huynh nam', 3222222, 'huynhnam@gmail.com', 'gò vấp', '', 'cod', 4, 111111, 'XXS', 222222, 2, 'Hủy'),
(10, 'như huỳnh', 2666666, 'nhuhuynh@gmail.com', 'tân bình', '', 'bank_transfer', 3, 499999.5, 'XS', 2499997.5, 5, ''),
(11, 'như huỳnh', 2666666, 'nhuhuynh@gmail.com', 'tân bình', '', 'bank_transfer', 9, 258252, 'XS', 258252, 1, '');

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
(2, 'áo thun', 'day là chi tiết sảnvpham63', 1000, 'uploads/fa6ada2555e8e51f369718bbc92ccc52.png', 'áo thun', 10),
(3, 'áo trắng', 'áo rất trắng', 999999, 'uploads/laptop.png', 'Áo thun', 50),
(4, 'huynhnam', 'huynhnam', 111111, 'uploads/24b194a695ea59d384768b7b471d563f.png', 'Quần ngắn', 0),
(7, 'test', 'fgfdgdf', 1000, 'uploads/b0f78c3136d2d78d49af71dd1c3f38c1.png', 'Áo thun', 40),
(8, 'ffdsds', 'fsfsdfsf', 222222, 'uploads/24b194a695ea59d384768b7b471d563f.png', 'Áo thun', 0),
(9, 'fdfsdfsdfdsf', 'vvfdfdfsg', 258252, 'uploads/xe máy.png', 'Quần kaki', 0),
(10, 'fsddsfsdf', 'fsfsf', 2582, 'uploads/ec14dd4fc238e676e43be2a911414d4d.png', 'Quần ngắn', 0),
(11, 'fsdfsdfds', 'fsfsdfsd', 2222, 'uploads/c3f3edfaa9f6dafc4825b77d8449999d (1).png', 'Áo sơ mi', 0),
(12, 'fsfsfds', 'daddad', 5528528, 'uploads/ec14dd4fc238e676e43be2a911414d4d.png', 'Quần ngắn', 30);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
