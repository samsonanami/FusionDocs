-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 01:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fusiondocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_state_city`
--

CREATE TABLE `country_state_city` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_state_city`
--

INSERT INTO `country_state_city` (`id`, `name`, `parent_id`) VALUES
(1, 'USA', 0),
(2, 'Canada', 0),
(3, 'Australia', 0),
(4, 'New York', 1),
(5, 'Alabama', 1),
(6, 'California', 1),
(7, 'Ontario', 2),
(8, 'British Columbia', 2),
(9, 'New South Wales', 3),
(10, 'Queensland', 3),
(11, 'New York city', 4),
(12, 'Buffalo', 4),
(13, 'Albany', 4),
(14, 'Birmingham', 5),
(15, 'Montgomery', 5),
(16, 'Huntsville', 5),
(17, 'Los Angeles', 6),
(18, 'San Francisco', 6),
(19, 'San Diego', 6),
(20, 'Toronto', 7),
(21, 'Ottawa', 7),
(22, 'Vancouver', 8),
(23, 'Victoria', 8),
(24, 'Sydney', 9),
(25, 'Newcastle', 9),
(26, 'City of Brisbane', 10),
(27, 'Gold Coast', 10);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1530974152),
('m130524_201442_init', 1530974162);

-- --------------------------------------------------------

--
-- Table structure for table `om_documents`
--

CREATE TABLE `om_documents` (
  `doc_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL,
  `short_title` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `categoty` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `doc_link` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_documents`
--

INSERT INTO `om_documents` (`doc_id`, `dir_id`, `short_title`, `title`, `categoty`, `type`, `keyword`, `note`, `created_by`, `doc_link`, `date_created`) VALUES
(7, 1, 'My firs Logo', 'Youth Fellowship Logo', 'Graphics', 'Graphics', 'Logo in poster', 'Logo Poster Youths document', 'samdoh', 'uploads/805280.My firs Logo.pdf', '2018-07-09 21:45:33'),
(8, 1, 'CRB Template', 'Kenya CRB Template 2018', 'Special', 'Word Document', 'Government CRB Credit', 'CRB document', 'samdoh', 'uploads/347817.CRB Template.docx', '2018-07-09 21:51:14'),
(9, 3, 'RECEIPT', 'COMPANY RECEIPT', 'Personal', 'word document', 'word company receipt', 'receipt', 'samdoh', 'uploads/398830.RECEIPT.pdf', '2018-07-09 21:55:04'),
(10, 4, 'MAP', 'LAND MAP', 'Communal', 'Word Document', 'communal land map', 'Map access', 'samdoh', 'uploads/597879.MAP.docx', '2018-07-09 21:57:03'),
(11, 4, 'DECLARATION ', 'POLICE DECLARATION FORM', 'Special', 'PDF', 'Declaration form', 'police declaration', 'samdoh', 'uploads/117759.DECLARATION .pdf', '2018-07-09 21:59:49'),
(12, 10, 'COMPELETION', 'LETTER OF COMPELETION', 'Special', 'PDF', 'Compeletion assurance', 'neccesary letter of completion', 'samdoh', 'uploads/795855.COMPELETION.pdf', '2018-07-09 22:02:57'),
(13, 4, 'BURSARY', 'COUNTY BURSARY', 'Special', 'PDF', 'NECCESARY BURSARY', 'BURSARY APPLICATION', 'samdoh', 'uploads/443614.BURSARY.pdf', '2018-07-09 22:04:51'),
(14, 1, 'games', 'Games review', 'Games', 'Graphics', 'Games', 'Documents with games list and events', 'samdoh', 'uploads/413001.games.docx', '2018-07-09 22:13:58'),
(15, 4, 'Document 9', 'Application for Title Deed', 'Important', 'Document', 'sam', 'I love this', 'admin', 'uploads/125267.Document 9.rtf', '2018-07-18 23:39:42'),
(16, 4, 'Document 9', 'Application for Title Deed', 'Important', 'Document', 'sam', 'Hello there', 'admin', 'uploads/943338.Document 9.rtf', '2018-07-19 00:44:19'),
(17, 4, 'Document 9', 'Application for Title Deed', '', '', '', '', 'admin', 'uploads/604409.Document 9.rtf', '2018-07-19 01:52:03'),
(18, 3, 'Document 9', 'Application for Title Deed', '', '', '', '', 'admin', 'uploads/246582.Document 9.png', '2018-07-19 02:00:48'),
(19, 14, 'Samson Nami Document', 'Curriculum Vitae', 'Important', 'Document', 'samson', 'Hello, I love this', 'admin', 'uploads/627325.Samson Nami Document.rtf', '2018-07-19 02:02:25'),
(20, 1, 'Samdoh Solutions Receipt', 'Receipt', 'Receipts', 'Document', 'samson', 'Hello', 'admin', 'uploads/177171.Samdoh Solutions Receipt.docx', '2018-07-19 02:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `om_document_category`
--

CREATE TABLE `om_document_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(200) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_document_category`
--

INSERT INTO `om_document_category` (`cat_id`, `cat_name`, `cat_desc`, `created_by`, `created_date`) VALUES
(1, 'ddsfdsdfsf', 'sfdfs', 'dsfsfs', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `om_document_type`
--

CREATE TABLE `om_document_type` (
  `type_id` int(11) NOT NULL,
  `type_no` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `type_desc` varchar(300) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `om_menu_items`
--

CREATE TABLE `om_menu_items` (
  `menu_id` int(11) NOT NULL,
  `menu_caption` varchar(50) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `om_user_logs`
--

CREATE TABLE `om_user_logs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `root` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` smallint(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_type` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `selected` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1',
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0',
  `child_allowed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `root`, `lft`, `rgt`, `lvl`, `name`, `icon`, `icon_type`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`, `child_allowed`) VALUES
(1, 1, 1, 28, 0, 'Samdoh', 'bell', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0),
(2, 1, 2, 3, 1, 'My Computer', '', 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0),
(3, 1, 4, 23, 1, '01: Office Files', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(4, 1, 5, 12, 2, '01: Sales Related', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(5, 1, 6, 11, 3, 'My New Test', 'folder', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 7, 10, 4, 'Samdoh', '', 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(7, 1, 8, 9, 5, 'My New Root', '', 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(8, 1, 24, 25, 1, 'Samdoh', 'folder', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(9, 1, 26, 27, 1, 'My Computer', 'bell', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(10, 1, 13, 22, 2, '02: Purchase Related', 'file', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(11, 1, 14, 17, 3, 'My New Root', 'mobile', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(12, 1, 18, 19, 3, '01: Office Files', 'folder', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(13, 1, 20, 21, 3, 'My New Root', 'file', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(14, 1, 15, 16, 4, '01: Office Files', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `root` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` smallint(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_type` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `selected` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1',
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0',
  `child_allowed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tr_directories`
--

CREATE TABLE `tr_directories` (
  `dir_id` int(11) NOT NULL,
  `dir_parent_id` int(11) NOT NULL,
  `dir_level` int(11) NOT NULL,
  `dir_name` varchar(300) NOT NULL,
  `dir_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dir_created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_directories`
--

INSERT INTO `tr_directories` (`dir_id`, `dir_parent_id`, `dir_level`, `dir_name`, `dir_date_created`, `dir_created_by`) VALUES
(1, 0, 1, 'My Documents', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 1, 'My Archived Documents', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 2, 'My Backup 2018', '2018-07-11 23:11:26', 'samdoh'),
(4, 1, 2, 'My Desktop Files', '2018-07-11 23:12:14', 'samdoh'),
(5, 1, 2, 'Office Documents', '2018-07-11 23:12:14', 'samdoh'),
(6, 2, 2, 'Old Documents', '2018-07-11 23:12:58', 'samdoh'),
(7, 3, 3, 'New Backup Folder', '2018-07-13 23:26:39', 'samdoh'),
(8, 7, 4, 'Another New Directory', '2018-07-14 11:30:02', 'samdoh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `image_link`) VALUES
(1, '', '', 'samdoh', 'mF9lnNjzjSgGbfGi7BmRQDTdE1Qt6pau', '$2y$13$Hg4ZZJ7Uc6niTNmQaDWifuL8E1gVk/ssaGihGL/8Ao.Ctcl2TfZdi', NULL, 'samsonanami@gmail.com', 10, 1530974253, 1530974253, ''),
(2, '', '', 'jebet', 'lfgTGnP_tOUyhdVmU_iti1lhPbexYqJU', '$2y$13$IaDSRsJp5BhwrKHWv/Rt9OJJ6gS4YalsTRensq8MyNuxmrCX.uhgy', NULL, 'jebet123@yahoo.com', 10, 1531053687, 1531053687, ''),
(3, '', '', 'admin', 'r4mq-cUduZo74SvSmtzXSHBWxcGVaRVy', '$2y$13$FgOo//xcSKo/oCZKvffZ8u29SsR1lxlGo5tNjzXu21znbbp7XLVa.', NULL, 'admin@samdohsol.com', 10, 1531856970, 1531856970, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_state_city`
--
ALTER TABLE `country_state_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `om_documents`
--
ALTER TABLE `om_documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `directory` (`dir_id`);

--
-- Indexes for table `om_document_category`
--
ALTER TABLE `om_document_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `om_document_type`
--
ALTER TABLE `om_document_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `om_menu_items`
--
ALTER TABLE `om_menu_items`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `om_user_logs`
--
ALTER TABLE `om_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_NK1` (`root`),
  ADD KEY `tbl_product_NK2` (`lft`),
  ADD KEY `tbl_product_NK3` (`rgt`),
  ADD KEY `tbl_product_NK4` (`lvl`),
  ADD KEY `tbl_product_NK5` (`active`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_NK1` (`root`),
  ADD KEY `tbl_product_NK2` (`lft`),
  ADD KEY `tbl_product_NK3` (`rgt`),
  ADD KEY `tbl_product_NK4` (`lvl`),
  ADD KEY `tbl_product_NK5` (`active`);

--
-- Indexes for table `tr_directories`
--
ALTER TABLE `tr_directories`
  ADD PRIMARY KEY (`dir_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_state_city`
--
ALTER TABLE `country_state_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `om_documents`
--
ALTER TABLE `om_documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `om_document_category`
--
ALTER TABLE `om_document_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `om_document_type`
--
ALTER TABLE `om_document_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `om_menu_items`
--
ALTER TABLE `om_menu_items`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `om_user_logs`
--
ALTER TABLE `om_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_directories`
--
ALTER TABLE `tr_directories`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;