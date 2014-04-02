<?php
class EasyContents extends CWidget {

	public $visible = true;
	public $contents = "";
	
	public function init(){
	}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	public function getChapters(){
		
		if ($this->contents != "") 
			return $this->contents;
		
		$controller = $this->getController()->getId();
		$action = $this->getController()->getAction()->getId();
		
		return array(
			array("text"=>"Introduction","url"=>"#chapter1",
				"children"=>array(
					array("text"=>"{$controller}", "url"=>"#chapter1.1",),
					array("text"=>"{$action}", "url"=>"#chapter1.2",),
					),
				),
			array("text"=>"Details","url"=>"#chapter2",
				"children"=>array(
					array("text"=>"chapter1.1", "url"=>"#chapter1.1",),
					array("text"=>"chapter1.2", "url"=>"#chapter1.2",),
					array("text"=>"chapter1.3", "url"=>"#chapter1.3",),
					),
				),
			array("text"=>"Conclusions","url"=>"#chapter3", 
				"children"=>array()),	
		);
	}	
	
	protected function renderContent() {
		$this->render("contents", array('chapters'=>$this->contents));
	}
	
	

	
}