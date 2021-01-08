-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2021 at 12:24 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gorukhamaricom_cims`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `access_control_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animal_type`
--

CREATE TABLE `animal_type` (
  `animal_type_id` int(11) NOT NULL,
  `animal_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_type`
--

INSERT INTO `animal_type` (`animal_type_id`, `animal_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Cow', 1, '2020-12-15 07:13:10', NULL, 0),
(3, 'Bull', 1, '2020-12-15 07:13:12', NULL, 0),
(4, 'Others', 1, '2020-12-15 07:13:21', NULL, 0),
(5, 'Bull', 1, '2020-12-17 05:58:27', NULL, 0),
(6, 'Shahibwall', 1, '2021-01-07 16:23:54', NULL, 0),
(7, 'Shahiwall', 1, '2021-01-07 16:24:00', NULL, 0),
(8, 'Frisian', 1, '2021-01-07 16:24:09', NULL, 0),
(9, 'Jersy', 1, '2021-01-07 16:24:21', NULL, 0),
(10, 'NorthBengalGrey', 1, '2021-01-07 16:24:52', NULL, 0),
(11, 'Shindhi', 1, '2021-01-07 16:25:12', NULL, 0),
(12, 'MultiColored', 1, '2021-01-07 16:25:22', NULL, 0),
(13, 'Hariana', 1, '2021-01-07 16:25:27', NULL, 0),
(14, 'Gir', 1, '2021-01-07 16:26:48', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cattle_feed_tracking`
--

CREATE TABLE `cattle_feed_tracking` (
  `cft_id` int(11) NOT NULL,
  `cattle_code` text NOT NULL,
  `date` date NOT NULL,
  `chari_no` text NOT NULL,
  `feeding_formula_number` text NOT NULL,
  `avg_amount_of_food` text NOT NULL,
  `remarks` text NOT NULL,
  `user_id` text DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_feed_tracking`
--

INSERT INTO `cattle_feed_tracking` (`cft_id`, `cattle_code`, `date`, `chari_no`, `feeding_formula_number`, `avg_amount_of_food`, `remarks`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(1, '6666', '2020-12-06', '666', '6666', '66666', 'dcfvgbhn666', '1', 2020, 2020, 0),
(2, '01123124', '2020-12-11', '2345', '2345', '234', 'wefgrt', '1', 2020, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cattle_kin`
--

CREATE TABLE `cattle_kin` (
  `cattle_kin_id` int(11) NOT NULL,
  `cattle_kin_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_kin`
--

INSERT INTO `cattle_kin` (`cattle_kin_id`, `cattle_kin_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Australian', 1, '2020-12-15 08:39:01', NULL, 0),
(3, 'Local', 1, '2020-12-15 08:39:45', NULL, 0),
(4, 'Indians', 1, '2020-12-17 06:40:21', 2020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cattle_profile`
--

CREATE TABLE `cattle_profile` (
  `cattle_profile_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `cattle_code` text DEFAULT NULL,
  `ear_tag` text DEFAULT NULL,
  `ear_tag_color` text DEFAULT NULL,
  `electronic_ear_tag` text DEFAULT NULL,
  `other_tag` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `animal_type` text DEFAULT NULL,
  `conception_type` text DEFAULT NULL,
  `birth_date` text DEFAULT NULL,
  `birth_weight` text DEFAULT NULL,
  `weaning_date` text DEFAULT NULL,
  `weaning_weight` text DEFAULT NULL,
  `castrated` text DEFAULT NULL,
  `castrated_date` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `width` text DEFAULT NULL,
  `length` text DEFAULT NULL,
  `weight` double NOT NULL,
  `cattle_kin` text DEFAULT NULL,
  `teeth` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `special_sign` text DEFAULT NULL,
  `horn` text DEFAULT NULL,
  `farm` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `problem_type` text DEFAULT NULL,
  `problem_details` text DEFAULT NULL,
  `problem_area` text DEFAULT NULL,
  `mother_id` text DEFAULT NULL,
  `father_id` text DEFAULT NULL,
  `buy_or_birth` text DEFAULT NULL,
  `buy_price` text DEFAULT NULL,
  `buy_date` text DEFAULT NULL,
  `cattle_profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_profile`
--

INSERT INTO `cattle_profile` (`cattle_profile_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `cattle_code`, `ear_tag`, `ear_tag_color`, `electronic_ear_tag`, `other_tag`, `brand`, `animal_type`, `conception_type`, `birth_date`, `birth_weight`, `weaning_date`, `weaning_weight`, `castrated`, `castrated_date`, `gender`, `height`, `width`, `length`, `weight`, `cattle_kin`, `teeth`, `color`, `special_sign`, `horn`, `farm`, `remarks`, `status`, `age`, `problem_type`, `problem_details`, `problem_area`, `mother_id`, `father_id`, `buy_or_birth`, `buy_price`, `buy_date`, `cattle_profile_pic`) VALUES
(1, 1, '2020-11-30 07:42:40', '2020-11-30 12:30:36', 1, '01123124', '234', 'BLACK', '123', '2134', '352', 'Bull', 'Natural Selection', '2019-09-29', '100', '2019-10-29', '345', 'No', '2020-11-30', 'Male', '5', '56', '70', 0, 'Australian', '4', 'Red', 'Test', '2', 'Khamar 1', 'Good', 'Good', '1 Year', 'No Problem', 'No Problem', 'No Problem', '2342452', '346456', 'Raised', '120000', '2020-06-30', 'http://localhost/cims_v0_1/cattle_module/cattle_profile/images/WhatsApp Image 2020-09-28 at 3.17.06 PM.jpeg'),
(2, 1, '2020-11-30 07:48:52', '2020-12-01 04:04:29', 1, '01123124', '234', 'RED', '234', '3245', 'Buller', 'Cow', 'Natural Selection', '2019-10-29', '120', '2019-12-29', '190', 'No', '', 'Female', '5\'', '56\"', '7\'', 0, 'Australian', '4', 'Red', 'Test', '2', 'Khamar 1', 'Good', 'Active', '1 Year', 'No Problem', 'No Problem', 'No Problem', '2342452', '346456', 'Purchased', '40000', '2019-12-31', 'http://localhost/cims_v01/cattle_module/cattle_profile/images/download (1).jpg'),
(3, 1, '2020-12-01 05:12:04', '2020-12-20 16:48:38', 0, '2345', 'Yes', '42', '34', '345', '345', '3', 'Natural Selection', '2020-12-08', '120', '2020-12-16', '190', 'Yes', '2020-12-16', 'Female', '34', '34', '34', 4, '2', '34', '42', '345', 'No', '3', 'gffdhy', '', '34', '2', 'No Problem', '3', '4', '4', 'Raised', '34', '2020-12-16', 'https://gorukhamari.com/cattle_module/cattle_profile/images/images.jpg'),
(4, 1, '2020-12-14 11:04:29', '2020-12-19 10:03:41', 0, '202012-4', 'Yes', '42', '234', '3245', 'Buller', '2', 'Natural Selection', '2020-12-17', '120', '2020-12-03', '190', 'Yes', '2020-12-03', 'Female', '234', '234', '234', 456, '2', '2', '42', 'Test', 'Yes', '3', 'wefgrt', '', '3', '2', 'dfdgtr', '3, 5', '4', '4', 'Purchased', '40000', '2020-12-28', 'http://localhost/cims10_12/cattle_module/cattle_profile/images/Donkey_in_Clovelly,_North_Devon,_England.jpg'),
(5, 1, '2020-12-15 08:49:14', '2020-12-15 09:08:44', 0, '202012-5', 'Yes', '2', '999', '1', 'Buller', '4', 'Natural Selection', '2020-12-15', '120', '2020-12-15', '190', 'Yes', '2020-12-15', 'Male', '234', '234', '234', 234, '2', '2', '2', 'Test', 'No', '3', 'wefgrt', '3', '3', '2', 'dfdgtr111', '3', '3', '4', 'Purchased', '40000', '2020-12-15', 'http://localhost/cims10_12/cattle_module/cattle_profile/images/download.jpg'),
(6, 1, '2020-12-16 17:44:00', '2020-12-21 18:04:28', 1, '202012-6', 'Yes', '2', '34', '345', '345', '3', 'Natural Selection', '2020-12-08', '120', '2020-12-16', '190', 'Yes', '2020-12-16', 'Female', '34', '34', '34', 0, '2', '34', '2', '345', 'No', '3', '345', '2', '34', '2', '345r', '3', '', '', 'Purchased', '', '', ''),
(7, 1, '2020-12-20 21:33:00', NULL, 0, '202012-7', 'Yes', '43', 'erfe', '', 'no', '3', 'Artificial Insemination', '2020-12-20', '456', '2020-12-14', '', 'Yes', '', 'Female', '345', '45', '345', 45, '3', '45', '43', 'no', 'Yes', '', '', '', '345', '2', 'gty', '5', '4', '5', 'Purchased', '', '', 'https://gorukhamari.com/cattle_module/cattle_profile/images/download.jpg'),
(8, 1, '2021-01-07 16:54:48', NULL, 0, '202101-8', 'Yes', '45', 'ooa', 'oob', '', '14', '', '2019-01-01', '0', '', '', 'No', '', 'Male', '55', '30', '72', 256, '', '', '43', 'RoundHead', 'Yes', '3', '', '', '2', '', '', NULL, '4', '5', 'Purchased', '', '2020-07-15', 'http://gorukhamari.com/cattle_module/cattle_profile/images/83374743-e234-48fa-8035-257912cac59b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cattle_status`
--

CREATE TABLE `cattle_status` (
  `cattle_status_id` int(11) NOT NULL,
  `cattle_status_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_status`
--

INSERT INTO `cattle_status` (`cattle_status_id`, `cattle_status_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Active', 1, '2020-12-15 07:58:54', 2020, 1),
(3, 'Others', 1, '2020-12-15 08:00:40', 2020, 1),
(4, 'Samples', 1, '2020-12-19 13:38:37', 2020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cattle_task`
--

CREATE TABLE `cattle_task` (
  `cattle_task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `cattle_code` text DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `task_type` text DEFAULT NULL,
  `assigned_person` text DEFAULT NULL,
  `task_status` text DEFAULT NULL,
  `task_title` text DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `cattle_task_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_task`
--

INSERT INTO `cattle_task` (`cattle_task_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `cattle_code`, `task_date`, `task_type`, `assigned_person`, `task_status`, `task_title`, `task_description`, `cattle_task_pic`) VALUES
(4, 1, '2020-12-15 09:28:43', '2020-12-17 07:33:04', 0, '5', '2020-12-15', '3', '6', '2', 'tttt', 'Nai', 'http://localhost/cims10_12/cattle_module/cattle_task/images/Donkey_in_Clovelly,_North_Devon,_England.jpg'),
(5, 1, '2020-12-15 09:37:26', '2020-12-19 06:26:53', 1, '5', '2020-12-15', '', '', '', '', '', 'http://localhost/cims10_12/cattle_module/cattle_task/images/images.jpg'),
(6, 1, '2020-12-15 09:44:22', NULL, 0, '4', '2020-12-15', '2', '5', '2', 'tttttt', 'ghhhhhhhhhh', 'http://localhost/cims10_12/cattle_module/cattle_task/images/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chari`
--

CREATE TABLE `chari` (
  `chari_id` int(11) NOT NULL,
  `chari_code` text NOT NULL,
  `chari_name` text NOT NULL,
  `size` text NOT NULL,
  `unit` text NOT NULL,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chari`
--

INSERT INTO `chari` (`chari_id`, `chari_code`, `chari_name`, `size`, `unit`, `farm_id`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(3, '202012-3', 'Demo 1', '2345', '2', 3, 1, '2020-12-15 05:00:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chari_unit`
--

CREATE TABLE `chari_unit` (
  `chari_unit_id` int(11) NOT NULL,
  `chari_unit_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chari_unit`
--

INSERT INTO `chari_unit` (`chari_unit_id`, `chari_unit_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Unit A', 1, '2020-12-15 04:46:35', 2020, 1),
(3, 'Unit A', 1, '2020-12-19 06:08:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(42, 'ygggg', 1, '2020-12-17 05:43:58', 2020, 0),
(43, 'Red', 1, '2020-12-19 07:29:01', NULL, 0),
(44, 'Blackee', 1, '2020-12-22 19:51:27', NULL, 0),
(45, 'Yellow', 1, '2021-01-07 16:20:11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `conception_type`
--

CREATE TABLE `conception_type` (
  `conception_type_id` int(11) NOT NULL,
  `conception_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `costing_type`
--

CREATE TABLE `costing_type` (
  `costing_type_id` int(11) NOT NULL,
  `costing_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costing_type`
--

INSERT INTO `costing_type` (`costing_type_id`, `costing_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(4, 'Rent', 1, '2020-12-14 07:32:19', NULL, 0),
(5, 'Rent 1', 1, '2020-12-17 12:56:42', NULL, 0),
(6, '', 1, '2020-12-21 18:51:21', NULL, 0),
(7, 'Rent 4', 1, '2020-12-21 18:51:31', NULL, 0),
(8, '', 1, '2020-12-21 18:51:34', NULL, 0),
(9, '', 1, '2020-12-21 18:51:35', NULL, 0),
(10, '', 1, '2020-12-21 18:51:35', NULL, 0),
(11, 'Rent 4', 1, '2020-12-21 18:51:40', NULL, 0),
(12, 'Rent', 1, '2020-12-21 18:51:47', NULL, 0),
(13, '', 1, '2020-12-21 18:51:48', NULL, 0),
(14, '', 1, '2020-12-21 18:51:49', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_number` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_email` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_number`, `customer_address`, `customer_email`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Mofiz', '01793478194', 'Mirpur', 'mofiz@gmail.com', 1, '2020-12-17 11:42:00', 2020, 0),
(3, '', '', '', '', 1, '2020-12-22 19:55:21', NULL, 0),
(4, '', '', '', '', 1, '2020-12-22 19:55:22', NULL, 0),
(5, '', 'Phone number', '', '', 1, '2020-12-22 20:00:09', NULL, 0),
(6, '', '', '', 'does not show notification', 1, '2020-12-22 20:00:48', NULL, 0),
(7, '', '', '', '', 1, '2020-12-22 20:15:28', NULL, 0),
(8, '', '', '', '', 1, '2020-12-22 20:15:28', NULL, 0),
(9, '', '', '', '', 1, '2020-12-22 20:15:37', NULL, 0),
(10, '', '', '', '', 1, '2020-12-22 20:15:37', NULL, 0),
(11, '', '', '', '', 1, '2020-12-22 20:15:39', NULL, 0),
(12, '', '', '', '', 1, '2020-12-22 20:15:39', NULL, 0),
(13, '', '', '', '', 1, '2020-12-22 20:15:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Manager', 1, '2020-12-13 05:51:19', 2020, 0),
(3, 'Accountant', 1, '2020-12-13 05:54:01', 2020, 0),
(4, 'Adimn', 1, '2020-12-17 06:37:48', NULL, 0),
(5, '', 1, '2020-12-23 19:48:01', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_profile`
--

CREATE TABLE `doctor_profile` (
  `dp_id` int(11) NOT NULL,
  `dr_name` text NOT NULL,
  `address` text NOT NULL,
  `chamber_address` text NOT NULL,
  `phone_no_1` text NOT NULL,
  `phone_no_2` text NOT NULL,
  `email` text NOT NULL,
  `social_media` text NOT NULL,
  `dr_helping_hand` text NOT NULL,
  `dr_helping_hand_contact` text NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chamber_timing_start` time NOT NULL,
  `chamber_timing_end` time NOT NULL,
  `day_off` text DEFAULT NULL,
  `visiting_charge_in_chamber` double NOT NULL,
  `visiting_charge_in_farm` double NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_profile`
--

INSERT INTO `doctor_profile` (`dp_id`, `dr_name`, `address`, `chamber_address`, `phone_no_1`, `phone_no_2`, `email`, `social_media`, `dr_helping_hand`, `dr_helping_hand_contact`, `date`, `user_id`, `chamber_timing_start`, `chamber_timing_end`, `day_off`, `visiting_charge_in_chamber`, `visiting_charge_in_farm`, `create_date`, `update_date`, `delete_status`) VALUES
(3, 'Anas 90', '11', '111', '111', '', '111@gmail.com', 'fgrtfhy.com/111', '', '11', '2020-12-01', 1, '00:00:00', '13:14:00', '', 11111, 1111, '2020-12-01', '2020-12-20', 0),
(4, 'Anas Ahmed', 'Lalbag', 'vdffg', '12345678', '23456', '1@gmail.com', 'fgrtfhy.com/1', '', '23456', '2020-12-03', 1, '00:00:00', '00:00:00', 'Saturdays', 23, 234, '2020-12-01', '2020-12-20', 1),
(5, 'Mr X', 'Azimpur', 'Kolkata', '12345678', 'gjgj', 'x@gmail.com', 'fgrtfhy.com/f4', 'Firuk', '2345678', NULL, 1, '16:22:00', '21:22:00', 'Wednesday', 3456789, 23453234, '2020-12-14', '2020-12-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_type`
--

CREATE TABLE `doctor_type` (
  `doctor_type_id` int(11) NOT NULL,
  `doctor_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile`
--

CREATE TABLE `employee_profile` (
  `employee_profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `emp_name` text DEFAULT NULL,
  `designation` text NOT NULL,
  `phone` text NOT NULL,
  `social_media` text DEFAULT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `contact_person` text DEFAULT NULL,
  `contact_person_details` text DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `role` text DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `farm_id` text NOT NULL,
  `employee_profile_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_profile`
--

INSERT INTO `employee_profile` (`employee_profile_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `emp_name`, `designation`, `phone`, `social_media`, `email`, `address`, `contact_person`, `contact_person_details`, `dob`, `gender`, `role`, `permission`, `user_name`, `password`, `farm_id`, `employee_profile_pic_url`) VALUES
(4, 1, '2020-12-12 05:52:51', '2020-12-20 16:52:48', 0, 'Masud7', '2', '01793478194', '#', 'anasbinsabiet@gmail.com', 'Mirpur', 'Father', '', '2020-12-09', '2', '2', '2', 'Boss User', '234567654', '3', 'https://gorukhamari.com//farm_module/employee_profile/images/download (1).jpg'),
(5, 1, '2020-12-12 05:54:45', '2020-12-12 06:23:20', 0, '2534522523', '1', '89', '34', 'data@gmail.com', '34', '6', '34', '2020-12-09', '', '', '', '', '', '', 'http://localhost/cims10_12//farm_module/employee_profile/images/images.jpg'),
(6, 1, '2020-12-12 11:12:52', NULL, 0, 'Kabir', '3', '01793478194', 'fgrtfhy.com/f4', 'kabir@gmail.com', 'Farmgate', 'Father', '01642616124', '2020-12-10', '1', NULL, NULL, NULL, NULL, '2', 'http://localhost/cims10_12//farm_module/employee_profile/images/Donkey_in_Clovelly,_North_Devon,_England.jpg'),
(7, 1, '2020-12-12 13:38:24', NULL, 0, 'ttt', '2', '01793478344', 'fgrtfhy.com/f4', 'c1@gmail.com', 'Mirpur', 'Father', '01642616124', '2020-12-03', '1', NULL, NULL, NULL, NULL, '2', 'http://localhost/cims10_12//farm_module/employee_profile/images/images.jpg'),
(8, 1, '2020-12-12 13:39:11', NULL, 0, 'Masud', '1', '01793478194', '#', 'anasbinsabiet@gmail.com', 'Mirpur', 'Father', '01642616124', '2020-12-04', '1', NULL, NULL, NULL, NULL, '1', 'http://localhost/cims10_12//farm_module/employee_profile/images/Donkey_in_Clovelly,_North_Devon,_England.jpg'),
(9, 1, '2020-12-17 07:46:29', NULL, 0, 'Masud1', '2', '01793478194', 'fgrtfhy.com/f4', 'anas@gmail.com', 'Farmgate', 'Father', '01642616124', '2020-12-17', '1', NULL, NULL, NULL, NULL, '3', 'http://localhost/cims16_12//farm_module/employee_profile/images/Donkey_in_Clovelly,_North_Devon,_England.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `farm_profile`
--

CREATE TABLE `farm_profile` (
  `farm_profile_id` int(11) NOT NULL,
  `fp_name` text NOT NULL,
  `start_date` date NOT NULL,
  `total_cow` int(11) NOT NULL,
  `total_chari` int(11) NOT NULL,
  `total_storage` double NOT NULL,
  `total_required_employee` double NOT NULL,
  `manager` int(11) NOT NULL,
  `contact_no` text NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_profile`
--

INSERT INTO `farm_profile` (`farm_profile_id`, `fp_name`, `start_date`, `total_cow`, `total_chari`, `total_storage`, `total_required_employee`, `manager`, `contact_no`, `address`, `remarks`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(3, 'My Agro', '2020-12-16', 100, 560, 34567, 70, 4, '01793478194', 'Azimpur', 'fghfghty', 1, '2020-12-10', '2020-12-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farm_user`
--

CREATE TABLE `farm_user` (
  `farm_user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `full_name` text NOT NULL,
  `farm_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` timestamp NULL DEFAULT NULL,
  `user_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_user`
--

INSERT INTO `farm_user` (`farm_user_id`, `user_name`, `user_email`, `user_password`, `permission_id`, `full_name`, `farm_id`, `employee_id`, `user_id`, `user_created_at`, `user_update`, `user_delete`) VALUES
(1, 'Master User ', 'master@icm.com ', '$2y$10$FuAs7R2SHQgxLTeZLB2sJ.oF27MdCLiSDe05ZDgM//LzfgxfSSDza', 0, '', 0, 0, 0, '2020-10-28 07:05:16', NULL, 0),
(4, 'Noor', 'noorgmail.com', '$2y$10$sV8UFIkNIuQsNyaAQkRmN.Uu1/j8pZIiWNvlLPF9K.d3DXaA4TVZq', 3, 'Noor', 3, 5, 1, '2020-11-21 10:37:16', '2020-12-23 18:49:10', 0),
(6, 'jabedakhter@gmail.com', 'jabedakhter@gmail.com', '$2y$10$WoevcRDcfVnvVgfwaxFKmelnlkf/l49Ws8IiS6gOlabyxepnYynlq', 1, 'jabed akhter', 1, 0, 1, '2020-12-15 14:25:06', NULL, 0),
(9, 'Anas', 'anasbinsabiet@gmail.com', '$2y$10$EFQVqwcCSqoNPYA2XqaJf.s2vdrYJ2vaxiQiBjWp7v4fEaj01licG', NULL, 'Anas Ahmed', 3, 6, 1, '2020-12-19 12:17:20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `food_type` text NOT NULL,
  `food_desc` text NOT NULL,
  `unit` double NOT NULL,
  `unit_price` double NOT NULL,
  `food_pic` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_type`, `food_desc`, `unit`, `unit_price`, `food_pic`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(1, 'Mixed', '2', '1111', 0, 0, '', 1, '2020-12-03 04:19:14', 2020, 1),
(2, 'Milk', '3', 'nai', 2, 60, 'http://localhost/cims16_12/food_module/food/images/bb.jpg', 1, '2020-12-15 05:22:40', 2020, 0),
(3, 'Demo 5', '2', 'nai', 0, 0, 'http://localhost/cims10_12/food_module/food/images/Donkey_in_Clovelly,_North_Devon,_England.jpg', 1, '2020-12-15 05:42:54', 2020, 0),
(4, 'Dry 1', '2', 'nai', 2, 70, 'http://localhost/cims10_12/food_module/food/images/download (1).jpg', 1, '2020-12-15 13:18:12', NULL, 0),
(5, 'Milk', '', '', 2, 67, '', 1, '2020-12-20 16:32:47', NULL, 0),
(6, 'Grass01', '', '', 2, 56, '', 1, '2020-12-20 16:40:18', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_formula`
--

CREATE TABLE `food_formula` (
  `food_formula_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `select_date` date DEFAULT NULL,
  `formula_code` text DEFAULT NULL,
  `item` text DEFAULT NULL,
  `total_cost` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `total_qty` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_formula`
--

INSERT INTO `food_formula` (`food_formula_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `select_date`, `formula_code`, `item`, `total_cost`, `remarks`, `total_qty`) VALUES
(14, 1, '2020-12-17 09:20:25', NULL, 0, '2020-11-30', '2345', NULL, '800', 'dg', 345),
(15, 1, '2020-12-20 18:37:48', NULL, 0, '2020-12-08', '2345', NULL, '345', 'fgfjh', 456),
(16, 1, '2020-12-15 06:18:09', '2020-12-20 18:36:05', 1, '2020-12-15', '202012-16', NULL, '500', 'fdgb', 345);

-- --------------------------------------------------------

--
-- Table structure for table `food_formula_details`
--

CREATE TABLE `food_formula_details` (
  `food_formula_details_id` int(11) NOT NULL,
  `food_formula_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `product` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `stock_in_fi_details_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_formula_details`
--

INSERT INTO `food_formula_details` (`food_formula_details_id`, `food_formula_id`, `user_id`, `create_date`, `product`, `unit`, `quantity`, `unit_cost`, `stock_in_fi_details_pic_url`) VALUES
(78, 16, 1, '2020-12-15 06:18:09', '2', '2', 456, 456, NULL),
(79, 16, 1, '2020-12-15 06:18:09', '3', '2', 456, 456, NULL),
(80, 14, 1, '2020-12-17 09:20:25', '3', '1', 4, 4, NULL),
(81, 15, 1, '2020-12-20 18:37:48', '1', '1', 345, 345, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_formula_item`
--

CREATE TABLE `food_formula_item` (
  `food_formula_item_id` int(11) NOT NULL,
  `food_formula_item_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_formula_unit`
--

CREATE TABLE `food_formula_unit` (
  `food_formula_unit_id` int(11) NOT NULL,
  `food_formula_unit_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_formula_unit`
--

INSERT INTO `food_formula_unit` (`food_formula_unit_id`, `food_formula_unit_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'KG', 1, '2020-12-15 06:07:46', NULL, 0),
(3, '6kg', 1, '2020-12-19 16:00:50', NULL, 0),
(4, '2KG', 1, '2020-12-19 16:03:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `food_type_id` int(11) NOT NULL,
  `food_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`food_type_id`, `food_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Dry', 1, '2020-12-15 05:15:57', 2020, 0),
(3, 'Hybrid', 1, '2020-12-15 05:19:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fpft`
--

CREATE TABLE `fpft` (
  `fpft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `select_date` date DEFAULT NULL,
  `time` time NOT NULL,
  `chari_no` text DEFAULT NULL,
  `feeding_formula_no` text NOT NULL,
  `total_food_amount` text DEFAULT NULL,
  `total_wastage` text NOT NULL,
  `farm_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `cow_avg_weight` text DEFAULT NULL,
  `feed_avg_weight_against_each_cattle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpft`
--

INSERT INTO `fpft` (`fpft_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `select_date`, `time`, `chari_no`, `feeding_formula_no`, `total_food_amount`, `total_wastage`, `farm_id`, `remarks`, `cow_avg_weight`, `feed_avg_weight_against_each_cattle`) VALUES
(15, 1, '2020-12-20 17:30:03', '2020-12-20 18:00:08', 1, '2020-12-17', '06:10:00', '3', '16', '900', '346', '3', 'omuk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fpftcl`
--

CREATE TABLE `fpftcl` (
  `fpftcl_id` int(11) NOT NULL,
  `fpft_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `product` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `fpft_details_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpftcl`
--

INSERT INTO `fpftcl` (`fpftcl_id`, `fpft_id`, `user_id`, `create_date`, `product`, `unit`, `amount`, `fpft_details_pic_url`) VALUES
(80, 15, 1, '2020-12-20 17:30:03', '2', '2', '5000', NULL),
(81, 15, 1, '2020-12-20 17:30:03', '3', '2', '9', NULL),
(82, 15, 1, '2020-12-20 17:30:03', '3', '2', '78', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `growth_tracking`
--

CREATE TABLE `growth_tracking` (
  `growth_tracking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `cattle_code` text DEFAULT NULL,
  `select_date` date DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `width` text DEFAULT NULL,
  `length` text DEFAULT NULL,
  `teeth` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `growth_tracking_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `growth_tracking`
--

INSERT INTO `growth_tracking` (`growth_tracking_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `cattle_code`, `select_date`, `weight`, `height`, `width`, `length`, `teeth`, `age`, `remarks`, `growth_tracking_pic_url`) VALUES
(3, 1, '2020-11-30 12:58:24', '2020-12-17 07:38:16', 0, '5', '2020-11-12', '234', '234', '234', '234', '2', '3', 'ttt', 'http://localhost/cims16_12/cattle_module/growth_tracking/images/b1.jpg'),
(4, 1, '2020-12-21 21:08:06', NULL, 0, '3', '2020-12-21', '55', '555555', '55', '55', '55', '12', '', ''),
(5, 1, '2021-01-07 17:17:08', NULL, 0, '8', '2021-01-01', '350', '57', '32', '74', '2', '2', '', 'http://gorukhamari.com/cattle_module/growth_tracking/images/83374743-e234-48fa-8035-257912cac59b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `health_checkup`
--

CREATE TABLE `health_checkup` (
  `hc_id` int(11) NOT NULL,
  `cattle_id` text NOT NULL,
  `date` date NOT NULL,
  `dr_id` int(11) NOT NULL,
  `dr_advise` text NOT NULL,
  `medicine_id` text DEFAULT NULL,
  `dr_visiting_time` time DEFAULT NULL,
  `medicine_routine_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `problem_type` text NOT NULL,
  `problem_details` text NOT NULL,
  `problem_area` text NOT NULL,
  `health_checkup_pic` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_checkup`
--

INSERT INTO `health_checkup` (`hc_id`, `cattle_id`, `date`, `dr_id`, `dr_advise`, `medicine_id`, `dr_visiting_time`, `medicine_routine_id`, `remarks`, `problem_type`, `problem_details`, `problem_area`, `health_checkup_pic`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, '4', '2020-12-01', 3, 'ok', '2', '00:00:00', 2, 'wefgrt1111', '6', 'No Problem', '3', 'http://localhost/cims10_12/health_module/health_checkup/images/d1.png', 1, '2020-12-20', '2020-12-01', 0),
(3, '6', '0000-00-00', 5, 'fdghfh', '2', '04:44:00', 3, 'gffdhy', '2', 'No Problem', '4', 'http://localhost/cims10_12/health_module/health_checkup/images/download (1).jpg', 1, '2020-12-17', NULL, 0),
(4, '4', '2020-12-01', 3, '', '2', '17:55:00', 2, 'gffdhy', '2', 'No Problem', '3', 'http://localhost/cims10_12/health_module/health_checkup/images/Donkey_in_Clovelly,_North_Devon,_England.jpg', 1, '2020-12-20', NULL, 0),
(5, '6', '2020-12-20', 3, '', '2', '17:00:00', 2, 'fghfghty', '4', 'hjk', '5', 'health_module/health_checkup/images/download.jpg', 1, '2020-12-20', NULL, 0),
(6, '3', '2020-12-08', 3, '', '2', '06:06:00', 2, 'omuk', '2', 'fgdfs', '3', 'https://gorukhamari.com/health_module/health_checkup/images/Screenshot (32)_LI.jpg', 1, '2020-12-20', '2020-12-20', 1),
(7, '7', '2020-12-21', 3, '', '', '00:00:00', 0, '', '', '', '0', '', 1, '2020-12-21', NULL, 0),
(8, '7', '2020-12-21', 3, '', '', '00:00:00', 0, '', '', '', '0', '', 1, '2020-12-21', NULL, 0),
(9, '5', '2020-12-24', 5, '', '', '00:00:00', 0, '', '', '', '0', '', 1, '2020-12-21', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `health_tracking`
--

CREATE TABLE `health_tracking` (
  `ht_id` int(11) NOT NULL,
  `cattle_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `problem_type` text NOT NULL,
  `problem_details` text NOT NULL,
  `problem_area` text NOT NULL,
  `medication_type` text NOT NULL,
  `medication_details` text NOT NULL,
  `medication_routine_id` text NOT NULL,
  `dr_id` text NOT NULL,
  `dr_visiting_time` time NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `health_checkup_id` text NOT NULL,
  `remarks` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_tracking`
--

INSERT INTO `health_tracking` (`ht_id`, `cattle_id`, `date`, `problem_type`, `problem_details`, `problem_area`, `medication_type`, `medication_details`, `medication_routine_id`, `dr_id`, `dr_visiting_time`, `user_id`, `health_checkup_id`, `remarks`, `create_date`, `update_date`, `delete_status`) VALUES
(3, 111, '2020-12-01', 'dfgvtrdhb11', 'dfdgtr111', 'gfhby11', 'drtfgerg11', 'rtfgerstg11', '34511', '566711', '13:38:00', 1, '611', 'w11', '2020-12-01', '2020-12-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land_collection`
--

CREATE TABLE `land_collection` (
  `collection_id` int(11) NOT NULL,
  `collection_code` text NOT NULL,
  `collection_date` date NOT NULL,
  `amount` double NOT NULL,
  `land_code` text NOT NULL,
  `agro_products` text NOT NULL,
  `remarks` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_collection`
--

INSERT INTO `land_collection` (`collection_id`, `collection_code`, `collection_date`, `amount`, `land_code`, `agro_products`, `remarks`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(5, '202012-5', '2020-12-15', 5000, '1', '2', 'nai', 1, '2020-12-15', '2020-12-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land_costing`
--

CREATE TABLE `land_costing` (
  `lc_id` int(11) NOT NULL,
  `land_code` int(11) NOT NULL,
  `costing_type` text NOT NULL,
  `cost_amount` text NOT NULL,
  `user_id` text NOT NULL,
  `remarks` text NOT NULL,
  `land_costing_pic` text DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_costing`
--

INSERT INTO `land_costing` (`lc_id`, `land_code`, `costing_type`, `cost_amount`, `user_id`, `remarks`, `land_costing_pic`, `create_date`, `update_date`, `delete_status`) VALUES
(9, 1, '4', '60000', '1', '', 'http://localhost/cims10_12/land_module/land_costing/images/Donkey_in_Clovelly,_North_Devon,_England.jpg', '2020-12-14', '2020-12-21', 0),
(10, 1, '4', '53', '1', '3453', 'http://gorukhamari.com/land_module/land_costing/images/Screenshot (53).png', '2020-12-21', '2020-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `land_profile`
--

CREATE TABLE `land_profile` (
  `land_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `land_code` text NOT NULL,
  `land_type` text NOT NULL,
  `land_location` text NOT NULL,
  `land_size` text NOT NULL,
  `land_ownership_date` date NOT NULL,
  `date_of_purchase` date NOT NULL,
  `ownership_renew_date` date NOT NULL,
  `remarks` text NOT NULL,
  `land_value` text NOT NULL,
  `cs_no` text NOT NULL,
  `rs_no` text NOT NULL,
  `bs_no` text NOT NULL,
  `land_profile_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_profile`
--

INSERT INTO `land_profile` (`land_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `land_code`, `land_type`, `land_location`, `land_size`, `land_ownership_date`, `date_of_purchase`, `ownership_renew_date`, `remarks`, `land_value`, `cs_no`, `rs_no`, `bs_no`, `land_profile_pic`) VALUES
(1, 1, NULL, '2020-12-21 20:17:23', 0, '10', '3', 'Azimpura', 'Small', '2020-12-05', '2020-12-06', '2020-12-12', 'Nai', '456789', '9000', '345678', '2345678', 'http://localhost/cims_v01/land_module/land_profile/images/d1.png'),
(5, 1, '2020-12-01 05:32:48', '2020-12-01 05:53:39', 1, '234', 'fdgb', 'Azimpur', '345', '1970-01-01', '1970-01-01', '1970-01-01', '', '3456', '', '', '', '<br />\r\n<b>Notice</b>:  Undefined index: base_url in <b>C:\\xampp\\htdocs\\cims_v01\\land_module\\land_profile\\action.php</b> on line <b>15</b><br />\r\nland_module/land_profile/images/images.jpg'),
(6, 1, '2020-12-01 05:32:48', NULL, 0, '234', 'fdgb', 'Azimpur', '345', '1970-01-01', '1970-01-01', '1970-01-01', '', '3456', '', '', '', '<br />\r\n<b>Notice</b>:  Undefined index: base_url in <b>C:\\xampp\\htdocs\\cims_v01\\land_module\\land_profile\\action.php</b> on line <b>15</b><br />\r\nland_module/land_profile/images/images.jpg'),
(7, 1, '2020-12-01 05:33:46', '2020-12-01 05:34:09', 0, '9', '23456', '23456', '23456', '1970-01-01', '1970-01-01', '1970-01-01', 'nai', '2345', '234', '2345', '2345r', '<br />\r\n<b>Notice</b>:  Undefined index: base_url in <b>C:\\xampp\\htdocs\\cims_v01\\land_module\\land_profile\\action.php</b> on line <b>15</b><br />\r\nland_module/land_profile/images/images.jpg'),
(8, 1, '2020-12-01 05:50:05', NULL, 0, '', '', '', '', '1970-01-01', '1970-01-01', '1970-01-01', '', '', '', '', '', 'http://localhost/cims_v01/land_module/land_profile/images/download.jpg'),
(9, 1, '2020-12-14 07:04:50', '2020-12-14 07:06:27', 0, '202012-9', '5', 'Badda', '345', '2020-12-01', '2020-12-16', '2020-12-10', 'dsfvger', '234', '3456', '346', '45', 'http://localhost/cims10_12/land_module/land_profile/images/Donkey_in_Clovelly,_North_Devon,_England.jpg'),
(10, 1, '2020-12-21 19:57:23', NULL, 0, '202012-10', '', '', '', '1970-01-01', '1970-01-01', '1970-01-01', '', '', '', '', '', 'http://gorukhamari.com/land_module/land_profile/images/Screenshot (50).png'),
(11, 1, '2020-12-21 20:04:17', '2020-12-21 20:21:13', 1, '202012-11', '', '', '', '1970-01-01', '1970-01-01', '1970-01-01', '', '', 'be', 'you', 'tu', ''),
(12, 1, '2020-12-21 20:05:53', '2020-12-21 20:21:03', 1, '202012-12', '', '', '', '1970-01-01', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(13, 1, '2020-12-27 19:31:52', NULL, 0, '202012-13', '3', 'esdfs', '444', '2020-12-08', '2020-12-09', '2020-12-28', '44', '444', '444', '44', '444', '');

-- --------------------------------------------------------

--
-- Table structure for table `land_task`
--

CREATE TABLE `land_task` (
  `lt_id` int(11) NOT NULL,
  `lt_name` text NOT NULL,
  `lt_code` text NOT NULL,
  `lt_date` text NOT NULL,
  `work_type` text NOT NULL,
  `labour_amount` text NOT NULL,
  `task_description` text NOT NULL,
  `assigned_person` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_task`
--

INSERT INTO `land_task` (`lt_id`, `lt_name`, `lt_code`, `lt_date`, `work_type`, `labour_amount`, `task_description`, `assigned_person`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Info', '9', '2020-12-01', '3', '6', 'Nai', '9', 1, '2020-12-01', '2020-12-17', 0),
(3, '', '', '', '', '', '', '', 1, '2020-12-21', '2020-12-21', 1),
(4, '', '9', '', '', '56', '', '', 1, '2020-12-21', '2020-12-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land_type`
--

CREATE TABLE `land_type` (
  `land_type_id` int(11) NOT NULL,
  `land_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_type`
--

INSERT INTO `land_type` (`land_type_id`, `land_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Owned', 1, '2020-12-14 06:27:42', 2020, 0),
(3, 'Buy', 1, '2020-12-14 06:27:48', NULL, 0),
(4, 'Ledge', 1, '2020-12-14 06:27:56', NULL, 0),
(5, 'Others', 1, '2020-12-14 06:33:22', NULL, 0),
(6, 'owned', 1, '2020-12-21 17:12:09', NULL, 0),
(7, '65767', 1, '2020-12-21 17:12:43', NULL, 0),
(8, '', 1, '2020-12-21 17:33:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Mirpur', 1, '2020-12-16 14:52:06', NULL, 0),
(3, 'Azimpur', 1, '2020-12-17 11:51:53', NULL, 0),
(4, '', 1, '2020-12-22 20:44:17', NULL, 0),
(5, 'shyamoli', 1, '2020-12-22 20:56:20', NULL, 0),
(6, 'Mohammadpur', 1, '2020-12-22 21:31:38', NULL, 0),
(7, '', 1, '2020-12-22 21:31:42', NULL, 0),
(8, '', 1, '2020-12-22 21:31:42', NULL, 0),
(9, '', 1, '2020-12-22 21:31:43', NULL, 0),
(10, '', 1, '2020-12-22 21:31:43', NULL, 0),
(11, '', 1, '2020-12-22 21:31:43', NULL, 0),
(12, '', 1, '2020-12-22 21:31:43', NULL, 0),
(13, '', 1, '2020-12-22 21:31:43', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `login_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_role_name` text NOT NULL,
  `visitor_ip` text NOT NULL,
  `visitor_location` text NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visitor_visit_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`login_log_id`, `user_id`, `user_name`, `user_role_id`, `user_role_name`, `visitor_ip`, `visitor_location`, `createdate`, `visitor_visit_time`) VALUES
(1, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-11-23 09:40:59', '2020-11-23'),
(2, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-11-23 14:44:15', '2020-11-23'),
(3, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-11-23 14:44:51', '2020-11-23'),
(4, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-02 04:15:43', '2020-12-02'),
(5, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-02 06:51:28', '2020-12-02'),
(6, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-03 04:26:41', '2020-12-03'),
(7, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-05 04:03:26', '2020-12-05'),
(8, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-05 10:35:38', '2020-12-05'),
(9, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-06 04:37:22', '2020-12-06'),
(10, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:12:25', '2020-12-10'),
(11, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:14:12', '2020-12-10'),
(12, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:10', '2020-12-10'),
(13, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:16', '2020-12-10'),
(14, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:22', '2020-12-10'),
(15, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:43', '2020-12-10'),
(16, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:45', '2020-12-10'),
(17, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:46', '2020-12-10'),
(18, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:47', '2020-12-10'),
(19, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:15:59', '2020-12-10'),
(20, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:00', '2020-12-10'),
(21, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:02', '2020-12-10'),
(22, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:04', '2020-12-10'),
(23, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:15', '2020-12-10'),
(24, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:17', '2020-12-10'),
(25, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:18', '2020-12-10'),
(26, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:20', '2020-12-10'),
(27, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:21', '2020-12-10'),
(28, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:22', '2020-12-10'),
(29, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:37', '2020-12-10'),
(30, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:39', '2020-12-10'),
(31, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:16:42', '2020-12-10'),
(32, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:17:07', '2020-12-10'),
(33, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:18:30', '2020-12-10'),
(34, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:30:18', '2020-12-10'),
(35, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:31:29', '2020-12-10'),
(36, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:32:36', '2020-12-10'),
(37, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:33:37', '2020-12-10'),
(38, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:34:35', '2020-12-10'),
(39, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:35:27', '2020-12-10'),
(40, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:44:01', '2020-12-10'),
(41, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:47:33', '2020-12-10'),
(42, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:48:58', '2020-12-10'),
(43, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:52:25', '2020-12-10'),
(44, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:53:46', '2020-12-10'),
(45, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 04:54:06', '2020-12-10'),
(46, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:03:51', '2020-12-10'),
(47, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:05:55', '2020-12-10'),
(48, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:20:33', '2020-12-10'),
(49, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:20:41', '2020-12-10'),
(50, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:27:07', '2020-12-10'),
(51, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:27:17', '2020-12-10'),
(52, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:28:41', '2020-12-10'),
(53, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:29:01', '2020-12-10'),
(54, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:38:23', '2020-12-10'),
(55, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:42:59', '2020-12-10'),
(56, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:01', '2020-12-10'),
(57, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:03', '2020-12-10'),
(58, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:04', '2020-12-10'),
(59, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:05', '2020-12-10'),
(60, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:06', '2020-12-10'),
(61, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:43:49', '2020-12-10'),
(62, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:44:05', '2020-12-10'),
(63, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:44:31', '2020-12-10'),
(64, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 05:44:42', '2020-12-10'),
(65, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 07:02:31', '2020-12-10'),
(66, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 07:03:02', '2020-12-10'),
(67, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 07:09:04', '2020-12-10'),
(68, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-10 13:18:44', '2020-12-10'),
(69, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 04:36:33', '2020-12-12'),
(70, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 04:59:17', '2020-12-12'),
(71, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:14:09', '2020-12-12'),
(72, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:15:07', '2020-12-12'),
(73, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:33:52', '2020-12-12'),
(74, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:36:39', '2020-12-12'),
(75, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:38:36', '2020-12-12'),
(76, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-12 05:59:08', '2020-12-12'),
(77, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 04:58:00', '2020-12-13'),
(78, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 08:59:41', '2020-12-13'),
(79, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 09:07:09', '2020-12-13'),
(80, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 09:12:53', '2020-12-13'),
(81, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 09:16:28', '2020-12-13'),
(82, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 09:30:00', '2020-12-13'),
(83, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-13 09:31:07', '2020-12-13'),
(84, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-14 04:34:22', '2020-12-14'),
(85, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-15 04:44:13', '2020-12-15'),
(86, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-15 05:40:05', '2020-12-15'),
(87, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-16 13:20:11', '2020-12-16'),
(88, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-16 18:27:23', '2020-12-16'),
(89, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-17 05:03:30', '2020-12-17'),
(90, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-17 07:17:56', '2020-12-17'),
(91, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-17 09:41:05', '2020-12-17'),
(92, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-17 12:24:26', '2020-12-17'),
(93, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-17 19:03:18', '2020-12-17'),
(94, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-19 06:00:37', '2020-12-19'),
(95, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-19 08:53:43', '2020-12-19'),
(96, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-19 12:05:53', '2020-12-19'),
(97, 0, 'Anas', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-19 12:17:34', '2020-12-19'),
(98, 0, 'Master User', 0, '', '::1', 'Zip Code : , City : , Division : , Country : , Latitude : , Longitude : ', '2020-12-19 13:23:09', '2020-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `medication_routine`
--

CREATE TABLE `medication_routine` (
  `mr_id` int(11) NOT NULL,
  `cattle_id` int(11) NOT NULL,
  `medicine_name` text NOT NULL,
  `dr_name` text NOT NULL,
  `problem_type` text NOT NULL,
  `problem_area` text NOT NULL,
  `duration_date_from` date NOT NULL,
  `duration_date_to` date NOT NULL,
  `how_many_time` text NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication_routine`
--

INSERT INTO `medication_routine` (`mr_id`, `cattle_id`, `medicine_name`, `dr_name`, `problem_type`, `problem_area`, `duration_date_from`, `duration_date_to`, `how_many_time`, `remarks`, `date`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 4, '2', '3', '2', '3', '2020-12-01', '2020-12-01', '411', 'wefgrt11', '2021-01-01', 1, '2020-12-01', '2020-12-21', 0),
(3, 3, '2', '3', '2', '4', '2020-12-23', '2020-12-10', '6', 'nai', '0000-00-00', 1, '2020-12-14', '2020-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` text NOT NULL,
  `med_gen_name` text NOT NULL,
  `med_purpose` text NOT NULL,
  `med_price_in_set` double DEFAULT NULL,
  `med_unit` text NOT NULL,
  `med_amount` text DEFAULT NULL,
  `unit_price` double NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `health_checkup_id` text DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_gen_name`, `med_purpose`, `med_price_in_set`, `med_unit`, `med_amount`, `unit_price`, `user_id`, `health_checkup_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Napa Extra', '111', 'pain', 111, '2', '560111', 349011, 1, '5111', '2020-12-01', '2020-12-21', 0),
(3, 'Alatrol', '', '', NULL, '2', NULL, 4, 1, NULL, '2020-12-21', '2020-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_unit`
--

CREATE TABLE `medicine_unit` (
  `medicine_unit_id` int(11) NOT NULL,
  `medicine_unit_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_unit`
--

INSERT INTO `medicine_unit` (`medicine_unit_id`, `medicine_unit_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'PCS', 1, '2020-12-14 09:39:05', NULL, 0),
(3, 'Packet', 1, '2020-12-14 09:39:15', NULL, 0),
(4, 'Bottles', 1, '2020-12-14 09:39:23', 2020, 0),
(5, 'Injection', 1, '2020-12-14 09:41:14', NULL, 0),
(6, 'Saline ', 1, '2020-12-20 19:38:38', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_access`
--

CREATE TABLE `page_access` (
  `page_access_id` int(100) NOT NULL,
  `page_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page_setup`
--

CREATE TABLE `page_setup` (
  `page_id` int(100) NOT NULL,
  `page_name` text NOT NULL,
  `page_url` text NOT NULL,
  `page_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `page_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `payment_status_id` int(11) NOT NULL,
  `payment_status_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`payment_status_id`, `payment_status_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Due', 1, '2020-12-15 12:31:57', NULL, 0),
(3, 'Paid', 1, '2020-12-17 11:52:56', NULL, 0),
(4, '', 1, '2020-12-22 19:20:39', NULL, 0),
(5, '5667', 1, '2020-12-22 19:20:48', NULL, 0),
(6, 'ghh', 1, '2020-12-22 19:20:53', NULL, 0),
(7, '', 1, '2020-12-22 19:20:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `problem_area`
--

CREATE TABLE `problem_area` (
  `problem_area_id` int(11) NOT NULL,
  `problem_area_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_area`
--

INSERT INTO `problem_area` (`problem_area_id`, `problem_area_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(3, 'Horn', 1, '2020-12-14 10:15:42', NULL, 0),
(4, 'Leg', 1, '2020-12-14 10:15:51', NULL, 0),
(5, 'Ear', 1, '2020-12-19 10:03:17', NULL, 0),
(6, 'Neck', 1, '2020-12-20 20:41:40', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `problem_type`
--

CREATE TABLE `problem_type` (
  `problem_type_id` int(11) NOT NULL,
  `problem_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_type`
--

INSERT INTO `problem_type` (`problem_type_id`, `problem_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Majors', 1, '2020-12-14 10:07:25', 2020, 0),
(3, 'minor', 1, '2020-12-20 20:14:53', NULL, 0),
(4, 'very high', 1, '2020-12-20 20:15:57', NULL, 0),
(5, 'Normal', 1, '2020-12-20 20:16:08', NULL, 0),
(6, '23', 1, '2020-12-20 20:16:13', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_cattle`
--

CREATE TABLE `stock_in_cattle` (
  `stock_in_cattle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `sic_date` date DEFAULT NULL,
  `supplier` text DEFAULT NULL,
  `farm_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_cattle`
--

INSERT INTO `stock_in_cattle` (`stock_in_cattle_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `sic_date`, `supplier`, `farm_id`, `remarks`) VALUES
(29, 1, '2020-12-15 14:02:14', NULL, 0, '2020-12-15', '2', '3', 'gffdhy'),
(31, 1, '2020-12-27 20:14:03', NULL, 0, '2020-12-23', '3', '3', 'hhhhhh'),
(32, 1, '2020-12-23 15:48:08', '2020-12-23 15:48:13', 1, '2020-12-23', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_cattle_details`
--

CREATE TABLE `stock_in_cattle_details` (
  `stock_in_cattle_details_id` int(11) NOT NULL,
  `stock_in_cattle_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `cattle` text DEFAULT NULL,
  `price` double NOT NULL,
  `buy_birth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_cattle_details`
--

INSERT INTO `stock_in_cattle_details` (`stock_in_cattle_details_id`, `stock_in_cattle_id`, `user_id`, `create_date`, `cattle`, `price`, `buy_birth`) VALUES
(115, 29, 1, '2020-12-15 14:02:14', '5', 0, ''),
(120, 28, 1, '2020-12-23 15:42:36', '', 6790, ''),
(123, 30, 1, '2020-12-23 15:43:38', '', 6000, ''),
(124, 32, 1, '2020-12-23 15:48:08', '', 500, ''),
(125, 31, 1, '2020-12-27 20:14:03', '3', 6790, '1'),
(126, 31, 1, '2020-12-27 20:14:03', '3', 6790, '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_fi`
--

CREATE TABLE `stock_in_fi` (
  `stock_in_fi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `select_date` date DEFAULT NULL,
  `supplier` text DEFAULT NULL,
  `silage` text DEFAULT NULL,
  `farm_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `source` text DEFAULT NULL,
  `collection_land` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_fi`
--

INSERT INTO `stock_in_fi` (`stock_in_fi_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `select_date`, `supplier`, `silage`, `farm_id`, `remarks`, `source`, `collection_land`) VALUES
(14, 1, '2020-12-22 22:23:15', NULL, 0, '2020-12-10', '3', '4', '3', 'yes', 'Land', '5'),
(15, 1, '2020-12-22 21:53:58', '2020-12-22 22:44:43', 1, '2020-12-22', '', '', '', '', 'Land', ''),
(16, 1, '2020-12-22 21:54:24', '2020-12-22 22:44:22', 1, '2020-12-22', '', '', '', '', 'Land', ''),
(17, 1, '2020-12-22 22:02:49', '2020-12-22 22:43:55', 1, '2020-12-22', '', '', '', '', 'Land', ''),
(18, 1, '2020-12-22 22:45:00', NULL, 0, '2020-12-22', '', '', '', '', 'Land', ''),
(19, 1, '2020-12-22 22:45:06', NULL, 0, '2020-12-22', '', '', '', '', 'Land', ''),
(20, 1, '2020-12-22 22:45:10', '2020-12-22 22:45:26', 1, '2020-12-22', '', '', '', '', 'Land', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_fi_details`
--

CREATE TABLE `stock_in_fi_details` (
  `stock_in_fi_details_id` int(11) NOT NULL,
  `stock_in_fi_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `product` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `stock_in_fi_details_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_fi_details`
--

INSERT INTO `stock_in_fi_details` (`stock_in_fi_details_id`, `stock_in_fi_id`, `user_id`, `create_date`, `product`, `unit`, `amount`, `stock_in_fi_details_pic_url`) VALUES
(59, 15, 1, '2020-12-22 21:53:58', '', '', '56', NULL),
(60, 15, 1, '2020-12-22 21:53:58', '', '', '56', NULL),
(61, 15, 1, '2020-12-22 21:53:58', '', '', '56', NULL),
(62, 15, 1, '2020-12-22 21:53:58', '', '', '56', NULL),
(63, 15, 1, '2020-12-22 21:53:58', '', '', '56', NULL),
(64, 16, 1, '2020-12-22 21:54:24', '', '', '098', NULL),
(65, 17, 1, '2020-12-22 22:02:49', '', '', '76', NULL),
(66, 14, 1, '2020-12-22 22:23:15', '3', '1', '5000', NULL),
(67, 18, 1, '2020-12-22 22:45:00', '', '', '546', NULL),
(68, 19, 1, '2020-12-22 22:45:06', '', '', '6546', NULL),
(69, 20, 1, '2020-12-22 22:45:10', '', '', '56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_med`
--

CREATE TABLE `stock_in_med` (
  `stock_in_med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `sim_date` date DEFAULT NULL,
  `med_supplier` text DEFAULT NULL,
  `storage_fridge_location` text DEFAULT NULL,
  `farm_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_med`
--

INSERT INTO `stock_in_med` (`stock_in_med_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `sim_date`, `med_supplier`, `storage_fridge_location`, `farm_id`, `remarks`) VALUES
(14, 1, '2020-12-17 12:39:47', NULL, 0, '2020-12-10', '3', '1', '3', 'Nai'),
(15, 1, '2020-12-16 15:48:37', NULL, 0, '2020-12-11', '2', '3', '3', 'fdgb');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_med_details`
--

CREATE TABLE `stock_in_med_details` (
  `stock_in_med_details_id` int(11) NOT NULL,
  `stock_in_med_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `medicine` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `stock_in_fi_details_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in_med_details`
--

INSERT INTO `stock_in_med_details` (`stock_in_med_details_id`, `stock_in_med_id`, `user_id`, `create_date`, `medicine`, `unit`, `amount`, `stock_in_fi_details_pic_url`) VALUES
(66, 15, 1, '2020-12-16 15:48:37', '1', '2', '670', NULL),
(67, 14, 1, '2020-12-17 12:39:47', '1', '2', '670', NULL),
(68, 14, 1, '2020-12-17 12:39:47', '2', '3', '8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_cattle`
--

CREATE TABLE `stock_out_cattle` (
  `stock_out_cattle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `soc_date` date DEFAULT NULL,
  `receiver` text NOT NULL,
  `receiver_contact` text NOT NULL,
  `customer` text DEFAULT NULL,
  `farm_id` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `discount` double NOT NULL,
  `payment_status` text NOT NULL,
  `delivery_charge` double NOT NULL,
  `vat` double NOT NULL,
  `tax` double NOT NULL,
  `amount_paid` double NOT NULL,
  `previous_due` double NOT NULL,
  `previous_last_due_date` date DEFAULT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_cattle`
--

INSERT INTO `stock_out_cattle` (`stock_out_cattle_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `soc_date`, `receiver`, `receiver_contact`, `customer`, `farm_id`, `location`, `discount`, `payment_status`, `delivery_charge`, `vat`, `tax`, `amount_paid`, `previous_due`, `previous_last_due_date`, `total_price`) VALUES
(29, 1, '2020-12-17 12:42:24', NULL, 0, '2020-12-10', 'Karim', '01793478194', '2', '3', '2', 50, '2', 60, 80, 75, 69000, 5000, '2020-12-10', 878000),
(30, 1, '2020-12-22 23:29:56', '2020-12-22 23:38:29', 1, '2020-12-02', 'Anas', '01793478194', '2', '3', '2', 345, '2', 45000, 0, 456, 578000, 5600, '2020-12-04', 345),
(31, 1, '2020-12-22 23:40:08', '2020-12-22 23:43:16', 1, '2020-12-22', 'Omuk', '0213456789', '2', '3', '5', 56, '3', 45000, 0, 456, 578000, 5600, '2020-12-22', 1),
(33, 1, '2020-12-23 17:35:38', '2020-12-23 17:38:08', 1, '2020-12-23', 'Anas', '01793478194', '2', '3', '2', 345, '2', 45000, 0, 456, 578000, 678, '2020-12-22', 33);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_cattle_details`
--

CREATE TABLE `stock_out_cattle_details` (
  `stock_out_cattle_details_id` int(11) NOT NULL,
  `stock_out_cattle_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `cattle` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `weight` double NOT NULL,
  `purpose` text NOT NULL,
  `loss_gain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_cattle_details`
--

INSERT INTO `stock_out_cattle_details` (`stock_out_cattle_details_id`, `stock_out_cattle_id`, `user_id`, `create_date`, `cattle`, `price`, `weight`, `purpose`, `loss_gain`) VALUES
(155, 29, 1, '2020-12-17 12:42:24', '3', 34567, 89, 'nai', '2'),
(156, 29, 1, '2020-12-17 12:42:24', '3', 150000, 234, 'edrftgyh', '2'),
(160, 30, 1, '2020-12-22 23:29:56', '2', 5600, 48, 'Nai', '2'),
(161, 30, 1, '2020-12-22 23:29:56', '3', 90000, 70, 'Nai', '1'),
(162, 30, 1, '2020-12-22 23:29:56', '1', 5600, 48, 'fghfdh', '1'),
(163, 31, 1, '2020-12-22 23:40:08', '3', 5060, 20, 'ty', '1'),
(167, 33, 1, '2020-12-23 17:35:38', '3', 6790, 89, 'ty', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_fi`
--

CREATE TABLE `stock_out_fi` (
  `stock_out_fi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `sofi_date` date DEFAULT NULL,
  `sell_cattle_use` text DEFAULT NULL,
  `reciver` text DEFAULT NULL,
  `receiver_contact` text NOT NULL,
  `silage_or_warehouse` text DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `delivery_charge` double NOT NULL,
  `payment_status` int(11) NOT NULL,
  `amount_paid` double NOT NULL,
  `previous_due_amount` double NOT NULL,
  `previous_last_due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_fi`
--

INSERT INTO `stock_out_fi` (`stock_out_fi_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `sofi_date`, `sell_cattle_use`, `reciver`, `receiver_contact`, `silage_or_warehouse`, `discount`, `vat`, `tax`, `delivery_charge`, `payment_status`, `amount_paid`, `previous_due_amount`, `previous_last_due_date`) VALUES
(18, 1, '2020-12-19 10:19:47', NULL, 0, '2020-12-04', '2', 'Anas1', '01793478194', '2', 78, 452, 70, 5635, 3, 54635, 645, '2020-12-24'),
(19, 1, '2020-12-15 12:10:59', NULL, 0, '2020-12-15', '2', 'Anas', '01793478194', '2', 78, 452, 70, 5635, 2, 54635, 645, '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_fi_details`
--

CREATE TABLE `stock_out_fi_details` (
  `stock_out_fi_details_id` int(11) NOT NULL,
  `stock_out_fi_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `product` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `stock_out_fi_details_pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_fi_details`
--

INSERT INTO `stock_out_fi_details` (`stock_out_fi_details_id`, `stock_out_fi_id`, `user_id`, `create_date`, `product`, `unit`, `quantity`, `price`, `stock_out_fi_details_pic_url`) VALUES
(51, 14, 1, '2020-12-09 08:31:09', '2', '3', 456, 0, NULL),
(55, 15, 1, '2020-12-09 09:34:03', '3', '2', 5000, 0, NULL),
(56, 15, 1, '2020-12-09 09:34:03', '2', '2', 80, 0, NULL),
(58, 16, 1, '2020-12-09 09:40:04', '3', '2', 670, 0, NULL),
(60, 17, 1, '2020-12-09 09:43:25', '2', '1', 670, 0, NULL),
(69, 19, 1, '2020-12-15 12:10:59', '2', '2', 345678, 345678, NULL),
(78, 18, 1, '2020-12-19 10:19:47', '3', '3', 90, 90, NULL),
(79, 18, 1, '2020-12-19 10:19:47', '1', '1', 345678, 345678, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_food_inventory`
--

CREATE TABLE `stock_out_food_inventory` (
  `sofi_id` int(11) NOT NULL,
  `sofi_date` date NOT NULL,
  `sell_cattle_use` text NOT NULL,
  `reciver` text NOT NULL,
  `receiver_contact` text NOT NULL,
  `silage_or_warehouse` text NOT NULL,
  `discount` double NOT NULL,
  `vat` double NOT NULL,
  `tax` double NOT NULL,
  `delivery_charge` double NOT NULL,
  `payment_status` text NOT NULL,
  `amount_paid` double NOT NULL,
  `previous_due_amount` double NOT NULL,
  `previous_last_due_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp(),
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_med`
--

CREATE TABLE `stock_out_med` (
  `stock_out_med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `som_date` date DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `receiver` text NOT NULL,
  `receiver_contact` text NOT NULL,
  `storage_location_fridge` text DEFAULT NULL,
  `farm_id` text DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_med`
--

INSERT INTO `stock_out_med` (`stock_out_med_id`, `user_id`, `create_date`, `update_date`, `delete_status`, `som_date`, `purpose`, `receiver`, `receiver_contact`, `storage_location_fridge`, `farm_id`, `total_amount`, `total_price`) VALUES
(15, 1, '2020-12-19 10:13:25', NULL, 0, '2020-12-04', '1', 'rr', '01793478194', '2', '3', 345, 345),
(16, 1, '2020-12-09 12:30:05', '2020-12-09 13:17:03', 1, '2020-12-10', 'edrftgyh', '', '', '1', '2', 345, 709),
(17, 1, '2020-12-09 12:30:56', NULL, 0, '2020-12-10', 'edrftgyh', '', '', '1', '2', 345, 14),
(18, 1, '2020-12-09 12:33:18', NULL, 0, '2020-12-10', 'ttt', '', '', '2', '1', 342, 70),
(19, 1, '2020-12-09 12:33:59', NULL, 0, '2020-11-30', 'edrftgyh', '', '', '2', '1', 342, 179),
(20, 1, '2020-12-09 13:04:01', NULL, 0, '2020-12-10', 'ttt', 'Yati', '01793478194', '2', '1', 345, 555),
(21, 1, '2020-12-09 13:17:36', NULL, 0, '2020-12-10', 'dfgy', 'Taal', '01793478194', '1', '2', 342, 709),
(22, 1, '2020-12-09 13:17:36', '2020-12-23 20:09:46', 1, '2020-12-10', 'dfgy', 'Taal', '01793478194', '1', '2', 342, 709);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_med_details`
--

CREATE TABLE `stock_out_med_details` (
  `stock_out_med_details_id` int(11) NOT NULL,
  `stock_out_med_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `medicine` text DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `price` double NOT NULL,
  `hc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out_med_details`
--

INSERT INTO `stock_out_med_details` (`stock_out_med_details_id`, `stock_out_med_id`, `user_id`, `create_date`, `medicine`, `unit`, `amount`, `price`, `hc_id`) VALUES
(0, 15, 1, '2020-12-19 10:13:25', '2', '2', '80', 80, 2),
(62, 17, 1, '2020-12-09 12:30:56', '2', '1', '5000', 0, 0),
(64, 18, 1, '2020-12-09 12:33:18', '2', '2', '80', 0, 0),
(66, 19, 1, '2020-12-09 12:33:59', '3', '2', '670', 0, 0),
(67, 14, 1, '2020-12-09 12:41:07', '2', '2', '5000', 0, 0),
(68, 14, 1, '2020-12-09 12:41:07', '2', '2', '80', 0, 0),
(71, 20, 1, '2020-12-09 13:04:01', NULL, '2', '670', 0, 0),
(72, 20, 1, '2020-12-09 13:04:01', NULL, '2', '9', 0, 0),
(86, 22, 1, '2020-12-09 13:17:36', '3', '2', '5000', 5000, 2),
(87, 22, 1, '2020-12-09 13:17:36', '3', '2', '5000', 5000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `storage_id` int(11) NOT NULL,
  `storage_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`storage_id`, `storage_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(1, 'Silage 1', 1, '2020-12-17 12:52:50', NULL, 0),
(4, 'Silage 9', 1, '2020-12-15 10:12:46', NULL, 0),
(5, 'Ware house #3', 1, '2020-12-22 15:56:13', NULL, 0),
(6, '    ', 1, '2020-12-22 15:56:39', NULL, 0),
(7, '', 1, '2020-12-22 15:57:45', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` text NOT NULL,
  `supplier_number` text NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_email` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_number`, `supplier_address`, `supplier_email`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Mahjuz', '01642616124', 'farmgate', 'mafuz@gmail.com', 1, '2020-12-15 10:23:59', 2020, 0),
(3, 'Anas', '01642616124', 'farmgate', 'anas@gmail.com', 1, '2020-12-17 12:33:00', NULL, 0),
(4, '', '', '', '', 1, '2020-12-22 16:44:27', NULL, 0),
(5, '', '', '', 'ki re vai ato vul kan....!!!!', 1, '2020-12-22 17:22:33', NULL, 0),
(6, '', 'Mobile 67', '', '', 1, '2020-12-22 17:26:22', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` text NOT NULL,
  `task_date` date NOT NULL,
  `description` text NOT NULL,
  `task_type` text NOT NULL,
  `employee_id` text NOT NULL,
  `deadline_date` date NOT NULL,
  `dealine_time` time NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_date`, `description`, `task_type`, `employee_id`, `deadline_date`, `dealine_time`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(4, 'Daily Clean', '2020-12-01', 'fghfjh rdtgr', '2', '4', '2020-12-15', '07:00:00', 1, '2020-12-12', '2020-12-14', 0),
(5, 'Padma Bridge', '2020-12-14', 'Nai vvv', '3', '6', '2020-12-15', '15:12:00', 1, '2020-12-14', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_complete`
--

CREATE TABLE `task_complete` (
  `task_complete_id` int(11) NOT NULL,
  `task_id` text NOT NULL,
  `task_status` text NOT NULL,
  `remarks` text NOT NULL,
  `task_complete_pic` text DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_complete`
--

INSERT INTO `task_complete` (`task_complete_id`, `task_id`, `task_status`, `remarks`, `task_complete_pic`, `verify`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(5, '2', '1', 'nai', '', 0, 1, '2020-12-12', '2020-12-12', 1),
(6, '4', '2', 'nai', 'http://localhost/cims10_12/task_module/task_complete/images/download (1).jpg', 1, 1, '2020-12-12', '2020-12-14', 0),
(7, '5', '2', 'dsfvger', 'http://localhost/cims10_12/task_module/task_complete/images/images.jpg', 0, 1, '2020-12-14', '2020-12-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `task_status_id` int(11) NOT NULL,
  `task_status_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`task_status_id`, `task_status_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'In Progress', 1, '2020-12-14 05:15:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_type`
--

CREATE TABLE `task_type` (
  `task_type_id` int(11) NOT NULL,
  `task_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_type`
--

INSERT INTO `task_type` (`task_type_id`, `task_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(2, 'Cleaning', 1, '2020-12-14 04:57:29', 2020, 0),
(3, 'Accounting', 1, '2020-12-14 05:10:20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` text NOT NULL,
  `user_role_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`, `user_role_status`) VALUES
(1, 'Master Admin', 0),
(2, 'Admin', 0),
(3, 'Accountant', 0),
(4, 'User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `work_type_id` int(11) NOT NULL,
  `work_type_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_id`, `work_type_name`, `user_id`, `create_date`, `update_date`, `delete_status`) VALUES
(15, 'fgh', 1, '2020-12-21 18:01:26', '2020-12-21 18:01:32', 1),
(16, 'Completed', 1, '2020-12-21 18:01:38', '2020-12-21 18:02:39', 1),
(17, 'complete', 1, '2020-12-21 18:02:44', '2020-12-21 18:08:33', 0),
(18, '', 1, '2020-12-21 18:02:45', '2020-12-21 18:12:02', 1),
(19, '', 1, '2020-12-21 18:02:47', NULL, 0),
(20, 'complete', 1, '2020-12-21 18:02:57', NULL, 0),
(21, 'gfgfh', 1, '2020-12-21 18:03:02', NULL, 0),
(22, 'incomplete', 1, '2020-12-21 18:03:06', NULL, 0),
(23, 'running..', 1, '2020-12-21 18:03:08', NULL, 0),
(24, '', 1, '2020-12-21 18:08:51', NULL, 0),
(25, '', 1, '2020-12-21 18:08:51', NULL, 0),
(26, 'complete', 1, '2020-12-21 18:08:55', NULL, 0),
(27, 'incomplete', 1, '2020-12-21 18:08:58', NULL, 0),
(28, 'incomplete', 1, '2020-12-21 18:08:58', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`access_control_id`);

--
-- Indexes for table `animal_type`
--
ALTER TABLE `animal_type`
  ADD PRIMARY KEY (`animal_type_id`);

--
-- Indexes for table `cattle_feed_tracking`
--
ALTER TABLE `cattle_feed_tracking`
  ADD PRIMARY KEY (`cft_id`);

--
-- Indexes for table `cattle_kin`
--
ALTER TABLE `cattle_kin`
  ADD PRIMARY KEY (`cattle_kin_id`);

--
-- Indexes for table `cattle_profile`
--
ALTER TABLE `cattle_profile`
  ADD PRIMARY KEY (`cattle_profile_id`);

--
-- Indexes for table `cattle_status`
--
ALTER TABLE `cattle_status`
  ADD PRIMARY KEY (`cattle_status_id`);

--
-- Indexes for table `cattle_task`
--
ALTER TABLE `cattle_task`
  ADD PRIMARY KEY (`cattle_task_id`);

--
-- Indexes for table `chari`
--
ALTER TABLE `chari`
  ADD PRIMARY KEY (`chari_id`);

--
-- Indexes for table `chari_unit`
--
ALTER TABLE `chari_unit`
  ADD PRIMARY KEY (`chari_unit_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `conception_type`
--
ALTER TABLE `conception_type`
  ADD PRIMARY KEY (`conception_type_id`);

--
-- Indexes for table `costing_type`
--
ALTER TABLE `costing_type`
  ADD PRIMARY KEY (`costing_type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `doctor_profile`
--
ALTER TABLE `doctor_profile`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `doctor_type`
--
ALTER TABLE `doctor_type`
  ADD PRIMARY KEY (`doctor_type_id`);

--
-- Indexes for table `employee_profile`
--
ALTER TABLE `employee_profile`
  ADD PRIMARY KEY (`employee_profile_id`);

--
-- Indexes for table `farm_profile`
--
ALTER TABLE `farm_profile`
  ADD PRIMARY KEY (`farm_profile_id`);

--
-- Indexes for table `farm_user`
--
ALTER TABLE `farm_user`
  ADD PRIMARY KEY (`farm_user_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_formula`
--
ALTER TABLE `food_formula`
  ADD PRIMARY KEY (`food_formula_id`);

--
-- Indexes for table `food_formula_details`
--
ALTER TABLE `food_formula_details`
  ADD PRIMARY KEY (`food_formula_details_id`);

--
-- Indexes for table `food_formula_item`
--
ALTER TABLE `food_formula_item`
  ADD PRIMARY KEY (`food_formula_item_id`);

--
-- Indexes for table `food_formula_unit`
--
ALTER TABLE `food_formula_unit`
  ADD PRIMARY KEY (`food_formula_unit_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`food_type_id`);

--
-- Indexes for table `fpft`
--
ALTER TABLE `fpft`
  ADD PRIMARY KEY (`fpft_id`);

--
-- Indexes for table `fpftcl`
--
ALTER TABLE `fpftcl`
  ADD PRIMARY KEY (`fpftcl_id`);

--
-- Indexes for table `growth_tracking`
--
ALTER TABLE `growth_tracking`
  ADD PRIMARY KEY (`growth_tracking_id`);

--
-- Indexes for table `health_checkup`
--
ALTER TABLE `health_checkup`
  ADD PRIMARY KEY (`hc_id`);

--
-- Indexes for table `health_tracking`
--
ALTER TABLE `health_tracking`
  ADD PRIMARY KEY (`ht_id`);

--
-- Indexes for table `land_collection`
--
ALTER TABLE `land_collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `land_costing`
--
ALTER TABLE `land_costing`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `land_profile`
--
ALTER TABLE `land_profile`
  ADD PRIMARY KEY (`land_id`);

--
-- Indexes for table `land_task`
--
ALTER TABLE `land_task`
  ADD PRIMARY KEY (`lt_id`);

--
-- Indexes for table `land_type`
--
ALTER TABLE `land_type`
  ADD PRIMARY KEY (`land_type_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`login_log_id`);

--
-- Indexes for table `medication_routine`
--
ALTER TABLE `medication_routine`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medicine_unit`
--
ALTER TABLE `medicine_unit`
  ADD PRIMARY KEY (`medicine_unit_id`);

--
-- Indexes for table `page_access`
--
ALTER TABLE `page_access`
  ADD PRIMARY KEY (`page_access_id`);

--
-- Indexes for table `page_setup`
--
ALTER TABLE `page_setup`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`payment_status_id`);

--
-- Indexes for table `problem_area`
--
ALTER TABLE `problem_area`
  ADD PRIMARY KEY (`problem_area_id`);

--
-- Indexes for table `problem_type`
--
ALTER TABLE `problem_type`
  ADD PRIMARY KEY (`problem_type_id`);

--
-- Indexes for table `stock_in_cattle`
--
ALTER TABLE `stock_in_cattle`
  ADD PRIMARY KEY (`stock_in_cattle_id`);

--
-- Indexes for table `stock_in_cattle_details`
--
ALTER TABLE `stock_in_cattle_details`
  ADD PRIMARY KEY (`stock_in_cattle_details_id`);

--
-- Indexes for table `stock_in_fi`
--
ALTER TABLE `stock_in_fi`
  ADD PRIMARY KEY (`stock_in_fi_id`);

--
-- Indexes for table `stock_in_fi_details`
--
ALTER TABLE `stock_in_fi_details`
  ADD PRIMARY KEY (`stock_in_fi_details_id`);

--
-- Indexes for table `stock_in_med`
--
ALTER TABLE `stock_in_med`
  ADD PRIMARY KEY (`stock_in_med_id`);

--
-- Indexes for table `stock_in_med_details`
--
ALTER TABLE `stock_in_med_details`
  ADD PRIMARY KEY (`stock_in_med_details_id`);

--
-- Indexes for table `stock_out_cattle`
--
ALTER TABLE `stock_out_cattle`
  ADD PRIMARY KEY (`stock_out_cattle_id`);

--
-- Indexes for table `stock_out_cattle_details`
--
ALTER TABLE `stock_out_cattle_details`
  ADD PRIMARY KEY (`stock_out_cattle_details_id`);

--
-- Indexes for table `stock_out_fi`
--
ALTER TABLE `stock_out_fi`
  ADD PRIMARY KEY (`stock_out_fi_id`);

--
-- Indexes for table `stock_out_fi_details`
--
ALTER TABLE `stock_out_fi_details`
  ADD PRIMARY KEY (`stock_out_fi_details_id`);

--
-- Indexes for table `stock_out_food_inventory`
--
ALTER TABLE `stock_out_food_inventory`
  ADD PRIMARY KEY (`sofi_id`);

--
-- Indexes for table `stock_out_med`
--
ALTER TABLE `stock_out_med`
  ADD PRIMARY KEY (`stock_out_med_id`);

--
-- Indexes for table `stock_out_med_details`
--
ALTER TABLE `stock_out_med_details`
  ADD PRIMARY KEY (`stock_out_med_details_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_complete`
--
ALTER TABLE `task_complete`
  ADD PRIMARY KEY (`task_complete_id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`task_status_id`);

--
-- Indexes for table `task_type`
--
ALTER TABLE `task_type`
  ADD PRIMARY KEY (`task_type_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`work_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `access_control_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal_type`
--
ALTER TABLE `animal_type`
  MODIFY `animal_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cattle_feed_tracking`
--
ALTER TABLE `cattle_feed_tracking`
  MODIFY `cft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cattle_kin`
--
ALTER TABLE `cattle_kin`
  MODIFY `cattle_kin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cattle_profile`
--
ALTER TABLE `cattle_profile`
  MODIFY `cattle_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cattle_status`
--
ALTER TABLE `cattle_status`
  MODIFY `cattle_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cattle_task`
--
ALTER TABLE `cattle_task`
  MODIFY `cattle_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chari`
--
ALTER TABLE `chari`
  MODIFY `chari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chari_unit`
--
ALTER TABLE `chari_unit`
  MODIFY `chari_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `conception_type`
--
ALTER TABLE `conception_type`
  MODIFY `conception_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costing_type`
--
ALTER TABLE `costing_type`
  MODIFY `costing_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_profile`
--
ALTER TABLE `doctor_profile`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_type`
--
ALTER TABLE `doctor_type`
  MODIFY `doctor_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_profile`
--
ALTER TABLE `employee_profile`
  MODIFY `employee_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farm_profile`
--
ALTER TABLE `farm_profile`
  MODIFY `farm_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farm_user`
--
ALTER TABLE `farm_user`
  MODIFY `farm_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_formula`
--
ALTER TABLE `food_formula`
  MODIFY `food_formula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food_formula_details`
--
ALTER TABLE `food_formula_details`
  MODIFY `food_formula_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `food_formula_item`
--
ALTER TABLE `food_formula_item`
  MODIFY `food_formula_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_formula_unit`
--
ALTER TABLE `food_formula_unit`
  MODIFY `food_formula_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `food_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fpft`
--
ALTER TABLE `fpft`
  MODIFY `fpft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fpftcl`
--
ALTER TABLE `fpftcl`
  MODIFY `fpftcl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `growth_tracking`
--
ALTER TABLE `growth_tracking`
  MODIFY `growth_tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `health_checkup`
--
ALTER TABLE `health_checkup`
  MODIFY `hc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `health_tracking`
--
ALTER TABLE `health_tracking`
  MODIFY `ht_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land_collection`
--
ALTER TABLE `land_collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `land_costing`
--
ALTER TABLE `land_costing`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `land_profile`
--
ALTER TABLE `land_profile`
  MODIFY `land_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `land_task`
--
ALTER TABLE `land_task`
  MODIFY `lt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `land_type`
--
ALTER TABLE `land_type`
  MODIFY `land_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `login_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `medication_routine`
--
ALTER TABLE `medication_routine`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine_unit`
--
ALTER TABLE `medicine_unit`
  MODIFY `medicine_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_access`
--
ALTER TABLE `page_access`
  MODIFY `page_access_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_setup`
--
ALTER TABLE `page_setup`
  MODIFY `page_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `payment_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `problem_area`
--
ALTER TABLE `problem_area`
  MODIFY `problem_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `problem_type`
--
ALTER TABLE `problem_type`
  MODIFY `problem_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_in_cattle`
--
ALTER TABLE `stock_in_cattle`
  MODIFY `stock_in_cattle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `stock_in_cattle_details`
--
ALTER TABLE `stock_in_cattle_details`
  MODIFY `stock_in_cattle_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `stock_in_fi`
--
ALTER TABLE `stock_in_fi`
  MODIFY `stock_in_fi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stock_in_fi_details`
--
ALTER TABLE `stock_in_fi_details`
  MODIFY `stock_in_fi_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `stock_in_med`
--
ALTER TABLE `stock_in_med`
  MODIFY `stock_in_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stock_in_med_details`
--
ALTER TABLE `stock_in_med_details`
  MODIFY `stock_in_med_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `stock_out_cattle`
--
ALTER TABLE `stock_out_cattle`
  MODIFY `stock_out_cattle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stock_out_cattle_details`
--
ALTER TABLE `stock_out_cattle_details`
  MODIFY `stock_out_cattle_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `stock_out_fi`
--
ALTER TABLE `stock_out_fi`
  MODIFY `stock_out_fi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stock_out_fi_details`
--
ALTER TABLE `stock_out_fi_details`
  MODIFY `stock_out_fi_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `work_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
