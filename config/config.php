<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  Daniel Kiesel 2011 
 * @author     Daniel Kiesel 
 * @package    secure_accessdata 
 * @license    LGPL 
 * @filesource
 */


/**
 * Backend Modules
 */
$GLOBALS['BE_MOD']['system']['tl_secure_accessdata'] = array
(
	'tables'       => array('tl_secure_accessdata'),
	'icon'         => 'system/modules/secure_accessdata/html/protect.gif'
);


/**
 * Secure Accessdata types
 */
$GLOBALS['TL_SADTY'] = array
(
	'contao_login' => 'contao_login',
	'weblogin' => 'weblogin',
	'mail' => 'mail',
	'project' => 'project',
	'online_project' => 'online_project'
);


/**
 * Secure Accessdata FTP protocols
 */
$GLOBALS['TL_SAD_FTP_PROTOCOL'] = array
(
	'ftp' => 'ftp',
	'sftp' => 'sftp',
	'ftp_ssl_implicit' => 'ftp_ssl_implicit',
	'ftp_tls_ssl' => 'ftp_tls_ssl',
	'webdav' => 'webdav',
	'webdav_https' => 'webdav_https'
);


/**
 * Secure Accessdata mail crypt
 */
$GLOBALS['TL_SAD_MAIL_CRYPT'] = array
(
	'ssl' => 'SSL',
	'tls' => 'TLS'
);
 
?>