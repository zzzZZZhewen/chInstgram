-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-05-06 04:23:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `chist_comment`
--

INSERT INTO `chist_comment` (`comment_id`, `comment_user_id`, `comment_post_id`, `comment_content`, `comment_date`) VALUES
(1, 1, 34, 'why coder has much more work than others', '2015-11-13 00:00:00'),
(2, 1, 25, '好好55好', '2015-11-12 00:00:00'),
(3, 5, 25, '好好5好', '2015-11-11 00:00:00'),
(4, 6, 25, '好好4好', '2015-11-10 00:00:00'),
(5, 5, 25, '好好2好', '2015-11-03 00:00:00'),
(6, 6, 25, '好好好1', '2015-11-23 00:00:00'),
(7, 5, 25, '好222好好', '2015-11-04 00:00:00'),
(9, 1, 29, '好牙', '2015-11-14 05:09:32'),
(10, 1, 25, '大家好', '2015-11-14 05:13:34'),
(11, 1, 28, '我', '2015-11-14 05:24:07'),
(12, 1, 29, '暗室逢灯', '2015-11-14 05:32:34'),
(13, 1, 34, 'cute', '2016-04-22 16:57:55'),
(14, 1, 34, 'cute', '2016-04-22 16:57:57'),
(15, 1, 34, 'cute', '2016-04-22 16:58:24'),
(16, 1, 34, 'cute', '2016-04-22 16:58:29'),
(17, 1, 34, 'asdf', '2016-04-22 17:00:10'),
(18, 1, 34, 'asdf', '2016-04-22 17:00:21'),
(19, 1, 34, 'test', '2016-04-22 18:42:53'),
(20, 1, 34, 'a', '2016-04-22 18:49:27'),
(21, 1, 34, 'b', '2016-04-22 18:51:34'),
(22, 1, 34, 'c', '2016-04-22 18:51:52'),
(23, 1, 34, '14', '2016-04-22 18:53:09'),
(24, 1, 34, 'asd', '2016-04-22 18:54:54'),
(25, 1, 34, 'bba', '2016-04-22 18:54:58'),
(26, 1, 34, 'coder is tired', '2016-04-22 18:55:25'),
(27, 1, 34, 'why', '2016-04-22 18:56:52'),
(28, 1, 34, 'asdf', '2016-04-22 18:57:06'),
(29, 1, 34, 'this is a long comment test,this is a long comment test,this is a long comment test', '2016-04-22 18:58:25'),
(30, 1, 21, 'good', '2016-04-22 19:19:59'),
(31, 1, 21, '88', '2016-04-22 19:22:25'),
(32, 1, 24, 'well well', '2016-04-22 19:24:51'),
(33, 1, 34, 'shoot', '2016-04-22 20:07:38'),
(34, 1, 34, 'still ', '2016-04-22 20:10:40'),
(35, 1, 34, 'not', '2016-04-22 20:10:46'),
(36, 1, 36, 'I agree', '2016-04-23 09:41:07'),
(37, 1, 20, 'good', '2016-04-23 11:28:36'),
(38, 8, 37, 'good', '2016-04-26 14:00:52'),
(39, 7, 38, 'comment', '2016-04-28 15:10:59'),
(40, 7, 39, '6564564564564', '2016-04-28 15:23:46'),
(41, 7, 39, '   sfgg', '2016-04-28 15:24:01'),
(42, 7, 36, 'ewrewrwerewrwere', '2016-04-28 15:24:59'),
(43, 7, 36, 'well', '2016-04-28 15:28:08'),
(44, 1, 36, 'awesome', '2016-05-02 21:28:02');

-- --------------------------------------------------------

--
-- 表的结构 `chist_follow`
--

CREATE TABLE IF NOT EXISTS `chist_follow` (
  `follower_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL,
  PRIMARY KEY (`follower_id`,`followed_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `chist_follow`
--

INSERT INTO `chist_follow` (`follower_id`, `followed_user_id`) VALUES
(1, 5),
(7, 8),
(8, 1),
(8, 7);

-- --------------------------------------------------------

--
-- 表的结构 `chist_like`
--

CREATE TABLE IF NOT EXISTS `chist_like` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `chist_like`
--

INSERT INTO `chist_like` (`post_id`, `user_id`) VALUES
(20, 1),
(21, 1),
(25, 1),
(34, 7),
(36, 1),
(36, 7),
(37, 8),
(39, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `chist_message`
--

INSERT INTO `chist_message` (`message_id`, `message_sender_id`, `message_reciever_id`, `message_content`, `message_datetime`) VALUES
(1, 1, 7, 'hello world', '2016-04-28 10:26:26'),
(2, 1, 7, 'hello ?', '2016-04-28 06:00:00'),
(3, 7, 1, 'hello another world', '2016-04-28 11:00:00'),
(4, 7, 8, 'afsfwer', '2016-04-27 00:00:00'),
(5, 1, 8, 'afsdfdafw aoihowher oiafhohwoehr hfoiahoirwh ofuhfiuwhei rerqrwr', '2016-04-25 00:00:00'),
(6, 8, 1, 'afwer', '2016-04-23 00:00:00'),
(7, 1, 5, 'a', '2016-04-28 00:00:00'),
(8, 6, 1, 'b', '2016-04-29 00:00:00'),
(9, 1, 9, 'c', '2016-04-30 00:00:00'),
(16, 1, 7, 'hi', '2016-05-02 16:27:51'),
(17, 1, 7, 'hello', '2016-05-02 16:27:57'),
(18, 1, 7, 'good', '2016-05-02 16:33:05'),
(19, 7, 1, 'hello!', '2016-05-02 16:33:38'),
(20, 1, 7, 'hi', '2016-05-02 19:49:44'),
(21, 1, 7, 'hi again', '2016-05-02 19:53:28'),
(22, 1, 7, 'well', '2016-05-02 19:57:51'),
(23, 1, 7, 'a', '2016-05-02 19:58:06'),
(24, 1, 7, 'b', '2016-05-02 19:58:20'),
(25, 1, 7, 'c', '2016-05-02 19:59:01'),
(26, 1, 7, 'good', '2016-05-02 20:16:11'),
(27, 7, 1, 'well..', '2016-05-02 21:19:18'),
(28, 7, 1, 'hi', '2016-05-02 21:19:27'),
(29, 1, 7, 'hi', '2016-05-02 21:28:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `chist_post`
--

INSERT INTO `chist_post` (`post_id`, `user_id`, `post_url`, `post_filter`, `post_gps`, `post_content`, `post_datetime`) VALUES
(19, 6, '5644b36f51614.jpg', 0, '', 'this pic is awesome', '2016-04-06 23:42:40'),
(20, 1, '5644b38e915a7.jpg', 0, '', 'this website is awesome', '2016-04-06 23:43:11'),
(21, 5, '5644b3aedabb4.jpg', 0, '', 'coder rules', '2016-04-06 23:43:43'),
(22, 1, '56456ec95cc99.jpg', 0, '', 'what a great design of this website', '2016-04-06 13:02:02'),
(24, 1, '56458f118018e.jpg', 0, '', 'big fan of SPM class', '2016-04-06 15:19:46'),
(25, 5, '56459e195c526.jpg', 0, '', 'way to go', '2016-04-06 16:23:53'),
(27, 8, '56462e1097423.jpg', 0, '', 'good class', '2016-04-06 02:38:09'),
(28, 1, '564630c803ddd.jpg', 0, '', 'coder rules', '2016-04-06 02:49:44'),
(30, 12, '564631ff21cdd.jpg', 0, '', 'this website rocks', '2016-04-06 02:54:55'),
(32, 14, '570bd9e1198ee.jpg', 0, '', 'what a great design of this website', '2016-04-12 01:07:45'),
(33, 1, '570be9b02ce24.jpeg', 0, '', 'MEOW~', '2016-04-12 02:15:14'),
(34, 1, '570beb2d5f202.jpeg', 0, '', '5 Star website indeed', '2016-04-12 02:21:36'),
(35, 15, '570c9af779bad.jpeg', 0, '', 'big cat', '2016-04-12 14:51:37'),
(36, 1, '571ac28a4c944.JPG', 0, '', 'coder has much more tasks than others, they should be given higher scores', '2016-04-23 08:32:11'),
(37, 7, '571eeca1aed33.jpg', 0, '', 'great avatar', '2016-04-26 12:20:49'),
(38, 7, '5721b74480b70.jpg', 0, '', 'cats', '2016-04-28 15:09:57'),
(39, 7, '5721ba7133c85.jpg', 0, '', '3123`23213`43`43243243125345355645665765', '2016-04-28 15:23:29');

-- --------------------------------------------------------

--
-- 表的结构 `chist_remind`
--

CREATE TABLE IF NOT EXISTS `chist_remind` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `chist_user`
--

INSERT INTO `chist_user` (`user_id`, `user_realname`, `user_nickname`, `user_image_url`, `user_email`, `user_password`, `user_sex`, `user_tel`, `user_info`) VALUES
(1, 'admin', 'Miao', '5643766bcd84f.jpg', 'admin@admin.com', 'adminn', '男', '1315241851', 'Coder of this Website'),
(5, 'test', 'test', '56433375f25b6.jpg', 'test@test.test', 'testtt', '保密', '123', 'testetsetase now or never'),
(6, 'test', 'good', '5644b08ae3fcf.jpg', 'good@good.good', 'gooddd', '保密', '123', 'testetsetase now or never'),
(7, 'hehe', 'hehehehe', '571eec55d535f.png', 'hehe@hehe.hehe', 'hehehe', '男', '1', 'smile'),
(8, 'huhu', 'huhu', '571eeccc3da1c.png', 'huhu@huhu.com', 'huhuhu', '女', '123124', 'huhuuhu'),
(9, 'asdf', 'asdf', '56433b037f5f9.jpg', 'asdf@asdf.com', 'asdfff', '保密', '13124', 'asdf'),
(10, '', 'gggg', 'avatar_default.jpg', 'gg@gg.gg', 'gggggg', '男', '', ''),
(11, '', 'newguyhere', 'avatar_default.jpg', 'new@new.new', 'newnew', '保密', '', ''),
(12, '', 'qwer', 'avatar_default.jpg', 'qwer@qwer.qwer', 'qwerqwer', '保密', '', ''),
(13, '', 'asdff', 'avatar_default.jpg', 'asdff@asdff.com', 'asdfasdf', '保密', '', ''),
(14, '', 'will', '570bd5b44f728.jpg', 'will@163.com', 'williscool', '保密', '', ''),
(15, '', '12345', '570c9ae552756.jpg', 'world@peace.com', '123456', '保密', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
