-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 10:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--
CREATE DATABASE IF NOT EXISTS `website` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `website`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `permissions` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login`, `password`, `permissions`) VALUES
('admin', '$2y$10$5JaWgB2EQRIXcTmAcxP0Y.u.8Q66rLf91MSpuKGhWYfAklHyQOVMK', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `identifier` int(11) NOT NULL,
  `postdate` text NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `preview` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`identifier`, `postdate`, `title`, `content`, `tags`, `preview`) VALUES
(1, 'test', 'test', 'test', 'none', 1),
(2, '10th October 2022', 'Images now work', 'After some more work, I found a way to attach locally stored images to posts! <br>\r\n<img src=\"./img/buttons/g3series.jpg\"><br>', 'none', 0),
(3, '28th November 2022', 'Post Name', 'Post Content goes here', 'none', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `login` (`login`) USING HASH;

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
