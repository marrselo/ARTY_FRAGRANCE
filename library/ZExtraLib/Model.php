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
    //put your code here
}

?>
