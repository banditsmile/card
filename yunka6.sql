-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2014 年 05 月 10 日 06:31
-- 服务器版本: 5.1.68-community
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yunka6`
--

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ad`
--

CREATE TABLE IF NOT EXISTS `fcl_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `text` varchar(50) DEFAULT NULL,
  `textcolor` varchar(7) DEFAULT NULL,
  `hidden` tinyint(4) DEFAULT NULL,
  `ispic` tinyint(4) DEFAULT '1',
  `pos` int(4) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

--
-- 转存表中的数据 `fcl_ad`
--

INSERT INTO `fcl_ad` (`id`, `pic`, `url`, `text`, `textcolor`, `hidden`, `ispic`, `pos`, `createdate`, `editdate`, `aid`) VALUES
(1, 'G090116001644110.jpg', 'index.html', 'index', '', 0, 1, 1, NULL, NULL, 0),
(2, 't3.gif', 'index.html', 'index', '', 0, 1, 1, NULL, NULL, 0),
(3, 'G090116001644110.jpg', 'index.html', 'index', '', 0, 1, 1, NULL, NULL, 0),
(4, 't3.gif', 'index.html', 'index', '', 0, 1, 1, NULL, NULL, 0),
(5, 'G090116001644110.jpg', 'index.html', 'index', '', 0, 1, 1, NULL, NULL, 0),
(7, 'ad_03.gif', 'index.html', '', '#FF0000', 0, 1, 2, '2009-01-04 20:50:35', NULL, 0),
(8, 'ad_022.gif', 'index.html', NULL, NULL, 0, 1, 3, '2009-01-04 20:50:58', NULL, 0),
(9, 'ad_01.gif', 'index.html', NULL, NULL, 0, 1, 4, '2009-01-04 20:51:30', NULL, 0),
(10, 'ad_04.gif', 'index.html', NULL, NULL, 0, 1, 5, '2009-01-04 20:51:46', NULL, 0),
(11, 'ad_05.gif', 'index.html', NULL, NULL, 0, 1, 5, '2009-01-04 20:52:00', NULL, 0),
(12, 'gg_01.jpg', 'index.html', NULL, NULL, 0, 1, 7, '2009-01-04 20:52:11', '2009-01-05 11:52:02', 0),
(13, NULL, '#', 'QQ币按元充值', '#ff0000', 0, 0, 50, '2009-01-05 11:51:11', '2009-01-05 11:51:15', 0),
(14, NULL, '#', '三国群英传225点15元卡', '#00000', 0, 0, 50, '2009-01-05 11:52:38', '2009-01-05 11:52:40', 0),
(15, 'ad_06.gif', 'index.html', NULL, NULL, 0, 1, 50, '2009-01-05 12:04:01', '2009-01-05 12:04:03', 0),
(19, 'b2bbanner.gif', '', '', '', NULL, 1, 6, '2009-01-15 17:09:50', '2009-01-15 17:09:53', 0),
(134, '4.jpg', '', '', '', NULL, 1, 101, '2013-03-03 21:00:50', '2014-03-31 12:53:19', 0),
(22, '9438073.gif', '', 'b2bbanner', '', NULL, 1, 106, NULL, '2013-03-03 21:00:10', 0),
(23, '2013114173313229_28114580.gif', '', 'middle', '', NULL, 1, 102, NULL, '2013-01-14 17:34:53', 0),
(24, 'hd1.gif', 'index.php', '平台分站搭建', '#FF0000', NULL, 1, 103, NULL, '2014-05-04 16:06:38', 0),
(26, 'b2b_ad5.gif', 'http://www.xmkm.net/', '', '', NULL, 1, 199, NULL, '2012-07-02 14:16:06', 0),
(27, 'b2b_ad6.gif', '', '', '', NULL, 1, 199, NULL, NULL, 0),
(29, 'myshop_001.jpg', '/b2c', '', '', NULL, 1, 201, '2009-03-13 11:50:30', '2009-03-13 11:50:30', 0),
(30, 'ad_01.gif', '/b2c', '', '', NULL, 1, 204, '2009-03-13 11:50:49', '2009-03-13 11:50:49', 0),
(31, 'ad_04.gif', '/b2c', '', '', NULL, 1, 205, '2009-03-13 11:55:38', '2009-03-13 11:55:38', 0),
(32, 'ad_05.gif', '/b2c', '', '', NULL, 1, 205, '2009-03-13 11:55:51', '2009-03-13 11:55:51', 0),
(128, '9438073.gif', '', '', '', NULL, 1, 506, '2013-01-14 17:35:41', '2013-03-03 21:03:26', 0),
(34, 'b2b_ad7.gif', 'http://www.xmkm.net/ykt/', '', '', NULL, 1, 199, NULL, '2012-07-02 14:15:32', 0),
(35, 'hd2.gif', 'index.php', '拍拍平台加款卡', '#FF0000', NULL, 1, 103, NULL, '2014-05-04 16:06:51', 0),
(36, 'yktad4.jpg', '', '', '', NULL, 1, 51, '2009-08-04 08:22:04', '2009-08-04 08:23:00', 0),
(39, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2011-12-17 20:32:21', 11184),
(56, '1323862841.jpg', '', '', '#6c6c6c', NULL, 1, 101, '2011-12-18 13:01:46', '2011-12-18 13:03:38', 11184),
(41, 't3.gif', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2011-12-17 20:32:21', 11184),
(42, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2011-12-17 20:32:21', 11184),
(44, 'G080623001298110.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2011-12-17 20:32:21', 11184),
(45, 'ad_act1.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2011-12-17 20:32:21', 11184),
(46, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2011-12-17 20:32:21', 11184),
(47, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2011-12-17 20:32:21', 11184),
(48, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2011-12-17 20:32:21', 11184),
(54, 'VES57LT}YB~UI8F2I8G~$7J.jpg', '', '', '#6c6c6c', NULL, 1, 101, '2011-12-18 12:49:37', '2011-12-18 12:54:40', 11184),
(58, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2011-12-19 14:31:15', 10000),
(57, '1323871356.gif', '', '', '#6c6c6c', NULL, 1, 101, '2011-12-18 13:06:22', '2011-12-18 13:06:22', 11184),
(59, 'T2bSx8XRdXXXXXXXXX_!!1589136820.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2014-05-07 12:43:02', 10000),
(60, 'G090116001644110.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2014-05-07 12:43:43', 10000),
(61, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2011-12-19 14:31:15', 10000),
(62, '', 'index.php', '欢迎光临', '#ff0000', NULL, 0, 108, NULL, '2011-12-19 14:31:15', 10000),
(166, 'y1.gif', '', '', '#6c6c6c', NULL, 1, 103, '2014-05-07 12:27:08', '2014-05-07 12:27:08', 10000),
(167, 'y2.gif', '', '新云数卡 安全稳定', '#6c6c6c', NULL, 0, 103, '2014-05-07 12:27:22', '2014-05-07 12:34:34', 10000),
(65, 'mylogo.gif', 'http://www.5iidc.cn', '', '#ff0000', NULL, 1, 199, NULL, '2014-03-27 12:28:11', 10000),
(66, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2011-12-19 14:31:15', 10000),
(67, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2011-12-19 14:31:15', 10000),
(71, 'WHJ8@T4WX)}){C0H`ZP`{K2.JPG', '', '', '#6c6c6c', NULL, 1, 152, '2012-01-10 20:35:41', '2012-01-10 20:35:41', 11184),
(95, 'hd3.gif', 'index.php', '淘宝平台加款卡', '#FF0000', NULL, 1, 103, '2012-02-13 12:55:28', '2014-05-04 16:06:59', 0),
(74, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2012-01-15 10:19:15', 11184),
(75, 'G090116001644110.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2012-01-15 10:19:15', 11184),
(76, 't3.gif', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2012-01-15 10:19:15', 11184),
(77, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2012-01-15 10:19:15', 11184),
(94, '222.jpg', 'http://www.leyoukm.com/article/?189', '', '#6c6c6c', NULL, 1, 110, '2012-02-02 22:44:04', '2012-02-02 22:45:09', 11184),
(79, 'G080623001298110.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2012-01-15 10:19:15', 11184),
(80, 'ad_act1.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2012-01-15 10:19:15', 11184),
(81, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-01-15 10:19:15', 11184),
(82, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-01-15 10:19:15', 11184),
(83, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-01-15 10:19:15', 11184),
(127, '2013114173313229_28114580.gif', '', '', '', NULL, 1, 552, '2013-01-14 17:34:15', '2013-01-14 17:34:15', 0),
(102, '', '', '', '#6c6c6c', NULL, 1, 110, '2012-07-14 10:32:03', '2012-07-14 10:32:03', 11184),
(103, 'bestteam.gif', 'index.php', '网吧活动', '#6c6c6c', NULL, 1, 103, '2012-07-14 10:39:30', '2012-07-14 10:39:30', 11184),
(106, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2012-09-23 13:28:22', 13492),
(107, 'G090116001644110.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2012-09-23 13:28:22', 13492),
(108, 't3.gif', 'index.php', '', '#6c6c6c', NULL, 1, 101, NULL, '2012-09-23 13:28:22', 13492),
(109, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2012-09-23 13:28:22', 13492),
(110, '', 'index.php', '欢迎光临', '#ff0000', NULL, 0, 108, NULL, '2012-09-23 13:28:22', 13492),
(111, 'G080623001298110.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2012-09-23 13:28:22', 13492),
(112, 'ad_act1.gif', 'index.php', '网吧活动', '#ff0000', NULL, 1, 103, NULL, '2012-09-23 13:28:22', 13492),
(113, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-09-23 13:28:22', 13492),
(114, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-09-23 13:28:22', 13492),
(115, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2012-09-23 13:28:22', 13492),
(117, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2013-01-14 01:51:01', 10000),
(170, 'y2.gif', '', '', '#6c6c6c', NULL, 1, 103, '2014-05-07 12:36:00', '2014-05-07 12:39:09', 10000),
(120, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2013-01-14 01:51:01', 10000),
(121, '', 'index.php', '欢迎光临', '#ff0000', NULL, 0, 108, NULL, '2013-01-14 01:51:01', 10000),
(168, 'y2.gif', '', '新云数卡 快速充值', '#6c6c6c', NULL, 0, 103, '2014-05-07 12:27:33', '2014-05-07 12:39:39', 10000),
(169, 'y3.gif', '', '新云数卡 快速充值', '#6c6c6c', NULL, 1, 103, '2014-05-07 12:35:45', '2014-05-07 12:37:58', 10000),
(124, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2013-01-14 01:51:01', 10000),
(125, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2013-01-14 01:51:01', 10000),
(126, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2013-01-14 01:51:01', 10000),
(133, '111.jpg', '', '', '', NULL, 1, 101, '2013-03-03 21:00:34', '2014-03-31 12:53:41', 0),
(131, '9438076.gif', '', '', '', NULL, 1, 104, '2013-01-21 18:59:43', '2013-03-03 20:59:37', 0),
(132, '', '', '欢迎您来到我的卡盟', '', NULL, 0, 108, '2013-01-21 23:25:45', '2013-03-03 21:01:38', 0),
(135, '6.jpg', '', '', '', NULL, 1, 101, '2013-03-03 21:01:02', '2014-03-31 13:09:28', 0),
(136, 'f6f4201fe6c34d51bd451ceb9db71298.jpg', '', '', '', NULL, 1, 101, '2013-03-03 21:01:24', '2014-04-02 13:51:29', 0),
(137, 'taobao.jpg', 'http://', '我的平台', '', NULL, 1, 109, '2013-03-03 21:13:41', '2014-03-31 12:59:42', 0),
(138, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2014-03-26 18:21:13', 10000),
(171, '', '', '新云数卡 完美服务', '#6c6c6c', NULL, 0, 103, '2014-05-07 12:40:17', '2014-05-07 12:40:17', 10000),
(141, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2014-03-26 18:21:13', 10000),
(142, '', 'index.php', '欢迎光临', '#ff0000', NULL, 0, 108, NULL, '2014-03-26 18:21:13', 10000),
(173, 'd3.gif', '', '', '#6c6c6c', NULL, 1, 109, '2014-05-07 14:12:11', '2014-05-07 14:12:11', 10000),
(174, 'd4.jpg', '', '', '#6c6c6c', NULL, 1, 109, '2014-05-07 14:12:27', '2014-05-07 14:12:27', 10000),
(145, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-03-26 18:21:13', 10000),
(146, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-03-26 18:21:13', 10000),
(147, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-03-26 18:21:13', 10000),
(148, 'd1.gif', 'http://52yma.taobao.com', '', '#6c6c6c', NULL, 1, 109, '2014-03-27 12:25:06', '2014-05-07 14:11:35', 10000),
(149, 'mylogo.gif', 'http://www.5iidc.cn', '吾爱互联', '#6c6c6c', NULL, 1, 199, '2014-03-27 12:27:14', '2014-03-27 12:27:14', 10000),
(150, '11.gif', '', '', '', NULL, 1, 152, '2014-03-31 12:54:32', '2014-03-31 12:54:32', 0),
(151, '22.gif', '', '', '', NULL, 1, 152, '2014-03-31 12:54:39', '2014-03-31 12:54:39', 0),
(152, '33.gif', '', '', '', NULL, 1, 152, '2014-03-31 12:54:49', '2014-03-31 12:54:49', 0),
(153, 'mylogo.gif', 'http://xybss.com.cn', '', '', NULL, 1, 109, '2014-04-07 13:30:25', '2014-04-07 13:30:25', 0),
(154, 'caifutong.gif', '', '', '', NULL, 1, 109, '2014-04-07 13:30:54', '2014-04-07 13:30:54', 0),
(155, 'zhifubao.gif', '', '', '', NULL, 1, 109, '2014-04-07 13:31:14', '2014-04-07 13:31:14', 0),
(156, 'b2bbanner.gif', '#', '', '#6c6c6c', NULL, 1, 106, NULL, '2014-05-06 14:03:36', 10000),
(172, 'd2.jpg', '', '', '#6c6c6c', NULL, 1, 109, '2014-05-07 14:11:48', '2014-05-07 14:11:48', 10000),
(159, 'top_banner1.jpg', 'index.php', '', '#6c6c6c', NULL, 1, 104, NULL, '2014-05-06 14:03:36', 10000),
(160, '', 'index.php', '欢迎光临', '#ff0000', NULL, 0, 108, NULL, '2014-05-06 14:03:36', 10000),
(175, 'd5.jpg', '', '', '#6c6c6c', NULL, 1, 109, '2014-05-07 14:12:38', '2014-05-07 14:12:38', 10000),
(163, 'b2b_ad5.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-05-06 14:03:36', 10000),
(164, 'b2b_ad6.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-05-06 14:03:36', 10000),
(165, 'b2b_ad7.gif', 'index.php', '', '#ff0000', NULL, 1, 199, NULL, '2014-05-06 14:03:36', 10000);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_addr`
--

CREATE TABLE IF NOT EXISTS `fcl_addr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prv` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `boss` varchar(50) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `forb2b` int(11) DEFAULT '0',
  `forykt` int(11) DEFAULT '0',
  `forb2c` int(11) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_admin`
--

CREATE TABLE IF NOT EXISTS `fcl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(50) DEFAULT NULL,
  `adminPass` varchar(50) DEFAULT NULL,
  `adminRank` int(11) DEFAULT NULL,
  `adminIp` varchar(50) DEFAULT NULL,
  `ipcheck` tinyint(4) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `maccheck` tinyint(4) DEFAULT NULL,
  `mac` varchar(255) DEFAULT NULL,
  `hdecheck` tinyint(4) DEFAULT NULL,
  `hde` varchar(255) DEFAULT NULL,
  `cpucheck` tinyint(4) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  `mobilecheck` tinyint(4) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `mibaokacheck` tinyint(4) DEFAULT NULL,
  `mibaoka` varchar(255) DEFAULT NULL,
  `rights` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `fcl_admin`
--

INSERT INTO `fcl_admin` (`id`, `adminName`, `adminPass`, `adminRank`, `adminIp`, `ipcheck`, `ip`, `maccheck`, `mac`, `hdecheck`, `hde`, `cpucheck`, `cpu`, `aid`, `mobilecheck`, `mobile`, `mibaokacheck`, `mibaoka`, `rights`) VALUES
(11, 'lanzhu', '0053c6546c0d3961ab6044ffceb32261', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(12, 'root', '63a9f0ea7bb98050796b649e85481845', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_agents`
--

CREATE TABLE IF NOT EXISTS `fcl_agents` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `aname` varchar(100) NOT NULL,
  `apwd` varchar(100) NOT NULL,
  `superpwd` varchar(100) DEFAULT NULL,
  `tradepwd` varchar(100) DEFAULT NULL,
  `frozen` tinyint(4) DEFAULT '1',
  `arealname` varchar(100) DEFAULT NULL,
  `aqq` varchar(50) DEFAULT NULL,
  `amail` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `atel` varchar(50) DEFAULT NULL,
  `aaddr` varchar(255) DEFAULT NULL,
  `aremain` double DEFAULT '0',
  `income` double DEFAULT '0',
  `acsmp` double DEFAULT NULL,
  `alv` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `regip` varchar(50) DEFAULT NULL,
  `lastdate` datetime DEFAULT NULL,
  `lastip` varchar(255) DEFAULT NULL,
  `lastlogintype` tinyint(4) DEFAULT '0',
  `lastloginaccount` int(11) DEFAULT '0',
  `thisdate` datetime DEFAULT NULL,
  `thisip` varchar(50) DEFAULT NULL,
  `thislogintype` tinyint(4) DEFAULT '0',
  `thisloginaccount` int(11) DEFAULT '0',
  `prv` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `funds` double DEFAULT '0',
  `selffrozenfunds` double DEFAULT '0',
  `tradefrozenfunds` double DEFAULT '0',
  `sysfrozenfunds` double DEFAULT '0',
  `bossfrozenfunds` double DEFAULT '0',
  `funds_loan` double DEFAULT '0',
  `arrears` double DEFAULT '0',
  `rights` varchar(255) DEFAULT NULL,
  `checktradepwd` tinyint(4) DEFAULT NULL,
  `websetting` varchar(255) DEFAULT NULL,
  `vipshop` tinyint(4) DEFAULT '0',
  `eshop` varchar(255) DEFAULT NULL,
  `inrecycle` tinyint(4) DEFAULT '0',
  `idcard` varchar(20) DEFAULT NULL,
  `custom` tinyint(4) DEFAULT '-1',
  `canadd` int(11) DEFAULT '-1',
  `canaddnum` int(11) DEFAULT '0',
  `AccountBranch` varchar(255) DEFAULT NULL,
  `AccountNo` varchar(255) DEFAULT NULL,
  `AccountName` varchar(100) DEFAULT NULL,
  `BankAddress` varchar(255) DEFAULT NULL,
  `BalanceID` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT '0',
  `istest` tinyint(4) DEFAULT '0',
  `pricetpl` int(11) DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `forb2b` tinyint(4) DEFAULT '0',
  `forykt` tinyint(4) DEFAULT '0',
  `forb2c` tinyint(4) DEFAULT '0',
  `scored` int(11) DEFAULT '0',
  `leftrights` varchar(255) DEFAULT NULL,
  `fromdate` datetime DEFAULT NULL,
  `todate` datetime DEFAULT NULL,
  `method` int(11) DEFAULT '0',
  `rewardtpl` int(11) DEFAULT '0',
  `frozereason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `cid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10003 ;

--
-- 转存表中的数据 `fcl_agents`
--

INSERT INTO `fcl_agents` (`aid`, `parentid`, `aname`, `apwd`, `superpwd`, `tradepwd`, `frozen`, `arealname`, `aqq`, `amail`, `mobile`, `atel`, `aaddr`, `aremain`, `income`, `acsmp`, `alv`, `regdate`, `regip`, `lastdate`, `lastip`, `lastlogintype`, `lastloginaccount`, `thisdate`, `thisip`, `thislogintype`, `thisloginaccount`, `prv`, `city`, `zip`, `company`, `funds`, `selffrozenfunds`, `tradefrozenfunds`, `sysfrozenfunds`, `bossfrozenfunds`, `funds_loan`, `arrears`, `rights`, `checktradepwd`, `websetting`, `vipshop`, `eshop`, `inrecycle`, `idcard`, `custom`, `canadd`, `canaddnum`, `AccountBranch`, `AccountNo`, `AccountName`, `BankAddress`, `BalanceID`, `points`, `istest`, `pricetpl`, `remarks`, `forb2b`, `forykt`, `forb2c`, `scored`, `leftrights`, `fromdate`, `todate`, `method`, `rewardtpl`, `frozereason`) VALUES
(10000, 0, 'admin', 'admin', 'aa123456', 'admin123', 0, '站长', '11111', '', '', '', '', 0, 0, 0, 6, '2013-03-04 22:38:57', '182.145.31.10', '2014-05-09 16:40:31', '14.104.212.138', 0, 0, '2014-05-09 20:36:41', '14.104.243.98', 0, 0, '四川', '成都', '', '站长', 0, 0, 0, 0, 0, 0, 0, '1,0,0,0,-1', 0, '1|1|1|1|1|1|1|1|0|0|0|0|', 1, '站长', 0, '', 1, -1, 0, '', '', '', '', NULL, 0, 0, 0, '', 0, 0, 0, 0, '1,1,0,1,1,1,1,0,0,1,0,1,1,1,1,1,1,0,1,1,1,0,0,1,0,0,1,0,1,1,1,1,1,0,1,1,0,0,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, 'lanzhu'),
(10001, 10000, '1489980210', '19980210', '19980210', '19980210', 0, '柒夏', '1489980210', '1489980210@qq.com', NULL, '021-8888888', '广东省茂名市那务镇低山', 0, 0, 0, 1, '2014-05-07 14:25:35', '14.220.216.84', '2014-05-07 14:25:35', '14.220.216.84', 0, 0, '2014-05-07 14:26:02', '14.220.216.84', 0, 0, '全国范围销售', '', NULL, 'kimi卡盟', 0, 0, 0, 0, 0, 0, 0, '1,0', 0, '1|1|0|1|1|1|1|0|0|0|0|0|', 0, '广东茂名', 0, '440982199802103439', -1, -1, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, 0, 0, 0, '1,1,0,1,1,1,1,0,0,1,0,1,1,1,1,1,1,0,1,1,1,0,0,1,0,0,1,0,1,1,1,1,1,0,1,1,0,0,1,1,0,0,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', NULL, NULL, 0, 0, NULL),
(10002, 10000, '1002214644', 'wei123.', 'wei123.', 'wei123.', 0, '留言', '', '', NULL, '', '', 0, 0, 0, 1, '2014-05-07 15:42:58', '112.4.16.162', '2014-05-07 15:42:58', '112.4.16.162', 0, 0, '2014-05-07 15:43:38', '112.4.16.162', 0, 0, '全国范围销售', '', NULL, '汇诚', 0, 0, 0, 0, 0, 0, 0, '1,0', 0, '1|1|0|1|1|1|1|0|0|0|0|0|', 0, '汇诚', 0, '320321199612050636', -1, -1, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, 0, 0, 0, '1,1,0,1,1,1,1,0,0,1,0,1,1,1,1,1,1,0,1,1,1,0,0,1,0,0,1,0,1,1,1,1,1,0,1,1,0,0,1,1,0,0,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_articles`
--

CREATE TABLE IF NOT EXISTS `fcl_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `ndate` datetime DEFAULT NULL,
  `tick` int(11) DEFAULT '0',
  `boardid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `hidden` tinyint(4) DEFAULT '0',
  `stick` tinyint(4) DEFAULT '0',
  `titlecolor` varchar(7) DEFAULT NULL,
  `titlelink` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT '0',
  `rank0` int(11) DEFAULT '0',
  `rank1` int(11) DEFAULT '0',
  `rank2` int(11) DEFAULT '0',
  `rank3` int(11) DEFAULT '0',
  `rank4` int(11) DEFAULT '0',
  `rank5` int(11) DEFAULT '0',
  `rank6` int(11) DEFAULT '0',
  `inrecycle` tinyint(4) DEFAULT '0',
  `webtitle` varchar(255) DEFAULT NULL,
  `meta_keywords` tinytext,
  `meta_description` tinytext,
  `aid` int(11) DEFAULT '0',
  `tpl` varchar(100) DEFAULT 'default',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

--
-- 转存表中的数据 `fcl_articles`
--

INSERT INTO `fcl_articles` (`id`, `title`, `content`, `ndate`, `tick`, `boardid`, `pid`, `hidden`, `stick`, `titlecolor`, `titlelink`, `rank`, `rank0`, `rank1`, `rank2`, `rank3`, `rank4`, `rank5`, `rank6`, `inrecycle`, `webtitle`, `meta_keywords`, `meta_description`, `aid`, `tpl`) VALUES
(1, '开通网上账户详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 4, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(2, '工行开通网银详细图解', '[b]中国工商银行[/b]\r\n工商银行网上支付支持卡种：牡丹灵通卡、牡丹信用卡、牡丹贷记卡、牡丹国际卡、理财金账户卡（工行直连）\r\n服务覆盖范围：全国\r\n工商银行网站地址：[url=http://www.icbc.com.cn/][color=#0000ff]http://www.icbc.com.cn/[/color][/url] \r\n工商银行客服电话：95588\r\n\r\n[b]中国工商银行支付限额[/b][table=98\\%][tr][td=3,1][align=center][b]U盾客户[/b][/align][/td][td=1,1,22\\%][b]柜面注册存量\r\n静态密码客户[/b][/td][td=2,1][b]电子银行口令卡客户[/b][/td][/tr][tr][td=1,1,11\\%][/td][td=1,1,15\\%]单笔限额[/td][td=1,1,15\\%]每日限额[/td][td]总累计限额[/td][td=1,1,19\\%]单笔限额[/td][td=1,1,18\\%]每日限额[/td][/tr][tr][td][b]信用卡[/b][/td][td]信用卡本身\r\n透支限额[/td][td]信用卡本身\r\n透支限额[/td][td]300元与信用卡\r\n本身限额孰低[/td][td]1000元与信用卡\r\n本身限额孰低[/td][td]5000元与信用卡 本身限额孰低[/td][/tr][tr][td][b]借记卡[/b][/td][td]无限额[/td][td]无限额[/td][td]300.00[/td][td]1000.00[/td][td]5000.00[/td][/tr][/table][b]2、办理了动态口令卡的客户\r\n[/b]（1）携带本人有效证件及注册网上银行时使用的牡丹卡前往工商银行任何一个储蓄所，提交网上银行\r\n业务申请单（原已在柜台办理过网银业务的客户请填写变更单申领口令卡），并向柜台申明开通“电\r\n子商务”功能。\r\n（2）首次支付前，先登陆工行网上银行“个人网上银行登录”修改网银登录密码、支付密码为数字和\r\n字母的组合，并激活口令卡([url=http://www.icbc.com.cn/zhuanqu/shiyongzhinan/shiyongzhinan_dongtaimima.htm][color=#0000ff]查看电子口令卡使用介绍[/color][/url])。\r\n（3）单笔支付限额1000元，每日累计支付限额5000元。\r\n（4）口令卡可使用1000次，之后需要前往柜台重新申领。\r\n\r\n注意：您领到电子口令卡后，首次进行B2C交易，必须要先登录网银一次，才能正常使用B2C交易。\r\n\r\n[b]3、办理了U盾的客户[/b]\r\n（1）携带本人有效证件及注册网上银行时使用的牡丹卡前往工商银行任何一个储蓄所，提交网上银行\r\n业务申请单。\r\n（2）首次支付前，先登陆工行网上银行安装驱动、[url=http://www.icbc.com.cn/guanggao/2005nian/0929/udun_050929.html][color=#0000ff]下载证书[/color][/url] 。 \r\n（3）U盾客户不受交易限额控制，可享受24小时大额转账汇款等各种服务。\r\n\r\n[b]U盾客户申请： [/b]\r\n只要您是工行个人网上银行客户，携带本人有效证件及注册网上银行时使用的牡丹卡到工行营业网点就可以申请U盾。\r\n\r\n使用U盾有三个步骤：\r\n\r\n第一步：安装驱动程序\r\n如果您是第一次在电脑上使用个人网上银行，请参照工行个人网上银行系统设置指南首先调整您的计算机设置，然后安装U盾驱动程序，不同品牌U盾的驱动程序只能用于本品牌。如果您希望用光盘安装，请运行U盾光盘，选择安装主页面的“系统升级”，系统会自动检测并提示您安装补丁。安装补丁后，请选择“驱动程序安装”，安装U盾驱动程序。\r\n\r\n第二步：下载证书信息\r\n申请U盾后，您可以委托工行网点柜员协助您下载个人证书信息到U盾体内，也可以登录工行个人网上银行，进入“客户服务-个人客户证书自助下载”，完成证书信息下载。下载前请确认U盾已连接到电脑USB接口上。如果下载不成功，请到柜面办理。\r\n\r\n第三步：开心使用U盾\r\n您在登录个人网上银行之后，只要按系统提示将U盾插入电脑的USB接口，输入U盾密码，并经银行系统验证无误，即可完成支付业务。', '2009-01-01 15:13:41', 12, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '工行开通网银详细图解', '工商银行 网上银行 如何开通', '介绍工商银行网上开通的详细步骤，以及相关说明', 0, 'default'),
(3, '建行开通网银详细图解', '[b]建设银行[/b]   \r\n建设银行网上支付支持卡种：龙卡储蓄卡、龙卡准贷记卡、双币种贷记卡（建行直连）\r\n服务覆盖范围：全国\r\n建设银行网站地址[url=http://www.ccb.cn/]http://www.ccb.cn/[/url] \r\n建设银行客服电话：95533\r\n\r\n[b]中国建设银行支付限额[/b]\r\n\r\n[table=98\\%][tr][td=3,1][b]签约客户[/b][/td][td=2,1][b]非签约客户[/b][/td][/tr][tr][td=1,1,11\\%] [/td][td=1,1,15\\%]单笔限额[/td][td=1,1,15\\%]每日限额[/td][td=1,1,22\\%]单笔限额[/td][td=1,1,18\\%]每日限额[/td][/tr][tr][td][b]信用卡[/b][/td][td]5000.00[/td][td]10000.00[/td][td]不支持[/td][td]不支持[/td][/tr][tr][td][b]借记卡[/b][/td][td]不支持[/td][td=3,1] [/td][/tr][/table]\r\n   \r\n[b]自助开通网上银行步骤：[/b]\r\n（建行信用卡用户可以通过网上自助申请开通后使用）\r\n1、登录建行网站首页，点击个人客户登陆进入登录页面 \r\n2、点击“开通网上银行服务”\r\n3、阅读协议、填写个人基本资料、填写账户信息、设置网上银行密码 \r\n4、申请成功 \r\n   \r\n[b]证书版开通介绍：[/b]\r\n一、携带身份证件与银行卡（存折除外），直接在银行柜台请工作人员帮助开通网上银行，进行网银签约\r\n二、激活已签约的网上银行\r\n1、登录建行网站首页，点击个人客户登陆就可以进入登录页面了： \r\n2、设置网上银行交易密码 \r\n3、下载证书 \r\n4、根据建行系统提示，一步步安装证书点击“生成证书”\r\n', '2009-01-01 15:13:41', 5, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(4, '农行开通网银详细图解', '[b]农业银行[/b]\r\n农业银行网上支付支持卡种：金穗卡客户（含金穗借记卡、金穗信用卡）（农行直连）\r\n服务覆盖范围：全国\r\n农业银行网站地址[url=http://www.95599.cn/]http://www.95599.cn/[/url]\r\n农业银行客服电话：95599\r\n   \r\n[b]中国农业银行支付限额[/b]\r\n[table=95\\%][tr][td=1,1,17\\%][/td][td=2,1][b]签约客户(专业版)[/b][/td][td=2,1][b]非签约客户(大众版)[/b][/td][/tr][tr][td] [/td][td=1,1,17\\%]IE浏览器证书 [/td][td=1,1,20\\%]K宝证书 [/td][td=1,1,24\\%] [/td][td=1,1,22\\%] [/td][/tr][tr][td] [/td][td]单笔限额[/td][td]每日限额[/td][td]单笔限额[/td][td]每日限额[/td][/tr][tr][td]信用卡[/td][td]不支持[/td][td] [/td][td]不支持[/td][td]不支持[/td][/tr][tr][td]借记卡[/td][td]1000.00[/td][td]2000.00[/td][td=1,2]200.00[/td][td=1,2]200.00[/td][/tr][tr][td]准贷记卡[/td][td]1000.00[/td][td]2000.00[/td][/tr][tr][td]备注[/td][td=4,1]自2007年9月25日起，农行将个人客户IE证书对外支付限额调整为：每个证书单笔对外支付金额不超过1000元，日累计对外支付金额不超过2000元。[/td][/tr][/table]\r\n   \r\n[b]农业银行网上支付提供电子支付卡支付和注册客户支付两种方式。[/b]\r\n如果您持有农行金穗借记卡、准贷记卡，可以凭银行卡卡号、查询密码自助申请电子支付卡。\r\n\r\n   \r\n[b]电子支付卡申请方法：[/b]\r\n1、登录农业银行网上银行系统，找到申请电子支付卡\r\n2、用您的银行卡卡号、查询密码登陆\r\n3、进入网上银行系统，点击电子支付卡按钮\r\n4、点击申请电子支付卡，同意电子支付卡条款\r\n5、输入您的申请信息 \r\n6、申请电子支付卡成功 \r\n   \r\n[b]二、农行证书版安装方法，也可以登陆农行网银查看详情：[/b]   \r\n1、进入农行的首页安装中国农行的智能安装程序\r\n2、点击“网上银行客户智能检测安装程序1.0版”\r\n3、进入农行的首页，下载证书， 选择“开始下载”；\r\n4、按照密码信封正确填写参考号和授权码，点击提交；\r\n5、系统验证通过后，将会让您选择客户证书存放方式。在CSP选择框中，选择“Microsoft EnhancedCryptographic Provider”，点击提交；\r\n6、然后IE浏览器将弹出交互窗口，在窗口中您可以设定下载证书的安全级别。默认情况下证书安全级别为中级（即以后使用时没有密码保护）。为确保安全，您也可以将安全级别设为“高级”，选择“设置安全级别”；\r\n7、在弹出的选择框中选择“高”；\r\n8、点击下一步，弹出设置密码页。在“此密码属于”栏目中输入您容易分辨的提示名称。然后输入证书的保护密码。那么在将来使用证书时（比如登录网上银行、提交指令时等操作）系统会要求输入密码；\r\n9、点击“确定”，稍做等待后，您的客户证书将生成。系统返回证书制作成功提示。\r\n', '2009-01-01 15:13:41', 1, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '农行开通网银详细图解', '农业银行 网上银行 网上购卡 网上购物 开通 支付限额', '介绍如何开通农行银行的网上银行业务，每日支付限额多少', 0, 'default'),
(5, '邮政开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(6, '招行开通网银详细图解', '[b]招行如何开通网上银行[/b]\r\n招商银行的网上银行分为专业版和大众版。\r\n招商银行网站地址[url=http://www.cmbchina.com/]http://www.cmbchina.com/[/url]\r\n招商银行客服电话：95555\r\n   \r\n[b]招商银行支付限额[/b][table=95\\%][tr][td=1,1,17\\%][/td][td=2,1][b]签约客户(专业版)[/b][/td][td=2,1][b]非签约客户(大众版)[/b][/td][/tr][tr][td][/td][td=1,1,17\\%]单笔限额[/td][td=1,1,20\\%]每日限额[/td][td=1,1,24\\%]单笔限额[/td][td=1,1,22\\%]每日限额[/td][/tr][tr][td]借记卡[/td][td]2000.00[/td][td]不限[/td][td]2000.00\r\n（保护期内500.00）[/td][td]5000.00\r\n（保护期内00.00）[/td][/tr][tr][td]信用卡[/td][td]不支持[/td][td][/td][td][/td][td][/td][/tr][tr][td=5,1]获取“验证码”操作指南\r\n[url=http://www.cmbchina.com/personal+business/common/yzmczzn.htm][color=#0000ff]http://www.cmbchina.com/personal+business/common/yzmczzn.htm[/color][/url][/td][/tr][/table] \r\n[b]一、如何申请成为专业版，招行网站上有详细的说明。[/b]\r\n携带本人有效身份证件和招商银行卡到招商银行营业网点填写《招商银行网上个人银行证书申请\r\n表》，申请网上个人银行（专业版），获得授权码，按“使用指南”中的流程进行操作。 \r\n   \r\n[b]二、如何开通招行大众版流程（借记卡开通流程）：[/b]\r\n1、登陆招行一网通 ，点击“个人银行大众版”\r\n2、选择银行卡的开户地，输入卡号和查询密码以及附加码 \r\n3、登录后，点击“网上支付”——“网上支付申请”\r\n4、选择一卡通开户地 \r\n5、阅读《责任条款》 \r\n6、填写申请表并提交，即开通了您一卡通的网上支付功能 \r\n7、开通了网上支付功能后，请登陆大众版，对您的一卡通进行“网上支付额度管理”，设置网上支付每日限额与网上支付额度。\r\n   \r\n[b]三、如何开通招行大众版流程（信用卡开通流程）：[/b]\r\n1、登陆招行一网通 ，点击“信用卡网上银行”\r\n2、选择卡片类别、证件类别，输入证件号码和查询密码以及附加码\r\n3、登录后，点击“网上支付”——“网上支付功能申请”，阅读协议并同意\r\n4、选择对应的卡号点击“开通”\r\n5、点击“确定”\r\n6、点击确定，您的信用卡已经成功开通了网上支付功能\r\n7、开通了网上支付功能后，请登陆大众版，对您的信用卡进行“网上支付额度设置”，可以“取消限置”或者“设置限制”\r\n\r\n[color=red]需要注意的是如果您的信用卡进行过网上支付额度设置，当网上消费累计金额大于你当前设置额度时需要重新设置，将累计额清零 [/color]\r\n', '2009-01-01 15:13:41', 3, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '招行开通网银详细图解', '招商银行 每日限额 网上购物 网上银行', '如何开通招商银行网上银行，如果设置每日限额', 0, 'default'),
(7, '交行开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(8, '广发开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(9, '浦发开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(10, '深发开通网银详细图解', '[b]深发展银行如何开通网上银行[/b]\r\n深发银行个人网银分为“深发卡用户”、“动态口令刮刮卡用户”、“动态口令编码器用户”、“数字证书用户”。 \r\n深发卡用户是可以直接在网上自助申请，另外三种方式均需去银行柜台开通。 \r\n   \r\n[b]深圳发展银行支付限额[/b]\r\n[table=95\\%][tr][td=1,1,11\\%][/td][td][b]客户类型[/b][/td][td][b]申请方式[/b][/td][td][b]支付渠道 [/b][/td][td][b]日支付限额 [/b][/td][/tr][tr][td] [/td][td=1,1,26\\%] [/td][td=1,1,14\\%] [/td][td=1,1,15\\%] [/td][td=1,1,34\\%]500.00元 [/td][/tr][tr][td]借记卡[/td][td]深圳发展卡用户\r\n(使用卡号，卡静密码)[/td][td]网上申请[/td][td]网上支付 [/td][td]500.00元 （使用完必须申请刮\r\n刮卡、编码器或证书）[/td][/tr][tr][td] [/td][td]动态口令刮刮卡用户[/td][td]柜台申请[/td][td]网上支付\r\n网上转账[/td][td]5000.00元[/td][/tr][tr][td] [/td][td]动态口令编码器用户[/td][td]柜台申请[/td][td]网上支付\r\n网上转账[/td][td]无[/td][/tr][tr][td] [/td][td]数字证书用户[/td][td]柜台申请[/td][td]网上支付\r\n网上转账[/td][td]无[/td][/tr][tr][td]信用卡[/td][td]暂不支持网上支付[/td][td] [/td][td] [/td][td] [/td][/tr][/table]   \r\n\r\n动态口令刮刮卡使用次数为28次（以客户输入正确的密码字符并通过系统验证为一次），达到使用次数后即不能使用，请及时到营业网点办理申领新卡手续；用刮刮卡支付需先到柜台进行账户与刮刮卡的绑定。\r\n动态编码器使用次数无限制；用编码器支付需先到柜台或在网上自助申请网银注册用户，然后到柜台进行网银用户名与编码器的绑定。 \r\n要了解更多深发网上银行的信息，可以登录深圳发展银行网站查看或致电深发银行服务热线：95501\r\n   \r\n[b]一．网上自助申请成为“深发卡用户”的具体步骤：[/b] \r\n1、登录深圳发展银行 --“申请中心”；\r\n2、点击“在线注册” ； \r\n3、浏览并同意《网上银行服务章程》；\r\n4、按提示填写如下表格后，点击“确认”； \r\n5、系统返回成功信息，您的网上银行就开通喽。\r\n   \r\n[b]二．深发“动态口令刮刮卡与”与“动态口令编码器”的具体介绍：[/b]\r\n\r\n下面主要介绍一下刮刮卡的办理步骤： \r\n1、请带身份证件及名下任一发展借记卡或信用卡，到柜台签定协议 \r\n2、填写申请表\r\n备注：申请表上有几个项目，“注册”代表新申请刮刮卡；“注销”代表将刮刮卡停止使用，注销掉；“挂户”代表可以同时将几张开通网银的银行卡挂在同一张刮刮卡上，可以共用这个刮刮卡；\r\n“续卡”代表刮刮卡用完后，换用新卡，目前刮刮卡有28个动态口令，以用户输入正确的口令验证通过为一次；\r\n“减户”表示将挂在刮刮卡上的银行卡去掉，停止使用这个刮刮卡的功能。\r\n柜台办理完毕后，可以直接使用，不需要登陆深发网站进行别的操作。\r\n\r\n[b]三、“数字证书用户”说明[/b]\r\n“数字证书用户”请在银行柜台填写《深圳发展银行网上银行个人用户申请表》申请网银移动数字证书，申请成功后会获得证书参考号、授权码及USBKey。在“下载中心”的证书下载页面，输入参考号及授权码下载数字证书到您的USBKey中。\r\n', '2009-01-01 15:13:41', 6, 5, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '深发开通网银详细图解 - 本平台', '深圳发展银行 开通网上银行 每日限额', '介绍如何开通深圳发展银行 网上银行业务，以及每日的限额', 0, 'default'),
(11, '民生开通网银详细图解', '[b]民生银行[/b] \r\n2007年7月26日起，民生银行客户如要使用“民生卡支付”功能，需要进行开通，如未开通将无法再继续使用该功能，点“申请民生银行大众版”，进入“申请服务”，即可轻松开通此功能!\r\n民生银行网上支付支持卡种：民生卡(民生银行直连)\r\n服务覆盖范围：全国\r\n民生银行网站地址[url=http://www.cmbc.com.cn/]http://www.cmbc.com.cn/[/url]\r\n民生银行客服电话：95568\r\n\r\n[b]民生银行银行支付限额[/b] \r\n[table=95\\%][tr][td=1,1,17\\%][/td][td=2,1][b]贵宾版[/b](证书用户)[/td][td=2,1][b]大众版[/b](非证书用户)[/td][/tr][tr][td] [/td][td=1,1,17\\%]单笔限额[/td][td=1,1,20\\%]每日限额[/td][td=1,1,24\\%]单笔限额[/td][td=1,1,22\\%]每日限额[/td][/tr][tr][td]借记卡[/td][td]500000.00 [/td][td]500000.00[/td][td]1000.00[/td][td]5000.00[/td][/tr][tr][td]信用卡[/td][td]不支持[/td][td] [/td][td] [/td][/tr][/table]\r\n \r\n   \r\n[b]民生银行的网上银行分为大众版与贵宾版:[/b] \r\n   \r\n[b]大众版[/b]：您可以网上自助申请设置民生卡网上支付额度并开通网上支付功能，成为大众版用户； \r\n   \r\n[b]贵宾版[/b]：携带本人身份证件、卡折原件到民生银行网点办理签约申请手续，下载并安装证书后即可享受到专业版的服务。 \r\n   \r\n[b]一、大众版申请流程：[/b] \r\n1、登录民生银行首页，点击“申请个人大众版”；\r\n2、阅读“网上银行个人客户服务协议”，同意并下载CA根证书；\r\n3、如实填写申请银行卡的证件号、卡号和查询密码（该查询密码为取款密码）；\r\n4、确认信息，并填写完整您的电子邮件、联系地址和手机等信息。\r\n   \r\n[b]二、贵宾版申请流程：[/b] \r\n1、携带本人身份证件、银行卡到民生银行网点办理签约贵宾版申请手续，填写单据后会收到银行的一个密码信封，它是用来下载网银证书的。打开民生银行银行的首页，点击左侧菜单的个人证书下载。\r\n2、打开银行提供的密码信封，输入参考号与授权码（使用一次后密码作废），选择下载证书版本的类型请参考该页面下方的文字。\r\n3、出现以下提示点击“确定” \r\n4、看到该提示则表明证书已经成功下载，您就可以使用民生银行的个人网银贵宾版喽。\r\n', '2009-01-01 15:13:41', 4, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '民生开通网银详细图解', '民生银行网上银行 限额 开通', '如何开通民生银行网上银行业务，他的限额是多少', 0, 'default'),
(12, '中信开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(13, '兴业开通网银详细图解', '暂时还没有添加内容', '2009-01-01 15:13:41', 1, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(18, '我要汇款', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(19, '零售系统购卡演示', '暂时还没有添加内容', '2009-01-01 15:13:41', 0, 5, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(20, '怎样辨别客服的真假', '联系网站在线客服QQ\r\n', '2012-05-03 16:08:02', 257, 16, 0, 0, 0, '#FF0000', '', 2, 0, 1, 0, 0, 0, 0, 1, 0, '怎样辨别客服的真假', '辨别客服真假', '怎样辨别客服的真假', 0, 'default'),
(21, '用户注册', '用户注册', '2012-05-03 16:10:23', 17, 8, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '用户注册', '用户注册', '用户注册', 0, 'default'),
(22, '新手指南', '新手指南', '2012-05-03 16:19:23', 300, 16, 0, 0, 0, '#FF0000', 'http://www.xunikm.com/bbs/thread-7-1-1.html', 1, 0, 0, 0, 0, 1, 1, 0, 0, '新手指南', '新手指南', '新手指南', 0, 'default'),
(23, '一卡通产品销售合作', '暂时还没有添加内容', '2009-01-01 15:13:41', 155, 11, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(24, '诚信与安全', '暂时还没有添加内容', '2009-01-01 15:13:41', 29, 16, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(25, '关于我们', '暂时还没有添加内容', '2009-01-01 15:13:41', 21, 16, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(30, '游戏卡使用状态查询地址一览表', '网易实卡查询网址（需登录）\r\n[url=http://pay.163.com/pcard/index.shtml][color=#0000ff]http://pay.163.com/pcard/index.shtml[/color][/url]\r\n\r\n盛大实卡的充值记录查询\r\n[url=http://pay.16288.com/cxye/Default.aspx][color=#0000ff]http://pay.16288.com/cxye/Default.aspx[/color][/url]\r\n\r\n腾讯QQ卡实卡查询网址\r\n[url=http://card.qq.com/cardsearch.shtml][color=#0000ff]http://card.qq.com/cardsearch.shtml[/color][/url]\r\n\r\n金山一卡通实卡查询网址\r\n[url=http://pay.kingsoft.com/index.php?s=fastquery&act=cardvalidate][color=#0000ff]http://pay.kingsoft.com/index.php?s=fastquery&act=cardvalidate[/color][/url]\r\n\r\n91卡实卡查网址\r\n[url=http://168.91.com/web20/account/Search91Card.aspx][color=#0000ff]http://168.91.com/web20/account/Search91Card.aspx[/color][/url]\r\n\r\n魔兽世界、奇迹卡实卡查网址\r\n[url=http://passport.the9.com/payment/ctl_payment.php?action=searchpc_fill][color=#0000ff]http://passport.the9.com/payment/ctl_payment.php?action=searchpc_fill[/color][/url]\r\n\r\n挑战Online实卡查卡地址(需登录)\r\n[url=http://center.dkonline.com.cn/AccountCenter/Entry/Passport.aspx?ReturnUrl=/SupplyPoint/PointCardStatusSrch.aspx][color=#0000ff]http://center.dkonline.com.cn/AccountCenter/Entry/Passport.aspx?ReturnUrl=/SupplyPoint/PointCardStatusSrch.aspx[/color][/url]\r\n\r\n真封神实卡查询网址(需登录)\r\n[url=http://zfs.gamigo.com.cn/Billing/member_Login.aspx?url=/Billing/card_verify.aspx][color=#0000ff]http://zfs.gamigo.com.cn/Billing/member_Login.aspx?url=/Billing/card_verify.aspx[/color][/url]\r\n\r\n骏网一卡通实卡查询网址\r\n[url=http://www.jcard.cn/UCard/UCardTradeSearch.aspx?searchType=1][color=#0000ff]http://www.jcard.cn/UCard/UCardTradeSearch.aspx?searchType=1[/color][/url]\r\n\r\n中广网一卡通实卡查询网址\r\n[url=http://ucard.catv.net/GameCard/Query/Default.aspx][color=#0000ff]http://ucard.catv.net/GameCard/Query/Default.aspx[/color][/url]\r\n\r\n征途实卡查询网址(注意:卡号后不能有空格)\r\n[url=http://pay.ztgame.com.cn:8888/varCard.php][color=#0000ff]http://pay.ztgame.com.cn:8888/varCard.php[/color][/url]\r\n\r\n热血江湖一卡通查询网址(验证码分大小写)\r\n[url=http://rxjh.17game.com/yikatong/Search.html][color=#0000ff]http://rxjh.17game.com/yikatong/Search.html[/color][/url]\r\n\r\n网域一卡通（华夏/华夏2）查询网址\r\n[url=http://pay.hx2004.com/web/CardSystem/Card_StatusQuery.aspx][color=#0000ff]http://pay.hx2004.com/web/CardSystem/Card_StatusQuery.aspx[/color][/url]\r\n\r\n猫扑一卡通（大话战国）查询网址\r\n[url=http://gc.zg.mop.com/account/cardvalid.php][color=#0000ff]http://gc.zg.mop.com/account/cardvalid.php[/color][/url]\r\n\r\n光通一卡通查询网址（进入选 ”充值卡查询“）\r\n[url=http://bill.gtgame.com.cn/portal/fcLoginAction.do][color=#0000ff]http://bill.gtgame.com.cn/portal/fcLoginAction.do[/color][/url]\r\n\r\n九鼎OL卡查询\r\n[url=http://www.herogame.cn/pay/login.htm][color=#0000ff]http://www.herogame.cn/pay/login.htm[/color][/url]\r\n\r\n天机点卡查询\r\n[url=http://passport.ferrygame.com/page/PaymentSearchpc.aspx][color=#0000ff]http://passport.ferrygame.com/page/PaymentSearchpc.aspx[/color][/url]\r\n', '2009-03-14 00:33:55', 98, 9, 0, 0, 1, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(31, '忘记密码怎么办？', '1、无上级代理商的直销商：直接核对网吧资料（所有资料，最重要的是身份证号），金额不超300元的，不需要传真。超300元的请填写好网吧注册的资料（含网吧帐号、名称、联系电话、联系人、注册时填写的身份证号）以及附上联系人的身份证复印件一起，传真到客服中心处理\r\n\r\n2、有上级代理商的直销商：请直销商与上级代理商联系，由代理商通过QQ或电话的形式，直接联系客服修改密码。客服需要核对代理商的资料及网吧的资料（代理商帐号里的电话、联系人、身份证号；还有网吧帐号里的电话、联系人、身份证号），不需要传真，确认情况后，马上处理。 \r\n\r\n', '2014-05-07 17:25:56', 1, 14, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(32, '游戏金币发送方式', '游戏金币是通过什么方式发送到游戏中的角色呢？\r\n\r\n平台上目前正热卖的四款游戏金币（魔兽金币、征途银锭、武林金币以及完美国际金币）均以邮寄的方式发到玩家游戏角色的邮箱里，在游戏内各地邮箱处查收，在成功收取金币之前，请不要点返回或删除邮件。', '2009-03-14 00:38:01', 2, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(33, '出现网上支付故障，怎么办？', '[b]出现网上支付故障，怎么办？[/b]\r\n\r\n当您使用我们目前开通的网上银行（工行、招行、中行、农行）对自己的账号进行储值时，如果发生银行卡上的钱被扣除，但加油站账号上的金额没有发生变化的情况，请您立即联系客服中心，并提供以下资料：\r\n银行：\r\n卡号：\r\n储值的直销商账号：\r\n名称：\r\n储值金额：\r\n储值时间：\r\n网上支付操作最后一步系统返回的订单号：\r\n一天内储值相同金额有__笔\r\n要求转入的直销商账号：\r\n联系人姓名：\r\n联系电话：\r\n\r\n我们的客服收到您的信息后，会立即帮您把问题转交给相关部门查询解决。（如财务查询到交易失败，客服将以电话形式通知您，提交投诉后敬请您留意您的资金变动！）\r\n\r\n\r\n[color=Red]请您务必查看银行的钱是否已经扣除[/color]', '2009-03-14 00:40:04', 2, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(34, '为什么会出现不能购买的情况？', '为什么会出现不能购买的情况？\r\n\r\n因为所出售产品都有一定的库存量的，所以当库存量不能满足你所需要定的金币数量的时候会出现无法购买的情况。系统会自动给您一个建议购买量。当然我们每天都会及时补充库存，以满足大家的需求量。', '2009-03-14 00:40:41', 2, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(35, '什么是参数不合法？', '[b]什么是参数不合法？[/b]\r\n\r\n1.由于网络传输问题，没有生成订单，请重新提交一次充值请求。\r\n\r\n2.由于网络原因，您在还没有下载完充值模板就立刻提交充值，这样子就有可能导致充值失败\r\n\r\n正常情况下，直充的商品都会增加除游戏账号的信息，让您选择，如果您没有看到这些信息，说明您当前的模板就是不正常的\r\n\r\n造成模板不正常的原因有可能是您的浏览器禁用了脚本或者您当地网络禁用了脚本（有些公司内部为防止员工非法上外网，都会禁用网页脚本）\r\n\r\n如果您出现了这个情况，您可以按照下边的方法试试看\r\n\r\n1.浏览器上方 －》工具 -》 internet 选项 -》 安全 －》自定义级别 －》重置 －》确定\r\n2.浏览器上方 －》工具 -》 internet 选项 -》 高级 －》还原默认设置 －》确定\r\n\r\n一般情况下，这些问题是不容易发生的。如果您还没有搞定，可以和我们的客服进行联系\r\n', '2009-03-14 00:42:22', 2, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(36, '如何解除登陆绑定', '[b]联系客服解除绑定[/b]\r\n\r\n\r\n解除绑定有2种方法\r\n\r\n1.登录平台 －》安全检查 -》把对应的勾去掉就可以\r\n\r\n2.联系客户，让我们帮您取消绑定', '2014-05-07 16:34:47', 1, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(37, '帐号被盗了该怎么办？ ', '[b]帐号被盗了该怎么办？ [/b]\r\n\r\n\r\n1.立刻申请系统冻结账号（使用您注册的QQ联系客服）\r\n\r\n2.提交相关信息，系统帮您修改密码\r\n\r\n3.用户用新密码登录，务必绑定一下机器', '2009-03-14 00:43:54', 2, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(38, '当您的资金周转不开怎么办', '[b]当您的资金周转不开怎么办[/b]\r\n\r\n您可以申请系统赊账，前提是您是我们的金牌合作对象\r\n\r\n目前金牌合作对象只针对实体经销商，网上加盟用户不允许赊账', '2009-03-14 00:44:27', 3, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(39, '如何审批下属商家加入', '[b]如何审批下属商家加入[/b]\r\n\r\n1.登录平台\r\n\r\n2.下级管理\r\n\r\n3.解冻', '2014-05-07 16:34:33', 8, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(40, '如何加盟本平台成为高级代理商？', '如何加盟本平台成为高级代理商？', '2009-03-14 00:45:25', 8, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(41, '忘记密码怎么办？ ', '[b]忘记密码怎么办？ [/b]\r\n\r\n1.联系客服\r\n\r\n2.客服帮您重置密码，您使用新密码登陆', '2009-03-14 00:45:44', 3, 9, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 1, 0, 0, '', '', '', 0, 'default'),
(42, '银行订单号如何查询？', '银行订单号如何查询？\r\n\r\n1.登陆平台\r\n\r\n2.找到平台订单号\r\n\r\n3.登陆网上银行，一般情况下平台的订单号就是您网银那里的订单号，财付通网关比较特殊，财付通的后10位和平台订单后10位一样，您可以使用这些信息核对银行的订单', '2009-03-14 00:46:01', 5, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(43, '如何申请解资金冻结？ ', '如何申请解资金冻结？ \r\n\r\n1.登陆平台\r\n\r\n2.提交投诉，把您需要解冻的金额写在投诉里边\r\n\r\n3.系统给您的注册邮箱发出您注册时候的密码找回问题，您需要把密码问题重新发给系统，如果满足，我们将会察看您冻结的原因，并按照要求考虑给您解冻\r\n\r\n如果您有什么疑问，请和客服联系', '2009-03-14 00:46:19', 5, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(44, '如何提交协助您处理申请游戏官方封停的产品？', '[b]如何提交协助您处理申请游戏官方封停的产品？[/b]\r\n\r\n答：为了尽快协助解决您的问题，请您按如下步骤提交：\r\n\r\n1.登录平台\r\n\r\n2.我要投诉 \r\n\r\n我们收到您的留言后，会及时给您处理，请务必保证提交的信息真实有效', '2014-05-07 16:34:21', 8, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(45, '如何察看交易记录？ ', '[b]如何察看交易记录？[/b] \r\n\r\n1.登录平台\r\n\r\n2.帐务记录', '2014-05-07 16:34:08', 84, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(46, '如何查看员工利润 ', '如何查看员工利润 ', '2009-03-14 00:47:19', 0, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(47, '如何查看员工利润 ', '[b]如何查看员工利润 [/b]\r\n\r\n1.登录平台\r\n\r\n2.左边导航栏 “[color=blue]零售利润报表(员工)[/color] ”', '2009-03-14 00:47:36', 72, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(48, '如何查看充值结果 ', '[b]如何查看充值结果[/b] \r\n\r\n1.登陆平台\r\n\r\n2.提卡记录\r\n\r\n3.找到对应的订单，然后点击查看', '2009-03-14 00:47:52', 92, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(49, '怎么样绑定机器？ ', '[b]怎么样绑定机器？ [/b]\r\n\r\n\r\n绑定机器有2种方式\r\n\r\n1.登录器登录，登录器登陆后，系统就会直接绑定您的机器\r\n\r\n2.登录平台，点击 安全检查 -> 获取各硬件信息，打勾对应的栏，然后提交即可\r\n\r\n注：如果您获取硬件信息的时候，显示undefined，说明您的安装控件没有安装上去，您可以在首页点击在线安装安全控件，请点击确定，如果有框提示的话', '2009-03-14 00:48:08', 92, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(50, '外挂卡购买问题 ', '平台只保证外挂卡能够充值成功\r\n\r\n外挂的使用问题需要您登陆外挂官方进行察看\r\n\r\n经销商在购买外挂之前，务必保证外挂是可以使用的，外挂卡购买后，是无法退款的', '2009-03-14 00:48:37', 87, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '', '', 0, 'default'),
(51, '购卡出现问题怎么办？', '[b]购卡出现问题怎么办？[/b]\r\n\r\n如果您在购卡过程中出现问题或者购卡后卡密出现问题，请及时联系我们的客服或者在页面右下角点击投诉给我们留言，我们会及时处理您的问题', '2009-03-14 00:50:19', 107, 9, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(53, '商户必读', '商户必读', '2009-03-14 00:50:19', 1, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(54, '法律声明', '法律声明', '2009-03-14 00:50:19', 5, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(56, '服务条款', '服务条款', '2009-03-14 00:50:19', 2, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(57, '隐私声明', '隐私声明', '2009-03-14 00:50:19', 4, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(58, '怎样购买点卡？', '[align=left][size=2]购买商品需要先往你的平台账户里充值，这里充值多少都可以。充值方式可以用[b][color=red]支付宝[/color][/b]和[color=red][b]财付通[/b][/color]，如果两者都没有的话，可以联系你的上级给你转账。[/size][/align][align=left][size=2]充值步骤如下：[/size][/align][align=left][size=2]点左侧菜单栏账户管理中的【账户余额充值】[/size][/align][size=2][align=left][size=2] [/size][/align][align=left][size=2]这里我们选择充值方式，支付宝或者财付通，然后填写充值金额,确认支付。[/size][/align][align=left] [/align][align=left]在跳转后的支付页面按照要求填写你的账号支付密码等信息就可以完成支付操作。（[b][color=red]注意：卡盟已经与支付宝和财付通合作，支付过程安全可靠[/color][/b]。）[/align][align=left][b][size=4][color=red]注意：付款后请等待付款页面自动跳转，没跳转之前请不要关闭！[/color][/size][/b][/align][align=left] [/align][align=left]付款成功之后，左侧【用户信息】栏内可以看到你的余额，如果没有显示请刷新页面。[/align][align=left] [/align][align=left]接下来您就可以购买商品了。点击左侧【我要进货】栏中的【购卡售用户】[/align][align=left] [/align][align=left]在搜索栏中输入你想要购买的商品，这里拿QQ会员举例。我们输入“QQ会员”，然后点击搜索。[/align][align=left] [/align][align=left]下面是搜索结果，你会看到很多与QQ会员相关的商品。画框的【进货价】一栏就是你实际购买商品的价格。如果没有显示【进货价】可能是以下两种原因：[/align][align=left]1、你使用的浏览器不兼容，可以更换IE浏览器再试。[/align][align=left]2、你没有勾选图中【[color=red][b]显示购价[/b][/color]】选框。请勾选后查看。[/align][align=left] [/align][align=left] [/align][align=left][b][size=3][color=black]全部填写检查无误后，点“我要购买”，接下来您只需等待供货商为您开通即可。[/color][/size][/b][/align][align=left][b][size=3][color=red]关于开通时间我们不能给您一个准确的答复。[/color][/size][/b][/align][align=left][b][size=3][color=red][color=black]原因一[/color]：供货商要根据订单前后顺序依次开通，如果在您之前供货商手里已经有很多订单。那您只有多等一段时间了。如果在您的订单之前没有订单或者只有几个订单，一般开通时间为1-10分钟。[/color][/size][/b][/align][align=left][b][size=3][color=#ff0000][color=black]原因二[/color]：如果不巧碰上系统恢复慢等问题，也会导致开通时间长。[/color][/size][/b][/align][/size]', '2012-05-03 16:18:08', 293, 16, 0, 0, 0, '', '', 2, 0, 0, 0, 0, 0, 0, 1, 0, '怎样购买点卡？', '怎样购买点卡', '怎样购买点卡？', 0, 'default'),
(59, '账号安全问题建议', '账号安全问题建议', '2012-05-03 16:09:16', 128, 16, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '账号安全问题建议', '账号安全问题建议', '账号安全问题建议', 0, 'default');
INSERT INTO `fcl_articles` (`id`, `title`, `content`, `ndate`, `tick`, `boardid`, `pid`, `hidden`, `stick`, `titlecolor`, `titlelink`, `rank`, `rank0`, `rank1`, `rank2`, `rank3`, `rank4`, `rank5`, `rank6`, `inrecycle`, `webtitle`, `meta_keywords`, `meta_description`, `aid`, `tpl`) VALUES
(60, '搭建自己的卡盟平台', '[align=center][size=4][color=red][b]VIP网站(合作伙伴)介绍[/b][/color][/size][/align][align=center][b][size=4][color=#ff0000][/color][/size][/b][/align][align=center][b][size=4][color=#ff0000][/color][/size][/b][/align][align=center][b][size=4][color=#ff0000][/color][/size][/b][/align][align=center][table=98\\%][tr][td][/td][td][size=3][color=red][b]合作伙伴独立站[/b][/color][/size][/td][td][size=3][color=red][b]系统管理分站[/b][/color][/size][/td][td][size=3][color=red][b]VIP经销分站[/b][/color][/size][/td][td][size=3][color=red][b]核心经销分站[/b][/color][/size][/td][td][size=3][color=red][b]高级经销分站[/b][/color][/size][/td][/tr][tr][td][b][size=3][color=teal]终身价格[/color][/size][/b][/td][td][b][size=3][color=slategray]2000元[/color][/size][/b][/td][td][b][size=3][color=slategray]1500元 [/color][/size][/b][/td][td][b][size=3][color=slategray]1200元 [/color][/size][/b][/td][td][b][size=3][color=slategray]1050元 [/color][/size][/b][/td][td][b][size=3][color=slategray]1000元 [/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]网站域名[/color][/size][/b][/td][td][b][size=3][color=slategray]独立域名[/color][/size][/b][/td][td][b][size=3][color=slategray]独立域名[/color][/size][/b][/td][td][b][size=3][color=slategray]独立域名[/color][/size][/b][/td][td][b][size=3][color=slategray]独立域名[/color][/size][/b][/td][td][b][size=3][color=slategray]独立域名[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]独立网站[/color][/size][/b][/td][td][b][size=3][color=slategray]是[/color][/size][/b][/td][td][b][size=3][color=slategray]是[/color][/size][/b][/td][td][b][size=3][color=slategray]是[/color][/size][/b][/td][td][b][size=3][color=slategray]是[/color][/size][/b][/td][td][b][size=3][color=slategray]是[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]网站备案[/color][/size][/b][/td][td][b][size=3][color=slategray]包备案[/color][/size][/b][/td][td][b][size=3][color=slategray]包备案[/color][/size][/b][/td][td][b][size=3][color=slategray]包备案[/color][/size][/b][/td][td][b][size=3][color=slategray]包备案[/color][/size][/b][/td][td][b][size=3][color=slategray]包备案[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]平台进货商权限[/color][/size][/b][/td][td][b][size=3][color=slategray]有[/color][/size][/b][/td][td][b][size=3][color=slategray]有[/color][/size][/b][/td][td][b][size=3][color=slategray]有[/color][/size][/b][/td][td][b][size=3][color=slategray]有[/color][/size][/b][/td][td][b][size=3][color=slategray]有[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]平台供货商权限[/color][/size][/b][/td][td][b][size=3][color=slategray]免费开通[/color][/size][/b][/td][td][b][size=3][color=slategray]免费开通[/color][/size][/b][/td][td][b][size=3][color=slategray]免费开通[/color][/size][/b][/td][td][b][size=3][color=slategray]免费开通[/color][/size][/b][/td][td][b][size=3][color=slategray]免费开通[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]赠送平台密保卡[/color][/size][/b][/td][td][b][size=3][color=slategray]3张[/color][/size][/b][/td][td][b][size=3][color=slategray]2张 [/color][/size][/b][/td][td][b][size=3][color=slategray]1张 [/color][/size][/b][/td][td][b][size=3][color=slategray]1张 [/color][/size][/b][/td][td][b][size=3][color=slategray]1张 [/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]平台使用视频教程[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]赠送国际顶级域名(1年)价值139元[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]免费赠送[/color][/size][/b][/td][td][b][size=3][color=slategray]无但可以购买[/color][/size][/b][/td][td][b][size=3][color=slategray]无但可以购买[/color][/size][/b][/td][td][b][size=3][color=slategray]无但可以购买[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]网站LOGO设计[/color][/size][/b][/td][td][b][size=3][color=slategray]2个[/color][/size][/b][/td][td][b][size=3][color=slategray]2个[/color][/size][/b][/td][td][b][size=3][color=slategray]1个[/color][/size][/b][/td][td][b][size=3][color=slategray]1个[/color][/size][/b][/td][td][b][size=3][color=slategray]1个[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]加款卡图片设计[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]招收代理图片设计[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][td][b][size=3][color=slategray]1套[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]发展下级系统管理员[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]发展下级VIP经销商[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]发展下级核心经销商[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]发展下级高级经销商[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]不可以[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]发展下级普通直销商[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][td][b][size=3][color=slategray]无限发展[/color][/size][/b][/td][/tr][tr][td][b][size=3][color=teal]月发展代理1000有效代理奖励100元[/color][/size][/b][/td][td][b][size=3][color=slategray]奖励[/color][/size][/b][/td][td][b][size=3][color=slategray]奖励[/color][/size][/b][/td][td][b][size=3][color=slategray]奖励[/color][/size][/b][/td][td][b][size=3][color=slategray]奖励[/color][/size][/b][/td][td][b][size=3][color=slategray]奖励[/color][/size][/b][/td][/tr][/table][/align][align=center][size=5][color=red][/color][/size][/align][align=center][size=5][color=red][/color][/size][/align][align=center][size=3][color=darkgreen][/color][/size][/align][align=center][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=center][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff]平台VIP网站介绍：[/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]1.网站使用自己的域名! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]2.网站的页面风格和形式都由自己来选择决定! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]3.可以在网站上自有商品,同时可以对下级自由屏蔽系统商品! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]4.网站上的联系方式和银行帐号都是代理商自已来提供的! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]5.代理商可以创立自己的品牌和形象! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]6.可以更好地保护自己的客户资源不受外界干扰! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]7.更有利于自己业务的拓展! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]8.赠送卡盟平台强大的供货资源(卡的种类和库存数量都是国内首屈一指的)确保您的发展无后顾之忧! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]9.投入小，不需要投入资金购卡，客户直接提取我们的库存! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]10.可以免备案直接使用顶级域名访问网站![/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]11.包备案! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]12.免费赠送国际顶级域名(.com .net等)(价值138元)! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]13.免保证金开通商品发布权限! [/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff][color=seagreen]14.网站开通后一个月内发展客户达到1000名返还100(最多返3个月)![/color][/color][/size][/b][/align][b][size=3][color=#ff00ff][color=seagreen][/color][align=left][color=seagreen][/color]唯一一点不同的就是网站上的卡库是连接到卡盟平台的数据库里的,而且对于你的客户和外界访客来说是不可能查觉到的![/align][/color][/size][/b][align=left][b][size=3][color=#ff00ff][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff]合作伙伴(VIP网站)收益模式:[/color][/size][/b][/align][b][size=3][color=#ff00ff][align=left][color=green]1.在网上发展代理,赚取点卡差价. [/color][/align][align=left][color=green]2.在当地发展代理,代理去联系当地各大网吧，赚取利润. [/color][/align][align=left][color=green]3.销售平台VIP代理资格. [/color][/align][align=left][color=green]4.其它. 粗略计算,如果仅仅与当地20家网吧合作，则日利润可达100-200元，月利润可达3000-5000元.[/color][/align][/color][/size][/b][align=left][b][size=3][color=#ff00ff][color=#008000][/color][/color][/size][/b][/align][align=left][b][size=3][color=#ff00ff]卡盟平台合作伙伴(VIP网站),开通的条件和流程:[/color][/size][/b][/align][b][size=3][color=#ff00ff][align=left][color=black]1.根据上面详细介绍,选择套餐,然后付费(支持各种方式支付),网站永久免费使用,终身提供免费维护和免费升级! [/color][/align][color=black]2.付费后联系客服提供相关资料。[/color][/color][/size][/b][align=left][b][size=3][color=#ff00ff][color=#000000][/color][/color][/size][/b][/align]', '2012-05-03 16:21:12', 497, 16, 0, 0, 0, '#FF0000', '', 2, 0, 1, 0, 1, 0, 0, 2, 0, '搭建自己的卡盟平台', '', '搭建自己的卡盟平台', 0, 'default'),
(61, '销售合作', '销售合作', '2009-03-14 00:50:19', 25, 16, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(62, '联系我们', '联系我们', '2009-03-14 00:50:19', 6, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(63, '安全设定帮助', '安全设定帮助', '2009-03-14 00:50:19', 1, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(64, '功能说明', '功能说明', '2009-03-14 00:50:19', 1, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(65, '账户充值帮助', '账户充值帮助', '2009-03-14 00:50:19', 5, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(66, '注意事项', '注意事项', '2009-03-14 00:50:19', 2, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(67, '平台卡充值网址', '平台卡充值网址', '2009-03-14 00:50:19', 4, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(68, 'VIP商务', 'VIP商务', '2009-03-14 00:50:19', 4, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(69, '加盟我们', '加盟我们', '2009-03-14 00:50:19', 3, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(70, '各银行网址', '各银行网址', '2009-03-14 00:50:19', 4, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(71, '更多游戏官方查卡地址', '[b][size=4]常用官方查卡网址[/size][/b][table=98\\%][tr][td][url=http://pay.ztgame.com.cn:8888/varCard.php][color=#0000ff]征途/巨人[/color][/url][/td][td][url=http://pay.16288.com/cxye/Default.aspx][color=#0000ff]盛大[/color][/url][/td][td][url=http://pay.163.com/pcard/index.shtml][color=#0000ff]网易[/color][/url][/td][td][url=http://pay.qq.com/paycenter/paycenter_qb.shtml][color=#0000ff]Q币[/color][/url][/td][td][url=http://pay.9you.com/funpay/querycard.php][color=#0000ff]久游[/color][/url][/td][/tr][tr][td][url=https://passport.the9.com/payment/ctl_payment.php?action=searchpc_fill][color=#0000ff]九城[/color][/url][/td][td][url=http://pay.kingsoft.com/index.php?s=fastquery&act=cardvalidate][color=#0000ff]金山[/color][/url][/td][td][url=http://rxjh.17game.com/yikatong/Search.html][color=#0000ff]17Game[/color][/url][/td][td][url=http://pay.hx2004.com/web/CardSystem/Card_StatusQuery.aspx][color=#0000ff]华夏[/color][/url][/td][td][url=http://zfs.gamigo.com.cn/Billing/member_Login.aspx?url=/Billing/card_verify.aspx][color=#0000ff]真封神[/color][/url][/td][/tr][tr][td][url=https://168.91.com/web20/pay/NewSupplyMoney.aspx][color=#0000ff]91卡[/color][/url][/td][td][url=http://bill.gtgame.com.cn/portal/fcLoginAction.do][color=#800080]光通[/color][/url][/td][td][url=http://ucard.catv.net/GameCard/Query/Default.aspx][color=#0000ff]中广网[/color][/url][/td][td][url=http://zfs.gamigo.com.cn/billing/member_Login.aspx?url=/billing/active_card.aspx][color=#0000ff]米果[/color][/url][/td][td][url=http://card.pcikchina.com/ditch/login.php][color=#0000ff]新破天[/color][/url][/td][/tr][tr][td][url=http://pay.henhaoji.com/chaxun.html][color=#0000ff]梦想世界[/color][/url][/td][td][url=http://www.8ze.com.cn/AccountInfoManage/CardQuery.aspx][color=#0000ff]热血[/color][/url][/td][/tr][/table][b][size=4][/size][/b]\r\n[b][size=4]其他游戏查卡方法[/size][/b][table=98\\%][tr][td][b]游戏名称[/b][/td][td][b]查询方法[/b][/td][/tr][tr][td]风云[/td][td]客服查卡QQ：149079239[/td][/tr][tr][td]完美世界[/td][td]官方电话：010-58858889[/td][/tr][tr][td]光宇一卡通（希望Online、问道）[/td][td]5张以上打010-58858877-销售部（可核对密码）；\r\n5张以下打010-58858855查询[/td][/tr][tr][td]金山一卡通（剑侠情缘、封神榜、石器、天下无双）[/td][td]http://kefu.kingsoft.com/personal.htm　　\r\n进去后点“在线提问系统”，然后在“个人服务”那里看客服的回复，客服电话：028-85437733[/td][/tr][tr][td]搜狐一卡通[/td][td]查卡电话：010-68821898（骑士、刀剑亦可查询）[/td][/tr][tr][td]丝路传说[/td][td]查卡电话：010-88577058[/td][/tr][tr][td]挑　　战[/td][td]客服电话：021-51584158[/td][/tr][tr][td]天之游侠[/td][td]客服电话：021-64958967[/td][/tr][tr][td]天之炼狱II[/td][td]客服电话：021-64958976、64958967[/td][/tr][tr][td]金游世界[/td][td]查卡电话：0512-62176545、61875185，查卡QQ：100065151[/td][/tr][tr][td]海盗王[/td][td]客服电话：021-32120377、4007106688[/td][/tr][tr][td]中国移动充值卡（广东）[/td][td]拨打当地 10086 查询[/td][/tr][tr][td]航海世纪[/td][td]客服电话：021-51098500[/td][/tr][tr][td]中国网吧院线[/td][td]客服电话：020-38852044 84660040[/td][/tr][tr][td]激动宽频[/td][td]客服电话：021-64263992[/td][/tr][tr][td]大航海[/td][td]客服电话：4007008899[/td][/tr][tr][td]联众[/td][td]客服电话：029-87669595[/td][/tr][tr][td]天堂II[/td][td]客服电话：021-61006222[/td][/tr][tr][td]远　　航[/td][td]客服电话：0755-33630621、33630620[/td][/tr][tr][td]华夏online[/td][td]客服电话：0755-26544680[/td][/tr][tr][td]洛奇[/td][td]客服电话：021-34144567(只能单张进行查询,不能批量)[/td][/tr][tr][td]街头篮球[/td][td]客服电话:021-34289630 Email:gm@fsjoy.com　[/td][/tr][tr][td]三国群英传[/td][td]客服电话：021-64959798、021-64959966[/td][/tr][tr][td]飚车[/td][td]客服电话：021-52554699[/td][/tr][tr][td]腾仁一卡通（墨香/墨香II/新天地玄门）[/td][td]客服电话：021-61454815　021-61454816　查卡QQ：361122585[/td][/tr][tr][td]海之乐章[/td][td]客服电话：0592-5291398、5391818[/td][/tr][tr][td]久游[/td][td]客服电话：021-63601518[/td][/tr][tr][td]金庸群侠、三国演义online[/td][td]客服电话：010-629606 25[/td][/tr][tr][td]新江湖[/td][td]客服电话：010-58691378[/td][/tr][tr][td]童话[/td][td]客服电话：010-85865573-212[/td][/tr][/table]', '2009-03-14 00:50:19', 11, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(72, '更多游戏官方卡查询地址', '更多游戏官方卡查询地址', '2009-03-14 00:50:19', 5, 11, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 'default'),
(73, '什么是积分及积分奖励规则', '[b]什么是积分及积分奖励规则[/b]\r\n\r\n目前积分主要用于部分商品的兑换，系统定时举行积分活动，如果您在活动期间，积满一定的分数，就可以兑换其它的商品，如果外挂，QQ币，QQ服务或者点卡或者激活码等等', '2009-08-10 10:14:49', 8, 5, 0, 0, 0, '#000099', '', 1, 0, 0, 0, 0, 1, 0, 0, 0, '什么是积分及积分奖励规则 - 本平台', '积分 本平台 会员 用户 级别', '介绍用户如何使用积分，积分如何获取', 0, 'default'),
(81, '如何保护自己的账户安全', '如何保护自己的账户安全', '2009-09-04 07:48:08', 0, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(82, '本平台的购买方式', '本平台的购买方式', '2009-09-04 07:49:00', 0, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(83, '如果购买失败该怎么办', '如果购买失败该怎么办', '2009-09-04 07:49:28', 0, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(84, '成为本平台会员的好处', '成为本平台会员的好处', '2009-09-04 07:50:03', 1, 4, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(85, '会员等级划分', '会员等级划分', '2009-09-04 07:51:09', 1, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(86, '银行支付说明', '[url,0=#1]1.什么是网上银行？[/url]   \r\n[url,0=#2]2.使用网上支付是否安全？[/url] \r\n[url,0=#3]3.在线支付要在消费者银行卡上扣除手续费吗？[/url]   \r\n[url,0=#4]4.怎么快速开通网上银行服务 ？ [/url] \r\n[url,0=#5]5.使用网上银行过程的注意事项？ [/url] \r\n[url,0=#6]6.可以用亲人、朋友的银行卡给我的“[webname]账户”充值吗？[/url]  \r\n[url,0=#7]7.给我的“[webname]账户”充值时需要的支付密码是什么？ [/url] \r\n[url,0=#8]8.使用网上银行给“[webname]账户”充值时，银行收取手续费吗？[/url]  \r\n[url,0=#9]9.网上银行给“[webname]账户”充值了，且显示扣款成功，可为什么我“[webname]账户”里面还是没钱？ [/url]\r\n[url,0=#10]10.在[webname]上购物都需要什么基本条件？[/url]  \r\n[url,0=#11]11.购买时用户如何能够得到安全保障？[/url]  \r\n[url,0=#12]12.[webname]网上购卡，如何配送？[/url]\r\n[url,0=#13]13.如果订单号丢失了，我该怎么查找？[/url] \r\n[url,0=#14]14.如何区别网上支付(银行卡在线支付)和汇款？[/url]\r\n[url,0=#15]15.如果支付失败该如何处理？ [/url] \r\n[url,0=#16]16.网上支付不能成功的可能原因有哪些？ [/url]\r\n[url,0=#17]17.如何保护自己的银行卡（会员）帐号和密码？ [/url]\r\n[url,0=#18]18.点击购买或银行支付按钮后当前页面刷新，没有出现新窗口？[/url] \r\n[url,0=#19]19.购买成功后如何提货以及出现错误怎么办？ [/url]\r\n[url,0=#20]20.银行支付说明 [/url]\r\n[url,0=#21]21.[webname]网上购物流程[/url]\r\n[url,0=#22]22.对银行卡用户的善意提醒 [/url]\r\n\r\n\r\n[b]1.什么是网上银行？[/b] <a name=1></a> [url,0=#top]top[/url]\r\n网上银行是指银行借助网络向客户提供金融服务的业务处理系统。它是一种全新的业务渠道和客户服务平台，客户可以足不出户就享受到不受时间、空间限制的银行服务。\r\n\r\n[b]2.使用网上支付是否安全？[/b]<a name=2></a> [url,0=#top]top[/url]\r\n[webname]用户选择任一银行卡支付，用户点击购买后立即进入银行网关，银行卡资料全部在银行网关加密页面上填写，无论是支付平台还是网站都无法看到或了解到任何相关的银行卡资料，更不会被黑客通过技术手段窃取。\r\n网民输入卡资料提交过程全部采用国际通用的SSL或SET及数字证书进行加密传输，支付系统的安全性由银行全面提供支持和保护，各银行网上支付系统完全可以确保网上支付的安全。银行和[webname]以及用户之间是通过数字签名和加密验证传送信息的，提供层层安全保护，绝对不需担心您的卡上信息外泄。\r\n\r\n[b]3.在线支付要在消费者银行卡上扣除手续费吗？[/b] <a name=3></a> [url,0=#top]top[/url]\r\n部分网关收取的费用不太一样，有些是免费，有些是1％，您在付款的时候，网关上边有手续费提示 \r\n\r\n[b]4.怎么快速开通网上银行服务？[/b] <a name=4></a> [url,0=#top]top[/url]\r\n欲申请网上银行服务可持本人有效身份证件和银行卡，到相应银行的营业网点办理申请网上银行服务的相关手续，也可到相应的银行网站在线申请网上银行服务，但有些银行要求在线申请后，需本人持有效身份证件和银行卡到银行柜台签约才能开通在线支付等网上银行的各种服务，详细情况请查看银行帮助中相应银行的帮助文档。[table=98\\%][tr][td=1,1,26\\%][b]银行[/b][/td][td=1,1,14\\%][b]开通帮助[/b][/td][td=1,1,17\\%][b]网上开通[/b][/td][td=1,1,15\\%][b]银行热线[/b][/td][td=1,1,28\\%][b]说明[/b][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/icbc.jpg[/img][/td][td][url=http://ebuystop.com/article/2.html][color=#0000ff]开通说明[/color][/url][/td][td]需柜台办理[/td][td]95588[/td][td]（接工行通知，2006年8月10日开始，开通工行网上支付功能请先到银行柜台申请电子银行口令卡或U盾） [/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/ccb.jpg[/img][/td][td][url=http://ebuystop.com/article/3.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://ibsbjstar.ccb.com.cn/app/V5/CN/STY1/FB30101_notice.jsp][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95533[/td][td]借记卡和准贷记卡（不含存折）需要到银行进行签约[/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/cmb.jpg[/img][/td][td][url=http://ebuystop.com/article/6.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://pbsz.ebank.cmbchina.com/CmbBank_GenShell/UI/GenShellPC/Login/Login.aspx][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95555[/td][td]电话开通网银 需柜台办理[/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/abc.jpg[/img][/td][td][url=http://ebuystop.com/article/4.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://easyabc.95599.cn/b2c/b2c/ecard/ElecCardLogin.jsp][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95599[/td][td][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/boc.gif[/img][/td][td][url=http://ebuystop.com/article/87.html][color=#0000ff]开通说明[/color][/url][/td][td]需柜台办理[/td][td]95566[/td][td][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/cmbc.jpg[/img][/td][td][url=http://ebuystop.com/article/11.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://ebank.cmbc.com.cn/PAGc40000.html][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95568[/td][td][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/sdb.jpg[/img][/td][td][url=http://ebuystop.com/article/12.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://geren.sdb.com.cn/personal/application/body_applybank_p.htm][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95501[/td][td][/td][/tr][tr][td][img=130,30]http://ebuystop.com/content/mod_shared/skins/upload/gdb.jpg[/img][/td][td][url=http://ebuystop.com/article/14.html][color=#0000ff]开通说明[/color][/url][/td][td][url=http://ebank.gdb.com.cn/comminfo/apply/perbank/index.htm][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]5508/\r\n96000888[/td][td]（网上直接开通仅限于信用卡，借记卡和存折需要到银行签署转账协议才能开通） [/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/cib.jpg[/img][/td][td][url=http://ebuystop.com/article/13.html][color=#0000ff]开通说明[/color][/url][/td][td][url=https://www.cib.com.cn/index.jsp][color=#0000ff]点此直接在网上开通>>[/color][/url][/td][td]95561[/td][td][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/bob.gif[/img][/td][td][url=http://ebuystop.com/article/88.html][color=#0000ff]开通说明[/color][/url][/td][td]需柜台办理[/td][td]010-96169[/td][td][/td][/tr][tr][td][img=121,30]http://ebuystop.com/content/mod_shared/skins/upload/spdb.jpg[/img][/td][td][url=http://ebuystop.com/article/13.html][color=#800080]开通说明[/color][/url][/td][td]需柜台办理[/td][td]95528[/td][td][/td][/tr][/table]\r\n\r\n[b]5.使用网上银行过程的注意事项[/b]  <a name=5></a> [url,0=#top]top[/url]\r\n（1）出现重复多次付款该怎么办？\r\n由于银行未将您的支付信息即时传输给我们，造成对您的重复扣款，我们感到非常抱歉。请您联\r\n系我们，我们将会和银行对账，确认您的扣款，以便及时为您处理。 \r\n（2）打开支付页面，提示“该页无法显示“或空白页，可能是什么原因？\r\n·未升级IE浏览器，致使加密级别过低，无法进入银行系统。\r\n·上网环境或上网方式受限，可能是网络服务商限制，如有条件请更换一种上网方式或环境。\r\n·偶尔网络不通，尝试刷新页面；如果刷新不能解决问题，可能浏览器设置了缓存，请在IE\r\n菜单--工具--Internet选项--点击“删除cookies”和“删除文件”，来清除临时文件。 \r\n（3）我可以用关闭窗口的方式退出网上银行网页吗?\r\n请勿关闭浏览器窗口完成退出。为确保网上银行的连接被安全终止，在完成所有交易后，使用系\r\n统中的“退出”功能退出在线支付服务。\r\n（4）怎样创建和保护我的网上银行密码？\r\n您在创建自己的密码时，请注意以下几点：\r\n·请选择一个不易被他人猜出的密码。勿将密码和个人资料如：生日，姓名，电话号码，门牌号\r\n或其他常用信息相关联。·勿使用与其他网站或电子邮件相同的密码。\r\n·请交叉使用文字和数字并加入大小写，如JE46Gmk9。避免使用重复的字符或连续的数字，如\r\n123456，19821212，mmmmnnnn。 \r\n\r\n[b]6.可以用亲人、朋友的银行卡给我的“[webname]账户＂ 充值吗？  [/b]<a name=6></a> [url,0=#top]top[/url]\r\n可以，只要经过他（她）同意并且持卡人也开通了网上银行业务，您登录[webname]后，都可以给您的“[webname]账户”进行充值。\r\n\r\n[b]7.给我的“[webname]账户”充值有几种方式？[/b] <a name=7></a> [url,0=#top]top[/url]\r\n目前支持一卡通充值卡充值，游戏卡，手机充值卡兑换人民币，网上银行，线下汇款 \r\n\r\n[b]8.在哪里购买一卡通？[/b] <a name=8></a> [url,0=#top]top[/url]\r\n您可以通过各大网点或者合作网吧购买，具体咨询我们的客服\r\n\r\n\r\n[b]9.网上银行给“[webname]账户”充值了，且显示扣款成功，可为什么我“[webname]账户”里面还是没钱？ [/b]<a name=9></a> [url,0=#top]top[/url]\r\n如果充值出现网络故障或没有确认回跳信息现象，可能会出现不能及时到账的情况，这时候请您联系[webname]客服，我们会尽快为您处理。\r\n\r\n\r\n[b]10.在[webname]网上购物都需要什么基本条件？[/b]<a name=10></a> [url,0=#top]top[/url]\r\n只需要有一台能够上网的电脑和能够实时进行支付的银行卡。 \r\n\r\n[b]11.购买时用户如何能够得到安全保障？[/b] <a name=11></a> [url,0=#top]top[/url]\r\n关于安全性问题，您在网站付款过程是在128位数字加密方式下进行的。当您在银行页面进行支付时可以注意到，在您的浏览器右下角会出现“小锁”的标记，这个标志代表您目前的所有操作都是在加密保护模式下完成的，也就是说您的任何私人信息在传送过程中都是安全的，不会被任何第三方窃取。 \r\n[webname]作为专业在线数字商品的网站，货品的全程安全保护，用户的私人信息保密将是我们赖以生存的关键，所以在[webname]购物过程中绝对不会出现您所担心的安全问题。另外，很多数字商品基本都有修改密码的功能，您可以在收到商品后尽快修改密码，以保证您商品的安全。 \r\n\r\n[b]12.[webname]网上购卡，如何配送？[/b]<a name=12></a> [url,0=#top]top[/url]\r\n网银支付可以在支付成功后即时在弹出窗口的页面上看到商品的卡号和密码（不含有在线充值或直充的商品），而且同时卡号和密码也发送到订单中填写的邮箱里，如果是在线充值或直充型商品，可以实时在线将相应商品点数充入客户指定的程序中； \r\n\r\n\r\n\r\n[b]13.如果订单号丢失了，我该怎么查找？[/b] <a name=13></a> [url,0=#top]top[/url]\r\n订单号丢失可以按以下几种情况查找： \r\n1．[webname]会员购买： \r\na．已经成功提货（充值）订单，可以登录[webname]会员中心，到“查看交易记录“中查找即可 \r\nb．未成功提货（充值）订单，用网银支付的用户，由于各银行的查询办法不同，请看各银行的帮 \r\n助：招行 建行 民生 工商 交通 \r\n2．非会员购买： \r\n网银支付成功提货（充值）订单：可到购买商品下订单时填写的邮箱中查找，或者到网上银行查找 \r\n网银支付未成功提货（充值）订单：可到支付银行网上银行查询，由于各银行的查询办法不同\r\n\r\n\r\n[b]14.如何区别网上支付(银行卡在线支付)和汇款？[/b]<a name=14></a> [url,0=#top]top[/url]\r\n网上支付(银行卡在线支付)：是指用户在[webname]下订单，在确认订单页面中部点击付款按钮，弹出网 上银行支付窗口，用户使用银行卡信息在线支付，此过程必须是通过[webname]引导到网上银行支付页面，用 户自行登录到网上银行不能进行网上支付，也不是网上支付。 \r\n汇款：是指到网下的银行/邮局柜台，或自行登录到银行网站的网上银行，将款项直接汇到[webname]提供的银行账户。\r\n\r\n\r\n[b]15.如果支付失败该如何处理？[/b]  <a name=15></a> [url,0=#top]top[/url]\r\n如果您在购物及支付过程中，因为网络等其它原因而中断，这个时候\r\n1.您首先去您使用的银行查看是否对中断的订单进行了支付，如果已支付，那么可通过电子邮件、QQ等方式将您的登陆账号、失败原因等内容发送给我们，我们会优先处理这类问题。\r\n2.如果没有支付，那么您可以在本站重新下达订单，或更换其它时间进行购买。 \r\n\r\n\r\n[b]16.网上支付不能成功的可能原因有哪些？[/b]  <a name=16></a> [url,0=#top]top[/url]\r\n1.电脑没有接入INTERNET或其访问区域受限； \r\n2.IE版本过低，密码位数不足，IE参数设置不正确； \r\n3.在商户网站提交订单后，进入网银在线安全支付平台。您选择好进行网上支付的银行，进行网上支付 的安全系统认证连接时（即点击选择的银行支付通道后），大约需30秒或更长的时间，中途若出现网 络通信故障（上网速度过慢、modem掉线、或在访问受限制的局域网内等），会导致提交中断或失\r\n败； \r\n4.进行网上支付的安全系统认证连接时（即点击选择的银行支付通道后），您进行刷新连接页面的操\r\n作，出现系统提示：“订单重复错误”。该设置是为防止网上的一些不正规的行为导致银行结算的发\r\n生。请重新下订单进行在线支付； \r\n5.输入的银行卡的帐号和密码不正确； \r\n6.使用的支付功能未经过银行认证； \r\n7.银行卡上的金额不足以支付购物款； \r\n8.使用的银行卡不正确等。 \r\n\r\n\r\n[b]17.如何保护自己的银行卡（会员）帐号和密码？[/b]  <a name=17></a> [url,0=#top]top[/url]\r\n（1）尽量使不同场合使用的密码有所区别； \r\n（2）牢记密码数字，如作记录则应妥善保管； \r\n（3）密码不得告诉他人，包括自己的亲朋好友； \r\n（4）在用户登陆或网上支付密码输入时，应防止左右可疑的人窥视； \r\n（5）预留密码时不要选用您的身份证、生日、电话、门牌、吉祥、重复或连续等易被他人破译的数\r\n字。建议选用既不易被他人猜到，又方便记忆的数字； \r\n（6）发现泄密的危险时，及时更换密码； \r\n（7）不定期更换密码。 \r\n（8）注意电脑中是否有键盘记录或远程控制等木马程序，使用病毒实时监控程序和网络防火墙，并注\r\n意升级更新。\r\n（9）使用软键盘输入账号密码能防止键盘记录等工具的非法记录，保证您账号密码的安全。 \r\n\r\n\r\n[b]18.点击购买或银行支付按钮后当前页面刷新，没有出现新窗口？[/b]  <a name=18></a> [url,0=#top]top[/url]\r\n此问题和上网助手有关，请关闭相关软件的屏蔽广告弹出窗口功能，建议不要使用MYIE或腾讯TT浏览器，微软XP2系统也有屏蔽弹出窗口功能。 \r\n\r\n\r\n[b]19.购买成功后如何提货以及出现错误怎么办？  [/b] <a name=19></a> [url,0=#top]top[/url]\r\n支付成功如没有及时收到商品，可2小时内查询邮件，或登陆[webname]在线查询。 \r\n如果在提货过程中有错误或没有提到货，请与我们的客服联系，请您在提问时提供订单号或接受产品时的mail地址，以便相关人员尽快和您处理，减少您等待的时间。? \r\n\r\n\r\n[b]20.银行支付说明：[/b]  <a name=20></a> [url,0=#top]top[/url]\r\n·招商银行在线支付说明： \r\n支持全国31个主要城市地区的“一网通”或者“个人银行专业版”在线实时支付结算。 \r\n·工商银行在线支付说明： \r\n支持全国各地的工行卡用户，首先需要在线申请工行的网上个人银行自助注册，然后在线实时支付结\r\n算。 \r\n·建设银行在线支付说明： \r\n支持全国各地的建行卡用户，首先需要在线申请建行的网上个人银行，然后在线实时支付结算。 \r\n·网银在线支付说明： \r\n支持国内各大银行卡在线进行实时支付结算。 \r\n·支付宝支付说明 \r\n支持国内各大银行卡在线进行实时支付结算。 \r\n\r\n\r\n[b]21.[webname]网上购物流程：[/b]    <a name=21></a> [url,0=#top]top[/url]\r\n\r\n会员购卡：登录会员 -》 选购商品 －》付款 －》页面弹出卡密或者充值结果\r\n\r\n非会员购卡： 选购商品 －》付款 －》页面弹出卡密或者充值结果\r\n\r\n会员购卡好处是以后可以升级到更便宜的价格，而且可以从会员中心查询订单\r\n\r\n[b]22.对银行卡用户的善意提醒[/b]   <a name=22></a> [url,0=#top]top[/url]\r\n[ 1 ] 尽量在不同场合使用有所区别的密码； \r\n[ 2 ] 牢记密码数字，如作记录则应妥善保管； \r\n[ 3 ] 密码不得告诉他人，包括自己的亲朋好友； \r\n[ 4 ] 在用户登陆或网上支付密码输入时，应防止左右可疑的人窥视； \r\n[ 5 ] 预留密码时不要选用您的身份证、生日、电话、门牌、吉祥、重复或连续等易被他人破译的数\r\n字。建议选用既不易被他人猜到，又方便记忆的数字； \r\n[ 6 ] 发现泄密的危险时，及时更换密码； \r\n[ 7 ] 不定期更换密码。 \r\n[ 8 ] 注意电脑中是否有键盘记录或远程控制等木马程序，使用病毒实时监控程序和网络防火墙，并注\r\n意升级更新。', '2009-09-04 07:52:37', 35, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '银行支付说明', '开通网上银行 什么是网上银行 如何开通 如何使用', '介绍网上银行的一些概念，同时告诉玩家如何使用网上银行', 0, 'default'),
(87, '中国银行开通网银详细图解', '[b]中国银行\r\n[/b]   \r\n中国银行网上支付支持卡种：长城信用卡（上海、广东、海南地区的消费者）、借记卡（上海、广东、海南地区的消费者） 以及鹏程卡（广东地区的消费者）。\r\n   \r\n[b]1。如何申请网上银行业务（借记卡）？[/b] \r\n上海地区的客户：中国银行的网上银行分为WEB端和客户端两个版本。前者只要携带本人的身份证件、人民币电子借记卡及对应的活期一本通，以及需要建立网上账户连接的定期一本通（限一本）、长城人民币信用卡（限一张）到中国银行任一网点申请办理个人网上银行功能的开通及账户连接手续，下载相关软件进行正确配置后，即可登录使用；后者需携带有效身份证件（须与办理借记卡时所持证件相同）和长城借记卡前往中国银行任一网点申请办理，原则上在申请次日起算的2个工作日后（星期六、日及节假日不算工作日）可自行从中银在线网站或CA中心网站下载由上海电子商务安全证书管理中心有限公司（简称CA中心）签发的CA证书。详情请登录中国银行上海分行查看个人网上银行使用指南\r\n广东地区的客户：长城系列卡持卡人要享受“在线支付”服务，首先必须请在中国银行广东省分行各营业网点或者网上银行申请在线支付密码。在线申请网上银行请登录中国银行广东分行网站 \r\n1、点击个人服务里的“在线支付申请”\r\n2、阅读《中国银行广东省分行在线支付业务服务条款》，点击“同意”\r\n3、填写开户申请，如实填写姓名、卡号、密码、身份证号码等。点击“确定”   \r\n\r\n[b]2.如何申请网上银行业务（信用卡）？ [/b]\r\n中国银行信用卡本身就具有网上查询和支付的功能，不需要另外申请开通。 \r\n   \r\n[b]3.如何申请网上银行业务（国际卡）？ [/b]\r\n中国银行国际卡本身具有网上支付的功能，如果要进行查询，在中国银行页面申请开通', '2009-09-04 09:44:24', 18, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '中国银行开通网银详细图解 - 本平台', '中国银行 网上银行 开通 支付限额 如何', '如何开通中国银行网上银行，以及一些注意事项', 0, 'default');
INSERT INTO `fcl_articles` (`id`, `title`, `content`, `ndate`, `tick`, `boardid`, `pid`, `hidden`, `stick`, `titlecolor`, `titlelink`, `rank`, `rank0`, `rank1`, `rank2`, `rank3`, `rank4`, `rank5`, `rank6`, `inrecycle`, `webtitle`, `meta_keywords`, `meta_description`, `aid`, `tpl`) VALUES
(88, '新手指南', '1.[url,0=#1][webname]介绍[/url]    \r\n2.[url,0=#2][webname]相比于其他同类型网站的优势在哪里？[/url]   \r\n3.[url,0=#3]在[webname]购物需要什么基本条件？[/url]     \r\n4.[url,0=#4]什么是数字卡？[/url]     \r\n5.[url,0=#5]什么是点卡，什么是在线充值？[/url]    \r\n6.[url,0=#6]购买点卡后要如何为游戏充值？[/url]     \r\n7.[url,0=#7]商品要如何配送？[/url]     \r\n8.[url,0=#8][webname]的购买方式[/url]    \r\n9.[url,0=#9]有银行卡，可为什么不能在线购买? [/url]  \r\n10.[url,0=#11]购买充值型商品时，如何保证充值帐号的安全？[/url] \r\n11.[url,0=#11]如果购买失败，我该怎么办？[/url] \r\n12.[url,0=#12]如果订单号丢失了，我该如何查找？[/url] \r\n13.[url,0=#13][webname]实物礼品的发放时间 [/url] \r\n14.[url,0=#14]我如何知道要买商品的过期时间？[/url] \r\n15.[url,0=#15]如何区别网上支付(银行卡在线支付)和帐号余额支付？[/url] \r\n16.[url,0=#16]一旦购买的商品出现问题怎么办？[/url] \r\n \r\n[b]1.[webname]介绍 [/b] <a name=1></a> [url,0=#top]top[/url] \r\n[website]（简称[webname]，以下同）之所有权和运作权归[webname]所有。[webname]是国内较早针对于个人用户实行在线数字产品销售的销售平台。[webname]销售商品种类齐全，支付方式灵活多样且方便，安全，快捷，实时购买即时提货，是您网上购买数字产品的理想之选。[webname]实行7×24小时全天候在线客户服务，在第一时间为您解决一切问题，[webname]将先进的技术及其精湛到位的服务精神贯彻到底。\r\n\r\n \r\n \r\n \r\n[b]2.[webname]相比于其他同类型网站的优势在哪里？ [/b] <a name=2></a> [url,0=#top]top[/url] \r\n[website]（简称[webname]，以下同）之所有权和运作权归[webname]所有。[webname]是国内较早针对于个人用户实行在线数字产品销售的销售平台。[webname]销售商品种类齐全，支付方式灵活多样且方便，安全，快捷，实时购买即时提货，是您网上购买数字产品的理想之选。[webname]实行7×24小时全天候在线客户服务，在第一时间为您解决一切问题，[webname]将先进的技术及其精湛到位的服务精神贯彻到底。\r\n \r\n \r\n[b]3.在[webname]购物需要什么基本条件？  [/b]<a name=3></a> [url,0=#top]top[/url] \r\n一台连接到网络的计算机和一张已成功申请网上支付功能的银行卡，[webname]购物就是如此简单。\r\n \r\n \r\n[b]4.什么是数字卡？[/b]  <a name=4></a> [url,0=#top]top[/url] \r\n数字卡又称虚拟卡，是与传统实物卡相对应的一种卡类商品的销售形式。利用互联网这个多元数字化的平台，[webname]可为客户提供不需要实物载体的数字商品，无论网络游戏卡还是电话卡、娱乐卡、杀毒卡、教育卡，都能通过数字卡的形式在几秒之内被发送到世界各地。它可以使玩家省去在书报摊和软件店里寻觅各种卡片的劳碌之苦，无论在世界哪个角落，玩家都可足不出户，轻松完成购买。只需一台能上网的电脑，登录[webname]站后通过网上银行实时支付，不到2秒，数字商品的账号和密码就会通过弹出窗口和e-mail发到您的面前，而且一些充值类的商品，还能实现自动在线充值，彻底摆脱时间和空间的限制。\r\n \r\n \r\n[b]5.什么是点卡，什么是在线充值？[/b]  <a name=5></a> [url,0=#top]top[/url] \r\n点卡：购买点卡产品交易成功后，实时在弹出窗口的页面上显示卡号密码，需客户自行充值或使用。在线充值：购买在线充值（即直充）产品交易成功后，系统直接通过程序充值，实时在弹出窗口的页面上显示充值结果，没有卡号密码，更方便快捷，通常购买时需要填写游戏登录名（也可能需要区服信息）进行确认。  \r\n \r\n[b]6.购买点卡后要如何为游戏充值？[/b]  <a name=6></a> [url,0=#top]top[/url] \r\n当您购买点卡以后，可以登陆您要充值游戏的官方网站，按照网站上的提示进行充值。\r\n \r\n \r\n[b]7.商品要如何配送？[/b]  <a name=7></a> [url,0=#top]top[/url] \r\n卡密商品的信息将实时显示在用户的浏览器页面上，同时按照用户意愿发送到用户指定的邮箱中，用户还可以在[会员中心>>订单明细]中查询所有订单的详细资料（包括卡号和密码等）；实物产品将根据用户提交订单时选择的配送方式进行配送。如果是您参与的[webname]的有奖活动，关于实物礼品我们将会通过邮局为您邮寄（每月初，中邮寄两次）。（详情见13条） \r\n \r\n[b]8.[webname]的购买方式 [/b] <a name=8></a> [url,0=#top]top[/url] \r\n目前[webname]支持银行卡在线购买和会员帐户余额购买。银行卡在线购买只要您办理一张[webname]支持的银行卡，在线输入银行卡信息进行支付，即（网银申请帮助）。会员帐户余额支付，就是用您的专用帐户进行支付，您将享受更加安全，方便，快捷的支付。\r\n \r\n \r\n[b]9.有银行卡，可为什么不能在线购买?[/b]  <a name=9></a> [url,0=#top]top[/url] \r\n您在拥有银行卡后，根据不同银行要求，需要在相应银行的网站或柜台进行网上支付功能申请，在相应功能开通后才可以进行在线消费。 （支付购买帮助） \r\n \r\n \r\n[b]10.购买充值型商品时，如何保证充值帐号的安全？[/b]  <a name=10></a> [url,0=#top]top[/url] \r\n购买[webname]的充值型商品时仅需要输入相应的游戏账号登录名，无须输入密码，且未经您允许或公安机关要求[webname]不会把您的登录名提供给第三方，所以您的账号十分安全的。 \r\n \r\n[b]11.如果购买失败，我该怎么办？[/b]  <a name=11></a> [url,0=#top]top[/url] \r\n如果购买过程中，在订单还未支付前由于网络出现问题而导致购买失败，可以重新下订单购买。\r\n如果在线支付过程中，网络出现问题而导致中断，可以立即查询网上银行交易明细，如果银行已经扣款，请与[webname]平台在线客服联系以便相关人员为您处理。\r\n \r\n \r\n[b]12.如果订单号丢失了，我该如何查找？[/b]  <a name=12></a> [url,0=#top]top[/url] \r\n订单号丢失可以按以下几种情况查找：\r\n（1）．[webname]会员购买：\r\na．已经成功提货（充值）的订单，可以登录[webname]会员中心，到“单据明细查询“中查找即可。\r\nb．未成功提货（充值）订单，用网银支付的用户，由于各银行的查询办法不同，请参看各银行的帮助信息：（各银行支付帮助链接）\r\nc．用帐户余额支付的[webname]会员，提货（充值）未成功，用户可登录到[webname]会员中心点击左侧“单据明细查询/帐户资金明细“查询订单号。\r\n（2）．非会员购买：\r\n网银支付成功或未成功提货（充值）订单：可到支付银行网上银行查询，由于各银行的查询办法不同，请看各银行的帮助信息。（支付购买帮助）\r\n \r\n \r\n[b]13.[webname]赠送礼品的发放时间 [/b] <a name=13></a> [url,0=#top]top[/url] \r\n实物礼品：\r\n每月１５－１６号和下月１－３号对当月中奖用户进行实物礼品的发放,例如3月7日中奖会员的礼品将于3月15-16日邮寄发放，3月20日中奖会员的礼品将于4月1-3日发放。\r\n注意：中奖用户在其会员信息中须提交真实有效的姓名、电话、邮寄地址及邮编等信息，[webname]才能把奖品及时有效的邮寄到用户手中，否则后果自负，[webname]不予补发。\r\n卡密礼品：\r\n卡密礼品会在您参与活动的同时实时将卡密发送给您，请参照礼品使用说明使用。\r\n \r\n \r\n[b]14.我如何知道购买商品的过期时间? [/b] <a name=14></a> [url,0=#top]top[/url] \r\n因为我们每种商品的批次不同，同一种商品的过期时间也可能有所不同，所以不能在商品列表中一一列出。 但是当您下订单时，在确认页将看到你要购买商品的过期时间，如果过期时间一项为空，则表示该商品长期有效。\r\n说明：[webname]站系统会自动检测将要达到有效期的商品，一旦发现将会第一时间更换其他批次的同类商品进行销售，对于过期商品将做下架处理。如果您购买后发现商品存在过期的问题，请您随时联系我们，将会第一时间为您做出相应的处理。\r\n \r\n \r\n[b]15.如何区别网上支付(银行卡在线支付)和帐号余额支付？[/b]  <a name=15></a> [url,0=#top]top[/url] \r\n网上支付(银行卡在线支付)：是指用户在[webname]下订单，在确认订单页面点击付款按钮，弹出网上银行支付窗口，用户使用银行卡信息在线支付，此过程必须是通过[webname]引导到网上银行支付页面，用户自行登录到网上银行不是网上支付，也不能进行网上支付，。\r\n帐号余额支付：是指[webname]会员预先向自己的会员帐号进行储值（可以通过银行卡在线支付储值和汇款储值），之后在确认订单页面选择“会员账户余额支付”进行支付。\r\n \r\n \r\n[b]16.一旦购买的商品出现问题怎么办？ [/b] <a name=16></a> [url,0=#top]top[/url] \r\n当您在[webname]任何时间遇到问题都可以联系我们的客服工作人员，将会针对您的问题做出快速，准确，周到的处理或建议。客服电话/24小时 \r\n\r\n\r\n如果您是在购买商品后针对商品或某一笔订单存在疑问，除联系客服人员询问外也可以利用网站的“问题反馈系统”或“订单查询系统”进行相应的自助处理。\r\n对使用[webname]帮助信息所引起的后果，[webname]不作任何承诺。我们只能在此友情提醒：[webname]帮助信息仅供参考。 \r\n \r\n \r\n', '2009-09-04 12:43:04', 21, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '新手指南', '新手网上购卡 如何支付', '新手如果购买点卡，如何付款等', 0, 'default'),
(89, '会员帮助', '1.[url,0=#1]要使用会员身份在[webname]购买商品，应该怎么做？[/url]   \r\n2.[url,0=#2]怎样申请成为会员？[/url]   \r\n3.[url,0=#3]成为[webname]会员的好处是什么？[/url]  \r\n4.[url,0=#4]会员如何进行支付？[/url] \r\n5.[url,0=#5][webname]会员如何进行帐户储值？[/url]   \r\n6.[url,0=#6]为什么要进行帐户储值？[/url]    \r\n7.[url,0=#7]会员等级划分[/url]    \r\n8.[url,0=#8][webname]会员如何进行邮箱认证？[/url]  \r\n9.[url,0=#9]单据查询[/url] \r\n10.[url,0=#10][webname]会员如何自助查询购买商品信息？[/url]   \r\n11.[url,0=#11][webname]会员中心有什么功能？[/url] \r\n12.[url,0=#12]随机码是什么，怎样填写？[/url]  \r\n13.[url,0=#13][webname]服务协议[/url] \r\n14.[url,0=#14]登陆密码忘记后如何找回？[/url] \r\n\r\n[b]1.如何保护自己的银行卡、会员账户和密码? [/b]<a name=1></a> [url,0=#top]top[/url] \r\n1)注册成为[webname]会员。\r\n2)如果使用帐户余额支付，要事先对帐户进行余额充值。\r\n3)无论是使用银行卡或者帐户余额支付，都一定要填写准确的信息，以便于[webname]更好的为您服务。 \r\n\r\n\r\n[b]2.怎样申请成为会员？ [/b]<a name=2></a> [url,0=#top]top[/url] \r\n仔细阅读《[webname]会员协议》，在线填写和提交申请，立刻就能获得[webname]会员身份。在注册成功后请牢记您注册时的用户名、密码以及会员编号（也称会员ID）等重要信息。\r\n\r\n\r\n[b]3.成为[webname]会员的好处是什么？ [/b]<a name=3></a> [url,0=#top]top[/url] \r\n成为[webname]会员后，可以享受到以下服务：\r\n1）可以使用帐户余额支付，能享受产品价格上的最大优惠，并能够更方便和快捷的完成支付过程。 \r\n2）购买产品可获得积分，利用累积的积分可参与[webname]活动乐园各种增值活动。\r\n3）升级到VIP会员可享受更低的商品购买价格。\r\n\r\n\r\n[b]4.会员如何进行支付？ [/b]<a name=4></a> [url,0=#top]top[/url] \r\n1）[webname]为会员提供了两种不同的支付方式，一种是办理一张[webname]支持的银行卡，并在银行网站开通相应的支付功能，便可以在线输入银行卡信息进行支付。[webname]支持的银行卡和支付平台： \r\n\r\n \r\n[table=60\\%][tr][td=1,1,50\\%]财富通支付[/td][td=1,1,50\\%]交通银行（广东）[/td][/tr][tr][td]支付宝支付[/td][td]交通银行（上海）[/td][/tr][tr][td]游戏卡支付[/td][td]北京银行[/td][/tr][tr][td]中国工商银行[/td][td]广州市农信社[/td][/tr][tr][td]中国招商银行[/td][td]广东发展银行[/td][/tr][tr][td]中国农业银行[/td][td]广州市商业银行[/td][/tr][tr][td]中国建设银行[/td][td]深圳发展银行[/td][/tr][tr][td]民生银行签约用户[/td][td]上海农村商业银行[/td][/tr][tr][td]中国银行（广东）[/td][td]浦东发展银行[/td][/tr][tr][td]民生银行民生卡[/td][td]中国兴业银行[/td][/tr][tr][td]中国银行（上海）[/td][td]中国华夏银行[/td][/tr][/table]\r\n \r\n\r\n2）另一种是使用您的会员账户余额进行支付，您将享受更快捷的支付流程和更优惠的商品价格。 \r\n\r\n\r\n[b]5.[webname]会员如何进行帐户储值？ [/b]<a name=5></a> [url,0=#top]top[/url] \r\n登陆会员中心后，您可以通过帐户储值——银行卡在线储值向会员帐户进行储值。使用[webname]帐户余额支付方式，可以让您不用银行卡也可以享受到[webname]在线方便快捷的服务和更优惠的商品价格，只要先在您的会员账户存储一定的金额就能操作。 \r\n\r\n[b]6.为什么要进行帐户储值？ [/b]<a name=6></a> [url,0=#top]top[/url] \r\n有些用户不方便或不习惯多次上网支付，或者当地缺乏[webname]所支持的实时支付方式，这时就可以只使用一次上网支付对[webname]的会员帐户进行储值，然后再用帐户余额购买商品，并且，帐户余额支付比用银行卡支付更方便快捷，不必每次都访问银行网站的支付页面，整个购物流程都可以在[webname]完成，同时现在使用帐户储值可以享受到[webname]的价格优惠。 \r\n\r\n\r\n[b]7.会员等级划分 [/b]<a name=7></a> [url,0=#top]top[/url] \r\n[webname]会员分为普通会员和VIP会员两种级别，新注册会员即为普通会员级别；普通会员累积消费额达到3000元可自动升级为VIP会员。\r\n\r\n\r\n\r\n[b]8.[webname]会员如何进行邮箱认证？ [/b]<a name=8></a> [url,0=#top]top[/url] \r\n登陆会员中心的邮箱认证页面，输入邮箱地址，系统将发送认证码到此邮箱，会员在当前页面输入认证码正确无误后认证即可成功。如果2天内没有收到系统发送的邮件，请您更换邮件地址重新进行认证。\r\n\r\n\r\n[b]9.单据查询 [/b]<a name=9></a> [url,0=#top]top[/url] \r\n单据查询功能可以帮助用户查询账户资金明细、购买单据明细、银行交易明细。以方便用户在对自己的交易产生疑问时进行即时查询。 \r\n\r\n\r\n[b]10.[webname]会员如何自助查询购买商品信息？ [/b]<a name=10></a> [url,0=#top]top[/url] \r\n[webname]会员可登陆会员中心的单据查询页面，点击购买单据明细查看订单内详细的商品信息。 \r\n\r\n\r\n\r\n[b]11.[webname]会员中心有什么功能？ [/b]<a name=11></a> [url,0=#top]top[/url] \r\n用户登陆会员中心后，所能享受到的功能服务如下：\r\n\r\n1）帐户信息：[webname]会员查询帐户信息，修改个人信息及会员帐户密码。\r\n2）邮件认证：[webname]会员邮件认证。\r\n3）帐户储值：为[webname]会员帐户进行储值。 \r\n4）积分清单：查询会员帐户中积分交易信息。 \r\n5）礼品卡：[webname]会员兑换[webname]礼品卡。 \r\n6）单据查询：查询会员帐户资金明细、购买单据明细及银行交易明细信息。  \r\n\r\n[b]12.随机码是什么，怎样填写？ [/b]<a name=12></a> [url,0=#top]top[/url] \r\n随机码是为了保护[webname]会员的用户名和密码不被盗用，而采取的一种再次加密的安全措施，它是随机产生的。随机码由数字组成，在会员每次登录时，都需要按照页面上的随机码提示输入相应的文本框。 \r\n\r\n\r\n[b]13.[webname]服务协议  [/b] <a name=13></a> [url,0=#top]top[/url] \r\n[url=[website]/index.php?m=mod_b2c&a=aggrement]点击查看[webname]服务协议 [/url]\r\n\r\n[b]14.登陆密码忘记后如何找回？ [/b]<a name=1></a> [url,0=#top]top[/url] \r\n如果您还记得注册时填写的密码找回问题和答案，可以点击[webname]首页顶部的“忘记密码”，进入密码找回页面进行自助找回，在输入正确的密码找回问题和答案后，密码将自动发送到您注册的信箱内，进行重置密码即可。\r\n\r\n如果您忘记了注册时填写的密码找回问题和答案，请尽快登陆[webname]客服中心向卡网客服人员寻求在线帮助。', '2009-09-04 13:13:42', 4, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '会员帮助', '会员帮助信息 如何购卡 出现问题怎么办', '告诉用户一些基本信息，以及购卡时候出现问题该如何处理', 0, 'default'),
(90, '安全说明 ', '1.[url,0=#1]如何保护自己的银行卡、会员账户和密码? [/url]   \r\n2.[url,0=#2]我的信息会泄露给他人吗? [/url]  \r\n3.[url,0=#3]如何了解目前的密钥长度是否符合要求？[/url]  \r\n4.[url,0=#4]使用网上支付安全吗？[/url] \r\n5.[url,0=#5]有效防范木马的几种实用招术[/url] \r\n6.[url,0=#6]关于打开浏览器SSL安全配置的选项[/url]   \r\n\r\n\r\n[b]1.如何保护自己的银行卡、会员账户和密码? [/b]<a name=1></a> [url,0=#top]top[/url] \r\n（1）尽量使不同场合使用的密码有所区别；\r\n（2）牢记密码数字，如作记录则应妥善保管；\r\n（3）密码不得告诉他人，包括自己的亲朋好友；\r\n（4）在用户登陆或网上支付密码输入时，应防止左右可疑的人窥视；\r\n（5）预留密码时不要选用您的身份证、生日、电话、门牌、吉祥、重复或连续等易被他人破译的数\r\n字。建议选用既不易被他人猜到，又方便记忆的数字；\r\n（6）发现泄密的危险时，及时更换密码；\r\n（7）不定期更换密码。\r\n（8）注意电脑中是否有键盘记录或远程控制等木马程序，使用病毒实时监控程序和网络防火墙，并\r\n注意升级更新。\r\n（9）使用软键盘输入账号密码能防止键盘记录等工具的非法记录，保证您账号密码的安全。\r\n\r\n\r\n[b]2.我的信息会泄露给他人吗? [/b]<a name=2></a> [url,0=#top]top[/url] \r\n不会，在没有征得用户的同意，[webname]绝对不会把用户的信息泄漏给第三方，请用户放心。\r\n\r\n\r\n[b]3.如何了解目前的密钥长度是否符合要求？ [/b]<a name=3></a> [url,0=#top]top[/url] \r\n您可以按如下方式了解目前的密钥长度是否符合要求：\r\n[img]http://ebuystop.com/content/mod_shared/skins/upload/ie_sec.gif[/img]\r\n\r\n其中：\r\n第一项：版本\r\n第二项为密钥长度，图中显示为“ 128- 位”，如果显示为“ 40- 位”或“ 56- 位”，请点击（）内的“更新信息（ Update-Information ）”进行升级为了方便使用，我们专门为您提供高加密包的直接下载功能，请根据您的机器配置和 IE 版本选择匹配的一项进行下载。\r\n\r\n下载并安装成功后重新启动电脑，您会发现 IE 的密钥长度已升级完成。 \r\nWin2000用户下载128位高加密包 \r\nWin98，IE4.01用户下载128位高加密包? \r\nWin98，IE5.0用户下载128位高加密包 \r\nWin98，IE5.01用户下载128位高加密包? \r\n如果您无法在下载文件中找到匹配项，请登录 \r\n[url=http://www.microsoft.com/windows/ie_intl/cn/download/128bit/intro.asp]http://www.microsoft.com/windows/ie_intl/cn/download/128bit/intro.asp[/url] 进行下载。 \r\n如果您检查密钥位数不是：“密钥长度：128- 位”，可能是由于您的浏览器设置问题，您需要更改您的浏览器设置。\r\n\r\n\r\n[b]4.使用网上支付安全吗？ [/b]<a name=4></a> [url,0=#top]top[/url] \r\n网上支付是通过国内各大银行的支付网关进行操作的，采用的是国际流行的SSL或SET方式加密。安全性是由银行方面负责的，是完全有保证的。网站不收集用户的信用卡资料。当用户需要填写信用卡资料时，实际上已经到达到银行的支付网关。所以，用户不必担心您的信用卡资料会在经由网站泄露。请用户不要在公共场合输入信用卡信息，以防被他人看到您的卡号及密码。如果您需要得到更多与“网上支付安全”方面的信息，请您直接与您的发卡行联系。 另外，我们使用的支付平台，所支持的卡种，不但使用SSL128位加密算法和SET（安全电子交易）协议，还使用PKI（公钥基础设施）作为网站在线支付网旨在线支付系统的安全架构，PKI把公钥密码和对称密码结合起来，在Internet上实行密钥的自动管理，保 证网上数据的机密性、真实性、完整性和不可抵赖性。 进而更加加强了网上支付的安全性。\r\n\r\n\r\n[b]5.有效防范木马的几种实用招术 [/b]<a name=5></a> [url,0=#top]top[/url] \r\n·不随意打开附件\r\n有很多不怀好意的人喜欢把木马加在邮件附件中，甚至把木马和正常文件混合在一起，然后再起上一个具有吸引力的邮件名来诱惑无辜的网友们去打开附件。此外，通过QQ间的文件传递也能发出木马来。因此，我们不可以随便打开陌生人发来的邮件，尤其是其中的附件，而.doc，.exe，.swf的附件更是要小心谨慎。如果实在要打开，可以先把这个附件文件保存到硬盘上，用邮件监控或反病毒扫描一番后再打开。 \r\n·使用杀毒软件\r\n新的木马和病毒一出来，惟一能控制其蔓延的就是不断地更新防毒软件中的病毒库。除开启防毒软件的保护功能外，我们还可以多运行一些其他的软件，如天网等，它可以监控网络之间正常的数据流通和不正常的数据流通并随时对用户发出相关提示。如果我们怀疑机器染了木马，还可以[url=http://download.zol.com.cn]http://download.zol.com.cn[/url]上下载个木马克星来彻底扫描木马，保护系统的安全。主要的木马查杀程序有Trojan Defense、Antiy Ghostbusters、Digital Patrol、PestPatrol、Tauscan、TDS-3 Trojan Defence Suite和Trojan Remover等，而且有的是免费软件，大家下载后可以免费使用。 \r\n·查看文件扩展名\r\n木马的扩展名多数为VBS、PIF等，甚至有的木马根本就没有扩展名。利用这个特征我们只要打开“我的电脑”，依次选择“工具→文件夹选项”命令，再单击“查看”标签，用鼠标向下拖动滚动栏，去掉“隐藏已知文件的扩展名”前的小钩让文件的扩展名显示出来。以后看到扩展名为VBS、PIF等文件时就要多加小心了。 \r\n\r\n\r\n[b]6.关于打开浏览器SSL安全配置的选项 [/b]<a name=6></a> [url,0=#top]top[/url] \r\nSSL是一种国际标准的加密及身份认证通信协议，您用的浏览器就支持此协议。SSL协议使用通讯双方的客户证书以及CA根证书，允许客户/服务器应用以一种不能被偷听的方式通讯，在通讯双方间建立起了一条安全的、可信任的通讯通道。它具备以下基本特征：信息保密性、信息完整性、相互鉴定。 \r\n在https传输协议状态下页面上出现的飘浮小锁，[webname]提醒用户：[webname]使用国际领先的128位加密强度，更完善地保护您的信息。您填写的所有信息都处于128位的加密保护之下，其他人无法看到，请您放心购物。\r\n \r\n[img]http://ebuystop.com/content/mod_shared/skins/upload/ie_set.gif[/img]\r\n', '2009-09-04 13:26:45', 3, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '安全说明 ', '安全说明  网上购物 保障 ssl 128 加密', '网上购物时候，如何保障自己购物安全，保护自己的信息安全', 0, 'default'),
(91, '其它帮助', '其他帮助 \r\n[url,0=#1]1.[webname]礼品卡介绍[/url]  \r\n[url,0=#2]2.什么是积分及积分奖励规则？[/url]  \r\n[url,0=#3]3.什么是积分兑换？[/url]  \r\n[url,0=#4]4.什么是积分抽奖？[/url]  \r\n[url,0=#5]5.什么是月度消费排行？[/url] \r\n[url,0=#6]6.什么是购卡送礼？[/url] \r\n[url,0=#7]7.什么是购卡抽奖？[/url]  \r\n \r\n  \r\n[b]1.[webname]礼品卡介绍 [/b] <a name=1></a> [url,0=#top]top[/url] \r\n什么是礼品卡：\r\n礼品卡是[webname]为会员提供的兑换礼品的专用卡，包括卡号和密码，在礼品兑换页面输入礼品卡的卡号和密码可在弹出的窗口中查看到所兑换的礼品的卡密信息，并参看每款礼品的介绍和使用说明进行使用。\r\n礼品卡的有效期：\r\n每个时间发放的礼品卡都有使用的有效期限，本网站礼品卡发放时都有详细说明，如在使用中遇到问题可以联系[webname]客服\r\n\r\n礼品卡的使用方式：\r\n1）获得礼品卡卡密。\r\n2）非会员注册[webname]会员，并在注册信息填写页输入礼品卡卡号及密码。\r\n3）[webname]会员登陆会员中心，点击礼品卡兑换，输入礼品卡卡号及密码。\r\n4）获得礼品的详细信息，并按使用说明使用礼品。\r\n \r\n \r\n[b]2．什么是积分及积分奖励规则？ [/b] <a name=2></a> [url,0=#top]top[/url] \r\n1)关于积分：积分是[webname]对忠诚用户的奖励积分，[webname]内部将其称为“积分”，使用积分在[webname]有机会获得[webname]为广大用户精心准备的多种礼品。\r\n2)获得积分规则：凡在[webname]消费的顾客，按消费商品的面值而获得积分，即购买了面值10元的商\r\n品，即可获得10个积分，但手机充值卡等个别产品除外，具体依[webname]的规定为准。 从2007年11月28日起凡在[webname]注册的新用户，也可以获得10个奖励积分。 在2007年11月28日以前的获得的积分\r\n（称为原积分），将转换为实行新规则之后的新积分，转换比例为100原积分＝1新积分\r\n3)积分的有效期：积分的有效期为两年，即从2007年11月28日到2009年11月28日。请在积分有效期内使用积分。\r\n4)积分回报礼品内容：具体积分回报礼品种类、数量、使用积分量以[webname]公布的内容为准。由于派送原因，部分礼品只限中国大陆地区用户发放。\r\n5)礼品兑换规则：部分礼品每用户只能兑换一次，所有礼品限量兑换，先来先得，赠完为止。因奖品数量有限，部分奖品可能会被更换。\r\n6)违规问题处理：如果用户利用系统漏洞，作弊等违规方式获得奖品，经[webname]查证后，将不会派发奖品，[webname]有权对该用户名做查封等处理。\r\n7)条款修改权：[webname]有权在必要时修改本服务条款，本服务条款一旦发生变动，将会在重要页面上提示修改内容。\r\n \r\n[b]3.什么是积分兑换? [/b] <a name=3></a> [url,0=#top]top[/url] \r\n积分兑换：积分兑换是[webname]对个人会员的积分回馈计划之一，[webname]会员利用账户中累积德一定数额的积分可以兑换平台上各种游戏周边、最新网游内测号、数码产品、品牌香水等精彩礼品。平台显示礼品图片仅供参考，以实物为准。\r\n \r\n[b]4.什么是积分抽奖？ [/b] <a name=4></a> [url,0=#top]top[/url] \r\n积分抽奖：积分抽奖是[webname]对个人会员的积分回馈计划之一，[webname]会员利用累积的积分可以参与平台上的抽奖活动，不同礼品每次抽取后所要消耗的积分数额不同。中奖结果会在每次抽奖操作成功之后随机显示。平台显示礼品图片仅供参考，以实物为准。\r\n  \r\n[b]5.什么是月度消费排行? [/b] <a name=5></a> [url,0=#top]top[/url] \r\n月度消费排行：[webname]根据上个月[webname]会员的消费额高低对其进行消费排名，消费额排前50名的会员均可得到[webname]平台赠送的精美礼品。每月所设礼品奖项都会在[webname]平台显示，排名不同所获礼品也不同。\r\n  \r\n[b]6.什么是购卡送礼？ [/b] <a name=6></a> [url,0=#top]top[/url] \r\n购卡送礼：购卡送礼是[webname]针对某款产品为个人用户提供的一种增值活动，用户成功购买该产品后即可免费获得指定附送的礼品一份。\r\n \r\n[b]7.什么是购卡抽奖？ [/b] <a name=7></a> [url,0=#top]top[/url] \r\n购卡抽奖：购卡抽奖是[webname]为个人用户提供的一种在线娱乐增值服务。个人用户在[webname]消费完成之后可凭[webname]平台购卡单据号参加抽奖活动，每个购卡单据号只有一次抽奖机会，抽奖结果会在每次操作成功后随机显示。平台显示礼品图片仅供参考，以实物为准 \r\n \r\n', '2009-09-04 13:39:21', 4, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '其它帮助', '其它帮助 积分 兑奖 ', '如果积累积分，如何兑奖以及一些使用说明', 0, 'default'),
(92, '帮助目录总览', '[b]新手指南[/b]  \r\n1.[url=88.html#1][webname]介绍[/url]    \r\n2.[url=88.html#2][webname]相比于其他同类型网站的优势在哪里？[/url]   \r\n3.[url=88.html#3]在[webname]购物需要什么基本条件？[/url]     \r\n4.[url=88.html#4]什么是数字卡？[/url]     \r\n5.[url=88.html#5]什么是点卡，什么是在线充值？[/url]    \r\n6.[url=88.html#6]购买点卡后要如何为游戏充值？[/url]     \r\n7.[url=88.html#7]商品要如何配送？[/url]     \r\n8.[url=88.html#8][webname]的购买方式[/url]    \r\n9.[url=88.html#9]有银行卡，可为什么不能在线购买? [/url]  \r\n10.[url=88.html#11]购买充值型商品时，如何保证充值帐号的安全？[/url] \r\n11.[url=88.html#11]如果购买失败，我该怎么办？[/url] \r\n12.[url=88.html#12]如果订单号丢失了，我该如何查找？[/url] \r\n13.[url=88.html#13][webname]实物礼品的发放时间 [/url] \r\n14.[url=88.html#14]我如何知道要买商品的过期时间？[/url] \r\n15.[url=88.html#15]如何区别网上支付(银行卡在线支付)和帐号余额支付？[/url] \r\n16.[url=88.html#16]一旦购买的商品出现问题怎么办？[/url] \r\n\r\n\r\n[b]会员帮助[/b]  \r\n1.[url=89.html#1]要使用会员身份在[webname]购买商品，应该怎么做？[/url]   \r\n2.[url=89.html#2]怎样申请成为会员？[/url]   \r\n3.[url=89.html#3]成为[webname]会员的好处是什么？[/url]  \r\n4.[url=89.html#4]会员如何进行支付？[/url] \r\n5.[url=89.html#5][webname]会员如何进行帐户储值？[/url]   \r\n6.[url=89.html#6]为什么要进行帐户储值？[/url]    \r\n7.[url=89.html#7]会员等级划分[/url]    \r\n8.[url=89.html#8][webname]会员如何进行邮箱认证？[/url]  \r\n9.[url=89.html#9]单据查询[/url] \r\n10.[url=89.html#10][webname]会员如何自助查询购买商品信息？[/url]   \r\n11.[url=89.html#11][webname]会员中心有什么功能？[/url] \r\n12.[url=89.html#12]随机码是什么，怎样填写？[/url]  \r\n13.[url=89.html#13][webname]服务协议[/url] \r\n14.[url=89.html#14]登陆密码忘记后如何找回？[/url] \r\n\r\n\r\n[b]支付帮助[/b]  \r\n[url=86.html#1]1.什么是网上银行？[/url]   \r\n[url=86.html#2]2.使用网上支付是否安全？[/url] \r\n[url=86.html#3]3.在线支付要在消费者银行卡上扣除手续费吗？[/url]   \r\n[url=86.html#4]4.怎么快速开通网上银行服务 ？ [/url] \r\n[url=86.html#5]5.使用网上银行过程的注意事项？ [/url] \r\n[url=86.html#6]6.可以用亲人、朋友的银行卡给我的“[webname]账户”充值吗？[/url]  \r\n[url=86.html#7]7.给我的“[webname]账户”充值时需要的支付密码是什么？ [/url] \r\n[url=86.html#8]8.使用网上银行给“[webname]账户”充值时，银行收取手续费吗？[/url]  \r\n[url=86.html#9]9.网上银行给“[webname]账户”充值了，且显示扣款成功，可为什么我“[webname]账户”里面还是没钱？ [/url]\r\n[url=86.html#10]10.在[webname]上购物都需要什么基本条件？[/url]  \r\n[url=86.html#11]11.购买时用户如何能够得到安全保障？[/url]  \r\n[url=86.html#12]12.[webname]网上购卡，如何配送？[/url]\r\n[url=86.html#13]13.如果订单号丢失了，我该怎么查找？[/url] \r\n[url=86.html#14]14.如何区别网上支付(银行卡在线支付)和汇款？[/url]\r\n[url=86.html#15]15.如果支付失败该如何处理？ [/url] \r\n[url=86.html#16]16.网上支付不能成功的可能原因有哪些？ [/url]\r\n[url=86.html#17]17.如何保护自己的银行卡（会员）帐号和密码？ [/url]\r\n[url=86.html#18]18.点击购买或银行支付按钮后当前页面刷新，没有出现新窗口？[/url] \r\n[url=86.html#19]19.购买成功后如何提货以及出现错误怎么办？ [/url]\r\n[url=86.html#20]20.银行支付说明 [/url]\r\n[url=86.html#21]21.[webname]网上购物流程[/url]\r\n[url=86.html#22]22.对银行卡用户的善意提醒 [/url]\r\n\r\n\r\n\r\n[b]安全说明[/b]  \r\n1.[url=90.html#1]如何保护自己的银行卡、会员账户和密码? [/url]   \r\n2.[url=90.html#2]我的信息会泄露给他人吗? [/url]  \r\n3.[url=90.html#3]如何了解目前的密钥长度是否符合要求？[/url]  \r\n4.[url=90.html#4]使用网上支付安全吗？[/url] \r\n5.[url=90.html#5]有效防范木马的几种实用招术[/url] \r\n6.[url=90.html#6]关于打开浏览器SSL安全配置的选项[/url]   \r\n\r\n\r\n[b]其他帮助[/b]  \r\n[url=91.html#1]1.[webname]礼品卡介绍[/url]  \r\n[url=91.html#2]2.什么是积分及积分奖励规则？[/url]  \r\n[url=91.html#3]3.什么是积分兑换？[/url]  \r\n[url=91.html#4]4.什么是积分抽奖？[/url]  \r\n[url=91.html#5]5.什么是月度消费排行？[/url] \r\n[url=91.html#6]6.什么是购卡送礼？[/url] \r\n[url=91.html#7]7.什么是购卡抽奖？[/url]', '2009-09-04 13:41:02', 4, 5, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '帮助目录总览', '帮助目录总览 总目录', '帮助目录总览 方便查看 总目录', 0, 'default'),
(98, 'QQ卡', '', '2009-09-05 09:33:46', 0, 18, 0, 0, 1, '#FF0000', 'http://pay.qq.com/paycenter/paycenter_qb.shtml', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(99, '网易', '', '2009-09-05 09:34:26', 0, 18, 0, 0, 0, '#FF0000', 'http://pay.163.com/pcard/index.shtml', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(100, '盛大', '', '2009-09-05 09:34:54', 0, 18, 0, 0, 0, '', 'http://pay.16288.com/cxye/Default.aspx', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(101, '征途/巨人', '', '2009-09-05 09:35:32', 0, 18, 0, 0, 0, '', 'http://pay.ztgame.com.cn:8888/varCard.php', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(102, '金山', '', '2009-09-05 09:36:19', 0, 18, 0, 0, 0, '#FF0000', 'http://pay.kingsoft.com/index.php?s=fastquery&act=cardvalidate', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(103, '中华网(CDC)', '', '2009-09-05 09:39:49', 0, 18, 0, 0, 0, '#FF0000', 'http://bill.cdcgames.net/querycard.aspx', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(104, '久游', '', '2009-09-05 09:42:01', 0, 18, 0, 0, 0, '', 'http://pay.9you.com/funpay/querycard.php', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(105, '九城', '', '2009-09-05 09:43:15', 0, 18, 0, 0, 0, '', 'https://passport.the9.com/payment/ctl_payment.php?action=searchpc_fill', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(106, 'DNF(地下城)', '', '2009-09-05 09:46:33', 0, 17, 0, 0, 1, '#FF0000', 'http://dnf.qq.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(107, '永恒之塔', '', '2009-09-05 09:46:57', 0, 17, 0, 0, 1, '', 'http://aion.sdo.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(108, '剑网3', '', '2009-09-05 09:48:01', 0, 17, 0, 0, 1, '#006600', 'http://jx3.xoyo.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(109, '征途', '', '2009-09-05 09:49:31', 0, 17, 0, 0, 0, '', 'http://zt.ztgame.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(110, '天龙八部', '', '2009-09-05 09:50:00', 0, 17, 0, 0, 1, '', 'http://tl.sohu.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(111, '诛仙', '', '2009-09-05 09:52:39', 0, 17, 0, 0, 0, '', 'http://www.zhuxian.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(153, '赤壁', '', '2009-09-05 17:27:03', 0, 17, 0, 0, 0, '', 'http://chibi.wanmei.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(124, '武林外传', '', '2009-09-05 13:31:42', 0, 17, 0, 0, 0, '', 'http://wulin2.wanmei.com/main.htm', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(125, '星尘传说', '', '2009-09-05 13:34:06', 0, 17, 0, 0, 0, '', 'http://xc.sdo.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(126, '跑跑卡丁车', '', '2009-09-05 13:37:01', 0, 17, 0, 0, 0, '', 'http://popkart.tiancity.com/homepage/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(127, '蜀门', '', '2009-09-05 13:52:42', 0, 17, 0, 0, 0, '', 'http://www.shumenol.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(128, ' LUNA露娜', '', '2009-09-05 15:07:29', 0, 17, 0, 0, 0, '', 'http://www.lunajoy.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(129, '兽血沸腾', '', '2009-09-05 15:08:41', 0, 17, 0, 0, 0, '', 'http://sx.baiyou100.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(130, '穿越火线', '', '2009-09-05 15:10:16', 0, 17, 0, 0, 0, '', 'http://cf.qq.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(131, '神鬼传奇', '', '2009-09-05 15:12:45', 0, 17, 0, 0, 0, '', 'http://sgcq.wanmei.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(132, '亮剑', '', '2009-09-05 15:17:04', 0, 17, 0, 0, 0, '', 'http://lj.zqgame.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(133, '开心OL', '', '2009-09-05 15:22:13', 0, 17, 0, 0, 0, '', 'http://kx.91.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(134, '魔域', '', '2009-09-05 15:31:16', 0, 17, 0, 0, 0, '', 'http://my.91.com/index/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(135, '魔力2', '', '2009-09-05 15:46:15', 0, 17, 0, 0, 0, '', 'http://cg2.9you.com/index.shtml', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(136, 'GT劲舞团2', '', '2009-09-05 15:47:14', 0, 17, 0, 0, 0, '', 'http://jw2.9you.com/web_v2/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(137, '三国志OL', '', '2009-09-05 15:49:13', 0, 17, 0, 0, 0, '', 'http://sol.playcool.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(138, '梦幻西游', '', '2009-09-05 15:53:23', 0, 17, 0, 0, 0, '', 'http://xyq.163.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(139, '热血江湖', '', '2009-09-05 15:56:23', 0, 17, 0, 0, 0, '', 'http://www.rxjh.com.cn/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(140, '冒险岛', '', '2009-09-05 15:59:35', 0, 17, 0, 0, 0, '', 'http://act.mxd.sdo.com/project/v075/index.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(141, '诸侯', '', '2009-09-05 16:03:33', 0, 17, 0, 0, 0, '', 'http://zh.12ha.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(142, '街头篮球', '', '2009-09-05 16:04:57', 0, 17, 0, 0, 0, '', 'http://www.fsjoy.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(143, '封神榜II', '', '2009-09-05 16:21:30', 0, 17, 0, 0, 0, '', 'http://fs2.xoyo.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(144, 'QQ炫舞', '', '2009-09-05 16:23:03', 0, 17, 0, 0, 0, '', 'http://x5.qq.com/index.shtml', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(145, '三国群英传', '', '2009-09-05 16:30:39', 0, 17, 0, 0, 0, '', 'http://sg.iyoyo.com.cn/index.aspx', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(146, '劲舞团', '', '2009-09-05 16:33:31', 0, 17, 0, 0, 0, '', 'http://au.9you.com/web_v5/index.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(147, '巨人', '', '2009-09-05 16:36:25', 0, 17, 0, 0, 0, '', 'http://jr.ztgame.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(148, '完美世界', '', '2009-09-05 16:43:52', 0, 17, 0, 0, 0, '', 'http://world2.wanmei.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(149, '穿越火线', '', '2009-09-05 16:47:31', 0, 17, 0, 0, 0, '', 'http://cf.qq.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(150, '【新云数卡】解说充值未成功可网页关闭了怎么办？', '[b]充值未成功可网页关闭了怎么办？[/b]\r\n\r\n答：系统有自动补单功能，您可以重新点击购卡记录，然后找到您的订单，点击查看，进去后，您可以看到当前的充值结果新过来\r\n\r\n建议您在系统反馈充值结果之前，不要关闭当前网页，如果5分钟还是没有结果，您可以马上联系客服，我们会立刻帮您处理', '2014-05-07 16:25:23', 115, 7, 0, 0, 1, '#FF0000', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(151, '【新云数卡】解说直充产品扣钱了没有到帐怎么办', '由于网络或者游戏官方的原因或者您购卡时的一些错误操作，有可能会造成扣款了，但是没有充进去的现象。如果不幸出现这种情况，请不要慌。前台系统有自动补单的功能，操作方法如下：\r\n\r\n1.购卡记录\r\n2.查看\r\n\r\n进入您对应的订单，系统就会自动补单，如果您已经被扣款的话，您可以在那个页面等待充值结果\r\n\r\n如果长时间未到帐号，您可以马上联系我们的客服', '2014-05-07 16:22:50', 118, 7, 0, 0, 1, '#0066FF', '', 1, 0, 1, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(152, '【新云数卡】PHP？ASPX？哪个好？蓝主在线为你解说', '【新云数卡】PHP？ASPX？哪个好？蓝主在线为你解说', '2014-05-07 11:58:18', 142, 7, 0, 0, 1, '', '', 1, 0, 2, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(154, '魔兽世界', '', '2009-09-05 17:28:43', 0, 17, 0, 0, 1, '', 'http://www.warcraftchina.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(155, '真三国无双OL', '', '2009-09-05 17:29:39', 0, 17, 0, 0, 0, '', 'http://www.wushuangol.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(156, '刀剑英雄2', '', '2009-09-05 17:32:43', 0, 17, 0, 0, 0, '', 'http://dj2.changyou.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(157, '武林外传', '', '2009-09-05 17:35:18', 0, 17, 0, 0, 0, '', 'http://wulin2.wanmei.com/', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(158, '天骄II', '', '2009-09-05 17:36:35', 0, 17, 0, 0, 0, '', 'http://www.tj2.com.cn', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(159, '同时输入多张卡充值', '在一卡通充值页面，您只需要点击那个 “+“号就可以同时输入多张卡了 ', '2009-09-05 18:58:24', 11, 10, 0, 0, 1, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(160, '如何查看充值结果呢？', '建议您购买的时候登录会员，这样子以后可以直接从会员中心查看记录了\r\n\r\n如果您没有登录，那么只需要保存好购卡页面的网址，以后输入这个网址就可以查询记录了', '2009-09-05 19:05:15', 1, 10, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default'),
(161, '为什么说我参数错误？', '如果您家的网速过慢，没有等页面下载完毕就提交的话，有可能造成某些充值参数未填写，而导致充值错误，系统就会反馈“参数错误了“，所以请一定要等商品页面完全显示后，再提交充值', '2009-09-05 19:07:21', 10, 10, 0, 0, 1, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 'default');
INSERT INTO `fcl_articles` (`id`, `title`, `content`, `ndate`, `tick`, `boardid`, `pid`, `hidden`, `stick`, `titlecolor`, `titlelink`, `rank`, `rank0`, `rank1`, `rank2`, `rank3`, `rank4`, `rank5`, `rank6`, `inrecycle`, `webtitle`, `meta_keywords`, `meta_description`, `aid`, `tpl`) VALUES
(198, '【官方交流】怎样把握网吧经营黄金时期', '[align=left]从一些网吧的成功案例分析，网吧在最短的时间内收回成本的关键，就是把握好网吧经营的黄金时期。什么才是网吧经营的黄金时期呢？众所周知，所有的网吧在刚开业时，都会有一个经营上的高峰期，这个经营上的高峰期，就是网吧经营的黄金时期之一。网吧经营高峰期的出现，是一个客观规律，这是网吧消费者的消费习惯决定的。对于中国人来说，都有“喜新厌旧”这个习惯，尤其是经常到网吧消费的顾客，更乐意去体验一家新开的网吧。当一家新网吧开业后，肯定会有很多顾客包括其他网吧的常客，来光顾这家新开的网吧，体验一下“新”的感觉。这时，网吧经营者就可以想方设法充分发挥自己网吧的优势，尽量延长网吧经营高峰期的时间。[/align]\r\n[align=left]根据笔者调查的几十家网吧的情况，一些经营业绩良好的网吧，可以在12-14个月收回网吧的全部投资，在这12-14个月里，所谓的网吧经营高峰时间，大概有6-9个月的时间。对于一些经营业绩特别优秀的网吧，也就是在10个月左右能收回网吧投资成本的，网吧经营的黄金时间可以维持在11个月。[/align]\r\n[align=left]要想把握好网吧经营的黄金时期，让网吧有一个优秀的业绩，网吧经营者必须注意以下几个方面。[/align]\r\n[align=left]第一、给顾客一个良好的第一印象[/align]\r\n[align=left]万事开头难，网吧亦是如此。网吧开业的第一印象，直接影响着网吧未来的经营。一旦顾客对于网吧没有留一下一个良好的第一印象，顾客大量流失之下，利润很难保证。[/align]\r\n[align=left]网吧开业后，给第一批顾客留下的印象，至关重要，这一印象，将是决定一家网吧经营黄金时期长短的重要条件。虽然政府给网吧定义的是一个娱乐机构，事实上，网吧是一个服务场所。网吧在经营中，必须时时考虑到顾客的消费心理和消费趋势。我们网吧老板，在经营网吧时，必须时时以顾客的身份去考虑问题。由于我们国人很在在乎第一印象，因此我们网吧在面向顾客正式营业时，必须做好充分的准备。[/align]\r\n[align=left]在正式营业前，为了检验我们的硬件设备能否正常运行、服务是否周到、管理能否适应网吧的经营，必须进行5-7天的免费试营业。在试营业期间，我们可以向顾客征求一下意见，并及时对网吧的经营做适当的调整。为了加强与顾客之间的联系，可以对提出可行意见的顾客，进行一定的奖励。[/align]\r\n[align=left]在网吧开业这个看似没有什么大学问的事情上，有很多网吧老板却走入了这样一个误区：有一部分网吧老板认为，我投资了几十万甚至上百万在网吧里，早一日营业，可以早一日收回成本。我们可以经常看到一些网吧，一边营业，一边还在装修，还在调试机器。试问，在这样的环境下上网，顾客还会再次光顾吗？边装修边营业的网吧，给顾客的第一印象就是脏、乱、差。顾客看到这样的环境，肯定不会现次光顾，这样，我们就失去了将网吧经营的黄金时期延长的机会。[/align]\r\n\r\n[align=left]和气生财这几字，应用在网吧经营里，特别是网吧开业初期。对于网吧开业初期存在各种问题，“和气”二字可以解决不少问题，这也成为网吧经营中的一条上上计策。网吧开业的初期，总会有一些问题会让顾客不满意，顾客有埋怨是正常的。对于网吧经营者，一定要理性看待顾客的埋怨，当顾客对我们网吧有意见时，一定要尊重顾客，而且要和气的用以下语言应对：“对不起，由于我们刚开业，没有经验，请您原谅，多谢您对我们提出的宝贵意见，我们会立即改进的！同时，欢迎您下次光临！”简单几句话，与听到顾客的埋怨置若罔闻的场面相比，肯定会是两种效果吧！如果你是顾客，你听到网吧员工的解释后，会有什么感想呢？因此，我们要充分利用顾客这一宣传法宝，让他们成为我们网吧的活广告。[/align]\r\n[align=left]因此，良好的第一印象，是网吧生存之根本，也是延长网吧经营高峰时间的法宝！[/align]\r\n[align=left]第二、良好的管理模式[/align]\r\n[align=left]一个网吧，要想有比较可观的利润，离开良好的管理模式也不可能实现的。网吧在开业初期，利用人们“喜新厌旧”的这一特点，可以巩固一大部分稳定的客源。客源前期稳定后，网吧运营中，如果没有良好的管理模式，客源将会大量流失。[/align]\r\n[align=left]运营中网吧的管理，主要是对员工的管理，特别是对服务人员的管理，一定要让服务人员认识到服务是网吧生存的根本。我们在对网吧人员的管理中，一般都忽视了对服务人员的管理和培训工作。在网吧里，服务人员与顾客直接接触，服务人员工作态度的好坏，直接会影响顾客的切身感受。俗话说，好事不出门，坏事传千里，如果网吧的服务人员有一点小小的误会，如果无法妥善处理，将会对网吧的整体形象造成非常大的影响。客户群是一个消息传播很快的信息传播群，也是网吧的上帝，因此，必须加强对服务人员的管理。[/align]\r\n[align=left]网吧的服务人员，在与顾客进行交流时，既使顾客故意发难，服务人员也不能当众与顾客发生争持，要保持一定的风度。网吧是一个经营场所，即使不是我们网吧的错，也一定要主动承担，给顾客一个面子。这样，我们会给前来上网的所有顾客一个榜样，达到吸引人的目的，更可以成为网吧经营的一个亮点！[/align]\r\n[align=left]第三、灵活多变的经营策略[/align]\r\n[align=left]网吧要想保持良好的上座率，不断延长网吧经营高峰期的时间，必须要有灵活多变的经营策略做支持。随着周围网吧数量的增多，我们必须以灵活多变的经营策略，弥补我们在硬件设备上的不足。新开的网吧，硬件设备和网吧环境，肯定比老网吧要优越许多，因此，我们只能以经营策略弥补。[/align]\r\n[align=left]对于新增加的网吧，由于在运营初期没有形成固定的客户群，我们必须在其客户群未扩大之前，制订出一定的经营策略，来稳定自己网吧的客户群。面对新网吧的开张，我们不要养成去抢人家客户的误区，面对竞争对手的开张，我们首先做的就是要稳定自己的客户群。同时，我们要充分发挥自己的优势，打造出属于自己网吧情况的特色经营模式，才能吸引顾客，稳定客户群。在制订经营策略时，千万不要盲目降价，谁先降价，谁就失去了经营上的先机。我们在价格策略上，要实行宁送不降的原则。[/align]\r\n[align=left]其实，价格策略中的“宁送不降”也是大有学问可讲的。如果本地网吧的上网价格维持在2.5元每小时，有一家网吧降价后为2元每小时。为了减轻降价对自己网吧带来的冲击，可以打出充值50元送5小时上网时间的策略。充值时，依旧按照2.5元每小时的价格，最后送出5小时的上网时间，综合一下，上网价格仍然是2元每小时。利用充值送上网时间的策略，不仅会吸引用户来充值，而且还变相的降价，抑制了竞争对手。[/align]\r\n[align=left]在日常的网吧经营中，如果一味沿袭原有的经营策略，也会让顾客渐生厌倦。为此，除了灵活多变的经营策略之外，网吧经营过程中，还必须要有花样不断的活动穿插其中，只有这样，才能牢牢拴住顾客的心。不然，一旦附近有新网吧开张时，客户自然会跑到新网吧去观察一下有什么优惠。客人一旦跨入新网吧，想重新将客人，纳入自己旗下，就有一定的难度了。因此，灵活多变的经营策略，是稳定客源的法宝。[/align]\r\n[align=left]综上所述，要想延长网吧经营高峰的时期，必须将上述三方面的工作做好，而这三方面始终都离不开对网吧的管理。因此，网吧要想有良好的利润保障，必须把握网吧经营的黄金时期，而把握网吧经营黄金时期，只能依靠良好的管理[/align]', '2013-01-21 18:50:16', 3, 7, 0, 0, 1, '#000066', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【官方交流】怎样把握网吧经营黄金时期', '【官方交流】怎样把握网吧经营黄金时期', '【官方交流】怎样把握网吧经营黄金时期', 0, 'default'),
(199, '【防骗须知】警惕上当受骗，代理们请主动了解', '[align=left][b][font=楷体_GB2312][size=4][font=宋体]亲爱的代理们：[/font][font=Arial][/font][/size][/font][/b][/align]\r\n[align=left][b][font=楷体_GB2312][size=4][color=#000000][font=宋体]半随着卡盟行业的发展趋势日益壮大[/font][font=Arial],[/font][font=宋体]全中国不下上万个卡盟平台吧。[/font][font=Arial] [/font][font=宋体]其中也有很多卡盟在浑水摸鱼[/font][font=Arial],[/font][font=宋体]四处行骗。[/font][font=Arial] [/font][font=宋体]欺骗你们的无知！[/font][font=Arial] [/font][font=宋体]基本上每天都有卡盟在倒闭[/font][font=Arial],[/font][font=宋体]供货商在跑路[/font][font=Arial],[/font][font=宋体]最终损害的是你们的利益[/font][font=Arial],[/font][font=宋体]心灵的创伤[/font][font=Arial],[/font][font=宋体]我到底还该不该相信卡盟呢？[/font][font=Arial] [/font][font=宋体]其实很简单[/font][font=Arial],[/font][font=宋体]要想做个的代理！！[/font][/color][/size][/font][/b][/align]\r\n[align=left][b][font=楷体_GB2312][size=4][color=#000000][font=宋体]首先：一个卡盟是很重要的！[/font][font=Arial] [/font][font=宋体]选一个卡盟并不是只要求什么开钻的速度[/font][font=Arial],[/font][font=宋体]便宜[/font][font=Arial],[/font][font=宋体]补单快！[/font][font=Arial] [/font][font=宋体]那你们就错了[/font][font=Arial],[/font][font=宋体]小便宜吃大亏[/font][font=Arial],[/font][font=宋体]便宜？[/font][font=Arial] [/font][font=宋体]比如说：你开一年的钻[/font][font=Arial],[/font][font=宋体]有些卡盟给你开一个月或者[/font][font=Arial]2[/font][font=宋体]个月不等的钻[/font][font=Arial],[/font][font=宋体]这就叫便宜[/font][font=Arial],[/font][font=宋体]开了钻不到几天就掉了？这就叫速度[/font][font=Arial],[/font][font=宋体]叫便宜！！！[/font][font=Arial][/font][/color][/size][/font][/b][/align]\r\n[align=left][b][font=Arial][/font][font=楷体_GB2312][size=4][font=宋体]还要注意的是：[/font][font=宋体]卡盟的客服态度好不好？[/font][font=Arial] [/font][font=宋体]售后好不好？[/font][font=Arial] [/font][font=宋体]信誉好不好？[/font][font=Arial] [/font][font=宋体]管理好不好？[/font][font=Arial] [/font][font=宋体]为什么要注意这些呢？[/font][font=Arial] [/font][font=宋体]因为：俗话说[/font][font=Arial],[/font][font=宋体]上梁不正[/font][font=Arial],[/font][font=宋体]下梁歪！[/font][font=Arial][/font][font=宋体]如果你一个卡盟的客服都当不好[/font][font=Arial],[/font][font=宋体]怎么来管理代理？[/font][font=Arial] [/font][font=宋体]怎么来管理卡盟？[/font][font=Arial][/font][font=宋体]卡盟管理不好了[/font][font=Arial],[/font][font=宋体]就等着倒闭吧！[/font][font=Arial][/font][/size][/font][/b][/align]\r\n[align=left][b][font=楷体_GB2312][size=4][font=宋体]请大家选择代理的时候[/font][font=Arial],[/font][font=宋体]一定要认真选择一个负责的卡盟[/font][font=Arial],[/font][font=宋体]每次加款[/font][font=Arial],[/font][font=宋体]尽量不要加太多[/font][font=Arial],[/font][font=宋体]万一卡盟跑路了怎么办？[/font][font=Arial] [/font][font=宋体]你就等着吃亏吧！[/font][font=Arial] [/font][font=宋体]所以，扬帆数卡在这里提醒大家[/font][font=Arial],[/font][font=宋体]认真选择卡盟。[/font][/size][/font][/b][/align]', '2013-01-21 18:51:11', 0, 14, 0, 0, 0, '#FF00FF', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【防骗须知】警惕上当受骗，代理们请主动了解', '【防骗须知】警惕上当受骗，代理们请主动了解', '【防骗须知】警惕上当受骗，代理们请主动了解', 0, 'default'),
(200, '【官方交流】一些骗术揭秘 网赚新手必看', '[size=3][color=#0000ff]俗话说：骗人之心不可有，防人之心不可无。作为卖家，我在诚信防骗居中学到了许多知识也看过很多骗术，现将一些常见骗术曝光如下。让我们在品味收获的喜悦时，不忘记崩紧一根弦。\r\n\r\n[/color][/size][b][color=#ff0000]案列一：金蝉脱壳——发货在先陷阱多[/color]\r\n[/b]\r\n　　拿货开溜：各位卖家在交易时，切不可着急出货。有的买家谎称自己不会使用支付宝，收到货后用银行汇款，只要货一发出，这买家就人间蒸发。一定要强烈支持支付宝，或款到货。\r\n\r\n　　骗取半价：有的买家称信不过卖家，先付一半的货款，作为定金，货到后再付余款。卖家一定不要相信对方，因为只要你的货发出，那一半的货款是可能收不回来的。\r\n\r\n　　谎称付款：卖家切记在发货前要查看交易状态买家是否付款。有些买家在旺旺上留言谎称已付款，有些粗心的卖家不看交易状态就轻易相信，造成损失。\r\n\r\n　　真传假汇：有买家把银行的汇款单传真过来，卖家要在查清汇款是否到帐后再发货，因为有些传真来的汇款单是假的。\r\n\r\n[b][color=#ff0000]案列二：瞒天过海——同城交易有猫腻[/color]\r\n\r\n[/b]　　有的买家与卖家同城交易后，却申请支付宝退款，理由是“没有收到货”，卖家自然是无法提交发货凭证的，只好吃哑巴亏。\r\n\r\n　　还有买家联合快递来行骗。让快递到卖家处拿，等卖家把东西一交，骗子立刻在支付宝申请退款，说没发货。\r\n[color=#0000ff]\r\n[b]提醒卖家：[/b]为了杜绝任何受骗的可能，同城交易时最好让对方写下收据，并防上假钞。[/color]\r\n\r\n[b][color=#ff0000]案列三：移花接木——退货之后藏隐患[/color]\r\n[/b]\r\n　　如果买家要求退货，一定要在收到货后再退款。如先退款，可以再也见不到你的货了。一定要严格按流程走，收到退货后再退款或换货，为了防止买家在货物上做手脚（听说有的邮回来报纸，砖头等），一定要当着快递面拆开，再签字。\r\n\r\n[b][color=#ff0000]案列四：借刀杀人——木马钓鱼搞破坏[/color]\r\n\r\n[/b]　　如果有买家向你发来一个陌生网址问“你有这个商品吗”或要求团购在其网站上进行注册等等。很可能你就把木马带回了家，或是钓鱼网站。如果你在一个假冒的网上银行页面上输入帐号和密码，你就危险了。\r\n\r\n　　所以，数字证书、防杀毒软件一个也不能少！\r\n\r\n[b][color=#ff0000]案列五：暗渡陈仓——破解密码占已有[/color]\r\n[/b]\r\n　　卖家一定要设置并管理好自己的密码，登录号、支付工具号、注册邮箱密码等。切不可图省事全用一个密码，让骗子有机可钻。发现异常情况要及时与客服联系。\r\n\r\n　　作为卖家的你，也许未遇到上述情况，但就像在人多的地方保护好自己的钱包一样，我们要时刻提高警惕。世上好人多，信任、理解和沟通是最重要的。但积极防范也不是坏事。我把骗术拿出来晒晒，让所有的卖家警惕，让骗子无处藏身。\r\n\r\n[b][color=#ff0000]案列六：使用photoShop制作的付款截图[/color]\r\n[/b]\r\n此骗术是对方拍下您的商品，马上发来一个“买家已付款等待卖家发货”的photoShop制作的付款截图然后不段的催促你发货，如果您看到这个截图没在去管理中心或查看邮件通知就发货给买家，那么很有可能就上当了。所以无论对方如何催促，一定要在自己在“我的淘宝”看到“买家已付款等待卖家发货”才能发货！\r\n\r\n[b][color=#ff0000]案列七：李代桃僵－－退款吃小亏占大便宜[/color]\r\n[/b]\r\n这个骗局是非常有迷惑性的，假如说你跟卖家说好了买一个300元的充值卡，卖家答应你便宜到280元，然后他骗你说，你先付300元，然后他用部分退款的功能退给你20元。\r\n\r\n假如你买了卖家2件东西，要求合并邮费，他会说让你先付全款，然后在部分退款中退掉一次邮费。\r\n\r\n这个上当其实跟上面的确认收货是一个道理，因为部分退款是在确认收货的前提下的，也就是你申请退款的时候已经确认了收货。\r\n\r\n那么假如你上当了，你就是收到了确实有20元退款，280元却不见了，手机上也没有300元的话费冲进来。\r\n\r\n或者你省下来10块钱邮费，结果所有的货款一去无回，什么也没收到 \r\n\r\n淘宝同样管不了，因为你“确认收到货以后申请部分退款”。描述：除非收到货，不可以选“收到货部分退款”\r\n\r\n[color=#0000ff][b]结论：[/b]所有的讨价还价要在付钱之前就搞定，然后叫卖家改好数目你再付款，当然，不可以“即时到帐”。[/color]\r\n\r\n[b][color=#ff0000]案列八：明修栈道－－可恨之极```[/color]\r\n[/b]交易谈好以后，他说自己没有财付通，要求用银行直接汇款给你，只要卖家将自己的银行帐号告诉他，他马上就会用该帐号登陆网银，然后乱输密码，直到当天错误密码达到最高次时告诉你，他的款已经汇过去了，让你查一下。多数卖家都是直接网银查帐的，这时卖家再登陆时发现密码错误无法查帐（一头雾水ING），骗子买家会一直不停地催你发货，说已经汇了款了，要求你马上发货。对一些新卖家他们还会用一些激将法。\r\n\r\n[color=#0000ff][b]点评：[/b]新卖家，急于成交生意的，经常做虚拟商品销售的（因为发货就是发卡号或者密码之类的）容易被骗。\r\n\r\n[b]拆招：[/b]1、告诉他现在网银无法登陆，只要他转了帐，明天查明到帐以后再发货不迟，至于他再说其它的，可以选择性无视他。 [/color]\r\n[color=#0000ff]2、使用手机银行查帐，现在多家银行都开通了手机银行或者电话银行，花块钱查下帐以免被骗也不错（销售卡类的卖家可能还赚不到这一块钱的电话费）。[/color]\r\n[color=#0000ff]3、一般这样的卖家都是使用的网银，所以最好的办法就是告诉他花一分钟注册一个支付宝吧，支付宝在线转。一来文明宣传一下支付宝，二来还有信誉可以赚，三来也避免被骗，一举三得。[/color]\r\n\r\n[b][color=#ff0000]案列九：抛砖引玉-- 借古讽今瞒天过海式[/color]\r\n[/b]买家利用相似的账号进行行骗。比如某买家账号为lucky108，拍下商品并用支付宝付款，这个时候一个叫lucky1O8的买家会用旺旺给买家留言：“已经付款，请把货发到××××××，邮编××××××”。卖家一看的确已经付款，就按照旺旺留言的地址发货。几天以后买家lucky108说还没有收到货，卖家仔细检查并查询邮局才发现，lucky108和lucky1O8的地址并不一样，是两个完全不同的账号，尽管账号名称很像。\r\n\r\n[color=#0000ff][b]对策：[/b]卖家发货之前一定要核对付款人的地址，发现不符要及时联系买家[/color]\r\n\r\n[b][color=#ff0000]案例十：栽脏嫁祸－－三角骗术新变种[/color] \r\n[/b]骗子冒充淘宝高级点卡卖家发布一些在价格或优惠上极具诱惑的点卡，手机卡，或主动通过群、临时会话等联系买家，当买家向其联系购买点卡商品时，他会发给买家一个链接要求买家去拍下（注意：该链接并非他自己店铺内的商品，而且一定与买家欲购的点卡类型不同而且是自动发货商品，如手机卡他很可能要买家去拍骏网一卡通等）当买家拍下付款后，卖家就会巧妙地以种种理由帮买家充值，从而达到骗取卡密的目的。\r\n\r\n因为骏网一卡通的通用性，骗子往往以它为行骗工具！因为它能冲的游戏太多了。\r\n\r\n[b]举个示例：\r\n[/b]\r\n骗子往往在高级点卡卖家不在的时候，冒充高级点卡卖家通过旺旺群或临时会话联系买家，说他有一批手机充值卡低价促销（为什么选手机充值卡做诱饵？道理很简单，因为市面上的手机充值卡是很少打折的，而且使用的人群巨大），这时候就会有一些买家向其买卡，这时候他就会把骏网一卡通的链接发给买家（是高级点卡卖家店里的），并不忘记叮嘱一句：“你得赶快购买，因为太强手，支付慢了就没有货了。有些买家由于贪图心趋势，仅仅看了看卖家的信用，连商品名字都不看就拍下支付了；有些买家还好点，发现商品不对，于是就问：“不对呀，怎么是骏网一卡通呀，能冲手机吗？”，这时骗子就会说：“当然能了，要不怎么叫一卡通呢？”还有一些买家会问：“怎么是骏网一卡通呀，这是用来充值游戏的呀，你骗人的吧！”对这种情况，骗子也有招：“那能呢？我的信用你不是看了吗，主要是因为，摆这个好卖一点，这是策略，其实东西都是一样的。”当买家被骗子说服支付后，发现根本充不了手机（骏网一卡通根本不能充值手机），很快就会找骗子理论，骗子于是就会说“应该不会的，要不你把卡密发过来，我帮你充值好了，一般在我这里购买手机充值卡的买家，都是主动让我帮其充值的。”被真实卖家信用蒙蔽的买家一般情况下便欣然接受。还有一些少有警惕的买家会问：”怎么能把卡密发给你呢？骗人的吧，肯定是你的卡密有问题“,这时候骗子就说了：“也许你说的对，系统有时候会发错，我这里有卡密的备份，需要核对一下，你把卡密发过来吧，真是错了，我赔偿你。”对自动发货不懂的买家往往也很快上当。当骗子收到买家的卡密时，便消失了，接下来的时间受骗的买家就会找真实的卖家去评理了，投诉加差评，甚至还有威胁和恐吓，可以想象，对真实卖家来说将是一场噩梦！ \r\n\r\n[b]买家应吸取的教训：[/b]卖家以超低价促销商品很可能是一场骗局；交易时应仔细查看拍下的商品与需要购买的商品是否一致，联系卖家时应以旺旺号码为唯一辨别身份标志。 \r\n\r\n[b]卖家应吸取的教训：[/b]对出售的商品应进行尽可能准确详细的描述，必要情况下对买友进行防骗上的警示！', '2013-01-21 23:19:01', 0, 14, 0, 0, 0, '#FF00FF', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【官方交流】一些骗术揭秘 网赚新手必看', '【官方交流】一些骗术揭秘 网赚新手必看', '【官方交流】一些骗术揭秘 网赚新手必看', 0, 'default'),
(201, '【官方交流】如何保证您的利润多元化，经销商必看！', '[align=left][size=2][font=Arial][color=#ff0000]点卡市场竞争激烈专职卖家怎样才能获得利润？[/color][/font][/size][/align]\r\n[align=left][size=2][font=Arial]很多顾客事实上都已经有了同样的答案，网上市场恶性竞争，利润低微，大力发展终端的网吧和个人成为您的下级顾客，利润会相对较高点！[/font][/size][/align]\r\n[align=left]本平台批发系统分为多个等级（鼓励经销商在自己售卡的同时，多发展下级顾客，特别是多发展终端的网吧以及个人，保证您的利润多元化）：[/align]\r\n[align=left]优点一：经销商可通过系统直接给顾客在线冲值，冲完后到冲值记录复制成功信息 \r\n优点二：经销商可以通过系统发展自己的下线，可以向下线收款，并且给下线转款 \r\n优点三：经销商可以给自己发展的下线制定销售价格，利润自己定制，自动提成！[/align]\r\n[align=left]       只要您发展的顾客，在平台注册时，上级填您的平台编号就可以拉，系统自动提成差价利润，换句话说他就是您的下级顾客拉，就这么简单！！[/align]\r\n', '2013-01-21 23:21:08', 0, 14, 0, 0, 0, '#FF0066', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【官方交流】如何保证您的利润多元化，经销商必看！', '【官方交流】如何保证您的利润多元化，经销商必看！', '【官方交流】如何保证您的利润多元化，经销商必看！', 0, 'default'),
(202, '【加盟我们】您想拥有像我们这样的点卡平台吗？', '[b][color=#ff0000]加盟 搭建和本卡盟一样的网站！永久使用\r\n\r\nVIP网站介绍：\r\n搭建VIP网站：就是通过技术手段实现让您拥有独立的域名、空间、程序，是一个独立的网站系统，VIP网站负责人可以自行发布系统新闻、广告等，从而拥有一个独立的网站。网站搭建完成后的卡库是对接多卡网的库存，免去了你联系各点卡渠道和库存押金，风险降至最低。同时也可以任意屏蔽官方货源，VIP网站负责人可以自行发布商品，以及面向全系统供货。只需交纳少量的网站建设费用，您就可以拥有自己的网站，自己的域名，自己的LOGO，用户登陆的是您的网站，完全看不出是对接多卡网的货源，解决您的后顾之忧，您宣传的是您的网站，推广您自己的平台，我们为您提供线上支付、线下打款等多种方式账户充值及提现，从支付、购买、转钱、销售等过程系统自动记录，并生成报表；各种记录报表查询一目了然。充值网站建设好后您就可以在互联网上开拓自己的事业。\r\n\r\nVIP网站优势：\r\n1、网站名称和网址（顶级域名）自己定； \r\n2、网站首页独立发布公告，广告等；\r\n3、网站智能解析，电信、网通共用一个地址；\r\n4、网站上的联系方式和银行帐号都是自已定；\r\n5、网站可以自行发布商品，可以自由屏蔽我们的商品；\r\n6、网站直接对接多卡网的所有商品，免库存、免找点卡供货渠道；\r\n7、网站不管外观还是内部，外人完全无法辨认你是VIP网站。\r\n\r\n\r\nVIP网站收益模式：\r\n1、在网上发展代理，赚取点卡差价和加盟费。\r\n2、与各大网吧合作为网吧提供点卡销售平台，这个利润非常大。\r\n3、销售VIP网站。赚取建站费用。\r\n4、其它。\r\n\r\n粗略计算：\r\n如果仅仅与当地20家网吧合作，则日利润可达100-200元，月利润可达3000-5000元。\r\n\r\n搭建VIP网站收费标准：\r\n架设VIP网站预收费：888元 完成目标任务全额返还\r\n\r\n建站扶持政策：\r\n1.免费提供二级域名永久免费使用！\r\n2.免费赠送顶级域名(.com net等)，价值150元！\r\n3.免费提供ICP代备案！\r\n4.免交保证金永久开通发布商品权限，价值100元！\r\n5.免交保证金永久开通自由转账功能，价值50元！\r\n6.免费制作5张平台加款卡图片与4张平台加盟图片\r\n\r\n建站奖励政策，免费赠送网站：\r\n只要符合以下条件，建站费用全部返还。\r\n\r\n政策介绍：\r\n2012年04月01日后搭建VIP网站用户，将享受每发展一个有效下级用户补助1元钱的奖励政策，每个VIP网站最高返还888元。不限时间，分4次返还每次222元，每增加222名下级返还一次，达到要求申请返还，5个工作日内到账。\r\n\r\n备注说明：活动期内新建的VIP网站不限时间，累计达到任务目标即可返还全部建站费用。\r\n\r\n返还建站费用要求与说明：\r\n1.故意刷号，直接取消返现资格。\r\n2.无效账户不统计 包括未开通账户与无消费记录账户\r\n3.其他合理要求 另行添加彻底杜绝作弊\r\n\r\n防作弊技术手段：\r\n\r\n特别增加新用户注册时系统自动获取ip地址与电脑硬件码，正常代下级注册账户不受影响。[/color][/b]', '2013-03-03 21:04:44', 2, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【加盟我们】您想拥有像我们这样的点卡平台吗？', '【加盟我们】您想拥有像我们这样的点卡平台吗？', '【加盟我们】您想拥有像我们这样的点卡平台吗？', 0, 'default'),
(203, '【新云卡】-演示站-测试批发系统公告', '[size=4][color=red]【新云卡】-演示站-测试批发系统公告[/color][/size]\r\n \r\n[size=4][color=cyan]测试账号admin密码aa123456[/color][/size]\r\n \r\n[size=4][color=cyan]如果错误，请联系蓝主QQ[color=red]936992497[/color]获取[/color][/size]\r\n \r\n[size=4]官网新云数卡销售：[/size][url=http://www.xybss.com.cn][size=4][color=magenta]www.xybss.com.cn[/color][/size][/url]\r\n \r\n[size=4]旗下淘宝网：[/size][url=http://52yma.taobao.com][size=4]http://52yma.taobao.com[/size][/url]\r\n', '2014-03-31 13:06:02', 0, 7, 0, 0, 0, '#FF0033', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】-演示站-测试批发系统公告', '【新云卡】-演示站-测试批发系统公告', '【新云卡】-演示站-测试批发系统公告', 0, 'default'),
(204, '【新云卡】-演示站-测试行业系统公告', '[size=4][color=red]【新云卡】-演示站-测试行业系统公告[/color][/size]\r\n[size=4][color=cyan]测试账号admin密码aa123456[/color][/size]\r\n[size=4][color=cyan]如果错误，请联系蓝主QQ[color=red]936992497[/color]获取[/color][/size]\r\n[size=4]官网新云数卡销售：[/size][url=http://www.xybss.com.cn/][size=4][color=magenta]www.xybss.com.cn[/color][/size][/url]\r\n[size=4]旗下淘宝网：[/size][url=http://52yma.taobao.com/][size=4]http://52yma.taobao.com[/size][/url]\r\n', '2014-03-31 13:06:59', 0, 14, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】-演示站-测试行业系统公告', '【新云卡】-演示站-测试行业系统公告', '【新云卡】-演示站-测试行业系统公告', 0, 'default'),
(205, '【新云卡】-演示站-测试帮助系统公告', '[size=4][color=red]【新云卡】-演示站-测试帮助系统公告[/color][/size]\r\n', '2014-03-31 13:07:50', 0, 8, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】-演示站-测试帮助系统公告', '【新云卡】-演示站-测试帮助系统公告\r\n', '【新云卡】-演示站-测试帮助系统公告\r\n', 0, 'default'),
(206, '【新云卡】官方主站测试账号admin密码admin', '[color=#ff0000]【卡易购】官方主站测试账号admin密码admin\r\n[/color][size=2][color=deepskyblue] [/color][/size]\r\n[size=2][color=deepskyblue]如果测试账号错误，请联系蓝主获得[/color][/size]\r\n[size=2][color=deepskyblue][/color][/size]\r\n[size=2][color=deepskyblue]请支持正版授权，详情联系蓝主QQ:936992497[/color][/size]\r\n[size=2][color=#00bfff][/color][/size]\r\n[size=2][color=#00bfff]因为专注所以堪称专业！搭建找蓝主，反正我知道[/color][/size]\r\n', '2014-04-08 12:40:01', 0, 7, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】官方主站测试账号admin密码aa123456', '【新云卡】官方主站测试账号admin密码admin', '【新云卡】官方主站测试账号admin密码admin', 0, 'default'),
(207, '【新云卡】更新版本4.02功能说明', '【新云卡】更新版本4.02功能说明\r\n \r\n购买vip分站直接扣款\r\n \r\n后台优化\r\n \r\n注册页改变\r\n \r\n分站优化\r\n \r\n。。。。。\r\n新云卡官网：\r\n[url=http://www.xybss.com.cn]www.xybss.com.cn[/url]\r\n', '2014-04-02 14:24:27', 0, 7, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】更新版本4.02功能说明', '【新云卡】更新版本4.02功能说明', '【新云卡】更新版本4.02功能说明', 0, 'default'),
(208, '【新云卡】新云卡测试行业内容公告', '【新云卡】新云卡测试行业内容公告', '2014-04-02 17:04:38', 0, 14, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】新云卡测试行业内容公告', '【新云卡】新云卡测试行业内容公告', '【新云卡】新云卡测试行业内容公告', 0, 'default'),
(209, '【新云卡】分站已测试成功上架', '【新云卡】分站已测试成功上架\r\n \r\n[url=http://vipyunka2.92ka.in]http://vipyunka2.92ka.in[/url]\r\n \r\n测试账号找蓝主获取\r\n \r\n蓝主qq936992497\r\n', '2014-04-02 17:09:54', 0, 14, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】分站已测试成功上架', '【新云卡】分站已测试成功上架', '【新云卡】分站已测试成功上架', 0, 'default'),
(210, '【新云卡】分站已上架欢迎下单', '【新云卡】分站已上架欢迎下单', '2014-04-02 17:10:37', 0, 14, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】分站已上架欢迎下单', '【新云卡】分站已上架欢迎下单', '【新云卡】分站已上架欢迎下单', 0, 'default'),
(211, '【新云卡】成为本平台代理的好处', '【新云卡】成为本平台代理的好处', '2014-04-02 17:11:21', 0, 14, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】成为本平台代理的好处', '【新云卡】成为本平台代理的好处', '【新云卡】成为本平台代理的好处', 0, 'default'),
(212, '【新云卡】我仅仅是测试一下下', '我测试下下', '2014-05-06 23:10:09', 0, 7, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '【新云卡】充值提示成功可是买家说没有到账怎么办？', '【新云卡】充值提示成功可是买家说没有到账怎么办？', '【新云卡】充值提示成功可是买家说没有到账怎么办？', 0, 'default'),
(217, '黑色分站测试帮助公告', '蓝主测试一下下\r\nQQ：936992497', '2014-05-07 13:49:26', 0, 9, 0, 0, 0, '#FF0000', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '黑色分站测试帮助公告', '黑色分站测试帮助公告', '黑色分站测试帮助公告', 10000, 'default'),
(216, '黑色分站测试公告', '蓝主测试黑色分站系统公告\r\n购买请支持正版\r\n购买联系QQ936992497\r\n旺铺：http://52yma.taobao.com', '2014-05-07 13:48:39', 0, 7, 0, 0, 0, '#FF0066', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '黑色分站测试公告', '黑色分站测试公告', '黑色分站测试公告', 10000, 'default');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_asks`
--

CREATE TABLE IF NOT EXISTS `fcl_asks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `isagent` tinyint(4) DEFAULT '0',
  `title` varchar(50) DEFAULT NULL,
  `content` longtext,
  `reply` longtext,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_balance`
--

CREATE TABLE IF NOT EXISTS `fcl_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_banks`
--

CREATE TABLE IF NOT EXISTS `fcl_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountBranch` varchar(100) DEFAULT NULL,
  `AccountNO` varchar(50) DEFAULT NULL,
  `AccountName` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `bankicon` varchar(255) DEFAULT NULL,
  `banksite` varchar(255) DEFAULT NULL,
  `settle` tinyint(4) DEFAULT '1',
  `remit` tinyint(4) DEFAULT '1',
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `fcl_banks`
--

INSERT INTO `fcl_banks` (`id`, `AccountBranch`, `AccountNO`, `AccountName`, `Address`, `other`, `bankicon`, `banksite`, `settle`, `remit`, `aid`) VALUES
(1, '财付通', '936992497', '联系蓝主', '河南商丘', '', 'bank_tenpay.gif', '', 1, 1, 0),
(2, '支付宝', '18338762664', '联系蓝主', '河南商丘', '', 'bank_alipay.gif', '', 1, 1, 0),
(3, '农行卡', '6228482382373970912', '联系蓝主', '河南商丘', '', 'bank_nh.gif', '', 1, 1, 0),
(4, '邮政卡', '6210985131006973904', '联系蓝主', '河南商丘', '', 'bank_yz.gif', '', 1, 1, 0),
(5, '财付通', '936992497', '联系蓝主', '河南商丘', NULL, 'bank_tenpay.gif', NULL, 1, 1, 10000),
(6, '支付宝', '18338762664', '联系蓝主', '河南商丘', NULL, 'bank_alipay.gif', NULL, 1, 1, 10000),
(7, '农业银行', '联系蓝主', '联系蓝主', '河南商丘', NULL, 'bank_nh.gif', NULL, 1, 1, 10000),
(8, '邮政储蓄', '联系蓝主', '联系蓝主', '河南商丘', NULL, 'bank_yz.gif', NULL, 1, 1, 10000);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_bd`
--

CREATE TABLE IF NOT EXISTS `fcl_bd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `czaccount` varchar(50) NOT NULL,
  `accpwd` varchar(50) DEFAULT NULL,
  `cztype` varchar(100) DEFAULT NULL,
  `islight` int(11) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `dealdate` datetime DEFAULT NULL,
  `ordstate` int(11) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  `admremark` varchar(255) DEFAULT NULL,
  `admname` varchar(50) DEFAULT NULL,
  `admaid` int(11) DEFAULT '0',
  `cip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_boards`
--

CREATE TABLE IF NOT EXISTS `fcl_boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `inrecycle` tinyint(4) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  `tovip` tinyint(4) DEFAULT '0',
  `tpl` varchar(100) DEFAULT 'default',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `fcl_boards`
--

INSERT INTO `fcl_boards` (`id`, `name`, `inrecycle`, `aid`, `tovip`, `tpl`) VALUES
(1, '新闻公告', 0, 0, 0, 'default'),
(7, '批发系统公告', 0, 0, 1, 'default'),
(8, '批发系统帮助信息', 0, 0, 1, 'default'),
(9, '批发系统常见问题', 0, 0, 1, 'default'),
(10, '一卡通系统新闻公告', 0, 0, 0, 'default'),
(11, '一卡通系统新手帮助', 0, 0, 0, 'default'),
(12, '一卡通系统常见问题', 0, 0, 0, 'default'),
(13, '批发系统代理商信息', 0, 0, 0, 'default'),
(14, '批发系统行业信息', 0, 0, 1, 'default'),
(15, '批发系统活动信息', 0, 0, 0, 'default'),
(16, '批发系统商务合作信息', 0, 0, 0, 'default'),
(17, '游戏官方地址', 0, 0, 0, 'default'),
(18, '官方卡查询地址', 0, 0, 0, 'default'),
(19, '批发系统调价信息', 0, 0, 0, 'default');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_buyrights`
--

CREATE TABLE IF NOT EXISTS `fcl_buyrights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pids` text,
  `idx` varchar(10) DEFAULT NULL,
  `param` varchar(10) DEFAULT NULL,
  `isok` tinyint(4) DEFAULT '1',
  `operator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_cards`
--

CREATE TABLE IF NOT EXISTS `fcl_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `otherordno` varchar(50) DEFAULT NULL,
  `cardnumber` varchar(255) DEFAULT NULL,
  `cardpwd` varchar(255) DEFAULT NULL,
  `cardok` tinyint(4) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `bind` int(11) DEFAULT NULL,
  `bindpid` varchar(100) DEFAULT NULL,
  `cardgroup` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ptype` tinyint(4) DEFAULT '0',
  `cprice` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `money` double DEFAULT NULL,
  `orddate` datetime DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT '-1',
  `cid` int(11) DEFAULT NULL,
  `inrecycle` tinyint(4) DEFAULT '0',
  `gift` varchar(255) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `scored` int(11) DEFAULT NULL,
  `reward` double DEFAULT '0',
  `ownerid` int(11) DEFAULT '0',
  `bindaid` int(11) DEFAULT '0',
  `ispay` int(11) DEFAULT '0',
  `okbyaid` int(11) DEFAULT '0',
  `admname` varchar(50) DEFAULT NULL,
  `addedbyaid` int(11) DEFAULT '0',
  `addedbystaffid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_catalog`
--

CREATE TABLE IF NOT EXISTS `fcl_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `keyword` varchar(50) DEFAULT NULL,
  `ordering` tinyint(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `pinyin` varchar(10) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `depKey` (`keyword`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_category`
--

CREATE TABLE IF NOT EXISTS `fcl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `pics` varchar(50) DEFAULT NULL,
  `hidden` text,
  `shared` tinyint(4) DEFAULT NULL,
  `abst` varchar(255) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '0',
  `pinyin` varchar(100) DEFAULT NULL,
  `aid` int(11) DEFAULT '-1',
  `forb2b` tinyint(4) DEFAULT '1',
  `forykt` tinyint(4) DEFAULT '1',
  `forb2c` tinyint(4) DEFAULT '1',
  `fork2k` tinyint(4) DEFAULT '0',
  `fee` double DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `issys` int(11) DEFAULT '0',
  `gateway` tinyint(4) DEFAULT '0',
  `czaccount` varchar(255) DEFAULT NULL,
  `cdesc` text,
  `czweb` varchar(255) DEFAULT NULL,
  `cost` text,
  `contact` text,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `fcl_category`
--

INSERT INTO `fcl_category` (`id`, `name`, `parentid`, `ordering`, `color`, `pics`, `hidden`, `shared`, `abst`, `hot`, `pinyin`, `aid`, `forb2b`, `forykt`, `forb2c`, `fork2k`, `fee`, `code`, `issys`, `gateway`, `czaccount`, `cdesc`, `czweb`, `cost`, `contact`) VALUES
(1, '系统默认目录', 0, 0, '#000000', 'catnopic.gif', NULL, 1, '', 0, '', -1, 1, 1, 0, 0, 0, '', 0, 1, '', '', '', '', ''),
(2, '系统默认目录', 1, 0, '#000000', 'catnopic.gif', NULL, 1, '', 0, '', -1, 1, 1, 0, 0, 0, '', 0, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_catwap`
--

CREATE TABLE IF NOT EXISTS `fcl_catwap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pinyin` varchar(5) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '0',
  `pids` text,
  `pics` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_check`
--

CREATE TABLE IF NOT EXISTS `fcl_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffname` varchar(100) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `otherstaff` varchar(100) DEFAULT NULL,
  `otherid` int(11) DEFAULT NULL,
  `ar` double DEFAULT NULL,
  `ap` double DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  `remain` double DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_coupon`
--

CREATE TABLE IF NOT EXISTS `fcl_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `price` double DEFAULT '0',
  `open` tinyint(4) DEFAULT '1',
  `remarks` tinytext,
  `issys` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_coupon_agent`
--

CREATE TABLE IF NOT EXISTS `fcl_coupon_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `open` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_credit`
--

CREATE TABLE IF NOT EXISTS `fcl_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bossid` int(11) DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0',
  `isvalid` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_creditsystem`
--

CREATE TABLE IF NOT EXISTS `fcl_creditsystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit` int(11) NOT NULL DEFAULT '0',
  `dollars` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_customers`
--

CREATE TABLE IF NOT EXISTS `fcl_customers` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `cpwd` varchar(100) DEFAULT NULL,
  `crealname` varchar(100) DEFAULT NULL,
  `cqq` varchar(50) DEFAULT NULL,
  `cmail` varchar(100) DEFAULT NULL,
  `ctel` varchar(50) DEFAULT NULL,
  `caddr` varchar(255) DEFAULT NULL,
  `cremain` double DEFAULT NULL,
  `ccsmp` double DEFAULT NULL,
  `clv` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `regip` varchar(50) DEFAULT NULL,
  `lastdate` datetime DEFAULT NULL,
  `lastip` varchar(255) DEFAULT NULL,
  `thisdate` datetime DEFAULT NULL,
  `thisip` varchar(50) DEFAULT NULL,
  `prv` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_fav`
--

CREATE TABLE IF NOT EXISTS `fcl_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_funds`
--

CREATE TABLE IF NOT EXISTS `fcl_funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `orddate` datetime DEFAULT NULL,
  `dollars` double DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `comefrom` tinyint(4) DEFAULT '1',
  `cip` varchar(50) DEFAULT NULL,
  `ordstate` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `inrecycle` tinyint(4) DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `balancedate` datetime DEFAULT NULL,
  `realdollars` double DEFAULT NULL,
  `fee` double DEFAULT '0',
  `admname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordid` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `fcl_funds`
--

INSERT INTO `fcl_funds` (`id`, `ordno`, `orddate`, `dollars`, `cname`, `comefrom`, `cip`, `ordstate`, `payment`, `inrecycle`, `remarks`, `balancedate`, `realdollars`, `fee`, `admname`) VALUES
(1, '2012121718272572', '2012-12-17 18:27:25', 10, 'zzw11', 1, '223.94.33.241', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(2, '2012121718273584', '2012-12-17 18:27:35', 10, 'zzw11', 1, '223.94.33.241', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(3, '2012121718290156', '2012-12-17 18:29:01', 10, 'zzw11', 1, '223.94.33.241', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(4, '2012122222512250', '2012-12-22 22:51:22', 88888, 'cszh1', 98, '223.94.38.219', 2, 99, 0, '普通充值', NULL, NULL, 0, 'zhengzhiwei'),
(5, '2013010812432463', '2013-01-08 12:43:24', 500, 'cszh1', 1, '110.52.46.232', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(6, '2013011402093451', '2013-01-14 02:09:34', 1, '1234567', 1, '113.118.244.28', 0, NULL, 1, NULL, NULL, NULL, 0, NULL),
(7, '2013011402102049', '2013-01-14 02:10:20', 1, '1234567', 1, '113.118.244.28', 0, NULL, 1, NULL, NULL, NULL, 0, NULL),
(8, '2013030418454075', '2013-03-04 18:45:40', 500, 'admin1', 1, '182.145.31.10', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(9, '2014050522401018', '2014-05-05 22:40:10', 500, 'admin', 1, '211.97.130.173', 0, NULL, 0, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_fx`
--

CREATE TABLE IF NOT EXISTS `fcl_fx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oldfx` double DEFAULT '1',
  `curfx` double DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_game`
--

CREATE TABLE IF NOT EXISTS `fcl_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_gamearea`
--

CREATE TABLE IF NOT EXISTS `fcl_gamearea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gameid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_gametpl`
--

CREATE TABLE IF NOT EXISTS `fcl_gametpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `chargetype` int(100) DEFAULT NULL,
  `customchargetype` varchar(100) DEFAULT NULL,
  `accounttype` varchar(200) DEFAULT NULL,
  `pwdneed` tinyint(4) DEFAULT NULL,
  `areadisp` tinyint(4) DEFAULT NULL,
  `servdisp` tinyint(4) DEFAULT NULL,
  `shared` tinyint(4) DEFAULT NULL,
  `tpl` int(11) DEFAULT NULL,
  `custominput` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `fcl_gametpl`
--

INSERT INTO `fcl_gametpl` (`id`, `name`, `chargetype`, `customchargetype`, `accounttype`, `pwdneed`, `areadisp`, `servdisp`, `shared`, `tpl`, `custominput`) VALUES
(1, '平台账号', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:0:"";s:11:"customtype1";s:4:"none";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(2, '商品补货模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"商品名称";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(3, '支付宝账号模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:0:"";s:11:"customtype1";s:4:"none";s:12:"customother1";s:0:"";s:11:"customname2";s:4:"姓名";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:8:"重复姓名";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}'),
(4, '财付通账号模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:0:"";s:11:"customtype1";s:4:"none";s:12:"customother1";s:0:"";s:11:"customname2";s:4:"姓名";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:8:"重复姓名";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}'),
(5, '彩钻充值模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:14:"财付通支付密码";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:8:"服务类型";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:4:"彩钻";}'),
(6, '手机钻补单退款模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:10:"补单QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:10:"补单QQ类型";s:11:"customtype2";s:6:"select";s:12:"customother2";s:113:"---请选择---,QQ会员,QQ红钻,QQ黄钻,QQ蓝钻,QQ绿钻,QQ粉钻,QQ紫钻,QQ魔钻,超级QQ,图书VIP,迅雷VIP,4钻+会员,4钻+会员+超Q";s:11:"customname3";s:20:"商品订单号（必填项）";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}'),
(9, '教程类商品专用模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ邮箱";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:9:"注意事项1";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:58:"QQ号码和QQ邮箱必须填写正确，商品交易成功后请注意查收邮箱。";s:11:"customname3";s:9:"注意事项2";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:56:"输入QQ号码方便卖家与你联系，输入QQ邮箱方便卖家与你发货。";}'),
(7, 'QQ号码+QQ密码', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(8, 'QQ号码', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ号码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(10, '点亮图标专用模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:10:"临时QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:9:"注意事项1";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:58:"请看清楚商品标题所写的到账时间，在该时间内没到账再投诉订单";s:11:"customname3";s:9:"注意事项2";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:64:"请在点亮期间不要修改密码，否则导致的无法到账问题我们不负责喔    ";}'),
(11, '人人网模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:10:"人人网账号";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:10:"人人网密码";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(12, '供货商供货模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:12:"是否长期供货";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(13, '手机充值卡平台加款模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:10:"充值卡密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:10:"充值卡类型";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:21:"移动充值卡,联通充值卡";s:11:"customname3";s:10:"充值卡面值";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:15:"10,20,30,50,100";}'),
(14, '腾讯Q币平台手动加款模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"充值QQ号";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:9:"550828228";s:11:"customname2";s:8:"充值数量";s:11:"customtype2";s:6:"select";s:12:"customother2";s:30:"10,20,30,40,50,60,70,80,90,100";s:11:"customname3";s:8:"注意事项";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:59:"代理先给QQ：550828228充值Q币后，根据充值Q币数量购买此商品。";}'),
(15, '(QQ会员/黄钻/蓝钻/紫钻/粉钻/红钻/绿钻等)', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:8:"业务类型";s:11:"customtype1";s:6:"select";s:12:"customother1";s:87:"--请选择--,QQ会员,QQ红钻,QQ黄钻,QQ蓝钻,QQ绿钻,QQ堂紫钻,QQ宠物粉钻,QQ音速紫钻,QQ飞车紫钻";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(16, '腾讯Q币平台卡密加款模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"QQ卡密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:8:"QQ卡面值";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:37:"10元,30元,50元,60元,120元,200元,500元";s:11:"customname3";s:12:"QQ卡充值网址";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}'),
(17, '移动联通小面额模版', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"号码类型";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:21:"移动手机号,联通手机号";s:11:"customname2";s:8:"注意事项";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:38:"手机号要输入正确，填错导致勿冲自己承担";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(18, '手机QQ业务开单投诉模版', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:10:"供货商名字";s:11:"customtype1";s:6:"select";s:12:"customother1";s:122:"-----请选择-----,2折手机QQ业务,喔喔手机QQ业务,易家手机QQ业务,90后手机QQ业务,乐游手机QQ业务,新世纪手机QQ业务,小广手机QQ业务";s:11:"customname2";s:12:"商品投诉类型";s:11:"customtype2";s:6:"select";s:12:"customother2";s:117:"------请选择------,商品24小时内未充值,商品充值后业务未到账,投诉供货商售后服务,对供货商的意见和建议,投诉多次未解决问题";s:11:"customname3";s:20:"商品订单号（必填项）";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}'),
(19, '手机QQ业务商品补单投诉', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"补单类型";s:11:"customtype1";s:6:"select";s:12:"customother1";s:113:"---请选择---,QQ会员,QQ红钻,QQ黄钻,QQ蓝钻,QQ绿钻,QQ粉钻,QQ紫钻,QQ魔钻,超级QQ,图书VIP,迅雷VIP,4钻+会员,4钻+会员+超Q";s:11:"customname2";s:22:"补单商品订单号(必填项)";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:8:"注意事项";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:60:"平台代理购买补单商品后48小时没有补单才可以购买此商品投诉退款";}'),
(20, '下级提成提现模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"真实姓名";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:8:"提现方式";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:13:"支付宝,财付通";s:11:"customname3";s:8:"注意事项";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:52:"真实姓名必须和平台帐号注册资料相符否则平台不予提现。";}'),
(21, '平台推广奖励模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:21:"宣传平台文章/帖子名字";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:21:"宣传平台文章/帖子网址";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(22, '发展下级平台额外提成', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:12:"下级平台账号";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:12:"代理提成类型";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:34:"下级首次充值50元,下级首次消费100元";s:11:"customname3";s:12:"代理注意事项";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:60:"经过平台核实后确实符合以上条件，24小时内额外提成转平台余额。";}'),
(23, '平台管理员加盟模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:12:"平台账号级别";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:28:"终身代理（平台管理员）-100元";s:11:"customname2";s:12:"代理商品提成";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:36:"面值与进价的差价即为你的销售利润提成";s:11:"customname3";s:14:"平台管理员特权";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:69:"商品进货价最低，可自己开通至尊vip、金冠vip、银冠vip，收入归自己所有。";}'),
(24, '腾讯电脑管家代挂模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:8:"注意事项";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:50:"下单前请取消QQ登录保护，业务受理期间不要改QQ密码。";s:11:"customname3";s:8:"商品介绍";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:58:"挂一天电脑管家，多加速一天QQ等级，让你的QQ等级快速的升级。";}'),
(25, 'QQ密码和角色大区', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:6:"QQ密码";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:12:"游戏角色大区";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(26, '至尊vip加盟模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:12:"平台账号级别";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:24:"终身代理（至尊vip）-50元";s:11:"customname2";s:12:"代理商品提成";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:36:"面值与进价的差价即为你的销售利润提成";s:11:"customname3";s:15:"至尊vip级别特权";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:60:"商品进货价微低，可自己开通金冠vip、银冠vip，收入归自己所有。";}'),
(27, '金冠vip加盟模板', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:12:"平台账号级别";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:25:"终身代理（金冠vip）-30元 ";s:11:"customname2";s:12:"代理商品提成";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:36:"面值与进价的差价即为你的销售利润提成";s:11:"customname3";s:15:"金冠vip级别特权";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:51:"商品进货价略低，可自己开通银冠vip，收入归自己所有。";}'),
(28, '平台自由商品投诉', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:0:"";s:11:"customtype1";s:4:"none";s:12:"customother1";s:0:"";s:11:"customname2";s:20:"商品订单号（必填项）";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:12:"商品投诉类型";s:11:"customtype3";s:6:"select";s:12:"customother3";s:117:"------请选择------,商品24小时内未充值,商品充值后业务未到账,投诉供货商售后服务,对供货商的意见和建议,投诉多次未解决问题";}'),
(30, '手机钻无密码业务专用模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:10:"开通QQ服务";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:6:"QQ会员";s:11:"customname2";s:9:"注意事项2";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:66:"QQ业务必须已经到期、图标已灭才能开通，已经开通过的业务请不要购买。";s:11:"customname3";s:9:"注意事项3";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:68:"掉单补单请在平台手机QQ业务补单栏目购买对应供货商补单商品链接即可。  ";}'),
(34, 'YY', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:8:"歪歪帐号";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:8:"歪歪密码";s:11:"customtype2";s:8:"password";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(31, '迅雷vip会员', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:4:"密码";s:11:"customtype1";s:4:"none";s:12:"customother1";s:0:"";s:11:"customname2";s:0:"";s:11:"customtype2";s:4:"none";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(32, '手机钻无密码通用模版', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:10:"QQ补单教程";s:11:"customtype1";s:5:"radio";s:12:"customother1";s:50:"复制网址打开：http://www.xmkm.net/article/118.html";s:11:"customname2";s:9:"注意事项1";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:58:"下单后供货商未开通业务之前不要在别的供货商重复购买此业务。";s:11:"customname3";s:9:"注意事项2";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:66:"业务必须已经到期或者图标是熄灭的才能开通，已有业务不要购买此业务。";}'),
(33, '手机钻有密码通用模板', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'a:9:{s:11:"customname1";s:18:"QQ密码(字母和数字)";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:9:"注意事项1";s:11:"customtype2";s:5:"radio";s:12:"customother2";s:58:"下单后供货商未开通业务之前不要在别的供货商重复购买此业务。";s:11:"customname3";s:9:"注意事项2";s:11:"customtype3";s:5:"radio";s:12:"customother3";s:68:"业务必须已经到期或者图标是熄灭的才能开通，密码必须设置为字母和数字。";}'),
(35, 'YY', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'a:9:{s:11:"customname1";s:8:"歪歪帐号";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:8:"歪歪密码";s:11:"customtype2";s:8:"password";s:12:"customother2";s:0:"";s:11:"customname3";s:0:"";s:11:"customtype3";s:4:"none";s:12:"customother3";s:0:"";}'),
(36, '开钻卡收货地址', NULL, NULL, NULL, NULL, 2, 0, 1, 0, 'a:9:{s:11:"customname1";s:14:"开钻卡收货地址";s:11:"customtype1";s:4:"text";s:12:"customother1";s:0:"";s:11:"customname2";s:12:"联系电话号码";s:11:"customtype2";s:4:"text";s:12:"customother2";s:0:"";s:11:"customname3";s:4:"邮编";s:11:"customtype3";s:4:"text";s:12:"customother3";s:0:"";}');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_goods_c2c`
--

CREATE TABLE IF NOT EXISTS `fcl_goods_c2c` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `tradetype` tinyint(4) DEFAULT NULL,
  `tradetime` varchar(255) DEFAULT NULL,
  `deadline` tinyint(4) DEFAULT NULL,
  `moneyto` tinyint(4) DEFAULT NULL,
  `toad` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_goods_prop_groups`
--

CREATE TABLE IF NOT EXISTS `fcl_goods_prop_groups` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_goods_prop_tpl`
--

CREATE TABLE IF NOT EXISTS `fcl_goods_prop_tpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) DEFAULT NULL,
  `ptype` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `fontsize` tinyint(4) DEFAULT NULL,
  `fontweight` tinyint(4) DEFAULT NULL,
  `fontcolor` varchar(7) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `proptype` varchar(10) DEFAULT 'text',
  `defaultvalue` varchar(100) DEFAULT NULL,
  `hidden` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_goods_type`
--

CREATE TABLE IF NOT EXISTS `fcl_goods_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_groups`
--

CREATE TABLE IF NOT EXISTS `fcl_groups` (
  `gid` int(11) NOT NULL DEFAULT '0',
  `gname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fcl_groups`
--

INSERT INTO `fcl_groups` (`gid`, `gname`) VALUES
(0, '会员'),
(1, '直销商'),
(2, '经销商'),
(3, '核心商');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ip`
--

CREATE TABLE IF NOT EXISTS `fcl_ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `prvcity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ip_lock`
--

CREATE TABLE IF NOT EXISTS `fcl_ip_lock` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `lock` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_loan`
--

CREATE TABLE IF NOT EXISTS `fcl_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `dollars` double NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `thisaction` tinyint(4) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `otherside` int(50) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `payback` double DEFAULT NULL,
  `paybackdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_locks`
--

CREATE TABLE IF NOT EXISTS `fcl_locks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `dollars` double NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `thisaction` tinyint(4) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `locktype` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_login`
--

CREATE TABLE IF NOT EXISTS `fcl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `issucc` int(11) DEFAULT '1',
  `logintype` int(11) DEFAULT '1',
  `operator` varchar(50) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `isfront` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 转存表中的数据 `fcl_login`
--

INSERT INTO `fcl_login` (`id`, `aid`, `staffid`, `content`, `issucc`, `logintype`, `operator`, `createdate`, `ip`, `isfront`) VALUES
(1, 11, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:34:41', '182.145.31.10', 0),
(2, 1, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:36:16', '182.145.31.10', 1),
(3, 11, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:39:21', '182.145.31.10', 0),
(4, 1, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:39:56', '182.145.31.10', 1),
(5, 10000, 0, '成功登陆', 1, 0, 'admin1', '2013-03-04 22:40:09', '182.145.31.10', 1),
(6, 11, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:40:52', '182.145.31.10', 0),
(7, 10000, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:41:03', '182.145.31.10', 1),
(8, 11, 0, '成功登陆', 1, 0, 'admin', '2013-03-04 22:41:34', '182.145.31.10', 0),
(9, 10000, 0, '成功登陆', 1, 0, 'admin', '2013-06-04 13:04:44', '118.121.132.54', 1),
(10, 11, 0, '成功登陆', 1, 0, 'admin', '2014-03-25 23:26:55', '119.90.45.134', 0),
(11, 0, 0, '密码输入错误，登陆失败', 0, 0, 'admin', '2014-03-26 18:19:29', '223.72.228.184', 0),
(12, 11, 0, '成功登陆', 1, 0, 'admin', '2014-03-26 18:19:40', '223.72.228.184', 0),
(13, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-26 21:16:33', '223.72.228.185', 1),
(14, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-26 22:13:03', '223.72.228.185', 1),
(15, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-27 12:23:37', '218.62.30.34', 1),
(16, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-27 12:26:29', '218.62.30.34', 1),
(17, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-27 12:26:45', '119.90.45.132', 1),
(18, 11, 0, '成功登陆', 1, 0, 'admin', '2014-03-28 20:45:10', '106.42.185.28', 0),
(19, 11, 0, '成功登陆', 1, 0, 'admin', '2014-03-31 12:30:43', '119.90.45.142', 0),
(20, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-03-31 12:31:15', '119.90.45.142', 1),
(21, 11, 0, '成功登陆', 1, 0, 'admin', '2014-03-31 12:36:12', '119.90.45.142', 0),
(22, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-02 13:49:19', '223.72.228.186', 0),
(23, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-03 18:33:18', '119.90.45.141', 0),
(24, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-04 13:18:22', '119.90.45.138', 0),
(25, 0, 0, '账号输入错误，登陆失败', 0, 0, 'lanzhu', '2014-04-07 12:52:24', '119.90.45.138', 0),
(26, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-07 12:52:43', '119.90.45.138', 0),
(27, 0, 0, '密码错误，登陆失败', 0, 0, 'admin', '2014-04-07 14:00:58', '119.90.45.138', 1),
(28, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-04-07 14:01:11', '119.90.45.138', 1),
(29, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-04-07 14:12:40', '119.90.45.138', 1),
(30, 0, 0, '密码输入错误，登陆失败', 0, 0, 'admin', '2014-04-07 17:01:11', '119.90.45.138', 0),
(31, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-07 17:01:26', '119.90.45.138', 0),
(32, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-04-08 08:24:47', '14.219.114.210', 1),
(33, 11, 0, '成功登陆', 1, 0, 'admin', '2014-04-08 12:37:18', '223.72.228.16', 0),
(34, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-04-09 16:18:31', '118.186.144.144', 0),
(35, 12, 0, '成功登陆', 1, 0, 'root', '2014-04-10 16:42:12', '27.156.6.4', 0),
(36, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-04-15 13:27:14', '221.13.30.12', 0),
(37, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-04-15 20:27:28', '221.13.30.12', 1),
(38, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-04-15 21:10:22', '221.13.30.12', 0),
(39, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-04-15 21:11:35', '221.13.30.12', 1),
(40, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-04 16:01:39', '115.49.198.122', 0),
(41, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-04 23:29:06', '125.39.30.12', 0),
(42, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-05 06:57:47', '125.39.30.12', 0),
(43, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-05 12:06:50', '118.186.144.144', 0),
(44, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-05 22:35:15', '211.97.130.173', 1),
(45, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-05 23:35:37', '211.97.130.173', 1),
(46, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-05 23:43:18', '117.136.4.23', 1),
(47, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-06 11:27:09', '125.39.30.12', 0),
(48, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 12:27:16', '123.246.222.222', 1),
(49, 0, 0, '用户名不存在，登陆失败', 0, 0, '登录admin', '2014-05-06 13:48:43', '110.80.67.200', 1),
(50, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 13:49:06', '110.80.67.200', 1),
(51, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-06 13:58:04', '223.203.186.180', 0),
(52, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 14:18:24', '117.136.22.224', 1),
(53, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 14:29:07', '182.18.35.77', 1),
(54, 0, 0, '账号输入错误，登陆失败', 0, 0, 'admin', '2014-05-06 20:43:26', '223.73.104.218', 0),
(55, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 20:45:09', '118.186.144.147', 1),
(56, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 21:47:22', '118.186.144.147', 1),
(57, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 22:06:20', '118.186.144.147', 1),
(58, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-06 23:22:10', '118.186.144.147', 1),
(59, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-07 11:33:48', '182.18.111.168', 0),
(60, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-07 12:16:54', '182.18.111.168', 1),
(61, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-07 13:46:43', '182.18.111.168', 1),
(62, 10001, 0, '成功登陆', 1, 0, '1489980210', '2014-05-07 14:26:02', '14.220.216.84', 1),
(63, 10002, 0, '成功登陆', 1, 0, '1002214644', '2014-05-07 15:43:38', '112.4.16.162', 1),
(64, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-07 16:20:26', '120.215.124.224', 0),
(65, 0, 0, '密码输入错误，登陆失败', 0, 0, 'lanzhu', '2014-05-07 16:50:00', '182.18.111.168', 0),
(66, 0, 0, '密码输入错误，登陆失败', 0, 0, 'lanzhu', '2014-05-07 16:50:16', '182.18.111.168', 0),
(67, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-07 16:50:37', '182.18.111.168', 0),
(68, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-08 09:23:33', '113.120.218.159', 1),
(69, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-09 15:56:25', '112.97.24.181', 1),
(70, 0, 0, '用户名不存在，登陆失败', 0, 0, 'adming', '2014-05-09 16:00:53', '112.97.24.181', 1),
(71, 0, 0, '用户名不存在，登陆失败', 0, 0, 'adming', '2014-05-09 16:01:41', '112.97.24.181', 1),
(72, 11, 0, '成功登陆', 1, 0, 'lanzhu', '2014-05-09 16:21:37', '182.18.107.60', 0),
(73, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-09 16:40:31', '14.104.212.138', 1),
(74, 10000, 0, '成功登陆', 1, 0, 'admin', '2014-05-09 20:36:41', '14.104.243.98', 1);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_logs`
--

CREATE TABLE IF NOT EXISTS `fcl_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_merge`
--

CREATE TABLE IF NOT EXISTS `fcl_merge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mtable` varchar(10) NOT NULL,
  `mdata` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_mibaoka`
--

CREATE TABLE IF NOT EXISTS `fcl_mibaoka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(15) NOT NULL,
  `xy` text NOT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `fcl_mibaoka`
--

INSERT INTO `fcl_mibaoka` (`id`, `sn`, `xy`, `createdate`) VALUES
(12, '300088000000', 'a:49:{s:2:"A1";i:51;s:2:"A2";i:42;s:2:"A3";i:65;s:2:"A4";i:56;s:2:"A5";i:31;s:2:"A6";i:55;s:2:"A7";i:67;s:2:"B1";i:30;s:2:"B2";i:83;s:2:"B3";i:10;s:2:"B4";i:15;s:2:"B5";i:51;s:2:"B6";i:82;s:2:"B7";i:24;s:2:"C1";i:69;s:2:"C2";i:96;s:2:"C3";i:72;s:2:"C4";i:84;s:2:"C5";i:79;s:2:"C6";i:59;s:2:"C7";i:70;s:2:"D1";i:81;s:2:"D2";i:27;s:2:"D3";i:53;s:2:"D4";i:92;s:2:"D5";i:90;s:2:"D6";i:21;s:2:"D7";i:55;s:2:"E1";i:56;s:2:"E2";i:77;s:2:"E3";i:74;s:2:"E4";i:97;s:2:"E5";i:19;s:2:"E6";i:39;s:2:"E7";i:54;s:2:"F1";i:41;s:2:"F2";i:84;s:2:"F3";i:21;s:2:"F4";i:62;s:2:"F5";i:67;s:2:"F6";i:21;s:2:"F7";i:67;s:2:"G1";i:19;s:2:"G2";i:94;s:2:"G3";i:81;s:2:"G4";i:78;s:2:"G5";i:90;s:2:"G6";i:54;s:2:"G7";i:63;}', '2013-01-21 20:09:18'),
(13, '300088000012', 'a:49:{s:2:"A1";i:70;s:2:"A2";i:13;s:2:"A3";i:33;s:2:"A4";i:51;s:2:"A5";i:30;s:2:"A6";i:76;s:2:"A7";i:44;s:2:"B1";i:20;s:2:"B2";i:87;s:2:"B3";i:90;s:2:"B4";i:67;s:2:"B5";i:65;s:2:"B6";i:64;s:2:"B7";i:65;s:2:"C1";i:74;s:2:"C2";i:93;s:2:"C3";i:19;s:2:"C4";i:16;s:2:"C5";i:78;s:2:"C6";i:30;s:2:"C7";i:68;s:2:"D1";i:46;s:2:"D2";i:42;s:2:"D3";i:35;s:2:"D4";i:55;s:2:"D5";i:36;s:2:"D6";i:17;s:2:"D7";i:33;s:2:"E1";i:27;s:2:"E2";i:61;s:2:"E3";i:86;s:2:"E4";i:87;s:2:"E5";i:65;s:2:"E6";i:20;s:2:"E7";i:39;s:2:"F1";i:85;s:2:"F2";i:86;s:2:"F3";i:73;s:2:"F4";i:96;s:2:"F5";i:74;s:2:"F6";i:63;s:2:"F7";i:64;s:2:"G1";i:40;s:2:"G2";i:27;s:2:"G3";i:29;s:2:"G4";i:14;s:2:"G5";i:21;s:2:"G6";i:38;s:2:"G7";i:21;}', '2013-01-21 20:09:25');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_msg`
--

CREATE TABLE IF NOT EXISTS `fcl_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msgfrom` int(11) DEFAULT NULL,
  `msgto` int(11) DEFAULT NULL,
  `msgcc` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` longtext,
  `reply` longtext,
  `createdate` datetime DEFAULT NULL,
  `createip` varchar(255) DEFAULT NULL,
  `pop` tinyint(4) DEFAULT '-1',
  `msgtype` tinyint(4) DEFAULT '0',
  `isreaded` tinyint(4) DEFAULT '-1',
  `parentid` int(11) DEFAULT '0',
  `hidden` tinyint(4) DEFAULT '-1',
  `inrecycle` tinyint(4) DEFAULT '0',
  `comefrom` tinyint(4) DEFAULT '1',
  `ordno` varchar(30) DEFAULT NULL,
  `marks` int(11) DEFAULT '0',
  `other` varchar(50) DEFAULT NULL,
  `hope` varchar(50) DEFAULT NULL,
  `msgstate` int(11) DEFAULT '1',
  `otherdate` datetime DEFAULT NULL,
  `admname` varchar(50) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `admnick` varchar(50) DEFAULT NULL,
  `isreadedaid` longtext,
  `hiddenaid` longtext,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_msg_ext`
--

CREATE TABLE IF NOT EXISTS `fcl_msg_ext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msgid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `isreaded` tinyint(4) DEFAULT '1',
  `hidden` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_orders`
--

CREATE TABLE IF NOT EXISTS `fcl_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `orddate` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `dollars` double DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `crealname` varchar(50) DEFAULT NULL,
  `cqq` varchar(50) DEFAULT NULL,
  `ctel` varchar(50) DEFAULT NULL,
  `cmail` varchar(100) DEFAULT NULL,
  `cprice` double DEFAULT NULL,
  `profit` double DEFAULT '0',
  `agentprofit` double DEFAULT '0',
  `staffprofit` double DEFAULT '0',
  `buyerprice` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `cip` varchar(50) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ptype` int(11) DEFAULT NULL,
  `ordstate` int(11) DEFAULT NULL,
  `qtyleft` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `czaccount` varchar(100) DEFAULT NULL,
  `czarea1` varchar(100) DEFAULT NULL,
  `czarea2` varchar(50) DEFAULT NULL,
  `cztype` varchar(50) DEFAULT NULL,
  `czother` varchar(50) DEFAULT NULL,
  `ca1` varchar(50) DEFAULT NULL,
  `ca2` varchar(50) DEFAULT NULL,
  `ct` varchar(50) DEFAULT NULL,
  `co` varchar(50) DEFAULT NULL,
  `dealdate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  `pfee` double DEFAULT '0',
  `failreason` varchar(255) DEFAULT NULL,
  `factoryreturn` text,
  `rollback` tinyint(4) DEFAULT '0',
  `sup` tinyint(4) DEFAULT '0',
  `others` varchar(255) DEFAULT NULL,
  `tradeterm` varchar(1000) DEFAULT NULL,
  `acountpwd` varchar(100) DEFAULT NULL,
  `rolename` varchar(100) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `comefrom` tinyint(4) DEFAULT '1',
  `inrecycle` tinyint(4) DEFAULT '0',
  `fee` double DEFAULT '0',
  `moneyfee` double DEFAULT '0',
  `ownermoney` double DEFAULT '0',
  `ownerprofit` double DEFAULT '0',
  `tsid` int(4) DEFAULT '0',
  `isalerted` tinyint(4) DEFAULT '0',
  `namehide` varchar(50) DEFAULT NULL,
  `saleid` int(11) DEFAULT '0',
  `sellscale` double DEFAULT '0',
  `selldollars` double DEFAULT '0',
  `sellcheck` tinyint(4) DEFAULT '0',
  `sellcheckdate` datetime DEFAULT NULL,
  `scored` int(11) DEFAULT '0',
  `reward` double DEFAULT '0',
  `listprice` double DEFAULT NULL,
  `bossprice` double DEFAULT NULL,
  `admname` varchar(255) DEFAULT NULL,
  `opname` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `thisgame` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ordno` (`ordno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ordershistory`
--

CREATE TABLE IF NOT EXISTS `fcl_ordershistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `orddate` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `dollars` double DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `crealname` varchar(50) DEFAULT NULL,
  `cqq` varchar(50) DEFAULT NULL,
  `ctel` varchar(50) DEFAULT NULL,
  `cmail` varchar(100) DEFAULT NULL,
  `cprice` double DEFAULT NULL,
  `profit` double DEFAULT '0',
  `agentprofit` double DEFAULT '0',
  `staffprofit` double DEFAULT '0',
  `buyerprice` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `cip` varchar(50) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ptype` int(11) DEFAULT NULL,
  `ordstate` int(11) DEFAULT NULL,
  `qtyleft` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `czaccount` varchar(100) DEFAULT NULL,
  `czarea1` varchar(100) DEFAULT NULL,
  `czarea2` varchar(50) DEFAULT NULL,
  `cztype` varchar(50) DEFAULT NULL,
  `czother` varchar(50) DEFAULT NULL,
  `ca1` varchar(50) DEFAULT NULL,
  `ca2` varchar(50) DEFAULT NULL,
  `ct` varchar(50) DEFAULT NULL,
  `co` varchar(50) DEFAULT NULL,
  `dealdate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  `pfee` double DEFAULT '0',
  `failreason` varchar(255) DEFAULT NULL,
  `factoryreturn` text,
  `rollback` tinyint(4) DEFAULT '0',
  `sup` tinyint(4) DEFAULT '0',
  `others` varchar(255) DEFAULT NULL,
  `tradeterm` varchar(1000) DEFAULT NULL,
  `acountpwd` varchar(100) DEFAULT NULL,
  `rolename` varchar(100) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `comefrom` tinyint(4) DEFAULT '1',
  `inrecycle` tinyint(4) DEFAULT '0',
  `fee` double DEFAULT '0',
  `moneyfee` double DEFAULT '0',
  `ownermoney` double DEFAULT '0',
  `ownerprofit` double DEFAULT '0',
  `tsid` int(4) DEFAULT '0',
  `isalerted` tinyint(4) DEFAULT '0',
  `namehide` varchar(50) DEFAULT NULL,
  `saleid` int(11) DEFAULT '0',
  `sellscale` double DEFAULT '0',
  `selldollars` double DEFAULT '0',
  `sellcheck` tinyint(4) DEFAULT '0',
  `sellcheckdate` datetime DEFAULT NULL,
  `scored` int(11) DEFAULT '0',
  `reward` double DEFAULT '0',
  `listprice` double DEFAULT NULL,
  `bossprice` double DEFAULT NULL,
  `admname` varchar(255) DEFAULT NULL,
  `opname` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `thisgame` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ordno` (`ordno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ordno`
--

CREATE TABLE IF NOT EXISTS `fcl_ordno` (
  `ordno` varchar(18) NOT NULL,
  PRIMARY KEY (`ordno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fcl_ordno`
--

INSERT INTO `fcl_ordno` (`ordno`) VALUES
('2012121718272572'),
('2012121718273584'),
('2012121718290156'),
('2012122222512250'),
('2012122817335068'),
('201212311647286931'),
('201301041930019635'),
('2013010812432463'),
('2013011402093451'),
('2013011402102049'),
('2013030418454075'),
('2014050522401018');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_payment`
--

CREATE TABLE IF NOT EXISTS `fcl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paycode` varchar(50) DEFAULT NULL,
  `payType` varchar(50) DEFAULT NULL,
  `payMerchant` varchar(50) DEFAULT NULL,
  `payKey` varchar(255) DEFAULT NULL,
  `payOpen` tinyint(4) DEFAULT NULL,
  `payfee` double DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `isdefault` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `payKey` (`payKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `fcl_payment`
--

INSERT INTO `fcl_payment` (`id`, `paycode`, `payType`, `payMerchant`, `payKey`, `payOpen`, `payfee`, `other`, `isdefault`) VALUES
(1, 'alipay', '支付宝', '', '', 1, 0.015, '', 0),
(2, 'tenpay', '财付通', '', '', 1, 0.015, '', 0),
(11, 'chinabank', '网银中国', '', '', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_polls`
--

CREATE TABLE IF NOT EXISTS `fcl_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `voter` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `expiration` datetime DEFAULT NULL,
  `forb2b` int(11) DEFAULT '1',
  `forb2c` int(11) DEFAULT '1',
  `forykt` int(11) DEFAULT '1',
  `pubulished` int(11) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `isradio` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `fcl_polls`
--

INSERT INTO `fcl_polls` (`id`, `parentid`, `title`, `voter`, `hits`, `createdate`, `expiration`, `forb2b`, `forb2c`, `forykt`, `pubulished`, `ordering`, `isradio`) VALUES
(2, 1, '游戏中', NULL, 1, '2009-04-24 09:26:42', '2009-04-24 09:26:42', 0, 0, 0, 1, 1, 0),
(3, 1, '朋友介绍', NULL, 0, '2009-04-24 09:27:06', '2009-04-24 09:27:06', 0, 0, 0, 1, 2, 0),
(4, 1, '淘宝、拍拍等直销店', NULL, 0, '2009-04-24 09:27:44', '2009-04-24 09:27:44', 0, 0, 0, 1, 3, 0),
(5, 1, '各大论坛', NULL, 2, '2009-04-24 09:28:00', '2009-04-24 09:28:00', 0, 0, 0, 1, 4, 0),
(6, 1, '其它方式', NULL, 0, '2009-04-24 09:28:12', '2009-04-24 09:28:12', 0, 0, 0, 1, 5, 0),
(8, 7, '1', NULL, 0, '2012-08-26 23:15:31', '2013-08-26 23:15:31', 0, 0, 0, 0, 1, 0),
(9, 7, '2', NULL, 0, '2012-08-26 23:15:35', '2013-08-26 23:15:35', 0, 0, 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_powerlv`
--

CREATE TABLE IF NOT EXISTS `fcl_powerlv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(50) DEFAULT NULL,
  `schedule` varchar(1000) DEFAULT NULL,
  `inputer` varchar(50) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_priceagent`
--

CREATE TABLE IF NOT EXISTS `fcl_priceagent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pricetpl` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_priceagenttpl`
--

CREATE TABLE IF NOT EXISTS `fcl_priceagenttpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `rankid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_pricemy`
--

CREATE TABLE IF NOT EXISTS `fcl_pricemy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_priceplan`
--

CREATE TABLE IF NOT EXISTS `fcl_priceplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rankid` int(11) DEFAULT NULL,
  `discout` double DEFAULT NULL,
  `priceplan` int(11) DEFAULT '1',
  `pricetpl` int(11) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fcl_priceplan`
--

INSERT INTO `fcl_priceplan` (`id`, `rankid`, `discout`, `priceplan`, `pricetpl`, `aid`) VALUES
(1, 1, 0.01, 1, 0, 0),
(2, 2, 0.01, 1, 0, 0),
(3, 3, 0.01, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_prices`
--

CREATE TABLE IF NOT EXISTS `fcl_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `listprice` double DEFAULT NULL,
  `price_1` double DEFAULT NULL,
  `price_2` double DEFAULT NULL,
  `price_3` double DEFAULT NULL,
  `price_5` double DEFAULT NULL,
  `price_6` double DEFAULT NULL,
  `price_7` double DEFAULT NULL,
  `price_8` double DEFAULT NULL,
  `price_9` double DEFAULT NULL,
  `price_10` double DEFAULT NULL,
  `price_11` double DEFAULT NULL,
  `price_4` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_privateprices`
--

CREATE TABLE IF NOT EXISTS `fcl_privateprices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `price` double NOT NULL,
  `operator` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_products`
--

CREATE TABLE IF NOT EXISTS `fcl_products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) DEFAULT NULL,
  `ptagname` varchar(50) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `catid_family` varchar(50) DEFAULT NULL,
  `ptype` int(11) DEFAULT NULL,
  `imagesmall` varchar(50) DEFAULT NULL,
  `imagefull` varchar(255) DEFAULT NULL,
  `czweb` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `tag` tinyint(4) DEFAULT NULL,
  `sell` tinyint(4) DEFAULT NULL,
  `new` tinyint(4) DEFAULT NULL,
  `remd` tinyint(4) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `prop` text,
  `abst` varchar(255) DEFAULT NULL,
  `pdesc` text,
  `click` int(11) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `addedip` varchar(50) DEFAULT NULL,
  `mdydate` datetime DEFAULT NULL,
  `mdyby` varchar(50) DEFAULT NULL,
  `mdyip` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `listprice` double DEFAULT NULL,
  `idlable` varchar(50) DEFAULT NULL,
  `qtymax` int(11) DEFAULT NULL,
  `qtymin` int(11) DEFAULT NULL,
  `qtylist` varchar(255) DEFAULT NULL,
  `disparea` tinyint(4) DEFAULT NULL,
  `dispserv` tinyint(4) DEFAULT NULL,
  `cztpl` int(11) DEFAULT NULL,
  `syscztpl` int(11) DEFAULT '0',
  `exchange` varchar(255) DEFAULT NULL,
  `aid` int(11) DEFAULT '-1',
  `pcheck` tinyint(4) DEFAULT '0',
  `pfee` double DEFAULT '0',
  `yktpid` int(11) DEFAULT NULL,
  `ykttag` varchar(100) DEFAULT NULL,
  `yktpoints` int(11) DEFAULT NULL,
  `hassup` tinyint(4) DEFAULT '-1',
  `supfirst` tinyint(4) DEFAULT '0',
  `yktcard` varchar(100) DEFAULT NULL,
  `forykt` tinyint(4) DEFAULT '1',
  `forb2b` tinyint(4) DEFAULT '1',
  `forshop` tinyint(4) DEFAULT '1',
  `forc2c` tinyint(4) DEFAULT '0',
  `stocks` int(11) DEFAULT NULL,
  `otherweb` varchar(1000) DEFAULT NULL,
  `tradeterm` varchar(1000) DEFAULT NULL,
  `disponshow` int(11) DEFAULT '0',
  `unit` varchar(10) DEFAULT NULL,
  `mchid` varchar(255) DEFAULT NULL,
  `mchpwd` text,
  `mchothers` varchar(255) DEFAULT NULL,
  `mchvalid` tinyint(4) DEFAULT '1',
  `inrecycle` tinyint(4) DEFAULT '0',
  `ordering` tinyint(4) DEFAULT '0',
  `namecolor` varchar(7) DEFAULT NULL,
  `webtitle` varchar(255) DEFAULT NULL,
  `meta_keywords` tinytext,
  `meta_description` tinytext,
  `sup_keywords` varchar(255) DEFAULT NULL,
  `pinyin` varchar(25) DEFAULT NULL,
  `sup` tinyint(4) DEFAULT '-1',
  `onsup` tinyint(4) DEFAULT '-1',
  `checked` tinyint(4) DEFAULT '1',
  `tosys` tinyint(4) DEFAULT '1',
  `points` int(11) DEFAULT '0',
  `pricetpl` int(11) DEFAULT '0',
  `palert` text,
  `scored` int(11) DEFAULT '0',
  `reward` double DEFAULT '0',
  `isbold` tinyint(4) DEFAULT '0',
  `quickuse` tinyint(4) DEFAULT '0',
  `quickusetime` double DEFAULT NULL,
  `canmakeprice` tinyint(4) DEFAULT '1',
  `buylit` tinyint(4) DEFAULT '0',
  `buylitstardate` varchar(255) DEFAULT NULL,
  `buylitenddate` varchar(255) DEFAULT NULL,
  `yktipchecktime` int(11) DEFAULT NULL,
  `yktipchecknum` int(11) DEFAULT NULL,
  `orderalert` varchar(255) DEFAULT NULL,
  `buyaday` int(11) DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_quick`
--

CREATE TABLE IF NOT EXISTS `fcl_quick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `mobiletxt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fcl_quick`
--

INSERT INTO `fcl_quick` (`id`, `nick`, `name`, `pid`, `mobiletxt`) VALUES
(1, 'QQ币直充', 'qb', 283, NULL),
(2, 'QQ服务直充', 'yw', 286, NULL),
(3, '话费', 'mobile', 0, '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');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ranks`
--

CREATE TABLE IF NOT EXISTS `fcl_ranks` (
  `id` int(11) NOT NULL,
  `rank` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `money` double NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `isdefault` tinyint(4) DEFAULT NULL,
  `discount` double DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fcl_ranks`
--

INSERT INTO `fcl_ranks` (`id`, `rank`, `name`, `money`, `gid`, `isdefault`, `discount`) VALUES
(1, 0, '高级VIP经销商', 10000, 1, 1, 0.05),
(2, 0, '终极VIP经销商', 20000, 1, 0, 0.05),
(3, 0, '至尊VIP经销商', 30000, 2, 0, 0.05),
(4, 0, '皇冠VIP经销商', 40000, 2, 0, 0.05),
(5, 0, '平台管理员', 50000, 3, 0, 0.05),
(6, 0, '平台站长', 60000, 3, 0, 0.05);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_reviews`
--

CREATE TABLE IF NOT EXISTS `fcl_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `agree` int(11) DEFAULT '0',
  `disagree` int(11) DEFAULT '0',
  `marks` double DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `reviewer` varchar(50) DEFAULT NULL,
  `checked` tinyint(4) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `reviewerip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_reward`
--

CREATE TABLE IF NOT EXISTS `fcl_reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `reward` double NOT NULL DEFAULT '0',
  `rtype` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_rewardtpl`
--

CREATE TABLE IF NOT EXISTS `fcl_rewardtpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rewardtpl` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `reward` int(11) NOT NULL,
  `rtype` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_rewardtplname`
--

CREATE TABLE IF NOT EXISTS `fcl_rewardtplname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `rankid` int(11) NOT NULL,
  `aid` int(11) NOT NULL DEFAULT '0',
  `parentid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_sales`
--

CREATE TABLE IF NOT EXISTS `fcl_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT '0',
  `underlingid` int(11) DEFAULT NULL,
  `sellscale` double DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_scored`
--

CREATE TABLE IF NOT EXISTS `fcl_scored` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) DEFAULT NULL,
  `scored` int(11) NOT NULL,
  `fat` int(11) DEFAULT NULL,
  `fbt` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `ordno` varchar(255) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `method` int(11) DEFAULT NULL,
  `admname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_scoredorder`
--

CREATE TABLE IF NOT EXISTS `fcl_scoredorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordno` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `scored` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT '0',
  `qty` int(11) DEFAULT NULL,
  `ordstate` int(11) DEFAULT NULL,
  `method` int(11) DEFAULT NULL,
  `param` int(11) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `cip` varchar(20) DEFAULT NULL,
  `comefrom` int(11) DEFAULT '1',
  `admname` varchar(255) DEFAULT NULL,
  `failreason` varchar(255) DEFAULT NULL,
  `dealdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_scoredproduct`
--

CREATE TABLE IF NOT EXISTS `fcl_scoredproduct` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) DEFAULT NULL,
  `pdesc` text,
  `thumb` varchar(255) DEFAULT NULL,
  `scored` int(11) DEFAULT '100',
  `scoredb2c` int(11) DEFAULT '0',
  `scoredykt` int(11) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(100) DEFAULT NULL,
  `createip` varchar(50) DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `editby` varchar(100) DEFAULT NULL,
  `editip` varchar(50) DEFAULT NULL,
  `forb2b` int(11) DEFAULT '0',
  `forb2c` int(11) DEFAULT '0',
  `forykt` int(11) DEFAULT '0',
  `stocks` int(11) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `method` int(11) DEFAULT '1',
  `param` int(11) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_security`
--

CREATE TABLE IF NOT EXISTS `fcl_security` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `ipcheck` tinyint(4) DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `maccheck` tinyint(4) DEFAULT '0',
  `mac` varchar(100) DEFAULT NULL,
  `hdecheck` tinyint(4) DEFAULT '0',
  `hde` varchar(100) DEFAULT NULL,
  `cpucheck` tinyint(4) DEFAULT '0',
  `cpu` varchar(100) DEFAULT NULL,
  `mibaokacheck` tinyint(4) DEFAULT '0',
  `mibaoka` varchar(25) DEFAULT NULL,
  `mobilecheck` tinyint(4) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `randcheck` tinyint(4) DEFAULT '0',
  `randpos` int(11) DEFAULT '1',
  `randtype` int(11) DEFAULT '1',
  `tradeneedpwd` tinyint(4) DEFAULT '0',
  `addrcheck` tinyint(4) DEFAULT '0',
  `addr` varchar(255) DEFAULT NULL,
  `ipnopcheck` tinyint(4) DEFAULT '0',
  `ipnop` varchar(255) DEFAULT NULL,
  `mobileconfig` varchar(255) DEFAULT '0,0,0',
  `mibaokaconfig` varchar(255) DEFAULT '0,0,0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_session`
--

CREATE TABLE IF NOT EXISTS `fcl_session` (
  `id` char(30) NOT NULL,
  `sess_expires` int(11) NOT NULL,
  `sess` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_setting`
--

CREATE TABLE IF NOT EXISTS `fcl_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `argv` varchar(255) DEFAULT NULL,
  `disp` tinyint(4) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `fcl_setting`
--

INSERT INTO `fcl_setting` (`id`, `name`, `argv`, `disp`, `type`) VALUES
(1, 'department', NULL, 1, 'index'),
(2, 'product', '0|prdnew|prdrecomm|prdhot|prdsale|prdtag', 1, 'index'),
(3, 'annunciate', '20', 1, 'index'),
(4, 'help', '20', 1, 'index'),
(5, 'faq', '20', 1, 'index'),
(6, 'prdsale', '0|prdsale', 0, 'index'),
(7, 'annunciate', '20', 1, 'right'),
(8, 'prdsale', '0|prdsale', 1, 'right');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_sn`
--

CREATE TABLE IF NOT EXISTS `fcl_sn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vsn` int(11) DEFAULT NULL,
  `vdate` datetime DEFAULT NULL,
  `vldate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- 转存表中的数据 `fcl_sn`
--

INSERT INTO `fcl_sn` (`id`, `vsn`, `vdate`, `vldate`, `aid`) VALUES
(1, 6499, '2012-10-20 22:31:37', '2012-10-20 22:29:20', 0),
(2, 6500, '2012-11-08 10:34:02', '2012-11-08 10:33:27', 0),
(3, 6501, '2012-11-08 10:32:25', '2012-11-08 10:32:25', 0),
(4, 6502, '2012-11-08 10:33:37', '2012-11-08 10:33:28', 0),
(5, 6503, '2012-11-08 10:41:40', '2012-11-08 10:41:40', 0),
(6, 6504, '2012-12-17 21:25:15', '2012-12-17 21:00:37', 0),
(7, 6505, '2012-12-17 21:02:41', '2012-12-17 21:02:39', 0),
(8, 6506, '2012-12-18 10:57:39', '2012-12-18 10:57:25', 0),
(9, 6507, '2012-12-18 15:17:59', '2012-12-18 15:17:59', 0),
(10, 6508, '2012-12-18 15:18:12', '2012-12-18 15:18:12', 0),
(11, 6509, '2012-12-18 20:42:26', '2012-12-18 20:36:24', 0),
(12, 6510, '2012-12-22 22:57:02', '2012-12-22 22:57:01', 0),
(13, 6511, '2012-12-22 23:01:39', '2012-12-22 23:01:39', 0),
(14, 6512, '2012-12-23 00:13:55', '2012-12-23 00:13:55', 0),
(15, 6513, '2012-12-23 00:17:22', '2012-12-23 00:17:20', 0),
(16, 6514, '2012-12-23 00:21:43', '2012-12-23 00:21:32', 0),
(17, 6515, '2012-12-23 00:30:44', '2012-12-23 00:29:35', 0),
(18, 6516, '2012-12-23 00:54:35', '2012-12-23 00:54:35', 0),
(19, 6517, '2012-12-23 10:10:36', '2012-12-23 10:10:36', 0),
(20, 6518, '2012-12-24 16:59:01', '2012-12-24 16:58:48', 0),
(21, 6519, '2012-12-23 10:18:06', '2012-12-23 10:18:06', 0),
(22, 6520, '2012-12-23 10:18:06', '2012-12-23 10:18:06', 0),
(23, 6521, '2012-12-23 10:22:35', '2012-12-23 10:22:15', 0),
(24, 6522, '2012-12-23 10:23:40', '2012-12-23 10:23:06', 0),
(25, 6523, '2012-12-23 11:19:08', '2012-12-23 11:18:49', 0),
(26, 6524, '2012-12-23 12:14:12', '2012-12-23 12:13:01', 0),
(27, 6525, '2012-12-23 12:39:07', '2012-12-23 12:38:46', 0),
(28, 6526, '2012-12-23 12:33:56', '2012-12-23 12:33:28', 0),
(29, 6527, '2012-12-23 14:10:52', '2012-12-23 12:30:32', 0),
(30, 6528, '2012-12-23 12:46:53', '2012-12-23 12:46:51', 0),
(31, 6529, '2012-12-23 18:01:22', '2012-12-23 18:01:22', 0),
(32, 6530, '2012-12-23 18:21:01', '2012-12-23 18:20:46', 0),
(33, 6531, '2012-12-23 20:57:13', '2012-12-23 20:57:13', 0),
(34, 6532, '2012-12-24 00:22:27', '2012-12-24 00:22:27', 0),
(35, 6533, '2012-12-26 02:31:02', '2012-12-26 02:30:57', 0),
(36, 6534, '2012-12-26 11:53:11', '2012-12-26 11:51:18', 0),
(37, 6535, '2012-12-28 19:15:37', '2012-12-28 19:15:37', 0),
(38, 6536, '2012-12-27 08:44:09', '2012-12-27 08:44:00', 0),
(39, 6537, '2012-12-30 10:04:36', '2012-12-30 10:00:45', 0),
(40, 6538, '2013-01-14 18:54:44', '2013-01-14 18:54:43', 0),
(41, 6539, '2013-01-02 14:53:49', '2013-01-02 14:53:48', 0),
(42, 6540, '2013-01-02 14:52:45', '2013-01-02 14:52:45', 0),
(43, 6541, '2013-01-06 20:12:57', '2013-01-06 20:12:53', 0),
(44, 6542, '2013-01-05 19:19:30', '2013-01-04 19:43:26', 0),
(45, 6543, '2013-01-04 20:04:34', '2013-01-04 20:04:26', 0),
(46, 6544, '2013-01-05 03:46:47', '2013-01-05 03:46:46', 0),
(47, 6545, '2013-01-05 20:45:04', '2013-01-05 20:45:04', 0),
(48, 6546, '2013-01-07 12:04:52', '2013-01-07 12:04:38', 0),
(49, 6547, '2013-01-13 17:58:07', '2013-01-13 17:57:19', 0),
(50, 6548, '2013-01-13 19:24:47', '2013-01-13 19:24:43', 0),
(51, 6558, '2013-01-13 20:13:13', '2013-01-13 20:13:02', 0),
(52, 6559, '2013-01-14 02:12:06', '2013-01-14 02:07:33', 0),
(53, 6560, '2013-01-14 11:15:54', '2013-01-14 11:15:43', 0),
(54, 6561, '2013-01-14 11:16:10', '2013-01-14 11:16:08', 0),
(55, 6562, '2013-01-14 11:16:34', '2013-01-14 11:16:32', 0),
(56, 6621, '2013-01-14 14:32:46', '2013-01-14 14:32:44', 0),
(57, 6604, '2013-01-14 17:11:15', '2013-01-14 14:38:39', 0),
(58, 6622, '2013-01-14 16:00:23', '2013-01-14 16:00:14', 0),
(59, 6623, '2013-01-21 22:42:23', '2013-01-21 22:40:51', 0),
(60, 6624, '2013-01-21 22:42:52', '2013-01-21 22:42:48', 0),
(61, 6625, '2013-01-21 22:41:06', '2013-01-21 22:41:03', 0),
(62, 6626, '2013-01-21 22:41:24', '2013-01-21 22:41:07', 0),
(63, 6627, '2013-01-21 22:49:51', '2013-01-21 22:49:08', 0),
(64, 6628, '2013-01-21 23:01:18', '2013-01-21 23:01:16', 0),
(65, 6629, '2013-01-21 23:06:58', '2013-01-21 23:06:54', 0),
(66, 6630, '2013-01-21 23:42:52', '2013-01-21 23:42:49', 0),
(67, 6631, '2013-01-21 23:21:39', '2013-01-21 23:21:35', 0),
(68, 6745, '2013-03-03 21:15:27', '2013-03-03 21:14:52', 0),
(69, 6746, '2013-03-03 22:00:43', '2013-03-03 22:00:43', 0),
(70, 6747, '2013-03-03 22:49:16', '2013-03-03 22:49:13', 0),
(71, 6748, '2013-03-03 22:54:40', '2013-03-03 22:54:34', 0),
(72, 6749, '2013-03-03 23:15:11', '2013-03-03 23:15:11', 0),
(73, 6750, '2013-03-04 00:36:46', '2013-03-04 00:36:45', 0),
(74, 6751, '2013-03-04 08:23:24', '2013-03-04 08:23:20', 0),
(75, 6752, '2013-03-04 11:21:23', '2013-03-04 11:21:23', 0),
(76, 6753, '2013-03-04 12:41:58', '2013-03-04 11:42:37', 0),
(77, 6754, '2013-03-04 12:54:44', '2013-03-04 12:54:43', 0),
(78, 6755, '2013-03-04 17:42:21', '2013-03-04 17:42:19', 0),
(79, 6756, '2013-03-04 13:42:03', '2013-03-04 13:42:03', 0),
(80, 6757, '2013-03-04 14:23:18', '2013-03-04 14:23:12', 0),
(81, 6758, '2013-03-04 15:28:34', '2013-03-04 15:28:16', 0),
(82, 6759, '2013-03-04 16:53:28', '2013-03-04 16:53:27', 0),
(83, 6760, '2013-03-04 22:42:19', '2013-03-04 22:42:15', 0),
(84, 6761, '2013-03-04 17:42:37', '2013-03-04 17:42:37', 0),
(85, 6762, '2013-03-04 18:23:43', '2013-03-04 18:23:42', 0),
(86, 6763, '2013-03-04 18:59:11', '2013-03-04 18:59:11', 0),
(87, 6730, '2013-03-04 19:39:02', '2013-03-04 19:39:02', 0),
(88, 6767, '2013-06-04 13:04:46', '2013-06-04 13:04:31', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_staffs`
--

CREATE TABLE IF NOT EXISTS `fcl_staffs` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `bossid` int(11) NOT NULL,
  `staffname` varchar(50) NOT NULL,
  `staffpwd` varchar(50) NOT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `createip` varchar(50) NOT NULL,
  `thisdate` datetime DEFAULT NULL,
  `thisip` varchar(50) DEFAULT NULL,
  `thislogintype` tinyint(4) DEFAULT '0',
  `thisloginaccount` int(11) DEFAULT '0',
  `lastdate` datetime DEFAULT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `lastlogintype` tinyint(4) DEFAULT '0',
  `lastloginaccount` int(11) DEFAULT '0',
  `rights` varchar(255) NOT NULL,
  `checktradepwd` tinyint(4) DEFAULT '1',
  `frozen` tinyint(4) NOT NULL DEFAULT '0',
  `dayconsum` double DEFAULT '0',
  `canseeprice` tinyint(4) DEFAULT '0',
  `ini` varchar(255) DEFAULT NULL,
  `tradepwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_sysinfo`
--

CREATE TABLE IF NOT EXISTS `fcl_sysinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `webname` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `b2ctitle` varchar(100) DEFAULT NULL,
  `b2ckeywords` varchar(255) DEFAULT NULL,
  `b2cdescription` varchar(255) DEFAULT NULL,
  `b2csite` varchar(255) DEFAULT NULL,
  `b2cname` varchar(50) DEFAULT NULL,
  `ykttitle` varchar(100) DEFAULT NULL,
  `yktkeywords` varchar(255) DEFAULT NULL,
  `yktdescription` varchar(255) DEFAULT NULL,
  `yktsite` varchar(255) DEFAULT NULL,
  `yktname` varchar(50) DEFAULT NULL,
  `webdesc` longtext,
  `webbank` longtext,
  `useragreement` text,
  `beian` varchar(255) DEFAULT NULL,
  `yktbeian` varchar(255) DEFAULT NULL,
  `b2cbeian` varchar(255) DEFAULT NULL,
  `msn` varchar(500) DEFAULT NULL,
  `qq` varchar(500) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `tel` varchar(500) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `kfmore` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cnnicno` varchar(50) DEFAULT NULL,
  `mailserver` varchar(50) DEFAULT NULL,
  `mailuser` varchar(50) DEFAULT NULL,
  `mailpass` varchar(50) DEFAULT NULL,
  `mailtitle` varchar(50) DEFAULT NULL,
  `mailcontent` longtext,
  `ptmember` int(11) DEFAULT NULL,
  `vip` int(11) DEFAULT NULL,
  `tpmember` int(11) DEFAULT NULL,
  `ypmember` int(11) DEFAULT NULL,
  `jpmember` int(11) DEFAULT NULL,
  `ptname` varchar(50) DEFAULT NULL,
  `vipname` varchar(50) DEFAULT NULL,
  `tpname` varchar(50) DEFAULT NULL,
  `ypname` varchar(50) DEFAULT NULL,
  `jpname` varchar(50) DEFAULT NULL,
  `visit` int(11) DEFAULT NULL,
  `webopen` varchar(50) DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  `yktcloseinfo` text,
  `b2ccloseinfo` text,
  `b2bcloseinfo` text,
  `postsetting` varchar(50) DEFAULT '0|0|0',
  `cregmailtitle` varchar(255) DEFAULT NULL,
  `cregmailbody` tinytext,
  `aregmailtitle` varchar(255) DEFAULT NULL,
  `aregmailbody` tinytext,
  `worktime` varchar(255) DEFAULT NULL,
  `config` varchar(255) DEFAULT '0',
  `popcontent` tinytext,
  `alertremain` double DEFAULT '50',
  `tradepwd` varchar(255) DEFAULT '21232f297a57a5a743894a0e4a801fc3',
  `pwdconfig` varchar(255) DEFAULT '1',
  `fee` double DEFAULT '0',
  `inrecycle` tinyint(4) DEFAULT '0',
  `hotkey` tinytext,
  `b2cmenu` text,
  `b2bmenu` text,
  `yktmenu` text,
  `fetion_mobile` varchar(50) DEFAULT NULL,
  `fetion_pass` varchar(50) DEFAULT NULL,
  `fetion_send` tinyint(4) DEFAULT '0',
  `hibaidu` tinytext,
  `wangwang` tinytext,
  `yktarray` varchar(255) DEFAULT NULL,
  `fyktarray` varchar(255) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `yktnav` text,
  `admdir` varchar(50) DEFAULT NULL,
  `defaultmenu` varchar(255) DEFAULT NULL,
  `iplock` text,
  `moneysymbol` varchar(20) DEFAULT NULL,
  `moneyunit` varchar(20) DEFAULT NULL,
  `bankalert` text,
  `loginurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fcl_sysinfo`
--

INSERT INTO `fcl_sysinfo` (`id`, `title`, `keywords`, `description`, `webname`, `website`, `b2ctitle`, `b2ckeywords`, `b2cdescription`, `b2csite`, `b2cname`, `ykttitle`, `yktkeywords`, `yktdescription`, `yktsite`, `yktname`, `webdesc`, `webbank`, `useragreement`, `beian`, `yktbeian`, `b2cbeian`, `msn`, `qq`, `email`, `fax`, `tel`, `zip`, `kfmore`, `address`, `cnnicno`, `mailserver`, `mailuser`, `mailpass`, `mailtitle`, `mailcontent`, `ptmember`, `vip`, `tpmember`, `ypmember`, `jpmember`, `ptname`, `vipname`, `tpname`, `ypname`, `jpname`, `visit`, `webopen`, `aid`, `yktcloseinfo`, `b2ccloseinfo`, `b2bcloseinfo`, `postsetting`, `cregmailtitle`, `cregmailbody`, `aregmailtitle`, `aregmailbody`, `worktime`, `config`, `popcontent`, `alertremain`, `tradepwd`, `pwdconfig`, `fee`, `inrecycle`, `hotkey`, `b2cmenu`, `b2bmenu`, `yktmenu`, `fetion_mobile`, `fetion_pass`, `fetion_send`, `hibaidu`, `wangwang`, `yktarray`, `fyktarray`, `startdate`, `enddate`, `yktnav`, `admdir`, `defaultmenu`, `iplock`, `moneysymbol`, `moneyunit`, `bankalert`, `loginurl`) VALUES
(1, '', '游戏点卡,Q币Q钻,游戏充值卡,电话卡,手机充值卡', '新云数卡销售平台演示站 - 最大、最安全的网上点卡交易平台，提供点卡、话费、QQ币、QQ业务直充及卡密等特价商品，同时提供优质的售后服务，让你全面安心享受网上购物乐趣', '新云数卡销售平台演示站', 'http://www.xybss.com.cn', '<LI class=bian></LI>', ' <LI class=bian></LI>', '', 'http://www.meiis.com', '美易互联', '我的平台', '', '', 'http://52yma.taobao.com', '旗下淘宝', '', '', '继续注册前请先阅读XX公司在线销售协议\r\n\r\n一、XX省XX市XXX电子商务有限公司使用自己建设的代理商专用电子商务平台系统，通过国际互联网络为用户提供网络游戏分销服务。同时，用户必须是：\r\n1.必须具备合法经营资格个人或者法人； \r\n2.自行配备上网的所需设备，包括个人电脑、调制解调器或其他必备上网装置； \r\n3.自行负担个人上网所支付的与此服务有关的电话费用、网络费用。 \r\n\r\n二、基于XX省XX市XXX电子商务有限公司所提供的网络服务的重要性，用户应同意：\r\n1.提供详尽、正确的个人资料，详尽、正确的用户资料和联系方式。 \r\n2.在个人信息或者公司信息发生变化时，及时变更本站的相关信息，以确保信息的准确性。\r\n\r\n三、XX省XX市XXX电子商务有限公司不公开注册用户的姓名、地址、电子邮箱及个人联系方式等，除以下情况外： \r\n1.用户授权XX省XX市XXX电子商务有限公司透露这些信息。 \r\n2.相应的法律及程序要求XX省XX市XXX电子商务有限公司提供用户的个人资料。如果用户提供的资料包含有不正确的信息，XX省XX市XXX电子商务有限公司保留结束用户使用网络服务资格的权利。\r\n\r\n四、服务条款的修改和服务修订 XX省XX市XXX电子商务有限公司有权在必要时修改服务条款，XX省XX市XXX电子商务有限公司服务条款一旦发生变动，将会在重要页面上提示修改内容。如果不同意所改动的内容，用户可以主动取消获得的网络服务。如果用户继续享用网络服务，则视为接受服务条款的变动。XX省XX市XXX电子商务有限公司保留随时修改或中断服务而不需通知用户的权利。XX省XX市XXX电子商务有限公司行使修改或中断服务的权利，不需对用户或第三方负责。\r\n\r\n五、用户隐私制度 尊重用户个人隐私是XX省XX市XXX电子商务有限公司的一项基本政策。所以，XX省XX市XXX电子商务有限公司一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在XX省XX市XXX电子商务有限公司中的非公开内容，除非有法律许可要求或XX省XX市XXX电子商务有限公司在诚信的基础上认为透露这些信件在以下四种情况是必要的：\r\n1. 遵守有关法律规定，遵从XX省XX市XXX电子商务有限公司合法服务程序。 \r\n2. 保持维护XX省XX市XXX电子商务有限公司的商标所有权。\r\n3. 在紧急情况下竭力维护用户个人和社会大众的隐私安全。\r\n4. 符合其他相关的要求。 \r\n\r\n六、用户的帐号，密码和安全 用户一旦注册成功，成为XX省XX市XXX电子商务有限公司的合法用户，将得到一个用户名和密码。用户将对用户名和密码安全负全部责任。由于用户自己管理和使用不当导致的密码被盗用现象XX省XX市XXX电子商务有限公司不承担任何责任。另外，每个用户都要对以其用户名进行的所有活动和事件负全责。您可随时根据指示改变您的密码。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告XX省XX市XXX电子商务有限公司。\r\n\r\n七、拒绝提供担保 用户个人对网络服务的使用承担风险。XX省XX市XXX电子商务有限公司对此不作任何类型的担保，不论是明确的或隐含的，但是不对商业性的隐含担保、特定目的和不违反规定的适当担保作限制。XX省XX市XXX电子商务有限公司不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保。XX省XX市XXX电子商务有限公司对在XX省XX市XXX电子商务有限公司上得到的任何商品购物服务或交易进程，不作担保。 \r\n\r\n八、有限责任 XX省XX市XXX电子商务有限公司对任何直接、间接、偶然及特殊的损害不负责任，这些损害可能来自：不正当使用网络，在网上购买商品或进行同类型服务，在网上进行交易，非法使用网络服务或用户传送的信息有所变动。这些行为都有可能会导致XX省XX市XXX电子商务有限公司的形象受损，所以XX省XX市XXX电子商务有限公司事先提出这种损害的可能性。 \r\n\r\n九、对用户信息的存储和限制 XX省XX市XXX电子商务有限公司不对用户所发布信息的删除或储存失败负责。XX省XX市XXX电子商务有限公司有判定用户的行为是否符合XX省XX市XXX电子商务有限公司服务条款的要求和精神的保留权利，如果用户违背了服务条款的规定，XX省XX市XXX电子商务有限公司有中断对其提供网络服务的权利。\r\n\r\n十、用户必须遵循： \r\n1.从中国境内向外传输技术性资料时必须符合中国有关法规。 \r\n2.使用网络服务不作非法用途。\r\n3.不干扰或混乱网络服务。 \r\n4.遵守所有使用网络服务的网络协议、规定、程序和惯例。 用户须承诺不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽等信息资料。另外，用户也不能传输任何教唆他人构成犯罪行为的资料；不能传输助长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上提到的服务条款，XX省XX市XXX电子商务有限公司将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。用户若在XX省XX市XXX电子商务有限公司上散布和传播反动、色情或其他违反国家法律的信息，XX省XX市XXX电子商务有限公司的系统记录有可能作为用户违反法律的证据。 \r\n\r\n十一、保障 用户同意保障和维护XX省XX市XXX电子商务有限公司全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用等。 \r\n\r\n十二、结束服务 用户或XX省XX市XXX电子商务有限公司可随时根据实际情况中断一项或多项网络服务。XX省XX市XXX电子商务有限公司不需对任何个人或第三方负责而随时中断服务。用户对后来的条款修改有异议，或对XX省XX市XXX电子商务有限公司的服务不满，可以行使如下权利： \r\n1.停止使用XX省XX市XXX电子商务有限公司的网络服务。 \r\n2.通告XX省XX市XXX电子商务有限公司停止对该用户的服务。结束用户服务后，用户使用网络服务的权利马上中止。从那时起，用户没有权利，XX省XX市XXX电子商务有限公司也没有义务传送任何未处理的信息或未完成的服务给用户或第三方。 \r\n\r\n十三、通告 所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。服务条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。\r\n\r\n十四、网络服务内容的所有权 XX省XX市XXX电子商务有限公司定义的网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；XX省XX市XXX电子商务有限公司为用户提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在XX省XX市XXX电子商务有限公司和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。XX省XX市XXX电子商务有限公司所有的文章版权归原文作者和XX省XX市XXX电子商务有限公司共同所有，任何人需要转载XX省XX市XXX电子商务有限公司的文章，必须征得原文作者或XX省XX市XXX电子商务有限公司授权。 \r\n\r\n十五、权利和义务 \r\n1.加盟用户有义务保证系统的公平性，不准恶意破坏系统的公平性或者攻击系统。 \r\n2.加盟用户有义务维护本系统的形象，不准恶意诽谤系统及系统拥有者：XX省XX市XXX电子商务有限公司。\r\n3.系统拥有者将尽最大能力维护系统的稳定性和安全性，保证加盟用户正常使用，天灾、人祸不在此范围内。 \r\n4.做为系统的拥有者XX省XX市XXX电子商务有限公司，有权力对非法使用本系统的用户进行停用、删除等操作。用户服务条款要与中华人民共和国的法律解释相一致，用户和XX省XX市XXX电子商务有限公司一致同意服从高等法院所有管辖。如发生XX省XX市XXX电子商务有限公司服务条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户产生法律效力和影响。 \r\n\r\n十六、关于账号的取消规定 为了保证账号的合法性，凡是自注册成功，账号生效之日起，如有用户非法使用该用户账号或者进行非法操作的，XX省XX市XXX电子商务有限公司享有封停或删除该账号的权利，并且保留最终的解释权和追究法律责任的权力。\r\n\r\n\r\n以上条款的解释权属XX省XX市XXX电子商务有限公司所有 \r\n二零一三年五月 ', '备案中', '官网购买', ' <LI class=bian></LI>', '936992497', '936992497|936992497|936992497', '936992497', '18338762664', '18338762664|18338762664|18338762664', 0, NULL, '', '', 'smtp.126.com', 'xxx@126.com', 'xxxxxx', '欢迎您在XX站购物', '尊敬的{username}:\r\n您好，欢迎来到{webname}购物\r\n您购买的商品\r\n订单编号: {ordno}\r\n商品名称: {pname}\r\n商品类型: {ptype}\r\n{result}\r\n\r\n{webname}\r\n{website}\r\n{date}\r\n', 0, 0, 0, 0, 0, '', '', '', '', '', 0, '0|1|1', 0, '您好，一卡通系统暂时关闭，明日开放', '您好，零售系统暂时关闭，明日开放', '您好，批发系统暂时关闭，明日开放', '0|1|1', '', '', '欢迎您在注册XX站会员', '欢迎您在注册XX站会员\r\n\r\n您的注册信息如下：\r\n用户名: {username}\r\n密码: {userpass}\r\n\r\n{website}\r\n{date}\r\n', '10:00 - 22:00', '1|1|1|0|1|0|3|2|1|2|0|0|1|0|60|0|1|1|1|300|1|1|0|0|1|0|0|0|1|1|-1|30|0|0|0|0|10000|0|100000|1', '', 10, '0053c6546c0d3961ab6044ffceb32261', '1', 0.05, 0, '', '', '业务补单|1|http://网址/index.php?m=mod_b2b&amp;c=bd', NULL, 'admin', '123456', 0, '点击支持新云卡销售系', '18338762664', '1,5,10,15,30,45,50,100', '1,5,10,15,30,45,50,100', NULL, NULL, '', NULL, '1,1,0,1,1,1,1,0,0,1,0,1,1,1,1,1,1,0,1,1,1,0,0,1,0,0,1,0,1,1,1,1,1,0,1,1,0,0,1,1,0,0,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', NULL, '￥', '元', '请付款成功后，不要关闭页面，系统会自动跳转回本平台，您看到成功充值后才算完成付款，如果没有跳转，请查看浏览器是否做了限制，可以试行恢复浏览器默认配置看看', ''),
(3, '新云数卡黑色演示分站', '新云数卡黑色演示分站', '新云数卡黑色演示分站', '新云数卡黑色演示分站', 'http://vip6.dipokm.com', '<LI class=bian></LI>', ' <LI class=bian></LI>', '', 'http://www.meiis.com', '新云数卡黑色演示分站', '新云数卡黑色演示分站', '', '', 'http://52yma.taobao.com', '新云数卡黑色演示分站', '', '', '继续注册前请先阅读XX公司在线销售协议\r\n\r\n一、XX省XX市XXX电子商务有限公司使用自己建设的代理商专用电子商务平台系统，通过国际互联网络为用户提供网络游戏分销服务。同时，用户必须是：\r\n1.必须具备合法经营资格个人或者法人； \r\n2.自行配备上网的所需设备，包括个人电脑、调制解调器或其他必备上网装置； \r\n3.自行负担个人上网所支付的与此服务有关的电话费用、网络费用。 \r\n\r\n二、基于XX省XX市XXX电子商务有限公司所提供的网络服务的重要性，用户应同意：\r\n1.提供详尽、正确的个人资料，详尽、正确的用户资料和联系方式。 \r\n2.在个人信息或者公司信息发生变化时，及时变更本站的相关信息，以确保信息的准确性。\r\n\r\n三、XX省XX市XXX电子商务有限公司不公开注册用户的姓名、地址、电子邮箱及个人联系方式等，除以下情况外： \r\n1.用户授权XX省XX市XXX电子商务有限公司透露这些信息。 \r\n2.相应的法律及程序要求XX省XX市XXX电子商务有限公司提供用户的个人资料。如果用户提供的资料包含有不正确的信息，XX省XX市XXX电子商务有限公司保留结束用户使用网络服务资格的权利。\r\n\r\n四、服务条款的修改和服务修订 XX省XX市XXX电子商务有限公司有权在必要时修改服务条款，XX省XX市XXX电子商务有限公司服务条款一旦发生变动，将会在重要页面上提示修改内容。如果不同意所改动的内容，用户可以主动取消获得的网络服务。如果用户继续享用网络服务，则视为接受服务条款的变动。XX省XX市XXX电子商务有限公司保留随时修改或中断服务而不需通知用户的权利。XX省XX市XXX电子商务有限公司行使修改或中断服务的权利，不需对用户或第三方负责。\r\n\r\n五、用户隐私制度 尊重用户个人隐私是XX省XX市XXX电子商务有限公司的一项基本政策。所以，XX省XX市XXX电子商务有限公司一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在XX省XX市XXX电子商务有限公司中的非公开内容，除非有法律许可要求或XX省XX市XXX电子商务有限公司在诚信的基础上认为透露这些信件在以下四种情况是必要的：\r\n1. 遵守有关法律规定，遵从XX省XX市XXX电子商务有限公司合法服务程序。 \r\n2. 保持维护XX省XX市XXX电子商务有限公司的商标所有权。\r\n3. 在紧急情况下竭力维护用户个人和社会大众的隐私安全。\r\n4. 符合其他相关的要求。 \r\n\r\n六、用户的帐号，密码和安全 用户一旦注册成功，成为XX省XX市XXX电子商务有限公司的合法用户，将得到一个用户名和密码。用户将对用户名和密码安全负全部责任。由于用户自己管理和使用不当导致的密码被盗用现象XX省XX市XXX电子商务有限公司不承担任何责任。另外，每个用户都要对以其用户名进行的所有活动和事件负全责。您可随时根据指示改变您的密码。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告XX省XX市XXX电子商务有限公司。\r\n\r\n七、拒绝提供担保 用户个人对网络服务的使用承担风险。XX省XX市XXX电子商务有限公司对此不作任何类型的担保，不论是明确的或隐含的，但是不对商业性的隐含担保、特定目的和不违反规定的适当担保作限制。XX省XX市XXX电子商务有限公司不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保。XX省XX市XXX电子商务有限公司对在XX省XX市XXX电子商务有限公司上得到的任何商品购物服务或交易进程，不作担保。 \r\n\r\n八、有限责任 XX省XX市XXX电子商务有限公司对任何直接、间接、偶然及特殊的损害不负责任，这些损害可能来自：不正当使用网络，在网上购买商品或进行同类型服务，在网上进行交易，非法使用网络服务或用户传送的信息有所变动。这些行为都有可能会导致XX省XX市XXX电子商务有限公司的形象受损，所以XX省XX市XXX电子商务有限公司事先提出这种损害的可能性。 \r\n\r\n九、对用户信息的存储和限制 XX省XX市XXX电子商务有限公司不对用户所发布信息的删除或储存失败负责。XX省XX市XXX电子商务有限公司有判定用户的行为是否符合XX省XX市XXX电子商务有限公司服务条款的要求和精神的保留权利，如果用户违背了服务条款的规定，XX省XX市XXX电子商务有限公司有中断对其提供网络服务的权利。\r\n\r\n十、用户必须遵循： \r\n1.从中国境内向外传输技术性资料时必须符合中国有关法规。 \r\n2.使用网络服务不作非法用途。\r\n3.不干扰或混乱网络服务。 \r\n4.遵守所有使用网络服务的网络协议、规定、程序和惯例。 用户须承诺不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽等信息资料。另外，用户也不能传输任何教唆他人构成犯罪行为的资料；不能传输助长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上提到的服务条款，XX省XX市XXX电子商务有限公司将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。用户若在XX省XX市XXX电子商务有限公司上散布和传播反动、色情或其他违反国家法律的信息，XX省XX市XXX电子商务有限公司的系统记录有可能作为用户违反法律的证据。 \r\n\r\n十一、保障 用户同意保障和维护XX省XX市XXX电子商务有限公司全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用等。 \r\n\r\n十二、结束服务 用户或XX省XX市XXX电子商务有限公司可随时根据实际情况中断一项或多项网络服务。XX省XX市XXX电子商务有限公司不需对任何个人或第三方负责而随时中断服务。用户对后来的条款修改有异议，或对XX省XX市XXX电子商务有限公司的服务不满，可以行使如下权利： \r\n1.停止使用XX省XX市XXX电子商务有限公司的网络服务。 \r\n2.通告XX省XX市XXX电子商务有限公司停止对该用户的服务。结束用户服务后，用户使用网络服务的权利马上中止。从那时起，用户没有权利，XX省XX市XXX电子商务有限公司也没有义务传送任何未处理的信息或未完成的服务给用户或第三方。 \r\n\r\n十三、通告 所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。服务条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。\r\n\r\n十四、网络服务内容的所有权 XX省XX市XXX电子商务有限公司定义的网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；XX省XX市XXX电子商务有限公司为用户提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在XX省XX市XXX电子商务有限公司和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。XX省XX市XXX电子商务有限公司所有的文章版权归原文作者和XX省XX市XXX电子商务有限公司共同所有，任何人需要转载XX省XX市XXX电子商务有限公司的文章，必须征得原文作者或XX省XX市XXX电子商务有限公司授权。 \r\n\r\n十五、权利和义务 \r\n1.加盟用户有义务保证系统的公平性，不准恶意破坏系统的公平性或者攻击系统。 \r\n2.加盟用户有义务维护本系统的形象，不准恶意诽谤系统及系统拥有者：XX省XX市XXX电子商务有限公司。\r\n3.系统拥有者将尽最大能力维护系统的稳定性和安全性，保证加盟用户正常使用，天灾、人祸不在此范围内。 \r\n4.做为系统的拥有者XX省XX市XXX电子商务有限公司，有权力对非法使用本系统的用户进行停用、删除等操作。用户服务条款要与中华人民共和国的法律解释相一致，用户和XX省XX市XXX电子商务有限公司一致同意服从高等法院所有管辖。如发生XX省XX市XXX电子商务有限公司服务条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户产生法律效力和影响。 \r\n\r\n十六、关于账号的取消规定 为了保证账号的合法性，凡是自注册成功，账号生效之日起，如有用户非法使用该用户账号或者进行非法操作的，XX省XX市XXX电子商务有限公司享有封停或删除该账号的权利，并且保留最终的解释权和追究法律责任的权力。\r\n\r\n\r\n以上条款的解释权属XX省XX市XXX电子商务有限公司所有 \r\n二零一三年五月 ', '备案中', '官网购买', ' <LI class=bian></LI>', '936992497', '936992497|936992497|936992497', '936992497', '18338762664', '18338762664|18338762664|18338762664', 0, '', '', '', '', '', '', '欢迎您在XX站购物', '尊敬的{username}:\r\n您好，欢迎来到{webname}购物\r\n您购买的商品\r\n订单编号: {ordno}\r\n商品名称: {pname}\r\n商品类型: {ptype}\r\n{result}\r\n\r\n{webname}\r\n{website}\r\n{date}\r\n', 0, 0, 0, 0, 0, '', '', '', '', '', 0, '0|1|1', 10000, '您好，一卡通系统暂时关闭，明日开放', '您好，零售系统暂时关闭，明日开放', '您好，批发系统暂时关闭，明日开放', '0|1|1', '', '', '欢迎您在注册XX站会员', '欢迎您在注册XX站会员\r\n\r\n您的注册信息如下：\r\n用户名: {username}\r\n密码: {userpass}\r\n\r\n{website}\r\n{date}\r\n', '10:00 - 22:00', '0|1|1|0|1|0|3|2|2|2|0|0|1|0|60|0|1|0', '', 10, '0053c6546c0d3961ab6044ffceb32261', '1', 0.05, 0, '', '', '', '', '', '', 0, '点击支持新云卡销售系', '18338762664', '1,5,10,15,30,45,50,100', '1,5,10,15,30,45,50,100', '2014-05-06 13:58:11', '2015-05-06 13:58:11', '', '10000', '1,1,0,1,1,1,1,0,0,1,0,1,1,1,1,1,1,0,1,1,1,0,0,1,0,0,1,0,1,1,1,1,1,0,1,1,0,0,1,1,0,0,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '', '￥', '元', '请付款成功后，不要关闭页面，系统会自动跳转回本平台，您看到成功充值后才算完成付款，如果没有跳转，请查看浏览器是否做了限制，可以试行恢复浏览器默认配置看看', '');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_sysnet`
--

CREATE TABLE IF NOT EXISTS `fcl_sysnet` (
  `uid` int(11) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `upwd` varchar(255) DEFAULT NULL,
  `usign` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fcl_sysnet`
--

INSERT INTO `fcl_sysnet` (`uid`, `uname`, `upwd`, `usign`) VALUES
(0, '', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- 表的结构 `fcl_trades`
--

CREATE TABLE IF NOT EXISTS `fcl_trades` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `ykt` tinyint(11) DEFAULT '0',
  `yktnumber` varchar(50) DEFAULT NULL,
  `tradetype` tinyint(4) NOT NULL,
  `ordno` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `outcome` double NOT NULL DEFAULT '0',
  `income` double NOT NULL DEFAULT '0',
  `fat` double NOT NULL,
  `fbt` double NOT NULL,
  `operator` varchar(50) NOT NULL,
  `otherside` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `price` double DEFAULT NULL,
  `listprice` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admname` varchar(50) DEFAULT NULL,
  `reward` double DEFAULT '0',
  `bindaid` int(11) DEFAULT '0',
  `checkout` int(11) DEFAULT '0',
  `realreward` double DEFAULT '0',
  `checkoutreason` varchar(255) DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_tradeshistory`
--

CREATE TABLE IF NOT EXISTS `fcl_tradeshistory` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `ykt` tinyint(11) DEFAULT '0',
  `yktnumber` varchar(50) DEFAULT NULL,
  `tradetype` tinyint(4) NOT NULL,
  `ordno` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `outcome` double NOT NULL DEFAULT '0',
  `income` double NOT NULL DEFAULT '0',
  `fat` double NOT NULL,
  `fbt` double NOT NULL,
  `operator` varchar(50) NOT NULL,
  `otherside` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `price` double DEFAULT NULL,
  `listprice` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admname` varchar(50) DEFAULT NULL,
  `reward` double DEFAULT '0',
  `bindaid` int(11) DEFAULT '0',
  `checkout` int(11) DEFAULT '0',
  `realreward` double DEFAULT '0',
  `checkoutreason` varchar(255) DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_vinfo`
--

CREATE TABLE IF NOT EXISTS `fcl_vinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vip` varchar(50) DEFAULT NULL,
  `vsn` int(11) DEFAULT NULL,
  `vgo` varchar(255) DEFAULT NULL,
  `vref` varchar(255) DEFAULT NULL,
  `vname` varchar(50) DEFAULT NULL,
  `vreq` varchar(255) DEFAULT NULL,
  `vdate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `fcl_vinfo`
--

INSERT INTO `fcl_vinfo` (`id`, `vip`, `vsn`, `vgo`, `vref`, `vname`, `vreq`, `vdate`, `aid`) VALUES
(1, '182.145.31.10', 6760, '/b2b/', '直接访问', '匿名', '空', '2013-03-04 22:34:30', 0),
(2, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=reg', 'http://yuchen.121ka.net/b2b/', '匿名', '空', '2013-03-04 22:35:16', 0),
(3, '182.145.31.10', 6760, '/index.php?m=mod_b2b', '直接访问', '匿名', '空', '2013-03-04 22:35:42', 0),
(4, '182.145.31.10', 6760, '/b2b/', 'http://yuchen.121ka.net/index.php?m=mod_b2b', '匿名', '空', '2013-03-04 22:36:12', 0),
(5, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-03-04 22:36:18', 0),
(6, '182.145.31.10', 6760, '/b2b/', '直接访问', '匿名', '空', '2013-03-04 22:38:08', 0),
(7, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=reg', 'http://yuchen.121ka.net/b2b/', '匿名', '空', '2013-03-04 22:38:09', 0),
(8, '182.145.31.10', 6760, '/index.php?m=mod_b2b', '直接访问', '匿名', '空', '2013-03-04 22:38:59', 0),
(9, '182.145.31.10', 6760, '/b2b/', '直接访问', '匿名', '空', '2013-03-04 22:39:49', 0),
(10, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-03-04 22:39:59', 0),
(11, '182.145.31.10', 6760, '/b2b/', '直接访问', '匿名', '空', '2013-03-04 22:40:03', 0),
(12, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin1', '空', '2013-03-04 22:40:10', 0),
(13, '182.145.31.10', 6760, '/b2b/', '直接访问', '匿名', '空', '2013-03-04 22:40:58', 0),
(14, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-03-04 22:41:05', 0),
(15, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-03-04 22:41:59', 0),
(16, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=Home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame&a=top', 'admin', '空', '2013-03-04 22:42:15', 0),
(17, '182.145.31.10', 6760, '/index.php?m=mod_b2b&a=home', 'http://yuchen.121ka.net/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-03-04 22:42:19', 0),
(18, '118.121.132.54', 6767, 'http://ceshi.cy53.com/', '直接访问', '匿名', '空', '2013-06-04 13:04:30', 0),
(19, '118.121.132.54', 6767, 'http://ceshi.cy53.com/b2b/', 'http://ceshi.cy53.com/', '匿名', '空', '2013-06-04 13:04:31', 0),
(20, '118.121.132.54', 6767, 'http://ceshi.cy53.com/index.php?m=mod_b2b&a=home', 'http://ceshi.cy53.com/index.php?m=mod_b2b&c=Frame', 'admin', '空', '2013-06-04 13:04:46', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_vipinfo`
--

CREATE TABLE IF NOT EXISTS `fcl_vipinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vip` varchar(50) DEFAULT NULL,
  `vdate` datetime DEFAULT NULL,
  `vldate` datetime DEFAULT NULL,
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcl_vipinfo`
--

INSERT INTO `fcl_vipinfo` (`id`, `vip`, `vdate`, `vldate`, `aid`) VALUES
(1, '118.121.132.54', '2013-06-04 13:04:46', '2013-06-04 13:04:31', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcl_yktnp`
--

CREATE TABLE IF NOT EXISTS `fcl_yktnp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `yktid` int(11) DEFAULT NULL,
  `yktprice` double(11,0) DEFAULT NULL,
  `ykttype` int(11) DEFAULT NULL,
  `yktgroup` int(11) DEFAULT NULL,
  `notyktid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_yktproducts`
--

CREATE TABLE IF NOT EXISTS `fcl_yktproducts` (
  `color` varchar(10) DEFAULT '#000000',
  `ordering` int(11) DEFAULT NULL,
  `yktpid` int(11) NOT NULL AUTO_INCREMENT,
  `yktpname` varchar(255) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `sell` tinyint(4) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `recommand` tinyint(4) DEFAULT NULL,
  `tag` tinyint(4) DEFAULT NULL,
  `new` tinyint(4) DEFAULT NULL,
  `letter` varchar(10) DEFAULT NULL,
  `first` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`yktpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_ykttrans`
--

CREATE TABLE IF NOT EXISTS `fcl_ykttrans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inprice` double DEFAULT NULL,
  `infeature` varchar(10) DEFAULT NULL,
  `outprice` double DEFAULT NULL,
  `outfeature` varchar(10) DEFAULT NULL,
  `permit` tinyint(4) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcl_zones`
--

CREATE TABLE IF NOT EXISTS `fcl_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
