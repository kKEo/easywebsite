<?php
class EasyUpload extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	protected function renderContent(){
		$form = new UploadForm;
		if (isset($_POST['UploadForm'])){
			$form->attributes = $_POST['UploadForm'];
			$file=CUploadedFile::getInstance($form,'file');
			
			$target=$form->target;
			if (!empty($target)) $target.="/";			

			$file->saveAs(Yii::app()->getBasePath()."/../images/".$target.$file->getName());
			
			Yii::app()->user->setFlash('upload','Thank you for uploading file.');
			Yii::trace("Uploaded file: ".$file->getName(),"org.maziarz.test");
		} else {
			Yii::trace("Upload Form not found","org.maziarz.test");
		}
		$this->render("uploadFile",array('form'=>$form));
	}
	
}