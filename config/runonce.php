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

class SecureAccessdataRunonce extends Controller
{
	/**
	 * Initialize the object
	 */
	public function __construct()
	{
		parent::__construct();

		// Fix potential Exception on line 0 because of __destruct method (see http://dev.contao.org/issues/2236)
		$this->import((TL_MODE=='BE' ? 'BackendUser' : 'FrontendUser'), 'User');
		$this->import('Database');
		$this->import('Encryption');
	}
	
	
	/**
	 * Execute all runonce files in module config directories
	 */
	public function run()
	{
		$this->upgrade_to_1_1_0();
		
		$this->import('Files');
		$arrModules = scan(TL_ROOT . '/system/modules/');

		foreach ($arrModules as $strModule)
		{
			if ((@include(TL_ROOT . '/system/modules/' . $strModule . '/config/runonce.php')) !== false)
			{
				$this->Files->delete('system/modules/' . $strModule . '/config/runonce.php');
			}
		}
	}
	
	
	/**
	 * upgrade_to_1_1_0 function.
	 * 
	 * @access private
	 * @return void
	 */
	private function upgrade_to_1_1_0()
	{
		// Read fields decrypt them an save them
		$objData = $this->Database->prepare("SELECT id, access_title, author FROM tl_secure_accessdata")
								  ->execute();
		
		while($objData->next())
		{
			$arrSet = array();
			
			// Set vars for update
			$arrSet['access_title'] = ($this->Encryption->decrypt($objData->access_title) == '') ? $objData->access_title : $this->Encryption->decrypt($objData->access_title);
			$arrSet['author'] = ($this->Encryption->decrypt($objData->author) == '') ? $objData->author : $this->Encryption->decrypt($objData->author);
			
			// Do update
			$this->Database->prepare("UPDATE tl_secure_accessdata %s WHERE id=?")
						   ->set($arrSet)
						   ->execute($objData->id);
		}
	}
}


/**
 * Instantiate controller
 */
$objSecureAccessdataRunonce = new SecureAccessdataRunonce();
$objSecureAccessdataRunonce->run();

?>