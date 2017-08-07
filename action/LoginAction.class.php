<?php
/**
 * Created by PhpStorm.
 * User: xiaohuihui
 * Date: 2017/8/7
 * Time: 19:20
 */

class LoginAction extends Action{
    //构造方法
    public function __construct(&$tpl){
        parent::__construct($tpl,new ManageModel());
    }

    //action
    public function _action(){
        if(!!$action=isset($_GET['action'])?$_GET['action']:''){
            switch ($action) {
                case 'login':
                    $this->login();
                    break;
                case 'logout':
                    $this->logout();
                    break;
            }
        }
    }


    //logout
    private function logout(){
        Tool::unSession();
        Tool::alertLocation(null,'admin_login.php');
    }


    //login
    private function login(){
        if(isset($_POST['send'])){
            $code = strtolower(isset($_POST['code'])?$_POST['code']:'');
            if(Validate::checkLength($code,4,'equals'))Tool::alertBack('验证码必须为4位');
            if(Validate::checkEquals($code,$_SESSION['code']))Tool::alertBack('验证码不正确');
            if(Validate::checkNull($_POST['admin_user']))Tool::alertBack('警告:用户名不得为空');
            if(Validate::checkLength($_POST['admin_user'],2,'min'))Tool::alertBack('警告:用户名不得小于2位');
            if(Validate::checkLength($_POST['admin_user'],20,'max'))Tool::alertBack('警告:用户名不得大于20位');
            if(Validate::checkNull($_POST['admin_pass']))Tool::alertBack('警告:密码不得为空');
            if(Validate::checkLength($_POST['admin_pass'],6,'min'))Tool::alertBack('警告:密码不得小于6位');
            $this->_model->admin_user=$_POST['admin_user'];
            $this->_model->admin_pass=sha1($_POST['admin_pass']);
            $login = $this->_model->getLoginManage();
            if ($login) {
                $_SESSION['admin']=$login;
                Tool::alertLocation(null,'admin.php');
            }else{
                Tool::alertBack('警告：用户名或密码错误');
            }
        }
    }
}