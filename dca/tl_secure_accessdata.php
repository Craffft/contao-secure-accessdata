<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   photoalbums2
 * @author    Daniel Kiesel <https://github.com/icodr8>
 * @license   LGPL
 * @copyright Daniel Kiesel 2011-2013
 */


/**
 * Table tl_secure_accessdata
 */
$GLOBALS['TL_DCA']['tl_secure_accessdata'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'    => 'Table',
		'enableVersioning' => true,
		'onload_callback'  => array
		(
			array('tl_secure_accessdata', 'checkAccess'),
			array('tl_secure_accessdata', 'setFilter')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index',
				'access_title' => 'index',
				'type' => 'index',
				'author' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'     => 2,
			'fields'    => array('type', 'access_title'),
			'flag'     => 1,
			'panelLayout'   => 'filter;search,sort,limit',
			'filter'    => ''
		),
		'label' => array
		(
			'fields'    => array('icon', 'access_title', 'type', 'author'),
			'showColumns'   => true,
			'label_callback'  => array('tl_secure_accessdata', 'labelCallback')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'    => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'    => 'act=select',
				'class'    => 'header_edit_all',
				'attributes'  => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'    => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['edit'],
				'href'    => 'act=edit',
				'icon'    => 'edit.gif'
			),
			'copy' => array
			(
				'label'    => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['copy'],
				'href'    => 'act=copy',
				'icon'    => 'copy.gif'
			),
			'delete' => array
			(
				'label'    => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['delete'],
				'href'    => 'act=delete',
				'icon'    => 'delete.gif',
				'attributes'  => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'    => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['show'],
				'href'    => 'act=show',
				'icon'    => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'    => array('type', 'protect'),
		'default'     => '{title_legend},access_title,type,author,li_crm_customer;
										{protect_legend},protect;
										{info_legend},info',
		'contao_login'    => '{title_legend},access_title,type,author,li_crm_customer;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'weblogin'     => '{title_legend},access_title,type,author,li_crm_customer;
										{weblogin_legend},weblogin_url,weblogin_name,weblogin_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'mail'      => '{title_legend},access_title,type,author,li_crm_customer;
										{mail_legend},mail_name,mail_email,mail_loginname,mail_pwd,mail_crypt;
										{mail_smtp_legend},mail_smtp_host,mail_smtp_port;
										{mail_imap_legend},mail_imap_host,mail_imap_port;
										{mail_pop_legend},mail_pop_host,mail_pop_port;
										{protect_legend},protect;
										{info_legend},info',
		'project'     => '{title_legend},access_title,type,author,li_crm_customer;
										{webadmin_legend},webadmin_url,webadmin_name,webadmin_pwd;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{local_legend},local_url,local_root;
										{local_db_legend},local_db_server,local_db_name,local_db_user,local_db_pwd,local_db_charset,local_db_port;
										{preview_legend},preview_url,preview_root;
										{preview_db_legend},preview_db_server,preview_db_name,preview_db_user,preview_db_pwd,preview_db_charset,preview_db_port;
										{preview_ftp_legend},preview_ftp_server,preview_ftp_user,preview_ftp_pwd,preview_ftp_protocol,preview_ftp_port;
										{preview_ssh_legend},preview_ssh_server,preview_ssh_port,preview_ssh_user,preview_ssh_pwd;
										{online_legend},online_url,online_root;
										{online_db_legend},online_db_server,online_db_name,online_db_user,online_db_pwd,online_db_charset,online_db_port;
										{online_ftp_legend},online_ftp_server,online_ftp_user,online_ftp_pwd,online_ftp_protocol,online_ftp_port;
										{online_ssh_legend},online_ssh_server,online_ssh_port,online_ssh_user,online_ssh_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'online_project'   => '{title_legend},access_title,type,author,li_crm_customer;
										{webadmin_legend},webadmin_url,webadmin_name,webadmin_pwd;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{online_legend},online_url,online_root;
										{online_db_legend},online_db_server,online_db_name,online_db_user,online_db_pwd,online_db_charset,online_db_port;
										{online_ftp_legend},online_ftp_server,online_ftp_user,online_ftp_pwd,online_ftp_protocol,online_ftp_port;
										{online_ssh_legend},online_ssh_server,online_ssh_port,online_ssh_user,online_ssh_pwd;
										{protect_legend},protect;
										{info_legend},info'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protect'     => 'protect_users,protect_groups'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'label'                   => array('ID'),
			'search'                  => true,
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'access_title' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['access_title'],
			'filter'    => true,
			'search'    => true,
			'sorting'    => true,
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('mandatory'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'type' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['type'],
			'default'    => 'contao_login',
			'filter'    => true,
			'search'    => true,
			'sorting'    => true,
			'exclude'    => true,
			'inputType'    => 'select',
			'options'    => $GLOBALS['TL_SADTY'],
			'reference'    => &$GLOBALS['TL_LANG']['SADTY'],
			'eval'     => array('helpwizard'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'                   => "varchar(32) NOT NULL default ''"
		),
		'author' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['author'],
			'default'    => $this->User->id,
			'filter'    => true,
			//'search'    => true,
			'sorting'    => true,
			'exclude'    => true,
			'inputType'    => 'select',
			'foreignKey'   => 'tl_user.name',
			'eval'     => array('doNotCopy'=>true, 'mandatory'=>true, 'includeBlankOption'=>false, 'tl_class'=>'w50'),
			'sql'                   => "int(10) unsigned NOT NULL default '0'"
		),
		'protect' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect'],
			'exclude'    => true,
			'inputType'    => 'checkbox',
			'eval'     => array('encrypt'=>true, 'submitOnChange'=>true),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'protect_users' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_users'],
			'exclude'    => true,
			'inputType'    => 'checkbox',
			'foreignKey'   => 'tl_user.name',
			'eval'     => array('encrypt'=>true, 'multiple'=>true, 'tl_class'=>'w50'),
			'sql'                   => "blob NULL"
		),
		'protect_groups' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_groups'],
			'exclude'    => true,
			'inputType'    => 'checkbox',
			'foreignKey'   => 'tl_user_group.name',
			'eval'     => array('encrypt'=>true, 'multiple'=>true, 'tl_class'=>'w50'),
			'sql'                   => "blob NULL"
		),
		'info' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['info'],
			'exclude'    => true,
			'inputType'    => 'textarea',
			'eval'     => array('encrypt'=>true),
			'sql'                   => "mediumtext NULL"
		),

		/* Weblogin */
		'weblogin_url' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_url'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'weblogin_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'weblogin_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Contao */
		'contao_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'contao_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'contao_install_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_install_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Local */
		'local_url' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'local_root' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'local_db_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'localhost',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'local_db_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'local_db_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'local_db_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'local_db_charset' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'UTF-8',
			'eval'     => array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'local_db_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '3306',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Preview */
		'preview_url' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'preview_root' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'preview_db_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'localhost',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_db_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_db_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_db_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_db_charset' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'UTF-8',
			'eval'     => array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_db_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '3306',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ftp_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ftp_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ftp_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ftp_protocol' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_protocol'],
			'exclude'    => true,
			'inputType'    => 'select',
			'eval'     => array('tl_class'=>'w50'),
			'options'    => $GLOBALS['TL_SAD_FTP_PROTOCOL'],
			'reference'    => &$GLOBALS['TL_LANG']['SAD_FTP_PROTOCOL'],
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ftp_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '21',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ssh_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ssh_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '22',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ssh_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'preview_ssh_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Online */
		'online_url' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'online_root' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'online_db_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'localhost',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_db_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_db_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_db_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_db_charset' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => 'UTF-8',
			'eval'     => array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_db_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '3306',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ftp_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ftp_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ftp_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ftp_protocol' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_protocol'],
			'exclude'    => true,
			'inputType'    => 'select',
			'options'    => $GLOBALS['TL_SAD_FTP_PROTOCOL'],
			'reference'    => &$GLOBALS['TL_LANG']['SAD_FTP_PROTOCOL'],
			'eval'     => array('encrypt'=>true, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ftp_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '21',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ssh_server' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_server'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ssh_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '22',
			'eval'     => array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ssh_user' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_user'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'online_ssh_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Webadmin */
		'webadmin_url' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_url'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'tl_class'=>'long'),
			'sql'                   => "mediumtext NULL"
		),
		'webadmin_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'webadmin_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),

		/* Mail */
		'mail_name' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_name'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_email' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_email'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'rgxp'=>'email', 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_loginname' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_loginname'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_pwd' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pwd'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_crypt' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_crypt'],
			'exclude'    => true,
			'inputType'    => 'select',
			'options'    => $GLOBALS['TL_SAD_MAIL_CRYPT'],
			'eval'     => array('encrypt'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_smtp_host' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_host'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_smtp_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '25',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_imap_host' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_host'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_imap_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '993',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_pop_host' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_host'],
			'exclude'    => true,
			'inputType'    => 'text',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'mail_pop_port' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_port'],
			'exclude'    => true,
			'inputType'    => 'text',
			'default'    => '995',
			'eval'     => array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50'),
			'sql'                   => "varchar(255) NOT NULL default ''"
		)
	)
);


/**
 * Settings for Liplex CRM
 */
if (isset($GLOBALS['BE_MOD']['li_crm']))
{
	$GLOBALS['TL_DCA']['tl_secure_accessdata']['fields']['li_crm_customer'] = array
	(
		'label'                 => &$GLOBALS['TL_LANG']['tl_secure_accessdata']['li_crm_customer'],
		'inputType'             => 'select',
		'filter'    => true,
		//'search'    => true,
		'sorting'    => true,
		'exclude'      => true,
		'options_callback'      => array('Customer', 'getCustomerOptions'),
		'eval'                  => array('mandatory'=>true, 'tl_class'=>'w50', 'chosen'=>true, 'includeBlankOption'=>true, 'submitOnChange'=>true),
		'sql'                   => "int(10) unsigned NOT NULL default '0'"
	);

	// Add li_crm_customer to label fields
	array_insert($GLOBALS['TL_DCA']['tl_secure_accessdata']['list']['label']['fields'], 4, array
		(
			'li_crm_customer'
		));
}


/**
 * tl_secure_accessdata class.
 *
 * @extends Backend
 */
class tl_secure_accessdata extends \Backend
{
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		// Import
		//$this->import('Database');
		//$this->import('Encryption');
		//$this->import('BackendUser', 'User');
	}


	/**
	 * checkAccess function.
	 *
	 * @access public
	 * @return void
	 */
	public function checkAccess()
	{
		$this->import('Input');

		// If no access
		if (\Input::get('id') != '' && \Input::get('id') != NULL && in_array(\Input::get('id'), $this->filterFields(true)))
		{
			$this->log('No access on secure access data ID "'.\Input::get('id').'"', 'tl_secure_accessdata __construct', TL_ERROR);
			$this->redirect('main.php?act=error');
		}
	}


	/**
	 * setFilter function.
	 *
	 * @access public
	 * @return void
	 */
	public function setFilter()
	{
		// Get filter
		$arrFilter = $this->filterFields();

		// Set filter
		$GLOBALS['TL_DCA']['tl_secure_accessdata']['list']['sorting']['filter'] = $arrFilter;
	}


	/**
	 * filterFields function.
	 *
	 * @access public
	 * @param bool $onlyIDs (default: false)
	 * @return array
	 */
	public function filterFields($onlyIDs = false)
	{
		$arrClosedEntries = array();

		// Get all secure accessdata results
		$objSecureAccessdata = \SecureAccessdataModel::findAll();

		while ($objSecureAccessdata->next())
		{
			$id = $objSecureAccessdata->id;
			$author = $objSecureAccessdata->author;
			$protect = \Encryption::decrypt($objSecureAccessdata->protect);
			$protect_users = \Encryption::decrypt(deserialize($objSecureAccessdata->protect_users));
			$protect_groups = \Encryption::decrypt(deserialize($objSecureAccessdata->protect_groups));

			// If protected
			if ($protect == 1)
			{
				// If not admin
				if ($this->User->admin != 1)
				{
					// If not author
					if ($this->User->id != $author)
					{
						// If not in user array
						if (!(is_array($protect_users) && count($protected_users) < 1 && in_array($this->User->id, $protect_users)))
						{
							// If not in group array
							if (!(is_array($this->User->groups) && is_array($protect_groups) && count(array_intersect($this->User->groups, $protect_groups)) > 0))
							{
								if ($onlyIDs == true)
								{
									$arrClosedEntries[] = $id;
								}
								else
								{
									$arrClosedEntries[] = array('id!=?', $id);
								}
							}
						}
					}
				}
			}
		}

		return $arrClosedEntries;
	}


	/**
	 * labelCallback
	 * @param array
	 * @param string
	 * @param DataContainer
	 * @param array
	 * @return string
	 */
	public function labelCallback($row, $label, DataContainer $dc, $args)
	{
		// Set image
		$image = 'protect';

		if (\Encryption::decrypt($row['protect']) == '1')
		{
			$image .= '_';
		}

		$args[0] = sprintf('<div class="list_icon_new" style="background-image:url(\'%ssystem/modules/secure_accessdata/assets/images/%s.gif\')">&nbsp;</div>', TL_SCRIPT_URL, $image);

		// Set User
		if (is_numeric($args[3]))
		{
			$objUser = \UserModel::findByPk($args[3]);

			if ($objUser !== null)
			{
				$args[3] = $objUser->name;
			}
		}

		// Only Liplex CRM
		if (isset($GLOBALS['BE_MOD']['li_crm']))
		{
			// Set customer
			if (is_numeric($args[4]))
			{
				$objMember = \MemberModel::findByPk($args[4]);

				if ($objMember !== null)
				{
					$args[4] = $objMember->customerNumber . ' ' . $objMember->customerName;
				}
			}
		}

		return $args;
	}
}

?>