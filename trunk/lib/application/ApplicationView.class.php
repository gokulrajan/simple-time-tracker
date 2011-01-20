<?php

	require_once('lib/vendor/smarty/Smarty.class.php');
	
	class ApplicationView extends Smarty {
 		
		private static $_instance;
		private static $FLASH_TYPES = array("error", "notice", "success");
	 	private $translator;
		private $onlyTemplateSet = false;
		
		public function __construct () {
			parent::__construct();
			
			$this->flushFlashVars();
			
			$this->template_dir = './view';
			$this->compile_dir = './view_c';
			$this->config_dir = './config';
			
			$this->configLoad('internal.conf', ENV);
			$this->configLoad('app.conf', ENV);
			$this->configLoad('db.conf', ENV);
			
			$this->addPluginsDir($this->getConfigVariable('smarty_plugins_folder'));
			
			$this->assign('APP_NAME', $this->getConfigVariable('app_name'));
			$this->assign('APP_DESCRIPTION', $this->getConfigVariable('app_description'));
			
			foreach(self::$FLASH_TYPES as $flash_type) {
				
				$this->assign('flash_'.$flash_type, $this->getFlash($flash_type));
			}
			
			$this->caching = $this->getConfigVariable('caching');
			
			$this->translator = Translator::getInstance();
			Translator::setLanguageFolder( $this->getConfigVariable('languages_folder') );
			Translator::setLocale( $this->getConfigVariable('default_locale') );
		}
		
		public function setTemplate($template) {
			if(!$this->onlyTemplateSet) {
				$this->display('header.tpl');
				$this->display($template.'.tpl');
				$this->display('footer.tpl');
			}
		}
		
		public function setOnlyTemplate($template) {
			if(!$this->onlyTemplateSet) {
				$this->display($template.".tpl");
				$this->onlyTemplateSet = true;
			}
		}
	 	
		public function translate($string) {
			return $this->getTranslator()->translate($string);
		}
		
		static public function getTranslator() {
			return $this->translator;
		}
		
		public function getFlash($flashType) {
			
			if(isset($_SESSION[$flashType])) {
				return $_SESSION[$flashType];
			} else {
				return false;
			}
		}
		
		public function setFlash($flashType, $flashVar) {
			$isFlashTypeOk = false;
			
			for($i = 0; $i < count(self::$FLASH_TYPES); $i++) {
				if(self::$FLASH_TYPES[$i] == $flashType) 
					$isFlashTypeOk = true;
			}
			
			if(!$isFlashTypeOk)
				throw new Exception('Unknown flash type "'.$flashType.'"');
			
			
			if(!isset($_SESSION[$flashType])) {
				$_SESSION[$flashType] = array();
			}
			
			array_push($_SESSION[$flashType], array("value" => $flashVar, "cycle" => 0));
		}
		
		private function flushFlashVars() {
			for($i = 0; $i < count(self::$FLASH_TYPES); $i++) {
				if(isset($_SESSION[self::$FLASH_TYPES[$i]]))  {
							
					for($j = count($_SESSION[self::$FLASH_TYPES[$i]])-1; $j >= 0; $j--) {
						if($_SESSION[self::$FLASH_TYPES[$i]][$j]["value"] && 
						   $_SESSION[self::$FLASH_TYPES[$i]][$j]["cycle"] == 0) {
							
							$_SESSION[self::$FLASH_TYPES[$i]][$j]["cycle"] = 1;
							
						} else {
							$_SESSION[self::$FLASH_TYPES[$i]] = array_slice( $_SESSION[self::$FLASH_TYPES[$i]], $j, 0 );
						}
					}
					
					if(empty($_SESSION[self::$FLASH_TYPES[$i]])) {
						unset( $_SESSION[self::$FLASH_TYPES[$i]] );
					}
					
				}
				
			}
			
		}
		
		
		/**
		 * Prevents the external copy of the instance
		 */
		private function __clone () {}
	 
		/**
		 * Return the instance or initiate
		 */
		static public function getInstance () {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
	}
?>
