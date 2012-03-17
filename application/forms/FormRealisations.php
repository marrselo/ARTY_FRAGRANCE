<?php

class Application_Form_FormRealisations extends Zend_Form {

    public function init() {

        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $e = new Zend_Form_Element_Text('title');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('link');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Textarea('contenido');
        $e->setRequired(true);
        $this->addElement($e);
        $element = new Zend_Form_Element_File('imagen');
        $element->setLabel('Cargar Imagen:')
                ->setRequired()
                ->setDestination($confUpload["rutaRealisations"]);
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 409600);
        $element->addValidator('Extension', false, 'jpg,png,gif');
        $this->addElement($element);
        $e = new Zend_Form_Element_Submit('submit');
        $e->setLabel('Grabar');
        $this->addElement($e);
        foreach ($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
        }
    }

    function insertElment($nombreElemento, $value) {
        $this->getElement($nombreElemento)->setValue($value);
    }

}
