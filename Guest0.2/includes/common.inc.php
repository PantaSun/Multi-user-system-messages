<?php
			
		//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
		//转换硬路径常量
		define('ROOT_PATH', substr(dirname(__FILE__),0,-8));
		//引入函数库
		require ROOT_PATH.'includes/globe.func.php';
		require ROOT_PATH.'includes/mysql.func.php';
		//执行耗时
		define('START_TIME', _runtime());	
		//创建一个自动转义状态的常量
		define('GPC', get_magic_quotes_gpc());
		//数据库连接
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '123456');
		define('DB_NAME', 'guest');
	
		//初始化数据库
		_connect();//连接mysql数据库
		_select_db();//选择指定的数据库
		_set_names();//设置字符集
		
		
?>