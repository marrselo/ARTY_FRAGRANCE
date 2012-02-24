<?php

class ZExtraLib_Validate_DniExist extends Zend_Validate_Abstract{
    const MessageEmailValidator = '';
    
    protected $_messageTemplates = array(
        self::MessageEmailValidator => "El dni '%value%' Se encuentra registrado por otro usuario"
    );
    function isValid($value) {
        $session = new Zend_Session_Namespace('dojo');
        $this->_setValue($value);
        $modelCliente = new Application_Model_Cliente();
        if(($modelCliente->verificarDniCliente($value,$session->idCliente))){
            $this->_error(self::MessageEmailValidator);
            return false;
        }
        return true;
    }
    
}