/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : manhua

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-28 19:21:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parents_id` int(5) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL,
  `priority` int(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '全彩韩漫', '0', '', '100', '2018-10-28 01:16:54', '2018-10-28 01:16:57');

-- ----------------------------
-- Table structure for `daili`
-- ----------------------------
DROP TABLE IF EXISTS `daili`;
CREATE TABLE `daili` (
  `daili_id` int(8) NOT NULL AUTO_INCREMENT,
  `daili_name` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:冻结 1:正常',
  `alipay` varchar(200) NOT NULL,
  `alipay_name` varchar(50) NOT NULL,
  `weixin` varchar(200) NOT NULL,
  `weixin_name` varchar(50) NOT NULL,
  `current_commision` decimal(8,2) NOT NULL,
  `frzon_commision` decimal(8,2) NOT NULL,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT '0.70',
  `login_ip` varchar(50) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`daili_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daili
-- ----------------------------
INSERT INTO `daili` VALUES ('1', 'lucas', '123123', '1', '', '', '', '', '0.00', '0.00', '0.70', '', '2018-10-28 18:14:23', '2018-10-28 18:14:18', '2018-10-28 18:14:21');

-- ----------------------------
-- Table structure for `dailiorder`
-- ----------------------------
DROP TABLE IF EXISTS `dailiorder`;
CREATE TABLE `dailiorder` (
  `daili_order_id` int(8) NOT NULL AUTO_INCREMENT,
  `daili_id` int(8) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未付款 1:已付款',
  `withdraw_money` decimal(9,2) NOT NULL,
  `withdraw_type` tinyint(1) NOT NULL COMMENT '1:支付宝 2:微信 3:银行卡',
  `withdarw_account` varchar(50) NOT NULL,
  `withdarw_account_name` varchar(50) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`daili_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dailiorder
-- ----------------------------

-- ----------------------------
-- Table structure for `manhua`
-- ----------------------------
DROP TABLE IF EXISTS `manhua`;
CREATE TABLE `manhua` (
  `manhua_id` int(8) NOT NULL AUTO_INCREMENT,
  `cid` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `author` varchar(50) NOT NULL,
  `cover` varchar(150) NOT NULL,
  `intro` text NOT NULL,
  `views` int(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: 不显示 1:显示',
  `finish` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:连载 1:完结',
  `last_update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`manhua_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhua
-- ----------------------------

-- ----------------------------
-- Table structure for `manhuachapters`
-- ----------------------------
DROP TABLE IF EXISTS `manhuachapters`;
CREATE TABLE `manhuachapters` (
  `chapter_id` int(9) NOT NULL AUTO_INCREMENT,
  `manhua_id` int(8) NOT NULL,
  `chapter_name` varchar(100) NOT NULL,
  `chapter_cover` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不显示 1:显示',
  `vip` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不是vip也能看 1:vip才能看',
  `next_chapter_id` int(9) NOT NULL,
  `pre_chapter_id` int(9) NOT NULL,
  `views` int(9) NOT NULL,
  `priority` int(8) NOT NULL,
  `coin` int(5) NOT NULL DEFAULT '10' COMMENT '不是vip看要收金币',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`chapter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuachapters
-- ----------------------------

-- ----------------------------
-- Table structure for `manhuaphotos`
-- ----------------------------
DROP TABLE IF EXISTS `manhuaphotos`;
CREATE TABLE `manhuaphotos` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(9) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `priority` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不显示 1:显示',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuaphotos
-- ----------------------------

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(9) NOT NULL,
  `daili_id` int(5) NOT NULL DEFAULT '0' COMMENT '0的话就不是代理过来的',
  `order_money` decimal(9,2) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:充值金币 1:月vip 2季度vip: 3:年vip',
  `pay_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:支付宝 2:微信',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未付款 1:已付款',
  `pay_daili` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:未结算 1:已结算',
  `pay_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `daili_id` int(5) NOT NULL DEFAULT '0',
  `user_name` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:冻结 1:正常',
  `vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不是vip 1:vip',
  `vip_start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vip_end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vip_time` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '这个字段是用来计算第一次开vip的时间',
  `login_ip` varchar(50) DEFAULT NULL,
  `register_ip` varchar(50) DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `coin` int(8) NOT NULL DEFAULT '0' COMMENT '金币数',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', '0', 'eleven', 'eyJpdiI6IjBEYzUyUmJDb0J3aTF4dmlMeDliY2c9PSIsInZhbHVlIjoiVDJlNmsyK0lOWDRMUGNzWmlvT01xQT09IiwibWFjIjoiM2M1NDlmNWQ5MzBiNTBmNWYxZTc1ZjY5ZmQwZTc3ZmRiN2I1MTNjZGY3MTRjZDUyYWUzZDg3ZGYzMmIxY2MwNyJ9', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '127.0.0.1', '2018-10-28 09:26:21', '0', '2018-10-28 08:50:29', '2018-10-28 09:26:21');
INSERT INTO `users` VALUES ('5', '3', 'eleven1', 'eyJpdiI6IjhXN01SanhUUURDRDhheVpMb2Zmd1E9PSIsInZhbHVlIjoiK2RFcTBIMHVwVXBDMXY5djJUejM1Zz09IiwibWFjIjoiYjBmYjgxN2JkN2Q1ODNiNzUyYmM0Y2RhOTI1MTI5ODliNmFiY2FhYjZiOGFhNTI0YzkzOWE1M2JmNjkyZjg0YSJ9', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '127.0.0.1', '2018-10-28 06:34:29', '0', '2018-10-28 18:34:29', '2018-10-28 18:34:29');
