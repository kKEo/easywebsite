<?php

class Contributions extends CActiveRecord
{
	const STATUS_DRAFT=0;
	const STATUS_PUBLISHED=1;

	public function getStatusOptions(){
		return array(
		self::STATUS_DRAFT=>'Robocze',
		self::STATUS_PUBLISHED=>'Opublikowane'
		);
	}

	public function getStatusText(){
		$options = $this->statusOptions;
		return isset($options[$this->status])?$options[$this->status] : "unknown({$this->status})";
	}

	private function prepareLabelsAnchors($content){
		return preg_replace("/(<a name=\".*\">.*<\/a>)*(<h[3,4]>)(.*)(<\/h[3,4]>)/U","<a name=\"$3\"></a>$2$3$4",$content);
	}
	
	protected function beforeValidate(){
		
		if ($this->isNewRecord){
			$this->created=$this->modified=date('Y-m-d H:i:s');;
			$this->created_by=Yii::app()->user->id;
		} else {
			$this->modified=date('Y-m-d H:i:s');
			$this->content = $this->prepareLabelsAnchors($this->content);
		}
		
		return true;
	}

	protected function afterSave(){
		if(!$this->isNewRecord)
			$this->dbConnection->createCommand('DELETE FROM Contributionstags WHERE contribution_id='.$this->id)->execute();

		foreach($this->getTagArray() as $name)
		{
			if(($tag=Tags::model()->findByAttributes(array('value'=>$name)))===null)
			{
				$tag=new Tags(array('value'=>$name));
				$tag->save();
			}
			$this->dbConnection->createCommand("INSERT INTO Contributionstags (contribution_id, tag_id) VALUES ({$this->id},{$tag->id})")->execute();
		}

	}

	public function getTagArray()
	{
		// break tag string into a set of tags
		return array_unique(
		preg_split('/\s*,\s*/',trim($this->tags),-1,PREG_SPLIT_NO_EMPTY)
		);
	}

	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'Contributions';
	}

	public function rules(){
		return array(
		array('title, content', 'required'),
		array('title, redirect, icon, tags', 'length', 'max'=>127),
		array('status', 'in', 'range'=>array(0, 1)),
		
		);
	}

	public function safeAttributes(){
		return array('title', 'content', 'status', 'icon', 'tags', 'redirect');
	}

	public function relations(){
		return array(
			'author'=>array(self::BELONGS_TO, 'Users', 'created_by'),
			'typeids'=>array(self::HAS_ONE, 'Types', 'id'),
			'types'=>array(self::MANY_MANY, 'Types', 
				'Hooks(contribution_id, type_id)',
				'together'=>true,
				'joinType'=>'LEFT JOIN'),
			'menu'=>array(self::MANY_MANY, 'Types', 
				'Hooks(contribution_id, type_id)',
				'together'=>true,
				'joinType'=>'INNER JOIN',
				'condition'=>'??.code=:code',
				'order'=>'position DESC'),
		    'items'=>array(self::HAS_MANY, 'Hooks', 'contribution_id', 'select'=>'position', 'joinType'=>'LEFT JOIN', 'together'=>true),
			'unhooked'=>array(self::HAS_MANY, 'Hooks', 'contribution_id', 
				'together'=>true,
			 	'joinType'=>'LEFT JOIN',
				'condition'=>'??.type_id IS NULL'),
		);
	}

	public function scopes(){
		return array(
            'published'=>array(
                'condition'=>'status=1',
		),
		);

	}

	public function attributeLabels(){
		return array(
		);
	}
	
//	public function afterFind(){
//		$atts = "AfterFind:";
//		foreach($this->getAttributes() as $name=>$value){
//			$atts = $atts."\n".$name.": ".$value;
//			if ($value === "NULL"){
//				$atts .= "(Do zmiany)";
//				$this->setAttribute($name, "");
//			}
//		}
//		
//		Yii::trace($atts,'org.maziarz.test');
//	}
	
//	public function beforeSave(){
//		
//		parent::beforeSave();
//		
//		$atts = "BeforeSave:";
//		foreach($this->getAttributes() as $name=>$value){
//			$atts = $atts."\n".$name.": ".$value;
//		}
//		
//		Yii::trace($atts,'org.maziarz.test');
//	}
	
	public function fetchByCategory($category){
		$query = "SELECT c.id, c.title, c.icon FROM Contributions c INNER JOIN Hooks ct ON c.id = ct.contribution_id INNER JOIN Types t ON ct.type_id = t.id"
		." WHERE t.category = '{$category}' AND c.status = 1 ORDER BY ct.position DESC";
		return $this->findAllBySql($query);
	}
	
	public function fetchCategoryItems($code, $category = 'Menu'){
		$query = "SELECT c.id, c.title, c.icon FROM Contributions c INNER JOIN Hooks ct ON c.id = ct.contribution_id INNER JOIN Types t ON ct.type_id = t.id"
		." WHERE t.name = '{$code}' AND t.category = '{$category}' "
		." AND c.status = 1"
		." ORDER BY ct.position DESC";
		return $this->findAllBySql($query);
	}
	
	public function fetchArticles($tag) {
		
		if ($tag == "")
			$tagCond = "";
		else {
			$tagCond = " AND t.value = '{$tag}'";
		}	 
		
		$query = "SELECT DISTINCT c.id, c.title, c.modified, c.content, c.tags"
		 ." FROM Contributions c INNER JOIN Contributionstags ct ON c.id = ct.contribution_id INNER JOIN Tags t ON ct.tag_id = t.id"
		 ." WHERE c.status = 1"
		 .$tagCond
		 ." ORDER BY c.modified DESC";
	
		 return $this->findAllBySql($query);
	}
	
	public function fetchLast5Articles() {
		$query = "SELECT c.id, c.title, c.modified, SUBSTR(c.content, 1, 100) as content, c.tags"
		 ." FROM Contributions c"
		 ." AND c.status = 1"
		 ." ORDER BY c.created DESC"
		 ." LIMIT 10";		 
	
		 return $this->findAllBySql($query);
	}
	
	public function fetchArticle($menuItemTitle, $submenuTitle){
		$query = "SELECT c.id, c.title, c.content, c.redirect FROM Hooks h JOIN Hooks hp ON h.parent_id = hp.id"
		." JOIN Contributions c ON h.contribution_id = c.id"
		." WHERE hp.title = '{$menuItemTitle}'"
		."   AND h.title = '{$submenuTitle}'"
		."   AND c.status = 1";
		
		return $this->findBySql($query);
	}
	
	public function fetchAllArticle($menuItemTitle){
		$query = "SELECT c.id, c.title, c.content, c.redirect FROM Hooks h"
		." JOIN Contributions c ON h.contribution_id = c.id"
		." WHERE h.title = '{$menuItemTitle}'"
		."   AND c.status = 1";
		
		return $this->findBySql($query);
	}

}