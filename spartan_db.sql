-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 01:57 AM
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
(19, 'Cosmetica', '../img/cat/386.png', 'No'),
(20, 'Juwelen', '../img/cat/217.png', 'Yes'),
(21, 'Boeken', '../img/cat/345.png', 'Yes'),
(22, 'Films', '../img/cat/228.png', 'No'),
(23, 'Muziek', '../img/cat/128.png', 'Yes'),
(24, 'Speelgoed', '../img/cat/379.png', 'Yes'),
(25, 'Video Games', '../img/cat/239.png', 'No'),
(26, 'Elektronica', '../img/cat/206.png', 'No'),
(27, 'Interieur', '../img/cat/236.png', 'No'),
(28, 'Eten', '../img/cat/172.png', 'Yes'),
(29, 'Voertuigen', '../img/cat/118.png', 'Yes'),
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
  `start_stamp` date NOT NULL,
  `experation_stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `deal_name`, `deal_btn`, `deal_img_path`, `deal_block`, `start_stamp`, `experation_stamp`) VALUES
(5, 'KlerenSale', 'Kortingcode', '../img/deals/338.png', 'Block 1', '2018-02-01', '2018-02-28'),
(6, 'IntAd', 'Shop Nu', '../img/deals/364.png', 'Block 2', '2018-02-01', '2018-02-28'),
(7, 'Test', '', '../img/deals/291.png', 'Block 1', '2018-01-01', '2018-01-31'),
(8, 'KampeerAd', 'Shop Nu', '../img/deals/233.png', 'Block 3', '2018-01-01', '2018-02-28'),
(9, 'SpeelgoedKorting', 'Shop Nu', '../img/deals/135.png', 'Block 4', '2018-02-01', '2018-02-28');

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
(41, 'login', 'zjadi', '2018-02-13 18:09:14', 'Yes'),
(42, 'logout', 'zjadi', '2018-02-13 18:10:50', 'Yes'),
(43, 'login', 'zjadi', '2018-02-13 18:13:06', 'Yes'),
(44, 'login', 'zjadi', '2018-02-14 11:33:05', 'Yes'),
(45, 'login', 'zjadi', '2018-02-14 13:11:28', 'Yes'),
(46, 'login', 'zjadi', '2018-02-14 19:42:05', 'No'),
(47, 'login', 'zjadi', '2018-02-14 19:42:20', 'Yes'),
(48, 'login', 'zjadi', '2018-02-15 13:41:54', 'No'),
(49, 'login', 'zjadi', '2018-02-15 13:42:13', 'Yes'),
(50, 'logout', 'zjadi', '2018-02-15 13:47:39', 'Yes'),
(51, 'login', 'zjadi', '2018-02-15 13:49:57', 'Yes'),
(52, 'logout', 'zjadi', '2018-02-15 14:06:00', 'Yes'),
(53, 'login', 'zjadi', '2018-02-19 11:26:55', 'Yes'),
(54, 'login', 'zjadi', '2018-02-20 22:21:47', 'Yes'),
(55, 'logout', 'zjadi', '2018-02-21 00:56:46', 'Yes');

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
(15, 8, 'MegaTech', '../img/stores/358.png', 26, 'Yes', 'No'),
(16, 7, 'PlayFull', '../img/stores/279.png', 25, 'Yes', 'No'),
(17, 10, 'Luna', '../img/stores/276.png', 19, 'No', 'No'),
(18, 9, 'Diamonds', '../img/stores/199.png', 20, 'Yes', 'Yes'),
(19, 5, 'Dusk till Dawn', '../img/stores/109.png', 17, 'Yes', 'No'),
(20, 8, 'Colors', '../img/stores/266.png', 17, 'Yes', 'No'),
(21, 12, 'Amazoon', '../img/stores/268.png', 26, 'Yes', 'Yes'),
(22, 5, 'Guesss', '../img/stores/391.png', 17, 'Yes', 'Yes');

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
(11, 'Zoe Jadi', 'zjadi', 'zeero2.0', 1, 'Yes'),
(12, 'Arnold Split', 'asplit', '5558889', 0, 'Yes'),
(13, 'Allan Looper', 'alooper', 'aska^&%88', 0, 'Yes');

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
  MODIFY `attempt_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
