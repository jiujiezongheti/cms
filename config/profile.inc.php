<?php
//数据库配置文件
define('DB_HOST','localhost'); //ip
define('DB_USER', 'root');     //用户名
define('DB_PASS', '');         //密码
define('DB_NAME', 'cms');		//数据库名

//系统配置文件
define('PAGE_SIZE', 10);    //每页显示条数
define('NAV_SIZE',10);      //主导航前台显示条数
//模板配置信息
define('TPL_DIR', ROOT_PATH.'/templates/');//模板文件目录
define('TPL_C_DIR', ROOT_PATH.'/templates_c/');//编译目录
define('CACHE', ROOT_PATH.'/cache/');//缓存目录
?>