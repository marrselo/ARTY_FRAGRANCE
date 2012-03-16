<?php 
class Application_Form_FormPtoVenta extends Zend_Form
{
    public function __construct() 
    {
        
        $this->setMethod('Post');
        $this->addElement(new Zend_Form_Element_Text('titulo',array('required'=>true)));
        $this->addElement(new Zend_Form_Element_Text('ordenArticulo',array('required'=>true)));
        $this->addElement(new Zend_Form_Element_Textarea('parrafo',array('required'=>true)));
        $this->addElement(new Zend_Form_Element_Image('fotoPrincipal'));
        $this->addElement(new Zend_Form_Element_Hidden('idIdioma'));
        $this->addElement(new Zend_Form_Element_Hidden('idArticulo'));
        $this->addElement(new Zend_Form_Element_Hidden('idEstadoArticulo'));            
        $this->addElement(new Zend_Form_Element_Checkbox('flagPublicar',array("checked" => "checked")));
        $this->addElement(new Zend_Form_Element_Text('tituloDetalle[]'));
        $this->addElement(new Zend_Form_Element_Text('parrafoDetalle[]'));
        $this->addElement(new Zend_Form_Element_File('fotoDetalle[]'));
            
        $this->getElement('titulo');
        $this->getElement('ordenArticulo');
        $this->getElement('parrafo');
        $this->getElement('fotoPrincipal');
        $this->getElement('idIdioma');
        $this->getElement('idEstadoArticulo');   
        $this->getElement('flagPublicar')->setValue('1');  
        
        
        $this->addElement(new Zend_Form_Element_File('fotoMenu[]'));

        $frontController = Zend_Controller_Front::getInstance();
        $file = $frontController->getParam('bootstrap')->getOption('file');
        $this->getElement('fotoMenu')
                ->setDestination($file['ruta'])
                ->addValidator('Count', false, 1)     // ensure only 1 file
                //->addValidator('Size', false, 102400) // limit to 100K
                ->addValidator('Extension', true, 'jpg,png,gif')// only JPEG, PNG, and GIFs
                ->setRequired(true);

    }
    
}
