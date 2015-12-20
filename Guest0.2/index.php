<?php 
		//定义一个常量，来获取调用includes中文件的权限
		define("IN_TG", true);
		define('SCRIPT','index');
		//转换成硬路径，速度更快
		require dirname(__FILE__).'/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xlmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charst=GBK" />
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<title>多用户留言系统----首页</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="list">
		<h2>帖子列表</h2>
</div>
<div id="user">
		<h2>新进用户</h2>
</div>
<div id="pics">
		<h2>最新图片</h2>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
