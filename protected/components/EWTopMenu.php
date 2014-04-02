<?php
class EWTopMenu extends CWidget{
	
	public $visible=true;
	
	public function init(){
	}
	
	public function run(){
			if($this->visible){
			$this->renderContent();
		}
	}	
	
	private function fetchItems(){
		$models=Hooks::model()->parents()->with('type')->findAll(array('condition'=>"name = 'TopMenu'", 'order'=>'position DESC'));
		
		$items = array();
		foreach ($models as $model){
			$items[] = array('icon'=>'', 'label'=>$model->title, 'url'=>$model->title, 'active'=>true);
		}
		return $items;
	}
	
	protected function renderContent(){
		$this->render("topMenuDiv", array('items'=>$this->fetchItems()));
	}

}