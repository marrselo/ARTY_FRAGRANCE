<?php 
class ZExtraLib_Controller_Plugin_Langselector    
    extends Zend_Controller_Plugin_Abstract

{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang','');
        $modelIdioma = new Application_Model_Idioma();
        $dataIdiomaDefault = $modelIdioma->getIdiomaDefault();
        $arrayIdiomas = $modelIdioma->getIdiomas();
        $arrayAllIdiomas = $modelIdioma->getAllIdiomas();
        if ($lang == '') {
        $lang = $dataIdiomaDefault['PrefIdioma'];
        } else{
            if(!array_key_exists($lang, $arrayIdiomas)){
                $lang = $dataIdiomaDefault['PrefIdioma'];
            }
        }
        foreach($arrayAllIdiomas as $index){
            if($index['PrefIdioma']==$lang ){
                $idiomaAllSelect = $index;
                break;
            }
        }
        $request->setParam('idms', $arrayIdiomas);
        $request->setParam('idmDefault', $dataIdiomaDefault);
        $request->setParam('lang', $lang);
        $request->setParam('idiomaAllSelect', $idiomaAllSelect);
        
    }
}
?>
