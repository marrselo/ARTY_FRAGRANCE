<?php

class Admin_SitesController extends ZExtraLib_Controller_Action
{
    protected $_params;
    protected $_sites;
    public function init() {
        parent::init();
        $this->modulo = new Application_Model_Modulo();
        $this->_sites = new Application_Model_Site();
        $this->_tiposites = new Application_Model_TipoSite();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;
        
               
       //print_r($this->view->idiomaDefault);exit;
        
    }
    public function indexAction()
    {
        //$this->view->itemSelect=19;
        $modelSite = new Application_Model_Site();
        $this->view->dataSite = $modelSite->ListarSiteA($this->sessionAdmin->idiomaDetaful['PrefIdioma']);       
    }
    public function newSiteAction() {
    $formulario = new Application_Form_FormSite($this->sessionAdmin->idiomaDetaful['idIdioma']);
    $modelObra = new Application_Model_Site();
    $modelTipoSite = new Application_Model_TipoSite();
    
    /*$idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    $datosIdioma =$modelTipoSite->listarTipoSite($idioma);
    $arraySelec = array();
    foreach ($datosIdioma as $index){
        $arraySelec[$index['idTipoSite']]=$index['nombreTipoSite'];
    }
    $formulario->insertMultiOption('idTipoSite', $arraySelec);*/
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
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
    $modelObra = new Application_Model_Site();
    //$idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    $formulario = new Application_Form_FormSite($this->sessionAdmin->idiomaDetaful['idIdioma']);
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
            case 'deletetipo':
                $action = $this->_tiposites->deleteTipoSite($post);
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
    public function tipoSiteAction()
    {
        $this->view->mensaje = $this->_flashMessenger->getMessages();
        $modelObra = new Application_Model_TipoSite();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->dataObra = $modelObra->listarTipoSitePorIdioma($idioma);
    }
    public function newTipoSiteAction() {
        
    $formulario = new Application_Form_FormTipoSite();
    $modelObra = new Application_Model_TipoSite();
    $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    echo $idioma;
    if ($this->_request->isPost()) {
       
    if($formulario->isValid($this->_params)){
        $this->cleanCache();        
        /*$dataIdioma = array(
            'anioObra'=>$this->_params['anioObra']
                );*/
        $dataIdioma=$formulario->getValues();
        $idObra = $modelObra->insertTipoSite($dataIdioma);
        
        $dataObra = array(
            'nombreIdiomaTipoSite'=>$this->_params['nombreTipoSite'],
            'idTipoSite'=>$idObra
            );
        
        $modelObra->insertTipoSiteIdioma($dataObra);
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
        $this->_redirect('/admin/sites/tipo-site');
    }else{
        
    }
    
    }
    $this->view->form = $formulario;
        
    }
      public function editTipoSiteAction(){
    $formulario = new Application_Form_FormTipoSite();
    $modelObra = new Application_Model_TipoSite();
    $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    $datosObra = $modelObra->listarDatosTipoSite($this->_params['id'],$idioma);
    $formulario->insertId('idTipoSite', $datosObra['idTipoSite']);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        /*$dataObraIdioma = array(
            'tituloObraIdioma'=>$this->_params['tituloObra'],
            'parrafoObraIdioma'=>$this->_params['parrafoObra'],
            );*/
        //$dataObraIdioma=$formulario->getValues();
        $dataValue= array('nombreIdiomaTipoSite'=>$this->_params['nombreTipoSite']);
        $modelObra->updateTipoSite($dataValue, $this->_params['idTipoSite'],$idioma);
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
        $this->_redirect('/admin/sites/tipo-site');
    }    
    }else{
        $formulario->insertElment('nombreTipoSite', $datosObra['nombreIdiomaTipoSite']);
    }
    $this->view->form = $formulario;
    }
      public function recomendSiteAction(){
    $formulario = new Application_Form_FormRecomendSite();
    $modelObra = new Application_Model_ModRecomendarSite();
    $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
    $datosObra = $modelObra->listarModRecomendarSitePorIdioma($idioma);
    if(is_array($datosObra))
        $formulario->populate($datosObra); 
    $formulario->insertId('idIdioma', $this->sessionAdmin->idiomaDetaful['idIdioma']);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        $dataObraIdioma=$formulario->getValues();
        if(is_array($datosObra))
            $modelObra->updateRecomendSite($dataObraIdioma, $this->sessionAdmin->idiomaDetaful['idIdioma']);
        else
            $modelObra->insertRecomendSite($dataObraIdioma);
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
    }    
    }
    $this->view->form = $formulario;
    }
}
