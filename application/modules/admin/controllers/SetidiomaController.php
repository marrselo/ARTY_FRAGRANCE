<?php

class Admin_SetidiomaController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        $this->sessionAdmin->idiomaDetaful = $this->_params['idiomaAllSelect'];
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }
    
}
