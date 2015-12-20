//等待网页加载完毕再执行
window.onload = function(){//定义一个匿名函数
	var faceimg = document.getElementById('faceimg');
	faceimg.onclick = function(){
		window.open('face.php','face','width=400px,height=600px,top=0,left=0,scrollbars=1');
	}
}
