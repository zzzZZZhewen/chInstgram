<?php

namespace Home\Controller;

use Think\Controller;

class CoreController extends Controller {

    //全局用户信息
    public $User;

    /**
     * 后台控制器初始化
     */
    protected function _initialize() {

        /*如果有用户登录，读取用户信息*/
        if (session('user_id') > 0) {
            $this->User = session('User');
            $this->assign('User', $this->User);
        } else {
            if (MODULE_NAME != 'Home' || CONTROLLER_NAME != 'User' || ACTION_NAME != 'login')
                redirect(U('Home/User/login'));
        }
    }

}