<?php

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