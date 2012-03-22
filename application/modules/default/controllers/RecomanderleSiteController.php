<?php

class Default_RecomanderleSiteController extends ZExtraLib_Controller_Action
{
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 10);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;

    }
    public function indexAction()
    {
        $formulario=new Application_Form_FormRecomendSiteFront();
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modeRecomendate = new Application_Model_ModRecomendarSite();
        $this->view->modeRecomendate = $modeRecomendate->listarModRecomendarSitePorIdioma($this->_params['lang']);
        if ($this->_request->isPost()) {

        if($formulario->isValid($this->_params)){
            $mail = new Zend_Mail();
            $mail->addTo($this->_params['recipientemail'], $this->_params['recipientname']);
            $mail->setFrom($this->_params['youremail'], $this->_params['yourname']);
            $mail->setSubject('Recommendation');
            $mail->setBodyHtml($this->view->modeRecomendate['labelTextoModRecomendarSite']);   // <-------
            try {
            $mail->send();
            $this->_flashMessenger->addMessage('Se Envio Correctamente');            
            } catch (Zend_Mail_Exception $e) {
            $this->_flashMessenger->addMessage('No Se Envio Correctamente');
            }

            $this->_flashMessenger->addMessage('Se Registro Correctamente');
        }else{

        }

        }
        $this->view->form=$formulario;
    }
        public function moduleContentAction() {
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
        $modelCms = new Application_Model_Cms();
        $this->view->contenido = $modelCms->listarCmsItemFront($this->view->itemSelect, 
                $this->_params['lang']);
    }

}

