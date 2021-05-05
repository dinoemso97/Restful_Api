-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 02:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restfulapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type_id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 1, 'Gaming Post One', 'Lorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum', 'Mark Mark', '2021-04-29 10:52:01'),
(2, 2, 'Technologies Post Two', 'Lorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,', 'John Johnson', '2021-04-29 10:52:01'),
(3, 1, 'Gaming Post Two', 'Lorem Ips\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum', 'John Johnson', '2021-04-29 10:53:23'),
(4, 3, 'Entertainment Post One', 'Lorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum,\r\nLorem Ipsum', 'Dino Emso', '2021-04-29 10:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `create_at`) VALUES
(2, 'Gaming', '2021-04-29 10:51:29'),
(3, 'Entertainment', '2021-04-29 10:51:55'),
(4, 'Auto', '2021-04-29 10:51:55'),
(5, 'Programming Post Two', '2021-04-29 13:36:01'),
(6, 'Updated Gaming Post One', '2021-04-29 13:40:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
