-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2018 at 09:19 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogrub_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_datetime` datetime NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Published','Draft','InActive','Scheduled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_map_categories`
--

DROP TABLE IF EXISTS `blog_map_categories`;
CREATE TABLE IF NOT EXISTS `blog_map_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_map_categories_blog_id_index` (`blog_id`),
  KEY `blog_map_categories_category_id_index` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_map_tags`
--

DROP TABLE IF EXISTS `blog_map_tags`;
CREATE TABLE IF NOT EXISTS `blog_map_tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_map_tags_blog_id_index` (`blog_id`),
  KEY `blog_map_tags_tag_id_index` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

DROP TABLE IF EXISTS `cuisines`;
CREATE TABLE IF NOT EXISTS `cuisines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Pakistani', 'Pakistani food/desi food', NULL, '2018-09-18 19:00:00', '2018-09-18 19:00:00'),
(2, 'Italian', 'Italian', NULL, '2018-09-18 19:00:00', '2018-09-18 19:00:00'),
(3, 'Chinese', NULL, NULL, '2018-09-28 11:49:06', '2018-09-28 11:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_product`
--

DROP TABLE IF EXISTS `cuisine_product`;
CREATE TABLE IF NOT EXISTS `cuisine_product` (
  `cuisine_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`cuisine_id`,`product_id`),
  KEY `cuisine_product_cuisine_id_index` (`cuisine_id`),
  KEY `cuisine_product_product_id_index` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Android/iOs/Browser/PAD etc',
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_info` longtext COLLATE utf8mb4_unicode_ci COMMENT 'Complete device info',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devices_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `type`, `fcm_token`, `device_id`, `agent_info`, `created_at`, `updated_at`) VALUES
(1, 10, 'postman', 'fI6jFNV3jqM:APA91bHcVf8b3SxmnQikhiRMrjM4JVk0gUUChq9qQi0Ez6-85faEB57oNd2n3kc0FLPS-UAj1_qbsZXbuUfOUwcJ7alRrw3BaX2KJ0jGjoQDjujCW5dQs5oqvAB6V-t4SzTYGRaVLNNo', 'f8d7cd214c1306bd', 'Mozilla, windows TN 10 Gecko', '2018-10-09 11:09:46', '2018-10-09 11:23:43'),
(3, 5, 'postman', 'fI6jFNV3jqM:APA91bHcVf8b3SxmnQikhiRMrjM4JVk0gUUChq9qQi0Ez6-85faEB57oNd2n3kc0FLPS-UAj1_qbsZXbuUfOUwcJ7alRrw3BaX2KJ0jGjoQDjujCW5dQs5oqvAB6V-t4SzTYGRaVLNNo', 'f8d7cd214c1306bd', 'Mozilla, windows TN 10 Gecko', '2018-10-10 08:11:41', '2018-10-10 08:11:41'),
(5, 5, 'android', 'dLYkU2xIHYQ:APA91bHFsyW1gzFGf-Ext4xvcQpLO4iMWdd1r2ra2cTnFjWUxn7br9uovYP4jyZScWxlOZzS6cXOBOW1qB6oJB8GeXv3BEcxQnnG1KPqIckkJ3BdaMNzO3fr6k6m6ejUw8VST-q1Wgui', 'f8d7cd214c1306bd', NULL, '2018-10-10 11:42:21', '2018-10-10 11:42:21'),
(6, 10, 'android', 'cJ0gzDUpWVU:APA91bELCFUNwPStLv0qgoEF_c9fE2D4XW3jbRbPyOfM4lx-SKb4maHgzyYGe0EC-y5-C4VOHykapPRDhRAbCFyKA6R3m3G0rimSTOAzacqYWYTKJLutjDMnDl_6mXmzS4-ghl_Nl377', '12e33a9f8a3ae768', NULL, '2018-10-10 16:16:59', '2018-10-10 16:16:59'),
(14, 24, 'android', 'dW2w79mrcCw:APA91bHseVGoRc2GM5AWWEwZWNDV8emJG_Iu05eNu6i8T2yqJzAx5lIDEcWIdFOa37D_hzEQhEQmgcbGCEaUBN_OqiSdo66gtTMlPBAQQLO6jKDD9ZMsBpdFL17OG0J8EGPsVVwFVP4f', 'c6724de77060b01c', NULL, '2018-10-12 22:34:23', '2018-10-12 22:34:23'),
(19, 24, 'android', 'fiDbTaRpxOM:APA91bHpuPWTDgpbu7sGu_BU5TBM-w09vLiGZTpYr_SZvg5us9h9iXMDU2ZKUAbHYxVbekQ9fmhmIWzpl7A5JFM7fQTrwxGqIB2TEOLQLDQyPaSxEg14kZElPJkOTq62pAOGBpC89kxu', 'c6724de77060b01c', 'okhttp/3.4.1', '2018-10-16 16:21:01', '2018-10-16 16:21:01'),
(21, 10, 'android', 'fVwDaFtvfqM:APA91bGXdKjST7X6O5zzHPNfrhgDDaWrbCFpfyeO8d9egv-SnhlGlCsrnbFBmFUl1_vJpxssbmMx6vRcx062pLhHX14WN2Df8_aRuN43ei6XDwWFgAzMp59anxPQK-HV8Eo_h__lTHdy', '29446dcd6955a873', 'okhttp/3.4.1', '2018-10-17 06:44:18', '2018-10-17 06:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_templates_type_id_index` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type_id`, `title`, `subject`, `body`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'User Registration', 'You have succesfully registerd', '<center>\r\n<table id=\"bodyTable\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td id=\"bodyCell\" align=\"center\" valign=\"top\">\r\n<table id=\"templateContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<table id=\"templateBody\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"bodyContainer\" style=\"padding-top: 9px; padding-bottom: 9px;\" valign=\"top\">\r\n<table class=\"mcnBoxedTextBlock\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody class=\"mcnBoxedTextBlockOuter\">\r\n<tr>\r\n<td class=\"mcnBoxedTextBlockInner\" valign=\"top\">\r\n<table class=\"mcnBoxedTextContentContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 9px 18px 9px 18px;\">\r\n<table class=\"mcnTextContentContainer\" style=\"background-color: #ffffff;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"18\">\r\n<tbody>\r\n<tr>\r\n<td class=\"mcnTextContent\" style=\"font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;\" valign=\"top\">\r\n<div style=\"text-align: left; word-wrap: break-word;\">Thank you for joining [app_name]! To finish signing up, you just need to confirm your account. <br /> <br />To confirm your email, please click this link:&nbsp;[confirmation_link] <br /> <br />Welcome and thanks! <br />[app_name] Team\r\n<div class=\"footer\" style=\"font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;\">&copy; [app_name]</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END BODY --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END TEMPLATE --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</center>', 1, 1, NULL, '2018-09-18 01:37:24', '2018-09-18 01:37:24', NULL),
(2, 2, 'Create User', 'Congratulations! your account has been created', '<center>\r\n<table id=\"bodyTable\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td id=\"bodyCell\" align=\"center\" valign=\"top\">\r\n<table id=\"templateContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<table id=\"templateBody\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"bodyContainer\" style=\"padding-top: 9px; padding-bottom: 9px;\" valign=\"top\">\r\n<table class=\"mcnBoxedTextBlock\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody class=\"mcnBoxedTextBlockOuter\">\r\n<tr>\r\n<td class=\"mcnBoxedTextBlockInner\" valign=\"top\">\r\n<table class=\"mcnBoxedTextContentContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 9px 18px 9px 18px;\">\r\n<table class=\"mcnTextContentContainer\" style=\"background-color: #ffffff;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"18\">\r\n<tbody>\r\n<tr>\r\n<td class=\"mcnTextContent\" style=\"font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;\" valign=\"top\">\r\n<div style=\"text-align: left; word-wrap: break-word;\">Congratulations! your account has been created</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">&nbsp;</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">&nbsp;</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">Your credentials are as below</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">&nbsp;</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">Email - [email]</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">Password - [password]</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">&nbsp;</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\"><br />Welcome and thanks! <br />[app_name] Team\r\n<div class=\"footer\" style=\"font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;\">&copy; [app_name]</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END BODY --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END TEMPLATE --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</center>', 1, 1, NULL, '2018-09-18 01:37:24', '2018-09-18 01:37:24', NULL),
(3, 3, 'Activate / Deactivate User', 'Your account has been [status]', '<center>\r\n<table id=\"bodyTable\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td id=\"bodyCell\" align=\"center\" valign=\"top\">\r\n<table id=\"templateContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<table id=\"templateBody\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"bodyContainer\" style=\"padding-top: 9px; padding-bottom: 9px;\" valign=\"top\">\r\n<table class=\"mcnBoxedTextBlock\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody class=\"mcnBoxedTextBlockOuter\">\r\n<tr>\r\n<td class=\"mcnBoxedTextBlockInner\" valign=\"top\">\r\n<table class=\"mcnBoxedTextContentContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 9px 18px 9px 18px;\">\r\n<table class=\"mcnTextContentContainer\" style=\"background-color: #ffffff;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"18\">\r\n<tbody>\r\n<tr>\r\n<td class=\"mcnTextContent\" style=\"font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;\" valign=\"top\">\r\n<div style=\"text-align: left; word-wrap: break-word;\">Your account has been [status].<br /> <br />Welcome and thanks! <br />[app_name] Team\r\n<div class=\"footer\" style=\"font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;\">&copy; [app_name]</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END BODY --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END TEMPLATE --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</center>', 1, 1, NULL, '2018-09-18 01:37:24', '2018-09-18 01:37:24', NULL),
(4, 4, 'Change Password', 'Your passwprd has been changed successfully', '<center>\r\n<table id=\"bodyTable\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td id=\"bodyCell\" align=\"center\" valign=\"top\">\r\n<table id=\"templateContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<table id=\"templateBody\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"bodyContainer\" style=\"padding-top: 9px; padding-bottom: 9px;\" valign=\"top\">\r\n<table class=\"mcnBoxedTextBlock\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody class=\"mcnBoxedTextBlockOuter\">\r\n<tr>\r\n<td class=\"mcnBoxedTextBlockInner\" valign=\"top\">\r\n<table class=\"mcnBoxedTextContentContainer\" border=\"0\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 9px 18px 9px 18px;\">\r\n<table class=\"mcnTextContentContainer\" style=\"background-color: #ffffff;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"18\">\r\n<tbody>\r\n<tr>\r\n<td class=\"mcnTextContent\" style=\"font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;\" valign=\"top\">\r\n<div style=\"text-align: left; word-wrap: break-word;\">Your password has been changed successfully.</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">&nbsp;</div>\r\n<div style=\"text-align: left; word-wrap: break-word;\">New password : [password]<br /> <br />Welcome and thanks! <br />[app_name] Team\r\n<div class=\"footer\" style=\"font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;\">&copy; [app_name]</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END BODY --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- // END TEMPLATE --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</center>', 1, 1, NULL, '2018-09-18 01:37:24', '2018-09-18 01:37:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_template_placeholders`
--

DROP TABLE IF EXISTS `email_template_placeholders`;
CREATE TABLE IF NOT EXISTS `email_template_placeholders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_placeholders`
--

INSERT INTO `email_template_placeholders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'app_name', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(2, 'name', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(3, 'email', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(4, 'password', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(5, 'contact-details', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(6, 'confirmation_link', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(7, 'password_reset_link', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(8, 'header_logo', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(9, 'footer_logo', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(10, 'unscribe_link', '2018-09-18 01:37:24', '2018-09-18 01:37:24'),
(11, 'status', '2018-09-18 01:37:24', '2018-09-18 01:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_types`
--

DROP TABLE IF EXISTS `email_template_types`;
CREATE TABLE IF NOT EXISTS `email_template_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_types`
--

INSERT INTO `email_template_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(2, 'Create User', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(3, 'Acivate / Deactivate User', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(4, 'Change Password', '2018-09-18 01:37:23', '2018-09-18 01:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_type_id_foreign` (`type_id`),
  KEY `history_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `type_id`, `user_id`, `entity_id`, `icon`, `class`, `text`, `assets`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'trash', 'bg-maroon', 'trans(\"history.backend.users.deleted\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",4]}', '2018-09-18 02:35:41', '2018-09-18 02:35:41'),
(2, 2, 1, 4, 'plus', 'bg-green', 'trans(\"history.backend.roles.created\") <strong>Chef</strong>', NULL, '2018-09-24 02:53:46', '2018-09-24 02:53:46'),
(3, 1, 1, 5, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",5]}', '2018-09-24 03:06:56', '2018-09-24 03:06:56'),
(4, 1, 1, 10, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",10]}', '2018-10-01 07:10:22', '2018-10-01 07:10:22'),
(5, 1, 1, 14, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",14]}', '2018-10-04 13:26:37', '2018-10-04 13:26:37'),
(6, 1, 1, 14, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",14]}', '2018-10-04 13:28:53', '2018-10-04 13:28:53'),
(7, 1, 1, 14, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",14]}', '2018-10-04 13:29:37', '2018-10-04 13:29:37'),
(8, 1, 1, 27, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\" \",27]}', '2018-10-16 13:22:49', '2018-10-16 13:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `history_types`
--

DROP TABLE IF EXISTS `history_types`;
CREATE TABLE IF NOT EXISTS `history_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_types`
--

INSERT INTO `history_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(2, 'Role', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(3, 'Permission', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(4, 'CMSPage', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(5, 'EmailTemplate', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(6, 'BlogTag', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(7, 'BlogCategory', '2018-09-18 01:37:23', '2018-09-18 01:37:23'),
(8, 'Blog', '2018-09-18 01:37:23', '2018-09-18 01:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Product\\Product', '/public/lfm/products/5bb262b32e702.jpeg', NULL, NULL),
(2, 2, 'App\\Models\\Product\\Product', '/public/lfm/products/5bb274c07b119.jpg', NULL, NULL),
(3, 2, 'App\\Models\\Product\\Product', '/public/lfm/products/5bb274c0a9abd.jpg', NULL, NULL),
(4, 3, 'App\\Models\\Product\\Product', '/public/lfm/products/5bb6344d561a0.jpg', NULL, NULL),
(5, 4, 'App\\Models\\Product\\Product', '/public/lfm/products/5bbdb836ecbd0.jpg', NULL, NULL),
(6, 4, 'App\\Models\\Product\\Product', '/public/lfm/products/5bbdb837a09cb.jpg', NULL, NULL),
(7, 4, 'App\\Models\\Product\\Product', '/public/lfm/products/5bbdb83c74e1f.jpg', NULL, NULL),
(8, 6, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc0b8a4a4c9b.jpg', NULL, NULL),
(9, 6, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc0b8a529864.jpg', NULL, NULL),
(10, 6, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc0b8a589b12.jpg', NULL, NULL),
(11, 7, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc57aed09a33.png', NULL, NULL),
(12, 8, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc57d38a5934.jpg', NULL, NULL),
(13, 9, 'App\\Models\\Product\\Product', '/public/lfm/products/5bc6043a8da3f.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `locationable_id` int(11) NOT NULL,
  `locationable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_point` point NOT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_map` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `locationable_id`, `locationable_type`, `location_point`, `building_name`, `address_map`, `address`, `city_id`, `province_id`, `country_id`, `phone`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 27, 'App\\Models\\Access\\User\\User', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Sub branch', 'Cavalry Ground, Lahore, Pakistan', 'near morr masjid caveleri', 1, 1, 1, '54545454', 'chef', '2018-09-24 09:24:09', '2018-09-24 09:24:09'),
(3, 5, 'App\\Models\\Access\\User\\User', '\0\0\0\0\0\0\0×Èì<ÝP@\0¼]\Z@™9@', 'karacho building', 'Karachi City, Pakistan', 'khar', 1, 1, 1, '3333333333', 'chef', '2018-10-18 08:23:15', '2018-10-18 08:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `mc_conversations`
--

DROP TABLE IF EXISTS `mc_conversations`;
CREATE TABLE IF NOT EXISTS `mc_conversations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `private` tinyint(1) NOT NULL DEFAULT '1',
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mc_conversation_user`
--

DROP TABLE IF EXISTS `mc_conversation_user`;
CREATE TABLE IF NOT EXISTS `mc_conversation_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`conversation_id`),
  KEY `mc_conversation_user_conversation_id_foreign` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mc_messages`
--

DROP TABLE IF EXISTS `mc_messages`;
CREATE TABLE IF NOT EXISTS `mc_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mc_messages_user_id_foreign` (`user_id`),
  KEY `mc_messages_conversation_id_foreign` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mc_message_notification`
--

DROP TABLE IF EXISTS `mc_message_notification`;
CREATE TABLE IF NOT EXISTS `mc_message_notification` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `is_sender` tinyint(1) NOT NULL DEFAULT '0',
  `flagged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mc_message_notification_user_id_message_id_index` (`user_id`,`message_id`),
  KEY `mc_message_notification_message_id_foreign` (`message_id`),
  KEY `mc_message_notification_conversation_id_foreign` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('backend','frontend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `name`, `items`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'backend', 'Backend Sidebar Menu', '[{\"id\":11,\"name\":\"Access Management\",\"url\":\"\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-users\",\"view_permission_id\":\"view-access-management\",\"content\":\"Access Management\",\"children\":[{\"id\":12,\"name\":\"User Management\",\"url\":\"admin.access.user.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-user-management\",\"content\":\"User Management\"},{\"id\":13,\"name\":\"Role Management\",\"url\":\"admin.access.role.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-role-management\",\"content\":\"Role Management\"},{\"id\":14,\"name\":\"Permission Management\",\"url\":\"admin.access.permission.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-permission-management\",\"content\":\"Permission Management\"}]},{\"id\":1,\"name\":\"Module\",\"url\":\"admin.modules.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-wrench\",\"view_permission_id\":\"view-module\",\"content\":\"Module\"},{\"id\":3,\"name\":\"Menus\",\"url\":\"admin.menus.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-bars\",\"view_permission_id\":\"view-menu\",\"content\":\"Menus\"},{\"id\":2,\"name\":\"Pages\",\"url\":\"admin.pages.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-file-text\",\"view_permission_id\":\"view-page\",\"content\":\"Pages\"},{\"id\":8,\"name\":\"Email Templates\",\"url\":\"admin.emailtemplates.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-envelope\",\"view_permission_id\":\"view-email-template\",\"content\":\"Email Templates\"},{\"id\":9,\"name\":\"Settings\",\"url\":\"admin.settings.edit?id=1\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-gear\",\"view_permission_id\":\"edit-settings\",\"content\":\"Settings\"},{\"id\":15,\"name\":\"Blog Management\",\"url\":\"\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-commenting\",\"view_permission_id\":\"view-blog\",\"content\":\"Blog Management\",\"children\":[{\"id\":16,\"name\":\"Blog Category Management\",\"url\":\"admin.blogCategories.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-blog-category\",\"content\":\"Blog Category Management\"},{\"id\":17,\"name\":\"Blog Tag Management\",\"url\":\"admin.blogTags.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-blog-tag\",\"content\":\"Blog Tag Management\"},{\"id\":18,\"name\":\"Blog Management\",\"url\":\"admin.blogs.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-blog\",\"content\":\"Blog Management\"}]},{\"id\":19,\"name\":\"Faq Management\",\"url\":\"admin.faqs.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-question-circle\",\"view_permission_id\":\"view-faq\",\"content\":\"Faq Management\"},{\"view_permission_id\":\"view-cuisine-permission\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.cuisines.index\",\"name\":\"Cuisine\",\"id\":20,\"content\":\"Cuisine\"},{\"id\":21,\"name\":\"Products\",\"url\":\"admin.products.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"view_permission_id\":\"view-products-permission\",\"content\":\"Products\"},{\"view_permission_id\":\"view-order-permission\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.orders.index\",\"name\":\"Orders\",\"id\":22,\"content\":\"Orders\"}]', 1, NULL, '2018-09-18 01:37:24', '2018-10-02 12:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_02_060149_create_blog_categories_table', 1),
(2, '2017_11_02_060149_create_blog_map_categories_table', 1),
(3, '2017_11_02_060149_create_blog_map_tags_table', 1),
(4, '2017_11_02_060149_create_blog_tags_table', 1),
(5, '2017_11_02_060149_create_blogs_table', 1),
(6, '2017_11_02_060149_create_email_template_placeholders_table', 1),
(7, '2017_11_02_060149_create_email_template_types_table', 1),
(8, '2017_11_02_060149_create_email_templates_table', 1),
(9, '2017_11_02_060149_create_faqs_table', 1),
(10, '2017_11_02_060149_create_history_table', 1),
(11, '2017_11_02_060149_create_history_types_table', 1),
(12, '2017_11_02_060149_create_modules_table', 1),
(13, '2017_11_02_060149_create_notifications_table', 1),
(14, '2017_11_02_060149_create_pages_table', 1),
(15, '2017_11_02_060149_create_password_resets_table', 1),
(16, '2017_11_02_060149_create_permission_role_table', 1),
(17, '2017_11_02_060149_create_permission_user_table', 1),
(18, '2017_11_02_060149_create_permissions_table', 1),
(19, '2017_11_02_060149_create_role_user_table', 1),
(20, '2017_11_02_060149_create_roles_table', 1),
(21, '2017_11_02_060149_create_sessions_table', 1),
(22, '2017_11_02_060149_create_settings_table', 1),
(23, '2017_11_02_060149_create_social_logins_table', 1),
(24, '2017_11_02_060149_create_users_table', 1),
(25, '2017_11_02_060152_add_foreign_keys_to_history_table', 1),
(26, '2017_11_02_060152_add_foreign_keys_to_notifications_table', 1),
(27, '2017_11_02_060152_add_foreign_keys_to_permission_role_table', 1),
(28, '2017_11_02_060152_add_foreign_keys_to_permission_user_table', 1),
(29, '2017_11_02_060152_add_foreign_keys_to_role_user_table', 1),
(30, '2017_11_02_060152_add_foreign_keys_to_social_logins_table', 1),
(31, '2017_12_10_122555_create_menus_table', 1),
(32, '2017_12_24_042039_add_null_constraint_on_created_by_on_user_table', 1),
(33, '2017_12_28_005822_add_null_constraint_on_created_by_on_role_table', 1),
(34, '2017_12_28_010952_add_null_constraint_on_created_by_on_permission_table', 1),
(35, '2018_08_19_000018_create_devices_table', 1),
(36, '2018_09_18_105517_create_cuisines_table', 2),
(37, '2018_09_18_110519_create_products_table', 2),
(38, '2018_09_18_120837_create_cuisine_product_pivot_table', 3),
(39, '2018_09_19_084153_create_images_table', 4),
(65, '2018_09_19_111722_create_locations_table', 5),
(66, '2018_09_19_123432_create_orderstatuses_table', 5),
(67, '2018_09_19_123439_create_orders_table', 5),
(68, '2018_09_19_131556_create_orderdetails_table', 5),
(69, '2018_09_24_073537_create_usermeta_table', 5),
(70, '2018_09_24_154428_create_rating_review_table', 6),
(71, '2018_09_25_110947_create_jobs_table', 6),
(72, '2018_10_01_144545_create_chat_tables', 7),
(73, '2018_10_02_124144_create_failed_jobs_table', 7),
(74, '2018_10_12_082101_create_chats_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `view_permission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'view_route',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `view_permission_id`, `name`, `url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'view-access-management', 'Access Management', NULL, 1, NULL, '2018-09-18 01:37:24', NULL),
(2, 'view-user-management', 'User Management', 'admin.access.user.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(3, 'view-role-management', 'Role Management', 'admin.access.role.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(4, 'view-permission-management', 'Permission Management', 'admin.access.permission.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(5, 'view-menu', 'Menus', 'admin.menus.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(6, 'view-module', 'Module', 'admin.modules.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(7, 'view-page', 'Pages', 'admin.pages.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(8, 'view-email-template', 'Email Templates', 'admin.emailtemplates.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(9, 'edit-settings', 'Settings', 'admin.settings.edit', 1, NULL, '2018-09-18 01:37:24', NULL),
(10, 'view-blog', 'Blog Management', NULL, 1, NULL, '2018-09-18 01:37:24', NULL),
(11, 'view-blog-category', 'Blog Category Management', 'admin.blogcategories.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(12, 'view-blog-tag', 'Blog Tag Management', 'admin.blogtags.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(13, 'view-blog', 'Blog Management', 'admin.blogs.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(14, 'view-faq', 'Faq Management', 'admin.faqs.index', 1, NULL, '2018-09-18 01:37:24', NULL),
(15, 'view-cuisine-permission', 'Cuisine', 'admin.cuisines.index', 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02'),
(16, 'view-products-permission', 'Products', 'admin.products.index', 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20'),
(17, 'view-images-permission', 'Images', 'admin.images.index', 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54'),
(18, 'view-location-permission', 'Locations', 'admin.locations.index', 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29'),
(19, 'view-order-permission', 'Orders', 'admin.orders.index', 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41'),
(20, 'view-orderstatus-permission', 'OrderStatuses', 'admin.orderstatuses.index', 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(10) UNSIGNED DEFAULT '0' COMMENT 'Sender''s user ID',
  `receiver_id` int(11) DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Event keys',
  `object_id` int(11) DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`sender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `sender_id`, `receiver_id`, `type`, `object_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Order has been created', 5, 14, 'order_create', 107, 0, '2018-10-11 11:56:29', NULL),
(2, 'Order has been created', 5, 14, 'order_create', 108, 0, '2018-10-11 12:32:16', NULL),
(3, 'User Logged In: ', NULL, 1, '1', 0, 0, '2018-10-12 07:14:55', '2018-10-12 07:14:55'),
(4, 'User Logged In: ', NULL, 1, '1', 0, 0, '2018-10-12 07:48:49', '2018-10-12 07:48:49'),
(5, 'Order has been created', 10, 10, 'order_create', 109, 0, '2018-10-12 11:06:04', NULL),
(6, 'Order has been created', 10, 10, 'order_create', 110, 0, '2018-10-12 13:08:28', '2018-10-12 13:08:28'),
(7, 'Order has been created', 10, 10, 'order_update', 110, 0, '2018-10-12 13:30:33', '2018-10-12 13:30:33'),
(8, 'Order has been created', 20, 10, 'order_create', 111, 0, '2018-10-12 13:30:43', '2018-10-12 13:30:43'),
(9, 'Order has been created', 20, 10, 'order_create', 112, 0, '2018-10-12 13:36:44', '2018-10-12 13:36:44'),
(10, 'Order has been created', 24, 10, 'order_create', 113, 0, '2018-10-12 22:31:03', '2018-10-12 22:31:03'),
(11, 'Order has been created', 24, 10, 'order_create', 114, 0, '2018-10-12 22:35:21', '2018-10-12 22:35:21'),
(12, 'Order has been created', 10, 10, 'order_create', 115, 0, '2018-10-15 07:54:55', '2018-10-15 07:54:55'),
(13, 'Order has been created', 10, 10, 'order_create', 116, 0, '2018-10-15 11:46:33', '2018-10-15 11:46:33'),
(14, 'User Logged In: ', NULL, 1, '1', 0, 0, '2018-10-16 13:24:59', '2018-10-16 13:24:59'),
(15, 'Order has been created', 27, 5, 'order_create', 117, 0, '2018-10-16 13:34:23', '2018-10-16 13:34:23'),
(16, 'Order has been created', 10, 5, 'order_create', 118, 0, '2018-10-17 05:34:09', '2018-10-17 05:34:09'),
(17, 'Order has been created', 10, 27, 'order_create', 119, 0, '2018-10-17 06:47:18', '2018-10-17 06:47:18'),
(18, 'Order has been created', 10, 5, 'order_create', 120, 0, '2018-10-17 07:37:38', '2018-10-17 07:37:38'),
(19, 'Order has been created', 28, 27, 'order_create', 121, 0, '2018-10-17 08:05:15', '2018-10-17 08:05:15'),
(20, 'User Logged In: ', NULL, 1, '1', 0, 0, '2018-10-18 08:20:46', '2018-10-18 08:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL COMMENT 'number of servings',
  `price` double NOT NULL COMMENT 'customer_price per product',
  `special_instructions` longtext COLLATE utf8mb4_unicode_ci,
  `added_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderdetails_added_by_foreign` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `qty`, `price`, `special_instructions`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 2, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 09:46:23', '2018-09-24 09:46:23'),
(2, 3, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 12:55:19', '2018-09-24 12:55:19'),
(3, 4, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 12:56:41', '2018-09-24 12:56:41'),
(4, 5, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 12:57:41', '2018-09-24 12:57:41'),
(5, 6, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 13:00:49', '2018-09-24 13:00:49'),
(6, 7, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 13:05:42', '2018-09-24 13:05:42'),
(7, 8, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 13:32:32', '2018-09-24 13:32:32'),
(8, 9, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 13:34:09', '2018-09-24 13:34:09'),
(9, 10, 60, 3, 200, 'Special instructions testng', 5, '2018-09-24 13:35:59', '2018-09-24 13:35:59'),
(10, 11, 1, 3, 200, 'Special instructions testng', 10, '2018-10-02 07:43:14', '2018-10-02 07:43:14'),
(11, 12, 1, 3, 200, 'Special instructions testng', 10, '2018-10-02 07:50:48', '2018-10-02 07:50:48'),
(12, 13, 2, 2, 250, NULL, 10, '2018-10-02 08:17:32', '2018-10-02 08:17:32'),
(13, 14, 2, 3, 250, 'Special instructions testng', 10, '2018-10-02 08:31:15', '2018-10-02 08:31:15'),
(14, 15, 1, 3, 200, 'Special instructions testng', 10, '2018-10-02 08:31:56', '2018-10-02 08:31:56'),
(15, 16, 2, 1, 250, NULL, 10, '2018-10-02 08:33:44', '2018-10-02 08:33:44'),
(16, 17, 1, 2, 200, NULL, 10, '2018-10-02 09:00:21', '2018-10-02 09:00:21'),
(17, 17, 2, 1, 250, NULL, 10, '2018-10-02 09:00:21', '2018-10-02 09:00:21'),
(18, 18, 1, 2, 200, NULL, 10, '2018-10-02 09:20:00', '2018-10-02 09:20:00'),
(19, 18, 2, 1, 250, NULL, 10, '2018-10-02 09:20:00', '2018-10-02 09:20:00'),
(20, 19, 1, 2, 200, NULL, 10, '2018-10-02 09:23:07', '2018-10-02 09:23:07'),
(21, 19, 2, 1, 250, NULL, 10, '2018-10-02 09:23:07', '2018-10-02 09:23:07'),
(22, 20, 1, 2, 200, NULL, 10, '2018-10-02 09:24:22', '2018-10-02 09:24:22'),
(23, 20, 2, 1, 250, NULL, 10, '2018-10-02 09:24:22', '2018-10-02 09:24:22'),
(24, 21, 1, 2, 200, NULL, 10, '2018-10-02 09:25:18', '2018-10-02 09:25:18'),
(25, 21, 2, 1, 250, NULL, 10, '2018-10-02 09:25:18', '2018-10-02 09:25:18'),
(26, 22, 1, 2, 200, NULL, 10, '2018-10-02 09:26:21', '2018-10-02 09:26:21'),
(27, 22, 2, 1, 250, NULL, 10, '2018-10-02 09:26:21', '2018-10-02 09:26:21'),
(28, 23, 1, 2, 200, NULL, 10, '2018-10-02 09:28:56', '2018-10-02 09:28:56'),
(29, 23, 2, 1, 250, NULL, 10, '2018-10-02 09:28:56', '2018-10-02 09:28:56'),
(30, 24, 1, 2, 200, NULL, 10, '2018-10-02 09:30:14', '2018-10-02 09:30:14'),
(31, 24, 2, 1, 250, NULL, 10, '2018-10-02 09:30:14', '2018-10-02 09:30:14'),
(32, 25, 1, 2, 200, NULL, 10, '2018-10-02 09:34:10', '2018-10-02 09:34:10'),
(33, 25, 2, 1, 250, NULL, 10, '2018-10-02 09:34:10', '2018-10-02 09:34:10'),
(34, 26, 1, 2, 200, NULL, 10, '2018-10-02 09:34:46', '2018-10-02 09:34:46'),
(35, 26, 2, 1, 250, NULL, 10, '2018-10-02 09:34:46', '2018-10-02 09:34:46'),
(36, 27, 1, 2, 200, NULL, 10, '2018-10-02 09:37:14', '2018-10-02 09:37:14'),
(37, 27, 2, 1, 250, NULL, 10, '2018-10-02 09:37:14', '2018-10-02 09:37:14'),
(38, 28, 1, 2, 200, NULL, 10, '2018-10-02 09:59:25', '2018-10-02 09:59:25'),
(39, 28, 2, 2, 250, NULL, 10, '2018-10-02 09:59:25', '2018-10-02 09:59:25'),
(40, 29, 2, 2, 250, NULL, 10, '2018-10-02 11:41:16', '2018-10-02 11:41:16'),
(41, 30, 1, 5, 200, NULL, 10, '2018-10-02 16:45:18', '2018-10-02 16:45:18'),
(42, 31, 1, 4, 200, NULL, 10, '2018-10-04 06:15:38', '2018-10-04 06:15:38'),
(43, 32, 2, 1, 250, NULL, 10, '2018-10-04 06:29:23', '2018-10-04 06:29:23'),
(44, 33, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 06:54:44', '2018-10-04 06:54:44'),
(45, 34, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:01:23', '2018-10-04 07:01:23'),
(46, 35, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:02:02', '2018-10-04 07:02:02'),
(47, 36, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:02:24', '2018-10-04 07:02:24'),
(48, 37, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:15:40', '2018-10-04 07:15:40'),
(49, 38, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:23:48', '2018-10-04 07:23:48'),
(50, 39, 2, 2, 250, NULL, 10, '2018-10-04 07:26:45', '2018-10-04 07:26:45'),
(51, 40, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:27:35', '2018-10-04 07:27:35'),
(52, 41, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:28:28', '2018-10-04 07:28:28'),
(53, 42, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:29:53', '2018-10-04 07:29:53'),
(54, 43, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:30:36', '2018-10-04 07:30:36'),
(55, 44, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:31:27', '2018-10-04 07:31:27'),
(56, 45, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:32:32', '2018-10-04 07:32:32'),
(57, 46, 2, 3, 250, 'Special instructions testng', 11, '2018-10-04 07:33:23', '2018-10-04 07:33:23'),
(58, 47, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 07:40:26', '2018-10-04 07:40:26'),
(59, 48, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 07:41:10', '2018-10-04 07:41:10'),
(60, 49, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 07:44:04', '2018-10-04 07:44:04'),
(61, 50, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 07:52:54', '2018-10-04 07:52:54'),
(62, 51, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 08:17:04', '2018-10-04 08:17:04'),
(63, 52, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 08:17:15', '2018-10-04 08:17:15'),
(64, 53, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 08:35:25', '2018-10-04 08:35:25'),
(65, 54, 2, 3, 250, 'Special instructions testng', 5, '2018-10-04 08:35:46', '2018-10-04 08:35:46'),
(67, 56, 1, 2, 200, NULL, 10, '2018-10-08 17:46:39', '2018-10-08 17:46:39'),
(68, 57, 1, 2, 200, NULL, 10, '2018-10-09 10:19:29', '2018-10-09 10:19:29'),
(69, 58, 1, 1, 200, NULL, 10, '2018-10-09 10:30:19', '2018-10-09 10:30:19'),
(70, 59, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 10:36:41', '2018-10-09 10:36:41'),
(71, 60, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 10:37:39', '2018-10-09 10:37:39'),
(72, 61, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:45:58', '2018-10-09 10:45:58'),
(73, 62, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:47:27', '2018-10-09 10:47:27'),
(74, 63, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:48:15', '2018-10-09 10:48:15'),
(75, 64, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:49:45', '2018-10-09 10:49:45'),
(76, 65, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:50:45', '2018-10-09 10:50:45'),
(77, 66, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:55:39', '2018-10-09 10:55:39'),
(78, 67, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 10:56:51', '2018-10-09 10:56:51'),
(79, 68, 2, 1, 250, NULL, 10, '2018-10-09 10:58:11', '2018-10-09 10:58:11'),
(80, 69, 2, 3, 250, NULL, 10, '2018-10-09 10:58:55', '2018-10-09 10:58:55'),
(81, 70, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:02:22', '2018-10-09 11:02:22'),
(82, 70, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:02:22', '2018-10-09 11:02:22'),
(83, 71, 1, 4, 200, NULL, 10, '2018-10-09 11:04:40', '2018-10-09 11:04:40'),
(84, 72, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:10:23', '2018-10-09 11:10:23'),
(85, 72, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:10:23', '2018-10-09 11:10:23'),
(86, 73, 1, 3, 200, NULL, 10, '2018-10-09 11:13:38', '2018-10-09 11:13:38'),
(87, 74, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:18:29', '2018-10-09 11:18:29'),
(88, 74, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:18:29', '2018-10-09 11:18:29'),
(89, 75, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:19:34', '2018-10-09 11:19:34'),
(90, 75, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:19:34', '2018-10-09 11:19:34'),
(91, 76, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:21:07', '2018-10-09 11:21:07'),
(92, 76, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:21:07', '2018-10-09 11:21:07'),
(93, 77, 1, 3, 200, 'Special instructions testng', 5, '2018-10-09 11:21:59', '2018-10-09 11:21:59'),
(94, 77, 2, 3, 250, 'Special instructions testng', 5, '2018-10-09 11:21:59', '2018-10-09 11:21:59'),
(95, 78, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:24:05', '2018-10-09 11:24:05'),
(96, 78, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:24:05', '2018-10-09 11:24:05'),
(97, 79, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:24:33', '2018-10-09 11:24:33'),
(98, 79, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:24:33', '2018-10-09 11:24:33'),
(99, 80, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:24:58', '2018-10-09 11:24:58'),
(100, 80, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:24:58', '2018-10-09 11:24:58'),
(101, 81, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:25:22', '2018-10-09 11:25:22'),
(102, 81, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:25:22', '2018-10-09 11:25:22'),
(103, 82, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:26:01', '2018-10-09 11:26:01'),
(104, 82, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:26:01', '2018-10-09 11:26:01'),
(105, 83, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:27:05', '2018-10-09 11:27:05'),
(106, 83, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:27:05', '2018-10-09 11:27:05'),
(107, 84, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:39:54', '2018-10-09 11:39:54'),
(108, 84, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:39:54', '2018-10-09 11:39:54'),
(109, 85, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:40:26', '2018-10-09 11:40:26'),
(110, 85, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:40:26', '2018-10-09 11:40:26'),
(111, 86, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:41:48', '2018-10-09 11:41:48'),
(112, 86, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:41:48', '2018-10-09 11:41:48'),
(113, 87, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:42:50', '2018-10-09 11:42:50'),
(114, 87, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:42:50', '2018-10-09 11:42:50'),
(115, 88, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:43:09', '2018-10-09 11:43:09'),
(116, 88, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:43:09', '2018-10-09 11:43:09'),
(117, 89, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:45:48', '2018-10-09 11:45:48'),
(118, 89, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:45:48', '2018-10-09 11:45:48'),
(119, 90, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:46:41', '2018-10-09 11:46:41'),
(120, 90, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:46:41', '2018-10-09 11:46:41'),
(121, 91, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:47:08', '2018-10-09 11:47:08'),
(122, 91, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:47:08', '2018-10-09 11:47:08'),
(123, 92, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:49:39', '2018-10-09 11:49:39'),
(124, 92, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:49:39', '2018-10-09 11:49:39'),
(125, 93, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:55:05', '2018-10-09 11:55:05'),
(126, 93, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:55:05', '2018-10-09 11:55:05'),
(127, 94, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:56:50', '2018-10-09 11:56:50'),
(128, 94, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:56:50', '2018-10-09 11:56:50'),
(129, 95, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 11:58:59', '2018-10-09 11:58:59'),
(130, 95, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 11:58:59', '2018-10-09 11:58:59'),
(131, 96, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 12:00:57', '2018-10-09 12:00:57'),
(132, 96, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 12:00:57', '2018-10-09 12:00:57'),
(133, 97, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 12:03:26', '2018-10-09 12:03:26'),
(134, 97, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 12:03:26', '2018-10-09 12:03:26'),
(135, 98, 1, 3, 200, 'Special instructions testng', 10, '2018-10-09 12:04:10', '2018-10-09 12:04:10'),
(136, 98, 2, 3, 250, 'Special instructions testng', 10, '2018-10-09 12:04:10', '2018-10-09 12:04:10'),
(137, 99, 4, 3, 1000, NULL, 10, '2018-10-10 06:30:18', '2018-10-10 06:30:18'),
(138, 100, 3, 1, 300, NULL, 12, '2018-10-11 07:56:36', '2018-10-11 07:56:36'),
(139, 101, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:37:14', '2018-10-11 11:37:14'),
(140, 102, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:37:57', '2018-10-11 11:37:57'),
(141, 103, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:39:02', '2018-10-11 11:39:02'),
(142, 104, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:39:20', '2018-10-11 11:39:20'),
(143, 105, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:53:59', '2018-10-11 11:53:59'),
(144, 106, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:55:15', '2018-10-11 11:55:15'),
(145, 107, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 11:56:27', '2018-10-11 11:56:27'),
(146, 108, 3, 3, 300, 'Special instructions testng', 5, '2018-10-11 12:32:14', '2018-10-11 12:32:14'),
(147, 109, 2, 2, 250, NULL, 10, '2018-10-12 11:06:02', '2018-10-12 11:06:02'),
(148, 110, 6, 1, 50, NULL, 10, '2018-10-12 13:08:25', '2018-10-12 13:08:25'),
(149, 111, 4, 2, 1000, NULL, 20, '2018-10-12 13:30:41', '2018-10-12 13:30:41'),
(150, 112, 6, 1, 50, NULL, 20, '2018-10-12 13:36:43', '2018-10-12 13:36:43'),
(151, 113, 6, 1, 50, NULL, 24, '2018-10-12 22:30:58', '2018-10-12 22:30:58'),
(152, 114, 6, 10, 50, NULL, 24, '2018-10-12 22:35:19', '2018-10-12 22:35:19'),
(153, 115, 6, 1, 50, NULL, 10, '2018-10-15 07:54:52', '2018-10-15 07:54:52'),
(154, 116, 6, 3, 50, NULL, 10, '2018-10-15 11:46:31', '2018-10-15 11:46:31'),
(155, 117, 8, 1, 200, NULL, 27, '2018-10-16 13:34:22', '2018-10-16 13:34:22'),
(156, 118, 7, 1, 200, NULL, 10, '2018-10-17 05:34:07', '2018-10-17 05:34:07'),
(157, 118, 9, 1, 200, NULL, 10, '2018-10-17 05:34:07', '2018-10-17 05:34:07'),
(158, 119, 9, 1, 200, NULL, 10, '2018-10-17 06:47:15', '2018-10-17 06:47:15'),
(159, 120, 8, 2, 200, 'jshdudf', 10, '2018-10-17 07:37:35', '2018-10-17 07:37:35'),
(160, 121, 9, 3, 200, 'hajdjvej', 28, '2018-10-17 08:05:13', '2018-10-17 08:05:13'),
(161, 122, 9, 1, 200, 'Should be a great ,meal test', 1, '2018-11-09 23:16:15', '2018-11-09 23:16:15'),
(162, 123, 9, 1, 200, 'Should be a great ,meal test', 1, '2018-11-09 23:17:47', '2018-11-09 23:17:47'),
(163, 124, 9, 1, 200, NULL, 1, '2018-11-09 23:18:02', '2018-11-09 23:18:02'),
(164, 125, 9, 1, 200, NULL, 1, '2018-11-09 23:18:22', '2018-11-09 23:18:22'),
(165, 126, 9, 1, 200, NULL, 1, '2018-11-09 23:27:58', '2018-11-09 23:27:58'),
(166, 127, 9, 1, 200, NULL, 1, '2018-11-09 23:28:23', '2018-11-09 23:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED NOT NULL,
  `invoice_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_instructions` longtext COLLATE utf8mb4_unicode_ci,
  `orderstatus_id` int(10) UNSIGNED NOT NULL,
  `gogrub_commission` double NOT NULL DEFAULT '0',
  `chef_full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chef_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chef_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chef_location` point NOT NULL,
  `customer_full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PK',
  `customer_location` point NOT NULL,
  `estimate_delivery_mins` int(11) NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `discount_type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charges` double NOT NULL DEFAULT '0' COMMENT 'Approx. delivery charges',
  `subtotal` double NOT NULL,
  `payment_method` enum('cod','2co','easypay','mobicash') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_chef_id_foreign` (`chef_id`),
  KEY `orders_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `chef_id`, `invoice_num`, `special_instructions`, `orderstatus_id`, `gogrub_commission`, `chef_full_name`, `chef_phone`, `chef_email`, `chef_location`, `customer_full_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_city`, `customer_province`, `customer_country`, `customer_location`, `estimate_delivery_mins`, `coupon_code`, `discount`, `discount_type`, `delivery_charges`, `subtotal`, `payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 5, '1', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 09:44:47', '2018-09-24 09:44:47', NULL),
(2, 5, 5, '2', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 09:46:23', '2018-09-24 09:46:23', NULL),
(3, 5, 5, '3', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 12:55:19', '2018-09-24 12:55:19', NULL),
(4, 5, 5, '4', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 12:56:41', '2018-09-24 12:56:41', NULL),
(5, 5, 5, '5', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 12:57:41', '2018-09-24 12:57:41', NULL),
(6, 5, 5, '6', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 13:00:49', '2018-09-24 13:00:49', NULL),
(7, 5, 5, '7', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 13:05:42', '2018-09-24 13:05:42', NULL),
(8, 5, 5, '8', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 13:32:32', '2018-09-24 13:32:32', NULL),
(9, 5, 5, '9', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 13:34:09', '2018-09-24 13:34:09', NULL),
(10, 5, 5, '10', NULL, 1, 0, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-09-24 13:35:59', '2018-09-24 13:35:59', NULL),
(11, 10, 10, '11', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-10-02 07:43:14', '2018-10-02 07:43:14', NULL),
(12, 10, 10, '12', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-10-02 07:50:48', '2018-10-02 07:50:48', NULL),
(13, 10, 10, '13', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0èñò˜R@!Óú6˜x?@', 120, NULL, 0, NULL, 10, 500, 'cod', '2018-10-02 08:17:32', '2018-10-02 08:17:32', NULL),
(14, 10, 10, '14', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-02 08:31:15', '2018-10-02 08:31:15', NULL),
(15, 10, 10, '15', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 600, 'cod', '2018-10-02 08:31:56', '2018-10-02 08:31:56', NULL),
(16, 10, 10, '16', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 120, NULL, 0, NULL, 10, 250, 'cod', '2018-10-02 08:33:44', '2018-10-02 08:33:44', NULL),
(17, 10, 10, '17', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:00:21', '2018-10-02 09:00:21', NULL),
(18, 10, 10, '18', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:19:59', '2018-10-02 09:19:59', NULL),
(19, 10, 10, '19', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:23:07', '2018-10-02 09:23:07', NULL),
(20, 10, 10, '20', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:24:22', '2018-10-02 09:24:22', NULL),
(21, 10, 10, '21', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:25:18', '2018-10-02 09:25:18', NULL),
(22, 10, 10, '22', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:26:21', '2018-10-02 09:26:21', NULL),
(23, 10, 10, '23', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:28:56', '2018-10-02 09:28:56', NULL),
(24, 10, 10, '24', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:30:14', '2018-10-02 09:30:14', NULL),
(25, 10, 10, '25', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:34:10', '2018-10-02 09:34:10', NULL),
(26, 10, 10, '26', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:34:46', '2018-10-02 09:34:46', NULL),
(27, 10, 10, '27', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿÏ	ó˜R@«^_E˜x?@', 180, NULL, 0, NULL, 10, 650, 'cod', '2018-10-02 09:37:14', '2018-10-02 09:37:14', NULL),
(28, 10, 10, '28', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ãÿ‡÷ò˜R@ª^™˜x?@', 120, NULL, 0, NULL, 10, 900, 'cod', '2018-10-02 09:59:25', '2018-10-02 09:59:25', NULL),
(29, 10, 10, '29', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Plot 69, Sector N Dha Phase 1, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0¨69™R@íºª€$|?@', 120, NULL, 0, NULL, 10, 500, 'cod', '2018-10-02 11:41:16', '2018-10-02 11:41:16', NULL),
(30, 10, 10, '30', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', '119-120/AØŒ LDA Quarters, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ñÿ×3<–R@êg–y?@', 60, NULL, 0, NULL, 10, 1, 'cod', '2018-10-02 16:45:18', '2018-10-02 16:45:18', NULL),
(31, 10, 10, '31', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0¨æò˜R@â£.2˜x?@', 120, NULL, 0, NULL, 10, 800, 'cod', '2018-10-04 06:15:38', '2018-10-04 06:15:38', NULL),
(32, 10, 10, '32', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Ghazi Rd, Sector K Dha Phase 1, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ýÿWú˜R@—F¨\0¤x?@', 60, NULL, 0, NULL, 10, 250, 'cod', '2018-10-04 06:29:23', '2018-10-04 06:29:23', NULL),
(33, 11, 10, '33', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 06:54:44', '2018-10-04 06:54:44', NULL),
(34, 11, 10, '34', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:01:23', '2018-10-04 07:01:23', NULL),
(35, 11, 10, '35', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:02:02', '2018-10-04 07:02:02', NULL),
(36, 11, 10, '36', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:02:23', '2018-10-04 07:02:23', NULL),
(37, 11, 10, '37', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:15:40', '2018-10-04 07:15:40', NULL),
(38, 11, 10, '38', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:23:48', '2018-10-04 07:23:48', NULL),
(39, 10, 10, '39', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0èñò˜R@T.Yu˜x?@', 120, NULL, 0, NULL, 10, 500, 'cod', '2018-10-04 07:26:45', '2018-10-04 07:26:45', NULL),
(40, 11, 10, '40', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:27:34', '2018-10-04 07:27:34', NULL),
(41, 11, 10, '41', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:28:28', '2018-10-04 07:28:28', NULL),
(42, 11, 10, '42', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:29:53', '2018-10-04 07:29:53', NULL),
(43, 11, 10, '43', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:30:36', '2018-10-04 07:30:36', NULL),
(44, 11, 10, '44', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:31:27', '2018-10-04 07:31:27', NULL),
(45, 11, 10, '45', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:32:31', '2018-10-04 07:32:31', NULL),
(46, 11, 10, '46', NULL, 2, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Rizwan', '+923234225990', 'jani@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:33:23', '2018-10-04 07:34:25', NULL),
(47, 5, 10, '47', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:40:26', '2018-10-04 07:40:26', NULL),
(48, 5, 10, '48', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:41:10', '2018-10-04 07:41:10', NULL),
(49, 5, 10, '49', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:44:04', '2018-10-04 07:44:04', NULL),
(50, 5, 10, '50', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 07:52:54', '2018-10-04 07:52:54', NULL),
(51, 5, 10, '51', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 08:17:03', '2018-10-04 08:17:03', NULL),
(52, 5, 10, '52', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 08:17:15', '2018-10-04 08:17:15', NULL),
(53, 5, 10, '53', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 08:35:25', '2018-10-04 08:35:25', NULL),
(54, 5, 10, '54', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-04 08:35:46', '2018-10-04 08:35:46', NULL),
(56, 10, 10, '56', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', '119-120/AØŒ LDA Quarters, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ñÿ×3<–R@êg–y?@', 60, NULL, 0, NULL, 10, 400, 'cod', '2018-10-08 17:46:39', '2018-10-08 17:46:39', NULL),
(57, 10, 10, '57', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Plot 425, Sector EE Dha Phase 4, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0âÿ—à˜R@ÒbdÇ<x?@', 60, NULL, 0, NULL, 10, 400, 'cod', '2018-10-09 10:19:29', '2018-10-09 10:19:29', NULL),
(58, 10, 10, '58', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0ð%ó˜R@­·Ií˜x?@', 60, NULL, 0, NULL, 10, 200, 'cod', '2018-10-09 10:30:19', '2018-10-09 10:30:19', NULL),
(59, 10, 10, '59', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:36:41', '2018-10-09 10:36:41', NULL),
(60, 10, 10, '60', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:37:39', '2018-10-09 10:37:39', NULL),
(61, 5, 10, '61', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:45:58', '2018-10-09 10:45:58', NULL),
(62, 5, 10, '62', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:47:27', '2018-10-09 10:47:27', NULL),
(63, 5, 10, '63', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:48:15', '2018-10-09 10:48:15', NULL),
(64, 5, 10, '64', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:49:45', '2018-10-09 10:49:45', NULL),
(65, 5, 10, '65', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:50:45', '2018-10-09 10:50:45', NULL),
(66, 5, 10, '66', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:55:39', '2018-10-09 10:55:39', NULL),
(67, 5, 10, '67', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:56:51', '2018-10-09 10:56:51', NULL),
(68, 10, 10, '68', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0æÿÇÕò˜R@š1{m—x?@', 60, NULL, 0, NULL, 10, 250, 'cod', '2018-10-09 10:58:11', '2018-10-09 10:58:11', NULL),
(69, 10, 10, '69', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0æÿÇÕò˜R@š1{m—x?@', 180, NULL, 0, NULL, 10, 750, 'cod', '2018-10-09 10:58:55', '2018-10-09 10:58:55', NULL),
(70, 5, 10, '70', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:02:22', '2018-10-09 11:02:22', NULL),
(71, 10, 10, '71', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ïÿ_Ôò˜R@×`»—x?@', 120, NULL, 0, NULL, 10, 800, 'cod', '2018-10-09 11:04:40', '2018-10-09 11:04:40', NULL),
(72, 5, 10, '72', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:10:23', '2018-10-09 11:10:23', NULL),
(73, 10, 10, '73', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0æÿÇÕò˜R@	ÒÀk˜x?@', 120, NULL, 0, NULL, 10, 600, 'cod', '2018-10-09 11:13:37', '2018-10-09 11:13:37', NULL),
(74, 5, 10, '74', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:18:29', '2018-10-09 11:18:29', NULL),
(75, 5, 10, '75', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:19:34', '2018-10-09 11:19:34', NULL),
(76, 5, 10, '76', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:21:07', '2018-10-09 11:21:07', NULL),
(77, 5, 10, '77', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'umair_hamid100@yahoo.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:21:59', '2018-10-09 11:21:59', NULL),
(78, 10, 10, '78', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:24:05', '2018-10-09 11:24:05', NULL),
(79, 10, 10, '79', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:24:33', '2018-10-09 11:24:33', NULL),
(80, 10, 10, '80', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:24:58', '2018-10-09 11:24:58', NULL),
(81, 10, 10, '81', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:25:22', '2018-10-09 11:25:22', NULL),
(82, 10, 10, '82', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:26:01', '2018-10-09 11:26:01', NULL),
(83, 10, 10, '83', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:27:05', '2018-10-09 11:27:05', NULL),
(84, 10, 10, '84', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:39:54', '2018-10-09 11:39:54', NULL),
(85, 10, 10, '85', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:40:26', '2018-10-09 11:40:26', NULL),
(86, 10, 10, '86', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:41:48', '2018-10-09 11:41:48', NULL),
(87, 10, 10, '87', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:42:50', '2018-10-09 11:42:50', NULL),
(88, 10, 10, '88', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:43:09', '2018-10-09 11:43:09', NULL),
(89, 10, 10, '89', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:45:48', '2018-10-09 11:45:48', NULL),
(90, 10, 10, '90', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:46:41', '2018-10-09 11:46:41', NULL),
(91, 10, 10, '91', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:47:07', '2018-10-09 11:47:07', NULL),
(92, 10, 10, '92', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:49:39', '2018-10-09 11:49:39', NULL),
(93, 10, 10, '93', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:55:05', '2018-10-09 11:55:05', NULL),
(94, 10, 10, '94', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:56:50', '2018-10-09 11:56:50', NULL),
(95, 10, 10, '95', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 11:58:59', '2018-10-09 11:58:59', NULL),
(96, 10, 10, '96', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 12:00:57', '2018-10-09 12:00:57', NULL),
(97, 10, 10, '97', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 12:03:26', '2018-10-09 12:03:26', NULL),
(98, 10, 10, '98', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '+923234225990', 'zeeshan@gmail.com', '145 K Block, Canal bank, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0VñF–R@ä÷6ýÙ?@', 90, NULL, 0, NULL, 10, 1, 'cod', '2018-10-09 12:04:10', '2018-10-09 12:04:10', NULL),
(99, 10, 10, '99', NULL, 1, 0, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0hò˜R@½ub-˜x?@', 60, NULL, 0, NULL, 10, 3, 'cod', '2018-10-10 06:30:18', '2018-10-10 06:30:18', NULL),
(109, 10, 10, '109', NULL, 1, 25, 'umair hamid', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'umair hamid', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0\0ÐÜò˜R@Ý¹½ƒ˜x?@', 60, NULL, 0, NULL, 10, 500, 'cod', '2018-10-12 11:06:01', '2018-10-12 11:06:01', NULL),
(110, 10, 10, '110', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', 'Plot 425, Sector EE Dha Phase 4, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0`$ß˜R@“[Ê—9x?@', 60, NULL, 0, NULL, 10, 50, 'cod', '2018-10-12 13:08:25', '2018-10-12 13:30:31', NULL),
(111, 20, 10, '111', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Danish Khan', '3156799999', 'faisal@hexa.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0çÿ‡Êò˜R@k÷öá™x?@', 60, NULL, 0, NULL, 10, 2, 'cod', '2018-10-12 13:30:41', '2018-10-12 13:30:41', NULL),
(112, 20, 10, '112', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Danish Khan', '3156799999', 'faisal@hexa.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0èÄò˜R@|µÕV™x?@', 60, NULL, 0, NULL, 10, 50, 'cod', '2018-10-12 13:36:42', '2018-10-12 13:36:42', NULL),
(113, 24, 10, '113', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'abubakar', '3338363501', 'danishaslam1123@gmail.com', 'Plot 12, Block E Architects Engineers Housing Society, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0€è¨R@\"l\0pq?@', 180, NULL, 0, NULL, 10, 50, 'cod', '2018-10-12 22:30:58', '2018-10-12 22:30:58', NULL),
(114, 24, 10, '114', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'abubakar', '3338363501', 'danishaslam1123@gmail.com', 'Plot 12, Block E Architects Engineers Housing Society, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0€è¨R@\"l\0pq?@', 60, NULL, 0, NULL, 10, 500, 'cod', '2018-10-12 22:35:19', '2018-10-12 22:35:19', NULL),
(115, 10, 10, '115', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0@¸ò˜R@gE\"’˜x?@', 120, NULL, 0, NULL, 10, 50, 'cod', '2018-10-15 07:54:52', '2018-10-15 07:54:52', NULL),
(116, 10, 10, '116', NULL, 1, 25, 'Zeeshan Sardar', '54545454', 'zeeshan@gmail.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', 'Unnamed Road, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\r\0h®ò˜R@L†3šx?@', 60, NULL, 0, NULL, 10, 150, 'cod', '2018-10-15 11:46:31', '2018-10-15 11:46:31', NULL),
(117, 27, 5, '117', NULL, 1, 25, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Ali Irshad', '3234455598', 'ali.irshad@yahoo.com', 'Al-Qadir Heights, Babar Block Garden Town, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿŽæ”R@­»%¥“€?@', 60, NULL, 0, NULL, 10, 200, 'cod', '2018-10-16 13:34:22', '2018-10-16 13:34:22', NULL),
(118, 10, 5, '118', NULL, 1, 25, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', '19-K, Ghazi Rd, Sector K Dha Phase 1, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0üÿ×÷˜R@.\0p˜x?@', 60, NULL, 0, NULL, 10, 400, 'cod', '2018-10-17 05:34:07', '2018-10-17 05:34:07', NULL),
(119, 10, 27, '119', NULL, 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', 'Ghazi Rd, Sector S DHA Phase 2, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0Èg÷˜R@â£.2˜x?@', 60, NULL, 0, NULL, 10, 200, 'cod', '2018-10-17 06:47:15', '2018-10-17 06:47:15', NULL),
(120, 10, 5, '120', NULL, 1, 25, 'umair hamid', '54545454', 'umair_hamid100@yahoo.com', '\0\0\0\0\0\0\0M¸Õ\Zç™R@RÒWCDu?@', 'Zeeshan Sardar', '3214148671', 'zeeshan@gmail.com', '834 Street 11, Sector Z DHA Phase 3, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ìÿ—˜R@w7ž&=z?@', 180, NULL, 0, NULL, 10, 400, 'cod', '2018-10-17 07:37:35', '2018-10-17 07:37:35', NULL),
(121, 28, 27, '121', NULL, 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Danish aslam', '3200313389', 'danish@d.com', 'Masjid Rd, Sector S, DHA 2, Lahore, Punjab, Pakistan', NULL, NULL, 'PK', '\0\0\0\0\0\0\0\0`Øf™R@ÊSŠÔx?@', 120, NULL, 0, NULL, 10, 600, 'cod', '2018-10-17 08:05:13', '2018-10-17 08:05:13', NULL),
(122, 1, 27, '122', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:16:14', '2018-11-09 23:16:14', NULL),
(123, 1, 27, '123', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:17:47', '2018-11-09 23:17:47', NULL),
(124, 1, 27, '124', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:18:02', '2018-11-09 23:18:02', NULL),
(125, 1, 27, '125', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:18:22', '2018-11-09 23:18:22', NULL),
(126, 1, 27, '126', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:27:57', '2018-11-09 23:27:57', NULL),
(127, 1, 27, '127', 'Additional Delivery InformationAdditional Delivery InformationAdditional Delivery InformationAdditional Delivery Information', 1, 25, 'Ali Irshad', '54545454', 'ali.irshad@yahoo.com', '\0\0\0\0\0\0\0iñÔm—R@þ-\\±\Z€?@', 'Viral', '3231111111', 'admin@admin.com', 'Complete AddressComplete AddressComplete Address', NULL, NULL, 'PK', '\0\0\0\0\0\0\0ak[9 šR@)7›Øz?@', 0, NULL, 0, NULL, 10, 200, 'cod', '2018-11-09 23:28:23', '2018-11-09 23:28:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatuses`
--

DROP TABLE IF EXISTS `orderstatuses`;
CREATE TABLE IF NOT EXISTS `orderstatuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `push_notification` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderstatuses`
--

INSERT INTO `orderstatuses` (`id`, `status`, `description`, `email`, `push_notification`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 'Order pending', NULL, NULL, '2018-09-24 13:35:52', '2018-09-24 13:35:52'),
(2, 'In progress', 'In progress', NULL, NULL, '2018-09-24 13:35:52', '2018-09-24 13:35:52'),
(3, 'delievered', 'delievered', NULL, NULL, '2018-09-24 13:35:52', '2018-09-24 13:35:52'),
(4, 'Cancelled', 'Cancelled', NULL, NULL, '2018-09-24 13:35:52', '2018-09-24 13:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_page_slug_unique` (`page_slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `page_slug`, `description`, `cannonical_link`, `seo_title`, `seo_keyword`, `seo_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Terms and conditions', 'terms-and-conditions', '<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', NULL, NULL, NULL, NULL, 1, 1, 1, '2018-09-18 01:37:24', '2018-09-28 11:35:49', NULL),
(2, 'About', 'about', '<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-09-28 11:35:06', '2018-09-28 11:35:06', NULL),
(3, 'Privacy Policy', 'privacy-policy', '<h1>One morning, when Gregor Samsa woke from troubled dreams.</h1>\r\n<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover <strong>strong</strong> it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, <a class=\"external ext\" href=\"#\">link</a> waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>', 'privacy-policy', 'Privacy Policy', 'Privacy Policy', NULL, 1, 1, NULL, '2018-10-11 07:23:18', '2018-10-11 07:23:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'view-backend', 'View Backend', 1, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(2, 'view-frontend', 'View Frontend', 2, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(3, 'view-access-management', 'View Access Management', 3, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(4, 'view-user-management', 'View User Management', 4, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(5, 'view-active-user', 'View Active User', 5, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(6, 'view-deactive-user', 'View Deactive User', 6, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(7, 'view-deleted-user', 'View Deleted User', 7, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(8, 'show-user', 'Show User Details', 8, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(9, 'create-user', 'Create User', 9, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(10, 'edit-user', 'Edit User', 9, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(11, 'delete-user', 'Delete User', 10, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(12, 'activate-user', 'Activate User', 11, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(13, 'deactivate-user', 'Deactivate User', 12, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(14, 'login-as-user', 'Login As User', 13, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(15, 'clear-user-session', 'Clear User Session', 14, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(16, 'view-role-management', 'View Role Management', 15, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(17, 'create-role', 'Create Role', 16, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(18, 'edit-role', 'Edit Role', 17, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(19, 'delete-role', 'Delete Role', 18, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(20, 'view-permission-management', 'View Permission Management', 19, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(21, 'create-permission', 'Create Permission', 20, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(22, 'edit-permission', 'Edit Permission', 21, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(23, 'delete-permission', 'Delete Permission', 22, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(24, 'view-page', 'View Page', 23, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(25, 'create-page', 'Create Page', 24, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(26, 'edit-page', 'Edit Page', 25, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(27, 'delete-page', 'Delete Page', 26, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(28, 'view-email-template', 'View Email Templates', 27, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(29, 'create-email-template', 'Create Email Templates', 28, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(30, 'edit-email-template', 'Edit Email Templates', 29, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(31, 'delete-email-template', 'Delete Email Templates', 30, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(32, 'edit-settings', 'Edit Settings', 31, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(33, 'view-blog-category', 'View Blog Categories Management', 32, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(34, 'create-blog-category', 'Create Blog Category', 33, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(35, 'edit-blog-category', 'Edit Blog Category', 34, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(36, 'delete-blog-category', 'Delete Blog Category', 35, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(37, 'view-blog-tag', 'View Blog Tags Management', 36, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(38, 'create-blog-tag', 'Create Blog Tag', 37, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(39, 'edit-blog-tag', 'Edit Blog Tag', 38, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(40, 'delete-blog-tag', 'Delete Blog Tag', 39, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(41, 'view-blog', 'View Blogs Management', 40, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(42, 'create-blog', 'Create Blog', 41, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(43, 'edit-blog', 'Edit Blog', 42, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(44, 'delete-blog', 'Delete Blog', 43, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(45, 'view-faq', 'View FAQ Management', 44, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(46, 'create-faq', 'Create FAQ', 45, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(47, 'edit-faq', 'Edit FAQ', 46, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(48, 'delete-faq', 'Delete FAQ', 47, 1, 1, NULL, '2018-09-18 01:37:23', '2018-09-18 01:37:23', NULL),
(49, 'manage-cuisine', 'Manage Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(50, 'create-cuisine', 'Create Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(51, 'store-cuisine', 'Store Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(52, 'edit-cuisine', 'Edit Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(53, 'update-cuisine', 'Update Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(54, 'delete-cuisine', 'Delete Cuisine Permission', 0, 1, 1, NULL, '2018-09-18 05:59:02', '2018-09-18 05:59:02', NULL),
(55, 'manage-product', 'Manage Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(56, 'create-product', 'Create Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(57, 'store-product', 'Store Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(58, 'edit-product', 'Edit Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(59, 'update-product', 'Update Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(60, 'delete-product', 'Delete Product Permission', 0, 1, 1, NULL, '2018-09-18 06:05:20', '2018-09-18 06:05:20', NULL),
(61, 'manage-image', 'Manage Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(62, 'create-image', 'Create Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(63, 'store-image', 'Store Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(64, 'edit-image', 'Edit Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(65, 'update-image', 'Update Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(66, 'delete-image', 'Delete Image Permission', 0, 1, 1, NULL, '2018-09-19 03:41:54', '2018-09-19 03:41:54', NULL),
(67, 'manage-location', 'Manage Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(68, 'create-location', 'Create Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(69, 'store-location', 'Store Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(70, 'edit-location', 'Edit Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(71, 'update-location', 'Update Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(72, 'delete-location', 'Delete Location Permission', 0, 1, 1, NULL, '2018-09-19 06:17:29', '2018-09-19 06:17:29', NULL),
(73, 'manage-order', 'Manage Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(74, 'create-order', 'Create Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(75, 'store-order', 'Store Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(76, 'edit-order', 'Edit Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(77, 'update-order', 'Update Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(78, 'delete-order', 'Delete Order Permission', 0, 1, 1, NULL, '2018-09-19 07:34:41', '2018-09-19 07:34:41', NULL),
(79, 'manage-orderstatus', 'Manage Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL),
(80, 'create-orderstatus', 'Create Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL),
(81, 'store-orderstatus', 'Store Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL),
(82, 'edit-orderstatus', 'Edit Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL),
(83, 'update-orderstatus', 'Update Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL),
(84, 'delete-orderstatus', 'Delete Orderstatus Permission', 0, 1, 1, NULL, '2018-09-24 08:28:22', '2018-09-24 08:28:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 4, 2),
(4, 5, 2),
(5, 6, 2),
(6, 7, 2),
(7, 8, 2),
(8, 16, 2),
(9, 20, 2),
(10, 24, 2),
(11, 25, 2),
(12, 26, 2),
(13, 27, 2),
(14, 28, 2),
(15, 29, 2),
(16, 30, 2),
(17, 31, 2),
(18, 33, 2),
(19, 34, 2),
(20, 35, 2),
(21, 36, 2),
(22, 37, 2),
(23, 38, 2),
(24, 39, 2),
(25, 40, 2),
(26, 41, 2),
(27, 42, 2),
(28, 43, 2),
(29, 44, 2),
(30, 45, 2),
(31, 46, 2),
(32, 47, 2),
(33, 48, 2),
(34, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  KEY `permission_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=309 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`) VALUES
(1, 42, 2),
(2, 34, 2),
(3, 38, 2),
(4, 29, 2),
(5, 46, 2),
(6, 25, 2),
(7, 44, 2),
(8, 36, 2),
(9, 40, 2),
(10, 31, 2),
(11, 48, 2),
(12, 27, 2),
(13, 43, 2),
(14, 35, 2),
(15, 39, 2),
(16, 30, 2),
(17, 47, 2),
(18, 26, 2),
(19, 8, 2),
(20, 3, 2),
(21, 5, 2),
(22, 1, 2),
(23, 33, 2),
(24, 37, 2),
(25, 41, 2),
(26, 6, 2),
(27, 7, 2),
(28, 28, 2),
(29, 45, 2),
(30, 24, 2),
(31, 20, 2),
(32, 16, 2),
(33, 4, 2),
(34, 2, 3),
(35, 2, 4),
(38, 1, 5),
(37, 2, 6),
(39, 2, 5),
(40, 3, 5),
(41, 4, 5),
(42, 5, 5),
(43, 6, 5),
(44, 7, 5),
(45, 8, 5),
(46, 9, 5),
(47, 10, 5),
(48, 11, 5),
(49, 12, 5),
(50, 13, 5),
(51, 14, 5),
(52, 15, 5),
(53, 16, 5),
(54, 17, 5),
(55, 18, 5),
(56, 19, 5),
(57, 20, 5),
(58, 21, 5),
(59, 22, 5),
(60, 23, 5),
(61, 24, 5),
(62, 25, 5),
(63, 26, 5),
(64, 27, 5),
(65, 28, 5),
(66, 29, 5),
(67, 30, 5),
(68, 31, 5),
(69, 32, 5),
(70, 33, 5),
(71, 34, 5),
(72, 35, 5),
(73, 36, 5),
(74, 37, 5),
(75, 38, 5),
(76, 39, 5),
(77, 40, 5),
(78, 41, 5),
(79, 42, 5),
(80, 43, 5),
(81, 44, 5),
(82, 45, 5),
(83, 46, 5),
(84, 47, 5),
(85, 48, 5),
(86, 49, 5),
(87, 50, 5),
(88, 51, 5),
(89, 52, 5),
(90, 53, 5),
(91, 54, 5),
(92, 55, 5),
(93, 56, 5),
(94, 57, 5),
(95, 58, 5),
(96, 59, 5),
(97, 60, 5),
(98, 61, 5),
(99, 62, 5),
(100, 63, 5),
(101, 64, 5),
(102, 65, 5),
(103, 66, 5),
(104, 67, 5),
(105, 68, 5),
(106, 69, 5),
(107, 70, 5),
(108, 71, 5),
(109, 72, 5),
(110, 73, 5),
(111, 74, 5),
(112, 75, 5),
(113, 76, 5),
(114, 77, 5),
(115, 78, 5),
(116, 2, 7),
(117, 2, 8),
(118, 2, 9),
(122, 1, 10),
(120, 2, 11),
(121, 2, 12),
(123, 2, 10),
(124, 3, 10),
(125, 4, 10),
(126, 5, 10),
(127, 6, 10),
(128, 7, 10),
(129, 8, 10),
(130, 9, 10),
(131, 10, 10),
(132, 11, 10),
(133, 12, 10),
(134, 13, 10),
(135, 14, 10),
(136, 15, 10),
(137, 16, 10),
(138, 17, 10),
(139, 18, 10),
(140, 19, 10),
(141, 20, 10),
(142, 21, 10),
(143, 22, 10),
(144, 23, 10),
(145, 24, 10),
(146, 25, 10),
(147, 26, 10),
(148, 27, 10),
(149, 28, 10),
(150, 29, 10),
(151, 30, 10),
(152, 31, 10),
(153, 32, 10),
(154, 33, 10),
(155, 34, 10),
(156, 35, 10),
(157, 36, 10),
(158, 37, 10),
(159, 38, 10),
(160, 39, 10),
(161, 40, 10),
(162, 41, 10),
(163, 42, 10),
(164, 43, 10),
(165, 44, 10),
(166, 45, 10),
(167, 46, 10),
(168, 47, 10),
(169, 48, 10),
(170, 49, 10),
(171, 50, 10),
(172, 51, 10),
(173, 52, 10),
(174, 53, 10),
(175, 54, 10),
(176, 55, 10),
(177, 56, 10),
(178, 57, 10),
(179, 58, 10),
(180, 59, 10),
(181, 60, 10),
(182, 61, 10),
(183, 62, 10),
(184, 63, 10),
(185, 64, 10),
(186, 65, 10),
(187, 66, 10),
(188, 67, 10),
(189, 68, 10),
(190, 69, 10),
(191, 70, 10),
(192, 71, 10),
(193, 72, 10),
(194, 73, 10),
(195, 74, 10),
(196, 75, 10),
(197, 76, 10),
(198, 77, 10),
(199, 78, 10),
(200, 79, 10),
(201, 80, 10),
(202, 81, 10),
(203, 82, 10),
(204, 83, 10),
(205, 84, 10),
(206, 2, 13),
(210, 2, 14),
(211, 2, 15),
(212, 2, 16),
(213, 2, 17),
(214, 2, 18),
(215, 2, 19),
(216, 2, 20),
(217, 2, 21),
(218, 2, 22),
(219, 2, 23),
(220, 2, 24),
(221, 2, 25),
(222, 2, 26),
(224, 1, 27),
(225, 2, 27),
(226, 3, 27),
(227, 4, 27),
(228, 5, 27),
(229, 6, 27),
(230, 7, 27),
(231, 8, 27),
(232, 9, 27),
(233, 10, 27),
(234, 11, 27),
(235, 12, 27),
(236, 13, 27),
(237, 14, 27),
(238, 15, 27),
(239, 16, 27),
(240, 17, 27),
(241, 18, 27),
(242, 19, 27),
(243, 20, 27),
(244, 21, 27),
(245, 22, 27),
(246, 23, 27),
(247, 24, 27),
(248, 25, 27),
(249, 26, 27),
(250, 27, 27),
(251, 28, 27),
(252, 29, 27),
(253, 30, 27),
(254, 31, 27),
(255, 32, 27),
(256, 33, 27),
(257, 34, 27),
(258, 35, 27),
(259, 36, 27),
(260, 37, 27),
(261, 38, 27),
(262, 39, 27),
(263, 40, 27),
(264, 41, 27),
(265, 42, 27),
(266, 43, 27),
(267, 44, 27),
(268, 45, 27),
(269, 46, 27),
(270, 47, 27),
(271, 48, 27),
(272, 49, 27),
(273, 50, 27),
(274, 51, 27),
(275, 52, 27),
(276, 53, 27),
(277, 54, 27),
(278, 55, 27),
(279, 56, 27),
(280, 57, 27),
(281, 58, 27),
(282, 59, 27),
(283, 60, 27),
(284, 61, 27),
(285, 62, 27),
(286, 63, 27),
(287, 64, 27),
(288, 65, 27),
(289, 66, 27),
(290, 67, 27),
(291, 68, 27),
(292, 69, 27),
(293, 70, 27),
(294, 71, 27),
(295, 72, 27),
(296, 73, 27),
(297, 74, 27),
(298, 75, 27),
(299, 76, 27),
(300, 77, 27),
(301, 78, 27),
(302, 79, 27),
(303, 80, 27),
(304, 81, 27),
(305, 82, 27),
(306, 83, 27),
(307, 84, 27),
(308, 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chef_id` int(10) UNSIGNED NOT NULL COMMENT 'Chef of the product from users',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuisine_id` int(10) UNSIGNED NOT NULL COMMENT 'PK of cuisine table',
  `serving_size` int(11) NOT NULL COMMENT 'Serving for how may people',
  `total_servings` int(11) NOT NULL COMMENT 'How many servings chef made',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL COMMENT 'original price of product',
  `discounted_price` double NOT NULL DEFAULT '0' COMMENT 'Will show this price if it is not 0',
  `availability_from` datetime NOT NULL,
  `availability_to` datetime DEFAULT NULL,
  `preparation_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_chef_id_foreign` (`chef_id`),
  KEY `products_cuisine_id_foreign` (`cuisine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `chef_id`, `name`, `slug`, `cuisine_id`, `serving_size`, `total_servings`, `description`, `price`, `discounted_price`, `availability_from`, `availability_to`, `preparation_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 5, 'my first product', 'my-first-product', 1, 2, 20, 'Please give my food a try.', 200, 0, '2018-09-20 00:00:00', '2018-11-11 00:00:00', 45, 1, '2018-10-16 03:45:16', '2018-10-16 03:45:16', NULL),
(8, 5, 'Shashlik', 'shashlik', 1, 2, 20, 'Please give my food a try.', 200, 0, '2018-09-20 00:00:00', '2018-11-11 00:00:00', 45, 1, '2018-10-16 03:55:04', '2018-10-16 03:55:04', NULL),
(9, 27, 'glass', 'glass', 1, 2, 10, 'aloo', 200, 0, '2018-10-16 18:30:00', '2019-03-29 23:00:00', 30, 1, '2018-10-16 13:31:06', '2019-01-31 13:31:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_reviews`
--

DROP TABLE IF EXISTS `rating_reviews`;
CREATE TABLE IF NOT EXISTS `rating_reviews` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED NOT NULL,
  `rating` double NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rating_reviews_user_id_foreign` (`user_id`),
  KEY `rating_reviews_chef_id_foreign` (`chef_id`),
  KEY `rating_reviews_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_reviews`
--

INSERT INTO `rating_reviews` (`id`, `user_id`, `order_id`, `chef_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 120, 1, 4, 'guygkuygyuv v ghvg g cjcj cgkhc uv uvvbjhv kjvkjvkjvkj v kjvhkj hvjhv kjvh hvj hv kjvhv kjhv kjh', '2018-09-29 22:00:00', '2018-09-29 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `all`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 1, 1, 1, 1, NULL, '2018-09-18 01:37:22', '2018-09-18 01:37:22', NULL),
(2, 'Executive', 0, 2, 1, 1, NULL, '2018-09-18 01:37:22', '2018-09-18 01:37:22', NULL),
(3, 'User', 0, 3, 1, 1, NULL, '2018-09-18 01:37:22', '2018-09-18 01:37:22', NULL),
(4, 'Chef', 1, 4, 1, 1, NULL, '2018-09-24 02:53:46', '2018-09-24 02:53:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(7, 5, 4),
(6, 6, 3),
(8, 7, 3),
(9, 8, 3),
(10, 9, 3),
(12, 11, 3),
(13, 12, 3),
(15, 13, 3),
(19, 14, 3),
(20, 15, 3),
(21, 16, 3),
(22, 17, 3),
(23, 18, 3),
(24, 19, 3),
(25, 20, 3),
(26, 21, 3),
(27, 22, 3),
(28, 23, 3),
(29, 24, 3),
(30, 25, 3),
(31, 26, 3),
(33, 27, 4),
(34, 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'seo_site_logo', '/laravel-filemanager/products/5bb6344d561a0_S.jpg'),
(2, 'seo_title', NULL),
(3, 'seo_keyword', NULL),
(4, 'seo_description', NULL),
(5, 'company_address', NULL),
(6, 'company_contact', NULL),
(7, 'from_name', NULL),
(8, 'from_email', NULL),
(9, 'gogrub_default_commission', '25'),
(10, 'disclaimer', NULL),
(11, 'default_search_distance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

DROP TABLE IF EXISTS `social_logins`;
CREATE TABLE IF NOT EXISTS `social_logins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_logins_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

DROP TABLE IF EXISTS `usermeta`;
CREATE TABLE IF NOT EXISTS `usermeta` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usermeta_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`id`, `user_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(2, 11, 'cnic_image_0', 'cnic_image5bbde582ecffe.png', '2018-10-10 09:41:56', '2018-10-10 09:41:56'),
(3, 11, 'cnic_image_1', 'cnic_image5bbde58376b1c.png', '2018-10-10 09:41:56', '2018-10-10 09:41:56'),
(4, 11, 'kitchen_image_0', 'kitchen_image5bbde583f2f20.png', '2018-10-10 09:41:56', '2018-10-10 09:41:56'),
(5, 11, 'kitchen_image_1', 'kitchen_image5bbde58470e80.png', '2018-10-10 09:41:56', '2018-10-10 09:41:56'),
(6, 11, 'cnic_image_0', 'cnic_image5bbdef9cbc2d5.jpg', '2018-10-10 10:25:07', '2018-10-10 10:25:07'),
(7, 11, 'cnic_image_1', 'cnic_image5bbdef9d5e6b3.jpg', '2018-10-10 10:25:07', '2018-10-10 10:25:07'),
(8, 11, 'kitchen_image_0', 'kitchen_image5bbdefa2eaf90.jpg', '2018-10-10 10:25:07', '2018-10-10 10:25:07'),
(9, 11, 'kitchen_image_1', 'kitchen_image5bbdefa378987.jpg', '2018-10-10 10:25:07', '2018-10-10 10:25:07'),
(10, 5, 'cnic_image_0', 'cnic_image5bbe02a5d701f.jpg', '2018-10-10 11:46:31', '2018-10-10 11:46:31'),
(11, 5, 'cnic_image_1', 'cnic_image5bbe02abeebf5.jpg', '2018-10-10 11:46:31', '2018-10-10 11:46:31'),
(12, 5, 'kitchen_image_0', 'kitchen_image5bbe02b1bce6f.jpg', '2018-10-10 11:46:31', '2018-10-10 11:46:31'),
(13, 27, 'cnic_image_0', 'cnic_image5bc60071a342e.jpg', '2018-10-16 13:14:59', '2018-10-16 13:14:59'),
(14, 27, 'cnic_image_1', 'cnic_image5bc6007213b68.jpg', '2018-10-16 13:14:59', '2018-10-16 13:14:59'),
(15, 27, 'kitchen_image_0', 'kitchen_image5bc600728a055.jpg', '2018-10-16 13:14:59', '2018-10-16 13:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` int(11) NOT NULL DEFAULT '92',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_chef` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mobile confirmation code',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'is mobile number confirmed?',
  `is_term_accept` tinyint(1) NOT NULL DEFAULT '1' COMMENT ' 0 = not accepted,1 = accepted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `mobile`, `country_code`, `avatar`, `dob`, `description`, `password`, `is_chef`, `status`, `confirmation_code`, `confirmed`, `is_term_accept`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Viral', 'admin@admin.com', '3231111111', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$45RRYnJWpNc7PUi8c8KqPOr1yO5lBtYmEyEujPOgYM0Lb8ZYwsoni', 0, 1, '$2y$10$prjgrqDLep28HLhGYxmNEuOLk1trg9/aicyI2gt.UhN243F13FqfW', 1, 1, 'VbToIOKvkGxMHqtXFlbkroxzIc2JnficIFcvL80LKINk7HcYrzyhtIYhWgt6', 1, NULL, '2018-09-18 01:37:22', '2018-09-18 05:35:27', NULL),
(2, 'Vipul', 'executive@executive.com', '3234225991', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$W3w0Vm0cNvfK5XZJwSi/Me26Vmpjl05Wq4HhmwAako6LP2sruYNDi', 0, 1, '510fd76b44b9c67c6043a487521026a4', 1, 1, NULL, 1, NULL, '2018-09-18 01:37:22', '2018-09-18 01:37:22', NULL),
(3, 'User', 'user@user.com', '3234225992', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$c5nmyBqzU9/A.gpkG/x5R.goYVKIyJ64mgEVNhlyk3VB3LaEopwo6', 0, 1, '96432de5ab96ade88c8bf616ec605990', 1, 1, '6IYfa98ZwYBExGiUe8L4eMOFEVrJ6ukqf61CgxV4rV0kCCcFp9WYpLyB49k8', 1, NULL, '2018-09-18 01:37:22', '2018-09-18 01:37:22', NULL),
(5, 'umair hamid', 'umair_hamid100@yahoo.com', '3234225990', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$bbL/Xj9ltJi.79aXsS6MzeCei9XUMF9AQzgOmhjGXHjHtAOkNKKNS', 0, 1, '69e2078f3706af3e110af4706652d59c', 1, 1, NULL, NULL, NULL, '2018-09-18 02:38:39', '2018-09-18 02:38:39', NULL),
(6, 'umair hamid', 'umair_hamid1000@yahoo.com', '3234225999', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$ztdwpw74bS9ucyoi9QHExu/wq7u4t9LjLyc3giFKBiX.PuFRabejS', 0, 1, '$2y$10$WFkajwlcMuJo7h8GaLt.neX.HLPedKIS92FY3q8DGAp.rKprIogl2', 1, 1, NULL, NULL, NULL, '2018-09-19 02:46:02', '2018-09-19 02:46:02', NULL),
(7, 'khadim', 'm.khadim012@gmail.com', '3477479645', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$OCjorAUD5ELyqJP52wOM/.nXeZmo.qN//Hqiq2UQg8nH8sAGZBcCG', 0, 1, '$2y$10$s/xek3kxlN4gYQ/t3pyh8.zCilz4l2sVTJSscDxMJTwGyuEpqM4I.', 1, 1, NULL, NULL, NULL, '2018-09-25 09:29:23', '2018-09-25 09:37:52', NULL),
(8, 'Atif', 'm.khadim011@gmail.com', '3336323584', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$BoPD/krn2H67FcPV0iDyJ.XcFnb0MI4SuTc5/Zlg4dVNvsmuqjPLS', 0, 1, '$2y$10$/H3Zfe1E5jadwxUW3z0kIuDymQErsfp8DXiir69RsAzRKYTzVgWYe', 0, 1, NULL, NULL, NULL, '2018-09-25 10:01:21', '2018-09-25 10:01:21', NULL),
(9, 'Rizwan', 'dfs@dfa.com', '3238842066', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$rWSJeTqVH43bOU.TgqtH8eZ1aHygv27qRFlrwzs2V7ocwnhnzou72', 0, 1, '$2y$10$CFSSR4gsRII/nHcu99wGneJ/.fE76ZnhorfpzttsdzlOWOcxBZt3y', 0, 1, NULL, NULL, NULL, '2018-09-25 11:21:56', '2018-09-25 11:21:56', NULL),
(10, 'Zeeshan Sardar', 'zeeshan@gmail.com', '3214148671', 92, '/public/lfm/avatars/5bc0b06557332.jpg', NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$mdu08PlpVVhybw37qE6MOuzsEDHV4d6/cjqRaJbnIHkg5XSynPI72', 0, 1, '$2y$10$rNfu2zEMwlgV4Kd4rAQWIuuyevctqVQ82Vdqi7SQDKrIQ.9N1R9kO', 1, 1, NULL, NULL, NULL, '2018-09-28 16:04:37', '2018-10-12 12:32:05', NULL),
(11, 'Rizwan', 'jani@gmail.com', '3234444444', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$W0dtamNWNrk8EiMYouoDAONTp2cAl0JmvM53GZQa6LtdVw2TyVja.', 0, 1, '$2y$10$4Jj3t0rOM/GiFDwXb/.rjuNUgSFnWC.iP0Y5hnrJg.UDKM.SfZLZq', 0, 1, NULL, NULL, NULL, '2018-09-28 18:17:24', '2018-10-12 09:09:15', NULL),
(12, 'Rizwan Shahid', 'rizwan@gmail.com', '3156733371', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$uulQQblneGyXeLVTsomqA.BDVJwccCTCgnkvoK1oHb8IdiKGtrHnW', 0, 1, '$2y$10$Tz2gJ/pKf6XZdX2oa5z/puFzESSHnUUXOs7wA1LMLpN7WT92tKBqm', 1, 1, NULL, NULL, NULL, '2018-09-30 07:42:42', '2018-10-11 07:31:11', NULL),
(13, 'Danish Khan', 'dk@test.com', '3040313389', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$SaDoqCIy9c.xXlHK0FcL1u8W2ufEpAVsdWK759A8qanxQ.aSYsIji', 0, 1, '$2y$10$R5Y339lkgpg7wPdyyATtgeBLg7.1Nhf07kNhZBz8gz0fibhlAsAgO', 1, 1, NULL, NULL, NULL, '2018-10-01 10:40:05', '2018-10-01 10:56:08', NULL),
(15, 'timna', 'ye@wo.con', '3456733371', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$HTFLfExe31hPEX0FSinyvOSUSSZJiyDPuHvozPTxWvx.S8JtjW/Wi', 0, 1, '$2y$10$1c9aqOiHPI9o3eTkrwkV5uKodhwMNV9WYL1tu8Klvk00qmgvKw0mC', 0, 1, NULL, NULL, NULL, '2018-10-07 16:56:20', '2018-10-07 16:56:20', NULL),
(16, 'But saab', 'but@f.com', '3216733371', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$NAz7zKYR80bOxTC8RE3PlOVJ3h5swlZhnS6PDG4aswfO6WfP3/9vq', 0, 1, '$2y$10$8wDgvqnOLXYS.olIMV0ZceITCWiykuab2XcXb8C43D6NYkKdolz/e', 1, 1, NULL, NULL, NULL, '2018-10-07 17:25:41', '2018-10-07 17:29:25', NULL),
(17, 'zeeshan', 'faisal@gmail.com', '3213693692', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$HbUPzq/LuXwwOUoxgiegmOs4y4Ovkg8ug0zRUUElQxY8EZnEje752', 0, 1, '$2y$10$7VZwG6qUqgjOK8L8zXLB4.wWoFo5EsiOot5yv/q9NnoXXtK8M36RC', 1, 1, NULL, NULL, NULL, '2018-10-08 09:01:41', '2018-10-08 09:08:18', NULL),
(18, 'Ok baby agy', 'faisal@f.com', '3572582502', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$GVuygXPqhHgyB9.u0jklmuR6veqYQaI/ZctnQQP0jKnkoOhax6jWu', 0, 1, '$2y$10$/b1Ili6Ynj.NS.poqTl0COwy7/WGJedMdRRs3sl98ayX1uCmpg57.', 0, 1, NULL, NULL, NULL, '2018-10-08 09:11:34', '2018-10-08 09:11:34', NULL),
(19, 'umair hamid', 'umair_hamid14400@yahoo.com', '32342259934', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$EMdy0av9q.8B3SM7lAZGI.uPnaSpqFZ.1pxAFisEERl6RmS3ELOPG', 0, 1, '$2y$10$.1yxxyA49VxHOCNf5QYNFelFxV0YkrXigzGmG9WlInG4WfZ5P8zIC', 0, 1, NULL, NULL, NULL, '2018-10-12 13:23:16', '2018-10-12 13:23:16', NULL),
(20, 'Danish Khan', 'faisal@hexa.com', '3156799999', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$JaJCeEvrPJCHupy0B2nYxeVqh9uWsayxYEgyr5wukJ7u1NxAX1IPa', 0, 1, '$2y$10$ihlj12szv4U0WyiJ.rp57.W6K0gOcZexOQWjRxsHwa/jcC6EglLgG', 1, 1, NULL, NULL, NULL, '2018-10-12 13:24:34', '2018-10-12 13:25:07', NULL),
(23, 'Zeeshan', 'faisal@kol.com', '3214148672', 92, NULL, NULL, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio tellus, ullamcorper non eleifend at, dignissim eu odio. Suspendisse a faucibus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. ', '$2y$10$ktzMSEyN85HXPQRYmdjvrObcZKsSjPsvoCSqNq06Bzj2JiLYWt6V6', 0, 1, '$2y$10$636OtCgk6T.JgarGGEELteU0LlYV144AvNh07vv4.wDeyQCacR49S', 1, 1, NULL, NULL, NULL, '2018-10-12 14:26:09', '2018-10-12 14:26:20', NULL),
(24, 'abubakar', 'danishaslam1123@gmail.com', '3338363501', 92, NULL, NULL, NULL, '$2y$10$inheTFHcoHnZEDzk5c030.UuQIlr7UEj6/DXvw3JyT.WVxzlU9icO', 0, 1, '$2y$10$/PvZe/XsLywWYupsrY6mMeLaaDttqvtM8IbFr90MKpEqsjFNPAYdS', 1, 1, NULL, NULL, NULL, '2018-10-12 22:28:01', '2018-10-12 22:28:16', NULL),
(25, 'Me Khan', 'maria@gmail.com', '3211515115', 92, '/public/lfm/avatars/5bc5ea5757202.jpg', NULL, NULL, '$2y$10$CgxayVG.ZJ1v95TqUg0aT.bvim8g1450BWTrCi7eO6XlXc2Ij4jH6', 0, 1, '$2y$10$m6fTNAE/wqjgZG7tBt84iOPZbnOngqkRPsALarAjjzm3vk/3GirEa', 1, 1, NULL, NULL, NULL, '2018-10-16 11:39:27', '2018-10-16 11:40:40', NULL),
(26, 'Ok baby', 'maria@gmail8.com', '3455656786', 92, NULL, NULL, NULL, '$2y$10$WhqK.uLEgtB9fWEv9OGKvOMiMAWRiTVfH60xmmFNIRrFEVaLPhs5C', 0, 1, '$2y$10$GRFQORz3bANhxeajyPGVR.2OQCeFQKeN3SK/DhavgNnyWuLvoS2dm', 1, 1, NULL, NULL, NULL, '2018-10-16 11:53:38', '2018-10-16 11:53:47', NULL),
(27, 'Ali Irshad', 'ali.irshad@yahoo.com', '3234455598', 92, NULL, NULL, NULL, '$2y$10$60K7WXHRSa5LeNaTqF4yMuuPKIARvQlLNL/CIjSfZbGx/zAzDBdS2', 0, 1, '$2y$10$8ItNmzuGeZkE1iW6FQ8yw.n20SbingNBhiJM5bsfGtnIL9zHEniRe', 1, 1, NULL, NULL, NULL, '2018-10-16 13:04:36', '2018-10-16 13:04:49', NULL),
(28, 'Danish aslam', 'danish@d.com', '3200313389', 92, NULL, NULL, NULL, '$2y$10$rZP5mgDcy1HqXtZ1bEC7JeeKAi0vHzDgkRdN/anj9C7sb7hXAZ25i', 0, 1, '$2y$10$gqPBgZ7HyCsHCp6oqAl9Be5l7YpzIqiGASjwCNL7Mi15XYKzqSUC2', 1, 1, NULL, NULL, NULL, '2018-10-17 08:02:01', '2018-10-17 08:02:44', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mc_conversation_user`
--
ALTER TABLE `mc_conversation_user`
  ADD CONSTRAINT `mc_conversation_user_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `mc_conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mc_conversation_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mc_messages`
--
ALTER TABLE `mc_messages`
  ADD CONSTRAINT `mc_messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `mc_conversations` (`id`),
  ADD CONSTRAINT `mc_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mc_message_notification`
--
ALTER TABLE `mc_message_notification`
  ADD CONSTRAINT `mc_message_notification_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `mc_conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mc_message_notification_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `mc_messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mc_message_notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cuisine_id_foreign` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD CONSTRAINT `rating_reviews_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD CONSTRAINT `usermeta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
