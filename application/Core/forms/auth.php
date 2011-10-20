<?php
class Application_Core_Form_Auth extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post')->setName('authenfication');
		
		$authLogin = new Zend_Form_Element_Text('auth_login');
		$authLogin->addFilter(new Zend_Filter_StripTags());
		
		$authPass = new Zend_Form_Element_Password('auth_password');
		$authPass->setRequired(true)
				 ->addValidator(new Zend_Validate_StringLength(array('min' => '6', 'max' => 6 )))
				 ->addFilter(new Zend_Filter_StripTags());		
		
		$authSubmit = new Zend_Form_Element_Submit('auth_submit');

		
		$this->addElement($authLogin);
		$this->addElement($authPass);
		$this->addElement($authSubmit);
		
	}
}