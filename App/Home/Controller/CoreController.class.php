<?php

namespace Home\Controller;

use Think\Controller;

class CoreController extends Controller {

    //全局User信息
    public $User;

    /**
     * 后台控制器初始化
     */
    protected function _initialize() {

        /*如果有User登录，读取User信息*/
        if (session('?User.user_id')) {
            $this->User = session('User');
            $this->assign('User', $this->User);
        } else {
            if (!(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'login')
                && !(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'register')
                && !(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'login_success')
                && !(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'User' && ACTION_NAME == 'register_success')
            )
                redirect(U('Home/User/login'));
        }
    }

}