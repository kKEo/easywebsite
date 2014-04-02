<?php
class EasySettingsForm extends CFormModel {

	/**
	* According to CFormModel convention all public attributes will be treated as modelled one.
	*/
	public $pageTitle;
	public $itemsPerPage;
	public $topMenu; // 1 - will be displayed, 0 - will not
	public $footer; // 1 - will be displayed, 0 - will not
	public $rightPanel;
	public $leftPanel;
	
	private static $instance;
	
	public function getInstance(){
		Yii::trace('getInstance() request','org.maziarz.test');
		if (is_null(EasySettingsForm::$instance)) {
			EasySettingsForm::$instance = new EasySettingsForm;
			EasySettingsForm::$instance->load(); 
			Yii::trace('New instance has been created', 'org.maziarz.test');
		}
		return EasySettingsForm::$instance;
	}
	
	public function rules(){
		return array(
			array('pageTitle, itemsPerPage', 'required'),
			array('itemsPerPage, topMenu, footer' , 'CNumberValidator'),
		);
	}

	public function attributeLabels(){
		return array(
			'itemsPerPage' => 'Items per page',
			'topMenu' => 'Display top menu',
		 	'footer' => 'Display footer items',
		);
	}
	
	public function load(){
		$ini_array = parse_ini_file(Yii::getPathOfAlias('webroot')."/protected/config/site.ini");
		$this->setAttributes($ini_array);	
	}
	
	public function save(){
		$configFile = Yii::getPathOfAlias('webroot')."/protected/config/site.ini";
		file_put_contents($configFile, ";config.ini");
		foreach ($this->getAttributes() as $name=>$value) {
			file_put_contents($configFile, "\n".$name." = ".$value, FILE_APPEND);
		}
		
	}

}