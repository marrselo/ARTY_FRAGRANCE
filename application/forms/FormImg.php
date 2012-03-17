<?php

class Application_Form_FormImg extends Zend_Form {    
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');
                //->setAttrib('enctype', 'multipart/form-data');
        
        $frontController = Zend_Controller_Front::getInstance();
        $file = $frontController->getParam('bootstrap')->getOption('file');        
        $element = new Zend_Form_Element_File('imagenPuntoVenta');        
        $element->setLabel('Cargar Imagen:');
                //->setDestination($file["rutas"]);
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 409600);        
        $element->addValidator('Extension', false, 'jpg,png,gif');
        $this->addElement($element);
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
            $element->removeDecorator('Errors');    
        }        
    }


}
