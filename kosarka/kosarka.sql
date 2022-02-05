-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 07:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosarka`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `GradID` int(11) NOT NULL,
  `Naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`GradID`, `Naziv`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad\r\n'),
(3, 'Kragujevac'),
(4, 'Sabac'),
(5, 'Nis'),
(6, 'Kraljevo\r\n'),
(7, 'Vrsac'),
(8, 'Zrenjenin');

-- --------------------------------------------------------

--
-- Table structure for table `mec`
--

CREATE TABLE `mec` (
  `mecID` int(11) NOT NULL,
  `DomacinID` int(1) NOT NULL,
  `GostID` int(1) NOT NULL,
  `PoeniDomacin` int(10) NOT NULL,
  `PoenaGosti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mec`
--

INSERT INTO `mec` (`mecID`, `DomacinID`, `GostID`, `PoeniDomacin`, `PoenaGosti`) VALUES
(1, 5, 8, 85, 72),
(2, 7, 1, 109, 85),
(3, 2, 9, 75, 93),
(4, 7, 2, 62, 79),
(5, 3, 2, 95, 93),
(6, 3, 8, 102, 99),
(7, 9, 3, 95, 97),
(8, 8, 6, 82, 76),
(9, 8, 9, 90, 87),
(10, 4, 6, 79, 85),
(11, 5, 7, 113, 102),
(12, 1, 9, 81, 92),
(13, 8, 7, 85, 80),
(14, 1, 3, 102, 95);

-- --------------------------------------------------------

--
-- Table structure for table `tabela`
--

CREATE TABLE `tabela` (
  `RBr` int(3) NOT NULL,
  `TimID` int(3) NOT NULL,
  `UkupnoUtakmica` int(3) NOT NULL,
  `Pobede` int(3) NOT NULL,
  `Porazi` int(3) NOT NULL,
  `OsvojenihPoena` int(5) NOT NULL,
  `IzgubljenihPoena` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabela`
--

INSERT INTO `tabela` (`RBr`, `TimID`, `UkupnoUtakmica`, `Pobede`, `Porazi`, `OsvojenihPoena`, `IzgubljenihPoena`) VALUES
(1, 6, 13, 12, 1, 1205, 818),
(2, 8, 13, 11, 2, 1037, 911),
(3, 1, 13, 10, 3, 1166, 928),
(4, 2, 13, 10, 3, 949, 784),
(5, 3, 13, 7, 6, 926, 960),
(6, 4, 13, 5, 8, 906, 1039),
(7, 7, 13, 4, 9, 993, 1025),
(8, 9, 13, 2, 12, 900, 1228),
(9, 5, 13, 0, 13, 821, 1084);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `TimID` int(3) NOT NULL,
  `NazivTima` varchar(255) NOT NULL,
  `BrojIgraca` int(3) NOT NULL,
  `GradID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`TimID`, `NazivTima`, `BrojIgraca`, `GradID`) VALUES
(1, 'Art Basket', 14, 1),
(2, 'Vojvodina 021', 12, 2),
(3, 'Duga', 15, 4),
(4, 'Radnicki', 13, 3),
(5, 'Proleter', 12, 8),
(6, 'Crvena Zvezda', 16, 1),
(7, 'Vrsac doo', 15, 7),
(8, 'Kraljevo', 14, 6),
(9, 'Student', 13, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`GradID`);

--
-- Indexes for table `mec`
--
ALTER TABLE `mec`
  ADD PRIMARY KEY (`mecID`),
  ADD KEY `mec_ibfk_1` (`DomacinID`),
  ADD KEY `mec_ibfk_2` (`GostID`);

--
-- Indexes for table `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`RBr`,`TimID`),
  ADD KEY `tabela_ibfk_1` (`TimID`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`TimID`),
  ADD KEY `tim_ibfk_1` (`GradID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mec`
--
ALTER TABLE `mec`
  MODIFY `mecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mec`
--
ALTER TABLE `mec`
  ADD CONSTRAINT `mec_ibfk_1` FOREIGN KEY (`DomacinID`) REFERENCES `tim` (`TimID`),
  ADD CONSTRAINT `mec_ibfk_2` FOREIGN KEY (`GostID`) REFERENCES `tim` (`TimID`);

--
-- Constraints for table `tabela`
--
ALTER TABLE `tabela`
  ADD CONSTRAINT `tabela_ibfk_1` FOREIGN KEY (`TimID`) REFERENCES `tim` (`TimID`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`GradID`) REFERENCES `grad` (`GradID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
