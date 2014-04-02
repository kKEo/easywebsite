<?php
class EWSideMenu extends CWidget {

	public $visible = true;
	public $category;
	public $title;
	public $class;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	private function fetchSideMenuItems(){
		$articles=Contributions::model()->fetchCategoryItems('SideMenu');
		$items = array();
		foreach ($articles as $article){
			$items[] = array('icon'=>$article->icon, 'label'=>$article->title, 'url'=>array('/contributions/show', 'id'=>$article->id ));
		}
		return array('items'=>$items);
	}
	
	protected function renderContent(){
		$this->render("sidemenu", array('items'=>$this->fetchSideMenuItems(), 'title'=>$this->title));
	}
	
}