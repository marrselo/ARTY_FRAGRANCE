<?php

class Admin_ProductoController
        extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->_articulo = new Application_Model_DetalleArticulo();
        $this->_foto = new Application_Model_FotoDetalleArticulo();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
        $this->idioma = new Application_Model_Idioma();
        foreach($this->idioma->getAllIdiomas() as $ind => $val){
            $colIdioma[$val['idIdioma']] = $val;
        };
        $this->view->colIdioma =$colIdioma; // $this->idioma->getAllIdiomas();
        
    }
    public function indexAction()
    {
        
    }    

    public function listfotosAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo){
        $articulo = new Application_Model_DetalleArticulo();
        $this->view->articulo = $articulo->listarArticulo($idArticulo);
        }
        else 
            $this->_redirect('/');
        
    }
    public function editproductAction()
    {        
        $form = new Application_Form_FormProduct();
        $idArticulo = $this->_getParam('id', NULL);
        
        if($idArticulo){
        $articulo = $this->_articulo->buscaArticulo($idArticulo);
        $this->view->foto = $this->_foto->imagesPorProducto($idArticulo);
        $form->populate($articulo);
      
        if ($this->_request->isPost()) {  
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                        $values = $form->getValues();                        
                        if($this->_articulo->updateProducto($values))
                            $this->_redirect ('/admin/index/collections');
                        else
                            $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                    
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        
        }
        else 
            $this->_redirect('/');
        
        $this->view->form = $form;
        $this->view->idDetalle = $idArticulo;
        
        
        
    }
    public function deleteproductAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $this->_articulo->deleteProduct($idArticulo);  
            $this->_redirect('/admin/index/collections');
        }
        
    }
    public function activeproductAction()
    {        
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $est = $this->_getParam('est', 1);            
            $this->_articulo->desactiveProduct($idArticulo, $est);
            $this->_redirect('/admin/index/collections');
        }
        
    }
    public function deletefotoAction()
    {
        $idFoto = $this->_getParam('info1', NULL);
        $idDetalleArticulo = $this->_getParam('info2', NULL);
        if($idFoto and $idDetalleArticulo) {
            $name = $this->_foto->buscaFoto($idFoto);            
            $dir = APPLICATION_PATH.'/../public/imagen-producto/'.$name["nombreFoto"];
            if(file_exists($dir))
            {
                if(unlink($dir))
                {
                    $this->_foto->deleteFoto($idFoto, $idDetalleArticulo); 
                    $this->_redirect('/admin/producto/editproduct/id/'.$idDetalleArticulo);
                }
            }
            else  
                print "El archivo no fue borrado"; 
            
        }
        
    }
    
    public function addphotoAction()
    {
        $this->_helper->layout->disableLayout();
        $form = new Application_Form_FormPhoto();
        $foto = new Application_Model_Foto();
        $this->view->form = $form;
        
        $idDetArticulo = $this->_getParam('id');
        
        
        if ($this->_request->isPost()) {
            $extn = pathinfo($form->nombreFoto->getFileName(), PATHINFO_EXTENSION);
            $idFoto = $foto->maxId();            
            $rename = 'producto-'.$idFoto.'-'.$idDetArticulo.'.'.$extn;
            $form->nombreFoto->addFilter(new Zend_Filter_File_Rename(
                      array('target' => $rename))
                   );
            $params = $this->_getAllParams();                
                if ($form->isValid($params)) {
                    $values = $form->getValues();
                    
                    $tfoto = array('nombreFoto' => $rename);
                    
                    $fotodet = array(
                        'idFoto' => $idFoto,
                        'idDetalleArticulo' => $idDetArticulo,
                        'tituloFoto' => $values["tituloFoto"],
                        'descripcionFoto' => $values["descripcionFoto"],                        
                        'link' => 1,
                        'ordenFoto' => 1,
                        'flagPublicar' => 1,
                    );
                    $form->nombreFoto->receive();                    
                    if($this->_foto->insertFoto($tfoto, $fotodet))
                        $this->_redirect ('/admin/index/collections');
                    else
                        $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                    
                    
                    
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
    }
    
    public function addproductAction()
    {
        $idArticulo = $this->_getParam('info1', NULL);
        if($idArticulo){
        $form = new Application_Form_FormProduct();
        $this->view->form = $form;
        
        if ($this->_request->isPost()) {  
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {                    
                        $values = $form->getValues();
                        $values =$values + array('idCat' => $idArticulo);
                        if($this->_articulo->insertProduct($values))
                            $this->_redirect ('/admin/collection/listproductos');
                        else
                            $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                    
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        }
        else 
            $this->_redirect ('/admin');
    }

}
