-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2019 at 05:34 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbacksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `belongcourse`
--

DROP TABLE IF EXISTS `belongcourse`;
CREATE TABLE IF NOT EXISTS `belongcourse` (
  `dId` int(11) NOT NULL,
  `cCode` varchar(11) NOT NULL,
  PRIMARY KEY (`dId`,`cCode`),
  KEY `dId` (`dId`),
  KEY `cCode` (`cCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `cCode` varchar(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `noOfLecture` int(11) DEFAULT NULL,
  PRIMARY KEY (`cCode`),
  KEY `cCode` (`cCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dId` int(11) NOT NULL,
  `dName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`dId`),
  KEY `dId` (`dId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyId` int(11) NOT NULL,
  `post` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `dId` int(11) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `areaOfInterest` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phno` bigint(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`facultyId`),
  KEY `dId` (`dId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `scholarNo` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `cCode` varchar(11) NOT NULL,
  `que1` tinyint(4) DEFAULT NULL,
  `que2` tinyint(4) DEFAULT NULL,
  `que3` tinyint(4) DEFAULT NULL,
  `que4` tinyint(4) DEFAULT NULL,
  `que5` tinyint(4) DEFAULT NULL,
  `que6` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`scholarNo`,`facultyId`,`cCode`),
  KEY `scholarNo` (`scholarNo`),
  KEY `facultyId` (`facultyId`),
  KEY `cCode` (`cCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
CREATE TABLE IF NOT EXISTS `master` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opts`
--

DROP TABLE IF EXISTS `opts`;
CREATE TABLE IF NOT EXISTS `opts` (
  `scholarNo` int(11) NOT NULL,
  `cCode` varchar(11) NOT NULL,
  PRIMARY KEY (`scholarNo`,`cCode`),
  KEY `cCode` (`cCode`),
  KEY `scholarNo` (`scholarNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `scholarNo` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `programe` varchar(100) DEFAULT NULL,
  `dId` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phno` bigint(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`scholarNo`),
  KEY `dId` (`dId`),
  KEY `scholarNo` (`scholarNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachbyfaculty`
--

DROP TABLE IF EXISTS `teachbyfaculty`;
CREATE TABLE IF NOT EXISTS `teachbyfaculty` (
  `facultyId` int(11) NOT NULL,
  `dId` int(11) NOT NULL,
  PRIMARY KEY (`facultyId`,`dId`),
  KEY `facultyId` (`facultyId`),
  KEY `dId` (`dId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
CREATE TABLE IF NOT EXISTS `teaches` (
  `facultyId` int(11) NOT NULL,
  `cCode` varchar(11) NOT NULL,
  PRIMARY KEY (`facultyId`,`cCode`),
  KEY `facultyId` (`facultyId`),
  KEY `cCode` (`cCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belongcourse`
--
ALTER TABLE `belongcourse`
  ADD CONSTRAINT `belongcourse_ibfk_1` FOREIGN KEY (`cCode`) REFERENCES `courses` (`cCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `belongcourse_ibfk_2` FOREIGN KEY (`dId`) REFERENCES `department` (`dId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dId`) REFERENCES `department` (`dId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cCode`) REFERENCES `courses` (`cCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`scholarNo`) REFERENCES `student` (`scholarNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `opts`
--
ALTER TABLE `opts`
  ADD CONSTRAINT `opts_ibfk_1` FOREIGN KEY (`cCode`) REFERENCES `courses` (`cCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `opts_ibfk_2` FOREIGN KEY (`scholarNo`) REFERENCES `student` (`scholarNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dId`) REFERENCES `department` (`dId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `teachbyfaculty`
--
ALTER TABLE `teachbyfaculty`
  ADD CONSTRAINT `teachbyfaculty_ibfk_1` FOREIGN KEY (`dId`) REFERENCES `department` (`dId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `teachbyfaculty_ibfk_2` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`cCode`) REFERENCES `courses` (`cCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
