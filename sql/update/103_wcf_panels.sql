/*
MySQL Data Transfer
Source Host: localhost
Source Database: wcf
Target Host: localhost
Target Database: wcf
Date: 02.12.2011 17:09:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for wcf_panels
-- ----------------------------
DROP TABLE IF EXISTS `wcf_panels`;
CREATE TABLE `wcf_panels` (
  `panel_id` mediumint(8) unsigned NOT NULL auto_increment,
  `panel_filename` varchar(200) NOT NULL default '',
  `panel_position` tinyint(1) unsigned NOT NULL default '1',
  `panel_status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`panel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wcf_panels` VALUES ('1', 'main_form', '0', '1');
INSERT INTO `wcf_panels` VALUES ('2', 'navigation_panel', '1', '1');
INSERT INTO `wcf_panels` VALUES ('3', 'user_info_panel', '2', '1');
INSERT INTO `wcf_panels` VALUES ('4', 'welcome_message_panel', '0', '0');
