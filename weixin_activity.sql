/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : weixin_activity

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-12-24 17:03:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `erweima` varchar(255) DEFAULT NULL,
  `activity_intro` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('7', '123', '1419409776.PNG', '1419409776.PNG', '321', '1419407763', null);
INSERT INTO `content` VALUES ('8', 'qwe', null, null, 'qweadsf', '1419409440', null);
INSERT INTO `content` VALUES ('9', 'safd', '1419409687.jpg', '1419409687.jpg', 'faasdf', '1419409473', 'asdfwaef');
INSERT INTO `content` VALUES ('10', '2qf', '1419409802.PNG', '1419409802.PNG', '2qfc', '1419409790', 'f3w');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Lich', '$2y$10$4LakbsVUE7WfXIOv7veDlOnCRB2RNVPUazl0suNxJQfUUiAvYFnB2', 'smUPmBiWz1M9eXHM7gTym0diW3BJbgr29HliRb1kAYNHlT5lWE1H01iVRtzz', '2014-11-01 14:48:04');
