-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 11 月 16 日 08:20
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `flcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `fl_article`
--

CREATE TABLE `fl_article` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `content` text,
  `create_time` int(10) default NULL,
  `status` tinyint(1) default NULL,
  `uid` int(10) default NULL,
  `cid` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 导出表中的数据 `fl_article`
--

INSERT INTO `fl_article` (`id`, `title`, `content`, `create_time`, `status`, `uid`, `cid`) VALUES
(8, 'test', 'test', 1294842174, 1, 1, 4),
(9, '你好~！~~', '阿四大四大是的阿四大四大是的奥斯丁', 1294847174, 1, 1, 5),
(10, 'test2', '<h1>test2</h1>', 1294847481, 1, 1, 4),
(11, '纳尼~~', '哈虎', 1294847643, 1, 1, 11),
(12, '标题必须~~', '奥斯丁', 1294847663, 1, 1, 4),
(13, '这个版本不错吧~~', '阿四大四大撒', 1294847678, 1, 1, 6),
(14, '软工', '阿四大四大', 1294847691, 1, 1, 8),
(15, '奇偶弄', '阿四大四大', 1294847708, 1, 1, 11),
(16, '红衣主教', '阿四大四大234121233', 1294847726, 1, 1, 7),
(18, '阿四大四大', '12414142奥斯达洒洒水', 1294909821, 1, 1, 6),
(19, '电子竞技！！！！', '电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！电子竞技！！！！', 1294910148, 1, 1, 4),
(20, 'FLCMS Beta v1.2震撼登场', 'FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场FLCMS Beta v1.2震撼登场', 1294914787, 1, 1, 13),
(21, 'test', '<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>\r\n<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>', 1294916467, 1, 4, 12);

-- --------------------------------------------------------

--
-- 表的结构 `fl_category`
--

CREATE TABLE `fl_category` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `create_time` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 导出表中的数据 `fl_category`
--

INSERT INTO `fl_category` (`id`, `name`, `create_time`) VALUES
(4, 'PC', '1294842174'),
(5, 'PHP', '1294847121'),
(6, '前端', '1294847568'),
(7, '用户研究', '1294847581'),
(8, 'java', '1294847588'),
(9, '体验综合', '1294847596'),
(10, '新闻', '1294847610'),
(11, '资讯', '1294847624'),
(12, '动态', '1294849670'),
(13, '杂文', '1294914756');

-- --------------------------------------------------------

--
-- 表的结构 `fl_role`
--

CREATE TABLE `fl_role` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `delright` tinyint(1) default '0',
  `editright` tinyint(1) default '0',
  `creright` tinyint(1) default '0',
  `issuper` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `fl_role`
--

INSERT INTO `fl_role` (`id`, `name`, `delright`, `editright`, `creright`, `issuper`) VALUES
(1, '管理员', 1, 1, 1, 1),
(3, '前台人员', 0, 1, 1, 0),
(5, '普通管理员', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fl_user`
--

CREATE TABLE `fl_user` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rid` int(10) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `fl_user`
--

INSERT INTO `fl_user` (`id`, `name`, `password`, `rid`, `create_time`) VALUES
(1, 'admin', '4297f44b13955235245b2497399d7a93', 1, 1294842174),
(4, 'leyteris', '202cb962ac59075b964b07152d234b70', 5, 1294848337),
(5, 'liyichao', '4297f44b13955235245b2497399d7a93', 5, 1294972394);
