<?php
/**
 * Created by PhpStorm.
 * User: miaozhewen
 * Date: 15/10/31
 * Time: 上午3:48
 */

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller {

    public function index() {

        $this->display();

    }

    public function four_o_four() {

        echo '找不到';

    }
}