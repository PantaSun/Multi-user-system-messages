<?php 
		//防止恶意调用
		define("IN_TG", true);
		//设置编码问题
		header('Content-Type: text/html;charset=utf-8');
		//转换成硬路径，速度更快
		require dirname(__FILE__).'/includes/common.inc.php';
		//登录状态判断
		_login_state();
		//定义一个常量，来指定本页内容
		define('SCRIPT','login');
		session_start();
		if (@$_GET['action'] == 'login'){
			//防止恶意注册和伪造表单跨站攻击
			_check_code($_POST['code'], $_SESSION['code']);
			//引入验证文件
			include ROOT_PATH.'includes/login.func.php';
			//接收数据
			$_clean =  array();
			$_clean['username'] = _check_username($_POST['username'], 2, 20);
			$_clean['password'] = _check_password($_POST['password'], 6);
			$_clean['time'] = _check_time($_POST['time']);
			if (!!$_rows = _fetch_array("SELECT gu_username,gu_uniqid FROM gu_user WHERE gu_username='{$_clean['username']}' AND gu_password='{$_clean['password']}' AND gu_active=''LIMIT 1")){
				_close();
				_session_destroy();
				_setcookies($_rows['gu_username'], $_rows['gu_uniqid'], $_clean['time']);
				_location(null, 'index.php');
			}
			else {
				_close();
				_session_destroy();
				_location('密码错误或者用户未激活！', 'login.php');
			}
			
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xlmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charst=utf-8" />
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<title>一个论坛----登录</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="login">
	<h2>用户登录</h2>
	<form action="login.php?action=login"  name="login"  method="post">
			<dl>
					<dd>用 户 名：<input  type="text" name="username" class="text"/> </dd>
					<dd>密 &nbsp; 码：<input  type="password" name="password" class="text"/> </dd>
					<dd>保 &nbsp; 留：<input type="radio" name="time" value="0" checked="checked" />不保留 <input type="radio" name="time" value="1"  />一天 <input type="radio" name="time" value="2"  />一周 <input type="radio" name="time" value="3"  />一月</dd>
					<dd>验 证 码：<input  type="text" name="code" class="text code"/> <img src="code.php" alt="验证码" id="code" onclick="javascript:"/></dd>
					<dd><input type="submit" value="登录" class="button"/><input type="button" value="注册"  id="location" class="button"/> </dd>
			</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
