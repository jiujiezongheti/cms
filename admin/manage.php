<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
require ROOT_PATH.'/model/Manage.class.php';
global $tpl;
//业务流程控制器
if(!!$action=isset($_GET['action'])?$_GET['action']:''){
	switch ($action) {
		case 'list':
			$tpl->assign('list',true);
			$tpl->assign('title','管理员列表');
			break;
		case 'add':
			$tpl->assign('add',true);
			$tpl->assign('title','新增管理员');
			break;
		case 'delete':
			$tpl->assign('delete',true);
			$tpl->assign('title','删除管理员');
			break;
		case 'update':
			$tpl->assign('update',true);
			$tpl->assign('title','修改管理员');
			break;
		default:
			# code...
			break;
	}
}

$manage = new Manage();
$tpl->assign('AllManage',$manage->getManage());
$tpl->display('manage.tpl');
?>