-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2022 pada 08.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_surat`
--

CREATE TABLE `kode_surat` (
  `id_kode` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode_surat`
--

INSERT INTO `kode_surat` (`id_kode`, `kode`, `nama`) VALUES
(1, '000', 'UMUM'),
(2, '001', 'Lambang'),
(3, '001.1 ', 'Garuda'),
(4, '001.2 ', 'Bendera Kebangsaan'),
(5, '001.3 ', 'Lagu Kebangsaan'),
(6, '001.4 ', 'Daerah'),
(7, '002', 'Tanda Kehormatan/Penghargaan'),
(8, '002.1 ', 'Bintang'),
(9, '002.2 ', 'Satyalencana'),
(10, '003', 'Hari Raya/Besar'),
(11, '003.1 ', 'Nasional Agustus Hari Pahlawan dan sebagainya'),
(12, '003.2 ', 'Hari Raya Keagamaan'),
(13, '003.3 ', 'Hari Ulang Tahun'),
(14, '004', 'Ucapan'),
(15, '004.1 ', 'Ucapan Terima Kasih'),
(16, '004.2 ', 'Ucapan Selamat'),
(17, '004.3 ', 'Ucapan Belasungkawa'),
(18, '004.4 ', 'Ucapan Lainnya'),
(19, '005', 'Undangan'),
(20, '012', 'Rumah Dinas'),
(21, '012.1 ', 'Tanah Untuk Rumah Dinas'),
(22, '012.2 ', 'Perabot Rumah Dinas'),
(23, '020', 'PERALATAN'),
(24, '020.1 ', 'Penawaran'),
(25, '021', 'Alat Tulis'),
(26, '022', 'Mesin Kantor'),
(27, '023', 'Perabot Kantor'),
(28, '027', 'Pengadaan'),
(29, '028', 'Inventaris'),
(30, '030', 'KEKAYAAN DAERAH'),
(31, '031', 'Sumber Daya Alam'),
(32, '032', 'Asset Daerah'),
(33, '040', 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI'),
(34, '041', 'Perpustakaan'),
(35, '041.1 ', 'Umum'),
(36, '041.2 ', 'Khusus'),
(37, '041.3 ', 'Perguruan Tinggi'),
(38, '041.4 ', 'Sekolah'),
(39, '041.5 ', 'Keliling'),
(40, '042', 'Dokumentasi'),
(41, '045', 'Kearsipan'),
(42, '045.1 ', 'Pola Klasifikasi'),
(43, '045.2 ', 'Penataan Berkas'),
(44, '045.3 ', 'Penyusutan Arsip'),
(45, '045.31', 'Jadwal Retensi Arsip'),
(46, '045.32', 'Pemindahan Arsip'),
(47, '045.33', 'Penilaian Arsip'),
(48, '045.34', 'Pemusnahan Arsip'),
(49, '045.35', 'Penyerahan Arsip'),
(50, '045.36', 'Berita Acara Penyusutan Arsip'),
(51, '045.37', 'Daftar Pencarian Arsip'),
(52, '090', 'PERJALANAN DINAS'),
(53, '091', 'Perjalanan Presiden/Wakil Presiden Ke Daerah'),
(54, '092', 'Perjalanan Menteri Ke Daerah'),
(55, '093', 'Perjalanan Pejabat Tinggi (Pejabat Eselon )'),
(56, '094', 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai'),
(57, '095', 'Perjalanan Tamu Asing Ke Daerah'),
(58, '096', 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri'),
(59, '097', 'Perjalanan Menteri Ke Luar Negeri'),
(60, '420', 'PENDIDIKAN'),
(61, '420.1 ', 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja'),
(62, '421', 'Sekolah'),
(63, '421.1 ', 'Pra Sekolah'),
(64, '421.2 ', 'Sekolah Dasar'),
(65, '421.3 ', 'Sekolah Menengah'),
(66, '421.4 ', 'Sekolah Tinggi'),
(67, '421.5 ', 'Sekolah Kejuruan'),
(68, '421.6 ', 'Kegiatan Sekolah Dies Natalis Lustrum'),
(69, '421.7 ', 'Kegiatan Pelajar'),
(70, '421.71', 'Reuni Darmawisata'),
(71, '421.72', 'Pelajar Teladan'),
(72, '421.73', 'Resimen Mahasiswa'),
(73, '421.8 ', 'Sekolah Pendidikan Luar Biasa'),
(74, '421.9 ', 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf'),
(75, '422', 'Administrasi Sekolah'),
(76, '422.1 ', 'Persyaratan Masuk Sekolah Testing Ujian Pendaftaran Mapras Perpeloncoan'),
(77, '422.2 ', 'Tahun Pelajaran'),
(78, '422.3 ', 'Hari Libur'),
(79, '422.4 ', 'Uang Sekolah Klasifikasi Disini SPP'),
(80, '422.5 ', 'Beasiswa'),
(81, '423', 'Metode Belajar'),
(82, '423.1 ', 'Kuliah'),
(83, '423.2 ', 'Ceramah Simposium'),
(84, '423.3 ', 'Diskusi'),
(85, '423.4 ', 'Kuliah Lapangan Widyawisata KKN Studi Tur'),
(86, '423.5 ', 'Kurikulum'),
(87, '423.6 ', 'Karya Tulis'),
(88, '423.7 ', 'Ujian'),
(89, '424', 'Tenaga Pengajar Guru Dosen Dekan Rektor Klasifikasi Disini: Guru Teladan'),
(90, '425', 'Sarana Pendidikan'),
(91, '425.1 ', 'Gedung'),
(92, '425.11', 'Gedung Sekolah'),
(93, '425.12', 'Kampus'),
(94, '425.13', 'Pusat Kegiatan Mahasiswa'),
(95, '425.2 ', 'Buku'),
(96, '425.3 ', 'Perlengkapan Sekolah'),
(97, '426', 'Keolahragaan'),
(98, '426.1 ', 'Cabang Olah Raga'),
(99, '426.2 ', 'Sarana'),
(100, '426.21', 'Gedung Olah Raga'),
(101, '426.22', 'Stadion'),
(102, '426.23', 'Lapangan'),
(103, '426.24', 'Kolam renang'),
(104, '426.3 ', 'Pesta Olah Raga Klasifikasi Disini: PON Porsade Olimpiade dsb'),
(105, '426.4 ', 'KONI'),
(106, '427', 'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja'),
(107, '428', 'Kepramukaan'),
(108, '429', 'Pendidikan Kedinasan Untuk Depdagri Lihat'),
(109, '430', 'KEBUDAYAAN'),
(110, '431', 'Kesenian'),
(111, '431.1 ', 'Cabang Kesenian'),
(112, '431.2 ', 'Sarana'),
(113, '431.21', 'Gedung Kesenian'),
(114, '432', 'Kepurbakalaan'),
(115, '432.1 ', 'Museum'),
(116, '432.2 ', 'Peninggalan Kuno'),
(117, '432.21', 'Candi Termasuk Pemugaran'),
(118, '432.22', 'Benda'),
(119, '433', 'Sejarah'),
(120, '434', 'Bahasa'),
(121, '435', 'Usaha Pertunjukan Hiburan Kesenangan'),
(122, '436', 'Kepercayaan'),
(123, '450', 'AGAMA'),
(124, '451', 'Islam'),
(125, '451.1 ', 'Peribadatan'),
(126, '451.11', 'Sholat'),
(127, '451.12', 'Zakat Fitrah'),
(128, '451.13', 'Puasa'),
(129, '451.14', 'MTQ'),
(130, '451.2 ', 'Rumah Ibadah'),
(131, '451.3 ', 'Tokoh Agama'),
(132, '451.4 ', 'Pendidikan'),
(133, '451.41', 'Tinggi'),
(134, '451.42', 'Menengah'),
(135, '451.43', 'Dasar'),
(136, '451.44', 'Pondok Pesantren'),
(137, '451.45', 'Gedung Sekolah'),
(138, '451.46', 'Tenaga Pengajar'),
(139, '451.47', 'Buku'),
(140, '451.48', 'Dakwah'),
(141, '451.49', 'Organisasi / Lembaga Pendidikan'),
(142, '451.5 ', 'Harta Agama Wakaf Baitulmal dsb'),
(143, '451.6 ', 'Peradilan'),
(144, '451.7 ', 'Organisasi Keagamaan Bukan Politik Majelis Ulama'),
(145, '451.8 ', 'Mazhab'),
(146, '452', 'Protestan'),
(147, '452.1 ', 'Peribadatan'),
(148, '452.2 ', 'Rumah Ibadah'),
(149, '452.2 ', 'Tokoh Agama Rohaniawan Pendeta Domine'),
(150, '452.4 ', 'Mazhab'),
(151, '452.5 ', 'Organisasi Gerejani'),
(152, '453', 'Katolik'),
(153, '453.1 ', 'Peribadatan'),
(154, '453.2 ', 'Rumah Ibadah'),
(155, '453.3 ', 'Tokoh Agama Rohaniawan Pendeta Pastor'),
(156, '453.4 ', 'Mazhab'),
(157, '453.5 ', 'Organisasi Gerejani'),
(158, '454', 'Hindu'),
(159, '454.1 ', 'Peribadatan'),
(160, '454.2 ', 'Rumah Ibadah'),
(161, '454.3 ', 'Tokoh Agama Rohaniawan'),
(162, '454.4 ', 'Mazhab'),
(163, '454.5 ', 'Organisasi Keagamaan'),
(164, '455', 'Budha'),
(165, '455.1 ', 'Peribadatan'),
(166, '455.2 ', 'Rumah Ibadah'),
(167, '455.3 ', 'Tokoh Agama Rohaniawan'),
(168, '455.4 ', 'Mazhab'),
(169, '455.5 ', 'Organisasi Keagamaan'),
(170, '456', 'Urusan Haji'),
(171, '456.1 ', 'ONH'),
(172, '456.2 ', 'Manasik'),
(173, '800', 'KEPEGAWAIAN Klasifikasi Disini: Kebijaksanaan Kepegawaian'),
(174, '800.1 ', 'Perencanaan'),
(175, '800.2 ', 'Penelitian'),
(176, '800.04', 'Pengaduan'),
(177, '800.05', 'Tim'),
(178, '800.07', 'Statistik'),
(179, '800.08', 'Peraturan Perundang-Undangan'),
(180, '810', 'PENGADAAN Meliputi: Lamaran Pengujian Kesehatan Dan Pengangkatan Calon Pegawai'),
(181, '811', 'Lamaran'),
(182, '811.1 ', 'Testing'),
(183, '811.2 ', 'Screening'),
(184, '811.3 ', 'Panggilan'),
(185, '812', 'Pengujian Kesehatan'),
(186, '813', 'Pengangkatan Calon Pegawai'),
(187, '813.1 ', 'Pengangkatan Calon Pegawai Golongan'),
(188, '813.2 ', 'Pengangkatan Calon Pegawai Golongan II'),
(189, '813.3 ', 'Pengangkatan Calon Pegawai Golongan III'),
(190, '813.4 ', 'Pengangkatan Calon Pegawai Golongan IV'),
(191, '813.5 ', 'Pengangkatan Calon Guru Inpres'),
(192, '814', 'Pengangkatan Tenaga Lepas'),
(193, '814.1 ', 'Pengangkatan Tenaga Bulanan / Tenaga Kontrak'),
(194, '814.2 ', 'Pengangkatan Tenaga Harian'),
(195, '814.3 ', 'Pengangkatan Tenaga Pensiunan'),
(196, '820', 'MUTASI Meliputi: Pengangkatan Kenaikan Gaji Berkala Kenaikan Pangkat Pemindahan Pelimpahan Datasering Tugas Belajar Dan Wajib Militer'),
(197, '821', 'Pengangkatan'),
(198, '821.1 ', 'Pengangkatan Menjadi Pegawai Negeri Tetap'),
(199, '821.11', 'Pengangkatan Menjadi Pegawai Negeri Golongan 1'),
(200, '821.12', 'Pengangkatan Menjadi Pegawai Negeri Golongan 2'),
(201, '821.13', 'Pengangkatan Menjadi Pegawai Negeri Golongan 3'),
(202, '821.14', 'Pengangkatan Menjadi Pegawai Negeri Golongan 4'),
(203, '822', 'Kenaikan Gaji Berkala'),
(204, '822.1 ', 'Pegawai Golongan 1'),
(205, '822.2 ', 'Pegawai Golongan 2'),
(206, '822.3 ', 'Pegawai Golongan 3'),
(207, '822.4 ', 'Pegawai Golongan 4'),
(208, '823', 'Kenaikan Pangkat / Pengangkatan'),
(209, '823.1 ', 'Pegawai Golongan 1'),
(210, '823.2 ', 'Pegawai Golongan 2'),
(211, '823.3 ', 'Pegawai Golongan 3'),
(212, '823.4 ', 'Pegawai Golongan 4'),
(213, '826', 'Penunjukan Tugas Belajar'),
(214, '826.1 ', 'Dalam Negeri'),
(215, '826.2 ', 'Luar Negeri'),
(216, '826.3 ', 'Tunjangan Belajar'),
(217, '826.4 ', 'Penempatan Kembali'),
(218, '830', 'KEDUDUKAN Meliputi: Perhitungan Masa Kerja Penyesuaian Pangkat/Gaji Penghargaan Ijasah Dan Jenjang Pangkat'),
(219, '831', 'Perhitungan Masa Kerja'),
(220, '832', 'Penyesuaian Pangkat / Gaji'),
(221, '832.1 ', 'Pegawai Golongan'),
(222, '832.2 ', 'Pegawai Golongan'),
(223, '832.3 ', 'Pegawai Golongan'),
(224, '832.4 ', 'Pegawai Golongan'),
(225, '833', 'Penghargaan Ijazah / Penyesuaian'),
(226, '834', 'Jenjang Pangkat / Eselonering'),
(227, '850', 'CUTI Meliputi Cuti Tahunan Cuti Besar Cuti Sakit Cuti Hamil Cuti Naik Haji Cuti Diluar Tanggungan Negara Dan Cuti Alasan Lain'),
(228, '851', 'Cuti Tahunan'),
(229, '852', 'Cuti Besar'),
(230, '853', 'Cuti Sakit'),
(231, '854', 'Cuti Hamil'),
(232, '855', 'Cuti Naik Haji/Umroh'),
(233, '856', 'Cuti Di Luar Tangungan Neagara'),
(234, '857', 'Cuti Alasan Lain/Alasan Penting'),
(235, '870', 'TATA USAHA KEPEGAWAIAN Meliputi: Formasi, Bezetting, Registrasi,Daftar, Riwayat Hidup, Hak, Penggajian, Sumpah,/Janji Dan Korps Pegawai'),
(236, '871', 'Formasi'),
(237, '872', 'Bezetting/Daftar Urut Kepegawaian'),
(238, '873', 'Registrasi'),
(239, '873.1 ', 'NIP'),
(240, '873.2 ', 'KARPEG'),
(241, '873.3 ', 'Legitiminasi/Tanda Pengenal'),
(242, '873.4 ', 'Daftar Keluarga Perkawinan Perceraian Karis Karsu'),
(243, '900', 'KEUANGAN'),
(244, '901', 'Nota Keuangan'),
(245, '902', 'APBN'),
(246, '903', 'APBD'),
(247, '904', 'APBN-P'),
(248, '905', 'Dana Alokasi Umum'),
(249, '906', 'Dana Alokasi Khusus'),
(250, '907', 'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)'),
(251, '930', 'VERIFIKASI'),
(252, '931', 'SPM Rutin (daftar p)'),
(253, '932', 'SPM Pembangunan (daftar p)'),
(254, '933', 'Penerimaan (daftar pp'),
(255, '934', 'SPJ Rutin'),
(256, '935', 'SPJ Pembangunan'),
(257, '936', 'Nota Pemeriksaan'),
(258, '937', 'SP Pemindahan Pembukuan'),
(259, '940', 'PEMBUKUAN'),
(260, '941', 'Penyusunan Perhitungan Anggaran'),
(261, '942', 'Permintaan Data Anggaran Laporan Fisik Pembangunan'),
(262, '943', 'Laporan Fisik Pembangunan'),
(263, '950', 'PERBENDAHARAAN'),
(264, '952', 'Tuntutan Bendaharawan'),
(265, '953', 'Penghapusan Kekayaan Negara'),
(266, '954', 'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `no_skeluar` varchar(45) NOT NULL,
  `tgl_skeluar` date NOT NULL,
  `tujuan_surat` varchar(255) NOT NULL,
  `isi_surat` text NOT NULL,
  `retensi_aktif` varchar(255) NOT NULL,
  `pengolah` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `no_agenda`, `no_skeluar`, `tgl_skeluar`, `tujuan_surat`, `isi_surat`, `retensi_aktif`, `pengolah`, `file`, `deleted_at`) VALUES
(1, 1, '900/001/2022', '2022-01-02', 'Yanik Susilowati, Sukirah', 'SKPP an. Yanik Susilowati, Sukirah', '', '', 'SK_001_2022_3478.pdf', NULL),
(2, 2, '800/002/2022', '2022-01-02', '', 'SK Pembagian Tugas Mengajar', '', '', 'SK_002_2022_2774.pdf', NULL),
(3, 3, '800/003/2022', '2022-01-02', 'yeni, anis, narman', 'SK Waka (yeni, anis, narman)', '', '', 'null', NULL),
(4, 4, '800/004/2022', '2022-01-06', 'Kepala Perpustakaan', 'SK Kepala Perpustakaan', '', '', 'SK_004_2022_2947.pdf', NULL),
(5, 5, '800/005/2022', '2022-01-06', 'Sri Sayekti Wigati', 'Surat Tugas atas nama Sri Sayekti Wigati', '', '', 'null', NULL),
(6, 6, '421.2/006/2022', '2022-01-06', 'Chinta K N', 'Surat Keterangan Penulisan Ijazah/STTB an.Chinta K N', '', '', 'SK_006_2022_7103.pdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_smasuk` varchar(45) NOT NULL,
  `tgl_smasuk` date NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `isi_surat` text NOT NULL,
  `retensi_aktif` varchar(255) NOT NULL,
  `pengolah` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `no_agenda`, `tgl_terima`, `no_smasuk`, `tgl_smasuk`, `asal_surat`, `isi_surat`, `retensi_aktif`, `pengolah`, `file`, `deleted_at`) VALUES
(1, 1, '2022-01-04', '423.1/0006/2021', '2022-01-04', 'Kadindikbud Kabupaten Sukoharjo', 'DNS Asesmen Nasional TP.2020/1021', '', '', 'SM_001_2022_1591.pdf', NULL),
(2, 2, '2022-01-07', '800/0033/2021', '2022-01-04', 'Kadindikbud Kabupaten Sukoharjo', 'Data Pejabat Penilai SKP 2020', '', '', 'SM_002_2022_5601.pdf', NULL),
(3, 3, '2022-01-07', '4/D.3.II/FKIP/I/2021', '2022-01-04', 'Dekan UMS', 'Pemberitahuan dan permohonan izin observasi pelaksanaan dan pembelajaran (PLPI) periode 2021 PAI', '', '', 'SM_003_2022_5698.pdf', NULL),
(4, 4, '2022-01-07', '4/D.3.II/FKIP/I/2021', '2022-01-04', 'Dekan UMS', 'Pemberitahuan dan permohonan izin observasi pelaksanaan dan pembelajaran (PLPI) periode 2021 Bahasa Inggris', '', '', 'null', NULL),
(5, 5, '2022-01-07', '4/D.3.II/FKIP/I/2021', '2022-01-04', 'Dekan UMS', 'Pemberitahuan dan permohonan izin observasi pelaksanaan dan pembelajaran (PLPI) periode 2021 PKN', '', '', 'null', NULL),
(6, 6, '2022-01-08', '4/D.3.II/FKIP/I/2021', '2022-01-04', 'Dekan UMS', 'Pemberitahuan dan permohonan izin observasi pelaksanaan dan pembelajaran (PLPI) periode 2021 PAI', '', '', 'null', NULL),
(7, 7, '2022-01-08', '01/MGMP.PAI/I/2021', '2022-01-06', 'Ketua MGMP PAI Kabupaten Sukoharjo', 'Undangan Pelatihan pengelolaan zoom bagi guru PAI', '', '', 'SM_007_2022_7458.pdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `image`, `password`) VALUES
(1, 'Nugroho Prihananto', 'admin123', 'nugrohoprihananto@gmail.com', 'depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg', '$2y$10$5jXLWRw5CRRXTQFdvfgKzuTcW1ao/KDE/7i6aNbSxLTyFS9QXqQbu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
