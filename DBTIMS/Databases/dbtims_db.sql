-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 01:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

CREATE TABLE `accident` (
  `Accident_ID` int(11) NOT NULL,
  `license_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `plateNumber` varchar(32) NOT NULL,
  `acc_date` datetime NOT NULL,
  `street_no` varchar(32) NOT NULL,
  `acc_type` varchar(10) NOT NULL DEFAULT 'low',
  `cause` varchar(150) NOT NULL,
  `tp_id` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accident`
--

INSERT INTO `accident` (`Accident_ID`, `license_no`, `plateNumber`, `acc_date`, `street_no`, `acc_type`, `cause`, `tp_id`) VALUES
(6, '11111', 'a5555', '2022-08-11 04:06:15', 'st_01', 'low', 'drunk', 'tp555');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`) VALUES
('2', 'Admin', 'admin', 'admin@admin.com', '0911223654', '$2y$10$oyyPYwX9.vca/EnffwDNlOyyDHe0V6DoLCeG7iS47CCG05mEoyB12', 'admin', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `plateNumber` varchar(10) NOT NULL,
  `license_no` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `registration_date` datetime DEFAULT NULL,
  `license_ex_date` datetime DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `charge` varchar(10) NOT NULL DEFAULT 'paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`fname`, `lname`, `sex`, `plateNumber`, `license_no`, `level`, `phone`, `address`, `email`, `password`, `status`, `registration_date`, `license_ex_date`, `birth_date`, `charge`) VALUES
('tsega', 'selome', 'm', 'a5555', '11111', '1(auto)', '099875654', 'tebase', 'a@a.com', '$2y$10$Id4psjZnDKHngttmnwuiv.0uSWO8ZGTl74bdVrg5v63dT3VBB0eFK', b'1', '2022-08-04 17:25:00', '2026-07-08 17:25:00', '2008-11-19', 'paid'),
('Haile', 'Chera', 'm', '36589', '12345', '1(auto)', '0978451236', 'tebase', 'haile@gmail.com', '$2y$10$wM51YD/br0x8f5e8skR5Ue0WIYoziIMc8wXizgjkO7SvrzZN3CvdG', b'1', '2022-07-06 23:21:00', '2023-04-28 23:21:00', '2019-02-01', 'unpaid'),
('Habtamu', 'MuluNeh', 'm', 'A6789', 'a121213', '3(people 2)', '912346578', 'Tebase', 'habte@gmail.com', '$2y$10$UvZQ..fTIxtT79VIJA36aOdeqA1bVYpXB.s2PDGEp5sXmEt.JrFnK', b'1', '2022-08-08 15:15:00', '2027-08-08 15:15:00', '1995-05-10', 'unpaid'),
('Selemon', 'MuluNeh', 'm', 'b122111', 'a246810', '2(people 1)', '0912345678', 'silase', 's@g.com', '$2y$10$jkzS4g0Ow5SgMfgccWYgTOOtT9PJz4Kl682cmyUAiwk4F5PU7j1Qy', b'1', '2022-08-24 15:44:00', '2027-08-24 15:44:00', '1981-06-25', 'unpaid'),
('Berhanu', 'Abera', 'm', 'A879809', 'a987654', '3(people 2)', '0945658455', 'Tebase', 'bera@gmail.com', '$2y$10$JegZJTprVZePboMLMiu7IuLM5wFS3IiJXX4lseWOM4dR.QDwlyE/6', b'1', '2022-08-22 16:54:00', '2027-08-22 16:54:00', '2022-08-31', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'supervisor',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `status` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `status`, `address`, `sex`, `birth_date`) VALUES
('emp123', 'abebe', 'kebede', 'abe@gmail.com', '097458422', '$2y$10$KiRttGPxO52umbfvfDwmMOjZ2R0sA6dnU3ja0agUBMVc7l6Shs0w.', 'employee', 'avatar.png', b'1', 'Tebase', 'm', '2014-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender`, `message`, `date`) VALUES
(2, 'tame@gmail.com', 'sdafas', '2010-08-22 10:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `license_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `license_no`, `transaction_id`, `transaction_date`, `amount`) VALUES
(1, '11111', 'a12b13c14', '2022-08-08 15:46:37', 200),
(2, '12345', 'c2d3e4', '2022-09-08 15:46:37', 500);

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `punish_id` int(11) NOT NULL,
  `license_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `plate_no` varchar(32) CHARACTER SET utf8 NOT NULL,
  `street_no` varchar(32) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `punish_date` datetime DEFAULT NULL,
  `tp_id` varchar(30) CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  `paid` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`punish_id`, `license_no`, `plate_no`, `street_no`, `Reason`, `punish_date`, `tp_id`, `amount`, `paid`) VALUES
(7, '12345', '36589', 'st15', 'accident', '2022-07-02 23:53:08', 'tp555', 0, b'1'),
(8, '12345', '36589', 'st15', 'accident', '2022-08-02 23:53:08', 'tp555', 0, b'1'),
(9, '12345', '36589', 'st01', 'accident', '2022-08-02 23:58:05', 'tp555', 0, b'1'),
(10, '12345', '36589', 'tebasest01', 'Accident', '2022-08-02 23:32:24', 'tp555', 0, b'1'),
(11, '12345', '36589', 'st01', 'zenebe', '2022-08-03 00:04:57', 'tp555', 0, b'1'),
(12, '12345', '36589', 'st123', 'accident', '2022-08-03 00:14:59', 'tp555', 0, b'1'),
(13, '12345', '36589', 'st01', 'accident', '2022-08-04 08:58:30', 'tp555', 0, b'1'),
(14, '11111', 'a5555', 'tebase', 'Hello', '2022-08-04 17:43:42', 'tp555', 100, b'1'),
(15, '11111', 'a5555', 'st05', 'reason', '2022-08-04 18:09:23', 'tp555', 300, b'1'),
(16, '11111', 'a5555', '11', 'hey', '2022-08-04 18:29:19', 'tp555', 700, b'1'),
(17, 'a121213', 'A6789', 'st03', 'drunk and drive', '2022-08-08 16:06:39', 'tp555', 300, b'1'),
(18, 'a121213', 'A6789', 'tebase', 'drunk', '2022-08-08 16:49:18', 'tp555', 700, b'1'),
(19, 'a121213', 'A6789', 'megenteya', 'accident', '2022-08-08 16:52:05', 'tp555', 700, b'1'),
(20, 'a121213', 'A6789', '12', 'res', '2022-08-08 16:55:06', 'tp555', 300, b'1'),
(21, 'a121213', 'A6789', 'st12', 'res', '2022-08-08 17:00:19', 'tp555', 100, b'1'),
(22, '11111', 'a5555', 'st0', 'acc', '2022-08-08 17:21:43', 'tp555', 300, b'1'),
(23, '11111', 'a5555', 'st3', 'prior', '2022-08-09 09:32:39', 'tp555', 300, b'1'),
(24, '11111', 'a5555', 'st09', 'drunk', '2022-08-09 09:57:09', 'tp555', 300, b'1'),
(25, 'a246810', 'b122111', 'tebase01', 'Drunk diver', '2022-08-24 21:56:14', 'tp555', 300, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tpas`
--

CREATE TABLE `tpas` (
  `tpa_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'supervisor',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `status` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tpas`
--

INSERT INTO `tpas` (`tpa_id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `status`, `address`, `sex`, `birth_date`) VALUES
('ntpa1', 'Selemon', 'MuluNeh', 'sol@admin.com', '0912346587', '$2y$10$XNLOIfhjx4M29Rwae7Ve4.D5TOOchxTNC4gPAwDx0TCH8m9.dduPW', 'tpa', 'avatar.png', b'1', 'Tebase', 'm', '2022-08-05'),
('tpa111', 'Wendmu', 'Dawa', 'tame@gmail.com', '0912345678', '$2y$10$N8HxfIfdbn8E1cw2UCt0P.hCNeyxYo2jW9zT8JCTYLjJUBkQK.9bm', 'tpa', 'avatar.png', b'1', 'semayawi', 'm', '2019-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_polices`
--

CREATE TABLE `traffic_polices` (
  `traffic_police_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'enumerator',
  `status` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(30) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `appelation` varchar(30) NOT NULL,
  `allocation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `plateNumber` varchar(10) NOT NULL,
  `made_in` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `owner_name` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `manufacture_date` date DEFAULT NULL,
  `shanse_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`plateNumber`, `made_in`, `model`, `owner_name`, `name`, `manufacture_date`, `shanse_no`) VALUES
('A1234', 'Argentina', 'micra00', 'Admasu wana', 'Abel Hailu', '2013-07-18', 'ch_945');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accident`
--
ALTER TABLE `accident`
  ADD PRIMARY KEY (`Accident_ID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`license_no`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`punish_id`);

--
-- Indexes for table `tpas`
--
ALTER TABLE `tpas`
  ADD PRIMARY KEY (`tpa_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `traffic_polices`
--
ALTER TABLE `traffic_polices`
  ADD PRIMARY KEY (`traffic_police_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`plateNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accident`
--
ALTER TABLE `accident`
  MODIFY `Accident_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `punishment`
--
ALTER TABLE `punishment`
  MODIFY `punish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`license_no`) REFERENCES `drivers` (`license_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
