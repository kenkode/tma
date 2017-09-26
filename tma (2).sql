-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 01:18 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tma`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticketno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `travel_date` datetime DEFAULT NULL,
  `arrival` datetime DEFAULT NULL,
  `departure` datetime DEFAULT NULL,
  `seatno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roomnumber_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `amount` double(15,2) NOT NULL,
  `vip_amount` float(15,2) DEFAULT '0.00',
  `normal_amount` float(15,2) DEFAULT '0.00',
  `children_amount` float(15,2) DEFAULT '0.00',
  `adult_number` int(11) NOT NULL DEFAULT '0',
  `children_number` int(11) NOT NULL DEFAULT '0',
  `mode_of_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_refunded` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `vehicle_id`, `hotel_id`, `branch_id`, `type`, `organization_id`, `firstname`, `lastname`, `email`, `phone`, `id_number`, `ticketno`, `origin`, `destination`, `travel_date`, `arrival`, `departure`, `seatno`, `roomnumber_id`, `event_id`, `amount`, `vip_amount`, `normal_amount`, `children_amount`, `adult_number`, `children_number`, `mode_of_payment`, `status`, `is_refunded`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'SGR', 1, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1718050001', 'Nairobi', 'Mombasa', '2017-05-18 21:00:00', '2017-05-18 21:00:00', '2017-05-18 21:30:00', 'seat 1', NULL, NULL, 1500.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-05-18', '2017-05-18 15:30:29', '2017-05-18 15:30:29'),
(2, 1, NULL, NULL, 'SGR', 1, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1726050002', 'Nairobi', 'Mombasa', '2017-05-26 21:00:00', '2017-05-26 21:00:00', '2017-05-26 21:30:00', 'seat 1', NULL, NULL, 1500.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-05-26', '2017-05-26 13:10:15', '2017-05-26 13:10:15'),
(3, 1, NULL, NULL, NULL, 1, ' Tracy', ' Ogonda', ' ken.wango@lixnet.net', ' 0712345678', ' 12345667', '#U1726050003', 'Nairobi', 'Mombasa', '2017-05-26 21:00:00', '2017-05-26 21:00:00', '2017-05-26 21:30:00', ' seat 2', NULL, NULL, 1500.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-05-26', '2017-05-26 13:10:20', '2017-05-26 13:10:20'),
(4, 1, NULL, NULL, NULL, 1, 'Kenkode', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1731050004', 'Nairobi', 'Mombasa', '2017-05-31 21:00:00', '2017-05-31 21:00:00', '2017-05-31 21:30:00', 'seat 1', NULL, NULL, 1500.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-05-31', '2017-05-31 05:34:44', '2017-05-31 05:34:44'),
(5, 5, NULL, NULL, NULL, 2, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '23902819', '#S1708060001', 'Nairobi', 'Mombasa', '2017-06-08 22:00:00', '2017-06-08 21:00:00', '2017-06-08 22:00:00', 'seat 1', NULL, NULL, 800.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-08', '2017-06-08 15:30:40', '2017-06-08 15:30:40'),
(6, 5, NULL, NULL, NULL, 2, ' Tracy', ' Ogonda', ' ken.wango@lixnet.net', ' 0712345678', ' 21321321', '#S1708060002', 'Nairobi', 'Mombasa', '2017-06-08 22:00:00', '2017-06-08 21:00:00', '2017-06-08 22:00:00', ' seat 2', NULL, NULL, 800.00, NULL, NULL, NULL, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-08', '2017-06-08 15:30:50', '2017-06-08 15:30:50'),
(25, NULL, NULL, NULL, NULL, 4, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#CS1712060001', NULL, NULL, '2017-06-12 19:00:00', NULL, NULL, NULL, NULL, 1, 1500.00, 1500.00, 1000.00, 500.00, 2, 1, 'Mpesa', 'approved', NULL, '2017-06-12', '2017-06-12 14:25:33', '2017-06-12 14:25:33'),
(26, NULL, NULL, NULL, NULL, 4, ' Betty', ' Wachira', ' wangoken2@gmail.com', ' 0712345677', ' 12345678', '#CS1712060002', NULL, NULL, '2017-06-12 19:00:00', NULL, NULL, NULL, NULL, 1, 1500.00, 1500.00, 1000.00, 500.00, 2, 1, 'Mpesa', 'approved', NULL, '2017-06-12', '2017-06-12 14:25:43', '2017-06-12 14:25:43'),
(27, NULL, NULL, NULL, NULL, 4, ' Grace', ' Munguy', ' wangoken2@gmail.com', ' 0712345677', ' 567876545', '#CS1712060003', NULL, NULL, '2017-06-12 19:00:00', NULL, NULL, NULL, NULL, 1, 500.00, 1500.00, 1000.00, 500.00, 2, 1, 'Mpesa', 'approved', NULL, '2017-06-12', '2017-06-12 14:25:52', '2017-06-12 14:25:52'),
(28, 6, NULL, NULL, NULL, 5, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#KA1713060001', 'Nairobi', 'Mombasa', '2017-06-13 22:00:00', '2017-06-13 20:30:00', '2017-06-13 22:00:00', 'seat 1', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-13', '2017-06-13 15:59:14', '2017-06-13 15:59:14'),
(29, 6, NULL, NULL, NULL, 5, ' Betty', ' Wachira', ' wangoken2@gmail.com', ' 0712345678', ' 12345678', '#KA1713060002', 'Nairobi', 'Mombasa', '2017-06-13 22:00:00', '2017-06-13 20:30:00', '2017-06-13 22:00:00', ' seat 2', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-13', '2017-06-13 15:59:24', '2017-06-13 15:59:24'),
(53, 7, NULL, NULL, NULL, 3, 'Eric', 'Chiuru', 'wangoken2@gmail.com', '0725145304', '12345678', '#U1715060053', 'Fort Jesus', 'Lamu', '2017-06-15 14:27:37', NULL, NULL, NULL, NULL, NULL, 2000.00, 0.00, 100.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-15', '2017-06-15 12:27:46', '2017-06-15 12:27:46'),
(54, 7, NULL, NULL, NULL, 3, ' Kennedy', ' Wango', ' wangoken2@gmail.com', ' 0712345678', ' 12345678', '#U1715060054', 'Fort Jesus', 'Lamu', '2017-06-15 14:27:37', NULL, NULL, NULL, NULL, NULL, 2000.00, 0.00, 100.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-15', '2017-06-15 12:27:56', '2017-06-15 12:27:56'),
(55, 7, NULL, NULL, NULL, 3, ' Tracy', ' Ogonda', ' wangoken2@gmail.com', ' 0712345678', ' 12345678', '#U1715060055', 'Fort Jesus', 'Lamu', '2017-06-15 14:27:37', NULL, NULL, NULL, NULL, NULL, 2000.00, 0.00, 100.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-15', '2017-06-15 12:28:06', '2017-06-15 12:28:06'),
(56, 5, NULL, NULL, 'SGR', 2, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#S1721060007', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 1', NULL, NULL, 800.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-21', '2017-06-21 12:32:30', '2017-06-21 12:32:30'),
(57, 5, NULL, NULL, 'SGR', 2, ' Betty', ' Wachira', ' wangoken2@gmail.com', ' 0712345678', ' 12345678', '#S1721060008', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 2', NULL, NULL, 800.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-21', '2017-06-21 12:32:40', '2017-06-21 12:32:40'),
(58, 1, NULL, NULL, 'Travel', 1, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1722060005', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 1', NULL, NULL, 1500.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 09:05:00', '2017-06-22 09:05:00'),
(59, 6, NULL, NULL, 'Airline', 5, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#KA1722060030', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 5', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 09:27:52', '2017-06-22 09:27:52'),
(60, 6, NULL, NULL, 'Airline', 5, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#KA1722060060', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 5', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 09:28:35', '2017-06-22 09:28:35'),
(61, 6, NULL, NULL, 'Airline', 5, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#KA1722060061', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 5', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 09:39:11', '2017-06-22 09:39:11'),
(62, 6, NULL, NULL, 'Airline', 5, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#KA1722060062', 'Nairobi', 'Mombasa', '2017-06-22 21:00:00', NULL, NULL, 'seat 5', NULL, NULL, 5000.00, 0.00, 0.00, 0.00, 0, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 09:41:04', '2017-06-22 09:41:04'),
(65, NULL, 6, 4, 'Hotel', 6, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#H1722060001', NULL, NULL, '2017-06-22 21:00:00', NULL, NULL, NULL, NULL, NULL, 10000.00, 0.00, 10000.00, 0.00, 2, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 10:27:44', '2017-06-22 10:27:44'),
(66, NULL, 6, 4, 'Hotel', 6, ' Betty', ' Wachira', ' wangoken2@gmail.com', ' 0712345678', ' 12345678', '#H1722060002', NULL, NULL, '2017-06-22 21:00:00', NULL, NULL, NULL, NULL, NULL, 10000.00, 0.00, 10000.00, 0.00, 2, 0, 'Mpesa', 'approved', NULL, '2017-06-22', '2017-06-22 10:27:56', '2017-06-22 10:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `google_map_cordinates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `organization_id`, `google_map_cordinates`, `created_at`, `updated_at`) VALUES
(4, 'Nairobi', 6, NULL, '2017-06-16 04:47:04', '2017-06-16 04:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `defaultamounts`
--

CREATE TABLE `defaultamounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `jan` double(15,2) DEFAULT '0.00',
  `feb` double(15,2) DEFAULT '0.00',
  `mar` double(15,2) DEFAULT '0.00',
  `apr` double(15,2) DEFAULT '0.00',
  `may` double(15,2) DEFAULT '0.00',
  `jun` double(15,2) DEFAULT '0.00',
  `jul` double(15,2) DEFAULT '0.00',
  `aug` double(15,2) DEFAULT '0.00',
  `sep` double(15,2) DEFAULT '0.00',
  `oct` double(15,2) DEFAULT '0.00',
  `nov` double(15,2) DEFAULT '0.00',
  `dec` double(15,2) DEFAULT '0.00',
  `is_enabled` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `is_enabled`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 15.00, 20.00, 50.00, 50.00, 50.00, 50.00, 50.00, 50.00, 50.00, 50.00, 50.00, 100.00, 1, 6, '2017-06-17 09:05:45', '2017-06-17 09:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slots` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `contact` text COLLATE utf8_unicode_ci,
  `google_map_cordinates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vip` double(15,2) DEFAULT NULL,
  `normal` double(15,2) DEFAULT NULL,
  `children` double(15,2) DEFAULT NULL,
  `discount` double(15,2) DEFAULT NULL,
  `date` datetime NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `image`, `description`, `slots`, `address`, `contact`, `google_map_cordinates`, `vip`, `normal`, `children`, `discount`, `date`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Hike', '1496944042.jpg', 'Best Hiking Experience', 100, 'Located at Malindi,\r\nNear Nyali,\r\nP.O. Box 123,\r\nMombasa', '0712345678', NULL, 1500.00, 1000.00, 500.00, NULL, '2017-06-20 19:00:00', 4, '2017-06-08 14:47:22', '2017-06-20 10:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(15,2) NOT NULL,
  `status` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelpricings`
--

CREATE TABLE `hotelpricings` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `monday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `monday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `tuesday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `tuesday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `wednesday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `wednesday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `thursday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `thursday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `friday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `friday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `saturday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `saturday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `sunday_adult` double(15,2) NOT NULL DEFAULT '0.00',
  `sunday_child` double(15,2) NOT NULL DEFAULT '0.00',
  `discount` double(15,2) DEFAULT '0.00',
  `is_discount_active` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_22_131719_create_organizations_table', 1),
(4, '2017_03_22_133853_create_vehicles_table', 1),
(5, '2017_03_22_134044_create_routes_table', 1),
(6, '2017_03_22_134223_create_schedules_table', 1),
(7, '2017_03_22_134250_create_payments_table', 1),
(8, '2017_03_22_134435_create_rooms_table', 1),
(9, '2017_03_22_134532_create_bookings_table', 1),
(10, '2017_03_22_135000_create_events_table', 1),
(11, '2017_03_22_142004_create_vehiclenames_table', 1),
(12, '2017_03_22_145912_create_roomnumbers_table', 1),
(13, '2017_03_22_152629_create_foods_table', 1),
(14, '2017_03_22_152718_create_hotelpricings_table', 1),
(15, '2017_03_22_155923_create_branches_table', 1),
(16, '2017_04_07_110842_create_paymentschedules_table', 1),
(17, '2017_04_07_113942_create_currencies_table', 1),
(18, '2017_06_16_084811_create_roomtypes_table', 2),
(23, '2017_06_17_094106_create_pricings_table', 3),
(24, '2017_06_17_094216_create_deposits_table', 3),
(25, '2017_06_17_161038_create_defaultamounts_table', 4),
(26, '2017_06_22_125346_create_tempseats_table', 5),
(27, '2017_06_22_143137_create_seatnamings_table', 6),
(28, '2017_06_22_143526_create_seatlayouts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_shortname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_nairobi` int(11) DEFAULT NULL,
  `is_central` int(11) DEFAULT NULL,
  `is_coast` int(11) DEFAULT NULL,
  `is_western` int(11) DEFAULT NULL,
  `is_nyanza` int(11) DEFAULT NULL,
  `is_rift` int(11) DEFAULT NULL,
  `is_eastern` int(11) DEFAULT NULL,
  `is_northeastern` int(11) DEFAULT NULL,
  `mail_driver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_port` int(11) DEFAULT NULL,
  `mail_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_map_cordinates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `logo`, `email`, `address`, `phone`, `currency_name`, `currency_shortname`, `is_nairobi`, `is_central`, `is_coast`, `is_western`, `is_nyanza`, `is_rift`, `is_eastern`, `is_northeastern`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `google_map_cordinates`, `created_at`, `updated_at`) VALUES
(1, 'Upstridge', '1494090576.png', '', '', '0725145304', '', '', 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-28 09:32:59', '2017-05-06 14:09:36'),
(2, 'SGR', NULL, NULL, '', '0712345678', NULL, NULL, 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-08 11:25:04', '2017-06-08 11:25:04'),
(3, 'UBER', NULL, NULL, '', '0712345678', NULL, NULL, 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-08 11:25:04', '2017-06-08 11:25:04'),
(4, 'Churchil Show', '1497282851.jpg', '', '', '0712345678', '', '', 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-08 11:25:04', '2017-06-12 12:54:11'),
(5, 'Kenya Airways', '1497355768.jpg', '', '', '0712345678', '', '', 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-08 11:25:04', '2017-06-13 09:09:28'),
(6, 'Hilton', '1497602400.jpg', '', '', '0712345678', '', '', 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-08 11:25:04', '2017-06-16 05:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `firstclass` double(15,2) DEFAULT NULL,
  `business` double(15,2) DEFAULT NULL,
  `economic` double(15,2) DEFAULT NULL,
  `children` double(15,2) DEFAULT NULL,
  `discount` double(15,2) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `vehicle_id`, `origin_id`, `destination_id`, `firstclass`, `business`, `economic`, `children`, `discount`, `organization_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1500.00, NULL, 1000.00, NULL, NULL, 1, 'Travel', '2017-05-10 13:14:05', '2017-05-10 15:24:20'),
(3, 5, 8, 9, 800.00, NULL, 600.00, NULL, NULL, 2, 'SGR', '2017-06-08 11:34:00', '2017-06-08 11:34:00'),
(4, 6, 10, 12, 5000.00, 3000.00, 1500.00, 50.00, NULL, 5, 'Airline', '2017-06-13 08:26:44', '2017-06-13 08:26:44'),
(5, 7, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, 3, 'Taxi', '2017-06-14 07:24:31', '2017-06-14 07:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `paymentschedules`
--

CREATE TABLE `paymentschedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `mon` double(15,2) DEFAULT '0.00',
  `tue` double(15,2) DEFAULT '0.00',
  `wen` double(15,2) DEFAULT '0.00',
  `thur` double(15,2) DEFAULT '0.00',
  `fri` double(15,2) DEFAULT '0.00',
  `sat` double(15,2) DEFAULT '0.00',
  `sun` double(15,2) DEFAULT '0.00',
  `children` float(15,2) DEFAULT NULL,
  `default_amount` double(15,2) DEFAULT '0.00',
  `default_plan` int(11) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `roomtype_id`, `branch_id`, `start_date`, `end_date`, `mon`, `tue`, `wen`, `thur`, `fri`, `sat`, `sun`, `children`, `default_amount`, `default_plan`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL, 10000.00, 10000.00, 10000.00, 10000.00, 20000.00, 25000.00, 30000.00, 50.00, 0.00, NULL, 6, '2017-06-17 12:46:11', '2017-06-17 13:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `roomnumbers`
--

CREATE TABLE `roomnumbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roomtype_id` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `room_count` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `branch_id`, `image`, `roomtype_id`, `adults`, `children`, `room_count`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 4, '1497694405.jpg', 1, 2, 2, 5, 6, '2017-06-17 07:13:25', '2017-06-17 07:13:25'),
(2, 4, '1497694995.jpg', 2, 4, 4, 10, 6, '2017-06-17 07:23:15', '2017-06-17 07:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Single Room', 6, '2017-06-16 06:15:22', '2017-06-16 07:28:54'),
(2, 'Double Room', 6, '2017-06-16 07:29:20', '2017-06-16 07:29:20'),
(3, 'Family Room', 6, '2017-06-16 07:29:31', '2017-06-16 07:29:31'),
(4, 'Studio', 6, '2017-06-16 07:29:43', '2017-06-16 07:29:43'),
(5, 'Conference', 6, '2017-06-16 07:29:53', '2017-06-16 07:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `type`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Nairobi', 'Travel', 1, '2017-04-29 06:33:23', '2017-04-29 06:33:23'),
(2, 'Lamu', 'Travel', 1, '2017-04-29 06:33:38', '2017-04-29 06:33:38'),
(3, 'Mombasa', 'Travel', 1, '2017-04-29 06:33:54', '2017-04-29 06:33:54'),
(4, 'Malindi', 'Travel', 1, '2017-04-29 06:34:29', '2017-04-29 06:34:29'),
(5, 'Voi', 'Travel', 1, '2017-04-29 06:37:36', '2017-04-29 06:37:36'),
(6, 'Taita-taveta', 'Travel', 1, '2017-04-29 06:40:01', '2017-04-29 06:40:01'),
(7, 'Mtito wa Ndei', 'Travel', 1, '2017-05-09 11:50:39', '2017-05-09 11:50:39'),
(8, 'Nairobi', 'SGR', 2, '2017-06-08 11:33:20', '2017-06-08 11:33:20'),
(9, 'Mombasa', 'SGR', 2, '2017-06-08 11:33:34', '2017-06-08 11:33:34'),
(10, 'Nairobi', 'Airline', 5, '2017-06-13 08:25:05', '2017-06-13 08:25:05'),
(11, 'Kisumu', 'Airline', 5, '2017-06-13 08:25:14', '2017-06-13 08:25:14'),
(12, 'Mombasa', 'Airline', 5, '2017-06-13 08:25:26', '2017-06-13 08:25:26'),
(13, 'New York', 'Airline', 5, '2017-06-13 08:25:37', '2017-06-13 08:25:37'),
(14, 'London', 'Airline', 5, '2017-06-13 08:25:46', '2017-06-13 08:25:46'),
(15, 'Nairobi', 'Taxi', 3, '2017-06-14 07:00:48', '2017-06-14 07:00:48'),
(16, 'Lamu', 'Taxi', 3, '2017-06-14 07:00:58', '2017-06-14 07:00:58'),
(17, 'Fort Jesus', 'Taxi', 3, '2017-06-14 07:01:27', '2017-06-14 07:01:27'),
(18, 'Bungoma', 'Travel', 1, '2017-06-22 09:41:27', '2017-06-22 09:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `departure` datetime DEFAULT NULL,
  `arrival` datetime DEFAULT NULL,
  `pickup_address` text COLLATE utf8_unicode_ci,
  `firstclass_apply` int(11) DEFAULT NULL,
  `business_apply` int(11) DEFAULT NULL,
  `children_apply` int(11) DEFAULT NULL,
  `economic_apply` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `vehicle_id`, `origin_id`, `destination_id`, `departure`, `arrival`, `pickup_address`, `firstclass_apply`, `business_apply`, `children_apply`, `economic_apply`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2017-06-17 21:30:00', '2017-06-17 21:00:00', NULL, 1, NULL, NULL, 1, 1, '2017-05-10 13:22:56', '2017-05-27 05:32:59'),
(2, 5, 8, 9, '2017-06-17 22:00:00', '2017-06-17 21:00:00', NULL, 1, NULL, NULL, 1, 2, '2017-06-08 11:35:15', '2017-06-08 11:35:15'),
(3, 6, 10, 12, '2017-06-19 22:00:00', '2017-06-19 20:30:00', NULL, 1, 1, 1, 1, 5, '2017-06-13 08:29:10', '2017-06-19 09:51:52'),
(6, 2, 1, 18, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, '2017-06-22 09:42:08', '2017-06-22 09:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `seatlayouts`
--

CREATE TABLE `seatlayouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `arrangement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seatnamings`
--

CREATE TABLE `seatnamings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `seatno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vip` int(11) NOT NULL,
  `business` int(11) NOT NULL,
  `economy` int(11) NOT NULL,
  `apply_to_all` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seatnamings`
--

INSERT INTO `seatnamings` (`id`, `vehicle_id`, `seatno`, `vip`, `business`, `economy`, `apply_to_all`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'seat 1', 1, 0, 0, 1, 2, '2017-06-26 07:12:40', '2017-06-26 07:36:03'),
(2, 5, 'seat 2', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:03'),
(3, 5, 'seat 3', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:03'),
(4, 5, 'seat 4', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(5, 5, 'seat 5', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(6, 5, 'seat 6', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(7, 5, 'seat 7', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(8, 5, 'seat 8', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(9, 5, 'seat 9', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:15'),
(10, 5, 'seat 10', 1, 0, 0, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:39:16'),
(11, 5, 'seat 11', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(12, 5, 'seat 12', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(13, 5, 'seat 13', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(14, 5, 'seat 14', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(15, 5, 'seat 15', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(16, 5, 'seat 16', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(17, 5, 'seat 17', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(18, 5, 'seat 18', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(19, 5, 'seat 19', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(20, 5, 'seat 20', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(21, 5, 'seat 21', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(22, 5, 'seat 22', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(23, 5, 'seat 23', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(24, 5, 'seat 24', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(25, 5, 'seat 25', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(26, 5, 'seat 26', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(27, 5, 'seat 27', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(28, 5, 'seat 28', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(29, 5, 'seat 29', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(30, 5, 'seat 30', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(31, 5, 'seat 31', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(32, 5, 'seat 32', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(33, 5, 'seat 33', 0, 0, 1, 1, 2, '2017-06-26 07:12:41', '2017-06-26 07:36:04'),
(34, 5, 'seat 34', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:04'),
(35, 5, 'seat 35', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:04'),
(36, 5, 'seat 36', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:04'),
(37, 5, 'seat 37', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:04'),
(38, 5, 'seat 38', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:04'),
(39, 5, 'seat 39', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(40, 5, 'seat 40', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(41, 5, 'seat 41', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(42, 5, 'seat 42', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(43, 5, 'seat 43', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(44, 5, 'seat 44', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(45, 5, 'seat 45', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(46, 5, 'seat 46', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(47, 5, 'seat 47', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(48, 5, 'seat 48', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(49, 5, 'seat 49', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(50, 5, 'seat 50', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(51, 5, 'seat 51', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(52, 5, 'seat 52', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(53, 5, 'seat 53', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(54, 5, 'seat 54', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(55, 5, 'seat 55', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(56, 5, 'seat 56', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(57, 5, 'seat 57', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(58, 5, 'seat 58', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(59, 5, 'seat 59', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(60, 5, 'seat 60', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(61, 5, 'seat 61', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(62, 5, 'seat 62', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(63, 5, 'seat 63', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:05'),
(64, 5, 'seat 64', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:06'),
(65, 5, 'seat 65', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:06'),
(66, 5, 'seat 66', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:06'),
(67, 5, 'seat 67', 0, 0, 1, 1, 2, '2017-06-26 07:12:42', '2017-06-26 07:36:06'),
(68, 5, 'seat 68', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:06'),
(69, 5, 'seat 69', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:06'),
(70, 5, 'seat 70', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:06'),
(71, 5, 'seat 71', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:06'),
(72, 5, 'seat 72', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:06'),
(73, 5, 'seat 73', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:09'),
(74, 5, 'seat 74', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:09'),
(75, 5, 'seat 75', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:09'),
(76, 5, 'seat 76', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:12'),
(77, 5, 'seat 77', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:12'),
(78, 5, 'seat 78', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(79, 5, 'seat 79', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(80, 5, 'seat 80', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(81, 5, 'seat 81', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(82, 5, 'seat 82', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(83, 5, 'seat 83', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(84, 5, 'seat 84', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(85, 5, 'seat 85', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(86, 5, 'seat 86', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(87, 5, 'seat 87', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(88, 5, 'seat 88', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(89, 5, 'seat 89', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(90, 5, 'seat 90', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(91, 5, 'seat 91', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(92, 5, 'seat 92', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(93, 5, 'seat 93', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(94, 5, 'seat 94', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(95, 5, 'seat 95', 0, 0, 1, 1, 2, '2017-06-26 07:12:43', '2017-06-26 07:36:13'),
(96, 5, 'seat 96', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:13'),
(97, 5, 'seat 97', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(98, 5, 'seat 98', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(99, 5, 'seat 99', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(100, 5, 'seat 100', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(101, 5, 'seat 101', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(102, 5, 'seat 102', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(103, 5, 'seat 103', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(104, 5, 'seat 104', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(105, 5, 'seat 105', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(106, 5, 'seat 106', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(107, 5, 'seat 107', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(108, 5, 'seat 108', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(109, 5, 'seat 109', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(110, 5, 'seat 110', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(111, 5, 'seat 111', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(112, 5, 'seat 112', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(113, 5, 'seat 113', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(114, 5, 'seat 114', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(115, 5, 'seat 115', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(116, 5, 'seat 116', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(117, 5, 'seat 117', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(118, 5, 'seat 118', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(119, 5, 'seat 119', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(120, 5, 'seat 120', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(121, 5, 'seat 121', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(122, 5, 'seat 122', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(123, 5, 'seat 123', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(124, 5, 'seat 124', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(125, 5, 'seat 125', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(126, 5, 'seat 126', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(127, 5, 'seat 127', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:14'),
(128, 5, 'seat 128', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:15'),
(129, 5, 'seat 129', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:15'),
(130, 5, 'seat 130', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:15'),
(131, 5, 'seat 131', 0, 0, 1, 1, 2, '2017-06-26 07:12:44', '2017-06-26 07:36:15'),
(132, 5, 'seat 132', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(133, 5, 'seat 133', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(134, 5, 'seat 134', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(135, 5, 'seat 135', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(136, 5, 'seat 136', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(137, 5, 'seat 137', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(138, 5, 'seat 138', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(139, 5, 'seat 139', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(140, 5, 'seat 140', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(141, 5, 'seat 141', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(142, 5, 'seat 142', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(143, 5, 'seat 143', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(144, 5, 'seat 144', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(145, 5, 'seat 145', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(146, 5, 'seat 146', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(147, 5, 'seat 147', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(148, 5, 'seat 148', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:15'),
(149, 5, 'seat 149', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(150, 5, 'seat 150', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(151, 5, 'seat 151', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(152, 5, 'seat 152', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(153, 5, 'seat 153', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(154, 5, 'seat 154', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(155, 5, 'seat 155', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(156, 5, 'seat 156', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(157, 5, 'seat 157', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(158, 5, 'seat 158', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(159, 5, 'seat 159', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(160, 5, 'seat 160', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(161, 5, 'seat 161', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(162, 5, 'seat 162', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(163, 5, 'seat 163', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(164, 5, 'seat 164', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(165, 5, 'seat 165', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(166, 5, 'seat 166', 0, 0, 1, 1, 2, '2017-06-26 07:12:45', '2017-06-26 07:36:16'),
(167, 5, 'seat 167', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:16'),
(168, 5, 'seat 168', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:16'),
(169, 5, 'seat 169', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:16'),
(170, 5, 'seat 170', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:16'),
(171, 5, 'seat 171', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:17'),
(172, 5, 'seat 172', 0, 0, 1, 1, 2, '2017-06-26 07:12:46', '2017-06-26 07:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `tempseats`
--

CREATE TABLE `tempseats` (
  `id` int(10) UNSIGNED NOT NULL,
  `seatno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `travel_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_confirm` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `user_confirm`, `type`, `terms`, `organization_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kenkode', 'wangoken2@gmail.com', '$2y$10$ermUO/dsecbKSdg/nRRhWeT7d0380XkXBjnBdXmBdul1VI6Y3GDaC', 1, 1, 'Travel', 1, 1, 'vDTUgTIRJcgYZvvaZ1JzQuLhH4HahzxyZnV2Y5aobH57mAiZ9G6sk8fXA9Va', '2017-04-28 09:33:02', '2017-06-22 10:04:55'),
(2, 'sgr', 'ken.wango@lixnet.net', '$2y$10$r4iWkCjM6c.9.XAfcwdg5udp4Gpl5rCcuZ7LVIL0DxJFLEHslj7Sy', 1, 1, 'SGR', 1, 2, 'i06CpraII314Vkwf2hUkovqmDcQpvBHxr9WcPcS2675HvxInusf2m24stzk4', '2017-06-08 11:25:05', '2017-06-22 09:32:18'),
(3, 'taxi', 'ken.wango1@lixnet.net', '$2y$10$r4iWkCjM6c.9.XAfcwdg5udp4Gpl5rCcuZ7LVIL0DxJFLEHslj7Sy', 1, 1, 'Taxi', 1, 3, 'OS8EsRjDuCBjVOAB7sKNa3ZypTu1JqffSspjHDNqB3ilLL3heUTOBq6oKd1n', '2017-06-08 11:25:05', '2017-06-22 08:06:27'),
(4, 'events', 'ken.wango2@lixnet.net', '$2y$10$r4iWkCjM6c.9.XAfcwdg5udp4Gpl5rCcuZ7LVIL0DxJFLEHslj7Sy', 1, 1, 'Events', 1, 4, 'l5GBGGw3qTzteHxw6w9sgchC9q8swm5TquF9mlpOHwwCzHTeMiHJsZ6pHLDb', '2017-06-08 11:25:05', '2017-06-22 08:37:39'),
(5, 'plane', 'skeww@gmail.com', '$2y$10$r4iWkCjM6c.9.XAfcwdg5udp4Gpl5rCcuZ7LVIL0DxJFLEHslj7Sy', 1, 1, 'Airline', 1, 5, 'cr9nVuBYQzxlo5GjMb4j9Estiqyl2HYRt7RV9XpLCsvFJaUqiRQ06ctsvY51', '2017-06-08 11:25:05', '2017-06-22 09:39:02'),
(6, 'hotel', 'hotel@gmail.com', '$2y$10$r4iWkCjM6c.9.XAfcwdg5udp4Gpl5rCcuZ7LVIL0DxJFLEHslj7Sy', 1, 1, 'Hotel', 1, 6, '7Y07w83kd9wOpQnitseLUl73wJYL77b0UmSsN2okdZi8Z5EKxuf85WN5XvBs', '2017-06-08 11:25:05', '2017-06-22 09:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclenames`
--

CREATE TABLE `vehiclenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehiclenames`
--

INSERT INTO `vehiclenames` (`id`, `name`, `logo`, `type`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Modern Coast', '1493458916.jpg', 'Travel', 1, '2017-04-29 06:41:56', '2017-04-29 06:41:56'),
(2, 'North Rift', '1494066108.jpg', 'Travel', 1, '2017-05-06 07:21:49', '2017-05-06 07:21:49'),
(5, 'SGR', '1497957762.jpg', 'SGR', 2, '2017-06-08 11:31:47', '2017-06-20 08:22:42'),
(6, 'Kenya Airways', '1497353004.jpg', 'Airline', 5, '2017-06-13 08:23:24', '2017-06-13 08:23:24'),
(7, 'Upstridge Taxi', '1497435776.png', 'Taxi', 3, '2017-06-14 07:11:38', '2017-06-14 07:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehiclename_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `has_conductor` int(11) DEFAULT NULL,
  `has_chair` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehiclename_id`, `regno`, `capacity`, `has_conductor`, `has_chair`, `type`, `active`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'KBX 123 X', 51, 1, 0, 'Large Bus', 1, 1, '2017-04-29 06:42:43', '2017-04-29 06:42:43'),
(2, '2', 'KBX 123Y', 11, 0, 0, 'Shuttle', 1, 1, '2017-05-27 05:07:18', '2017-05-27 05:07:45'),
(5, '5', 'TYA 1234', 172, NULL, NULL, NULL, 1, 2, '2017-06-08 11:32:58', '2017-06-08 12:05:26'),
(6, '6', 'KQ123X', 150, NULL, NULL, NULL, 1, 5, '2017-06-13 08:24:39', '2017-06-13 08:24:39'),
(7, '7', 'KBX 123A', 4, NULL, NULL, NULL, 1, 3, '2017-06-14 07:23:20', '2017-06-14 07:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defaultamounts`
--
ALTER TABLE `defaultamounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelpricings`
--
ALTER TABLE `hotelpricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentschedules`
--
ALTER TABLE `paymentschedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomnumbers`
--
ALTER TABLE `roomnumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seatlayouts`
--
ALTER TABLE `seatlayouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seatnamings`
--
ALTER TABLE `seatnamings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempseats`
--
ALTER TABLE `tempseats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehiclenames`
--
ALTER TABLE `vehiclenames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `defaultamounts`
--
ALTER TABLE `defaultamounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotelpricings`
--
ALTER TABLE `hotelpricings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paymentschedules`
--
ALTER TABLE `paymentschedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roomnumbers`
--
ALTER TABLE `roomnumbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `seatlayouts`
--
ALTER TABLE `seatlayouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seatnamings`
--
ALTER TABLE `seatnamings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `tempseats`
--
ALTER TABLE `tempseats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehiclenames`
--
ALTER TABLE `vehiclenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
