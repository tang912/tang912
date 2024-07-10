-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 08:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skilltest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `gender`, `age`, `password`, `role`) VALUES
(2, 'jusbas', 'Julius', 'Basas', 0, 22, '$2y$10$eKUK2nrMAdpMQZPxSSG7.efhMHC14/MuPk4qLvT.BDBCBr4ewTc3S', 'ADMIN'),
(5, 'user1', 'User', 'One', 0, 21, '$2y$10$/DuvWxnIRScmnu.lI3pAG./E2n1Cl/RrEgUPQHKkl8fb2Ee5YtcdW', 'USER'),
(6, 'admin', 'Admin', 'One', 0, 22, '$2y$10$lA7m03qD5keEoQYPwqwLleMXtRXXq93mpYYHCUxah8iDFYUpDdr1O', 'USER'),
(7, 'web', 'Gezyweb', 'Ibjong', 0, 35, '$2y$10$B1y37Tk22QlT69pamY6e3uT7ckOvTurita0VI9Fvp0PG0hY8OcXYS', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
