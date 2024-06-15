-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2024 pada 06.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(11) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_jeniscuti` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_mulai` varchar(10) NOT NULL,
  `tgl_selesai` varchar(10) NOT NULL,
  `lama_cuti` int(11) NOT NULL,
  `tgl_masuk` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `alasan` text DEFAULT NULL,
  `sisa_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `tgl`, `id_jeniscuti`, `id_karyawan`, `tgl_mulai`, `tgl_selesai`, `lama_cuti`, `tgl_masuk`, `keterangan`, `status`, `alasan`, `sisa_cuti`) VALUES
(23, '2024-01-11', 1, 14, '2024-01-15', '2024-01-16', 1, '2024-01-17', 'liburan', 'Diterima', 'Alasan..itdtdtt', 11),
(24, '2024-01-11', 1, 8, '2024-01-16', '2024-01-18', 2, '2024-01-19', 'Hshdbdbd', 'Ditolak', 'Alasan..', 12),
(25, '2024-01-11', 1, 11, '2024-01-22', '2024-01-24', 2, '2024-01-26', 'izin libur ke bali', 'Pending', NULL, 12),
(26, '2024-01-11', 1, 7, '2024-01-25', '2024-01-26', 1, '2024-01-29', 'Ffgvcff', 'Pending', NULL, 12),
(27, '2024-01-11', 1, 14, '2024-01-15', '2024-01-18', 3, '2024-01-19', 'balik kampung', 'Pending', NULL, 11),
(28, '2024-01-11', 1, 1, '2024-01-23', '2024-01-25', 2, '2024-01-26', 'izin keluar kota', 'Diterima', 'ya saya terima', 10),
(29, '2024-01-12', 9, 17, '2024-01-15', '2024-01-18', 3, '2024-01-19', 'Nikah siri', 'Diterima', 'oke', 9),
(30, '2024-01-12', 2, 12, '2024-01-15', '2024-01-16', 1, '2024-01-17', 'Izin nikah', 'Diterima', 'ok saya terima', 11),
(31, '2024-01-15', 1, 1, '2024-01-16', '2024-01-17', 1, '2024-01-18', 'gghjnk', 'Diterima', 'Alasan..', 9),
(32, '2024-02-03', 1, 11, '2024-02-03', '2024-02-05', 2, '2024-02-06', 'KJHkhasd', 'Pending', NULL, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff Gudang'),
(2, 'Asisten Manager Administrasi'),
(3, 'PCB'),
(4, 'Accounting Manager'),
(5, 'Staff Accounting'),
(6, 'Staff Purchasing'),
(7, 'HRD'),
(8, 'Staff Administrasi'),
(13, 'Manager'),
(14, 'Staff HRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jeniscuti`
--

CREATE TABLE `tbl_jeniscuti` (
  `id_jeniscuti` int(11) NOT NULL,
  `nama_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jeniscuti`
--

INSERT INTO `tbl_jeniscuti` (`id_jeniscuti`, `nama_cuti`) VALUES
(1, 'Cuti Tahunan'),
(2, 'Cuti Pernikahan Pekerja'),
(3, 'Cuti Istri Pekerja Melahirkan/Gugur Kandungan'),
(4, 'Cuti Pernikahan Anak Pekerja'),
(5, 'Cuti Pernikahan Saudara Kandung Pekerja'),
(8, 'Cuti  Keluarga/Saudara Meninggal Dunia'),
(9, 'Cuti Khitanan/Baptis Anak Pekerja'),
(11, 'Cuti lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(14) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kuota_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama`, `nik`, `gender`, `id_jabatan`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `agama`, `kuota_cuti`) VALUES
(1, 'Tika Dini Marstella', '870980', 'Laki-Laki', 7, 'Serang', '1999-09-10', 'PCI Blok E39s', '08776662822', 'Islam', 9),
(7, 'Rizky', '800134', 'Laki-Laki', 1, 'Serang', '1985-03-20', 'Perum Taman Krakatau Kel. Waringinkurung, Kec. Waringinkurung, Kab. Serang', '081992187424', 'Islam', 12),
(8, 'Winda Fitriani', '800124', 'Perempuan', 2, 'Serang', '1996-03-20', 'Banten Indah Permai Blok G4/25, RT/RW 007/019, Kel. Unyur, Kec. Serang, Banten', '087666272', 'Islam', 12),
(9, 'Acep Derby', '800221', 'Laki-Laki', 3, 'Malang', '1996-02-22', 'Banten Indah Permai Blok G4/25, RT/RW 007/019, Kel. Unyur, Kec. Serang, Banten', '087666272', 'Islam', 12),
(10, 'M. Rifqy Rusdiansyah', '850018', 'Laki-Laki', 6, 'Jakarta', '1999-07-12', 'Jl. Raya Wijaya Blok E3 No.3, Komplek Ciceri Permai IV, RT 01, RW 20, Kel. Serang, Kec. Cipare, Serang Banten 42177', '0899977262', 'Islam', 12),
(11, 'Nurul Ainal Mardhiyah', '850023', 'Perempuan', 4, 'Serang', '1982-11-17', 'Kavling Blok C. Jalan Kakap No. 14 Kel. Masigit, KEc. Jombang, Cilegon, Banten 42414', '0899977262', 'Islam', 12),
(12, 'Octaviani Maulida', '891829', 'Perempuan', 5, 'Bandung', '1995-10-12', 'Jl. Krakatau', '0892725522', 'Islam', 11),
(13, 'Tb. Aditya', '887618', 'Laki-Laki', 6, 'Jakarta', '1999-07-12', 'Jl. Anyer', '0897727772', 'Islam', 12),
(14, 'Astri Kurniasih', '800302', 'Laki-Laki', 8, 'Serang', '1998-07-12', 'Link. Pegantungan Baru', '08928828272', 'Islam', 11),
(15, 'Fadilah', '800542', 'Perempuan', 13, 'Lampung', '1990-08-12', 'Kp. Dukuh Dalem RT/RW 015/007 Kel. Sukadalem, Kec. Waringinkurung, Kab. Serang', '08776662822', 'Islam', 12),
(17, 'Maysya Anggraeni', '21010002', 'Perempuan', 3, 'Cilegon', '2002-05-03', 'Korea', '08972662272', 'Islam', 9),
(20, 'Tes Daftar Karyawan', '11292', 'Perempuan', 2, 'Lebak', '2023-12-19', 'Lebak, Banten', '08593820380', 'Hindu', 12),
(21, 'Tika Dini Marstella', '870980', 'Perempuan', 7, 'Serang', '1999-09-10', 'PCI Blok E39s', '08776662822', 'Islam', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl_pelaporan` varchar(10) NOT NULL,
  `periode_laporan` varchar(20) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `tgl_pelaporan`, `periode_laporan`, `file`) VALUES
(13, '2024-02-03', 'Februari 2024', 'Reporting_2024_Februari.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `id_karyawan`, `level`) VALUES
(1, 'hrd@gmail.com', '123', 1, 1),
(2, 'manager@gmail.com', '123', 15, 2),
(3, '800124', '123', 8, 0),
(4, '800221', '123', 9, 0),
(5, '850018', '123', 10, 0),
(6, '850023', '123', 11, 0),
(7, '891829', '123', 12, 0),
(8, '887618', '123', 13, 0),
(9, '800302', '123', 14, 0),
(10, '800134', '123', 7, 0),
(11, 'maysya03', '123', 16, 0),
(12, '21010002', '123', 17, 0),
(15, 'tes01', '123', 20, 0),
(16, '870980', '123', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_jeniscuti`
--
ALTER TABLE `tbl_jeniscuti`
  ADD PRIMARY KEY (`id_jeniscuti`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_jeniscuti`
--
ALTER TABLE `tbl_jeniscuti`
  MODIFY `id_jeniscuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
