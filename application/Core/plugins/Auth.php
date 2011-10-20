<?php
class Core_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
	// demarrage de la boucle de dispaching
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
	{
		// vérifier si il y a une identité
		if( !Zend_Auth::getInstance()->hasIdentity())   // revoi un boolean
		{
			// modifier la requete 
			$request->setModuleName('Core')
					->setControllerName('auth')
					->setActionName('login')
					->setDispatched(true);
											
		} 
	}
}