-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 08:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_lists`
--

CREATE TABLE `image_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_lists`
--

INSERT INTO `image_lists` (`id`, `item_id`, `image_name`, `created_at`, `updated_at`) VALUES
(5, '100005', 'cityhostel-image1.jpg', NULL, NULL),
(6, '100005', 'cityhostel-image2.jpg', NULL, NULL),
(7, '100002', 'functionhall1-image1.jpg', NULL, NULL),
(8, '100002', 'functionhall1-image2.jpg', NULL, NULL),
(9, '100002', 'functionhall1-image3.jpg', NULL, NULL),
(10, '100002', 'functionhall1-image4.jpg', NULL, NULL),
(11, '100002', 'functionhall1-image5.jpg', NULL, NULL),
(12, '100003', 'functionhall2-image1.jpg', NULL, NULL),
(13, '100001', 'sinanduloy-image1.jpg', NULL, NULL),
(14, '100001', 'sinanduloy-image2.jpg', NULL, NULL),
(15, '100004', 'tldc-image1.jpg', NULL, NULL),
(16, '100004', 'tldc-image2.jpg', NULL, NULL),
(17, '100029', 'dancestudio-image1.jpg', NULL, NULL),
(18, '100029', 'dancestudio-image2.jpg', NULL, NULL),
(19, '100029', 'dancestudio-image3.jpg', NULL, NULL),
(20, '100025', 'facultylounge-image2.jpg', NULL, NULL),
(21, '100025', 'facultylounge-image3.jpg', NULL, NULL),
(22, '100030', 'tcgcswimmingpool-image1.jpg', NULL, NULL),
(40, '100022', '1705468472.jpg', '2024-01-16 21:14:32', '2024-01-16 21:14:32'),
(41, '100023', '1705468541.jpg', '2024-01-16 21:15:41', '2024-01-16 21:15:41'),
(42, '100023', '1705468541.jpg', '2024-01-16 21:15:41', '2024-01-16 21:15:41'),
(43, '100023', '1705468541.jpg', '2024-01-16 21:15:41', '2024-01-16 21:15:41'),
(44, '100023', '1705468541.jpg', '2024-01-16 21:15:41', '2024-01-16 21:15:41'),
(45, '100023', '1705468541.jpg', '2024-01-16 21:15:41', '2024-01-16 21:15:41'),
(46, '100027', '1705468577.jpg', '2024-01-16 21:16:17', '2024-01-16 21:16:17'),
(47, '100027', '1705468577.jpg', '2024-01-16 21:16:17', '2024-01-16 21:16:17'),
(48, '100027', '1705468577.jpg', '2024-01-16 21:16:17', '2024-01-16 21:16:17'),
(49, '100030', '1705468616.jpg', '2024-01-16 21:16:56', '2024-01-16 21:16:56'),
(50, '100030', '1705468616.jpg', '2024-01-16 21:16:56', '2024-01-16 21:16:56'),
(51, '100030', '1705468616.jpg', '2024-01-16 21:16:56', '2024-01-16 21:16:56'),
(52, '100028', '1705468659.jpg', '2024-01-16 21:17:39', '2024-01-16 21:17:39'),
(53, '100028', '1705468659.jpg', '2024-01-16 21:17:39', '2024-01-16 21:17:39'),
(54, '100028', '1705468660.jpg', '2024-01-16 21:17:40', '2024-01-16 21:17:40'),
(55, '100024', '1705468717.jpg', '2024-01-16 21:18:37', '2024-01-16 21:18:37'),
(56, '100026', '1705468785.jpg', '2024-01-16 21:19:45', '2024-01-16 21:19:45'),
(57, '100026', '1705468785.jpg', '2024-01-16 21:19:45', '2024-01-16 21:19:45'),
(58, '100026', '1705468785.jpg', '2024-01-16 21:19:45', '2024-01-16 21:19:45'),
(59, '100019', '1705468821.jpg', '2024-01-16 21:20:21', '2024-01-16 21:20:21'),
(60, '100019', '1705468821.jpg', '2024-01-16 21:20:21', '2024-01-16 21:20:21'),
(61, '100020', '1705468852.jpg', '2024-01-16 21:20:52', '2024-01-16 21:20:52'),
(62, '100020', '1705468852.jpg', '2024-01-16 21:20:52', '2024-01-16 21:20:52'),
(63, '100020', '1705468852.jpg', '2024-01-16 21:20:52', '2024-01-16 21:20:52'),
(64, '100021', '1705468880.jpg', '2024-01-16 21:21:20', '2024-01-16 21:21:20'),
(65, '100021', '1705468880.jpg', '2024-01-16 21:21:20', '2024-01-16 21:21:20'),
(66, '100021', '1705468880.jpg', '2024-01-16 21:21:20', '2024-01-16 21:21:20'),
(67, '947035', '1705481074.jpg', '2024-01-17 00:44:34', '2024-01-17 00:44:34'),
(68, '947035', '1705481101.jpg', '2024-01-17 00:45:01', '2024-01-17 00:45:01'),
(69, '947035', '1705481123.jpg', '2024-01-17 00:45:23', '2024-01-17 00:45:23'),
(70, '891321', '1705481206.jpg', '2024-01-17 00:46:46', '2024-01-17 00:46:46'),
(71, '891321', '1705481224.jpg', '2024-01-17 00:47:04', '2024-01-17 00:47:04'),
(72, '269901', '1705547173.jpg', '2024-01-17 19:06:13', '2024-01-17 19:06:13'),
(73, '269901', '1705547173.jpg', '2024-01-17 19:06:13', '2024-01-17 19:06:13'),
(74, '269901', '1705547173.jpg', '2024-01-17 19:06:13', '2024-01-17 19:06:13'),
(75, '673473', '1705547393.jpg', '2024-01-17 19:09:53', '2024-01-17 19:09:53'),
(76, '673473', '1705547393.jpg', '2024-01-17 19:09:53', '2024-01-17 19:09:53'),
(77, '162512', '1705547658.jpg', '2024-01-17 19:14:18', '2024-01-17 19:14:18'),
(78, '162512', '1705547658.jpg', '2024-01-17 19:14:18', '2024-01-17 19:14:18'),
(79, '162512', '1705547658.jpg', '2024-01-17 19:14:18', '2024-01-17 19:14:18'),
(80, '750792', '1705547764.jpg', '2024-01-17 19:16:04', '2024-01-17 19:16:04'),
(81, '750792', '1705547764.jpg', '2024-01-17 19:16:04', '2024-01-17 19:16:04'),
(82, '750792', '1705547764.jpg', '2024-01-17 19:16:04', '2024-01-17 19:16:04'),
(83, '873729', '1705547796.jpg', '2024-01-17 19:16:36', '2024-01-17 19:16:36'),
(84, '873729', '1705547796.jpg', '2024-01-17 19:16:36', '2024-01-17 19:16:36'),
(85, '541222', '1705547880.jpg', '2024-01-17 19:18:00', '2024-01-17 19:18:00'),
(86, '541222', '1705547958.jpg', '2024-01-17 19:19:18', '2024-01-17 19:19:18'),
(87, '541222', '1705547958.jpg', '2024-01-17 19:19:18', '2024-01-17 19:19:18'),
(88, '541222', '1705547958.jpg', '2024-01-17 19:19:18', '2024-01-17 19:19:18'),
(89, '718935', '1705548111.jpg', '2024-01-17 19:21:51', '2024-01-17 19:21:51'),
(90, '718935', '1705548111.jpg', '2024-01-17 19:21:51', '2024-01-17 19:21:51'),
(91, '718935', '1705548111.jpg', '2024-01-17 19:21:51', '2024-01-17 19:21:51'),
(92, '718935', '1705548111.jpg', '2024-01-17 19:21:51', '2024-01-17 19:21:51'),
(93, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(94, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(95, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(96, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(97, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(98, '718935', '1705548221.jpg', '2024-01-17 19:23:41', '2024-01-17 19:23:41'),
(99, '367984', '1705548359.jpg', '2024-01-17 19:25:59', '2024-01-17 19:25:59'),
(100, '367984', '1705548359.jpg', '2024-01-17 19:25:59', '2024-01-17 19:25:59'),
(101, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(102, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(103, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(104, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(105, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(106, '372188', '1705548625.jpg', '2024-01-17 19:30:25', '2024-01-17 19:30:25'),
(107, '372188', '1705548709.jpg', '2024-01-17 19:31:49', '2024-01-17 19:31:49'),
(131, '662662', '1705567375.jpg', '2024-01-18 00:42:55', '2024-01-18 00:42:55'),
(132, '662662', '1705567395.jpg', '2024-01-18 00:43:15', '2024-01-18 00:43:15'),
(133, '662662', '1705567412.jpg', '2024-01-18 00:43:32', '2024-01-18 00:43:32'),
(134, '662662', '1705567444.jpg', '2024-01-18 00:44:04', '2024-01-18 00:44:04'),
(135, '662662', '1705567463.jpg', '2024-01-18 00:44:23', '2024-01-18 00:44:23'),
(139, '662662', '1705567611.jpg', '2024-01-18 00:46:51', '2024-01-18 00:46:51'),
(140, '662662', '1705567671.jpg', '2024-01-18 00:47:51', '2024-01-18 00:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `item_lists`
--

CREATE TABLE `item_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_charge` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_lists`
--

INSERT INTO `item_lists` (`id`, `item_id`, `item_name`, `status`, `item_type`, `quantity`, `description`, `item_img`, `in_charge`, `featured`, `created_at`, `updated_at`) VALUES
(1, '100001', 'Peoples Gym', 1, 'facility', '1', 'Events', 'sinanduloy.jpg', 'city', 1, NULL, '2024-01-17 19:33:55'),
(2, '100002', 'Function Hall 1', 1, 'facility', '1', '', 'functionhall1.jpg', 'city', 0, NULL, NULL),
(5, '100005', 'City Hostel', 1, 'facility', '1', '', 'cityhostel.jpg', 'city', 1, NULL, NULL),
(7, '100007', 'Sound System', 1, 'equipment', '1', '', 'sounsystem.jpg', 'city', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '100009', 'Plastic Chairs', 1, 'equipment', '500', '', 'plasticchairs.jpg', 'city', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '100010', 'Kitchen Utensils', 1, 'equipment', '500', '', 'kitchenutensils.jpg', 'city', 0, NULL, NULL),
(11, '100011', 'Dump Track', 1, 'equipment', '10', '', 'dumptrack.jpg', 'city', 0, '2023-12-15 02:00:58', '2023-12-15 02:01:02'),
(12, '100012', 'Grader', 1, 'equipment', '10', '', 'grader.jpg', 'city', 0, NULL, NULL),
(13, '100013', 'Pay Loader', 1, 'equipment', '10', '', 'payloader.jpg', 'city', 0, NULL, NULL),
(14, '100014', 'Bulldozer', 1, 'equipment', '10', '', 'bulldozer.jpg', 'city', 0, '2023-12-15 02:06:02', '2023-12-15 02:06:06'),
(15, '100015', 'Backhoe/Breaker', 1, 'equipment', '10', '', 'backhoebreaker.jpg', 'city', 0, '2023-12-15 02:06:14', '2023-12-15 02:06:18'),
(16, '100016', 'Road Roller', 1, 'equipment', '10', '', 'roadballer.jpg', 'city', 0, NULL, NULL),
(17, '100017', 'Cement Mixer (Big)', 1, 'equipment', '10', '', 'cementmixer.jpg', 'city', 0, NULL, NULL),
(19, '100022', 'Covered Court', 1, 'facility', '1', 'Games and other events', 'coveredcourt.jpg', 'tcgc', 1, NULL, '2024-01-19 00:27:31'),
(20, '100023', 'Bleacher', 1, 'facility', '1', 'Event use', 'bleacher.jpg', 'tcgc', 0, NULL, '2024-01-19 00:27:47'),
(21, '100027', 'Oval Field', 1, 'facility', '1', 'Games and other events', 'ovalfield.jpg', 'tcgc', 1, NULL, '2024-01-19 00:28:16'),
(22, '100030', 'TCGC Swimming Pool', 1, 'facility', '1', 'Swimming sport\'s event', 'tcgcswimmingpool.jpg', 'tcgc', 0, NULL, '2024-01-19 00:28:43'),
(23, '100028', 'Room #', 1, 'facility', '1', 'none', 'tcgcroom.jpg', 'tcgc', 0, NULL, '2023-12-15 19:15:39'),
(24, '100029', 'Dance Studio', 1, 'facility', '1', 'Dance practice', 'dancestudio.jpg', 'tcgc', 0, NULL, '2024-01-19 00:29:27'),
(25, '100024', 'Speech Lab', 1, 'facility', '1', 'Classes and Seminars', 'speechlab.jpg', 'tcgc', 0, NULL, '2024-01-19 00:29:14'),
(26, '100025', 'Faculty & Staff Lounge', 1, 'facility', '1', 'Faculty use', 'facultylounge.jpg', 'tcgc', 0, NULL, '2024-01-19 00:29:40'),
(27, '100026', 'Activity Hall', 1, 'facility', '1', 'Any other activtity', 'activityhall.jpg', 'tcgc', 0, NULL, '2024-01-19 00:30:05'),
(28, '100019', 'VIP Lounge', 1, 'facility', '1', 'none', 'viplounge.jpg', 'tcgc', 0, NULL, NULL),
(29, '100020', 'Visitor Lounge', 1, 'facility', '1', 'Visitor lounge', 'visitorlounge.jpg', 'tcgc', 0, NULL, '2024-01-19 00:30:20'),
(30, '100021', 'Audio Visual Room (AVR)', 1, 'facility', '1', 'Seminars and other', 'avr.jpg', 'tcgc', 0, NULL, '2024-01-19 00:30:36'),
(38, '372188', 'The Working Congressman (TWC)', 1, 'facility', '1', 'Hostel', '1705548693.jpg', 'city', 0, '2024-01-16 22:50:37', '2024-01-17 19:32:22'),
(39, '947035', 'Computer Laboratory 2', 1, 'facility', '1', 'Classes and Seminars', '1705481025.jpg', 'tcgc', 0, '2024-01-16 22:53:29', '2024-01-17 19:11:27'),
(40, '541222', 'Projector', 1, 'equipment', '2', 'Presentation', '1705548016.jpg', 'tcgc', 0, '2024-01-17 00:31:12', '2024-01-17 19:20:16'),
(41, '873729', 'Plastic Chair', 1, 'equipment', '800', 'Event use', '1705480318.jpg', 'tcgc', 0, '2024-01-17 00:31:58', '2024-01-17 19:48:27'),
(42, '750792', 'Sound System', 1, 'equipment', '3', 'For technical', '1705547730.jpg', 'tcgc', 0, '2024-01-17 00:35:11', '2024-01-17 19:15:30'),
(43, '891321', 'Lobby', 1, 'facility', '1', 'For welcoming visitors', '1705481182.jpg', 'tcgc', 0, '2024-01-17 00:46:22', '2024-01-19 00:27:00'),
(44, '269901', 'Computer Laboratory 3', 1, 'facility', '1', 'Classes and Seminars', '1705483687.jpg', 'tcgc', 0, '2024-01-17 01:28:07', '2024-01-17 19:10:58'),
(45, '673473', 'Computer Laboratory 1', 1, 'facility', '1', 'Classes and Seminars', '1705547346.jpg', 'tcgc', 0, '2024-01-17 19:09:06', '2024-01-17 19:10:28'),
(46, '162512', 'Computer Laboratory 4', 1, 'facility', '1', 'Classes and Seminars', '1705547629.jpg', 'tcgc', 0, '2024-01-17 19:13:49', '2024-01-17 19:13:49'),
(47, '718935', 'Table/s', 1, 'equipment', '5', 'Events use', '1705548077.jpg', 'tcgc', 0, '2024-01-17 19:21:17', '2024-01-17 19:47:51'),
(48, '533242', 'Microphone', 1, 'equipment', '1', 'Events use', '1705548274.jpg', 'tcgc', 0, '2024-01-17 19:24:34', '2024-01-17 19:47:41'),
(49, '367984', 'Strobing Lights Fixture', 1, 'equipment', '1', 'Events use', '1705548309.jpg', 'tcgc', 0, '2024-01-17 19:25:09', '2024-01-17 19:47:28'),
(50, '012872', 'Electricfan', 1, 'equipment', '5', '', '1705548415.jpg', 'tcgc', 0, '2024-01-17 19:26:55', '2024-01-17 19:26:55'),
(51, '662662', 'Sports Equipment', 1, 'equipment', '6', 'Choose your to equipment borrow', '1705566958.jpg', 'tcgc', 0, '2024-01-17 23:41:55', '2024-01-18 18:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2023_10_20_043648_create_items_table', 1),
(24, '2023_10_20_044324_create_bookings_table', 1),
(25, '2023_10_29_135313_create_items_table', 2),
(29, '2023_10_30_035013_create_prices_table', 6),
(33, '2023_10_30_073214_create_t_c_g_c_facilities_descriptions_table', 10),
(63, '2023_11_13_115157_create_tourism_equipment_table', 11),
(64, '2023_11_13_115349_create_tourism_rooms_table', 11),
(65, '2023_11_13_115532_create_tourism_facilities_table', 11),
(80, '2023_11_13_120014_create_tcgcfacilities_table', 12),
(81, '2023_11_13_120104_create_tcgcrooms_table', 12),
(82, '2023_11_13_120149_create_tcgcequipments_table', 12),
(95, '2023_11_13_120332_create_booking_histories_table', 13),
(96, '2023_11_15_015408_create_tourism_items_table', 13),
(97, '2023_11_15_020330_create_tcgc_items_table', 13),
(147, '2014_10_12_000000_create_users_table', 14),
(148, '2014_10_12_100000_create_password_reset_tokens_table', 14),
(149, '2014_10_12_100000_create_password_resets_table', 14),
(150, '2019_08_19_000000_create_failed_jobs_table', 14),
(151, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(152, '2023_10_20_034617_create_profiles_table', 14),
(153, '2023_10_30_072932_create_tourism_rooms_descriptions_table', 14),
(154, '2023_10_30_073023_create_tourism_equipments_descriptions_table', 14),
(155, '2023_10_30_073147_create_tourism_facilities_descriptions_table', 14),
(156, '2023_10_31_021315_create_bookings_table', 14),
(157, '2023_11_19_071636_create_item_lists_table', 14),
(158, '2023_11_20_055256_create_my_carts_table', 14),
(159, '2023_11_25_152849_create_tcgc_bookings_table', 14),
(160, '2023_12_15_061056_create_more_images_table', 15),
(161, '2024_01_18_054939_create_walkin_profiles_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `my_carts`
--

CREATE TABLE `my_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `first_name`, `last_name`, `username`, `date_of_birth`, `address`, `zipcode`, `img_id`, `created_at`, `updated_at`, `contact_number`, `back_id`) VALUES
(1, 'jeffrey', 'ombina', 'jeffrey123', '2000-01-01', 'Maloro, tangub City', '7214', 'sampleimg.jpg', NULL, NULL, '', ''),
(2, 'christopher', 'casipong', 'casipong143', '2000-01-01', 'Maloro, tangub City', '7214', '1702695181.jpg', NULL, '2024-01-11 04:05:31', '09123512312', ''),
(3, 'jibert', 'lozada', 'jibert143', '2000-01-01', 'Maloro, tangub City', '7214', '1702695181.jpg', NULL, NULL, '', ''),
(7, 'Romel', 'Calimpong', 'romel143', '2023-12-16', 'bong bong, ozamiz city', '7200', '1702695181.jpg', '2023-12-15 18:53:01', '2023-12-15 18:53:01', '09212412124', ''),
(13, 'Danica', 'Magbanua', 'danica.magbanua', '2000-12-12', 'Barangay Bonifacio, Bonifacio', NULL, 'vPalPdPb9y.jpg', '2024-01-16 17:33:19', '2024-01-16 17:33:19', '09125121235', '7Jeln4Kpyi.jpg'),
(14, 'Eric', 'Tecson', 'erictecson', '2004-07-14', 'Maloro, Tangub City', '9000', 'PeMr5XckjP.jpg', '2024-01-16 18:01:34', '2024-01-16 18:01:34', '09092798366', 'qgeDOsaxsN.jpg'),
(15, 'Danica Lyn', 'Laluan', 'DanicaLyn', '2021-07-17', 'Tangub City', '9000', 'LUffGMe7EJ.jpg', '2024-01-16 18:07:45', '2024-01-16 18:07:45', '09092798361', '3i5jRBlgtK.jpg'),
(16, 'jeffrey', 'ombina', 'jeffreyombina', '2014-02-17', 'Tangub City', '9000', 'v9PXRxvrQr.jpg', '2024-01-16 21:47:06', '2024-01-16 21:47:06', '09092798311', 'R4Yz34CxKq.jpg'),
(17, 'Jihasmen', 'canene', 'jihasmencanane', '2005-03-17', 'Tangub', '9000', 'rCR3xlprnE.jpg', '2024-01-16 22:21:52', '2024-01-16 22:21:52', '09092798322', '2jVGLMeGJ1.jpg'),
(18, 'user2', 'user2', 'user2', '2012-02-17', 'Tangub', '9000', 'DVMS5TGtgp.jpg', '2024-01-16 22:26:54', '2024-01-16 22:26:54', '0909279877', 'XdflTQsfep.jpg'),
(19, 'user3', 'user3', 'user3', '2001-03-17', 'Maloro Tangub', '9000', 'RTutBQf28F.jpg', '2024-01-16 22:29:38', '2024-01-16 22:29:38', '0909279821', 'WW2EdVaqc7.jpg'),
(20, 'user4', 'user4', 'user4', '2002-08-16', 'Maloro, Tangub', '9000', 'QehCX5MO45.jpg', '2024-01-16 22:37:40', '2024-01-16 22:37:40', '09092798233', 'JylCu31cB4.jpg'),
(21, 'user5', 'user5', 'user5', '2024-01-21', 'Tangub', '9000', 'YFe8iv7jGD.jpg', '2024-01-16 22:41:13', '2024-01-16 22:41:13', '0909279633', 'wACNDjGxL3.jpg'),
(22, 'Jerico', 'Rosales', 'jericorosales', '2007-04-18', 'Cebu City', '1290', 'BHqMDJyPcD.jpg', '2024-01-17 21:42:07', '2024-01-17 21:42:07', '0909279844', 'RnszPwrlrT.jpg'),
(23, 'user1', 'user1', 'user1', '2017-03-08', 'Manila', '1292', '21ZBnwsfEZ.jpg', '2024-01-17 21:47:03', '2024-01-17 21:47:03', '09092791411', 'Dg7zVDHZ7Z.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tcgc_bookings`
--

CREATE TABLE `tcgc_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chair` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rostrum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `microphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strobing_light` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electricfan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volleyball_ball` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volleyball_net` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basketball_ball` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `javelin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discus_throw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shotput` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soccer_ball` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swim_cap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goggle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tcgc_bookings`
--

INSERT INTO `tcgc_bookings` (`id`, `institute`, `start_date`, `end_date`, `item_id`, `username`, `activity`, `chair`, `table`, `rostrum`, `number_of_person`, `created_at`, `updated_at`, `status`, `speaker`, `microphone`, `projector`, `strobing_light`, `electricfan`, `volleyball_ball`, `volleyball_net`, `basketball_ball`, `javelin`, `discus_throw`, `shotput`, `soccer_ball`, `swim_cap`, `goggle`) VALUES
(37, 'ICS', '2024-05-23 02:08:00', '2024-05-31 02:11:00', '673473', 'casipong143', 'color', '0', '0', '0', '0', '2024-05-15 22:08:51', '2024-05-15 22:08:51', 0, '10', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_equipments_descriptions`
--

CREATE TABLE `tourism_equipments_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourism_equipments_descriptions`
--

INSERT INTO `tourism_equipments_descriptions` (`id`, `item_id`, `item_name`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, '100007', 'Sound System', 1, '650.00/hr', NULL, NULL),
(3, '100009', 'Plastic Chairs', 1, '25.00/chair', NULL, NULL),
(4, '100010', 'Kitchen Utensils', 1, '15.00 per set', NULL, NULL),
(5, '100011', 'Dump Track', 1, '1,000.00/hour', NULL, NULL),
(6, '100012', 'Grader', 1, '2,000.00/hour', NULL, NULL),
(7, '100013', 'Pay Loader', 1, '1,000.00/hour', NULL, NULL),
(8, '100014', 'Bulldozer', 1, '2,000.00/hour', NULL, NULL),
(9, '100015', 'Backhoe/Breaker', 1, '1,000.00/hour', NULL, NULL),
(10, '100016', 'Road Roller', 1, '1,000.00/hour', NULL, NULL),
(11, '100017', 'Cement Mixer (Big)', 1, '1,000.00/hour', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tourism_facilities_descriptions`
--

CREATE TABLE `tourism_facilities_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aircon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourism_facilities_descriptions`
--

INSERT INTO `tourism_facilities_descriptions` (`id`, `item_id`, `item_name`, `purpose`, `time`, `status`, `price_description`, `aircon`, `price`, `created_at`, `updated_at`) VALUES
(1, '100001', 'Sinanduloy Cultural Center', 'Seminars/Conventions to be held', 'Daytime', 1, 'First 3 Hours', 'Yes', '4,000.00', NULL, NULL),
(2, '100001', 'Sinanduloy Cultural Center', 'Seminars/Conventions to be held', 'Daytime', 1, 'First 3 Hours', 'No', '3,000.00', NULL, NULL),
(3, '100001', 'Sinanduloy Cultural Center', 'Seminars/Conventions to be held', 'Night Time', 1, 'For Succeeding Hours', 'Yes', '450.00/hour', NULL, NULL),
(4, '100001', 'Sinanduloy Cultural Center', 'Seminars/Conventions to be held', 'Night Time', 1, 'For Succeeding Hours', 'No', '350.00/hour', NULL, NULL),
(5, '100001', 'Sinanduloy Cultural Center', 'basketball/volleyball games, income based', 'All Time', 1, 'On tickets sold', 'Yes', '25% of the proceeds ticket', NULL, NULL),
(6, '100001', 'Sinanduloy Cultural Center', 'Live shows/boxing, income based on tickets', 'All Time', 1, 'On tickets sold', 'Yes', '25% of the proceeds ticket', NULL, NULL),
(7, '100001', 'Sinanduloy Cultural Center', 'basketball game practice, without the use of showers, locker, and dry out room', 'Daytime', 1, 'First 2 Hours', 'Yes', '500.00', NULL, NULL),
(8, '100001', 'Sinanduloy Cultural Center', 'basketball game practice, without the use of showers, locker, and dry out room', 'Daytime', 1, 'Subsequent hours', 'Yes', '100.00/hour', NULL, NULL),
(9, '100001', 'Sinanduloy Cultural Center', 'basketball game practice, without the use of showers, locker, and dry out room', 'Night Time', 1, 'First 2 Hours', 'Yes', '700.00', NULL, NULL),
(10, '100001', 'Sinanduloy Cultural Center', 'basketball game practice, without the use of showers, locker, and dry out room', 'Night Time', 1, 'Subsequent hours', 'Yes', '150.00/hour', NULL, NULL),
(11, '100002', 'Function Hall 1', 'Wedding, birthday, anniversary, baptismal, reunion, and the like', 'All Time', 1, 'First 2 Hours', 'Yes', '4,000.00', NULL, NULL),
(12, '100002', 'Function Hall 1', 'Wedding, birthday, anniversary, baptismal, reunion, and the like', 'All Time', 1, 'Subsequent hours', 'Yes', '300.00/hour', NULL, NULL),
(13, '100002', 'Function Hall 1', 'Conference, meeting, fellowship, and similar occasion', 'All Time', 1, 'First 4 Hours', 'Yes', '3,000.00', NULL, NULL),
(14, '100002', 'Function Hall 1', 'Conference, meeting, fellowship, and similar occasion', 'All Time', 1, 'Subsequent hours', 'Yes', '300.00/hour', NULL, NULL),
(15, '100002', 'Function Hall 1', 'Disco, Ballroom, and similar occasion', 'All Time', 1, 'First 4 Hours', 'Yes', '2,500.00', NULL, NULL),
(16, '100002', 'Function Hall 1', 'Disco, Ballroom, and similar occasion', 'All Time', 1, 'Subsequent hours', 'Yes', '300.00/hour', NULL, NULL),
(23, '100005', 'City Hostel', '', 'All Time', 1, 'Rooms good for 4 pax', 'Yes', '2,000.00/day', NULL, NULL),
(24, '100005', 'City Hostel', '', 'All Time', 1, 'Dormitory Type good for 10 pax', 'Yes', '300.00 per pax/day', NULL, NULL),
(25, '100005', 'City Hostel', '', 'All Time', 1, 'Extra bed', 'Yes', '200.00', NULL, NULL),
(28, '372188', 'The Working Congressman (TWC)', 'Stay In', 'Daytime', 1, '1500for 7 hours', NULL, '400', '2024-01-18 23:52:08', '2024-01-18 23:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usertype` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plain_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `email`, `usertype`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `plain_pass`) VALUES
(1, 2, 'jeffrey123', 'jeffrey_ombina@gmail.com', 2, NULL, '$2y$10$8dCtMujSjIWxLvWnce4QfOU2aKfsMYTVwWaqTVnUw96QW8LyFK8X6', 1, NULL, NULL, NULL, '123456789'),
(2, 1, 'casipong143', 'christopher_casipong@gmail.com', 2, NULL, '$2y$10$InrZ9H7GeYksIYeb7M2qIuue50ZtUggTfbMU.PnwyKcYyG3TRWcK6', 1, NULL, NULL, NULL, '123456789'),
(3, 3, 'jibert143', 'christopher.casipong@gmail.com', 2, NULL, '$2y$10$f2FgVLErZam6b4rCJmjUv.YAh76N2SQ.RAzmojWM5aXM3ax9vHq4S', 1, NULL, NULL, '2023-12-08 07:14:21', '123456789'),
(11, 4, 'romel143', 'christopher.casipong2001@gmail.com', 2, NULL, '$2y$10$UfkKGpD7xuCEquD05OxLM.NMyA.CrmNE84wPQX2G6eenZMtgKyYL.', 1, NULL, '2023-12-15 18:53:01', '2023-12-15 19:14:50', '123456789'),
(23, 0, 'jericorosales', 'jericorosales@gmail.com', 2, NULL, '$2y$10$WRcq3D33R6TAkQV0pHfhUObpr6oByzpGwyhnhlwg8yV1cZFbk0aSu', 1, NULL, '2024-01-17 21:42:07', '2024-01-17 21:42:07', '123456789'),
(24, 0, 'user1', 'user1@gmail.com', 2, NULL, '$2y$10$sCkPYFujz1sDjHBS0OONbui0yMFa/290uBz7LaWgVcH8kOKINb9HW', 1, NULL, '2024-01-17 21:47:03', '2024-01-17 21:47:36', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_lists`
--
ALTER TABLE `image_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_lists`
--
ALTER TABLE `item_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_carts`
--
ALTER TABLE `my_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_username_unique` (`username`);

--
-- Indexes for table `tcgc_bookings`
--
ALTER TABLE `tcgc_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_equipments_descriptions`
--
ALTER TABLE `tourism_equipments_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_facilities_descriptions`
--
ALTER TABLE `tourism_facilities_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_lists`
--
ALTER TABLE `image_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `item_lists`
--
ALTER TABLE `item_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `my_carts`
--
ALTER TABLE `my_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tcgc_bookings`
--
ALTER TABLE `tcgc_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tourism_equipments_descriptions`
--
ALTER TABLE `tourism_equipments_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tourism_facilities_descriptions`
--
ALTER TABLE `tourism_facilities_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
