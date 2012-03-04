<?php

require_once 'Zend/Cache.php';
require_once 'Zend/Registry.php';

class ZExtraLib_PageCache
{
    const CACHE_NAME = 'PageCache';

    public static function getCache()
    {
        return Zend_Cache::factory(
                        'Page', 
                        'File', 
                        array(
                    'lifetime' => 30, //30 segundos
                    'automatic_serialization' => true,
                            'debug_header' => false,
                        'default_options' => array(
                        'make_id_with_get_variables' => true, //true
                        'cache_with_cookie_variables' => true,
                        'cache_with_post_variables' => true,
                        'cache_with_get_variables' => true,
                        'cache_with_session_variables' => false,
                        'cache_with_files_variables' => false
                    ),
                    'regexps' => array(
                        '^/*' => array('cache' => true),
                        '^/anunciante/' => array('cache' => true),
                        '^/default/' => array('cache' => true),
                        '^/admin/' => array('cache' => true),
                        '^/test/' => array('cache' => true),
                        '^/auth/' => array('cache' => true)
                    )
                        ), array(
                    'cache_dir' => APPLICATION_PATH . '/../var/cache'
                        )
        );
    }

}