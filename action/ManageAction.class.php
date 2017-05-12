<?php
class ManageAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		parent::__construct($tpl,new ManageModel());
		$this->_action();
		$this->_tpl->display('manage.tpl');
	}
	//action
	private function _action(){
		if(!!$action=isset($_GET['action'])?$_GET['action']:''){
			switch ($action) {
				case 'list':
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

	//list 
	private function _show(){
		$this->_tpl->assign('list',true);
		$this->_tpl->assign('title','管理员列表');
		$this->_tpl->assign('AllManage',$this->_model->getManage());
	}
	//add
	private function _add(){
		if(isset($_POST['submit'])){
			$this->_model->admin_user = $_POST['admin_user'];
			$this->_model->admin_pass = sha1($_POST['admin_pass']);
			$this->_model->level = $_POST['level'];
			$this->_model->addManage()?Tool::alertLocation('新增成功！','manage.php?action=list'):Tool::alertBack('新增失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title','新增管理员');
	}
	//update
	private function _update(){
		if (isset($_POST['submit'])) {
			$this->_model->id = $_POST['id'];
			$this->_model->admin_pass = sha1($_POST['admin_pass']);
			$this->_model->level = $_POST['level'];
			$this->_model->updateManage()?Tool::alertLocation('修改成功','manage.php?action=list'):Tool::alertBack('修改失败！');
		}
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			is_object($this->_model->getOneManage())?true:Tool::alertBack('不存在的管理员');
			$this->_tpl->assign('id',$this->_model->id);
			$this->_tpl->assign('admin_user',$this->_model->getOneManage()->admin_user);
			$this->_tpl->assign('level',$this->_model->getOneManage()->level);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title','修改管理员');
		
		}else{
			Tool::alertBack("非法操作");
		}
	}
	//delete
	private function _delete(){
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$this->_model->deleteManage()?Tool::alertLocation('删除成功!','manage.php?action=list'):Tool::alertBack('删除失败');
		}else{
			Tool::alertBack("非法操作");
		}
	}
}
?>