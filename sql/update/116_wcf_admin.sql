/*
MySQL Data Transfer
Source Host: localhost
Source Database: wcf
Target Host: localhost
Target Database: wcf
Date: 10.01.2012 4:31:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for wcf_admin
-- ----------------------------
DROP TABLE IF EXISTS `wcf_admin`;
CREATE TABLE `wcf_admin` (
  `admin_id` int(11) unsigned NOT NULL auto_increment,
  `admin_colum` int(11) unsigned NOT NULL default '0',
  `admin_page` int(11) unsigned NOT NULL default '0',
  `admin_string` int(11) unsigned NOT NULL default '0',
  `admin_image` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `admin_title` longtext,
  `admin_link` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wcf_admin` VALUES ('1', '1', '1', '1', 'news.gif', 'Новости', 'news.php');
INSERT INTO `wcf_admin` VALUES ('2', '2', '1', '1', 'forums.gif', 'Форум', 'forumedit.php');
INSERT INTO `wcf_admin` VALUES ('3', '3', '1', '1', 'panels.gif', 'Панели', '');
INSERT INTO `wcf_admin` VALUES ('4', '4', '1', '1', '', null, '');
INSERT INTO `wcf_admin` VALUES ('5', '1', '1', '2', 'news_cats', 'Категории новостей', 'news_cats.php');
INSERT INTO `wcf_admin` VALUES ('6', '1', '1', '2', '', null, '');
INSERT INTO `wcf_admin` VALUES ('7', '1', '1', '2', '', null, '');
INSERT INTO `wcf_admin` VALUES ('8', '1', '1', '2', '', null, '');
INSERT INTO `wcf_admin` VALUES ('49', '1', '4', '1', 'settings.gif', 'Главные установки', 'settings_main.php');
