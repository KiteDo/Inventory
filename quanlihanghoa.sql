-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2024 lúc 12:05 PM
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
-- Cơ sở dữ liệu: `quanlihanghoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_tk` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ten_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_tk`, `user`, `pass`, `email`, `ten_admin`) VALUES
(0, 'admin2', 'admin2', 'admin2@gmail.com', 'Pham Thi Kim Dung'),
(1, 'admin1', 'admin1', 'admin1@gmail.com', 'Do Tuan Kiet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` varchar(30) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `price` int(200) NOT NULL,
  `payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `time_in`, `time_out`, `price`, `payment`) VALUES
('HD0001', '2024-05-14 06:01:48', '2024-05-14 06:09:48', 65000, 'cash'),
('HD0002', '2024-05-14 06:08:48', '2024-05-14 06:13:48', 30000, 'cash'),
('HD0003', '2024-05-14 06:31:48', '2024-05-14 06:42:20', 105000, 'transfer'),
('HD0004', '2024-05-14 07:01:09', '2024-05-14 07:20:12', 90000, 'cash'),
('HD0005', '2024-05-14 07:35:19', '2024-05-14 07:55:35', 40000, 'momo'),
('HD0006', '2024-05-14 07:33:33', '2024-05-14 08:36:22', 50000, 'momo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id_product` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `price` int(200) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id_product`, `product_name`, `unit`, `price`, `company`) VALUES
('B01', 'Bia me', 'ket', 1120000, 'ROOSTER BEVERAGES JSC'),
('B02', 'Pilsner', 'ket', 1920000, 'ROOSTER BEVERAGES JSC'),
('B03', 'Blone', 'thung', 944000, 'ROOSTER BEVERAGES JSC'),
('C01', 'Cà phê Trung Nguyên', 'kg', 170000, 'CTY TNHH CƯỜNG QUẬT'),
('C02', 'Cà phê hạt', 'kg', 180000, 'CTY TNHH CƯỜNG QUẬT'),
('T01', 'Trà đen', 'kg', 110000, 'CTY TNHH CƯỜNG QUẬT'),
('T02', 'Trà nhài', 'kg', 100000, 'CTY TNHH CƯỜNG QUẬT'),
('T03', 'Trà olong', 'kg', 120000, 'CTY TNHH CƯỜNG QUẬT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_in`
--

CREATE TABLE `inventory_in` (
  `id_product` varchar(30) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory_in`
--

INSERT INTO `inventory_in` (`id_product`, `quantity`, `price`, `date`) VALUES
('C01', 25, 425000, '2024-05-03'),
('C02', 15, 2700000, '2024-05-03'),
('T01', 5, 550000, '2024-05-03'),
('T02', 4, 400000, '2024-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_out`
--

CREATE TABLE `inventory_out` (
  `id_product` varchar(30) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory_out`
--

INSERT INTO `inventory_out` (`id_product`, `quantity`, `date`) VALUES
('C01', 5, '2024-05-14'),
('C02', 3, '2024-05-14'),
('C01', 4, '2024-05-15'),
('C02', 2, '2024-05-15'),
('T01', 1, '2024-05-15'),
('T02', 1, '2024-05-15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_tk`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `inventory_in`
--
ALTER TABLE `inventory_in`
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `inventory_out`
--
ALTER TABLE `inventory_out`
  ADD KEY `id_product` (`id_product`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `inventory_in`
--
ALTER TABLE `inventory_in`
  ADD CONSTRAINT `inventory_in_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `inventory` (`id_product`);

--
-- Các ràng buộc cho bảng `inventory_out`
--
ALTER TABLE `inventory_out`
  ADD CONSTRAINT `inventory_out_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `inventory` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
