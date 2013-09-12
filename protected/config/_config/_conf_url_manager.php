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
        '' => '/site/index',
        /** Product detail * */
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
//$url_manager = array();
?>
