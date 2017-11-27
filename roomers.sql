-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 16 nov 2017 om 14:20
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `roomers`
--
CREATE DATABASE IF NOT EXISTS `roomers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `roomers`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `buildingID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `picture1` text,
  `picture2` text,
  `picture3` text,
  `picture4` text,
  `picture5` text,
  `street` varchar(80) NOT NULL,
  `strnumber` varchar(10) NOT NULL,
  `areacode` varchar(10) NOT NULL,
  `city` varchar(80) NOT NULL,
  `mainfunction` varchar(50) DEFAULT NULL,
  `renttime` varchar(40) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `space` int(11) DEFAULT NULL,
  `layers` varchar(25) DEFAULT NULL,
  `parking` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`buildingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `building`
--

INSERT INTO `building` (`buildingID`, `user_ID`, `name`, `picture1`, `picture2`, `picture3`, `picture4`, `picture5`, `street`, `strnumber`, `areacode`, `city`, `mainfunction`, `renttime`, `year`, `space`, `layers`, `parking`, `description`) VALUES
(1, 1, 'Het Beginstation', 'img/480b7f553c395ec13bdb89a614296820.jpg', 'img/f3198e3ade5e60074029dfd180a5586b.jpg', '', '', '', 'Stationsplein', '71', '5704KI', 'Helmond', 'Kantoor', '3 tot 5 maanden', '2008', 210, '3 verdiepingen', 'Ja', 'Het Beginstation in Helmond'),
(2, 1, 'Het huis van Robin', 'img/fa705eebc54607b4c66731f7bf53e89c.jpg', 'img/2b6c40d652b231ed7f0cf2592b9d334f.jpg', 'img/6ee702f9d68a198ecc321664fe6eab2c.jpg', 'img/b86203ab0605edd1d59e43e6d115906c.jpg', '', 'Bonkspade', '69', '5489DE', 'Deurne', 'Woonruimte', '1 jaar +', '1999', 45, '2 verdiepingen', 'Beperkt', 'Robin''s huis.'),
(3, 2, 'ROC Ter AA', 'img/c8b937c1936184aa0eae53f1482bfe02.jpg', '', '', '', '', 'Keizerin marialaan', '4', '4609PE', 'Helmond', 'School', '5 tot 12 maanden', '1980', 1223, '4 verdiepingen', 'Ja', 'MBO school in Helmond');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  `password` text NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `salt` text NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_2` (`userID`),
  KEY `userID` (`userID`),
  KEY `userID_3` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstName`, `lastName`, `phone`, `salt`) VALUES
(1, 'test@email.com', '098f6bcd4621d373cade4e832627b4f618580547115a0d64d0370771.01105161', 'Thijs', 'Berkers', '736292742', '18580547115a0d64d0370771.01105161'),
(2, 'myrell-spam@outlook.com', '098f6bcd4621d373cade4e832627b4f68859301325a0d64e34d0d23.74424463', 'Myrell', 'Richardson', '0623008263', '8859301325a0d64e34d0d23.74424463');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
