<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function __construct($app) {
        parent::__construct($app);
        date_default_timezone_set('America/Lima');
        $this->bootstrap('multidb');
        $db = $this->getPluginResource('multidb')->getDb('db');
        Zend_Db_Table::setDefaultAdapter($db);
        Zend_Registry::set('db', $db);
        Zend_Form::setDefaultTranslator(new Zend_Translate('array',
                        APPLICATION_PATH . '/configs/lang/es.php',
                        'es'));
        $response = new Zend_Controller_Response_Http();
        $response->setHeader('Content-Type', 'text/html; charset=utf-8')
                ->setHeader('Accept-Encoding', 'gzip, deflate')
                ->setHeader('Expires', 'max-age=' . 20, true)
                ->setHeader('Cache-Control', 'private', 'must-revalidate')
                ->setHeader('Pragma', 'no-cache', true);

        $this->bootstrap('cachemanager');
        $cache = $this->getResource('cachemanager')->getCache('cacheCoreFile');
        Zend_Registry::set('cache', $cache);
        $this->bootstrap('mail');
        Zend_Mail::setDefaultTransport($this->getResource('mail'));
        Zend_Registry::set('mail', new Zend_Mail('utf-8'));
//        print_r($this->getResourceLoader()->getResourceTypes());
    }
    
    protected function _initRoutes()
    {
        }

    

}

