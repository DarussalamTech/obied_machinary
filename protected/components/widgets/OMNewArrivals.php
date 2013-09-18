<?php

/**
 * OMNewArrivals class to handle 
 * the new arrivals of the products
 * 
 * @author ubaid
 */
Yii::import('zii.widgets.CPortlet');

class OMNewArrivals extends CPortlet {

    /**
     *
     * @var type 
     */
    public $cssFile, $route, $querystring, $jsFile;

    /**
     * current controller object
     * @var type 
     */
    public $cObj;

    /**
     * isfilter through js
     * @var type 
     */
    public $is_cat_filter = 0;

    /**
     * by default it ajax based
     * @var type 
     */
    public $ajax = true;

    /**
     * Init 
     */
    public function init() {
        parent::init();


        /** in case of querystring ** for document linking */
        if (Yii::app()->request->getQueryString() != "") {
            $this->querystring = Yii::app()->request->getQueryString();
            if ($this->querystring != "") {
                $this->querystring = "&" . $this->querystring;
            }
        }
    }

    /**
     * 
     */
    public function run() {
        parent::run();


        $cs = Yii::app()->clientScript;
        if (!empty($this->jsFile)) {
            $cs->registerScriptFile($this->jsFile);
        }
        if (!empty($this->cssFile)) {
            $cs->registerCssFile($this->cssFile);
        }
    }

    /**
     * 
     */
    protected function renderContent() {

        $this->render('oMNewArrivals');
    }

}

?>
