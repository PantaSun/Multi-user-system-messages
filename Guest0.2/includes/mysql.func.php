<?php
	//防止恶意调用
	if (!defined('IN_TG')){
		exit("Access Defined!");
	}

	/**
	 * 连接数据库
	 * 
	 */
	function _connect(){
		global $_conn;//表示全局变量
		if(!$_conn =@ mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) ){
			exit('数据库连接失败！');
		}
	}
	
	/**
	 * 选择一个数据库
	 */
	function _select_db(){
		if (!mysql_select_db(DB_NAME)){
			exit('找不到指定的数据库！');
		}
	}
	
	/**
	 * 设置字符集
	 */
	function _set_names(){
		if (!mysql_query('SET NAMES UTF8')){
			exit('字符集错误！');
		}
	}
	/**
	 * 执行SQL语句，并返回一个结果集
	 * @param unknown $_sql
	 * @return mixed
	 */
	function _query($_sql){
		if (!$_result = mysql_query($_sql)){
			exit('SQL执行失败！'.mysql_error());
		}
		return $_result;
	}
	/**
	 * 返回影响到的记录数
	 * @return number
	 */
	function _affected_rows() {
		return mysql_affected_rows();
	}
	/**
	 * 将结果集返回为一个数组
	 * @param unknown $_sql
	 */
	function _fetch_array($_sql){
		return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
	}
	
	/**
	 * 判断新增用户名是否在数据库中已经存在
	 * @param unknown $_sql
	 * @param unknown $_info
	 */
	function _is_repeat($_sql,$_info){
		if (_fetch_array($_sql)){
			_alert_back($_info);
		}
	}
	
	/**
	 * 关闭数据库
	 */
	function _close(){
		if (!mysql_close()){
			exit('关闭异常！');
		}
	}
?>