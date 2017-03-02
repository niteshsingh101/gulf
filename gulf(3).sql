-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 04:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gulf`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` bigint(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `description`, `featured_image`) VALUES
(0, 'test', '<p>test</p>\r\n', '1Digital-1-62.jpg'),
(0, 'test', '<p>dsfdsf</p>\r\n', '6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `page_metadata`
--

CREATE TABLE IF NOT EXISTS `page_metadata` (
  `id` bigint(10) NOT NULL,
  `page_id` bigint(20) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_metadata`
--

INSERT INTO `page_metadata` (`id`, `page_id`, `meta_key`, `meta_value`) VALUES
(0, 0, 'title_test', 'text'),
(0, 0, 'field_0', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sales_category`
--

CREATE TABLE IF NOT EXISTS `sales_category` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales_category`
--

INSERT INTO `sales_category` (`id`, `title`, `description`, `image`) VALUES
(1, 'CRANE SALES', '<p>Gulf Special Services has a large fleet of equipment, which is subject to regular maintenance programs, ?ensuring reliability and safety.<br />\r\n?You can find our used cranes for sale in this section.</p>\r\n', 'crane-sales-image_orig.jpg'),
(2, 'CRANE RENTAL', '<p>Gulf Special Services has a large fleet of cranes for rental. Bare rentals are available for any of the displayed cranes and we also offer a full rental service which includes transportation, operation and maintenance of the equipment.</p>\r\n', 'crane-rental-image_1_orig.jpg'),
(3, 'PARTS SALES', '<p>Gulf Special Services has an extensive assortment of crane parts available for sale on the yard. We can supply new and used parts to help reduce the costs of your project.</p>\r\n', 'parts-sales-image_orig.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales_content`
--

CREATE TABLE IF NOT EXISTS `sales_content` (
`id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_description` text NOT NULL,
  `content_image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales_content`
--

INSERT INTO `sales_content` (`id`, `content_title`, `content_description`, `content_image`, `cat_id`) VALUES
(1, 'Test', '<p>Test</p>\r\n', '1Digital-1-621.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_subcategory`
--

CREATE TABLE IF NOT EXISTS `sales_subcategory` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sales_subcategory`
--

INSERT INTO `sales_subcategory` (`id`, `title`, `description`, `image`, `parent_id`) VALUES
(1, 'CONSTRUCTION EQUIPMENT', '', 's797757267332704872_c9_i1_w640.jpeg', 1),
(2, 'AERIAL PLATFORMS', '<p>AERIAL PLATFORMS</p>\r\n', 's797757267332704872_c8_i1_w640.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
`id` int(3) NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `host_name` varchar(255) DEFAULT NULL,
  `db_name` varchar(255) DEFAULT NULL,
  `db_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `slider_image`) VALUES
(1, 'Title', '<p>test</p>\r\n', 'janchetana-1.png'),
(2, 'Title 2', '<p>tttttt</p>\r\n', '1Digital-1-621.jpg'),
(3, 'lllklkllk', '<p>llkkll</p>\r\n', '12.jpeg'),
(4, 'lllklkllk', '<p>kkkl</p>\r\n', '121.jpeg'),
(6, 'lkoj njh mkk ', '<p>kjjjkkj</p>\r\n', '16266220_10208322838408123_596288229238367103_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL COMMENT '1=>admin,2=>vendor,3=>user',
  `user_email` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `user_type`, `user_email`, `create_date`, `last_login_date`, `ip_address`) VALUES
(1, 'admin', 'admin', 1, '', '2017-01-19 00:00:00', NULL, '32134'),
(2, 'aditya', 'aditya', 2, 'rathi.aditya@rsystems.com', '2017-01-19 00:00:00', NULL, '321423'),
(3, 'nitesh', 'nitesh', 3, 'niteshsingh101@gmail.com', '2017-01-19 00:00:00', NULL, '3214'),
(17, 'tejsingh460', 'asdf', 2, 'tejsingh401@gmail.com', '2017-01-25 10:44:31', NULL, '::1'),
(18, 'krishna420', 'asdf', 2, 'krishna.gupta@rsystems.com', '2017-01-25 10:52:48', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
`id` bigint(10) NOT NULL,
  `user_id` int(5) DEFAULT NULL COMMENT 'it''s a reference key from user table as field id',
  `user_metakey` varchar(255) NOT NULL,
  `user_metavalue` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `user_metakey`, `user_metavalue`) VALUES
(1, 1, 'email', 'admin@gmail.com'),
(2, 2, 'email', 'aditya@gmail.com'),
(3, 2, 'phone', '454454'),
(4, 2, 'address', 'new ashok nagar e-263'),
(5, 1, 'user_type', '1'),
(6, 2, 'user_type', '2'),
(10, 17, 'name', 'Tej Bahadur Singh'),
(11, 17, 'address', '44c, Block-11, sector-73, Noida'),
(12, 17, 'phone', '9560914590'),
(13, 18, 'name', 'Krishna Gupta'),
(14, 18, 'address', 'Plot No: 226, G3, \r\nSector-4 , Vaishali\r\n'),
(15, 18, 'phone', '9560914590');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_category`
--
ALTER TABLE `sales_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_content`
--
ALTER TABLE `sales_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_subcategory`
--
ALTER TABLE `sales_subcategory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_category`
--
ALTER TABLE `sales_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales_content`
--
ALTER TABLE `sales_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales_subcategory`
--
ALTER TABLE `sales_subcategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
