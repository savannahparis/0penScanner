<?php
final class Core_Service_User
{
	
	public function create(Core_Model_User $user)
	{
		
	}
	
	public function update(Core_Model_User $user)
	{
		
	}
	
	public function read($userId)
	{
		
	}
	
	public function delete(Core_Model_User $user)
	{
		
	}
	
	public function authenticate($login, $password)
	{
		// pour tester
		//return false;
		
		// méthode d'authentification // avec zend_auth
		$authAdapter = new Zend_Auth_Adapter_DbTable();
		$authAdapter->setTableName('user')
					->setIdentityColumn('user_login')
					->setCredentialColumn('user_password')
					->setIdentity($login)
					->setCredential($password);  // indiquer ici le md5 sur $password
					
	    $auth = Zend_Auth::getInstance();
	    $authResult = $auth->authenticate($authAdapter);
	    
	    // tester la persistance
	    if( $authResult->isValid())
	    {
	    	// récupérer les lignes concernés // récupère tout sauf password
	    	$authData = $authAdapter->getResultRowObject(null, 'user_password');
	    	
	    	// moteur de percistance qui est stocker en mémoire
	    	$auth->getStorage()->write($authData);
	    	return true;
	    }else{
	    	return false;
	    }   
	    
		
	}
	
	public function logout()
	{
		return Zend_Auth::getInstance()->clearIdentity();
	}
}