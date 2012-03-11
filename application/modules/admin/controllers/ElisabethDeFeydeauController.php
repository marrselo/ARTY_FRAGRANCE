<?php

class Admin_ElisabethDeFeydeauController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }
    public function indexAction() {
        $formulario = new Application_Form_FormBiografieElizabet();
        $modelBio = new Application_Model_Biografia();
        $dataBio = $modelBio->listarBiografiaPorIdioma($this->view->lang);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $dataInfo = array(
                    'tituloBio' => $this->_params['tituloBio'],
                    'contenidoBio' => $this->_params['contenidoBio'],
                    'idIdioma' => $this->sessionAdmin->idiomaDetaful['idIdioma']
                );
                $modelBio->InsertInfoBio(
                        $dataInfo, $this->sessionAdmin->idiomaDetaful['idIdioma'], $this->sessionAdmin->idiomaDetaful['PrefIdioma']
                );
                if (count($this->sessionAdmin->imagenBiografia) > 0) {
                    $modelBio->InsertFotoBio($this->sessionAdmin->imagenBiografia);
                    $fc = Zend_Controller_Front::getInstance();
                    $confUpload = $fc->getParam('bootstrap')->getOption('upload');
                    if (count($this->sessionAdmin->imagenBiografiaPorEliminar) > 0) {
                        foreach ($this->sessionAdmin->imagenBiografiaPorEliminar as $index) {
                            unlink($confUpload['rutaBiografia'] . '/' . $this->sessionAdmin->imagenBiografia[$index]);
                        }
                    }
                }
                unset($this->sessionAdmin->imagenBiografia);
                unset($this->sessionAdmin->imagenBiografiaPorEliminar);
                $this->_redirect('/admin/elisabeth-de-feydeau/');
            }
        } else {
            $formulario->insertElment('contenidoBio', $dataBio['contenidoBio']);
            $formulario->insertElment('tituloBio', $dataBio['tituloBio']);
        }
        $this->view->form = $formulario;
    }

    public function ouvragesAction() {
        $modelObra = new Application_Model_Obra();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->dataObra = $modelObra->listarObraPorIdioma($idioma);
        
    }
    
    public function editOuvragesAction(){
    $formulario = new Application_Form_FormOuvrages();
    $modelObra = new Application_Model_Obra();
    $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    $datosObra = $modelObra->listarDatosObra($idioma,$this->_params['id']);
    //print_r($datosObra);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        
    }    
    }else{
        $formulario->insertElment('anioObra', $datosObra['anioObra']);
        $formulario->insertElment('tituloObra', $datosObra['tituloObraIdioma']);
        $formulario->insertElment('link', $datosObra['link']);
        $formulario->insertElment('parrafoObra', $datosObra['parrafoObraIdioma']);
    }
    $this->view->form = $formulario;
    }
    
    public function newOuvragesAction() {
    $formulario = new Application_Form_FormOuvrages();
    $modelObra = new Application_Model_Obra();
    $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        
    }    
    }
    $this->view->form = $formulario;
        
    }

    
    
    public function realisationsAction() {
        
    }

    public function blogEtPhotosAction() {
        $formulario = new Application_Form_FormBlogElizabet();
        $modelBlog = new Application_Model_BlogFoto();
        $dataBlog = $modelBlog->listarBlogFotoPorIdioma($this->view->lang);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $dataInfo = array(
                    'linkBlogFotos' => $this->_params['linkBlogFotos'],
                    'nombreLinkBlogFotos' => $this->_params['nombreLinkBlogFotos'],
                    'descripcionBlogFotos' => $this->_params['descripcionBlogFotos'],
                    'idIdioma' => $this->sessionAdmin->idiomaDetaful['idIdioma']
                );
                $modelBlog->InsertInfoBlog(
                        $dataInfo, $this->sessionAdmin->idiomaDetaful['idIdioma'], $this->sessionAdmin->idiomaDetaful['PrefIdioma']
                );
                if (count($this->sessionAdmin->imagenBlog) > 0) {
                    $modelBlog->InsertFotoBlog($this->sessionAdmin->imagenBlog);
                    $fc = Zend_Controller_Front::getInstance();
                    $confUpload = $fc->getParam('bootstrap')->getOption('upload');
                    if (count($this->sessionAdmin->imagenBlogPorEliminar) > 0) {
                        foreach ($this->sessionAdmin->imagenBlogPorEliminar as $index) {
                            unlink($confUpload['rutaBlog'] . '/' . $this->sessionAdmin->imagenBlog[$index]);
                        }
                    }
                }
                unset($this->sessionAdmin->imagenBlog);
                unset($this->sessionAdmin->imagenBlogPorEliminar);
                $this->_redirect('/admin/elisabeth-de-feydeau/blog-et-photos');
            }
        } else {
            $formulario->insertElment('linkBlogFotos', $dataBlog['linkBlogFotos']);
            $formulario->insertElment('nombreLinkBlogFotos', $dataBlog['nombreLinkBlogFotos']);
            $formulario->insertElment('descripcionBlogFotos', $dataBlog['descripcionBlogFotos']);
        }
        $this->view->form = $formulario;
    }

    public function subirImagenesBiografiaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        switch ($this->_params['moduleAdmin']) {
            case 'biografie':
                $this->sessionAdmin->imagenBiografia =
                        $this->subirImagenes(
                        $confUpload['rutaBiografia'], 'img_elisafey_bio_', $this->sessionAdmin->imagenBiografia, '404', '495');
                break;
            case 'blog':
                $this->sessionAdmin->imagenBlog =
                        $this->subirImagenes(
                        $confUpload['rutaBlog'], 'img_elisafey_blog_', $this->sessionAdmin->imagenBlog, '404', '495','100','50');
                break;
        }
    }

    public function subirImagenes(
    $destination, $prefNameImg, $nameSession, $width, $height, $widthThums=null, $heightThums=null) {
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $adapter->setDestination($destination);
        $extn = pathinfo($adapter->getFileName(), PATHINFO_EXTENSION);
        $name = $prefNameImg . time('H:i:s');
        $thums = false;
        if ($widthThums != null && $heightThums != null) {
            $thums = true;
        }
        $adapter->addFilter('Rename', array('target' => $destination . '/' . $name . '.' . $extn));
        if (!$adapter->receive()) {
            $arrayResponse = 'Error al subir el archivo';
        } else {
            $fileImagen = $adapter->getFileName();
            $nameSession[] = $name . '.' . $extn;
            $this->redimencionarImagen($fileImagen, $width, $height, 'crop');
            if ($thums) {
                $nameThums ='thums_'.$name;
                copy($fileImagen,$destination . '/' . $nameThums . '.' . $extn);
                $this->redimencionarImagen($destination . '/' . $nameThums . '.' . $extn, $widthThums, $heightThums, 'crop');
            }
        }
        return $nameSession;
    }
    public function eliminarFotoBiografiaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $this->sessionAdmin->imagenBiografiaPorEliminar[] = $this->_params['idImg'];
        unset($this->sessionAdmin->imagenBiografia[$this->_params['idImg']]);
    }

    public function eliminarFotoBlogAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $this->sessionAdmin->imagenBlogPorEliminar[] = $this->_params['idImg'];
        unset($this->sessionAdmin->imagenBlog[$this->_params['idImg']]);
    }

    public function listarImagenes($imagenes, $ruta) {
        $html = '<ul>';
        foreach ($imagenes as $index => $value) {
            $html.= '<li style="float:left; width:70px; height:60px;  margin:0px;">';
            $html.= '<img  width="40px" style="float:left; border-top:15px;  margin:0px;"  src="' . $this->view->baseUrl() . '/' . $ruta . '/' . $value . '">
                <div title="Eliminar" style="border: solid 1px #000; 
                     width: 15px; 
                     height: 15px; 
                     background: #CF6E37; 
                     text-align: center; 
                     cursor: pointer;
                     color: #ffffff;
                     font-weight: bold;
                     position: absolute" id="elminarFoto-' . $index . '">X</div>';
            $html.= '</li>';
        }
        $html.= '</ul>';
        return $html;
    }

    public function listarImagenesBiografiaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $modelBio = new Application_Model_Biografia();
        $dataFotosBio = $modelBio->listarFotosBiografia();
        if (!isset($this->sessionAdmin->imagenBiografia) && count($dataFotosBio) > 0) {
            $this->sessionAdmin->imagenBiografia = array();
            foreach ($dataFotosBio as $index) {
                $this->sessionAdmin->imagenBiografia[] = $index['nombreFotoBio'];
            }
        }
        if (isset($this->sessionAdmin->imagenBiografia) && count($this->sessionAdmin->imagenBiografia > 0)) {
            $html = $this->listarImagenes($this->sessionAdmin->imagenBiografia, 'biographie');
            echo $this->_helper->json($html);
        }
    }

    public function listarImagenesBlogAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $modelBlog = new Application_Model_BlogFoto();
        //unset($this->sessionAdmin->imagenBlog);
        $dataFotosBlog = $modelBlog->listarFotosBlogFoto();
        if (!isset($this->sessionAdmin->imagenBlog) && count($dataFotosBlog) > 0) {
            $this->sessionAdmin->imagenBlog = array();
            foreach ($dataFotosBlog as $index) {
                $this->sessionAdmin->imagenBlog[] = $index['nombre'];
            }
        }
        if (isset($this->sessionAdmin->imagenBlog) && count($this->sessionAdmin->imagenBlog > 0)) {

            $html = $this->listarImagenes($this->sessionAdmin->imagenBlog, 'blog');
            echo $this->_helper->json($html);
        }
    }
    
    public function adminSubMenuAction(){
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $data = $this->_menuObj->getMenu($this->sessionAdmin->idiomaDetaful['idIdioma'],6);
        $this->view->data = $data;
    }


}

