-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 08.54
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_homestay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `nama_room` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas1` text NOT NULL,
  `fasilitas2` text NOT NULL,
  `fasilitas3` text NOT NULL,
  `fasilitas4` text NOT NULL,
  `fasilitas5` text NOT NULL,
  `fasilitas6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama_paket`, `nama_room`, `harga`, `deskripsi`, `fasilitas1`, `fasilitas2`, `fasilitas3`, `fasilitas4`, `fasilitas5`, `fasilitas6`) VALUES
(6, 'paket a.jpg', 'PAKET A', 'Standart Room', '250000', 'Standar kamar adalah pilihan penginapan dengan fasilitas dasar seperti tempat tidur, kamar mandi pribadi, dan area penyimpanan. Meskipun sederhana, mereka menyediakan kenyamanan yang memadai untuk penginapan yang terjangkau.', 'Tempat tidur dengan linen bersih', 'Kamar mandi pribadi dengan shower atau bak mandi', 'Area penyimpanan untuk barang-barang pribadi', 'Fasilitas tambahan seperti televisi dan meja kerja (tergantung pada properti)', 'Akses Wi-Fi (tergantung pada properti)', 'Fasilitas untuk membuat kopi atau teh (tergantung pada properti)'),
(7, 'paket b.jpg', 'PAKET B', 'Deluxe Room', '600000', 'Kamar deluxe adalah opsi penginapan yang lebih mewah daripada standar kamar. Biasanya lebih luas dan dilengkapi dengan fasilitas tambahan seperti area duduk yang nyaman, akses ke layanan kamar 24 jam, dan dekorasi yang lebih berkelas. ', 'Tempat tidur ukuran besar dengan linen berkualitas', 'Kamar mandi pribadi dengan shower, bak mandi, dan perlengkapan mandi yang mewah', 'Area duduk yang nyaman', 'Fasilitas pembuat kopi dan teh yang lengkap', 'Dekorasi interior yang lebih berkelas', 'Pemandangan yang menarik atau lokasi yang strategis di dalam properti'),
(11, 'paket d.jpg', 'PAKET C', 'Luxury Room', '1250000', 'Kamar mewah adalah pilihan penginapan paling eksklusif dan mewah dalam sebuah hotel atau resort. Mereka menawarkan ruang yang luas, dekorasi bergaya, fasilitas terbaik, dan layanan khusus seperti layanan butler pribadi dan akses ke lounge eksekutif. ', 'Tempat tidur king atau queen size dengan linen berkualitas tinggi', 'Kamar mandi mewah dengan fasilitas spa, bak mandi berukuran besar, dan perlengkapan mandi bergengsi', 'Ruang tamu terpisah dengan perabotan yang mewah', 'Balkon pribadi dengan pemandangan yang menakjubkan', 'Akses Kolam renang 24 jam', 'Layanan butler pribadi untuk memenuhi kebutuhan tamu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `password`) VALUES
(1, 'budi', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kalender`
--

CREATE TABLE `tb_kalender` (
  `id_kalender` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kalender`
--

INSERT INTO `tb_kalender` (`id_kalender`, `nama`, `check_in`, `check_out`) VALUES
(10, 'budi', '2024-05-15', '2024-05-16'),
(12, 'vilary', '2024-05-16', '2024-05-17'),
(13, 'anjay', '2024-05-30', '2024-05-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `berapa_hari` int(11) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `check_in`, `check_out`, `total`, `email`, `berapa_hari`, `paket`, `nomer`, `nama_kamar`, `status`) VALUES
(30, 'ditong', '2024-05-08', '2024-05-09', '1250000', 'ditong@gmail.com', 1, 'PAKET C', '0823131232', 'dita penolong', 'Tidak Lunas'),
(31, 'azizah', '2024-05-21', '2024-05-23', '1800000', 'azizah@gmail.com', 3, 'PAKET B', '081232132', 'jeles', 'Lunas'),
(32, 'anifa', '2024-05-01', '2024-05-04', '1000000', 'anifa@gmail.com', 4, 'PAKET A', '0812312321', 'mades', 'Tidak Lunas'),
(35, 'sambo', '2024-06-06', '2024-06-10', '5000000', 'sambo@gmail.com', 4, 'PAKET C', '0812321323', 'loli', 'Tidak Lunas'),
(36, 'hafizh', '2024-05-16', '2024-05-18', '1200000', 'hafizh@gmail.com', 2, 'PAKET B', '0812321321', 'bombe', 'Tidak Lunas'),
(37, 'sandy', '2024-05-19', '2024-05-20', '1200000', 'sandy@gmail.com', 2, 'PAKET B', '012312312', 'sambo', 'Tidak Lunas'),
(38, 'alvy', '2024-05-22', '2024-05-23', '250000', 'afikusuma1234@gmail.com', 1, 'PAKET A', '0812312312', 'Standart Room', 'Tidak Lunas'),
(39, 'rembo', '2024-05-15', '2024-05-18', '1800000', 'afikusuma1234@gmail.com', 3, 'PAKET B', '0812312312', 'Deluxe Room', 'Tidak Lunas'),
(40, 'anjay', '2024-05-30', '2024-06-02', '3750000', 'afikusuma1234@gmail.com', 3, 'PAKET C', '0821312321', 'Luxury Room', 'Lunas'),
(41, 'jeles', '2024-05-23', '2024-05-25', '1200000', 'azizahsphiaa@gmail.com', 2, 'PAKET B', '0812381232', 'Deluxe Room', 'Lunas'),
(42, 'atok', '2024-05-29', '2024-05-31', '750000', '221080200117@umsida.ac.id', 3, 'PAKET A', '081232132', 'Standart Room', 'Tidak Lunas'),
(43, 'wahyu', '2024-05-15', '2024-05-17', '3750000', '221080200117@umsida.ac.id', 3, 'PAKET C', '0812312312', 'Luxury Room', 'Tidak Lunas'),
(44, 'kusuma', '2024-05-27', '2024-05-29', '3750000', '221080200117@umsida.ac.id', 3, 'PAKET C', '0812321321', 'Luxury Room', 'Tidak Lunas'),
(45, 'muhammad', '2024-05-22', '2024-05-28', '1750000', '221080200117@umsida.ac.id', 7, 'PAKET A', '0812321312', 'Standart Room', 'Tidak Lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_kalender`
--
ALTER TABLE `tb_kalender`
  ADD PRIMARY KEY (`id_kalender`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kalender`
--
ALTER TABLE `tb_kalender`
  MODIFY `id_kalender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
