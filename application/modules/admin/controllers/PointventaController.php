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
        
        $idPtoVenta = (!empty($this->params['idPtoVenta']))? $this->params['idPtoVenta'] : '';                
        if( $idPtoVenta=="") { $idPtoVenta = $this->session->idPtoVenta; }else { $this->session->idPtoVenta = $idPtoVenta; }
        
        $this->view->detallePtoVenta = $this->pointventa->detallePuntoVentaIdioma($idPtoVenta,$idIdioma); 
         if ($this->_request->isPost() ){
             $params                       = $this->_getAllParams();
             
             $idPuntoVenta                 = $params['idPuntoVenta'];
             $idPuntoVentaIdioma           = $params['idPuntoVentaIdioma'];
             $data     = array();
             $data2    = array();
             
             $data['idIdioma']             = $params['idIdioma2'];
             $data['nombrePuntoVenta']     = $params['nombrePuntoVenta'];
             $data2['direccionPuntoVenta'] = $params['direccionPuntoVenta'];
             $data2['telefonoPuntoVenta']            = $params['telefono'];
             $data['direccionWebPuntoVenta']= $params['web']; 
             $ptoVentaIdioma                = new Application_Model_PuntoVentaIdioma();
             $ptoVentaIdioma->modificarPtoVentaIdioma($data,$idPuntoVentaIdioma);             
             if($params['idmDefault']['idIdioma']==$params['idIdioma2'])
             {
                 $data2['idPais']                = $params['idPais'];
                 $data2['idCiudad']              = $params['idCiudad'];
                 $data2['nombrePuntoVenta']      = $data['nombrePuntoVenta'];
                 $data2['direccionWebPuntoVenta']= $params['web'];
                 echo  $idPuntoVenta  ;
                 print_r($data2);
                 $this->pointventa->modificarPtoVenta($data2,$idPtoVenta);
                 exit;
             }
             $this->_redirect('/admin/pointventa/index');
         }
        //$this->view->detallePtoVenta[0]['idPais'];
    }
    
}
