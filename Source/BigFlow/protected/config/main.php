<?php // uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(

	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..', 'name' => 'Big Flow Acadêmico',
	
	// preloading 'log' component
	'preload' => array('log'),
	
	// autoloading model and component classes
	'import' =>array(
		'application.models.*',
		'application.components.*',
	),

	'modules' =>array(

		// uncomment the following to enable the Gii tool
		'gii' =>array(
			'class' => 'system.gii.GiiModule',
			'generatorPaths' =>array('ext.gii',),
			'password' => 'senha',
			
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' =>array('127.0.0.1', '::1'),
		),
		
		// meus módulos do sistema
		'professor',
		'aluno',
		'disciplina'
	),
		
	// application components
	'components' =>array(
		'user' =>array(// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl' => array('/site/login'),
			'class'=>'WebUser',
		),
	
		// uncomment the following to enable URLs in path-format
		/*'urlManager' => array(
            'caseSensitive' => false,
			'urlFormat'              =>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'             =>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'         =>'<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>'   => 'admin/<controller>/<action>',
			),
		),*/
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		
		// uncomment the following to use a MySQL database
		'db' =>array(
			'connectionString' => 'mysql:host=localhost;dbname=bigflow',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),

		'errorHandler' =>array(// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),

		'log' =>array(
			'class' => 'CLogRouter',
			'routes' =>array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),

				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' =>array(// this is used in contact page
		'adminEmail' => 'marciobds@live.it',
	),

	'sourceLanguage' => 'pt_br',
	'language'       => 'pt_br',
);