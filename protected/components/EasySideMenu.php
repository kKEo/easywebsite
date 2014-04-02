<?php
class EasySideMenu extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getMenuItems(){
		$results = Hooks::model()->getAllOfCategory('SideMenu');
		$items = array();
		foreach ($results as $item){
			$items[] = array('label'=>$item->title, 'url'=>array('contributions/show','menu'=>$item['title']));
		}
		return $items;
	}
	
	protected function renderContent() {
		$this->render("sideMenu", array('items'=>$this->getMenuItems(), 'title'=>"Menu główne"));
	}
	
}