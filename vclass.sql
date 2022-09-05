-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2020 pada 07.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vclass`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_ajar`
--

CREATE TABLE `bahan_ajar` (
  `id_bahan_ajar` int(11) NOT NULL,
  `nama_bahan_ajar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_ajar`
--

INSERT INTO `bahan_ajar` (`id_bahan_ajar`, `nama_bahan_ajar`, `deskripsi`, `file`, `creat_at`) VALUES
(2, 'Sejarah Bahasa Indonesia', 'Pada materi ini akan menjelaskan sejarah bahasa indonesia.', 'Sejarah.pdf', 1603772109),
(3, 'Ragam Bahasa Indonesia', 'Pada materi ini akan menjelaskan penggunan bahasa indonesia yang baik dan benar sesuai tempat dan waktu.', 'Ragam_Bahasa1.pdf', 1603772137);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `nama_banner` varchar(100) NOT NULL,
  `jenis_banner` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `nama_banner`, `jenis_banner`, `gambar`, `creat_at`) VALUES
(13, 'Virtual Class', 'Welcome to', 'hello4.jpg', 1603442065),
(14, 'Elearning untuk dosen', 'Pelatihan', 'kelas.jpg', 1603442212),
(15, 'Elearning untuk mahasiswa', 'Pelatihan', 'kelas1.jpg', 1603442260);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `nama_berita` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `nama_berita`, `isi_berita`, `gambar`, `creat_at`) VALUES
(6, 'Pelatihan elearning untuk dosen', 'Pelatihan ini dilakukan untuk meningkatkan SDM bagi para mengajar untuk mengoperasikan elearning.', 'kelas.jpg', 1603772256),
(7, 'Pelatihan elearning untuk Mahasiswa', 'Pelatihan ini dilakukan untuk meningkatkan SDM bagi para mahasiswa untuk mengoperasikan elearning.', 'kelas1.jpg', 1603772283);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keunggulan`
--

CREATE TABLE `keunggulan` (
  `id_keunggulan` int(11) NOT NULL,
  `nama_keunggulan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keunggulan`
--

INSERT INTO `keunggulan` (`id_keunggulan`, `nama_keunggulan`, `deskripsi`, `creat_at`) VALUES
(3, 'Manajemen Waktu', 'VClass menggunakan metode pembelajaran elearning yang mana semua aktifitas pembelajaran dapat dilakukan secara online hal ini dapat meminimalkan waktu, karena proses bembelajaran dapat dilakukan dimana saja dan kapan saja.', 1603778401),
(4, 'Mudah Digunakan', 'VClass memiliki menu yang mudah untuk dipahami baik dari dosen maupun mahasiswa.', 1603778427),
(5, 'Bahan Ajar', 'VClass juga memudahkan dosen untuk menambahkan bahan pembelejaran dan bahan pembelajaran tersebut dapat didownload oleh para mahasiswa.', 1603778451),
(6, 'Video Pembejalaran', 'Didalam vclass dosen dapat menampilkan video dimana video tersebut dapat dijadikan sebagai informasi atau penjelasan terkait materi yang akan diberikan kepada mahasiswa, dan video tersebut dapat dinonton langsung oleh para mahasiswa.', 1603778466),
(7, 'Dokumentasi Kegiatan', 'Dosen dapat menampilkan dokumentasi pembelajaran sebagai informasi kegiatan belajar mengajar.', 1603778493);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan`
--

CREATE TABLE `panduan` (
  `id_panduan` int(11) NOT NULL,
  `nama_panduan` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panduan`
--

INSERT INTO `panduan` (`id_panduan`, `nama_panduan`, `file`, `creat_at`) VALUES
(4, 'Panduan Pengguanan (Leanding Page)', 'VClass_leanding_page.pdf', 1603773420),
(5, 'Panduan Pengguanan (Dosen)', 'VClass_dosenn.pdf', 1603777863),
(6, 'Panduan Pengguanan (Mahasiswa)', 'VClass_mahasiswa.pdf', 1603777952);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `nama_portal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link_youtube` varchar(250) NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `nama_portal`, `deskripsi`, `gambar`, `link_youtube`, `creat_at`) VALUES
(5, 'Virtual Class', 'Portal Virtual Class atau bisa disebut VClass adalah portal pembelajaran online yang memberikan pengalaman belajar yang menyenangkan, mudah, paperless dan fleksibel. Portal VClass ini dikembangkan untuk menjawab tantangan pendidikan tinggi di era digital dan Revolusi Industri 4.0. Salah satu kunci utama dalam Portal VClass adalah proses pembelajaran dapat dilaksanakan secara virtual, sama halnya dengan pembelajaran konvensional. Pembelajaran menggunakan Portal VClass memiliki unsur-unsur standar nasional pendidikan. Pembelajaran dengan memanfaatkan kecanggihan teknologi informasi ini, dapat dilakukan tanpa dibatasi oleh dimensi ruang dan waktu. Perkuliahan dapat dilakukan secara online, diantaranya seperti Video Conference, Forum, Penugasan, Quis atau Ujian, dan Akses materi.', 'vclass.jpg', 'https://www.youtube.com/watch?v=BPqN0rXiySk', 1603445717);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_lengkap`, `profesi`, `foto`, `created_at`) VALUES
(2, 'admin', '$2y$10$sELlOfNOmade2M5qGjHgVeWeKy1GmaMUHV0dna8R291ILzp5rnbJy', 'Surya Priambudi. S.Pd., M.Pd', 'Dosen', 'f11.jpg', 1603778091),
(9, 'harist', '$2y$10$1iSieUN.MWkgRcx5z8cFi.5Fg4m6Cxli4VEiyF/9XToVZuI6tARXS', 'Muhammad Harist, S.Kom., M.Sc', 'Dosen', 'f21.jpg', 1603778266);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `nama_video` varchar(100) NOT NULL,
  `embed_youtube` text NOT NULL,
  `creat_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `nama_video`, `embed_youtube`, `creat_at`) VALUES
(4, 'Sejarah Bahasa Indonesia', 'https://www.youtube.com/embed/hnLP9sUba-4', 1603433082),
(5, 'Panduan Penggunaan', 'https://www.youtube.com/embed/gz0A6mqgWyw', 1603771120);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  ADD PRIMARY KEY (`id_bahan_ajar`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `keunggulan`
--
ALTER TABLE `keunggulan`
  ADD PRIMARY KEY (`id_keunggulan`);

--
-- Indeks untuk tabel `panduan`
--
ALTER TABLE `panduan`
  ADD PRIMARY KEY (`id_panduan`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  MODIFY `id_bahan_ajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `keunggulan`
--
ALTER TABLE `keunggulan`
  MODIFY `id_keunggulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `panduan`
--
ALTER TABLE `panduan`
  MODIFY `id_panduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
