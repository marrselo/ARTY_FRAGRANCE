<?php

class Application_Form_FormCredit extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');                
        
        $e = new Zend_Form_Element_Text('idCredit');
        $e->setAttrib('disabled', 'disabled');
        $this->addElement($e);
        
        $e = new Zend_Form_Element_Hidden('idIdioma');        
        $this->addElement($e);

        $e = new Zend_Form_Element_Textarea('contenidoCredit');
        $v = new Zend_Validate_StringLength(array('min' => 10));
        $e->addValidator($v);
        $e->setAttrib('name', 'contenidoCredit');
        $this->addElement($e);
  
        $e = new Zend_Form_Element_Submit('submit');
        $e->setLabel('Grabar');
        $this->addElement($e);
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
            $element->removeDecorator('Errors');    
        }        
    }


}
