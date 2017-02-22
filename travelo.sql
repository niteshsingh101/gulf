-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 10:38 AM
-- Server version: 5.1.73-community
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travelo`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getPhone`(`ids` INT(4)) RETURNS varchar(255) CHARSET latin1
    NO SQL
BEGIN

DECLARE phones varchar(255);

select user_metavalue INTO phones FROM user_meta where user_id=ids and user_metakey='phone';
 
 RETURN phones;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getUserName`(`ids` INT(4)) RETURNS varchar(255) CHARSET latin1
    NO SQL
begin 

DECLARE uname varchar(255);

SELECT user_metavalue into uname from user_meta where user_id=ids and user_metakey='name';


RETURN uname;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` bigint(10) NOT NULL,
  `user_id` bigint(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booking_meta`
--

CREATE TABLE IF NOT EXISTS `booking_meta` (
  `id` bigint(10) NOT NULL,
  `booking_id` bigint(10) DEFAULT NULL COMMENT 'it''s a refrence key from table booking with field id',
  `room_id` varchar(255) DEFAULT NULL COMMENT 'it''s an reference key for table room with field id',
  `booking_metakey` varchar(255) DEFAULT NULL,
  `booking_metavalue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_meta`
--

INSERT INTO `booking_meta` (`id`, `booking_id`, `room_id`, `booking_metakey`, `booking_metavalue`) VALUES
(1, 1, '1', 'checkin_date', '3244'),
(2, 1, '1', 'checkout_date', '3123'),
(4, 1, '1', 'booking_price', '300'),
(5, 1, '1', 'room_id', '1'),
(6, 1, '1', 'total_booking_price', '300');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint(4) NOT NULL,
  `state_id` int(4) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(3) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` bigint(10) NOT NULL,
  `hotel_title` varchar(255) DEFAULT NULL,
  `hotels_desc` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_title`, `hotels_desc`) VALUES
(1, 'Hilton', 'Hilton hotel is five star hotel');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_comments`
--

CREATE TABLE IF NOT EXISTS `hotel_comments` (
  `id` bigint(10) NOT NULL,
  `hotel_id` bigint(10) DEFAULT NULL COMMENT 'it''s an reference key for table hotel with field id',
  `user_id` bigint(10) DEFAULT NULL COMMENT 'it''s an reference key for table user with field id',
  `comment` text,
  `rate` int(1) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_meta`
--

CREATE TABLE IF NOT EXISTS `hotel_meta` (
  `id` bigint(10) NOT NULL,
  `hotel_id` int(10) DEFAULT NULL,
  `hotel_metakey` varchar(255) DEFAULT NULL,
  `hotel_metavalue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_meta`
--

INSERT INTO `hotel_meta` (`id`, `hotel_id`, `hotel_metakey`, `hotel_metavalue`) VALUES
(1, 1, 'vendor_id', '2'),
(9, 1, 'image', 'dsahd.jpg'),
(10, 1, 'feature_image', 'dsahd.jpg'),
(11, 1, 'hotel_country', 'india'),
(12, 1, 'hotel_state', 'delhi'),
(13, 1, 'hotel_city', 'delhi'),
(14, 1, 'hotel_pin', '34234'),
(15, 1, 'longnitude_latitude', '342,34');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(10) NOT NULL,
  `hotel_id` bigint(10) DEFAULT NULL COMMENT 'its as an refrence key from table hotel with field id',
  `room_title` varchar(255) DEFAULT NULL,
  `booking_status` int(2) DEFAULT '0' COMMENT '0=>not booked,1=>booked'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `room_title`, `booking_status`) VALUES
(1, 1, 'Standard Family Room', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_comments`
--

CREATE TABLE IF NOT EXISTS `room_comments` (
  `id` bigint(10) NOT NULL,
  `room_id` bigint(10) DEFAULT NULL COMMENT 'it''s an reference key for table room with field id',
  `user_id` bigint(10) DEFAULT NULL COMMENT 'it''s an reference key for table user with field id',
  `comment` text,
  `rate` int(1) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_meta`
--

CREATE TABLE IF NOT EXISTS `room_meta` (
  `id` bigint(10) NOT NULL,
  `room_id` bigint(10) DEFAULT NULL,
  `room_metakey` varchar(255) DEFAULT NULL,
  `room_metavalue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_meta`
--

INSERT INTO `room_meta` (`id`, `room_id`, `room_metakey`, `room_metavalue`) VALUES
(1, 1, 'max_guests', '3'),
(2, 1, 'max_kids', '2'),
(3, 1, 'regular_price', '300'),
(4, 1, 'discount', '0'),
(5, 1, 'image', 'dsad.jpg'),
(6, 1, 'feature_image', 'dsad.jpg'),
(7, 1, 'old_prices', '100,200');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(4) NOT NULL,
  `country_id` int(3) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_meta`
--
ALTER TABLE `booking_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_meta`
--
ALTER TABLE `hotel_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_comments`
--
ALTER TABLE `room_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_meta`
--
ALTER TABLE `room_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_meta`
--
ALTER TABLE `booking_meta`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_meta`
--
ALTER TABLE `hotel_meta`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `room_comments`
--
ALTER TABLE `room_comments`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_meta`
--
ALTER TABLE `room_meta`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
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
