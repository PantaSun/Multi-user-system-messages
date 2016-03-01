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
		
		function _check_uniqid($_first_uniqid, $_end_uniqid){
			if ((strlen($_first_uniqid)!=40) || ($_first_uniqid != $_end_uniqid)){
				_alert_back('唯一标识符异常！');
			}
			return _mysql_string($_first_uniqid);
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
					_alert_back('长度不得小于'.$min_num.'位或大于'.$max_num.'位！');
			}
			//限制敏感字符
			$_char_pattern='/[<>\'\"\ \		]/';
			if (preg_match($_char_pattern, $_string)){
				_alert_back("用户名不得包含特殊字符！");
			}
			//限制敏感用户名
			$_mg[0]='sunpengda';
			$_mg[1]='Pantasun'; 
			$_mg[2]='孙鹏达';
			//告诉用户哪些用户名无法注册
			foreach ($_mg as $value ){
				@$_mg_string.='['.$value.']'.'\n';
			}
			//采用绝对匹配
			if (in_array($_string, $_mg)){
				_alert_back($_mg_string.'以上敏感用户不得注册');
			
			}
			
			return _mysql_string($_string);
		}
		
		/**
		 * _check_password 验证密码
		 * @access public
		 * @param string $_first_pass
		 * @param string $_end_pass
		 * @param int $_min_num
		 * @return string
		 */
		function  _check_password($_first_pass, $_end_pass, $_min_num){
			//判断密码
			if (strlen($_first_pass) < $_min_num){
				_alert_back('密码不得小于'.$_min_num.'位！');
			}
			//两次密码输入必须一致
			if ($_first_pass != $_end_pass){
				_alert_back('两次输入密码不一致！');
			}
			return _mysql_string(sha1($_first_pass));
		}
		
		/**
		 *   _check_question 检查密码提示问题
		 * @access public
		 * @param string $_string
		 * @param int $_min_num
		 * @param int $_max_num
		 * @return string $_string
		 */
		function  _check_question($_string, $_min_num, $_max_num){
			$_string = trim($_string);
			//长度不得小于4位或者大于20位
			if (mb_strlen($_string,'utf-8')< $_min_num || mb_strlen($_string, 'utf-8')> $_max_num){
				_alert_back('密码提示不得小于'.$_min_num.'位或者大于'.$_max_num.'位！');
			}
			
			return _mysql_string($_string);
		}
		/**
		 * 检查问题答案是否和问题相同，以及格式是否正确
		 * @param string $_quest
		 * @param string $_answ
		 * @param int $_min_num
		 * @param int $_max_num
		 * @return string $_answ
		 */
		function _check_answer($_quest, $_answ, $_min_num, $_max_num){
			$_answ = trim($_answ);
			//长度不得小于4位或者大于20位
			if (mb_strlen($_answ,'utf-8')< $_min_num || mb_strlen($_answ, 'utf-8')> $_max_num){
				_alert_back('问题回答不得小于'.$_min_num.'位或者大于'.$_max_num.'位！');
			}
			//密码提示与回答不能相同
			if ($_quest == $_answ){
				_alert_back('密码提示与回答不能相同！');
			}
			return _mysql_string(sha1($_answ));
		}
		/**
		 * 
		 * @param unknown $_string
		 */
		function _check_sex($_string){
			return _mysql_string($_string);
		}
		/**
		 * 
		 * @param unknown $_String
		 * @return unknown|string
		 */
		function _check_face($_string){
			return _mysql_string($_string);
		}
		
		/**
		 * 检查邮箱格式
		 * @access public
		 * @param string $_string
		 * @return $_string 正确的邮箱
		 */
		function _check_email($_string){
			//[a-zA-Z0-9] => \w
			
			if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $_string)){
				_alert_back('邮箱格式不正确！');
			}
			return  _mysql_string($_string);
		}
		/**
		 * 检查qq格式
		 * @access public
		 * @param string $_string
		 * @return string $_string
		 */
		function _check_qq($_string){
			if (strlen($_string)<3 || strlen($_string)>12){
				_alert_back('QQ位数不正确！');
			}
			elseif (!preg_match('/^[1-9]{1}[0-9]{4,11}$/', $_string)){
					_alert_back('QQ格式不正确！');
			}
			return _mysql_string($_string);
		}
?>