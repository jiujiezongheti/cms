<?php
class ContentAction extends Action{
	//构造方法
	public function __construct(&$tpl){
	    $manage = new ContentModel();
		parent::__construct($tpl,$manage);
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

	}
	//add
	private function _add(){
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title','新增文档');
	}
	//update
	private function _update(){

	}
	//delete
	private function _delete(){

	}
}
