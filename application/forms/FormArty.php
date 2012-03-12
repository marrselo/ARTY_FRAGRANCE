<?php

class Application_Form_FormArty extends ZExtraLib_Form {
    

    public function init(){
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');

      
        $this->addElement(new Zend_Form_Element_Text('titulo',array('required'=>true)));
        $this->getElement('titulo'); 
        $this->addElement(new Zend_Form_Element_Hidden('idMenu'));
        $this->getElement('idMenu')->setValue('2');
        
        $this->addElement(new Zend_Form_Element_Submit('submit'));
        $this->getElement('submit')->setLabel('Grabar');
        
        
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
            $element->removeDecorator('Errors');    
        }        
    }

}
