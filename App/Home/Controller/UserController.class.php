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
            // input
            $user_email = I('post.user_email', '');
            $user_password = I('post.user_password', '');

            // sql
            $condition['user_email'] = $user_email;
            $condition['user_password'] = $user_password;

            $user_tmp = $this->Model->where($condition)->select();

            // input legal
            if (!empty($user_tmp)) {
                $data['res'] = 1;
            } else {
                $data['res'] = 0;
            }

            $this->ajaxReturn($data);

        } else {
            $this->display();
        }
    }

    public function login_success() {
        if (IS_POST) {
            // input
            $user_email = I('post.user_email', '');
            $user_password = I('post.user_password', '');

            // sql
            $condition['user_email'] = $user_email;
            $condition['user_password'] = $user_password;

            $user_tmp = $this->Model->where($condition)->select();


            // input legal
            if (!empty($user_tmp)) {
                $data = $user_tmp[0];
                unset($data['user_password']);
                // save global user
                session('User', $data);
                redirect(U('Home/Index/index'));
            } else {

                $this->error('帐号或密码错误');

            }

        } else {
            redirect(U('Home/User/login'));
        }
    }

    public function register() {
        if (IS_POST) {
            // input
            $data['user_email'] = I('post.user_email');
            $data['user_password'] = I('post.user_password');
            $data['user_password_again'] = I('post.user_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);
            $data['user_image_url'] = 'avatar_default.jpg';

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $this->Model->getError()));

            } else {
                //success
                $this->ajaxReturn(array('res' => 1));
            }

        } else {
            $this->display();
        }
    }

    public function register_success() {
        if (IS_POST) {
            // input
            $data['user_email'] = I('post.user_email');
            $data['user_password'] = I('post.user_password');
            $data['user_password_again'] = I('post.user_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);
            $data['user_image_url'] = 'avatar_default.jpg';

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->error($this->Model->getError());

            } else {
                //success
                $this->Model->add();
                echo 'aha';
                //$this->display();
            }

        } else {
            redirect(U('register'));
        }
    }

    public function logout() {
        session('User', null);
        redirect(U('login'));
    }

}
