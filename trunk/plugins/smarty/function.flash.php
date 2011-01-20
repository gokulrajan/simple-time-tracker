<?php
	require_once('lib/application/ApplicationView.class.php');

	function smarty_function_flash($params) {
		if (!empty($params['type'])) {
			$view = ApplicationView::getInstance();
			return $view->getFlash($params['type']);
		} else {
			trigger_error("No type name given", E_USER_WARNING);
			return;
		}
	}


?>