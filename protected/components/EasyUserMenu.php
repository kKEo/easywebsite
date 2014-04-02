<?php
class EasyUserMenu extends CWidget {

	public $visible = true;
	
	public function init(){}
	
	public function run(){
		if($this->visible){
			$this->renderContent();
		}
	}
	
	private function fetchItems(){
	
	return array(
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Contributions'), 'url'=>array('/contributions/admin')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Hooks'), 'url'=>array('/hooks/admin')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Types'), 'url'=>array('/types/admin')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Upload file'), 'url'=>array('/site/upload')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Gallery'), 'url'=>array('/gallery/admin')),
//		array('icon'=>"",'label'=>Yii::t('EasyNLS','Settings'), 'url'=>array('/site/settings')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Manage layout'), 'url'=>array('/layout/list')),
		array('icon'=>"",'label'=>Yii::t('AdminMenu','Change password'), 'url'=>array('/site/password')),
		
		array('icon'=>"",'label'=>'Logout', 'url'=>array('/site/logout'), 'type'=>'linkButton', 'params'=>array('command'=>'logout')),
		);
	}

	protected function renderContent()
	{		
		$this->render("articles", array('items'=>$this->fetchItems(), 'title'=>"Admin menu"));
	}
}