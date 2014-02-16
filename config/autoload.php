<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2014 Leo Feyer
 * 
 * @package secure-accessdata
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
	'SecureAccessdata\SecureAccessdataModel' => 'system/modules/secure-accessdata/models/SecureAccessdataModel.php',
));
