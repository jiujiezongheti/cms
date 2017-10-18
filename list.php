<?php
/**
 * Created by PhpStorm.
 * User: xiaohuihui
 * Date: 2017/9/13
 * Time: 20:50
 */

require_once dirname(__FILE__)."/init.inc.php";
global $tpl;
$list = new ListAction($tpl);
//载入tpl文件
$list->getNav();
$tpl->display('list.tpl');