<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Secure_accessdata
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'SecureAccessdata',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'SecureAccessdata\SecureAccessdataModel' => 'system/modules/secure_accessdata/models/SecureAccessdataModel.php',
));
