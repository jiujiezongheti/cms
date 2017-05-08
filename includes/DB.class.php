<?php
//数据库链接类
class DB{
	//获取数据对象句柄
	static public function getDB(){
		$_mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if(mysqli_connect_errno()){
			echo '数据库链接错误！错误代码：'.mysqli_connect_error();
			exit();
		}
		$_mysqli->set_charset('utf8');
		return $_mysqli;
	}

	//清理
	static public function unDB(&$result,&$db){
		if(is_object($result)){
			//清理结果集
			$result->free();
			//销毁结果对象
			$result = null;
		}
		if(is_object($db)){
			//关闭数据库
			$db->close();
			//销毁对象句柄
			$db = null;
		}	
	}
}
?>