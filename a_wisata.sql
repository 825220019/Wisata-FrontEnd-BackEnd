-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Cindy', 'cindy@gmail.com', '1234'),
('A002', 'Angelline', 'angelline@gmail.com', '4321');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `kabupatenKODE`) VALUES
('AR01', 'Kuala', 'Singkawang Barat', 'Kuala adalah kelurahan di kecamatan Singkawang Barat, Singkawang, Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini mempunyai penduduk sebanyak 8.649 jiwa, dengan luas wilayah 6,25 km² dan kepadatan penduduknya adalah 1.384 jiwa/km².', 'KA01'),
('AR02', 'Sijangkung', 'Singkawang Selatan', 'Sijangkung adalah nama kelurahan yang berada di kecamatan Singkawang Selatan, kota Singkawang, provinsi Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini terdiri dari 5 Rukun Warga (RW) yang mempunyai penduduk sebanyak 10.295 jiwa, dengan luas w', 'KA01'),
('AR03', 'Roban', 'Singkawang Tengah', 'Roban adalah nama kelurahan yang berada di kecamatan Singkawang Tengah, kota Singkawang, provinsi Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini terdiri dari 13 Rukun Warga yang mempunyai penduduk sebanyak 32.047 jiwa, dengan luas wilayah 20,', 'KA01'),
('AR04', 'Pajintan', 'Singkawang Timur', 'Pajintan adalah nama kelurahan yang berada di kecamatan Singkawang Timur, kota Singkawang, provinsi Kalimantan Barat, Indonesia.', 'KA01'),
('AR05', 'Setapuk Besar', 'Singkawang Utara', 'Setapuk Besar adalah nama kelurahan yang berada di kecamatan Singkawang Utara, kota Singkawang, provinsi Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini terdiri dari 14 Rukun Warga yang mempunyai penduduk sebanyak 7.434 jiwa, dengan luas wilay', 'KA01'),
('AR06', 'Pasiran', 'Singkawang Barat', 'Pasiran adalah nama kelurahan yang berada di kecamatan Singkawang Barat, Singkawang, Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini mempunyai penduduk sebanyak 34.387 jiwa, dengan luas wilayah 7,20 km² dan kepadatan penduduknya adalah 1.810 j', 'KA01'),
('AR07', 'Sedau', 'Singkawang Selatan', 'Sedau adalah nama kelurahan yang berada di kecamatan Singkawang Selatan, kota Singkawang, provinsi Kalimantan Barat, Indonesia. Pada tahun 2021, kelurahan ini terdiri dari 10 Rukun Warga yang mempunyai penduduk sebanyak 36.053 jiwa, dengan komposisi Laki-', 'KA01'),
('AR08', 'Tengah', 'Singkawang Barat', 'engah adalah nama kelurahan yang berada di kecamatan Singkawang Barat, Singkawang, Kalimantan Barat, Indonesia. Pada tahun 2020, kelurahan ini mempunyai penduduk sebanyak 2.060 jiwa, dengan luas wilayah 0,18 km² dan kepadatan penduduknya adalah 1.030 jiwa', 'KA01');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('BE01', 'Kampung Wisata Mangrove Kuala Destinasi Menarik Kota Singkaw', 'Membutuhkan waktu 15 menit dari pusat kota, Lokasi Hutan Mangrove ini terletak di Kelurahan Kuala, Kecamatan Singkawang Barat Kota Singkawang.\r\n', 'Zulfikri', 'pontianak.tribunnews.com', '2023-05-27', 'WS01'),
('BE02', 'Megahnya Thai Pak Kung, Kelenteng Terbesar di Singkawang', 'Thai Pak Kung berkat ukurannya yang megah. Kelenteng Thai Pak Kung dengan ukuran yang megah ini berlokasi di Jalan Sanggau Kulor, Singkawang Timur. Jika dari pusat Kota Pontianak, maka jaraknya 157 km dengan lama perjalanan hingga empat jam. ', 'Wasti Samaria Simangunsong , Ni Nyoman Wira Widyan', 'kompas.com', '2022-02-25', 'WS03'),
('BE03', 'Hutan Mangrove Setapuk Besar, Destinasi Ekowisata Hijau di S', 'Hutan Mangrove Setapuk Besar ini berjarak sekira 10 km dari pusat Kota Singkawang dengan durasi perjalanan kurang lebih 20 menit menggunakan sepeda motor.', 'Zulfikri', 'kompas.com', '2023-06-04', 'WS05'),
('BE08', 'Pesona Pulau Simping, Diakui Oleh PBB Jadi Pulau Terkecil di', 'Pesona Pulau Simping, Diakui Oleh PBB Jadi Pulau Terkecil di Dunia, Terletak di Singkawang Kalbar\r\n', 'Rizki Kurnia', 'pontianak.tribunnews.com', '2022-01-20', 'WS08');

-- --------------------------------------------------------

--
-- Table structure for table `cindy`
--

CREATE TABLE `cindy` (
  `cindyID` char(9) NOT NULL,
  `cindyNEGARA` varchar(30) NOT NULL,
  `destinasiID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cindy`
--

INSERT INTO `cindy` (`cindyID`, `cindyNEGARA`, `destinasiID`) VALUES
('123456789', 'Jepang', 'WS04'),
('825220019', 'Indonesia', 'WS03');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Wisata Mangrove Kuala', 'Jl. Yos Sudarso, RT.10/RW.03', 'KA01', 'AR01'),
('WS02', 'Taman Agrowisata Bukit Bougenville', 'Jl. Pertanian, Sijangkung', 'KA02', 'AR02'),
('WS03', 'Thai Pak Kung', 'Jl. Sanggau Kulor, Roban', 'KA03', 'AR03'),
('WS04', 'Waterboom Gunung Poteng', 'Jalan Raya Pajintan', 'KA04', 'AR04'),
('WS05', 'Mangrove Setapuk Besar', 'Setapuk Besar', 'KA01', 'AR05'),
('WS06', 'Taman Gunung Sari', 'Jl. Karya, Pasiran', 'KA02', 'AR06'),
('WS07', 'Air Terjun Sibohe', 'Pajintan', 'KA05', 'AR04'),
('WS08', 'Pulau Simping', 'Sedau', 'KA06', 'AR07');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Mangrove', 'WS01', 'ft1.jpg'),
('F002', 'Bougenville', 'WS02', 'ft2.jpg'),
('F003', 'Klenteng', 'WS03', 'ft3.jpg'),
('F004', 'Waterboom', 'WS04', 'ft4.jpg'),
('F005', 'Mangrove', 'WS05', 'ft5.jpg'),
('F006', 'Taman', 'WS06', 'ft6.jpg'),
('F007', 'Air Terjun', 'WS07', 'ft7.jpg'),
('F008', 'Pulau', 'WS08', 'ft8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('HT01', 'Swiss-Belinn Singkawang', 'Grand Mall Area, Jl. Alianyang, Pasiran, Kec. Singkawang Barat', 'Swiss-Belinn Singkawang adalah satu-satunya hotel bertaraf internasional di kota seribu Klenteng. Kota Singkawang sekitar 150km dari Bandar Udara Supadio, Bandar Udara terdekat di Pontianak. Hotel ini terletak strategis di area Grand Mall Singkawang dan menyediakan akses langsung ke pusat perbelanja', 'h1.jpg', 'AR01'),
('HT02', 'Hotel Grand Mandarin Singkawang', 'Jl. Pemuda, Tengah, Kec. Singkawang Barat', 'Hotel Grand Mandarin Singkawang berlokasi 450 meter dari Pasar Hongkong Singkawang di Kalimantan Barat. Hotel ini memiliki resepsionis yang beroperasi 24 jam untuk memberikan tamu akomodasi yang nyaman serta memiliki fasilitas restoran, parkir dan WiFi gratis.', 'h2.jpg', 'AR08'),
('HT03', 'Mahkota Hotel Singkawang', 'Jl. P. Diponegoro No.1, Pasiran, Kec. Singkawang Barat', 'Mahkota Hotel Singkawang adalah hotel bintang 4 di Kota Singkawang serta memiliki fasilitas berkelas diantaranya menyediakan kolam renang luar ruangan diatas gedung, layanan pijat serta pusat kebugaran untuk para tamu yang menginap, restoran, dan bar.', 'h3.jpg', 'AR06'),
('HT04', 'Kyodai Hotel', 'Jl. Ps. Turi Dalam, Pasiran, Kec. Singkawang Barat', 'Jika ingin menginap dengan suasana Japan, ada di Kota Singkawang, bertempat di area Pasar Baru, konsep hotel ini benar-benar memberikan nuansa a la Japan, lengkap dengan persewaan baju kimono dan sejenisnya, serta resto a la japan di seberang hotel.', 'h4.jpg', 'AR06');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` char(60) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`) VALUES
('KA01', 'Singkawang', 'Kalimantan Barat', '', 'ic1.png', ''),
('KA02', 'Bengkayang', 'Kalimantan Barat', '', '1c2.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('KA01', 'Mangrove', ' Wisata Mangrove adalah kegiatan wisata yang menawarkan pengunjung kesempatan untuk menjelajahi dan menikmati keindahan ekosistem hutan bakau atau mangrove. Wisata mangrove ini merupakan sekelompok tumbuhan yang tumbuh di daerah hutan bakau.', ''),
('KA02', 'Taman', ' Taman adalah suatu area yang diatur dan dirancang untuk rekreasi, keindahan, serta konservasi alam. Taman dapat memiliki berbagai fitur, seperti jalur berjalan, taman bermain, dan area hijau dengan pepohonan dan tanaman hias.', ''),
('KA03', 'Klenteng', 'Kelenteng adalah istilah yang digunakan untuk merujuk kepada kuil atau tempat ibadah umat Konghucu dan Buddha di Tiongkok dan beberapa negara Asia Timur lainnya. ', ''),
('KA04', 'Waterboom', 'Waterboom adalah wahana rekreasi air yang umumnya berupa taman air atau kompleks hiburan air yang menawarkan berbagai atraksi dan permainan air. Tempat ini dirancang untuk memberikan pengalaman bermain air yang menyenangkan dan menyegarkan bagi pengunjung', ''),
('KA05', 'Air Terjun', 'Air terjun adalah fenomena alam di mana air sungai atau aliran air mengalir dari ketinggian tertentu menuju ke bawah dengan kekuatan dan volume yang menciptakan efek visual menarik.', ''),
('KA06', 'Pulau', 'Pulau adalah massa daratan yang terpisah dan dikelilingi oleh air, biasanya di tengah-tengah laut atau danau. ', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `cindy`
--
ALTER TABLE `cindy`
  ADD PRIMARY KEY (`cindyID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
