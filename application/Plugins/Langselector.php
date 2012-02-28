<?php
class Application_Plugin_Langselector
    extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang','');
        $modelIdioma = new Application_Model_Idioma();
        $dataIdiomaDefault = $modelIdioma->getIdiomaDefault();
        $arrayIdiomas = $modelIdioma->getIdiomas();
        if ($lang == '') {
        $lang = $dataIdiomaDefault['PrefIdioma'];
        } else{
            if(!array_key_exists($lang, $arrayIdiomas)){
                $lang = $dataIdiomaDefault['PrefIdioma'];
            }
        }
        $request->setParam('idms', $arrayIdiomas);
        $request->setParam('idmDefault', $dataIdiomaDefault);
        $request->setParam('lang', $lang);
        //print_r($request->getParams());
    }
}
?>
