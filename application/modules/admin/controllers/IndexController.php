<?php

class Admin_IndexController
        extends ZExtraLib_Controller_Action
{
    function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
       
    }
    function indexAction()
    {
       
    }
    function accueilAction()
    {
        
    }

}

//class Admin_IndexController