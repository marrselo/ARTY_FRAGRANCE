<?php

class Application_Form_FormCms extends Zend_Form {
    
    public function init(){
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Textarea('contenido');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('nombreMenu');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Hidden('modulo');
        $e->setRequired(true);
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
    
}
