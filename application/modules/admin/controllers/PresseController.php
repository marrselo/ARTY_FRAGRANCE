<?php

class Admin_PresseController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->view->mensaje = $this->_flashMessenger->getMessages();
        $modelPresse = new Application_Model_Presse();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaPresse = $modelPresse->listarPressePorIdiomaAdmin($idioma);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $this->view->destination = $confUpload["rutaPresse"];

    }

    public function newPresseAction() {
        $formulario = new Application_Form_FormPresse();
        $modelPresse = new Application_Model_Presse();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                if (!is_array($formulario->imgPresse->getFileName())) {
                    $extn = pathinfo($formulario->imgPresse->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_Img_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imgPresse->getDestination() . '/' . $nameFile;
                    $formulario->imgPresse->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imgPresse->receive();
                    $this->redimencionarImagen($rutaFileAbs, '500', '500', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imgPresse->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($rutaFileAbsThums, '134', '176', 'crop');
                    $params['imgPresse'] = $nameFile;
                }
                if (!is_array($formulario->linkPresse->getFileName())) {
                    $extn = pathinfo($formulario->linkPresse->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_' . time('H:i:s') . '.' . $extn;
                    $nameFileAbs = $formulario->linkPresse->getDestination() . '/' . $nameFile;
                    $formulario->linkPresse->addFilter('Rename', array('target' => $nameFileAbs, 'overwrite' => true));
                    $formulario->linkPresse->receive();
                    $params['linkPresse'] = $nameFile;
                }
                    $params['tituloPresse'] = $this->_params['tituloPresse'];
                    $params['subTituloPresse'] = $this->_params['subTituloPresse'];
                    $params['linkMostrarPresse'] = $this->_params['linkMostrarPresse'];
                    
                    $paramsIdioma['tituloPresseIdioma'] = $this->_params['tituloPresse'];
                    $paramsIdioma['subTituloPresseIdioma'] = $this->_params['subTituloPresse'];
                    $paramsIdioma['linkMostrarPresseIdioma'] = $this->_params['linkMostrarPresse'];
                    
                    $paramsIdioma['idPresse'] = $modelPresse->insertPresse($params);
                    $modelPresse->insertPresseIdioma($paramsIdioma);
                $this->cleanCache();
                $this->_redirect('/admin/presse/');
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
            $formulario->getElement('imgPresse')->setRequired(false);
            $formulario->getElement('linkPresse')->setRequired(false);
            if ($formulario->isValid($this->_params)) {
                
                $editPrese = false;
                if (!is_array($formulario->imgPresse->getFileName())) {
                    $extn = pathinfo($formulario->imgPresse->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_Img_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imgPresse->getDestination() . '/' . $nameFile;
                    $formulario->imgPresse->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imgPresse->receive();
                    $this->redimencionarImagen($rutaFileAbs, '500', '500', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imgPresse->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($rutaFileAbsThums, '134', '176', 'crop');
                    $params['imgPresse'] = $nameFile;
                    @unlink($formulario->imgPresse->getDestination() . '/' . $dataPresse['imgPresse']);
                    @unlink($formulario->imgPresse->getDestination() . '/thums_' . $dataPresse['imgPresse']);
                    $dataPresse['imgPresse']=$nameFile;
                    $editPrese = true;
        
                }
                if (!is_array($formulario->linkPresse->getFileName())) {
                    $extn = pathinfo($formulario->linkPresse->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Press_' . time('H:i:s') . '.' . $extn;
                    $nameFileAbs = $formulario->linkPresse->getDestination() . '/' . $nameFile;
                    $formulario->linkPresse->addFilter('Rename', array('target' => $nameFileAbs, 'overwrite' => true));
                    $formulario->linkPresse->receive();
                    $params['linkPresse'] = $nameFile;
                    @unlink($formulario->imgPresse->getDestination() . '/' . $dataPresse['linkPresse']);
                    $dataPresse['linkPresse'] = $nameFile;
                    $editPrese = true;
                }
                    
                    $paramsIdioma['tituloPresseIdioma'] = $this->_params['tituloPresse'];
                    $paramsIdioma['subTituloPresseIdioma'] = $this->_params['subTituloPresse'];
                    $paramsIdioma['linkMostrarPresseIdioma'] = $this->_params['linkMostrarPresse'];
                    if($editPrese)
                    $modelPresse->editPresse($params, $this->_params['id']);
                    $modelPresse->editPresseIdioma($paramsIdioma,$this->_params['id'], $this->sessionAdmin->idiomaDetaful['idIdioma']);
                $this->cleanCache();
                $this->_redirect('/admin/presse/');
            }
        } else {
            $formulario->insertElment('tituloPresse', $dataPresse['tituloPresseIdioma']);
            $formulario->insertElment('subTituloPresse', $dataPresse['subTituloPresseIdioma']);
            $formulario->insertElment('linkMostrarPresse', $dataPresse['linkMostrarPresseIdioma']);
        }
        
        $this->view->rutaImagen = '/imagen-presse/' . $dataPresse['imgPresse'];
        $this->view->rutaFile = '/imagen-presse/' . $dataPresse['linkPresse'];
        $this->view->form = $formulario;
        
    }

    public function eliminarPresseAction(){
        $modelPresse = new Application_Model_Presse();
        $datosEliminar = $modelPresse->eliminarPresse($this->_params['id']);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $rutaPresse = $confUpload["rutaPresse"];
        unlink($rutaPresse.'/'.$datosEliminar['linkPresse']);
        unlink($rutaPresse.'/'.$datosEliminar['imgPresse']);
        unlink($rutaPresse.'/thums_'.$datosEliminar['imgPresse']);
        $this->cleanCache();
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }
    public function desactivarPresseAction(){
        $modelPresse = new Application_Model_Presse();
        $estado=$this->_params['estado']=='1'?'0':'1';
        $modelPresse->changeEstadoPresse($this->_params['id'],$estado);
        $this->cleanCache();
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }

    public function adminSubMenuAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $data = $this->_menuObj->getMenu($this->sessionAdmin->idiomaDetaful['idIdioma'], 6);
        $this->view->data = $data;
    }
        public function adminPageAction() {
        $this->view->modulo = 9;
        $modelMenu = new Application_Model_Menu();
        $this->view->listaMenu = $modelMenu->listarMenuCms(9, $this->sessionAdmin->idiomaDetaful['idIdioma']);
    }


}

