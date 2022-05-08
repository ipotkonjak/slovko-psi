-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2022 at 08:58 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slovko`
--
CREATE DATABASE IF NOT EXISTS `slovko` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `slovko`;

-- --------------------------------------------------------

--
-- Table structure for table `igra`
--

DROP TABLE IF EXISTS `igra`;
CREATE TABLE IF NOT EXISTS `igra` (
  `idI` int(11) NOT NULL AUTO_INCREMENT,
  `brojPokusaja1` int(11) NOT NULL,
  `brojPokusaja2` int(11) NOT NULL,
  `vreme1` int(11) NOT NULL,
  `vreme2` int(11) NOT NULL,
  `idK1` int(11) DEFAULT NULL,
  `idK2` int(11) DEFAULT NULL,
  `pobeda1` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `idK` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idK`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idK`, `username`, `lozinka`, `ime`, `prezime`, `vip`, `admin`, `email`) VALUES
(1, 'uros', 'sifra123', 'Uros', 'Mutavdzic', 0, 1, 'uros@mail.com'),
(2, 'luka', 'sifra123', 'Luka', 'Hrvacevic', 0, 1, 'luka@mail.com'),
(3, 'iva', 'sifra123', 'Iva', 'Potkonjak', 0, 1, 'iva@mail.com'),
(4, 'katarina', 'sifra123', 'Katarina', 'Jocic', 0, 1, 'kaca@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prijava_greske`
--

DROP TABLE IF EXISTS `prijava_greske`;
CREATE TABLE IF NOT EXISTS `prijava_greske` (
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin` int(11) DEFAULT NULL,
  `opis` text COLLATE utf8_unicode_ci,
  `evidentirano` tinyint(1) NOT NULL,
  `idK` int(11) NOT NULL,
  PRIMARY KEY (`idP`),
  KEY `idAdmin` (`idAdmin`),
  KEY `idK` (`idK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reci`
--

DROP TABLE IF EXISTS `reci`;
CREATE TABLE IF NOT EXISTS `reci` (
  `idR` int(11) NOT NULL AUTO_INCREMENT,
  `rec` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistika`
--

DROP TABLE IF EXISTS `statistika`;
CREATE TABLE IF NOT EXISTS `statistika` (
  `idS` int(11) NOT NULL AUTO_INCREMENT,
  `brojPoena` int(11) NOT NULL,
  `brojPobeda` int(11) NOT NULL,
  `brojNeresenih` int(11) NOT NULL,
  `brojPoraza` int(11) NOT NULL,
  `arcadeRecord` int(11) NOT NULL,
  `idK` int(11) NOT NULL,
  PRIMARY KEY (`idS`),
  KEY `R_17` (`idK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vip_zahtev`
--

DROP TABLE IF EXISTS `vip_zahtev`;
CREATE TABLE IF NOT EXISTS `vip_zahtev` (
  `idZ` int(11) NOT NULL AUTO_INCREMENT,
  `opis` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idK` int(11) DEFAULT NULL,
  PRIMARY KEY (`idZ`),
  KEY `R_18` (`idK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prijava_greske`
--
ALTER TABLE `prijava_greske`
  ADD CONSTRAINT `prijava_greske_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `korisnik` (`idK`),
  ADD CONSTRAINT `prijava_greske_ibfk_2` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`);

--
-- Constraints for table `statistika`
--
ALTER TABLE `statistika`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`) ON DELETE CASCADE,
  ADD CONSTRAINT `statistika_ibfk_1` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`);

--
-- Constraints for table `vip_zahtev`
--
ALTER TABLE `vip_zahtev`
  ADD CONSTRAINT `R_18` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`) ON DELETE CASCADE,
  ADD CONSTRAINT `vip_zahtev_ibfk_1` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
