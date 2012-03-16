<?php

class Application_Form_FormRecomendSite extends Zend_Form {    
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('tituloPaginaModRecomendarSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('labelNombreModRecomendarSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('labelNombreDestinatarioModRecomendarSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('labelEmailModRecomendarSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('labelEmailDestinatarioModRecomendarSite');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Textarea('labelTextoModRecomendarSite');
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
    function insertMultiOption($nombreElemento,$value){
        $this->getElement($nombreElemento)->addMultiOptions($value);
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
