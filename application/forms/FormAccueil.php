<?php 
class Application_Form_Accueil extends Application_Form_FormBase_FormArticulo
{
    public function init()
    {
        parent::init();
        $this->getElement('titulo');
        $this->getElement('ordenArticulo');
        $this->getElement('parrafo');
        $this->getElement('fotoPrincipal');
        $this->getElement('idIdioma');
        $this->getElement('idEstadoArticulo')->setSeparator('');        
        $this->getElement('flagPublicar');     
        $this->getElement('flagPublicar')->setValue('1');        
    }
  
}
