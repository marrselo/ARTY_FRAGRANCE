<?php
class Default_PruebaController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        if($this->_request->isPost()){
        $params = $this->_getAllParams();
        var_dump($params);exit;
        }
        
    }
}

