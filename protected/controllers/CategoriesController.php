<?php

class CategoriesController extends Controller {

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('view', 'create', 'update', 'updateParent'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'delete', 'createParent', 'indexParent'),
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
        $this->handlingSavingCategory();
    }

    /**
     * Creating parent categories
     */
    public function actionCreateParent() {

        $this->handlingSavingCategory(0);
    }
    /*
     * handling parent category 
     * with parent system
     */

    public function handlingSavingCategory($parent_id = "") {


        $model = new Categories;
        /**
         * when parent category
         */
        if ($parent_id == 0) {
            $model->parent_id = $parent_id;
        }

        // Uncomment the following line if AJAX validation is needed
        if (isset($_POST['Categories'])) {

            $model->attributes = $_POST['Categories'];

            $img_file = DTUploadedFile::getInstance($model, 'category_image');
            $model->category_image = $img_file;
            if ($model->save()) {
                $upload_path = DTUploadedFile::creeatRecurSiveDirectories(array("category_images", $model->id));
                if (!empty($img_file)) {
                    $img_file->saveAs($upload_path . $img_file->name);
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'model_parent_cat' => $model->parentCategories(),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $this->updateCategory($id);
    }

    /*
     * UPdate parent category
     */
    public function actionUpdateParent($id) {
        $this->updateCategory($id);
    }

    /**
     * UPdate parent category
     */
    public function updateCategory($id) {
        $model = $this->loadModel($id);

        if ($model->parent_id == 0) {
            $model->parent_id = 0;
        }
        $old_img = $model->category_image;

        if (isset($_POST['Categories'])) {

            $model->attributes = $_POST['Categories'];

            //making instance of the uploaded image 
            $img_file = DTUploadedFile::getInstance($model, 'category_image');
            if (!empty($img_file)) {
                $model->category_image = $img_file;
            } else {
                $model->category_image = $old_img;
            }

            if ($model->save()) {
                $upload_path = DTUploadedFile::creeatRecurSiveDirectories(array("category_images", $model->id));
                if (!empty($img_file)) {
                    $img_file->saveAs($upload_path . $img_file->name);
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'model_parent_cat' => $model->parentCategories(),
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
     * List all models.
     */
    public function actionIndex() {
        $model = new Categories('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Categories']))
            $model->attributes = $_GET['Categories'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
      /**
     * List all models.
     */
    public function actionIndexParent() {
        $model = new Categories('search');
        $model->unsetAttributes();  // clear any default values
        $model->parent_id = 0;
        if (isset($_GET['Categories']))
            $model->attributes = $_GET['Categories'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Categories the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Categories::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Categories $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categories-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
