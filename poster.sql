/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : poster

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-03-23 10:09:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for p_links
-- ----------------------------
DROP TABLE IF EXISTS `p_links`;
CREATE TABLE `p_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_links
-- ----------------------------
INSERT INTO `p_links` VALUES ('16', 'http://192.168.0.252/edushi/api/index/newsList', '2016-03-14 15:39:51', '192.168.0.252', '13');
INSERT INTO `p_links` VALUES ('17', 'http://192.168.0.252/edushi/api/user/dologin', '2016-03-14 15:40:36', '192.168.0.252', '17');
INSERT INTO `p_links` VALUES ('19', 'http://192.168.0.252/edushi/api/points/tixian', '2016-03-14 15:52:59', '192.168.0.252', '42');
INSERT INTO `p_links` VALUES ('21', 'http://192.168.0.252/edushi/api/points/tixian_accounts', '2016-03-15 09:27:13', '192.168.0.38', '2');
INSERT INTO `p_links` VALUES ('23', 'http://192.168.0.252/edushi/api/action/signIn', '2016-03-15 10:10:24', '192.168.0.252', '9');
INSERT INTO `p_links` VALUES ('24', 'http://192.168.0.252/edushi/api/user/profile', '2016-03-15 10:10:50', '192.168.0.252', '4');
INSERT INTO `p_links` VALUES ('25', 'http://192.168.0.252/edushi/api/points/tixian_record', '2016-03-15 16:48:19', '192.168.0.252', '2');
INSERT INTO `p_links` VALUES ('26', 'http://192.168.0.252/edushi/api/points/tasks', '2016-03-16 09:27:45', '192.168.0.9', '1');
INSERT INTO `p_links` VALUES ('27', 'http://192.168.0.252/edushi/api/user/is_signed', '2016-03-16 13:48:26', '192.168.0.252', '1');
INSERT INTO `p_links` VALUES ('28', 'http://192.168.0.252/edushi/api/action/is_signed', '2016-03-16 13:48:33', '192.168.0.252', '1');
