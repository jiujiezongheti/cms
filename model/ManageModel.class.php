<?php
//管理员实体类
class ManageModel extends Model{
	private $admin_user;
	private $admin_pass;
	private $level;
	private $id;

	//__set()方法用来设置私有属性 
	public function __set($name,$value){ 
		$this->$name = $value; 
	} 
	//__get()方法用来获取私有属性 
	public function __get($name){ 
		return $this->$name; 
	} 
	//查询单个管理员
	public function getOneManage(){
		$sql = "SELECT admin_user,level,admin_pass
				FROM manage 
				WHERE id='{$this->id}' 
				OR admin_user='{$this->admin_user}'
				OR level='{$this->level}'
				LIMIT 1";
		return parent::one($sql);
	}


	//查询所有管理员
	public function getAllManage(){
		//过程化操作数据库
		$sql = 'SELECT m.id,
					m.admin_user,
					m.login_count,
					m.last_ip,
					m.last_time,
					l.level_name 
				FROM manage m,level l 
				WHERE m.level=l.id 
				ORDER BY id ASC 
				LIMIT 0,20';
		return parent::all($sql);
	}
		//新增管理员
	public function addManage(){
		$time = time();
		$sql = "INSERT INTO manage 
					(admin_user,
						admin_pass,
						level,
						reg_time) 
				VALUES 
					('{$this->admin_user}',
						'{$this->admin_pass}',
						'{$this->level}',
						'{$time}')";
		return parent::aud($sql);
	}
		//修改管理员
	public function updateManage(){
		
		$sql = "UPDATE manage 
				SET admin_pass='{$this->admin_pass}',
					level='{$this->level}' 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}
		//删除管理员
	public function deleteManage(){
		$sql = "DELETE FROM manage 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}

	//获取所有记录条数
	public function getManageTotal(){
		$_sql = 'SELECT COUNT(*) FROM manage';
		return parent::total($_sql);
	}

}
?>