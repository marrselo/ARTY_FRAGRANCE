<?php

class Application_Form_FormOuvrages extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('anioObra');
        $e->setRequired(true);
        $validators = array(
          new Zend_Validate_Int()
        );
        $e->setValidators($validators);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('link');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Textarea('tituloObra');
        $e->setRequired(true);
        $this->addElement($e);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $element = new Zend_Form_Element_File('imgObra');
        $element->setLabel('Cargar Imagen:')
                ->setRequired()
                ->setDestination($confUpload["rutaOuvrages"]);
        
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 409600);        
        $element->addValidator('Extension', false, 'jpg,png,gif');
        $this->addElement($element);
        $e = new Zend_Form_Element_Textarea('parrafoObra');
        $v = new Zend_Validate_StringLength(array('min' => 10));
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
