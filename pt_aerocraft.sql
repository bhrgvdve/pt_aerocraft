-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 05:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_aerocraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_recurrence` enum('D','W','M','Y') NOT NULL DEFAULT 'D',
  `repeat_on` tinyint(1) NOT NULL DEFAULT '0',
  `recurrence_format` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `start_date`, `end_date`, `event_recurrence`, `repeat_on`, `recurrence_format`, `created_at`, `modified_at`) VALUES
(1, 'Test1', '2022-11-01', '2022-11-30', 'D', 1, NULL, '2022-11-19 12:03:34', NULL),
(2, 'Test2', '2022-11-02', '2022-11-30', 'W', 1, '1,4', '2022-11-19 12:49:33', NULL),
(3, 'Test3', '2022-01-01', '2022-12-31', 'M', 1, '2', '2022-11-19 12:50:14', NULL),
(4, 'Test 4', '2017-01-01', '2022-12-31', 'Y', 1, '2', '2022-11-19 12:51:31', NULL),
(10, 'Test 5', '2022-11-17', '2022-11-30', 'D', 1, '1', '2022-11-19 12:02:16', '2022-11-19 12:02:16'),
(11, 'Test 6', '2022-08-04', '2022-11-30', 'W', 1, '0,6', '2022-11-19 12:03:13', '2022-11-19 12:03:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
