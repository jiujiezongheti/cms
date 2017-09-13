<?php
//模型基类
class Model{
	//查找单个数据模型
	protected function one($sql){
		$db = DB::getDB();
		$result = $db->query($sql);
		$object = $result->fetch_object();
		DB::unDB($result,$db);
		return Tool::htmlString($object);
	}

	//查找多个数据模型
	protected function all($sql){
		$db = DB::getDB();
		//获取结果集
		$result = $db->query($sql);
		$html = array();
		if($result){
			//打印第一组数据
			while(!!$object = $result->fetch_object()){
				$html[] = $object;
			};
			DB::unDB($result,$db);
			foreach ($html as $key => $value) {
				if(isset($value->last_time)){
					$html[$key]->last_time = date('Y-m-d H:i:s',$value->last_time);
				}
				if(isset($value->login_count)){
					$html[$key]->login_count = $value->login_count-0;
				}	
			}
		}
		return Tool::htmlString($html);
		
	}


	//增删修模型
	protected function aud($sql){
		$db = DB::getDB();
		$result = $db->query($sql);
		$affected_rows = $db->affected_rows;
		DB::unDB($result,$db);
		return $affected_rows;
	}

	//查找总记录模型
	protected function total($sql){
		$db = DB::getDB();
		$result = $db->query($sql);
		$total = $result->fetch_row();
		DB::unDB($result,$db);
		return $total[0];
	}

		//获取下一个增值id
	public function nextId($table){
		$sql = "SHOW TABLE STATUS LIKE '{$table}'";
		$object = $this->one($sql);
		return $object->Auto_increment;
	}
	//执行多条sql语句
	public function multi($sql){
        $_db = DB::getDB();
        $_db->multi_query($sql);
        DB::unDB($result = null,$_db);
        return true;
    }
}
