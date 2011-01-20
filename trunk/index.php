<?php
	require_once('config/bootstrap.php');
	require_once('lib/vendor/smarty/Smarty.class.php');
	require_once('lib/application/controllers/LoginController.class.php');
	require_once('lib/application/controllers/TimeManagementController.class.php');
	require_once('lib/application/controllers/UsersController.class.php');
	
	$action = "";
	if(isset($_GET["action"]))
		$action = $_GET["action"];
	
	$module = "";
	if(isset($_GET["module"]))
		$module = $_GET["module"];
	else
		$module = "timeManagement";
	
	switch($module) {
		case "login" :
			$controller = new LoginController($action, false);
			break;
		case "users" :
			$controller = new UsersController($action);
			break;
		case "timeManagement" :
			$controller = new TimeManagementController($action);
			break;
		default :
			$controller = new ApplicationController();
			$controller->forward404();
	}
?>
