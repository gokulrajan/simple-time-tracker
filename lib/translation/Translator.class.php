<?php
	class Translator {
 		
		private static $_instance;
		
		private static $locale = 'en_US';
		private static $languageFolder = 'languages';
		private $tEngine;
		private $xml;
		
		public function __construct() {
		}
		
		public function translate($pVar, $assign = false) {
			$xmlObject = $this->getXml();
			$translation = "";
			
			foreach($xmlObject->xpath('//'.$pVar) as $result) {
				$translation = $result;
			}
			
			if(!$translation) 
				$translation = "[ ".$pVar." ]";
			
			return $translation;
		}
		
		
		public function getXml() {
			if(!$this->getLocale()) {
				throw new Exception('You have to set a locale before translating.');
			}
			
			if(!$this->xml) {
				$this->setXml($this->getLocale());
			}
			return $this->xml;
		}
		
		private function setXml($pLocale) {
			$xml_url = $this->getLanguageFolder()."/".$pLocale.".xml";
			if (file_exists($xml_url)) {
				$this->xml = simplexml_load_file($xml_url);
			} else {
				throw new Exception('The language file \''.$pLocale.'.xml\' couldn\'t be found.');
			}
		}
		
		public function getLocale() {
			return self::$locale;
		}
		
		public static function setLocale($pLocale) {
			self::$locale = $pLocale;
		}
		
		public function getLanguageFolder() {
			return self::$languageFolder;
		}
		
		public static function setLanguageFolder($pLanguageFolder) {
			self::$languageFolder = $pLanguageFolder;
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