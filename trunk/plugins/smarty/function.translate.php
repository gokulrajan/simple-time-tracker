<?php
	require_once('lib/translation/Translator.class.php');
	/**
	* Smarty plugin
	* 
	* @package Smarty
	* @subpackage PluginsFunction
	*/
	
	/**
	* Smarty {mailto} function plugin
	* 
	* Type:     function<br>
	* Name:     mailto<br>
	* Date:     May 21, 2002
	* Purpose:  automate mailto address link creation, and optionally
	*            encode them.<br>
*/
	function smarty_function_translate($params) {
		if (empty($params['var'])) {
			trigger_error("translate: no string given", E_USER_WARNING);
			return;
		} else {
			$var = $params['var'];
		}
		
		$translation = Translator::getInstance();
		return $translation->translate($var);
	}


?>