-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 09:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, 'Bio Science 12'),
(2, 'Bio Science 13'),
(3, 'Combined Maths 12'),
(4, 'Combined Maths 13'),
(5, 'Chemistry 12'),
(6, 'Chemistry 13');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `uname` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`uname`, `password`) VALUES
('admin', 'themiya');

-- --------------------------------------------------------

--
-- Table structure for table `particulars`
--

CREATE TABLE `particulars` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `particulars`
--

INSERT INTO `particulars` (`id`, `name`, `price`) VALUES
(1, 'New Admission', '1200.00'),
(2, 'Yearly', '250.00'),
(3, 'Diary', '50.00'),
(4, 'Tie', '40.00'),
(5, 'Belt', '50.00'),
(6, 'Ad Form', '50.00'),
(7, 'ID Card', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `stdName` varchar(50) NOT NULL,
  `regNo` varchar(20) DEFAULT NULL,
  `classId` int(11) NOT NULL,
  `depositDate` date NOT NULL,
  `depositedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `stdName`, `regNo`, `classId`, `depositDate`, `depositedBy`) VALUES
(7, 'Randika', '1', 1, '2019-08-05', 'Father'),
(8, 'Sandun', '2', 6, '2019-08-05', 'Randika'),
(9, 'Sandun', '2', 6, '2019-08-05', 'Randika'),
(10, 'Themiya', '1', 1, '2019-08-08', 'admin'),
(11, 'Themiya', '2', 1, '2019-08-08', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_month`
--

CREATE TABLE `receipt_month` (
  `receipt_id` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_month`
--

INSERT INTO `receipt_month` (`receipt_id`, `month`) VALUES
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_particular`
--

CREATE TABLE `receipt_particular` (
  `receipt_id` int(11) NOT NULL,
  `particular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_particular`
--

INSERT INTO `receipt_particular` (`receipt_id`, `particular_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 4),
(8, 5),
(8, 7),
(9, 1),
(9, 2),
(9, 5),
(9, 6),
(9, 7),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `id` int(11) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`id`, `fname`, `mname`, `lname`, `subject`, `address`, `gender`, `phone`, `email`, `uname`, `password`, `student_id`) VALUES
(4, 'namal', 'maka', 'suka', 'Art', 'no 20,anuradhapura', 'female', 712022856, 'koka@outlook.com', 'herath', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_regist`
--

CREATE TABLE `teacher_regist` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_regist`
--

INSERT INTO `teacher_regist` (`id`, `fname`, `mname`, `lname`, `address`, `gender`, `phone`, `email`, `qualification`, `city`, `uname`, `password`) VALUES
(2, 'Herath', 'manusha', 'wikramanayake', 'no20,anuradhapura', 'male', 717015509, 'herathwikra@gmail.com', 'BSC', 'Thalawa', 'herath', 'herath123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `particulars`
--
ALTER TABLE `particulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_classId` (`classId`);

--
-- Indexes for table `receipt_month`
--
ALTER TABLE `receipt_month`
  ADD PRIMARY KEY (`receipt_id`,`month`);

--
-- Indexes for table `receipt_particular`
--
ALTER TABLE `receipt_particular`
  ADD PRIMARY KEY (`receipt_id`,`particular_id`),
  ADD KEY `receipt_particular___fk_particular_id` (`particular_id`);

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_regist`
--
ALTER TABLE `teacher_regist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `particulars`
--
ALTER TABLE `particulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_regist`
--
ALTER TABLE `teacher_regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `fk_classId` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`);

--
-- Constraints for table `receipt_month`
--
ALTER TABLE `receipt_month`
  ADD CONSTRAINT `receipt_month___fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`);

--
-- Constraints for table `receipt_particular`
--
ALTER TABLE `receipt_particular`
  ADD CONSTRAINT `receipt_particular___fk_particular_id` FOREIGN KEY (`particular_id`) REFERENCES `particulars` (`id`),
  ADD CONSTRAINT `receipt_particular___fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
