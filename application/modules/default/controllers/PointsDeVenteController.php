<?php

class Default_PointsDeVenteController extends ZExtraLib_Controller_Action
{
    private $_listaPais;
    
    public function init() {
        parent::init();
        $this->view->headLink()->appendStylesheet("/f/css/jquery.fancybox-1.3.4.css");
        $this->view->headScript()->appendFile('/f/js/jquery.fancybox-1.3.4.pack.js');

        $this->view->classBody = 'lyt_pointvente fancyBox';
        $modePais = new Application_Model_Pais();
        $this->view->listaPais = $modePais->listarPaisPorIdioma($this->_params['lang']);
        $this->_listaPais = $this->view->listaPais;

    }
    public function indexAction() {
        if ($this->_params['val']!='') {
            $array = explode('-',$this->_params['val']);
            $this->view->itemSelect = $array[(count($array)-1)];
        } else {
            $arrayKey = array_keys($this->_listaPais);
            $this->view->itemSelect = $arrayKey[0];
        }
        $modelPuntoVenta = new Application_Model_PuntoVenta();
        $this->view->listaPuntoVenta = $modelPuntoVenta->listarPuntoVentaPorIdioma($this->_params['lang'], $this->view->itemSelect);
    }
    public function internetAction(){
        $modelPuntoVenta = new Application_Model_PuntoVenta();
        $this->view->listaPuntoVenta = $modelPuntoVenta->listarPuntoVentaConPortal();
        
    }
}

