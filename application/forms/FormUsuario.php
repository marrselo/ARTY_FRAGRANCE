<?php

class Application_Form_FormUsuario extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('nombre');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('apellidopaterno');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('apellidomaterno');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('login');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Password('password');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('telefono');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Hidden('FlagSuperUsuario');
        $e->setValue(1);        
        $this->addElement($e);        
        $e = new Zend_Form_Element_Submit('submit');
        $e->setLabel('Grabar');
        $this->addElement($e);
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
        }        
        
    }
    function insertElment($nombreElemento,$value) {
            $this->getElement($nombreElemento)->setValue($value);
        }
    function insertMultiOption($nombreElemento,$value){
        $this->getElement($nombreElemento)->addMultiOptions($value);
    }
    function insertId($nombreId,$valorId){
        $e = new Zend_Form_Element_Hidden($nombreId);
        $e->setRequired(true);
        $e->setValue($valorId);
        $e->removeDecorator('DtDdWrapper');
        $e->removeDecorator('Label');
        $e->removeDecorator('HtmlTag');
        $this->addElement($e);
    }
    
}
