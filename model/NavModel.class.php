<?php
//导航实体类
class NavModel extends Model{
	private $nav_name;
	private $nav_info;
	private $id;
	private $pid;
	private $sort;
	private $limit = 1;

	//__set()方法用来设置私有属性 
	public function __set($name,$value){ 
		$this->$name = $value; 
	} 
	//__get()方法用来获取私有属性 
	public function __get($name){ 
		return $this->$name; 
	} 
	//获取所有记录条数
	public function getNavTotal(){
		$_sql = 'SELECT COUNT(*) FROM nav';
		return parent::total($_sql);
	}
	//查询所有导航
	public function getAllNav(){
		//过程化操作数据库
		$sql = "SELECT id,nav_name,nav_info 
				FROM nav LIMIT $this->limit";
		return parent::all($sql);
	}
	
}
?>