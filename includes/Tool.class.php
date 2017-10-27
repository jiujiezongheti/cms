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

	//显示过滤
	static public function htmlString($date){
		if(is_array($date)){
			foreach ($date as $key => $value) {
				$_string[$key] = Tool::htmlString($value);
			}
		}elseif(is_object($date)){
			foreach ($date as $key => $value) {
				@$_string->$key = Tool::htmlString($value);
			}
		}else{
			$_string = htmlspecialchars($date);
		}
		return @$_string;
	}

	//弹窗赋值关闭(上传专用)
    static public function alertOpenerClose($info,$path){
        echo "<script>alert('$info');</script>";
        echo "<script>opener.document.content.thumbnail.value='$path';</script>";
        echo "<script>opener.document.content.pic.style.display='block';</script>";
        echo "<script>opener.document.content.pic.src='$path';</script>";
        echo "<script>window.close();</script>";
        exit();
    }
}
