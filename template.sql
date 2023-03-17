-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2023 at 09:38 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` binary(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_password` varchar(100) NOT NULL,
  `default_password` varchar(50) NOT NULL,
  `user_update` binary(20) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `email`, `email_password`, `default_password`, `user_update`, `updated`) VALUES
(0x37393865323130632d633362382d313165642d61, 'TEST', 'mail.enotify@gmail.com', 'vccsndpqkofdfeiw', 'testtest', 0x31663937646434362d633330312d313165642d62, '2023-03-16 12:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` binary(20) NOT NULL,
  `login_id` binary(20) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `user_update` binary(20) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `login_id`, `picture`, `first_name`, `last_name`, `email`, `contact`, `user_update`, `updated`, `created`) VALUES
(0x31663938386565372d633330312d313165642d62, 0x31663937646434362d633330312d313165642d62, '4dd0aaf19d0fb19d2c4d53e27c3c7127.jpeg', 'administrator', '1234', 'test@test.com', '1234#1234', 0x31663937646434362d633330312d313165642d62, '2023-03-17 14:51:27', '2023-03-15 14:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` binary(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `change` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`, `level`, `change`, `status`, `updated`, `created`) VALUES
(0x31663937646434362d633330312d313165642d62, 'admin', '$2y$15$.IosuK.qUE0veQ/X0p0BJ.0HCk392GThXFooG.zn.o/Q41vZ4UiK2', 9, 1, 1, '2023-03-17 11:29:50', '2023-03-15 14:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
