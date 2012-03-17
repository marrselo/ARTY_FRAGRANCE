<?php

class Admin_RealisationsController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->view->mensaje = $this->_flashMessenger->getMessages();
        $modelRealisations = new Application_Model_Realisations();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaRealisations = $modelRealisations->listarRealisationsPorIdioma($idioma);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $this->view->destination = $confUpload["rutaRealisations"];
    }
    public function newRealisationAction() {
        $formulario = new Application_Form_FormRealisations();
        $modelRealisations = new Application_Model_Realisations();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                if (!is_array($formulario->imagen->getFileName())) {
                    $extn = pathinfo($formulario->imagen->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'Realisations_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imagen->getDestination() . '/' . $nameFile;
                    $formulario->imagen->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imagen->receive();
                    $this->redimencionarImagen($rutaFileAbs, '129', '150', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imagen->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($rutaFileAbsThums, '134', '176', 'crop');
                    $params['imagen'] = $nameFile;
                }
                    $params['title'] = $this->_params['title'];
                    $params['contenido'] = $this->_params['contenido'];
                    $params['link'] = $this->_params['link'];
                    $params['fechaRegistro'] = date('Y-m-d H:i:s');
                    $paramsIdioma['titleRealisationsIdioma'] = $this->_params['title'];
                    $paramsIdioma['contenidoRealisationsIdioma'] = $this->_params['contenido'];
                    $paramsIdioma['idRealisations'] = $modelRealisations->insertRealisations($params);
                    $modelRealisations->insertRealisationsIdioma($paramsIdioma);
                $this->cleanCache();
                $this->_redirect('/admin/realisations/');
            }
        } else {

        }
        $this->view->form = $formulario;
    }

    public function editRealisationAction() {
        $formulario = new Application_Form_FormRealisations();
        $modelRealisations = new Application_Model_Realisations();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $dataRealisations = $modelRealisations->listarRealisationsPorIdiomaDetalle($idIdioma, $this->_params['id']);
        if ($this->_request->isPost()) {
            $formulario->getElement('imagen')->setRequired(false);
            if ($formulario->isValid($this->_params)) {
                $editPrese = false;
                if (!is_array($formulario->imagen->getFileName())) {
                    $extn = pathinfo($formulario->imagen->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'realisations_' . time('H:i:s') . '.' . $extn;
                    $rutaFileAbs = $formulario->imagen->getDestination() . '/' . $nameFile;
                    $formulario->imagen->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    $formulario->imagen->receive();
                    $this->redimencionarImagen($rutaFileAbs, '129', '150', 'crop');
                    $nameThums = 'thums_' . $nameFile;
                    $rutaFileAbsThums = $formulario->imagen->getDestination() . '/' . $nameThums;
                    copy($rutaFileAbs, $rutaFileAbsThums);
                    $this->redimencionarImagen($ruitaFileAbsThums,  '50', '50', 'crop');
                    $params['imagen'] = $nameFile;
                    @unlink($formulario->imagen->getDestination() . '/' . $dataRealisations['imagen']);
                    @unlink($formulario->imagen->getDestination() . '/thums_' . $dataRealisations['imagen']);
                    $dataRealisations['imagen']=$nameFile;
                    $editPrese = true;
                }
                    $params['link'] = $this->_params['link'];
                    $paramsIdioma['titleRealisationsIdioma'] = $this->_params['title'];
                    $paramsIdioma['contenidoRealisationsIdioma'] = $this->_params['contenido'];
                    
                    if($editPrese)
                    $modelRealisations->editRealisations($params, $this->_params['id']);
                    $modelRealisations->editRealisationsIdioma($paramsIdioma,$this->_params['id'], $this->sessionAdmin->idiomaDetaful['idIdioma']);
                $this->cleanCache();
                $this->_redirect('/admin/realisations/');
            }
        } else {
            $formulario->insertElment('title', $dataRealisations['titleRealisationsIdioma']);
            $formulario->insertElment('contenido', $dataRealisations['contenidoRealisationsIdioma']);
            $formulario->insertElment('link', $dataRealisations['link']);
        }
        
        $this->view->rutaImagen = '/Realisations/' . $dataRealisations['imagen'];
        $this->view->form = $formulario;
        
    }

    public function eliminarRealisationsAction(){
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        $modelRealisations = new Application_Model_Realisations();
        $dataRealisations = $modelRealisations->listarRealisationsPorIdiomaDetalle($this->sessionAdmin->idiomaDetaful['idIdioma'], $idRealisations);
        unlink($confUpload["rutaRealisations"].'/'.$dataRealisations['imagen']);
        $modelRealisations->eliminarRealisation($this->_params['id']);
        $this->_redirect('/admin/realisations/');
    }

    public function adminSubMenuAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $data = $this->_menuObj->getMenu($this->sessionAdmin->idiomaDetaful['idIdioma'], 6);
        $this->view->data = $data;
    }

}

