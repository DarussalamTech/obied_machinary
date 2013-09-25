<?php

class ProductWantedController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function beforeAction($action) {
        Yii::app()->theme = 'admin';
        return parent::beforeAction($action);
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ProductWanted;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ProductWanted'])) {

            $model->attributes = $_POST['ProductWanted'];

            $img_file = DTUploadedFile::getInstance($model, 'wanted_image');
            $model->wanted_image = $img_file;
            if ($model->save()) {
                $upload_path = DTUploadedFile::creeatRecurSiveDirectories(array("wanted_image", $model->id));
                if (!empty($img_file)) {
                    $img_file->saveAs($upload_path . $img_file->name);
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $old_img = $model->wanted_image;

        if (isset($_POST['ProductWanted'])) {

            $model->attributes = $_POST['ProductWanted'];

            //making instance of the uploaded image 
            $img_file = DTUploadedFile::getInstance($model, 'wanted_image');
            if (!empty($img_file)) {
                $model->wanted_image = $img_file;
            } else {
                $model->wanted_image = $old_img;
            }

            if ($model->save()) {
                $upload_path = DTUploadedFile::creeatRecurSiveDirectories(array("wanted_image", $model->id));
                if (!empty($img_file)) {
                    $img_file->saveAs($upload_path . $img_file->name);
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new ProductWanted('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProductWanted']))
            $model->attributes = $_GET['ProductWanted'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProductWanted the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ProductWanted::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ProductWanted $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-wanted-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
