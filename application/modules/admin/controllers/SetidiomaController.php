<?php

class Admin_SetidiomaController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        $this->sessionAdmin->idiomaDetaful = $this->_params['lang'];
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }
    
}
