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
        $this->Model = M('User');
    }

    public function index(){

        $this->display();

    }

    public function login(){
        if (IS_POST){

        }else{
            $this->display();
        }
    }


}