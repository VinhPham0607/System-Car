-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2023 lúc 07:41 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `system_car`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `maSoGiay` varchar(255) NOT NULL,
  `ngayCapGiay` date NOT NULL,
  `ngayCuGiayDK` date DEFAULT NULL,
  `ngayMoiGiayDK` date NOT NULL,
  `bienDK` varchar(255) NOT NULL,
  `noiDk` varchar(255) NOT NULL,
  `mucDich` varchar(255) NOT NULL,
  `img` varchar(555) NOT NULL,
  `nhanHieu` varchar(255) NOT NULL,
  `loaiPhuongTien` varchar(255) NOT NULL,
  `namSx` int(11) DEFAULT NULL,
  `nuocSx` varchar(255) NOT NULL,
  `mauSon` varchar(255) NOT NULL,
  `soMay` varchar(255) NOT NULL,
  `soKhung` varchar(255) NOT NULL,
  `soLoai` varchar(255) NOT NULL,
  `dungTich` varchar(255) NOT NULL,
  `soChoNgoi` varchar(255) NOT NULL,
  `congThuc` varchar(255) NOT NULL,
  `vetBanhXe` varchar(255) NOT NULL,
  `kichThuoc` varchar(255) NOT NULL,
  `chieuDai` varchar(255) NOT NULL,
  `khoiLuong` varchar(255) NOT NULL,
  `loaiNhienLieu` varchar(244) NOT NULL,
  `congSuat` varchar(255) NOT NULL,
  `goi` int(11) DEFAULT NULL,
  `tocDoQuay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`id`, `maSoGiay`, `ngayCapGiay`, `ngayCuGiayDK`, `ngayMoiGiayDK`, `bienDK`, `noiDk`, `mucDich`, `img`, `nhanHieu`, `loaiPhuongTien`, `namSx`, `nuocSx`, `mauSon`, `soMay`, `soKhung`, `soLoai`, `dungTich`, `soChoNgoi`, `congThuc`, `vetBanhXe`, `kichThuoc`, `chieuDai`, `khoiLuong`, `loaiNhienLieu`, `congSuat`, `goi`, `tocDoQuay`) VALUES
(1, 'Mã Số Giấy Chứng Nhận', '1985-02-01', '2019-05-19', '2020-09-19', 'Biển Số Xe', 'Nơi Đăng Ký Xe', 'Quân Sự', 'sign.jpg-1684407602', 'Nhãn Hiệu', 'Loại Phương Tiện', 2011, 'Nước Sản Xuất Xe', 'Màu Xe', 'Số Máy', 'Số Khung', 'Số Loại', 'Dung Tích', '9', 'Công Thức Bánh Xe', 'Vết Bánh Xe', 'Kích Thước Bao', 'Chiều Dài Cơ Sở', 'Khối Lượng Bản Thân', 'Loại Nhiên Liệu', 'Công Suất', 36, 'Tốc Độ Quay'),
(2, '124CN1254', '2012-02-15', NULL, '2016-11-15', '99A-56789', 'Bắc Ninh', 'Cá Nhân', '', 'TOYOTA', 'ô tô', 2002, 'Việt Nam', 'Nâu', '1123211321', '43543543534', 'Số Loại', '200', '29', 'Công Thức', 'Vệt Bánh Xe', '100x200x300', '500', '1000', 'dầu diezen', '1000', 36, '1000m/s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `type`, `name`) VALUES
(1, 'province', 'Bắc Ninh'),
(2, 'province', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information_car`
--

CREATE TABLE `information_car` (
  `id` int(44) NOT NULL,
  `code_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_date` date NOT NULL,
  `plate_reg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `where_reg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `color` varchar(255) CHARACTER SET utf8 NOT NULL,
  `capa` varchar(255) CHARACTER SET utf8 NOT NULL,
  `origin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `model_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `capacity` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `engine` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chassis` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateSX` date DEFAULT NULL,
  `mucDich` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information_owner`
--

CREATE TABLE `information_owner` (
  `id` int(44) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `born` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provice` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateReg` date NOT NULL,
  `authorReg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sTime` datetime NOT NULL DEFAULT current_timestamp(),
  `center` varchar(255) CHARACTER SET utf8 NOT NULL,
  `area` varchar(255) CHARACTER SET utf8 NOT NULL,
  `goi` int(11) DEFAULT NULL,
  `author_edit` varchar(255) NOT NULL,
  `time_edit` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ns` date NOT NULL,
  `cmnd` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `type` varchar(225) NOT NULL,
  `authorReg` varchar(355) NOT NULL,
  `authorEdit` varchar(255) NOT NULL,
  `timeEdit` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `sTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `owner`
--

INSERT INTO `owner` (`id`, `ten`, `ns`, `cmnd`, `address`, `type`, `authorReg`, `authorEdit`, `timeEdit`, `sTime`) VALUES
(1, 'Tên', '1999-11-12', 'Số CMND', 'Địa Chỉ Thường Trú', 'Xe Cá Nhân', '3', '2', '2023-05-19 09:40:49', '2023-05-18 18:00:02'),
(2, 'Chủ Tên', '2023-01-02', '123456789', 'Bắc Ninh', 'Xe Cá Nhân', '1', '', NULL, '2023-05-19 09:00:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time_login` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `center` varchar(255) CHARACTER SET utf8 NOT NULL,
  `area` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `pass`, `name`, `type`, `token`, `time_login`, `center`, `area`, `status`) VALUES
('1', '1', 'ADMIN SYSTEM', '1', '7b463a17c73c00380c5aed0594f9ba43', '2023-05-19 14:35:13', 'Cục Đăng Kiểm', 'Cả Nước', 0),
('2', '1', 'Nhân Viên 1', '2', '16a49ca35f9e2b233b4c5f1581adfa40', '2023-05-19 09:31:49', 'Trung Tâm 1', 'Miền Bắc', 0),
('3', '1', 'Nhân Viên 3', '2', '06f7fb7e0e9223768da5ce0821a7ee97', '2023-05-19 09:40:34', 'Trung Tâm 1', 'Miền Bắc', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `information_car`
--
ALTER TABLE `information_car`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `information_owner`
--
ALTER TABLE `information_owner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
