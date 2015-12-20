<?php 
		//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
?>
<div id="footer">
		<p>本程序耗时:<?php  echo _runtime() - START_TIME ?>秒</p>
		<p>版权没有 翻版不究</p>
		<p>本程序由<span>Pantasun</span>提供</p>
</div>