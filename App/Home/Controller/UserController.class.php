<?php
/**
 * Created by PhpStorm.
 * User: miaozhewen
 * Date: 15/10/31
 * Time: 上午3:34
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends CoreController {

    public $Model = null;

    protected function _initialize() {
        parent::_initialize();
        $this->Model = D('User');
    }

    public function index() {

        $this->display();

    }

    public function login() {
        if (IS_POST) {
            $action = I('post.action', 0);
            if ($action == 'login') {
                // input
                $user_email = I('post.user_email', 0);
                $user_password = I('post.user_password', 0);

                // sql
                $condition['user_email'] = $user_email;
                $condition['user_password'] = $user_password;

                $user_tmp = $this->Model->where($condition)->select();


                // input legal
                if (!empty($user_tmp)) {
                    $data = $user_tmp[0];
                    // save global user
                    session('User', $data);
                    $data['res'] = 1;
                    unset($data['user_password']);


                } else {
                    $data['res'] = 0;
                }

                $this->ajaxReturn($data);
            } else {

            }
        } else {
            $this->display();
        }
    }

    public function register() {
        if (IS_POST) {
            $action = I('post.action', 0);
            if ($action == 'register') {
                // input
                $data['user_email'] = I('post.user_email', 0);
                $data['user_password'] = I('post.user_password', 0);
                $data['user_password_again'] = I('post.user_password_again', 0);
                $data['user_realname'] = I('post.user_realname', 0);
                $data['user_nickname'] = I('post.user_nickname', 0);
                $data['user_tel'] = I('post.user_tel', 0);
                $data['user_sex'] = I('post.user_sex', 0);
                $data['user_image_url'] = 'default.jpg';
                $data['user_info'] = '';

                // sql
                if (!$this->Model->create($data)) {
                    //
                    $this->ajaxReturn(array('res' => 0, 'error' => $this->Model->getError()));

                } else {
                    //success
                    $this->Model->add();
                    $this->ajaxReturn(array('res' => 1));
                }

            } else {

            }
        } else {
            $this->display();
        }
    }

    public function logout() {
        if (IS_POST) {
            $action = I('post.action', 0);
            if ($action == 'logout') {
                // sql
                session('User', null);
                $this->ajaxReturn(array('res' => 1));

            } else {
                $this->ajaxReturn(array('res' => 0));

            }
        } else {
        }
    }

}
