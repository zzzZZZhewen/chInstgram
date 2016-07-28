<?php

namespace Home\Controller;
use Think\Controller;

class SearchController extends CoreController {
    public function index(){

        $this->display();

    }

    public function result_for_users() {


        $get = I('get.');

        $condition['user_nickname'] = array('like','%' . $get['key'] . '%');

        $results = M('User')->where($condition)->select();

        for ($i = 0; $i < count($results); $i ++) {
            $user_id = $results[$i]['user_id'];
            $results[$i]['post_count'] = get_post_count_by_user_id($user_id);
            $results[$i]['follow_count'] = get_followed_count_by_user_id($user_id);
            $results[$i]['follower_count'] = get_follower_count_by_user_id($user_id);
        }


        $this->assign('Results',$results);

        $this->display("result");
    }
}

?>