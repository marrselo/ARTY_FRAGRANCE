<?php

class Application_Form_FormArt extends Zend_Form {
    
    public function init(){
        
        $this->setMethod('post')
                ->setAttrib('id', 'frmCollection');
        
        $e = new Zend_Form_Element_Text('titulo');
        $e->setRequired(true);
        $this->addElement($e);

        $e = new Zend_Form_Element_File('fotoPrincipal');
        $e->addValidator('Count', false, 1);                
        //$e->addValidator('Size', false, 512000);            // limit to 10 meg
        //$e->addValidator('Extension', false, 'jpg,jpeg,gif');
        //$e->setDestination(APPLICATION_PATH. '/../public/guiarestaurantes/'.RESTAURANTES_FICHAS_IMG_FRONT.'or');
        //$originalFilename = @pathinfo($e->getFileName());
        /*$e->addFilter(new Zend_Filter_File_Rename(
                      array('target' => $this->_foo.'.'.$originalFilename['extension']))
                   );*/
        $this->addElement($e);        
                
        $e = new Zend_Form_Element_Textarea('parrafo');
        $v = new Zend_Validate_StringLength(array('min' => 500));
        $e->addValidator($v);
        $e->setAttrib('name', 'parrafo');
        $this->addElement($e);        

        //$e = new Zend_Form_Element_Hidden('hidden');
        //$this->addElement($e);
//        
//        $e = new Zend_Form_Element_Submit('submit1');
//        $e->setLabel('Grabar');
//        $this->addElement($e);

        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper');
            $element->removeDecorator('Label');
            $element->removeDecorator('HtmlTag');
            $element->removeDecorator('Errors');    
        }        
    }


}
