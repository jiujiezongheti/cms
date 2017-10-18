<?php
class ListAction extends Action{
	//构造方法
	public function __construct(&$tpl){
		parent::__construct($tpl);
	}

	//获取前台显示的导航
    public function getNav(){
        if(isset($_GET['id'])){
            $_nav = new NavModel();
            $_nav->id = $_GET['id'];
            if($_nav->getOneNav()){
                //主导航
                $_nav1 = $_nav->getOneNav()->iid?'<a href="/list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt; ':'';
                $_nav2 = '<a href="/list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
                $this->_tpl->assign('nav',$_nav1.$_nav2);
                //子导航集
                $this->_tpl->assign('childNav',$_nav->getAllChildFrontNav());
            }else{
                Tool::alertBack('警告：此导航不存在！');
            }
        }else{
            Tool::alertBack('警告：非法操作！');
        }
    }
}
