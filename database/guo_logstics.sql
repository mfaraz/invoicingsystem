-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 04 月 25 日 10:14
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `guo_logstics`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'y7GKli5aDpdiBqt24ka/f+JJ62hzFd64sDMJqnMsKwn/wTCuZ7N1m4yMlwP5YarnJqZ/z+dRFL9+BC16JcOiww==');

-- --------------------------------------------------------

--
-- 表的结构 `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL auto_increment,
  `member_name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `qq` varchar(12) NOT NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `members`
--


-- --------------------------------------------------------

--
-- 表的结构 `other_cost_detail`
--

CREATE TABLE `other_cost_detail` (
  `detail_id` int(11) NOT NULL auto_increment,
  `main_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY  (`detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- 导出表中的数据 `other_cost_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `other_cost_main`
--

CREATE TABLE `other_cost_main` (
  `main_id` int(11) NOT NULL auto_increment,
  `insert_date` date NOT NULL,
  `last_update_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- 导出表中的数据 `other_cost_main`
--


-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_real_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_remarks` varchar(200) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `product_price` decimal(20,2) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=269 ;

--
-- 导出表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_real_name`, `product_name`, `product_remarks`, `insert_time`, `last_update_time`, `product_price`) VALUES
(198, '松鹤延年', '66400', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 26.00),
(199, '马到成功', 'd0032', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 35.20),
(200, '大展宏图', 'd0004', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 36.80),
(201, '百福', '66098', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 28.80),
(202, '寿比南山', '66108', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 22.40),
(203, '暧昧', '66483', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 16.00),
(204, '和气志祥', '66128', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 18.00),
(205, '收纳盒', 'tx-008', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 15.20),
(206, '化妆包', 'hz-003', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 15.20),
(207, '我爱我家', '66560', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 19.20),
(208, '百寿', '66099', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 28.80),
(209, '八骏奔腾', '66006', '', '2010-04-22 19:59:05', '2010-04-22 19:59:05', 20.80),
(210, '家和福顺-顺', 'z0120', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(211, '约定今生', '66538', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 22.40),
(212, '宝宝的脚印', 'b0002', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(213, '小嘟嘟', 'k0059', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 12.00),
(214, '甜美', 'k0016', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(215, '琴棋书画', 'z0090', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(216, '玫瑰情人', 'h0110', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 11.20),
(217, '年年有余', 'd0022', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(218, '品味', 'k0057', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 8.00),
(219, '一帆风顺', 'f0026', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 12.80),
(220, '红色妖姬', 'h0081', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(221, '花之语', 'h0049', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 7.20),
(222, '和', 'z0115', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(223, '成功、祝福', 'r0036', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 11.20),
(224, '不能不爱', '97056', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 12.00),
(225, '相拥', '97009', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 12.00),
(226, '彩蝶双飞', '97073', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.40),
(227, '舞蝶', '97019', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 12.00),
(228, '快乐伙伴', '97078', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(229, '梅兰竹菊', '66013', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.00),
(230, '生意兴隆', 'z0039', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 11.20),
(231, '悠悠华香', 'h0018', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 10.40),
(232, '新婚', 'r0034', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 15.20),
(233, '慈祥观音', 'r0077', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 18.00),
(234, '钱包', 'qb013', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 18.00),
(235, '三折带扣钱包', 'b-104', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 23.60),
(236, '三折钱包', 'b-085', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 22.40),
(237, '家和万事兴', 'z0057', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 18.00),
(238, '淡雅四季', 'f0042', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 18.00),
(239, '家和万事兴11', 'z0011', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 18.00),
(240, '布加迪威龙', 'f0020', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(241, '平安是福', 'z0105', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(242, 'honey', '66568', '', '2010-04-22 20:31:16', '2010-04-22 20:31:16', 16.00),
(243, '心中只有你', 'r0047', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 15.20),
(244, '一生的承诺', 'r0039', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 18.00),
(245, '相伴一生', 'k0008', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 10.00),
(246, '爱你的心', 'r0097', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 13.20),
(247, '生意兴隆(富贵版）', 'z0073', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 19.20),
(248, '', '无花边抱枕', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 14.00),
(249, '', '蕾丝抱枕', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 16.80),
(250, '', '抱枕', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 18.00),
(251, '幸福恋人', 'k0066', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 13.20),
(252, '', '口罩', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 4.80),
(253, '', '卡套', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 3.30),
(254, '', '月月包', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 7.20),
(255, '', '卡包', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 6.40),
(256, '', '零钱包', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 8.80),
(257, '', '手机袋', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 3.60),
(258, '', '手机挂链', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 2.90),
(259, '', '中国结', '', '2010-04-22 20:50:39', '2010-04-22 20:50:39', 5.20),
(260, '福如东海', '66113', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 22.00),
(261, '财源广进（元宝版）', 'z0185', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 18.00),
(262, '', '梦娜', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 5.00),
(263, '', '浪莎网袜', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 7.20),
(264, '', '维纳斯', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 4.20),
(265, '', '浪莎短袜', '', '2010-04-22 20:58:16', '2010-04-22 20:58:16', 1.20),
(266, '', '花边肩带', '', '2010-04-22 21:01:10', '2010-04-22 21:01:10', 1.50),
(267, '', '肩带', '', '2010-04-22 21:01:10', '2010-04-22 21:01:10', 1.30),
(268, '', '笔芯', '', '2010-04-23 20:47:50', '2010-04-23 20:47:50', 0.70);

-- --------------------------------------------------------

--
-- 表的结构 `sale_detail`
--

CREATE TABLE `sale_detail` (
  `detail_id` int(11) NOT NULL auto_increment,
  `main_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(20,2) NOT NULL,
  PRIMARY KEY  (`detail_id`),
  KEY `main_id` (`main_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 导出表中的数据 `sale_detail`
--

INSERT INTO `sale_detail` (`detail_id`, `main_id`, `product_id`, `quantity`, `product_price`) VALUES
(10, 49, 198, 1, 45.00),
(11, 49, 244, 1, 40.00),
(12, 49, 242, 1, 40.00),
(13, 49, 229, 1, 20.00),
(14, 49, 215, 2, 30.00),
(15, 49, 255, 1, 15.00),
(16, 49, 268, 2, 2.00),
(17, 50, 255, 2, 12.50),
(18, 50, 268, 2, 2.00),
(19, 50, 259, 1, 8.00),
(20, 50, 237, 1, 40.00),
(21, 50, 241, 1, 30.00);

-- --------------------------------------------------------

--
-- 表的结构 `sale_main`
--

CREATE TABLE `sale_main` (
  `main_id` int(11) NOT NULL auto_increment,
  `insert_date` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY  (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 导出表中的数据 `sale_main`
--

INSERT INTO `sale_main` (`main_id`, `insert_date`, `last_update_time`, `remarks`) VALUES
(49, '2010-04-23 00:00:00', '2010-04-23 21:14:36', ''),
(50, '2010-04-24 00:00:00', '2010-04-24 16:05:22', '');

-- --------------------------------------------------------

--
-- 表的结构 `stock_detail`
--

CREATE TABLE `stock_detail` (
  `detail_id` int(11) NOT NULL auto_increment,
  `main_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY  (`detail_id`),
  KEY `main_id` (`main_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=234 ;

--
-- 导出表中的数据 `stock_detail`
--

INSERT INTO `stock_detail` (`detail_id`, `main_id`, `product_id`, `quantity`) VALUES
(163, 49, 198, 1),
(164, 49, 199, 1),
(165, 49, 200, 1),
(166, 49, 201, 1),
(167, 49, 202, 1),
(168, 49, 203, 1),
(169, 49, 204, 1),
(170, 49, 205, 2),
(171, 49, 206, 2),
(172, 49, 207, 1),
(173, 49, 208, 1),
(174, 49, 209, 1),
(175, 49, 210, 1),
(176, 49, 211, 1),
(177, 49, 212, 2),
(178, 49, 213, 2),
(179, 49, 214, 1),
(180, 49, 215, 2),
(181, 49, 216, 1),
(182, 49, 217, 3),
(183, 49, 218, 1),
(184, 49, 219, 1),
(185, 49, 220, 1),
(186, 49, 221, 3),
(187, 49, 222, 1),
(188, 49, 223, 2),
(189, 49, 224, 1),
(190, 49, 225, 1),
(191, 49, 226, 1),
(192, 49, 227, 1),
(193, 49, 228, 1),
(194, 49, 229, 5),
(195, 49, 230, 2),
(196, 49, 231, 1),
(197, 49, 232, 1),
(198, 49, 233, 1),
(199, 49, 234, 3),
(200, 49, 235, 2),
(201, 49, 236, 1),
(202, 49, 237, 1),
(203, 49, 238, 1),
(204, 49, 239, 1),
(205, 49, 240, 1),
(206, 49, 241, 1),
(207, 49, 242, 1),
(208, 49, 243, 1),
(209, 49, 244, 1),
(210, 49, 245, 1),
(211, 49, 246, 1),
(212, 49, 247, 1),
(213, 49, 248, 3),
(214, 49, 249, 6),
(215, 49, 250, 2),
(216, 49, 251, 1),
(217, 49, 252, 8),
(218, 49, 253, 4),
(219, 49, 254, 4),
(220, 49, 255, 4),
(221, 49, 256, 1),
(222, 49, 257, 7),
(223, 49, 258, 10),
(224, 49, 259, 1),
(225, 49, 260, 1),
(226, 49, 261, 1),
(227, 49, 262, 17),
(228, 49, 263, 1),
(229, 49, 264, 6),
(230, 49, 265, 10),
(231, 49, 266, 11),
(232, 49, 267, 7),
(233, 49, 268, 100);

-- --------------------------------------------------------

--
-- 表的结构 `stock_main`
--

CREATE TABLE `stock_main` (
  `main_id` int(11) NOT NULL auto_increment,
  `insert_date` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY  (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- 导出表中的数据 `stock_main`
--

INSERT INTO `stock_main` (`main_id`, `insert_date`, `last_update_time`, `remarks`) VALUES
(49, '2010-04-22 00:00:00', '2010-04-22 19:59:05', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_other_cost`
--
CREATE TABLE `v_other_cost` (
`price` decimal(20,2)
,`remarks` varchar(250)
,`main_id` int(11)
,`detail_id` int(11)
,`insert_date` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_storage`
--
CREATE TABLE `v_storage` (
`type` bigint(20)
,`product_id` int(11)
,`quantity` bigint(20)
,`insert_date` date
);
-- --------------------------------------------------------

--
-- Structure for view `v_other_cost`
--
DROP TABLE IF EXISTS `v_other_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `guo_logstics`.`v_other_cost` AS select `detail`.`price` AS `price`,`detail`.`remarks` AS `remarks`,`main`.`main_id` AS `main_id`,`detail`.`detail_id` AS `detail_id`,`main`.`insert_date` AS `insert_date` from (`guo_logstics`.`other_cost_detail` `detail` join `guo_logstics`.`other_cost_main` `main` on((`main`.`main_id` = `detail`.`main_id`)));

-- --------------------------------------------------------

--
-- Structure for view `v_storage`
--
DROP TABLE IF EXISTS `v_storage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `guo_logstics`.`v_storage` AS select 1 AS `type`,`detail`.`product_id` AS `product_id`,`detail`.`quantity` AS `quantity`,cast(`main`.`insert_date` as date) AS `insert_date` from (`guo_logstics`.`stock_detail` `detail` join `guo_logstics`.`stock_main` `main` on((`main`.`main_id` = `detail`.`main_id`))) union all select 2 AS `type`,`detail`.`product_id` AS `product_id`,-(`detail`.`quantity`) AS `-detail.quantity`,cast(`main`.`insert_date` as date) AS `inert_date` from (`guo_logstics`.`sale_detail` `detail` join `guo_logstics`.`sale_main` `main` on((`main`.`main_id` = `detail`.`main_id`)));
