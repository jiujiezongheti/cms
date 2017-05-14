<?php
//模型基类
class Model{
	//查找单个数据模型
	protected function one($sql){
		$db = DB::getDB();
		$result = $db->query($sql);
		$object = $result->fetch_object();
		DB::unDB($result,$db);
		return $object;
	}

	//查找多个数据模型
	protected function all($sql){
		$db = DB::getDB();
		//获取结果集
		$result = $db->query($sql);
		$html = array();
		//打印第一组数据
		while(!!$object = $result->fetch_object()){
			$html[] = $object;
		};
		DB::unDB($result,$db);
		foreach ($html as $key => $value) {
			$html[$key]->last_time = date('Y-m-d H:i:s',$value->last_time);
			$html[$key]->login_count = $value->login_count-0;
		}
		return $html;
	}


	//增删修模型
	protected function aud($sql){
		
		$result = $db->query($sql);
		$affected_rows = $db->affected_rows;
		DB::unDB($result,$db);
		return $affected_rows;
	}
}
?>