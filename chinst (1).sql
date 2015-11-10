-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-11-10 17:48:33
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chinst`
--

-- --------------------------------------------------------

--
-- 表的结构 `chist_belongto`
--

CREATE TABLE IF NOT EXISTS `chist_belongto` (
  `topic_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `chist_comment`
--

CREATE TABLE IF NOT EXISTS `chist_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_user_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_content` varchar(200) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `chist_follow`
--

CREATE TABLE IF NOT EXISTS `chist_follow` (
  `follower_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL,
  PRIMARY KEY (`follower_id`,`followed_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `chist_like`
--

CREATE TABLE IF NOT EXISTS `chist_like` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `chist_message`
--

CREATE TABLE IF NOT EXISTS `chist_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_sender_id` int(11) NOT NULL,
  `message_reciever_id` int(11) NOT NULL,
  `message_content` varchar(200) DEFAULT NULL,
  `message_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `chist_post`
--

CREATE TABLE IF NOT EXISTS `chist_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_url` varchar(150) DEFAULT NULL,
  `post_filter` bigint(20) DEFAULT NULL,
  `post_gps` varchar(30) DEFAULT NULL,
  `post_content` varchar(200) DEFAULT NULL,
  `post_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `chist_post`
--

INSERT INTO `chist_post` (`post_id`, `user_id`, `post_url`, `post_filter`, `post_gps`, `post_content`, `post_datetime`) VALUES
(1, 1, 'post_default.jpg', 0, '', '一些描述可能是这样的，那样的', '2015-11-02 08:21:00'),
(2, 1, 'post_default.jpg', 0, '', '一些描述可能是这样的，那样的', '2015-11-10 08:21:00');

-- --------------------------------------------------------

--
-- 表的结构 `chist_remind`
--

CREATE TABLE IF NOT EXISTS `chist_remind` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checked` int(1) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `chist_topic`
--

CREATE TABLE IF NOT EXISTS `chist_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `chist_user`
--

CREATE TABLE IF NOT EXISTS `chist_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_realname` varchar(20) DEFAULT NULL,
  `user_nickname` varchar(20) DEFAULT NULL,
  `user_image_url` varchar(150) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` char(20) DEFAULT NULL,
  `user_sex` varchar(8) DEFAULT NULL,
  `user_tel` char(10) DEFAULT NULL,
  `user_info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `chist_user`
--

INSERT INTO `chist_user` (`user_id`, `user_realname`, `user_nickname`, `user_image_url`, `user_email`, `user_password`, `user_sex`, `user_tel`, `user_info`) VALUES
(1, 'admin', 'admin', 'avatar_default.jpg', 'admin@admin.com', 'admin', '保密', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
