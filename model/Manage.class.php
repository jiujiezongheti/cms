<?php
//管理员实体类
class Manage{
	private $tpl;
	private $admin_user;
	private $admin_pass;
	private $level;
	private $id;
	//构造方法,初始化
	public function __construct(&$tpl){
		$this->tpl = $tpl;
		$this->Action();
	}


	//业务流程控制器
	private function Action(){

		if(!!$action=isset($_GET['action'])?$_GET['action']:''){
			switch ($action) {
				case 'list':
					$this->tpl->assign('list',true);
					$this->tpl->assign('title','管理员列表');
					$this->tpl->assign('AllManage',$this->getManage());
					break;
				case 'add':
					if(isset($_POST['submit'])){
						$this->admin_user = $_POST['admin_user'];
						$this->admin_pass = sha1($_POST['admin_pass']);
						$this->level = $_POST['level'];
						if($this->addManage()){
							Tool::alertLocation('新增成功！','manage.php?action=list');
						}else{
							Tool::alertBack('新增失败！');
						}
					}
					$this->tpl->assign('add',true);
					$this->tpl->assign('title','新增管理员');
					break;
				case 'delete':
					$this->tpl->assign('delete',true);
					$this->tpl->assign('title','删除管理员');
					$this->updateManage();
					break;
				case 'update':
					$this->tpl->assign('update',true);
					$this->tpl->assign('title','修改管理员');
					break;
				default:
					# code...
					break;
			}
		}
		$this->tpl->display('manage.tpl');
	}

	//查询所有管理员
	public function getManage(){
		//过程化操作数据库
		$db = DB::getDB();
		$sql = 'SELECT m.id,m.admin_user,m.login_count,m.last_ip,m.last_time,l.level_name FROM manage m,level l WHERE m.level=l.level ORDER BY id ASC LIMIT 0,20';
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
	public function addManage(){
		$db = DB::getDB();
		$time = time();
		$result = $sql = "INSERT INTO manage (admin_user,admin_pass,level,reg_time) VALUES ('{$this->admin_user}','{$this->admin_pass}','{$this->level}','{$time}')";
		$db->query($sql);
		$affected_rows = $db->affected_rows;
		DB::unDB($result,$db);
		return $affected_rows;
	}
		//修改管理员
	public function updateManage(){
		if(isset($_GET['id'])){
			$this->id = $_GET['id'];
		}else{
			Tool::alertBack("非法操作");
		}
		
	}
		//删除管理员
	public function deleteManage(){

	}
}
?>