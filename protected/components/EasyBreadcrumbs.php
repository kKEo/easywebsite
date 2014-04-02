<?php
class EasyBreadcrumbs extends CWidget {

	public $visible = true;
	public $elements = array();
	
	public function init(){
		
	}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getMenuItems(){
		
		$bc = array(CHtml::link('Home', array('site/index')));
		
		$category = $this->getController()->getPageState('bc1stLvl');
		
		if ($category!="")
			$bc[] = CHtml::link($category['title'], array($category['url']));
		
		$article = $this->getController()->getPageState('bc2ndLvl');
		
		if ($article!="")
			$bc[] = $article;
		
		return $bc;
	}
	
	protected function renderContent() {
		$this->render("breadcrumbs", array('menuItems'=>$this->getMenuItems()));
	}
	
}