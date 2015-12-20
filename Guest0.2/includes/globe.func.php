<?php
	
	function  _runtime(){
		$_mtime = explode(" ", microtime());
		return  $_mtime[1] + $_mtime[0];
	}
	
?>