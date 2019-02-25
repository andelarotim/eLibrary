-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 06:26 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjiznicapis`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `ime_autora` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime_autora` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `ime_autora`, `prezime_autora`) VALUES
(2, 'saas', 'asas'),
(4, 'Ime', 'Imenic'),
(5, 'wdw', 'wdw');

-- --------------------------------------------------------

--
-- Table structure for table `autor_knjiga`
--

CREATE TABLE `autor_knjiga` (
  `id` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idKnjiga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor_knjiga`
--

INSERT INTO `autor_knjiga` (`id`, `idAutor`, `idKnjiga`) VALUES
(22, 4, 27),
(23, 5, 27);

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` int(255) NOT NULL,
  `opis` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`ID`, `naziv`, `isbn`, `opis`, `image`) VALUES
(2, 'vlakusnijegu', 1313131, 'sasas', ''),
(3, 'druzba pere kvrzice', 2556655, 'druze se pero i kvrzica', ''),
(4, 'druzba pere kvrzice', 2556655, 'druze se pero i kvrzica', ''),
(7, 'dwdw', 1213131, 'dwdw', ''),
(8, 'wdw', 0, 'wddwd', ''),
(9, 'dwdw', 0, 'dwdw', ''),
(10, 'dwdw', 0, 'dwdw', ''),
(11, 'qssq', 0, 'sq', ''),
(12, 'qssq', 0, 'sq', ''),
(13, 'qssq', 0, 'sq', ''),
(14, 'qssq', 0, 'sq', ''),
(15, 'qssq', 0, 'sq', ''),
(16, 'qssq', 0, 'sq', ''),
(17, 'qssq', 0, 'sq', ''),
(18, 'qssq', 0, 'sq', ''),
(19, 'qssq', 0, 'sq', ''),
(20, 'sqsq', 0, 'qsq', ''),
(21, 'sqsq', 0, 'qsq', ''),
(22, 'sasa', 0, 'as', ''),
(23, 'dada', 0, 'dada', ''),
(24, 'dada', 0, 'dada', ''),
(27, 'dada', 0, 'dada', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnickoime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnickoime`, `lozinka`, `id`) VALUES
('marin@student.fsr.ba', 'marin', 2),
('kata@student.fsr.ba', '255655', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `idRezervacija` int(11) NOT NULL,
  `id_korisnika` int(30) NOT NULL,
  `id_knjige` int(30) NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`idRezervacija`, `id_korisnika`, `id_knjige`, `datum_od`, `datum_do`, `status`) VALUES
(15, 2, 2, '2019-02-14', '2019-03-16', b'1'),
(16, 2, 2, '2019-02-14', '2019-03-16', b'1'),
(17, 2, 2, '2019-02-14', '2019-03-16', b'1'),
(18, 2, 2, '2019-02-14', '2019-03-16', b'1'),
(19, 2, 2, '2019-02-14', '2019-03-16', b'0'),
(20, 2, 2, '2019-02-14', '2019-03-16', b'0'),
(21, 2, 2, '2019-02-17', '2019-03-19', b'0'),
(22, 3, 2, '2019-02-17', '2019-03-19', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autor_knjiga`
--
ALTER TABLE `autor_knjiga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_knjiga_knjiga` (`idKnjiga`),
  ADD KEY `autor_knjiga_autor` (`idAutor`);

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`idRezervacija`),
  ADD KEY `rezervacijaKnjiga` (`id_knjige`),
  ADD KEY `rezervacijaKorisnik` (`id_korisnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `autor_knjiga`
--
ALTER TABLE `autor_knjiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idRezervacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor_knjiga`
--
ALTER TABLE `autor_knjiga`
  ADD CONSTRAINT `autor_knjiga_autor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `autor_knjiga_knjiga` FOREIGN KEY (`idKnjiga`) REFERENCES `knjiga` (`ID`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacijaKnjiga` FOREIGN KEY (`id_knjige`) REFERENCES `knjiga` (`ID`),
  ADD CONSTRAINT `rezervacijaKorisnik` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
