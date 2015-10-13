<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index() {
        echo 'hello,thinkphp!';
    }

    public function hello($name='thinkphp'){
        $this->assign('name',$name);
        $this->display();
    }

    public function data(){
        $Data     = M('Data');// 实例化Data数据模型
        $result     = $Data->find(1);
        $this->assign('result',$result);
        $this->display();
    }
}