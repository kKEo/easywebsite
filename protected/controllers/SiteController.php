<?php

class SiteController extends CController
{
	
	
	public function filters(){
		
		return array(
			'accessControl', // perform access control for CRUD operations
		);
		
	}
	
	public function accessRules(){
		
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('login', 'index', 'pytanie', 'sitemap', 'robots'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('logout', 'password', 'upload'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
		
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		// captcha action renders the CAPTCHA image
		// this is used by the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xEBF4FB,
		),
		);
	}

	public function actionPassword(){

		$form=new PasswordForm;
		if(isset($_POST['PasswordForm'])) {
		
			$form->attributes=$_POST['PasswordForm'];

			if ($form->validate()) {
			
				$user=Users::model()->findByPk(1);
	
				$password = $form['newPassword'];
				$user['password'] = sha1($form['newPassword']);	
				unset($form['oldPassword']);
				unset($form['newPassword']);
				unset($form['newPassword2']);

				$user->save();
				
				Yii::app()->user->setFlash('password',"Twoje hasło zostało zmienione (Nowe hasło: ${password}).");
				
				$url = $this->createUrl('');
				$this->redirect($url);
			}
		}
		$this->render('password',array('form'=>$form));
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('index');
	}

	public function actionCss()
	{
		$this->layout='plain';
		$this->render('css');
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$contact=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$contact->attributes=$_POST['ContactForm'];
			if($contact->validate())
			{
				$headers="From: {$contact->email}\r\nReply-To: {$contact->email}";
				mail(Yii::app()->params['adminEmail'],$contact->subject,$contact->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('contact'=>$contact));
	}

	public function actionPytanie(){
		$pytanie=new PytanieForm;
		if(isset($_POST['PytanieForm'])){
			$pytanie->attributes=$_POST['PytanieForm'];
			if($pytanie->validate()){
				$to = "biuro@istron.pl";//$pytanie->email;
				$from = $pytanie->email;
				$subject = $pytanie->subject."(".$pytanie->name.")";
				$body = $pytanie->body;
				$this->sendMail($to, $from, $subject, $body);
			}
		}
		$this->render('pytanie',array('contact'=>$pytanie));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$form=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$form->attributes=$_POST['LoginForm'];
			// validate user input and redirect to previous page if valid
			if($form->validate())
			$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('form'=>$form));
	}

	/**
	 * Logout the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$url = $this->createUrl('site/login');
		$this->redirect($url);

	}

	public function actionUpload(){

		$form = new UploadForm;
		if (isset($_POST['UploadForm'])){
			$form->attributes = $_POST['UploadForm'];
			$file=CUploadedFile::getInstance($form,'file');

			$target=$form->target;
			if (!empty($target)) $target.="/";

			$file->saveAs(Yii::app()->getBasePath()."/../images/".$target.$file->getName());

			Yii::app()->user->setFlash('upload',"Thank you for uploading file (${target}).");
		} else {
			Yii::trace("Upload Form not found","org.maziarz.test");
		}
		$this->render("upload",array('form'=>$form));

	}

	public function actionSitemap(){
		$this->layout='plainxml';

		$models=Hooks::model()->parents()->with('type')->findAll(array('condition'=>"name = 'TopMenu'", 'order'=>'position DESC'));

		$sites = array();
		foreach ($models as $item) {
			$sites[] = $this->createAbsoluteUrl("contributions/show", array('menu'=>$item['title']));
		}
		$this->render("sitemap",array('sites'=>$sites));
	}

	public function actionRobots(){
		$this->layout='plaintext';

		$this->render("robots", array('content'=>"User-Agent: *\nAllow: /\n"));
	}

	public function actionSettings(){
		$settings = new EasySettingsForm;
		$settings->load();
		if (isset($_POST['EasySettingsForm'])){
			$settings->attributes=$_POST['EasySettingsForm'];
			if ($settings->validate()){
				$settings->save();
				Yii::app()->user->setFlash('settings', 'Site settings has been successfully saved.');
			}
		}

		$this->render('easySettings', array('settings'=>$settings));
	}

	private function sendMail($to, $from, $subject, $body){

		require_once "Mail.php";

		$host = "smtp.istron.pl";
		$username = "zestrony@istron.pl";
		$password = "!python1";

		$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
		$smtp = Mail::factory('smtp'
		,array ('host' => $host, 'port'=>587, 'auth' => true,'username' => $username,'password' => $password));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
			echo("<p>" . $mail->getMessage() . "</p>");
		} else {
			//			Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
			Yii::app()->user->setFlash('contact','Dziękujemy za kontakt. Postaramy odpowiedź tak szybko jak to możliwe.');
			$this->refresh();
		}

	}
}