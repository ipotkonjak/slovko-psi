-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2022 at 01:08 PM
-- Server version: 8.0.28
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

-- --------------------------------------------------------

--
-- Table structure for table `igra`
--

DROP TABLE IF EXISTS `igra`;
CREATE TABLE IF NOT EXISTS `igra` (
  `idI` int NOT NULL AUTO_INCREMENT,
  `brojPokusaja1` int NOT NULL,
  `brojPokusaja2` int NOT NULL,
  `vreme1` int NOT NULL,
  `vreme2` int NOT NULL,
  `pobeda1` tinyint(1) DEFAULT NULL,
  `username1` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idI`),
  KEY `fk_igra_korisnik1` (`username1`),
  KEY `fk_igra_korisnik2` (`username2`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `igra`
--

INSERT INTO `igra` (`idI`, `brojPokusaja1`, `brojPokusaja2`, `vreme1`, `vreme2`, `pobeda1`, `username1`, `username2`) VALUES
(1, 2, 5, 120, 120, NULL, 'marko', 'petar'),
(2, 2, 2, 40, 23, 0, 'marko', 'petar'),
(3, 4, 2, 37, 30, 0, 'marko', 'petar'),
(4, 0, 0, 0, 0, NULL, 'marko', 'petar'),
(5, 2, 2, 14, 16, 1, 'marko', 'petar'),
(6, 6, 2, 46, 39, 0, 'marko', 'petar'),
(7, 2, 1, 8, 11, 0, 'marko', 'petar'),
(8, 1, 1, 11, 8, NULL, 'petar', 'marko'),
(9, 1, 1, 5, 7, NULL, 'marko', 'petar'),
(10, 4, 2, 37, 30, 0, 'marko', 'petar'),
(11, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(12, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(13, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(14, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(15, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(16, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(17, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(18, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(19, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(20, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(21, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(22, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(23, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(24, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(25, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(26, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(27, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(28, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(29, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(30, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(31, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(32, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(33, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(34, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(35, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(36, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(37, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(38, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(39, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(40, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(41, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(42, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(43, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(44, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(45, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(46, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(47, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(48, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(49, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(50, 4, 2, 120, 120, NULL, 'marko', 'petar'),
(54, 1, 1, 9, 12, NULL, 'marko', 'petar'),
(55, 1, 1, 5, 17, 1, 'marko', 'petar'),
(56, 1, 2, 10, 16, 1, 'petar', 'marko'),
(57, 1, 1, 120, 120, NULL, 'marko', 'petar'),
(58, 1, 0, 10, 0, 1, 'luka', 'mika'),
(59, 1, 1, 7, 28, 1, 'luka', 'mika'),
(60, 1, 1, 7, 9, NULL, 'luka', 'mika'),
(61, 1, 1, 4, 11, NULL, 'luka', 'mika');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `odobren` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`username`, `lozinka`, `ime`, `prezime`, `vip`, `admin`, `email`, `odobren`) VALUES
('iva', '$2y$10$cAkX0.Mj19tGnpVmli835.Lntu7aiIFx7TmOxjZNKMFqvNZ5MfOvS', 'Iva', 'Potkonjak', 0, 1, 'iva@mail.com', 1),
('kaca', '$2y$10$5pvpZkXeGshZoSh7OvFemuj8mXW1/z5uvzhMVyJlGwdkiPmOOGl/G', 'Katarina', 'Jocic', 0, 1, 'katarina@gmail.com', 1),
('luka', '$2y$10$2HmtUHeyLdftsL.YdW33L.GM02bz42UBReB6UROGh66./iafRVsjq', 'Luka', 'Hrvacevic', 0, 1, 'luka@mail.com', 1),
('marko', '$2y$10$BIezPyU7Nh3bMYsZM17nd.232JVMkDyNzXC6GOx/SdNLtGrHB0kbG', 'Marko', 'Markovic', 1, 0, 'marko@mail.com', 1),
('mika', '$2y$10$WLMXw8d4B5Nk8jHCR4C.Xe0Ctiz9xq9gPXlmFVyY4THvCj5WN9G1C', 'Mika', 'Mikic', 1, 0, 'mika@mail.com', 1),
('petar', '$2y$10$fz3qsg80Zjt1ne9BnyAc7ebYU2AwXPWtNE/m.3Ji/eC/TZ9xp68r2', 'Petar', 'Petrovic', 1, 0, 'petar@mail.com', 1),
('uros', '$2y$10$3iUI8K1qvrAZzjdnawde3ehkP5DYrxAf7bWwG/wAkhINCr8OusREO', 'Uros', 'Mutavdzic', 0, 1, 'uros@mail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prijava_greske`
--

DROP TABLE IF EXISTS `prijava_greske`;
CREATE TABLE IF NOT EXISTS `prijava_greske` (
  `idP` int NOT NULL AUTO_INCREMENT,
  `opis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `evidentirano` tinyint(1) NOT NULL,
  `admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idP`),
  KEY `fk_PrijavaGreske_Admin` (`admin`),
  KEY `fk_PrijavaGreske_Korisnik` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prijava_greske`
--

INSERT INTO `prijava_greske` (`idP`, `opis`, `evidentirano`, `admin`, `username`) VALUES
(1, 'Rec predja ne postoji!', 1, 'uros', 'marko'),
(2, 'Rec tetke ne postoji\r\n', 1, 'uros', 'petar'),
(3, 'muske ne postoji\r\n', 1, 'uros', 'petar'),
(4, 'estar ne postoji', 1, 'uros', 'petar'),
(5, 'rec bosna ne postoji\r\n', 1, 'uros', 'marko'),
(6, 'Rec tokaj ne postoji', 1, 'uros', 'marko');

-- --------------------------------------------------------

--
-- Table structure for table `reci`
--

DROP TABLE IF EXISTS `reci`;
CREATE TABLE IF NOT EXISTS `reci` (
  `idR` int NOT NULL AUTO_INCREMENT,
  `rec` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idR`)
) ENGINE=InnoDB AUTO_INCREMENT=6979 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reci`
--

INSERT INTO `reci` (`idR`, `rec`) VALUES
(6975, 'лопта'),
(6976, 'одмор'),
(6977, 'авион'),
(6978, 'матор');

-- --------------------------------------------------------

--
-- Table structure for table `statistika`
--

DROP TABLE IF EXISTS `statistika`;
CREATE TABLE IF NOT EXISTS `statistika` (
  `idS` int NOT NULL AUTO_INCREMENT,
  `brojPoena` int NOT NULL,
  `brojPobeda` int NOT NULL,
  `brojNeresenih` int NOT NULL,
  `brojPoraza` int NOT NULL,
  `arcadeRecord` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idS`),
  KEY `fk_statistika_korisnik` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistika`
--

INSERT INTO `statistika` (`idS`, `brojPoena`, `brojPobeda`, `brojNeresenih`, `brojPoraza`, `arcadeRecord`, `username`) VALUES
(1, 12000, 2, 2, 0, 0, 'luka'),
(2, 0, 0, 0, 0, 0, 'kaca'),
(3, 0, 0, 0, 0, 0, 'iva'),
(4, 0, 0, 0, 0, 0, 'uros'),
(5, 18737, 2, 47, 5, 7, 'marko'),
(6, 24487, 5, 47, 2, 2, 'petar'),
(7, 7425, 0, 2, 2, 0, 'mika');

-- --------------------------------------------------------

--
-- Table structure for table `vip_zahtev`
--

DROP TABLE IF EXISTS `vip_zahtev`;
CREATE TABLE IF NOT EXISTS `vip_zahtev` (
  `idZ` int NOT NULL AUTO_INCREMENT,
  `opis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idZ`),
  KEY `fk_VipZahtev_korisnik` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vip_zahtev`
--

INSERT INTO `vip_zahtev` (`idZ`, `opis`, `status`, `username`) VALUES
(1, 'ispunio uslov', 'P', 'marko'),
(2, 'ispunio uslov', 'P', 'petar');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igra`
--
ALTER TABLE `igra`
  ADD CONSTRAINT `fk_igra_korisnik1` FOREIGN KEY (`username1`) REFERENCES `korisnik` (`username`),
  ADD CONSTRAINT `fk_igra_korisnik2` FOREIGN KEY (`username2`) REFERENCES `korisnik` (`username`);

--
-- Constraints for table `prijava_greske`
--
ALTER TABLE `prijava_greske`
  ADD CONSTRAINT `fk_PrijavaGreske_Admin` FOREIGN KEY (`admin`) REFERENCES `korisnik` (`username`),
  ADD CONSTRAINT `fk_PrijavaGreske_Korisnik` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`);

--
-- Constraints for table `statistika`
--
ALTER TABLE `statistika`
  ADD CONSTRAINT `fk_statistika_korisnik` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`);

--
-- Constraints for table `vip_zahtev`
--
ALTER TABLE `vip_zahtev`
  ADD CONSTRAINT `fk_VipZahtev_korisnik` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
