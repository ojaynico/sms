-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2016 at 10:33 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `E_Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `ID` int(255) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `SUBJECT` varchar(5) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`ID`, `USER_NAME`, `FIRST_NAME`, `LAST_NAME`, `SUBJECT`, `PASSWORD`) VALUES
(2, 'sweadmin', 'SWE', 'Admin', 'SWE', 'adminforswe'),
(3, 'imsadmin', 'IMS', 'Admin', 'IMS', 'adminforims'),
(4, 'vfxadmin', 'VFX', 'Admin', 'VFX', 'adminforvfx');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(255) NOT NULL,
  `AUTHOR` varchar(50) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `SUBJECT` varchar(5) NOT NULL,
  `YEAR` int(10) NOT NULL,
  `FILE_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `AUTHOR`, `TITLE`, `SUBJECT`, `YEAR`, `FILE_NAME`) VALUES
(4, 'Nico', 'Java Language', 'SWE', 2, 'java_tutorialspoint.pdf'),
(5, 'Ojwee', 'C Language', 'SWE', 1, 'ctutor.pdf'),
(6, 'Alishan', 'C Sharp Lanuage', 'SWE', 3, 'csharp_tutorial.pdf'),
(7, 'Kampala', 'The City', 'SWE', 1, 'plsqltutorial.pdf'),
(8, 'gggvtyft7', 'ggtgtgt', 'SWE', 3, 'flipflop.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `SECOND_NAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `QUESTION` varchar(100) NOT NULL,
  `ANSWER` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USER_NAME`, `FIRST_NAME`, `SECOND_NAME`, `PASSWORD`, `QUESTION`, `ANSWER`) VALUES
(0, 'luwaga', 'Voneric', 'Luwaga', 'hair', 'Whats good', 'hair'),
(1, 'ojaynico', 'Nicodemus', 'Ojwee', 'nokia', 'What is your best food', 'Chicken'),
(2, 'css', 'php', 'java', '123', 'Where do u work', 'kampala'),
(3, 'LWASA_LAW', 'LWASAMPIJJA', 'LAWRENCE', 'password', 'HOW?', 'HOW?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
