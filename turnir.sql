-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2020 at 04:42 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`menager`, `groupname`, `member1`, `member2`, `member3`, `member4`, `id`) VALUES
('biscuitedi', 'EU4', 'settra', 'disdat', '', '', 43),
('Xpd', 'Singed', 'chaxx', 'brka', '', '', 40),
('Lazik', 'Pogaca', 'vasili', 'shosh', '', '', 41),
('protoshadow', 'Warhammer', 'malekith', 'alith', '', '', 42),
('solla', 'Cimeri', 'sopiix', 'neko3', '', '', 44),
('marik', 'Kladiona', 'neko', 'neko2', '', '', 45),
('Solaire', 'Astora', 'Anastacia', 'Andre', '', '', 46),
('Siegmeyer', 'Catarina', 'Sieglinde', 'Siegward', '', '', 47);

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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`, `fname`, `lname`, `rank`, `id`, `groupid`) VALUES
('proto', '923352284767451ab158a387a283df26', 'john_smith@gmail.com', 'John', 'Smith', 'user', 1, 0),
('protoshadow', '923352284767451ab158a387a283df26', 'boris.shared@gmail.com', 'Boris', 'Rodic', 'manager', 10, 42),
('neko', '923352284767451ab158a387a283df26', 'neko@negde.com', 'Neko', 'Nekic', 'user', 12, 45),
('neko2', '923352284767451ab158a387a283df26', 'neko2@negde.com', 'Neko2', 'Nekic2', 'user', 13, 45),
('neko3', '923352284767451ab158a387a283df26', 'neko3@negde.com', 'Neko3', 'Nekic3', 'user', 14, 44),
('Xpd', '923352284767451ab158a387a283df26', 'xpd@xpd.com', 'Pal', 'Pap', 'manager', 15, 40),
('Lazik', '923352284767451ab158a387a283df26', 'lazik@lazik.com', 'Lazic', 'Lazik', 'manager', 16, 41),
('vasili', '923352284767451ab158a387a283df26', 'vasili@vasili.com', 'Vaja', 'Vajaz', 'user', 17, 41),
('biscuitedi', '923352284767451ab158a387a283df26', 'biscuitedi@biscuitedi.com', 'Edi', 'Arturito', 'manager', 18, 43),
('brka', '923352284767451ab158a387a283df26', 'brka@brka.com', 'Brka', 'Brkic', 'user', 19, 40),
('solla', '923352284767451ab158a387a283df26', 'solla@solla.com', 'Solla', 'Uros', 'manager', 20, 44),
('sopiix', '923352284767451ab158a387a283df26', 'sopiix@sopiix.com', 'Sopiix', 'PoE', 'user', 21, 44),
('chaxx', '923352284767451ab158a387a283df26', 'chaxx@chaxx.com', 'Yes', 'Just', 'user', 22, 40),
('marik', '923352284767451ab158a387a283df26', 'marik@marik.com', 'Marik', 'Tama', 'manager', 23, 45),
('shosh', '923352284767451ab158a387a283df26', 'shosh@shosh.com', 'Milos', 'Shosh', 'user', 24, 41),
('disdat', '923352284767451ab158a387a283df26', 'disdat@disdat.com', 'Disdat', 'Rat', 'user', 25, 43),
('alith', '923352284767451ab158a387a283df26', 'alith@alith.com', 'Alith', 'Anar', 'user', 26, 42),
('malekith', '923352284767451ab158a387a283df26', 'malekith@malekith.com', 'Malekith', 'SlaveryOP', 'user', 27, 42),
('settra', '923352284767451ab158a387a283df26', 'settra@settra.com', 'Settra', 'Imperishable', 'user', 28, 43),
('Solaire', '923352284767451ab158a387a283df26', 'solaire@solaire.com', 'Solaire', 'Astora', 'manager', 31, 46),
('Anastacia', '923352284767451ab158a387a283df26', 'anastacia@anastacia.com', 'Anastacia', 'Astora', 'user', 32, 46),
('Andre', '923352284767451ab158a387a283df26', 'andre@andre.com', 'Andre', 'Astora', 'user', 33, 46),
('Sieglinde', '923352284767451ab158a387a283df26', 'sieglinde@sieglinde.com', 'Sieglinde', 'Catarina', 'user', 34, 47),
('Siegmeyer', '923352284767451ab158a387a283df26', 'siegmeyer@siegmeyer.com', 'Siegmeyer', 'Catarina', 'manager', 35, 47),
('Siegward', '923352284767451ab158a387a283df26', 'siegward@siegward.com', 'Siegward', 'Catarina', 'admin', 36, 47),
('Admin', 'sifra', 'admin@admin.com', 'Admin', 'Admin', 'user', 37, NULL);

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
