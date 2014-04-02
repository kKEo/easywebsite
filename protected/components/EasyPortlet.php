<?php
class EasyPortlet extends CWidget{
	private $config;
	private $visible = true;
	private $title;
	private $id;
	public $class;
	
	public function setConfig($config){
		$this->config = $config;
	}
	
	public function init(){
		$config = explode("-",$this->config);
		$this->id = $config[0];
		$this->title = $config[1];
	}
	
	public function run(){
			if($this->visible){
			$this->renderContent();
		}		
	}
	
	private function getContent(){
		$article = Contributions::model()->findByPk($this->id);
		return $article['content'];
	}
	
	private function renderContent(){
		$this->render("easyPortlet", array("content"=>$this->getContent(), "title"=>$this->title, "class"=>$this->class));
	}
	
}