<?php
class EasyArticles extends CWidget {

	public $visible = true;
	private $category;
	private $title;
	public $class;
	
	public function setCategory($cat){
		$this->category = $cat;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	private function fetchArticlesItems(){
		$articles = Contributions::model()->fetchByCategory('Articles');
		$items = array();
		foreach ($articles as $article){
			$items[] = array('icon'=>'koperta.gif','label'=>$article->title, 'url'=>array('/contributions/show', 'id'=>$article->id));
		}
		return $items;
	}
	
	protected function renderContent(){
		$this->render("articles", array('items'=>$this->fetchArticlesItems(), 'title'=>$this->title));
	}
	
}