-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2013 at 10:53 AM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `om`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `parent_id` int(11) unsigned NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_image`, `parent_id`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'Cranes', 'Cranes', '', 0, 0, '2013-10-07 09:51:40', 1, '2013-10-07 09:51:40', 1),
(2, 'All Terrain Cranes', 'All Terrain Cranes', '1.png', 1, 0, '2013-10-07 09:51:40', 1, '2013-10-07 10:15:22', 1),
(3, 'Truck Mounted Cranes', 'Truck Mounted Cranes', '2.png', 1, 0, '2013-10-07 09:51:40', 1, '2013-10-07 10:16:04', 1),
(4, 'Rough Terrain Cranes', 'Rough Terrain Cranes', '3.png', 1, 0, '2013-10-07 09:51:40', 1, '2013-10-07 10:16:20', 1),
(5, 'Crawler Cranes', 'Crawler Cranes', '4.png', 1, 0, '2013-10-07 09:51:40', 1, '2013-10-07 10:16:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `conf_misc`
--

CREATE TABLE IF NOT EXISTS `conf_misc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `param` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  `field_type` varchar(150) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conf_misc`
--

INSERT INTO `conf_misc` (`id`, `title`, `param`, `value`, `field_type`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'Date Format', 'dateformat', 'y/m/d', 'dropDown', '2013-10-07 09:10:38', 1, '2013-10-07 09:10:38', 1),
(2, 'Smtp Email', 'smtp', 'y/m/d', 'dropDown', '2013-10-07 09:10:39', 1, '2013-10-07 09:10:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT NULL,
  `root_parent` int(11) NOT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `default_title` varchar(255) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT NULL,
  `is_assigned` enum('Yes','No') NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `min_permission` varchar(255) NOT NULL,
  `root_class` varchar(255) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `pid`, `root_parent`, `controller`, `action`, `default_title`, `user_title`, `is_assigned`, `weight`, `min_permission`, `root_class`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 0, 1, 'site', 'index', 'Home', 'Home', 'Yes', 3, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 0, 2, 'categories', 'index', 'Category', 'Category', 'Yes', 3, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 2, 'categories', 'index', 'List Sub Category', 'List Sub Category', 'Yes', 0, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 2, 'categories', 'create', 'Create Sub Category', 'Create Sub Category', 'Yes', 2, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 2, 2, 'categories', 'indexParent', 'List Category', 'List Category', 'Yes', 2, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 2, 2, 'categories', 'createParent', 'Create Category', 'Create Category', 'Yes', 2, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 0, 7, 'products', 'index', 'Product', 'Product', 'Yes', 3, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 7, 7, 'products', 'create', 'Create Product', 'Create Product', 'Yes', 2, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 7, 7, 'products', 'indexRental', 'List Rental Product', 'List Rental Product', 'Yes', 0, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 7, 7, 'products', 'indexTrading', 'List Sales Product', 'List Sales Product', 'Yes', 0, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 0, 10, 'productWanted', 'index', 'Wanted Product', 'Wanted Product', 'Yes', 3, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 11, 10, 'productWanted', 'index', 'List Wanted Product', 'List Wanted Product', 'Yes', 0, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 11, 10, 'productWanted', 'create', 'Create Wanted Product', 'Create Wanted Product', 'Yes', 2, 'View', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_service_type` enum('Sales','Rental') DEFAULT 'Sales',
  `product_name` varchar(50) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_overview` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_per_variable` varchar(200) DEFAULT NULL,
  `serial_number` varchar(200) DEFAULT NULL,
  `capacity` varchar(200) DEFAULT NULL,
  `status` enum('available','sold','comming soon') DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `crane_boom` decimal(10,2) DEFAULT NULL,
  `crane_jib` decimal(10,2) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_service_type`, `product_name`, `product_description`, `product_overview`, `price`, `price_per_variable`, `serial_number`, `capacity`, `status`, `year`, `crane_boom`, `crane_jib`, `slug`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 2, 'Rental', 'LTM1400', 'Cranse of High Flexiblities with high power', 'Cranse of High Flexiblities with high power', 4000.00, 'Day', '4700636', '400', 'sold', 2013, 50.00, 28.50, 'LTM1400', 0, '2013-10-07 10:14:06', 1, '2013-10-07 10:14:06', 1),
(2, 3, 'Sales', '12121212', 'Cranse of High Flexiblities with high power', 'Cranse of High Flexiblities with high power', 4000.00, '', '470066', '160', 'available', 0000, 0.00, 0.00, '12121212', 0, '2013-10-07 10:18:30', 1, '2013-10-07 10:18:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_small` varchar(100) NOT NULL,
  `image_detail` varchar(100) NOT NULL,
  `image_large` varchar(100) NOT NULL,
  `is_default` tinyint(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_images` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_small`, `image_detail`, `image_large`, `is_default`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 1, 'small_yqdo7ar4ow.jpg', '', 'yqdo7ar4ow.jpg', 1, 0, '2013-10-07 10:14:06', 1, '2013-10-07 10:17:01', 1),
(2, 1, 'small_hoocictp4m.jpg', 'detail_hoocictp4m.jpg', 'hoocictp4m.jpg', 0, 0, '2013-10-07 10:14:07', 1, '2013-10-07 10:14:07', 1),
(3, 2, 'small_05v0044wgs.jpg', 'detail_05v0044wgs.jpg', '05v0044wgs.jpg', 1, 0, '2013-10-07 10:18:30', 1, '2013-10-07 10:18:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_wanted`
--

CREATE TABLE IF NOT EXISTS `product_wanted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wanted_name` varchar(255) NOT NULL,
  `wanted_description` varchar(255) NOT NULL,
  `wanted_image` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1381121497),
('m130912_042608_add_table_user', 1381121498),
('m130912_045241_admin_user', 1381121498),
('m130912_051507_conf_misc', 1381121498),
('m130912_051535_adding_to_con_misc', 1381121499),
('m130912_052431_add_table_category', 1381121499),
('m130912_052442_add_table_product', 1381121499),
('m130912_052458_add_table_product_images', 1381121499),
('m130912_064925_add_relation_product_category', 1381121499),
('m130912_064944_add_relation_images_products', 1381121500),
('m130912_093632_add_menu_table', 1381121500),
('m130917_073030_handle_insert_categories', 1381121500),
('m130918_064902_add_new_attributes_product', 1381121501),
('m130919_110717_alter_column_servictype', 1381121502),
('m130919_110733_add_column_price', 1381121502),
('m130920_112427_add_column_price_per_variable', 1381121502),
('m130924_103809_alter_service_type', 1381121502),
('m130925_100017_add_table_cranes_wanted', 1381121503);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `type` enum('admin','non-admin') DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `ip_address`, `type`, `is_active`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', 'admin', 1, 0, '2013-10-07 09:10:38', 1, '2013-10-07 09:10:38', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
