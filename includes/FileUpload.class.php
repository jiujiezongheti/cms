<?php
/**
 * Created by PhpStorm.
 * User: xiaohuihui
 * Date: 2017/10/24
 * Time: 14:33
 */

//上传文件类
class FileUpload{
    private $error;   //错误代码
    private $maxsize; //表单最大值
    private $type;    //类型
    private $typeArr = ['image/jpeg','image/pjpeg','image/png','image/x-png','image/gif']; //类型合集
    private $path;    //目录路径
    private $today;   //当天目录
    private $name;    //文件名
    private $tmp;     //临时文件
    private $linkPath; //返回路径

    //构造方法初始化
    public function __construct($_file,$maxsize){
        $this->error = $_FILES[$_file]['error'];
        $this->maxsize = $maxsize/1024;
        $this->type = $_FILES[$_file]['type'];
        $this->path = ROOT_PATH . UPDIR;
        $this->today = $this->path.date('Ymd').'/';
        $this->name = $_FILES[$_file]['name'];
        $this->tmp = $_FILES[$_file]['tmp_name'];
        $this->checkError();
        $this->checkType();
        $this->checkPath();
        $this->moveUpload();
    }

    //返回路径
    public function getPath(){
        return $this->linkPath;
    }

    //移动文件
    private function moveUpload(){
        if(is_uploaded_file($this->tmp)){
            if(!move_uploaded_file($this->tmp,$this->setNewName())){
                Tool::alertBack('警告：上传失败！');
            }

        }else{
            Tool::alertBack('警告：临时文件不存在!');
        }
    }

    //设置新文件名
    private function setNewName(){
        $_nameArr = explode('.',$this->name);
        $_postfix = $_nameArr[count($_nameArr)-1];
        $_newname = date('YmdHis').mt_rand(100,1000).'.'.$_postfix;
        return $this->linkPath = $this->today.$_newname;
    }

    //验证类型
    private function checkType(){
        if(!in_array($this->type,$this->typeArr)){
            Tool::alertBack('警告：上传类型不合法！');
        }
    }

    //验证目录
    private function checkPath(){
        if(!is_dir($this->path)||!is_writeable($this->path)){
            if(!mkdir($this->path)){
                Tool::alertBack('警告：主目录创建失败！');
            }
        }
        if(!is_dir($this->today)||!is_writeable($this->today)){
            if(!mkdir($this->today)){
                Tool::alertBack('警告：子目录创建失败！');
            }
        }
    }

    //验证错误
    private function checkError(){
        if($this->error){
            switch ($this->error){
                case 1:
                    Tool::alertBack('警告：上传值超过了约定最大值！');
                    break;
                case 2:
                    Tool::alertBack('警告：上传值超过了'.$this->maxsize.'kb！');
                    break;
                case 3:
                    Tool::alertBack('警告：只有部分文件被上传！');
                    break;
                case 4:
                    Tool::alertBack('警告：没有任何文件被上传！');
                    break;
                default:
                    Tool::alertBack('警告：未知错误!');
            }
        }
    }
}