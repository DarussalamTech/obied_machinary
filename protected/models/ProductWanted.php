<?php

/**
 * This is the model class for table "product_wanted".
 *
 * The followings are the available columns in table 'product_wanted':
 * @property integer $id
 * @property string $wanted_name
 * @property string $wanted_description
 * @property string $wanted_image
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class ProductWanted extends OMActiveRecord {

    public $no_image = "", $show_image;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductWanted the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_wanted';
    }

    public function __construct($scenario = 'insert') {
        $this->no_image = Yii::app()->baseUrl . "/images/no_image.jpg";
        parent::__construct($scenario);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('wanted_name', 'required'),
            array('deleted', 'numerical', 'integerOnly' => true),
            array('wanted_name, wanted_description, wanted_image', 'length', 'max' => 255),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('wanted_description, create_time, create_user_id, update_time, update_user_id', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, wanted_name, wanted_description, wanted_image, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'wanted_name' => 'Wanted Name',
            'wanted_description' => 'Wanted Description',
            'wanted_image' => 'Wanted Image',
            'deleted' => 'Deleted',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('wanted_name', $this->wanted_name, true);
        $criteria->compare('wanted_description', $this->wanted_description, true);
        $criteria->compare('wanted_image', $this->wanted_image, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function afterFind() {
        $this->setImagePaths();

        return parent::afterFind();
    }

    public function setImagePaths() {
        if (!empty($this->wanted_image)) {
            $this->show_image = Yii::app()->baseUrl . "/uploads/wanted_image/" . $this->id . DIRECTORY_SEPARATOR . $this->wanted_image;
        } else {
            $this->show_image = $this->no_image;
        }
    }

    /*
     * Return dataprovider for wanted cranse/product
     * ubd
     */

    public function wantedDataProvider() {
        $criteria = new CDbCriteria();
        $criteria->select = "wanted_name,wanted_description,wanted_image";
        $criteria->order = 'id DESC';
        $dataProvider = new CActiveDataProvider(ProductWanted::model(), array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'criteria' => $criteria,
        ));
        return $dataProvider;
    }

}