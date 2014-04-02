<?php
class Gallery extends CActiveRecord {

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'Gallery';
	}
	
	public function rules(){
		return array(
			array('title', 'length', 'max'=>127),
			array('category','length','max'=>127),
			array('isPublished','length','max'=>1),
			array('isPublished','in','range'=>array('Y', 'N')),
			array('filename','length','max'=>255),
			array('title, filename', 'required'),
		);
	}

	public function relations(){
		return array();
	}
	
	public function scopes(){
		return array(
			'published'=>array('condition'=>'isPublished = "Y"'),
            'mostRecent'=>array('order'=>'created DESC',),
			'mostViewed'=>array('order'=>'displayed DESC',),
			'bestRated'=>array('order'=>'rating, displayed DESC',),
		);
	}	
	
	public function recently($limit=4){
	    $this->getDbCriteria()->mergeWith(array(
	        'order'=>'created DESC',
	        'limit'=>$limit,
	    ));
	    return $this;
	}
	
	public function attributeLabels(){
		return array(
			'id' => 'Id',
			'title' => 'Tytuł',
			'category' => 'Kategoria',
			'filename' => 'Zapisz jako',
			'description' => 'Opis',
			'isPublished' => 'Opublikować'
		);
	}
	
	protected function beforeValidate(){
//		$this->created=date('Y-m-d H:i:s');
		$this->created=time();
		return true;
	}
	
	
}