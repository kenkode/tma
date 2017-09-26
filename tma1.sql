-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 12:23 PM
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

INSERT INTO `bookings` (`id`, `vehicle_id`, `hotel_id`, `organization_id`, `firstname`, `lastname`, `email`, `phone`, `id_number`, `ticketno`, `origin`, `destination`, `travel_date`, `arrival`, `departure`, `seatno`, `roomnumber_id`, `event_id`, `amount`, `mode_of_payment`, `status`, `is_refunded`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1718050001', 'Nairobi', 'Mombasa', '2017-05-18 21:00:00', '2017-05-18 21:00:00', '2017-05-18 21:30:00', 'seat 1', NULL, NULL, 1500.00, 'Mpesa', 'approved', NULL, '2017-05-18', '2017-05-18 15:30:29', '2017-05-18 15:30:29'),
(2, 1, NULL, 1, 'Kennedy', 'Wango', 'wangoken2@gmail.com', '0725145304', '27781190', '#U1726050002', 'Nairobi', 'Mombasa', '2017-05-26 21:00:00', '2017-05-26 21:00:00', '2017-05-26 21:30:00', 'seat 1', NULL, NULL, 1500.00, 'Mpesa', 'approved', NULL, '2017-05-26', '2017-05-26 13:10:15', '2017-05-26 13:10:15'),
(3, 1, NULL, 1, ' Tracy', ' Ogonda', ' ken.wango@lixnet.net', ' 0712345678', ' 12345667', '#U1726050003', 'Nairobi', 'Mombasa', '2017-05-26 21:00:00', '2017-05-26 21:00:00', '2017-05-26 21:30:00', ' seat 2', NULL, NULL, 1500.00, 'Mpesa', 'approved', NULL, '2017-05-26', '2017-05-26 13:10:20', '2017-05-26 13:10:20');

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
(1, 'Nairobi', 1, NULL, '2017-05-16 15:24:46', '2017-05-16 15:24:46'),
(2, 'Mombasa', 1, NULL, '2017-05-16 16:45:53', '2017-05-16 16:45:53'),
(3, 'Kisumu', 1, NULL, '2017-05-16 16:46:10', '2017-05-16 16:46:10');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `contact` text COLLATE utf8_unicode_ci,
  `google_map_cordinates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vip` double(15,2) DEFAULT NULL,
  `normal` double(15,2) DEFAULT NULL,
  `children` double(15,2) DEFAULT NULL,
  `discount` double(15,2) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `image`, `description`, `address`, `contact`, `google_map_cordinates`, `vip`, `normal`, `children`, `discount`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Hiking', '1494080392.jpg', 'Best experience yet', '123, Tao', '0712345678', NULL, 1500.00, 1000.00, 500.00, NULL, 1, '2017-05-06 11:19:52', '2017-05-06 11:19:52');

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
(17, '2017_04_07_113942_create_currencies_table', 1);

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
(1, 'Upstridge', '1494090576.png', '', '', '0725145304', '', '', 1, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-28 09:32:59', '2017-05-06 14:09:36');

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
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
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
(1, 1, 1, 3, 1500.00, NULL, 1000.00, NULL, NULL, 1, 'Travel', '2017-05-10 13:14:05', '2017-05-10 15:24:20');

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
  `roomno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `room_count` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `branch_id`, `image`, `roomno`, `type`, `adults`, `children`, `room_count`, `price`, `organization_id`, `created_at`, `updated_at`) VALUES
(2, 1, '1495005131.jpg', 'B001', 'Single', 2, 2, 10, 30000.00, 1, '2017-05-17 04:12:11', '2017-05-17 13:59:26');

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
(7, 'Mtito wa Ndei', 'Travel', 1, '2017-05-09 11:50:39', '2017-05-09 11:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
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
(1, 1, 1, 3, '2017-05-27 21:30:00', '2017-05-27 21:00:00', NULL, 1, NULL, NULL, 1, 1, '2017-05-10 13:22:56', '2017-05-27 05:32:59');

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
(1, 'kenkode', 'wangoken2@gmail.com', '$2y$10$WRfYvMlnFq9/HRCrAmTi.uGgNOzCHNrwsJ9gLVQIwbepf4Fbssixi', 1, 1, 'Travel', 1, 1, 'x635bFePQW4PvDsPyy3Pnd4JDpSATFtTqMi20b6aRRMpZjHf08mJN9W4bnIZ', '2017-04-28 09:33:02', '2017-05-29 05:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclenames`
--

CREATE TABLE `vehiclenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehiclenames`
--

INSERT INTO `vehiclenames` (`id`, `name`, `logo`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'Modern Coast', '1493458916.jpg', 1, '2017-04-29 06:41:56', '2017-04-29 06:41:56'),
(2, 'North Rift', '1494066108.jpg', 1, '2017-05-06 07:21:49', '2017-05-06 07:21:49');

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
(2, '2', 'KBX 123Y', 11, 0, 0, 'Shuttle', 1, 1, '2017-05-27 05:07:18', '2017-05-27 05:07:45');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paymentschedules`
--
ALTER TABLE `paymentschedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehiclenames`
--
ALTER TABLE `vehiclenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
