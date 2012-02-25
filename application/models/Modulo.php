<?php

class Application_Model_Modulo extends ZExtraLib_Model {
    protected $_modulo;
    function __construct() {
        parent::__construct();
        $this->_modulo = new Application_Model_DbTable_Modulo();
    }
    

}

?>
