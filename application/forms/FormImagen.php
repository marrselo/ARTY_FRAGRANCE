<?php 
class Application_Form_FormImagen extends Zend_Form
{
    public function __construct() 
    {
        
        $this->setMethod('Post');
        $this->addElement(new Zend_Form_Element_File('fotoMenu[]'));
        
        
        $frontController = Zend_Controller_Front::getInstance();
        $file = $frontController->getParam('bootstrap')->getOption('file');
        $this->getElement('fotoMenu')
                ->setDestination($file['ruta'])
                ->addValidator('Count', false, 1)     // ensure only 1 file
                //->addValidator('Size', false, 102400) // limit to 100K
                ->addValidator('Extension', true, 'jpg,png,gif')// only JPEG, PNG, and GIFs
                ->setRequired(true);
       $this->getElement('fotoMenu');     
        $this->getElement('fotoMenu')->removeDecorator('label');
        $this->getElement('fotoMenu')->removeDecorator('HtmlTag');
        $this->getElement('fotoMenu')->removeDecorator('Errors'); 
    }
  
}
