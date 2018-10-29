/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : manhua

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-29 19:36:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `login_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogined_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6Ink0S0tEemtWN2RzTDhpXC9cLzNlRk5Idz09IiwidmFsdWUiOiJnU1RsK1BpMmtKemlXc2VsUzAyb2xBPT0iLCJtYWMiOiJjMTFiM2RjOTNmYmU3ZjQ4OWM5M2ZhZDgxOTVlNzkyOTNmMmRkNjk5MjMwNzU2NDE0YmRiZDRkYjNhYWI2ZjZlIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-10-29 15:01:03', '2018-10-29 03:01:03');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `parents_id` int(5) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL,
  `priority` int(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '全彩韩漫', '0', '', '100', '1', '2018-10-29 00:24:20', '2018-10-29 00:24:20');
INSERT INTO `category` VALUES ('2', '连载韩漫', '0', 'none', '99', '1', '2018-10-29 01:21:35', '2018-10-29 01:21:35');
INSERT INTO `category` VALUES ('3', '完结韩漫', '0', 'none', '98', '1', '2018-10-29 01:22:41', '2018-10-29 01:21:55');
INSERT INTO `category` VALUES ('4', '热门韩漫', '0', 'none', '97', '1', '2018-10-29 01:22:43', '2018-10-29 01:22:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daili
-- ----------------------------
INSERT INTO `daili` VALUES ('1', 'lucas', 'eyJpdiI6IlNib0tBNVlGY3dqVktHQWFka0JYanc9PSIsInZhbHVlIjoicmI0VnNRSFNvcWFEV1A1YlZyem44Zz09IiwibWFjIjoiMzdhOGFkZWIzNDJlZGUyMjYyNTJkYTE2ZmUzNGUwMTU4YWI3ZDMyMjZlOWNmMTc5OGVkNTlkZmY3ODRiOWQ0NyJ9', '1', '', '', '', '', '0.00', '0.00', '0.70', '', '2018-10-29 15:34:11', '2018-10-28 18:14:18', '2018-10-29 15:34:11');
INSERT INTO `daili` VALUES ('2', 'lucas1', 'eyJpdiI6InltRDYzY2JqczJad0Myc2JxeDg5aVE9PSIsInZhbHVlIjoiRE5PekhEcXRuMXljQ2kyMW5acmdZQT09IiwibWFjIjoiOTZmZDZjZWUyMmU1ZTQ3ZWYyMzgwZDNlZTQwZTVjM2JlZTMxNDU4YzIxYjUxMDlhNDg5YmIzZGM4ZmJjOGZiMyJ9', '1', '', '', '', '', '0.00', '0.00', '0.72', '', '2018-10-29 15:51:05', '2018-10-29 15:51:05', '2018-10-29 15:51:05');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhua
-- ----------------------------
INSERT INTO `manhua` VALUES ('1', '1', 'eeee', '1', '/public/uploads/15408044416Uy5S.jpg', '2', '548', '1', '1', '2018-10-29 17:14:04', '2018-10-29 17:14:04', '2018-10-29 17:14:04');

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
-- Table structure for `saletype`
-- ----------------------------
DROP TABLE IF EXISTS `saletype`;
CREATE TABLE `saletype` (
  `t_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `money` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of saletype
-- ----------------------------
INSERT INTO `saletype` VALUES ('1', '月卡', '29.90');
INSERT INTO `saletype` VALUES ('2', '季卡', '69.90');
INSERT INTO `saletype` VALUES ('3', '年卡', '199.90');
INSERT INTO `saletype` VALUES ('4', '购买金币', '50.00');

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
INSERT INTO `users` VALUES ('5', '3', 'eleven1', 'eyJpdiI6IkZtc2RRTEFWaGNMV0dpUnJVbHp5WUE9PSIsInZhbHVlIjoidHR5NHJkZ3N0dmF0U3NOcnY0alZVUT09IiwibWFjIjoiMmQyNWQwNzU1YWE4ZGYxY2M5OGQ2MTM1M2E2ZmY5NmQ3ZDIyMGFlYTQ3ZDk4ZTJlOGQwNTQxY2M5MTcxYjA0ZCJ9', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '127.0.0.1', '2018-10-28 06:34:29', '0', '2018-10-28 18:34:29', '2018-10-29 02:37:49');
