<?php 
		//����һ������������ȡ����includes���ļ���Ȩ��
		define("IN_TG", true);
		//ת����Ӳ·�����ٶȸ���
		require dirname(__FILE__).'/includes/common.inc.php';
		//����һ����������ָ����ҳ����
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
<title>���û�����ϵͳ----ע��</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="register">
	<h2>�û�ע��</h2>
	<form action="post.php"  name="register"  method="post">
			<dl>
					<dt>��������д������Ϣ��(*Ϊ����)</dt>
					<dd>��  �� ����<input  type="text" name="username" class="text"/>*</dd>
					<dd> <pre>��    �룺<input  type="password" name="password" class="text"/>*</pre></dd>
					<dd>ȷ�����룺<input  type="password" name="notpassword" class="text"/>*</dd>
					<dd>������ʾ��<input  type="text" name="passwdt" class="text"/>*</dd>
					<dd>����ش�<input  type="text" name="passwdd" class="text"/>*</dd>
					<dd> <pre>    ��     ��   <input  type="radio" name="sex" value="��" checked="checked"/> ��  <input  type="radio" name="sex" value="Ů" />Ů *</pre></dd>
					<dd class="face"><input type="hidden" name="face" value="face/face1.jpg" /><img src="face/face1.jpg" alt="ͷ��ѡ��" id="faceimg" /></dd>
					<dd>�����ʼ���<input  type="text" name="email" class="text"/>*</dd>
					<dd><pre> Q   Q ��<input  type="text" name="qq" class="text"/></pre></dd>
					<dd>�� ֤ �룺<input  type="text" name="username" class="yzm"/>*</dd>
					<dd><input type="submit" value="ע��" class="submit"/></dd>
			</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
