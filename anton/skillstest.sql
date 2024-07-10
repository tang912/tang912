-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 08:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletesprofile`
--

CREATE TABLE `athletesprofile` (
  `id` int(11) NOT NULL,
  `eventID` int(10) NOT NULL,
  `deptID` int(10) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middleinit` varchar(2) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `contactNo` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `coachID` int(50) NOT NULL,
  `deanID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `athletesprofile`
--

INSERT INTO `athletesprofile` (`id`, `eventID`, `deptID`, `lastname`, `firstname`, `middleinit`, `course`, `year`, `civilStatus`, `gender`, `birthdate`, `contactNo`, `address`, `coachID`, `deanID`) VALUES
(2, 2, 1, 'xintona', 'aaaa', 'S', 'BSIT', '4', 'Single', 'Male', '2023-11-02', '09295568072', 'Basak ', 1, 1),
(5, 2, 1, 'xxx', 'yyy', 'z', 'CCS', '4', 'Single', 'Male', '2023-11-17', '09295568072', 'Basak ', 1, 1),
(6, 1, 2, 'caba', 'aaaa', 'z', 'CSS', '4', 'single', 'Male', '2023-11-08', '09295568072', 'Basak ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coachID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `deptID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coachID`, `fname`, `lname`, `mobile`, `deptID`) VALUES
(1, 'heubert', 'ferolino', '12345', 1),
(2, 'coach', 'data', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `deptID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`id`, `fname`, `lname`, `mobile`, `deptID`) VALUES
(1, 'neil', 'basabe', '1234', 1),
(2, 'dean', 'nead', '1234', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` int(11) NOT NULL,
  `deptName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`) VALUES
(1, 'BSIT'),
(2, 'CCS'),
(3, 'BSCPE'),
(4, 'BSED');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event` varchar(50) NOT NULL,
  `participant` varchar(50) NOT NULL,
  `manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event`, `participant`, `manager`) VALUES
(6, 'volleyball', '30', 'leah'),
(7, 'takyan', '5', 'leo'),
(8, 'takraw', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user`, `password`, `role`) VALUES
('19869627', '12345', 'admin'),
('12122271', '1234', 'dean'),
('12122271', '1234', ''),
('coach', 'coach', 'coach');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timeStart` time(6) NOT NULL,
  `timeEnd` time(6) NOT NULL,
  `event` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `incharge` varchar(50) NOT NULL,
  `counterpart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `timeStart`, `timeEnd`, `event`, `venue`, `incharge`, `counterpart`) VALUES
(2, '2023-11-17', '17:06:00.000000', '19:06:00.000000', 'basketball', 'UC MAIN BASKETBALL COURT', 'LAKANDIWA', 'BSIT'),
(6, '2023-11-28', '04:59:00.000000', '06:59:00.000000', 'Mobile Legends', '530 UC MAIN', 'PSITS', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tournamentmanager`
--

CREATE TABLE `tournamentmanager` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `deptID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tournamentmanager`
--

INSERT INTO `tournamentmanager` (`id`, `fname`, `lname`, `mobile`, `deptID`) VALUES
(1, 'sample', 'data', '1234', 3),
(2, 'tournament', 'manager', '12345', 4),
(3, 'manager', 'tournament', '1234', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletesprofile`
--
ALTER TABLE `athletesprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coachID`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournamentmanager`
--
ALTER TABLE `tournamentmanager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletesprofile`
--
ALTER TABLE `athletesprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dean`
--
ALTER TABLE `dean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tournamentmanager`
--
ALTER TABLE `tournamentmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
