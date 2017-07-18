<?php
//是否开启缓冲区,前台
define('IS_CACHE',false);
IS_CACHE?ob_start():null;
//模板句柄
global $tpl;
$_nav = new NavAction($tpl);
$_nav->showfront();//列出主导航
?>