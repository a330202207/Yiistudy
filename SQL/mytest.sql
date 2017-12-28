/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : mytest

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-12-28 09:23:38
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of test_admin
-- ----------------------------
INSERT INTO `test_admin` VALUES ('1', 'admin', '1', '$2y$13$zo/1zGhezr9IDK5HK1lXN.uFU23Kksheb/t.owuJ92I2S16QyQx2u', 'esW_4wu_CpBVDj9GmYZb40KixqDvIqkv', 'phphome111@qq.com', '13565231112', '1457922160', '1481278788', '2130706433', '2130706433', '1457922174', '10', '0');
INSERT INTO `test_admin` VALUES ('2', 'feifei', '2', '$2y$13$jqWGlVo8T3qtnWUX0kTX/ON5ctvokzkQ7RAvKuNRjN.WvxgBlFK4u', 'tzDsmCSLbtktnvbgn1YeEqslYOBo1Cn9', 'php11111@qq.com', '13631568985', '1458028401', '1513136481', '2130706433', '2130706433', '1458028401', '10', '1');
INSERT INTO `test_admin` VALUES ('6', 'guanli', '2', '$2y$13$QK.CEi7HHuTSIMbq5RbzeOfTNgrX8mUTl/noBkHtD/zKEf7y.SQO6', '_4F9_ptxkohU247kgi7UB4rg3UMYqo14', 'phphome222@qq.com', '13565656565', '1476438209', '0', '2130706433', '2130706433', '1458028401', '10', '0');
INSERT INTO `test_admin` VALUES ('7', 'huang', '2', '$2y$13$SO1qMnykM3MJuNizsqzQH.QBjPPDZ7U556yUtmSU3optwZ1EdWm0W', 'nkqZMhWkbIsjZrF1J8laC1UxWoXPRobA', 'phphome@qqqqq.com', '13656589562', '1481000197', '1513136546', '3232243969', '2130706433', '1458028401', '10', '1');
INSERT INTO `test_admin` VALUES ('21', 'test321', '2', '$2y$13$NcK1nsi/hUywp/Qo2/p8t.xeAmNHrSzd2L6O3kuHUXGn5wVvocomK', 'sIRlSVkr4zgEugFJD8IczXbe09XOMh4N', '321321222@qq.com', '321321', '1509604564', '1509604564', '0', '0', '0', '10', '1');
INSERT INTO `test_admin` VALUES ('22', 'test232', '1', '123123', 'qTfbf6hZ_R6lsNWhUaRFVvcd7jo61Fs4', '321321ww@qq.com', '12321123', '1509606365', '1509940686', '0', '0', '0', '10', '1');
INSERT INTO `test_admin` VALUES ('25', 'admin123', '1', '123123', 'NT1H_KzGcJcEBSVyakPNG65wmRL2haXH', '123@qq.com', '123123', '1513136653', '1513138234', '0', '0', '0', '0', '1');
INSERT INTO `test_admin` VALUES ('24', 'test122', '1', '123123', '', '321sds@qq.com', '12321', '1509674614', '1509674614', '0', '0', '0', '10', '1');
INSERT INTO `test_admin` VALUES ('26', 'admin123123333', '2', '123123', '3Kv11rZgHqCBQVCyG2PNzr-aB7HqLl8r', '123222@qq.com', '123321321', '1513136976', '1513138405', '0', '0', '0', '0', '1');
INSERT INTO `test_admin` VALUES ('27', '321321', '2', '321123321', 'etq1YeJvwzFp-EOuOp5OX-9tnDK9550H', '321@qq.com', '321', '1513137637', '1513138388', '0', '0', '0', '0', '1');
INSERT INTO `test_admin` VALUES ('28', 'haha321', '2', '123122', 'N8DepZBmpsRZp10P_XhYLdgNfLj48NmU', '222321@qq.com', '11111111111111', '1513137738', '1514342709', '0', '0', '0', '10', '0');
INSERT INTO `test_admin` VALUES ('29', 'gg123', '0', '12312312', 'XWj-FYEXwu-pANNHK2ui8qMvBPTkxTSX', '12333@qq.com', '321', '1513139022', '1513147015', '0', '0', '0', '0', '1');
INSERT INTO `test_admin` VALUES ('30', 'ffff123', '7', '123213', 'EnNTz2-Ad7u--utSJ9SnyQE1s80R12Xz', '1232132@163.com', '321321', '1513144034', '1513240188', '0', '0', '0', '10', '1');
INSERT INTO `test_admin` VALUES ('31', '礼包123', '0', '123123', 'CPOxc1qoZdpogCrqoJuIIqpQQ7SDxL49', '1234@qq.com', '12321', '1513240115', '1513240115', '0', '0', '0', '0', '0');
INSERT INTO `test_admin` VALUES ('32', 'tesr123', '0', '123123', 'B4v4joWiz1gCZJOAZBrnVcGcusB68_cu', '22d@qq.com', '123321321', '1514356329', '1514356329', '0', '0', '0', '10', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
INSERT INTO `test_log` VALUES ('9', 'admin', '127.0.0.1', '1513134379');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 PACK_KEYS=1;

-- ----------------------------
-- Records of test_menu
-- ----------------------------
INSERT INTO `test_menu` VALUES ('1', '0', '系统', '1', '', '&#xe620;', '1', '10');
INSERT INTO `test_menu` VALUES ('2', '0', '设置', '2', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('3', '1', '系统管理', '1', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('4', '3', '管理员管理', '1', '/admin/admin/index', '', '1', '10');
INSERT INTO `test_menu` VALUES ('5', '3', '权限管理', '2', '/admin/auth/index', '', '1', '10');
INSERT INTO `test_menu` VALUES ('6', '3', '菜单管理', '3', '/admin/menu/index', '', '1', '10');
INSERT INTO `test_menu` VALUES ('7', '0', '测试菜单', '100', '', '', '1', '10');
INSERT INTO `test_menu` VALUES ('8', '7', '测试菜单123', '100', '', '', '1', '10');

-- ----------------------------
-- Table structure for test_role
-- ----------------------------
DROP TABLE IF EXISTS `test_role`;
CREATE TABLE `test_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_role
-- ----------------------------
INSERT INTO `test_role` VALUES ('1', '超级管理员');
INSERT INTO `test_role` VALUES ('2', '管理员');
INSERT INTO `test_role` VALUES ('5', '测试角色12');

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
INSERT INTO `test_role_maps` VALUES ('2', '4');
INSERT INTO `test_role_maps` VALUES ('2', '6');
INSERT INTO `test_role_maps` VALUES ('2', '7');
INSERT INTO `test_role_maps` VALUES ('5', '4');
INSERT INTO `test_role_maps` VALUES ('5', '5');
INSERT INTO `test_role_maps` VALUES ('5', '6');
INSERT INTO `test_role_maps` VALUES ('5', '7');
INSERT INTO `test_role_maps` VALUES ('6', '4');
INSERT INTO `test_role_maps` VALUES ('6', '5');
INSERT INTO `test_role_maps` VALUES ('7', '4');
INSERT INTO `test_role_maps` VALUES ('7', '6');
