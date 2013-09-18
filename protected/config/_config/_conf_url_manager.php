<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting import class
 *  
 */
$url_manager = array(
    'urlFormat' => 'path',
    'showScriptName' => true,
    'rules' => array(
        //*****************************For Front End url Configuration****************************************/
        '' => '/site/index',
        'contacts' => '/site/contact',
        'clients' => '/site/clients',
        'services' => '/site/services',
        'about' => '/site/about',
        'category/<cat_slug:[\w-\.]+>' => '/site/allProducts',
        '<category:[\w-\.]+>/<slug:[\w-\.]+>/detail' => '/site/productDetail',
        'division/<type:[\w-\.]+>' => '/site/division',
        /*         * *************************** Controllers and action formate ********* */
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
//$url_manager = array();
?>
