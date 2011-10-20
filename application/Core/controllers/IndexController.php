<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    	
		$cache = Zend_Controller_Front::getInstance()->getParam('bootstrap')
													 ->getResource('cachemanager')
													 ->getCache('content');
		$cacheId = 'contenu1';
		if(!$content = $cache->load($cacheId)){
				//$content = array('1','2','3');
				//$cache->save($content);
		}		
		print_r($content);						 
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$session = new Zend_Session_Namespace('test');
    	$session->test = 'test';
        // action body
        
    	$locale = new Zend_Locale();
    	//print_r($locale->getDefault());
    }


}

