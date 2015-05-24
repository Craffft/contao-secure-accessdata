<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * @package    photoalbums2
 * @author     Daniel Kiesel <daniel@craffft.de>
 * @license    LGPL
 * @copyright  Daniel Kiesel 2011-2015
 */

/**
 * Backend Modules
 */
$GLOBALS['BE_MOD']['system']['tl_secure_accessdata'] = array
(
    'tables'       => array('tl_secure_accessdata'),
    'icon'         => 'system/modules/secure-accessdata/assets/images/protect_.gif'
);

/**
 * Secure Accessdata types
 */
$GLOBALS['TL_SADTY'] = array
(
    'weblogin' => 'weblogin',
    'contao_login' => 'contao_login',
    'encryption_key' => 'encryption_key',
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
