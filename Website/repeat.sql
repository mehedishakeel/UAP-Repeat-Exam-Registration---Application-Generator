-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2020 at 09:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
-- Table structure for table `advisor_notification`
--

CREATE TABLE `advisor_notification` (
  `n_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `stat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `course_code`, `dept`, `course_title`) VALUES
(1, 'CSE 404', 'CSE', 'Mathematics for Computer Science'),
(2, 'CSE 405', 'CSE', 'Artificial Intelegence & Expert System'),
(3, 'CSE 403', 'CSE', 'Operating Systems'),
(4, 'CSE 407', 'CSE', 'ICT Law Policy and Ethics');

-- --------------------------------------------------------

--
-- Table structure for table `student_advisor`
--

CREATE TABLE `student_advisor` (
  `reg_no` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_advisor`
--

INSERT INTO `student_advisor` (`reg_no`, `ad_id`) VALUES
(16201066, 1011),
(16201071, 1011),
(16201073, 1011),
(18201071, 1012);

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

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`reg_no`, `first_name`, `last_name`, `email`, `dept`, `contact_no`) VALUES
(16201066, 'Arafat Bin', 'Kashem', 'bipu@gmail.com', 'CSE', '01725457825'),
(16201071, 'Md All', 'Mamun', 'mamun@gmail.com', 'CSE', '01701235689'),
(16201073, 'Mehedi', 'Shakeel', 'mehedihshakeel@gmail.com', 'CSE', '01735393936'),
(18201071, 'Karim', 'Mia', 'k@mail.com', 'CSE', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `reg_no` int(11) NOT NULL,
  `s_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`reg_no`, `s_password`) VALUES
(16201066, '1234'),
(16201071, '1234'),
(16201073, '1234'),
(18201071, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_notification`
--

CREATE TABLE `student_notification` (
  `n_id` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `stat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_notification`
--

INSERT INTO `student_notification` (`n_id`, `reg_no`, `notification`, `stat`) VALUES
(1, 16201066, 'Your Request Has Been Approved By Your Advisor Tanmoy Sarkar ', 'no'),
(2, 16201071, 'Your Request Has Been Rejected By Your Advisor Tanmoy Sarkar ', 'no'),
(3, 16201073, 'Your Request Has Been Rejected By Your Advisor Tanmoy Sarkar ', 'no'),
(4, 16201066, 'Your Request Has Been Approved By Your Advisor Tanmoy Sarkar ', 'no'),
(5, 16201066, 'Your Request Has Been Approved By Your Advisor Tanmoy Sarkar ', 'no'),
(6, 16201071, 'Your Request Has Been Approved By Your Advisor Tanmoy Sarkar ', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `reg_no` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`reg_no`, `course_code`, `course_name`, `status`) VALUES
(16201066, 'CSE 403', 'Operating Systems', 'approved'),
(16201066, 'CSE 404', 'Mathematics for Computer Science', 'approved'),
(16201066, 'CSE 405', 'Artificial Intelegence & Expert System', 'approved'),
(16201066, 'CSE 407', 'ICT Law Policy and Ethics', 'approved'),
(16201071, 'CSE 403', 'Operating Systems', 'approved'),
(16201071, 'CSE 404', 'Mathematics for Computer Science', 'approved'),
(16201071, 'CSE 405', 'Artificial Intelegence & Expert System', 'approved'),
(16201071, 'CSE 407', 'ICT Law Policy and Ethics', 'approved'),
(16201073, 'CSE 403', 'Operating Systems', 'rejected'),
(16201073, 'CSE 404', 'Mathematics for Computer Science', 'rejected'),
(16201073, 'CSE 405', 'Artificial Intelegence & Expert System', 'rejected'),
(16201073, 'CSE 407', 'ICT Law Policy and Ethics', 'rejected'),
(18201071, 'CSE 403', 'Operating Systems', 'unread'),
(18201071, 'CSE 404', 'Mathematics for Computer Science', 'unread');

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
-- Dumping data for table `student_semester`
--

INSERT INTO `student_semester` (`reg_no`, `lavel`, `term`) VALUES
(16201066, 4, 1),
(16201071, 4, 1),
(16201073, 4, 1),
(18201071, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `temp_add`
--

CREATE TABLE `temp_add` (
  `reg_no` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL
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
-- Indexes for table `advisor_notification`
--
ALTER TABLE `advisor_notification`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `anfkal` (`ad_id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_notification`
--
ALTER TABLE `student_notification`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `snfksl` (`reg_no`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`reg_no`,`course_code`);

--
-- Indexes for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD PRIMARY KEY (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor_info`
--
ALTER TABLE `advisor_info`
  ADD CONSTRAINT `aifkal` FOREIGN KEY (`ad_id`) REFERENCES `advisor_login` (`ad_id`);

--
-- Constraints for table `advisor_notification`
--
ALTER TABLE `advisor_notification`
  ADD CONSTRAINT `anfkal` FOREIGN KEY (`ad_id`) REFERENCES `advisor_login` (`ad_id`);

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
-- Constraints for table `student_notification`
--
ALTER TABLE `student_notification`
  ADD CONSTRAINT `snfksl` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);

--
-- Constraints for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD CONSTRAINT `srfk` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);

--
-- Constraints for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD CONSTRAINT `ssfksl` FOREIGN KEY (`reg_no`) REFERENCES `student_login` (`reg_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
