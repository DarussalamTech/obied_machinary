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
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, product_name, product_description, product_overview, slug, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('category_id, deleted', 'numerical', 'integerOnly'=>true),
			array('product_service_type', 'length', 'max'=>6),
			array('product_name, slug', 'length', 'max'=>50),
			array('product_overview', 'length', 'max'=>255),
			array('create_user_id, update_user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, product_service_type, product_name, product_description, product_overview, slug, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'productImages' => array(self::HAS_MANY, 'ProductImages', 'product_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'product_service_type' => 'Product Service Type',
			'product_name' => 'Product Name',
			'product_description' => 'Product Description',
			'product_overview' => 'Product Overview',
			'slug' => 'Slug',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('product_service_type',$this->product_service_type,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_description',$this->product_description,true);
		$criteria->compare('product_overview',$this->product_overview,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}