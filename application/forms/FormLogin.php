<?php
class Application_Form_FormLogin extends Zend_Form
{
    public function init() {
            $this->setMethod('Post');
            $this->addElement(new Zend_Form_Element_Text('login',array('required'=> true,'label'=>'Correo')));
            $this->getElement('login')->setAttrib('class','login');
            $this->addElement(new Zend_Form_Element_Password('password',array('required'=> true,'label'=>'Password')));
            $this->getElement('password')->setAttrib('class','login');
            $this->addElement(new Zend_Form_Element_Submit('Enviar'));
            return $this;
    }
}
    
