

CREATE TABLE `tbl_cart` (
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(50) NOT NULL,
  `cart_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `tbl_cart` (`id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, '4119', 1);



CREATE TABLE `tbl_cart_details` (
  `id_sanpham` int(11) NOT NULL,
  `code_cart` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_sanpham`, `code_cart`, `soluong`) VALUES
(1, '4119', 2),
(2, '4119', 2);



CREATE TABLE `tbl_danhmuc` (
  `iddanhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(200) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tbl_danhmuc` (`iddanhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Ốp Lưng Điện Thoại', 1),
(2, 'Tai Nghe', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `MAKH` int(10) NOT NULL,
  `HOKH` char(50) NOT NULL,
  `TENKH` char(50) NOT NULL,
  `USERID_KH` int(6) NOT NULL,
  `DIACHI` char(50) NOT NULL,
  `SDT` int(11) NOT NULL,
  `enable_kh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbl_khachhang` (`MAKH`, `HOKH`, `TENKH`, `USERID_KH`, `DIACHI`, `SDT`, `enable_kh`) VALUES
(1, 'Lê Bá', 'Khải', 1, 'HCM', 862106951, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `MANV` int(10) NOT NULL,
  `HONV` char(50) NOT NULL,
  `TENNV` char(50) NOT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `SDT` int(11) NOT NULL,
  `USERID_NV` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_nhanvien` (`MANV`, `HONV`, `TENNV`, `DIACHI`, `SDT`, `USERID_NV`) VALUES
(1001, 'Vũ Mai Lan', 'Hương', '8 Điện Biên Phủ', 8330733, 5),
(1002, 'Trần Cương', 'Phong', '1 Lý Thường Kiệt', 8308117, 6),
(1003, 'Bùi Thanh', 'Quang', '78 Trương Đình', 8324461, 7),
(1004, 'Lê Tuấn', 'Phương', '351 Lạc Long Quân', 8308155, 8),
(1005, 'Hồ Thị', 'Giao', '65 Nguyễn Thái Sơn', 8324467, 9),
(1006, 'Nguyễn Thị', 'Chi', '12/6 Nguyễn Kiệm', 8120012, 10),
(1007, 'Nguyễn Tru', 'Tâm', '36 Nguyễn Văn Cừ', 8458188, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyen`
--

CREATE TABLE `tbl_quyen` (
  `MAQUYEN` int(10) NOT NULL,
  `TENQUYEN` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyen`
--

INSERT INTO `tbl_quyen` (`MAQUYEN`, `TENQUYEN`) VALUES
(0, 'User'),
(1, 'Staff'),
(2, 'Admin'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(141) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `tomtat` tinytext NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `noidung`, `tomtat`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'Ốp Lưng Iphone', 'OL1', '25000', 50, '1705744496_DanLung2.jpg', 'Đây là hàng tốt', 'Mới về', 1, 1),
(2, 'Ốp Lưng SamSung', 'OL2', '30000', 25000, '1705744948_DanLung1.jpg', 'Hàng Tốt', 'Hàng Tốt', 1, 1),
(3, 'Tai Nghe 1', 'TN1', '50000', 100, '1705806456_TaiNghe2.jpg', 'Hàng Tốt', 'Hàng Tốt', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `USERID` int(11) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `MAQUYEN` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`USERID`, `USERNAME`, `PASSWORD`, `EMAIL`, `MAQUYEN`, `enable`) VALUES
(1, 'thanhtien', '123456789', 'thanhtien@gmail.com', 0, 1),
(2, 'staff', 'staff', 'staff@gmail.com', 1, 1),
(3, 'admin', 'admin', 'admin@gmail.com', 2, 1),
(4, 'manager', 'manager', 'manager@gmail.com', 3, 0),
(5, 'lanhuong123', '123456789', 'lanhuong@gmail.com', 1, 1),
(6, 'tranphong22', '123456789', 'tranphong@gmail.com', 1, 1),
(7, 'thanhquang99', '123456789', 'buiquang@gmail.com', 1, 1),
(8, 'phuongle1999', '123456789', 'phuongle@gmail.com', 1, 1),
(9, 'hogiao2k2', '123456789', 'hogiao@gmail.com', 1, 1),
(10, 'chinguyenthi', '123456789', 'chinguyen@gmail.com', 1, 1),
(11, 'tamtru45', '123456789', 'nguyentam@gmail.com', 1, 1),
(129, 'thanhtienpro', '123456789', 'abc@gmail.com', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD KEY `FK_TK_KH` (`USERID_KH`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `FK_TK_NV` (`USERID_NV`);

--
-- Chỉ mục cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`USERID`),
  ADD KEY `taikhoan_quyen` (`MAQUYEN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `iddanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `MAKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `MANV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD CONSTRAINT `khachhang_ibfk` FOREIGN KEY (`USERID_KH`) REFERENCES `tbl_taikhoan` (`USERID`);

--
-- Các ràng buộc cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk` FOREIGN KEY (`USERID_NV`) REFERENCES `tbl_taikhoan` (`USERID`);

--
-- Các ràng buộc cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD CONSTRAINT `taikhoan_quyen` FOREIGN KEY (`MAQUYEN`) REFERENCES `tbl_quyen` (`MAQUYEN`);
COMMIT;


