<?php

//定义一个常量，来获取调用includes中文件的权限
define("IN_TG", true);
//转换成硬路径，速度更快
require dirname(__FILE__).'/includes/common.inc.php';
ob_end_clean();
//开启session
 session_start();
//运行验证码函数
 _code();
 
	
?>