<?php
	
	require_once('lib/application/ApplicationView.class.php');

	class ApplicationController {
		
		private $view;
		private static $FLASH_TYPES = array('notice', 'error', 'success');
		
		public function __construct($action = "index", $secure = true) {
			if(!$action) $action = "index";
			
			if($secure) {
				$this->checkIfSecured();
			}
			
			$this->view = ApplicationView::getInstance();
			
			$method = array($this, $action."Action");
			if(is_callable($method)) {
				call_user_func($method);
			} else {
				$this->forward404();
			}
		}
		
		public function checkIfSecured($redirect = true) {
			if($redirect)
				$this->redirect('login');
		}
		
		public function redirect($module, $action = "", $error = "") {
			$moduleUrl = 'module='.$module;
			
			if($action)
				$actionUrl = '&action='.$action;
			else 
				$actionUrl = '';
			
			if($error)
				$errorUrl = '&error='.$error;
			else
				$errorUrl = '';
			
			header('Location: index.php?'.$moduleUrl.$actionUrl.$errorUrl);
		}
		
		public function forward404() {
			$this->getView()->setOnlyTemplate('404');
		}
		
		
		
		public function getView() {
			return $this->view;
		}
		
		public function getTranslator() {
			return $this->getView()->getTranslator();
		}
	}
?>