<?php
namespace Home\Controller;

class IndexController extends CoreController {

    public function index() {

        $Model = new \Think\Model();

        $user_id = $this->User['user_id'];

        $Model->query("select post_id,post_content,user_nickname,user_image_url,chist_post.user_id,post_datetime
                        from chist_post,chist_user,chist_follow
                        where ((chist_post.user_id = chist_follow.followed_user_id
                        AND  chist_follow.follower_id = 1)
                              OR chist_post.user_id = 1)
                        AND chist_post.user_id=chist_user.user_id
                        Order By post_datetime Desc;");


        $this->display();
    }

    public function posts($userid = 0) {


    }

    public function posts_show() {

    }
}