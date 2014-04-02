<?php
class EWFooterOne extends CWidget{
	
	public $visible=true;
	
	public function init(){
	}
	
	public function run(){
			if($this->visible){
			$this->renderContent();
		}
	}	
	
	private function fetchFooterItems(){
		$models=Contributions::model()->fetchCategoryItems('Footer');
		$items = array();
		foreach ($models as $model){
			$items[] = array('icon'=>'','label'=>$model->title, 'url'=>array('/contributions/show', 'id'=>$model->id ));
		}
		return array('items'=>$items);
	}
	
	protected function renderContent(){
		$this->render("footerOne", array('items'=>$this->fetchFooterItems()));
	}

}