-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 21, 2024 at 03:39 PM
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
-- Database: `mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `npm` varchar(12) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`npm`, `nama`, `alamat`, `jk`, `tgl_lhr`, `email`) VALUES
('140810230002', 'Chellin', 'Bumi Kartika Asri', 'P', '2005-03-25', 'marchellin@gmail.com'),
('140810230010', 'Nikita', 'Buba', 'P', '2024-10-02', 'niki@gmail.com'),
('140810230011', 'Lukas', 'Skyland', 'L', '2005-03-24', 'lukas@gmail.com'),
('140810230026', 'Audres', 'Avisha', 'P', '2005-09-14', 'audrey@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `npm` varchar(12) DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `npm`, `level`) VALUES
('admin1', '7a25b0bc04e77a2f7453dd021168cdc2', '140810230026', '2'),
('user1', '7c6a180b36896a0a8c02787eeafb0e4c', '140810230002', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;