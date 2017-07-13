<?php
class LevelAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		Validate::checkSession();
		parent::__construct($tpl,new LevelModel());
		$this->_action();
		$this->_tpl->display('level.tpl');
	}
	//action
	private function _action(){
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
		$page = new Page($this->_model->getLevelTotal(),PAGE_SIZE);
		$this->_model->limit = $page->limit;
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title','等级列表');
		$this->_tpl->assign('AllLevel',$this->_model->getAllLevel());
		$this->_tpl->assign('page',$page->showpage());
	}
	//add
	private function _add(){
		if(isset($_POST['submit'])){
			if(Validate::checkNull($_POST['level_name']))Tool::alertBack('警告:等级不得为空');
			if(Validate::checkLength($_POST['level_name'],2,'min'))Tool::alertBack('警告:等级不得小于2位');
			if(Validate::checkLength($_POST['level_name'],20,'max'))Tool::alertBack('警告:等级不得大于20位');
			if(Validate::checkLength($_POST['level_info'],200,'max'))Tool::alertBack('警告:等级描叙不得大于200位');
			$this->_model->level_name = $_POST['level_name'];
			if($this->_model->getOneLevel())Tool::alertBack('警告：等级名称已存在');
			$this->_model->level_info = $_POST['level_info'];
			$this->_model->addLevel()?Tool::alertLocation('新增成功！','level.php?action=show'):Tool::alertBack('新增失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title','新增等级');
	}
	//update
	private function _update(){
		if (isset($_POST['submit'])) {
			if(Validate::checkNull($_POST['level_name']))Tool::alertBack('警告:等级不得为空');
			if(Validate::checkLength($_POST['level_name'],2,'min'))Tool::alertBack('警告:等级不得小于2位');
			if(Validate::checkLength($_POST['level_name'],20,'max'))Tool::alertBack('警告:等级不得大于20位');
			if(Validate::checkLength($_POST['level_info'],200,'max'))Tool::alertBack('警告:等级描叙不得大于200位');
			$this->_model->id = $_POST['id'];
			$this->_model->level_name = $_POST['level_name'];
			$this->_model->level_info = $_POST['level_info'];
			$this->_model->updateLevel()?Tool::alertLocation('修改成功','level.php?action=show'):Tool::alertBack('修改失败！');
		}
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			is_object($this->_model->getOneLevel())?true:Tool::alertBack('不存在的等级');
			$this->_tpl->assign('id',$this->_model->id);
			$this->_tpl->assign('level_name',$this->_model->getOneLevel()->level_name);
			$this->_tpl->assign('level_info',$this->_model->getOneLevel()->level_info);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title','修改等级');
		
		}else{
			Tool::alertBack("非法操作");
		}
	}
	//delete
	private function _delete(){
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$_manage = new ManageModel();
			$_manage->level = $this->_model->id;
			if($_manage->getOneManage())Tool::alertBack('警告：等级被管理员占用');
			$this->_model->deleteLevel()?Tool::alertLocation('删除成功!','level.php?action=show'):Tool::alertBack('删除失败');
		}else{
			Tool::alertBack("非法操作");
		}
	}
}
?>