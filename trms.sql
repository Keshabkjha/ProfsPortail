-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 07:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Kumud Saxena', 'KumudHOD', 8979555555, 'csehod@niet.co.in', 'bb5fc99c7401ca5c9744442792b4c3e4', '2024-04-04 06:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourses`
--

CREATE TABLE `tblcourses` (
  `ID` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `coursePlatform` varchar(100) DEFAULT NULL,
  `courseLink` varchar(255) DEFAULT NULL,
  `courseStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourses`
--

INSERT INTO `tblcourses` (`ID`, `teacherId`, `courseName`, `coursePlatform`, `courseLink`, `courseStatus`) VALUES
(1, 1, 'AI for Everyone', 'Coursera', 'https://www.coursera.org/', 'Ongoing'),
(2, 1, 'Data Science', 'Infosys Springboard', 'https://infyspringboard.onwingspan.com/', 'Ongoing'),
(3, 1, 'Cloud Computing', 'IBM Academic', 'https://www.ibm.com/academic/', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `tbllectureschedule`
--

CREATE TABLE `tbllectureschedule` (
  `ID` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `courseName` varchar(100) DEFAULT NULL,
  `lectureDay` varchar(20) DEFAULT NULL,
  `lectureTime` time DEFAULT NULL,
  `roomNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblprojects`
--

CREATE TABLE `tblprojects` (
  `ID` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `projectName` varchar(255) DEFAULT NULL,
  `projectDescription` text DEFAULT NULL,
  `projectStatus` varchar(50) DEFAULT NULL,
  `projectDeadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblquery`
--

CREATE TABLE `tblquery` (
  `id` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `fName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` bigint(10) DEFAULT NULL,
  `Query` mediumtext DEFAULT NULL,
  `queryDate` timestamp NULL DEFAULT current_timestamp(),
  `teacherNote` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblquery`
--

INSERT INTO `tblquery` (`id`, `teacherId`, `fName`, `emailId`, `mobileNumber`, `Query`, `queryDate`, `teacherNote`) VALUES
(6, 3, 'Keshab  Kumar', 'keshavkumarjha876@gmail.com', 8002648474, 'hello sir I want to know', '2024-08-25 10:37:36', 'hii'),
(7, 3, '', '', 3, 'hello', '2024-08-25 10:46:58', NULL),
(8, 3, 'Alok Dwivedi', 'dhanyadwivedi170304@gmail.com', 8002648474, 'Hello\r\n', '2024-08-25 10:49:43', NULL),
(9, 3, 'Alok Dwivedi', 'dhanyadwivedi170304@gmail.com', 8002648474, 'hello sir how', '2024-08-25 10:50:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `ID` int(10) NOT NULL,
  `Subject` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`ID`, `Subject`, `CreationDate`) VALUES
(1, 'Mathmetics', '2024-04-04 06:11:06'),
(2, 'Physics', '2024-04-04 06:11:19'),
(3, 'Environmental Science', '2024-04-04 06:11:32'),
(4, 'Python', '2024-04-04 06:11:41'),
(5, 'Professional Communication', '2024-04-04 06:11:49'),
(6, 'Technical Communication', '2024-04-04 06:11:56'),
(7, 'Electrical and Electronics', '2024-04-04 06:12:06'),
(8, 'Data Structure', '2024-04-04 06:12:19'),
(9, 'Microprocessor', '2024-04-04 06:12:32'),
(10, 'Java', '2024-04-04 06:12:44'),
(13, 'Operating System', '2024-04-03 19:00:22'),
(14, 'Theory of Automata and Formal Language', '2024-08-24 21:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbltaskschedule`
--

CREATE TABLE `tbltaskschedule` (
  `ID` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `taskName` varchar(255) DEFAULT NULL,
  `taskDescription` text DEFAULT NULL,
  `taskDay` varchar(20) DEFAULT NULL,
  `taskTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Picture` varchar(200) NOT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Qualifications` varchar(120) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `TeacherSub` varchar(120) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `teachingExp` varchar(10) DEFAULT NULL,
  `JoiningDate` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `isPublic` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`ID`, `Name`, `Picture`, `Email`, `MobileNumber`, `password`, `Qualifications`, `Address`, `TeacherSub`, `description`, `teachingExp`, `JoiningDate`, `RegDate`, `isPublic`) VALUES
(1, 'Keshab Kumar', '171bb7da1ad6f5b744af8e1693225e661647076737.png', '0221cse013@niet.co.in', 1234567890, '5c428d8875d2948607f3e3fe134d71b4', 'B.Tech, M.tech, Phd', 'Dalsinghsarai, Samastipur, Bihar, 848114', 'Python', 'He is well known for his teaching behaviour.', '5', '2022-01-01', '2022-03-05 12:41:37', 1),
(2, 'Vivek Kumar Sharma', 'ebcd036a0db50db993ae98ce380f64191647072141.png', '0201cse@niet.co.in', 1425369874, 'f925916e2754e5e03f75dd58a5733251', 'B.Tech, M.tech, Phd', 'New Delhi India', 'Theory of Automata and Formal Language', 'He has published 12+  national and international research paper', '10', '2018-01-01', '2022-03-12 08:02:21', 1),
(3, 'Rohit Kumar', '6339dc76640db65adbce0fcc0ce5cb1c1724534921.jpg', '0201cse012@niet.co.in', 8888888888, '24780214eac5297e08da75a44c5f0480', 'B.Tech, M.tech, Phd', 'Greater Noida', 'Professional Communication', '', '4', '2024-04-04', '2024-08-24 21:25:19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `tbllectureschedule`
--
ALTER TABLE `tbllectureschedule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `tblquery`
--
ALTER TABLE `tblquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltaskschedule`
--
ALTER TABLE `tbltaskschedule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcourses`
--
ALTER TABLE `tblcourses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbllectureschedule`
--
ALTER TABLE `tbllectureschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprojects`
--
ALTER TABLE `tblprojects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquery`
--
ALTER TABLE `tblquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbltaskschedule`
--
ALTER TABLE `tbltaskschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD CONSTRAINT `tblcourses_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`);

--
-- Constraints for table `tbllectureschedule`
--
ALTER TABLE `tbllectureschedule`
  ADD CONSTRAINT `tbllectureschedule_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`);

--
-- Constraints for table `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD CONSTRAINT `tblprojects_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`);

--
-- Constraints for table `tbltaskschedule`
--
ALTER TABLE `tbltaskschedule`
  ADD CONSTRAINT `tbltaskschedule_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
