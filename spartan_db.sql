-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 10:36 PM
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
(18, 'Schoenen', '../img/cat/137.png', 'Yes'),
(19, 'Cosmetica', '../img/cat/386.png', 'Yes'),
(20, 'Juwelen', '../img/cat/217.png', 'Yes'),
(21, 'Boeken', '../img/cat/345.png', 'Yes'),
(22, 'Films', '../img/cat/228.png', 'No'),
(23, 'Muziek', '../img/cat/128.png', 'No'),
(24, 'Speelgoed', '../img/cat/379.png', 'Yes'),
(25, 'Video Games', '../img/cat/239.png', 'No'),
(26, 'Elektronica', '../img/cat/206.png', 'Yes'),
(27, 'Interieur', '../img/cat/236.png', 'No'),
(28, 'Eten', '../img/cat/172.png', 'No'),
(29, 'Autos', '../img/cat/118.png', 'No'),
(30, 'Buitenhuis', '../img/cat/153.png', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(4) NOT NULL,
  `name` varchar(250) NOT NULL,
  `hex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(4) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `image_size` int(20) NOT NULL,
  `image_type` varchar(40) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `zone_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `image_size`, `image_type`, `image_path`, `zone_id`) VALUES
(12, 'img1.jpg', 40395, 'image/jpeg', 'uploads/195.jpg', 1);

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
(13, 'logout', 'admin', '2018-01-31 21:33:58', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(4) NOT NULL,
  `owner_id` int(4) NOT NULL,
  `store_name` varchar(250) NOT NULL,
  `category_id` int(4) NOT NULL,
  `store_active` set('Yes','No') NOT NULL DEFAULT 'Yes',
  `store_show` set('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `owner_id`, `store_name`, `category_id`, `store_active`, `store_show`) VALUES
(8, 8, 'MegaTech', 26, 'Yes', 'Yes'),
(9, 7, 'SolarMovies', 22, 'Yes', 'Yes'),
(10, 9, 'SpaceShip', 25, 'Yes', 'Yes'),
(11, 10, 'Fashun-y', 19, 'Yes', 'Yes'),
(12, 7, 'Koala Express', 28, 'Yes', 'Yes'),
(13, 2, 'Animal Print', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `text_id` int(20) NOT NULL,
  `content` varchar(250) NOT NULL,
  `zone_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `accesslevel` int(1) DEFAULT '0',
  `user_active` set('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `username`, `password`, `accesslevel`, `user_active`) VALUES
(2, 'Mike  Cobra', 'Mcobra', '123456', 0, 'Yes'),
(5, 'Elia Bakker', 'ebak', '1254863', 0, 'Yes'),
(6, 'Baas', 'admin', '0123456', 1, 'Yes'),
(7, 'Edward Mission', 'emission', '0258963', 0, 'Yes'),
(8, 'Jessica Rabbit', 'jrabbit', '789456', 0, 'Yes'),
(9, 'Mo Albert', 'malber', '4567895', 0, 'Yes'),
(10, 'Samantha Hust', 'shust', '78995565', 0, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(4) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `name`) VALUES
(1, 'zone1'),
(2, 'zone2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `zone_id` (`zone_id`);

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
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `attempt_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stores_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `text`
--
ALTER TABLE `text`
  ADD CONSTRAINT `text_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
