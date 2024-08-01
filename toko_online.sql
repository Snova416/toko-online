-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 01:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `foto_admin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ragil Prasetyo', 'Rio.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Software'),
(6, 'Laptop'),
(7, 'Monitor'),
(8, 'Harddisk'),
(9, 'Ram'),
(11, 'SSD Nvme');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `foto_pelanggan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`) VALUES
(1, 'Ragil Prasetyo', 'prasetyoragil66@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '08984854071', 'Jl.perwira', 'foto.jpg'),
(2, 'rio', 'rio66@gmail.com', '4c32e786e200376f562647ecaff24378b1faccf0', '089897976909', 'jl.millenium1', 'foto.jpg'),
(3, 'Tsukatsuki', 'tsukatsukirio1@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', '085642136721', 'Kota Medan', 'Rio.png'),
(4, 'Hayase Yukka', 'yukka123@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '0877564321', 'jl.millenium1', 'icon.jpeg'),
(5, 'Hanekawa Hasumi', 'hasumi123@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '089877667878', 'Jl.Sutomo Ujung Medan', 'Rio.png'),
(6, 'Amalia Syahputri', 'lilia123@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0878546780', 'jl.Hamparan Perak', 'icon.jpeg'),
(7, 'Ushio Noa', 'noaushio123@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0877678098', 'Jl.Sutomo Ujung', 'Noa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 4, 'Hayase Yukka', 'bri', 800000, '2024-06-20', '20240620235901razer.jpg'),
(2, 5, 'Hayase Yukka', 'mandiri', 800000, '2024-06-21', '20240621000432razer.jpg'),
(3, 4, 'Hayase Yukka', 'bca', 16857000, '2024-06-25', '20240625132827wp1_waifu2x_art_scan_noise3_scale.png'),
(4, 6, 'Hanekawa Hasumi', 'bca', 10243000, '2024-06-25', '20240625133857wp2.jpeg'),
(5, 7, 'Hanekawa Hasumi', 'mandiri', 357000, '2024-06-25', '20240625141038ramsodimm1.jpg'),
(6, 8, 'Hanekawa Hasumi', 'mandiri', 857000, '2024-06-25', '20240625141954banner1.jpg'),
(7, 9, 'Amalia Syahputri', 'mandiri', 10126000, '2024-06-28', '20240628041031Screenshot 2024-06-24 100435.png'),
(8, 11, 'Ushio Noa', 'bca', 16400000, '2024-07-15', '20240715073814bca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `total_berat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat`, `total_berat`, `provinsi`, `distrik`, `type`, `kode_pos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`, `status`, `resi_pengiriman`) VALUES
(1, 1, '2024-05-22', 800000, '', 0, '', '', '', '', '', '', 0, '', 'pending', ''),
(2, 2, '2024-05-22', 500000, '', 0, '', '', '', '', '', '', 0, '', 'pending', ''),
(3, 4, '2024-06-19', 16114000, 'Jl.Gunung Krakatau Perwira 2', 1500, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 114,000 2-3', 114000, '2-3', 'pending', ''),
(4, 4, '2024-06-19', 16857000, 'Jl.bilal Medan Timur', 1000, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 57,000 2-3', 57000, '2-3', 'barang dikirim', 'ABC115'),
(5, 4, '2024-06-20', 10399000, 'Kec.Medan Timur', 7200, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 399,000 2-3', 399000, '2-3', 'barang dikirim', 'ABC116'),
(6, 5, '2024-06-25', 10243000, 'Jl.Sutomo Ujung Medan', 1000, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'tiki', 'REG 43,000 2', 43000, '2', 'barang dikirim', 'ABC117'),
(7, 5, '2024-06-25', 357000, 'Jl.Sutomo Ujung Medan', 1000, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 57,000 2-3', 57000, '2-3', 'barang dikirim', 'ABC112'),
(8, 5, '2024-06-25', 857000, 'Jl.Sutomo Ujung Medan', 1000, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 57,000 2-3', 57000, '2-3', 'barang dikirim', 'ABC113'),
(9, 6, '2024-06-28', 10126000, 'jl.Hamparan Perak', 1500, 'Sumatera Utara', 'Deli Serdang', 'Kabupaten', '20511', 'jne', 'REG 126,000 4-5', 126000, '4-5', 'barang dikirim', 'ABC3345'),
(10, 7, '2024-07-12', 16114000, 'Jl.Sutomo Ujung', 1500, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'REG 114,000 2-3', 114000, '2-3', 'pending', ''),
(11, 7, '2024-07-15', 16400000, 'Jl.Sutomo Ujung', 1000, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'tiki', 'TRC 200,000 5', 200000, '5', 'sedang diproses', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 2, '', 0, 0, 0, 0),
(2, 2, 2, 1, '', 0, 0, 0, 0),
(3, 3, 7, 1, 'Asus Vivobook pro 14x Oled', 16000000, 1500, 1500, 16000000),
(4, 4, 7, 1, 'Asus Vivobook pro 14x Oled', 16000000, 1500, 1500, 16000000),
(5, 4, 10, 1, 'Ram 16Gb DDR4', 800000, 1000, 1000, 800000),
(6, 5, 11, 1, 'Samsung Odyssey G7', 10000000, 7200, 7200, 10000000),
(7, 6, 15, 1, 'Acer Aspire Vero AV15', 10000000, 1500, 1500, 10000000),
(8, 6, 14, 1, 'Ram Sodimm 8gb DDR4', 200000, 1000, 1000, 200000),
(9, 7, 12, 1, 'HDD 2.5 inch 500gb', 300000, 1000, 1000, 300000),
(10, 8, 10, 1, 'Ram 16Gb DDR4', 800000, 1000, 1000, 800000),
(11, 9, 15, 1, 'Acer Aspire Vero AV15', 10000000, 1500, 1500, 10000000),
(12, 10, 7, 1, 'Asus Vivobook pro 14x Oled', 16000000, 1500, 1500, 16000000),
(13, 11, 7, 1, 'Asus Vivobook pro 14x Oled', 16000000, 1500, 1500, 16000000),
(14, 11, 14, 1, 'Ram Sodimm 8gb DDR4', 200000, 1000, 1000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `telepon`, `isi_pesan`) VALUES
(1, 'Hayase Yukka', 'yukka123@gmail.com', '0877564321', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(2, 2, 'Windows 11', 500000, 0, 'foto.jpg', 'windows 11 ori', 5),
(3, 8, 'Harddisk 1tb', 350000, 1000, 'hdd2.jpg', 'Hdd 1Tb masih baru', 20),
(7, 6, 'Asus Vivobook pro 14x Oled', 16000000, 1500, 'asus1.jpg', 'Asus Vivobook Pro 14X OLED (2022) adalah laptop Windows 11 Pro1. Spesifikasinya meliputi:\r\nUkuran Layar (Diagonal): 14,50 inci\r\nResolusi layar: 2880x1800 piksel\r\nProsesor: Core i9\r\nRAM: 32GB\r\npenyimpanan: SSD 1TB\r\nGrafis: Nvidia GeForce RTX 3050 Ti1\r\nLaptop ini memiliki layar OLED 14,0 inci dengan rasio aspek 16:10, waktu respons 0,2ms, kecepatan refresh 90Hz, kecerahan puncak HDR 600nits, gamut warna DCI-P3 100%, 1.000.000:1, Layar BERSERTIFIKAT VESA HDR True Black 600, 1,07 miliar warna, Pantone Validated, Gl', 18),
(8, 4, 'Windows 11', 500000, 0, 'Windows11.jpg', 'windows 11 originally', 99999),
(9, 4, 'Windows 10', 100000, 0, 'windows10.jpeg', 'Windows 10 originalle', 9999),
(10, 9, 'Ram 16Gb DDR4', 800000, 1000, 'ram.jpg', 'Ram 16Gb DDR 3200Mhz', 18),
(11, 7, 'Samsung Odyssey G7', 10000000, 7200, 'odyssey1.jpg', 'Desain dan Tampilan\r\nUkuran Layar: 27 inci dan 32 inci.\r\nResolusi: QHD (2560 x 1440 piksel).\r\nKelengkungan: 1000R, yang memberikan pengalaman menonton yang sangat imersif.\r\nJenis Panel: VA (Vertical Alignment), menawarkan warna yang tajam dan kontras yang tinggi.\r\nRasio Aspek: 16:9.\r\nRefresh Rate: Hingga 240Hz, mendukung gameplay yang sangat halus dan responsif.\r\nWaktu Respons: 1 ms (GTG), mengurangi blur pada gerakan cepat.\r\nKecerahan: 350 cd/m² (typical).\r\nKontras Rasio: 2500:1, memberikan warna hitam yang lebih pekat dan putih yang lebih cerah.', 3),
(12, 8, 'HDD 2.5 inch 500gb', 300000, 1000, 'hdd2.5_1.jpg', 'Hdd 2.5 inch 500gb cocok untuk laptop', 7),
(13, 6, 'Lenovo Thinkpad T480', 7500000, 1580, 'thinkpad.jpg', 'SPECS:\r\n\r\n✔Intel Core i5-8th Gen\r\n✔8GB RAM\r\n✔256Gb SSD Storage\r\n✔Intel® HD Graphics 620\r\n✔14Inch Full HD IPS Display\r\n✔720P HD Camera\r\n✔Built-in WIFI\r\n✔Stereo Speakers\r\n✔Touchscreen\r\n✔Good Battery Life (Up to 1hr Depende sa usage)', 10),
(14, 9, 'Ram Sodimm 8gb DDR4', 200000, 1000, 'ramsodimm1.jpg', 'Ram Sodimm untuk Laptop', 6),
(15, 6, 'Acer Aspire Vero AV15', 10000000, 1500, 'acervero1.jpg', '\r\nGeneral\r\nModel: Acer Aspire Vero AV15-53P-58T21\r\nOperating System: Windows 11 Home\r\nColor: Cobblestone Grey\r\n\r\nProcessor\r\nProcessor: Intel Core i5-1335U\r\nBase Frequency: 1.3 GHz\r\nTurbo Frequency: 4.6 GHz\r\n\r\nDisplay\r\nDisplay: 15.6-inch FHD IPS\r\nType: IPS LCD\r\nResolution: 1920 x 1080 pixels\r\n\r\nGraphics\r\nGraphics: Intel Iris Xe Graphics\r\n\r\nMemory\r\nMemory: 8 GB LPDDR5 RAM\r\n\r\nStorage\r\nStorage: 512GB NVMe SSD\r\n\r\nConnectivity\r\nWi-Fi Standard: v6\r\nBluetooth: v5.1\r\n\r\nPorts\r\nUSB-A: 2x USB 3.2\r\nUSB Type-C: 2x USB 3.2\r\nHDMI: Yes\r\nHeadphone: Yes\r\n\r\nBattery\r\nNumber of Cells: 3-Cell\r\nBattery Chemistry: Lithium Ion (Li-Ion)\r\nBattery Capacity: 50 Wh\r\nPower Supply: 3-pin 65 W AC Adapter', 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(3, 3, 'hdd2.jpg'),
(6, 3, '240531145521hdd.jpg'),
(8, 2, '240603153907Windows11.jpg'),
(15, 7, 'asus1.jpg'),
(16, 7, 'asus2.jpg'),
(17, 8, 'Windows11.jpg'),
(18, 9, 'windows10.jpeg'),
(20, 10, 'ram.jpg'),
(21, 10, 'ram2.jpg'),
(22, 11, 'odyssey1.jpg'),
(23, 11, 'odyssey2.jpg'),
(24, 11, 'odyssey3.jpg'),
(25, 12, 'hdd2.5_1.jpg'),
(26, 12, 'hdd2.5_2.jpg'),
(27, 12, 'hdd2.5_3.jpg'),
(28, 13, 'thinkpad.jpg'),
(29, 13, 'thinkpad2.jpg'),
(30, 13, 'thinkpad3.jpg'),
(31, 14, 'ramsodimm1.jpg'),
(32, 14, '240614052619ramsodimm2.jpg'),
(33, 14, '240614052636ramsodimm3.jpg'),
(34, 15, 'acervero1.jpg'),
(35, 15, 'acervero2.jpg'),
(36, 15, 'acervero3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
