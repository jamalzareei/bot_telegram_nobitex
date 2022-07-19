-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2022 at 03:28 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shixehco_rezvini`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `bank`, `type_id`, `number`, `actived_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 2, 'IR790190000000112280711001', '2022-07-09 21:20:39', '2022-07-09 21:20:39', '2022-07-09 21:20:39', NULL),
(2, 1, NULL, 1, '6037697486000216', '2022-07-09 21:25:15', '2022-07-09 21:25:15', '2022-07-09 21:25:15', NULL),
(3, 1, NULL, 1, '5041721081000433', '2022-07-09 21:38:31', '2022-07-09 21:38:31', '2022-07-09 21:38:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bots`
--

CREATE TABLE `bots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chat_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `callback_query_id` varchar(255) DEFAULT NULL,
  `message_id` varchar(255) NOT NULL,
  `file_id` varchar(255) DEFAULT NULL,
  `next_answer` varchar(255) DEFAULT NULL,
  `callback_data` varchar(255) DEFAULT NULL,
  `parent_chat` varchar(255) DEFAULT NULL,
  `controller_method` varchar(255) DEFAULT NULL,
  `controller_method_child` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `data` json NOT NULL,
  `session_data` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bots`
--

INSERT INTO `bots` (`id`, `type_id`, `chat_id`, `message`, `callback_query_id`, `message_id`, `file_id`, `next_answer`, `callback_data`, `parent_chat`, `controller_method`, `controller_method_child`, `firstname`, `lastname`, `username`, `data`, `session_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '926406689', 'پروفایل', '', '2509', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266574, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2509}, \"update_id\": 937945062}', '{\"update_id\":937945062,\"message\":{\"message_id\":2509,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266574,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:06:15', '2022-07-19 17:06:15', NULL),
(2, NULL, '926406689', '09135368845', '', '2511', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266582, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2511}, \"update_id\": 937945063}', '{\"update_id\":937945063,\"message\":{\"message_id\":2511,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266582,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:06:23', '2022-07-19 17:06:23', NULL),
(3, NULL, '926406689', '09135368845', '', '2511', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266582, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2511}, \"update_id\": 937945063}', '{\"update_id\":937945063,\"message\":{\"message_id\":2511,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266582,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:06:23', '2022-07-19 17:06:23', NULL),
(4, NULL, '926406689', '1111', '', '2513', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266628, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"1111\", \"message_id\": 2513}, \"update_id\": 937945064}', '{\"update_id\":937945064,\"message\":{\"message_id\":2513,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266628,\"text\":\"1111\"}}', '2022-07-19 17:07:09', '2022-07-19 17:07:09', NULL),
(5, NULL, '926406689', 'پروفایل', '', '2515', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266765, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2515}, \"update_id\": 937945065}', '{\"update_id\":937945065,\"message\":{\"message_id\":2515,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266765,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:09:26', '2022-07-19 17:09:26', NULL),
(6, NULL, '926406689', '09135368845', '', '2517', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266770, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2517}, \"update_id\": 937945066}', '{\"update_id\":937945066,\"message\":{\"message_id\":2517,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266770,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:09:33', '2022-07-19 17:09:33', NULL),
(7, NULL, '926406689', '09135368845', '', '2517', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266770, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2517}, \"update_id\": 937945066}', '{\"update_id\":937945066,\"message\":{\"message_id\":2517,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266770,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:09:33', '2022-07-19 17:09:33', NULL),
(8, NULL, '926406689', '11', '', '2519', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266775, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"11\", \"message_id\": 2519}, \"update_id\": 937945067}', '{\"update_id\":937945067,\"message\":{\"message_id\":2519,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266775,\"text\":\"11\"}}', '2022-07-19 17:09:36', '2022-07-19 17:09:36', NULL),
(9, NULL, '926406689', 'پروفایل', '', '2521', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266859, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2521}, \"update_id\": 937945068}', '{\"update_id\":937945068,\"message\":{\"message_id\":2521,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266859,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:11:00', '2022-07-19 17:11:00', NULL),
(10, NULL, '926406689', '09135368845', '', '2523', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266875, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2523}, \"update_id\": 937945069}', '{\"update_id\":937945069,\"message\":{\"message_id\":2523,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266875,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:11:16', '2022-07-19 17:11:16', NULL),
(11, NULL, '926406689', '09135368845', '', '2523', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266875, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2523}, \"update_id\": 937945069}', '{\"update_id\":937945069,\"message\":{\"message_id\":2523,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266875,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:11:16', '2022-07-19 17:11:16', NULL),
(12, NULL, '926406689', '11', '', '2525', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658266897, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"11\", \"message_id\": 2525}, \"update_id\": 937945070}', '{\"update_id\":937945070,\"message\":{\"message_id\":2525,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658266897,\"text\":\"11\"}}', '2022-07-19 17:11:38', '2022-07-19 17:11:38', NULL),
(13, NULL, '926406689', 'پروفایل', '', '2527', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267146, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2527}, \"update_id\": 937945071}', '{\"update_id\":937945071,\"message\":{\"message_id\":2527,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267146,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:15:47', '2022-07-19 17:15:47', NULL),
(14, NULL, '926406689', '09135368845', '', '2529', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267151, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2529}, \"update_id\": 937945072}', '{\"update_id\":937945072,\"message\":{\"message_id\":2529,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267151,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:15:52', '2022-07-19 17:15:52', NULL),
(15, NULL, '926406689', '09135368845', '', '2529', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267151, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2529}, \"update_id\": 937945072}', '{\"update_id\":937945072,\"message\":{\"message_id\":2529,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267151,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:15:52', '2022-07-19 17:15:52', NULL),
(16, NULL, '926406689', '111', '', '2531', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267154, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"111\", \"message_id\": 2531}, \"update_id\": 937945073}', '{\"update_id\":937945073,\"message\":{\"message_id\":2531,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267154,\"text\":\"111\"}}', '2022-07-19 17:15:54', '2022-07-19 17:15:54', NULL),
(17, NULL, '926406689', 'پروفایل', '', '2533', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267188, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2533}, \"update_id\": 937945074}', '{\"update_id\":937945074,\"message\":{\"message_id\":2533,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267188,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:16:29', '2022-07-19 17:16:29', NULL),
(18, NULL, '926406689', '09135368845', '', '2535', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267197, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2535}, \"update_id\": 937945075}', '{\"update_id\":937945075,\"message\":{\"message_id\":2535,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267197,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:16:37', '2022-07-19 17:16:37', NULL),
(19, NULL, '926406689', '3417', '', '2539', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267628, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"3417\", \"message_id\": 2539}, \"update_id\": 937945077}', '{\"update_id\":937945077,\"message\":{\"message_id\":2539,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267628,\"text\":\"3417\"}}', '2022-07-19 17:23:49', '2022-07-19 17:23:49', NULL),
(20, NULL, '926406689', 'مالی', '3978886432261369032', '2541', '', '', 'مالی', 'پروفایل', '', '', 'ج', 'زارعی', 'jzcs89', '{\"update_id\": 937945078, \"callback_query\": {\"id\": \"3978886432261369032\", \"data\": \"مالی\", \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267629, \"from\": {\"id\": 5409689822, \"is_bot\": true, \"username\": \"jamalzareietest_bot\", \"first_name\": \"jamalzareietest\"}, \"text\": \"اطلاعات حساب کاربری\\n\\nنام: جمال\\nنام خانوادگی: زارعی\\nکد ملی: 4220220143\\nتاریخ تولد: 21 اردیبهشت، 1371\", \"message_id\": 2541, \"reply_markup\": {\"inline_keyboard\": [[{\"text\": \"نام\", \"callback_data\": \"نام\"}, {\"text\": \"نام خانوادگی\", \"callback_data\": \"نام خانوادگی\"}], [{\"text\": \"کد ملی\", \"callback_data\": \"کد ملی\"}, {\"text\": \"تولد\", \"callback_data\": \"تولد\"}], [{\"text\": \"لیست کارت ها\", \"callback_data\": \"لیست کارت ها\"}, {\"text\": \"لیست شبا\", \"callback_data\": \"لیست شبا\"}], [{\"text\": \"تاییدیه حساب کاربری\", \"callback_data\": \"تاییدیه حساب کاربری\"}, {\"text\": \"مالی\", \"callback_data\": \"مالی\"}], [{\"text\": \"منو\", \"callback_data\": \"منو\"}]]}}, \"chat_instance\": \"-5679981400877768328\"}}', '{\"update_id\":937945078,\"callback_query\":{\"id\":\"3978886432261369032\",\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"message\":{\"message_id\":2541,\"from\":{\"id\":5409689822,\"is_bot\":true,\"first_name\":\"jamalzareietest\",\"username\":\"jamalzareietest_bot\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267629,\"text\":\"\\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\\n\\n\\u0646\\u0627\\u0645: \\u062c\\u0645\\u0627\\u0644\\n\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc: \\u0632\\u0627\\u0631\\u0639\\u06cc\\n\\u06a9\\u062f \\u0645\\u0644\\u06cc: 4220220143\\n\\u062a\\u0627\\u0631\\u06cc\\u062e \\u062a\\u0648\\u0644\\u062f: 21 \\u0627\\u0631\\u062f\\u06cc\\u0628\\u0647\\u0634\\u062a\\u060c 1371\",\"reply_markup\":{\"inline_keyboard\":[[{\"text\":\"\\u0646\\u0627\\u0645\",\"callback_data\":\"\\u0646\\u0627\\u0645\"},{\"text\":\"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc\",\"callback_data\":\"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc\"}],[{\"text\":\"\\u06a9\\u062f \\u0645\\u0644\\u06cc\",\"callback_data\":\"\\u06a9\\u062f \\u0645\\u0644\\u06cc\"},{\"text\":\"\\u062a\\u0648\\u0644\\u062f\",\"callback_data\":\"\\u062a\\u0648\\u0644\\u062f\"}],[{\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u06a9\\u0627\\u0631\\u062a \\u0647\\u0627\",\"callback_data\":\"\\u0644\\u06cc\\u0633\\u062a \\u06a9\\u0627\\u0631\\u062a \\u0647\\u0627\"},{\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u0634\\u0628\\u0627\",\"callback_data\":\"\\u0644\\u06cc\\u0633\\u062a \\u0634\\u0628\\u0627\"}],[{\"text\":\"\\u062a\\u0627\\u06cc\\u06cc\\u062f\\u06cc\\u0647 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\",\"callback_data\":\"\\u062a\\u0627\\u06cc\\u06cc\\u062f\\u06cc\\u0647 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\"},{\"text\":\"\\u0645\\u0627\\u0644\\u06cc\",\"callback_data\":\"\\u0645\\u0627\\u0644\\u06cc\"}],[{\"text\":\"\\u0645\\u0646\\u0648\",\"callback_data\":\"\\u0645\\u0646\\u0648\"}]]}},\"chat_instance\":\"-5679981400877768328\",\"data\":\"\\u0645\\u0627\\u0644\\u06cc\"}}', '2022-07-19 17:23:56', '2022-07-19 17:23:56', NULL),
(21, NULL, '926406689', 'برداشت موجودی', '', '2543', '', '', 'برداشت موجودی', 'مالی', '', 'App\\Http\\Controllers\\Telegram\\FinancialController@ithdrawalFromInventory', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267638, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"برداشت موجودی\", \"message_id\": 2543}, \"update_id\": 937945079}', '{\"update_id\":937945079,\"message\":{\"message_id\":2543,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267638,\"text\":\"\\u0628\\u0631\\u062f\\u0627\\u0634\\u062a \\u0645\\u0648\\u062c\\u0648\\u062f\\u06cc\"}}', '2022-07-19 17:23:59', '2022-07-19 17:23:59', NULL),
(22, NULL, '926406689', '1000', '', '2545', '', '', '', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267643, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"1000\", \"message_id\": 2545}, \"update_id\": 937945080}', '{\"update_id\":937945080,\"message\":{\"message_id\":2545,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267643,\"text\":\"1000\"}}', '2022-07-19 17:25:24', '2022-07-19 17:25:24', NULL),
(23, NULL, '926406689', 'بازگشت به پروفایل', '', '2546', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267708, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"بازگشت به پروفایل\", \"message_id\": 2546}, \"update_id\": 937945081}', '{\"update_id\":937945081,\"message\":{\"message_id\":2546,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267708,\"text\":\"\\u0628\\u0627\\u0632\\u06af\\u0634\\u062a \\u0628\\u0647 \\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:25:25', '2022-07-19 17:25:25', NULL),
(24, NULL, '926406689', 'مالی', '3978886434619795151', '2548', '', '', 'مالی', 'پروفایل', '', '', 'ج', 'زارعی', 'jzcs89', '{\"update_id\": 937945082, \"callback_query\": {\"id\": \"3978886434619795151\", \"data\": \"مالی\", \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267729, \"from\": {\"id\": 5409689822, \"is_bot\": true, \"username\": \"jamalzareietest_bot\", \"first_name\": \"jamalzareietest\"}, \"text\": \"اطلاعات حساب کاربری\\n\\nنام: جمال\\nنام خانوادگی: زارعی\\nکد ملی: 4220220143\\nتاریخ تولد: 21 اردیبهشت، 1371\", \"message_id\": 2548, \"reply_markup\": {\"inline_keyboard\": [[{\"text\": \"نام\", \"callback_data\": \"نام\"}, {\"text\": \"نام خانوادگی\", \"callback_data\": \"نام خانوادگی\"}], [{\"text\": \"کد ملی\", \"callback_data\": \"کد ملی\"}, {\"text\": \"تولد\", \"callback_data\": \"تولد\"}], [{\"text\": \"لیست کارت ها\", \"callback_data\": \"لیست کارت ها\"}, {\"text\": \"لیست شبا\", \"callback_data\": \"لیست شبا\"}], [{\"text\": \"تاییدیه حساب کاربری\", \"callback_data\": \"تاییدیه حساب کاربری\"}, {\"text\": \"مالی\", \"callback_data\": \"مالی\"}], [{\"text\": \"منو\", \"callback_data\": \"منو\"}]]}}, \"chat_instance\": \"-5679981400877768328\"}}', '{\"update_id\":937945082,\"callback_query\":{\"id\":\"3978886434619795151\",\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"message\":{\"message_id\":2548,\"from\":{\"id\":5409689822,\"is_bot\":true,\"first_name\":\"jamalzareietest\",\"username\":\"jamalzareietest_bot\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267729,\"text\":\"\\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\\n\\n\\u0646\\u0627\\u0645: \\u062c\\u0645\\u0627\\u0644\\n\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc: \\u0632\\u0627\\u0631\\u0639\\u06cc\\n\\u06a9\\u062f \\u0645\\u0644\\u06cc: 4220220143\\n\\u062a\\u0627\\u0631\\u06cc\\u062e \\u062a\\u0648\\u0644\\u062f: 21 \\u0627\\u0631\\u062f\\u06cc\\u0628\\u0647\\u0634\\u062a\\u060c 1371\",\"reply_markup\":{\"inline_keyboard\":[[{\"text\":\"\\u0646\\u0627\\u0645\",\"callback_data\":\"\\u0646\\u0627\\u0645\"},{\"text\":\"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc\",\"callback_data\":\"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc\"}],[{\"text\":\"\\u06a9\\u062f \\u0645\\u0644\\u06cc\",\"callback_data\":\"\\u06a9\\u062f \\u0645\\u0644\\u06cc\"},{\"text\":\"\\u062a\\u0648\\u0644\\u062f\",\"callback_data\":\"\\u062a\\u0648\\u0644\\u062f\"}],[{\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u06a9\\u0627\\u0631\\u062a \\u0647\\u0627\",\"callback_data\":\"\\u0644\\u06cc\\u0633\\u062a \\u06a9\\u0627\\u0631\\u062a \\u0647\\u0627\"},{\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u0634\\u0628\\u0627\",\"callback_data\":\"\\u0644\\u06cc\\u0633\\u062a \\u0634\\u0628\\u0627\"}],[{\"text\":\"\\u062a\\u0627\\u06cc\\u06cc\\u062f\\u06cc\\u0647 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\",\"callback_data\":\"\\u062a\\u0627\\u06cc\\u06cc\\u062f\\u06cc\\u0647 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\"},{\"text\":\"\\u0645\\u0627\\u0644\\u06cc\",\"callback_data\":\"\\u0645\\u0627\\u0644\\u06cc\"}],[{\"text\":\"\\u0645\\u0646\\u0648\",\"callback_data\":\"\\u0645\\u0646\\u0648\"}]]}},\"chat_instance\":\"-5679981400877768328\",\"data\":\"\\u0645\\u0627\\u0644\\u06cc\"}}', '2022-07-19 17:25:39', '2022-07-19 17:25:39', NULL),
(25, NULL, '926406689', 'افزایش موجودی', '', '2550', '', '', 'افزایش موجودی', 'مالی', '', 'App\\Http\\Controllers\\Telegram\\FinancialController@inventoryIncrease', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267740, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"افزایش موجودی\", \"message_id\": 2550}, \"update_id\": 937945083}', '{\"update_id\":937945083,\"message\":{\"message_id\":2550,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267740,\"text\":\"\\u0627\\u0641\\u0632\\u0627\\u06cc\\u0634 \\u0645\\u0648\\u062c\\u0648\\u062f\\u06cc\"}}', '2022-07-19 17:25:41', '2022-07-19 17:25:41', NULL),
(26, NULL, '926406689', '10000', '', '2552', '', '', '', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267745, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"10000\", \"message_id\": 2552}, \"update_id\": 937945084}', '{\"update_id\":937945084,\"message\":{\"message_id\":2552,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267745,\"text\":\"10000\"}}', '2022-07-19 17:25:46', '2022-07-19 17:25:46', NULL),
(27, NULL, '926406689', 'بازگشت به پروفایل', '', '2555', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267788, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"بازگشت به پروفایل\", \"message_id\": 2555}, \"update_id\": 937945085}', '{\"update_id\":937945085,\"message\":{\"message_id\":2555,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267788,\"text\":\"\\u0628\\u0627\\u0632\\u06af\\u0634\\u062a \\u0628\\u0647 \\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:26:28', '2022-07-19 17:26:28', NULL),
(28, NULL, '926406689', 'بازگشت به پروفایل', '', '2557', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267984, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"بازگشت به پروفایل\", \"message_id\": 2557}, \"update_id\": 937945086}', '{\"update_id\":937945086,\"message\":{\"message_id\":2557,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267984,\"text\":\"\\u0628\\u0627\\u0632\\u06af\\u0634\\u062a \\u0628\\u0647 \\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:29:45', '2022-07-19 17:29:45', NULL),
(29, NULL, '926406689', '09135368845', '', '2559', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267991, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2559}, \"update_id\": 937945087}', '{\"update_id\":937945087,\"message\":{\"message_id\":2559,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267991,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:29:52', '2022-07-19 17:29:52', NULL),
(30, NULL, '926406689', '09135368845', '', '2559', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267991, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"09135368845\", \"entities\": [{\"type\": \"phone_number\", \"length\": 11, \"offset\": 0}], \"message_id\": 2559}, \"update_id\": 937945087}', '{\"update_id\":937945087,\"message\":{\"message_id\":2559,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267991,\"text\":\"09135368845\",\"entities\":[{\"offset\":0,\"length\":11,\"type\":\"phone_number\"}]}}', '2022-07-19 17:29:52', '2022-07-19 17:29:52', NULL),
(31, NULL, '926406689', '111', '', '2561', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658267993, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"111\", \"message_id\": 2561}, \"update_id\": 937945088}', '{\"update_id\":937945088,\"message\":{\"message_id\":2561,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658267993,\"text\":\"111\"}}', '2022-07-19 17:29:57', '2022-07-19 17:29:57', NULL),
(32, NULL, '926406689', '7824', '', '2563', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268011, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"7824\", \"message_id\": 2563}, \"update_id\": 937945089}', '{\"update_id\":937945089,\"message\":{\"message_id\":2563,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268011,\"text\":\"7824\"}}', '2022-07-19 17:30:12', '2022-07-19 17:30:12', NULL),
(33, NULL, '926406689', '7824', '', '2563', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268011, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"7824\", \"message_id\": 2563}, \"update_id\": 937945089}', '{\"update_id\":937945089,\"message\":{\"message_id\":2563,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268011,\"text\":\"7824\"}}', '2022-07-19 17:30:12', '2022-07-19 17:30:12', NULL),
(34, NULL, '926406689', 'افزایش موجودی', '', '2566', '', '', 'افزایش موجودی', 'مالی', '', 'App\\Http\\Controllers\\Telegram\\FinancialController@inventoryIncrease', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268249, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"افزایش موجودی\", \"message_id\": 2566}, \"update_id\": 937945090}', '{\"update_id\":937945090,\"message\":{\"message_id\":2566,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268249,\"text\":\"\\u0627\\u0641\\u0632\\u0627\\u06cc\\u0634 \\u0645\\u0648\\u062c\\u0648\\u062f\\u06cc\"}}', '2022-07-19 17:34:10', '2022-07-19 17:34:10', NULL),
(35, NULL, '926406689', 'بازگشت به پروفایل', '', '2568', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268281, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"بازگشت به پروفایل\", \"message_id\": 2568}, \"update_id\": 937945091}', '{\"update_id\":937945091,\"message\":{\"message_id\":2568,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268281,\"text\":\"\\u0628\\u0627\\u0632\\u06af\\u0634\\u062a \\u0628\\u0647 \\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:34:41', '2022-07-19 17:34:41', NULL),
(36, NULL, '926406689', '/start', '', '2570', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268491, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2570}, \"update_id\": 937945092}', '{\"update_id\":937945092,\"message\":{\"message_id\":2570,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268491,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:38:12', '2022-07-19 17:38:12', NULL),
(37, NULL, '926406689', 'پروفایل', '', '2572', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268495, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2572}, \"update_id\": 937945093}', '{\"update_id\":937945093,\"message\":{\"message_id\":2572,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268495,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:38:19', '2022-07-19 17:38:19', NULL),
(38, NULL, '926406689', 'پروفایل', '', '2574', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268686, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2574}, \"update_id\": 937945094}', '{\"update_id\":937945094,\"message\":{\"message_id\":2574,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268686,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:41:26', '2022-07-19 17:41:26', NULL);
INSERT INTO `bots` (`id`, `type_id`, `chat_id`, `message`, `callback_query_id`, `message_id`, `file_id`, `next_answer`, `callback_data`, `parent_chat`, `controller_method`, `controller_method_child`, `firstname`, `lastname`, `username`, `data`, `session_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, NULL, '926406689', 'پروفایل', '', '2576', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268794, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2576}, \"update_id\": 937945095}', '{\"update_id\":937945095,\"message\":{\"message_id\":2576,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268794,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:43:14', '2022-07-19 17:43:14', NULL),
(40, NULL, '926406689', '/start', '', '2578', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268960, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2578}, \"update_id\": 937945096}', '{\"update_id\":937945096,\"message\":{\"message_id\":2578,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268960,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:46:00', '2022-07-19 17:46:00', NULL),
(41, NULL, '926406689', 'پروفایل', '', '2580', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658268962, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2580}, \"update_id\": 937945097}', '{\"update_id\":937945097,\"message\":{\"message_id\":2580,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658268962,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:46:06', '2022-07-19 17:46:06', NULL),
(42, NULL, '926406689', 'پروفایل', '', '2581', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269018, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2581}, \"update_id\": 937945098}', '{\"update_id\":937945098,\"message\":{\"message_id\":2581,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269018,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:46:59', '2022-07-19 17:46:59', NULL),
(43, NULL, '926406689', 'پروفایل', '', '2583', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269077, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2583}, \"update_id\": 937945099}', '{\"update_id\":937945099,\"message\":{\"message_id\":2583,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269077,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:47:57', '2022-07-19 17:47:57', NULL),
(44, NULL, '926406689', 'لیست قیمت', '', '2584', '', '', 'لیست قیمت', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269079, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"لیست قیمت\", \"message_id\": 2584}, \"update_id\": 937945100}', '{\"update_id\":937945100,\"message\":{\"message_id\":2584,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269079,\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u0642\\u06cc\\u0645\\u062a\"}}', '2022-07-19 17:48:03', '2022-07-19 17:48:03', NULL),
(45, NULL, '926406689', 'پروفایل', '', '2586', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269125, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2586}, \"update_id\": 937945101}', '{\"update_id\":937945101,\"message\":{\"message_id\":2586,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269125,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:48:45', '2022-07-19 17:48:45', NULL),
(46, NULL, '926406689', 'پروفایل', '', '2587', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269245, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2587}, \"update_id\": 937945102}', '{\"update_id\":937945102,\"message\":{\"message_id\":2587,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269245,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:50:46', '2022-07-19 17:50:46', NULL),
(47, NULL, '926406689', 'لیست قیمت', '', '2588', '', '', 'لیست قیمت', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269257, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"لیست قیمت\", \"message_id\": 2588}, \"update_id\": 937945103}', '{\"update_id\":937945103,\"message\":{\"message_id\":2588,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269257,\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u0642\\u06cc\\u0645\\u062a\"}}', '2022-07-19 17:50:57', '2022-07-19 17:50:57', NULL),
(48, NULL, '926406689', 'پروفایل', '', '2590', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269259, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2590}, \"update_id\": 937945104}', '{\"update_id\":937945104,\"message\":{\"message_id\":2590,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269259,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:51:03', '2022-07-19 17:51:03', NULL),
(49, NULL, '926406689', '/start', '', '2591', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269274, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2591}, \"update_id\": 937945105}', '{\"update_id\":937945105,\"message\":{\"message_id\":2591,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269274,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:51:15', '2022-07-19 17:51:15', NULL),
(50, NULL, '926406689', 'پروفایل', '', '2593', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269278, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2593}, \"update_id\": 937945106}', '{\"update_id\":937945106,\"message\":{\"message_id\":2593,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269278,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:51:21', '2022-07-19 17:51:21', NULL),
(51, NULL, '926406689', 'لیست قیمت', '', '2594', '', '', 'لیست قیمت', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269281, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"لیست قیمت\", \"message_id\": 2594}, \"update_id\": 937945107}', '{\"update_id\":937945107,\"message\":{\"message_id\":2594,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269281,\"text\":\"\\u0644\\u06cc\\u0633\\u062a \\u0642\\u06cc\\u0645\\u062a\"}}', '2022-07-19 17:51:22', '2022-07-19 17:51:22', NULL),
(52, NULL, '926406689', '/start', '', '2596', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269316, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2596}, \"update_id\": 937945108}', '{\"update_id\":937945108,\"message\":{\"message_id\":2596,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269316,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:51:56', '2022-07-19 17:51:56', NULL),
(53, NULL, '926406689', 'پروفایل', '', '2598', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269318, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2598}, \"update_id\": 937945109}', '{\"update_id\":937945109,\"message\":{\"message_id\":2598,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269318,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:52:02', '2022-07-19 17:52:02', NULL),
(54, NULL, '926406689', '/start', '', '2600', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269580, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2600}, \"update_id\": 937945110}', '{\"update_id\":937945110,\"message\":{\"message_id\":2600,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269580,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:56:21', '2022-07-19 17:56:21', NULL),
(55, NULL, '926406689', 'پروفایل', '', '2602', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269583, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2602}, \"update_id\": 937945111}', '{\"update_id\":937945111,\"message\":{\"message_id\":2602,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269583,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:56:27', '2022-07-19 17:56:27', NULL),
(56, NULL, '926406689', '/start', '', '2604', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269679, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2604}, \"update_id\": 937945112}', '{\"update_id\":937945112,\"message\":{\"message_id\":2604,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269679,\"text\":\"\\/start\",\"entities\":[{\"offset\":0,\"length\":6,\"type\":\"bot_command\"}]}}', '2022-07-19 17:58:00', '2022-07-19 17:58:00', NULL),
(57, NULL, '926406689', 'پروفایل', '', '2606', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269683, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2606}, \"update_id\": 937945113}', '{\"update_id\":937945113,\"message\":{\"message_id\":2606,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269683,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:58:07', '2022-07-19 17:58:07', NULL),
(58, NULL, '926406689', 'پروفایل', '', '2608', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269732, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2608}, \"update_id\": 937945114}', '{\"update_id\":937945114,\"message\":{\"message_id\":2608,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269732,\"text\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\"}}', '2022-07-19 17:58:53', '2022-07-19 17:58:53', NULL),
(59, NULL, '926406689', '/myNumber', '', '2610', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658269867, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/myNumber\", \"entities\": [{\"type\": \"bot_command\", \"length\": 9, \"offset\": 0}], \"message_id\": 2610}, \"update_id\": 937945115}', '{\"update_id\":937945115,\"message\":{\"message_id\":2610,\"from\":{\"id\":926406689,\"is_bot\":false,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"language_code\":\"en\"},\"chat\":{\"id\":926406689,\"first_name\":\"\\u062c\",\"last_name\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"type\":\"private\"},\"date\":1658269867,\"text\":\"\\/myNumber\",\"entities\":[{\"offset\":0,\"length\":9,\"type\":\"bot_command\"}]}}', '2022-07-19 18:01:07', '2022-07-19 18:01:07', NULL),
(60, NULL, '926406689', '/start', '', '2612', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270170, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2612}, \"update_id\": 937945116}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2612,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:06:10', '2022-07-19 18:06:10', NULL),
(61, NULL, '926406689', 'پروفایل', '', '2614', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270172, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2614}, \"update_id\": 937945117}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2614,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:06:12', '2022-07-19 18:06:12', NULL),
(62, NULL, '926406689', '/start', '', '2616', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270429, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2616}, \"update_id\": 937945118}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2616,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:10:30', '2022-07-19 18:10:30', NULL),
(63, NULL, '926406689', 'NOT', '', '2618', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270439, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2618}, \"update_id\": 937945119}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2618,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:10:40', '2022-07-19 18:10:40', NULL),
(64, NULL, '926406689', '/start', '', '2620', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270840, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2620}, \"update_id\": 937945120}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2620,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:17:20', '2022-07-19 18:17:20', NULL),
(65, NULL, '926406689', 'پروفایل', '', '2622', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270842, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2622}, \"update_id\": 937945121}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2622,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:17:22', '2022-07-19 18:17:22', NULL),
(66, NULL, '926406689', '/start', '', '2624', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270882, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2624}, \"update_id\": 937945122}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2624,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:18:03', '2022-07-19 18:18:03', NULL),
(67, NULL, '926406689', 'پروفایل', '', '2626', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270885, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2626}, \"update_id\": 937945123}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2626,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:18:08', '2022-07-19 18:18:08', NULL),
(68, NULL, '926406689', 'NOT', '', '2628', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658270897, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2628}, \"update_id\": 937945124}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2628,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:18:17', '2022-07-19 18:18:17', NULL),
(69, NULL, '926406689', '/start', '', '2630', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271168, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2630}, \"update_id\": 937945125}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2630,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:22:49', '2022-07-19 18:22:49', NULL),
(70, NULL, '926406689', 'پروفایل', '', '2632', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271170, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2632}, \"update_id\": 937945126}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2632,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:22:54', '2022-07-19 18:22:54', NULL),
(71, NULL, '926406689', 'NOT', '', '2634', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271177, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2634}, \"update_id\": 937945127}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2634,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:22:57', '2022-07-19 18:22:57', NULL),
(72, NULL, '926406689', 'NOT', '', '2636', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271224, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2636}, \"update_id\": 937945128}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2636,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:23:44', '2022-07-19 18:23:44', NULL),
(73, NULL, '926406689', '', '', '2639', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271251, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2639}, \"update_id\": 937945129}', '{\"message\":\"\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2639,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:24:12', '2022-07-19 18:24:12', NULL),
(74, NULL, '926406689', 'NOT', '', '2641', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271362, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2641}, \"update_id\": 937945130}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2641,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:26:03', '2022-07-19 18:26:03', NULL),
(75, NULL, '926406689', '9135368845', '', '2641', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271362, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2641}, \"update_id\": 937945130}', '{\"message\":\"9135368845\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2641,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:26:03', '2022-07-19 18:26:03', NULL),
(76, NULL, '926406689', '/start', '', '2643', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271392, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2643}, \"update_id\": 937945131}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2643,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:26:33', '2022-07-19 18:26:33', NULL),
(77, NULL, '926406689', 'پروفایل', '', '2645', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271394, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2645}, \"update_id\": 937945132}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2645,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:26:35', '2022-07-19 18:26:35', NULL),
(78, NULL, '926406689', '/start', '', '2647', '', '', '/start', '', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271442, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"/start\", \"entities\": [{\"type\": \"bot_command\", \"length\": 6, \"offset\": 0}], \"message_id\": 2647}, \"update_id\": 937945133}', '{\"message\":\"\\/start\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2647,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:27:22', '2022-07-19 18:27:22', NULL),
(79, NULL, '926406689', 'پروفایل', '', '2649', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271443, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"پروفایل\", \"message_id\": 2649}, \"update_id\": 937945134}', '{\"message\":\"\\u067e\\u0631\\u0648\\u0641\\u0627\\u06cc\\u0644\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2649,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:27:27', '2022-07-19 18:27:27', NULL),
(80, NULL, '926406689', 'NOT', '', '2651', '', 'کد تایید', 'ورود به حساب کاربری', '', '', 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271459, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2651}, \"update_id\": 937945135}', '{\"message\":\"NOT\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2651,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:27:40', '2022-07-19 18:27:40', NULL),
(81, NULL, '926406689', '9135368845', '', '2651', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271459, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"contact\": {\"user_id\": 926406689, \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"phone_number\": \"989135368845\"}, \"message_id\": 2651}, \"update_id\": 937945135}', '{\"message\":\"9135368845\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2651,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"989135368845\"}', '2022-07-19 18:27:40', '2022-07-19 18:27:40', NULL),
(82, NULL, '926406689', '3942', '', '2653', '', 'پروفایل', 'کد تایید', 'ورود به حساب کاربری', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271471, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"3942\", \"message_id\": 2653}, \"update_id\": 937945136}', '{\"message\":\"3942\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2653,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:27:51', '2022-07-19 18:27:51', NULL),
(83, NULL, '926406689', '3942', '', '2653', '', 'پروفایل', 'پروفایل', '/start', '', '', 'ج', 'زارعی', 'jzcs89', '{\"message\": {\"chat\": {\"id\": 926406689, \"type\": \"private\", \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\"}, \"date\": 1658271471, \"from\": {\"id\": 926406689, \"is_bot\": false, \"username\": \"jzcs89\", \"last_name\": \"زارعی\", \"first_name\": \"ج\", \"language_code\": \"en\"}, \"text\": \"3942\", \"message_id\": 2653}, \"update_id\": 937945136}', '{\"message\":\"3942\",\"chat_id\":926406689,\"from_id\":926406689,\"firstname\":\"\\u062c\",\"lastname\":\"\\u0632\\u0627\\u0631\\u0639\\u06cc\",\"username\":\"jzcs89\",\"message_id\":2653,\"file_id\":\"\",\"data_query\":\"\",\"callback_query_id\":\"\",\"phone_number\":\"\"}', '2022-07-19 18:27:51', '2022-07-19 18:27:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `request_amount` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(20,2) UNSIGNED NOT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price_buy` varchar(255) NOT NULL,
  `price_sell` varchar(255) NOT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency_prices`
--

CREATE TABLE `currency_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `price_buy` varchar(255) NOT NULL,
  `price_sell` varchar(255) NOT NULL,
  `price_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `path` text NOT NULL,
  `bot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `chat_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `actived_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `answer`, `chat_id`, `user_id`, `actived_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'چطور میتوان اعتماد کرد؟', 'بنا به دلایل زیاد', NULL, NULL, '2022-07-19 15:11:50', '2022-07-19 15:11:50', '2022-07-19 15:11:50', NULL),
(2, 'سوال دوم', 'جواب دوم', NULL, NULL, '2022-07-19 15:13:47', '2022-07-19 15:13:47', '2022-07-19 15:13:47', NULL),
(3, 'سوال سوم', 'جواب سوم', NULL, NULL, '2022-07-19 15:14:10', '2022-07-19 15:13:59', '2022-07-19 15:14:10', NULL),
(4, 'سلام برای خرید باید چیکار کگنم؟', NULL, '926406689', 1, '2022-07-19 20:19:22', '2022-07-19 15:49:22', '2022-07-19 15:49:22', NULL),
(5, 'سوال خود را بپرسید؟\n؟؟؟', 'جو.ابی ندارم', '926406689', 1, '2022-07-19 16:00:50', '2022-07-19 16:00:27', '2022-07-19 16:00:50', NULL),
(6, 'تست مهمان؟', NULL, '926406689', NULL, '2022-07-19 20:57:19', '2022-07-19 16:27:19', '2022-07-19 16:27:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keyborad_telegrams`
--

CREATE TABLE `keyborad_telegrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `orderby` int(11) NOT NULL DEFAULT '1',
  `parent_callback_data` varchar(255) DEFAULT NULL,
  `next_callback_data` varchar(255) DEFAULT NULL,
  `next_id` bigint(20) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `callback_data` varchar(255) DEFAULT NULL,
  `children_type` varchar(255) DEFAULT NULL,
  `same_callback_data` varchar(255) DEFAULT NULL,
  `details` text,
  `details_json` text,
  `method_telegram` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `controller_method` varchar(255) DEFAULT NULL,
  `controller_method_child` varchar(255) DEFAULT NULL,
  `status_id` bigint(20) DEFAULT NULL,
  `chunk_children` int(11) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT 'guest',
  `request_contact` varchar(10) DEFAULT 'true',
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keyborad_telegrams`
--

INSERT INTO `keyborad_telegrams` (`id`, `text`, `parent_id`, `orderby`, `parent_callback_data`, `next_callback_data`, `next_id`, `type`, `url`, `callback_data`, `children_type`, `same_callback_data`, `details`, `details_json`, `method_telegram`, `file`, `controller_method`, `controller_method_child`, `status_id`, `chunk_children`, `permissions`, `request_contact`, `actived_at`, `created_at`, `updated_at`) VALUES
(1, '/start', NULL, 1, NULL, NULL, NULL, 'text', NULL, '/start', 'keyboard', NULL, 'توضحات در مورد ربات و در صورت نیاز دیتای اضافه', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-11 14:22:58', '2022-07-05 15:54:39', '2022-07-11 14:22:58'),
(2, 'پروفایل', 1, 1, '/start', 'پروفایل', 2, 'keyboard', NULL, 'پروفایل', 'inline_keyboard', NULL, 'اطلاعات حساب کاربری\r\n\r\nنام: {$firstname}\r\nنام خانوادگی: {$lastname}\r\nکد ملی: {$national_code}\r\nتاریخ تولد: {$birthday}', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'guest,login', '1', '2022-07-11 13:52:26', '2022-07-07 15:54:02', '2022-07-11 13:52:26'),
(3, 'خرید', 1, 3, '/start', 'خرید', 3, 'keyboard', NULL, 'خرید', 'inline_keyboard', NULL, 'خرید به قیمت لحظه ای و پرداخت ریالی با کارت\r\nلطفا ارز مورد نظر خود را انتخاب نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-07 16:22:20', '2022-07-07 16:15:37', '2022-07-07 16:22:20'),
(4, 'فروش', 1, 4, '/start', 'فروش', 4, 'keyboard', NULL, 'فروش', 'inline_keyboard', NULL, 'فروش ارز با قیمت لحظه ای \r\nارز مورد نظر خود را انتخاب نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'guest', '1', '2022-07-07 16:24:36', '2022-07-07 16:18:14', '2022-07-07 16:24:36'),
(5, 'سوالات متداول', 1, 5, '/start', NULL, NULL, 'keyboard', NULL, 'سوالات متداول', 'keyboard', NULL, 'سوالات متداول شما:\r\n\r\n{$faqsList}', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'guest', '1', '2022-07-19 15:43:50', '2022-07-07 16:20:56', '2022-07-19 15:43:50'),
(6, 'راهنمایی', 1, 6, '/start', NULL, NULL, 'keyboard', NULL, 'راهنمایی', 'keyboard', NULL, 'توضیحات راهنمایی\r\n.....', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-19 15:58:31', '2022-07-07 16:21:54', '2022-07-19 15:58:31'),
(7, 'نمایش سوالات متداول', 6, 2, 'راهنمایی', NULL, NULL, 'keyboard', NULL, 'نمایش سوالات متداول', 'text', 'سوالات متداول', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-19 15:57:01', '2022-07-07 16:32:59', '2022-07-19 15:57:01'),
(8, 'برگشت', 6, 1, 'راهنمایی', NULL, NULL, 'text', NULL, 'برگشت', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-07 16:33:31', '2022-07-07 16:33:31', '2022-07-07 16:33:31'),
(9, 'نام', 2, 1, 'پروفایل', 'نام خانوادگی', 10, 'inline_keyboard', NULL, 'نام', 'text', NULL, 'لطفا نام خود را وارد نمایید:', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@changeFirstName', NULL, NULL, 'guest', '1', '2022-07-09 19:25:34', '2022-07-07 16:38:47', '2022-07-09 19:25:34'),
(10, 'نام خانوادگی', 2, 2, 'پروفایل', 'تولد', 11, 'inline_keyboard', NULL, 'نام خانوادگی', 'text', NULL, 'نام خانوادگی خود را وارد نمایید:', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@changeLastName', NULL, NULL, 'guest', '1', '2022-07-09 19:25:52', '2022-07-07 16:41:11', '2022-07-09 19:25:52'),
(11, 'تولد', 2, 4, 'پروفایل', 'تولد', 11, 'inline_keyboard', NULL, 'تولد', 'text', NULL, 'تاریخ تولد خود را وارد نمایید با فرمت زیر:\r\n1370-07-26', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@changeBirthDay', NULL, NULL, 'guest', '1', '2022-07-09 19:27:49', '2022-07-07 16:42:38', '2022-07-09 19:27:49'),
(12, 'لیست کارت ها', 2, 5, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'لیست کارت ها', 'keyboard', NULL, 'لیست کارت های بانکی شما:\r\n\r\n{$listCredit}', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'guest', '1', '2022-07-09 21:09:14', '2022-07-07 16:55:31', '2022-07-09 21:09:14'),
(13, 'لیست شبا', 2, 6, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'لیست شبا', 'keyboard', NULL, 'لیست شبای اضافه شده شما:\r\n\r\n{$listShaba}', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'guest', '1', '2022-07-09 21:09:48', '2022-07-07 16:56:31', '2022-07-09 21:09:48'),
(14, 'افزودن کارت بانکی', 12, 1, 'کارت بانکی', 'کارت بانکی', 12, 'keyboard', NULL, 'افزودن کارت بانکی', 'text', NULL, 'کارت بانکی خود را وارد نمایید:\r\n(فرمت کارت 16 رقمی)', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@updateCreditUser', NULL, NULL, 'guest', '1', '2022-07-09 20:55:59', '2022-07-07 17:10:25', '2022-07-09 20:55:59'),
(15, 'بازگشت به پروفایل', 12, 2, 'کارت بانکی', NULL, NULL, 'keyboard', NULL, 'بازگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-07 17:11:01', '2022-07-07 17:11:01', '2022-07-07 17:11:01'),
(16, 'بازگشت به پروفایل', 13, 2, 'افزودن شبا', NULL, NULL, 'keyboard', NULL, 'بازگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-07 19:39:28', '2022-07-07 17:11:38', '2022-07-07 19:39:28'),
(17, 'افزودن شبا', 13, 1, 'لیست شبا', 'لیست شبا', 13, 'keyboard', NULL, 'افزودن شبا', 'text', NULL, 'شماره شبای خود را وارد نمایید به همراه (IR)', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@updateShabaUser', NULL, NULL, 'guest', '1', '2022-07-09 20:56:45', '2022-07-07 17:12:25', '2022-07-09 20:56:45'),
(18, 'منو', 2, 9, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'منو', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-07 20:02:30', '2022-07-07 20:01:42', '2022-07-07 20:02:30'),
(19, 'ورود به حساب کاربری', NULL, 1, NULL, 'کد تایید', 20, 'inline_keyboard', NULL, 'ورود به حساب کاربری', 'keyboard', NULL, 'شماره همراه خود را وارد نمایید:\r\n(0913*******)', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@getNumberPhone', NULL, NULL, 'guest', '1', '2022-07-19 18:17:09', '2022-07-08 15:28:42', '2022-07-19 18:17:09'),
(20, 'کد تایید', 19, 1, 'ورود به حساب کاربری', 'پروفایل', 2, 'text', NULL, 'کد تایید', 'text', NULL, 'کد تایید که از طریق پیامک دریافت کرده اید را وارد نمایید:', NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', 'App\\Http\\Controllers\\Telegram\\UsersController@confirmNumberPhone', NULL, NULL, 'guest', '1', '2022-07-19 16:34:44', '2022-07-08 15:31:36', '2022-07-19 16:34:44'),
(21, 'تاییدیه حساب کاربری', 2, 7, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'تاییدیه حساب کاربری', 'text', NULL, 'در حال دریافت اطلاعات حساب', NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@confirmAccount', NULL, NULL, NULL, 'guest,login', '1', '2022-07-12 16:00:02', '2022-07-10 11:43:54', '2022-07-12 16:00:02'),
(22, 'مالی', 2, 8, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'مالی', 'keyboard', NULL, 'حساب شما به شرح زیر میباشد:\r\n\r\n{$listWallet}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest,login', '1', '2022-07-16 16:11:02', '2022-07-10 11:46:16', '2022-07-16 16:11:02'),
(23, 'افزایش موجودی', 22, 1, 'مالی', NULL, NULL, 'keyboard', NULL, 'افزایش موجودی', 'text', NULL, 'مبلغ افزایش خود را به ریال وارد نمایید:', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\FinancialController@inventoryIncrease', NULL, NULL, 'guest,login', '1', '2022-07-11 15:20:12', '2022-07-10 11:48:24', '2022-07-11 15:20:12'),
(24, 'برداشت موجودی', 22, 2, 'مالی', NULL, NULL, 'keyboard', NULL, 'برداشت موجودی', 'text', NULL, 'مبلغ برداشتی خود را وارد نمایید: (حد اکثر {$balance})\r\n(در صورت ثبت شماره کارت یا شبا موجودی به حساب شما واریز میگردد)', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\FinancialController@ithdrawalFromInventory', NULL, NULL, 'guest,login', '1', '2022-07-16 16:33:30', '2022-07-10 11:50:03', '2022-07-16 16:33:30'),
(25, 'برگشت به پروفایل', 21, 1, NULL, NULL, 21, 'text', NULL, 'برگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest,login', '1', '2022-07-10 11:51:00', '2022-07-10 11:51:00', '2022-07-10 11:51:00'),
(26, 'کد ملی', 2, 3, 'پروفایل', 'تولد', 11, 'inline_keyboard', NULL, 'کد ملی', 'text', NULL, 'کد ملی خود را وارد نمایید:\r\n(کد ملی 10 رقمی)', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\Telegram\\UsersController@changeNationalCode', NULL, NULL, 'guest', '1', '2022-07-09 19:27:49', '2022-07-07 16:42:38', '2022-07-09 19:27:49'),
(27, 'بازگشت به پروفایل', 22, 3, 'مالی', NULL, NULL, 'text', NULL, 'بازگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest,login', '1', '2022-07-12 15:55:49', '2022-07-12 15:55:49', '2022-07-12 15:55:49'),
(28, 'سوال دارید؟', 5, 1, 'سوالات متداول', NULL, NULL, 'keyboard', NULL, 'سوال دارید؟', 'text', NULL, 'سوال خود را وارد نمایید:', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\API\\FaqsController@faqInsert', NULL, NULL, 'guest', '1', '2022-07-19 15:41:06', '2022-07-19 15:40:34', '2022-07-19 15:41:06'),
(29, 'بازگشت به منو', 5, 3, 'سوالات متداول', NULL, NULL, 'keyboard', NULL, 'بازگشت به منو', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-19 15:53:28', '2022-07-19 15:53:28', '2022-07-19 15:53:28'),
(30, 'سوالی دارید؟', 6, 1, 'راهنمایی', NULL, NULL, 'keyboard', NULL, 'سوالی دارید؟', 'text', NULL, 'سوال خود را بپرسید؟', NULL, NULL, NULL, NULL, 'App\\Http\\Controllers\\API\\FaqsController@faqInsert', NULL, NULL, 'guest', '1', '2022-07-19 16:00:01', '2022-07-19 16:00:01', '2022-07-19 16:00:01'),
(31, 'لیست قیمت', 1, 2, '/start', NULL, NULL, 'text', NULL, 'لیست قیمت', 'text', NULL, 'لیست قیمت اینجا آورده شود', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', '1', '2022-07-19 16:20:11', '2022-07-19 16:20:11', '2022-07-19 16:20:11'),
(32, 'درخواست شماره تلفن', 19, 2, 'ورود به حساب کاربری', NULL, NULL, 'keyboard', NULL, 'درخواست شماره تلفن', 'text', NULL, 'در انتظار دریافت شماره تلفن', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 'true', '2022-07-19 18:16:10', '2022-07-19 18:16:10', '2022-07-19 18:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_28_115046_create_types_table', 1),
(6, '2022_06_28_115057_create_statuses_table', 1),
(7, '2022_06_28_121052_create_currencies_table', 1),
(8, '2022_06_28_121729_create_currency_prices_table', 1),
(9, '2022_06_28_122105_create_bots_table', 1),
(10, '2022_06_28_212700_create_accounts_table', 1),
(11, '2022_06_28_213643_create_transactions_table', 1),
(12, '2022_06_28_215503_create_documents_table', 1),
(13, '2022_06_28_215625_create_requests_table', 1),
(14, '2022_06_28_215901_create_notifications_table', 1),
(15, '2022_06_28_220800_create_buys_table', 1),
(16, '2022_06_28_220811_create_sells_table', 1),
(17, '2022_06_29_223412_create_keyborad_telegrams_table', 1),
(18, '2022_07_02_165833_create_permission_tables', 1),
(19, '2022_07_07_211314_create_faqs_table', 2),
(20, '2022_07_10_201626_create_wallets_table', 3),
(21, '2022_07_10_201650_create_pays_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notificationable_type` varchar(255) NOT NULL,
  `notificationable_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(255) DEFAULT NULL,
  `payable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `discount` decimal(20,2) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_portal` varchar(255) DEFAULT NULL,
  `details` text,
  `tracking_code` varchar(255) DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `code_token` varchar(255) DEFAULT NULL,
  `code_verify` varchar(255) DEFAULT NULL,
  `cart_number` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `status_id` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `user_id`, `payable_type`, `payable_id`, `amount`, `discount`, `discount_id`, `bank_portal`, `details`, `tracking_code`, `trans_id`, `api_key`, `order_id`, `code_token`, `code_verify`, `cart_number`, `customer_phone`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 14, '990000.00', '0.00', 0, '', 'افزایش موجودی', '637935310624213571', '22211ef3-2c94-4cf5-bda0-255821f66e50', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657918060', '', '-4', '0000-00**-****-0000', NULL, NULL, '2022-07-15 16:17:40', '2022-07-15 16:17:47'),
(2, 1, NULL, 14, '990000.00', '0.00', 0, '', 'افزایش موجودی', '637935310923385484', '21e513e5-7737-4068-92ea-adde33811173', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657918090', '', '-4', '0000-00**-****-0000', NULL, NULL, '2022-07-15 16:18:10', '2022-07-15 16:18:16'),
(3, 1, 'App\\Models\\Request', 15, '450001.00', '0.00', 0, '', 'افزایش موجودی', '637935312285828706', '783f2d4d-e724-403d-9151-3dee44e3bd8f', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657918226', '', '-4', '0000-00**-****-0000', NULL, NULL, '2022-07-15 16:20:26', '2022-07-15 16:20:35'),
(4, 1, 'App\\Models\\Request', 16, '11000.00', '0.00', 0, '', 'افزایش موجودی', '637935313637641353', 'cb92561b-4f44-41d6-9dd9-fc3dcd764a7d', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657918362', '', '-4', '0000-00**-****-0000', NULL, NULL, '2022-07-15 16:22:42', '2022-07-15 16:22:48'),
(5, 1, 'App\\Models\\Request', 17, '100001.00', '0.00', 0, '', 'افزایش موجودی', '637935318630488286', '87fa1930-5961-4c2b-a1d2-a05c557c97c1', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657918861', '', '-4', '0000-00**-****-0000', NULL, NULL, '2022-07-15 16:31:01', '2022-07-15 16:31:14'),
(6, 1, 'App\\Models\\Request', 17, '100001.00', '0.00', 0, '', 'افزایش موجودی', '637935321485712168', 'e6f72a30-ecd8-4bee-be49-2eab32bf779a', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657919146', '', '-4', '0000-00**-****-0000', NULL, '5', '2022-07-15 16:35:46', '2022-07-15 16:35:53'),
(7, 1, 'App\\Models\\Request', 17, '100001.00', '0.00', 0, '', '{\"code\":-4,\"amount\":100001,\"order_id\":\"1-1657919435\",\"card_holder\":\"0000-00**-****-0000\",\"Shaparak_Ref_Id\":\"637935324373037702\",\"customer_phone\":null,\"partial_refunded_amount\":0,\"custom\":\"{\\\"payerName\\\":\\\"\\\\u0632\\\\u0627\\\\u0631\\\\u0639\\\\u06cc\\\",\\\"payerDesc\\\":\\\"\\\\u0627\\\\u0641\\\\u0632\\\\u0627\\\\u06cc\\\\u0634 \\\\u0627\\\\u0639\\\\u062a\\\\u0628\\\\u0627\\\\u0631\\\"}\"}', '637935324373037702', 'c762430e-46a3-4567-af1c-e2aa0b871ac9', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657919435', '', '-4', '0000-00**-****-0000', NULL, '5', '2022-07-15 16:40:35', '2022-07-15 16:40:41'),
(8, 1, 'App\\Models\\Request', 18, '1000.00', '0.00', 0, '', '{\"code\":0,\"amount\":1000,\"order_id\":\"1-1657919585\",\"card_holder\":\"6037-69**-****-0216\",\"Shaparak_Ref_Id\":\"141195986370\",\"customer_phone\":null,\"custom\":\"{\\\"payerName\\\":\\\"\\\\u0632\\\\u0627\\\\u0631\\\\u0639\\\\u06cc\\\",\\\"payerDesc\\\":\\\"\\\\u0627\\\\u0641\\\\u0632\\\\u0627\\\\u06cc\\\\u0634 \\\\u0627\\\\u0639\\\\u062a\\\\u0628\\\\u0627\\\\u0631\\\"}\"}', '141195986370', '6f217bc0-74c3-4562-bb7b-49a76cb7f874', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1657919585', '', '0', '6037-69**-****-0216', NULL, '4', '2022-07-15 16:43:05', '2022-07-15 16:43:32'),
(9, 1, 'App\\Models\\Request', 20, '1300000.00', '0.00', 0, '', '{\"code\":-4,\"amount\":1300000,\"order_id\":\"1-1658002968\",\"card_holder\":\"0000-00**-****-0000\",\"Shaparak_Ref_Id\":\"637936159702052334\",\"customer_phone\":null,\"partial_refunded_amount\":0,\"custom\":\"{\\\"payerName\\\":\\\"\\\\u0632\\\\u0627\\\\u0631\\\\u0639\\\\u06cc\\\",\\\"payerDesc\\\":\\\"\\\\u0627\\\\u0641\\\\u0632\\\\u0627\\\\u06cc\\\\u0634 \\\\u0627\\\\u0639\\\\u062a\\\\u0628\\\\u0627\\\\u0631\\\"}\"}', '637936159702052334', '1cb78e6b-8e98-4f04-a0ce-a69a41d404b3', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1658002968', '', '-4', '0000-00**-****-0000', NULL, '5', '2022-07-16 15:52:48', '2022-07-16 15:52:56'),
(10, 1, 'App\\Models\\Request', 24, '300000.00', '0.00', 0, '', '{\"code\":-4,\"amount\":300000,\"order_id\":\"1-1658263555\",\"card_holder\":\"0000-00**-****-0000\",\"Shaparak_Ref_Id\":\"637938765579398395\",\"customer_phone\":null,\"partial_refunded_amount\":0,\"custom\":\"{\\\"payerName\\\":\\\"\\\\u0632\\\\u0627\\\\u0631\\\\u0639\\\\u06cc\\\",\\\"payerDesc\\\":\\\"\\\\u0627\\\\u0641\\\\u0632\\\\u0627\\\\u06cc\\\\u0634 \\\\u0627\\\\u0639\\\\u062a\\\\u0628\\\\u0627\\\\u0631\\\"}\"}', '637938765579398395', '04b27845-d06b-4633-b8c7-b4d2d751b08c', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1658263555', '', '-4', '0000-00**-****-0000', NULL, '5', '2022-07-19 16:15:55', '2022-07-19 16:16:06'),
(11, 1, 'App\\Models\\Request', 32, '10000.00', '0.00', 0, '', '{\"code\":-4,\"amount\":10000,\"order_id\":\"1-1658267770\",\"card_holder\":\"0000-00**-****-0000\",\"Shaparak_Ref_Id\":\"637938807724727442\",\"customer_phone\":null,\"partial_refunded_amount\":0,\"custom\":\"{\\\"payerName\\\":\\\"\\\\u0632\\\\u0627\\\\u0631\\\\u0639\\\\u06cc\\\",\\\"payerDesc\\\":\\\"\\\\u0627\\\\u0641\\\\u0632\\\\u0627\\\\u06cc\\\\u0634 \\\\u0627\\\\u0639\\\\u062a\\\\u0628\\\\u0627\\\\u0631\\\"}\"}', '637938807724727442', '92a01c58-ccec-433b-9c00-1715c1b1334b', '41820c7e-6113-47fa-b42d-015eed9e183a', '1-1658267770', '', '-4', '0000-00**-****-0000', NULL, '5', '2022-07-19 17:26:10', '2022-07-19 17:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `status_id`, `type_id`, `transaction_id`, `amount`, `actived_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, NULL, '1200.00', NULL, '2022-07-12 15:43:48', '2022-07-12 15:43:48', NULL),
(2, 1, 1, 1, NULL, '1200.00', NULL, '2022-07-12 15:49:28', '2022-07-12 15:49:28', NULL),
(3, 1, 1, 1, NULL, '1111.00', NULL, '2022-07-12 15:50:19', '2022-07-12 15:50:19', NULL),
(4, 1, 3, 2, NULL, '50000.00', NULL, '2022-07-12 15:54:01', '2022-07-12 15:54:01', NULL),
(5, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:47:38', '2022-07-15 15:47:38', NULL),
(6, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:47:43', '2022-07-15 15:47:43', NULL),
(7, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:47:46', '2022-07-15 15:47:46', NULL),
(8, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:47:50', '2022-07-15 15:47:50', NULL),
(9, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:48:02', '2022-07-15 15:48:02', NULL),
(10, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:48:19', '2022-07-15 15:48:19', NULL),
(11, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:48:52', '2022-07-15 15:48:52', NULL),
(12, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:49:53', '2022-07-15 15:49:53', NULL),
(13, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:49:57', '2022-07-15 15:49:57', NULL),
(14, 1, 1, 1, NULL, '990000.00', NULL, '2022-07-15 15:50:55', '2022-07-15 15:50:55', NULL),
(15, 1, 1, 1, NULL, '450001.00', NULL, '2022-07-15 16:20:23', '2022-07-15 16:20:23', NULL),
(16, 1, 1, 1, NULL, '11000.00', NULL, '2022-07-15 16:22:38', '2022-07-15 16:22:38', NULL),
(17, 1, 1, 1, NULL, '100001.00', NULL, '2022-07-15 16:30:57', '2022-07-15 16:30:57', NULL),
(18, 1, 1, 1, NULL, '1000.00', NULL, '2022-07-15 16:43:00', '2022-07-15 16:43:00', NULL),
(19, 1, 3, 2, NULL, '12000.00', NULL, '2022-07-16 15:20:28', '2022-07-16 15:20:28', NULL),
(20, 1, 1, 1, NULL, '1300000.00', NULL, '2022-07-16 15:52:42', '2022-07-16 15:52:42', NULL),
(21, 1, 3, 2, NULL, '12000.00', NULL, '2022-07-16 15:54:43', '2022-07-16 15:54:43', NULL),
(22, 1, 3, 2, NULL, '1288001.00', NULL, '2022-07-16 16:21:07', '2022-07-16 16:21:07', NULL),
(23, 1, 3, 2, NULL, '150000.00', NULL, '2022-07-16 16:36:44', '2022-07-16 16:36:44', NULL),
(24, 1, 1, 1, NULL, '300000.00', NULL, '2022-07-19 16:15:41', '2022-07-19 16:15:41', NULL),
(25, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:04', '2022-07-19 17:24:04', NULL),
(26, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:09', '2022-07-19 17:24:09', NULL),
(27, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:11', '2022-07-19 17:24:11', NULL),
(28, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:16', '2022-07-19 17:24:16', NULL),
(29, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:24', '2022-07-19 17:24:24', NULL),
(30, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:24:51', '2022-07-19 17:24:51', NULL),
(31, 1, 3, 2, NULL, '1000.00', NULL, '2022-07-19 17:25:24', '2022-07-19 17:25:24', NULL),
(32, 1, 1, 1, NULL, '10000.00', NULL, '2022-07-19 17:25:46', '2022-07-19 17:25:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2022-07-05 15:41:52', '2022-07-05 15:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currnecy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `request_amount` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(20,2) UNSIGNED NOT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `slug`, `model_type`, `actived_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'در انتظار پرداخت', 'در-انتظار-پرداخت', 'App\\Models\\Request', '2022-07-12 15:21:43', '2022-07-12 15:21:43', '2022-07-12 15:21:43', NULL),
(2, 'پرداخت شده', 'پرداخت-شده', 'App\\Models\\Request', '2022-07-12 15:21:59', '2022-07-12 15:21:59', '2022-07-12 15:21:59', NULL),
(3, 'در انتظار تایید مدیریت', 'در-انتظار-تایید-مدیریت', 'App\\Models\\Request', '2022-07-12 15:52:07', '2022-07-12 15:52:07', '2022-07-12 15:52:07', NULL),
(4, 'پرداخت موفق', 'پرداخت-موفق', 'App\\Models\\Status', '2022-07-15 16:27:58', '2022-07-15 16:27:58', '2022-07-15 16:27:58', NULL),
(5, 'پرداخت ناموفق', 'پرداخت-ناموفق', 'App\\Models\\Status', '2022-07-15 16:28:23', '2022-07-15 16:28:23', '2022-07-15 16:28:23', NULL),
(6, 'تایید واریز', 'تایید-واریز', 'App\\Models\\Wallet', '2022-07-16 15:35:56', '2022-07-16 15:35:56', '2022-07-16 15:35:56', NULL),
(7, 'تایید برداشت', 'تایید-برداشت', 'App\\Models\\Wallet', '2022-07-16 15:43:55', '2022-07-16 15:43:38', '2022-07-16 15:43:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `discount` decimal(20,2) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `transactionable_type` varchar(255) NOT NULL,
  `transactionable_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `model_type`, `actived_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'افزایش موجودی', 'افزایش-موجودی', 'App\\Models\\Request', '2022-07-12 15:17:26', '2022-07-12 15:17:26', '2022-07-12 15:17:26', NULL),
(2, 'برداشت موجودی', 'برداشت-موجودی', 'App\\Models\\Request', '2022-07-12 15:17:39', '2022-07-12 15:17:39', '2022-07-12 15:17:39', NULL),
(3, 'واریز', 'واریز', 'App\\Models\\Wallet', '2022-07-16 16:02:04', '2022-07-16 15:33:00', '2022-07-16 16:02:04', NULL),
(4, 'برداشت', 'برداشت', 'App\\Models\\Wallet', '2022-07-16 16:02:16', '2022-07-16 15:33:17', '2022-07-16 16:02:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `chat_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `login_telegram` int(11) DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `national_code` varchar(20) DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `code_confirm` varchar(255) DEFAULT NULL,
  `document_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `chat_id`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `login_telegram`, `password`, `national_code`, `birth_date`, `balance`, `code_confirm`, `document_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'جمال', 'زارعی', '926406689', NULL, '+989135368845', NULL, '2022-07-19 18:27:51', 1, '$2y$10$hZNi/VU0FaPnLgJw4AIRWudiwDXDM4EJO/OJ3.Czs/lA0aoslEAsm', '4220220143', '1992-05-10 19:30:00', '0', NULL, NULL, NULL, '2022-07-05 15:41:52', '2022-07-19 18:27:51'),
(13, 'Ahmad', 'Payamani', '565282302', NULL, '+989125980529', NULL, NULL, 0, '$2y$10$93Q4BOxO0W8c8EKzwNPfG.y1hi76hhtdNrR57QxQBwbvxbyuk7TDC', NULL, NULL, '0', '3206', NULL, NULL, '2022-07-11 13:49:59', '2022-07-11 13:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,2) UNSIGNED NOT NULL,
  `details` text,
  `walletable_type` varchar(255) DEFAULT NULL,
  `walletable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pay_id` bigint(20) DEFAULT NULL,
  `status_id` bigint(20) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `details`, `walletable_type`, `walletable_id`, `pay_id`, `status_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1300000.00', 'افزایش کیف پول', 'App\\Models\\Pay', 9, 9, 6, 3, '2022-07-16 15:53:28', '2022-07-16 15:53:28'),
(2, 1, '12000.00', 'برداشت از کیف پول', 'App\\Models\\Request', 21, NULL, 7, 4, '2022-07-16 15:54:43', '2022-07-16 15:54:43'),
(4, 1, '150000.00', 'برداشت از کیف پول', 'App\\Models\\Request', 23, NULL, 7, 4, '2022-07-16 16:36:44', '2022-07-16 16:36:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_user_id_foreign` (`user_id`),
  ADD KEY `accounts_type_id_foreign` (`type_id`);

--
-- Indexes for table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bots_type_id_foreign` (`type_id`);

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buys_user_id_foreign` (`user_id`),
  ADD KEY `buys_transaction_id_foreign` (`transaction_id`),
  ADD KEY `buys_currency_id_foreign` (`currency_id`),
  ADD KEY `buys_status_id_foreign` (`status_id`),
  ADD KEY `buys_type_id_foreign` (`type_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_prices`
--
ALTER TABLE `currency_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_prices_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_bot_id_foreign` (`bot_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyborad_telegrams`
--
ALTER TABLE `keyborad_telegrams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`),
  ADD KEY `notifications_notificationable_type_notificationable_id_index` (`notificationable_type`,`notificationable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays_payable_type_payable_id_index` (`payable_type`,`payable_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_status_id_foreign` (`status_id`),
  ADD KEY `requests_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sells_user_id_foreign` (`user_id`),
  ADD KEY `sells_transaction_id_foreign` (`transaction_id`),
  ADD KEY `sells_currnecy_id_foreign` (`currnecy_id`),
  ADD KEY `sells_status_id_foreign` (`status_id`),
  ADD KEY `sells_type_id_foreign` (`type_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_transactionable_type_transactionable_id_index` (`transactionable_type`,`transactionable_id`),
  ADD KEY `transactions_status_id_foreign` (`status_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_walletable_type_walletable_id_index` (`walletable_type`,`walletable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bots`
--
ALTER TABLE `bots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_prices`
--
ALTER TABLE `currency_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keyborad_telegrams`
--
ALTER TABLE `keyborad_telegrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
