<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index() {


        if (I("session.user_id", -1) == -1) {
            redirect('Home/User/login');

        } else {
            $this->display();
            unset($_SESSION['user_id']);
        }

    }
}