<?php
require_once substr(dirname(__FILE__),0,-7)."/init.inc.php";
$vc = new ValidateCode();
echo $vc->doimg();
$_SESSION['code']=$vc->getCode();
?>