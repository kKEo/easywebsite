<?php

class Types extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Types':
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'Types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name, category, description', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	protected function beforeValidate(){
		$this->created=date('Y-m-d H:i:s');;
		$this->created_by=Yii::app()->user->id;
		return true;
	}



	public function fetchOptions(){
		$criteria=new CDbCriteria(array(
			'select'=>'id, description',
		));

		$rows=$this->dbConnection->commandBuilder->createFindCommand($this->tableSchema, $criteria)->queryAll();

		$options = array();
		foreach ($rows as $n=>$row){
			$options[$row['id']] = $row['description'];
		}

		return $options;
	}
}