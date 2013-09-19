<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xEDEDED,
                'foreColor' => 0x2f251c,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function beforeAction($action) {
        Yii::app()->theme = 'frontend';
        return parent::beforeAction($action);
    }

    /**
     * it is our home page
     */
    public function actionIndex() {

        $this->layout = 'frontend';
        /*
         * Getting Child Categories
         */
        $child_categorie = Categories::model()->childCategories(4);
        $this->render('index', array('child_categorie' => $child_categorie));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * 
     * For displaying all products on based on product
     * categories
     * These actions used 
     * front end theme.

     * @param String $slug
     */
    public function actionAllProducts($cat_slug) {

        /*
         * Getting lists of product based on category_id
         */
        $cat_id = $this->getRequestIDFromSlug($cat_slug);
        $dataProvider = Products::model()->productDataProvider($cat_id);
        $category_products = $dataProvider->getData();
        $this->render('/site/all_products', array('category_products' => $category_products, 'dataProvider' => $dataProvider, "cat_id" => $cat_id));
    }

    /*
     * product Detail for 
     * Displaying single product details
     * author:ubd
     */

    public function actionProductDetail($slug) {
        /*
         * Getting product id from slug
         */
        $product_id = $this->getRequestIDFromSlug($slug);
        $product_detail = Products::model()->findByPk($product_id);
        $pro_cat_id = $product_detail->category->id;
        $this->render('/site/productDetail', array('product_detail' => $product_detail, 'cat_id' => $pro_cat_id));
    }

    /*
     * Rendering the service type 
     * either it is trade or rental
     * author:ubd
     */

    public function actionDivision() {

        $product_service_type = $_REQUEST['type'];
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'product_service_type ="' . $product_service_type . '"';

        $dataProvider = new CActiveDataProvider(Products::model(), array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'criteria' => $criteria,
        ));
        $division_product = $dataProvider->getData();
        $this->render('/site/division', array('category_products' => $division_product, "product_service_type" => $product_service_type, 'dataProvider' => $dataProvider));
    }

    /*
     * Rendering static client page
     * auth:ubd
     */

    public function actionClients() {
        $this->render('/site/clients');
    }

    /*
     * Methods for Rendering the service page
     * it is an static page
     */

    public function actionServices() {
        $this->render('/site/services', array());
    }

    /*
     * Methods for Rendering the about page
     * it is an static page
     */

    public function actionAbout() {
        $this->render('/site/about', array());
    }

    /*     * *************************** System Generated code ****************************** */

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::app()->controller->layout = "//layouts/login_admin";
        Yii::app()->theme = "admin";
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect($this->createUrl('/products/index'));
            //$this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}