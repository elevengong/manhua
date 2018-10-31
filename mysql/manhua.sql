/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : manhua

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2018-11-01 02:11:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
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
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6Ink0S0tEemtWN2RzTDhpXC9cLzNlRk5Idz09IiwidmFsdWUiOiJnU1RsK1BpMmtKemlXc2VsUzAyb2xBPT0iLCJtYWMiOiJjMTFiM2RjOTNmYmU3ZjQ4OWM5M2ZhZDgxOTVlNzkyOTNmMmRkNjk5MjMwNzU2NDE0YmRiZDRkYjNhYWI2ZjZlIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-10-31 22:24:35', '2018-10-31 10:24:35');

-- ----------------------------
-- Table structure for category
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
-- Table structure for daili
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
INSERT INTO `daili` VALUES ('1', 'lucas', 'eyJpdiI6IkxaelUrRTNrMkdqUCt2c2N5dlg4REE9PSIsInZhbHVlIjoieHU0aGJvK0ltbzYyXC91bUtRV3M4YlE9PSIsIm1hYyI6ImNmMmExY2JmNzA2MmUxZTFjMzIwZmRkMmRjYjVhZTI4MjAzOWNiMjQ1NDNiZDBkNDc5YWIyMWJlY2RkODFjYWEifQ==', '1', '', '', '', '', '341.86', '0.00', '0.70', '127.0.0.1', '2018-11-01 01:50:35', '2018-10-28 18:14:18', '2018-11-01 01:50:35');
INSERT INTO `daili` VALUES ('2', 'lucas1', 'eyJpdiI6InltRDYzY2JqczJad0Myc2JxeDg5aVE9PSIsInZhbHVlIjoiRE5PekhEcXRuMXljQ2kyMW5acmdZQT09IiwibWFjIjoiOTZmZDZjZWUyMmU1ZTQ3ZWYyMzgwZDNlZTQwZTVjM2JlZTMxNDU4YzIxYjUxMDlhNDg5YmIzZGM4ZmJjOGZiMyJ9', '1', '', '', '', '', '0.00', '0.00', '0.72', '', '2018-10-29 15:51:05', '2018-10-29 15:51:05', '2018-10-29 15:51:05');

-- ----------------------------
-- Table structure for manhua
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
INSERT INTO `manhua` VALUES ('1', '1', '漫画名1', '1', '/public/uploads/15408044416Uy5S.jpg', '2', '548', '1', '0', '2018-10-30 18:10:17', '2018-10-29 17:14:04', '2018-10-30 18:10:17');

-- ----------------------------
-- Table structure for manhuachapters
-- ----------------------------
DROP TABLE IF EXISTS `manhuachapters`;
CREATE TABLE `manhuachapters` (
  `chapter_id` int(9) NOT NULL AUTO_INCREMENT,
  `manhua_id` int(8) NOT NULL,
  `chapter_name` varchar(100) NOT NULL,
  `chapter_cover` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不显示 1:显示',
  `vip` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不是vip也能看 1:vip才能看',
  `pre_chapter_id` int(9) NOT NULL,
  `next_chapter_id` int(9) NOT NULL,
  `views` int(9) NOT NULL,
  `priority` int(8) NOT NULL,
  `coin` int(5) NOT NULL DEFAULT '2' COMMENT '不是vip看要收金币',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`chapter_id`),
  KEY `manhua_id` (`manhua_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuachapters
-- ----------------------------
INSERT INTO `manhuachapters` VALUES ('57', '1', '1', '/public/uploads/1540892969LYfkV.jpg', '1', '0', '0', '58', '21', '1', '10', '2018-10-30 17:51:55', '2018-10-30 17:51:55');
INSERT INTO `manhuachapters` VALUES ('58', '1', '2', '', '1', '1', '57', '59', '582', '2', '10', '2018-10-30 01:50:27', '2018-10-30 01:50:27');
INSERT INTO `manhuachapters` VALUES ('59', '1', '3', '', '1', '1', '58', '60', '384', '3', '10', '2018-10-30 01:50:27', '2018-10-30 01:50:27');
INSERT INTO `manhuachapters` VALUES ('60', '1', '4', '', '1', '1', '59', '61', '643', '4', '10', '2018-10-30 01:50:28', '2018-10-30 01:50:28');
INSERT INTO `manhuachapters` VALUES ('61', '1', '5', '', '1', '1', '60', '62', '644', '5', '10', '2018-10-30 01:50:28', '2018-10-30 01:50:28');
INSERT INTO `manhuachapters` VALUES ('62', '1', '6', '', '1', '1', '61', '67', '916', '6', '10', '2018-10-30 15:27:15', '2018-10-30 15:27:15');
INSERT INTO `manhuachapters` VALUES ('67', '1', '7', '', '0', '1', '62', '68', '433', '7', '10', '2018-10-30 15:30:01', '2018-10-30 15:30:01');
INSERT INTO `manhuachapters` VALUES ('68', '1', '8', '/public/uploads/1540884593v52QN.jpg', '0', '1', '67', '0', '785', '8', '10', '2018-10-30 15:30:01', '2018-10-30 15:30:01');

-- ----------------------------
-- Table structure for manhuaphotos
-- ----------------------------
DROP TABLE IF EXISTS `manhuaphotos`;
CREATE TABLE `manhuaphotos` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(9) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `priority` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:不显示 1:显示',
  PRIMARY KEY (`p_id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=537 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manhuaphotos
-- ----------------------------
INSERT INTO `manhuaphotos` VALUES ('385', '57', '/1/57/154083542715762.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('386', '57', '/1/57/154083542715763.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('387', '57', '/1/57/154083542715764.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('388', '57', '/1/57/154083542715765.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('389', '57', '/1/57/154083542715766.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('390', '57', '/1/57/154083542715767.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('391', '57', '/1/57/154083542715768.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('392', '57', '/1/57/154083542715769.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('393', '57', '/1/57/154083542715770.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('394', '57', '/1/57/154083542715771.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('395', '57', '/1/57/154083542715772.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('396', '57', '/1/57/154083542715773.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('397', '57', '/1/57/154083542715774.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('398', '57', '/1/57/154083542715775.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('399', '57', '/1/57/154083542715776.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('400', '57', '/1/57/154083542715777.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('401', '57', '/1/57/154083542715778.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('402', '58', '/1/58/154083542715861.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('403', '58', '/1/58/154083542715862.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('404', '58', '/1/58/154083542715863.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('405', '58', '/1/58/154083542715864.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('406', '58', '/1/58/154083542715865.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('407', '58', '/1/58/154083542715866.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('408', '58', '/1/58/154083542715867.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('409', '58', '/1/58/154083542715868.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('410', '58', '/1/58/154083542715869.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('411', '58', '/1/58/154083542715870.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('412', '58', '/1/58/154083542715871.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('413', '58', '/1/58/154083542715872.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('414', '58', '/1/58/154083542715873.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('415', '58', '/1/58/154083542715874.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('416', '58', '/1/58/154083542715875.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('417', '58', '/1/58/154083542715876.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('418', '58', '/1/58/154083542715877.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('419', '58', '/1/58/154083542715878.jpg', '17', '1');
INSERT INTO `manhuaphotos` VALUES ('420', '58', '/1/58/154083542715879.jpg', '18', '1');
INSERT INTO `manhuaphotos` VALUES ('421', '58', '/1/58/154083542715880.jpg', '19', '1');
INSERT INTO `manhuaphotos` VALUES ('422', '58', '/1/58/154083542715881.jpg', '20', '1');
INSERT INTO `manhuaphotos` VALUES ('423', '58', '/1/58/154083542715882.jpg', '21', '1');
INSERT INTO `manhuaphotos` VALUES ('424', '58', '/1/58/154083542715883.jpg', '22', '1');
INSERT INTO `manhuaphotos` VALUES ('425', '58', '/1/58/154083542715884.jpg', '23', '1');
INSERT INTO `manhuaphotos` VALUES ('426', '59', '/1/59/154083542715971.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('427', '59', '/1/59/154083542715972.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('428', '59', '/1/59/154083542715973.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('429', '59', '/1/59/154083542715974.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('430', '59', '/1/59/154083542715975.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('431', '59', '/1/59/154083542715976.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('432', '59', '/1/59/154083542715977.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('433', '59', '/1/59/154083542715978.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('434', '59', '/1/59/154083542715979.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('435', '59', '/1/59/154083542715980.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('436', '59', '/1/59/154083542715981.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('437', '59', '/1/59/154083542715982.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('438', '59', '/1/59/154083542715983.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('439', '59', '/1/59/154083542715984.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('440', '59', '/1/59/154083542715985.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('441', '59', '/1/59/154083542715986.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('442', '59', '/1/59/154083542715987.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('443', '59', '/1/59/154083542715988.jpg', '17', '1');
INSERT INTO `manhuaphotos` VALUES ('444', '59', '/1/59/154083542715989.jpg', '18', '1');
INSERT INTO `manhuaphotos` VALUES ('445', '59', '/1/59/154083542715990.jpg', '19', '1');
INSERT INTO `manhuaphotos` VALUES ('446', '60', '/1/60/154083542716020.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('447', '60', '/1/60/154083542716021.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('448', '60', '/1/60/154083542716022.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('449', '60', '/1/60/154083542716023.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('450', '60', '/1/60/154083542716024.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('451', '60', '/1/60/154083542716025.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('452', '60', '/1/60/154083542716026.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('453', '60', '/1/60/154083542716027.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('454', '60', '/1/60/154083542716028.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('455', '60', '/1/60/154083542716029.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('456', '60', '/1/60/154083542716030.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('457', '60', '/1/60/154083542716031.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('458', '60', '/1/60/154083542716032.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('459', '60', '/1/60/154083542716033.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('460', '60', '/1/60/154083542716034.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('461', '60', '/1/60/154083542716035.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('462', '60', '/1/60/154083542716036.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('463', '60', '/1/60/154083542716037.jpg', '17', '1');
INSERT INTO `manhuaphotos` VALUES ('464', '60', '/1/60/154083542716038.jpg', '18', '1');
INSERT INTO `manhuaphotos` VALUES ('465', '60', '/1/60/154083542716039.jpg', '19', '1');
INSERT INTO `manhuaphotos` VALUES ('466', '60', '/1/60/154083542716040.jpg', '20', '1');
INSERT INTO `manhuaphotos` VALUES ('467', '60', '/1/60/154083542716041.jpg', '21', '1');
INSERT INTO `manhuaphotos` VALUES ('468', '61', '/1/61/154083542816126.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('469', '61', '/1/61/154083542816127.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('470', '61', '/1/61/154083542816128.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('471', '61', '/1/61/154083542816129.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('472', '61', '/1/61/154083542816130.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('473', '61', '/1/61/154083542816131.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('474', '61', '/1/61/154083542816132.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('475', '61', '/1/61/154083542816133.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('476', '61', '/1/61/154083542816134.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('477', '61', '/1/61/154083542816135.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('478', '61', '/1/61/154083542816136.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('479', '61', '/1/61/154083542816137.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('480', '61', '/1/61/154083542816138.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('481', '61', '/1/61/154083542816139.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('482', '61', '/1/61/154083542816140.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('483', '61', '/1/61/154083542816141.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('484', '61', '/1/61/154083542816142.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('485', '61', '/1/61/154083542816143.jpg', '17', '1');
INSERT INTO `manhuaphotos` VALUES ('486', '61', '/1/61/154083542816144.jpg', '18', '1');
INSERT INTO `manhuaphotos` VALUES ('487', '61', '/1/61/154083542816145.jpg', '19', '1');
INSERT INTO `manhuaphotos` VALUES ('488', '61', '/1/61/154083542816146.jpg', '20', '1');
INSERT INTO `manhuaphotos` VALUES ('489', '62', '/1/62/154083542816298.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('490', '62', '/1/62/154083542816299.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('491', '62', '/1/62/1540835428162100.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('492', '62', '/1/62/1540835428162101.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('493', '62', '/1/62/1540835428162102.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('494', '62', '/1/62/1540835428162103.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('495', '62', '/1/62/1540835428162104.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('496', '62', '/1/62/1540835428162105.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('497', '62', '/1/62/1540835428162106.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('498', '62', '/1/62/1540835428162107.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('499', '62', '/1/62/1540835428162108.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('500', '62', '/1/62/1540835428162109.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('501', '62', '/1/62/1540835428162110.jpg', '12', '1');
INSERT INTO `manhuaphotos` VALUES ('502', '62', '/1/62/1540835428162111.jpg', '13', '1');
INSERT INTO `manhuaphotos` VALUES ('503', '62', '/1/62/1540835428162112.jpg', '14', '1');
INSERT INTO `manhuaphotos` VALUES ('504', '62', '/1/62/1540835428162113.jpg', '15', '1');
INSERT INTO `manhuaphotos` VALUES ('505', '62', '/1/62/1540835428162114.jpg', '16', '1');
INSERT INTO `manhuaphotos` VALUES ('506', '62', '/1/62/1540835428162115.jpg', '17', '1');
INSERT INTO `manhuaphotos` VALUES ('507', '62', '/1/62/1540835428162116.jpg', '18', '1');
INSERT INTO `manhuaphotos` VALUES ('508', '62', '/1/62/1540835428162117.jpg', '19', '1');
INSERT INTO `manhuaphotos` VALUES ('509', '62', '/1/62/1540835428162118.jpg', '20', '1');
INSERT INTO `manhuaphotos` VALUES ('510', '62', '/1/62/1540835428162119.jpg', '21', '1');
INSERT INTO `manhuaphotos` VALUES ('524', '67', '/1/67/154089076616713.jpg', '0', '1');
INSERT INTO `manhuaphotos` VALUES ('525', '67', '/1/67/154089076616714.jpg', '1', '1');
INSERT INTO `manhuaphotos` VALUES ('526', '67', '/1/67/154089076616715.jpg', '2', '1');
INSERT INTO `manhuaphotos` VALUES ('527', '67', '/1/67/154089076616716.jpg', '3', '1');
INSERT INTO `manhuaphotos` VALUES ('528', '67', '/1/67/154089076616717.jpg', '4', '1');
INSERT INTO `manhuaphotos` VALUES ('529', '67', '/1/67/154089076616718.jpg', '5', '1');
INSERT INTO `manhuaphotos` VALUES ('530', '67', '/1/67/154089076616719.jpg', '6', '1');
INSERT INTO `manhuaphotos` VALUES ('531', '67', '/1/67/154089076616720.jpg', '7', '1');
INSERT INTO `manhuaphotos` VALUES ('532', '67', '/1/67/154089076616721.jpg', '8', '1');
INSERT INTO `manhuaphotos` VALUES ('533', '67', '/1/67/154089076616722.jpg', '9', '1');
INSERT INTO `manhuaphotos` VALUES ('534', '67', '/1/67/154089076616723.jpg', '10', '1');
INSERT INTO `manhuaphotos` VALUES ('535', '67', '/1/67/154089076616724.jpg', '11', '1');
INSERT INTO `manhuaphotos` VALUES ('536', '67', '/1/67/154089076616725.jpg', '12', '1');

-- ----------------------------
-- Table structure for orderdeposit
-- ----------------------------
DROP TABLE IF EXISTS `orderdeposit`;
CREATE TABLE `orderdeposit` (
  `deposit_id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(9) NOT NULL,
  `daili_id` int(5) NOT NULL DEFAULT '0' COMMENT '0的话就不是代理过来的',
  `order_money` decimal(9,2) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:月vip 2季度vip: 3:年vip 4:直接购买金币',
  `transfer_no` varchar(100) DEFAULT NULL,
  `pay_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:支付宝 2:微信',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未付款 1:已付款',
  `pay_daili` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未结算 1:已结算',
  `pay_name` varchar(50) NOT NULL,
  `remark` text,
  `deal_time` timestamp NULL DEFAULT NULL COMMENT '处理时间',
  `ip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`deposit_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderdeposit
-- ----------------------------
INSERT INTO `orderdeposit` VALUES ('1', '3', '1', '29.90', '20181030111', '1', null, '1', '1', '1', '赵子龙', '123', '2018-10-30 04:34:46', '127.0.01', '2018-10-31 00:34:46', '2018-10-30 16:34:46');

-- ----------------------------
-- Table structure for orderwithdraw
-- ----------------------------
DROP TABLE IF EXISTS `orderwithdraw`;
CREATE TABLE `orderwithdraw` (
  `withdraw_id` int(8) NOT NULL AUTO_INCREMENT,
  `daili_id` int(5) NOT NULL,
  `withdraw_money` decimal(9,2) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `withdraw_info` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:等待审核 1:已付款 2:已被admin取消 3:代理自己取消',
  `remark` text,
  `transfer_no` varchar(100) DEFAULT NULL,
  `deal_time` timestamp NULL DEFAULT NULL COMMENT '处理时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderwithdraw
-- ----------------------------
INSERT INTO `orderwithdraw` VALUES ('1', '1', '100.00', '2018103121', '支付宝:234324323', '1', 'asdfds', '24324324', null, '2018-10-31 22:47:21', '2018-10-31 23:50:08');

-- ----------------------------
-- Table structure for saletype
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
INSERT INTO `saletype` VALUES ('4', '购买金币', '10.00');

-- ----------------------------
-- Table structure for statistics
-- ----------------------------
DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `daili_id` int(5) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `coming_url` varchar(100) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `daili_id` (`daili_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statistics
-- ----------------------------
INSERT INTO `statistics` VALUES ('1', '1', '127.0.0.1', 'http://www.baidu.com/sdf/sdf', '福建省海口市', '2018-11-01 00:19:06');

-- ----------------------------
-- Table structure for users
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
INSERT INTO `users` VALUES ('3', '1', 'eleven', 'eyJpdiI6IjBEYzUyUmJDb0J3aTF4dmlMeDliY2c9PSIsInZhbHVlIjoiVDJlNmsyK0lOWDRMUGNzWmlvT01xQT09IiwibWFjIjoiM2M1NDlmNWQ5MzBiNTBmNWYxZTc1ZjY5ZmQwZTc3ZmRiN2I1MTNjZGY3MTRjZDUyYWUzZDg3ZGYzMmIxY2MwNyJ9', '1', '1', '0000-00-00 00:00:00', '2018-12-30 04:28:11', '0000-00-00 00:00:00', '127.0.0.1', '127.0.0.1', '2018-10-28 09:26:21', '0', '2018-10-28 08:50:29', '2018-10-30 16:34:46');
INSERT INTO `users` VALUES ('5', '3', 'eleven1', 'eyJpdiI6IkZtc2RRTEFWaGNMV0dpUnJVbHp5WUE9PSIsInZhbHVlIjoidHR5NHJkZ3N0dmF0U3NOcnY0alZVUT09IiwibWFjIjoiMmQyNWQwNzU1YWE4ZGYxY2M5OGQ2MTM1M2E2ZmY5NmQ3ZDIyMGFlYTQ3ZDk4ZTJlOGQwNTQxY2M5MTcxYjA0ZCJ9', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '127.0.0.1', '2018-10-28 06:34:29', '0', '2018-10-28 18:34:29', '2018-10-29 02:37:49');
