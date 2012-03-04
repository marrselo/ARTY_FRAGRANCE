<?php

class Application_Form_FormArt extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');
        
        $e = new Zend_Form_Element_Text('tituloFoto');
        $e->setRequired(true);
        $this->addElement($e);
        
        $e = new Zend_Form_Element_File('fotoPrincipal');
        $e->addValidator('Count', false, 1);
        $this->addElement($e);
        
        $e = new Zend_Form_Element_Textarea('descripcionFoto');
        $v = new Zend_Validate_StringLength(array('min' => 10));
        $e->addValidator($v);
        $e->setAttrib('name', 'parrafo');
        $this->addElement($e);

        
        
//        $e = new Zend_Form_Element_Hidden('idArticulo');
//        $this->addElement($e);

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
