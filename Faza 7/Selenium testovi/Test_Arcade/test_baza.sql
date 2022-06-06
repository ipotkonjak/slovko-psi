-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2022 at 09:17 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

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
('aleks', '$2y$10$nd1F0B2Fq.IbHhOZQ36tc.I8p30nZAarVJZkSwqhpc1nN9CuXWRc.', 'Aleks', 'Aleksic', 0, 0, 'aleks@gmail.com', 1),
('iva', '$2y$10$cAkX0.Mj19tGnpVmli835.Lntu7aiIFx7TmOxjZNKMFqvNZ5MfOvS', 'Iva', 'Potkonjak', 0, 1, 'iva@mail.com', 1),
('kaca', '$2y$10$5pvpZkXeGshZoSh7OvFemuj8mXW1/z5uvzhMVyJlGwdkiPmOOGl/G', 'Katarina', 'Jocic', 0, 1, 'katarina@gmail.com', 1),
('luka', '$2y$10$2HmtUHeyLdftsL.YdW33L.GM02bz42UBReB6UROGh66./iafRVsjq', 'Luka', 'Hrvacevic', 0, 1, 'luka@mail.com', 1),
('marko', '$2y$10$BIezPyU7Nh3bMYsZM17nd.232JVMkDyNzXC6GOx/SdNLtGrHB0kbG', 'Marko', 'Markovic', 1, 0, 'marko@mail.com', 1),
('mika', '$2y$10$WLMXw8d4B5Nk8jHCR4C.Xe0Ctiz9xq9gPXlmFVyY4THvCj5WN9G1C', 'Mika', 'Mikic', 1, 0, 'mika@mail.com', 1),
('multi1', '$2y$10$qO3ksnnkoQmpv8WVsE7lPeMZhr6fK7ycA0CywcSPRBsehOGaq5PQy', 'Multiplayer1', 'Multiplayer1', 0, 0, 'multi1@gmail.com', 1),
('multi2', '$2y$10$Ixl/voC7hYUp0Ay1KrvwPOKk3unULuqAE/kASjRo/scPRzeaHvuqa', 'Multiplayer2', 'Multiplayer2', 0, 0, 'multi2@gmail.com', 1),
('nikola', '$2y$10$7C.H.A3QcGF2CI3G7gD6EeJTgYEklg2qE3dnhUHf21Qqv9XpJ9CQi', 'Nikola', 'Nikolic', 0, 0, 'nikola@gmail.com', 0),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reci`
--

INSERT INTO `reci` (`idR`, `rec`) VALUES
(1, 'одмор');
(2, 'лопта');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistika`
--

INSERT INTO `statistika` (`idS`, `brojPoena`, `brojPobeda`, `brojNeresenih`, `brojPoraza`, `arcadeRecord`, `username`) VALUES
(1, 0, 0, 0, 0, 0, 'luka'),
(2, 0, 0, 0, 0, 0, 'kaca'),
(3, 0, 0, 0, 0, 0, 'iva'),
(4, 0, 0, 0, 0, 0, 'uros'),
(5, 0, 0, 0, 0, 0, 'marko'),
(6, 0, 0, 0, 0, 0, 'petar'),
(7, 0, 0, 0, 0, 0, 'mika'),
(9, 0, 0, 0, 0, 0, 'nikola'),
(10, 0, 0, 0, 0, 0, 'aleks'),
(11, 0, 0, 0, 0, 0, 'multi1'),
(12, 0, 0, 0, 0, 0, 'multi2');

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
