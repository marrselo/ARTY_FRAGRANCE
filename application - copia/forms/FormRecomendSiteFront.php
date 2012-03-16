<?php

class Application_Form_FormRecomendSiteFront extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('yourname');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('youremail');
        $e->setRequired(true);
        $validators = array(
          new Zend_Validate_EmailAddress()
        );
        $e->setValidators($validators);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('recipientname');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('recipientemail');
        $e->setRequired(true);
        $validators = array(
          new Zend_Validate_EmailAddress()
        );
        $e->setValidators($validators);
        $this->addElement($e);
        $e = new Zend_Form_Element_Submit('submit');
        $e->setLabel('Enviar');
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
