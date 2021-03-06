<?php
class Default_ElisabethDeFeydeauController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
                $this->view->headLink()->appendStylesheet("/f/css/jquery.fancybox-1.3.4.css");
        $this->view->headScript()->appendFile('/f/js/jquery.fancybox-1.3.4.pack.js');

        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 6);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
        $this->view->classBody = 'lyt_elisafey_bio slide';
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
        $this->view->classBody = 'lyt_news';
        $modelRealisations = new Application_Model_Realisations();
        $this->view->listaRealisations = $modelRealisations->listarRealisationsPorIdioma($this->_params['lang'],1);

        
    }
    public function blogEtPhotosAction()
    {
        $modelBlogFoto = new Application_Model_BlogFoto();
        $this->view->dataBlogFoto = $modelBlogFoto->listarBlogFotoPorIdioma($this->_params['lang']);
        $this->view->dataFotoBlogFoto = $modelBlogFoto->listarFotosBlogFoto();
        $this->view->classBody = 'lyt_elisafey_fotos fancyBox';
    }
            
    public function moduleContentAction() {
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
        $modelCms = new Application_Model_Cms();
        $this->view->contenido = $modelCms->listarCmsItemFront($this->view->itemSelect, 
                $this->_params['lang']);
    }

    
    
}

