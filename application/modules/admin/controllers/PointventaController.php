<?php

class Admin_PointventaController
        extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
        
        $this->idioma = new Application_Model_Idioma();
        foreach($this->idioma->getAllIdiomas() as $ind => $val){
            $colIdioma[$val['idIdioma']] = $val;
        };
        $this->view->colIdioma =$colIdioma; // $this->idioma->getAllIdiomas();
        $this->params = $this->_getAllParams();       
       
        $this->view->params = $this->params;
        
        $this->view->idiomaDefault = isset($this->params['idlang'])? 
                                    $colIdioma[$this->params['idlang']] : 
                                     $this->params['idmDefault'];
        //print_r($this->view->idiomaDefault);exit;
        $this->pointventa = new Application_Model_PuntoVenta();
        
    }
    public function indexAction()
    {
        
        $this->view->colPointventa = $this->pointventa->listarPuntoVenta();
    }
    public function editarAction()
    {
        $idIdioma = $this->view->idiomaDefault['idIdioma']; 
        $pais = new Application_Model_Pais();
        $this->view->colPais = $pais->listarPaisPorIdioma($this->view->idiomaDefault['PrefIdioma']);               
        $this->view->detallePtoVenta = $this->pointventa->detallePuntoVentaIdioma
                                       ($this->params['idPtoVenta'],$idIdioma);  
        
        //$this->view->detallePtoVenta[0]['idPais'];
       // print_r($this->view->detallePtoVenta); exit;
    }

}
