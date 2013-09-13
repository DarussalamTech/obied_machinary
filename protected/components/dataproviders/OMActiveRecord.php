<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItstActiveRecord
 *
 * @author Brain
 */
class OMActiveRecord extends CActiveRecord {

    //put your code here
    /**
     * Prepares attributes before performing validation.
     * create_time,
     * create_user_id,
     * update_time
     * update_user_id
     */
    public $_action;

    public function afterFind() {
        $this->_action = Yii::app()->controller->action->id;
        parent::afterFind();
    }

    protected function beforeValidate() {

        $this->_action = Yii::app()->controller->action->id;
        if ($this->isNewRecord) {

            // set the create date, last updated date and the user doing the creating
            $this->create_time = $this->update_time = date("Y-m-d H:i:s"); //new CDbExpression('NOW()');
            $this->create_user_id = $this->update_user_id = Yii::app()->user->id;
            // $this->users_id=1;//$this->update_user_id=Yii::app()->user->id;
        } else {
            //not a new record, so just set the last updated time and last updated user id
            $this->update_time = new CDbExpression('NOW()');
            $this->update_user_id = Yii::app()->user->id;
            // $this->users_id=1;
        }
        if (isset($this->lastupdated)) {
            $this->lastupdated = date("Y-m-d H:i:s");
        }
        /**
          special conidtion
         */
        if (empty(Yii::app()->user->id)) {
            $this->create_user_id = 1;
            $this->update_user_id = 1;
        }
        parent::beforeValidate();
        return true;
    }

    /**
     *  will 
     *  be used 
     * during before save
     * @return boolean 
     */
    protected function beforeSave() {

        $update_time = date("Y-m-d") . " " . date("H:i:s");

        parent::beforeSave();

        return true;
    }

    /**
     * Each time when user view record in detail view page save that user and
     * some data to activity log. 
     */
    public function saveViewerForLog() {
        $view_time = date("Y-m-d") . " " . date("H:i:s");
        $ip_address = Yii::app()->request->getUserHostAddress();
        //$this->activity_log = $this->activity_log . 'Viewed by ' . Yii::app()->user->name . ' on ' . $view_time . ' from ' . $ip_address . ' \n';

        $modelName = get_class($this);
        $model = new $modelName;
        //$model->updateByPk($this->primaryKey, array('activity_log' => $this->activity_log));
    }

    /**
     *  will be used to deltee
     *  mark as dleted
     */
    public function markDeleted() {
        $this->updateByPk($this->primaryKey, array('deleted' => "1"));
    }

    public function getOrder() {
        $criteria = new CDbCriteria;
        $criteria->order = "t.order DESC";
        $criteria->select = "t.order";
        $orderM = $this->find($criteria);

        $this->order = $orderM->order + 1;
    }

    public function setUuid($length = 20) {
        $connection = Yii::app()->db;

        $command = $connection->createCommand("SELECT SUBSTRING(UUID(),1,$length) as uuid");
        $row = $command->queryRow();
        return $row['uuid'];
    }

    /**
     * get drop down options 
     * @param type $id
     * @param type $name
     * @return type
     */
    public function getDropDownOptions($attributes = array(), $condtion = "") {
        $criteria = new CDbCriteria();
        if (!empty($condtion)) {
            $criteria->addCondition($condtion);
        }

        $criteria->select = implode(",", $attributes);
        $data = $this->findAll($criteria);
        return CHtml::listData($data, $attributes[0], $attributes[1]);
    }

}

?>
