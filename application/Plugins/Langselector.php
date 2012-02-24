<?php
class Application_Plugin_Langselector
    extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang','');
        if ($lang == '') {
        $modelIdioma = new Application_Model_Idioma();
        $dataIdiomaDefault = $modelIdioma->getIdiomaDefault();
        $lang = $dataIdiomaDefault['PrefIdioma'];
        }
        $request->setParam('lang', $lang);
        var_dump($request->getParams());
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
