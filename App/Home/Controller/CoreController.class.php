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
        if (session('?User.user_id')) {
            $this->User = session('User');
            $this->assign('User', $this->User);
        } else {
            if (!(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'login')
                && !(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'register')
            )
                redirect(U('Home/User/login'));
        }
    }

}