 <?php
		 //����һ������������ȡ����includes���ļ���Ȩ��
		 define("IN_TG", true);
		 //ת����Ӳ·�����ٶȸ���
		 require dirname(__FILE__).'/includes/common.inc.php';
		 //����һ����������ָ����ҳ����
		 define('SCRIPT','face');
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>���û�����ϵͳ----ѡ��ͷ��</title>
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
 <body>
			<div id="face">
					<h3>ѡ��ͷ��</h3>
					<dl>
							<?php foreach (range(1, 20) as $i) {?>
							<dd><img title="ͷ��<?php echo $i?>" src="face/face<?php echo $i?>.jpg" alt="face/face<?php echo $i?>.jpg" width="100px"  height="100px" ></dd>
							<?php }?>
					</dl>
			</div>
   
 </body>
</html>