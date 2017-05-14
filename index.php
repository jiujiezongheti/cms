<?php
require_once dirname(__FILE__)."/init.inc.php";
global $tpl;
$tpl->assign('title','标头');
//载入tpl文件
$tpl->display('index.tpl');
?>