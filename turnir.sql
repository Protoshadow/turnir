-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2020 at 03:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turnir`
--

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

DROP TABLE IF EXISTS `grupe`;
CREATE TABLE IF NOT EXISTS `grupe` (
  `menager` varchar(25) NOT NULL,
  `member1` varchar(25) NOT NULL,
  `member2` varchar(25) NOT NULL,
  `member3` varchar(25) NOT NULL,
  `member4` varchar(25) NOT NULL,
  `id` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `username` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(25) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT 3,
  `user_type` enum('master','user') NOT NULL DEFAULT 'user',
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `groupid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`, `fname`, `lname`, `rank`, `user_type`, `id`, `groupid`) VALUES
('proto', '$2y$10$cHpf3TzonURXDENRiRF0de1ycSfnM4NJ27sdwyUCf5L.sewDlkCBe', 'john_smith@gmail.com', 'John', 'Smith', 3, 'master', 1, 37),
('protoshadow', '923352284767451ab158a387a283df26', 'boris.shared@gmail.com', 'Boris', 'Rodic', 3, 'user', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `turnir`
--

DROP TABLE IF EXISTS `turnir`;
CREATE TABLE IF NOT EXISTS `turnir` (
  `r1g1` varchar(40) NOT NULL,
  `r1g2` varchar(40) NOT NULL,
  `r1g3` varchar(40) NOT NULL,
  `r1g4` varchar(40) NOT NULL,
  `r1g5` varchar(40) NOT NULL,
  `r1g6` varchar(40) NOT NULL,
  `r1g7` varchar(40) NOT NULL,
  `r1g8` varchar(40) NOT NULL,
  `r2g1` varchar(40) NOT NULL,
  `r2g2` varchar(40) NOT NULL,
  `r2g3` varchar(40) NOT NULL,
  `r2g4` varchar(40) NOT NULL,
  `r5g1` varchar(40) NOT NULL,
  `r5g2` varchar(40) NOT NULL,
  `winner` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
