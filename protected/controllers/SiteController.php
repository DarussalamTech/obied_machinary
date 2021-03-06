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
                'backColor' => 0xF1F1F1,
                'foreColor' => 0x2f251c,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /*
     * Default action called before any action
     */

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
    public function actionCategoryProducts($cat_slug) {

        /*
         * Getting lists of product based on category_id
         */
        $cat_id = $this->getRequestIDFromSlug($cat_slug);
        $dataProvider = Products::model()->categoryProductDataProvider($cat_id);
        $category_products = $dataProvider->getData();
        $this->render('/site/category_products', array('category_products' => $category_products, 'dataProvider' => $dataProvider, "cat_id" => $cat_id));
    }

    /**
     * 
     * For displaying all products 
     * These actions used 
     * front end theme.

     * @param String $slug
     */
    public function actionAllProducts() {

        $dataProvider = Products::model()->allProductDataProvider();
        $all_products = $dataProvider->getData();
        $this->render('/site/all_products', array('category_products' => $all_products, 'dataProvider' => $dataProvider));
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

    public function actionProductDetailBox($slug) {

        $product_id = $this->getRequestIDFromSlug($slug);
        $product_detail = Products::model()->findByPk($product_id);
        $pro_cat_id = $product_detail->category->id;
        // $this->render('/site/productDetailBox', array('product_detail' => $product_detail, 'cat_id' => $pro_cat_id));
        $this->renderPartial("_productDetailBox", array(
            "product_detail" => $product_detail,
            'cat_id' => $pro_cat_id,
                ), false, true);
    }

    /*
     * Rendering the service type 
     * either it is trade or rental
     * author:ubd
     */

    public function actionDivision() {

        $product_service_type = $_REQUEST['type'];
        $dataProvider = Products::model()->divisionDataProviderr($product_service_type);
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

    public function actionWanted() {
        $datProvider = ProductWanted::model()->wantedDataProvider();
        $product_wanted = $datProvider->getData();
        $this->render('/site/wanted', array('product_wanted' => $product_wanted));
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
                if ($model->customer_copy_check == 1) {
                    /*
                     * module to send 
                     * email copy to customer itself
                     * if the button is checked
                     */
                    $email['To'] = $model->email;
                    $email['From'] = Yii::app()->params['adminEmail'];
                    $email['Subject'] = 'Contact Notification From ' . Yii::app()->name;
                    $email['Body'] = $model->body;
                    $email['Body'] = $this->renderPartial('/common/_email_template', array('email' => $email), true, false);
                    $this->sendEmail2($email);
                }

                $email['To'] = Yii::app()->params['adminEmail'];
                $email['From'] = $model->email;
                $email['Subject'] = $model->subject . 'From Mr/Mrs: ' . $model->name;
                $email['Body'] = $model->body;
                $email['Body'] = $this->renderPartial('/common/_email_template', array('email' => $email), true, false);

                $this->sendEmail2($email);
                Yii::app()->user->setFlash('contact', "Thank you for contacting us, We'll get back to you soon");
                $this->redirect($this->createUrl('/site/contact'));
            }
        }
        $this->render('/site/contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::app()->controller->layout = "//layouts/login_admin";
        Yii::app()->theme = "admin";
        if (!Yii::app()->user->isGuest) {
            $this->redirect($this->createUrl('/products/index'));
        }
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