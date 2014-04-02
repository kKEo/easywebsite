<?php
class EasyFileManager extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if ($this->visible) {
			$this->renderContent();
		}
	}
		
	public function getFiles() {
		return array();
	}
	
	protected function renderContent() {
		$this->render("easyFileManager", array("files"=>$this->getFiles()));
	}
	


}