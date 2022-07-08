-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2022 at 12:47 AM
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
-- Table structure for table `keyborad_telegrams`
--

CREATE TABLE `keyborad_telegrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
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
  `status_id` bigint(20) DEFAULT NULL,
  `chunk_children` int(11) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT 'guest',
  `orderby` int(11) NOT NULL DEFAULT '1',
  `actived_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keyborad_telegrams`
--

INSERT INTO `keyborad_telegrams` (`id`, `text`, `parent_id`, `parent_callback_data`, `next_callback_data`, `next_id`, `type`, `url`, `callback_data`, `children_type`, `same_callback_data`, `details`, `details_json`, `method_telegram`, `file`, `controller_method`, `status_id`, `chunk_children`, `permissions`, `orderby`, `actived_at`, `created_at`, `updated_at`) VALUES
(1, '/start', NULL, NULL, NULL, NULL, 'text', NULL, '/start', 'keyboard', NULL, 'به ربات خوش آمدید\r\nلطفا ابدات در کانال زیر عضو شوید.', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 20:04:46', '2022-07-05 15:54:39', '2022-07-07 20:04:46'),
(2, 'پروفایل', 1, '/start', 'پروفایل', 2, 'keyboard', NULL, 'پروفایل', 'inline_keyboard', NULL, 'اطلاعات حساب کاربری\r\n\r\nنام: {$firstname}\r\nنام خانوادگی: {$lastname}\r\nتاریخ تولد: {$birthday}', NULL, NULL, NULL, NULL, NULL, 3, 'guest,login', 1, '2022-07-08 15:09:35', '2022-07-07 15:54:02', '2022-07-08 15:09:35'),
(3, 'خرید', 1, '/start', 'خرید', 3, 'keyboard', NULL, 'خرید', 'inline_keyboard', NULL, 'خرید به قیمت لحظه ای و پرداخت ریالی با کارت\r\nلطفا ارز مورد نظر خود را انتخاب نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 16:22:20', '2022-07-07 16:15:37', '2022-07-07 16:22:20'),
(4, 'فروش', 1, '/start', 'فروش', 4, 'keyboard', NULL, 'فروش', 'inline_keyboard', NULL, 'فروش ارز با قیمت لحظه ای \r\nارز مورد نظر خود را انتخاب نمایید:', NULL, NULL, NULL, NULL, NULL, 3, 'guest', 1, '2022-07-07 16:24:36', '2022-07-07 16:18:14', '2022-07-07 16:24:36'),
(5, 'سوالات متداول', 1, '/start', 'سوالات', 5, 'text', NULL, 'سوالات متداول', 'text', NULL, 'سوال 1:\r\nجو.اب 1\r\n\r\nسوال 2:\r\nجواب 2\r\n\r\nسوال 3:\r\nجواب 3', NULL, NULL, NULL, NULL, NULL, 2, 'guest', 1, '2022-07-07 16:30:34', '2022-07-07 16:20:56', '2022-07-07 16:30:34'),
(6, 'راهنمایی', 1, '/start', NULL, 5, 'text', NULL, 'راهنمایی', 'text', NULL, 'توضیحات راهنمایی', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 16:21:54', '2022-07-07 16:21:54', '2022-07-07 16:21:54'),
(7, 'برگشت', 5, 'سوالات متداول', NULL, NULL, 'text', NULL, 'برگشت', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 16:32:59', '2022-07-07 16:32:59', '2022-07-07 16:32:59'),
(8, 'برگشت', 6, 'راهنمایی', NULL, NULL, 'text', NULL, 'برگشت', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 16:33:31', '2022-07-07 16:33:31', '2022-07-07 16:33:31'),
(9, 'نام', 2, 'پروفایل', 'نام خانوادگی', 10, 'inline_keyboard', NULL, 'نام', 'text', NULL, 'لطفا نام خود را وارد نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 16:52:08', '2022-07-07 16:38:47', '2022-07-07 16:52:08'),
(10, 'نام خانوادگی', 2, 'پروفایل', 'تولد', 11, 'inline_keyboard', NULL, 'نام خانوادگی', 'text', NULL, 'نام خانوادگی خود را وارد نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 2, '2022-07-07 16:51:49', '2022-07-07 16:41:11', '2022-07-07 16:51:49'),
(11, 'تولد', 2, 'پروفایل', 'تولد', 11, 'inline_keyboard', NULL, 'تولد', 'text', NULL, 'تاریخ تولد خود را وارد نمایید با فرمت زیر:\r\n1370-07-26', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 3, '2022-07-07 16:51:59', '2022-07-07 16:42:38', '2022-07-07 16:51:59'),
(12, 'کارت بانکی', 2, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'کارت بانکی', 'keyboard', NULL, 'لیست کارت های بانکی شما:\r\n\r\n{$list}', NULL, NULL, NULL, NULL, NULL, 2, 'guest', 4, '2022-07-07 16:58:31', '2022-07-07 16:55:31', '2022-07-07 16:58:31'),
(13, 'لیست شبا', 2, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'لیست شبا', 'keyboard', NULL, 'لیست شبای اضافه شده شما:\r\n\r\n{$list}', NULL, NULL, NULL, NULL, NULL, 2, 'guest', 5, '2022-07-07 19:44:02', '2022-07-07 16:56:31', '2022-07-07 19:44:02'),
(14, 'افزودن کارت بانکی', 12, 'کارت بانکی', 'کارت بانکی', 12, 'keyboard', NULL, 'افزودن کارت بانکی', 'text', NULL, 'کارت بانکی خود را وارد نمایید:\r\n(فرمت کارت 16 رقمی)', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 17:10:25', '2022-07-07 17:10:25', '2022-07-07 17:10:25'),
(15, 'بازگشت به پروفایل', 12, 'کارت بانکی', NULL, NULL, 'keyboard', NULL, 'بازگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 2, '2022-07-07 17:11:01', '2022-07-07 17:11:01', '2022-07-07 17:11:01'),
(16, 'بازگشت به پروفایل', 13, 'افزودن شبا', NULL, NULL, 'keyboard', NULL, 'بازگشت به پروفایل', 'text', 'پروفایل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 2, '2022-07-07 19:39:28', '2022-07-07 17:11:38', '2022-07-07 19:39:28'),
(17, 'افزودن شبا', 13, 'لیست شبا', 'لیست شبا', 13, 'keyboard', NULL, 'افزودن شبا', 'text', NULL, 'شماره شبای خود را وارد نمایید به همراه (IR)', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-07 19:53:12', '2022-07-07 17:12:25', '2022-07-07 19:53:12'),
(18, 'منو', 2, 'پروفایل', NULL, NULL, 'inline_keyboard', NULL, 'منو', 'text', '/start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 6, '2022-07-07 20:02:30', '2022-07-07 20:01:42', '2022-07-07 20:02:30'),
(19, 'ورود به حساب کاربری', NULL, NULL, 'کد تایید', 20, 'inline_keyboard', NULL, 'ورود به حساب کاربری', 'text', NULL, 'شماره همراه خود را وارد نمایید:\r\n(0913*******)', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-08 15:36:59', '2022-07-08 15:28:42', '2022-07-08 15:36:59'),
(20, 'کد تایید', 19, 'ورود به حساب کاربری', 'پروفایل', 2, 'text', NULL, 'کد تایید', 'text', NULL, 'کد تایید که از طریق پیامک دریافت کرده اید را وارد نمایید:', NULL, NULL, NULL, NULL, NULL, NULL, 'guest', 1, '2022-07-08 15:47:07', '2022-07-08 15:31:36', '2022-07-08 15:47:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keyborad_telegrams`
--
ALTER TABLE `keyborad_telegrams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keyborad_telegrams`
--
ALTER TABLE `keyborad_telegrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
