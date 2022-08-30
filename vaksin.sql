-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 04:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE `orang` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`nik`, `nama`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `no_hp`) VALUES
('3128102912010291', 'jalis', 'Jl. Pahlawan', '2002-08-23', 'L', '081322796477'),
('3128190370197391', 'irvin', 'Jl. Dipati Ukur', '2002-08-17', 'L', '087087087087'),
('3204054707020005', 'winda', 'Jl. Cibiru', '2002-07-07', 'P', '089322909475'),
('3205281998219090', 'raya', 'Jl. Sekeloa', '2002-02-06', 'P', '0821921021210'),
('3210210821020100', 'raihan', 'Jl. Kopo', '2002-08-28', 'L', '0831218271900'),
('3612819210802197', 'omang', 'Jl. Sukapura', '2002-06-03', 'L', '0895703074988');

-- --------------------------------------------------------

--
-- Table structure for table `status_vaksin`
--

CREATE TABLE `status_vaksin` (
  `kd_status` varchar(5) NOT NULL,
  `dosis` enum('1','2','Booster') NOT NULL,
  `tgl_vaksin` date NOT NULL,
  `keterangan` enum('sudah','belum') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kd_rs` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_vaksin`
--

INSERT INTO `status_vaksin` (`kd_status`, `dosis`, `tgl_vaksin`, `keterangan`, `nik`, `kd_rs`) VALUES
('S-001', 'Booster', '2022-07-06', 'belum', '3128102912010291', 102),
('S-002', '1', '2022-07-03', 'sudah', '3205281998219090', 104),
('S-003', '2', '2022-07-13', 'sudah', '3210210821020100', 107),
('S-004', 'Booster', '2022-06-26', 'belum', '3204054707020005', 108),
('S-005', '1', '2022-07-04', 'sudah', '3205281998219090', 104);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_vaksin`
--

CREATE TABLE `tempat_vaksin` (
  `kd_rs` int(5) NOT NULL,
  `nama_rs` varchar(30) DEFAULT NULL,
  `jam_operasional` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_vaksin`
--

INSERT INTO `tempat_vaksin` (`kd_rs`, `nama_rs`, `jam_operasional`) VALUES
(102, 'Santo Yusup', '10:00'),
(103, 'Al Islam', '09:00'),
(104, 'Immanuel', '08:00'),
(105, 'Hasan Sadikin', '07:00'),
(106, 'AMC', '07:30'),
(107, 'Pindad', '06:30'),
(108, 'Cibiru Raya', '12:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`) VALUES
('windaasm', '*A420BA4A73C2F1E370121F419872D506F524EF95'),
('gemjeh', 'gem'),
('admin', '*161959ED38D1EC5E58962E6B9D50661C2A9C4B17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `status_vaksin`
--
ALTER TABLE `status_vaksin`
  ADD PRIMARY KEY (`kd_status`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kd_rs` (`kd_rs`);

--
-- Indexes for table `tempat_vaksin`
--
ALTER TABLE `tempat_vaksin`
  ADD PRIMARY KEY (`kd_rs`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `status_vaksin`
--
ALTER TABLE `status_vaksin`
  ADD CONSTRAINT `status_vaksin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `orang` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_vaksin_ibfk_2` FOREIGN KEY (`kd_rs`) REFERENCES `tempat_vaksin` (`kd_rs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
