<?php

class Admin_PassController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        $formulario=new Application_Form_FormPass();
        $model=new Application_Model_Usuario();        
        if ($this->_request->isPost()) {

        if($formulario->isValid($this->_params)){
            $data=$model->listarUnUsuarioPorMail($this->_params['login']);
            $mail = new Zend_Mail();
            $mail->addTo($this->_params['login']);
            $mail->setSubject('Pass');
            $mail->setBodyHtml("Clave:".$data['password']);   // <-------
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
}
