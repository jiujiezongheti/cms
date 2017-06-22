<?php
class Tool{
	//弹窗，跳转
	static public function alertLocation($info,$url){
		if (!empty($info)) {
			echo "<script>alert('{$info}');location.href='{$url}'</script>";
			exit();
		}else{
			header('Location:'.$url);
			exit();
		}
		
	}
	//弹窗，返回
	static public function alertBack($info){
		echo "<script>alert('{$info}');history.back();</script>";
		exit();
	}

	//清理session
	static public function unSession(){
		if(session_start()){
			session_destroy();
		}
	}
}
?>