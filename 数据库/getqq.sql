/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50147
Source Host           : localhost:3306
Source Database       : 1112

Target Server Type    : MYSQL
Target Server Version : 50147
File Encoding         : 65001

Date: 2013-12-31 13:45:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `pws` varchar(60) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `qq` varchar(30) DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `ip` varchar(60) DEFAULT NULL,
  `ymdate` datetime DEFAULT NULL,
  `yip` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `md5` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('16', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '2013-12-19 14:06:46', '127.0.0.1', '2013-12-23 15:41:41', '114.221.96.71', 'jssem.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', '2016-09-14 14:06:46');

-- ----------------------------
-- Table structure for `base`
-- ----------------------------
DROP TABLE IF EXISTS `base`;
CREATE TABLE `base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pws` varchar(45) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `mdate` int(11) DEFAULT NULL,
  `t` tinyint(1) DEFAULT '0',
  `user` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of base
-- ----------------------------

-- ----------------------------
-- Table structure for `count_qq`
-- ----------------------------
DROP TABLE IF EXISTS `count_qq`;
CREATE TABLE `count_qq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Belong` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=992 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of count_qq
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_chen588`
-- ----------------------------
DROP TABLE IF EXISTS `ip_chen588`;
CREATE TABLE `ip_chen588` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(20) DEFAULT NULL,
  `get_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `d` (`get_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ip_chen588
-- ----------------------------
INSERT INTO `ip_chen588` VALUES ('1', '127.0.0.1', '1387152000');

-- ----------------------------
-- Table structure for `me_getqq_chen588`
-- ----------------------------
DROP TABLE IF EXISTS `me_getqq_chen588`;
CREATE TABLE `me_getqq_chen588` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(60) DEFAULT NULL,
  `ip` varchar(60) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `weburl` varchar(255) DEFAULT NULL,
  `rurl` varchar(255) DEFAULT NULL,
  `nc` varchar(80) DEFAULT NULL,
  `t` tinyint(1) DEFAULT '0',
  `mdate` int(11) DEFAULT NULL,
  `get_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3203 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of me_getqq_chen588
-- ----------------------------
