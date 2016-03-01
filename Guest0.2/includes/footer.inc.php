<?php 
		//防止恶意调用
		if (!defined('IN_TG')){
			exit("Access Defined!");
		}
		_close();
?>
<div id="footer">
		<p>本程序耗时:<?php  echo _runtime() - START_TIME ?>Ãë</p>
		<p>版权没有 翻版不究</p>
		<p>本程序由<span>Pantasun</span>提供</p>
</div>