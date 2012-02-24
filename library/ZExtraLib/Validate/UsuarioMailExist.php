<?php

class ZExtraLib_Validate_UsuarioMailExist extends Zend_Validate_Abstract{
    const MessageEmailValidator = '';
    
    protected $_messageTemplates = array(
        self::MessageEmailValidator => "El correo '%value%' Se encuentra registrado por otro usuario"
    );
    function isValid($value) {
        $session = new Zend_Session_Namespace('dojo');
        $this->_setValue($value);
        $modelUsuario = new Application_Model_Usuario();
        if(($modelUsuario->verificarEmailUsuario($value,$session->idUsuario))){
            $this->_error(self::MessageEmailValidator);
            return false;
        }
        return true;
    }
    
}