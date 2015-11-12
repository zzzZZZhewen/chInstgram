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
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
            $this->display();
        }
    }

    public function login_success() {
        if (IS_POST) {
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
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

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $this->Model->getError()));

            } else {
                //success
                $this->ajaxReturn(array('res' => 1));
            }

        } else {
            if (session('?User.user_email')) {
                redirect(U('Home/Index/index'));
            }
            $this->display();
        }
    }

    public function register_success() {
        if (IS_POST) {
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
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

            // sql check
            if (!$this->Model->create($data)) {
                //
                $this->error($this->Model->getError());

            } else {
                //success
                // check file existance
                if (empty($_FILES['user_image_url']['tmp_name'])) {
                    $data['user_image_url'] = 'avatar_default.jpg';
                } else {
                    $config = array(
                        'maxSize' => 3145728, // 3mb
                        'rootPath' => './Uploads/',
                        'savePath' => 'avatar/',
                        'saveName' => array('uniqid', ''),
                        'exts' => array('jpg', 'png', 'jpeg', 'pjpeg'),
                        'autoSub' => false,
                    );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->upload();
                    if (!$info) {
                        // 上传错误提示错误信息
                        session('error', $upload->getError());
                        redirect(U('upload_faild'));
                    }

                    //上传成功

                    //处理图片

                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);
                    $image->thumb(500, 500)->save('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);

                    $data['user_image_url'] = $info['user_image_url']['savename'];

                }


                $this->Model->add($data);
                unset($data['user_password']);
                unset($data['user_password_again']);
                $data['user_id'] = $this->Model->where(array('user_email' => $data['user_email']))->select()[0]['user_id'];
                session('User', $data);
                $this->display();
            }

        } else {
            redirect(U('Home/Index/index'));
        }
    }

    public function edit() {
        if (IS_POST) {
            // input
            $condition['user_id'] = $this->User['user_id'];

            $data = $this->Model->where($condition)->select()[0];

            $data['user_old_password'] = I('post.user_old_password');
            $data['user_new_password'] = I('post.user_new_password');
            $data['user_new_password_again'] = I('post.user_new_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);

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

    public function edit_success() {
        if (IS_POST) {
            // input
            $condition['user_id'] = $this->User['user_id'];

            $data = $this->Model->where($condition)->select()[0];

            $data['user_old_password'] = I('post.user_old_password');
            $data['user_new_password'] = I('post.user_new_password');
            $data['user_new_password_again'] = I('post.user_new_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->error($this->Model->getError());
            } else {
                //success
                // check file existance
                if (empty($_FILES['user_image_url']['tmp_name'])) {

                } else {
                    $config = array(
                        'maxSize' => 3145728, // 3mb
                        'rootPath' => './Uploads/',
                        'savePath' => 'avatar/',
                        'saveName' => array('uniqid', ''),
                        'exts' => array('jpg', 'png', 'jpeg', 'pjpeg'),
                        'autoSub' => false,
                    );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->upload();
                    if (!$info) {
                        // 上传错误提示错误信息
                        session('error', $upload->getError());
                        redirect(U('upload_faild'));
                    }

                    //上传成功

                    //处理图片

                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);
                    $image->thumb(500, 500)->save('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);

                    $data['user_image_url'] = $info['user_image_url']['savename'];

                }

                $this->Model->save($data);
                unset($data['user_password']);
                unset($data['user_password_again']);
                unset($data['user_new_password_again']);
                unset($data['user_new_password']);
                unset($data['user_old_password']);
                session('User', $data);
                redirect(U('index'));

            }

        } else {
            redirect(U('index'));
        }
    }

    public function logout() {
        session('User', null);
        redirect(U('login'));
    }

}
