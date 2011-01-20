<?php
	require_once('lib/vendor/doctrine/Doctrine.php');
	require_once('bootstrap.php');
	
	spl_autoload_register(array('Doctrine', 'autoload'));
	$manager = Doctrine_Manager::getInstance();
	
	$dsn = 'mysql:dbname='.$smarty->getConfigVariable('dbname').';host='.$smarty->getConfigVariable('host');
	$user = $smarty->getConfigVariable('user');
	$password = $smarty->getConfigVariable('password');
	
	$dbh = new PDO($dsn, $user, $password);
	$conn = Doctrine_Manager::connection($dbh);
?>