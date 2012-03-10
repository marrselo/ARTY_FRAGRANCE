<?php

class Admin_PaisesController extends ZExtraLib_Controller_Action {

    private $_puntoventa;
    public $_default;
    public $_pais;
    public function init() {
        parent::init();

        $this->_puntoventa = new Application_Model_PuntoVenta;
     
        $this->pointventa = new Application_Model_PuntoVenta();
        
        $this->_pais = new Application_Model_Pais();
        
    }

    public function indexAction() {
        $this->view->data = $this->_pais->listaPais();
    }

    public function editarAction() {
        $idIdioma = $this->view->idiomaDefault['idIdioma'];
        $pais = new Application_Model_Pais();
        $this->view->colPais = $pais->listarPaisPorIdioma($this->view->idiomaDefault['PrefIdioma']);

        $idPtoVenta = (!empty($this->params['idPtoVenta'])) ? $this->params['idPtoVenta'] : '';
        if ($idPtoVenta == "") {
            $idPtoVenta = $this->session->idPtoVenta;
        } else {
            $this->session->idPtoVenta = $idPtoVenta;
        }

        $this->view->detallePtoVenta = $this->pointventa->detallePuntoVentaIdioma($idPtoVenta, $idIdioma);
        if ($this->_request->isPost()) {
            $post = $this->getRequest()->getParams();
            
            $this->_puntoventa->updatePointVenta($post, $this->_default);
            $this->_redirect('/admin/pointventa/index');
           /*
            $params = $this->_getAllParams();

            $idPuntoVenta = $params['idPuntoVenta'];
            $idPuntoVentaIdioma = $params['idPuntoVentaIdioma'];
            $data = array();
            $data2 = array();

            $data['idIdioma'] = $params['idIdioma2'];
            $data['nombrePuntoVenta'] = $params['nombrePuntoVenta'];
            $data['direccionWebPuntoVenta'] = $params['web'];
            
            $data2['direccionPuntoVenta'] = $params['direccionPuntoVenta'];
            $data2['telefonoPuntoVenta'] = $params['telefono'];
            
            
            $ptoVentaIdioma->modificarPtoVentaIdioma($data, $idPuntoVentaIdioma);
            if ($params['idmDefault']['idIdioma'] == $params['idIdioma2']) {
                $data2['idPais'] = $params['idPais'];
                $data2['idCiudad'] = $params['idCiudad'];
                $data2['nombrePuntoVenta'] = $data['nombrePuntoVenta'];
                $data2['direccionWebPuntoVenta'] = $params['web'];
                $this->pointventa->modificarPtoVenta($data2, $idPtoVenta);
            }
            $this->_redirect('/admin/pointventa/index');*/
        }
        //$this->view->detallePtoVenta[0]['idPais'];
    }

    function newPointAction() {

        if (!empty($_POST)) {

            $action = $this->_puntoventa->insertarPtoVenta($_POST);
            if ($action == '1')
                $this->_redirect('/admin/pointventa/index/idMenu/7');
        }else {
            $idIdioma = $this->view->idiomaDefault['idIdioma'];
            $pais = new Application_Model_Pais();
            $this->view->colPais = $pais->listarPaisPorIdioma($this->view->idiomaDefault['PrefIdioma']);
        }
    }
    
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $case = $this->_getParam('case',0);
        
        switch ($case):
            case 'delete':
                $action = $this->_puntoventa->deleteData($_POST);
                echo $action;
                break;
        endswitch;
    }

}
