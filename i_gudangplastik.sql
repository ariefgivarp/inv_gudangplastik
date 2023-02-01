-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2023 pada 14.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_gudangplastik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_barangkeluar`
--

CREATE TABLE `i_barangkeluar` (
  `id_bk` int(10) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_barangkeluar`
--

INSERT INTO `i_barangkeluar` (`id_bk`, `kode_transaksi`, `kode_barang`, `tgl_input`, `jumlah_keluar`, `satuan`) VALUES
(1, 'TMK-0001', 'PLA0001', '2023-01-20', 100, 'Pcs'),
(2, 'TMK-0002', 'PLA0001', '2023-01-20', 899, 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_barangmasuk`
--

CREATE TABLE `i_barangmasuk` (
  `id_bm` int(10) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_barangmasuk`
--

INSERT INTO `i_barangmasuk` (`id_bm`, `kode_transaksi`, `kode_barang`, `tgl_input`, `jumlah_masuk`, `kode_supplier`, `satuan`) VALUES
(11, 'TM-0001', 'PLA0001', '2023-01-20', 1000, 'SPR0001', 'Pcs'),
(12, 'TM-0002', 'PLA0001', '2023-01-20', 999, 'SPR0001', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_jenis`
--

CREATE TABLE `i_jenis` (
  `id_jenis` int(10) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_jenis`
--

INSERT INTO `i_jenis` (`id_jenis`, `jenis_barang`) VALUES
(1, 'Gayung'),
(3, 'Lampu'),
(4, 'Meja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_merek`
--

CREATE TABLE `i_merek` (
  `id_merek` int(10) NOT NULL,
  `nama_merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_merek`
--

INSERT INTO `i_merek` (`id_merek`, `nama_merek`) VALUES
(1, 'Lion Star'),
(2, 'Pollygon'),
(3, 'Green Leaf'),
(4, 'Tupperwear');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_plastik`
--

CREATE TABLE `i_plastik` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `nama_merek` varchar(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_plastik`
--

INSERT INTO `i_plastik` (`id_barang`, `kode_barang`, `nama_barang`, `jenis_barang`, `nama_merek`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `tgl_input`) VALUES
(2, 'PLA0001', 'Gayung Love', 'Gayung', 'Lion Star', 26000, 45000, 'Pcs', 1000, '2023-01-20'),
(4, 'PLA0002', 'Lampu 12w', 'Lampu', 'Green Leaf', 50000, 65000, 'Pcs', 0, '2023-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_supplier`
--

CREATE TABLE `i_supplier` (
  `id_supplier` int(10) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(10) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_supplier`
--

INSERT INTO `i_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(3, 'SPR0001', 'Bima Jaya', '08887123332', 'Purwokerto, Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_users`
--

CREATE TABLE `i_users` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(10) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `i_users`
--

INSERT INTO `i_users` (`id_user`, `nama_user`, `no_telp`, `alamat`, `user`, `pass`, `level`) VALUES
(1, 'admin', '082326139996', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `i_barangkeluar`
--
ALTER TABLE `i_barangkeluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indeks untuk tabel `i_barangmasuk`
--
ALTER TABLE `i_barangmasuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `i_jenis`
--
ALTER TABLE `i_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `i_merek`
--
ALTER TABLE `i_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `i_plastik`
--
ALTER TABLE `i_plastik`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `i_supplier`
--
ALTER TABLE `i_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `i_users`
--
ALTER TABLE `i_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `i_barangkeluar`
--
ALTER TABLE `i_barangkeluar`
  MODIFY `id_bk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `i_barangmasuk`
--
ALTER TABLE `i_barangmasuk`
  MODIFY `id_bm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `i_jenis`
--
ALTER TABLE `i_jenis`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `i_merek`
--
ALTER TABLE `i_merek`
  MODIFY `id_merek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `i_plastik`
--
ALTER TABLE `i_plastik`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `i_supplier`
--
ALTER TABLE `i_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `i_users`
--
ALTER TABLE `i_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
