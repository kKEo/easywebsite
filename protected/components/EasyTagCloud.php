<?php
class EasyTagCloud extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getTagWeights(){
		return Tags::model()->findTagWeights();
	}	
	
	protected function renderContent() {
		$this->render("tagCloud", array('weights'=>$this->getTagWeights(),'title'=>"Tags"));
	}
	
	

	
}