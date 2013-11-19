<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting import class
 *  
 */
$url_manager = array(
    'urlFormat' => 'path',
    'showScriptName' => false,
    'rules' => array(
        //*****************************For Front End url Configuration****************************************/
        '' => '/site/index',
        'contacts' => '/site/contact',
        'admin' => '/site/login',
        'login' => '/site/login',
        'clients' => '/site/clients',
        'cranesWanted' => '/site/wanted',
        'services' => '/site/services',
        'about' => '/site/about',
        'allProducts' => '/site/allProducts',
        'category/<cat_slug:[\w-\.]+>' => '/site/categoryProducts',
        // '<category:[\w-\.]+>/<slug:[\w-\.]+>/details' => '/site/productDetail',
        '<category:[\w-\.]+>/<slug:[\w-\.]+>/Detail' => '/site/productDetailBox',
        'division/<type:[\w-\.]+>' => '/site/division',
        /*         * *************************** Controllers and action formate ********* */
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
//$url_manager = array();
?>
