<?php

class Admin_TestController
        extends ZExtraLib_Controller_Action
{
    function init() {
        parent::init();
        
        
    }
    function indexAction()
    {
      
    }
    function editorAction()
    {
            $editor=new ZExtraLib_Editor_CuteEditor($this->view->baseUrl().'/editor');
            $editor->ID="Editor1";
            $editor->Text="Type here";
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
            $this->view->editor = $editor->Draw();
    }


}

//class Admin_IndexController