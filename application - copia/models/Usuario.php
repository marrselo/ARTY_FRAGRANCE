<?php
class Application_Model_Usuario  extends Zend_Db_Table {
    protected  $_name = "usuario";
    
    public function listaUsuarios($buscar = null) {
        $estado = 1;
        if($buscar == ''){
        return $this->getAdapter()
                ->select()
                ->from('usuario')
                ->where('estado = ?', $estado)
                ->where('FlagSuperUsuario != ?',1 )
                ->query()->fetchAll();
        } else{
            
            $where  =  $this->getAdapter()->quoteInto('apellidomaterno like ?', '%'.$buscar.'%');
            $where .= $this->getAdapter()->quoteInto(' or  apellidopaterno like ?', '%'.$buscar.'%');
            $where .= $this->getAdapter()->quoteInto(' or nombre like ?', '%'.$buscar.'%');
            return $this->getAdapter()
                    ->select()
                    ->from('usuario')
                    ->where('estado = ?', $estado)
                    ->where('FlagSuperUsuario != ?',1 )
                    ->where($where)
                    ->query()->fetchAll();
        }
    }
    public function crearUsuario($data,$menu = null){
        $perfilModel = new Application_Model_Perfil();
        $this->insert($data);
        $perfilModel->crearPerfil($menu, $this->getAdapter()->lastInsertId());
    }
    
    public function crearUsuarioCliente($data){
        $this->insert($data);
    }
    
    
    
    public function eliminarUsuario($idusuario){
        $where = $this->getAdapter()->quoteInto('idusuario = ?', $idusuario);
        $data = array('estado'=>'0');
        $this->update($data, $where);
    }
    public function  actualizarUsuario($idUsuario,$data,$menu){
        $perfilModel = new Application_Model_Perfil();
        $where = $this->getAdapter()->quoteInto('idusuario = ?', $idUsuario);
        $this->update($data, $where);
        $perfilModel->crearPerfil($menu, $idUsuario);
    }

    public function listarUnUsuario($idUsuario) {
        return  $this->getAdapter()
                ->select()->from('usuario')
                ->where('idusuario = ?', $idUsuario)
                ->query()
                ->fetch();
    }
    public function verificarEmailusuario($correo,$idUsuario = null) {
        $response = $this->select()
                ->from('usuario')
                ->where('correo = ?', $correo);
        if ($idUsuario!='')
            $response->where('idusuario != ?', $idUsuario);
        return $this->getAdapter()->fetchAll($response);
        
    }
    
    public function verificarDniUsuario($dni,$idUsuario = null) {
        $response = $this->select()
                ->from('usuario')
                ->where('dni = ?', $dni);
        if ($idUsuario!='')
            $response->where('idusuario != ?', $idUsuario);
        return $this->getAdapter()->fetchAll($response);
        
    }
}
