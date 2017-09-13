<?php
class NavAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		$model = new NavModel();
		parent::__construct($tpl,$model);
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
				case 'addchild':
					$this->_addchild();
					break;
				case 'showchild':
					$this->_showchild();
					break;
                case 'sort':
                    $this->sort();
                    break;
				default:
					Tool::alertBack("非法操作！");
					break;
			}
		}
	}

	//addchild
	private function _addchild(){
		if(isset($_POST['submit'])){
			$this->_add();
		}
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$_nav = $this->_model->getOneNav();
			is_object($_nav)?true:Tool::alertBack('不存在的导航');
			$this->_tpl->assign('pid',$_nav->id);
			$this->_tpl->assign('addchild',true);
			$this->_tpl->assign('title','新增子导航');
			$this->_tpl->assign('prev_name',$_nav->nav_name);
		}
	}
	//showchild
	private function _showchild(){
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$_nav = $this->_model->getOneNav();
			is_object($_nav)?true:Tool::alertBack('不存在的导航');
			$page = new Page($this->_model->getNavChildTotal(),PAGE_SIZE);
			$this->_model->limit = $page->limit;
			$this->_tpl->assign('pid',$_nav->id);
			$this->_tpl->assign('showchild',true);
			$this->_tpl->assign('title','子导航列表');
			$this->_tpl->assign('AllChildNav',$this->_model->getAllChildNav());
			$this->_tpl->assign('page',$page->showpage());
			$this->_tpl->assign('prev_name',$_nav->nav_name);
		}
	}

    /**
     * show
     */
	private function _show(){
		//echo $this->_model->getNavTotal();exit();
		$page = new Page($this->_model->getNavTotal(),PAGE_SIZE);
		$this->_model->limit = $page->limit;
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title','导航列表');
		$this->_tpl->assign('AllNav',$this->_model->getAllNav());
		$this->_tpl->assign('page',$page->showpage());
	}

    /**
     * add
     */
	private function _add(){
		if(isset($_POST['submit'])){
			if(Validate::checkNull($_POST['nav_name']))Tool::alertBack('警告:导航不得为空');
			if(Validate::checkLength($_POST['nav_name'],2,'min'))Tool::alertBack('警告:导航不得小于2位');
			if(Validate::checkLength($_POST['nav_name'],20,'max'))Tool::alertBack('警告:导航不得大于20位');
			if(Validate::checkLength($_POST['nav_info'],200,'max'))Tool::alertBack('警告:导航描叙不得大于200位');
			$this->_model->nav_name = $_POST['nav_name'];
			$this->_model->nav_info = $_POST['nav_info'];
			$this->_model->pid = $_POST['pid'];
			$returnurl = $this->_model->pid?'nav.php?action=showchild&id='.$this->_model->pid:'nav.php?action=show';
			if($this->_model->getOneNav())Tool::alertBack('警告：导航名称已存在');
			$this->_model->addNav()?Tool::alertLocation('新增成功！',$returnurl):Tool::alertBack('新增失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title','新增导航');
	}

    /**
     * update
     */
	private function _update(){
		if (isset($_POST['submit'])) {
			if(Validate::checkNull($_POST['nav_name']))Tool::alertBack('警告:导航不得为空');
			if(Validate::checkLength($_POST['nav_name'],2,'min'))Tool::alertBack('警告:导航不得小于2位');
			if(Validate::checkLength($_POST['nav_name'],20,'max'))Tool::alertBack('警告:导航不得大于20位');
			if(Validate::checkLength($_POST['nav_info'],200,'max'))Tool::alertBack('警告:导航描叙不得大于200位');
			$this->_model->id = $_POST['id'];
			$this->_model->nav_name = $_POST['nav_name'];
			$this->_model->nav_info = $_POST['nav_info'];
			$this->_model->updateNav()?Tool::alertLocation('修改成功','nav.php?action=show'):Tool::alertBack('修改失败！');
		}
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$_nav = $this->_model->getOneNav();
			is_object($_nav)?true:Tool::alertBack('不存在的导航');
			$this->_tpl->assign('id',$_nav->id);
			$this->_tpl->assign('nav_name',$_nav->nav_name);
			$this->_tpl->assign('nav_info',$_nav->nav_info);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title','修改导航');
		
		}else{
			Tool::alertBack("非法操作");
		}
	}
	//delete
	private function _delete(){
		if(isset($_GET['id'])){
			$this->_model->id = $_GET['id'];
			$this->_model->deleteNav()?Tool::alertLocation('删除成功!','nav.php?action=show'):Tool::alertBack('删除失败');
		}else{
			Tool::alertBack("非法操作");
		}
	}

    /**
     * showfront
     */
	public function showfront(){
		$this->_tpl->assign('FrontNav',$this->_model->getFrontNav());
	}

    //sort
	private function sort(){
        if(isset($_POST['send'])){
            $this->_model->sort = $_POST['sort'];
            if($this->_model->setNavSort())Tool::alertLocation(null,$_SERVER['HTTP_REFERER']);
        }
    }
}
