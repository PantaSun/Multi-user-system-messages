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
		define('SCRIPT','register');
		session_start();
		if (@$_GET['action'] == 'register'){
			//防止恶意注册和伪造表单跨站攻击
			_check_code($_POST['yzm'], $_SESSION['code']);
			//引入函数文件
			include ROOT_PATH.'includes/register.func.php';
			//创建一个空数组来接收合法数据
			$_clean = array();
			//可以通过唯一标识符来防止恶意注册，伪装表单跨站攻击等等
			//这个存放如数据库的唯一标识符还可以用来，登录cookies验证
			$_clean['uniqid'] = _check_uniqid($_SESSION['uniqid'], $_POST['uniqid']);
			//active也是一个唯一标识符，用来刚注册的用户进行激活处理，之后才可登录
			$_clean['active'] = _sha1_uniqid();
 			$_clean['username']=_check_username( $_POST['username'],2,20);
 			$_clean['password']= _check_password($_POST['password'] , $_POST['notpassword'], 6);
			$_clean['question'] = _check_question($_POST['question'], 2, 20);
 			$_clean['answer'] = _check_answer($_POST['question'], $_POST['answer'],2,20);
			$_clean['sex'] = _check_sex($_POST['sex']);
			$_clean['face'] = _check_face($_POST['face']);
			$_clean['email'] = _check_email($_POST['email']);
			$_clean['qq'] = _check_qq($_POST['qq']);
			//在新增之前，判断用户名是否被注册
			$_sql="SELECT gu_username FROM gu_user WHERE gu_username='{$_clean['username']}' LIMIT 1";
			_is_repeat($_sql, '对不起，此用户名已被注册！');
			
			//新增用户
			_query(
					"INSERT INTO gu_user(
																gu_uniqid,
																gu_active,
																gu_username,
																gu_password,
																gu_question,
																gu_answer,
																gu_sex,
																gu_face,
																gu_email,
																gu_qq,
																gu_reg_time,
																gu_last_time,
																gu_last_ip	
																)
												VALUES(
																'{$_clean['uniqid']}',			
																'{$_clean['active']}',	
																'{$_clean['username']}',	
																'{$_clean['password']}',	
																'{$_clean['question']}',	
																'{$_clean['answer']}',	
																'{$_clean['sex']}',	
																'{$_clean['face']}',	
																'{$_clean['email']}',	
																'{$_clean['qq']}',	
																NOW(),
																NOW(),
																'{$_SERVER['REMOTE_ADDR']}'								
				 												)"
							);
			if (_affected_rows() == 1){
			//关闭
			_close();
			//销毁session
			_session_destroy();
			//跳转
			_location('恭喜你！注册成功！', 'active.php?active='.$_clean['active']);
			}else {
				//关闭
				_close();
				//销毁session
				_session_destroy();
				//跳转
				_location('很遗憾！由于未知原因注册失败！', 'register.php');
			}
		}else {
			$_SESSION['uniqid'] = $_uniqid = _sha1_uniqid();
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
<script type="text/javascript" src="js/register.js"></script>
<title>一个论坛----注册</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="register">
	<h2>用户注册</h2>
	<form action="register.php?action=register"  name="register"  method="post">
			<input type="hidden" name="uniqid" value="<?php echo $_uniqid?>"/>
			<dl>
					<dt>请认真填写如下信息！(*为必填)</dt>
					<dd>用  户 名：<input  type="text" name="username" class="text"/> *</dd>
					<dd> <pre>密    码：<input  type="password" name="password" class="text"/> *</pre></dd>
					<dd>确认密码：<input  type="password" name="notpassword" class="text"/> *</dd>
					<dd>密码提示：<input  type="text" name="question" class="text"/> *</dd>
					<dd>密码回答：<input  type="text" name="answer" class="text"/> *</dd>
					<dd> <pre>    性     别：   <input  type="radio" name="sex" value="男" checked="checked"/> 男  <input  type="radio" name="sex" value="女" />女  *</pre></dd>
					<dd class="face"><input type="hidden" name="face" value="face/face1.jpg" /><img src="face/face1.jpg" alt="头像选择" id="faceimg" /></dd>
					<dd>电子邮件：<input  type="text" name="email" class="text"/> *</dd>
					<dd><pre> Q   Q ：<input  type="text" name="qq" class="text"/></pre></dd>
					<dd>验 证 码：<input  type="text" name="yzm" class="text yzm"/> *<img src="code.php" alt="验证码" id="code" onclick="javascript:"/></dd>
					<dd><input type="submit" value="注册" class="submit"/></dd>
			</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
