<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Laptop
 */
class ZExtraLib_Model {
    protected $_cache;
    
    function __construct() {
        $this->_cache = Zend_Registry::get('cache');
    }
    function clearCache($nameCache){
        $this->_cache->remove($nameCache);
    }
    function arrayAsoccForFirstItem($array){
        $arrayResponse = array();
        foreach($array as $index => $data){
            $arrayResponse[$data[key($data)]][]=$data;
        }
        return $arrayResponse;
    }
    
    function resultTransaccion($num,$error = '',$save = '',$roll = ''){
        
        switch ($num):
            case '1':
                if(empty($save))
                    $msn = 'Registro actualizado correctamente';
                else
                    $msn = $save;
                break;
            case '0':
                if(empty($error))
                    $msn = 'Error!!!';
                else
                    $msn = $error;
                break;
                
        endswitch;
        
        return $msn;
    }
}

?>
