-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 09:47 AM
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
-- Table structure for table `asset_brand`
--

CREATE TABLE `asset_brand` (
  `id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `reference` binary(20) DEFAULT NULL,
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_brand`
--

INSERT INTO `asset_brand` (`id`, `name`, `type`, `reference`, `user`, `status`, `updated`, `created`) VALUES
(0x31376261363463322d643866612d313165642d38, 'ThinkCentre E73z', 2, 0x38623133666635382d643865652d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 14:05:32', '2023-04-12 13:20:15'),
(0x33383837313233622d643866612d313165642d38, 'Inspiron 5402', 2, 0x62656335356433632d643866392d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 13:21:10'),
(0x38623133666635382d643865652d313165642d38, 'Lenovo', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 11:57:35'),
(0x62656335356433632d643866392d313165642d38, 'Dell', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 13:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `asset_checklist`
--

CREATE TABLE `asset_checklist` (
  `id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `reference` binary(20) DEFAULT NULL,
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_checklist`
--

INSERT INTO `asset_checklist` (`id`, `name`, `type`, `reference`, `user`, `status`, `updated`, `created`) VALUES
(0x30336635663866322d643930362d313165642d38, 'ทำความสะอาดเครื่องพิมพ์', 2, 0x37373837656266382d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 14:51:39', '2023-04-12 14:45:36'),
(0x30386262616364382d643930362d313165642d38, 'ทดสอบพิมพ์', 2, 0x37373837656266382d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 14:53:26', '2023-04-12 14:45:44'),
(0x30396236326561352d643930332d313165642d38, 'Power Supply', 2, 0x33616236636462302d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:24:17'),
(0x31303366653133372d643930332d313165642d38, 'Keyboard', 2, 0x33616236636462302d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:24:28'),
(0x31343362333034622d643930332d313165642d38, 'Mouse', 2, 0x33616236636462302d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:24:35'),
(0x32303933396338302d643930362d313165642d38, 'Disk Cleaner', 2, 0x38393864353861612d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:46:24'),
(0x32343031623739622d643930362d313165642d38, 'Temp Cleaner', 2, 0x38393864353861612d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:46:30'),
(0x32383065616539392d643930362d313165642d38, 'Recycle Bin Cleaner', 2, 0x38393864353861612d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:46:37'),
(0x32633662613137632d643930362d313165642d38, 'Memory Dump Cleaner', 2, 0x38393864353861612d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:46:44'),
(0x33616236636462302d643930322d313165642d38, 'รายการตรวจสอบอุปกรณ์', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:18:30'),
(0x37303865323234362d643930322d313165642d38, 'รายการตรวจสอบเครื่องสำรองไฟ', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:20:00'),
(0x37373837656266382d643930322d313165642d38, 'รายการตรวจสอบเครื่องพิมพ์', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:20:12'),
(0x38393864353861612d643930322d313165642d38, 'รายการตรวจสอบการทำความสะอาด', 1, 0x0000000000000000000000000000000000000000, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:20:42'),
(0x66396566336163642d643930352d313165642d38, 'ทำความสะอาดเครื่องสำรองไฟ', 2, 0x37303865323234362d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 14:52:11', '2023-04-12 14:45:19'),
(0x66623361346437632d643930322d313165642d38, 'Storage (HDD/SDD)', 2, 0x33616236636462302d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:23:53'),
(0x66653163363830392d643930352d313165642d38, 'ทดสอบเครื่องสำรองไฟ', 2, 0x37303865323234362d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 14:51:54', '2023-04-12 14:45:26'),
(0x66663938323831352d643930322d313165642d38, 'RAM', 2, 0x33616236636462302d643930322d313165642d38, 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 14:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `asset_location`
--

CREATE TABLE `asset_location` (
  `id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_location`
--

INSERT INTO `asset_location` (`id`, `name`, `user`, `status`, `updated`, `created`) VALUES
(0x34623061306335642d643865322d313165642d38, 'ฝ่ายคอมพิวเตอร์', 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 10:32:21', '2023-04-12 10:29:53'),
(0x34653531303231342d643865322d313165642d38, 'ฝ่ายบุคคล', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 10:29:59'),
(0x35313434343430352d643865322d313165642d38, 'ฝ่ายบัญชี', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 10:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `asset_software`
--

CREATE TABLE `asset_software` (
  `id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_software`
--

INSERT INTO `asset_software` (`id`, `name`, `user`, `status`, `updated`, `created`) VALUES
(0x32353839313964312d643865362d313165642d38, 'Windows 11 Pro 64 Bit', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 10:57:28'),
(0x34633834626563382d643865362d313165642d38, 'Microsoft 365', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 10:58:34'),
(0x61656430313465392d643865362d313165642d38, 'Eset Endpoint Antivirus', 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 11:02:09', '2023-04-12 11:01:19'),
(0x66656365666638302d643865352d313165642d38, 'Windows 10 Pro 64 Bit', 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 11:01:02', '2023-04-12 10:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `asset_type`
--

CREATE TABLE `asset_type` (
  `id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `checklist` varchar(100) NOT NULL,
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_type`
--

INSERT INTO `asset_type` (`id`, `name`, `checklist`, `user`, `status`, `updated`, `created`) VALUES
(0x31323730393136392d646439662d313165642d62, 'testtest', '3ab6cdb0-d902-11ed-8,708e2246-d902-11ed-8,898d58aa-d902-11ed-8', 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:11:19'),
(0x32373034396661372d643865322d313165642d38, 'เครื่องพิมพ์ (Printer)', '', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 10:28:53'),
(0x36346436393032632d643864362d313165642d38, 'เครื่องคอมพิวเตอร์ (Computer)', '', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 09:04:42'),
(0x39346234306633352d643864382d313165642d38, 'เครื่องคอมพิวเตอร์พกพา (Notebook)', '', 0x31663937646434362d633330312d313165642d62, 1, '2023-04-12 10:04:24', '2023-04-12 09:20:22'),
(0x39636130343165302d643864382d313165642d38, 'เครื่องสำรองไฟ (UPS)', '', 0x31663937646434362d633330312d313165642d62, 1, NULL, '2023-04-12 09:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `asset_type_item`
--

CREATE TABLE `asset_type_item` (
  `id` binary(20) NOT NULL,
  `type_id` binary(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `text` text,
  `required` int(1) NOT NULL DEFAULT '1',
  `user` binary(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_type_item`
--

INSERT INTO `asset_type_item` (`id`, `type_id`, `name`, `type`, `text`, `required`, `user`, `status`, `updated`, `created`) VALUES
(0x31323731336361302d646439662d313165642d62, 0x31323730393136392d646439662d313165642d62, 'AAAAA', 1, '', 1, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:11:19'),
(0x31323731623562372d646439662d313165642d62, 0x31323730393136392d646439662d313165642d62, 'BBBBB', 2, '', 1, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:11:19'),
(0x31323731666137642d646439662d313165642d62, 0x31323730393136392d646439662d313165642d62, 'CCCCC', 3, '11111,22222', 2, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:11:19'),
(0x31633137326530322d646461352d313165642d62, 0x31323730393136392d646439662d313165642d62, 'DDDDD', 1, '', 1, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:54:32'),
(0x31633137363564342d646461352d313165642d62, 0x31323730393136392d646439662d313165642d62, 'EEEEE', 4, '', 3, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:54:32'),
(0x31633137393732322d646461352d313165642d62, 0x31323730393136392d646439662d313165642d62, 'FFFFF', 3, '88888,99999', 2, 0x31663937646434362d633330312d313165642d62, 1, '2023-04-21 16:45:55', '2023-04-18 11:54:32');

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
  `user` binary(20) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `email`, `email_password`, `default_password`, `user`, `updated`) VALUES
(0x37393865323130632d633362382d313165642d61, 'Demo', 'mail.enotify@gmail.com', 'vccsndpqkofdfeiw', 'testtest', 0x31663937646434362d633330312d313165642d62, '2023-03-31 11:52:04');

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
  `user` binary(20) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `login_id`, `picture`, `first_name`, `last_name`, `email`, `contact`, `user`, `updated`, `created`) VALUES
(0x31663938386565372d633330312d313165642d62, 0x31663937646434362d633330312d313165642d62, '4dd0aaf19d0fb19d2c4d53e27c3c7127.jpeg', 'admin', 'test', 'admin@test.com', '', 0x31663937646434362d633330312d313165642d62, '2023-03-31 13:36:33', '2023-03-15 14:15:09'),
(0x33653633393537332d636638652d313165642d62, 0x33653633303836312d636638652d313165642d62, NULL, 'user', 'test', 'user@test.com', '', 0x31663937646434362d633330312d313165642d62, '2023-04-11 14:34:01', '2023-03-31 13:35:34');

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
(0x31663937646434362d633330312d313165642d62, 'admin', '$2y$15$RmF7WxnFpl3cOrtq/ABmue4L6AM4XWgCNDaB00Nyt34luV1PrXNBm', 9, 1, 1, '2023-04-11 14:03:01', '2023-03-15 14:15:09'),
(0x33653633303836312d636638652d313165642d62, 'user', '$2y$15$UQXUt3XVJXxL8qbqZLip7eRL3JWz6clPau/DXEYzE3.DDFJr1z/ra', 1, 1, 1, '2023-04-11 14:34:01', '2023-03-31 13:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_brand`
--
ALTER TABLE `asset_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `asset_checklist`
--
ALTER TABLE `asset_checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `asset_location`
--
ALTER TABLE `asset_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `asset_software`
--
ALTER TABLE `asset_software`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `asset_type`
--
ALTER TABLE `asset_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `asset_type_item`
--
ALTER TABLE `asset_type_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `login_id` (`login_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
