<?php

class Admin_SitesController extends ZExtraLib_Controller_Action
{
    protected $_params;
    protected $_sites;
    public function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        $this->_sites = new Application_Model_Site();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;
        
               
       //print_r($this->view->idiomaDefault);exit;
        
    }
    public function indexAction()
    {
        //$this->view->itemSelect=19;
        $modelSite = new Application_Model_Site();
        $this->view->dataSite = $modelSite->ListarSiteA($this->_params['lang']);       
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
    public function newSiteAction() {
        
    $formulario = new Application_Form_FormSite();
    $modelObra = new Application_Model_Site();
    $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    echo $idioma;
    if ($this->_request->isPost()) {
       
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        /*$dataIdioma = array(
            'anioObra'=>$this->_params['nombreSite'],
            'tituloObra'=>$this->_params['tituloObra'],
            'parrafoObra'=>$this->_params['parrafoObra'],
            'link'=>$this->_params['link'],
            'imgObra'=>$arrayImagenes[0],
            'estadoObra'=>1
                );*/
        $dataIdioma=$formulario->getValues();
        $idObra = $modelObra->insertSite($dataIdioma);
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
        $this->_redirect('/admin/sites');
    }else{
        
    }
    
    }
    $this->view->form = $formulario;
        
    }
    public function editSiteAction(){
    $formulario = new Application_Form_FormSite();
    $modelObra = new Application_Model_Site();
    //$idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    $datosObra = $modelObra->listarDatosSite($this->_params['id']);
    $formulario->insertId('idSite', $datosObra['idSite']);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        /*$dataObraIdioma = array(
            'tituloObraIdioma'=>$this->_params['tituloObra'],
            'parrafoObraIdioma'=>$this->_params['parrafoObra'],
            );*/
        $dataObraIdioma=$formulario->getValues();
        $modelObra->updateSite($dataObraIdioma, $this->_params['idSite']);
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
        $this->_redirect('/admin/sites');
    }    
    }else{
        /*$formulario->insertElment('nombreSite', $datosObra['anioObra']);
        $formulario->insertElment('tituloObra', $datosObra['tituloObraIdioma']);
        $formulario->insertElment('link', $datosObra['link']);
        $formulario->insertElment('parrafoObra', $datosObra['parrafoObraIdioma']);
        $formulario->insertElment('parrafoObra', $datosObra['parrafoObraIdioma']);*/
        $formulario->populate($datosObra);
    }
    $this->view->form = $formulario;
    }
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $case = $this->_getParam('case',0);
        $post = $this->getRequest()->getParams();
        switch ($case):
             case 'listaImg':
                $id = $this->_getParam('id', 0);
                $data = $this->_puntoventa->listaImagenes($id);
                $html =  $this->htmlImagenes($data);
                echo $this->_helper->json($html);
                break;
             case 'deleteImg':
                $data = $this->_puntoventa->getPuntoVentaUni($post);
                $action = $this->_puntoventa->deleteImagen($post);
                if($action == 1):
                    $fc = Zend_Controller_Front::getInstance();
                    $confUpload = $fc->getParam('bootstrap')->getOption('upload');
                    unlink(realpath($confUpload['puntoventa']) .'/'. $data['nombreFotoPuntoVenta']);
                    echo '1';
                else:
                    echo '0';
                endif;
                break;
         
            case 'delete':
                $action = $this->_sites->deleteSite($post);
                echo $action;
                break;
            
            case 'comboPais':
                $ciudad = new Application_Model_Ciudad();
                $dtaCiudad = $ciudad->getCiudadIdioma($post['id'],$this->sessionAdmin->idiomaDetaful['idIdioma'],1);
                $html = $this->comboHtml($dtaCiudad);
                echo $html;
                break;
        endswitch;
    }
    
}
