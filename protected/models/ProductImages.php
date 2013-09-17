<?php

/**
 * This is the model class for table "product_images".
 *
 * The followings are the available columns in table 'product_images':
 * @property integer $id
 * @property integer $product_id
 * @property string $image_small
 * @property string $image_detail
 * @property string $image_large
 * @property integer $is_default
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Products $product
 */
class ProductImages extends OMActiveRecord {

    public $upload_key = "";
    public $uploaded_img = "";
    public $no_image;
    public $upload_index;

    /**
     *
     * @var type 
     * for purpose of deleting old image
     */
    public $oldLargeImg = "";
    public $oldSmallImg = "";
    public $oldDetailImg = "";
    public $image_url = array();

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductImages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_images';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('image_large', 'required'),
            array('product_id, is_default, deleted', 'numerical', 'integerOnly' => true),
            array('image_small, image_detail, image_large', 'length', 'max' => 100),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('upload_index,upload_key,product_id', 'safe'),
            array('is_default, create_time, create_user_id, update_time, update_user_id, image_small, image_detail', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, product_id, image_small, image_detail, image_large, is_default, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
        );
    }

    public function behaviors() {
        return array(
            'CSaveRelationsBehavior' => array(
                'class' => 'CSaveRelationsBehavior',
                'relations' => array(
                    'basicFeatures' => array("message" => "Please, fill required fields"),
                ),
            ),
            'CMultipleRecords' => array(
                'class' => 'CMultipleRecords'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'product_id' => 'Product',
            'image_small' => 'Image Small',
            'image_detail' => 'Image Detail',
            'image_large' => 'Image Large',
            'is_default' => 'Is Default',
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
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('image_small', $this->image_small, true);
        $criteria->compare('image_detail', $this->image_detail, true);
        $criteria->compare('image_large', $this->image_large, true);
        $criteria->compare('is_default', $this->is_default);
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
        $this->oldLargeImg = $this->image_large;
        $this->oldSmallImg = $this->image_small;



        /**
         *  setting path  for front end images
         */
        if (!empty($this->image_large)) {


            $this->image_url['image_large'] = Yii::app()->baseUrl . "/uploads/product/" . $this->product->primaryKey;
            $this->image_url['image_large'].= "/product_images/" . $this->id . "/" . $this->image_large;
        } else {
            $this->image_url['image_large'] = Yii::app()->baseUrl . "/images/product_images/noimages.jpeg";
        }

        if (!empty($this->image_small)) {

            $this->image_url['image_small'] = Yii::app()->baseUrl . "/uploads/product/" . $this->product->primaryKey;
            $this->image_url['image_small'].= "/product_images/" . $this->id . "/" . $this->image_small;
        } else {
            $this->image_url['image_small'] = Yii::app()->baseUrl . "/images/product_images/noimages.jpeg";
        }


        parent::afterFind();
    }

    /**
     * for setting object to save
     * image name rather its emtpy
     * @return type 
     */
    public function beforeSave() {


        $this->setUploadVars();
        return parent::beforeSave();
    }

    public function afterSave() {
        $this->uploadImages();
        parent::afterSave();
        return true;
    }

    /**
     * set image variable before save
     */
    public function setUploadVars() {
        $large_img = DTUploadedFile::getInstance($this, '[' . $this->upload_key . ']image_large');
        $its_t = new DTFunctions();
        if (!empty($large_img)) {

            $this->image_large = $its_t->getRanddomeNo(10) . "." . $large_img->extensionName;
            $this->image_small = str_replace(" ", "_", "small_" . $this->image_large);
            $this->image_detail = str_replace(" ", "_", "detail_" . $this->image_large);
        } else {

            $this->image_large = $this->oldLargeImg;
            $this->image_small = $this->oldSmallImg;
            $this->image_detail = $this->oldDetailImg;
        }
    }

    /**
     * upload images
     */
    public function uploadImages() {
        $large_img = DTUploadedFile::getInstance($this, '[' . $this->upload_key . ']image_large');
        if (!empty($large_img)) {


            $folder_array = array("product", $this->product->id, "product_images", $this->id);


            $upload_path = DTUploadedFile::creeatRecurSiveDirectories($folder_array);
            $large_img->saveAs($upload_path . str_replace(" ", "_", $this->image_large));

            DTUploadedFile::createThumbs($upload_path . $this->image_large, $upload_path, 130, str_replace(" ", "_", "small_" . $this->image_large));
            DTUploadedFile::createThumbs($upload_path . $this->image_large, $upload_path, 180, str_replace(" ", "_", "detail_" . $this->image_large));
            //$this->deleteldImage();
        }
    }

}