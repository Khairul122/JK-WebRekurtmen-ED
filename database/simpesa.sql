-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 01.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `badan_usaha`
--

CREATE TABLE `badan_usaha` (
  `id` int(11) NOT NULL,
  `nama_usaha` text NOT NULL,
  `pemilik_usaha` varchar(54) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(125) NOT NULL,
  `kecamatan` varchar(125) NOT NULL,
  `komoditas` varchar(55) NOT NULL,
  `kategori_usaha` varchar(125) NOT NULL,
  `bentuk_usaha` varchar(125) NOT NULL,
  `status_tanah_usaha` varchar(125) NOT NULL,
  `status` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `badan_usaha`
--

INSERT INTO `badan_usaha` (`id`, `nama_usaha`, `pemilik_usaha`, `alamat`, `provinsi`, `kota`, `kecamatan`, `komoditas`, `kategori_usaha`, `bentuk_usaha`, `status_tanah_usaha`, `status`) VALUES
(51, 'PT.RANGKAI UTAMA BERJAYA', 'MUHAMMAD FAIZ AKMAL', 'KOMPLEK RORINATA RESIDENCE TAHAP 7 BLOK.Y NO.10', 'Nusa Tengara Barat', 'SUMBAWA', 'SUMBAWA', 'Peternakan', 'Menengah', 'Perseroan Terbatas (PT)', 'Hak Milik', 'Telah diverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `komoditas` varchar(80) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id`, `komoditas`, `deskripsi`) VALUES
(2, 'Logam', 'Mencakup produk-produk hasil pertambangan, yang dibedakan menjadi dua yaitu, logam berharga dan logam industri.'),
(3, ' Energi', 'Berupa produk-produk tambang dan eksplorasi yang berfungsi sebagai bahan bakar. Ragam produk dari jenis komoditas ini meliputi batu bara dan minyak bumi yang dapat berupa bensin, bensin tanpa timbal, diesel, light sweet crude oil, dan brent crude oil.'),
(4, 'Pertanian', 'Berupa produk-produk hasil pertanian. Jenis komoditas ini terdiri atas dua kelompok, yaitu hasil pertanian dan hasil perhutanan. Produk pertanian mencakup beras, gandum, kedelai, jagung, kopi, gula, dan yang lainnya. Sedangkan produk perhutanan meliputi karet, rotan, sawit, kapas, dan lainnya.'),
(5, 'Peternakan', 'Yakni produk-produk hasil peternakan yang mencakup ternak hidup termasuk daging, susu, dan juga pakannya. Contohnya sapi, babi, ayam, daging sapi, daging ayam, daging babi, susu sapi, dan pakan ternak. Pada perdagangan internasional, jenis komoditas peternakan ini dijual dalam satuan pon.'),
(6, 'Jasa - Software Developer', 'JASA PEMBUATAN APLIKASI WEB,DESKTOP DAN MOBILE'),
(7, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `hak_pengguna` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_hp`, `email`, `password`, `hak_pengguna`) VALUES
(37, 'admin', '08121212131', 'admin@admin.com', 'admin', 'admin'),
(51, 'user', '08272613182', 'user@user.com', 'user', 'user'),
(52, 'icome', '081289374683', 'icome@icome.com', 'icome', 'user'),
(53, 'budi', '082165443677', 'budi@gmail.com', '12345678', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `produk` text NOT NULL,
  `satuan` varchar(64) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `produk`, `satuan`, `harga_satuan`, `id_pengguna`) VALUES
(8, 'Aplikasi Rekam Medis RS Berbasis Web', 'Modul', 25000000, 51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_usaha`
--

CREATE TABLE `rencana_usaha` (
  `id` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `saham` int(11) NOT NULL,
  `jumlah_tenaga_kerja` int(11) NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `nilai_investasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rencana_usaha`
--

INSERT INTO `rencana_usaha` (`id`, `modal`, `saham`, `jumlah_tenaga_kerja`, `nilai_produksi`, `nilai_investasi`) VALUES
(51, 2000, 200, 200, 200, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datadiri`
--

CREATE TABLE `tbl_datadiri` (
  `id_datadiri` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(120) DEFAULT NULL,
  `no_ktp` int(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_diri` int(11) DEFAULT NULL,
  `foto_pelamar` varchar(300) DEFAULT NULL,
  `role` enum('medis','non medis') NOT NULL,
  `cv` text DEFAULT NULL,
  `str` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `transkrip` text DEFAULT NULL,
  `ktp` text DEFAULT NULL,
  `surat_lamaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keahlian`
--

CREATE TABLE `tbl_keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `tingkat_keahlian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perus` varchar(120) DEFAULT NULL,
  `bidang` varchar(120) DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `persyaratan_khusus` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `nama_perus`, `bidang`, `valid_until`, `persyaratan_khusus`) VALUES
(4, 'RS.Prima Inti Medika', 'Farmasi', '2024-06-11', 'Memiliki Surat Tanda Registrasi Apoteker (STRA)\r\nPengalaman Kerja Minimal 2 tahun\r\nBersedia bekerja shift\r\nPendidikan Minimum Profesi Apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `id_datadiri` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `nama_perus` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `pendidikan_terkakhir` varchar(10) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL,
  `IPK` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengalaman`
--

CREATE TABLE `tbl_pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `nama_perusahaan` text DEFAULT NULL,
  `posisi_terakhir` varchar(100) DEFAULT NULL,
  `jobdesk` varchar(100) DEFAULT NULL,
  `penghasilan` int(20) DEFAULT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id_profile` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_ktp` int(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `no_hp` bigint(20) DEFAULT NULL,
  `status_diri` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `foto_pelamar` varchar(500) NOT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `str` varchar(300) DEFAULT NULL,
  `ijazah` varchar(300) DEFAULT NULL,
  `transkrip` varchar(300) DEFAULT NULL,
  `ktp` varchar(300) DEFAULT NULL,
  `surat_lamaran` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `badan_usaha`
--
ALTER TABLE `badan_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana_usaha`
--
ALTER TABLE `rencana_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  ADD PRIMARY KEY (`id_datadiri`);

--
-- Indeks untuk tabel `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indeks untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_datadiri` (`id_datadiri`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_pengalaman`
--
ALTER TABLE `tbl_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indeks untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  MODIFY `id_datadiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

--
-- AUTO_INCREMENT untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengalaman`
--
ALTER TABLE `tbl_pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`id_datadiri`) REFERENCES `tbl_datadiri` (`id_datadiri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
