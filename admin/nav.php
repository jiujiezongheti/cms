<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
// echo ROOT_PATH;exit();
global $tpl;
//var_dump($tpl);
new NavAction($tpl); //入口
?>