-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2019 pada 02.58
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolentok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `nama`, `tanggal`, `komentar`, `id_wisata`, `judul`) VALUES
(1, 'Yuan', '28-10-19', 'Bagus sekali slur tiketnya sangat murah', 2, ''),
(2, 'Leosko', '28-10-19', 'Njir disini dingin slurr', 3, ''),
(3, 'Leosko', '28-10-19', 'Ashiap santuy', 4, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`email`, `username`, `password`, `status`) VALUES
('admin@gmail.com', 'admin', '505fa65fa829d4a7770eb25ec4ce5e64', 'admin'),
('ananta@gmail.com', 'Ananta ', '3ead224d1ff6392d73ad9f7fab4316b8', 'user'),
('fadhil@gmail.com', 'Fadhil', '0d1ad02e3be22e4a377fd263d0d748be', 'user'),
('hanafi@gmail.com', 'Hanafi', '6420d4fb983f7bf2e591972df30af69b', 'user'),
('tegar@gmail.com', 'Tegar', 'ea745d643b4382ac1d1738a5aa5dfe82', 'user'),
('user@gmail.com', 'Leosko', '6cc0e9066c7eb9eb20347f2f952558a3', 'user'),
('yuan@gmail.com', 'Yuan', '5b295fe4c6a28f2ba934091d9984f968', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id` int(11) NOT NULL,
  `image` varchar(365) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tautan` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id`, `image`, `judul`, `deskripsi`, `tautan`, `status`, `tanggal`, `nama`) VALUES
(2, 'KampungWarnaWarni.jpg', 'Kampung Warna Warni Jodipan', 'Inilah salah satu destinasi wisata di Malang yang menjadi favorit dan destinasi wajib para wisatawan. Destinasi ini berupa kampung wisata yang unik dengan desain warna-warninya yang mempunyai spot-spot menarik untuk berfoto.\r\n\r\nAdalah Kampung Wisata Jodipan, kampung wisata pertama di Kota Malang yang sederetan rumah warga di tepi Sungai Brantas yang menampilkan dinding aneka warna yang tidak monoton. Kampung ini terletak di Jodipan berada di tepi Sungai Brantas. Kampung Wisata Jodipan ini biasanya dijuluki Kampung Tridi atau Kampung Warna Warni.', 'https://goo.gl/maps/2dm33dKF6qbXiQR96', 1, '2019-10-28', 'admin'),
(10, 'PantaiKedungCeleng.jpg', 'Pantai Kedung Celeng', 'Ini Pantai Kedung celeng yang berada di Donomulyo, Kami ke sana pada saat liburan kelas 10', 'https://goo.gl/maps/X1aNQBL4rUbLYSpH8', 1, '29-10-19', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
