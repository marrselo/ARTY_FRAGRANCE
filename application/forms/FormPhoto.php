<?php

class Application_Form_FormPhoto extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');
                //->setAttrib('enctype', 'multipart/form-data');
        
        $e = new Zend_Form_Element_Text('tituloFoto');
        $e->setRequired(true);
        $this->addElement($e);

        $frontController = Zend_Controller_Front::getInstance();
        $file = $frontController->getParam('bootstrap')->getOption('file');
        
        $element = new Zend_Form_Element_File('nombreFoto');
        $element->setLabel('Cargar Imagen:')
                ->setDestination($file["ruta1"]);
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 409600);        
        $element->addValidator('Extension', false, 'jpg,png,gif');
        $this->addElement($element);
                
        $e = new Zend_Form_Element_Textarea('descripcionFoto');
        $v = new Zend_Validate_StringLength(array('min' => 2));
        $e->addValidator($v);
        $e->setAttrib('name', 'descripcionFoto');
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
