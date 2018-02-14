-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 feb 2018 om 04:32
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `spartan_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(4) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `cat_show` set('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Gegevens worden geëxporteerd voor tabel `category`
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
-- Tabelstructuur voor tabel `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `deal_id` int(40) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(250) NOT NULL,
  `deal_btn` varchar(40) DEFAULT NULL,
  `deal_img_path` varchar(250) NOT NULL,
  `deal_block` set('Block 1','Block 2','Block 3','Block 4') NOT NULL,
  `experation_stamp` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `deals`
--

INSERT INTO `deals` (`deal_id`, `deal_name`, `deal_btn`, `deal_img_path`, `deal_block`, `experation_stamp`) VALUES
(5, 'KlerenSale', 'Kortingcode', '../img/deals/338.png', 'Block 1', '2018-02-14'),
(6, 'IntAd', 'Shop Nu', '../img/deals/364.png', 'Block 2', '2018-02-17'),
(7, 'Test', '', '../img/deals/291.png', 'Block 1', '2018-02-08'),
(8, 'KampeerAd', 'Shop Nu', '../img/deals/233.png', 'Block 3', '2018-02-16'),
(9, 'SpeelgoedKorting', 'Shop Nu', '../img/deals/135.png', 'Block 4', '2018-02-21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logfile`
--

CREATE TABLE IF NOT EXISTS `logfile` (
  `attempt_id` int(250) NOT NULL AUTO_INCREMENT,
  `attempt` set('login','logout') NOT NULL,
  `username` varchar(40) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `success` set('Yes','No') NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `logfile`
--

INSERT INTO `logfile` (`attempt_id`, `attempt`, `username`, `timestamp`, `success`) VALUES
(1, 'logout', 'brocolli', '2018-02-14 03:18:22', 'Yes'),
(2, 'login', 'brocolli', '2018-02-14 03:22:40', 'Yes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `store_id` int(4) NOT NULL AUTO_INCREMENT,
  `owner_id` int(4) NOT NULL,
  `store_name` varchar(250) NOT NULL,
  `store_img_path` varchar(250) NOT NULL,
  `category_id` int(4) NOT NULL,
  `store_active` set('Yes','No') NOT NULL DEFAULT 'Yes',
  `store_show` set('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`store_id`),
  KEY `owner_id` (`owner_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden geëxporteerd voor tabel `stores`
--

INSERT INTO `stores` (`store_id`, `owner_id`, `store_name`, `store_img_path`, `category_id`, `store_active`, `store_show`) VALUES
(14, 2, 'Koala Express', '../img/stores/400.png', 28, 'Yes', 'Yes'),
(15, 8, 'MegaTech', '../img/stores/358.png', 26, 'Yes', 'Yes'),
(16, 7, 'PlayFull', '../img/stores/279.png', 25, 'Yes', 'Yes'),
(17, 10, 'Luna', '../img/stores/276.png', 19, 'Yes', 'Yes'),
(18, 9, 'Diamonds', '../img/stores/199.png', 20, 'Yes', 'No'),
(19, 5, 'Dusk till Dawn', '../img/stores/109.png', 30, 'No', 'No'),
(20, 8, 'Colors', '../img/stores/266.png', 17, 'No', 'No');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accesslevel` int(1) DEFAULT '0',
  `user_active` set('Yes','No') NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `username`, `password`, `accesslevel`, `user_active`) VALUES
(2, 'Mike  Cobra', 'mcobra', '123456', 0, 'Yes'),
(5, 'Elia Bakker', 'ebak', '1254863', 0, 'Yes'),
(6, 'Baas', 'admin', '0123456', 1, 'No'),
(7, 'Edward Mission', 'emission', '0258963', 0, 'Yes'),
(8, 'Jessica Rabbit', 'jrabbit', '789456', 0, 'Yes'),
(9, 'Mo Albert', 'malber', '4567895', 0, 'Yes'),
(10, 'Samantha Hust', 'shust', '78995565', 0, 'Yes'),
(11, 'Zoe Jadi', 'zjadi', '12345678', 1, 'Yes'),
(12, 'Rishwi Fattoe', 'brocolli', '!@#', 1, 'Yes'),
(14, 'Johnny Depp', 'John', 'query', 1, 'Yes');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stores_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
