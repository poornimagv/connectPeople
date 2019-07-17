-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 10:50 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(25) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `upassword` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `uname`, `upassword`, `role`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'Nagu123', 'Nagu123', 'user', '1'),
(3, 'Halesh123', 'Halesh123', 'user', '1'),
(4, 'Shivu123', 'Shivu123', 'user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_events`
--

CREATE TABLE `tbl_news_events` (
  `id` int(25) NOT NULL,
  `title` varchar(225) NOT NULL,
  `dos` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news_events`
--

INSERT INTO `tbl_news_events` (`id`, `title`, `dos`, `description`) VALUES
(1, 'Board Meeting ', '2019-07-10', 'Board meeting conducted on 10/07/2019,kindly attend the meeting for updates');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(25) NOT NULL,
  `package` varchar(225) NOT NULL,
  `amount` varchar(225) NOT NULL,
  `management` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_query`
--

CREATE TABLE `tbl_query` (
  `id` int(25) NOT NULL,
  `s_name` varchar(225) NOT NULL,
  `s_email` varchar(225) NOT NULL,
  `s_mobile` varchar(225) NOT NULL,
  `s_query` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(25) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `bank` varchar(225) NOT NULL,
  `aname` varchar(225) NOT NULL,
  `anumber` varchar(225) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `upassword` varchar(225) NOT NULL,
  `plan` varchar(225) NOT NULL,
  `refer_id` varchar(250) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `fname`, `lname`, `email`, `phone`, `bank`, `aname`, `anumber`, `uname`, `upassword`, `plan`, `refer_id`, `reference`, `status`) VALUES
(9, 'Nagaraj', 'BV', 'Nagaraj@gmail.com', '7845785965', 'vijay VIJB11005', 'savings', '1224578512458', 'Nagu123', 'Nagu123', '1', '111001', 'Direct', 1),
(10, 'Halesh', 'BV', 'Halesh@gmail.com', '75755257878', 'vijay VIJB11005', 'savings', '1224578512458', 'Halesh123', 'Halesh123', '1', '111002', '111001', 1),
(11, 'Shivu', 'BS', 'Shivu@gmail.com', '75755257878', 'vijay VIJB11005', 'savings', '1224578512458', 'Shivu123', 'Shivu123', '1', '111003', '111001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replay`
--

CREATE TABLE `tbl_replay` (
  `id` int(25) NOT NULL,
  `s_name` varchar(225) NOT NULL,
  `r_query` varchar(225) NOT NULL,
  `r_replay` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(25) NOT NULL,
  `sendby` varchar(225) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `t_id` varchar(225) NOT NULL,
  `amount` varchar(225) NOT NULL,
  `photo_path` varchar(225) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `sendby`, `uname`, `t_id`, `amount`, `photo_path`, `status`) VALUES
(1, 'Raghu123 ', 'Naveen123 ', '511001', '50000', 'images/1563197321screenshot-localhost-2019-05-09-10-24-57-715.png', 1),
(2, 'Raghu123 ', 'Nagendra123 ', '511002', '25000', 'images/1563197350WhatsApp Image 2019-04-03 at 8.36.35 PM.jpeg', 1),
(3, 'Halesh123 ', 'Nagu123 ', '511001', '50000', 'images/1563263810tree structure.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trx`
--

CREATE TABLE `tbl_trx` (
  `id` int(25) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `counts` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trx`
--

INSERT INTO `tbl_trx` (`id`, `fname`, `refer_id`, `reference`, `counts`) VALUES
(1, 'Nagaraj', '111001', 'Direct', NULL),
(2, 'Halesh', '111002', '111001', NULL),
(3, 'Shivu', '111003', '111001', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `tbl_news_events`
--
ALTER TABLE `tbl_news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_query`
--
ALTER TABLE `tbl_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_replay`
--
ALTER TABLE `tbl_replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trx`
--
ALTER TABLE `tbl_trx`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_news_events`
--
ALTER TABLE `tbl_news_events`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_query`
--
ALTER TABLE `tbl_query`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_replay`
--
ALTER TABLE `tbl_replay`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_trx`
--
ALTER TABLE `tbl_trx`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
