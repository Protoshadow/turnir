-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2020 at 02:31 PM
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
  `groupname` varchar(40) NOT NULL,
  `member1` varchar(25) DEFAULT '',
  `member2` varchar(25) DEFAULT '',
  `member3` varchar(25) DEFAULT '',
  `member4` varchar(25) DEFAULT '',
  `id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`menager`, `groupname`, `member1`, `member2`, `member3`, `member4`, `id`) VALUES
('proto', 'imegrupe', '', 'sdf', '', 'asdf', 8);

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
  `rank` varchar(8) NOT NULL DEFAULT 'user',
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `groupid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`, `fname`, `lname`, `rank`, `id`, `groupid`) VALUES
('proto', '$2y$10$cHpf3TzonURXDENRiRF0de1ycSfnM4NJ27sdwyUCf5L.sewDlkCBe', 'john_smith@gmail.com', 'John', 'Smith', '3', 1, 0),
('protoshadow', '923352284767451ab158a387a283df26', 'boris.shared@gmail.com', 'Boris', 'Rodic', 'user', 10, 8),
('neko', '923352284767451ab158a387a283df26', 'neko@negde.com', 'Neko', 'Nekic', 'user', 12, NULL),
('neko2', '923352284767451ab158a387a283df26', 'neko2@negde.com', 'Neko2', 'Nekic2', 'user', 13, NULL),
('neko3', '923352284767451ab158a387a283df26', 'neko3@negde.com', 'Neko3', 'Nekic3', 'admin', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `turnir`
--

DROP TABLE IF EXISTS `turnir`;
CREATE TABLE IF NOT EXISTS `turnir` (
  `name` varchar(30) NOT NULL,
  `r1g1` varchar(40) NOT NULL DEFAULT '',
  `r1g2` varchar(40) NOT NULL DEFAULT '',
  `r1g3` varchar(40) NOT NULL DEFAULT '',
  `r1g4` varchar(40) NOT NULL DEFAULT '',
  `r1g5` varchar(40) NOT NULL DEFAULT '',
  `r1g6` varchar(40) NOT NULL DEFAULT '',
  `r1g7` varchar(40) NOT NULL DEFAULT '',
  `r1g8` varchar(40) NOT NULL DEFAULT '',
  `r2g1` varchar(40) NOT NULL DEFAULT '',
  `r2g2` varchar(40) NOT NULL DEFAULT '',
  `r2g3` varchar(40) NOT NULL DEFAULT '',
  `r2g4` varchar(40) NOT NULL DEFAULT '',
  `r3g1` varchar(40) NOT NULL DEFAULT '',
  `r3g2` varchar(40) NOT NULL DEFAULT '',
  `winner` varchar(40) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'running',
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turnir`
--

INSERT INTO `turnir` (`name`, `r1g1`, `r1g2`, `r1g3`, `r1g4`, `r1g5`, `r1g6`, `r1g7`, `r1g8`, `r2g1`, `r2g2`, `r2g3`, `r2g4`, `r3g1`, `r3g2`, `winner`, `status`, `id`) VALUES
('', 'fafaf', 'eee32', 'fasa', '', '', '', '', '', '', '', '', '', '', '', '', 'running', 1),
('test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'running', 3),
('aa', '', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', 'running', 4),
('test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', '', '', '', '', '', '', '', 'running', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
