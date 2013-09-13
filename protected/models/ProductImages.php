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
class ProductImages extends OMActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImages the static model class
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
		return 'product_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, image_small, image_detail, image_large, is_default, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('product_id, is_default, deleted', 'numerical', 'integerOnly'=>true),
			array('image_small, image_detail, image_large', 'length', 'max'=>100),
			array('create_user_id, update_user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, image_small, image_detail, image_large, is_default, deleted, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('image_small',$this->image_small,true);
		$criteria->compare('image_detail',$this->image_detail,true);
		$criteria->compare('image_large',$this->image_large,true);
		$criteria->compare('is_default',$this->is_default);
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