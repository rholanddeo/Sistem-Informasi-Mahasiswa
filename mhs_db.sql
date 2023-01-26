-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 07.31
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `logins`
--

CREATE TABLE `logins` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logins`
--

INSERT INTO `logins` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `client` text NOT NULL,
  `leader` text NOT NULL,
  `email` text NOT NULL,
  `cover_img` text NOT NULL,
  `jurusan` text NOT NULL,
  `semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `client`, `leader`, `email`, `cover_img`, `jurusan`, `semester`) VALUES
(26, '203010503019', '3,51', 'Rholand', 'rholanddeo210@gmail.com', '1673059440_DSC_0193-removebg-preview.png', 'Teknik Informatika', '6'),
(27, '303010503017', '3,51', 'Deo', 'rholanddeo210@gmail.com', '1673059620_DSC_0193-removebg-preview.png', 'Teknik Elektro', '6'),
(29, '402059802011', '3,8', 'Eka', 'rholanddeo210@gmail.com', '1673060040_DSC_0193-removebg-preview.png', 'Teknik Informatika', '7'),
(30, '203010503019', '4', 'Putra', 'rholanddeo210@gmail.com', '1674714480_DSC_0193 (1).jpg', 'Teknik Informatika', '8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
