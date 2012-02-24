<?php
class ZExtraLib_Plugin_Langselector
    extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        //parent::preDispatch($request);
        $lang = $request->getParam('lang','');
        die("Languaje ".$lang);
        //exit;
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
