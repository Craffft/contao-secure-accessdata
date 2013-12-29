<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Daniel Kiesel 2011-2014
 * @author     Daniel Kiesel <https://github.com/icodr8>
 * @package    secure_accessdata 
 * @license     LGPL 
 * @filesource
 */


/**
 * Label callback
 */
$GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect'] = 'protected';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect_users'] = 'users';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect_groups'] = 'groups';


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_secure_accessdata']['access_title'] = array('Name', 'Name of this accessdata.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['type'] = array('Type', 'Here, the access-type is selected.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['author'] = array('Author', 'Author of this accessdata.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['li_crm_customer'] = array('Customer', 'Select a customer from whom this access to be assigned.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect'] = array('Protect access', 'Here you can access only to specific users and groups to share.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_users'] = array('Users with access', 'Select the users from which access may have on this access.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_groups'] = array('Groups with access', 'Select the groups from which access may have on this access.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['info'] = array('Additional informations', 'Here, enter additional credentials are entered that do not fit into the other fields.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_url'] = array('Login URL', 'Here is the full URL will be deposited to login.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_name'] = array('Username', 'Username of login.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_pwd'] = array('Password', 'The Appropriate password for the username.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_user'] = array('Contao username', 'Der username of Contao installation.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_pwd'] = array('Contao password', 'The Appropriate password for the username.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_install_pwd'] = array('Contao installation password', 'Password for the Contao installation.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'] = array('URL', 'Here is the complete URL is specified.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'] = array('Root', 'Here is the address given to the root.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'] = array('Database server', 'Database server (Standard: "localhost").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'] = array('Database name', 'Database name.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'] = array('Database user', 'Database user.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'] = array('Database password', 'The Appropriate password for the database username.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'] = array('Database charset', 'Database charset (Standard: "UTF-8").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'] = array('Database port', 'Database port (Standard: "3306").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_server'] = array('FTP server', 'FTP server.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_user'] = array('FTP user', 'FTP user.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_pwd'] = array('FTP password', 'FTP passwort.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_protocol'] = array('FTP protocol', 'FTP protocol (Standard: "FTP").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_port'] = array('FTP port', 'FTP port (Standard: "21").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_server'] = array('SSH server', 'SSH server.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_port'] = array('SSH port', 'SSH port (Standard: "22").');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_user'] = array('SSH user', 'SSH user.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_pwd'] = array('SSH password', 'SSH password.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_url'] = array('Webadmin Login URL', 'Here is the full URL will be deposited to webadmin login.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_name'] = array('Benutzername', 'The username of webadmin login.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_pwd'] = array('Passwort', 'The appropriate password for the username.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_name'] = array('Email name', 'Name of the email account user.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_email'] = array('Email address', 'Email address.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_loginname'] = array('Login name', 'Login name.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pwd'] = array('Password', 'The appropriate password for the login name.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_crypt'] = array('encryption method', 'encryption method.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_host'] = array('Email smtp host', 'Email smtp host.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_port'] = array('Email smtp port', 'Email smtp port.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_host'] = array('Email imap host', 'Email imap host.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_port'] = array('Email imap port', 'Email imap port.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_host'] = array('Email pop host', 'Email pop host.');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_port'] = array('Email pop port', 'Email pop port.');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_secure_accessdata']['title_legend'] = 'Title and type';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_legend'] = 'Protect access';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['info_legend'] = 'Additional informations';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_legend'] = 'Web login';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_legend'] = 'Contao';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['local_legend'] = 'Local general';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['local_db_legend'] = 'Local database';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['preview_legend'] = 'Preview general';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['preview_db_legend'] = 'Preview database';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['preview_ftp_legend'] = 'Preview FTP';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['preview_ssh_legend'] = 'Preview SSH';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['online_legend'] = 'Online general';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['online_db_legend'] = 'Online database';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['online_ftp_legend'] = 'Online FTP';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['online_ssh_legend'] = 'Online SSH';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_legend'] = 'Webadmin';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_legend'] = 'Email';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_legend'] = 'Email (SMTP)';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_legend'] = 'Email (IMAP)';
$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_legend'] = 'Email (POP)';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_secure_accessdata']['new'] = array('Add new accessdata', 'Add new accessdata');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['edit'] = array('Edit accessdata', 'Edit accessdata ID %s');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['copy'] = array('Duplicate accessdata', 'Duplicate accessdata ID %s');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['delete'] = array('Delete accessdata', 'Delete accessdata ID %s');
$GLOBALS['TL_LANG']['tl_secure_accessdata']['show'] = array('Show accessdata', 'Show accessdata ID %s');

?>