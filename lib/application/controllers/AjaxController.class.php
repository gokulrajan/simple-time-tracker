<?php

	require_once('lib/application/ApplicationController.class.php');
	
	class LoginController extends ApplicationController {
		
		public function errorAction() {
			if(isset($_GET["error"])) {
				return $this->getView()->translate($_GET["error"]);
			}
		}
	}
?>