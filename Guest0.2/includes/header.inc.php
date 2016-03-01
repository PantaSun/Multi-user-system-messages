<?php 
	//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
?>
<div id="header">
	<h1><a href="index.php">一个论坛</a></h1>
	<ul>
		<li><a href="index.php">首页</a></li>
		<?php 
			if (isset($_COOKIE['username'])){
				echo '<li><a href="member.php">'.$_COOKIE['username'].'·个人中心</a></li>';
				echo "\n";
			}else {
				echo '<li><a href="register.php">注册</a></li>';
				echo "\n";
				echo  '<li><a href="login.php">登录</a></li>';
				echo "\n";
			}
		?>
		<li>管理</li>
		<li>风格</li>
		<?php 
			if (isset($_COOKIE['username'])){
				echo '<li><a href="logout.php">退出</a></li>';
			}
		?>
	</ul>
</div >