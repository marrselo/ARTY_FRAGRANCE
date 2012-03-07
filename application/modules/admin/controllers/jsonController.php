<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_SitesController extends ZExtraLib_Controller_Action {
     public function jsonAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $select = $this->_helper->DBAdapter()->select();	    			
        $case = $this->getRequest()->getParam('case',0);
        
        
     }
}