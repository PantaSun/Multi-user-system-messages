<?php
//防止恶意调用
if (!defined('IN_TG')){
	exit("Access Defined!");
}
//防止非Html页面调用
if (!defined('SCRIPT')){
	exit('SCRIPT ERROR');
}
?>
<link rel="shortcut icon" href="title.ico" />
<link rel="stylesheet" type="text/css" href="styles/1/basic.css"/>
<link rel="stylesheet" type="text/css" href="styles/1/<?php echo SCRIPT?>.css"/>