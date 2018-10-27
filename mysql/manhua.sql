/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : manhua

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2018-10-28 02:50:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `parents_id` int(5) DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  `priority` int(6) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '全彩韩漫', '0', '', '100', '2018-10-28 01:16:54', '2018-10-28 01:16:57');

-- ----------------------------
-- Table structure for daili
-- ----------------------------
DROP TABLE IF EXISTS `daili`;
CREATE TABLE `daili` (
  `daili_id` int(8) NOT NULL AUTO_INCREMENT,
  `daili_name` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:冻结 1:正常',
  `alipay` varchar(200) DEFAULT NULL,
  `alipay_name` varchar(50) DEFAULT NULL,
  `weixin` varchar(200) DEFAULT NULL,
  `weixin_name` varchar(50) DEFAULT NULL,
  `current_commision` decimal(8,2) DEFAULT NULL,
  `frzon_commision` decimal(8,2) DEFAULT NULL,
  `commission_rate` decimal(5,2) DEFAULT '0.70',
  `login_ip` varchar(50) DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`daili_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daili
-- ----------------------------

-- ----------------------------
-- Table structure for dailiorder
-- ----------------------------
DROP TABLE IF EXISTS `dailiorder`;
CREATE TABLE `dailiorder` (
  `daili_order_id` int(8) NOT NULL AUTO_INCREMENT,
  `daili_id` int(8) DEFAULT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0:未付款 1:已付款',
  `withdraw_money` decimal(9,2) DEFAULT NULL,
  `withdraw_type` tinyint(1) DEFAULT NULL COMMENT '1:支付宝 2:微信 3:银行卡',
  `withdarw_account` varchar(50) DEFAULT NULL,
  `withdarw_account_name` varchar(50) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`daili_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dailiorder
-- ----------------------------

-- ----------------------------
-- Table structure for manhua
-- ----------------------------
DROP TABLE IF EXISTS `manhua`;
CREATE TABLE `manhua` (
  `manhua_id` int(8) NOT NULL AUTO_INCREMENT,
  `cid` int(5) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `cover` varchar(150) DEFAULT NULL,
  `intro` text,
  `views` int(8) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1' COMMENT '0: 不显示 1:显示',
  `finish` tinyint(1) DEFAULT '0' COMMENT '0:连载 1:完结',
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`manhua_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhua
-- ----------------------------

-- ----------------------------
-- Table structure for manhuachapters
-- ----------------------------
DROP TABLE IF EXISTS `manhuachapters`;
CREATE TABLE `manhuachapters` (
  `chapter_id` int(9) NOT NULL AUTO_INCREMENT,
  `manhua_id` int(8) DEFAULT NULL,
  `chapter_name` varchar(100) DEFAULT NULL,
  `chapter_cover` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:不显示 1:显示',
  `vip` tinyint(1) DEFAULT '1' COMMENT '0:不是vip也能看 1:vip才能看',
  `next_chapter_id` int(9) DEFAULT NULL,
  `pre_chapter_id` int(9) DEFAULT NULL,
  `views` int(9) DEFAULT NULL,
  `priority` int(8) DEFAULT NULL,
  `coin` int(5) DEFAULT '10' COMMENT '不是vip看要收金币',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chapter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuachapters
-- ----------------------------

-- ----------------------------
-- Table structure for manhuaphotos
-- ----------------------------
DROP TABLE IF EXISTS `manhuaphotos`;
CREATE TABLE `manhuaphotos` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(9) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `priority` int(9) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:不显示 1:显示',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuaphotos
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(9) DEFAULT NULL,
  `daili_id` int(5) DEFAULT '0' COMMENT '0的话就不是代理过来的',
  `order_money` decimal(9,2) DEFAULT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `order_type` tinyint(1) DEFAULT '1' COMMENT '0:充值金币 1:月vip 2季度vip: 3:年vip',
  `pay_type` tinyint(1) DEFAULT '1' COMMENT '1:支付宝 2:微信',
  `status` tinyint(1) DEFAULT '0' COMMENT '0:未付款 1:已付款',
  `pay_daili` tinyint(1) DEFAULT '1' COMMENT '0:未结算 1:已结算',
  `pay_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `daili_id` int(5) DEFAULT '0',
  `user_name` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:冻结 1:正常',
  `vip` tinyint(1) DEFAULT '0' COMMENT '0:不是vip 1:vip',
  `vip_start_time` timestamp NULL DEFAULT NULL,
  `vip_end_time` timestamp NULL DEFAULT NULL,
  `vip_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '这个字段是用来计算第一次开vip的时间',
  `login_ip` varchar(50) DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `coin` int(8) DEFAULT '0' COMMENT '金币数',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
