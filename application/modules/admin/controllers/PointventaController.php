<?php

class Admin_PointventaController extends ZExtraLib_Controller_Action {

    private $_puntoventa;
    private $_default;
    private $_imagenpunto;
    private $_param;
    
    public function init() {
        parent::init();
        $this->_articulo = new Application_Model_Articulo();
        $this->_puntoventa = new Application_Model_PuntoVenta;
        //print_r($this->view->idiomaDefault);exit;
        $this->pointventa = new Application_Model_PuntoVenta();
        $this->_param = $this->_getAllParams();
        $this->view->params = $this->_param;
    }

    public function indexAction() {
        $this->view->colPointventa = $this->pointventa->listarPuntoVenta();
    }

    public function editarAction() {        
        $pais = new Application_Model_Pais();
        $ciudad = new Application_Model_Ciudad();
        //$this->params['ciudad'],$this->sessionAdmin->idiomaDetaful
        $this->view->colPais = $pais->listarPaisPorIdioma($this->sessionAdmin->idiomaDetaful['PrefIdioma']);
        $dtaPoint = $this->_puntoventa->returnPaisPuntoVenta($this->_param['idPtoVenta']);
        
        $dtaCiudad = $ciudad->getCiudadIdioma($dtaPoint['idPais'],$this->sessionAdmin->idiomaDetaful['idIdioma'],1);
        $this->view->dtaCiudad = $dtaCiudad;
        //$idPtoVenta = (!empty($this->params['idPtoVenta'])) ? $this->params['idPtoVenta'] : '';
        $this->view->detallePtoVenta = $this->pointventa->detallePuntoVentaIdioma($this->_param['idPtoVenta'], $this->sessionAdmin->idiomaDetaful['idIdioma']);
        if ($this->_request->isPost()) {
            $post = $this->getRequest()->getParams();
            $post['default'] = $this->_param['idmDefault']['idIdioma'];
            $this->_puntoventa->updatePointVenta($post, $this->sessionAdmin->idiomaDetaful['idIdioma']);
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
        $form = new Application_Form_FormImg();
        $this->view->form = $form;
        
        $idIdioma = $this->view->idiomaDefault['idIdioma'];
        $pais = new Application_Model_Pais();
        $this->view->colPais = $pais->listarPaisPorIdioma($this->sessionAdmin->idiomaDetaful['PrefIdioma']);
        if ($this->_request->isPost()) {            
            $extn = pathinfo($form->imagenPuntoVenta->getFileName(), PATHINFO_EXTENSION);
            $idArticulo = $this->_articulo->maxIdPuntoventa();
            $form->imagenPuntoVenta->addFilter(new Zend_Filter_File_Rename(
                            array('target' => 'puntoventa-' . $idArticulo . '.' . $extn)));            
            
            $post = $this->getRequest()->getParams();           
            
            $post["imagenPuntoVenta"] = 'puntoventa-' . $idArticulo . '.' . $extn;            
            $form->imagenPuntoVenta->receive();
            
            $action = $this->_puntoventa->insertarPtoVenta($post);
            if ($action == '1')
                $this->_redirect('/admin/pointventa/index/idMenu/7');
            
        }
            
        
    }
    
    public function imagesAction(){
        $punto = $this->_getParam('idPtoVenta', 0);
        $this->view->idpunto = $punto;
        if(!empty($_FILES)):
            $post = $this->getRequest()->getParams();
            $post['idPtoVenta'] = $punto;
            $this->_puntoventa->saveImagen($post);
            //$num = $this->_puntoventa->newIdFotoVenta();
            $this->_redirect($this->getRequest()->getRequestUri());
            
        endif;
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
                $action = $this->_puntoventa->deleteData($post);
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
    
    public function htmlImagenes(array $data = array()){
        $html = ''; $i = 1;
        if(!empty($data)):
            $html .= '<ul>';
            foreach ($data as $value) {
                if($i % 8 == 0):
                    //$html .= ($i > 5 ) ? '</ul>':'';
                    $html .= '</ul><ul>';
                endif;
                $html .= '<li style="float:left; width:70px; height:60px;  margin:2px;">';
                $html .= '<img  width="60px" style="float:left; border-top:15px;  margin:0px;"  src="' . $this->view->baseUrl() . '/imgPuntoVenta/' . $value['nombreFotoPuntoVenta'] . '">
                    <div title="Eliminar" style="border: solid 1px #000; 
                        width: 15px; 
                        height: 15px; 
                        background: #CF6E37; 
                        text-align: center; 
                        cursor: pointer;
                        color: #ffffff;
                        font-weight: bold;
                        position: absolute" id="elminarFoto-' . $value['idFotoPuntoVenta'] . '">X</div>';
                $html .= '</li>';
                $i++;
            }
            $html.= '</ul>';
        endif;
        
        return $html;
    }
    
    public function comboHtml($data){
        $html = '<option value=""> - Seleccionar - </option>';
        foreach ($data as $value) {
            $html .= '<option value="' . $value['idCiudad'] . '">';
            $html .= $value['nombreCiudadIdioma'] . '</option>';
        }
        return $html;
    }
}
