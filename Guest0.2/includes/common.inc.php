<?php
			
		//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
		define('ROOT_PATH', substr(dirname(__FILE__),0,-8));
		require ROOT_PATH.'includes/globe.func.php';
		//执行耗时
		define('START_TIME', _runtime());	
?>