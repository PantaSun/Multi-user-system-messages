<?php
header('Content:-Type: text/html;charset=utf-8');
	/**
	 * 
	 */
	function  _runtime(){
		$_mtime = explode(" ", microtime());
		return  $_mtime[1] + $_mtime[0];
	}
	/**
	 * 
	 * 
	 */
	function _alert_back($_info){
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	
	/**
	 * 
	 */
	function _unsetcookies(){
		setcookie('username','',time()-1);
		setcookie('uniqid','',time()-1);
		_session_destroy();
		_location(null, 'index.php');
	}
	
	/**
	 * 登录状态的判断
	 */
	function _login_state(){
		if (isset($_COOKIE['username'])){
			_alert_back('登录状态无法进行此操作！');
		}	
	}
	
	/**
	 * 
	 * @param unknown $_info
	 * @param unknown $_url
	 */
	function _location($_info,$_url){
		if (!empty($_info)){
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit();
		}else {
			header('Location:'.$_url);
		}
		
	}
	/**
	 * 销毁session
	 */
	function _session_destroy(){
		session_destroy();
	}
	/**
	 * 
	 * @param unknown $_first_code
	 * @param unknown $_end_code
	 */
	function _check_code($_first_code, $_end_code){
		if ( $_first_code != $_end_code){
				_alert_back("验证码不正确！");
		}
	}
	
	/**
	 * 生成唯一标识符
	 * @return unknown|string
	 */
	function _sha1_uniqid(){
		return  _mysql_string(sha1(uniqid(rand(),true)));
	}
	
	/**
	 * 
	 * @param unknown $_string
	 * @return unknown|string
	 */
	function _mysql_string($_string){
		if (GPC){
			return $_string;
		}else {
			return mysql_real_escape_string($_string);
		}
	}
	/**
	 * _code()函数是验证码函数
	 * @access public
	 * @param int $_width 表示验证码的长度
	 * @param int $_height 表示验证码的宽度
	 * @param int $_rnd_code 表示是验证码的位数
	 * @param boolean $_flag 表示是否要黑框
	 * @return void 这个函数运行后产生验证码
	 */
	function  _code($_width = 75, $_height = 25, $_rnd_code = 4, $_flag = false){

		//创建随机码
		for ($i =0 ;$i< $_rnd_code; $i++){
			@$_nmsg .=dechex(mt_rand(1,15));
		}
		//echo $_nmsg;
		//保存在session中
		$_SESSION['code'] = $_nmsg;
		
	
		//创建一张图像
		$_img = imagecreatetruecolor($_width, $_height);
		
		//白色
		$_white = imagecolorallocate($_img, 255, 255, 255);
		
		// 填充
		imagefill($_img, 0, 0, $_white);
		if ($_flag){
			//黑色边框
			$_black = imagecolorallocate($_img, 0, 0, 0);
			imagerectangle($_img, 0, 0, $_width-1, $_height-1, $_black);
		}
		//随机生成6条线
		for ($i = 0;$i < 6;$i ++){
			$_rnd_color1 = imagecolorallocate($_img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
			imageline($_img, mt_rand(0,$_width),mt_rand(0,$_height) , mt_rand(0,$_width),mt_rand(0,$_height)  ,$_rnd_color1);
		}
		//随机生成雪花
		for ($i = 0; $i < 100 ;$i ++){
			$_rnd_color2 = imagecolorallocate($_img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
			imagestring($_img, 1, mt_rand(1,$_width),mt_rand(1,$_height) , "*", $_rnd_color2);
		}
		
		//输出随机验证码
		for ($i = 0 ;$i <strlen($_SESSION['code']);$i ++){
			$_rnd_color3 = imagecolorallocate($_img, mt_rand(0,175), mt_rand(0,155), mt_rand(0,200));
			@imagestring($_img, 5, $i*$_width/$_rnd_code+mt_rand(1,10), mt_rand(1,$_height/2), $_SESSION['code'][$i], $_rnd_color3);
		}
		//输出图像
		header('Content-Type:image/png'); 
		imagepng($_img);
		
		//销毁图像
		imagedestroy($_img);
		
	}
?>