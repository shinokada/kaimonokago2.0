-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2012 at 09:43 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kaimonokago20`
--

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_actions`
--

CREATE TABLE `be_acl_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `be_acl_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `be_acl_groups`
--

CREATE TABLE `be_acl_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL DEFAULT '0',
  `rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `be_acl_groups`
--

INSERT INTO `be_acl_groups` VALUES(1, 1, 6, 'Member', NULL);
INSERT INTO `be_acl_groups` VALUES(2, 4, 5, 'Administrator', NULL);
INSERT INTO `be_acl_groups` VALUES(3, 2, 3, 'demoadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permissions`
--

CREATE TABLE `be_acl_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aco_id` int(10) unsigned NOT NULL DEFAULT '0',
  `allow` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aro_id` (`aro_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `be_acl_permissions`
--

INSERT INTO `be_acl_permissions` VALUES(1, 2, 1, 'Y');
INSERT INTO `be_acl_permissions` VALUES(3, 1, 24, 'Y');
INSERT INTO `be_acl_permissions` VALUES(4, 1, 27, 'N');
INSERT INTO `be_acl_permissions` VALUES(5, 1, 6, 'N');
INSERT INTO `be_acl_permissions` VALUES(6, 1, 3, 'N');
INSERT INTO `be_acl_permissions` VALUES(7, 1, 12, 'N');
INSERT INTO `be_acl_permissions` VALUES(8, 3, 24, 'Y');
INSERT INTO `be_acl_permissions` VALUES(9, 3, 12, 'N');
INSERT INTO `be_acl_permissions` VALUES(10, 3, 28, 'Y');
INSERT INTO `be_acl_permissions` VALUES(11, 3, 36, 'Y');
INSERT INTO `be_acl_permissions` VALUES(12, 3, 1, 'Y');
INSERT INTO `be_acl_permissions` VALUES(13, 3, 3, 'N');
INSERT INTO `be_acl_permissions` VALUES(14, 1, 32, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permission_actions`
--

CREATE TABLE `be_acl_permission_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_id` int(10) unsigned NOT NULL DEFAULT '0',
  `axo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `allow` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_id` (`access_id`),
  KEY `axo_id` (`axo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `be_acl_permission_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `be_acl_resources`
--

CREATE TABLE `be_acl_resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL DEFAULT '0',
  `rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `be_acl_resources`
--

INSERT INTO `be_acl_resources` VALUES(1, 1, 76, 'Site', NULL);
INSERT INTO `be_acl_resources` VALUES(2, 56, 75, 'Control Panel', NULL);
INSERT INTO `be_acl_resources` VALUES(3, 57, 74, 'System', NULL);
INSERT INTO `be_acl_resources` VALUES(4, 68, 69, 'Members', NULL);
INSERT INTO `be_acl_resources` VALUES(5, 58, 67, 'Access Control', NULL);
INSERT INTO `be_acl_resources` VALUES(6, 70, 71, 'Settings', NULL);
INSERT INTO `be_acl_resources` VALUES(7, 72, 73, 'Utilities', NULL);
INSERT INTO `be_acl_resources` VALUES(8, 65, 66, 'Permissions', NULL);
INSERT INTO `be_acl_resources` VALUES(9, 63, 64, 'Groups', NULL);
INSERT INTO `be_acl_resources` VALUES(10, 61, 62, 'Resources', NULL);
INSERT INTO `be_acl_resources` VALUES(11, 59, 60, 'Actions', NULL);
INSERT INTO `be_acl_resources` VALUES(12, 26, 55, 'General', 0);
INSERT INTO `be_acl_resources` VALUES(13, 53, 54, 'Calendar', 0);
INSERT INTO `be_acl_resources` VALUES(14, 51, 52, 'Category', 0);
INSERT INTO `be_acl_resources` VALUES(15, 49, 50, 'Customers', 0);
INSERT INTO `be_acl_resources` VALUES(16, 47, 48, 'Menus', 0);
INSERT INTO `be_acl_resources` VALUES(17, 45, 46, 'Messages', 0);
INSERT INTO `be_acl_resources` VALUES(18, 43, 44, 'Orders', 0);
INSERT INTO `be_acl_resources` VALUES(19, 41, 42, 'Pages', 0);
INSERT INTO `be_acl_resources` VALUES(20, 39, 40, 'Products', 0);
INSERT INTO `be_acl_resources` VALUES(21, 37, 38, 'Subscribers', 0);
INSERT INTO `be_acl_resources` VALUES(22, 35, 36, 'Admins', 0);
INSERT INTO `be_acl_resources` VALUES(23, 33, 34, 'Filemanager', 0);
INSERT INTO `be_acl_resources` VALUES(24, 18, 25, 'Customer Support', 0);
INSERT INTO `be_acl_resources` VALUES(25, 23, 24, 'Purchase Support', 0);
INSERT INTO `be_acl_resources` VALUES(26, 21, 22, 'Customer Record', 0);
INSERT INTO `be_acl_resources` VALUES(27, 19, 20, 'Customers Admin', 0);
INSERT INTO `be_acl_resources` VALUES(28, 12, 17, 'Project Panel', 0);
INSERT INTO `be_acl_resources` VALUES(29, 15, 16, 'Project Spec', 0);
INSERT INTO `be_acl_resources` VALUES(30, 13, 14, 'Project Home', 0);
INSERT INTO `be_acl_resources` VALUES(32, 9, 10, 'Customer booking', 0);
INSERT INTO `be_acl_resources` VALUES(33, 7, 8, 'Bookings', 0);
INSERT INTO `be_acl_resources` VALUES(34, 3, 4, 'Courses', 0);
INSERT INTO `be_acl_resources` VALUES(35, 5, 6, 'Trainers', 0);
INSERT INTO `be_acl_resources` VALUES(36, 2, 11, 'Fitness', 0);
INSERT INTO `be_acl_resources` VALUES(37, 31, 32, 'Multi languages', 0);
INSERT INTO `be_acl_resources` VALUES(38, 29, 30, 'Slideshow', 0);
INSERT INTO `be_acl_resources` VALUES(39, 27, 28, 'Playroom', 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_groups`
--

CREATE TABLE `be_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `be_groups`
--

INSERT INTO `be_groups` VALUES(1, 1, 0);
INSERT INTO `be_groups` VALUES(2, 1, 0);
INSERT INTO `be_groups` VALUES(3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_preferences`
--

CREATE TABLE `be_preferences` (
  `name` varchar(254) CHARACTER SET latin1 NOT NULL,
  `value` text CHARACTER SET latin1 NOT NULL,
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_preferences`
--

INSERT INTO `be_preferences` VALUES('default_user_group', '1');
INSERT INTO `be_preferences` VALUES('smtp_host', '');
INSERT INTO `be_preferences` VALUES('keep_error_logs_for', '30');
INSERT INTO `be_preferences` VALUES('email_protocol', 'sendmail');
INSERT INTO `be_preferences` VALUES('use_registration_captcha', '0');
INSERT INTO `be_preferences` VALUES('page_debug', '0');
INSERT INTO `be_preferences` VALUES('automated_from_name', 'admin@gmail.com');
INSERT INTO `be_preferences` VALUES('allow_user_registration', '1');
INSERT INTO `be_preferences` VALUES('use_login_captcha', '0');
INSERT INTO `be_preferences` VALUES('site_name', 'Kaimonokago 2.0');
INSERT INTO `be_preferences` VALUES('automated_from_email', 'admin@gmail.com');
INSERT INTO `be_preferences` VALUES('account_activation_time', '7');
INSERT INTO `be_preferences` VALUES('allow_user_profiles', '1');
INSERT INTO `be_preferences` VALUES('activation_method', 'email');
INSERT INTO `be_preferences` VALUES('autologin_period', '30');
INSERT INTO `be_preferences` VALUES('min_password_length', '4');
INSERT INTO `be_preferences` VALUES('smtp_user', '');
INSERT INTO `be_preferences` VALUES('smtp_pass', '');
INSERT INTO `be_preferences` VALUES('email_mailpath', '/usr/sbin/sendmail');
INSERT INTO `be_preferences` VALUES('smtp_port', '25');
INSERT INTO `be_preferences` VALUES('smtp_timeout', '5');
INSERT INTO `be_preferences` VALUES('email_wordwrap', '1');
INSERT INTO `be_preferences` VALUES('email_wrapchars', '76');
INSERT INTO `be_preferences` VALUES('email_mailtype', 'text');
INSERT INTO `be_preferences` VALUES('email_charset', 'utf-8');
INSERT INTO `be_preferences` VALUES('bcc_batch_mode', '0');
INSERT INTO `be_preferences` VALUES('bcc_batch_size', '200');
INSERT INTO `be_preferences` VALUES('login_field', 'email');
INSERT INTO `be_preferences` VALUES('main_module_name', 'welcome');
INSERT INTO `be_preferences` VALUES('categories_parent_id', '1');
INSERT INTO `be_preferences` VALUES('admin_email', 'admin@gmail.com');
INSERT INTO `be_preferences` VALUES('webshop_slideshow', 'coinslider');
INSERT INTO `be_preferences` VALUES('slideshow_two', 'none');
INSERT INTO `be_preferences` VALUES('playroom_parent_id', '10');
INSERT INTO `be_preferences` VALUES('calendar', '1');
INSERT INTO `be_preferences` VALUES('category', '1');
INSERT INTO `be_preferences` VALUES('customers', '1');
INSERT INTO `be_preferences` VALUES('filemanager', '1');
INSERT INTO `be_preferences` VALUES('languages', '1');
INSERT INTO `be_preferences` VALUES('menus', '1');
INSERT INTO `be_preferences` VALUES('messages', '1');
INSERT INTO `be_preferences` VALUES('orders', '1');
INSERT INTO `be_preferences` VALUES('pages', '1');
INSERT INTO `be_preferences` VALUES('products', '1');
INSERT INTO `be_preferences` VALUES('slideshow', '1');
INSERT INTO `be_preferences` VALUES('subscribers', '1');
INSERT INTO `be_preferences` VALUES('multi_language', '0');
INSERT INTO `be_preferences` VALUES('website_language', 'english');
INSERT INTO `be_preferences` VALUES('security_method', 'question');
INSERT INTO `be_preferences` VALUES('security_question', '3+5=');
INSERT INTO `be_preferences` VALUES('security_answer', '8');
INSERT INTO `be_preferences` VALUES('ga_tracking', '');
INSERT INTO `be_preferences` VALUES('ga_profile', '');
INSERT INTO `be_preferences` VALUES('ga_email', '');
INSERT INTO `be_preferences` VALUES('ga_password', '');
INSERT INTO `be_preferences` VALUES('dashboard_rss', 'http://www.digg.com/rss/indexdig.xml');
INSERT INTO `be_preferences` VALUES('dashboard_rss_count', '10');
INSERT INTO `be_preferences` VALUES('company_name', '');
INSERT INTO `be_preferences` VALUES('company_address', '');
INSERT INTO `be_preferences` VALUES('frontend_multi_language', '1');
INSERT INTO `be_preferences` VALUES('company_post', '123-4567');
INSERT INTO `be_preferences` VALUES('company_city', 'Kobe');
INSERT INTO `be_preferences` VALUES('company_country', 'Japan');
INSERT INTO `be_preferences` VALUES('company_organization_number', '992591412');
INSERT INTO `be_preferences` VALUES('company_telephone', '+ 81 1122 3344');
INSERT INTO `be_preferences` VALUES('company_mobile', '');
INSERT INTO `be_preferences` VALUES('company_other_one', 'The contents of website are the copyright of Kaimonokago © 2012. All rights reserved.  Web: Okada Design AS');
INSERT INTO `be_preferences` VALUES('company_other_two', '');
INSERT INTO `be_preferences` VALUES('category_menu_id', '16, 22');
INSERT INTO `be_preferences` VALUES('lilly_fairies_submenu_id', '1');
INSERT INTO `be_preferences` VALUES('parentid_other_illust', '27');
INSERT INTO `be_preferences` VALUES('quicksand_colorbox_cat_id', '11');
INSERT INTO `be_preferences` VALUES('sharethis_pub_key', '');
INSERT INTO `be_preferences` VALUES('sharethis_direction', 'vertical');
INSERT INTO `be_preferences` VALUES('sharethis_services', 'facebook, twitter, yahoo, email, sharethis, plusone');
INSERT INTO `be_preferences` VALUES('sharethis_size', 'large');
INSERT INTO `be_preferences` VALUES('other_work_main', '');
INSERT INTO `be_preferences` VALUES('customer_registration', '0');
INSERT INTO `be_preferences` VALUES('twittername', '');
INSERT INTO `be_preferences` VALUES('twittercount', '10');

-- --------------------------------------------------------

--
-- Table structure for table `be_resources`
--

CREATE TABLE `be_resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `be_resources`
--

INSERT INTO `be_resources` VALUES(1, 1);
INSERT INTO `be_resources` VALUES(2, 1);
INSERT INTO `be_resources` VALUES(3, 1);
INSERT INTO `be_resources` VALUES(4, 1);
INSERT INTO `be_resources` VALUES(5, 1);
INSERT INTO `be_resources` VALUES(6, 1);
INSERT INTO `be_resources` VALUES(7, 1);
INSERT INTO `be_resources` VALUES(8, 1);
INSERT INTO `be_resources` VALUES(9, 1);
INSERT INTO `be_resources` VALUES(10, 1);
INSERT INTO `be_resources` VALUES(11, 1);
INSERT INTO `be_resources` VALUES(12, 0);
INSERT INTO `be_resources` VALUES(13, 0);
INSERT INTO `be_resources` VALUES(14, 0);
INSERT INTO `be_resources` VALUES(15, 0);
INSERT INTO `be_resources` VALUES(16, 0);
INSERT INTO `be_resources` VALUES(17, 0);
INSERT INTO `be_resources` VALUES(18, 0);
INSERT INTO `be_resources` VALUES(19, 0);
INSERT INTO `be_resources` VALUES(20, 0);
INSERT INTO `be_resources` VALUES(21, 0);
INSERT INTO `be_resources` VALUES(22, 0);
INSERT INTO `be_resources` VALUES(23, 0);
INSERT INTO `be_resources` VALUES(24, 0);
INSERT INTO `be_resources` VALUES(25, 0);
INSERT INTO `be_resources` VALUES(26, 0);
INSERT INTO `be_resources` VALUES(27, 0);
INSERT INTO `be_resources` VALUES(28, 0);
INSERT INTO `be_resources` VALUES(29, 0);
INSERT INTO `be_resources` VALUES(30, 0);
INSERT INTO `be_resources` VALUES(32, 0);
INSERT INTO `be_resources` VALUES(33, 0);
INSERT INTO `be_resources` VALUES(34, 0);
INSERT INTO `be_resources` VALUES(35, 0);
INSERT INTO `be_resources` VALUES(36, 0);
INSERT INTO `be_resources` VALUES(37, 0);
INSERT INTO `be_resources` VALUES(38, 0);
INSERT INTO `be_resources` VALUES(39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_users`
--

CREATE TABLE `be_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group` int(10) unsigned DEFAULT NULL,
  `activation_key` varchar(32) DEFAULT NULL,
  `last_visit` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `group` (`group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `be_users`
--

INSERT INTO `be_users` VALUES(1, 'admin', '0993abd18b04dce02cafde93878540f109592da5', 'admin@gmail.com', 1, 2, NULL, '2012-03-17 20:33:13', '2012-02-22 13:46:09', '2012-03-17 21:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `be_user_profiles`
--

CREATE TABLE `be_user_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `web_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `be_user_profiles`
--

INSERT INTO `be_user_profiles` VALUES(1, '', '', '', '', '', '', 0);
INSERT INTO `be_user_profiles` VALUES(14, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `eventcal`
--

CREATE TABLE `eventcal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL DEFAULT 'anonimous',
  `user_id` int(25) NOT NULL,
  `eventDate` date DEFAULT NULL,
  `eventTitle` varchar(100) DEFAULT NULL,
  `eventContent` text,
  `privacy` enum('public','private') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `eventcal`
--

INSERT INTO `eventcal` VALUES(2, 'shinokada', 8, '2011-05-17', '17th May', 'Hurray', 'public');
INSERT INTO `eventcal` VALUES(8, 'shinokada', 8, '2011-05-18', 'test', 'test', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `omc_category`
--

CREATE TABLE `omc_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metadesc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `metakeyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `shortdesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `lang_id` int(2) unsigned NOT NULL,
  `table_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `omc_category`
--

INSERT INTO `omc_category` VALUES(1, 'English category', '', '', '', '', 'active', NULL, 0, 0, 1);
INSERT INTO `omc_category` VALUES(2, 'Books', '', '', '', '', 'active', 40, 1, 0, 2);
INSERT INTO `omc_category` VALUES(5, 'Japanese category', '', '', '', '', 'active', NULL, 0, 1, 1);
INSERT INTO `omc_category` VALUES(7, 'Meditation', 'Meditation in English', '', '', '', 'active', 30, 1, 0, 7);
INSERT INTO `omc_category` VALUES(9, 'Mountain', '', '', '', '', 'active', 10, 1, 0, 9);
INSERT INTO `omc_category` VALUES(11, 'River', '', '', '', '', 'active', 25, 1, 0, 11);
INSERT INTO `omc_category` VALUES(13, '山', 'Fjell p&aring; Norsk', '', '', '', 'active', 10, 5, 1, 9);
INSERT INTO `omc_category` VALUES(14, 'Elv', 'elv', '', '', '', 'active', 25, 5, 1, 11);
INSERT INTO `omc_category` VALUES(15, '瞑想', '瞑想', '', '', '', 'active', 30, 5, 1, 7);
INSERT INTO `omc_category` VALUES(16, 'Alver', 'Alver', '', '', '', 'active', 40, 5, 1, 2);
INSERT INTO `omc_category` VALUES(17, 'Angels', 'Angels in english', '', '', '', 'active', 35, 1, 0, 17);
INSERT INTO `omc_category` VALUES(19, '天使', 'Engler', '', '', '', 'active', 35, 5, 1, 17);
INSERT INTO `omc_category` VALUES(20, 'Magic', 'Magic desc.', '', '', '', 'active', 55, 1, 0, 20);
INSERT INTO `omc_category` VALUES(23, 'Ocean', 'Ocean desc', '', '', '', 'active', 70, 1, 0, 23);
INSERT INTO `omc_category` VALUES(24, 'マジック', '', '<p>Content</p>', '', '', 'active', NULL, 5, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `omc_colors`
--

CREATE TABLE `omc_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_colors`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_customer`
--

CREATE TABLE `omc_customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(10) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` int(10) unsigned NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_email`
--

CREATE TABLE `omc_email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `msg2` text COLLATE utf8_unicode_ci NOT NULL,
  `msg3` text COLLATE utf8_unicode_ci NOT NULL,
  `msg4` text COLLATE utf8_unicode_ci NOT NULL,
  `sendto` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `omc_email`
--

INSERT INTO `omc_email` VALUES(7, 'testing email', '<p>testing email here.</p>', '', '', '', '1_admin@gmail.com', '2012-03-09 22:08:56');
INSERT INTO `omc_email` VALUES(9, 'sending blue', '<p>hahah</p>', '', '', '', '1_admin@gmail.com', '2012-03-10 08:43:21');
INSERT INTO `omc_email` VALUES(10, 'sendig agagi ', '<p>haha djh asdjfh</p>', '', '', '', '1_admin@gmail.com', '2012-03-10 08:44:19');
INSERT INTO `omc_email` VALUES(11, 'test', '<p>test</p>', '', '', '', '1_admin@gmail.com,3_test@gmail.com', '2012-03-16 21:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `omc_emailtemplate`
--

CREATE TABLE `omc_emailtemplate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `default` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `omc_emailtemplate`
--

INSERT INTO `omc_emailtemplate` VALUES(1, 'default', 1);
INSERT INTO `omc_emailtemplate` VALUES(2, 'bluenote', 0);
INSERT INTO `omc_emailtemplate` VALUES(5, 'greenbear', 0);
INSERT INTO `omc_emailtemplate` VALUES(7, 'redhat', 0);
INSERT INTO `omc_emailtemplate` VALUES(9, 'redrose', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omc_languages`
--

CREATE TABLE `omc_languages` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `langname` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `omc_languages`
--

INSERT INTO `omc_languages` VALUES(1, 'japanese', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `omc_menus`
--

CREATE TABLE `omc_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortdesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `lang_id` int(2) unsigned NOT NULL,
  `page_uri_id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `omc_menus`
--

INSERT INTO `omc_menus` VALUES(1, 'English menu', '', 'active', 0, 0, 0, 0, 0);
INSERT INTO `omc_menus` VALUES(2, 'Home', '', 'active', 1, 10, 0, 1, 0);
INSERT INTO `omc_menus` VALUES(5, 'Japanese menu', '', 'active', 0, 0, 1, 0, 1);
INSERT INTO `omc_menus` VALUES(6, 'ネットショップ', '', 'active', 5, 10, 1, 6, 2);
INSERT INTO `omc_menus` VALUES(8, 'Contact', '', 'active', 1, 30, 0, 7, 0);
INSERT INTO `omc_menus` VALUES(9, 'お問い合わせ', '', 'active', 5, 30, 1, 8, 8);
INSERT INTO `omc_menus` VALUES(10, 'About Us', '', 'active', 1, 40, 0, 3, 0);
INSERT INTO `omc_menus` VALUES(11, 'セシリアについて', '', 'active', 5, 40, 1, 4, 10);
INSERT INTO `omc_menus` VALUES(12, 'Service', '', 'active', 1, 60, 0, 17, 0);
INSERT INTO `omc_menus` VALUES(14, 'サービス', '', 'active', 5, 60, 1, 18, 12);
INSERT INTO `omc_menus` VALUES(15, 'About shop', '', 'active', 10, 10, 0, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `omc_messages`
--

CREATE TABLE `omc_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_order`
--

CREATE TABLE `omc_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_order_item`
--

CREATE TABLE `omc_order_item` (
  `order_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_order_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_pages`
--

CREATE TABLE `omc_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `metakeyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `metadesc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `lang_id` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `omc_pages`
--

INSERT INTO `omc_pages` VALUES(1, 'Home', '', '', '', '', 'welcome', '<p>Content for home page. Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque? Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 0);
INSERT INTO `omc_pages` VALUES(3, 'About', '', '', '', '', 'about', '<p>About us.</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 0);
INSERT INTO `omc_pages` VALUES(4, 'セシリアについて', '', '', '', '', 'about', '<p>セシリアは</p>\n<p>Tempor! <a href="http://bbc.com">Parturient ac</a> sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 1);
INSERT INTO `omc_pages` VALUES(6, 'ホーム', '', '', '', '', 'welcome', '<p>Forsiden p&aring; norsk</p>', 'active', 1);
INSERT INTO `omc_pages` VALUES(7, 'Contact', '', '', '', '', 'contact_us', '', 'active', 0);
INSERT INTO `omc_pages` VALUES(8, 'お問い合わせ', '', '', '', '', 'contact_us', '<p>Kontakt oss</p>', 'active', 1);
INSERT INTO `omc_pages` VALUES(17, 'Service', '', '', '', '', 'service', '<p>service content</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 0);
INSERT INTO `omc_pages` VALUES(18, 'サービス', '', '', '', '', 'service', '<p>サービス</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 1);
INSERT INTO `omc_pages` VALUES(20, 'Shopping guide', '', '', '', '', 'guide', '<p>Shopping guide content.</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>\n<p>Natoque? Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.<br /><br /></p>', 'active', 0);
INSERT INTO `omc_pages` VALUES(21, 'ショッピングガイド', '', '', '', '', 'guide', '<p>ショッピングガイド</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.</p>', 'active', 1);
INSERT INTO `omc_pages` VALUES(22, 'About shop', '', '', '', '', 'about_shop', '<p>Content for About shop.</p>', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omc_products`
--

CREATE TABLE `omc_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` int(1) NOT NULL,
  `shortdesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_order` int(11) unsigned DEFAULT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grouping` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `featured` enum('none','front','webshop') COLLATE utf8_unicode_ci NOT NULL,
  `other_feature` enum('none','most sold','new product') COLLATE utf8_unicode_ci NOT NULL,
  `price` float(7,2) NOT NULL,
  `lang_id` int(2) unsigned NOT NULL,
  `table_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `omc_products`
--

INSERT INTO `omc_products` VALUES(1, 'Fairy', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>\n<p>Natoque? Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim.</p>\n<p>Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.</p>', '<p><img src="../../../../assets/images/cd/thumbnails/114x207_11.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/cd/242x440_11.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 2, 'webshop', 'most sold', 200.00, 0, 1);
INSERT INTO `omc_products` VALUES(2, '妖精', 1, '', '<p>妖精</p>\n<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing? Natoque?</p>\n<p>Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim. Dis odio enim nec.</p>\n<p>Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.</p>', '<p><img src="../../../../assets/images/cd/thumbnails/114x207_11.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/cd/242x440_11.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 16, 'webshop', 'most sold', 40.00, 1, 1);
INSERT INTO `omc_products` VALUES(3, 'Meditation', 1, 'meditation ', '', '<p><img src="../../../../assets/images/books/thumbnails/114x207_6.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/books/242x440_6.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 7, 'webshop', 'most sold', 400.00, 0, 3);
INSERT INTO `omc_products` VALUES(4, '瞑想', 1, '<p>medtation en</p>', '', '<p><img src="../../../../assets/images/books/thumbnails/114x207_6.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/books/242x440_6.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 15, 'webshop', 'most sold', 700.00, 1, 3);
INSERT INTO `omc_products` VALUES(5, 'Kawa', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>\n<p>Natoque? Aliquet ut, platea lacus in! Tempor hac placerat magna massa dignissim egestas turpis nec sed! Elementum in. Etiam magnis dictumst? Pulvinar mid facilisis mid enim.</p>\n<p>Dis odio enim nec. Odio in vel? Parturient vel eros! In, etiam etiam vel, pulvinar tortor, diam etiam tristique urna, porttitor habitasse, tincidunt aliquet tristique in tristique nunc mid in, rhoncus ac lacus placerat, nec urna in dis, urna et rhoncus lectus? Rhoncus nisi auctor arcu scelerisque, nec ut scelerisque.</p>', '<p><img src="../../../../assets/images/cd/thumbnails/114x207_12.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/cd/242x440_12.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 11, 'webshop', 'new product', 30.00, 0, 5);
INSERT INTO `omc_products` VALUES(8, '川', 1, '', '', '<p><img src="../../../../assets/images/cd/thumbnails/114x207_12.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/cd/242x440_12.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 14, 'webshop', 'most sold', 340.00, 1, 5);
INSERT INTO `omc_products` VALUES(9, 'Blue angels', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>', '<p><img src="../../../assets/images/books/thumbnails/114x207_6.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/books/242x440_6.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 17, 'webshop', 'most sold', 0.00, 0, 9);
INSERT INTO `omc_products` VALUES(10, '青い妖精', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>', '<p><img src="../../../assets/images/books/thumbnails/114x207_6.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/books/242x440_6.jpg" alt="" width="242" height="440" /></p>', 0, '', '', 'active', 19, 'webshop', 'most sold', 340.00, 1, 9);
INSERT INTO `omc_products` VALUES(11, 'Hello everyone', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>', '<p><img src="../../../assets/images/books/thumbnails/114x207_13.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/books/242x440_13.jpg" alt="" width="242" height="440" /></p>', 50, '', '', 'active', 7, 'webshop', 'most sold', 40.00, 0, 11);
INSERT INTO `omc_products` VALUES(12, 'Hi på deg', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet, adipiscing?</p>', '<p><img src="../../../assets/images/books/thumbnails/114x207_13.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/books/242x440_13.jpg" alt="" width="242" height="440" /></p>', 50, '', '', 'active', 15, 'webshop', 'most sold', 340.00, 1, 11);
INSERT INTO `omc_products` VALUES(13, 'Mt Fuji', 1, '', '', '<p><img src="../../../../assets/images/books/thumbnails/114x207_14.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/books/242x440_14.jpg" alt="" width="242" height="440" /></p>', 60, '', '', 'active', 9, 'webshop', 'none', 50.00, 0, 13);
INSERT INTO `omc_products` VALUES(14, 'Mt Fuji', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing.</p>', '<p><img src="../../../../assets/images/books/thumbnails/114x207_14.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../../assets/images/books/242x440_14.jpg" alt="" width="242" height="440" /></p>', 60, '', '', 'active', 13, 'webshop', 'none', 230.00, 1, 13);
INSERT INTO `omc_products` VALUES(15, 'Go Harry', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet,</p>', '<p><img src="../../../assets/images/cd/thumbnails/114x207_11.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/cd/242x440_11.jpg" alt="" width="242" height="440" /></p>', 80, '', '', 'active', 20, 'webshop', 'most sold', 50.00, 0, 15);
INSERT INTO `omc_products` VALUES(16, 'Gå Harry', 1, '', '<p>Tempor! Parturient ac sit! Aliquam dapibus, ut eros sit ac augue eu pulvinar adipiscing vel scelerisque, magnis aliquet dis diam sociis! Proin sit facilisis et et, integer, in, diam integer sit ridiculus dapibus rhoncus odio ultricies platea magnis tincidunt nec urna adipiscing, aliquet,</p>', '<p><img src="../../../assets/images/cd/thumbnails/114x207_11.jpg" alt="" width="114" height="207" /></p>', '<p><img src="../../../assets/images/cd/242x440_11.jpg" alt="" width="242" height="440" /></p>', 80, '', '', 'active', 7, 'webshop', 'most sold', 220.00, 1, 15);
INSERT INTO `omc_products` VALUES(17, 'Amazon river', 1, '', '<p>Long desc</p>', '', '', 70, '', '', 'active', 11, 'none', 'none', 0.00, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `omc_product_colors`
--

CREATE TABLE `omc_product_colors` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `omc_product_colors`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_product_sizes`
--

CREATE TABLE `omc_product_sizes` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `omc_product_sizes`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_sizes`
--

CREATE TABLE `omc_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `omc_sizes`
--


-- --------------------------------------------------------

--
-- Table structure for table `omc_slideshow`
--

CREATE TABLE `omc_slideshow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortdesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_order` int(11) unsigned DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `featured` enum('none','front','webshop') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `omc_slideshow`
--

INSERT INTO `omc_slideshow` VALUES(1, 'big_tree.jpg', '<p>slide 1</p>', '', '', '<p><img src="../../../../assets/images/frontpage/big_tree.jpg" alt="" width="516" height="200" /></p>', 10, 'active', 'none');
INSERT INTO `omc_slideshow` VALUES(2, 'build.jpg', '<p>slide2 desc</p>', '', '', '<p><img src="../../../../assets/images/frontpage/build.jpg" alt="" width="516" height="200" /></p>', 20, 'active', 'none');
INSERT INTO `omc_slideshow` VALUES(6, 'station.jpg', '', '', '', '<p><img src="../../../../assets/images/frontpage/station.jpg" alt="" width="516" height="200" /></p>', 30, 'active', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `omc_subscribers`
--

CREATE TABLE `omc_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `omc_subscribers`
--

INSERT INTO `omc_subscribers` VALUES(1, 'shin', 'admin@gmail.com');
INSERT INTO `omc_subscribers` VALUES(3, 'sokada', 'test1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE `shoutbox` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'anonimous',
  `user_id` int(25) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` enum('to do','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'to do',
  `privacy` enum('public','private') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shoutbox`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `be_acl_permissions`
--
ALTER TABLE `be_acl_permissions`
  ADD CONSTRAINT `be_acl_permissions_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `be_acl_permissions_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_acl_permission_actions`
--
ALTER TABLE `be_acl_permission_actions`
  ADD CONSTRAINT `be_acl_permission_actions_ibfk_1` FOREIGN KEY (`access_id`) REFERENCES `be_acl_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `be_acl_permission_actions_ibfk_2` FOREIGN KEY (`axo_id`) REFERENCES `be_acl_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_groups`
--
ALTER TABLE `be_groups`
  ADD CONSTRAINT `be_groups_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_resources`
--
ALTER TABLE `be_resources`
  ADD CONSTRAINT `be_resources_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_users`
--
ALTER TABLE `be_users`
  ADD CONSTRAINT `be_users_ibfk_1` FOREIGN KEY (`group`) REFERENCES `be_acl_groups` (`id`) ON DELETE SET NULL;
