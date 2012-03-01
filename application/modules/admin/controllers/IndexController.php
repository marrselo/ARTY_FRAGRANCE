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
       $form        = new Application_Form_FormAccueil();
       $formImagen  = new Application_Form_FormImagen();
       $this->view->formImagen = $formImagen;
       $form->setDecorators(array(array('ViewScript', array('viewScript' => 'form/form-accueil.phtml'))));

        foreach ($form as $elem){            
            $elem->removeDecorator('label')->removeDecorator('HtmlTag');
        }   
        $this->view->formAccueil = $form;
        
    }

}

//class Admin_IndexController