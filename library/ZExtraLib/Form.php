<?php

class ZExtraLib_Form extends Zend_Form{
    public $_hostFileStatic;
    
        function init() {
        parent::init();
        $this->_hostFileStatic = ZExtraLib_Server::getStatic()->host;
        
        }
        public function addDecoratorCustom($file) {
            $this->setDecorators(array(array('ViewScript',array('viewScript'=>$file))));
        }
        function fetchPairs($array){
        $data=array();
        foreach ($array as $index){
            $arrayKey=array_keys($index);
            if(count($arrayKey)>=2)
            $data[$index[$arrayKey[0]]] = $index[$arrayKey[1]];
            else
            $data[$index[$arrayKey[0]]] = $index[$arrayKey[0]];    
        }
        return $data;
    }
    
}


?>
