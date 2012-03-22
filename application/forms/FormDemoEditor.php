<?php

class Application_Form_FormHistoria extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('linkHistory');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Textarea('contenidoHistory');
        $v = new Zend_Validate_StringLength(array('min' => 10));
        $e->addValidator($v);
        $e->setAttrib('name', 'contenidoHistory');
        $this->addElement($e);        
        $e = new Zend_Form_Element_Submit('submit');
        $e->setLabel('Grabar');
        $this->addElement($e);
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
            //$element->removeDecorator('Errors');    
        }        
        
    }
    function insertElment($nombreElemento,$value) {
            $this->getElement($nombreElemento)->setValue($value);
        }


}
