<?php
class EasySubpages extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getChilds(){
		
		if (isset($_GET['menu'])){
			return Hooks::model()->getChilds($_GET['menu'], 5);
		}
		
		return array();
	}	
	
	protected function renderContent() {
		$this->render("subpages", array('subpages'=>$this->getChilds()));
	}
	
}