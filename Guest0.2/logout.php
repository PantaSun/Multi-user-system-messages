<?php
	session_start();
	//定义一个常量，来获取调用includes中文件的权限
	define("IN_TG", true);
	require dirname(__FILE__).'/includes/common.inc.php';
	_unsetcookies();
?>