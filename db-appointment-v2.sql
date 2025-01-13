-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 07:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `table-activity`
--

CREATE TABLE `table-activity` (
  `activity-id` int(11) NOT NULL,
  `activity-type` int(11) NOT NULL,
  `activity-officerid` int(11) NOT NULL,
  `activity-startdate` date NOT NULL,
  `activity-starttime` time NOT NULL,
  `activity-enddate` date NOT NULL,
  `activity-endtime` time NOT NULL,
  `activity-status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-activity`
--

INSERT INTO `table-activity` (`activity-id`, `activity-type`, `activity-officerid`, `activity-startdate`, `activity-starttime`, `activity-enddate`, `activity-endtime`, `activity-status`) VALUES
(1, 3, 7, '2025-01-07', '12:39:00', '0000-00-00', '11:14:29', 1),
(2, 2, 7, '2025-01-18', '12:35:00', '2025-01-17', '11:14:29', 1),
(3, 3, 8, '2028-07-21', '05:27:00', '2025-01-04', '00:27:00', 0),
(4, 1, 24, '2038-06-13', '04:40:00', '2025-01-25', '06:40:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table-appointment`
--

CREATE TABLE `table-appointment` (
  `appointment-id` int(11) NOT NULL,
  `appointment-officerid` int(11) NOT NULL,
  `appointment-visitorid` int(11) NOT NULL,
  `appointment-name` varchar(400) NOT NULL,
  `appointment-status` int(11) NOT NULL,
  `appointment-date` date NOT NULL,
  `appointment-starttime` time NOT NULL,
  `appointment-endtime` time NOT NULL,
  `appointment-addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-appointment`
--

INSERT INTO `table-appointment` (`appointment-id`, `appointment-officerid`, `appointment-visitorid`, `appointment-name`, `appointment-status`, `appointment-date`, `appointment-starttime`, `appointment-endtime`, `appointment-addedon`) VALUES
(1, 7, 7, 'Ramesh Catering', 0, '2025-10-04', '00:00:00', '00:00:00', '2025-10-04 00:00:00'),
(2, 12, 3, '', 1, '2025-10-04', '00:03:00', '00:03:00', '2025-01-12 15:52:49'),
(3, 11, 6, 'Kapil SHarma Show XXXXXX', 0, '2025-01-10', '17:31:00', '17:29:00', '2025-01-12 12:44:38'),
(4, 7, 13, 'Kapil SHarma Show XXXXXX', 0, '2025-01-10', '17:31:00', '17:29:00', '2025-01-12 12:45:12'),
(5, 11, 12, '', 1, '2025-01-08', '20:46:00', '20:46:00', '2025-01-12 15:57:27'),
(6, 12, 8, 'RKO', 0, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 15:58:50'),
(7, 24, 13, '', 1, '2018-02-18', '20:46:00', '22:51:00', '2025-01-12 16:11:05'),
(8, 0, 0, 'pillar of self steam', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:11:43'),
(9, 0, 0, 'fuyrytrtyr', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:12:01'),
(10, 0, 0, 'rajesh hamal', 0, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:21:51'),
(11, 0, 0, 'gyjgjgyj gyani', 0, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:22:48'),
(12, 21, 15, '', 0, '2020-02-04', '21:14:00', '21:15:00', '2025-01-12 16:30:24'),
(13, 21, 16, 'This is the final attempt', 0, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:36:09'),
(14, 24, 1, 'cm punk big o', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:51:01'),
(15, 3, 1, 'Big show big name', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-12 16:51:38'),
(16, 8, 13, 'hospital Cleaner job ', 0, '2025-01-17', '21:57:00', '21:56:00', '2025-01-12 17:08:37'),
(17, 1, 1, '', 1, '2025-01-11', '10:36:00', '10:33:00', '2025-01-13 05:47:59'),
(18, 3, 1, '', 1, '2025-01-16', '10:36:00', '00:33:00', '2025-01-13 05:48:44'),
(19, 1, 1, 'dsfsd', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-13 05:48:50'),
(20, 1, 1, '', 1, '0000-00-00', '00:00:00', '00:00:00', '2025-01-13 05:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `table-officer`
--

CREATE TABLE `table-officer` (
  `officer-id` int(11) NOT NULL,
  `officer-name` varchar(200) NOT NULL,
  `officer-postid` int(11) NOT NULL,
  `officer-status` int(200) NOT NULL,
  `officer-workstarttime` datetime NOT NULL,
  `officer-workendtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-officer`
--

INSERT INTO `table-officer` (`officer-id`, `officer-name`, `officer-postid`, `officer-status`, `officer-workstarttime`, `officer-workendtime`) VALUES
(1, '', 136, 0, '2025-01-14 20:34:00', '2025-01-01 18:36:00'),
(2, 'sfsdf', 138, 0, '2025-01-10 12:47:34', '2025-01-10 12:47:34'),
(3, 'eeeeeeeeeeee', 133, 0, '2025-01-10 12:47:34', '2025-01-10 12:47:34'),
(4, 'sfsdf', 138, 0, '2025-01-10 12:47:34', '2025-01-10 12:47:34'),
(5, 'eeeeeeeeeeee', 133, 0, '2025-01-10 12:47:34', '2025-01-10 12:47:34'),
(6, '', 131, 1, '2025-01-14 18:10:00', '2025-01-27 06:10:00'),
(7, 'Department Ashesh', 134, 0, '2025-01-22 22:08:00', '2025-01-27 18:14:00'),
(8, 'XXXXXXXXX', 132, 1, '2025-01-20 00:06:00', '2025-01-20 00:06:00'),
(9, '', 138, 0, '2024-12-31 12:31:00', '2025-01-01 19:31:00'),
(10, '', 135, 1, '2025-01-14 18:10:00', '2025-01-27 06:10:00'),
(11, 'Department Ashesh Adhikari', 136, 0, '2025-01-22 22:08:00', '2025-01-27 18:14:00'),
(12, 'Rakesh', 132, 1, '2025-01-20 00:06:00', '2025-01-20 00:06:00'),
(13, '', 136, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', 133, 0, '2025-01-06 22:45:00', '2025-01-22 07:51:00'),
(16, '', 136, 1, '2025-01-14 21:57:00', '2025-02-04 23:57:00'),
(17, 'uyiuyi', 136, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'qqqqqqqqqqqqqq', 133, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Ganga Limbu', 131, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'janghe mero nam', 135, 1, '2025-01-11 00:24:00', '2025-01-14 00:20:00'),
(25, 'Gyanendra Shah', 135, 0, '2025-01-25 00:20:00', '2025-01-11 00:23:00'),
(26, 'bbbnaya', 131, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table-post`
--

CREATE TABLE `table-post` (
  `post-id` int(11) NOT NULL,
  `post-name` varchar(200) NOT NULL,
  `post-status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-post`
--

INSERT INTO `table-post` (`post-id`, `post-name`, `post-status`) VALUES
(131, 'pearn jem band', 1),
(132, 'Madan Bhandari thulo hhhh', 1),
(133, 'Rakesh chor deseh chhod', 1),
(134, 'raeeeeeeeeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrrr', 1),
(135, 'This is life ttttttttttttttt', 1),
(136, 'This is the game rrrrr', 1),
(137, '', 0),
(138, 'tttt', 0),
(139, '', 0),
(140, '', 1),
(141, '', 0),
(142, '', 0),
(143, '', 1),
(144, '', 1),
(145, 'dcdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table-visitor`
--

CREATE TABLE `table-visitor` (
  `visitor-id` int(11) NOT NULL,
  `visitor-name` varchar(200) NOT NULL,
  `visitor-mobile` varchar(200) NOT NULL,
  `visitor-email` varchar(200) NOT NULL,
  `visitor-status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-visitor`
--

INSERT INTO `table-visitor` (`visitor-id`, `visitor-name`, `visitor-mobile`, `visitor-email`, `visitor-status`) VALUES
(1, 'Ashesh Adhikari', '9793287492', 'ashes@lkjflkdsf', '0'),
(2, 'Binod Murmu', '3243249028304', 'Binod@werwe', '1'),
(3, 'Ashesh Adhikari', '9793287492', 'ashes@lkjflkdsf', '0'),
(4, 'Binod Murmu', '3243249028304', 'Binod@werwe', '1'),
(5, 'Prithwi  Narayan Shah', '3243242334', 'ashesadhikari55@gmail.com', '1'),
(6, 'Binod Murmu', '9793287492', 'zzzzzzzz@zzzzzzzzzzz', '0'),
(7, 'Prithwi  Narayan Shah hero', '3243242334000000000000', 'ashesadhikar444i55@gmail.com', '1'),
(8, 'Binod Murmu xx', '9793287492', 'zzzzzzzz@zzzzzzzzzzz', '1'),
(9, 'Prithwi  Narayan Shah hero', '3243242334000000000000`1111111111', 'ashesadhikar444i55@gmail.com', '1'),
(10, 'Binod Murmu king', '9793287492', 'zzzzzzzz@zzzzzzzzzzz', '0'),
(11, 'Binod Murmu king raja', '9793287492', 'zzzzzzzz@zzzzzzzzzzz', '0'),
(12, 'Binod Murmu king boko', '9793287492', 'zzzzzzzz@zzzzzzzzzzz', '0'),
(13, 'Prithwi  Narayan Shah', '3243242334', 'ashesadhikari55@gmail.com', '0'),
(14, 'yyyyyyyyyyyy', '87686876', 'bflkbj@fsdf', '1'),
(15, 'yyyyyyyyyyyyssss yes yes', '87686876czxc', 'bflkbj@fsdf', '0'),
(16, 'zcx hero', 'zxc', 'zxc@fsdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `table-workdays`
--

CREATE TABLE `table-workdays` (
  `workdays-id` int(11) NOT NULL,
  `workdays-officerid` int(11) NOT NULL,
  `workdays-dayofweek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table-workdays`
--

INSERT INTO `table-workdays` (`workdays-id`, `workdays-officerid`, `workdays-dayofweek`) VALUES
(3, 11, 555),
(5, 12, 232),
(6, 24, 2312),
(7, 5, 2147483647),
(8, 21, 123123123),
(9, 24, 2147483647),
(10, 25, 2147483647),
(11, 5, 4444),
(12, 18, 2147483647),
(13, 25, 2147483647),
(14, 18, 43215),
(15, 7, 2147483647),
(16, 11, 765);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table-activity`
--
ALTER TABLE `table-activity`
  ADD PRIMARY KEY (`activity-id`),
  ADD KEY `FK_activity-officer` (`activity-officerid`);

--
-- Indexes for table `table-appointment`
--
ALTER TABLE `table-appointment`
  ADD PRIMARY KEY (`appointment-id`);

--
-- Indexes for table `table-officer`
--
ALTER TABLE `table-officer`
  ADD PRIMARY KEY (`officer-id`),
  ADD KEY `FK_officer-post` (`officer-postid`);

--
-- Indexes for table `table-post`
--
ALTER TABLE `table-post`
  ADD PRIMARY KEY (`post-id`);

--
-- Indexes for table `table-visitor`
--
ALTER TABLE `table-visitor`
  ADD PRIMARY KEY (`visitor-id`);

--
-- Indexes for table `table-workdays`
--
ALTER TABLE `table-workdays`
  ADD PRIMARY KEY (`workdays-id`),
  ADD KEY `FK_workdays-officer` (`workdays-officerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table-activity`
--
ALTER TABLE `table-activity`
  MODIFY `activity-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table-appointment`
--
ALTER TABLE `table-appointment`
  MODIFY `appointment-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table-officer`
--
ALTER TABLE `table-officer`
  MODIFY `officer-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `table-post`
--
ALTER TABLE `table-post`
  MODIFY `post-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `table-visitor`
--
ALTER TABLE `table-visitor`
  MODIFY `visitor-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `table-workdays`
--
ALTER TABLE `table-workdays`
  MODIFY `workdays-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table-activity`
--
ALTER TABLE `table-activity`
  ADD CONSTRAINT `FK_activity-officer` FOREIGN KEY (`activity-officerid`) REFERENCES `table-officer` (`officer-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table-officer`
--
ALTER TABLE `table-officer`
  ADD CONSTRAINT `FK_officer-post` FOREIGN KEY (`officer-postid`) REFERENCES `table-post` (`post-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table-workdays`
--
ALTER TABLE `table-workdays`
  ADD CONSTRAINT `FK_workdays-officer` FOREIGN KEY (`workdays-officerid`) REFERENCES `table-officer` (`officer-id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
