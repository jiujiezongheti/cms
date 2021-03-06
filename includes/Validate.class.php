<?php
//验证类
class Validate{
	//是否为空
	static public function checkNull($date){
		if(trim($date)=='')return true;
		return false;
		
	}
	//判断长度
	static public function checkLength($date,$length,$flag){
		if($flag=='min'){
			if(mb_strlen(trim($date),'utf-8')<$length)return true;
			return false;
		}elseif ($flag=='max') {
			if(mb_strlen(trim($date),'utf-8')>$length)return true;
			return false;
		}elseif($flag=='equals'){
			if(mb_strlen(trim($date),'utf-8')!=$length)return true;
			return false;
		}else{
			Tool::alertBack("ERROR：参数传递错误");
		}
			
	}
	//数据一致性
	static public function checkEquals($date,$otherdate){
		if(trim($date) != trim($otherdate))return true;
		return false;
	}

	//session验证
	static public function checkSession(){
		if(!isset($_SESSION['admin']))Tool::alertBack('警告：非法登录');
	}
}
?>