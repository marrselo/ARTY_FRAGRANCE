<?php
class ZExtraLib_Validate_NumberWordsAllowed extends Zend_Validate_Abstract{
    
    const MessageNumberWordsAllowed = '' ;
    
    protected $_messageTemplates = array();
    protected $_numberWords ;
    
    function __construct($numberWords) {
        $this->_numberWords = $numberWords;
        $this->_messageTemplates=array(self::MessageNumberWordsAllowed 
                                    => "El valor  '%value%' no debe tener mas de $numberWords palabras"
        );
    }
    
    function isValid($value) {
        $arrayValid=@explode(' ',trim($value));
        if(is_array($arrayValid) && count($arrayValid)> $this->_numberWords ){
            $this->_error(self::MessageNumberWordsAllowed);
            return false;
        }
        return true;
    }
}