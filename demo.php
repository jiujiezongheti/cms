<?php
require_once dirname(__FILE__)."/init.inc.php";
$vc = new ValidateCode();
echo $vc->doimg();
?>