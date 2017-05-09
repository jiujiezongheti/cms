<?php
//管理员实体类
class Manage{
	//查询所有管理员
	public function getManage(){
		//过程化操作数据库
		$db = DB::getDB();
		$sql = 'SELECT m.id,m.admin_user,m.login_count,m.last_ip,m.last_time,l.level_name FROM manage m,level l WHERE m.level=l.level ORDER BY id ASC LIMIT 0,10';
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
		//新增管理员
	public function addManage($admin_user,$admin_pass,$level){
		$db = DB::getDB();
		$time = time();
		$result = $sql = "INSERT INTO manage (admin_user,admin_pass,level,reg_time) VALUES ('{$admin_user}','{$admin_pass}','{$level}','{$time}')";
		$db->query($sql);
		$affected_rows = $db->affected_rows;
		DB::unDB($result,$db);
		return $affected_rows;
	}
		//修改管理员
	public function updateManage(){

	}
		//删除管理员
	public function deleteManage(){

	}
}
?>