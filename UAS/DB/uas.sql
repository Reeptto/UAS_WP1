-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2025 pada 06.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'ASE10', 'Kelas Informatika', '2025-06-21 01:36:51', '2025-06-21 03:20:14'),
(2, 'OAA13', 'Kelas Managenent', '2025-07-05 04:21:52', '2025-07-05 04:22:33'),
(3, 'AIS12', 'Kelas Keuangan', '2025-07-05 04:22:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `kode_materi` varchar(50) NOT NULL,
  `nama_materi` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `pertemuan_ke` varchar(60) NOT NULL,
  `tujuan` text NOT NULL,
  `referensi` text NOT NULL,
  `media` varchar(90) NOT NULL,
  `file_path` text NOT NULL,
  `link_materi` text NOT NULL,
  `status_aktif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `kode_materi`, `nama_materi`, `deskripsi`, `matkul_id`, `pertemuan_ke`, `tujuan`, `referensi`, `media`, `file_path`, `link_materi`, `status_aktif`) VALUES
(4, 'MA002', 'Comparisson Degree', 'asdasfad', 3, 'Pertemuan 7', 'asdwwseasd', 'fsdgerf', '2', '', 'phpmyadmin', 'Aktif'),
(5, 'MA003', 'Present perfect tense', 'sdfsadfasda', 3, 'Pertemuan 3', 'adawasd', 'awdsd', 'Ebook', '', 'phpmyadmin', 'Aktif'),
(6, 'MA004', 'Pengenalan Web Programming', 'qweqwdfas', 1, 'Pertemuan 11', 'asfsafadfa', 'asdawda', 'Ebook', '', 'phpmyadmin', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Web Programming', 'Menjelaskan tentang koding website', '2025-04-12 04:35:25', NULL),
(2, 'Graphic Design', 'Menjelaskan tentang penggunaan corel', '2025-04-12 04:42:16', NULL),
(3, 'English For General Communication 2', 'Belajar bahasa inggris', '2025-07-14 02:48:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
