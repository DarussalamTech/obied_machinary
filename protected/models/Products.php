<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property integer $category_id
 * @property string $product_service_type
 * @property string $product_name
 * @property string $product_description
 * @property string $product_overview
 * @property string $slug
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property ProductImages[] $productImages
 * @property Categories $category
 */
class Products extends OMActiveRecord {

    public $no_image;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Products the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'products';
    }

    public function __construct($scenario = 'insert') {
        $this->no_image = Yii::app()->baseUrl . "/images/noimage.jpg";
        parent::__construct($scenario);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, product_name, product_description,serial_number', 'required'),
            array('category_id, deleted', 'numerical', 'integerOnly' => true),
            array('product_service_type', 'length', 'max' => 20),
            array('product_name, slug', 'length', 'max' => 50),
            array('product_overview', 'length', 'max' => 255),
            array('crane_boom,crane_jib', 'numerical'),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('slug, create_time, create_user_id, update_time, update_user_id, product_overview', 'safe'),
            array('serial_number,capacity,status,year,crane_boom,crane_jib,price_per_variable,price', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_id, product_service_type, product_name, product_description, product_overview, slug, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'productImages' => array(self::HAS_MANY, 'ProductImages', 'product_id'),
            'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
        );
    }

    /**
     * Behaviour
     *
     */
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

    /*
     * returning the product data provider based on categories
     * also setting the pagination attributes
     * author:ubaid
     */

    public function categoryProductDataProvider($category_id) {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'category_id=' . $category_id;
        $dataProvider = new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'criteria' => $criteria,
        ));
        return $dataProvider;
    }

    /*
     * returning all data from product 
     * all data no limits
     * author:ubaid
     */

    public function allProductDataProvider() {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->order = 'id DESC';
        $dataProvider = new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'criteria' => $criteria,
        ));
        return $dataProvider;
    }

    /*
     * division type dataprovider
     * Auth:ubad
     */

    public function divisionDataProviderr($product_service_type) {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'product_service_type ="' . $product_service_type . '"';

        return $dataProvider = new CActiveDataProvider(Products::model(), array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'criteria' => $criteria,
        ));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'category_id' => 'Category',
            'product_service_type' => 'Product Service Type',
            'product_name' => 'Product Model',
            'product_description' => 'Product Description',
            'product_overview' => 'Product Overview',
            'serial_number' => 'Serial Number',
            'capacity' => 'Capacity (Tons)',
            'status' => 'Status',
            'year' => 'Year',
            'crane_boom' => 'Boom Height (Meters)',
            'crane_jib' => 'Jib Height (Meters)',
            'slug' => 'Slug',
            'price' => 'Price',
            'price_per_variable' => 'Per',
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
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('product_service_type', $this->product_service_type, true);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_description', $this->product_description, true);
        $criteria->compare('product_overview', $this->product_overview, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * setting slug
     * for url
     */
    public function saveSlug() {
        if (!empty($this->slug)) {
            $this->slug = str_replace(" ", "-", $this->slug);
        } else {
            $this->slug = str_replace(" ", "-", $this->product_name);
        }
    }

    /**
     * setting slug
     * for url
     */
    public function setSlug() {

        if (Yii::app()->controller->id == "site") {
            $this->slug = trim($this->slug) . "-" . $this->primaryKey;
            $this->slug = str_replace(" ", "-", $this->slug);
            $this->slug = str_replace(Yii::app()->params['notallowdCharactorsUrl'], '', $this->slug);
        }
    }

    /**
     *  get product images for some code
     * @return type 
     */
    public function getImage() {
        $images = array();
        foreach ($this->productImages as $img) {
            if ($img->is_default == 1) {
                $images[] = array('id' => $img->id,
                    'image_large' => $img->image_url['image_large'],
                    'image_detail' => $img->image_url['image_detail'],
                    'image_small' => $img->image_url['image_small'],
                );
                break;
            }
        }
        if (!empty($images)) {
            return $images;
        } else {
            $images[] = array(
                'image_large' => $this->no_image,
                'image_detail' => $this->no_image,
                'image_small' => $this->no_image,
            );
            return $images;
        }
    }

    public function getImageAll() {
        $images = array();
        foreach ($this->productImages as $img) {

            $images[] = array('id' => $img->id,
                'image_large' => $img->image_url['image_large'],
                'image_detail' => $img->image_url['image_detail'],
                'image_small' => $img->image_url['image_small'],
            );
        }

        if (!empty($images)) {
            return $images;
        } else {
            $images[] = array(
                'image_large' => $this->no_image,
                'image_detail' => $this->no_image,
                'image_small' => $this->no_image,
            );
            return $images;
        }
    }

    /**
     * slag filling
     */
    public function beforeSave() {
//        if (!empty($this->per_variable)) {
//            $this->price = $this->price . "&nbspP/" . $this->per_variable;
//        } else {
//            $this->price = $this->price;
//        }
        $this->saveSlug();
        parent::beforeSave();
        return true;
    }

    /**
     * setting slug
     * for url
     */
    public function afterFind() {
        $this->setSlug();

        parent::afterFind();
    }

}