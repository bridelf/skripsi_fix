-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 09.04
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_kas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_umum`
--

CREATE TABLE `kas_umum` (
  `id` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` text NOT NULL,
  `bln` text NOT NULL,
  `thn` text NOT NULL,
  `jenis_kas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kas_umum`
--

INSERT INTO `kas_umum` (`id`, `masuk`, `keluar`, `uraian`, `tanggal`, `bln`, `thn`, `jenis_kas`) VALUES
(13, 500000, 0, 'Pemasukan harian', '2022-12-25', '12', '2022', 'masuk'),
(17, 300000, 0, 'Pemasukan harian', '2022-12-19', '12', '2022', 'masuk'),
(19, 200000, 0, 'Pemasukan harian', '2022-06-02', '06', '2022', 'masuk'),
(23, 700000, 0, 'Pemasukan harian', '2022-12-30', '12', '2022', 'masuk'),
(28, 200000, 0, 'Pemasukan harian', '2023-02-15', '02', '2023', 'masuk'),
(31, 400000, 0, 'Pemasukan harian', '2023-02-09', '02', '2023', 'masuk'),
(35, 300000, 0, 'Pemasukan harian', '2022-06-26', '06', '2022', 'masuk'),
(38, 300000, 0, 'Pemasukan harian', '2023-01-29', '01', '2023', 'masuk'),
(40, 200000, 0, 'Pemasukan harian', '2023-05-05', '05', '2023', 'masuk'),
(43, 700000, 0, 'Pemasukan harian', '2023-04-01', '04', '2023', 'masuk'),
(48, 200000, 0, 'Pemasukan harian', '2022-12-28', '12', '2022', 'masuk'),
(49, 600000, 0, 'Pemasukan harian', '2023-03-12', '03', '2023', 'masuk'),
(53, 500000, 0, 'Pemasukan harian', '2023-04-21', '04', '2023', 'masuk'),
(62, 600000, 0, 'Pemasukan harian', '2023-04-29', '04', '2023', 'masuk'),
(65, 700000, 0, 'Pemasukan harian', '2023-05-13', '05', '2023', 'masuk'),
(74, 300000, 0, 'Pemasukan harian', '2023-02-10', '02', '2023', 'masuk'),
(77, 600000, 0, 'Pemasukan harian', '2023-02-06', '02', '2023', 'masuk'),
(86, 500000, 0, 'Pemasukan harian', '2022-05-29', '05', '2022', 'masuk'),
(95, 300000, 0, 'Pemasukan harian', '2023-04-06', '04', '2023', 'masuk'),
(98, 300000, 0, 'Pemasukan harian', '2022-12-28', '12', '2022', 'masuk'),
(100, 200000, 0, 'Pemasukan harian', '2023-01-01', '01', '2023', 'masuk'),
(108, 200000, 0, 'Pemasukan harian', '2023-01-18', '01', '2023', 'masuk'),
(111, 600000, 0, 'Pemasukan harian', '2023-04-16', '04', '2023', 'masuk'),
(137, 0, 300000, 'Beli Tusu', '2023-03-22', '03', '2023', 'keluar'),
(138, 0, 700000, 'Uang Air', '2023-03-06', '03', '2023', 'keluar'),
(146, 0, 400000, 'Uang Air', '2022-12-23', '12', '2022', 'keluar'),
(150, 0, 700000, 'Beli Tusu', '2023-01-27', '01', '2023', 'keluar'),
(152, 300000, 0, 'tesssssssss', '2023-06-18', '06', '2023', 'masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Hallo Admin', 'admin', '$2y$10$Iz.rGKC6Clb2iMEOlgj23eOyHJpf0hEV.Wzop8lbzntTXPCHrkdpG', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `logo` text NOT NULL,
  `ukuran_logo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id`, `nama`, `logo`, `ukuran_logo`) VALUES
(1, 'Buku Kas', 'book.png', 300);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kas_umum`
--
ALTER TABLE `kas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kas_umum`
--
ALTER TABLE `kas_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
