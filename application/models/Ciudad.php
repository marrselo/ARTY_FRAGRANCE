<?php

class Application_Model_Ciudad extends ZExtraLib_Model {
    protected $_ciudad;
    protected $_ciudadIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();
        $this->_ciudad = new Application_Model_DbTable_Ciudad();
    
    }
    
    public function getListaCiudad($id){
        $select = $this->_pais->getAdapter()->select();
        $select->from(array('t1' => 'ciudad'), array('idCiudad','nombreCiudad'))
                ->join(array('t2' => 'pais'),'t1.idPais = t2.idPais', array('idPais','nombrePais'))
                ->where('t1.idPais = ?', $id);
        //echo $select; exit;
        return $select->query()->fetchAll();
    }
    
    public function getCiudadIdioma($id,$sesion){
        $select = $this->_pais->getAdapter()->select();
        $select->from(array('t1' => 'ciudadidioma'), array('idCiudad','idCiudadIdioma','nombreCiudadIdioma','idIdioma'))
                ->join(array('t3' => 'ciudad'), 't1.idCiudad = t3.idCiudad', array('idCiudad'))
                ->join(array('t2' => 'paisidioma'),'t2.idPais = t3.idPais and t1.idIdioma = t2.idIdioma', array('idPais','nombrePaisIdioma'))
                ->where('t3.idPais = ?', $id)
                ->where('t1.idIdioma = ?', $sesion['idIdioma']);
        //echo $select; exit;
        return $select->query()->fetch();
    }
    
    public function saveCiudadPais(array $data = Array(), $sesion){
       $pais = array(
            'nombreCiudad' => $data['nombreCiudad'],
            'idPais' => $data['idPais']
        );
        
        $this->_ciudad->insert($pais); 
        
        $id = $this->_ciudad->getAdapter()->lastInsertId();
        $idiomObj = new Application_Model_Idioma();
        $dtaIdioma = $idiomObj->getAllIdiomas();
        $idioma = array(
            'idCiudad' => $id,
            'nombreCiudadIdioma' => $data['nombreCiudad']
        );
        
        foreach ($dtaIdioma as $value):
            $idioma['idIdioma'] = $value['idIdioma'];
            $this->_ciudadIdioma->insert($idioma);
        endforeach;
        //$this->_cache->save(array(), 'listarPuntoVentaConPortal');
        return 1;
    }
    
    public function editCiudadPais(array $data = Array(), $sesion){
      
        $idioma = array(
            'nombreCiudadIdioma' => $data['nombreCiudad']
        );
        
        $where = "idCiudad = '{$data['idCiudad']}' and idIdioma = '{$sesion['idIdioma']}'";
        $this->_ciudadIdioma->update($idioma, $where); 
        
        if($sesion['idIdioma'] == $data['default']){
            $save = array(
                'nombreCiudad' => $data['nombreCiudad']
            );
            $where = "idCiudad = '{$data['idCiudad']}'";
            $this->_ciudad->update($save, $where); 
        }
        //$this->clearCache();
        return 1;
    }
    
    public function deleteData(array $data = Array()){
        $this->_ciudadIdioma->delete("idCiudad = '{$data['id']}'");
        $this->_ciudad->delete("idCiudad = '{$data['id']}'");
        $action = $this->resultTransaccion('1', '', 'Registro eliminado Correctamente', '');
        return $action;
    }
    
}