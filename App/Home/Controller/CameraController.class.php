<?php
/**
 * Created by PhpStorm.
 * User: miaozhewen
 * Date: 15/10/31
 * Time: 上午3:34
 */
namespace Home\Controller;

use Think\Controller;

class CameraController extends CoreController {

    public $Model = null;

    protected function _initialize() {
        parent::_initialize();
        $this->Model = D('Post');
    }

    public function index() {

        if (IS_POST) {
            // input
            $data = I('post.');
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

    public function post_success() {

        if (IS_POST) {
            // input
            $data = I('post.');

            // sql check
            if (!$this->Model->create($data)) {
                //
                session('error', $this->Model->getError());
                redirect('post_failed');

            } else {
                if (empty($_FILES['post_url']['tmp_name'])) {
                    session('error', 'no image uploaded');
                    redirect('post_failed');
                } else {
                    $config = array(
                        'maxSize' => 31457280, //30mb
                        'rootPath' => './Uploads/',
                        'savePath' => 'posts/',
                        'saveName' => array('uniqid', ''),
                        'exts' => array('jpg', 'png', 'jpeg', 'pjpeg'),
                        'autoSub' => false,
                    );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->upload();
                    if (!$info) {
                        // 上传错误提示错误信息
                        session('error', $upload->getError());
                        if ($upload->getError() == "上传文件后缀不允许"){
                            session('error', "not a supported image format");
                        }

                        redirect(U('post_failed'));
                    }

                    //上传成功

                    //处理图片

                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $info['post_url']['savepath'] . '/' . $info['post_url']['savename']);
                    $image->thumb($image->width(), $image->height())->save('./Uploads/' . $info['post_url']['savepath'] . '/' . 'compressed_' . $info['post_url']['savename']);


                    $width = 500;
                    $width2 = 1080;


                    $height =  500 * $image->height() / $image->width();
                    $height2 = 1080 * $image->height() / $image->width();

                    $image->thumb($width, $height)->save('./Uploads/' . $info['post_url']['savepath'] . '/' . 'thumb500_' . $info['post_url']['savename']);
                    $image->thumb($width2, $height2)->save('./Uploads/' . $info['post_url']['savepath'] . '/' . 'thumb1080_' . $info['post_url']['savename']);


                    $data['post_url'] = $info['post_url']['savename'];

                }

                //滤镜暂时不加
                $data['post_filter'] = 0;
                //地点信息暂时不加
                $data['post_gps'] = '';

                $data['user_id'] = $this->User['user_id'];
                $data['post_datetime'] = get_datetime();

                $this->Model->add($data);
                redirect(U('User/index'));
            }

        } else {
            redirect(U('User/index'));
        }
    }

    public function post_failed() {
        $this->assign('error', I('session.error'));
        session('error', null);
        $this->display();
    }

}
