<?php
class Tool{
	//弹窗，跳转
	static public function alertLocation($info,$url){
		if (!empty($info)) {
			echo "<script>alert('{$info}');location.href='{$url}'</script>";
			exit();
		}else{
			header('Location:admin.php');
			exit();
		}
		
	}
	//弹窗，返回
	static public function alertBack($info){
		echo "<script>alert('{$info}');history.back();</script>";
		exit();
	}
}
?>