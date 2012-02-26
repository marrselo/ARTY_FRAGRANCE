<?php

class Default_ArtyFraganceController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        $this->view->classBody = 'lyt_news_precaution';
        
    }
}

