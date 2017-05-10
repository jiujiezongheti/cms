<?php
	$content = isset($_POST['content'])?$_POST['content']:"";
	if($content){
		echo "我是后台返回的内容，返回输入内容：".$content;
	}
?>