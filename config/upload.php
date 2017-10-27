<?php
require_once substr(dirname(__FILE__),0,-7)."/init.inc.php";
if(isset($_POST['send'])){
    $fileUpload = new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
    $path = $fileUpload->getPath();
    $image = new Image($path);
    $image->out();
    Tool::alertOpenerClose('缩略图上传成功',$path);
}else{
    Tool::alertBack('警告：文件过大或者其他未知错误导致浏览器崩溃');
}
