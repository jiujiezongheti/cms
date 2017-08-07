<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();
global $tpl;
$manage = new ManageAction($tpl); //入口
$manage->_action();
$tpl->display('manage.tpl');
?>