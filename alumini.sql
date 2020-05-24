-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 04:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `Eno` varchar(20) NOT NULL,
  PRIMARY KEY (`Eno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`Eno`) VALUES
('0987654321'),
('1234567890'),
('9008552663'),
('9763206009'),
('9922113378');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `Eno` varchar(11) NOT NULL,
  `Company` varchar(30) NOT NULL,
  `JobRoll` varchar(30) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `proff` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`Eno`, `Company`, `JobRoll`, `Location`, `proff`) VALUES
('9008552663', 'Infosys', 'Tester', 'Pune', 'Bussinessmen'),
('0987654321', 'Farmer', 'None', 'Ahmednagar', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `Eno` varchar(11) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Cpassword` varchar(30) NOT NULL,
  `Dob` varchar(30) NOT NULL,
  `Pyear` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  PRIMARY KEY (`Eno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Eno`, `Fname`, `Lname`, `Password`, `Cpassword`, `Dob`, `Pyear`, `Email`, `Mobile`, `Gender`, `Address`, `City`, `State`, `Country`) VALUES
('0987654321', 'Amol', 'Vikhe', 'Amol  ', 'Amol  ', '13November2001', 2000, 'gavhanebipin@gmail.com  ', '9988776655 ', 'Male', 'Balikashram road,Ahmednagar \r\n \r\n', 'Ahmednagar  ', 'Maharashtra  ', 'India  '),
('9008552663', 'Nilesh', 'Rao', 'Nilesh                ', 'Nilesh                ', '8September2004', 2000, 'gavhanebipin@gmail.com        ', '9922113378               ', 'Male', 'Ahmednagar \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n', 'Ahmednaagr                ', 'Maharashtra                ', 'India                ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
