/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-18 18:27:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `level_name` varchar(20) DEFAULT NULL COMMENT '等级名称',
  `level_info` varchar(200) DEFAULT NULL COMMENT '等级说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', '超级管理员', null);
INSERT INTO `level` VALUES ('2', '普通管理员', null);
INSERT INTO `level` VALUES ('3', '发帖专员', null);
INSERT INTO `level` VALUES ('4', '评论专员', null);

-- ----------------------------
-- Table structure for manage
-- ----------------------------
DROP TABLE IF EXISTS `manage`;
CREATE TABLE `manage` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `admin_user` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `admin_pass` varchar(40) DEFAULT NULL COMMENT '管理员密码',
  `level` tinyint(2) unsigned DEFAULT '1' COMMENT '管理员等级',
  `login_count` smallint(5) unsigned zerofill DEFAULT '00000' COMMENT '登录次数',
  `last_ip` varchar(50) DEFAULT '000.000.000.000' COMMENT '最后一次登录的ip',
  `last_time` varchar(32) DEFAULT NULL COMMENT '最后一次登录时间',
  `reg_time` varchar(32) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manage
-- ----------------------------
INSERT INTO `manage` VALUES ('1', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '00000', '000.000.000.000', null, null);

-- ----------------------------
-- Table structure for nav
-- ----------------------------
DROP TABLE IF EXISTS `nav`;
CREATE TABLE `nav` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `nav_name` varchar(20) DEFAULT NULL COMMENT '导航名',
  `nav_info` varchar(200) DEFAULT NULL COMMENT '导航说明',
  `pid` int(8) DEFAULT NULL COMMENT '子分类',
  `sort` int(8) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nav
-- ----------------------------
INSERT INTO `nav` VALUES ('2', '军事动态', '军事方面新闻', '0', '2');
INSERT INTO `nav` VALUES ('3', '八卦娱乐', '娱乐和狗仔新闻1', '0', '3');
INSERT INTO `nav` VALUES ('4', '时尚女人', '关于时尚女人方面的', '0', '4');
INSERT INTO `nav` VALUES ('5', '科技频道', '关于最新科技方面的', '0', '5');
INSERT INTO `nav` VALUES ('6', '智能手机', '关于智能手机方面的推荐', '0', '6');
INSERT INTO `nav` VALUES ('14', '小米手机', '小米手机小米手机', '5', '14');
INSERT INTO `nav` VALUES ('8', '热门汽车', '关于汽车方面的东西', '0', '8');
INSERT INTO `nav` VALUES ('10', '美容护肤', '美容护肤美容护肤', '0', '10');
INSERT INTO `nav` VALUES ('11', '房产家居', '房产家居房产家居', '0', '11');
INSERT INTO `nav` VALUES ('12', '读书教育', '读书教育读书教育', '0', '12');
INSERT INTO `nav` VALUES ('13', '股票基金', '股票基金股票基金', '0', '13');
INSERT INTO `nav` VALUES ('15', '苹果手机', '苹果手机苹果手机', '5', '15');
INSERT INTO `nav` VALUES ('16', '牛叉科技', '牛叉科技牛叉科技', '5', '16');
