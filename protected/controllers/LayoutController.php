<?php
class LayoutController extends CController{

	public $defaultAction='list';

	public function accessRules(){
		return array(
		array('allow',
				'actions'=>array('list', 'configure', 'crop'),
				'users'=>array('*')
		//				'users'=>array('@')
		),
		array('deny',
				'users'=>array('*'),
		),
		);

	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	private function parseEntry($array, $key, $value){
		if (strpos($key, ".") !== false) {
			$sk = explode(".", $key, 2);
			if (!empty($sk[0]) && !empty($sk[1])){
				if (isset($array[$sk[0]])){} else {
					$array[$sk[0]] = array();
				}
				$array[$sk[0]] = $this->parseEntry($array[$sk[0]], $sk[1], $value);
			}
		} else {
			$array[$key] = $value;
		}
		return $array;
	}

	public function actionList(){
		$layouts = CFileHelper::findFiles(Yii::getPathOfAlias('webroot')."/images/layout", array("level"=>1, "fileTypes"=>array("cvs")));

		$this->render('list', array('layouts'=>$layouts));
	}

	private function getAreas($layout){
		$areas = new LayoutAreas();
			
		$filename = Yii::getPathOfAlias('webroot')."/images/layout/{$layout}/config.cvs";
			
		$content = file_get_contents($filename, FILE_TEXT);
		$config = split("\n", $content);
			
		foreach ($config as $entry){
			if ($entry == "")
				continue;
			$areas->addAreaFromStr($entry);
		}

		return $areas;
	}

	public function actionCrop(){

		if (Yii::app()->request->isPostRequest) {

			if (isset($_GET['layout'])) {
				$areas = $this->getAreas($_GET['layout']);

				//Yii::app()->thumb->setThumbsDirectory('/images/layout/classic');

				Yii::import('ext.phpthumb.EasyPhpThumb');
				$thumbs = new EasyPhpThumb();
				$thumbs->init();
				$thumbs->setThumbsDirectory('/images/layout');
					
				foreach($areas->getAreas() as $area) {
						
					//Yii::app()->thumb
					$thumbs
					->load(Yii::getPathOfAlias('webroot')."/images/layout/{$_GET['layout']}/{$_GET['filename']}.jpg")
					->crop($area['x'],$area['y'],$area['width'],$area['height'])
					->save($area['name'].".jpg", "JPG");
						
				}
					
				Yii::app()->user->setFlash('applyLayout', 'New layout has been successfully applied.');
			} else {
				Yii::app()->user->setFlash('applyLayout', "Layout not specified.");
			}
		}

		$this->render('crop');
	}
}

class LayoutAreas {

	private $areas = array();
	private $index = 0;

	public function addAreaFromStr($str){
		$c = split(",", $str);
		$this->addArea($c[0],$c[1],$c[2],$c[3],$c[4]);
	}

	public function addArea($x,$y,$w,$h, $name){
		$area = array('x'=>$x, 'y'=>$y, 'width'=>$w, 'height'=>$h, 'name'=>$name);
			
		array_push($this->areas, $area);
		$this->index++;
	}

	public function getAreas(){
		return $this->areas;
	}

	public function getIndex(){
		return $this->index;
	}

}
