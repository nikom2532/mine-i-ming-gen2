-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2012 at 10:10 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i-Ming`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_calendar_detail`
--

CREATE TABLE IF NOT EXISTS `social_iMing_calendar_detail` (
  `calendar_id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `regis_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`calendar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_calendar_member`
--

CREATE TABLE IF NOT EXISTS `social_iMing_calendar_member` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(200) NOT NULL,
  `member` varchar(200) NOT NULL,
  `admin` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment`
--

CREATE TABLE IF NOT EXISTS `social_iMing_comment` (
  `comment_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `username_from` varchar(50) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `social_iMing_comment`
--

INSERT INTO `social_iMing_comment` (`comment_id`, `username`, `username_from`, `comment_text`, `post_time`) VALUES
(1, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00'),
(2, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00'),
(3, 'a', 'bbbb', 'ed<br>aa', '2011-10-19 17:45:25'),
(4, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-19 17:45:51'),
(5, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-19 18:32:17'),
(6, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-19 18:44:58'),
(7, 'a', 'bbbb', 'www', '0000-00-00 00:00:00'),
(8, 'a', 'bbbb', 'aa', '2011-10-19 20:06:55'),
(9, 'a', 'bbbb', '112233', '2011-10-16 16:16:43'),
(10, 'a', 'bbbb', '112233', '2011-10-16 16:22:05'),
(11, 'a', 'bbbb', '112233', '2011-10-16 16:23:39'),
(12, 'bbbb', 'bbbb', 'asd', '2011-10-16 16:25:12'),
(13, 'a', 'bbbb', 'ggg', '2011-10-19 17:43:09'),
(14, 'a', 'bbbb', 'ggg', '2011-10-19 17:43:15'),
(15, 'a', 'bbbb', 'aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee ', '2011-10-19 17:43:32'),
(16, 'a', 'bbbb', 'asdfasdf', '2011-10-19 17:25:22'),
(17, 'a', 'bbbb', 'asdfsdf', '2011-10-19 17:25:24'),
(18, 'a', 'bbbb', 'wef', '2011-10-19 17:25:27'),
(19, 'a', 'bbbb', 'ggg', '2011-10-19 20:20:27'),
(20, 'a', 'bbbb', 'ggg', '2011-10-19 20:20:27'),
(21, 'a', 'bbbb', 'wef', '2011-10-19 20:20:27'),
(23, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:41:49'),
(24, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:42:31'),
(25, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:42:49'),
(26, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:43:19'),
(27, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:43:20'),
(28, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:43:30'),
(29, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:43:43'),
(30, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:43:52'),
(31, 'a', 'bbbb', 'server is down !!', '2011-10-19 20:44:03'),
(148, 'nikom2532', 'nikom2532', 'test', '2012-09-07 03:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_answer`
--

CREATE TABLE IF NOT EXISTS `social_iMing_comment_answer` (
  `answer_id` int(200) NOT NULL AUTO_INCREMENT,
  `question_id` int(200) NOT NULL,
  `username_from` varchar(200) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_calendar`
--

CREATE TABLE IF NOT EXISTS `social_iMing_comment_calendar` (
  `comment_id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(100) NOT NULL,
  `calendar_id` int(200) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_images`
--

CREATE TABLE IF NOT EXISTS `social_iMing_comment_images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `username_from` varchar(50) NOT NULL,
  `image_id` varchar(200) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_activated`
--

CREATE TABLE IF NOT EXISTS `social_iMing_customer_activated` (
  `activate_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `activated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  KEY `activate_id` (`activate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_counts`
--

CREATE TABLE IF NOT EXISTS `social_iMing_customer_counts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `views` int(20) NOT NULL,
  `views_last_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social_iMing_customer_counts`
--

INSERT INTO `social_iMing_customer_counts` (`id`, `username`, `views`, `views_last_time`, `comments`) VALUES
(1, 'nikom2532', 0, '2012-07-26 09:15:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_info`
--

CREATE TABLE IF NOT EXISTS `social_iMing_customer_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `profile_picture_id` int(200) NOT NULL,
  `Hometown` varchar(100) NOT NULL,
  `Religion` varchar(50) NOT NULL,
  `Languages` varchar(50) NOT NULL,
  `intro` longtext NOT NULL,
  `web` varchar(300) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social_iMing_customer_info`
--

INSERT INTO `social_iMing_customer_info` (`id`, `username`, `profile_picture_id`, `Hometown`, `Religion`, `Languages`, `intro`, `web`) VALUES
(1, 'nikom2532', 88, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_v3`
--

CREATE TABLE IF NOT EXISTS `social_iMing_customer_v3` (
  `userID` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sex` char(1) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `regis_date` datetime NOT NULL,
  `regis_ip` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_login` datetime NOT NULL,
  `enable` char(1) CHARACTER SET utf8 NOT NULL,
  `admin` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social_iMing_customer_v3`
--

INSERT INTO `social_iMing_customer_v3` (`userID`, `username`, `password`, `name`, `sex`, `birthday`, `email`, `address`, `regis_date`, `regis_ip`, `last_login`, `enable`, `admin`) VALUES
(1, 'nikom2532', '936f0cc0a26ebc758d134a0e98f08079', 'Arming Huang', 'm', '1989-01-14', 'nikom2532@NikomS-ThinkPad-R400', '941 Lasalle Rd., Bangna', '2012-07-26 16:15:26', '192.168.140.109', '2012-09-18 17:17:52', 'y', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_friends`
--

CREATE TABLE IF NOT EXISTS `social_iMing_friends` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fnd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_images`
--

CREATE TABLE IF NOT EXISTS `social_iMing_images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `image_album` varchar(50) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `social_iMing_images`
--

INSERT INTO `social_iMing_images` (`id`, `username`, `image_album`, `url`, `record_date`) VALUES
(79, 'nikom2532', 'photos', 'user_1346917763.2946__SSL10858[4-2].JPG', '2012-09-06 07:49:23'),
(80, 'nikom2532', 'Profile Picture', 'nikom2532_1347612548_/tmp/php8BBU3V.jpg', '2012-09-14 08:49:08'),
(81, 'nikom2532', 'Profile Picture', '1_13476172619581_/tmp/phpF1M7kE.jpg', '2012-09-14 10:07:42'),
(82, 'nikom2532', 'Profile Picture', '1_13476187989916.jpg', '2012-09-14 10:33:19'),
(83, 'nikom2532', 'Profile Picture', '1_13476219069727.jpg', '2012-09-14 11:25:07'),
(84, 'nikom2532', 'Profile Picture', '1_13478729326511.jpg', '2012-09-17 09:08:52'),
(85, 'nikom2532', 'Profile Picture', '1_13478821847312.jpg', '2012-09-17 11:43:04'),
(86, 'nikom2532', 'Profile Picture', '1_13478823163873.jpg', '2012-09-17 11:45:16'),
(87, 'nikom2532', 'Profile Picture', '1_13478824489443.jpg', '2012-09-17 11:47:28'),
(88, 'nikom2532', 'Profile Picture', '1_13479523950860.jpg', '2012-09-18 07:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_message_box`
--

CREATE TABLE IF NOT EXISTS `social_iMing_message_box` (
  `message_id` int(200) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `username_send` varchar(100) NOT NULL,
  `username_receive` varchar(100) NOT NULL,
  `unread` varchar(1) NOT NULL COMMENT 'the result is only "y" and ""',
  `send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `social_iMing_message_box`
--

INSERT INTO `social_iMing_message_box` (`message_id`, `subject`, `username_send`, `username_receive`, `unread`, `send_time`) VALUES
(18, 'test', 'nikom2532', 'nikom2532', '', '2012-07-26 09:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_message_data`
--

CREATE TABLE IF NOT EXISTS `social_iMing_message_data` (
  `data_id` int(200) NOT NULL AUTO_INCREMENT,
  `message_id` int(200) NOT NULL,
  `user` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `send_time_last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `social_iMing_message_data`
--

INSERT INTO `social_iMing_message_data` (`data_id`, `message_id`, `user`, `message`, `send_time_last`) VALUES
(19, 18, 'nikom2532', 'test', '2012-07-26 09:27:39'),
(20, 18, 'nikom2532', 'ทดลอง', '2012-07-26 09:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_answer`
--

CREATE TABLE IF NOT EXISTS `social_iMing_vote_answer` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `answer_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username_from`),
  KEY `comment_id` (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_comment`
--

CREATE TABLE IF NOT EXISTS `social_iMing_vote_comment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `comment_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`),
  KEY `username` (`username_from`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_images`
--

CREATE TABLE IF NOT EXISTS `social_iMing_vote_images` (
  `vote_id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `image_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
