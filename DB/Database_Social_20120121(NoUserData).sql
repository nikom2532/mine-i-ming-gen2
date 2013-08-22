-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2012 at 10:30 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a4579809_iMing`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_calendar_detail`
--

CREATE TABLE `social_iMing_calendar_detail` (
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

--
-- Dumping data for table `social_iMing_calendar_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_calendar_member`
--

CREATE TABLE `social_iMing_calendar_member` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(200) NOT NULL,
  `member` varchar(200) NOT NULL,
  `admin` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `social_iMing_calendar_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment`
--

CREATE TABLE `social_iMing_comment` (
  `comment_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `username_from` varchar(50) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `social_iMing_comment`
--

INSERT INTO `social_iMing_comment` VALUES(1, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00');
INSERT INTO `social_iMing_comment` VALUES(2, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00');
INSERT INTO `social_iMing_comment` VALUES(3, 'a', 'bbbb', 'ed<br>aa', '2011-10-20 00:45:25');
INSERT INTO `social_iMing_comment` VALUES(4, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 00:45:51');
INSERT INTO `social_iMing_comment` VALUES(5, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 01:32:17');
INSERT INTO `social_iMing_comment` VALUES(6, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 01:44:58');
INSERT INTO `social_iMing_comment` VALUES(7, 'a', 'bbbb', 'www', '0000-00-00 00:00:00');
INSERT INTO `social_iMing_comment` VALUES(8, 'a', 'bbbb', 'aa', '2011-10-20 03:06:55');
INSERT INTO `social_iMing_comment` VALUES(9, 'a', 'bbbb', '112233', '2011-10-16 23:16:43');
INSERT INTO `social_iMing_comment` VALUES(10, 'a', 'bbbb', '112233', '2011-10-16 23:22:05');
INSERT INTO `social_iMing_comment` VALUES(11, 'a', 'bbbb', '112233', '2011-10-16 23:23:39');
INSERT INTO `social_iMing_comment` VALUES(12, 'bbbb', 'bbbb', 'asd', '2011-10-16 23:25:12');
INSERT INTO `social_iMing_comment` VALUES(13, 'a', 'bbbb', 'ggg', '2011-10-20 00:43:09');
INSERT INTO `social_iMing_comment` VALUES(14, 'a', 'bbbb', 'ggg', '2011-10-20 00:43:15');
INSERT INTO `social_iMing_comment` VALUES(15, 'a', 'bbbb', 'aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee ', '2011-10-20 00:43:32');
INSERT INTO `social_iMing_comment` VALUES(16, 'a', 'bbbb', 'asdfasdf', '2011-10-20 00:25:22');
INSERT INTO `social_iMing_comment` VALUES(17, 'a', 'bbbb', 'asdfsdf', '2011-10-20 00:25:24');
INSERT INTO `social_iMing_comment` VALUES(18, 'a', 'bbbb', 'wef', '2011-10-20 00:25:27');
INSERT INTO `social_iMing_comment` VALUES(19, 'a', 'bbbb', 'ggg', '2011-10-20 03:20:27');
INSERT INTO `social_iMing_comment` VALUES(20, 'a', 'bbbb', 'ggg', '2011-10-20 03:20:27');
INSERT INTO `social_iMing_comment` VALUES(21, 'a', 'bbbb', 'wef', '2011-10-20 03:20:27');
INSERT INTO `social_iMing_comment` VALUES(23, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:41:49');
INSERT INTO `social_iMing_comment` VALUES(24, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:42:31');
INSERT INTO `social_iMing_comment` VALUES(25, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:42:49');
INSERT INTO `social_iMing_comment` VALUES(26, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:43:19');
INSERT INTO `social_iMing_comment` VALUES(27, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:43:20');
INSERT INTO `social_iMing_comment` VALUES(28, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:43:30');
INSERT INTO `social_iMing_comment` VALUES(29, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:43:43');
INSERT INTO `social_iMing_comment` VALUES(30, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:43:52');
INSERT INTO `social_iMing_comment` VALUES(31, 'a', 'bbbb', 'server is down !!', '2011-10-20 03:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_answer`
--

CREATE TABLE `social_iMing_comment_answer` (
  `answer_id` int(200) NOT NULL AUTO_INCREMENT,
  `question_id` int(200) NOT NULL,
  `username_from` varchar(200) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `social_iMing_comment_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_calendar`
--

CREATE TABLE `social_iMing_comment_calendar` (
  `comment_id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(100) NOT NULL,
  `calendar_id` int(200) NOT NULL,
  `comment_text` longtext NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `social_iMing_comment_calendar`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_comment_images`
--

CREATE TABLE `social_iMing_comment_images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `username_from` varchar(50) NOT NULL,
  `image_id` varchar(200) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `social_iMing_comment_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_activated`
--

CREATE TABLE `social_iMing_customer_activated` (
  `activate_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `activated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  KEY `activate_id` (`activate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `social_iMing_customer_activated`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_counts`
--

CREATE TABLE `social_iMing_customer_counts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `views` int(20) NOT NULL,
  `views_last_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `social_iMing_customer_counts`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_info`
--

CREATE TABLE `social_iMing_customer_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `social_iMing_customer_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_v3`
--

CREATE TABLE `social_iMing_customer_v3` (
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
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `social_iMing_customer_v3`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_friends`
--

CREATE TABLE `social_iMing_friends` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fnd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `social_iMing_friends`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_images`
--

CREATE TABLE `social_iMing_images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `image_album` varchar(50) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `social_iMing_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_message_box`
--

CREATE TABLE `social_iMing_message_box` (
  `message_id` int(200) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `username_send` varchar(100) NOT NULL,
  `username_receive` varchar(100) NOT NULL,
  `unread` varchar(1) NOT NULL COMMENT 'the result is only "y" and ""',
  `send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `social_iMing_message_box`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_message_data`
--

CREATE TABLE `social_iMing_message_data` (
  `data_id` int(200) NOT NULL AUTO_INCREMENT,
  `message_id` int(200) NOT NULL,
  `user` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `send_time_last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `social_iMing_message_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_answer`
--

CREATE TABLE `social_iMing_vote_answer` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `answer_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username_from`),
  KEY `comment_id` (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `social_iMing_vote_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_comment`
--

CREATE TABLE `social_iMing_vote_comment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `comment_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`),
  KEY `username` (`username_from`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `social_iMing_vote_comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_vote_images`
--

CREATE TABLE `social_iMing_vote_images` (
  `vote_id` int(200) NOT NULL AUTO_INCREMENT,
  `username_from` varchar(200) NOT NULL,
  `image_id` int(200) NOT NULL,
  `vote` int(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `social_iMing_vote_images`
--


