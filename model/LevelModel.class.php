<?php
//等级实体类
class LevelModel extends Model{
	private $level_name;
	private $level_info;
	private $id;

	//__set()方法用来设置私有属性 
	public function __set($name,$value){ 
		$this->$name = $value; 
	} 
	//__get()方法用来获取私有属性 
	public function __get($name){ 
		return $this->$name; 
	} 
	//查询单个
	public function getOneLevel(){
		$sql = "SELECT id,level_name,level_info
				FROM level 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::one($sql);
	}


	//查询所有
	public function getAllLevel(){
		//过程化操作数据库
		$sql = 'SELECT id,level_name,level_info
				FROM level
				ORDER BY id ASC 
				LIMIT 0,20';
		return parent::all($sql);
	}
		//新增
	public function addLevel(){
		$time = time();
		$sql = "INSERT INTO level 
					(level_info,level_name) 
				VALUES 
					('{$this->level_info}',
						'{$this->level_name}')";
		return parent::aud($sql);
	}
		//修改
	public function updateLevel(){
		
		$sql = "UPDATE level 
				SET level_name='{$this->level_name}',
					level_info='{$this->level_info}' 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}
		//删除
	public function deleteLevel(){
		$sql = "DELETE FROM manage 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}

	//查询等级
	public function getAllLevel(){
		$sql = "SELECT id,level_name,level_info 
				FROM level 
				ORDER BY id ASC";
		return parent::all($sql);
	}

}
?>