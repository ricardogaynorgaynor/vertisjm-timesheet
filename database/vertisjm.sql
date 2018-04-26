-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 03:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vertisjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(10) UNSIGNED NOT NULL,
  `address_user_id` int(10) UNSIGNED NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `address_user_id`, `address_line_1`, `address_line_2`, `address_zip_code`, `country`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 4, 'Chudliegh Christiana manchester', '', '129hh34', 'Jamaica', NULL, '2018-04-21 22:42:04', '2018-04-21 22:42:04'),
(4, 5, 'Tavern kintire', 'Mandeville', '4324ddd', 'Trinidad', NULL, '2018-04-22 01:48:25', '2018-04-25 23:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approval_id` int(10) UNSIGNED NOT NULL,
  `approval_task_id` int(10) UNSIGNED NOT NULL,
  `approval_approve_by_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`approval_id`, `approval_task_id`, `approval_approve_by_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, '2018-04-25 07:46:37', '2018-04-25 07:46:37'),
(2, 4, 1, NULL, '2018-04-25 07:46:42', '2018-04-25 07:46:42'),
(3, 6, 1, NULL, '2018-04-25 07:47:09', '2018-04-25 07:47:09'),
(4, 7, 1, NULL, '2018-04-25 07:47:12', '2018-04-25 07:47:12'),
(5, 2, 1, NULL, '2018-04-25 22:12:38', '2018-04-25 22:12:38'),
(6, 7, 1, NULL, '2018-04-26 01:02:08', '2018-04-26 01:02:08'),
(7, 7, 1, NULL, '2018-04-26 01:02:17', '2018-04-26 01:02:17'),
(8, 6, 1, NULL, '2018-04-26 01:02:32', '2018-04-26 01:02:32'),
(9, 6, 1, NULL, '2018-04-26 01:03:44', '2018-04-26 01:03:44'),
(10, 7, 1, NULL, '2018-04-26 01:05:19', '2018-04-26 01:05:19'),
(11, 7, 1, NULL, '2018-04-26 01:05:40', '2018-04-26 01:05:40'),
(12, 1, 1, NULL, '2018-04-26 01:07:27', '2018-04-26 01:07:27'),
(13, 11, 1, NULL, '2018-04-26 01:09:50', '2018-04-26 01:09:50'),
(14, 10, 1, NULL, '2018-04-26 01:09:55', '2018-04-26 01:09:55'),
(15, 3, 1, NULL, '2018-04-26 01:31:08', '2018-04-26 01:31:08'),
(16, 8, 1, NULL, '2018-04-26 01:34:38', '2018-04-26 01:34:38'),
(17, 9, 1, NULL, '2018-04-26 01:34:41', '2018-04-26 01:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `client_user_id` int(10) UNSIGNED NOT NULL,
  `client_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_home_telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_work_telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_user_id`, `client_company`, `client_name`, `client_email`, `client_image`, `deleted_at`, `client_home_telephone`, `client_work_telephone`, `client_mobile`, `created_at`, `updated_at`) VALUES
(4, 1, 'JAagro technologies and harware', 'Kerion Willis', 'kerionwillis@gmail.com', '1524332523avatar1-72.jpg', NULL, '1876456392', '18239343', '876 8363443', '2018-04-21 22:42:04', '2018-04-21 22:42:04'),
(5, 1, 'EDU Solutions', 'Ramone', 'ramone@gmail.com', '1524681076avatar4-120.jpg', NULL, '1876456392', '18239343', '876 8363443', '2018-04-22 01:48:25', '2018-04-25 23:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `employee_user_id` int(10) UNSIGNED NOT NULL,
  `employee_added_by_id` int(10) UNSIGNED NOT NULL,
  `employee_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `employee_department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_user_id`, `employee_added_by_id`, `employee_type`, `deleted_at`, `employee_department`, `created_at`, `updated_at`) VALUES
(4, 6, 2, 'inoffice', NULL, 'marketing', '2018-04-22 05:10:05', '2018-04-22 05:10:05'),
(5, 7, 2, 'conrtactor', NULL, 'marketing', '2018-04-22 13:26:58', '2018-04-22 13:26:58'),
(6, 8, 2, 'inoffice', NULL, 'sales', '2018-04-22 13:33:17', '2018-04-22 13:33:17'),
(7, 9, 2, 'inoffice', NULL, 'marketing', '2018-04-22 13:33:58', '2018-04-22 13:33:58'),
(8, 10, 2, 'inoffice', NULL, 'marketing', '2018-04-24 08:58:39', '2018-04-24 08:58:39'),
(11, 13, 2, 'inoffice', NULL, 'sales', '2018-04-24 10:02:32', '2018-04-24 10:02:32'),
(12, 14, 2, 'inoffice', NULL, 'marketing', '2018-04-25 06:44:16', '2018-04-25 06:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(10) UNSIGNED NOT NULL,
  `manager_user_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `manager_user_id`, `department`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'HR', NULL, '2018-04-20 05:00:00', '2018-04-26 04:55:23'),
(6, 16, 'Marketing', NULL, '2018-04-26 03:53:16', '2018-04-26 03:57:07');

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2018_04_21_051004_create_clients_table', 1),
(41, '2018_04_21_051018_create_employees_table', 1),
(43, '2018_04_21_051242_create_approvals_table', 1),
(44, '2018_04_21_054248_create_addresses_table', 1),
(45, '2018_04_21_054649_create_managers_table', 1),
(46, '2018_04_21_051033_create_projects_table', 2),
(47, '2018_04_21_213144_create_project_teams_table', 3),
(49, '2018_04_21_035701_create_tasks_table', 4);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_created_by_id` int(10) UNSIGNED NOT NULL,
  `project_client_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_created_by_id`, `project_client_id`, `project_name`, `status`, `deadline`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Apple Prject', NULL, '2018-04-25 16:49:18', NULL, '2018-04-22 01:02:43', '2018-04-25 21:45:36'),
(2, 2, 4, 'Mobile Application for Clientbizz', NULL, '2018-04-12 05:00:00', NULL, '2018-04-22 01:03:23', '2018-04-22 01:03:23'),
(3, 2, 5, 'UTech Info Desk', NULL, '2018-04-26 05:00:00', NULL, '2018-04-22 01:48:54', '2018-04-22 01:48:54'),
(4, 2, 4, 'Facebook Website', NULL, '2018-04-13 05:00:00', NULL, '2018-04-22 13:36:35', '2018-04-22 13:36:35'),
(5, 2, 4, 'NCB innovation lab renovation', NULL, '2018-04-25 22:06:33', NULL, '2018-04-24 07:27:59', '2018-04-25 22:06:33'),
(6, 2, 5, 'Reverse polish notation calculator', NULL, '2018-04-13 05:00:00', NULL, '2018-04-25 05:59:49', '2018-04-25 05:59:49'),
(7, 2, 5, 'VertisJm Company web page', NULL, '2018-04-26 05:00:00', NULL, '2018-04-25 20:40:24', '2018-04-25 20:40:24'),
(8, 2, 4, 'Apple Macbook design', NULL, '2018-04-11 05:00:00', NULL, '2018-04-25 20:54:21', '2018-04-25 20:54:21'),
(9, 2, 5, 'Microsoft Company renovation ', NULL, '2018-04-13 05:00:00', NULL, '2018-04-25 20:55:00', '2018-04-25 20:55:00'),
(10, 2, 5, 'UTech Mobile Application Design', NULL, '2018-04-25 23:36:14', NULL, '2018-04-25 20:59:08', '2018-04-25 23:36:14'),
(11, 2, 5, 'Vertisjm is the number one company to work for', NULL, '2018-07-20 05:00:00', NULL, '2018-04-25 21:00:04', '2018-04-25 21:00:04'),
(12, 2, 5, 'Clientbizz Crm development', NULL, '2018-04-12 05:00:00', NULL, '2018-04-25 21:24:17', '2018-04-25 21:24:17'),
(13, 2, 4, 'HP Monitor repair', NULL, '2018-04-12 05:00:00', NULL, '2018-04-25 21:27:00', '2018-04-25 21:27:00'),
(14, 2, 4, 'Configure Spring framework for vertisjm', NULL, '2018-07-21 05:00:00', NULL, '2018-04-26 00:04:21', '2018-04-26 00:04:21'),
(15, 6, 4, 'IOS App for farmers', NULL, '2018-04-13 05:00:00', NULL, '2018-04-26 04:24:40', '2018-04-26 04:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `project_teams`
--

CREATE TABLE `project_teams` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `project_employee_user_id` int(10) UNSIGNED NOT NULL,
  `project_manager_user_id` int(10) UNSIGNED NOT NULL,
  `project_team_project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_teams`
--

INSERT INTO `project_teams` (`team_id`, `project_employee_user_id`, `project_manager_user_id`, `project_team_project_id`, `created_at`, `updated_at`) VALUES
(5, 4, 2, 2, '2018-04-22 12:38:38', '2018-04-22 12:38:38'),
(12, 5, 2, 4, '2018-04-22 13:37:15', '2018-04-22 13:37:15'),
(13, 4, 2, 4, '2018-04-22 13:37:18', '2018-04-22 13:37:18'),
(14, 6, 2, 4, '2018-04-22 13:37:21', '2018-04-22 13:37:21'),
(16, 5, 2, 3, '2018-04-22 13:39:33', '2018-04-22 13:39:33'),
(17, 6, 2, 2, '2018-04-22 14:15:36', '2018-04-22 14:15:36'),
(18, 6, 2, 1, '2018-04-22 14:15:48', '2018-04-22 14:15:48'),
(19, 8, 2, 4, '2018-04-25 00:26:32', '2018-04-25 00:26:32'),
(20, 11, 2, 4, '2018-04-25 00:26:37', '2018-04-25 00:26:37'),
(21, 6, 2, 6, '2018-04-25 08:41:26', '2018-04-25 08:41:26'),
(22, 6, 2, 8, '2018-04-25 20:54:29', '2018-04-25 20:54:29'),
(23, 6, 2, 13, '2018-04-25 23:33:45', '2018-04-25 23:33:45'),
(24, 4, 6, 15, '2018-04-26 04:24:43', '2018-04-26 04:24:43'),
(25, 6, 6, 15, '2018-04-26 04:24:47', '2018-04-26 04:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_employee_id` int(10) UNSIGNED NOT NULL,
  `task_project_id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `task_start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task_end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_taken` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `task_comment` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_employee_id`, `task_project_id`, `task_name`, `deleted_at`, `task_start_date`, `task_end_date`, `time_taken`, `datetime`, `task_comment`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Making of JAagro', NULL, '12:00 pm', '1:00 am', '', NULL, NULL, NULL, NULL),
(2, 6, 4, 'ASas', NULL, '11:15 PM', '9:30 PM', '', NULL, 'ASas', '2018-04-24 08:41:53', '2018-04-24 08:41:53'),
(3, 6, 4, 'ASas', NULL, '11:15 PM', '9:30 PM', '', NULL, 'ASas', '2018-04-24 08:43:05', '2018-04-24 08:43:05'),
(4, 6, 4, 'ASas', NULL, '11:15 PM', '9:30 PM', '', NULL, 'ASas', '2018-04-24 08:43:21', '2018-04-24 08:43:21'),
(5, 6, 4, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '10:30 PM', '11:00 AM', '', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2018-04-24 08:54:05', '2018-04-24 08:54:05'),
(6, 6, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '1:30 AM', '4:00 AM', '', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2018-04-24 11:23:57', '2018-04-24 11:23:57'),
(7, 6, 4, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and ', NULL, '2:00 AM', '2:00 AM', '', NULL, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '2018-04-24 11:54:24', '2018-04-24 11:54:24'),
(8, 6, 6, 'Type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '19:00', '16:30', '', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2018-04-25 08:58:29', '2018-04-25 08:58:29'),
(9, 6, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ', NULL, '9:15', '18:30', '', '2018-04-25 10:56:18', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2018-04-25 10:56:18', '2018-04-25 10:56:18'),
(10, 6, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', NULL, '3:00', '9:00', '', '2018-04-14 05:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2018-04-25 11:03:20', '2018-04-25 11:03:20'),
(11, 6, 6, 'The Laravel Schema class provides a database agnostic way of manipulating tables. It works well with all of the \r\n\r\n\r\n', NULL, '1:00', '6:15', '5:15', '2018-04-28 05:00:00', 'The Laravel Schema class provides a database agnostic way of manipulating tables. It works well with all of the databases supported by Laravel, and has a unified API across all of these systems.\r\n\r\n\r\n', '2018-04-25 11:12:41', '2018-04-25 11:12:41'),
(12, 6, 4, 'Java Database Connectivity is an application programming interface for the programming language Java', NULL, '3:30', '7:00', '3:30', '2018-04-26 05:08:00', 'Java Database Connectivity is an application programming interface for the programming language Java, which defines how a client may access a database. It is a Java-based data access technology used for Java database connectivity.', '2018-04-26 05:08:00', '2018-04-26 05:08:00'),
(13, 6, 4, 'sfddf', NULL, '0:30', '5:00', '4:30', '2018-04-21 05:00:00', 'sdfsdf', '2018-04-26 05:28:01', '2018-04-26 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `u_type`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ricardo Gaynor', '15247004271605048.jpg', 'admin@gmail.com', '$2y$10$hjNS0VNBufQroPg7/C7d1O42ziI6Q3tGrlkEAC.YnLHUo1oVxzpfO', 'man', NULL, 'RABDRUvCiDC49PK4Ddm5mDeuiwMLIHu54SIgC2dnXVId3Q0vKGzEkLxoIC9J', '2018-04-21 22:38:42', '2018-04-26 06:53:56'),
(6, 'Rohan Bedward', '1524355805avatar2-72.jpg', 'rohanbedward@gmail.com', '$2y$10$P2/5S639FbW7GUioxfuW9uzCuR1eXPskc0nqnPrXD3ZAf415BZkf2', 'emp', NULL, NULL, '2018-04-22 05:10:05', '2018-04-22 05:10:05'),
(7, 'Byran Mullings', '1524385618avatar2-200.jpg', 'byranmullings@gmail.com', '$2y$10$k4IyZ4vVzxZab3miEdk4EeXoyqj3.KujguRnZxzD.qMzbAErcfhEy', 'emp', NULL, NULL, '2018-04-22 13:26:58', '2018-04-22 13:26:58'),
(8, 'Tashiek Henry', '1524385997avatar7-72.jpg', 'employee@gmail.com', '$2y$10$.WZtQo.oG4eStHsIS6RJ0ehRDOVjwVmMIg63.4N8v4MlAH4Dry9AS', 'emp', NULL, 'U652GI1z6X6eD1ca1pUb1EHcqz78IX1FyM0fOGDfHHZEZFHaSlYVi0Q2xetJ', '2018-04-22 13:33:17', '2018-04-26 06:56:22'),
(9, 'Kerion Willis', '1524386038avatar3-120.jpg', 'kerionwillis@gmail.com', '$2y$10$bS6BSqoA.4ZVH3pJY3msa.1YSdhN.SiqTYRpVo37yAeOSzJSXiT9e', 'emp', NULL, NULL, '2018-04-22 13:33:58', '2018-04-22 13:33:58'),
(10, 'Joshane Belinfany', '1524542318avatar8-72.jpg', 'Joshane@gmail.com', '$2y$10$ulCaoCxfRr/B3aP/JfVi4.jBltcAHlUFCroG1xY6fB0Marxv2.Jce', 'emp', NULL, NULL, '2018-04-24 08:58:38', '2018-04-24 08:58:38'),
(13, 'Kadeen Howitt', '1524546151avatar3-72.jpg', 'kaeen@gmail.com', '$2y$10$wkcmEGfhBrUPTyNa36WJrOlW.38PZRT/fDEHckCVhk9ehc.K40g9C', 'emp', NULL, NULL, '2018-04-24 10:02:32', '2018-04-24 10:02:32'),
(14, 'Ashauni Cummings', '1524620656avatar4-120.jpg', 'ashauni@gmail.com', '$2y$10$qXlFKoKT68wVJQ6zMcHqoueKTfNSYJFTQnK0P0PQ59cbsslRzmlR2', 'emp', NULL, NULL, '2018-04-25 06:44:16', '2018-04-25 06:44:16'),
(15, 'Romar', 'profile.png', 'romar@yahoo.com', '$2y$10$n7ZZ/7Re9ro7mdLweOHYDeQw2f2T1umzivde6i9mwfM9l.KBoF.uS', 'man', NULL, '7Oyr9GNi3cVJfLoDDUfcLGJUY4eAeMa3KBPYQvr6vJMDh7bTOBfWYQEArdUe', '2018-04-26 02:38:18', '2018-04-26 02:39:39'),
(16, 'Kemar Dawson', '1524697046avatar8-72.jpg', 'kemar@gmail.com', '$2y$10$GODdH1bzTWjSBpXwOyfqBehP2N6MQXF.ZvbQl2SSHastw.c1lzkP2', 'man', NULL, 'S4kSyXsJxgtjmT57vrJw8lWcFe1G9TApowwDPjrQC3DKzyWt2bWXP8XDUKdg', '2018-04-26 02:41:41', '2018-04-26 04:51:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `addresses_address_user_id_foreign` (`address_user_id`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `clients_client_user_id_foreign` (`client_user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employees_employee_user_id_foreign` (`employee_user_id`),
  ADD KEY `employee_added_by_id` (`employee_added_by_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `managers_manager_user_id_foreign` (`manager_user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `projects_project_created_by_id_foreign` (`project_created_by_id`),
  ADD KEY `projects_project_client_id_foreign` (`project_client_id`);

--
-- Indexes for table `project_teams`
--
ALTER TABLE `project_teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `project_teams_project_employee_user_id_foreign` (`project_employee_user_id`),
  ADD KEY `project_teams_project_manager_user_id_foreign` (`project_manager_user_id`),
  ADD KEY `project_teams_project_team_project_id_foreign` (`project_team_project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `tasks_task_employee_id_foreign` (`task_employee_id`),
  ADD KEY `tasks_task_project_id_foreign` (`task_project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approval_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_teams`
--
ALTER TABLE `project_teams`
  MODIFY `team_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_address_user_id_foreign` FOREIGN KEY (`address_user_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_client_user_id_foreign` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_employee_user_id_foreign` FOREIGN KEY (`employee_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`employee_added_by_id`) REFERENCES `managers` (`manager_id`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_manager_user_id_foreign` FOREIGN KEY (`manager_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_client_id_foreign` FOREIGN KEY (`project_client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `projects_project_created_by_id_foreign` FOREIGN KEY (`project_created_by_id`) REFERENCES `managers` (`manager_id`);

--
-- Constraints for table `project_teams`
--
ALTER TABLE `project_teams`
  ADD CONSTRAINT `project_teams_project_employee_user_id_foreign` FOREIGN KEY (`project_employee_user_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `project_teams_project_manager_user_id_foreign` FOREIGN KEY (`project_manager_user_id`) REFERENCES `managers` (`manager_id`),
  ADD CONSTRAINT `project_teams_project_team_project_id_foreign` FOREIGN KEY (`project_team_project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_task_employee_id_foreign` FOREIGN KEY (`task_employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `tasks_task_project_id_foreign` FOREIGN KEY (`task_project_id`) REFERENCES `projects` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
