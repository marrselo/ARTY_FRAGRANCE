<?php

class Application_Model_BlogFoto extends ZExtraLib_Model {

    protected $_idioma;
    protected $_blogFoto;
    protected $_fotoBlogFoto;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_blogFoto = new Application_Model_DbTable_BlogFotos();
        $this->_fotoBlogFoto = new Application_Model_DbTable_FotoBlogFoto();
        
    }
    function listarBlogFotoPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listarBlogFotoPorIdioma' . $idioma ))) {
            $result = $this->_blogFoto
                    ->getAdapter()
                    ->select()
                    ->from(array('b' => $this->_blogFoto->getName()))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = b.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listarBlogFotoPorIdioma' . $idioma );
        }
        return $result;
    }
    function listarFotosBlogFoto() {
        if (!($result = $this->_cache->load('listarFotosBlogFoto'))) {
            $result = $this->_fotoBlogFoto->select()
                    ->query()->fetchAll();
            $this->_cache->save($result, 'listarFotosBlogFoto');
        }
        return $result;
    }
    
    
    function ifExistBlogIdioma($idLang){
        return $this->_blogFoto->select()->where('idIdioma = ?',$idLang)->query()->fetch();
    }
    
    function InsertInfoBlog($data,$idLang,$prefIdioma) {
        if($this->ifExistBlogIdioma($idLang)){
            $where = $this->_blogFoto->getAdapter()->quoteInto('idIdioma = ?', $idLang);
            $this->_blogFoto->update($data, $where);
        }else{
            $this->_blogFoto->insert($data);
        }    
        
        $this->_cache->remove('listarBlogFotoPorIdioma'.$prefIdioma);
    }
    function InsertFotoBlog($arrayFoto){
        $this->_fotoBlogFoto->delete('1=1');
        foreach($arrayFoto as $index) {
            $data['nombre']=$index;
            $this->_fotoBlogFoto->insert($data);
        }
        $this->_cache->remove('listarFotosBlogFoto');
    }
}
