<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'cake',
		'encoding' => 'utf8'
	);
	
	// (1) useDbConfig = 'mook' 
	public $mook = array(
	  'datasource' => 'Database/Mysql',
	  'persistent' => false,
	  'host' => 'localhost',
	  'login' => 'mookusr',
	  'password' => 'mookpass',
	  'database' => 'phpmook',
	  'encoding' => 'utf8'
	);
}
