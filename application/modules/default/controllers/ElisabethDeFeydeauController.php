<?php
class Default_ElisabethDeFeydeauController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 6);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
        $this->view->classBody = 'lyt_elisafey_bio';
    }
    
    public function indexAction()
    {
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modelBio = new Application_Model_Biografia();
        $this->view->bio = $modelBio->listarBiografiaPorIdioma($this->_params['lang']);
        $this->view->fotos = $modelBio->listarFotosBiografia();
        //print_r($this->view->fotos);
    }
    public function ouvragesAction()
    {
        $this->view->classBody = 'lyt_elisafey_ouvrages';
        $modelObras = new Application_Model_Obra();
        $this->view->dataObras = $modelObras->listarObraPorIdioma($this->_params['lang']);
        
    }
    public function realisationsAction()
    {
        
    }
    public function blogEtPhotosAction()
    {
        $this->view->classBody = 'lyt_elisafey_fotos fancyBox';
        
        
    }
    
}

