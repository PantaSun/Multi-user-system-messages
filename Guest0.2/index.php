<?php 
		//����һ������������ȡ����includes���ļ���Ȩ��
		define("IN_TG", true);
		define('SCRIPT','index');
		//ת����Ӳ·�����ٶȸ���
		require dirname(__FILE__).'/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xlmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charst=GBK" />
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<title>���û�����ϵͳ----��ҳ</title>
</head>
<body>
<?php 
		require ROOT_PATH.'includes/header.inc.php';
?>
<div id="list">
		<h2>�����б�</h2>
</div>
<div id="user">
		<h2>�½��û�</h2>
</div>
<div id="pics">
		<h2>����ͼƬ</h2>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
