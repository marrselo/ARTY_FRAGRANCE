<?php
class Application_Plugin_Langselector
    extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang','');
        $modelIdioma = new Application_Model_Idioma();
        $dataIdiomaDefault = $modelIdioma->getIdiomaDefault();
        if ($lang == '') {
        $lang = $dataIdiomaDefault['PrefIdioma'];
        } else{
            $arrayIdiomas = $modelIdioma->getIdiomas();
            if(!array_key_exists($lang, $arrayIdiomas)){
                $lang = $dataIdiomaDefault['PrefIdioma'];
            }
        }
        $request->setParam('lang', $lang);
    }
}
?>
