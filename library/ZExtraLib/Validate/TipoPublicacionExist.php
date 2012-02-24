<?php

class ZExtraLib_Validate_TipoPublicacionExist extends Zend_Validate_Abstract{
    const MessageTipoPublicacionExist = '';
    
    protected $_messageTemplates = array(
        self::MessageTipoPublicacionExist => "El Tipo de Publicacion no Existe"
    );
    function isValid($value) {
        $this->_setValue($value);
        $tipoPublicacion = new Application_Model_TipoPublicacion();
        if(!($tipoPublicacion->ifExistTipoPublicacion($value))){
            $this->_error(self::MessageTipoPublicacionExist);
            return false;
        }
        return true;
    }
}