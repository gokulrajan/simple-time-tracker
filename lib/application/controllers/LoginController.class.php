<?php

	require_once('lib/application/ApplicationController.class.php');
	
	class LoginController extends ApplicationController {
		public function indexAction() {
			//print_r($_SESSION);
			$this->getView()->setOnlyTemplate('login');
		}
		
		public function validateFormAction() {
			
			if (isset($_POST['signInMail'])){
				//$this->getView()->setFlash("notice", 'login_ok');
				//$this->redirect('login', 'index');
				echo 'set';
			}else{
				$this->getView()->setFlash("error", 'err_username_password_incorrect');
				$this->redirect('login','index');
			}
		}
	}
?>
