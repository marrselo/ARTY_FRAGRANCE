<?php
class Application_Form_FormBase_FormArticulo extends ZExtraLib_Form
{
    public function init() {
        parent::init();
            $this->setMethod('Post');
            $this->addElement(new Zend_Form_Element_Text('titulo',array('required'=>true)));
            $this->addElement(new Zend_Form_Element_Text('ordenArticulo',array('required'=>true)));
            $this->addElement(new Zend_Form_Element_Textarea('parrafo',array('required'=>true)));
            $this->addElement(new Zend_Form_Element_file('fotoPrincipal'));
            $this->addElement(new Zend_Form_Element_Hidden('idIdioma'));
            $this->addElement(new Zend_Form_Element_Hidden('idArticulo'));
            $this->addElement(new Zend_Form_Element_Hidden('idEstadoArticulo'));            
            $this->addElement(new Zend_Form_Element_Checkbox('flagPublicar'),array("checked" => "checked"));
            $this->addElement(new Zend_Form_Element_Text('tituloDetalle[]'));
            $this->addElement(new Zend_Form_Element_Text('parrafoDetalle[]'));
            $this->addElement(new Zend_Form_Element_File('fotoDetalle[]'));
         
    }
}
   