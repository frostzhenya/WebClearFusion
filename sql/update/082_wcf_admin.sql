/*
MySQL Data Transfer
Source Host: localhost
Source Database: wcf
Target Host: localhost
Target Database: wcf
Date: 03.11.2011 15:56:28
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
  `admin_image` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `admin_title` longtext,
  `admin_link` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_forums
-- ----------------------------
DROP TABLE IF EXISTS `wcf_forums`;
CREATE TABLE `wcf_forums` (
  `forum_id` int(11) unsigned NOT NULL auto_increment,
  `forum_sections` int(11) unsigned NOT NULL default '0',
  `forum_name` longtext,
  `forum_description` longtext,
  `forum_lastpostid` int(11) unsigned NOT NULL default '0',
  `forum_postcount` int(11) unsigned NOT NULL default '0',
  `forum_threadcount` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`forum_id`),
  KEY `forum_postcount` (`forum_postcount`),
  KEY `forum_threadcount` (`forum_threadcount`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_forums_posts
-- ----------------------------
DROP TABLE IF EXISTS `wcf_forums_posts`;
CREATE TABLE `wcf_forums_posts` (
  `forum_id` int(11) default NULL,
  `thread_id` int(11) default NULL,
  `post_id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `post_text` longtext,
  `post_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_forums_threads
-- ----------------------------
DROP TABLE IF EXISTS `wcf_forums_threads`;
CREATE TABLE `wcf_forums_threads` (
  `forum_id` int(11) default NULL,
  `thread_id` int(11) unsigned NOT NULL auto_increment,
  `thread_subject` longtext,
  `thread_author` int(11) default NULL,
  `thread_views` int(11) default NULL,
  `thread_lastpostid` int(11) unsigned NOT NULL default '0',
  `thread_lastuser` int(11) unsigned NOT NULL default '0',
  `thread_postcount` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`thread_id`),
  KEY `thread_postcount` (`thread_postcount`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_login_failed
-- ----------------------------
DROP TABLE IF EXISTS `wcf_login_failed`;
CREATE TABLE `wcf_login_failed` (
  `ip` varchar(15) NOT NULL default '127.0.0.1',
  `login_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_logs
-- ----------------------------
DROP TABLE IF EXISTS `wcf_logs`;
CREATE TABLE `wcf_logs` (
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `account` int(11) unsigned NOT NULL,
  `character` int(11) unsigned default NULL,
  `mode` tinyint(3) unsigned NOT NULL,
  `email` varchar(100) default NULL,
  `resultat` longtext,
  `note` longtext,
  `old_data` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_news
-- ----------------------------
DROP TABLE IF EXISTS `wcf_news`;
CREATE TABLE `wcf_news` (
  `news_id` int(11) unsigned NOT NULL auto_increment,
  `news_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `news_title` longtext,
  `news_text` longtext,
  `news_cat` tinyint(3) unsigned default '0',
  PRIMARY KEY  (`news_id`),
  UNIQUE KEY `news_id` (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_panels
-- ----------------------------
DROP TABLE IF EXISTS `wcf_panels`;
CREATE TABLE `wcf_panels` (
  `panel_id` mediumint(8) unsigned NOT NULL auto_increment,
  `panel_name` varchar(200) NOT NULL default '',
  `panel_url` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `panel_position` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`panel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wcf_users
-- ----------------------------
DROP TABLE IF EXISTS `wcf_users`;
CREATE TABLE `wcf_users` (
  `user_id` int(11) unsigned NOT NULL auto_increment,
  `user_name` varchar(32) NOT NULL default '',
  `user_online` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `idx_user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wcf_admin` VALUES ('1', '1', '1', 'news.gif', 'Новости', 'newsedit');
INSERT INTO `wcf_admin` VALUES ('2', '2', '1', 'forums.gif', 'Форум', 'forumedit');
INSERT INTO `wcf_admin` VALUES ('3', '3', '1', 'panels.gif', 'Панели', 'panelsedit');
INSERT INTO `wcf_admin` VALUES ('4', '4', '1', '', null, '');
INSERT INTO `wcf_forums` VALUES ('1', '0', 'Информация о сервере', null, '0', '0', '0');
INSERT INTO `wcf_forums` VALUES ('2', '1', 'Информация от администрации', 'Обновления, изменения, события, новости.', '2', '2', '2');
INSERT INTO `wcf_forums` VALUES ('3', '0', 'Мир Warcraft', null, '0', '0', '0');
INSERT INTO `wcf_forums` VALUES ('4', '3', 'Аддоны и Макросы\r\n', 'Скачиваем и заказываем', '3', '1', '1');
INSERT INTO `wcf_forums` VALUES ('5', '1', 'Мастерская', 'Делимся своими идеями, решениями. Обсуждаем, создаем что-то свое.', '4', '1', '1');
INSERT INTO `wcf_forums_posts` VALUES ('2', '1', '1', '1', 'Проверка работоспособности форума!!!', '2010-05-28 20:04:49');
INSERT INTO `wcf_forums_posts` VALUES ('2', '2', '2', '4', 'Проверка работоспособности форума!!!', '2011-10-27 11:40:08');
INSERT INTO `wcf_forums_posts` VALUES ('5', '3', '3', '1', 'Проверка работоспособности форума!!!', '2011-10-27 11:39:40');
INSERT INTO `wcf_forums_posts` VALUES ('4', '4', '4', '1', 'Проверка работоспособности форума!!!', '2011-10-27 11:39:44');
INSERT INTO `wcf_forums_threads` VALUES ('2', '1', 'Сообщение от администрации', '1', '0', '1', '1', '1');
INSERT INTO `wcf_forums_threads` VALUES ('2', '2', 'Тестовый форум', '4', '2', '2', '4', '1');
INSERT INTO `wcf_forums_threads` VALUES ('5', '3', 'Сообщение от администрации', '1', '0', '3', '1', '1');
INSERT INTO `wcf_forums_threads` VALUES ('4', '4', 'Сообщение от администрации', '1', '0', '4', '1', '1');
INSERT INTO `wcf_news` VALUES ('1', '2011-11-03 15:15:07', 'От разработчика.', 'WCF успешно установлен.', '0');
INSERT INTO `wcf_panels` VALUES ('1', 'main form', 'panels/main_form/main_form.php', '0');
INSERT INTO `wcf_panels` VALUES ('2', 'navigation panel', 'panels/navigation_panel/navigation_panel.php', '1');
INSERT INTO `wcf_panels` VALUES ('3', 'user info panel', 'panels/user_info_panel/user_info_panel.php', '2');
INSERT INTO `wcf_users` VALUES ('1', 'ADMINISTRATOR', '0');
INSERT INTO `wcf_users` VALUES ('2', 'GAMEMASTER', '0');
INSERT INTO `wcf_users` VALUES ('3', 'MODERATOR', '0');
INSERT INTO `wcf_users` VALUES ('4', 'PLAYER', '0');
INSERT INTO `wcf_users` VALUES ('5', 'LOVEPSONE', '1');
