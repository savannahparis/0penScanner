<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
    	
    }

    public function loginAction()
    {
    	$this->_helper->layout()->setLayout('login');    	
    	$loginForm = new Core_Form_Login();
    	
    	if($this->getRequest()->isPost()) {
    		if($loginForm->isValid($_POST)) {
    			// instancier le service User
    			$userService = new Core_Service_User();
    			
    			// authentification
    			$login = $loginForm->getValue('username');
    			$password = $loginForm->getValue('password');
    			$result = $userService->authenticate($login, $password);
    			
    			// renvoi de la réponse
    			if( !$result)
    			{
    				// réaffichage du formulaire // message pour le test
    				$this->view->message ="login_failure";
    				$this->view->loginForm = $loginForm;
    			}else {
    				// redirection vers la page index
    				$this->_redirect($this->view->url(array(), 'index'));
    			}
    			
    			
    		} else {
    			$this->view->loginForm = $loginForm;
    		}
    	} else {
    		$this->view->loginForm = $loginForm;
    	}  
    }
    
    public function logoutAction()
    {
    	$userService = new Core_Service_User();
    	$userService->_redirect($this->view->url(array(), 'authentification'));
    }


}

