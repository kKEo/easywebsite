<?php
class GalleryController extends CController {

	const PAGE_SIZE = 12;
	
	private $_model;
	
	public function filters() {
		return array('accessControl',
		);
	}
	
	public function accessRules(){
		return array(
		array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list','show','index'),
				'users'=>array('*'),
		),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','admin', 'delete'),
				'users'=>array('@'),
		),
		array('deny',  // deny all users
				'users'=>array('*'),
		),
		);
	}
	
	public function actionShow(){
		$gallery = $this->loadGallery();
		Gallery::model()->updateCounters(array('displayed'=>1), "id={$gallery->id}");
		
		$this->render('show', array(
			'model'=>$gallery,
		));
	}

	public function actionCreate()
	{
		$model=new Gallery;
		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			
			$this->uploadPhoto($model);
			
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model));
	}
	
	public function actionUpdate()
	{
		$model=$this->loadGallery();
		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
			$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('update',array('model'=>$model));
	}
	
	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			// we only allow deletion via POST request
			$this->loadGallery()->delete();
			$this->redirect(array('list'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}	
	
	public function actionIndex(){
		$criteria = new CDbCriteria;
		$criteria->order = 'created DESC';
		
		$pages=new CPagination(Gallery::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);
		
		$items=Gallery::model()->published()->findAll($criteria);
		
		$this->render('index',array(
			'items'=>$items,
			'pages'=>$pages,
		));
	}
	
	public function actionAdmin(){
		$this->processAdminCommand();
		
		$criteria=new CDbCriteria;

		$pages=new CPagination(Gallery::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Gallery');
		$sort->defaultOrder='created DESC';
		$sort->applyOrder($criteria);

		$models=Gallery::model()->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}
	
	public function uploadPhoto($form){
		
		$file = CUploadedFile::getInstance($form, 'file');
		
		if ($file == null)
			return;
		
		$savePath = Yii::app()->getBasePath()."/../images/gallery";
		$filename = $file->getName();
		
		if(isset($form->filename) && $form->filename != "") {
			$tmp_file = $savePath."/".$form->filename;
			$filename = $form->filename;
		} else {
			$tmp_file = $savePath."/".$file->getName();
		}
		
		$file->saveAs($tmp_file);
		
		Yii::import('ext.phpthumb.EasyPhpThumb');
		$thumbs = new EasyPhpThumb();
		$thumbs->init();
		
		$type = split("/",$file->getType());
		
		if (strtoupper($type[1]) == "JPEG") 
			$type = "JPG";
		else 
			$type = strtoupper($type[1]);
			
		$thumbs->setThumbsDirectory('/images/gallery/t640x480');
		$thumbs->load($tmp_file)
			   ->resize('640','480')
			   ->save($fileName, $type);

		$thumbs->setThumbsDirectory('/images/gallery/t160x120');	   
		$thumbs->load($tmp_file)
			   ->resize('160','120')
			   ->save($fileName, $type);		
	}
	
	public function loadGallery($id=null){
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
			$this->_model=Gallery::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	protected function processAdminCommand(){
		if(isset($_POST['command'], $_POST['id'])){ 
			if ($_POST['command']==='delete') {
				$this->loadGallery($_POST['id'])->delete();
				$this->refresh();
			}
		}
	}
	
}