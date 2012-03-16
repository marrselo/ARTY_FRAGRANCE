<?php

class Admin_CreditController extends ZExtraLib_Controller_Action {

    private $_sesion;
    public function init() {
        parent::init();
        $this->idioma = new Application_Model_Idioma();
        $this->params = $this->_getAllParams();
        
        
        $this->_sesion = new Zend_Session_Namespace('web');
     
        if(isset($this->params['idlang'])):
            $default = $this->params['idmDefault']['idIdioma'];
            $idioma = $this->_getParam('idlang', $default);
            $this->_sesion->lg = $idioma;
            $dta = $this->idioma->getIdiomaSelect($this->_sesion->lg);
            $this->_sesion->name = $dta['NombreIdioma'];
            $this->_sesion->abr = $dta['PrefIdioma'];

        else:
            if(empty($this->_sesion->lg)){
                
                $this->_sesion->lg = $this->params['idmDefault']['idIdioma'];
                $this->_sesion->name = $this->params['idmDefault']['NombreIdioma'];
                $this->_sesion->abr = $this->params['idmDefault']['PrefIdioma'];

            }
        endif;
        
       
        $this->_articulo = new Application_Model_Articulo();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
      
        
        
        /*$this->params = $this->_getAllParams();
        
        $this->view->cboidioma = $this->idioma->getComboIdioma($this->params);*/
        
        foreach ($this->idioma->getAllIdiomas() as $ind => $val) {
            $colIdioma[$val['idIdioma']] = $val;
        };
        
        $this->view->colIdioma = $colIdioma; // $this->idioma->getAllIdiomas();
        
        $this->view->params = $this->params;

        $this->view->idiomaDefault = isset($this->params['idlang']) ?
                $colIdioma[$this->params['idlang']] :
                $this->params['idmDefault'];
        
        $this->view->idioma = $this->_sesion;
    }

    public function indexAction() {
        $credit = new Application_Model_Credit();
        $this->view->idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $this->view->credit = $credit->getCredits($this->view->idIdioma);               
    }

    public function editcreditAction() {
        $credit = new Application_Model_Credit();
        $idCredit = $this->_getParam('id', NULL);
        $form = new Application_Form_FormCredit();
        $this->view->form = $form;
        if ($idCredit) {
            $articulo = $credit->buscaCredit($idCredit);
            $form->populate($articulo);
            if ($this->_request->isPost()) {
                $params = $this->_getAllParams();                
                if ($form->isValid($params)) {
                    $values = $form->getValues();                    
                    if ($credit->updateCredit($values))
                        $this->_redirect('/admin/credit/index');
                    else
                        $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        }
        else
            $this->_redirect('/admin/credit');
    }
    
    public function newcreditAction() {
        $credit = new Application_Model_Credit();
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $form = new Application_Form_FormCredit();
        $this->view->form = $form;

        if ($this->_request->isPost()) {            
            $params = $this->_getAllParams();
            if ($form->isValid($params)) {
                $values = $form->getValues();
                $values["idIdioma"] = $idIdioma;
                if ($credit->insertCredit($values))
                    $this->_redirect('/admin/credit/');
                else
                    $this->view->msg = "ERROR EN ACTUALIZACIÓN";
            } else {
                $this->view->msg = "verifique los datos ingresados";
            }
        }
    }
    

}
