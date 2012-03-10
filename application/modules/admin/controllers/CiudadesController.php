<?php

class Admin_CiudadesController extends ZExtraLib_Controller_Action {

    public $_pais;
    private $_ciudad;
    private $_sesion;
    public $_default;
    public function init() {
        parent::init();
        $this->_pais = new Application_Model_Pais();
        $this->_pais = new Application_Model_Pais();
        $this->idioma = new Application_Model_Idioma();
        $this->_ciudad = new Application_Model_Ciudad;
        $this->params = $this->_getAllParams();
        $this->_default = $this->params['idmDefault']['idIdioma'];
        
        $this->_sesion = new Zend_Session_Namespace('web');
     
        if(isset($this->params['idlang'])):
            $default = $this->params['idmDefault']['idIdioma'];
            $idioma = $this->_getParam('idlang', $default);
            $this->_sesion->lg = $idioma;

            $dta = $this->idioma->getIdiomaSelect($this->_sesion->lg);
            $this->_sesion->name = $dta['NombreIdioma'];
            $this->_sesion->abr = $dta['PrefIdioma'];

        else:
            if(empty($this->_sesion->lg)){
                
                $this->_sesion->lg = $this->params['idmDefault']['idIdioma'];
                $this->_sesion->name = $this->params['idmDefault']['NombreIdioma'];
                $this->_sesion->abr = $this->params['idmDefault']['PrefIdioma'];

            }
        endif;
        
        $this->view->idioma = $this->_sesion;
    }

    public function indexAction() {

        $this->view->data = $this->_pais->listaPais();
    }

    public function listaCiudadesAction(){
        $this->view->data = $this->_ciudad->getListaCiudad($this->params['id']);
    }
            
    public function editarPaisAction() {
        
        //$this->view->detallePtoVenta = $this->pointventa->detallePuntoVentaIdioma($id, $idIdioma);
        if ($this->_request->isPost()) {
            $post = $this->getRequest()->getParams();
            $this->_pais->updatePais($post, $this->_default);
            $this->_redirect('/admin/paises/');
       
        }else{
            $this->params = $this->_getAllParams();

            $idIdioma = $this->params['idmDefault'];

            $this->view->colPais = $this->_pais->listarPaisPorIdioma($this->_sesion->lg);

            $data = $this->_pais->getPais($this->params['id'],$this->_sesion->lg);
            $this->view->data = $data;
            
            foreach ($this->idioma->getAllIdiomas() as $ind => $val) {
                $colIdioma[$val['idIdioma']] = $val;
            };
            
            $this->view->params = $this->params;
            $this->view->colIdioma = $colIdioma; // $this->idioma->getAllIdiomas();
        }
        //$this->view->detallePtoVenta[0]['idPais'];
    }

    function newPaisAction() {

        if (!empty($_POST)) {

            $action = $this->_pais->insertData($_POST);
            if ($action == '1')
                $this->_redirect('/admin/paises/');
        }else {
            $idIdioma = $this->params['idmDefault'];

            $this->view->colPais = $this->_pais->listarPaisPorIdioma($this->_sesion->lg);
        }
    }
    
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $case = $this->_getParam('case',0);
        
        switch ($case):
            case 'delete':
                $action = $this->_pais->deleteData($_POST);
                echo $action;
                break;
        endswitch;
    }

}