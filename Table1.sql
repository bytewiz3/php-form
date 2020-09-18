-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2020 at 02:08 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Table1`
--

CREATE TABLE `Table1` (
  `ID` int NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `LoanType` varchar(20) NOT NULL,
  `Customer` varchar(20) NOT NULL,
  `InsertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Table1`
--

INSERT INTO `Table1` (`ID`, `Address`, `City`, `State`, `Zip`, `LoanType`, `Customer`, `InsertDate`) VALUES
(53, '112 Valentine Pl.', 'Ithaca', 'NY', '14850', 'Weekly', 'No', '2020-09-18 13:39:32'),
(58, '208 Stewart Ave', 'Ithaca', 'NY', '14850', 'Monthly', 'No', '2020-09-18 14:06:42'),
(59, 'Address', 'City', 'State', '11111', 'Annual', 'No', '2020-09-18 14:06:59'),
(60, 'Hello', 'Hey', 'OK', '72834', 'Loan', 'Customer', '2020-09-18 14:07:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Table1`
--
ALTER TABLE `Table1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Table1`
--
ALTER TABLE `Table1`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
