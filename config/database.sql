-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_secure_accessdata`
-- 

CREATE TABLE `tl_secure_accessdata` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `access_title` varchar(255) NOT NULL default '',
  `type` varchar(32) NOT NULL default '',
  `author` varchar(255) NOT NULL default '',
  `protect` varchar(255) NOT NULL default '',
  `protect_users` blob NULL,
  `protect_groups` blob NULL,
  `info` mediumtext NULL,
  `weblogin_url` mediumtext NULL,
  `weblogin_name` varchar(255) NOT NULL default '',
  `weblogin_pwd` varchar(255) NOT NULL default '',
  `contao_user` varchar(255) NOT NULL default '',
  `contao_pwd` varchar(255) NOT NULL default '',
  `contao_install_pwd` varchar(255) NOT NULL default '',
  `local_url` mediumtext NULL,
  `local_root` mediumtext NULL,
  `local_db_server` varchar(255) NOT NULL default '',
  `local_db_name` varchar(255) NOT NULL default '',
  `local_db_user` varchar(255) NOT NULL default '',
  `local_db_pwd` varchar(255) NOT NULL default '',
  `local_db_charset` varchar(255) NOT NULL default '',
  `local_db_port` varchar(255) NOT NULL default '',
  `preview_url` mediumtext NULL,
  `preview_root` mediumtext NULL,
  `preview_db_server` varchar(255) NOT NULL default '',
  `preview_db_name` varchar(255) NOT NULL default '',
  `preview_db_user` varchar(255) NOT NULL default '',
  `preview_db_pwd` varchar(255) NOT NULL default '',
  `preview_db_charset` varchar(255) NOT NULL default '',
  `preview_db_port` varchar(255) NOT NULL default '',
  `preview_ftp_server` varchar(255) NOT NULL default '',
  `preview_ftp_user` varchar(255) NOT NULL default '',
  `preview_ftp_pwd` varchar(255) NOT NULL default '',
  `preview_ftp_protocol` varchar(255) NOT NULL default '',
  `preview_ftp_port` varchar(255) NOT NULL default '',
  `preview_ssh_server` varchar(255) NOT NULL default '',
  `preview_ssh_port` varchar(255) NOT NULL default '',
  `preview_ssh_user` varchar(255) NOT NULL default '',
  `preview_ssh_pwd` varchar(255) NOT NULL default '',
  `online_url` mediumtext NULL,
  `online_root` mediumtext NULL,
  `online_db_server` varchar(255) NOT NULL default '',
  `online_db_name` varchar(255) NOT NULL default '',
  `online_db_user` varchar(255) NOT NULL default '',
  `online_db_pwd` varchar(255) NOT NULL default '',
  `online_db_charset` varchar(255) NOT NULL default '',
  `online_db_port` varchar(255) NOT NULL default '',
  `online_ftp_server` varchar(255) NOT NULL default '',
  `online_ftp_user` varchar(255) NOT NULL default '',
  `online_ftp_pwd` varchar(255) NOT NULL default '',
  `online_ftp_protocol` varchar(255) NOT NULL default '',
  `online_ftp_port` varchar(255) NOT NULL default '',
  `online_ssh_server` varchar(255) NOT NULL default '',
  `online_ssh_port` varchar(255) NOT NULL default '',
  `online_ssh_user` varchar(255) NOT NULL default '',
  `online_ssh_pwd` varchar(255) NOT NULL default '',
  `webadmin_url` mediumtext NULL,
  `webadmin_name` varchar(255) NOT NULL default '',
  `webadmin_pwd` varchar(255) NOT NULL default '',
  `mail_name` varchar(255) NOT NULL default '',
  `mail_email` varchar(255) NOT NULL default '',
  `mail_loginname` varchar(255) NOT NULL default '',
  `mail_pwd` varchar(255) NOT NULL default '',
  `mail_crypt` varchar(255) NOT NULL default '',
  `mail_smtp_host` varchar(255) NOT NULL default '',
  `mail_smtp_port` varchar(255) NOT NULL default '',
  `mail_imap_host` varchar(255) NOT NULL default '',
  `mail_imap_port` varchar(255) NOT NULL default '',
  `mail_pop_host` varchar(255) NOT NULL default '',
  `mail_pop_port` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

