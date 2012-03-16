<?php

class Application_Form_FormProduct extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmDevenir');
        
        $e = new Zend_Form_Element_Text('titulo');
        $e->setRequired(true);
        $this->addElement($e);
        
        $e = new Zend_Form_Element_Text('tituloDetalle');
        //$e->setRequired(true);
        $this->addElement($e);        
                
        $e = new Zend_Form_Element_Textarea('parrafoDetalle');
        $v = new Zend_Validate_StringLength(array('min' => 10));
        $e->addValidator($v);
        $e->setAttrib('name', 'parrafoDetalle');
        $this->addElement($e);

        $e = new Zend_Form_Element_Hidden('idDetalleArticulo');
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
