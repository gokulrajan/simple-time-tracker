<?php
	function smarty_function_url_for($params) {
		if (!empty($params['module'])) {
			$module = "module=".$params['module'];
		} else {
			trigger_error("No module name given", E_USER_WARNING);
			return;
		}
		
		if(!empty($params['action'])) {
			$action = "&action=".$params['action'];
		} else {
			$action = "";
		}
		
		return "index.php?".$module.$action;
	}


?>