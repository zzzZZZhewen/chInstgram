<?php
/**
 * Created by PhpStorm.
 * User: miaozhewen
 * Date: 15/10/31
 * Time: 上午3:34
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){

        $this->display();

    }

    public function login(){

        $this->display();
    }
}