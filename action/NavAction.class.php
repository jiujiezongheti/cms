<?php
class NavAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		Validate::checkSession();
		parent::__construct($tpl,new NavModel());
		$this->_action();
		$this->_tpl->display('nav.tpl');

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
		//echo $this->_model->getNavTotal();exit();
		$page = new Page($this->_model->getNavTotal(),PAGE_SIZE);
		$this->_model->limit = $page->limit;
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title','导航列表');
		$this->_tpl->assign('AllNav',$this->_model->getAllNav());
		$this->_tpl->assign('page',$page->showpage());
	}
	//add
	private function _add(){
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title','新增导航');
	}
	//update
	private function _update(){
		
	}
	//delete
	private function _delete(){
		
	}
}
?>