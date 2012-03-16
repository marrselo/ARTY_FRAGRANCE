<?php

class Admin_ActualitesController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->view->mensaje = $this->_flashMessenger->getMessages();
        $modelActualites = new Application_Model_Actualites();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaActualites = $modelActualites->listarActualitesPorIdioma($idioma);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $this->view->destination = $confUpload["rutaActualites"];
    }
    public function newActualiteAction() {
        $formulario = new Application_Form_FormActualites();
        $modelActualites = new Application_Model_Actualites();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                if (!is_array($formulario->imagen->getFileName())) {
                    $extn = pathinfo($formulario->imagen->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'actualites_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imagen->getDestination() . '/' . $nameFile;
                    $formulario->imagen->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imagen->receive();
                    $this->redimencionarImagen($rutaFileAbs, '500', '500', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imagen->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($rutaFileAbsThums, '134', '176', 'crop');
                    $params['imagen'] = $nameFile;
                }
                    $params['title'] = $this->_params['titleActualites'];
                    $params['contenido'] = $this->_params['contenidoActualites'];
                    $params['fechaRegistro'] = date('Y-m-d H:i:s');
                    
                    $paramsIdioma['titleActualitesIdioma'] = $this->_params['contenidoActualites'];
                    $paramsIdioma['contenidoActualitesIdioma'] = $this->_params['contenidoActualites'];
                    
                    $paramsIdioma['idActualites'] = $modelActualites->insertActualites($params);
                    $modelActualites->insertActualitesIdioma($paramsIdioma);
                $this->cleanCache();
                $this->_redirect('/admin/Actualites/');
            }
        } else {

            //$formulario->insertElment('contenidoBio', $dataBio['contenidoBio']);
            //$formulario->insertElment('tituloBio', $dataBio['tituloBio']);
        }
        $this->view->form = $formulario;
    }

    public function editActualitesAction() {
        $formulario = new Application_Form_FormActualites();
        $modelActualites = new Application_Model_Actualites();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $dataActualites = $modelActualites->listarActualitesPorIdiomaDetalle($idIdioma, $this->_params['id']);
        if ($this->_request->isPost()) {
            $formulario->getElement('imgActualites')->setRequired(false);
            $formulario->getElement('linkActualites')->setRequired(false);
            if ($formulario->isValid($this->_params)) {
                
                $editPrese = false;
                if (!is_array($formulario->imgActualites->getFileName())) {
                    $extn = pathinfo($formulario->imgActualites->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_Img_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imgActualites->getDestination() . '/' . $nameFile;
                    $formulario->imgActualites->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imgActualites->receive();
                    $this->redimencionarImagen($rutaFileAbs, '500', '500', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imgActualites->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($rutaFileAbsThums, '134', '176', 'crop');
                    $params['imgActualites'] = $nameFile;
                    @unlink($formulario->imgActualites->getDestination() . '/' . $dataActualites['imgActualites']);
                    @unlink($formulario->imgActualites->getDestination() . '/thums_' . $dataActualites['imgActualites']);
                    $dataActualites['imgActualites']=$nameFile;
                    $editPrese = true;
        
                }
                if (!is_array($formulario->linkActualites->getFileName())) {
                    $extn = pathinfo($formulario->linkActualites->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_' . time('H:i:s') . '.' . $extn;
                    $nameFileAbs = $formulario->linkActualites->getDestination() . '/' . $nameFile;
                    $formulario->linkActualites->addFilter('Rename', array('target' => $nameFileAbs, 'overwrite' => true));
                    $formulario->linkActualites->receive();
                    $params['linkActualites'] = $nameFile;
                    @unlink($formulario->imgActualites->getDestination() . '/' . $dataActualites['linkActualites']);
                    $dataActualites['linkActualites'] = $nameFile;
                    $editPrese = true;
                }
                    
                    $paramsIdioma['tituloActualitesIdioma'] = $this->_params['tituloActualites'];
                    $paramsIdioma['subTituloActualitesIdioma'] = $this->_params['subTituloActualites'];
                    $paramsIdioma['linkMostrarActualitesIdioma'] = $this->_params['linkMostrarActualites'];
                    if($editPrese)
                    $modelActualites->editActualites($params, $this->_params['id']);
                    $modelActualites->editActualitesIdioma($paramsIdioma,$this->_params['id'], $this->sessionAdmin->idiomaDetaful['idIdioma']);
                $this->cleanCache();
                $this->_redirect('/admin/Actualites/');
            }
        } else {
            $formulario->insertElment('tituloActualites', $dataActualites['tituloActualitesIdioma']);
            $formulario->insertElment('subTituloActualites', $dataActualites['subTituloActualitesIdioma']);
            $formulario->insertElment('linkMostrarActualites', $dataActualites['linkMostrarActualitesIdioma']);
        }
        
        $this->view->rutaImagen = '/imagen-Actualites/' . $dataActualites['imgActualites'];
        $this->view->rutaFile = '/imagen-Actualites/' . $dataActualites['linkActualites'];
        $this->view->form = $formulario;
        
    }

    public function eliminarActualitesAction(){
        $modelActualites = new Application_Model_Actualites();
        $modelActualites->eliminarActualites($idActualites);
        $this->_params['id'];
        
        
    }

    public function adminSubMenuAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $data = $this->_menuObj->getMenu($this->sessionAdmin->idiomaDetaful['idIdioma'], 6);
        $this->view->data = $data;
    }

}

