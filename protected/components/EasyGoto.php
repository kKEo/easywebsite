<?php
class EasyGoto extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getMenuItems(){
		
		$res = Hooks::model()->getAllOfCategory('TopGoto');
		
		Yii::trace("Goto count: ".count($res),"org.maziarz.test");
		return $res;
	}
	
	protected function renderContent() {
		$this->render("goto", array('menuItems'=>$this->getMenuItems()));
	}
	
}