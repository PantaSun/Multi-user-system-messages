//等待网页加载完毕再执行
window.onload = function(){//定义一个匿名函数
	var faceimg = document.getElementById('faceimg');
	code();
	faceimg.onclick = function(){
		window.open('face.php','face','width=400px,height=600px,top=0,left=0,scrollbars=1');
	}
	
	//表单验证
	var form = document.getElementsByTagName('form')[0];
	form.onsubmit = function(){
		//能用客户端验证尽量用客户端
		
		//用户名验证
		if(form.username.length < 2 || form.username.length > 20){
			alert('用户名不得小于2位或者大于20位！');
			//清空
			form.username.value = '';
			//将光标移至表单字段
			form.username.focus();
			return false;
		}
		//敏感字符验证
		if(/[<>\'\"\ \	]/.test(form.username.value)){
			alert('用户名不得包含非法字符！');
			//清空
			form.username.value = '';
			//将光标移至表单字段
			form.username.focus();
			return false;
		}
		//密码验证
			if(form.password.length < 6){
			alert('密码不得小于6位！');
			//清空
			form.password.value = '';
			//将光标移至表单字段
			form.password.focus();
			return false;
		}
		//密码与密码确认的验证
			if(form.password.value != form.notpassword.value){
			alert('两次输入密码不一致！');
			//清空
			form.password.value = '';
			form.notpassword.value='';
			//将光标移至表单字段
			form.password.focus();
			return false;
		}
		//密码提示与回答
			if(form.question.length < 2 || form.question.length > 20){
			alert('密码提示不得小于2位或者大于20位！');
			//清空
			form.question.value = '';
			//将光标移至表单字段
			form.question.focus();
			return false;
		}
		if(form.answer.length < 2 || form.answer.length > 20){
			alert('问题回答不得小于2位或者大于20位！');
			//清空
			form.answer.value = '';
			//将光标移至表单字段
			form.answer.focus();
			return false;
		}
		//密码提示与回答不能一样
			if(form.question.value == form.answer.value){
			alert('密码提示与回答不能一致！');
			//清空
			form.answer.value = '';
			//将光标移至表单字段
			form.answer.focus();
			return false;
		}
		//验证邮箱格式
		if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(form.email.value)){
			alert('邮箱格式不正确！');
			//清空
			form.email.value = '';
			//将光标移至表单字段
			form.email.focus();
			return false;
		}
		//qq验证
		if(form.qq.value !=''){
			if(!/^[1-9]{1}[0-9]{4,11}$/.test(form.qq.value)){
				alert('QQ号码不正确！');
				//清空
				form.qq.value = '';
				//将光标移至表单字段
				form.qq.focus();
				return false;
			}
		}
		//验证码长度验证
		if(form.code.value.length != 4){
			alert('验证码错误');
			form.code.value = '';
			form.code.focus();
			return false;
		}
		return true;
	};
};
