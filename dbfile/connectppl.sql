-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 05:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

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
(4, 'Shivu123', 'Shivu123', 'user', '1'),
(5, 'pooh', '123', 'user', '1'),
(6, 'adii', '123', 'user', '1'),
(7, 'pavan', '123', 'user', '1'),
(8, 'karan', '123', 'user', '-2'),
(9, 'varun', '123', 'user', '1'),
(10, 'poovan', '123', 'user', '1'),
(11, 'varsha', '123', 'user', '1'),
(12, 'pooh2', '123', 'user', '1'),
(13, 'pooh3', '123', 'user', '1'),
(14, 'pooh4', '123', 'user', '1'),
(15, 'pooh31', '123', 'user', '1'),
(16, 'pooh32', '123', 'user', '1'),
(17, 'abc', '123', 'user', '1'),
(18, 'abc1', '123', 'user', '1'),
(19, 'abc2', '123', 'user', '1'),
(20, 'abc1a', '123', 'user', '1'),
(21, 'abc1b', '123', 'user', NULL),
(22, 'test1', '123', 'user', NULL),
(24, 'deepa', '123', 'user', '1'),
(25, 'sonali', '123', 'user', '1'),
(26, 'mona', '123', 'user', '1'),
(27, 'lisa', '123', 'user', '1'),
(28, 'aditya', '123', 'user', '1'),
(29, 'mohan', '123', 'user', '1'),
(32, '123', '123', 'user', NULL),
(34, 'testabc', '123', 'user', NULL),
(47, 'monali', '123', 'user', '1'),
(53, 'mohan1', '123', 'user', NULL);

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
-- Table structure for table `tbl_referer_count`
--

CREATE TABLE `tbl_referer_count` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `referer_referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_referer_count`
--

INSERT INTO `tbl_referer_count` (`id`, `username`, `referer`, `referer_referer`) VALUES
(6, 'karan', 'Direct', 'karan'),
(9, 'deepa', 'karan', 'karan'),
(10, 'sonali', 'karan', 'karan'),
(11, 'monali', 'deepa', 'karan'),
(12, 'lisa', 'deepa', 'karan'),
(13, 'aditya', 'sonali', 'karan'),
(24, 'mohan', 'sonali', 'karan');

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
(10, 'Halesh', 'BV', 'Halesh@gmail.com', '75755257878', 'vijay VIJB11005', 'savings', '1224578512458', 'Halesh123', 'Halesh123', '1', '111002', '111001', 1),
(11, 'Shivu', 'BS', 'Shivu@gmail.com', '75755257878', 'vijay VIJB11005', 'savings', '1224578512458', 'Shivu123', 'Shivu123', '1', '111003', '111001', 1),
(54, 'karan', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'karan', '123', '1', '111004', 'Direct', -2),
(57, 'deepa', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'deepa', '123', '1', '111005', 'karan', 1),
(58, 'sonali', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'sonali', '123', '1', '111006', 'karan', 1),
(59, 'mona', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'monali', '123', '1', '111007', 'deepa', 1),
(60, 'lisa', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'lisa', '123', '1', '111008', 'deepa', 1),
(61, 'aditya', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'aditya', '123', '1', '111009', 'sonali', 1),
(73, 'mohan', 'test', 'test@test.com', 'test', 'test', 'test', 'test', 'mohan', '123', '1', '111010', 'sonali', 0);

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
(3, 'Halesh123 ', 'Nagu123 ', '511001', '50000', 'images/1563263810tree structure.PNG', 1),
(4, 'adii ', 'pooh ', '234234234', '500000', 'images/1563271650bike-vector@2x.png', 1),
(5, 'pavan ', 'pooh ', '23432423', '500000', 'images/1563271841bike-vector@2x.png', 1);

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
(3, 'Shivu', '111003', '111001', NULL),
(4, 'pooh', '111004', '', NULL),
(5, 'adii', '111005', 'pooh', NULL),
(6, 'pavan', '111006', 'pooh', NULL),
(7, 'Karan', '111007', 'adii', NULL),
(8, 'varun', '111008', 'adii', NULL),
(9, 'poovan', '111009', 'pavan', NULL),
(10, 'varsha', '111010', 'pavan', NULL),
(11, 'pooh2', '111011', '', NULL),
(12, 'pooh3', '111012', 'pooh2', NULL),
(13, 'pooh4', '111013', 'pooh2', NULL),
(14, 'pooh31', '111014', 'pooh3', NULL),
(15, 'pooh32', '111015', 'pooh3', NULL),
(16, 'abc', '111016', '', NULL),
(17, 'abc1', '111017', 'abc', NULL),
(18, 'abc2', '111018', 'abc', NULL),
(19, 'abc1a', '111019', 'abc1', NULL),
(20, 'abc1b', '111020', 'abc1', NULL),
(21, 'test1', '111021', '', NULL),
(22, 'karan', '111004', '', NULL),
(23, 'Deepa', '111005', 'karan', NULL),
(24, 'Sonali', '111006', 'karan', NULL),
(25, 'mona', '111007', 'deepa', NULL),
(26, 'lisa', '111008', 'deepa', NULL),
(27, 'aditya', '111009', 'sonali', NULL),
(28, 'mohan', '111010', 'sonali', NULL),
(29, 'karan', '111004', '', NULL),
(30, 'karan', '111004', '', NULL),
(31, 'test', '111005', '123', NULL),
(32, 'test123', '111006', '123', NULL),
(33, 'testabc', '111007', '', NULL),
(34, 'Karan', '111004', '', NULL),
(35, 'karan', '111004', 'Direct', NULL),
(36, 'karan', '111004', 'Direct', NULL),
(37, 'deepa', '111005', 'karan', NULL),
(38, 'deepa', '111005', 'karan', NULL),
(39, 'sonali', '111006', 'karan', NULL),
(40, 'mona', '111007', 'deepa', NULL),
(41, 'karan', '111004', 'Direct', NULL),
(42, 'deepa', '111005', 'karan', NULL),
(43, 'sonali', '111006', 'karan', NULL),
(44, 'deepa', '111005', 'karan', NULL),
(45, 'sonali', '111006', 'karan', NULL),
(46, 'mona', '111007', 'deepa', NULL),
(47, 'lisa', '111008', 'deepa', NULL),
(48, 'aditya', '111009', 'sonali', NULL),
(49, 'mohan', '111010', 'sonali', NULL),
(50, 'mohan', '111010', 'sonali', NULL),
(51, 'mohan', '111010', 'sonali', NULL),
(52, 'mohan1', '111011', 'mohan', NULL),
(53, 'mohan', '111010', 'sonali', NULL),
(54, 'mohan', '111010', 'sonali', NULL),
(55, 'mohan', '111010', 'sonali', NULL),
(56, 'mohan', '111010', 'sonali', NULL),
(57, 'mohan', '111010', 'sonali', NULL),
(58, 'mohan', '111010', 'sonali', NULL),
(59, 'mohan', '111010', 'sonali', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergraph`
--

CREATE TABLE `tbl_usergraph` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userCount` int(50) NOT NULL,
  `ReferedMember` varchar(255) NOT NULL,
  `childMembers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usergraph`
--

INSERT INTO `tbl_usergraph` (`id`, `username`, `userCount`, `ReferedMember`, `childMembers`) VALUES
(0, 'karan', 1, 'test', 'child');

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
-- Indexes for table `tbl_referer_count`
--
ALTER TABLE `tbl_referer_count`
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
-- Indexes for table `tbl_usergraph`
--
ALTER TABLE `tbl_usergraph`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
-- AUTO_INCREMENT for table `tbl_referer_count`
--
ALTER TABLE `tbl_referer_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_replay`
--
ALTER TABLE `tbl_replay`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_trx`
--
ALTER TABLE `tbl_trx`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
