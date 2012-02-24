<?php

class ZExtraLib_Validate_MailExist extends Zend_Validate_Abstract{
    const MessageEmailValidator = '';
    
    protected $_messageTemplates = array(
        self::MessageEmailValidator => "El correo '%value%' Se encuentra registrado por otro usuario, use otro correo porfavor"
    );
    function isValid($value) {
        $session = new Zend_Session_Namespace('dojo');
        $this->_setValue($value);
        $modelCliente = new Application_Model_Cliente();
        if(($modelCliente->verificarEmailCliente($value,$session->idCliente))){
            $this->_error(self::MessageEmailValidator);
            return false;
        }
        return true;
    }
    
}