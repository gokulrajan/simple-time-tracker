<?php
	require_once('./lib/translation/Translator.class.php');
	
	if (!defined('ENV')) {
		define('ENV', "development");
	} 	
	if (!defined('BASEDIR')) {
		define('BASEDIR', $_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");
	}
	//set_include_path("/home/greg/web/php/time");
	
	session_start();
?>
