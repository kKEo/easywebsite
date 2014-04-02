<?php

class Hooks extends CActiveRecord
{
	
	public $page;
	
	/**
	 * The followings are the available columns in table 'Contributionstypes':
	 * @var integer $id
	 * @var integer $contibution_id
	 * @var integer $type_id
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
		return 'Hooks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
		array('contribution_id, type_id, title', 'required'),
		array('contribution_id, type_id', 'numerical', 'integerOnly'=>true),
		array('position', 'required'),
		array('parent_id', 'numerical'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'type'=>array(self::BELONGS_TO, 'Types', 'type_id'),
			'parent'=>array(self::BELONGS_TO, 'Hooks', 'parent_id'),
			'childs'=>array(self::HAS_MANY, 'Hooks', 'parent_id'),
			'contribution'=>array(self::BELONGS_TO, 'Contribution', 'contribution_id'),
		);
	}

	public function scopes(){
		return array(
            'mainMenuItems'=>array(
                'condition'=>'type_id = 1 and parent_id is null',
		),
			'parents'=>array(
				'condition'=>'parent_id is null',	
		),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'contribution_id' => 'CID',
			'type_id' => 'Type',
			'position'=>'Pos',
			'parent_id' => 'PID',
		);
	}

	public function getChilds($name, $limit=null){
		$query = "SELECT h.id, h.title, '{$name}' as page FROM Hooks h JOIN Hooks hp ON h.parent_id = hp.id"
		." WHERE hp.title = '{$name}'"
		." ORDER BY hp.position DESC";

		$query .= " LIMIT {$limit}";
		
		return $this->findAllBySql($query);
	}
	
	public function getAllOfCategory($category="Dummy"){
		return $this->with('type')->findAll(array('condition'=>"name = '{$category}'", 'order'=>'position DESC'));
	}




}