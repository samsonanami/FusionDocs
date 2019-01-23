-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 05:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trans`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 4, NULL),
('create-customer', 4, '2018-11-03 16:49:51'),
('create-directory', 1, '2018-11-03 14:52:40'),
('create-directory', 2, '2018-11-03 15:09:07'),
('create-directory', 4, '2018-11-03 16:49:52'),
('create-document', 1, '2018-11-03 14:53:31'),
('create-document', 4, '2018-11-03 16:49:52'),
('create-document-category', 1, '2018-11-03 14:53:31'),
('create-document-category', 2, '2018-11-03 15:10:00'),
('create-document-category', 4, '2018-11-03 16:49:52'),
('create-user', 1, '2018-10-21 12:54:02'),
('create-user', 4, '2018-10-21 12:39:08'),
('create-user', 6, '2018-11-03 14:54:25'),
('view-admin-dashboard', 4, '2018-11-03 15:42:16'),
('view-appraisal-one', 4, '2018-11-05 22:55:58'),
('view-appraisal-two', 4, '2018-11-05 22:55:59'),
('view-dashboard', 4, '2018-11-03 13:40:42'),
('view-dashboard', 6, '2018-11-03 14:54:25'),
('view-loans', 4, '2018-11-03 16:49:52'),
('view-users', 4, '2018-11-03 16:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 2, 'admin rights', '', '', NULL, NULL),
('create-customer', 0, 'Can create customer', NULL, NULL, '2018-11-03 16:47:01', '2018-11-03 16:47:01'),
('create-directory', 1, 'create new directory', NULL, NULL, NULL, NULL),
('create-document', 1, 'create a new document', NULL, NULL, NULL, NULL),
('create-document-category', 1, 'create a new document category', NULL, NULL, NULL, NULL),
('create-user', 1, 'create new user', NULL, NULL, NULL, NULL),
('view-admin-dashboard', 0, 'Can view admin dashboard', NULL, NULL, '2018-11-03 15:39:43', '2018-11-03 15:39:43'),
('view-appraisal-one', 1, 'Can view first appraisal level loans', NULL, '', '2018-11-05 22:37:07', '2018-11-05 22:37:07'),
('view-appraisal-two', 2, 'Can view second loan appraisal level', NULL, '', '2018-11-05 22:38:30', '2018-11-05 22:38:30'),
('view-dashboard', 1, 'view main dashboad', NULL, NULL, '2018-11-03 13:39:28', '2018-11-03 13:39:28'),
('view-loans', 0, 'Can view loans', NULL, NULL, '2018-11-03 16:46:30', '2018-11-03 16:46:30'),
('view-loans-reports', 1, 'Can view Loans reports', '', '', '2018-11-05 16:31:58', '2018-11-05 16:31:58'),
('view-users', 2, 'view all users', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-directory'),
('admin', 'create-document'),
('admin', 'create-document-category'),
('admin', 'create-user'),
('admin', 'view-users');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('rules', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collateral`
--

CREATE TABLE `collateral` (
  `col_id` int(11) NOT NULL,
  `col_ln_id` int(11) NOT NULL,
  `col_files_id` int(11) NOT NULL,
  `col_description` text NOT NULL,
  `col_name` varchar(50) NOT NULL,
  `col_value` decimal(11,2) NOT NULL,
  `col_loan_to_value_ratio` decimal(11,2) NOT NULL,
  `col_status` enum('Deposited into Branch','Colleteral with Borrower','Sold','Lost') NOT NULL,
  `col_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `col_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_address` text NOT NULL,
  `com_phone` varchar(50) NOT NULL,
  `com_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`, `com_address`, `com_phone`, `com_email`) VALUES
(1, 'INVESTOBRAIN SACCO SOCIETY LTD', '321-20100 NAIROBI', '+25487545554', 'company@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ACCOUNT_NO` int(11) NOT NULL,
  `FIRST_NAME` varchar(10) NOT NULL,
  `LAST_NAME` varchar(10) NOT NULL,
  `ln_account_name` varchar(300) NOT NULL,
  `GENDER` enum('Male','Female','','') DEFAULT NULL,
  `COUNTRY` varchar(20) DEFAULT NULL,
  `TITLE` varchar(5) DEFAULT NULL,
  `MOBILE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `UNIQUE_NO` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `ADDRESS` varchar(30) DEFAULT NULL,
  `CITY` varchar(20) DEFAULT NULL,
  `PROVINCE_STATE` varchar(20) DEFAULT NULL,
  `ZIPCODE` varchar(10) DEFAULT NULL,
  `LANDINE_PHONE` varchar(20) DEFAULT NULL,
  `BUSINESS_NAME` varchar(60) DEFAULT NULL,
  `WORKING_STATUS` enum('','Employee','Owner','Student','Overseas Worker') DEFAULT NULL,
  `DESCRIPTION` varchar(60) DEFAULT NULL,
  `STAFF_ACCESS` varchar(20) DEFAULT NULL,
  `logo` varchar(200) DEFAULT 'uploads/customers/default.jpg',
  `files` varchar(200) DEFAULT 'uploads/files/default.jpg',
  `cust_id_no` varchar(20) NOT NULL,
  `cust_kra_pin` varchar(20) DEFAULT NULL,
  `cust_grp_id` int(11) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `cust_account_type` enum('Member','Shareholder','Group','') NOT NULL,
  `cust_active` tinyint(1) DEFAULT NULL,
  `cust_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `sourse_of_income` varchar(45) DEFAULT NULL,
  `nxt_of_king_name` varchar(45) DEFAULT NULL,
  `nxt_of_king_id` varchar(45) DEFAULT NULL,
  `nxt_of_king_rel` varchar(45) DEFAULT NULL,
  `nxt_of_king_phone` varchar(45) DEFAULT NULL,
  `nxt_of_king_email` varchar(45) DEFAULT NULL,
  `emp_name` varchar(45) DEFAULT NULL,
  `emp_designation` varchar(45) DEFAULT NULL,
  `emp_department` varchar(45) DEFAULT NULL,
  `emp_occupation` varchar(45) DEFAULT NULL,
  `emp_email` varchar(45) DEFAULT NULL,
  `emp_address` varchar(45) DEFAULT NULL,
  `emp_income` varchar(45) DEFAULT NULL,
  `emp_director_name` varchar(45) DEFAULT NULL,
  `emp_mobile_no` varchar(45) DEFAULT NULL,
  `emp_office_no` varchar(45) DEFAULT NULL,
  `referee_name` varchar(45) DEFAULT NULL,
  `referee_phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ACCOUNT_NO`, `FIRST_NAME`, `LAST_NAME`, `ln_account_name`, `GENDER`, `COUNTRY`, `TITLE`, `MOBILE`, `EMAIL`, `UNIQUE_NO`, `DOB`, `ADDRESS`, `CITY`, `PROVINCE_STATE`, `ZIPCODE`, `LANDINE_PHONE`, `BUSINESS_NAME`, `WORKING_STATUS`, `DESCRIPTION`, `STAFF_ACCESS`, `logo`, `files`, `cust_id_no`, `cust_kra_pin`, `cust_grp_id`, `image`, `cust_account_type`, `cust_active`, `cust_created_at`, `sourse_of_income`, `nxt_of_king_name`, `nxt_of_king_id`, `nxt_of_king_rel`, `nxt_of_king_phone`, `nxt_of_king_email`, `emp_name`, `emp_designation`, `emp_department`, `emp_occupation`, `emp_email`, `emp_address`, `emp_income`, `emp_director_name`, `emp_mobile_no`, `emp_office_no`, `referee_name`, `referee_phone`) VALUES
(1, 'ABEL', 'MOKAYA', 'ABEL MOKAYA', 'Male', 'KENYA', 'Mr.', '745124452', 'TITUSM@YAHOO.COM', 'IBM1605072', NULL, '2016 Nairobi', 'Nairobi', 'NAIROBI', '254', 'N/A', 'N/A', 'Employee', '', 'admin', 'uploads/customers/436046MUTHANGYA.jpeg', 'uploads/files/default.jpg', '1', 'A2121555060X', NULL, NULL, 'Member', 0, '2018-05-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'AGNES', 'KEMUNTO NY', 'AGNES KEMUNTO NYAKUNDI', 'Male', 'KENYA', 'MR.', '745124453', 'bkurgat@gmail.com', 'IBM1807162', NULL, 'P O BOX 123', 'NAIROBI', 'NAIROBI', '254', '11111111', 'Fusion Solutions', 'Employee', '', 'admin', 'uploads/customers/725920KUGART.jpeg', 'uploads/files/default.jpg', '2', 'A0215425478X', NULL, NULL, 'Member', 0, '2018-05-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'AKISE', 'NYAMBURA', 'AKISE NYAMBURA', 'Male', 'KENYA', 'MR.', '745124454', 'ERUSTUS@GMAIL.COM', 'IBS1508020', NULL, '2016 Nairobi', 'Nairobi', 'NAIROBI', '254', '11111112', 'N/A', 'Employee', '', 'admin', 'uploads/customers/400625MUTEMI.jpeg', 'uploads/files/default.jpg', '3', 'A0215425475X', NULL, NULL, 'Member', 0, '2018-05-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'ALBERT', 'MAGANGA', 'ALBERT MAGANGA', 'Male', 'KENYA', 'DR.', '745124455', 'DRJOHN.MAINA@YAHOO.COM', 'IBM1608090', NULL, '', 'KENYA', 'NAIROBI', '254', '11111113', 'YOUNG INVESTORS', 'Overseas Worker', '', 'admin', 'uploads/customers/294919MAINA.jpeg', 'uploads/files/default.jpg', '4', 'A0215454706X', NULL, NULL, 'Member', 0, '2018-05-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ALBERT', 'OCHIENG\'', 'ALBERT OCHIENG\'', 'Female', 'KENYA', 'MRS.', '745124456', 'MERCYB@YAHOO.COM', 'IBS1507015', NULL, '123 NAIROBI', 'NAIROBI', 'NAIROBI', '254', '11111114', 'DIVERS HAIR SALON', 'Owner', '', 'admin', 'uploads/customers/247479BETHWEL.jpg', 'uploads/files/default.jpg', '5', 'A0215425478Z', NULL, NULL, 'Member', 0, '2018-05-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'ALEX', 'MKOYO SIDI', 'ALEX MKOYO SIDIYU', 'Male', 'KENYA', 'DR.', '745124457', 'DRJOHN.MAINA@YAHOO.COM', 'IBS1511038', NULL, '', 'KENYA', 'NAIROBI', '254', '11111115', 'YOUNG INVESTORS', 'Employee', '', 'admin', 'uploads/customers/623269MAINA.jpg', 'uploads/files/default.jpg', '6', 'A0215425489Y', NULL, NULL, 'Member', 0, '2018-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'ALFRED', 'OKOTH', 'ALFRED OKOTH', 'Female', 'KENYA', 'MSS.', '745124458', 'M.KIMANY02@GMAIL.COM', 'IBS1508023', NULL, '542154', 'NAKURU', 'NAIROBI', '254', '11111116', 'YOUNG INVESTORS', 'Owner', '', 'admin', 'uploads/customers/595726KIMANI.jpeg', 'uploads/files/default.jpg', '7', 'A0215425478B', 1, NULL, 'Member', 0, '2018-05-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ALICE', 'BOSIBORI', 'ALICE BOSIBORI', 'Female', 'KENYA', 'MRS.', '745124459', 'N/A', 'IBM1601058', NULL, '5645', 'NAIROBI', 'NAIROBI', '254', '11111117', 'N/A', 'Employee', '', 'admin', 'uploads/customers/382166AKOTH.jpeg', 'uploads/files/default.jpg', '8', 'A0002154215X', NULL, NULL, 'Member', 0, '2018-05-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'ALPHONCE', 'ONYANGO MA', 'ALPHONCE ONYANGO MARAGA', 'Male', 'KENYA', 'Mss.', '745124460', 'Joanjj@yahoo.com', 'IBS1504004', NULL, 'Nairobi', '', 'NAIROBI', '254', '11111118', '', 'Employee', '', 'admin', 'uploads/customers/637965Lian.jpg', 'uploads/files/default.jpg', '9', 'A6865573777G', 1, NULL, 'Member', 0, '2018-05-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'ANDREW', 'GROHNEY OD', 'ANDREW GROHNEY ODONDI', 'Male', 'KENYA', 'Mr.', '745124461', '', 'IBS1504001', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111119', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '10', 'A011111111110', 0, '', 'Member', 0, '2018-05-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'ANNAH', 'MACHUKI', 'ANNAH MACHUKI', 'Male', 'KENYA', 'Mr.', '745124462', '', 'IBM1603060', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111120', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '11', 'A011111111111', 0, '', 'Member', 0, '2018-05-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'ASENATH', 'ROGITO', 'ASENATH ROGITO', 'Male', 'KENYA', 'Mr.', '745124463', '', 'IBM1707131', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111121', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '12', 'A011111111112', 0, '', 'Member', 0, '2018-05-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'ASMAN', 'CHIMBA OMA', 'ASMAN CHIMBA OMARI', 'Male', 'KENYA', 'Mr.', '745124464', '', 'IBM1802141', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111122', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '13', '4', 0, '', 'Member', 0, '2018-05-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'AUGUSTINE', 'MOMANYI', 'AUGUSTINE MOMANYI', 'Male', 'KENYA', 'Mr.', '745124465', '', 'IBM1802140', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111123', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '14', '5', 0, '', 'Member', 0, '2018-05-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'BAZIL', 'NDEGE', 'BAZIL NDEGE', 'Male', 'KENYA', 'Mr.', '745124466', '', 'IBM1601057', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111124', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '15', '6', 0, '', 'Member', 0, '2018-05-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'BENARD', 'ODUOR OWUO', 'BENARD ODUOR OWUOR', 'Male', 'KENYA', 'Mr.', '745124467', '', 'IBS1508024', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111125', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '16', '7', 0, '', 'Member', 0, '2018-05-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'BENARD', 'WANJIRI', 'BENARD WANJIRI', 'Male', 'KENYA', 'Mr.', '745124468', '', 'IBM1604065', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111126', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '17', '8', 0, '', 'Member', 0, '2018-05-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'BENTER', 'OTIENO', 'BENTER OTIENO', 'Male', 'KENYA', 'Mr.', '745124469', '', 'IBM1707132', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111127', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '18', '9', 0, '', 'Member', 0, '2018-05-22 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'BERNARD', 'OMBUI', 'BERNARD OMBUI', 'Male', 'KENYA', 'Mr.', '745124470', '', 'IBM1802138', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111128', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '19', '10', 0, '', 'Member', 0, '2018-05-23 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'BETHER', 'AWUOR', 'BETHER AWUOR', 'Male', 'KENYA', 'Mr.', '745124471', '', 'IBS1507014', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111129', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '20', '11', 0, '', 'Member', 0, '2018-05-24 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'BILLY', 'GRAHAM ONY', 'BILLY GRAHAM ONYURO', 'Male', 'KENYA', 'Mr.', '745124472', '', 'IBS1504002', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111130', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '21', '12', 0, '', 'Member', 0, '2018-05-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'BROTHERS', 'WELFARE AS', 'BROTHERS WELFARE ASSOCIATION', 'Male', 'KENYA', 'Mr.', '745124473', '', 'IBM1707133', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111131', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '22', '13', 0, '', 'Group', 0, '2018-05-26 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'CALEB', 'OLOO', 'CALEB OLOO', 'Male', 'KENYA', 'Mr.', '745124474', '', 'IBM1609092', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111132', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '23', '14', 0, '', 'Member', 0, '2018-05-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'CALVIN', 'ONYANGO', 'CALVIN ONYANGO', 'Male', 'KENYA', 'Mr.', '745124475', '', 'IBM1607083', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111133', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '24', '15', 0, '', 'Member', 0, '2018-05-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'CAREN', 'OUTA', 'CAREN OUTA', 'Male', 'KENYA', 'Mr.', '745124476', '', 'IBM1705121', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111134', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '25', '16', 0, '', 'Member', 0, '2018-05-29 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'CODECK', 'OTARA', 'CODECK OTARA', 'Male', 'KENYA', 'Mr.', '745124477', '', 'IBM1706126', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111135', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '26', '17', 0, '', 'Member', 0, '2018-05-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'COLLINS', 'ODHIAMBO', 'COLLINS ODHIAMBO', 'Male', 'KENYA', 'Mr.', '745124478', '', 'IBS1504005', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111136', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '27', '18', 0, '', 'Member', 0, '2018-05-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'DANIEL', 'ALFAYO', 'DANIEL ALFAYO', 'Male', 'KENYA', 'Mr.', '745124479', '', 'IBM1704114', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111137', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '28', '19', 0, '', 'Member', 0, '2018-06-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'DANIEL', 'ANJONGO', 'DANIEL ANJONGO', 'Male', 'KENYA', 'Mr.', '745124480', '', 'IBM1802139', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111138', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '29', '20', 0, '', 'Member', 0, '2018-06-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'DANIEL', 'OCHIENG\'', 'DANIEL OCHIENG\'', 'Male', 'KENYA', 'Mr.', '745124481', '', 'IBM1803146', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111139', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '30', '21', 0, '', 'Member', 0, '2018-06-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'DAVID', 'ADIPO', 'DAVID ADIPO', 'Male', 'KENYA', 'Mr.', '745124482', '', 'IBM1508022', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111140', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '31', '22', 0, '', 'Member', 0, '2018-06-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'DAVID', 'AGUTU', 'DAVID AGUTU', 'Male', 'KENYA', 'Mr.', '745124483', '', 'IBM1604067', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111141', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '32', '23', 0, '', 'Member', 0, '2018-06-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'DICTION', 'NYANUMBA', 'DICTION NYANUMBA', 'Male', 'KENYA', 'Mr.', '745124484', '', 'IBM1609098', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111142', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '33', '24', 0, '', 'Member', 0, '2018-06-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'DISMAS', 'NYABERA', 'DISMAS NYABERA', 'Male', 'KENYA', 'Mr.', '745124485', '', 'IBM1706124', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111143', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '34', '25', 0, '', 'Member', 0, '2018-06-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'DUNCAN', 'ODERO OGAD', 'DUNCAN ODERO OGADA', 'Male', 'KENYA', 'Mr.', '745124486', '', 'IBS1511039', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111144', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '35', '26', 0, '', 'Member', 0, '2018-06-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'EDINA', 'MATINDE', 'EDINA MATINDE', 'Male', 'KENYA', 'Mr.', '745124487', '', 'IBM1611103', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111145', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '36', '27', 0, '', 'Member', 0, '2018-06-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'EDNA', 'WABOMBA', 'EDNA WABOMBA', 'Male', 'KENYA', 'Mr.', '745124488', '', 'IBM1609096', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111146', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '37', '28', 0, '', 'Member', 0, '2018-06-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'ELKANAH', 'NYAKUNDI', 'ELKANAH NYAKUNDI', 'Male', 'KENYA', 'Mr.', '745124489', '', 'IBM1611101', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111147', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '38', '29', 0, '', 'Member', 0, '2018-06-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'ELLY', 'ONYURO', 'ELLY ONYURO', 'Male', 'KENYA', 'Mr.', '745124490', '', 'IBS1508021', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111148', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '39', '30', 0, '', 'Member', 0, '2018-05-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'EMILY', 'NYABATE', 'EMILY NYABATE', 'Male', 'KENYA', 'Mr.', '745124491', '', 'IBM1704116', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111149', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '40', '31', 0, '', 'Member', 0, '2018-05-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'ENOCH', 'OKENGO\' SE', 'ENOCH OKENGO\' SEGERO', 'Male', 'KENYA', 'Mr.', '745124492', '', 'IBS1508025', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111150', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '41', '32', 0, '', 'Member', 0, '2018-05-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'EUCABETH', 'KWASU', 'EUCABETH KWASU', 'Male', 'KENYA', 'Mr.', '745124493', '', 'IBM1706123', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111151', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '42', '33', 0, '', 'Member', 0, '2018-05-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'EUNICE', 'ADIEL', 'EUNICE ADIEL', 'Male', 'KENYA', 'Mr.', '745124494', '', 'IBS1511037', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111152', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '43', '34', 0, '', 'Member', 0, '2018-05-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'EUNICE', 'MORAA OKEL', 'EUNICE MORAA OKELLO', 'Male', 'KENYA', 'Mr.', '745124495', '', 'IBM1702108', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111153', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '44', '35', 0, '', 'Member', 0, '2018-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'EVANS', 'MUKOYA ANY', 'EVANS MUKOYA ANYANGA', 'Male', 'KENYA', 'Mr.', '745124496', '', 'IBS15100031', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111154', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '45', '36', 0, '', 'Member', 0, '2018-05-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'EVANS', 'WAMWALO', 'EVANS WAMWALO', 'Male', 'KENYA', 'Mr.', '745124497', '', 'IBM1511042', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111155', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '46', '37', 0, '', 'Member', 0, '2018-05-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'EVERLYNE', 'OTARA', 'EVERLYNE OTARA', 'Male', 'KENYA', 'Mr.', '745124498', '', 'IBS1601052', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111156', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '47', '38', 0, '', 'Member', 0, '2018-05-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'FELIX', 'ODHIAMBO O', 'FELIX ODHIAMBO OLUOCH', 'Male', 'KENYA', 'Mr.', '745124499', '', 'IBM1511033', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111157', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '48', '39', 0, '', 'Member', 0, '2018-05-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'FIDEL', 'OWUOR', 'FIDEL OWUOR', 'Male', 'KENYA', 'Mr.', '745124500', '', 'IBS1504009', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111158', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '49', '40', 0, '', 'Member', 0, '2018-05-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'FRANCIS', 'ODAWA', 'FRANCIS ODAWA', 'Male', 'KENYA', 'Mr.', '745124501', '', 'IBM1603062', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111159', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '50', '41', 0, '', 'Member', 0, '2018-05-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'FREDRIC', 'OGENCHE', 'FREDRIC OGENCHE', 'Male', 'KENYA', 'Mr.', '745124502', '', 'IBM1806159', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111160', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '51', '42', 0, '', 'Member', 0, '2018-05-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'FREDRICK', 'OTIENO ODH', 'FREDRICK OTIENO ODHIAMBO', 'Male', 'KENYA', 'Mr.', '745124503', '', 'IBM1808170', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111161', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '52', '43', 0, '', 'Member', 0, '2018-05-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'FREDRICK', 'SOLO', 'FREDRICK SOLO', 'Male', 'KENYA', 'Mr.', '745124504', '', 'IBM1808168', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111162', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '53', '44', 0, '', 'Member', 0, '2018-05-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'GABRIEL', 'ONGESO ODU', 'GABRIEL ONGESO ODUOR', 'Male', 'KENYA', 'Mr.', '745124505', '', 'IBS1509028', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111163', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '54', '45', 0, '', 'Member', 0, '2018-05-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'GEOFFREY', 'MAKOYO', 'GEOFFREY MAKOYO ', 'Male', 'KENYA', 'Mr.', '745124506', '', 'IBM1806157', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111164', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '55', '46', 0, '', 'Member', 0, '2018-05-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'GEOFFREY', 'OTIENO', 'GEOFFREY OTIENO', 'Male', 'KENYA', 'Mr.', '745124507', '', 'IBM1802142', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111165', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '56', '47', 0, '', 'Member', 0, '2018-05-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'GEOFFREY', 'OYORI', 'GEOFFREY OYORI', 'Male', 'KENYA', 'Mr.', '745124508', '', 'IBM1605078', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111166', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '57', '48', 0, '', 'Member', 0, '2018-05-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'GEOPHREY', 'ANJONGO', 'GEOPHREY ANJONGO', 'Male', 'KENYA', 'Mr.', '745124509', '', 'IBM1803144', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111167', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '58', '49', 0, '', 'Member', 0, '2018-05-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'GEORGE', 'KINARO', 'GEORGE KINARO', 'Male', 'KENYA', 'Mr.', '745124510', '', 'IBM1511041', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111168', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '59', '50', 0, '', 'Member', 0, '2018-05-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'GEORGE', 'ODHIAMBO O', 'GEORGE ODHIAMBO OJUNGA', 'Male', 'KENYA', 'Mr.', '745124511', '', 'IBM1511034', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111169', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '60', '51', 0, '', 'Member', 0, '2018-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'GEORGE', 'OMBUI', 'GEORGE OMBUI', 'Male', 'KENYA', 'Mr.', '745124512', '', 'IBM1609094', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111170', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '61', '52', 0, '', 'Member', 0, '2018-05-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'GLADYS', 'CHOI', 'GLADYS CHOI', 'Male', 'KENYA', 'Mr.', '745124513', '', 'IBM1611100', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111171', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '62', '53', 0, '', 'Member', 0, '2018-05-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'GLADYS', 'OGACHI', 'GLADYS OGACHI', 'Male', 'KENYA', 'Mr.', '745124514', '', 'IBM1607085', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111172', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '63', '54', 0, '', 'Member', 0, '2018-05-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'GLADYS', 'ONDIEKI', 'GLADYS ONDIEKI', 'Male', 'KENYA', 'Mr.', '745124515', '', 'IBM1704110', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111173', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '64', '55', 0, '', 'Member', 0, '2018-05-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'GORDON', 'OTIENO', 'GORDON OTIENO', 'Male', 'KENYA', 'Mr.', '745124516', '', 'IBM1707135', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111174', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '65', '56', 0, '', 'Member', 0, '2018-05-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'GRACE', 'ATIENO KWA', 'GRACE ATIENO KWASU', 'Male', 'KENYA', 'Mr.', '745124517', '', 'IBS1509030', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111175', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '66', '57', 0, '', 'Member', 0, '2018-05-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'GREEN', 'RIVER SELF', 'GREEN RIVER SELF HELP GROUP', 'Male', 'KENYA', 'Mr.', '745124518', '', 'IBS1601055', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111176', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '67', '58', 0, '', 'Group', 0, '2018-05-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'HARSON', 'ODOYO', 'HARSON ODOYO', 'Male', 'KENYA', 'Mr.', '745124519', '', 'IBM1512047', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111177', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '68', '59', 0, '', 'Member', 0, '2018-05-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'HENRY', 'OWILY OMUN', 'HENRY OWILY OMUNDU', 'Male', 'KENYA', 'Mr.', '745124520', '', 'IBS1511040', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111178', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '69', '60', 0, '', 'Member', 0, '2018-05-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'IRENE', 'ABIERO', 'IRENE ABIERO', 'Male', 'KENYA', 'Mr.', '745124521', '', 'IBM1803147', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111179', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '70', '61', 0, '', 'Member', 0, '2018-05-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'IRIS', 'MSIRIVI', 'IRIS MSIRIVI', 'Male', 'KENYA', 'Mr.', '745124522', '', 'IBM1605076', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111180', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '71', '62', 0, '', 'Member', 0, '2018-05-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'ISAAC', 'OICHOE', 'ISAAC OICHOE', 'Male', 'KENYA', 'Mr.', '745124523', '', 'IBM1603061', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111181', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '72', '63', 0, '', 'Member', 0, '2018-05-22 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'ISAAC', 'SAKA DENNI', 'ISAAC SAKA DENNIS(RUTH)', 'Male', 'KENYA', 'Mr.', '745124524', '', 'IBM1801137', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111182', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '73', '64', 0, '', 'Member', 0, '2018-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'ISAIAH', 'OBIRI', 'ISAIAH OBIRI', 'Male', 'KENYA', 'Mr.', '745124525', '', 'IBM1511044', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111183', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '74', '65', 0, '', 'Member', 0, '2018-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'JAMES', 'BOGONKO', 'JAMES BOGONKO', 'Male', 'KENYA', 'Mr.', '745124526', '', 'IBM1706127', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111184', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '75', '66', 0, '', 'Member', 0, '2018-01-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'JAMES', 'BOSIRE', 'JAMES BOSIRE', 'Male', 'KENYA', 'Mr.', '745124527', '', 'IBM1609095', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111185', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '76', '67', 0, '', 'Member', 0, '2018-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'JAMES', 'MOGENI OMA', 'JAMES MOGENI OMARI', 'Male', 'KENYA', 'Mr.', '745124528', '', 'IBM1807166', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111186', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '77', '68', 0, '', 'Member', 0, '2018-01-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'JAMES', 'OGOLLA', 'JAMES OGOLLA', 'Male', 'KENYA', 'Mr.', '745124529', '', 'IBM1608088', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111187', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '78', '69', 0, '', 'Member', 0, '2018-01-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'JAMES', 'OLELA OTIE', 'JAMES OLELA OTIENO', 'Male', 'KENYA', 'Mr.', '745124530', '', 'IBM1511032', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111188', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '79', '70', 0, '', 'Member', 0, '2018-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'JANE', 'ATIENO', 'JANE ATIENO', 'Male', 'KENYA', 'Mr.', '745124531', '', 'IBM1601056', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111189', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '80', '71', 0, '', 'Member', 0, '2018-01-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'JANE', 'GARI', 'JANE GARI', 'Male', 'KENYA', 'Mr.', '745124532', '', 'IBS1601049', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111190', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '81', '72', 0, '', 'Member', 0, '2018-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'JEMIMAH', 'MOINDI', 'JEMIMAH MOINDI', 'Male', 'KENYA', 'Mr.', '745124533', '', 'IBM1704117', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111191', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '82', '73', 0, '', 'Member', 0, '2018-01-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'JEPHITER', 'CHACHE', 'JEPHITER CHACHE', 'Male', 'KENYA', 'Mr.', '745124534', '', 'IBM1611104', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111192', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '83', '74', 0, '', 'Member', 0, '2018-01-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'JERIAH', 'KEMUMA OBA', 'JERIAH KEMUMA OBARE', 'Male', 'KENYA', 'Mr.', '745124535', '', 'IBM1808171', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111193', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '84', '75', 0, '', 'Member', 0, '2018-01-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'JESICAH', 'MAGONGU', 'JESICAH MAGONGU', 'Male', 'KENYA', 'Mr.', '745124536', '', 'IBM1702109', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111194', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '85', '76', 0, '', 'Member', 0, '2018-01-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'JOEL', 'OCHIENG\'', 'JOEL OCHIENG\'', 'Male', 'KENYA', 'Mr.', '745124537', '', 'IBM1605077', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111195', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '86', '77', 0, '', 'Member', 0, '2018-01-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'JOHN', 'OUMA ACHIA', 'JOHN OUMA ACHIANDO', 'Male', 'KENYA', 'Mr.', '745124538', '', 'IBM1511043', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111196', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '87', '78', 0, '', 'Member', 0, '2018-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'JOHN', 'OUMA ONGOL', 'JOHN OUMA ONGOLE', 'Male', 'KENYA', 'Mr.', '745124539', '', 'IBM1804153', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111197', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '88', '79', 0, '', 'Member', 0, '2018-01-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'JOHNSON', 'OKEYO OGOL', 'JOHNSON OKEYO OGOLA', 'Male', 'KENYA', 'Mr.', '745124540', '', 'IBS1504003', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111198', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '89', '80', 0, '', 'Member', 0, '2018-01-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'JOSEPH', 'OTIENO', 'JOSEPH OTIENO', 'Male', 'KENYA', 'Mr.', '745124541', '', 'IBM1511045', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111199', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '90', '81', 0, '', 'Member', 0, '2018-01-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'JOSEPHINE', 'NCHORE', 'JOSEPHINE NCHORE', 'Male', 'KENYA', 'Mr.', '745124542', '', 'IBM1607086', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111200', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '91', '82', 0, '', 'Member', 0, '2018-01-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'JUDITH', 'KITOYI', 'JUDITH KITOYI', 'Male', 'KENYA', 'Mr.', '745124543', '', 'IBM1808167', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111201', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '92', '83', 0, '', 'Member', 0, '2018-01-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'JUDY', 'NYARANGO', 'JUDY NYARANGO', 'Male', 'KENYA', 'Mr.', '745124544', '', 'IBS1703113', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111202', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '93', '84', 0, '', 'Member', 0, '2018-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'JUSTINE', 'NYAMBANE B', 'JUSTINE NYAMBANE BICHANGA', 'Male', 'KENYA', 'Mr.', '745124545', '', 'IBM1807164', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111203', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '94', '85', 0, '', 'Member', 0, '2018-01-22 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'JYOTI', 'MINYAMA', 'JYOTI MINYAMA', 'Male', 'KENYA', 'Mr.', '745124546', '', 'IBS1504007', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111204', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '95', '86', 0, '', 'Member', 0, '2018-01-23 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'KEFA', 'BOB', 'KEFA BOB', 'Male', 'KENYA', 'Mr.', '745124547', '', 'IBM1604063 ', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111205', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '96', '87', 0, '', 'Member', 0, '2018-01-24 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'KENNEDY', 'AMADI', 'KENNEDY AMADI', 'Male', 'KENYA', 'Mr.', '745124548', '', 'IBM1505013', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111206', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '97', '88', 0, '', 'Member', 0, '2018-01-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'KENNETH', 'OMONDI', 'KENNETH OMONDI', 'Male', 'KENYA', 'Mr.', '745124549', '', 'IBM1606082', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111207', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '98', '89', 0, '', 'Member', 0, '2018-01-26 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'KEVIN', 'GETI', 'KEVIN GETI', 'Male', 'KENYA', 'Mr.', '745124550', '', 'IBM1605070', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111208', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '99', '90', 0, '', 'Member', 0, '2018-01-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'KEVIN', 'OMBOK', 'KEVIN OMBOK', 'Male', 'KENYA', 'Mr.', '745124551', '', 'IBM1606080', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111209', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '100', '91', 0, '', 'Member', 0, '2018-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'LEAH', 'KINARA', 'LEAH KINARA', 'Male', 'KENYA', 'Mr.', '745124552', '', 'IBM1707130', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111210', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '101', '92', 0, '', 'Member', 0, '2018-01-29 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'LILIAN', 'AUMA', 'LILIAN AUMA', 'Male', 'KENYA', 'Mr.', '745124553', '', 'IBS1511036', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111211', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '102', '93', 0, '', 'Member', 0, '2018-01-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'LILIAN', 'KERONGO', 'LILIAN KERONGO', 'Male', 'KENYA', 'Mr.', '745124554', '', 'IBS1601053', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111212', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '103', '94', 0, '', 'Member', 0, '2018-01-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'LILIAN', 'NYAMWARO', 'LILIAN NYAMWARO', 'Male', 'KENYA', 'Mr.', '745124555', '', 'IBM1701105', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111213', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '104', '95', 0, '', 'Member', 0, '2018-02-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'LINET', 'AKINYI OMO', 'LINET AKINYI OMOLLO', 'Male', 'KENYA', 'Mr.', '745124556', '', 'IBM1511035', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111214', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '105', '96', 0, '', 'Member', 0, '2018-02-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'LINET', 'MORAA', 'LINET MORAA', 'Male', 'KENYA', 'Mr.', '745124557', '', 'IBS1703112', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111215', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '106', '97', 0, '', 'Member', 0, '2018-02-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'LOICE', 'OTIENO', 'LOICE OTIENO', 'Male', 'KENYA', 'Mr.', '745124558', '', 'IBM1605074', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111216', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '107', '98', 0, '', 'Member', 0, '2018-02-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'LUCAS', 'MOREKA', 'LUCAS MOREKA', 'Male', 'KENYA', 'Mr.', '745124559', '', 'IBM1704119', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111217', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '108', '99', 0, '', 'Member', 0, '2018-02-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'LUCAS', 'NYANGAU(GR', 'LUCAS NYANGAU(GROUP)', 'Male', 'KENYA', 'Mr.', '745124560', '', 'IBM1707134', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111218', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '109', '100', 0, '', 'Member', 0, '2018-02-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'MARGARET', 'GEKONDI', 'MARGARET GEKONDI', 'Male', 'KENYA', 'Mr.', '745124561', '', 'IBM1611107', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111219', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '110', '101', 0, '', 'Member', 0, '2018-02-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'MARK', 'SELF HELP ', 'MARK SELF HELP GROUP', 'Male', 'KENYA', 'Mr.', '745124562', '', 'IBM1707129', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111220', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '111', '102', 0, '', 'Group', 0, '2018-02-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'MARY', 'AUMA OTIEN', 'MARY AUMA OTIENO', 'Male', 'KENYA', 'Mr.', '745124563', '', 'IBM1509027', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111221', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '112', '103', 0, '', 'Member', 0, '2018-02-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'MARY', 'KERUBO', 'MARY KERUBO', 'Male', 'KENYA', 'Mr.', '745124564', '', 'IBM1705122', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111222', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '113', '104', 0, '', 'Member', 0, '2018-02-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'MICHAEL', 'MUTHAMA', 'MICHAEL MUTHAMA', 'Male', 'KENYA', 'Mr.', '745124565', '', 'IBM1605073', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111223', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '114', '105', 0, '', 'Member', 0, '2018-02-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'MICHAEL', 'OKUMU', 'MICHAEL OKUMU', 'Male', 'KENYA', 'Mr.', '745124566', '', 'IBS1508019', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111224', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '115', '106', 0, '', 'Member', 0, '2018-02-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'MICHAEL', 'OMONDI OTI', 'MICHAEL OMONDI OTIENO', 'Male', 'KENYA', 'Mr.', '745124567', '', 'IBM1606079', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111225', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '116', '107', 0, '', 'Member', 0, '2018-02-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'MILDRED', 'AWUOR', 'MILDRED AWUOR', 'Male', 'KENYA', 'Mr.', '745124568', '', 'IBS1504008', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111226', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '117', '108', 0, '', 'Member', 0, '2018-02-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'MILKAH', 'NYAMUSI MI', 'MILKAH NYAMUSI MIRORO', 'Male', 'KENYA', 'Mr.', '745124569', '', 'IBM1809174', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111227', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '118', '109', 0, '', 'Member', 0, '2018-02-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `customers` (`ACCOUNT_NO`, `FIRST_NAME`, `LAST_NAME`, `ln_account_name`, `GENDER`, `COUNTRY`, `TITLE`, `MOBILE`, `EMAIL`, `UNIQUE_NO`, `DOB`, `ADDRESS`, `CITY`, `PROVINCE_STATE`, `ZIPCODE`, `LANDINE_PHONE`, `BUSINESS_NAME`, `WORKING_STATUS`, `DESCRIPTION`, `STAFF_ACCESS`, `logo`, `files`, `cust_id_no`, `cust_kra_pin`, `cust_grp_id`, `image`, `cust_account_type`, `cust_active`, `cust_created_at`, `sourse_of_income`, `nxt_of_king_name`, `nxt_of_king_id`, `nxt_of_king_rel`, `nxt_of_king_phone`, `nxt_of_king_email`, `emp_name`, `emp_designation`, `emp_department`, `emp_occupation`, `emp_email`, `emp_address`, `emp_income`, `emp_director_name`, `emp_mobile_no`, `emp_office_no`, `referee_name`, `referee_phone`) VALUES
(119, 'MIRIAM', 'AMALA', 'MIRIAM AMALA', 'Male', 'KENYA', 'Mr.', '745124570', '', 'IBM1604064', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111228', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '119', '110', 0, '', 'Member', 0, '2018-02-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'MOLENZA', 'AWUOR', 'MOLENZA AWUOR', 'Male', 'KENYA', 'Mr.', '745124571', '', 'IBM1504012', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111229', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '120', '111', 0, '', 'Member', 0, '2018-02-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'MOULINE', 'AWUOR', 'MOULINE AWUOR', 'Male', 'KENYA', 'Mr.', '745124572', '', 'IBS1508018', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111230', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '121', '112', 0, '', 'Member', 0, '2018-02-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'MOURINE', 'ANYANGO', 'MOURINE ANYANGO', 'Male', 'KENYA', 'Mr.', '745124573', '', 'IBM1508016', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111231', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '122', '113', 0, '', 'Member', 0, '2018-02-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'NAFTALI', 'MICHIRA BA', 'NAFTALI MICHIRA BARONGO', 'Male', 'KENYA', 'Mr.', '745124574', '', 'IBM1807161', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111232', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '123', '114', 0, '', 'Member', 0, '2018-02-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'NANCY', 'ANYANGO LA', 'NANCY ANYANGO LANA', 'Male', 'KENYA', 'Mr.', '745124575', '', 'IBM1806158', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111233', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '124', '115', 0, '', 'Member', 0, '2018-02-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'NANCY', 'MWONYONYO', 'NANCY MWONYONYO', 'Male', 'KENYA', 'Mr.', '745124576', '', 'IBM1701106', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111234', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '125', '116', 0, '', 'Member', 0, '2018-02-22 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'NAOMI', 'MICHOKI', 'NAOMI MICHOKI', 'Male', 'KENYA', 'Mr.', '745124577', '', 'IBM1602059', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111235', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '126', '117', 0, '', 'Member', 0, '2018-02-23 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'NELSON', 'ONGORI', 'NELSON ONGORI', 'Male', 'KENYA', 'Mr.', '745124578', '', 'IBM1610099', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111236', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '127', '118', 0, '', 'Member', 0, '2018-02-24 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'NICHOLAS', 'NALIALI', 'NICHOLAS NALIALI', 'Male', 'KENYA', 'Mr.', '745124579', '', 'IBM1708136', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111237', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '128', '119', 0, '', 'Member', 0, '2018-02-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'NOAH', 'ODERA MANG', 'NOAH ODERA MANGIRA', 'Male', 'KENYA', 'Mr.', '745124580', '', 'IBS1509029', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111238', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '129', '120', 0, '', 'Member', 0, '2018-02-26 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'ODOYO', 'EMMANUEL', 'ODOYO EMMANUEL', 'Male', 'KENYA', 'Mr.', '745124581', '', 'IBM1803151', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111239', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '130', '121', 0, '', 'Member', 0, '2018-02-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'OLIVIA', 'ODONDI', 'OLIVIA ODONDI', 'Male', 'KENYA', 'Mr.', '745124582', '', 'IBM1706125', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111240', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '131', '122', 0, '', 'Member', 0, '2018-02-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'ONESTEP', 'SELF HELP ', 'ONESTEP SELF HELP GROUP', 'Male', 'KENYA', 'Mr.', '745124583', '', 'IBM1706128', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111241', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '132', '123', 0, '', 'Group', 0, '2018-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'PACIFICAH', 'KERUBO', 'PACIFICAH KERUBO', 'Male', 'KENYA', 'Mr.', '745124584', '', 'IBM1803145', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111242', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '133', '124', 0, '', 'Member', 0, '2018-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'PAMELA', 'ACHIENG\' O', 'PAMELA ACHIENG\' OGANO', 'Male', 'KENYA', 'Mr.', '745124585', '', 'IBM1807160', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111243', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '134', '125', 0, '', 'Member', 0, '2018-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'PAUL', 'KAMAU', 'PAUL KAMAU', 'Male', 'KENYA', 'Mr.', '745124586', '', 'IBM1609097', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111244', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '135', '126', 0, '', 'Member', 0, '2018-03-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'PAUL', 'OTIENO OBU', 'PAUL OTIENO OBUMBI', 'Male', 'KENYA', 'Mr.', '745124587', '', 'IBS1508026', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111245', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '136', '127', 0, '', 'Member', 0, '2018-03-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'PAUL', 'OWINO', 'PAUL OWINO', 'Male', 'KENYA', 'Mr.', '745124588', '', 'IBM1605071', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111246', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '137', '128', 0, '', 'Member', 0, '2018-03-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'PAULINE', 'ACHIENG\'', 'PAULINE ACHIENG\'', 'Male', 'KENYA', 'Mr.', '745124589', '', 'IBM1609093', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111247', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '138', '129', 0, '', 'Member', 0, '2018-03-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'PAULINE', 'MOKEIRA', 'PAULINE MOKEIRA', 'Male', 'KENYA', 'Mr.', '745124590', '', 'IBM1606081', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111248', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '139', '130', 0, '', 'Member', 0, '2018-03-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'PENINAH', 'MAINA', 'PENINAH MAINA', 'Male', 'KENYA', 'Mr.', '745124591', '', 'IBM1608089', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111249', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '140', '131', 0, '', 'Member', 0, '2018-03-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'PETER', 'KAVITA', 'PETER KAVITA', 'Male', 'KENYA', 'Mr.', '745124592', '', 'IBM1804154', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111250', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '141', '132', 0, '', 'Member', 0, '2018-03-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'PETER', 'MIGIRO', 'PETER MIGIRO', 'Male', 'KENYA', 'Mr.', '745124593', '', 'IBM1607084', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111251', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '142', '133', 0, '', 'Member', 0, '2018-03-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'PETER', 'MWAI OWINY', 'PETER MWAI OWINY', 'Male', 'KENYA', 'Mr.', '745124594', '', 'IBM1807165', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111252', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '143', '134', 0, '', 'Member', 0, '2018-03-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'PETER', 'OUMA', 'PETER OUMA ODINGA', 'Male', 'KENYA', 'Mr.', '745124595', '', 'IBM1702111', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111253', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '144', '135', 0, '', 'Member', 0, '2018-03-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'RAPHAEL', 'OWINO', 'RAPHAEL OWINO', 'Male', 'KENYA', 'Mr.', '745124596', '', 'IBM1803150', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111254', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '145', '136', 0, '', 'Member', 0, '2018-03-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'RHODA', 'MOMANYI', 'RHODA MOMANYI', 'Male', 'KENYA', 'Mr.', '745124597', '', 'IBM1705120', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111255', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '146', '137', 0, '', 'Member', 0, '2018-03-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'RICHARD', 'ONGUTE', 'RICHARD ONGUTE', 'Male', 'KENYA', 'Mr.', '745124598', '', 'IBM1808169', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111256', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '147', '138', 0, '', 'Member', 0, '2018-03-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'RISPER', 'ACHIENG\'', 'RISPER ACHIENG\'', 'Male', 'KENYA', 'Mr.', '745124599', '', 'IBM1803148', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111257', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '148', '139', 0, '', 'Member', 0, '2018-03-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'RISPER', 'OBANDA', 'RISPER OBANDA', 'Male', 'KENYA', 'Mr.', '745124600', '', 'IBM1605068', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111258', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '149', '140', 0, '', 'Member', 0, '2018-03-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'RISPER', 'ZAKAYO', 'RISPER ZAKAYO', 'Male', 'KENYA', 'Mr.', '745124601', '', 'IBS1601051', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111259', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '150', '141', 0, '', 'Member', 0, '2018-03-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'RUTH', 'AWENDO', 'RUTH AWENDO', 'Male', 'KENYA', 'Mr.', '745124602', '', 'IBM1804155', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111260', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '151', '142', 0, '', 'Member', 0, '2018-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'RUTH', 'KABALA', 'RUTH KABALA', 'Male', 'KENYA', 'Mr.', '745124603', '', 'IBM1601050', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111261', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '152', '143', 0, '', 'Member', 0, '2018-03-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'RUTH', 'MORAA', 'RUTH MORAA', 'Male', 'KENYA', 'Mr.', '745124604', '', 'IBS1601054', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111262', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '153', '144', 0, '', 'Member', 0, '2018-03-22 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'SAMSON', 'OINO OTUKE', 'SAMSON OINO OTUKE', 'Male', 'KENYA', 'Mr.', '745124605', '', 'IBM1605069', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111263', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '154', '145', 0, '', 'Member', 0, '2018-03-23 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'SAMUEL', 'OBARE OBAI', 'SAMUEL OBARE OBAI', 'Male', 'KENYA', 'Mr.', '745124606', '', 'IBM1805I56', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111264', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '155', '146', 0, '', 'Member', 0, '2018-03-24 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'SARAH', 'ANDIRA', 'SARAH ANDIRA', 'Male', 'KENYA', 'Mr.', '745124607', '', 'IBM1704115', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111265', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '156', '147', 0, '', 'Member', 0, '2018-03-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'SHADRACK', 'OGWALO', 'SHADRACK OGWALO', 'Male', 'KENYA', 'Mr.', '745124608', '', 'IBS1504010', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111266', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '157', '148', 0, '', 'Member', 0, '2018-03-26 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'STEPHEN', 'ODUOR OKOT', 'STEPHEN ODUOR OKOTH', 'Male', 'KENYA', 'Mr.', '745124609', '', 'IBM1810176', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111267', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '158', '149', 0, '', 'Member', 0, '2018-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'STEPHENE', 'OCHIENG\'', 'STEPHENE OCHIENG\'', 'Male', 'KENYA', 'Mr.', '745124610', '', 'IBM1607087', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111268', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '159', '150', 0, '', 'Member', 0, '2018-03-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'STEPHINE', 'NGERESA RA', 'STEPHINE NGERESA RAMADHAN', 'Male', 'KENYA', 'Mr.', '745124611', '', 'IBM1803143', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111269', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '160', '151', 0, '', 'Member', 0, '2018-03-29 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'STEVEN', 'OKOTH', 'STEVEN OKOTH', 'Male', 'KENYA', 'Mr.', '745124612', '', 'IBM1604066', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111270', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '161', '152', 0, '', 'Member', 0, '2018-03-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'SUSAN', 'NANJALA', 'SUSAN NANJALA', 'Male', 'KENYA', 'Mr.', '745124613', '', 'IBS1504011', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111271', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '162', '153', 0, '', 'Member', 0, '2018-03-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'TERESA', 'BONUKE', 'TERESA BONUKE', 'Male', 'KENYA', 'Mr.', '745124614', '', 'IBM1609091', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111272', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '163', '154', 0, '', 'Member', 0, '2018-04-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'TERESIA', 'ATIENO', 'TERESIA ATIENO', 'Male', 'KENYA', 'Mr.', '745124615', '', 'IBS1508017', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111273', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '164', '155', 0, '', 'Member', 0, '2018-04-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'THOMAS', 'ONCHIRI AT', 'THOMAS ONCHIRI ATANCHA', 'Male', 'KENYA', 'Mr.', '745124616', '', 'IBM1512048', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111274', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '165', '156', 0, '', 'Member', 0, '2018-04-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'TOBIAS', 'OTIENO OSW', 'TOBIAS OTIENO OSWAGO', 'Male', 'KENYA', 'Mr.', '745124617', '', 'IBM1803149', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111275', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '166', '157', 0, '', 'Member', 0, '2018-04-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'VALLARY', 'OTIENO', 'VALLARY OTIENO', 'Male', 'KENYA', 'Mr.', '745124618', '', 'IBM1611102', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111276', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '167', '158', 0, '', 'Member', 0, '2018-04-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'VALLERIE', 'ANYANGO', 'VALLERIE ANYANGO', 'Male', 'KENYA', 'Mr.', '745124619', '', 'IBM1512046', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111277', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '168', '159', 0, '', 'Member', 0, '2018-04-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'VICTORIA', 'CHABA', 'VICTORIA CHABA', 'Male', 'KENYA', 'Mr.', '745124620', '', 'IBM1807163', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111278', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '169', '160', 0, '', 'Member', 0, '2018-04-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'VIVIAN', 'BONARERI A', 'VIVIAN BONARERI ALOYS', 'Male', 'KENYA', 'Mr.', '745124621', '', 'IBM1809173', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111279', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '170', '161', 0, '', 'Member', 0, '2018-04-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'WASHINGTON', 'OKELLO', 'WASHINGTON OKELLO', 'Male', 'KENYA', 'Mr.', '745124622', '', 'IBS1504006', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111280', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '171', '162', 0, '', 'Member', 0, '2018-04-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'WINNIE', 'OTIENO', 'WINNIE OTIENO', 'Male', 'KENYA', 'Mr.', '745124623', '', 'IBM1605075', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111281', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '172', '163', 0, '', 'Member', 0, '2018-04-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'WYCLIFFE', 'OMBUI', 'WYCLIFFE OMBUI', 'Male', 'KENYA', 'Mr.', '745124624', '', 'IBM1809175', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111282', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '173', '164', 0, '', 'Member', 0, '2018-04-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'ZABLON', 'AINGO', 'ZABLON AINGO', 'Male', 'KENYA', 'Mr.', '745124625', '', 'IBM1804152', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111283', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '174', '165', 0, '', 'Member', 0, '2018-04-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'ZAINABU', 'KERUBO', 'ZAINABU KERUBO', 'Male', 'KENYA', 'Mr.', '745124626', '', 'IBM1704118', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111284', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '175', '166', 0, '', 'Member', 0, '2018-04-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'ADYNEVERRA', 'EDNA AKOTH', 'ADYNEVERRA EDNA AKOTH', 'Male', 'KENYA', 'Mr.', '745124627', '', 'IBM1810177', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111285', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '176', '167', 0, '', 'Member', 0, '2018-04-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'JAPHETH', 'JAVAN AYOY', 'JAPHETH JAVAN AYOYI', 'Male', 'KENYA', 'Mr.', '745124628', '', 'IBM1810178', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111286', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '177', '168', 0, '', 'Member', 0, '2018-04-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'KENNEDY', 'OBURU OMOL', 'KENNEDY OBURU OMOLLO', 'Male', 'KENYA', 'Mr.', '745124629', '', 'IBM1810179', '0000-00-00', 'Nairobi', '', 'NAIROBI', '254', '11111287', '', 'Employee', '', 'admin', 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '178', '169', 0, '', 'Member', 0, '2018-04-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Test', 'Customer', '', 'Male', 'Kenya', 'Mr. ', '07154474589', 'test@customer.com', NULL, NULL, '200', 'Nairobi', '', '254', '0715245542', 'n/a', 'Employee', '', NULL, 'uploads/customers/default.jpg', 'uploads/files/default.jpg', '0232211241', 'A254564254242J', 2, NULL, 'Member', NULL, '2019-01-21 10:42:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `customers`
--
DELIMITER $$
CREATE TRIGGER `BEFORE_INSERT_CUSTOMER` BEFORE INSERT ON `customers` FOR EACH ROW BEGIN

SET @id = (SELECT MAX(ACCOUNT_NO) FROM customers);
SET @suff =@id+1;
   
-- SET NEW.ln_account_name=CONCAT(NEW.FIRST_NAME,'-',NEW.LAST_NAME);

-- IF NEW.cust_account_type='Member' THEN
	-- SET NEW.UNIQUE_NO=CONCAT('IBM',' ','225500',@suff);
-- ELSEIF  NEW.cust_account_type='Group' THEN
	-- SET NEW.UNIQUE_NO=CONCAT('IBG',' ','225500',@suff);
-- ELSEIF  NEW.cust_account_type='Shareholder' THEN
	-- SET NEW.UNIQUE_NO=CONCAT('IBS',' ','225500',@suff);
-- END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BEFORE_UPDATE_CUSTOMER` BEFORE UPDATE ON `customers` FOR EACH ROW BEGIN
   
SET NEW.ln_account_name=CONCAT(NEW.FIRST_NAME,'-',NEW.LAST_NAME);
SET NEW.UNIQUE_NO=CONCAT('FUSA',' ','2255',NEW.ACCOUNT_NO);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(11) NOT NULL,
  `exp_name` varchar(50) NOT NULL,
  `exp_details` text NOT NULL,
  `exp_amt` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_name`, `exp_details`, `exp_amt`) VALUES
(1, 'RECEIPT PAPER PURCHASE', 'RECEIPT PAPER PURCHASE', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fle_id` int(11) NOT NULL,
  `fle_ln_id` int(11) NOT NULL,
  `fle_name` varchar(200) NOT NULL,
  `fle_path` varchar(200) NOT NULL,
  `fle_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `grp_id` int(11) NOT NULL,
  `grp_name` varchar(200) NOT NULL,
  `grp_leader_id` int(11) NOT NULL,
  `grp_ceated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`grp_id`, `grp_name`, `grp_leader_id`, `grp_ceated_date`) VALUES
(1, 'YOUNG INVESTORS SELF HELP', 2, '2018-10-14 20:28:01'),
(2, 'USER GROUP 2', 3, '2018-11-05 16:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `grt_id` int(11) NOT NULL,
  `grt_ln_id` int(11) NOT NULL,
  `grt_member_id` int(11) NOT NULL,
  `grt_amount` decimal(11,2) NOT NULL,
  `grt_lnp_id` int(11) NOT NULL,
  `grt_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loanproducts`
--

CREATE TABLE `loanproducts` (
  `lnp_id` int(11) NOT NULL,
  `lnp_name` varchar(100) DEFAULT NULL,
  `lnp_desc` varchar(100) DEFAULT NULL,
  `lnp_min_principal_amt` int(11) NOT NULL,
  `lnp_max_principal_amt` int(11) NOT NULL,
  `lnp_min_interest` int(11) NOT NULL DEFAULT '0',
  `lnp_min_interest_desc` enum('Weekly','Monthly','Yearly','') NOT NULL,
  `lnp_max_interest` int(11) NOT NULL DEFAULT '0',
  `lnp_max_interest_desc` enum('Daily','Weekly','Monthly','Yearly','') NOT NULL,
  `lnp_min_duration` int(11) NOT NULL DEFAULT '0',
  `lnp_min_duration_desc` enum('Days','Weeks','Months','Years') NOT NULL,
  `lnp_max_duration` int(11) NOT NULL DEFAULT '0',
  `lnp_max_duration_desc` enum('Days','Weeks','Months','Years','') NOT NULL,
  `lnp_repayment_daily` tinyint(1) NOT NULL DEFAULT '0',
  `lnp_repayment_weekly` tinyint(1) NOT NULL DEFAULT '0',
  `lnp_repayment_biweekly` tinyint(1) NOT NULL DEFAULT '0',
  `lnp_repayment_monthly` tinyint(1) NOT NULL DEFAULT '0',
  `lnp_min_processing_fee` int(11) DEFAULT '0',
  `lnp_max_processing_fee` int(11) DEFAULT '0',
  `lnp_min_insurance_fee` int(11) DEFAULT '0',
  `lnp_max_insurance_fee` int(11) DEFAULT '0',
  `lnp_min_no_of_repayments` int(11) DEFAULT '0',
  `lnp_max_no_of_repayments` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanproducts`
--

INSERT INTO `loanproducts` (`lnp_id`, `lnp_name`, `lnp_desc`, `lnp_min_principal_amt`, `lnp_max_principal_amt`, `lnp_min_interest`, `lnp_min_interest_desc`, `lnp_max_interest`, `lnp_max_interest_desc`, `lnp_min_duration`, `lnp_min_duration_desc`, `lnp_max_duration`, `lnp_max_duration_desc`, `lnp_repayment_daily`, `lnp_repayment_weekly`, `lnp_repayment_biweekly`, `lnp_repayment_monthly`, `lnp_min_processing_fee`, `lnp_max_processing_fee`, `lnp_min_insurance_fee`, `lnp_max_insurance_fee`, `lnp_min_no_of_repayments`, `lnp_max_no_of_repayments`) VALUES
(1, 'Easy Loan 1.5%', 'Easy Loan To Any Member', 2, 0, 0, 'Weekly', 9, 'Monthly', 0, 'Days', 0, 'Days', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, 'New loan Product', 'New loan Product', 2, 2, 2, 'Monthly', 5, 'Monthly', 2, 'Years', 2, 'Years', 1, 1, 0, 1, 1, 5, 1, 5, 12, 36),
(3, 'Education Loan', 'Education Loan', 2, 5, 2, 'Monthly', 5, 'Monthly', 2, 'Years', 3, 'Years', 0, 0, 0, 1, 2, 5, 2, 7, 2, 72);

-- --------------------------------------------------------

--
-- Table structure for table `loanrepayments`
--

CREATE TABLE `loanrepayments` (
  `lnrp_id` int(11) NOT NULL,
  `lnrp_ln_id` int(11) NOT NULL,
  `lnrp_payment_method` enum('Cash','M-Pesa','Cheque','Bank Transfer') NOT NULL,
  `lnrp_collected_by` varchar(50) NOT NULL,
  `lnrp_collection_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lnrp_paid_amount` decimal(11,2) NOT NULL,
  `lnrp_principal` decimal(11,2) NOT NULL,
  `lnrp_balance` decimal(11,2) NOT NULL,
  `lnrp_extra_payment` decimal(11,2) DEFAULT '0.00',
  `lnrp_reference` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanrepayments`
--

INSERT INTO `loanrepayments` (`lnrp_id`, `lnrp_ln_id`, `lnrp_payment_method`, `lnrp_collected_by`, `lnrp_collection_date`, `lnrp_paid_amount`, `lnrp_principal`, `lnrp_balance`, `lnrp_extra_payment`, `lnrp_reference`) VALUES
(1, 42, 'Cash', '', '2018-10-21 01:17:39', '200.00', '0.00', '0.00', '20.00', ''),
(2, 41, 'Cash', 'admin', '2018-10-21 01:26:39', '2000.00', '0.00', '0.00', '20.00', ''),
(3, 42, 'M-Pesa', 'admin', '2018-10-21 16:55:57', '100.00', '0.00', '0.00', NULL, 'SASADDFDSFSDF'),
(8, 46, 'M-Pesa', 'admin', '2018-10-21 20:06:52', '1500.00', '0.00', '0.00', NULL, 'SSDDFFGGGG'),
(9, 46, 'M-Pesa', 'admin', '2018-10-21 20:21:39', '1500.00', '0.00', '0.00', NULL, 'ASSDGFGHG'),
(10, 46, 'M-Pesa', 'admin', '2018-10-21 20:22:46', '1500.00', '0.00', '0.00', NULL, 'SASADDFDSFSDF'),
(11, 46, 'M-Pesa', 'admin', '2018-10-21 20:27:33', '1500.00', '0.00', '0.00', '0.00', 'ASSDGFGHG'),
(12, 47, 'M-Pesa', 'admin', '2018-10-21 20:37:22', '1500.00', '0.00', '0.00', '0.00', 'ASSDGFGHG'),
(13, 46, 'M-Pesa', 'admin', '2018-10-21 22:09:07', '1500.00', '0.00', '0.00', '0.00', 'ASSDGFGHG'),
(14, 48, 'M-Pesa', 'admin', '2018-10-21 22:14:03', '3500.00', '0.00', '0.00', '0.00', 'SSDDFFGGGG'),
(15, 49, 'M-Pesa', 'admin', '2018-10-24 20:04:43', '34500.00', '0.00', '0.00', NULL, 'SADDGHH5H465'),
(16, 51, 'M-Pesa', 'admin', '2018-10-25 11:05:49', '2500.00', '0.00', '0.00', NULL, 'ASAS5456SDFDG5FD'),
(17, 51, 'M-Pesa', 'admin', '2018-10-25 11:52:28', '2500.00', '0.00', '0.00', NULL, 'JGHAJG54SD5'),
(18, 52, 'Cash', 'admin', '2018-10-25 12:36:13', '2500.00', '0.00', '0.00', '100.00', 'ASSDGFGHG'),
(19, 53, 'Cheque', 'admin', '2018-10-25 12:37:58', '2500.00', '0.00', '0.00', '100.00', 'CHEQUE 2522'),
(20, 53, 'Cash', 'admin', '2018-10-25 12:38:49', '600.00', '0.00', '0.00', NULL, ''),
(21, 53, 'Cash', 'admin', '2018-10-25 12:40:59', '600.00', '0.00', '0.00', NULL, ''),
(22, 53, 'Cash', 'admin', '2018-10-25 12:41:32', '1000.00', '0.00', '0.00', NULL, '');

--
-- Triggers `loanrepayments`
--
DELIMITER $$
CREATE TRIGGER `BALANCE_SCHEDULE_AND_LOAN` BEFORE INSERT ON `loanrepayments` FOR EACH ROW BEGIN

SET @principal=(SELECT ln_principal FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @balance=(SELECT ln_balance FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @loan_paid=(SELECT ln_paid FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1); 
SET @sch_unit=(SELECT sch_due_amt FROM loanschedule WHERE loanschedule.sch_ln_id=NEW.lnrp_ln_id AND sch_status=0 LIMIT 1);
SET @sch_paid=0;
SET @sch_paid=(SELECT sch_paid_amount FROM loanschedule WHERE loanschedule.sch_ln_id=NEW.lnrp_ln_id AND sch_status=2 LIMIT 1);
SET @init_paid_amt=NEW.lnrp_paid_amount;
SET @new_principal=(@principal-NEW.lnrp_paid_amount);

IF @balance>0 THEN
-- check if partial exist and update
IF @sch_paid!=0 THEN
    SET @sch_unpaid_amt=(@sch_unit-@sch_paid);
-- update partially paid to fully paid
    UPDATE `loanschedule` SET loanschedule.sch_status=1,loanschedule.sch_paid_amount=@sch_unit WHERE loanschedule.sch_status=2 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
    UPDATE `loans` SET loans.ln_balance=(@balance-@sch_unpaid_amt),loans.ln_paid=(@loan_paid+@sch_unpaid_amt) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
    SET @init_paid_amt = (@init_paid_amt-@sch_unpaid_amt);
END IF;

  WHILE @init_paid_amt>=@sch_unit DO
--   update fully paid
      UPDATE `loanschedule` SET loanschedule.sch_status=1,loanschedule.sch_paid_amount=@sch_unit WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
      UPDATE `loans` SET loans.ln_balance=(@balance-@sch_unit),loans.ln_paid=(@loan_paid+@sch_unit) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
      SET @init_paid_amt = (@init_paid_amt-@sch_unit);
  END WHILE;

  IF @init_paid_amt>0 THEN
--   Update partially paid
    UPDATE `loanschedule` SET loanschedule.sch_status=2,loanschedule.sch_paid_amount=@init_paid_amt WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
    UPDATE `loans` SET loans.ln_balance=(@balance-@init_paid_amt),loans.ln_paid=(@loan_paid+@init_paid_amt) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
    SET @init_paid_amt = 0;
  END IF;
  
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `ln_id` int(11) NOT NULL,
  `lnp_id` int(11) NOT NULL,
  `ln_name` varchar(200) DEFAULT 'Default Loan Applied',
  `ln_customer_id` int(11) NOT NULL DEFAULT '1',
  `ln_released` date DEFAULT NULL,
  `ln_maturity` date DEFAULT NULL,
  `ln_repayment` enum('Monthly') DEFAULT NULL,
  `ln_repayment_count` int(11) DEFAULT NULL,
  `ln_principal` int(11) DEFAULT NULL,
  `ln_interest` int(11) DEFAULT NULL,
  `ln_interest_per` int(11) NOT NULL DEFAULT '0',
  `ln_interest_time` enum('Per Month') DEFAULT NULL,
  `ln_fees` int(11) DEFAULT NULL,
  `ln_penalty` int(11) NOT NULL DEFAULT '0',
  `ln_due` date DEFAULT NULL,
  `ln_paid` int(11) NOT NULL DEFAULT '0',
  `ln_balance` int(11) NOT NULL DEFAULT '0',
  `ln_status` int(11) DEFAULT '1',
  `ln_application_status` int(11) DEFAULT '1',
  `ln_description` text,
  `ln_processing_fee_perc` int(11) DEFAULT NULL,
  `ln_processing_fee` int(11) DEFAULT NULL,
  `ln_insurance_fee` int(11) DEFAULT NULL,
  `ln_loan_files` varchar(300) DEFAULT NULL,
  `ln_duration` int(11) DEFAULT NULL,
  `ln_duration_desc` enum('Months','Years') DEFAULT NULL,
  `ln_guarantors` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`ln_id`, `lnp_id`, `ln_name`, `ln_customer_id`, `ln_released`, `ln_maturity`, `ln_repayment`, `ln_repayment_count`, `ln_principal`, `ln_interest`, `ln_interest_per`, `ln_interest_time`, `ln_fees`, `ln_penalty`, `ln_due`, `ln_paid`, `ln_balance`, `ln_status`, `ln_application_status`, `ln_description`, `ln_processing_fee_perc`, `ln_processing_fee`, `ln_insurance_fee`, `ln_loan_files`, `ln_duration`, `ln_duration_desc`, `ln_guarantors`) VALUES
(70, 1, 'DR. ALBERT - MAGANGA', 4, '2018-11-01', '2018-12-01', 'Monthly', 2, 2000, 360, 0, NULL, 200, 0, '2018-12-31', 0, 2360, 1, 2, 'DR. ALBERT - MAGANGA', 0, 0, NULL, NULL, 2, 'Months', NULL),
(71, 3, 'Education Loan DR. ALBERT - MAGANGA', 4, '2018-11-01', '2018-12-01', 'Monthly', 2, 2000, 200, 0, NULL, 300, 0, '2018-12-31', 0, 2200, 1, 2, 'Education Loan DR. ALBERT - MAGANGA', 5, 5, NULL, NULL, 2, 'Months', NULL),
(72, 1, 'Mr. ABEL - MOKAYA', 1, '2018-01-01', '2018-01-31', 'Monthly', 5, 5000, 2250, 0, NULL, 200, 0, '2018-05-31', 0, 7250, 1, 4, 'Mr. ABEL - MOKAYA', 0, 0, NULL, NULL, 5, 'Months', NULL),
(73, 1, 'Irene Easy Loan', 178, '2018-11-15', '2018-12-15', 'Monthly', 6, 50000, 27000, 0, NULL, 200, 0, '2019-05-14', 0, 77000, 1, 1, 'Irene Easy Loan', 0, 0, NULL, NULL, 6, 'Months', NULL),
(74, 1, 'Mr. ANDREW - GROHNEY OD Easy Loan 1.5 %', 10, '2018-11-01', '2018-12-01', 'Monthly', 6, 250000, 135000, 0, NULL, 200, 0, '2019-04-30', 0, 385000, 1, 1, 'Mr. ANDREW - GROHNEY OD Easy Loan 1.5 %', 0, 0, NULL, NULL, 6, 'Months', NULL),
(75, 1, '', 5, '2018-05-01', '2018-05-31', 'Monthly', 1, 1000, 90, 0, NULL, 300, 0, '2018-05-31', 0, 1090, 1, 1, '', 0, 0, NULL, NULL, 1, 'Months', NULL),
(76, 1, '', 4, '2019-01-25', '2019-02-24', 'Monthly', 5, 5000, 2250, 0, NULL, 300, 0, '2019-06-24', 0, 7250, 1, 1, '', 0, 0, NULL, NULL, 5, 'Months', NULL);

--
-- Triggers `loans`
--
DELIMITER $$
CREATE TRIGGER `CREATE_SCHEDULE` AFTER INSERT ON `loans` FOR EACH ROW BEGIN

SET @interest_rate_per=(SELECT lnp_max_interest FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);


SET @INCREMENT = 0 ;
SET @INCREMENT_DATE = 60;
SET @PRINCIPAL=(NEW.ln_principal/NEW.ln_repayment_count);
SET @INTEREST=(@interest_rate_per*@PRINCIPAL)/100;
SET @DUE_AMT=(@PRINCIPAL+@INTEREST);

WHILE @INCREMENT<NEW.ln_repayment_count DO
	INSERT INTO `loanschedule` (`sch_date`, `sch_principal`, `sch_interest`, `sch_fee`, 
    `sch_due_amt`, `sch_desc`, `sch_ln_id`)
     VALUES(DATE_ADD(NEW.ln_released, INTERVAL @INCREMENT_DATE DAY),@PRINCIPAL,@INTEREST, NEW.ln_fees,@DUE_AMT,'Repayment', NEW.ln_id);
    SET @INCREMENT = @INCREMENT+1;
    SET @INCREMENT_DATE = @INCREMENT_DATE+30;
END WHILE;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `LOAN_SETUP` BEFORE INSERT ON `loans` FOR EACH ROW BEGIN

SET @interest_rate_per=(SELECT lnp_max_interest FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @processing_fee=(SELECT lnp_max_processing_fee FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @insurance_fee=(SELECT lnp_max_insurance_fee FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @ln_interest=(NEW.ln_principal*(@interest_rate_per/100)*NEW.ln_duration);
SET NEW.ln_interest=@interest_rate_per;
SET NEW.ln_processing_fee_perc=@processing_fee;
SET NEW.ln_interest=@ln_interest;
SET NEW.ln_processing_fee=@processing_fee;
SET NEW.ln_name=NEW.ln_description;
SET @DUE_INCREMENT=(NEW.ln_repayment_count*30);
SET NEW.ln_maturity=DATE_ADD(NEW.ln_released, INTERVAL 30 DAY);
SET NEW.ln_due = DATE_ADD(NEW.ln_released, INTERVAL @DUE_INCREMENT DAY);
SET NEW.ln_balance=(NEW.ln_principal+@ln_interest);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE_LOAN_STATUS` BEFORE UPDATE ON `loans` FOR EACH ROW BEGIN

SET NEW.ln_name=NEW.ln_description;
SET NEW.ln_maturity=DATE_ADD(NEW.ln_released, INTERVAL 30 DAY);

SET @bal=(SELECT ln_balance FROM loans WHERE loans.ln_id=NEW.ln_id LIMIT 1);
IF @bal = 0
  THEN
  	SET NEW.ln_status = 2;
    SET NEW.ln_application_status = 5;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loanschedule`
--

CREATE TABLE `loanschedule` (
  `sch_id` int(11) NOT NULL,
  `sch_date` varchar(20) DEFAULT NULL,
  `sch_principal` decimal(11,2) NOT NULL,
  `sch_interest` decimal(11,2) NOT NULL,
  `sch_fee` decimal(11,2) DEFAULT NULL,
  `sch_penalty_amount` decimal(11,2) NOT NULL,
  `sch_due_amt` decimal(11,2) NOT NULL,
  `sch_paid_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `sch_desc` varchar(60) NOT NULL,
  `sch_status` int(11) NOT NULL DEFAULT '0',
  `sch_created_by` varchar(100) NOT NULL,
  `sch_ln_id` int(11) NOT NULL,
  `sch_paid_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanschedule`
--

INSERT INTO `loanschedule` (`sch_id`, `sch_date`, `sch_principal`, `sch_interest`, `sch_fee`, `sch_penalty_amount`, `sch_due_amt`, `sch_paid_amount`, `sch_desc`, `sch_status`, `sch_created_by`, `sch_ln_id`, `sch_paid_by`) VALUES
(288, '2019-01-30', '41666.67', '3750.00', '200.00', '0.00', '45416.67', '0.00', 'Repayment', 0, '', 74, ''),
(289, '2019-03-01', '41666.67', '3750.00', '200.00', '0.00', '45416.67', '0.00', 'Repayment', 0, '', 74, ''),
(290, '2019-03-31', '41666.67', '3750.00', '200.00', '0.00', '45416.67', '0.00', 'Repayment', 0, '', 74, ''),
(291, '2019-04-30', '41666.67', '3750.00', '200.00', '0.00', '45416.67', '0.00', 'Repayment', 0, '', 74, ''),
(292, '2019-05-30', '41666.67', '3750.00', '200.00', '0.00', '45416.67', '0.00', 'Repayment', 0, '', 74, ''),
(293, '2018-06-30', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 75, ''),
(294, '2019-03-26', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 76, ''),
(295, '2019-04-25', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 76, ''),
(296, '2019-05-25', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 76, ''),
(297, '2019-06-24', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 76, ''),
(298, '2019-07-24', '1000.00', '90.00', '300.00', '0.00', '1090.00', '0.00', 'Repayment', 0, '', 76, '');

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
-- Table structure for table `new_table`
--

CREATE TABLE `new_table` (
  `idnew_table` int(11) NOT NULL,
  `new_tablecol` varchar(45) DEFAULT NULL
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
(1, 1, 1, 34, 0, 'Samdoh', 'bell', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0),
(2, 1, 2, 3, 1, 'My Computer', '', 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0),
(3, 1, 4, 29, 1, '01: Office Files', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(4, 1, 5, 12, 2, '01: Sales Related', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(5, 1, 6, 11, 3, 'My New Test', 'folder', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 7, 10, 4, 'Samdoh', '', 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(7, 1, 8, 9, 5, 'My New Root', '', 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(8, 1, 30, 31, 1, 'Samdoh', 'folder', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(9, 1, 32, 33, 1, 'My Computer', 'bell', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(10, 1, 13, 26, 2, '02: Purchase Related', 'file', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(11, 1, 14, 21, 3, 'My New Root', 'mobile', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(12, 1, 22, 23, 3, '01: Office Files', 'folder', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(13, 1, 24, 25, 3, 'My New Root', 'file', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(14, 1, 15, 20, 4, '01: Office Files', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(15, 1, 27, 28, 2, 'My Files', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(16, 16, 1, 4, 0, 'Manager', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(17, 16, 2, 3, 1, 'My Files', 'folder', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(18, 1, 16, 19, 5, 'Manager', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(19, 1, 17, 18, 6, 'End of Files', 'bell', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `svg_id` int(11) NOT NULL,
  `svg_account_name` varchar(200) DEFAULT NULL,
  `svg_account_number` int(11) NOT NULL,
  `svg_cust_id` varchar(20) NOT NULL,
  `svg_product_name` varchar(200) DEFAULT NULL,
  `svg_bal` decimal(11,2) DEFAULT '0.00',
  `svg_mobile` varchar(20) DEFAULT NULL,
  `svg_city` varchar(60) DEFAULT NULL,
  `svg_last_transaction` varchar(60) DEFAULT NULL,
  `svg_status` varchar(30) DEFAULT NULL,
  `svg_reference` varchar(300) NOT NULL,
  `svg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) DEFAULT NULL,
  `svg_id_no` varchar(45) DEFAULT NULL,
  `svg_transacted_by` varchar(45) DEFAULT NULL,
  `svg_phone_no` varchar(15) DEFAULT NULL,
  `svg_account_unique_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`svg_id`, `svg_account_name`, `svg_account_number`, `svg_cust_id`, `svg_product_name`, `svg_bal`, `svg_mobile`, `svg_city`, `svg_last_transaction`, `svg_status`, `svg_reference`, `svg_date`, `created_by`, `svg_id_no`, `svg_transacted_by`, `svg_phone_no`, `svg_account_unique_number`) VALUES
(6, 'TITUS-MUTHANGYA', 1, '', NULL, '200.00', '0712455421', 'Nairobi', NULL, NULL, 'ASDSADASSAD', '2018-10-13 09:21:59', 'admin', NULL, NULL, NULL, ''),
(7, 'TITUS-MUTHANGYA', 1, '', NULL, '500.00', '0712455421', 'Nairobi', NULL, NULL, 'AASHJGHDJDS', '2018-10-13 10:38:55', 'admin', NULL, NULL, NULL, ''),
(8, 'TITUS-MUTHANGYA', 1, '', NULL, '500.00', '0712455421', 'Nairobi', NULL, NULL, 'JHKHJKJLKH', '2018-10-13 21:01:18', 'samdoh', NULL, NULL, NULL, ''),
(9, 'ERUSTUS-MUTEMI', 3, '', NULL, '1500.00', '074512445', 'Nairobi', NULL, NULL, 'HJFGJHGJKHH', '2018-10-17 21:55:03', 'admin', NULL, NULL, NULL, ''),
(10, 'TITUS-MUTHANGYA', 1, '', NULL, '500.00', '0712455421', 'Nairobi', NULL, NULL, 'DSFSSDDDDFDF', '2018-10-21 15:05:39', 'admin', NULL, NULL, NULL, ''),
(11, 'ABEL-MOKAYA', 1, '', NULL, '1000.00', '712455421', 'Nairobi', NULL, NULL, 'HGDSD45JHJHD', '2018-11-05 20:27:58', 'admin', NULL, NULL, NULL, ''),
(12, 'ABEL-MOKAYA', 1, '', NULL, '1500.00', '712455421', 'Nairobi', NULL, NULL, 'HGDSD45JHJHD', '2018-11-05 21:02:11', 'admin', '30492992', 'Samson Anami', NULL, ''),
(13, 'ABEL-MOKAYA', 1, '', NULL, '200.00', '712455421', 'Nairobi', NULL, NULL, 'HGDSD45JHJHD', '2018-11-05 21:17:38', 'admin', '30492992', 'Samson Anami', '0715422152', ''),
(14, 'ABEL-MOKAYA', 1, '', NULL, '2400.00', '712455421', 'Nairobi', NULL, NULL, 'CHQ 254', '2018-11-06 01:07:21', 'admin', '32514451', 'John Joe', '0722154854', ''),
(15, 'AKISE-NYAMBURA', 3, '', NULL, '2300.00', '74512445', 'Nairobi', NULL, NULL, 'ASJHSA5SDSD', '2018-11-06 01:23:57', 'admin', '23512444', 'Brian Kasmin', '0715444785', ''),
(16, 'ALBERT-OCHIENG\'', 5, '', NULL, '2400.00', '745124451', 'NAIROBI', NULL, NULL, 'ASJHSA5SDSD', '2018-11-06 01:40:00', 'admin', '23512444', 'John Joe', '0722154854', ''),
(17, 'ALFRED-OKOTH', 7, '', NULL, '4000.00', '745125545', 'NAKURU', NULL, NULL, 'ASJHSA5SDSD', '2018-11-06 02:45:23', 'admin', '32514451', 'Brian Kasmin', '0722154854', 'FUSA 22557');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tran_id` int(11) NOT NULL,
  `tran_account_id` int(11) NOT NULL,
  `tran_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tran_name` varchar(200) NOT NULL,
  `tran_desc` varchar(300) NOT NULL,
  `tran_usr_id` int(11) NOT NULL,
  `tran_debit` decimal(11,2) NOT NULL,
  `tran_credit` decimal(11,2) NOT NULL,
  `tran_bal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `image_link`, `phone`) VALUES
(1, 'Samwel', 'McLink', 'samdoh', 'mF9lnNjzjSgGbfGi7BmRQDTdE1Qt6pau', '$2y$13$Hg4ZZJ7Uc6niTNmQaDWifuL8E1gVk/ssaGihGL/8Ao.Ctcl2TfZdi', NULL, 'samsonanami@gmail.com', 10, '2018-07-09 22:13:58', '0000-00-00 00:00:00', 'uploads/users/samdoh.jpg', '+254717084613'),
(2, 'Sharon s', 'Jebet', 'jebet', 'lfgTGnP_tOUyhdVmU_iti1lhPbexYqJU', '$2y$13$IaDSRsJp5BhwrKHWv/Rt9OJJ6gS4YalsTRensq8MyNuxmrCX.uhgy', NULL, 'jebet123@yahoo.com', 10, '2018-07-09 22:13:58', '0000-00-00 00:00:00', 'uploads/users/jebet.jpg', '+254788454885'),
(4, 'System', 'Admininistrator', 'admin', 'CIJc_IXqdZp0oa7-OtxNIH66rRUXM_YN', '$2y$13$5lLNpoa4qHdRU2kIBaWgDOrsRKqwy0e8/qr.EWiDoeupOdE81ll.K', NULL, 'anami.samdo@gmail.com', 10, '2018-07-18 00:00:00', '0000-00-00 00:00:00', 'uploads/users/admin.jpg', '+2548454122245'),
(6, 'Brian ', 'Sharks', 'brian', '', '', NULL, 'brianshcka@yahoo.com', 10, '2018-07-23 00:00:00', '0000-00-00 00:00:00', 'uploads/users/brian.jpg', '+254717084512'),
(7, 'New', 'User', 'user', '', '$2y$13$PeDes6GnOvipmfler6vibe6BwrCgoLrrggSMBAV5xp5hnRAlhyiba', NULL, 'uuser2@gmail.com', 10, '2018-10-26 12:49:01', 'admin', 'uploads/users/user.jpg', '071778457'),
(8, 'sam', 'sam', 'sam', '', '$2y$13$U0PCnZj9g4TNz0ZRow9GIuf2AOzWLohdqObP5tFgVLn12AXJsyklG', NULL, 'sam@gmail.com', 10, '2018-10-26 13:05:35', 'admin', 'uploads/users/sam.jpg', '071778457');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `wth_id` int(11) NOT NULL,
  `wth_acc_no` varchar(30) NOT NULL,
  `wth_amount` decimal(11,2) NOT NULL,
  `wth_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `wth_transacted_by` varchar(30) NOT NULL,
  `wth_ref` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `collateral`
--
ALTER TABLE `collateral`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `col_ln_id` (`col_ln_id`),
  ADD KEY `col_files_id` (`col_files_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ACCOUNT_NO`),
  ADD UNIQUE KEY `cust_id_no` (`cust_id_no`),
  ADD UNIQUE KEY `cust_kra_pin` (`cust_kra_pin`),
  ADD UNIQUE KEY `UNIQUE_NO` (`UNIQUE_NO`),
  ADD KEY `cust_grp_id` (`cust_grp_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fle_id`),
  ADD KEY `fle_ln_id` (`fle_ln_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`grp_id`),
  ADD KEY `grp_leader_id` (`grp_leader_id`);

--
-- Indexes for table `guarantor`
--
ALTER TABLE `guarantor`
  ADD PRIMARY KEY (`grt_id`),
  ADD KEY `grt_ln_id` (`grt_ln_id`),
  ADD KEY `grt_member_id` (`grt_member_id`);

--
-- Indexes for table `loanproducts`
--
ALTER TABLE `loanproducts`
  ADD PRIMARY KEY (`lnp_id`);

--
-- Indexes for table `loanrepayments`
--
ALTER TABLE `loanrepayments`
  ADD PRIMARY KEY (`lnrp_id`),
  ADD KEY `lnrp_ln_id` (`lnrp_ln_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`ln_id`),
  ADD KEY `ln_customer_id` (`ln_customer_id`),
  ADD KEY `lnp_id` (`lnp_id`);

--
-- Indexes for table `loanschedule`
--
ALTER TABLE `loanschedule`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `sch_ln_id` (`sch_ln_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`idnew_table`);

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
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`svg_id`),
  ADD KEY `svg_account_number` (`svg_account_number`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `tran_account_id` (`tran_account_id`),
  ADD KEY `tran_usr_id` (`tran_usr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`wth_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ACCOUNT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `grt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanproducts`
--
ALTER TABLE `loanproducts`
  MODIFY `lnp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loanrepayments`
--
ALTER TABLE `loanrepayments`
  MODIFY `lnrp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `ln_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `loanschedule`
--
ALTER TABLE `loanschedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `svg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `wth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collateral`
--
ALTER TABLE `collateral`
  ADD CONSTRAINT `collateral_ibfk_1` FOREIGN KEY (`col_ln_id`) REFERENCES `loans` (`ln_id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`fle_ln_id`) REFERENCES `loans` (`ln_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
