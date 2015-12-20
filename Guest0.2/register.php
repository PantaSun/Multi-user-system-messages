<?php 
		//定义一个常量，来获取调用includes中文件的权限
		define("IN_TG", true);
		//转换成硬路径，速度更快
		require dirname(__FILE__).'/includes/common.inc.php';
		//定义一个常量，来指定本页内容
		define('SCRIPT','register');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xlmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charst=GBK" />
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/face.js"></script>
<title>多用户留言系统----注册</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="register">
	<h2>用户注册</h2>
	<form action="post.php"  name="register"  method="post">
			<dl>
					<dt>请认真填写如下信息！(*为必填)</dt>
					<dd>用  户 名：<input  type="text" name="username" class="text"/>*</dd>
					<dd> <pre>密    码：<input  type="password" name="password" class="text"/>*</pre></dd>
					<dd>确认密码：<input  type="password" name="notpassword" class="text"/>*</dd>
					<dd>密码提示：<input  type="text" name="passwdt" class="text"/>*</dd>
					<dd>密码回答：<input  type="text" name="passwdd" class="text"/>*</dd>
					<dd> <pre>    性     别：   <input  type="radio" name="sex" value="男" checked="checked"/> 男  <input  type="radio" name="sex" value="女" />女 *</pre></dd>
					<dd class="face"><input type="hidden" name="face" value="face/face1.jpg" /><img src="face/face1.jpg" alt="头像选择" id="faceimg" /></dd>
					<dd>电子邮件：<input  type="text" name="email" class="text"/>*</dd>
					<dd><pre> Q   Q ：<input  type="text" name="qq" class="text"/></pre></dd>
					<dd>验 证 码：<input  type="text" name="username" class="yzm"/>*</dd>
					<dd><input type="submit" value="注册" class="submit"/></dd>
			</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
