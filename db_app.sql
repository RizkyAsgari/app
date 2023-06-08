-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 13.39
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(27, '11', 'INV-73775547', 1, 'Sepatu Converse', 1, 100000),
(28, '12', 'INV-101406705', 6, 'nikon', 1, 2000000),
(29, '12', 'INV-39374557', 7, 'DJI RSC 2 Pro Combo - 3-Axis Gimbal Stabilizer', 1, 8800000),
(30, '12', 'INV-59984740', 6, 'nikon', 1, 2000000),
(31, '12', 'INV-103501286', 7, 'DJI RSC 2 Pro Combo - 3-Axis Gimbal Stabilizer', 1, 8800000),
(32, '12', 'INV-19889878', 9, 'Lampu Studio Softbox E27 60x60cm', 1, 1150000),
(33, '12', 'INV-19889878', 8, 'LENSA SONY E PZ 18-105MM F4 G OSS', 1, 5500000),
(34, '12', 'INV-19889878', 7, 'DJI RSC 2 Pro Combo - 3-Axis Gimbal Stabilizer', 1, 8800000),
(35, '12', 'INV-19889878', 10, 'Tripod Camera DSLR VIT 234', 1, 332000);

--
-- Trigger `cart`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	UPDATE product SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(6, 'nikon', 'bagusasd', 'kamera', 2000000, 0, 'nikon-d3400.jpg'),
(7, 'DJI RSC 2 Pro Combo - 3-Axis Gimbal Stabilizer', 'DJI Ronin-SC2 Combo  Desain lipat DJI Ronin-SC2 memberikan kemudahan portabel dan penyimpanan untuk perjalanan, bersanding dengan pilihan pengambilan gambar yang diperluas. Saat dilipat, DJI Ronin-SC2 lebih kecil dari selembar kertas A5, menjadikannya por', 'gimbal', 8800000, -2, 'gimbal.jpg'),
(8, 'LENSA SONY E PZ 18-105MM F4 G OSS', 'PRODUCT HIGHLIGHTS - E-Mount Lens/APS-C Format - Two ED & Three Aspherical Elements - Power Zoom Lever; Handycam Technology - Optical SteadyShot Image Stabilization - Seven-Blade Circular Diaphragm - Focal Length 18 to 105mm (35mm Equivalent Focal Length:', 'lensa', 5500000, 0, 'lensa.jpg'),
(9, 'Lampu Studio Softbox E27 60x60cm', 'Untuk anda yang ingin membuka studio kecil di lokasi anda, maka paket ini cocok anda miliki. Socket E-27 adalah pilihan yang umum digunakan untuk lampu XL atau seperti lampu merk Philips, Hannoch, dll. Yang dapat anda temukan di toko elektronik di dekat r', 'lighting', 1150000, 0, 'lighting.jpeg'),
(10, 'Tripod Camera DSLR VIT 234', 'Takara VIT-234 Video LightWeight Tripod Camera DSLR VIT 234 memiliki desain modern lightweight yang kuat dan ringan, tripod ini memiliki kaki dengan 4 section yang menjadikan monopod ini lebih stabil sehingga menjadikan tripod ini menjadi stabil. Selain i', 'tripod', 332000, 0, 'tripod.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `order_id` char(30) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `tracking_id` varchar(30) NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `payment_limit` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`, `avatar`) VALUES
(6, 'Helpdesk Shoppify', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'user.png'),
(11, 'rizky', 'rizky@gmail.com', '656ead03af397857bdcd84292e6a3bbd', '1', 'user.png'),
(14, 'rizky', 'qibe@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
