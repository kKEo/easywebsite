<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'MySite',
	'layout'=>'businesscard',
	'language'=>'pl_pl',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
//				),				
//				array(
//					'class'=>'CWebLogRoute',
//					'levels'=>'trace',
//					'categories'=>'system.db.CDbCommand',
//				),
//				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'trace',
//					'categories'=>'org.maziarz.test',
//				),	
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'db'=>array(
			'class'=>'CDbConnection',
            'connectionString'=>'sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'../../data/testdata.db',
        ),
        'urlManager'=>array(
       	'showScriptName'=>false,
            'urlFormat'=>'path',
            'rules'=>array(
                'tag/<tag>'=>'contributions/articles',
        	'articles'=>'contributions/articles',
        	'menu/<menu>/<submenu>'=>'contributions/show',
        	'menu/<menu>'=>'contributions/show',
          	''=>'contributions/show/menu/Aktualnosci',
                'c/<id:\d+>'=>'contributions/show',
                'sitemap.xml'=>'site/sitemap',
       		'robots.txt'=>'site/robots',            ),
        ),
        'thumb'=>array(
        	'class'=>'ext.phpthumb.EasyPhpThumb',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
