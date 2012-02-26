<?php

class Admin_LoginController extends ZExtraLib_Controller_Action
{
    protected $_usuarioModel;
    
    function init() {
        parent::init();
        $this->_usuarioModel = new Application_Model_Usuario();

    }
    
        public function auth($usuario =NULL ,$password =NULL){
        if($usuario== NULL || $password == NULL){
         return false;   
        } else {
        $auth = Zend_Auth::getInstance();
        $adapter = new Zend_Auth_Adapter_DbTable($this->_usuarioModel->getAdapter(),
                    'usuario', 'login', 'password');
        $adapter->setIdentity($usuario);
        $adapter->setCredential($password);
        $resultAut = $auth->authenticate($adapter); 
        if($resultAut->isValid()){
            $userInfo = $adapter->getResultRowObject(null, 'password');
            $authStorage = $auth->getStorage();
            $authStorage->write($userInfo);
        }
            return $resultAut->isValid();
            }
        }
        
        public function indexAction(){
            $this->view->messages = $this->_flashMessenger->getMessages();
            $params =  $this->_request->getParams();
            $this->view->form = $form = $this->formLogin();
            if ($this->_request->isPost()) {
                if ($form->isValid($params)) {
                    if ($this->auth($params['login'], $params['password'],1)) {
                    $this->_redirect('/admin');
                    
                    } else {
                    $this->_flashMessenger->addMessage('Correo y/o contraseña incorrectos.');
                    $this->_redirect('/admin/login');
                    }

                }
            }
        }
        
        public function formLogin(){
            $form = new Zend_Form();
            $form->setMethod('Post');
            $form->addElement(new Zend_Form_Element_Text('login',array('required'=> true,'label'=>'Correo')));
            $form->addElement(new Zend_Form_Element_Password('password',array('required'=> true,'label'=>'Password')));
            $form->addElement(new Zend_Form_Element_Submit('Enviar'));
            return $form;
        }
    public function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/admin/login');
    }

}
?>
