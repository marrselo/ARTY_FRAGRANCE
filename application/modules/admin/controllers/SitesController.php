<?php

class Admin_SitesController extends ZExtraLib_Controller_Action
{
    private $_params;
    public function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        //$this->_params = $this->pa
        
               
       //print_r($this->view->idiomaDefault);exit;
        
    }
    public function indexAction()
    {
       
       
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
                 $this->pointventa->modificarPtoVenta($data2,$idPtoVenta);

             }
             $this->_redirect('/admin/sites/index');
         }
        //$this->view->detallePtoVenta[0]['idPais'];
    }
    
}
