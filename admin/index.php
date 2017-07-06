<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
isset($_SESSION['admin'])?header("Location:admin.php"):header("Location:admin_login.php");

?>