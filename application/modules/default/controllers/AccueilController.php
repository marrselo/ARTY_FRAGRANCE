<?php
class Default_AccueilController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        
        $modelActualites = new Application_Model_Actualites();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaActualites = $modelActualites->listarActualitesPorIdioma($this->_params['lang']);
        $modelRealisations = new Application_Model_Realisations();
        $this->view->listaNovedades = $modelRealisations->listarRealisationsPorIdioma($this->_params['lang'],1);

        
        
        $this->view->classBody = 'lyt_home';
        $this->view->placeholder('main_slide')->set('
            <div id="main_slide" class=" layout_fluid">
                <div id="slide" class="item layout_fluid_inner" >
                    <div class="overview">
                        <div id="" class="item_slide">
                            <img src="/f/img/temp/img_slide.jpg" />
                        </div>
                        <div id="" class="item_slide">
                            <img src="/f/img/temp/img_slide.jpg" />
                        </div>		
                    </div>
                </div>		
            </div> ');
    }
}

