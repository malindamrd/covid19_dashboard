-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2020 at 03:26 PM
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
-- Database: `previous_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `previous_data`
--

CREATE TABLE `previous_data` (
  `update_time` varchar(100) NOT NULL,
  `local_new_cases` int(100) NOT NULL,
  `local_total_cases` int(100) NOT NULL,
  `local_recoverd` int(100) NOT NULL,
  `local_new_deaths` int(11) NOT NULL,
  `local_total_deaths` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `previous_data`
--

INSERT INTO `previous_data` (`update_time`, `local_new_cases`, `local_total_cases`, `local_recoverd`, `local_new_deaths`, `local_total_deaths`) VALUES
('2020-03-24 15:16:46', 3, 100, 2, 0, 0),
('2020-03-24 16:54:20', 4, 101, 2, 0, 0),
('2020-03-24 15:16:47', 2, 200, 23, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
