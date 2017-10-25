<?php
require_once substr(dirname(__FILE__),0,-7)."/init.inc.php";
if(isset($_POST['send'])){
    $fileUpload = new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
    echo $fileUpload->getPath();
}
