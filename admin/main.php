<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $tpl;
//var_dump($tpl);
Validate::checkSession();
$tpl->display('main.tpl');
?>