-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 05:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psources`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `iv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `iv`) VALUES
(1, 'khushal', 'admin@gmail.com', 'admin', ''),
(2, 'smit', 'smit@gmail.com', 'smit', ''),
(3, 'miten', 'miten@gmail.com', 'miten', ''),
(4, 'yash', 'y@gmail.com', 'yash009', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(5) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `message`) VALUES
(1, 1, 'khushal', 'k@gmail.com', 'i love this resources'),
(2, 1, 'yash', 'kittu@gmail.com', 'yes'),
(3, 1, 'yash', 'kittu@gmail.com', 'yes'),
(4, 1, 'yash', 'kittu@gmail.com', 'yes'),
(5, 1, 'khushal', 'kittu@gmail.com', 'hello'),
(6, 1, 'khushal', 'kittu@gmail.com', 'hello'),
(7, 1, 'khushal', 'k@gmail.com', 'hello'),
(8, 1, 'parth', 'k@gmail.com', 'hii'),
(9, 1, 'Joshua Morgan', 'sabir@gmailcom', 'hey'),
(10, 1, 'Joshua Morgan', 'sabir@gmailcom', 'hey'),
(11, 1, 'Joshua Morgan', 'sabir@gmailcom', 'hey'),
(12, 1, 'khushal', 'sabir@gmailcom', 'hiii'),
(13, 1, 'khushal', 'sabir@gmailcom', 'hiii'),
(14, 1, 'khushal', 'sabir@gmailcom', 'qqq'),
(15, 1, 'khushal', 'kittu@gmail.com', 'q'),
(16, 1, 'yash', 'y@gmail.com', 'thank you'),
(17, 1, 'khushal', 'sabir@gmailcom', 'hy'),
(18, 1, 'khushal', 'kittu@gmail.com', 'ht');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `email`, `phone`, `birthdate`) VALUES
(1, 'Miten Jadvani', 'kittu@gmail.com', '9173391051', '2010-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `sources` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `name`, `language`, `type`, `sources`) VALUES
(18, 'boostrap cheetSheet', 'boostrap', 'cheetsheet', '../sources/boostrap_cs.pdf'),
(19, 'css cheetsheet', 'css', 'cheetsheet', '../sources/css_cs.pdf'),
(20, 'html cheetsheet', 'html', 'cheetsheet', '../sources/html_cs.pdf'),
(21, 'jquary-ajax cheetsheet', 'jquery-ajax', 'cheetsheet', '../sources/jquery-ajax_cs.pdf'),
(22, 'jQuery cheetsheet', 'jQuery', 'cheetsheet', '../sources/jQuery-cs.pdf'),
(23, 'java script cheetsheet', 'js', 'cheetsheet', '../sources/js_cs.pdf'),
(24, 'node & express cheetsheet', 'node and express js', 'cheetsheet', '../sources/Node and express js_cs.pdf'),
(25, 'nodeJs cheetsheet', 'NodeJs', 'cheetsheet', '../sources/node_cs.pdf'),
(26, 'ReactJs cheetsheet', 'ReactJs ', 'cheetsheet', '../sources/react_cs.pdf'),
(27, 'python cheetsheet', 'python', 'cheetsheet', '../sources/python_cs.pdf'),
(28, 'backend', 'Backend', 'road_map', '../sources/Backend roadmap.pdf'),
(29, 'Frontend', 'Frontend', 'road_map', '../sources/Frontend roadmap.pdf'),
(30, 'Sql', 'Sql', 'road_map', '../sources/sql.pdf'),
(31, 'Html Note', 'html', 'note', '../sources/HTML.pdf'),
(32, 'css Note', 'css', 'note', '../sources/CSS.pdf'),
(33, 'Js Note', 'JavaScript', 'note', '../sources/JavaScript.pdf'),
(34, 'c++ Note', 'c++', 'note', '../sources/c++.pdf'),
(35, 'ReactJs Note', 'ReactJs', 'note', '../sources/ReactJS.pdf'),
(36, 'NodeJs Note', 'NodeJs', 'note', '../sources/NodeJS.pdf'),
(37, 'Php Note', 'Php', 'note', '../sources/PHP.pdf'),
(38, 'jQuery Note', 'jQuery', 'note', '../sources/jQuery.pdf'),
(39, 'mongoDB Note', 'mongoDB', 'note', '../sources/MongoDB.pdf'),
(40, 'project suggestion', 'project_idea', 'project_idea', '../sources/project_suggestions.pdf'),
(41, 'project idea1', 'project_idea', 'project_idea', '../sources/projectIdea.pdf'),
(42, 'project ideas', 'project_idea', 'project_idea', '../sources/project_ideas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `iv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `iv`) VALUES
(1, 'khushal', 'freefireplayer149@gmail.com', '215o3cMyJxipwBk=', '85c28c274d4451831e3e58fd5137bac3'),
(2, 'smit', 's@gmail.com', 'pKwoZw==', 'ccd6e205eb8cc3af320641d51cd50d75'),
(3, 'miten', 'm@gmail.com', 'pKwoZw==', 'ccd6e205eb8cc3af320641d51cd50d75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
