<?php

class Admin_IndexController
        extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
       
    }
    public function indexAction()
    {
       
    }
    public function accueilAction()
    {
        
    }
    public function collectionsAction()
    {
      $idiomas = new Application_Model_Idioma();
      $this->view->idioma = $idiomas->getAllIdiomas();
    }

}

//class Admin_IndexController