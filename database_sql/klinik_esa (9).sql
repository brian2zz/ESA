-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2022 pada 16.34
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
-- Database: `klinik_esa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_faktur`
--

CREATE TABLE `detail_faktur` (
  `id_faktur` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `batch_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengadaan`
--

CREATE TABLE `detail_pengadaan` (
  `id_pengadaan` varchar(20) NOT NULL,
  `pabrik` varchar(255) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `CA` int(11) NOT NULL,
  `jumlah_kebutuhan_obat` int(15) NOT NULL,
  `stok_minimal` int(15) NOT NULL,
  `sisa_stok` int(15) NOT NULL,
  `CT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pengadaan`
--

INSERT INTO `detail_pengadaan` (`id_pengadaan`, `pabrik`, `id_obat`, `harga`, `CA`, `jumlah_kebutuhan_obat`, `stok_minimal`, `sisa_stok`, `CT`) VALUES
('pgd-001', 'pbk_002', 'OBT-001', 2000, 200, 100, 2, 130, 3872),
('pgd-002', 'pbk_002', 'OBT-002', 2000, 30, 20, 0, 120, 480),
('pgd-003', 'pbk_003', 'OBT-003', 9000, 680, 4, 0, 20, 2020),
('pgd-004', 'pbk_001', 'OBT-004', 6500, 219, 219, 4, 452, 1085),
('pgd-005', 'pbk_004', 'OBT-005', 14000, 411, 71, 2, 59, 1176),
('pgd-006', 'pbk_005', 'OBT-006', 15000, 79, 73, 2, 111, 444),
('pgd-007', 'pbk_006', 'OBT-008', 5900, 311, 31, 1, 169, 1387),
('pgd-008', 'pbk_003', 'OBT-011', 7000, 131, 230, 7, -81, 350);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengadaan_pbf`
--

CREATE TABLE `detail_pengadaan_pbf` (
  `id_pengadaan` int(10) NOT NULL,
  `id_PBF` int(10) NOT NULL,
  `jumlah_hari` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_resi_penjualan` int(10) NOT NULL,
  `id_resi` int(15) NOT NULL,
  `batch_no` int(15) NOT NULL,
  `jumlah_obat_dijual` int(15) NOT NULL,
  `subtotal_obat_jual` int(15) NOT NULL,
  `id_resep` int(15) NOT NULL,
  `id_detail_resep_obat` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep_obat`
--

CREATE TABLE `detail_resep_obat` (
  `id_detail_resep_obat` int(10) NOT NULL,
  `id_resep` int(10) NOT NULL,
  `id_obat` int(15) NOT NULL,
  `id_detail_resi_penjualan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `SIP_dokter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `SIP_dokter`) VALUES
('dr_001', 'Suharni', '1231231adassd123'),
('dr_002', 'Neni', '1626728'),
('dr_003', 'TIo', '1626728');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosis`
--

CREATE TABLE `dosis` (
  `id_dosis` varchar(20) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  `satuan_dosis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosis`
--

INSERT INTO `dosis` (`id_dosis`, `dosis`, `satuan_dosis`) VALUES
('dos_001', '100', 'mg'),
('dos_002', '10', 'ml');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_penerimaan_obat`
--

CREATE TABLE `faktur_penerimaan_obat` (
  `id_faktur` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_pembayaran` varchar(50) NOT NULL,
  `jumlah_total` int(10) NOT NULL,
  `diskon` int(10) NOT NULL,
  `ppn` int(20) NOT NULL,
  `jumlah_dibayarkan` int(20) NOT NULL,
  `id_pengadaan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(10) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
('gol-001', 'Bebas'),
('gol-002', 'Bebas Terbatas'),
('gol-003', 'Keras'),
('gol-004', 'Terbatas'),
('gol-005', 'Keras Terbatas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang_obat`
--

CREATE TABLE `gudang_obat` (
  `batch_no` int(10) NOT NULL,
  `tanggal_batch_diterima` date NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `expired_date` date NOT NULL,
  `sisa_stock_batch` int(15) NOT NULL,
  `status_continue` tinyint(1) NOT NULL,
  `id_obat` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandungan`
--

CREATE TABLE `kandungan` (
  `id_kandungan` varchar(11) NOT NULL,
  `nama_kandungan` varchar(30) NOT NULL,
  `dosis_kandungan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandungan`
--

INSERT INTO `kandungan` (`id_kandungan`, `nama_kandungan`, `dosis_kandungan`) VALUES
('knd_001', 'Acetylcysteine', '200mg'),
('knd_002', 'Acyclovir', '200mg'),
('knd_003', 'Acyclovir', '400mg'),
('knd_004', 'Carbazochorme Sodium Sulfat', ''),
('knd_005', 'Attapulgit', '600mg'),
('knd_006', 'Pectin', '50mg'),
('knd_007', 'Paracetamol', '500mg'),
('knd_008', 'Multivitamin', ''),
('knd_009', 'Vitamin C', ''),
('knd_010', 'Bromhexsin', '10mg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandungan_obat`
--

CREATE TABLE `kandungan_obat` (
  `id_kandungan_obat` varchar(255) NOT NULL,
  `id_kandungan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandungan_obat`
--

INSERT INTO `kandungan_obat` (`id_kandungan_obat`, `id_kandungan`) VALUES
('OBT-006-K', 'knd_004'),
('OBT-003-K', 'knd_007'),
('OBT-005-K', 'knd_007'),
('OBT-001-K', 'knd_004'),
('OBT-001-K', 'knd_001'),
('OBT-008-K', 'knd_001'),
('OBT-008-K', 'knd_004'),
('OBT-008-K', 'knd_007'),
('OBT-004-K', 'knd_003'),
('OBT-002-K', 'knd_004'),
('OBT-010-K', 'knd_004'),
('OBT-010-K', 'knd_006'),
('OBT-011-K', 'knd_005'),
('OBT-011-K', 'knd_002'),
('OBT-012-K', 'knd_003'),
('OBT-012-K', 'knd_007'),
('OBT-013-K', 'knd_007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('ktg_001', 'Analgesik'),
('ktg_002', 'Antipiretik'),
('ktg_003', 'Antiinflamasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_opnam`
--

CREATE TABLE `laporan_opnam` (
  `id_laporan` int(11) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `jumlah_penerimaan` int(20) DEFAULT NULL,
  `jumlah_pengeluaran` int(20) DEFAULT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_opnam`
--

INSERT INTO `laporan_opnam` (`id_laporan`, `id_obat`, `jumlah_penerimaan`, `jumlah_pengeluaran`, `tanggal`) VALUES
(2, 'OBT-004', 40, 20, '17 September, 2022'),
(3, 'OBT-007', 40, 20, '17 September, 2022'),
(4, 'OBT-008', NULL, 20, '17 September, 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_stok`
--

CREATE TABLE `log_stok` (
  `id_log` int(10) NOT NULL,
  `tanggal_log` date NOT NULL,
  `batch_no` int(15) NOT NULL,
  `stok_awal` int(15) NOT NULL,
  `jenis_log_tambah` tinyint(1) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `balance` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `ID` varchar(10) NOT NULL,
  `nama_dagang_obat` varchar(50) NOT NULL,
  `id_obat_kandungan` varchar(30) NOT NULL,
  `dosis_obat` varchar(30) DEFAULT NULL,
  `satuan_obat` varchar(30) NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  `id_golongan` varchar(30) NOT NULL,
  `id_pabrik` varchar(255) NOT NULL,
  `tanggal_beli` varchar(255) NOT NULL,
  `tanggal_expired` varchar(255) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `expired` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`ID`, `nama_dagang_obat`, `id_obat_kandungan`, `dosis_obat`, `satuan_obat`, `id_kategori`, `id_golongan`, `id_pabrik`, `tanggal_beli`, `tanggal_expired`, `harga_beli`, `harga_jual`, `stok`, `status`, `expired`) VALUES
('OBT-001', 'Acetylcysteine', 'OBT-001-K', '200mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '14 June, 2022', '12 July, 2023', 10000, 11000, 360, 'Continue', 'true'),
('OBT-002', 'Acyclovir 200 mg', 'OBT-002-K', '200mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '9 June, 2022', '9 November, 2022', 6000, 7000, 180, 'Continue', 'false'),
('OBT-003', 'Panadol', 'OBT-003-K', '500mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '12 June, 2022', '14 June, 2022', 200000, 200000, 700, 'Continue', 'true'),
('OBT-004', 'Paramex', 'OBT-004-K', '50mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '16 June, 2022', '31 January, 2023', 8500, 10500, 731, 'Discontinue', 'true'),
('OBT-005', 'Demacolin', 'OBT-005-K', '50mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '14 June, 2022', '26 August, 2023', 12000, 13000, 1026, 'Continue', 'false'),
('OBT-006', 'Stimuno', 'OBT-006-K', '10ml', 'stn_003', 'ktg_003', 'gol-001', 'pbk_005', '15 June, 2022', '18 June, 2023', 21000, 22000, 328, 'Continue', 'false'),
('OBT-007', 'Paraflu', 'OBT-007-K', '20mg', 'stn_001', 'ktg_002', 'gol-001', 'pbk_004', '15 June, 2022', '19 November, 2022', 6000, 7000, 80, 'Continue', 'false'),
('OBT-008', 'Paramex', 'OBT-008-K', '150mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '16 June, 2022', '16 May, 2023', 12500, 14000, 460, 'Continue', 'false'),
('OBT-009', 'Stimuno', 'OBT-009-K', '25mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_001', '29 June, 2022', '30 December, 2022', 20000, 21000, 160, 'Continue', 'true'),
('OBT-010', 'Hufagrip', 'OBT-010-K', '10ml', 'stn_003', 'ktg_003', 'gol-001', 'pbk_004', '2 July, 2022', '10 November, 2022', 14000, 15000, 220, 'Continue', 'false'),
('OBT-011', 'Vitacimin-C', 'OBT-011-K', '5mg', 'stn_001', 'ktg_002', 'gol-001', 'pbk_003', '3 July, 2022', '11 October, 2022', 1000, 2000, 50, 'Continue', 'false'),
('OBT-012', 'Paramex', 'OBT-012-K', '5mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_006', '4 July, 2022', '5 December, 2022', 4500, 5000, 58, 'Continue', 'false'),
('OBT-013', 'Paramex', 'OBT-013-K', '10mg', 'stn_001', 'ktg_001', 'gol-001', 'pbk_003', '7 July, 2022', '12 August, 2023', 139, 139, 100, 'Continue', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_kandungan_detail`
--

CREATE TABLE `obat_kandungan_detail` (
  `id_kandungan` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pabrik`
--

CREATE TABLE `pabrik` (
  `id_pabrik` varchar(10) NOT NULL,
  `nama_pabrik` varchar(50) NOT NULL,
  `alamat_pabrik` text NOT NULL,
  `no_telp_pabrik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pabrik`
--

INSERT INTO `pabrik` (`id_pabrik`, `nama_pabrik`, `alamat_pabrik`, `no_telp_pabrik`) VALUES
('pbk_001', 'PT Kimia Farma', 'Jalan Raya Pakal 11A', '08657889922'),
('pbk_002', 'PT Sanbee', 'Jalan Raya Pakal 267', '0898636789'),
('pbk_003', 'PT Cahaya', 'Jalan Raya Pakal 56', '087373893903'),
('pbk_004', 'PT Henson Farma', 'Jl. Rungkut Industri III/31', '031-7865446'),
('pbk_005', 'PT. Surya Dermato Medica Lab', 'Jl. Karangpilang Barat No.200', '0898636789'),
('pbk_006', 'PT Surya', 'Jalan Raya Pakal 561', '098755788');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(15) NOT NULL,
  `jenis_pasien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbf`
--

CREATE TABLE `pbf` (
  `id_pbf` varchar(10) NOT NULL,
  `nama_PBF` varchar(50) NOT NULL,
  `nama_PIC` varchar(50) NOT NULL,
  `no_tlp_PIC` varchar(15) NOT NULL,
  `alamat_PBF` text NOT NULL,
  `no_tlp_PBF` varchar(20) NOT NULL,
  `nomer_rekening` varchar(30) NOT NULL,
  `leadtime` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pbf`
--

INSERT INTO `pbf` (`id_pbf`, `nama_PBF`, `nama_PIC`, `no_tlp_PIC`, `alamat_PBF`, `no_tlp_PBF`, `nomer_rekening`, `leadtime`) VALUES
('pbf_001', 'Novaphairin', 'April', '0876899211', 'Jalan Raya Kepatihan 245', '0876899211', '8678000', 3),
('pbf_002', 'Cahaya Permata', 'Andi', '0876899211', 'Jalan Raya Kepatihan 111', '0876899211', '8678000', 0.44),
('pbf_003', 'Indah Sanjaya', 'April', '0876537383', 'Jln. Raya Margorejo Indah Blok A-137/58', '0876537383', '8678000', 2.77),
('pbf_004', 'PT. Indofarma Global Medica', 'Nisa', '0876899211', 'Jl. Kalibokor Selatan No 152', '0876899211', '8678000', 0.78),
('pbf_005', 'ArunaJaya', 'April', '0876537383', 'Jl. Kalibokor Selatan No 11', '0876537383', '7654579', 0.97);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` int(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `id_PBF` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL,
  `jumlah_diterima` int(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga_beli` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `tanggal`, `id_PBF`, `id_obat`, `jumlah_diterima`, `harga`, `total_harga_beli`) VALUES
('trm-001', '8 June, 2022', 'pbf_001', 'OBT-001', 30, 11000, 10000),
('trm-002', '10 June, 2022', 'pbf_002', 'OBT-002', 15, 7000, 8000),
('trm-003', '15 June, 2022', 'pbf_002', 'OBT-003', 210, 9000, 110000),
('trm-004', '15 June, 2022', 'pbf_003', 'OBT-004', 117, 7000, 8500),
('trm-005', '15 June, 2022', 'pbf_004', 'OBT-005', 217, 14000, 16000),
('trm-006', '15 June, 2022', 'pbf_004', 'OBT-006', 190, 15000, 16000),
('trm-007', '16 June, 2022', 'pbf_005', 'OBT-008', 314, 5700, 7000),
('trm-008', '4 July, 2022', 'pbf_005', 'OBT-012', 41, 7000, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_opnam`
--

CREATE TABLE `penerimaan_opnam` (
  `id_penerimaanOpnam` varchar(20) NOT NULL,
  `tanggal_penerimaan` varchar(20) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `jumlah_stokMasuk` int(11) NOT NULL,
  `updated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerimaan_opnam`
--

INSERT INTO `penerimaan_opnam` (`id_penerimaanOpnam`, `tanggal_penerimaan`, `id_obat`, `jumlah_stokMasuk`, `updated`) VALUES
('P_opm_072022_002', '17 September, 2022', 'OBT-004', 20, 'true'),
('P_opm_092022_001', '17 September, 2022', 'OBT-001', 15, 'false'),
('P_opm_092022_002', '17 September, 2022', 'OBT-004', 20, 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(10) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `waktu_pengadaan` double NOT NULL,
  `leadtime` double NOT NULL,
  `pbf` varchar(20) NOT NULL,
  `jumlah_hari` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tanggal`, `waktu_pengadaan`, `leadtime`, `pbf`, `jumlah_hari`) VALUES
('pgd-001', '13 June, 2022', 20, 0.55, 'pbf_001', 30),
('pgd-002', '14 June, 2022', 20, 0.44, 'pbf_002', 30),
('pgd-003', '15 June, 2022', 3, 0.44, 'pbf_002', 30),
('pgd-004', '16 June, 2022', 7, 0.55, 'pbf_001', 30),
('pgd-005', '16 June, 2022', 3, 0.78, 'pbf_004', 30),
('pgd-006', '15 June, 2022', 7, 0.78, 'pbf_004', 30),
('pgd-007', '16 June, 2022', 5, 0.97, 'pbf_005', 30),
('pgd-008', '4 July, 2022', 2, 0.97, 'pbf_005', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `tanggal` varchar(20) NOT NULL,
  `id_dokter` varchar(20) DEFAULT NULL,
  `no_resep` varchar(20) DEFAULT NULL,
  `resep_diterima` time NOT NULL DEFAULT current_timestamp(),
  `resep_dikeluarkan` time DEFAULT NULL,
  `id_obat` varchar(50) NOT NULL,
  `ED` varchar(255) NOT NULL,
  `jumlah_keluar` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`tanggal`, `id_dokter`, `no_resep`, `resep_diterima`, `resep_dikeluarkan`, `id_obat`, `ED`, `jumlah_keluar`) VALUES
('11 June, 2022', 'dr_001', '12312341412', '19:02:50', '00:00:00', 'OBT-001', '11 June, 2022', 200),
('14 June, 2022', NULL, NULL, '12:14:13', NULL, 'OBT-002', '14 June, 2022', 30),
('16 June, 2022', 'dr_001', '30', '13:06:06', '00:00:00', 'OBT-003', '21 January, 2023', 680),
('16 June, 2022', 'dr_002', '18', '13:45:57', NULL, 'OBT-004', '31 January, 2023', 219),
('15 June, 2022', 'dr_002', NULL, '15:51:17', '09:50:32', 'OBT-005', '26 August, 2023', 17),
('15 June, 2022', NULL, NULL, '19:35:03', '19:45:05', 'OBT-006', '23 March, 2023', 79),
('16 June, 2022', 'dr_003', '14', '11:57:41', '00:00:00', 'OBT-008', '16 May, 2023', 311),
('28 June, 2022', NULL, NULL, '10:58:40', '09:50:32', 'OBT-005', '26 August, 2023', 17),
('4 July, 2022', NULL, NULL, '16:57:50', '19:45:48', 'OBT-011', '6 January, 2023', 131),
('7 July, 2022', 'dr_003', '1', '09:45:15', '09:50:32', 'OBT-005', '26 August, 2023', 17),
('7 July, 2022', 'dr_001', '1', '10:01:09', NULL, 'OBT-008', '16 May, 2023', 10),
('7 July, 2022', 'dr_001', '6', '10:17:38', NULL, 'OBT-013', '12 August, 2023', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_opnam`
--

CREATE TABLE `pengeluaran_opnam` (
  `id_pengeluaranOpnam` varchar(20) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `tanggal_pengeluaran` varchar(20) NOT NULL,
  `jumlah_stokKeluar` int(11) NOT NULL,
  `updated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran_opnam`
--

INSERT INTO `pengeluaran_opnam` (`id_pengeluaranOpnam`, `id_obat`, `tanggal_pengeluaran`, `jumlah_stokKeluar`, `updated`) VALUES
('K_opm_092022_001', 'OBT-001', '18 September, 2022', 15, 'false'),
('K_opm_092022_002', 'OBT-007', '17 September, 2022', 20, 'true'),
('K_opm_092022_003', 'OBT-008', '17 September, 2022', 20, 'true'),
('K_opm_092022_004', 'OBT-004', '17 September, 2022', 20, 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resi_penjualan`
--

CREATE TABLE `resi_penjualan` (
  `id_resi` int(10) NOT NULL,
  `tanggal_resi` date NOT NULL,
  `jumlah_total` int(15) NOT NULL,
  `tipe_pembayaran` int(15) NOT NULL,
  `diskon` int(15) NOT NULL,
  `ppn` int(15) NOT NULL,
  `total_dibayarkan` int(15) NOT NULL,
  `uang_kembalian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan_obat` varchar(10) NOT NULL,
  `nama_satuan_obat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan_obat`, `nama_satuan_obat`) VALUES
('stn_001', 'Tablet'),
('stn_002', 'Tuba'),
('stn_003', 'Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_obat_detail`
--

CREATE TABLE `satuan_obat_detail` (
  `id_obat` int(10) NOT NULL,
  `id_satuan_obat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id_tambah_stok` int(11) NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `updated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', '$2y$10$D0X0xBGglOwsRa8.dC8kiuu2KUL7EE13nS0vNkIdCUQV5Dy0./JEm', 'user', 'sL7PiBV7Ln0cS23YT8ZCF6VPoVgd7k7jh1vMg3lrykJSwCnD00FLiH1RGmOX', '2022-06-09 14:07:10', '2022-06-09 14:07:10'),
(2, 'user2', '$2y$10$zqs4Ry09fD5UClffmdwkzOJyRNBgvd072Blot143wpPIfWpUwXIY.', 'user', 'smOZsbP2KB', '2022-06-09 14:07:10', '2022-06-09 14:07:10'),
(3, 'penanggung_jawab1', '$2y$10$pgijcsP.5FVVE7ysqzwq5.lhpiboegzYJ20qokVTVUbLbcbM8RQPy', 'penanggung_jawab', 'tBM3FiEWHZD2qJUg399pA1rjkHzfA6LNXmHNyXad3HEiOlRwNz1Vi7BDnI25', '2022-06-09 14:07:10', '2022-06-09 14:07:10'),
(4, 'penanggung_jawab2', '$2y$10$f0LN/55kKl2J1b42MvltGeKOO9.GCbWEc5mHq6VXM55RhRYWfxCua', 'penanggung_jawab', 'tw3nbx95Qo', '2022-06-09 14:07:10', '2022-06-09 14:07:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `dosis`
--
ALTER TABLE `dosis`
  ADD PRIMARY KEY (`id_dosis`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `laporan_opnam`
--
ALTER TABLE `laporan_opnam`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `pabrik`
--
ALTER TABLE `pabrik`
  ADD PRIMARY KEY (`id_pabrik`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pbf`
--
ALTER TABLE `pbf`
  ADD PRIMARY KEY (`id_pbf`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indeks untuk tabel `penerimaan_opnam`
--
ALTER TABLE `penerimaan_opnam`
  ADD PRIMARY KEY (`id_penerimaanOpnam`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indeks untuk tabel `pengeluaran_opnam`
--
ALTER TABLE `pengeluaran_opnam`
  ADD PRIMARY KEY (`id_pengeluaranOpnam`);

--
-- Indeks untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id_tambah_stok`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_opnam`
--
ALTER TABLE `laporan_opnam`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id_tambah_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
