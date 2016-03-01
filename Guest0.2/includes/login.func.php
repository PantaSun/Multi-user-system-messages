<?php

	//防止恶意调用
	if (!defined('IN_TG')){
		exit("Access Defined!");
	}
	if (!function_exists('_alert_back')){
		exit('请检查_alert_back函数是否存在！');
	}

	if (!function_exists('_mysql_string')){
		exit('请检查_mysql_string函数是否存在！');
	}

	/**
	 * _check_username 检查和过滤用户名
	 * @access public
	 * @param string $string 受污染的用户名
	 * @param int $min_num 最小长度
	 * @param int $max_num 最大长度
	 * @return string 过滤后的用户名
	 */
	function _check_username($_string, $min_num, $max_num){
		//去掉两边空格
		$_string = trim($_string);
		if (mb_strlen($_string,'utf-8')<$min_num|| mb_strlen($_string,'utf-8')>$max_num){
			_alert_back('用户名长度不得小于'.$min_num.'位或大于'.$max_num.'位！');
		}
		//限制敏感字符
		$_char_pattern='/[<>\'\"\ \		]/';
		if (preg_match($_char_pattern, $_string)){
			_alert_back("用户名不得包含特殊字符！");
		}	
		return _mysql_string($_string);
	}
	/**
	 * _check_password 验证密码
	 * @access public
	 * @param string $_first_pass
	 * @param int $_min_num
	 * @return string
	 */
	function  _check_password($_string, $_min_num){
		//判断密码
		if (strlen($_string) < $_min_num){
			_alert_back('密码不得小于'.$_min_num.'位！');
		}
		return _mysql_string(sha1($_string));
	}
	
	/**
	 * 检查保存时间是错误
	 * @param unknown $_string
	 * @return unknown|string
	 */
	function _check_time($_string){
		$_time = array('0','1','2','3');
		if (!in_array($_string, $_time)){
			_alert_back('保存时间出现错误！');
		}
		return _mysql_string($_string);
	}
	
	/**
	 * 生成cookies
	 * @param unknown $_username
	 * @param unknown $_uniqid
	 */
	function _setcookies($_username,$_uniqid, $_time){
		
		switch ($_time){
			case '0':
				setcookie('username' , $_username);
				setcookie('uniqid' , $_uniqid);
				break;
			case '1':
				setcookie('username' , $_username,time()+86400);
				setcookie('uniqid' , $_uniqid,time()+86400);
				break;
			case '2':
				setcookie('username' , $_username, time()+604800);
				setcookie('uniqid' , $_uniqid, time()+604800);
				break;
			case '3':
				setcookie('username' , $_username, time()+2592000);
				setcookie('uniqid' , $_uniqid, time()+295200);
				break;
		}
	}
	
?>