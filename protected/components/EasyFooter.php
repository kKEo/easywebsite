<?php
class EasyFooter extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getMenuItems(){
		
		$res = Hooks::model()->getAllOfCategory('Footer');
		
		return $res;
	}
	
	protected function renderContent() {
		$this->render("footer", array('menuItems'=>$this->getMenuItems()));
	}
	
}