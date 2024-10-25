-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 05:31 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `kode_alamat` int(6) NOT NULL,
  `kab_kota` enum('Kota Magelang','Bukan Kota Magelang','-') NOT NULL,
  `kecamatan` enum('Magelang Utara','Magelang Tengah','Magelang Selatan','Bukan Kota Magelang','-') NOT NULL,
  `Kelurahan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`kode_alamat`, `kab_kota`, `kecamatan`, `Kelurahan`) VALUES
(1001, 'Kota Magelang', 'Magelang Utara', 'Kramat Utara'),
(1002, 'Kota Magelang', 'Magelang Utara', 'Kramat Selatan'),
(1003, 'Kota Magelang', 'Magelang Utara', 'Potrobangsan'),
(1004, 'Kota Magelang', 'Magelang Utara', 'Kedungsari'),
(1005, 'Kota Magelang', 'Magelang Utara', 'Wates'),
(1006, 'Kota Magelang', 'Magelang Tengah', 'Magelang'),
(1007, 'Kota Magelang', 'Magelang Tengah', 'Cacaban'),
(1008, 'Kota Magelang', 'Magelang Tengah', 'Kemirirejo'),
(1009, 'Kota Magelang', 'Magelang Tengah', 'Gelangan'),
(1010, 'Kota Magelang', 'Magelang Tengah', 'Panjang'),
(1011, 'Kota Magelang', 'Magelang Tengah', 'Rejowinangun Utara'),
(1012, 'Kota Magelang', 'Magelang Selatan', 'Rejowinangun Selatan'),
(1013, 'Kota Magelang', 'Magelang Selatan', 'Magersari'),
(1014, 'Kota Magelang', 'Magelang Selatan', 'Jurangombo Utara'),
(1015, 'Kota Magelang', 'Magelang Selatan', 'Jurangombo Selatan'),
(1016, 'Kota Magelang', 'Magelang Selatan', 'Tidar Utara'),
(1017, 'Kota Magelang', 'Magelang Selatan', 'Tidar Selatan'),
(1018, 'Bukan Kota Magelang', 'Bukan Kota Magelang', 'Bukan Kota Magelang');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `nik` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','-') NOT NULL,
  `kode_alamat` int(6) NOT NULL,
  `rt` varchar(6) NOT NULL,
  `rw` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_diri`
--

INSERT INTO `data_diri` (`nik`, `nama`, `jenis_kelamin`, `kode_alamat`, `rt`, `rw`) VALUES
('3371002195892250', 'Zahid Haryanto', 'Laki-Laki', 1006, '6', '6'),
('3371002716863712', 'Rizki Hartono', 'Laki-Laki', 1014, '8', '1'),
('3371003376666259', 'Samsul Nugroho', 'Laki-Laki', 1015, '9', '1'),
('3371003450238349', 'Budi Santoso', 'Laki-Laki', 1008, '7', '9'),
('3371004051206092', 'Joko Suryono', 'Laki-Laki', 1017, '9', '10'),
('3371005890166113', 'Budi Hartono', 'Laki-Laki', 1006, '2', '2'),
('3371007737667835', 'Joko Hartono', 'Perempuan', 1013, '1', '9'),
('3371008053742292', 'Zahid Susilo', 'Perempuan', 1004, '1', '4'),
('3371015630578877', 'Budi Hartono', 'Laki-Laki', 1001, '10', '6'),
('3371018539161694', 'Zahid Susilo', 'Perempuan', 1010, '6', '9'),
('3371019029623391', 'Putri Saputra', 'Perempuan', 1013, '2', '4'),
('3371019088991081', 'Samsul Saputra', 'Perempuan', 1017, '5', '5'),
('3371019766569884', 'Joko Haryanto', 'Perempuan', 1003, '5', '7'),
('3371021446979023', 'Samsul Wahyuni', 'Perempuan', 1011, '4', '8'),
('3371021683915783', 'Samsul Saputra', 'Perempuan', 1012, '3', '9'),
('3371022211734785', 'Rizki Susilo', 'Perempuan', 1006, '3', '4'),
('3371023833382145', 'Yuli Santoso', 'Perempuan', 1003, '7', '10'),
('3371024036298099', 'Dewi Santoso', 'Perempuan', 1003, '3', '6'),
('3371024158103663', 'Siti Wahyuni', 'Laki-Laki', 1003, '8', '6'),
('3371025566088511', 'Yuli Nugroho', 'Laki-Laki', 1005, '3', '7'),
('3371026946746320', 'Rina Setiawan', 'Laki-Laki', 1012, '5', '6'),
('3371027413638922', 'Rizki Haryanto', 'Laki-Laki', 1015, '8', '3'),
('3371028930617370', 'Hadi Hartono', 'Perempuan', 1009, '1', '9'),
('3371029199932321', 'Rina Susilo', 'Perempuan', 1005, '1', '8'),
('3371029575336489', 'Rizki Haryanto', 'Laki-Laki', 1007, '2', '7'),
('3371030435019562', 'Rina Saputra', 'Laki-Laki', 1005, '1', '10'),
('3371031625253229', 'Rina Suryono', 'Laki-Laki', 1009, '10', '9'),
('3371033267066049', 'Zahid Hartono', 'Laki-Laki', 1018, '10', '6'),
('3371033495375242', 'Joko Haryanto', 'Perempuan', 1001, '10', '3'),
('3371034106389075', 'Budi Nugroho', 'Perempuan', 1010, '6', '9'),
('3371034166223010', 'Dewi Hartono', 'Perempuan', 1005, '9', '1'),
('3371035666815499', 'Siti Susilo', 'Perempuan', 1011, '8', '3'),
('3371036809962628', 'Joko Saputra', 'Perempuan', 1017, '5', '7'),
('3371037280719019', 'Zahid Suryono', 'Perempuan', 1018, '5', '3'),
('3371037470990456', 'Anwar Hartono', 'Perempuan', 1004, '8', '3'),
('3371037704174971', 'Samsul Susilo', 'Perempuan', 1013, '2', '3'),
('3371038473684089', 'Rizki Widodo', 'Perempuan', 1003, '9', '9'),
('3371040480487774', 'Joko Susilo', 'Perempuan', 1013, '5', '4'),
('3371041039563569', 'Rina Wahyuni', 'Laki-Laki', 1013, '3', '6'),
('3371041058593017', 'Zahid Susilo', 'Perempuan', 1014, '8', '9'),
('3371041227747886', 'Hadi Hartono', 'Laki-Laki', 1011, '1', '1'),
('3371041334952913', 'Zahid Wahyuni', 'Laki-Laki', 1003, '2', '6'),
('3371041894752834', 'Budi Haryanto', 'Laki-Laki', 1017, '9', '3'),
('3371045423131661', 'Putri Santoso', 'Laki-Laki', 1001, '5', '3'),
('3371045817423258', 'Samsul Widodo', 'Perempuan', 1018, '7', '6'),
('3371046181114220', 'Putri Haryanto', 'Laki-Laki', 1009, '8', '4'),
('3371046492476084', 'Rizki Widodo', 'Perempuan', 1002, '2', '2'),
('3371047288016099', 'Dewi Susilo', 'Laki-Laki', 1010, '7', '3'),
('3371047867602610', 'Zahid Setiawan', 'Laki-Laki', 1004, '5', '9'),
('3371048018988829', 'Anwar Suryono', 'Laki-Laki', 1006, '9', '5'),
('3371048824026286', 'Budi Santoso', 'Laki-Laki', 1001, '5', '7'),
('3371049103436363', 'Dewi Santoso', 'Perempuan', 1016, '7', '3'),
('3371049925497108', 'Hadi Wahyuni', 'Laki-Laki', 1002, '7', '8'),
('3371050600544014', 'Hadi Haryanto', 'Laki-Laki', 1001, '10', '5'),
('3371051237103998', 'Zahid Suryono', 'Laki-Laki', 1012, '7', '3'),
('3371051310061998', 'Rizki Susilo', 'Laki-Laki', 1003, '10', '4'),
('3371051873880690', 'Dewi Haryanto', 'Laki-Laki', 1015, '7', '7'),
('3371053267205600', 'Putri Suryono', 'Laki-Laki', 1007, '9', '10'),
('3371055220554294', 'Siti Wahyuni', 'Perempuan', 1012, '10', '1'),
('3371056236404813', 'Siti Santoso', 'Laki-Laki', 1005, '6', '8'),
('3371056735612669', 'Putri Hartono', 'Laki-Laki', 1005, '4', '4'),
('3371057211819774', 'Rina Wahyuni', 'Perempuan', 1016, '9', '2'),
('3371058695142037', 'Zahid Susilo', 'Laki-Laki', 1014, '1', '3'),
('3371058702568196', 'Budi Nugroho', 'Perempuan', 1017, '6', '10'),
('3371061046899386', 'Rizki Wahyuni', 'Laki-Laki', 1001, '6', '10'),
('3371061876759751', 'Putri Wahyuni', 'Laki-Laki', 1002, '1', '9'),
('3371062466466654', 'Siti Setiawan', 'Laki-Laki', 1013, '10', '1'),
('3371063428646415', 'Yuli Wahyuni', 'Perempuan', 1014, '5', '8'),
('3371064156620322', 'Hadi Suryono', 'Laki-Laki', 1014, '5', '8'),
('3371064325314224', 'Rizki Saputra', 'Laki-Laki', 1010, '2', '7'),
('3371066884331193', 'Samsul Saputra', 'Laki-Laki', 1009, '1', '7'),
('3371068238624389', 'Yuli Wahyuni', 'Perempuan', 1002, '3', '8'),
('3371071341368979', 'Yuli Haryanto', 'Perempuan', 1001, '3', '4'),
('3371077642197882', 'Samsul Wahyuni', 'Perempuan', 1004, '9', '10'),
('3371078931782208', 'Samsul Suryono', 'Perempuan', 1018, '2', '7'),
('3371080491584098', 'Samsul Nugroho', 'Laki-Laki', 1012, '5', '9'),
('3371080532529544', 'Siti Saputra', 'Perempuan', 1007, '6', '3'),
('3371081526078280', 'Rina Wahyuni', 'Laki-Laki', 1005, '3', '5'),
('3371082272667031', 'Yuli Widodo', 'Perempuan', 1018, '1', '7'),
('3371083475852929', 'Hadi Saputra', 'Perempuan', 1008, '9', '3'),
('3371086451458535', 'Anwar Nugroho', 'Perempuan', 1016, '10', '2'),
('3371087870411473', 'Putri Susilo', 'Laki-Laki', 1004, '9', '1'),
('3371088047501058', 'Samsul Hartono', 'Laki-Laki', 1009, '4', '8'),
('3371088147638060', 'Putri Santoso', 'Laki-Laki', 1012, '9', '8'),
('3371092096785875', 'Rina Wahyuni', 'Perempuan', 1010, '3', '4'),
('3371093754828488', 'Hadi Widodo', 'Laki-Laki', 1011, '1', '7'),
('3371093821094113', 'Yuli Widodo', 'Perempuan', 1014, '9', '2'),
('3371093867406335', 'Yuli Setiawan', 'Perempuan', 1012, '7', '8'),
('3371094095737847', 'Zahid Nugroho', 'Perempuan', 1008, '3', '8'),
('3371094985927040', 'Dewi Nugroho', 'Laki-Laki', 1009, '6', '9'),
('3371096042375507', 'Joko Susilo', 'Perempuan', 1014, '10', '7'),
('3371097343437482', 'Samsul Santoso', 'Perempuan', 1011, '6', '4'),
('3371097467753795', 'Dewi Saputra', 'Perempuan', 1016, '2', '1'),
('3371097970139669', 'Hadi Santoso', 'Perempuan', 1015, '8', '1'),
('3371098228371515', 'Budi Nugroho', 'Laki-Laki', 1012, '3', '5'),
('3371098732335230', 'Samsul Suryono', 'Perempuan', 1006, '5', '8'),
('3371098920215071', 'Putri Wahyuni', 'Laki-Laki', 1011, '7', '2'),
('3371099264412409', 'Dewi Widodo', 'Perempuan', 1003, '3', '8'),
('3371099637513569', 'Dewi Nugroho', 'Perempuan', 1017, '3', '2'),
('3371099937564912', 'Zahid Saputra', 'Perempuan', 1015, '5', '7');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(5) NOT NULL,
  `id_pedagang` varchar(30) NOT NULL,
  `izin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapak`
--

CREATE TABLE `lapak` (
  `id_lapak` varchar(10) NOT NULL,
  `id_pasar` int(5) NOT NULL,
  `jenis` enum('Los','Kios','Plataran','Lesehan','-') NOT NULL,
  `lantai` enum('1','2','3','4','-') NOT NULL,
  `blok` enum('A','B','C','D','E','F','G','H','I','J','K','-') NOT NULL,
  `zonasi` varchar(50) NOT NULL,
  `no` int(11) NOT NULL,
  `hadap` enum('Utara','Timur','Selatan','Barat','-') NOT NULL,
  `luas` int(5) NOT NULL,
  `tarif_dasar` int(10) NOT NULL,
  `status_lapak` enum('Kosong','Isi','Telat Bayar','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapak`
--

INSERT INTO `lapak` (`id_lapak`, `id_pasar`, `jenis`, `lantai`, `blok`, `zonasi`, `no`, `hadap`, `luas`, `tarif_dasar`, `status_lapak`) VALUES
('KS-A-K1', 5, 'Los', '2', 'G', 'Kuliner', 50, 'Utara', 17, 100, 'Isi'),
('KS-A-K2', 3, 'Plataran', '3', 'D', 'Kuliner', 13, 'Barat', 76, 49855, 'Isi'),
('KS-A-K3', 3, 'Plataran', '2', 'A', 'Bumbu Dapur', 57, 'Utara', 26, 68010, 'Isi'),
('KS-A-K4', 2, 'Kios', '3', 'I', 'Daging', 27, 'Barat', 80, 85452, 'Isi'),
('KS-B-A1', 2, 'Plataran', '4', 'G', 'Pakaian', 84, 'Barat', 42, 31783, 'Isi'),
('KS-B-A2', 2, 'Plataran', '3', 'E', 'Sembako', 6, 'Timur', 63, 50542, 'Isi'),
('KS-B-A3', 2, 'Los', '3', 'G', 'Elektronik', 1, 'Utara', 97, 39302, 'Isi'),
('KS-B-A4', 2, 'Kios', '2', 'D', 'Sembako', 69, 'Utara', 31, 13411, 'Isi'),
('KS-B-A5', 5, 'Kios', '2', 'E', 'Sembako', 83, 'Timur', 31, 68226, 'Isi'),
('KS-B-A6', 4, 'Lesehan', '1', 'A', 'Campuran', 25, 'Timur', 63, 72515, 'Isi'),
('KS-B-A7', 4, 'Lesehan', '4', 'A', 'Daging', 57, 'Selatan', 98, 25486, 'Isi'),
('KS-B-A8', 2, 'Kios', '3', 'F', 'Sembako', 93, 'Barat', 20, 18027, 'Isi'),
('KS-B-A9', 1, 'Los', '2', 'G', 'Bumbu Dapur', 72, 'Selatan', 47, 80864, 'Isi'),
('KS-B-B1', 3, 'Kios', '2', 'A', 'Campuran', 35, 'Utara', 64, 94209, 'Isi'),
('KS-B-B10', 2, 'Kios', '3', 'I', 'Sepatu', 33, 'Utara', 94, 34531, 'Isi'),
('KS-B-B2', 2, 'Los', '2', 'H', 'Pakaian', 83, 'Selatan', 43, 65458, 'Isi'),
('KS-B-B3', 4, 'Kios', '2', 'I', 'Elektronik', 95, 'Utara', 91, 50721, 'Isi'),
('KS-B-B4', 3, 'Kios', '3', 'I', 'Campuran', 89, 'Utara', 91, 61212, 'Isi'),
('KS-B-B5', 3, 'Lesehan', '2', 'D', 'Kuliner', 42, 'Selatan', 90, 58833, 'Isi'),
('KS-B-B6', 3, 'Plataran', '3', 'H', 'Kuliner', 5, 'Utara', 79, 98494, 'Isi'),
('KS-B-B7', 1, 'Lesehan', '3', 'B', 'Sayur', 97, 'Barat', 50, 54212, 'Isi'),
('KS-B-B8', 2, 'Los', '4', 'E', 'Daging', 61, 'Timur', 43, 36114, 'Isi'),
('KS-B-B9', 1, 'Lesehan', '1', 'F', 'Sayur', 95, 'Utara', 99, 45116, 'Isi'),
('LS-A-C1', 5, 'Plataran', '1', 'G', 'Pakaian', 13, 'Selatan', 31, 50266, 'Isi'),
('LS-A-C10', 1, 'Lesehan', '1', 'H', 'Sembako', 98, 'Timur', 99, 54237, 'Isi'),
('LS-A-C11', 2, 'Lesehan', '2', 'D', 'Kuliner', 28, 'Timur', 99, 61871, 'Isi'),
('LS-A-C12', 1, 'Plataran', '3', 'E', 'Sepatu', 86, 'Utara', 46, 30270, 'Isi'),
('LS-A-C13', 4, 'Los', '4', 'A', 'Kuliner', 10, 'Barat', 71, 98089, 'Isi'),
('LS-A-C14', 1, 'Kios', '3', 'C', 'Daging', 19, 'Utara', 24, 42458, 'Isi'),
('LS-A-C15', 5, 'Lesehan', '3', 'B', 'Pakaian', 86, 'Timur', 63, 52062, 'Isi'),
('LS-A-C16', 5, 'Kios', '4', 'B', 'Bumbu Dapur', 94, 'Selatan', 68, 20965, 'Isi'),
('LS-A-C17', 3, 'Lesehan', '3', 'A', 'Kuliner', 90, 'Barat', 97, 47123, 'Isi'),
('LS-A-C18', 3, 'Plataran', '4', 'I', 'Bumbu Dapur', 65, 'Utara', 28, 72358, 'Isi'),
('LS-A-C19', 1, 'Los', '3', 'H', 'Pakaian', 91, 'Barat', 85, 39650, 'Isi'),
('LS-A-C2', 5, 'Lesehan', '4', 'B', 'Campuran', 97, 'Utara', 89, 31462, 'Isi'),
('LS-A-C20', 3, 'Kios', '3', 'B', 'Campuran', 5, 'Barat', 58, 67284, 'Isi'),
('LS-A-C21', 5, 'Lesehan', '4', 'G', 'Daging', 81, 'Barat', 98, 92921, 'Isi'),
('LS-A-C22', 1, 'Los', '3', 'H', 'Campuran', 92, 'Utara', 23, 79603, 'Isi'),
('LS-A-C23', 4, 'Los', '1', 'B', 'Sembako', 59, 'Selatan', 100, 55261, 'Isi'),
('LS-A-C24', 2, 'Plataran', '1', 'A', 'Bumbu Dapur', 83, 'Selatan', 47, 85815, 'Isi'),
('LS-A-C25', 2, 'Lesehan', '2', 'I', 'Sayur', 86, 'Utara', 57, 49973, 'Isi'),
('LS-A-C26', 4, 'Lesehan', '1', 'I', 'Pakaian', 55, 'Timur', 41, 70348, 'Isi'),
('LS-A-C27', 1, 'Los', '4', 'A', 'Pakaian', 71, 'Utara', 14, 94637, 'Isi'),
('LS-A-C28', 2, 'Los', '3', 'H', 'Sepatu', 28, 'Barat', 99, 22856, 'Kosong'),
('LS-A-C29', 1, 'Kios', '2', 'F', 'Sayur', 73, 'Selatan', 50, 44538, 'Kosong'),
('LS-A-C3', 1, 'Plataran', '1', 'D', 'Sepatu', 29, 'Timur', 17, 21488, 'Isi'),
('LS-A-C30', 5, 'Los', '2', 'H', 'Sembako', 80, 'Barat', 95, 26622, 'Kosong'),
('LS-A-C31', 5, 'Lesehan', '3', 'G', 'Sembako', 47, 'Selatan', 77, 19809, 'Kosong'),
('LS-A-C32', 5, 'Kios', '3', 'F', 'Bumbu Dapur', 54, 'Barat', 97, 37891, 'Kosong'),
('LS-A-C33', 3, 'Plataran', '3', 'H', 'Sembako', 44, 'Selatan', 28, 25854, 'Kosong'),
('LS-A-C34', 3, 'Plataran', '3', 'D', 'Bumbu Dapur', 49, 'Selatan', 59, 26848, 'Kosong'),
('LS-A-C35', 3, 'Los', '2', 'F', 'Sembako', 41, 'Selatan', 100, 91912, 'Kosong'),
('LS-A-C36', 1, 'Kios', '3', 'C', 'Daging', 86, 'Selatan', 72, 40328, 'Kosong'),
('LS-A-C37', 5, 'Plataran', '4', 'D', 'Daging', 19, 'Utara', 89, 55163, 'Kosong'),
('LS-A-C38', 2, 'Lesehan', '3', 'B', 'Sayur', 27, 'Selatan', 94, 76941, 'Kosong'),
('LS-A-C39', 3, 'Kios', '1', 'A', 'Sayur', 37, 'Utara', 21, 13726, 'Kosong'),
('LS-A-C4', 2, 'Plataran', '3', 'G', 'Campuran', 13, 'Selatan', 49, 56356, 'Isi'),
('LS-A-C40', 3, 'Kios', '2', 'G', 'Elektronik', 72, 'Barat', 91, 56609, 'Kosong'),
('LS-A-C41', 3, 'Los', '1', 'G', 'Kuliner', 2, 'Barat', 87, 52215, 'Kosong'),
('LS-A-C42', 4, 'Los', '1', 'C', 'Sepatu', 94, 'Timur', 75, 49596, 'Kosong'),
('LS-A-C5', 4, 'Plataran', '4', 'I', 'Sepatu', 58, 'Selatan', 89, 66323, 'Isi'),
('LS-A-C6', 1, 'Los', '3', 'D', 'Sepatu', 98, 'Timur', 98, 50752, 'Isi'),
('LS-A-C7', 4, 'Plataran', '3', 'B', 'Sayur', 68, 'Utara', 81, 36846, 'Isi'),
('LS-A-C8', 4, 'Lesehan', '2', 'I', 'Sayur', 25, 'Selatan', 62, 13195, 'Isi'),
('LS-A-C9', 4, 'Plataran', '4', 'F', 'Kuliner', 74, 'Selatan', 36, 96837, 'Isi'),
('LS-A-D1', 5, 'Los', '3', 'D', 'Sayur', 52, 'Utara', 83, 15243, 'Telat Bayar'),
('LS-A-D10', 1, 'Plataran', '3', 'D', 'Sepatu', 98, 'Barat', 38, 19464, 'Telat Bayar'),
('LS-A-D2', 3, 'Kios', '2', 'B', 'Campuran', 20, 'Barat', 86, 55937, 'Telat Bayar'),
('LS-A-D3', 1, 'Plataran', '3', 'G', 'Daging', 76, 'Barat', 32, 54469, 'Telat Bayar'),
('LS-A-D4', 4, 'Lesehan', '4', 'C', 'Sayur', 41, 'Selatan', 28, 29235, 'Telat Bayar'),
('LS-A-D5', 2, 'Plataran', '2', 'D', 'Sayur', 50, 'Timur', 58, 23489, 'Telat Bayar'),
('LS-A-D6', 3, 'Lesehan', '3', 'H', 'Bumbu Dapur', 34, 'Barat', 56, 51239, 'Telat Bayar'),
('LS-A-D7', 4, 'Kios', '2', 'D', 'Pakaian', 18, 'Barat', 36, 86602, 'Telat Bayar'),
('LS-A-D8', 3, 'Lesehan', '2', 'A', 'Bumbu Dapur', 55, 'Selatan', 16, 79966, 'Telat Bayar'),
('LS-A-D9', 4, 'Lesehan', '2', 'E', 'Daging', 50, 'Barat', 50, 50973, 'Telat Bayar'),
('LS-B-A1', 2, 'Lesehan', '3', 'G', 'Daging', 13, 'Selatan', 49, 66226, 'Isi'),
('LS-B-A10', 4, 'Kios', '4', 'E', 'Campuran', 9, 'Utara', 94, 46153, 'Isi'),
('LS-B-A11', 4, 'Plataran', '1', 'C', 'Pakaian', 4, 'Utara', 78, 89361, 'Isi'),
('LS-B-A12', 4, 'Lesehan', '1', 'C', 'Elektronik', 57, 'Timur', 71, 60190, 'Isi'),
('LS-B-A2', 2, 'Kios', '2', 'B', 'Elektronik', 74, 'Barat', 12, 57035, 'Isi'),
('LS-B-A3', 2, 'Plataran', '1', 'H', 'Bumbu Dapur', 69, 'Barat', 21, 13341, 'Isi'),
('LS-B-A4', 4, 'Plataran', '3', 'B', 'Pakaian', 28, 'Barat', 11, 87566, 'Isi'),
('LS-B-A5', 2, 'Lesehan', '4', 'A', 'Elektronik', 75, 'Barat', 40, 46012, 'Isi'),
('LS-B-A6', 4, 'Lesehan', '1', 'E', 'Sembako', 39, 'Barat', 49, 52415, 'Isi'),
('LS-B-A7', 2, 'Plataran', '3', 'D', 'Campuran', 67, 'Utara', 51, 30749, 'Isi'),
('LS-B-A8', 5, 'Kios', '1', 'D', 'Kuliner', 35, 'Timur', 21, 18461, 'Isi'),
('LS-B-A9', 1, 'Plataran', '2', 'E', 'Daging', 59, 'Timur', 20, 69090, 'Isi'),
('LS-B-B1', 5, 'Plataran', '3', 'F', 'Kuliner', 46, 'Timur', 25, 83033, 'Isi'),
('LS-B-B2', 4, 'Kios', '3', 'I', 'Daging', 74, 'Barat', 89, 77487, 'Isi'),
('LS-B-B3', 4, 'Kios', '1', 'D', 'Bumbu Dapur', 89, 'Utara', 81, 48494, 'Isi'),
('LS-B-B4', 1, 'Lesehan', '2', 'A', 'Sepatu', 7, 'Barat', 67, 27912, 'Isi'),
('LS-B-B5', 2, 'Lesehan', '1', 'D', 'Campuran', 30, 'Utara', 83, 37488, 'Isi'),
('LS-B-B6', 5, 'Los', '2', 'B', 'Campuran', 8, 'Utara', 24, 29780, 'Isi'),
('LS-B-B7', 2, 'Kios', '1', 'D', 'Sembako', 22, 'Barat', 40, 40214, 'Isi'),
('LS-B-K1', 2, 'Plataran', '3', 'E', 'Sepatu', 98, 'Selatan', 44, 46696, 'Isi'),
('LS-B-K2', 5, 'Plataran', '2', 'D', 'Sayur', 84, 'Selatan', 72, 50199, 'Isi'),
('LS-B-K3', 2, 'Lesehan', '3', 'E', 'Kuliner', 23, 'Timur', 92, 69447, 'Isi'),
('LS-B-K4', 5, 'Lesehan', '3', 'G', 'Campuran', 46, 'Selatan', 76, 11724, 'Isi'),
('LS-B-K5', 2, 'Kios', '2', 'E', 'Sepatu', 5, 'Barat', 61, 10666, 'Isi'),
('LS-B-K6', 4, 'Kios', '4', 'B', 'Daging', 31, 'Barat', 51, 16946, 'Isi');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2023_05_06_072421_create_permission_tables', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(5) NOT NULL,
  `pasar` varchar(20) NOT NULL,
  `koordinat` varchar(30) NOT NULL,
  `kantor_pengelola` enum('Ada','Tidak Ada','-') NOT NULL,
  `toilet` enum('Ada','Tidak Ada','-') NOT NULL,
  `pos_ukur_ulang` enum('Ada','Tidak Ada','-') NOT NULL,
  `pos_keamanan` enum('Ada','Tidak Ada','-') NOT NULL,
  `ruang_menyusui` enum('Ada','Tidak Ada','-') NOT NULL,
  `ruang_kesehatan` enum('Ada','Tidak Ada','-') NOT NULL,
  `ruang_peribadatan` enum('Ada','Tidak Ada','-') NOT NULL,
  `pemadam_kebakaran` enum('Ada','Tidak Ada','-') NOT NULL,
  `tempat_parkir` enum('Ada','Tidak Ada','-') NOT NULL,
  `tps` enum('Ada','Tidak Ada','-') NOT NULL,
  `pengolahan_air_limbah` enum('Ada','Tidak Ada','-') NOT NULL,
  `air_bersih` enum('Ada','Tidak Ada','-') NOT NULL,
  `listrik` enum('Ada','Tidak Ada','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `pasar`, `koordinat`, `kantor_pengelola`, `toilet`, `pos_ukur_ulang`, `pos_keamanan`, `ruang_menyusui`, `ruang_kesehatan`, `ruang_peribadatan`, `pemadam_kebakaran`, `tempat_parkir`, `tps`, `pengolahan_air_limbah`, `air_bersih`, `listrik`) VALUES
(1, 'Rejowinangun', '-7.485679, 110.221897', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada'),
(2, 'Kebonpolo', '-7.463964, 110.223667', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada'),
(3, 'Cacaban', '-7.476743, 110.211544', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada'),
(4, 'Sidomukti', '-7.491176, 110.221396', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada'),
(5, 'Gotong Royong', '-7.493941, 110.224530', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `pedagang`
--

CREATE TABLE `pedagang` (
  `id_pedagang` varchar(30) NOT NULL,
  `id_lapak` varchar(10) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `jenis_dagang` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif','-') NOT NULL,
  `VA` varchar(20) NOT NULL,
  `id_penarik_retribusi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedagang`
--

INSERT INTO `pedagang` (`id_pedagang`, `id_lapak`, `nik`, `izin`, `jenis_dagang`, `check_in`, `check_out`, `status`, `VA`, `id_penarik_retribusi`) VALUES
('1018', 'KS-B-A1', '3371004051206092', 'SKP', 'Kuliner', '2024-01-11', '2024-10-10', 'Aktif', '011', 1001),
('1019', 'KS-B-A2', '3371071341368979', 'SKP', 'Kuliner', '2024-01-12', '2024-10-11', 'Aktif', '012', 1001),
('1020', 'KS-B-A3', '3371099264412409', 'SKP', 'Kuliner', '2024-01-13', '2024-10-12', 'Aktif', '013', 1001),
('1021', 'KS-B-A4', '3371094095737847', 'SKP', 'Kuliner', '2024-01-14', '2024-10-13', 'Aktif', '014', 1001),
('1022', 'KS-B-A5', '3371037470990456', 'SKP', 'Kuliner', '2024-01-15', '2024-10-14', 'Aktif', '015', 1001),
('1023', 'KS-B-A6', '3371008053742292', 'SKP', 'Kuliner', '2024-01-16', '2024-10-15', 'Aktif', '016', 1001),
('1024', 'KS-B-A7', '3371036809962628', 'SKP', 'Kuliner', '2024-01-17', '2024-10-16', 'Aktif', '017', 1001),
('1025', 'KS-B-A8', '3371021446979023', 'SKP', 'Kuliner', '2024-01-18', '2024-10-17', 'Aktif', '018', 1001),
('1026', 'KS-B-A9', '3371024036298099', 'SKP', 'Kuliner', '2024-01-19', '2024-10-18', 'Aktif', '019', 1001),
('1027', 'KS-B-B1', '3371064325314224', 'SKP', 'Kuliner', '2024-01-20', '2024-10-19', 'Aktif', '020', 1001),
('1028', 'KS-B-B2', '3371093821094113', 'SKP', 'Kuliner', '2024-01-21', '2024-10-20', 'Aktif', '021', 1001),
('1029', 'KS-B-B3', '3371029575336489', 'SKP', 'Kuliner', '2024-01-22', '2024-10-21', 'Aktif', '022', 1001),
('1030', 'KS-B-B4', '3371045423131661', 'SKP', 'Kuliner', '2024-01-23', '2024-10-22', 'Aktif', '023', 1001),
('1031', 'KS-B-B5', '3371041227747886', 'SKP', 'Kuliner', '2024-01-24', '2024-10-23', 'Aktif', '024', 1001),
('1032', 'KS-B-B6', '3371098920215071', 'SKP', 'Kuliner', '2024-01-25', '2024-10-24', 'Aktif', '025', 1001),
('1033', 'KS-B-B7', '3371049103436363', 'SKP', 'Kuliner', '2024-01-26', '2024-10-25', 'Aktif', '026', 1001),
('1034', 'KS-B-B8', '3371093867406335', 'SKP', 'Kuliner', '2024-01-27', '2024-10-26', 'Aktif', '027', 1001),
('1035', 'KS-B-B9', '3371053267205600', 'SKP', 'Kuliner', '2024-01-28', '2024-10-27', 'Aktif', '028', 1001),
('1036', 'KS-B-B10', '3371024158103663', 'SKP', 'Kuliner', '2024-01-29', '2024-10-28', 'Aktif', '029', 1001),
('1037', 'LS-B-A1', '3371037280719019', 'SKP', 'Kuliner', '2024-01-30', '2024-10-29', 'Aktif', '030', 1001),
('1038', 'LS-B-A2', '3371025566088511', 'SKP', 'Kuliner', '2024-01-31', '2024-10-30', 'Aktif', '031', 1001),
('1039', 'LS-B-A3', '3371061876759751', 'SKP', 'Kuliner', '2024-02-01', '2024-10-31', 'Aktif', '032', 1001),
('1040', 'LS-B-A4', '3371092096785875', 'SKP', 'Kuliner', '2024-02-02', '2024-11-01', 'Aktif', '033', 1001),
('1041', 'LS-B-A5', '3371055220554294', 'SKP', 'Kuliner', '2024-02-03', '2024-11-02', 'Aktif', '034', 1001),
('1042', 'LS-B-A6', '3371064156620322', 'SKP', 'Kuliner', '2024-02-04', '2024-11-03', 'Aktif', '035', 1001),
('1043', 'LS-B-A7', '3371099637513569', 'SKP', 'Kuliner', '2024-02-05', '2024-11-04', 'Aktif', '036', 1001),
('1044', 'LS-B-A8', '3371057211819774', 'SKP', 'Kuliner', '2024-02-06', '2024-11-05', 'Aktif', '037', 1001),
('1045', 'LS-B-A9', '3371015630578877', 'SKP', 'Kuliner', '2024-02-07', '2024-11-06', 'Aktif', '038', 1001),
('1046', 'LS-B-A10', '3371080491584098', 'SKP', 'Kuliner', '2024-02-08', '2024-11-07', 'Aktif', '039', 1001),
('1047', 'LS-B-A11', '3371022211734785', 'SKP', 'Kuliner', '2024-02-09', '2024-11-08', 'Aktif', '040', 1001),
('1048', 'LS-B-A12', '3371062466466654', 'SKP', 'Kuliner', '2024-02-10', '2024-11-09', 'Aktif', '041', 1001),
('1049', 'LS-B-B1', '3371096042375507', 'SKP', 'Kuliner', '2024-02-11', '2024-11-10', 'Aktif', '042', 1001),
('1050', 'LS-B-B2', '3371030435019562', 'SKP', 'Kuliner', '2024-02-12', '2024-11-11', 'Aktif', '043', 1001),
('1051', 'LS-B-B3', '3371066884331193', 'SKP', 'Kuliner', '2024-02-13', '2024-11-12', 'Aktif', '044', 1001),
('1052', 'LS-B-B4', '3371041894752834', 'SKP', 'Kuliner', '2024-02-14', '2024-11-13', 'Aktif', '045', 1001),
('1053', 'LS-B-B5', '3371081526078280', 'SKP', 'Kuliner', '2024-02-15', '2024-11-14', 'Aktif', '046', 1001),
('1054', 'LS-B-B6', '3371023833382145', 'SKP', 'Kuliner', '2024-02-16', '2024-11-15', 'Aktif', '047', 1001),
('1055', 'LS-B-B7', '3371033495375242', 'SKP', 'Kuliner', '2024-02-17', '2024-11-16', 'Aktif', '048', 1001),
('1056', 'LS-B-K1', '3371002716863712', 'SKP', 'Kuliner', '2024-02-18', '2024-11-17', 'Aktif', '049', 1001),
('1057', 'LS-B-K2', '3371083475852929', 'SKP', 'Kuliner', '2024-02-19', '2024-11-18', 'Aktif', '050', 1001),
('1058', 'LS-B-K3', '3371041334952913', 'SKP', 'Kuliner', '2024-02-20', '2024-11-19', 'Aktif', '051', 1001),
('1059', 'LS-B-K4', '3371003376666259', 'SKP', 'Kuliner', '2024-02-21', '2024-11-20', 'Aktif', '052', 1001),
('1060', 'LS-B-K5', '3371035666815499', 'SKP', 'Kuliner', '2024-02-22', '2024-11-21', 'Aktif', '053', 1001),
('1061', 'LS-B-K6', '3371026946746320', 'SKP', 'Kuliner', '2024-02-23', '2024-11-22', 'Aktif', '054', 1001),
('1062', 'KS-A-K1', '3371063428646415', 'SKP', 'Kuliner', '2024-02-24', '2024-11-23', 'Aktif', '055', 1001),
('1063', 'KS-A-K2', '3371041039563569', 'SKP', 'Kuliner', '2024-02-25', '2024-11-24', 'Aktif', '056', 1001),
('1064', 'KS-A-K3', '3371049925497108', 'SKP', 'Kuliner', '2024-02-26', '2024-11-25', 'Aktif', '057', 1001),
('1065', 'KS-A-K4', '3371034166223010', 'SKP', 'Kuliner', '2024-02-27', '2024-11-26', 'Aktif', '058', 1001),
('1066', 'LS-A-C1', '3371002195892250', 'SKP', 'Kuliner', '2024-02-28', '2024-11-27', 'Aktif', '059', 1001),
('1067', 'LS-A-C2', '3371058695142037', 'SKP', 'Kuliner', '2024-02-29', '2024-11-28', 'Aktif', '060', 1001),
('1068', 'LS-A-C3', '3371018539161694', 'SKP', 'Kuliner', '2024-03-01', '2024-11-29', 'Aktif', '061', 1001),
('1069', 'LS-A-C4', '3371047288016099', 'SKP', 'Kuliner', '2024-03-02', '2024-11-30', 'Aktif', '062', 1001),
('1070', 'LS-A-C5', '3371033267066049', 'SKP', 'Kuliner', '2024-03-03', '2024-12-01', 'Aktif', '063', 1001),
('1071', 'LS-A-C6', '3371098732335230', 'SKP', 'Kuliner', '2024-03-04', '2024-12-02', 'Aktif', '064', 1001),
('1072', 'LS-A-C7', '3371080532529544', 'SKP', 'Kuliner', '2024-03-05', '2024-12-03', 'Aktif', '065', 1001),
('1073', 'LS-A-C8', '3371056236404813', 'SKP', 'Kuliner', '2024-03-06', '2024-12-04', 'Aktif', '066', 1001),
('1074', 'LS-A-C9', '3371019766569884', 'SKP', 'Kuliner', '2024-03-07', '2024-12-05', 'Aktif', '067', 1001),
('1075', 'LS-A-C10', '3371077642197882', 'SKP', 'Kuliner', '2024-03-08', '2024-12-06', 'Aktif', '068', 1001),
('1076', 'LS-A-C11', '3371037704174971', 'SKP', 'Kuliner', '2024-03-09', '2024-12-07', 'Aktif', '069', 1001),
('1077', 'LS-A-C12', '3371058702568196', 'SKP', 'Kuliner', '2024-03-10', '2024-12-08', 'Aktif', '070', 1001),
('1078', 'LS-A-C13', '3371088147638060', 'SKP', 'Kuliner', '2024-03-11', '2024-12-09', 'Aktif', '071', 1001),
('1079', 'LS-A-C14', '3371041058593017', 'SKP', 'Kuliner', '2024-03-12', '2024-12-10', 'Aktif', '072', 1001),
('1080', 'LS-A-C15', '3371088047501058', 'SKP', 'Kuliner', '2024-03-13', '2024-12-11', 'Aktif', '073', 1001),
('1081', 'LS-A-C16', '3371097467753795', 'SKP', 'Kuliner', '2024-03-14', '2024-12-12', 'Aktif', '074', 1001),
('1082', 'LS-A-C17', '3371086451458535', 'SKP', 'Kuliner', '2024-03-15', '2024-12-13', 'Aktif', '075', 1001),
('1083', 'LS-A-C18', '3371093754828488', 'SKP', 'Kuliner', '2024-03-16', '2024-12-14', 'Aktif', '076', 1001),
('1084', 'LS-A-C19', '3371021683915783', 'SKP', 'Kuliner', '2024-03-17', '2024-12-15', 'Tidak Aktif', '077', 1001),
('1085', 'LS-A-C20', '3371047867602610', 'SKP', 'Kuliner', '2024-03-18', '2024-12-16', 'Tidak Aktif', '078', 1001),
('1086', 'LS-A-C21', '3371045817423258', 'SKP', 'Kuliner', '2024-03-19', '2024-12-17', 'Tidak Aktif', '079', 1001),
('1087', 'LS-A-C22', '3371003450238349', 'SKP', 'Kuliner', '2024-03-20', '2024-12-18', 'Tidak Aktif', '080', 1001),
('1088', 'LS-A-C23', '3371099937564912', 'SKP', 'Kuliner', '2024-03-21', '2024-12-19', 'Tidak Aktif', '081', 1001),
('1089', 'LS-A-C24', '3371087870411473', 'SKP', 'Kuliner', '2024-03-22', '2024-12-20', 'Tidak Aktif', '082', 1001),
('1090', 'LS-A-C25', '3371028930617370', 'SKP', 'Kuliner', '2024-03-23', '2024-12-21', 'Tidak Aktif', '083', 1001),
('1091', 'LS-A-C26', '3371082272667031', 'SKP', 'Kuliner', '2024-03-24', '2024-12-22', 'Tidak Aktif', '084', 1001),
('1092', 'LS-A-C27', '3371051237103998', 'SKP', 'Kuliner', '2024-03-25', '2024-12-23', 'Tidak Aktif', '085', 1001),
('1093', 'LS-A-C28', '3371034106389075', 'SKP', 'Kuliner', '2024-03-26', '2024-12-24', 'Tidak Aktif', '086', 1001),
('1094', 'LS-A-C29', '3371048824026286', 'SKP', 'Kuliner', '2024-03-27', '2024-12-25', 'Tidak Aktif', '087', 1001),
('1095', 'LS-A-C30', '3371029199932321', 'SKP', 'Kuliner', '2024-03-28', '2024-12-26', 'Tidak Aktif', '088', 1001),
('1096', 'LS-A-C31', '3371094985927040', 'SKP', 'Kuliner', '2024-03-29', '2024-12-27', 'Tidak Aktif', '089', 1001),
('1097', 'LS-A-C32', '3371031625253229', 'SKP', 'Kuliner', '2024-03-30', '2024-12-28', 'Tidak Aktif', '090', 1001),
('1098', 'LS-A-C33', '3371027413638922', 'SKP', 'Kuliner', '2024-03-31', '2024-12-29', 'Tidak Aktif', '091', 1001),
('1099', 'LS-A-C34', '3371019029623391', 'SKP', 'Kuliner', '2024-04-01', '2024-12-30', 'Tidak Aktif', '092', 1001),
('1100', 'LS-A-C35', '3371007737667835', 'SKP', 'Kuliner', '2024-04-02', '2024-12-31', 'Tidak Aktif', '093', 1001),
('1101', 'LS-A-C36', '3371097970139669', 'SKP', 'Kuliner', '2024-04-03', '2025-01-01', 'Tidak Aktif', '094', 1001),
('1102', 'LS-A-C37', '3371078931782208', 'SKP', 'Kuliner', '2024-04-04', '2025-01-02', 'Tidak Aktif', '095', 1001),
('1103', 'LS-A-C38', '3371056735612669', 'SKP', 'Kuliner', '2024-04-05', '2025-01-03', 'Tidak Aktif', '096', 1001),
('1104', 'LS-A-C39', '3371061046899386', 'SKP', 'Kuliner', '2024-04-06', '2025-01-04', 'Tidak Aktif', '097', 1001),
('1105', 'LS-A-C40', '3371046181114220', 'SKP', 'Kuliner', '2024-04-07', '2025-01-05', 'Tidak Aktif', '098', 1001),
('1106', 'LS-A-C41', '3371019088991081', 'SKP', 'Kuliner', '2024-04-08', '2025-01-06', 'Tidak Aktif', '099', 1001),
('1107', 'LS-A-C42', '3371046492476084', 'SKP', 'Kuliner', '2024-04-09', '2025-01-07', 'Tidak Aktif', '100', 1001),
('1108', 'LS-A-D1', '3371038473684089', 'SKP', 'Kuliner', '2024-04-10', '2025-01-08', 'Tidak Aktif', '101', 1001),
('1109', 'LS-A-D2', '3371051873880690', 'SKP', 'Kuliner', '2024-04-11', '2025-01-09', 'Tidak Aktif', '102', 1001),
('1110', 'LS-A-D3', '3371051310061998', 'SKP', 'Kuliner', '2024-04-12', '2025-01-10', 'Tidak Aktif', '103', 1001),
('1111', 'LS-A-D4', '3371040480487774', 'SKP', 'Kuliner', '2024-04-13', '2025-01-11', 'Tidak Aktif', '104', 1001),
('1112', 'LS-A-D5', '3371098228371515', 'SKP', 'Kuliner', '2024-04-14', '2025-01-12', 'Tidak Aktif', '105', 1001),
('1113', 'LS-A-D6', '3371050600544014', 'SKP', 'Kuliner', '2024-04-15', '2025-01-13', 'Tidak Aktif', '106', 1001),
('1114', 'LS-A-D7', '3371048018988829', 'SKP', 'Kuliner', '2024-04-16', '2025-01-14', 'Tidak Aktif', '107', 1001),
('1115', 'LS-A-D8', '3371005890166113', 'SKP', 'Kuliner', '2024-04-17', '2025-01-15', 'Tidak Aktif', '108', 1001),
('1116', 'LS-A-D9', '3371068238624389', 'SKP', 'Kuliner', '2024-04-18', '2025-01-16', 'Tidak Aktif', '109', 1001),
('1117', 'LS-A-D10', '3371097343437482', 'SKP', 'Kuliner', '2024-04-19', '2025-01-17', 'Tidak Aktif', '110', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `penarik_retribusi`
--

CREATE TABLE `penarik_retribusi` (
  `id_penarik_retribusi` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarik_retribusi`
--

INSERT INTO `penarik_retribusi` (`id_penarik_retribusi`, `nama`) VALUES
(2, 'Wisnu'),
(1001, 'Ashar');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT '2024-09-10 07:14:09',
  `saldo` bigint(20) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_telepon`, `last_seen`, `saldo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$10$x0OCSCPsbNRDixXkOXh5Det3CjlOgYcVmaMNZX4jFQ86PLVWoKtMS', 'Magelang', '08123456789', '2024-10-25 03:31:00', 0, NULL, '2024-09-10 07:15:47', '2024-10-25 03:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`kode_alamat`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_kode_alamat` (`kode_alamat`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `fk_id_pedagang` (`id_pedagang`);

--
-- Indexes for table `lapak`
--
ALTER TABLE `lapak`
  ADD PRIMARY KEY (`id_lapak`),
  ADD KEY `fk_id_pasar` (`id_pasar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`id_pedagang`),
  ADD KEY `fk_id_lapak` (`id_lapak`),
  ADD KEY `fk_nik` (`nik`),
  ADD KEY `fk_id_penarik_retribusi` (`id_penarik_retribusi`);

--
-- Indexes for table `penarik_retribusi`
--
ALTER TABLE `penarik_retribusi`
  ADD PRIMARY KEY (`id_penarik_retribusi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD CONSTRAINT `fk_kode_alamat` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `fk_id_pedagang` FOREIGN KEY (`id_pedagang`) REFERENCES `pedagang` (`id_pedagang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapak`
--
ALTER TABLE `lapak`
  ADD CONSTRAINT `fk_id_pasar` FOREIGN KEY (`id_pasar`) REFERENCES `pasar` (`id_pasar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD CONSTRAINT `fk_id_lapak` FOREIGN KEY (`id_lapak`) REFERENCES `lapak` (`id_lapak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_penarik_retribusi` FOREIGN KEY (`id_penarik_retribusi`) REFERENCES `penarik_retribusi` (`id_penarik_retribusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik` FOREIGN KEY (`nik`) REFERENCES `data_diri` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
