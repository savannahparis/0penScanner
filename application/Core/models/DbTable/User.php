<?php
class Core_Model_DbTable_User extends Zend_Db_Table_Abstract
{
	// surcharge du constructeur
	public function __construct()
	{
		// définition de la table
		$options = array(
			// pas obligatoire quand defautadapteur définit
			'db' => Zend_Controller_Front::getInstance()->getParam('bootstrap')
														->getResource('multiDb')
														->getDb('main'),
														
		    'name' => 'user',
			'primary' => 'user_id'
			
		);
		
		// passer au parent
		parent::__construct($options);
	}
	
	
	
}