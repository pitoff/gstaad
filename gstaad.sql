-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 09:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gstaad`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(11) NOT NULL,
  `acc_num` varchar(15) NOT NULL,
  `amount` float NOT NULL,
  `sender` varchar(50) NOT NULL,
  `sender_bank` varchar(50) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `user_id`, `transaction_id`, `acc_num`, `amount`, `sender`, `sender_bank`, `cdate`) VALUES
(1, 2, 'pHNqZYrko', '1543498dder15r', 10000, 'major ken', 'iranian bank of peace', '2021-02-26 20:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `current_bal` int(11) NOT NULL,
  `available_bal` int(11) NOT NULL,
  `dod` varchar(11) NOT NULL,
  `d_debit` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `user_id`, `transaction_id`, `status`, `sender`, `amount`, `current_bal`, `available_bal`, `dod`, `d_debit`) VALUES
(3, 3, '1l9NfM5kT', '', 'malaysian bank', 30000, 2300, 2300, '2021-02-24', ''),
(6, 2, '0213kcZlx', '', 'iranianbank', 11000, 19400, 19400, '2021-01-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `expiry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `user_id`, `token`, `expiry`) VALUES
(1, 2, 7618, '11:39:34'),
(2, 2, 2699, '11:43:50'),
(3, 2, 4605, '11:45:01'),
(4, 2, 2412, '12:20:55'),
(5, 2, 5064, '12:27:03'),
(6, 2, 3538, '12:58:52'),
(7, 2, 3965, '01:00:10'),
(8, 2, 7308, '01:04:41'),
(9, 2, 6259, '01:09:03'),
(10, 2, 6553, '01:18:05'),
(11, 2, 4688, '04:44:43'),
(12, 2, 5030, '07:51:14'),
(13, 2, 4788, '08:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `transaction_id` varchar(11) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `acc_num` varchar(50) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `tdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `user_id`, `transaction_id`, `acc_name`, `acc_num`, `bank`, `amount`, `tdate`) VALUES
(1, 3, '$data[&#39;', 'peter', '561665612wfr56r2', 'ogelle', 100, '2021-02-25 00:36:13'),
(2, 3, '$data[&#39;', 'lokrds', '1543498dder15r', 'odeas', 400, '2021-02-25 00:39:16'),
(3, 3, 'iwolTSH69', 'asdfgarty', '1254677897', 'awersdf', 100, '2021-02-25 00:40:47'),
(4, 2, '814Trw5Yd', 'thomas mills', '12345679', 'global links bank', 850, '2021-02-25 02:11:11'),
(5, 2, '4BouYTced', 'lokrds', '12345679', 'global links bank', 500, '2021-02-25 02:20:20'),
(6, 3, 'Nd6uZTx9k', 'ona willow', '567356267', 'illsutrat', 100, '2021-02-25 08:57:15'),
(7, 2, '8rGMoT2pq', 'altiom', '21d67980fjgh', 'rt of bank', 50, '2021-02-25 08:58:48'),
(8, 2, 'i6rZA3jSf', 'peter', 'r-12368-989-1563', 'global links bank', 100, '2021-02-25 13:13:56'),
(9, 2, '6YB4lG3r0', 'peter', 'r-12368-989-1563', 'itewa', 100, '2021-02-26 07:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` int(2) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `acc_status` varchar(15) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `acc_num` varchar(50) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `nok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `surname`, `firstname`, `email`, `password`, `country`, `state`, `image`, `gender`, `dob`, `occupation`, `status`, `acc_status`, `mname`, `acc_num`, `pin`, `nok`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$LRkSOXWrRiRhUQvJpfjy9.A.XIOUjbIA9xg0BvZWF/MXtuRxSzstq', '', '', '', '', '', '', '', '', '', '', '0', ''),
(2, 2, 'paul', 'gambit', 'peteroffodile@gmail.com', '$2y$10$RTu5mgLuEiGeQbuouMeKnutruQp.W4dnGmaNbOo4GhCOaHUNOJHP2', 'United states', 'Indiana', '4MUZH41WMD.jpg', 'male', '2021-02-01', 'real estate', 'single', 'active', 'maria gambit', '1254677897', '$2y$10$nVk0bHL0YofMKDdhrScEQO2YURkgAJ8qQ30pLNbXp6364QE1/XbL2', 'maria gambit'),
(3, 2, 'thomas', 'mills', 'thmills123@gmail.com', '$2y$10$S3.GyA7d79wh1cNHABYEq.SOAkn1kV1HnMvs1cvUHtsLA4NmAMwJ6', 'United states', 'Indiana', '4.jpg', 'male', '1980-01-24', 'real estate', 'active', 'active', 'mills felicia', 'r-12368-989-1563', '$2y$10$14Wu5V0OSqEJ.chuvvx.aefEDIdlm3mUonWuaZA1CpnwGBAMElmO2', 'mills felicia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
