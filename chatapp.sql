-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 09:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(3, 517909762, 1129869524, 'hii'),
(4, 517909762, 1129869524, 'how are uu'),
(5, 1129869524, 517909762, 'i am fine '),
(6, 1129869524, 517909762, 'how are u'),
(7, 1095121161, 517909762, 'hello'),
(8, 1129869524, 1095121161, 'hii'),
(9, 1129869524, 1095121161, 'bolo😂😂😂'),
(13, 517909762, 1095121161, 'hii😍😊'),
(14, 1129869524, 1338449905, '😍😍 '),
(15, 517909762, 1129869524, 'are u free by evening ??');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `storyid` int(20) NOT NULL,
  `unique_id` int(20) NOT NULL,
  `caption` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`storyid`, `unique_id`, `caption`, `image`) VALUES
(4, 1129869524, '#fun', '1636816900IMG20200220163858.jpg'),
(5, 517909762, 'Good Morning!', '1637881517IMG_20201114_174146.jpg'),
(6, 1095121161, 'Good Morning!', '1638475477IMG20200221104729.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `phone` text NOT NULL,
  `state` text NOT NULL DEFAULT 'notverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `code`, `phone`, `state`) VALUES
(7, 1095121161, 'Ratandeep', 'Pandey', 'dipsrajssm@gmail.com', 'afe731e0213903febf1c9b803a8d7760', '1635024368IMG20200220163820.jpg', 'Offline now', 0, '9334509087', 'verified'),
(8, 517909762, 'Diwakar', 'Pandey', 'dipsraj435@gmail.com', 'bd93a1c9dcf0990c5c657e6fb801dc98', '1635024377IMG20200220183034.jpg', 'Offline now', 0, '7739465994', 'verified'),
(10, 1129869524, 'Pradeep', 'Pandey', 'namanrajssm@gmail.com', 'f1d5802e1cb64962d165f9252aafac27', '1635261296IMG_20201121_060004.jpg', 'Offline now', 0, '9771346808', 'verified'),
(17, 1338449905, 'Uttkarsh ', 'kumar', 'uttkarshkumar1510@gmail.com', '3cb49c871cd5d360c12b7b64a358ebff', '1636468752IMG20200219204044.jpg', 'Offline now', 0, '9060617316', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`storyid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `storyid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
