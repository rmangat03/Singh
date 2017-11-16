-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2017 at 05:31 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KhalsaClinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `PatientFname` char(100) NOT NULL,
  `PatientLname` char(100) NOT NULL,
  `bookdate` date NOT NULL,
  `Cnumber` varchar(10) NOT NULL,
  `DoctorName` char(100) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  `MspNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`PatientFname`, `PatientLname`, `bookdate`, `Cnumber`, `DoctorName`, `Timing`, `MspNumber`) VALUES
('Harpreet', 'Singh', '2017-11-22', '6044424004', 'Peter Park', '10:00', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `ID` int(100) NOT NULL,
  `Gender` char(10) NOT NULL,
  `CNumber` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Major` char(100) NOT NULL,
  `DoctorName` char(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`ID`, `Gender`, `CNumber`, `Email`, `Qualification`, `Major`, `DoctorName`, `Password`) VALUES
(3, 'male', '1111111111', 'alanwilkins@khalsaclinic.com', 'MD', 'Medicine', 'Alan Wilkins', '1234'),
(5, 'Female', '2222222222', 'suzzaneclarke@khalsaclinic.com', 'MD', 'Psychiatrist', 'Suzzane Clarke', '123'),
(6, 'Male', '3333333333', 'michealjones@khalsaclinic.com', 'MD', 'Ortho', 'Micheal Jones', '123'),
(7, 'Female', '4444444444', 'mclarenscott@khalsaclinic.com', 'MD', 'Emergency Medicine', 'Maclaren Scott', '123'),
(8, 'Male', '5555555555', 'peterpark@khalsaclinic.com', 'MD', 'Surgery', 'Peter Park', '123');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `ID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Dosage` varchar(100) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `FName` char(20) NOT NULL,
  `LName` char(20) NOT NULL,
  `Gender` char(10) NOT NULL,
  `Dob` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PostalCode` varchar(6) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MSP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`FName`, `LName`, `Gender`, `Dob`, `Address`, `PostalCode`, `ContactNumber`, `Email`, `MSP`) VALUES
('Harpreet', 'Singh', 'male', '1994-12-16', '9299 156 STREET', 'V3R4L1', '6044424004', 'Harpreet.singh1247980@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `Receptionist`
--

CREATE TABLE `Receptionist` (
  `ID` int(100) NOT NULL,
  `FName` char(100) NOT NULL,
  `LName` char(100) NOT NULL,
  `Gender` char(100) NOT NULL,
  `CNumber` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`bookdate`,`DoctorName`,`Timing`),
  ADD KEY `appointment_ibfk_1` (`MspNumber`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`MSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`MspNumber`) REFERENCES `Patients` (`MSP`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
