-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 06:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repeat`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor_info`
--

CREATE TABLE `advisor_info` (
  `ad_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor_info`
--

INSERT INTO `advisor_info` (`ad_id`, `first_name`, `last_name`, `email`, `dept`, `contact_no`) VALUES
(1011, 'Tanmoy', 'Sarkar', 'tsr@uap-bd.edu', 'CSE', '01969452600'),
(1012, 'Md', 'Shopon', 'shopon@uap-bd.edu', 'CSE', '01969452601');

-- --------------------------------------------------------

--
-- Table structure for table `advisor_login`
--

CREATE TABLE `advisor_login` (
  `ad_id` int(11) NOT NULL,
  `a_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor_login`
--

INSERT INTO `advisor_login` (`ad_id`, `a_password`) VALUES
(1011, 1234),
(1012, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `student_advisor`
--

CREATE TABLE `student_advisor` (
  `reg_no` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `reg_no` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `reg_no` int(11) NOT NULL,
  `s_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_semester`
--

CREATE TABLE `student_semester` (
  `reg_no` int(11) NOT NULL,
  `lavel` int(11) NOT NULL,
  `term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor_info`
--
ALTER TABLE `advisor_info`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `advisor_login`
--
ALTER TABLE `advisor_login`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `student_advisor`
--
ALTER TABLE `student_advisor`
  ADD PRIMARY KEY (`reg_no`),
  ADD KEY `safkal` (`ad_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD PRIMARY KEY (`reg_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor_info`
--
ALTER TABLE `advisor_info`
  ADD CONSTRAINT `aifkal` FOREIGN KEY (`ad_id`) REFERENCES `advisor_login` (`ad_id`);

--
-- Constraints for table `student_advisor`
--
ALTER TABLE `student_advisor`
  ADD CONSTRAINT `safkal` FOREIGN KEY (`ad_id`) REFERENCES `advisor_login` (`ad_id`),
  ADD CONSTRAINT `sdfksl` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `sifksl` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);

--
-- Constraints for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD CONSTRAINT `ssfksl` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
