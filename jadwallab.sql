-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2018 at 04:50 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 5.6.38-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwallab`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama_l` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `password`, `nidn`, `nama_l`) VALUES
(1, 'ardi', 'proea', 666, 'Ardi Sanjaya'),
(2, 'andar', 'pro', 555, 'Danar'),
(4, 'leon', 'anjay', 777, 'Leon Prasetya Mulya'),
(5, 'resti', 'anjay', 666555, 'Resti');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `lab` int(11) NOT NULL,
  `hari` varchar(11) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `dosen` int(11) DEFAULT NULL,
  `matkul` varchar(50) NOT NULL,
  `tgl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`lab`, `hari`, `jam`, `dosen`, `matkul`, `tgl`) VALUES
(1, 'c0', 'r0', 1, '5', ''),
(1, 'c4', 'r0', 2, '8', ''),
(1, 'c0', 'r1', 1, '5', ''),
(1, 'c3', 'r1', 2, '8', ''),
(1, 'c4', 'r1', 2, '8', ''),
(1, 'c1', 'r2', 2, '2', ''),
(1, 'c3', 'r2', 2, '8', ''),
(1, 'c5', 'r2', 2, '2', ''),
(1, 'c1', 'r3', 2, '2', ''),
(1, 'c5', 'r3', 2, '2', ''),
(1, 'c2', 'r7', 4, '6', ''),
(1, 'c2', 'r8', 4, '6', ''),
(1, 'c2', 'r9', 4, '6', ''),
(1, 'c0', 'r12', 1, '3', ''),
(1, 'c0', 'r13', 1, '3', ''),
(1, 'c0', 'r2', 4, 'Persiapan Lomba Robotik', '24-12-2018'),
(1, 'c0', 'r3', 4, 'Persiapan Lomba Robotik', '24-12-2018'),
(1, 'c0', 'r4', 4, 'Persiapan Lomba Robotik', '24-12-2018'),
(1, 'c1', 'r0', 4, 'Rapat Prodi', '18-12-2018'),
(4, 'c1', 'r3', 2, '2', '18-12-2018'),
(4, 'c1', 'r2', 2, '2', '18-12-2018'),
(3, 'c1', 'r0', 4, 'Persiapan Lomba Tingkat Internasional', '18-12-2018'),
(4, 'c0', 'r0', 1, '5', ''),
(4, 'c1', 'r1', 1, '3', ''),
(4, 'c1', 'r0', 4, 'ngopi bareng dosen', '18-12-2018'),
(1, 'c1', 'r10', 5, '9', '');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`) VALUES
(1, 'F1'),
(2, 'F2'),
(3, 'G1'),
(4, 'G2'),
(5, 'G3');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `matkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_dosen`, `matkul`) VALUES
(1, 0, 'Kosong'),
(2, 2, 'Jarkom 2'),
(3, 1, 'IMK'),
(5, 1, 'Web 2'),
(6, 4, 'Weebz'),
(8, 2, 'Jarkom 1'),
(9, 5, 'AI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
