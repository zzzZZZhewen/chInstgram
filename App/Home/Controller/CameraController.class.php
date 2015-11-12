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
    }

    public function index() {

        $this->display();

    }


}
