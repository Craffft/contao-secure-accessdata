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
 * SecureAccessdata class.
 * 
 * @extends Backend
 */
class SecureAccessdata extends Backend
{
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		// Import
		$this->import('Database');
		$this->import('Encryption');
		$this->import('BackendUser', 'User');
		
		// Check access
		$this->checkAccess();
	}
	
	
	/**
	 * checkAccess function.
	 * 
	 * @access public
	 * @return void
	 */
	function checkAccess()
	{
		$this->import('Input');
		
		// If no access
		if($this->Input->get('id') != '' && $this->Input->get('id') != NULL && in_array($this->Input->get('id'), $this->filterFields(true)))
		{
			$this->log('No access on secure access data ID "'.$this->Input->get('id').'"', 'tl_secure_accessdata __construct', TL_ERROR);
			$this->redirect('main.php?act=error');
		}
	}
		
	
	/**
	 * filterFields function.
	 * 
	 * @access public
	 * @param DataContainer $dc
	 * @return void
	 */
	public function filterFields($onlyIDs = false)
	{
		$arrClosedEntries = array();
		
		// Get all secure accessdata results
		$objSecureAccessdata = $this->Database->prepare("SELECT id, author, protect, protect_users, protect_groups FROM tl_secure_accessdata")
											  ->execute();
		
		while($objSecureAccessdata->fetchAssoc())
		{
			$id = $objSecureAccessdata->id;
			$author = $objSecureAccessdata->author;
			$protect = $this->Encryption->decrypt($objSecureAccessdata->protect);
			$protect_users = $this->Encryption->decrypt(deserialize($objSecureAccessdata->protect_users));
			$protect_groups = $this->Encryption->decrypt(deserialize($objSecureAccessdata->protect_groups));
			
			// If protected
			if($protect == 1)
			{
				// If not admin
				if($this->User->admin != 1)
				{
					// If not author
					if($this->User->id != $author)
					{
						// If not in user array
						if(!(is_array($protect_users) && count($protected_users) < 1 && in_array($this->User->id, $protect_users)))
						{
							// If not in group array
							if(!(is_array($this->User->groups) && is_array($protect_groups) && count(array_intersect($this->User->groups, $protect_groups)) > 0))
							{
								if($onlyIDs == true)
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
}

?>