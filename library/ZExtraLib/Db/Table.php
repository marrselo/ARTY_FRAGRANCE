<?php

class ZExtraLib_Db_Table
        extends Zend_Db_Table
{


    function insert(array $data)
    {
        parent::insert($data);
    }
    
    function update(array $data, $where)
    {
        parent::update($data, $where);
    }

    function delete($where)
    {
        parent::delete($where);
    }
    
    public function getName() {
        return $this->_name;
    }
    
    public function getCols(){
        return $this->_getCols();
    }
    
}
