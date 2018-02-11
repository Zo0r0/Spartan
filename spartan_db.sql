-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 05:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spartan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(4) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `cat_show` set('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `cat_name`, `img_path`, `cat_show`) VALUES
(17, 'Kleren', '../img/cat/163.png', 'Yes'),
(18, 'Schoenen', '../img/cat/137.png', 'No'),
(19, 'Cosmetica', '../img/cat/386.png', 'Yes'),
(20, 'Juwelen', '../img/cat/217.png', 'Yes'),
(21, 'Boeken', '../img/cat/345.png', 'No'),
(22, 'Films', '../img/cat/228.png', 'No'),
(23, 'Muziek', '../img/cat/128.png', 'Yes'),
(24, 'Speelgoed', '../img/cat/379.png', 'Yes'),
(25, 'Video Games', '../img/cat/239.png', 'Yes'),
(26, 'Elektronica', '../img/cat/206.png', 'Yes'),
(27, 'Interieur', '../img/cat/236.png', 'No'),
(28, 'Eten', '../img/cat/172.png', 'No'),
(29, 'Autos', '../img/cat/118.png', 'No'),
(30, 'Buitenhuis', '../img/cat/153.png', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(40) NOT NULL,
  `deal_name` varchar(250) NOT NULL,
  `deal_btn` varchar(40) DEFAULT NULL,
  `deal_img_path` varchar(250) NOT NULL,
  `deal_block` set('Block 1','Block 2','Block 3','Block 4') NOT NULL,
  `experation_stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `deal_name`, `deal_btn`, `deal_img_path`, `deal_block`, `experation_stamp`) VALUES
(5, 'KlerenSale', 'Kortingcode', '../img/deals/338.png', 'Block 1', '2018-02-14'),
(6, 'IntAd', 'Shop Nu', '../img/deals/364.png', 'Block 2', '2018-02-17'),
(7, 'Test', '', '../img/deals/291.png', 'Block 1', '2018-02-08'),
(8, 'KampeerAd', 'Shop Nu', '../img/deals/233.png', 'Block 3', '2018-02-16'),
(9, 'SpeelgoedKorting', 'Shop Nu', '../img/deals/135.png', 'Block 4', '2018-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE `logfile` (
  `attempt_id` int(250) NOT NULL,
  `attempt` set('login','logout') NOT NULL,
  `username` varchar(40) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `success` set('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`attempt_id`, `attempt`, `username`, `timestamp`, `success`) VALUES
(9, 'login', 'admin', '2018-01-31 11:20:42', 'Yes'),
(10, 'logout', 'admin', '2018-01-31 11:20:53', 'Yes'),
(11, 'login', 'admin', '2018-01-31 11:21:25', 'Yes'),
(12, 'login', 'admin', '2018-01-31 20:44:15', 'Yes'),
(13, 'logout', 'admin', '2018-01-31 21:33:58', 'Yes'),
(14, 'login', 'admin', '2018-02-03 15:20:38', 'No'),
(15, 'login', 'admin', '2018-02-03 15:20:44', 'Yes'),
(16, 'login', 'admin', '2018-02-03 15:57:22', 'Yes'),
(17, 'logout', 'admin', '2018-02-03 18:53:22', 'Yes'),
(18, 'login', 'zjadi', '2018-02-03 18:53:35', 'No'),
(19, 'login', 'zjadi', '2018-02-03 18:53:41', 'Yes'),
(20, 'logout', 'zjadi', '2018-02-03 19:36:38', 'Yes'),
(21, 'login', 'zjadi', '2018-02-04 12:56:54', 'Yes'),
(22, 'logout', 'zjadi', '2018-02-04 13:06:11', 'Yes'),
(23, 'login', 'baas', '2018-02-04 13:12:27', 'No'),
(24, 'login', 'baas', '2018-02-04 13:13:27', 'No'),
(25, 'login', 'baas', '2018-02-04 13:13:41', 'No'),
(26, 'login', 'baas', '2018-02-04 13:13:56', 'No'),
(27, 'login', 'ssd', '2018-02-04 13:15:11', 'No'),
(28, 'login', 'zjadi', '2018-02-04 13:19:09', 'Yes'),
(29, 'login', 'zjadi', '2018-02-06 20:58:21', 'Yes'),
(30, 'login', 'ztjadi', '2018-02-07 10:14:21', 'No'),
(31, 'login', 'zjadi', '2018-02-07 10:19:46', 'Yes'),
(32, 'login', 'zjadi', '2018-02-09 11:00:11', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(4) NOT NULL,
  `owner_id` int(4) NOT NULL,
  `store_name` varchar(250) NOT NULL,
  `store_img_path` varchar(250) NOT NULL,
  `category_id` int(4) NOT NULL,
  `store_active` set('Yes','No') NOT NULL DEFAULT 'Yes',
  `store_show` set('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `owner_id`, `store_name`, `store_img_path`, `category_id`, `store_active`, `store_show`) VALUES
(14, 2, 'Koala Express', '../img/stores/400.png', 28, 'Yes', 'Yes'),
(15, 8, 'MegaTech', '../img/stores/358.png', 26, 'Yes', 'Yes'),
(16, 7, 'PlayFull', '../img/stores/279.png', 25, 'Yes', 'Yes'),
(17, 10, 'Luna', '../img/stores/276.png', 19, 'Yes', 'Yes'),
(18, 9, 'Diamonds', '../img/stores/199.png', 20, 'Yes', 'No'),
(19, 5, 'Dusk till Dawn', '../img/stores/109.png', 30, 'No', 'No'),
(20, 8, 'Colors', '../img/stores/266.png', 17, 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accesslevel` int(1) DEFAULT '0',
  `user_active` set('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `username`, `password`, `accesslevel`, `user_active`) VALUES
(2, 'Mike  Cobra', 'mcobra', '123456', 0, 'Yes'),
(5, 'Elia Bakker', 'ebak', '1254863', 0, 'Yes'),
(6, 'Baas', 'admin', '0123456', 1, 'No'),
(7, 'Edward Mission', 'emission', '0258963', 0, 'Yes'),
(8, 'Jessica Rabbit', 'jrabbit', '789456', 0, 'Yes'),
(9, 'Mo Albert', 'malber', '4567895', 0, 'Yes'),
(10, 'Samantha Hust', 'shust', '78995565', 0, 'Yes'),
(11, 'Zoe Jadi', 'zjadi', '12345678', 1, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `attempt_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stores_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
