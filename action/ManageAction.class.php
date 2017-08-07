<?php
class ManageAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		parent::__construct($tpl,new ManageModel());
	}
	//action
	public function _action(){
		if(!!$action=isset($_GET['action'])?$_GET['action']:''){

			switch ($action) {
				case 'show':
					$this->_show();
					break;
				case 'add':
					$this->_add();
					break;
				case 'delete':
					$this->_delete();
					break;
				case 'update':
					$this->_update();
					break;
				default:
					Tool::alertBack("非法操作！");
					break;
			}
		}
	}


	//show 
	private function _show(){
		//echo $this->_model->getManageTotal();
		$page = new Page($this->_model->getManageTotal(),PAGE_SIZE);
		$this->_model->limit = $page->limit;
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title','管理员列表');
		$this->_tpl->assign('AllManage',$this->_model->getAllManage());
		$this->_tpl->assign('page',$page->showpage());
	}
	//add
	private function _add(){
		if(isset($_POST['submit'])){
			if(Validate::checkNull($_POST['admin_user']))Tool::alertBack('警告:用户名不得为空');
			if(Validate::checkLength($_POST['admin_user'],2,'min'))Tool::alertBack('警告:用户名不得小于2位');
			if(Validate::checkLength($_POST['admin_user'],20,'max'))Tool::alertBack('警告:用户名不得大于20位');
			if(Validate::checkNull($_POST['admin_pass']))Tool::alertBack('警告:密码不得为空');
			if(Validate::checkLength($_POST['admin_pass'],6,'min'))Tool::alertBack('警告:密码不得小于6位');
			if(Validate::checkEquals($_POST['admin_pass'],$_POST['admin_passnote']))Tool::alertBack('警告:两次密码不一样');
			
			$this->_model->admin_user = $_POST['admin_user'];
			if($this->_model->getOneManage())Tool::alertBack('警告：此用户已经存在');
			$this->_model->admin_pass = sha1($_POST['admin_pass']);
			$this->_model->level = $_POST['level'];
			$this->_model->addManage()?Tool::alertLocation('新增成功！','manage.php?action=show'):Tool::alertBack('新增失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title','新增管理员');
		$_level = new LevelModel();
		$this->_tpl->assign('AllLevel',$_level->getAllLevel());
	}
	//update
	private function _update(){
		if (isset($_POST['submit'])) {
			//Tool::alertBack($_POST['pass']);
			$this->_model->id = $_POST['id'];
			if(trim($_POST['admin_pass'])==''){
				$this->_model->admin_pass = $_POST['pass'];
			}else{
				if(Validate::checkLength($_POST['admin_pass'],6,'min'))Tool::alertBack('警告:密码不得小于6位');
				$this->_model->admin_pass = sha1($_POST['admin_pass']);
			}
			//$this->_model->admin_pass = sha1($_POST['admin_pass']);
			$this->_model->level = $_POST['level'];
			$this->_model->updateManage()?Tool::alertLocation('修改成功','manage.php?action=show'):Tool::alertBack('修改失败！');
		}
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$_manage = $this->_model->getOneManage();
			is_object($_manage)?true:Tool::alertBack('不存在的管理员');
			$this->_tpl->assign('id',$this->_model->id);
			$this->_tpl->assign('admin_user',$_manage->admin_user);
			$this->_tpl->assign('level',$_manage->level);
			$this->_tpl->assign('admin_pass',$_manage->admin_pass);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title','修改管理员');
			$_level = new LevelModel();
			$this->_tpl->assign('AllLevel',$_level->getAllLevel());
		
		}else{
			Tool::alertBack("非法操作");
		}
	}
	//delete
	private function _delete(){
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$this->_model->deleteManage()?Tool::alertLocation('删除成功!','manage.php?action=show'):Tool::alertBack('删除失败');
		}else{
			Tool::alertBack("非法操作");
		}
	}
}
?>