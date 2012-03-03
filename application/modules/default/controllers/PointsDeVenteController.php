<?php

class Default_PointsDeVenteController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->view->classBody = 'lyt_pointvente fancyBox';
        $modePais = new Application_Model_Pais();
        $this->view->listaPais = $modePais->listarPaisPorIdioma($this->_params['lang']);

    }
    public function indexAction() {
        
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
        $modelPuntoVenta = new Application_Model_PuntoVenta();
        $this->view->listaPuntoVenta = $modelPuntoVenta->listarPuntoVentaPorIdioma($this->_params['lang'], $this->view->itemSelect);
        //($this->view->listaPuntoVenta);
        
        
    }
    public function internetAction(){
        
    }
}

