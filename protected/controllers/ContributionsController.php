<?php

class ContributionsController extends CController
{
	const PAGE_SIZE=25;

	public $defaultAction='list';

	private $_model;

	public function filters(){
		
		return array(
			'accessControl', // perform access control for CRUD operations
		);
		
	}
	
	public function init(){
		
		$test = $this->getPageState("test");
		$test += 1;
		$this->setPageState("test", $test);
		
	}

	public function accessRules(){
		
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list', 'show', 'articles'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin', 'create', 'update', 'delete', 'hook', 'unhook'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
		
	}
	
	public function buildContents($article){
	
		preg_match_all("/<h[3,4]>(.*)<\/h[3,4]>/U",$article,$matches);
		
		$result = array();
		$children = array();
		$lastH3Ind = 0;
		
		foreach ($matches[0] as $n=>$match) {
			
//			$label = preg_replace("/[^a-zA-Z0-9]*/", "", $matches[1][$n]);
			
			$node = array("text"=>$matches[1][$n], "url"=>"#{$matches[1][$n]}");
			
			if (substr($match, 0, 4) == "<h3>") {
				if($lastH3Ind>0)
					$result[$lastH3Ind-1]["children"] = $children;
				$result[] = $node;
				$lastH3Ind ++;
				$children = array();
			} else {
				$children[] = $node; 
			}

		}
		
		$result[$lastH3Ind-1]["children"] = $children;

		return $result;
	
	}
	
	public function actionShow(){
		
		$this->setPageState("bc1stLvl", array("title"=>"Articles", "url"=>"contributions/create"));
		
		if (isset($_GET['menu'])) {
			if (isset($_GET['submenu'])) 
				$result = Contributions::model()->fetchArticle($_GET['menu'], $_GET['submenu']);
			else 
				$result = Contributions::model()->fetchAllArticle($_GET['menu']);
				
			$this->setPageState("bc2ndLvl", $result['title']);	
				
			if (empty($result)){
				$url = $this->createUrl('site/index');
				$this->redirect($url);
			} else {
				if (!empty($result->redirect))
					$this->redirect($this->createUrl($result['redirect'], array('menu'=>$_GET['menu'])));
			}
			
			$this->render('show',array('model'=>$result, 'visible'=>true, 'contents'=>'dd'));
		
		} else {
			$result = $this->loadContributions();
			$contents = $this->buildContents($result['content']);
			$this->setPageState("bc2ndLvl", $result['title']);
			$this->render('show',array('model'=>$result, 'visible'=>true, 'contents'=>$contents));
		}
			
	}
	
	public function actionCreate(){
		$model=new Contributions;
		if(isset($_POST['Contributions']))
		{
			$model->attributes=$_POST['Contributions'];
			
			if($model->save())
				Yii::trace("Saved",'org.maziarz.test');
			else
				Yii::trace("Failed",'org.maziarz.test');	
//				$this->redirect(array('admin','filter'=>'unhooked'));
				
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionUpdate(){
		$model=$this->loadContributions();
		if(isset($_POST['Contributions'])){
					
			$model->attributes=$_POST['Contributions'];		
			
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
				
		}
		$this->render('update',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadContributions()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
		
	public function actionArticles(){
		
		if (isset($_GET['tag']))
			$tag = $_GET['tag'];
		else
			$tag = "";
			
		$articles = Contributions::model()->fetchArticles($tag);
		
		
		foreach ($articles as $article) {
			  $article['content'] = "";
		}
		
		$this->render('articles', array('articles'=>$articles));
	}
	
	public function actionList()
	{
		$query = 
		"select c.id, c.title, c.status, ct.position  from Contributions c
 inner join Hooks ct on c.id = ct.contribution_id
 inner join Types t on ct.type_id = t.id
 where t.name = ':code' 
 order by ct.position desc";
		
		$params = array(':code'=>'SideMenu');
		
		$pages=new CPagination(Contributions::model()->countBySql($query, $params));
		$pages->pageSize=self::PAGE_SIZE;
		
		$offset = $pages->getCurrentPage()*self::PAGE_SIZE;
		
		$query .= " LIMIT ".self::PAGE_SIZE;
		if($offset) 
			$query .= " OFFSET ".$offset;
		
		$models=Contributions::model()->findAllBySql($query, $params);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	public function actionAdmin(){
		$this->processAdminCommand();

		$query = 
		"select c.id, c.title, c.status, c.icon, c.tags, ct.id as ctid, ct.position, t.id as tid, t.description from Contributions c
 inner join Hooks ct on c.id = ct.contribution_id
 inner join Types t on ct.type_id = t.id";
		
		$queryCount = 
		"select count(1) from Contributions c
 inner join Hooks ct on c.id = ct.contribution_id
 inner join Types t on ct.type_id = t.id";
		
 		
		if (isset($_GET['filter'])){
			switch ($_GET['filter']) {
				case 'topmenu':
					$query .= " where t.name = 'TopMenu'"; 
					$queryCount .= " where t.name = 'TopMenu'"; 
					break;
				case 'sidemenu':
					$query .= " where t.name = 'SideMenu'";
					$queryCount .= " where t.name = 'SideMenu'"; 
					break;
				case 'articles':
					$query .= " where t.name = 'Article'";
					$queryCount .= " where t.name = 'Article'";
					break;
				case 'footer':
					$query .= " where t.name = 'Footer'";
					$queryCount .= " where t.name = 'Footer'";
					break;
				case 'unhooked':
					$query = "select c.id, c.title, c.icon, c.tags, c.status, ct.id as ctid, ct.position, '' as description, 0 as tid  from Contributions c
 							left join Hooks ct on c.id = ct.contribution_id where ct.type_id IS NULL";
					$queryCount = "select count(1) from Contributions c left join Hooks ct on c.id = ct.contribution_id where ct.type_id IS NULL";
					break;
				default:
					$query .= " where c.title like '%{$_GET['filter']}%'";
					$queryCount .= " where c.title like '%{$_GET['filter']}%'";
					break;
			}
		}
		
		$count = Contributions::model()->countBySql($queryCount);
		Yii::trace("Count: ".$count, "org.maziarz.test");
		
		$pages=new CPagination($count);
		$pages->pageSize=self::PAGE_SIZE;
		
		$offset = $pages->getCurrentPage()*self::PAGE_SIZE;
		
		$sort=new CSort('Contributions');
		
		$query .= " ORDER BY ct.position DESC";
		
		$query .= " LIMIT ".self::PAGE_SIZE;
		if($offset) 
			$query .= " OFFSET ".$offset;
			
		$models=Contributions::model()->getCommandBuilder()->createSqlCommand($query)->queryAll();
		
		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}
	
	public function actionHook(){
		$model=new Hooks;
		
		if(isset($_POST['Hooks']))
		{
			$model->attributes=$_POST['Hooks'];
			
			if($model->save())
				$this->redirect(array('admin'));
		}
		
		if (isset($_GET['id'])) 
			$model->contribution_id = $_GET['id'];
		
		$this->render('hook',array('model'=>$model));
	
	}

	public function loadContributions($id=null){
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Contributions::model()->findbyPk($id!==null ? $id : $_GET['id']);
				
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		
		return $this->_model;
	}

	protected function processAdminCommand(){
		if(isset($_POST['command'])) 
			if (isset($_POST['id']) && $_POST['command']==='delete') 
			{
				$this->loadContributions($_POST['id'])->delete();
				$this->refresh();
				
			} else if (isset($_POST['contribution_id'], $_POST['type_id']) && $_POST['command']==='unhook') {
				
				$ct = Hooks::model()->find('contribution_id=:contributionID AND type_id=:typeID', 
				array(':contributionID'=>$_POST['contribution_id'], ':typeID'=>$_POST['type_id']))->delete();

				$this->refresh();
			} else if ($_POST['command']==='up' && isset($_POST['id'])){
				Hooks::model()->updateCounters(array('position'=>1), "id={$_POST['id']}");
			} else if ($_POST['command']==='down' && isset($_POST['id'])){
				Hooks::model()->updateCounters(array('position'=>-1), "id={$_POST['id']}");
            }
	}
}
