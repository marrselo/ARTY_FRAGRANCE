<?php

class Application_Form_FormSite extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('nombreSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('urlSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('urlMostrar');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Select('idTipoSite');
        $e->setRequired(true);
        $e->addMultiOptions(array('1'=>'Site Internet','2'=>'Blog'));
        $this->addElement($e);
        $e = new Zend_Form_Element_Select('estado');
        $e->setRequired(true);
        $e->addMultiOptions(array('1'=>'Activo','2'=>'Inactivo'));
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
