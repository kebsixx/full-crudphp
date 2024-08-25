-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(2, 'ilham', 'admin', 'adminkedua@email.com', '$2y$10$xRxst9InmhYev.coMQQkXedFNz/wZoksnpTl1JAJYwyaautUNNmj2', '1'),
(3, 'Operator Siswa', 'opsiswa', 'putrain@gmail.com', '$2y$10$M9FcmRBw9Jial3XwY044h.2T/WLQ42Sc5sb1lPMF9UVEzEt4jkqjy', '3'),
(4, 'Yanto Suryadi', 'adminyanto', 'yantogeming@gmail.com', '$2y$10$.fYBK4mdbW3uEmxsTl4hMOweKFgBM5r71h8.uOqYokmBOOMrsibmW', '1'),
(5, 'OP Barang', 'opbarang', 'opbarang@email.com', '$2y$10$wcbRfXzuf/bwfK5yxvOzEeggbBIn/EHaMXlZtsZRUFF.Cm7pHZlti', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(3, 'Meja', '15', '1000000', '', '2024-08-19 02:24:44'),
(12, 'Kursi', '50', '400000', '', '2024-08-14 13:36:42'),
(14, 'Mouse', '35', '350000', '', '2024-08-19 03:34:39'),
(15, 'Laptop', '4', '12000000', '', '2024-08-22 08:24:18'),
(16, 'Komputer', '4', '12000000', '', '2024-08-22 08:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `jurusan`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'Samsul', 'Teknik Pemesinan', 'Laki-laki', '0857462388', '', 'samsulaja@gmail.com', 'foto.jpg'),
(2, 'Budi', 'Teknik Komputer dan Jaringan', 'Laki-laki', '087544658734', '', 'budiono@yahoo.com', 'foto.jpg'),
(3, 'Indi', 'Teknik Logistik', 'Perempuan', '08991245712', 'Jl. Angkasa Raya No. 38 Bandung', 'indigo@icloud.com', 'indi.jpg'),
(4, 'lina', 'Rekayasa Perangkat Lunak', 'Perempuan', '087623874268', 'Jl. Raden Rahmat No 19 Surabaya', 'lalina@icloud.com', '66c47a80a1d03.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
