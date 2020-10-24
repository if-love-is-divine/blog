-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 年 10 月 24 日 04:22
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_admin`
--

CREATE TABLE IF NOT EXISTS `b_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `admin_username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_lasttime` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `b_admin`
--

INSERT INTO `b_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_lasttime`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1552799106);

-- --------------------------------------------------------

--
-- 表的结构 `b_article`
--

CREATE TABLE IF NOT EXISTS `b_article` (
  `art_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `art_title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `art_desc` varchar(255) DEFAULT NULL COMMENT '文章简介',
  `art_img` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `art_content` text COMMENT '文章详情',
  `create_time` int(20) DEFAULT NULL COMMENT '发布时间',
  `update_time` int(20) DEFAULT NULL COMMENT '更新时间',
  `art_cate_id` int(11) unsigned DEFAULT NULL COMMENT '文章分类',
  `art_author` varchar(255) DEFAULT NULL COMMENT '文章作者',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示（0隐藏，1显示）',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `b_article`
--

INSERT INTO `b_article` (`art_id`, `art_title`, `art_desc`, `art_img`, `art_content`, `create_time`, `update_time`, `art_cate_id`, `art_author`, `is_show`) VALUES
(1, 'Lorem ipsum dolor #1\r\n', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-1.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 2, '激增', 1),
(2, 'Lorem ipsum dolor #2', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-2.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 2, '激增', 1),
(3, 'Lorem ipsum dolor #3', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-3.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 2, '激增', 1),
(4, 'Lorem ipsum dolor #4', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-3.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 2, '激增', 1),
(5, 'Lorem ipsum dolor #1\r\n', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-1.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 1, '佳俊', 1),
(6, 'Lorem ipsum dolor #2', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-2.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 1, '佳俊', 1),
(7, 'Lorem ipsum dolor #3', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-3.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768244, 1, '佳俊', 1),
(8, 'Lorem ipsum dolor #4', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-3.jpg', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 1546768228, 1546768228, 1, '佳俊', 1),
(9, 'Pellentesque fermentum mauris', 'Vivamus accumsan blandit ligula. Sed lobortis efficitur sapien', 'tm-img-310x180-3.jpg', 'Nulla ultrices nibh ac accumsan lobortis. Nulla facilisi. Praesent velit ante, congue ac dignissim in, vehicula sit amet urna. Fusce in dapibus quam, eget finibus velit. Nullam erat odio, vulputate id est ut, consequat rutrum justo. Vivamus vel leo vel nunc tincidunt mattis. Sed neque diam, semper suscipit dictum a, sodales ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi vel pharetra massa, non iaculis tortor. Nulla porttitor tincidunt felis et feugiat. Vivamus fermentum ligula justo, sit amet blandit nisl volutpat id.', 1546768228, 1546768228, 2, '佳俊', 1),
(10, 'Lorem ipsum dolor #1', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra\r\n\r\n', 'tm-img-310x180-1.jpg', 'Nulla ultrices nibh ac accumsan lobortis. Nulla facilisi. Praesent velit ante, congue ac dignissim in, vehicula sit amet urna. Fusce in dapibus quam, eget finibus velit. Nullam erat odio, vulputate id est ut, consequat rutrum justo. Vivamus vel leo vel nunc tincidunt mattis. Sed neque diam, semper suscipit dictum a, sodales ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi vel pharetra massa, non iaculis tortor. Nulla porttitor tincidunt felis et feugiat. Vivamus fermentum ligula justo, sit amet blandit nisl volutpat id.', 1546768228, 1546768228, 3, '志鹏', 1),
(11, 'Lorem ipsum dolor #2', 'Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra', 'tm-img-310x180-2.jpg', 'Nulla ultrices nibh ac accumsan lobortis. Nulla facilisi. Praesent velit ante, congue ac dignissim in, vehicula sit amet urna. Fusce in dapibus quam, eget finibus velit. Nullam erat odio, vulputate id est ut, consequat rutrum justo. Vivamus vel leo vel nunc tincidunt mattis. Sed neque diam, semper suscipit dictum a, sodales ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi vel pharetra massa, non iaculis tortor. Nulla porttitor tincidunt felis et feugiat. Vivamus fermentum ligula justo, sit amet blandit nisl volutpat id.', 1546768228, 1546768228, 3, '志鹏', 1);

-- --------------------------------------------------------

--
-- 表的结构 `b_article_cate`
--

CREATE TABLE IF NOT EXISTS `b_article_cate` (
  `acate_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `acate_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`acate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `b_article_cate`
--

INSERT INTO `b_article_cate` (`acate_id`, `acate_name`) VALUES
(1, '博客'),
(2, '关于我们'),
(3, '留言');

-- --------------------------------------------------------

--
-- 表的结构 `b_message`
--

CREATE TABLE IF NOT EXISTS `b_message` (
  `msg_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言id',
  `msg_name` varchar(50) DEFAULT NULL COMMENT '游客姓名',
  `msg_email` varchar(255) DEFAULT NULL COMMENT '游客邮箱地址',
  `msg_subject` varchar(100) DEFAULT NULL COMMENT '话题',
  `msg_content` text COMMENT '留言内容',
  `is_show` tinyint(1) unsigned DEFAULT '1' COMMENT '是否显示(1显示，0不显示)',
  `create_time` int(11) DEFAULT NULL COMMENT '留言时间',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `b_message`
--

INSERT INTO `b_message` (`msg_id`, `msg_name`, `msg_email`, `msg_subject`, `msg_content`, `is_show`, `create_time`) VALUES
(12, '谭斌', '2471442030@qq.com', '文艺', '生活不止眼前的苟且，还有诗和远方的田野。', 1, 1546705581),
(11, '谭斌', '2471442030@qq.com', '青春', '我在相信爱的年纪，没能唱给你的歌曲，让我一生中常常追忆', 1, 1546705510);

-- --------------------------------------------------------

--
-- 表的结构 `b_nav`
--

CREATE TABLE IF NOT EXISTS `b_nav` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_name` varchar(255) DEFAULT NULL COMMENT '导航名称',
  `nav_link` varchar(255) DEFAULT NULL COMMENT '导航链接地址',
  `nav_order` tinyint(2) unsigned DEFAULT NULL COMMENT '导航排序',
  `is_show` tinyint(1) unsigned DEFAULT '1' COMMENT '导航是否可见(1可见，0不可见)',
  `create_time` int(20) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `b_nav`
--

INSERT INTO `b_nav` (`nav_id`, `nav_name`, `nav_link`, `nav_order`, `is_show`, `create_time`) VALUES
(1, 'Home', 'index.php', NULL, 1, 1546705581),
(2, 'About', 'about.php', NULL, 1, 1546705581),
(3, 'Blog', 'blog_list.php', NULL, 1, 1546705581),
(4, 'Contact', 'contact.php', NULL, 1, 1546705581);

-- --------------------------------------------------------

--
-- 表的结构 `b_setting`
--

CREATE TABLE IF NOT EXISTS `b_setting` (
  `set_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '设置id',
  `set_name` varchar(255) DEFAULT NULL COMMENT '设置名',
  `set_value` text COMMENT '设置值',
  `set_img` varchar(255) DEFAULT NULL COMMENT '图片',
  `create_time` int(20) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_time` int(20) unsigned DEFAULT NULL COMMENT '更新时间',
  `is_show` tinyint(1) unsigned DEFAULT '1' COMMENT '0隐藏1显示',
  PRIMARY KEY (`set_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `b_setting`
--

INSERT INTO `b_setting` (`set_id`, `set_name`, `set_value`, `set_img`, `create_time`, `update_time`, `is_show`) VALUES
(1, 'logo', 'Classic', NULL, 1546705581, 1546705581, 1),
(2, 'copyright', 'Copyright 2016 Your Company Name. More Templates 我的网站 - Collect from wengdo', NULL, 1546705581, 1546705581, 1),
(3, 'introl', 'Suspendisse ut magna vel velit cursus tempor ut nec nunc. Mauris vehicula, augue in tincidunt porta, purus ipsum blandit massa.', NULL, 1546705581, 1546705581, 1),
(4, 'pfm', 'Vivamus accumsan blandit ligula. Sed lobortis efficitur sapien. Quisque vel sem eu turpis ullamcorper euismod. Praesent quis nisi ac augue luctus viverra. Sed et dui nisi. Fusce vitae dapibus justo.', NULL, 1546705581, 1546705581, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
