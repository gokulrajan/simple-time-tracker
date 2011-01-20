<?php

	require_once('lib/application/ApplicationController.class.php');
	
	class TimeManagementController extends ApplicationController {
		public function TimeManagementController() {
			parent::__construct();
		}
		
		public function indexAction() {
			$this->getView()->setTemplate('index');
		}
	}
?>