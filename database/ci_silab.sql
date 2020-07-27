-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2020 pada 07.04
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_silab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `id_detail_peminjaman` int(11) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `spesifikasi` varchar(500) NOT NULL,
  `tahun_alat` int(11) NOT NULL,
  `harga_alat` int(11) NOT NULL,
  `status` char(20) NOT NULL,
  `alat_image` varchar(100) NOT NULL,
  `kondisi_alat` varchar(30) NOT NULL,
  `kalibrasi_alat` varchar(30) NOT NULL,
  `jumlah_alat` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`) VALUES
(1, 'SISTEM INFORMASI PEMINJAMAN LABORATORIUM', 'member.png', 'faticon.png', 'teknikgeomatika@gmail.com', '0895367081854', 'Jalan Gajah Mada', 'https://www.facebook.com/teknikgeomatika', 'https://www.instagram.com/teknikgeomatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_kembali` int(11) NOT NULL,
  `kondisi_alat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', ''),
(2, 'Member', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `id_role`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `photo`, `created_on`, `last_login`, `active`) VALUES
(1, 1, 'Administrator', '$2y$10$q0JidQXVcG/yEQZWlg7yZ.bDY8kd17iQG/cQuuLX6Aw/Ko7oCv9Yy', 'Admin', '', 'admin@gmail.com', '087326876543', 'default.jpg', '2020-07-20 08:02:07', '2020-07-20 01:02:07', 1),
(2, 2, 'ilham', '$2y$10$dbCI6oTk1dMZ0721fa1m1OjODTUgmH8FEpsZUraIxEJFyylO5RLF6', 'ilham', 'kurniawan', 'ilham@gmail.com', '082134516765', 'default.jpg', '2020-07-20 09:00:08', '2020-07-20 02:19:12', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`) USING BTREE,
  ADD UNIQUE KEY `id_pengembalian` (`id_pengembalian`,`id_detail_peminjaman`),
  ADD KEY `id_detail_peminjaman` (`id_detail_peminjaman`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `alat_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`),
  ADD CONSTRAINT `alat_ibfk_2` FOREIGN KEY (`id_detail_peminjaman`) REFERENCES `detail_peminjaman` (`id_detail_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
