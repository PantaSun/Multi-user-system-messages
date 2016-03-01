<?php 
		//防止恶意调用
		define("IN_TG", true);
		//设置编码问题
		header('Content-Type: text/html;charset=utf-8');
		//转换成硬路径，速度更快
		require dirname(__FILE__).'/includes/common.inc.php';
		//定义一个常量，来指定本页内容
		define('SCRIPT','active');
		//开始激活处理
		if (!isset($_GET['active'])){
			_alert_back('非法操作！');
		}
		
		if (isset($_GET['action']) && isset($_GET['active'])&&$_GET['action'] == 'ok'){
			$_active = _mysql_string($_GET['active']);
			if (_fetch_array("SELECT gu_active FROM gu_user WHERE gu_active='$_active' LIMIT 1")){
				//将gu_active设置为空
				_query("UPDATE gu_user SET gu_active=NULL WHERE gu_active='$_active' LIMIT 1");
				if (_affected_rows() == 1){
					_close();
					_location('账户激活成功', 'login.php');
				}else {
					_close();
					_location('由于未知原因，账户激活失败', 'register.php');
				}
				
			}
		}else {
			
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xlmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charst=utf-8" />
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/register.js"></script>
<title>一个论坛----激活</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="active">
	<h2>用户激活</h2>
	<p>本页面是为了模拟您的邮件的功能，请点击以下超级链接来激活您的帐户</p>
	<p><a href="active.php?action=ok&amp;active=<?php echo $_GET['active']?>"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']?>?action=ok&amp;active=<?php echo $_GET['active']?></a></p>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
