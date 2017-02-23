-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 07:49 PM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Sales & Rentals');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
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
