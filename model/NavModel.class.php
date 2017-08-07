<?php
//导航实体类
class NavModel extends Model{
	private $nav_name;
	private $nav_info;
	private $id;
	private $pid;
	private $sort;
	private $limit;

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
		$_sql = 'SELECT COUNT(*) FROM nav WHERE pid=0';
		return parent::total($_sql);
	}


    /**
     * 获取所有记录条数(子)
     * @return mixed
     */
    public function getNavChildTotal(){
		$_sql = "SELECT COUNT(*) FROM nav WHERE pid='$this->id'";
		return parent::total($_sql);
	}

    /**
     * 查询所有导航
     * @return string
     */
    public function getAllNav(){
		//过程化操作数据库
		$sql = "SELECT id,nav_name,nav_info,sort 
				FROM nav WHERE pid=0 
				ORDER BY `sort` ASC $this->limit";
		//return $sql;
		return parent::all($sql);
	}

	//查询所有导航(子)
	public function getAllChildNav(){
		//过程化操作数据库
		$sql = "SELECT id,nav_name,nav_info 
				FROM nav WHERE pid='$this->id' 
				ORDER BY `id` ASC $this->limit";
		//return $sql;
		return parent::all($sql);
	}

	//新增
	public function addNav(){
		$time = time();
		$sql = "INSERT INTO nav 
					(nav_info,nav_name,pid,sort) 
				VALUES 
					('{$this->nav_info}',
					'{$this->nav_name}',
					'{$this->pid}',".parent::nextId('nav').")";
		return parent::aud($sql);
	}

	//查询单个
	public function getOneNav(){
		$sql = "SELECT id,nav_name,nav_info
				FROM nav 
				WHERE id='{$this->id}' OR nav_name='{$this->nav_name}' 
				LIMIT 1";
		return parent::one($sql);
	}
	//删除
	public function deleteNav(){
		$sql = "DELETE FROM nav 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}

	//修改
	public function updateNav(){	
		$sql = "UPDATE nav 
				SET nav_name='{$this->nav_name}',
					nav_info='{$this->nav_info}' 
				WHERE id='{$this->id}' 
				LIMIT 1";
		return parent::aud($sql);
	}
	
	//前台显示指定主导航
	public function getFrontNav(){
		$_sql = "SELECT id,nav_name 
				FROM nav WHERE pid=0 
				ORDER BY sort ASC 
				LIMIT 0,".NAV_SIZE;
		return parent::all($_sql);
	}
}
?>