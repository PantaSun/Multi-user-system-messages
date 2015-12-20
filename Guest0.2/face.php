 <?php
		 //定义一个常量，来获取调用includes中文件的权限
		 define("IN_TG", true);
		 //转换成硬路径，速度更快
		 require dirname(__FILE__).'/includes/common.inc.php';
		 //定义一个常量，来指定本页内容
		 define('SCRIPT','face');
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>多用户留言系统----选择头像</title>
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
 <body>
			<div id="face">
					<h3>选择头像</h3>
					<dl>
							<?php foreach (range(1, 20) as $i) {?>
							<dd><img title="头像<?php echo $i?>" src="face/face<?php echo $i?>.jpg" alt="face/face<?php echo $i?>.jpg" width="100px"  height="100px" ></dd>
							<?php }?>
					</dl>
			</div>
   
 </body>
</html>