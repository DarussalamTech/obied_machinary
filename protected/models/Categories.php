<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $category_name
 * @property string $category_description
 * @property string $category_image
 * @property string $parent_id
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Products[] $products
 */
class Categories extends OMActiveRecord {

    public $no_image = "", $show_image, $slug, $old_image;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Categories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function __construct($scenario = 'insert') {
        $this->no_image = Yii::app()->baseUrl . "/images/no_image.jpg";
        parent::__construct($scenario);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name, category_description, category_image, parent_id', 'required'),
            array('deleted', 'numerical', 'integerOnly' => true),
            array('category_name', 'unique'),
            array('category_name', 'length', 'max' => 50),
            array('category_description', 'length', 'max' => 255),
            array('parent_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array(' create_time, create_user_id, update_time, update_user_id', 'safe'),
            array('category_image', 'file', 'allowEmpty' => true, 'safe' => true, 'types' => 'jpg, jpeg, gif, png'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_name, category_description, category_image, parent_id, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'products' => array(self::HAS_MANY, 'Products', 'category_id'),
            'parent_cat' => array(self::BELONGS_TO, 'Categories', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'category_name' => 'Name',
            'category_description' => 'Description',
            'category_image' => 'Image',
            'parent_id' => 'Parent',
            'deleted' => 'Deleted',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
        );
    }

    public function afterFind() {
        $this->setCategoryImagePaths();

        $this->setSlug();
        $this->old_image = $this->category_image;
        return parent::afterFind();
    }

    /*
     * Getting Parents Categories
     * Whose parent_id = 0
     * Auth:ubd
     */

    public function parentCategories() {
        $criteria = new CDbCriteria();
        $criteria->select = 'id, category_name';
        $criteria->condition = 'parent_id = 0';
        return Categories::model()->findAll($criteria);
    }

    /*
     * Getting child Categories
     * Whose parent_id != 0
     * Auth:ubd
     */

    public function childCategories($limit = 20) {
        $criteria = new CDbCriteria();
        $criteria->select = 'id,category_name,category_description,category_image,parent_id';
        $criteria->condition = 'parent_id != 0';
        $criteria->limit = $limit;
        return Categories::model()->findAll($criteria);
    }

    /*
     * Getting Parents Categories
     * Whose parent_id = 0
     * Auth:ubd
     */

    public function setCategoryImagePaths() {
        if (!empty($this->category_image)) {
            $this->show_image = Yii::app()->baseUrl . "/uploads/category_images/" . $this->id . DIRECTORY_SEPARATOR . $this->category_image;
        } else {
            $this->show_image = $this->no_image;
        }
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
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('category_description', $this->category_description, true);
        $criteria->compare('category_image', $this->category_image, true);
        $criteria->compare('parent_id', $this->parent_id, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);


        if ($this->_cont_id == "categories" && $this->_action == "index") {

            $criteria->addCondition("parent_id <>0");
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * setting slug
     * for url
     */
    public function setSlug() {

        $this->slug = trim($this->category_name) . '-' . "-" . $this->primaryKey;
        $this->slug = str_replace(" ", "-", $this->slug);
        $this->slug = str_replace(Yii::app()->params['notallowdCharactorsUrl'], '', $this->slug);
    }

    /**
     * delete old image when we needed
     */
    public function deleteExistingImage() {

        if (!empty($this->category_images) && $this->old_image != $this->category_images) {
            die('her');
            $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
            $path.= "uploads" . DIRECTORY_SEPARATOR . "category_images" . DIRECTORY_SEPARATOR . $this->primaryKey . DIRECTORY_SEPARATOR;
            DTUploadedFile::deleteExistingFile($path . str_replace(" ", "_", $this->old_image));
        }
    }

    public function beforeDelete() {
        $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
        $path.= "uploads" . DIRECTORY_SEPARATOR . "category_images" . DIRECTORY_SEPARATOR . $this->primaryKey . DIRECTORY_SEPARATOR;
        DTUploadedFile::deleteExistingFile($path . str_replace(" ", "_", $this->old_image));


        return parent::beforeDelete();
    }

}