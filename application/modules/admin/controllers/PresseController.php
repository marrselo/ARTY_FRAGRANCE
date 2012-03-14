<?php

class Admin_PresseController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->view->mensaje = $this->_flashMessenger->getMessages();
        $modelPresse = new Application_Model_Presse();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaPresse = $modelPresse->listarPressePorIdioma($idioma);
    }

    public function newPresseAction() {
        $formulario = new Application_Form_FormPresse();
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->_redirect('/admin/elisabeth-de-feydeau/');
            }
        } else {
            
            //$formulario->insertElment('contenidoBio', $dataBio['contenidoBio']);
            //$formulario->insertElment('tituloBio', $dataBio['tituloBio']);
        }
        $this->view->form = $formulario;
    }
    
    public function editPresseAction() {
        $formulario = new Application_Form_FormPresse();
        $modelPresse = new Application_Model_Presse();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $dataPresse = $modelPresse->listarPressePorIdiomaDetalle($idIdioma, $this->_params['id']);
        if ($this->_request->isPost()) {    
            if ($formulario->isValid($this->_params)) {
                $arrayImagen= array();
                
                $arrayImagen = $this->subirImagenes(
                        $formulario->imgPresse->getDestination(), 
                        'img_presse_', 
                        $arrayImagen, 
                        '404', 
                        '495',
                        '100', 
                        '70'
                        );
                print_r($arrayImagen);
                exit;
              //  $this->_redirect('/admin/presse/');
                
            }
        } else {
            $formulario->insertElment('tituloPresse', $dataPresse['tituloPresseIdioma']);
            $formulario->insertElment('subTituloPresse', $dataPresse['subTituloPresseIdioma']);
            $formulario->insertElment('linkMostrarPresse', $dataPresse['linkMostrarPresseIdioma']);
        }
        $this->view->rutaImagen = '/imagen-presse/'.$dataPresse['imgPresse'];
        $this->view->rutaFile = '/imagen-presse/'.$dataPresse['linkPresse'];
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
                        $confUpload['rutaBlog'], 'img_elisafey_blog_', $this->sessionAdmin->imagenBlog, '404', '495', '100', '50');
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
        $adapter->addFilter('Rename', array('target' => $destination . '/' . $name . '.' . $extn,'overwrite' => true));
        if (!$adapter->receive()) {
            $nameSession = $adapter->getMessages();
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


    public function adminSubMenuAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $data = $this->_menuObj->getMenu($this->sessionAdmin->idiomaDetaful['idIdioma'], 6);
        $this->view->data = $data;
    }

}

