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
