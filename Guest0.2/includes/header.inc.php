<?php 
	//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
?>
<div id="header">
	<h1><a href="index.php">多用户留言系统</a></h1>
	<ul>
		<li><a href="index.php">首页</a></li>
		<li><a href="register.php">注册</a></li>
		<li>登陆</li>
		<li>个人中心</li>
		<li>管理</li>
		<li>风格</li>
		<li>退出</li>
	</ul>
</div >