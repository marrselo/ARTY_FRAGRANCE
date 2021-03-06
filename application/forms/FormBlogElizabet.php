<?php

class Application_Form_FormBlogElizabet extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')->setAttrib('id', 'frmDevenir');
        $e = new Zend_Form_Element_Text('linkBlogFotos');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Text('nombreLinkBlogFotos');
        $e->setRequired(true);
        $this->addElement($e);
        $e = new Zend_Form_Element_Textarea('descripcionBlogFotos');
        $v = new Zend_Validate_StringLength(array('min' => 10));
        $e->addValidator($v);
        $e->setAttrib('name', 'descripcionBlogFotos');
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
