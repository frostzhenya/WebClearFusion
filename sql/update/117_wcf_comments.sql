/*
MySQL Data Transfer
Source Host: localhost
Source Database: wcf
Target Host: localhost
Target Database: wcf
Date: 11.01.2012 17:17:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for wcf_comments
-- ----------------------------
DROP TABLE IF EXISTS `wcf_comments`;
CREATE TABLE `wcf_comments` (
  `comment_id` int(11) unsigned NOT NULL auto_increment,
  `comment_item_id` int(11) unsigned default '0',
  `comment_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `comment_type` int(2) unsigned default '0',
  `user_id` int(11) unsigned default '1',
  `comment_message` longtext collate utf8_unicode_ci,
  PRIMARY KEY  (`comment_id`),
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wcf_comments` VALUES ('2', '1', '2011-12-01 15:57:52', '1', '5', '<p><span style=\\\"text-decoration: line-through;\\\"><span style=\\\"text-decoration: underline;\\\"><em><strong>Проверка работаспособности!</strong></em></span></span></p>');
INSERT INTO `wcf_comments` VALUES ('3', '2', '2011-12-01 16:09:16', '1', '5', '<p>Когда же сервера появятся пирацкие?</p>');
