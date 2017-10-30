/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : mytest

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-30 18:06:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for test_admin
-- ----------------------------
DROP TABLE IF EXISTS `test_admin`;
CREATE TABLE `test_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL DEFAULT '' COMMENT '用户名',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `password` char(60) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(32) NOT NULL DEFAULT '' COMMENT '密码干扰字符',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_ip` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_ip` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '用户状态； 10-正常；0-禁用',
  `is_del` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除；0-未删除；1-删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of test_admin
-- ----------------------------
INSERT INTO `test_admin` VALUES ('1', 'admin', '1', '$2y$13$zo/1zGhezr9IDK5HK1lXN.uFU23Kksheb/t.owuJ92I2S16QyQx2u', 'esW_4wu_CpBVDj9GmYZb40KixqDvIqkv', 'phphome111@qq.com', '13565231112', '1457922160', '1481278788', '2130706433', '2130706433', '1457922174', '10', '0');
INSERT INTO `test_admin` VALUES ('2', 'feifei', '2', '$2y$13$jqWGlVo8T3qtnWUX0kTX/ON5ctvokzkQ7RAvKuNRjN.WvxgBlFK4u', 'tzDsmCSLbtktnvbgn1YeEqslYOBo1Cn9', 'php11111@qq.com', '13631568985', '1458028401', '1468230085', '2130706433', '2130706433', '1458028401', '10', '0');
INSERT INTO `test_admin` VALUES ('6', 'guanli', '2', '$2y$13$QK.CEi7HHuTSIMbq5RbzeOfTNgrX8mUTl/noBkHtD/zKEf7y.SQO6', '_4F9_ptxkohU247kgi7UB4rg3UMYqo14', 'phphome222@qq.com', '13565656565', '1476438209', '0', '2130706433', '2130706433', '1458028401', '10', '0');
INSERT INTO `test_admin` VALUES ('7', 'huang', '2', '$2y$13$SO1qMnykM3MJuNizsqzQH.QBjPPDZ7U556yUtmSU3optwZ1EdWm0W', 'nkqZMhWkbIsjZrF1J8laC1UxWoXPRobA', 'phphome@qqqqq.com', '13656589562', '1481000197', '1481003421', '3232243969', '2130706433', '1458028401', '10', '0');
INSERT INTO `test_admin` VALUES ('8', 'adminafmin', '0', '$2y$13$ChQOI8/PwIJEy54dN3flDuoWY1BNa5fz8YW44mR2jUUsv/VlpZg2y', 'YRcVntRScYyw_2u2a9X_bJLU-bSK8CMh', '', '123123', '0', '0', '0', '2130706433', '0', '10', '0');
INSERT INTO `test_admin` VALUES ('9', 'admin123', '0', '$2y$13$J0pvbg5IfJorrmyQR.1pBep8SlfreoS1HfxVP/eCOz86c1w6RFQVy', 'x7RZiBEXagoBWHaN07_5q_CT3-q_0cTJ', '123@qq.com', '123123', '1509004543', '1509004543', '0', '0', '0', '0', '0');
INSERT INTO `test_admin` VALUES ('17', 'hahah', '0', '$2y$13$Bt8kOu6/DYGvkwME.dXoaOKMq6EpRDfSbQo1Bs3SpXJ/LbQuBtyGa', 'dEq9w2eCOmT3SnO8qOj-OJ3vB3TO9v3f', '32132@qq.com', '12321321', '1509007035', '1509007035', '0', '0', '0', '0', '0');
INSERT INTO `test_admin` VALUES ('18', 'admin321', '0', '$2y$13$YPCyE5QIc7eq0I92ZNISE.4ma42rAxq9/M1Ql5G8ESYi7H67R/STe', 'MopyFMw_gjyyjXEBCR-8MiE51kLOJGNe', '2222@qq.com', '32132132', '1509069412', '1509069412', '0', '0', '0', '0', '0');
INSERT INTO `test_admin` VALUES ('19', '123admin', '0', '$2y$13$kMpx4KMeNpyf6VQO68P7TOYVJ4upHH5gHLpDghQE1Omx76IAy6uL.', 'Ri4lxmqYc7bxEGMRQasF9Za5wyDCqpcS', '321@qq.com', '321321', '1509069586', '1509069586', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for test_log
-- ----------------------------
DROP TABLE IF EXISTS `test_log`;
CREATE TABLE `test_log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '登录用户名',
  `ip` varchar(64) NOT NULL DEFAULT '' COMMENT '登录IP',
  `create_time` varchar(32) NOT NULL DEFAULT '' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_log
-- ----------------------------
INSERT INTO `test_log` VALUES ('1', 'admin', '127.0.0.1', '1506666693');
INSERT INTO `test_log` VALUES ('2', 'admin', '127.0.0.1', '1506667159');
INSERT INTO `test_log` VALUES ('3', 'admin', '127.0.0.1', '1506667351');
INSERT INTO `test_log` VALUES ('4', 'admin', '127.0.0.1', '1506670506');
INSERT INTO `test_log` VALUES ('5', 'admin', '127.0.0.1', '1507261397');
INSERT INTO `test_log` VALUES ('6', 'admin', '127.0.0.1', '1507264042');
INSERT INTO `test_log` VALUES ('7', 'admin', '127.0.0.1', '1507277233');
INSERT INTO `test_log` VALUES ('8', 'admin', '127.0.0.1', '1509003693');

-- ----------------------------
-- Table structure for test_menu
-- ----------------------------
DROP TABLE IF EXISTS `test_menu`;
CREATE TABLE `test_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID，0代表顶级',
  `menu_name` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `sort` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '排序（同级有效）',
  `action` char(255) NOT NULL DEFAULT '' COMMENT '菜单路由',
  `icon` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单图标',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否隐藏；0-隐藏；1-显示',
  `status` tinyint(1) NOT NULL DEFAULT '10' COMMENT '状态；10-正常；0-禁用',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_menu
-- ----------------------------
INSERT INTO `test_menu` VALUES ('1', '0', '系统', '100', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('3', '0', '后台菜单管理', '100', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('4', '3', '菜单列表', '1', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('5', '3', '新增菜单', '2', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('6', '1', '网站设置', '100', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('7', '1', '数据备份', '100', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('8', '2', '', '100', '', '', '1', '10');

-- ----------------------------
-- Table structure for test_role
-- ----------------------------
DROP TABLE IF EXISTS `test_role`;
CREATE TABLE `test_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_role
-- ----------------------------
INSERT INTO `test_role` VALUES ('1', '超级管理员');
INSERT INTO `test_role` VALUES ('2', '管理员');

-- ----------------------------
-- Table structure for test_role_maps
-- ----------------------------
DROP TABLE IF EXISTS `test_role_maps`;
CREATE TABLE `test_role_maps` (
  `role_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '角色名称ID',
  `menu_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '菜单ID',
  UNIQUE KEY `role_id` (`role_id`,`menu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_role_maps
-- ----------------------------
INSERT INTO `test_role_maps` VALUES ('2', '1');
INSERT INTO `test_role_maps` VALUES ('2', '2');
