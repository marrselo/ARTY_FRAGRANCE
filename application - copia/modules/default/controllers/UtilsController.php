<?php

class Default_UtilsController extends ZExtraLib_Controller_Action {

    //put your code here
    public function init() {
        parent::init();
    }
    public function indexAction(){
        
    }
    public function cleanCacheAction(){
        
        $this->cleanCache();
    }

}

?>
