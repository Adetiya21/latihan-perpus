-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Agu 2021 pada 14.58
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'jwd', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Tidak Meminjam','Meminjam') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('AG001', 'Adetiya', 'Pria', 'Jalan Karet', 'Meminjam', 'AG002.png'),
('AG002', 'Riki', 'Pria', 'Jalan Semangka', 'Meminjam', 'AG002.png'),
('AG003', 'Siti', 'Wanita', 'Jalan Nangka', 'Meminjam', 'AG002.png'),
('AG004', 'Susanto', 'Pria', 'Jalan Mentimun', 'Tidak Meminjam', 'AG002.png'),
('AG005', 'Fatimah', 'Wanita', 'Jalan Pisang', 'Tidak Meminjam', 'AG002.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `qty` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `penerbit`, `tahun`, `qty`, `foto`) VALUES
('BK001', 'Riyadhus Sholihin', 'Ummul Qura', 2019, 9, ''),
('BK002', 'Bulughul Maram', 'Ummul Qura', 2020, 0, 'BK002.png'),
('BK003', 'Fadhail Amal', 'Ramadhan', 2010, 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjam` int(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `tgl_tempoKembali` date NOT NULL,
  `status` enum('Sedang Meminjam','Sudah Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjam`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `tgl_tempoKembali`, `status`) VALUES
(2, 'BK001', 'AG001', '2021-08-10', '2021-08-15 00:00:00', '2021-08-17', 'Sudah Dikembalikan'),
(7, 'BK002', 'AG001', '2021-08-17', NULL, '2021-08-24', 'Sedang Meminjam'),
(15, 'BK001', 'AG002', '2021-08-16', NULL, '2021-08-23', 'Sedang Meminjam'),
(16, 'BK001', 'AG003', '2021-08-20', '2021-08-20 14:28:09', '2021-08-27', 'Sedang Meminjam');

--
-- Trigger `tb_pinjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `tb_pinjaman` FOR EACH ROW BEGIN
	UPDATE tb_buku SET qty=qty-1
    where id_buku=NEW.id_buku;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_pinjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
