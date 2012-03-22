<?php

class Application_Form_FormCat extends Zend_Form {    
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');
                //->setAttrib('enctype', 'multipart/form-data');
        
        $e = new Zend_Form_Element_Text('nombre');
        $e->setRequired(true);
        $this->addElement($e);

        $e = new Zend_Form_Element_Text('idCat');
        $this->addElement($e);
//        
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
