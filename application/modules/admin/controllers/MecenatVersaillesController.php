<?php

class Admin_MecenatVersaillesController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }
    public function indexAction() {
        $formulario = new Application_Form_FormHistoria();
        $modelHistoria = new Application_Model_Historia();
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $dataInfo = array(
                    'linkHistory' => $this->_params['linkHistory'],
                    'contenidoHistory' => $this->_params['contenidoHistory'],
                    'idIdioma' => $this->sessionAdmin->idiomaDetaful['idIdioma']
                );
                $modelHistoria->InsertInfoHistoria(
                        $dataInfo, $this->sessionAdmin->idiomaDetaful['idIdioma'], $this->sessionAdmin->idiomaDetaful['PrefIdioma']
                );
                /*if (count($this->sessionAdmin->imagenHistoria) > 0) {
                    $modelHistoria->InsertFotoHistoria($this->sessionAdmin->imagenHistoria);
                    $fc = Zend_Controller_Front::getInstance();
                    $confUpload = $fc->getParam('bootstrap')->getOption('upload');
                    if (count($this->sessionAdmin->imagenHistoriaPorEliminar) > 0) {
                        foreach ($this->sessionAdmin->imagenHistoriaPorEliminar as $index) {
                            unlink($confUpload['rutaHistoria'] . '/' . $this->sessionAdmin->imagenHistoria[$index]);
                        }
                    }
                }
                unset($this->sessionAdmin->imagenHistoria);
                unset($this->sessionAdmin->imagenHistoriaPorEliminar);*/
                $this->_redirect('/admin/mecenat-versailles/');
            }
        } else {
            $dataHistoria = $modelHistoria->listarHistoriaPorIdioma($this->sessionAdmin->idiomaDetaful['idIdioma']);
            if(is_array($dataHistoria))
            {
                unset($dataHistoria['idHistory']);
                $formulario->populate($dataHistoria);
            }
        }
        $this->view->form = $formulario; 
    }
    public function subirImagenesHistoriaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        switch ($this->_params['moduleAdmin']) {
            case 'history':
                $this->sessionAdmin->imagenHistoria =
                        $this->subirImagenes(
                        $confUpload['rutaHistoria'], 'img_mecenat_his_', $this->sessionAdmin->imagenHistoria, '404', '495');
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
            $nameSession = 'Error al subir el archivo';
        } else {
            $fileImagen = $adapter->getFileName();
            $modelHistoria = new Application_Model_Historia();
            $dataHistoria = $modelHistoria->listarHistoriaPorIdioma($this->sessionAdmin->idiomaDetaful['idIdioma']);
            $nameSession[]= $name . '.' . $extn;
            $imgname=$name . '.' . $extn;
            $modelHistoria->InsertFotoHistoria($imgname,$dataHistoria['idHistory'],$this->sessionAdmin->idiomaDetaful['idIdioma']);
            $this->redimencionarImagen($fileImagen, $width, $height, 'crop');
            if ($thums) {
                $nameThums ='thums_'.$name;
                copy($fileImagen,$destination . '/' . $nameThums . '.' . $extn);
                $this->redimencionarImagen($destination . '/' . $nameThums . '.' . $extn, $widthThums, $heightThums, 'crop');
            }
        }
        return $nameSession;
    } 
    public function eliminarFotoHistoriaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        //$this->sessionAdmin->imagenHistoriaPorEliminar[] = $this->_params['idImg'];
        //unset($this->sessionAdmin->imagenHistoria[$this->_params['idImg']]);
        $modelBio = new Application_Model_Historia();
        $img=$modelBio->listarFotoHistoria($this->_params['idImg']);
        $fc = Zend_Controller_Front::getInstance();
        $confUpload = $fc->getParam('bootstrap')->getOption('upload');
        unlink($confUpload['rutaHistoria'] . '/' . $img['nombreImgHistory']);
        $modelBio->DeleteFotoHistoria($this->_params['idImg'], $this->sessionAdmin->idiomaDetaful['idIdioma']);
    }
    public function listarImagenesHistoriaAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $modelBio = new Application_Model_Historia();
        $dataFotosBio = $modelBio->listarFotosHistoria($this->sessionAdmin->idiomaDetaful['idIdioma']);
        /*if (!isset($this->sessionAdmin->imagenHistoria) && count($dataFotosBio) > 0) {
            $this->sessionAdmin->imagenHistoria = array();*/
            foreach ($dataFotosBio as $index) {
                $dataFotosBio1[$index['idImgHistory']] = $index['nombreImgHistory'];
            }
        //}
        //if (isset($this->sessionAdmin->imagenHistoria) && count($this->sessionAdmin->imagenHistoria > 0)) {
        if (count($dataFotosBio1) > 0) {
            $html = $this->listarImagenes($dataFotosBio1, 'history');
            echo $this->_helper->json($html);
        }
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
    
}
