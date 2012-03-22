<?php

class Admin_AuthController extends ZExtraLib_Controller_Action {

    private $_sesion;
    public function init() {
        parent::init();
        
    }

    public function indexAction() {
        $this->_redirect('/admin');
        
    }
    public function logoutAction() {
        $this->_redirect('/admin');
        
    }

        

}
