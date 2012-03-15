<?php
class Application_Model_Pais extends ZExtraLib_Model {

    protected $_idioma;
    protected $_pais;
    protected $_paisIdioma;
    protected $_ciudad;
    protected $_ciudadIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_paisIdioma = new Application_Model_DbTable_PaisIdioma();
    
    }
    
    function listarPaisPorIdioma($idioma) {
        //if (!($result = $this->_cache->load('listaPais' . $idioma))) {
            $result = $this->_pais->getAdapter()
                    ->select()
                    ->from(array('p' => $this->_pais->getName()), array('p.idPais', 'pi.nombrePaisIdioma','p.nombrePais','p.slugPais'))
                    ->join(array('pi' => $this->_paisIdioma->getName()), 'pi.idPais = p.idPais', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = pi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma);
            
            $result = $this->_pais->getAdapter()->fetchAssoc($result);
          //  $this->_cache->save($result, 'listaPais' . $idioma);
       // }
        return $result;
    }
    
    public function listaPais(){
        $select = $this->_pais->getAdapter()->select();
        $select->from(array('t1' => 'pais'), 
                array('idPais','nombrePais'));
        //echo $select; exit;
        return $select->query()->fetchAll();
    }
    
    public function getPais($id, $idioma){
        $select = $this->_pais->getAdapter()->select();
        $select->from(array('t1' => 'pais'), 
                array('idPais'))
                ->join(array('t2' => 'paisidioma'),'t1.idPais = t2.idPais', 
                        array('nombrePaisIdioma','idIdioma'))
                ->where('t1.idPais = ?',$id)
                ->where('idIdioma = ?',$idioma);
        //echo $select; exit;
        return $select->query()->fetch();
    }
    
    public function insertData($data){
        $pais = array(
            'nombrePais' => $data['nombrePais']
        );
        
        $this->_pais->insert($pais); 
        
        $id = $this->_pais->getAdapter()->lastInsertId();
        $idiomObj = new Application_Model_Idioma();
        $dtaIdioma = $idiomObj->getAllIdiomas();
        
        $idioma = array(
            'idPais' => $id,
            'nombrePaisIdioma' => $data['nombrePais']
        );
        
        foreach ($dtaIdioma as $value):
            $idioma['idIdioma'] = $value['idIdioma'];
            $this->_paisIdioma->insert($idioma);
        endforeach;
        //$this->_cache->save(array(), 'listarPuntoVentaConPortal');
        return 1;
    }
    
     public function updatePais($data){
        $idioma = array(
            'nombrePaisIdioma' => $data['nombrePaisIdioma']
        );
        
        $where = "idPais = '{$data['idPais']}' and idIdioma = '{$data['lang_code']}'";
        $this->_paisIdioma->update($idioma, $where); 
        if($default == $data['lang_code']){
            $punto = array(
                'nombrePais' => $data['nombrePaisIdioma']
            );
            $where = "idPais = '{$data['idPais']}'";
            $this->_pais->update($punto, $where); 
        }
        //$this->clearCache();
        return 1;
    }
    
    public function deleteData($data){
        try{
            /*$this->_ciudad = new Application_Model_DbTable_Ciudad();
            $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();
            $this->_ciudadIdioma->delete($where);
            $this->_ciudad->delete();
            $this->_paisIdioma->delete("idPais = '{$data['id']}'");
            $this->_pais->delete("idPais = '{$data['id']}'");*/
            $action = $this->resultTransaccion('0', 'Existen Datos Relacionados', 'Registro eliminado Correctamente', '');
            return $action;
        }  catch (Exception $e){
            return '0';
        }
        
    }
    
}
