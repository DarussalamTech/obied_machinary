<?php

/*
 * to handle error from all the system
 */

class ErrorController extends Controller {

//    public function beforeAction($action) {
//        Yii::app()->theme = 'landing_page_theme';
//        Yii::app()->controller->layout = '';
//        return parent::beforeAction($action);
//    }
    public function beforeAction($action) {
        Yii::app()->theme = 'frontend';
        $this->layout = 'column1';

        return parent::beforeAction($action);
    }

    public function actionError() {
        $error = Yii::app()->errorHandler->error;
        if ($error)
            $this->render('error', array('error' => $error));
        else
            throw new CHttpException(404, 'Page not found.');
    }

}

?>
