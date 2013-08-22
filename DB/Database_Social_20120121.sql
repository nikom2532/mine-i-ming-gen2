-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2012 at 10:09 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
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

--
-- Dumping data for table `social_iMing_calendar_detail`
--

INSERT INTO `social_iMing_calendar_detail` (`calendar_id`, `title`, `address`, `detail`, `avatar`, `time_start`, `time_end`, `regis_date`) VALUES
(2, '1', '', '1', '', '2010-11-29 00:00:00', '2015-01-01 00:00:00', '2011-11-29 03:03:35'),
(10, '6', '6', '6', '', '2011-12-22 00:00:00', '2012-01-05 00:00:00', '2011-11-29 04:15:30'),
(7, '3', '3', '3', '', '2011-11-29 16:47:00', '2012-11-29 16:50:00', '2011-11-29 03:09:49'),
(8, '4', '4', '4', '', '2011-11-30 22:31:00', '2012-11-30 22:36:00', '2011-11-29 03:09:24'),
(9, '5', '5', '5', '', '2011-12-05 23:45:00', '2011-12-05 23:56:00', '2011-11-28 16:44:43'),
(11, 'a', 'home', '1', '', '2012-01-08 12:52:00', '2012-01-08 12:55:00', '2012-01-08 10:18:53');

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

--
-- Dumping data for table `social_iMing_calendar_member`
--

INSERT INTO `social_iMing_calendar_member` (`id`, `calendar_id`, `member`, `admin`) VALUES
(1, 2, 'bbb1', 'y'),
(9, 10, 'bbb1', 'y'),
(6, 7, 'bbb1', 'y'),
(7, 8, 'bbb1', 'y'),
(8, 9, 'bbb1', 'y'),
(10, 11, 'bbb1', 'y');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `social_iMing_comment`
--

INSERT INTO `social_iMing_comment` (`comment_id`, `username`, `username_from`, `comment_text`, `post_time`) VALUES
(1, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00'),
(2, 'ansv', 'bbbb', 'erg', '0000-00-00 00:00:00'),
(3, 'a', 'bbbb', 'ed<br>aa', '2011-10-20 04:45:25'),
(4, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 04:45:51'),
(5, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 05:32:17'),
(6, 'a', 'bbbb', 'sdfg\r\nerg\r\ngggggg', '2011-10-20 05:44:58'),
(7, 'a', 'bbbb', 'www', '0000-00-00 00:00:00'),
(8, 'a', 'bbbb', 'aa', '2011-10-20 07:06:55'),
(9, 'a', 'bbbb', '112233', '2011-10-17 03:16:43'),
(10, 'a', 'bbbb', '112233', '2011-10-17 03:22:05'),
(11, 'a', 'bbbb', '112233', '2011-10-17 03:23:39'),
(12, 'bbbb', 'bbbb', 'asd', '2011-10-17 03:25:12'),
(13, 'a', 'bbbb', 'ggg', '2011-10-20 04:43:09'),
(14, 'a', 'bbbb', 'ggg', '2011-10-20 04:43:15'),
(15, 'a', 'bbbb', 'aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee aaaaaaaaaa aaaaaaaaaa aaaaaaaee ', '2011-10-20 04:43:32'),
(16, 'a', 'bbbb', 'asdfasdf', '2011-10-20 04:25:22'),
(17, 'a', 'bbbb', 'asdfsdf', '2011-10-20 04:25:24'),
(18, 'a', 'bbbb', 'wef', '2011-10-20 04:25:27'),
(19, 'a', 'bbbb', 'ggg', '2011-10-20 07:20:27'),
(20, 'a', 'bbbb', 'ggg', '2011-10-20 07:20:27'),
(21, 'a', 'bbbb', 'wef', '2011-10-20 07:20:27'),
(23, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:41:49'),
(24, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:42:31'),
(25, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:42:49'),
(26, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:43:19'),
(27, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:43:20'),
(28, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:43:30'),
(29, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:43:43'),
(30, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:43:52'),
(31, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:44:03'),
(32, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:44:08'),
(33, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:44:14'),
(34, 'a', 'bbbb', 'server is down !!', '2011-10-20 07:44:20'),
(35, 'ansv', 'bbbb', 'HELLO WORLD', '2011-10-20 09:16:45'),
(41, 'bbbb', 'bbbb', 'sef', '2011-10-20 10:33:34'),
(42, 'bbbb', 'bbbb', 'eee', '2011-10-20 10:33:36'),
(43, 'bbbb', 'bbbb', 'aa', '2011-10-20 10:33:40'),
(44, 'bbbb', 'bbbb', 'asdf', '2011-10-20 10:39:38'),
(45, 'bbbb', 'bbbb', 'sss', '2011-10-20 10:39:40'),
(46, 'bbbb', 'bbbb', 'aaasssddd', '2011-10-20 10:39:44'),
(47, 'bbbb', 'bbbb', 'aaasssddd', '2011-10-20 11:51:16'),
(52, 'bbbb', 'bbbb', 'sss', '2011-10-20 12:11:04'),
(53, 'bbbb', 'bbbb', 'ssss', '2011-10-20 12:11:14'),
(54, 'bbbb', 'bbbb', 'ssss', '2011-10-20 12:13:07'),
(55, 'bbbb', 'bbbb', 'ss', '2011-10-20 12:13:11'),
(56, 'bbbb', 'bbbb', 'dr', '2011-10-20 12:13:15'),
(57, 'bbbb', 'bbbb', 'drg', '2011-10-20 12:13:25'),
(58, 'a', 'bbbb', 'hello', '2011-10-22 09:31:01'),
(59, 'TG009', 'bbbb', 'hello !', '2011-10-22 09:31:16'),
(60, 'a', 'bbbb', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2011-10-31 07:54:09'),
(61, 'a', 'bbbb', '1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 ', '2011-10-31 08:20:56'),
(62, 'a', 'bbbb', '1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 ', '2011-10-31 08:23:21'),
(63, 'a', 'bbbb', '1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 ', '2011-10-31 08:23:22'),
(64, 'a', 'bbbb', 'a', '2011-10-31 08:44:13'),
(65, 'a', 'bbbb', 'aw', '2011-10-31 08:49:38'),
(114, 'bbb2', 'bbb1', '1-2', '2011-11-13 18:40:12'),
(115, 'bbb3', 'bbb1', '1-3', '2011-11-13 18:40:16'),
(116, 'a', 'bbb2', '2-a', '2011-11-13 18:43:20'),
(71, 'a', 'bbb1', 'hello world', '2011-11-01 05:04:48'),
(72, 'a', 'bbb1', 'a', '2011-11-01 05:36:53'),
(117, 'bbb1', 'bbb1', 'a', '2011-11-16 12:12:37'),
(137, 'bbb1', 'bbb1', 'DIV Popup for the OnmouseOver Event<br />\r\nhttp://houstoniantech.com/howto/OnmouseOverShowDIV.aspx', '2011-12-11 07:36:24'),
(131, 'bbb1', 'bbb1', 's', '2011-12-05 06:40:35'),
(122, 'bbb1', 'bbb1', 'sss', '2011-12-01 15:36:14'),
(123, 'bbb2', 'bbb1', 'aaa', '2011-12-01 15:36:26'),
(124, 'bbb2', 'bbb1', 'rr', '2011-12-01 15:39:27'),
(125, 'bbb2', 'bbb1', 'asdf', '2011-12-01 15:51:52'),
(126, 'bbb2', 'bbb1', 'asdff', '2011-12-01 15:51:58'),
(127, 'bbb2', 'bbb1', 'qwer', '2011-12-01 15:55:53'),
(128, 'bbb2', 'bbb1', 'qwerr', '2011-12-01 15:56:28'),
(113, 'bbb1', 'bbb1', '1-1', '2011-11-13 18:40:07'),
(110, 'bbb3', 'bbb2', '2-3', '2011-11-13 18:38:44'),
(111, 'bbb3', 'bbb3', '3-3', '2011-11-13 18:38:56'),
(112, 'bbb2', 'bbb3', '3-2', '2011-11-13 18:39:04'),
(108, 'bbb2', 'bbb2', '2-2', '2011-11-13 18:38:21'),
(109, 'bbb1', 'bbb2', '2-1', '2011-11-13 18:38:38'),
(136, 'bbb1', 'bbb1', 'Text Blocks Over Image<br />\r\nby: Chris Coyier<br />\r\nhttp://css-tricks.com/3118-text-blocks-over-image/', '2011-12-11 05:08:21'),
(141, 'bbb1', 'bbb1', 'How to set up a mail server on a GNU / Linux system<br />\r\nflurdy.com/docs/postfix/', '2011-12-15 08:33:25'),
(143, 'bbb2', 'bbb1', 'hello', '2012-01-08 10:19:33');

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

--
-- Dumping data for table `social_iMing_comment_answer`
--

INSERT INTO `social_iMing_comment_answer` (`answer_id`, `question_id`, `username_from`, `comment_text`, `post_time`) VALUES
(5, 122, 'bbb1', 'we', '2011-12-05 02:58:40'),
(7, 117, 'bbb1', 'fff', '2011-12-05 06:49:55'),
(8, 122, 'bbb1', 'aaa', '2011-12-05 07:25:25'),
(9, 0, 'bbb1', 'asdf', '2011-12-05 09:15:22'),
(10, 0, 'bbb1', 'wsefe', '2011-12-05 09:15:26'),
(11, 0, 'bbb1', 'sergse', '2011-12-05 09:15:29'),
(12, 0, 'bbb1', '', '2011-12-05 09:20:28'),
(13, 0, 'bbb1', 'sdfs', '2011-12-05 09:20:35'),
(14, 0, 'bbb1', 'ss', '2011-12-05 09:20:37'),
(15, 0, 'bbb1', 'werf', '2011-12-05 09:20:42'),
(16, 0, 'bbb1', 'sefwsef', '2011-12-05 09:38:51'),
(17, 0, 'bbb1', 'sef', '2011-12-05 09:39:48'),
(18, 0, 'bbb1', 'dd', '2011-12-05 09:40:30'),
(61, 131, 'bbb1', 'asdfw1111', '2011-12-07 17:00:22'),
(60, 131, 'bbb1', '1234566', '2011-12-07 16:59:21'),
(59, 131, 'bbb1', '1234', '2011-12-07 16:58:40'),
(58, 131, 'bbb1', 'asasasas', '2011-12-07 16:55:29'),
(57, 131, 'bbb1', 'srg', '2011-12-07 16:53:20'),
(56, 131, 'bbb1', 'drg', '2011-12-07 16:53:01'),
(55, 131, 'bbb1', 'sf', '2011-12-07 16:43:40'),
(54, 131, 'bbb1', 'sdf', '2011-12-07 16:34:10'),
(52, 113, 'bbb1', 'SDFG', '2011-12-05 15:32:45'),
(53, 131, 'bbb1', 'asdf', '2011-12-07 14:43:31'),
(62, 141, 'bbb1', '42', '2012-01-08 10:15:55'),
(63, 141, 'bbb1', '43', '2012-01-08 10:16:15'),
(64, 143, 'bbb2', 'hele', '2012-01-08 10:20:00');

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

--
-- Dumping data for table `social_iMing_comment_calendar`
--

INSERT INTO `social_iMing_comment_calendar` (`comment_id`, `username_from`, `calendar_id`, `comment_text`, `post_time`) VALUES
(1, '1', 1, '1', '2011-11-29 09:20:33'),
(2, '1', 1, '1', '2011-11-29 09:21:26'),
(3, 'bbb1', 7, 'sf', '2011-11-29 09:43:20'),
(5, 'bbb1', 7, 'd', '2011-11-29 09:44:30'),
(6, 'bbb1', 8, 'f', '2011-11-29 09:58:04'),
(7, 'bbb1', 7, 's', '2011-11-29 10:16:41');

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

--
-- Dumping data for table `social_iMing_comment_images`
--

INSERT INTO `social_iMing_comment_images` (`id`, `username`, `username_from`, `image_id`, `comment`, `post_time`) VALUES
(79, 'bbb1', 'bbb1', '42', 'eee', '2011-12-12 12:44:54'),
(78, 'bbb1', 'bbb1', '42', 'sss', '2011-12-12 12:44:53'),
(77, 'bbb1', 'bbb1', '42', 'sdf', '2011-12-12 12:44:51'),
(76, 'bbb1', 'bbb1', '42', 'a', '2011-12-12 12:44:49'),
(75, 'bbb1', 'bbb1', '42', 'a', '2011-12-12 12:34:35'),
(74, 'bbb1', 'bbb1', '73', 'aa', '2011-12-12 12:29:04'),
(72, 'bbb1', 'bbb1', '49', 'a', '2011-12-12 12:27:04'),
(70, 'bbb1', 'bbb1', '49', 'a', '2011-12-12 12:24:22'),
(71, 'bbb1', 'bbb1', '49', 'aa', '2011-12-12 12:26:20');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `social_iMing_customer_activated`
--

INSERT INTO `social_iMing_customer_activated` (`activate_id`, `username`, `code`, `activated_time`) VALUES
(8, 'ming2', 'bfd9f4ab38f3aab737733e098850d7938c6a18ae6c991fe85d9fcaea917f71fbdc9e384e', '2011-12-23 14:22:48');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `social_iMing_customer_counts`
--

INSERT INTO `social_iMing_customer_counts` (`id`, `username`, `views`, `views_last_time`, `comments`) VALUES
(1, 'bbb3', 0, '2011-11-07 07:53:44', 0),
(2, 'bbb2', 0, '2011-11-07 10:47:23', 0),
(3, 'bbb1', 0, '2011-11-07 10:47:58', 0),
(8, 'ming', 0, '2011-12-23 14:16:12', 0),
(9, 'ming2', 0, '2011-12-23 14:22:48', 0),
(10, 'nikom2532', 0, '2012-01-16 18:13:21', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `social_iMing_customer_info`
--

INSERT INTO `social_iMing_customer_info` (`id`, `username`, `profile_picture_id`, `Hometown`, `Religion`, `Languages`, `intro`, `web`) VALUES
(3, 'bbb2', 55, '', '', '', '', ''),
(2, 'bbb1', 46, '1d', '1', '1ffg', 'My names is Nikom Suwankamol i am studying B.Sc.Computer S\r\nter Science(Inter) @KMITL. im interesting : C++,OpenGL,Java,\r\nJava,MATLAB,Web Development:PHP,MySQL,js,AJAX,JSF,NoSQL:Cass\r\n:Cassandra, Basketball,Korean&Taiwan&Thai TV-Series. ', 'http://www.nikom2532.co.cc'),
(5, 'bbb3', 0, '', '', '', '', ''),
(10, 'ming', 0, '', '', '', '', ''),
(11, 'ming2', 0, '', '', '', '', ''),
(12, 'nikom2532', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_customer_v3`
--

CREATE TABLE IF NOT EXISTS `social_iMing_customer_v3` (
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

INSERT INTO `social_iMing_customer_v3` (`username`, `password`, `name`, `sex`, `birthday`, `email`, `address`, `regis_date`, `regis_ip`, `last_login`, `enable`, `admin`) VALUES
('ansv', '1234', 'Anonj', 'm', '2008-09-09', 'ansv@thai.com', 'sdfsdfsdf', '2009-12-02 23:47:40', '127.0.0.1', '2010-02-12 10:23:57', 'y', 'y'),
('adder', '1234', '5555', 'm', '2010-01-01', 'a1@a.com', '111', '2010-01-31 22:41:28', '58.8.103.85', '2010-03-31 17:57:37', 'y', 'y'),
('TG006', '083271', 'นันทวุฒิ แซเผือก', 'm', '1993-12-03', 'm@a.com', '79 หมู่ 4 ต.เกาะเทโพ อ.เมือง จ.อุทัยธานี', '2010-02-12 09:57:39', '118.172.197.180', '2010-02-12 11:01:57', 'y', ''),
('TG008', '1234', 'พิษณุ  พูลสวัสดิ์', 'm', '1995-02-09', 'notnum@thaimail.com', '25/3ม.3ต.เกาะเทโพอ.เมืองจ.อุทัยธานี', '2010-02-12 09:58:05', '118.172.197.180', '2010-02-12 11:02:50', 'y', ''),
('TG002', '1234', 'สายธาร ม่วงวัง', 'f', '1994-07-12', 'a2@a.com', '35 หมู่5 ต.เกาะเทโพ อ.เมือง จ.อุทัยธานี', '2010-02-12 09:59:32', '118.172.197.180', '2010-02-12 11:03:13', 'y', ''),
('TG005', '1234', 'ณัฐวุฒิ    ชุรินทร์', 'm', '1996-01-08', 'n@a.com', '100ม.4ต.เกาะเทโพอ.เมืองจ.อุทัยธานี', '2010-02-12 09:59:37', '118.172.197.180', '2010-02-12 11:02:06', 'y', ''),
('TG007', '082396', 'โกสีย์    ถมยา', 'm', '1995-04-05', 'aodlovepim@live.com', 'การประปาส่วนภูมิภาคเกาะเทโพ ต.เกาะเทโพ  อ.เมือง   จ.อุทัยธานี', '2010-02-12 09:59:36', '118.172.197.180', '2010-02-12 10:59:51', 'y', ''),
('TG001', '1234', 'ปบมพงศ์  ขวัญบาง', 'm', '1994-11-08', 'z@a', '9 หมู่ 4 ต.เกาะเทโพ อ.เมือง จ.อุทัยธานี', '2010-02-12 10:02:00', '118.172.197.180', '2010-02-12 11:02:03', 'y', ''),
('TG0010', '1234', 'สุกัญญา    แขวงเพ็ชร', 'f', '1997-01-11', 's@acom', '76 ม.4 ต.เกาะเทโพอ.เมือง จ.อุทัยธานี', '2010-02-12 10:00:15', '118.172.197.180', '2010-02-12 11:02:13', 'y', ''),
('TG003', '1234', 'ณัชชา    โป๊ะแสง', 'f', '1995-05-07', 'o@a.com', '53/1ม.4 ต.เกาะเทโท อ.อุทัยธานี', '2010-02-12 09:59:35', '118.172.197.180', '2010-02-12 11:04:08', 'y', ''),
('TG009', '1234', 'จันทิมา  สุขเทพ', 'f', '1997-05-16', 'u@a.com', '52ม.6ต.เกาะเทโพอ.เมืองจ.อุทัยธานี', '2010-02-12 10:00:26', '118.172.197.180', '2010-02-12 11:08:53', 'y', ''),
('a', 'a', 'a', 'm', '2010-01-01', 'a3@a.com', '1 a', '2010-03-31 11:27:33', '127.0.0.1', '2010-04-02 15:05:41', 'y', ''),
('bbbb', 'bbbb', 'b', 'm', '2010-01-01', 'b@b.com', 'b', '2010-04-02 18:07:02', '127.0.0.1', '2011-10-31 23:34:05', 'y', ''),
('cccc', 'cccc', 'c', 'm', '2010-01-01', 'c@c.com', 'c', '2010-04-04 00:51:25', '127.0.0.1', '0000-00-00 00:00:00', 'y', ''),
('nikom2532', 'd1afba43e29074ad8fd43bd651ee4723', 'nikom', 'm', '1989-01-14', 'nikom2532@leftpc.example.com', '941 Lasalle St., Bangna, Bangna', '2012-01-17 01:13:21', '192.168.1.100', '2012-01-17 01:17:06', 'y', ''),
('bbb2', 'f92bde18dfedae4a4c36a5ec6df63c46', 'bbb2', 'm', '2011-11-28', 'a4@a.com', '1', '2011-11-01 01:53:05', '::1', '2012-01-08 17:19:45', 'y', ''),
('bbb1', '4635b11f50e3f192a6e917b655a948ff', 'bbb1', 'm', '2011-01-02', 'aa@a.com', '1', '2011-11-01 00:34:27', '::1', '2012-01-21 20:49:10', 'y', 'y'),
('bbb3', '6d609217908007d1be298f2f7ecfa875', 'bbb3', 'm', '2011-12-01', 'a6@a.com', '1', '2011-11-07 14:53:44', '::1', '2011-12-11 23:04:06', 'y', ''),
('ming', 'b59c67bf196a4758191e42f76670ceba', 'ming', 'm', '1989-01-14', 'nikom2532-@leftpc.example.com', '941', '2011-12-23 21:16:12', '192.168.1.33', '2011-12-23 21:19:21', 'y', ''),
('ming2', 'b59c67bf196a4758191e42f76670ceba', 'ming', 'm', '2011-01-01', 'nikom2532@gmail.com', '941', '2011-12-23 21:22:48', '127.0.0.1', '2011-12-23 21:22:48', 'n', '');

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

--
-- Dumping data for table `social_iMing_friends`
--

INSERT INTO `social_iMing_friends` (`id`, `username`, `fnd`) VALUES
(1, 'a', 'bbbb'),
(2, 'a', 'TG009'),
(3, 'bbbb', 'ansv'),
(4, 'bbbb', 'a'),
(5, 'a', 'aaa'),
(7, 'bbb2', 'bbb1'),
(8, 'bbb2', 'bbb3'),
(18, 'bbb1', 'bbbb'),
(15, 'bbb2', 'a'),
(12, 'bbb3', 'bbb2'),
(14, 'bbb1', 'bbb3'),
(28, 'bbb1', 'bbb2'),
(29, 'nikom2532', 'bbb1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `social_iMing_images`
--

INSERT INTO `social_iMing_images` (`id`, `username`, `image_album`, `url`, `record_date`) VALUES
(27, 'bbb1', '', '', '0000-00-00 00:00:00'),
(46, 'bbb1', 'Profile Pictures', 'thumbnail_1320397973.jpg', '2011-11-04 09:12:59'),
(49, 'bbb1', 'photos', '1320419743_admin_profile.jpg', '2011-11-04 15:15:43'),
(54, 'bbb1', 'photos', '1320676266_arr3.png', '2011-11-07 14:31:06'),
(55, 'bbb2', 'Profile Pictures', 'thumbnail_1321337359.jpg', '2011-11-15 06:14:10'),
(56, 'bbb1', 'photos', '1322762320_001_Desk 1.png', '2011-12-01 17:58:40'),
(73, 'bbb1', 'Profile Pictures', 'thumbnail_1323544974.png', '2011-12-10 19:24:35'),
(72, 'bbb1', 'Profile Pictures', 'thumbnail_1323544797.jpg', '2011-12-10 19:22:54'),
(76, 'bbb1', 'Profile Pictures', 'thumbnail_1323545484.jpg', '2011-12-10 19:31:28'),
(77, 'bbb1', 'Profile Pictures', 'thumbnail_1323546304.jpg', '2011-12-10 19:46:12'),
(78, 'bbb1', 'Profile Pictures', 'thumbnail_1323546504.jpg', '2011-12-10 19:49:40');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `social_iMing_message_box`
--

INSERT INTO `social_iMing_message_box` (`message_id`, `subject`, `username_send`, `username_receive`, `unread`, `send_time`) VALUES
(16, '1->2', 'bbb1', 'bbb2', '', '2011-11-18 06:52:04'),
(17, '123', 'bbb1', 'bbb2', 'y', '2012-01-08 10:17:12');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `social_iMing_message_data`
--

INSERT INTO `social_iMing_message_data` (`data_id`, `message_id`, `user`, `message`, `send_time_last`) VALUES
(10, 16, 'bbb2', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '2011-11-18 04:39:55'),
(9, 16, 'bbb2', '2->1', '2011-11-18 04:37:07'),
(8, 16, 'bbb1', '1->2 ..', '2011-11-18 04:36:33'),
(7, 16, 'bbb1', '1->2', '2011-11-17 11:01:47'),
(11, 16, 'bbb2', '121', '2011-11-18 05:10:38'),
(12, 16, 'bbb2', 'a', '2011-11-18 05:18:32'),
(13, 16, 'bbb1', 'a', '2011-11-18 05:20:24'),
(14, 16, 'bbb1', 'a', '2011-11-18 05:20:41'),
(15, 16, 'bbb2', 'aa', '2011-11-18 06:15:00'),
(16, 16, 'bbb1', 's', '2011-11-18 06:28:48'),
(17, 16, 'bbb2', 'e', '2011-11-18 06:52:04'),
(18, 17, 'bbb1', '456', '2012-01-08 10:17:12');

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

--
-- Dumping data for table `social_iMing_vote_answer`
--

INSERT INTO `social_iMing_vote_answer` (`id`, `username_from`, `answer_id`, `vote`, `post_time`) VALUES
(65, 'bbb1', 54, 1, '2011-12-10 17:35:46'),
(56, 'bbb2', 53, 1, '2011-12-09 15:31:11'),
(70, 'bbb1', 53, 4, '2011-12-10 17:36:09'),
(71, 'bbb1', 62, 1, '2012-01-08 10:16:04'),
(72, 'bbb1', 63, 3, '2012-01-08 10:16:18');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `social_iMing_vote_comment`
--

INSERT INTO `social_iMing_vote_comment` (`id`, `username_from`, `comment_id`, `vote`, `post_time`) VALUES
(69, 'bbb1', 138, 4, '2011-12-12 07:42:07'),
(68, 'bbb1', 136, 1, '2011-12-11 12:36:28'),
(67, 'bbb1', 137, 1, '2011-12-11 12:36:27'),
(74, 'bbb2', 143, 1, '2012-01-08 10:19:57');

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

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_webboard_answer`
--

CREATE TABLE IF NOT EXISTS `social_iMing_webboard_answer` (
  `wa_id` int(10) NOT NULL AUTO_INCREMENT,
  `wp_id` int(10) NOT NULL,
  `wa_number` int(10) NOT NULL,
  `wa_detail` text NOT NULL,
  `wa_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `wa_date` datetime NOT NULL,
  `wa_ip` varchar(50) NOT NULL,
  `wa_show` char(1) NOT NULL,
  PRIMARY KEY (`wa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `social_iMing_webboard_answer`
--

INSERT INTO `social_iMing_webboard_answer` (`wa_id`, `wp_id`, `wa_number`, `wa_detail`, `wa_name`, `username`, `wa_date`, `wa_ip`, `wa_show`) VALUES
(1, 1, 1, 'ee', 'ss', 'ansv', '2009-12-07 10:46:30', '127.0.0.1', 'y'),
(2, 1, 2, '66', '66', 'ansv', '2009-12-07 10:47:17', '127.0.0.1', 'y'),
(3, 2, 1, '444', '444', 'ansv', '2009-12-13 09:25:46', '127.0.0.1', 'y'),
(4, 4, 1, ',/.,.', 'nklnk', 'thaitel', '2010-01-03 12:11:03', '127.0.0.1', 'y'),
(5, 6, 1, '5555', '555', 'adder', '2010-01-31 22:49:41', '58.8.103.85', 'y'),
(6, 7, 1, 'ไม่รู้', 'โอ๊ค', 'ansv', '2010-02-01 14:32:28', '202.28.9.63', 'y'),
(7, 9, 1, 'ดีคับ ได้ความรู้ในเรื่อง ดาราศาสตร์   พี่ทุกคนตลกคับ<br />\r\n<br />\r\n  ', 'gang sodalove ', 'TG007', '2010-02-12 11:10:23', '118.172.197.180', 'y'),
(8, 9, 2, 'ทำให้ได้รับความรู้เกี่ยวกับดวงดาวต่างๆ', 'น๊อต', 'TG008', '2010-02-12 11:12:03', '118.172.197.180', 'y'),
(9, 9, 3, 'มีข้อสอบที่ยากหน่อบเดียวเองขอยากๆกว่านี้หน่อยได้ไหมครับ แต่ก็ได้ความรู้ดีมากจากระบบสุริยจักรกวารมาก ', 'มาร์ค  เด็กเกาะ', 'TG006', '2010-02-12 11:14:30', '118.172.197.180', 'y'),
(10, 9, 4, 'ได้รับความรู้เกี่ยวกับโลกและดวงดาวจะนําไปใช้ในการเรียนให้มากขึ้น', 'ต๋อง', 'TG005', '2010-02-12 11:14:36', '118.172.197.180', 'y'),
(11, 9, 5, 'พวงพี่เป็นคนสนุกร่าเริงเป็นกันเเองนิสัยดีและน่ารักทุกคนเลยค่ะ', 'มิ้น   โบว์', 'TG003', '2010-02-12 11:14:39', '118.172.197.180', 'y'),
(12, 9, 6, 'ดี ได้ความรู้มากขึ้น สนุกมาก น้าจะสอนอย่างอื่นบางจะมาก พวกเพื่อนพูดเก่ง  และก็.....ด้วยครับ ขอคุณครับ', 'BOY', 'TG001', '2010-02-12 11:14:46', '118.172.197.180', 'y'),
(13, 9, 7, 'พวกพี่ๆนิสัยดีเป็นกันเองน่ารักมากค่ะ หนูได้ความรู้มากขึ้น การเรียนรู้ครั้งนี้สนุกมากค่ะ', 'โอ๋', 'TG002', '2010-02-12 11:14:49', '118.172.197.180', 'y'),
(14, 9, 8, 'พี่ๆ น่ารักทุกคนเป็นคนขี่เล่นตกลงมากสอนดีทุกคนให้คำปรึกษาได้ดี อยากให้พวกพี่มาสอนไหม  รักนะจุ๊บ ๆ ๆ ทุกคน', 'อุ้ม', 'TG009', '2010-02-12 11:18:07', '118.172.197.180', 'y'),
(15, 9, 9, 'พี่ๆ สอนดีมากคะ     อยากให้พี่ๆกลับมาสอนอีกคะ<br />\r\nเเต่พวกพี่พูดไม่เพราะเลยคะ   เเต่พวกพี่ก็ทำให้พวกหนู<br />\r\nสนุกมากๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆ เลยคะๆๆๆ ขอให้พวกพี่ๆ<br />\r\nมีความสุขมากๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆๆ<br />\r\nเลยคะ', 'ทราย', 'TG0010', '2010-02-12 11:18:19', '118.172.197.180', 'y'),
(16, 9, 10, 'พะเเรท่รรัด้รัรำพะ', 'นย', 'TG001', '2010-02-12 11:19:46', '118.172.197.180', 'y'),
(17, 9, 11, 'Hip Hop', 'Boy', 'TG001', '2010-02-12 11:21:35', '118.172.197.180', 'y'),
(18, 10, 1, 'b', 'b', 'aaaa', '2010-03-31 11:29:30', '127.0.0.1', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `social_iMing_webboard_post`
--

CREATE TABLE IF NOT EXISTS `social_iMing_webboard_post` (
  `wp_id` int(10) NOT NULL AUTO_INCREMENT,
  `wp_topic` varchar(150) NOT NULL,
  `wp_detail` text NOT NULL,
  `wp_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `wp_date` datetime NOT NULL,
  `wp_ip` varchar(50) NOT NULL,
  `wp_show` char(1) NOT NULL,
  PRIMARY KEY (`wp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `social_iMing_webboard_post`
--

INSERT INTO `social_iMing_webboard_post` (`wp_id`, `wp_topic`, `wp_detail`, `wp_name`, `username`, `wp_date`, `wp_ip`, `wp_show`) VALUES
(1, 'เทส', 'ทดสอบ', '123', 'ansv', '2009-12-04 20:44:27', '127.0.0.1', 'n'),
(2, 'อืม', 'อีกครั้ง', '555', 'ansv', '2009-12-07 11:12:31', '127.0.0.1', 'n'),
(3, '555', '666', '3443', 'ansv', '2010-01-03 11:30:11', '127.0.0.1', 'n'),
(4, 'kkjm', ';l,l,l', '..,;.,l', 'thaitel', '2010-01-03 12:10:52', '127.0.0.1', 'n'),
(5, 'fgfdgfdg', '<br />\r\n<br />\r\n<br />\r\nfg', 'dasdsa', 'ansv', '2010-01-31 12:48:55', '127.0.0.1', 'n'),
(6, '5555', '5555', '5555', 'adder', '2010-01-31 22:49:18', '58.8.103.85', 'n'),
(7, 'ถามสด', 'อะไรดีฮ่าๆๆๆ', 'ไม่รู้', 'ansv', '2010-02-01 14:32:05', '202.28.9.63', 'n'),
(8, 'เชิญชวนน้องๆแสดงความคิดเห็น', 'เชิญชวนน้องๆ ร่วมเเสดงความคิดเห็นผ่านทางกระทู้นี้', 'GongZilla', 'ansv', '2010-02-12 10:28:02', '118.172.197.180', 'n'),
(9, 'เชิญชวนน้องๆแสดงความคิดเห็น', 'เชิญชวนน้องๆ ร่วมเเสดงความคิดเห็นผ่านทางกระทู้นี้', 'GongZilla', 'ansv', '2010-02-12 10:28:14', '118.172.197.180', 'y'),
(10, 'a', 'a', 'a', 'aaaa', '2010-03-31 11:29:28', '127.0.0.1', 'y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
