<?php
//开启session
session_start();
//设置编码格式
header('Content-Type:text/html;charset=utf-8');
//设置时区
date_default_timezone_set('PRC');
//网站根目录
define('ROOT_PATH',dirname(__FILE__));
//引入配置信息
require ROOT_PATH.'/config/profile.inc.php';
//设置时区
date_default_timezone_set('Asia/Shanghai');
//自动加载类
function __autoload($className){
	if(substr($className,-6)=='Action'){
		require ROOT_PATH.'/action/'.$className.'.class.php';
	}elseif(substr($className,-5)=='Model'){
		require ROOT_PATH.'/model/'.$className.'.class.php';
	}else{
		require ROOT_PATH.'/includes/'.$className.'.class.php';
	}
}
//实例化模板类
$tpl = new Templates();
//初始化
require 'common.inc.php';
?>