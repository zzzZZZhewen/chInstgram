<?php
namespace Home\Controller;

class IndexController extends CoreController {

    public function index($page = 0) {

        $Model = new \Think\Model();

        $this->assign('post_has_more', $this->get_index_PostList_count() > C('COUNT_POST_PER_PAGE'));

        $this->display();
    }


    public function get_index_PostList($page = 0) {
        $Model = new \Think\Model();

        $COUNT_POST_PER_PAGE = C('COUNT_POST_PER_PAGE');
        $start_post_number = $page * $COUNT_POST_PER_PAGE;
        $this_user_id = (int)$this->User['user_id'];

        $PostList = $Model->query("SELECT post_id,post_content,post_datetime,post_url,chist_post.user_id,user_nickname,user_image_url
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        LEFT JOIN chist_follow ON (chist_follow.followed_user_id = chist_post.user_id)
                        WHERE chist_post.user_id = $this_user_id
                        OR chist_follow.follower_id = $this_user_id
                        ORDER BY post_datetime DESC
                        LIMIT $start_post_number, $COUNT_POST_PER_PAGE;");

        return $PostList;
    }

    public function get_index_PostList_count() {
        $Model = new \Think\Model();

        $this_user_id = (int)$this->User['user_id'];

        $count = $Model->query("SELECT COUNT(post_id) as count_post_id
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        LEFT JOIN chist_follow ON (chist_follow.followed_user_id = chist_post.user_id)
                        WHERE chist_post.user_id = $this_user_id
                        OR chist_follow.follower_id = $this_user_id;");

        return $count[0]['count_post_id'];
    }


    public function more_index_posts() {
        if (IS_POST) {


            $post = I('post.');

            $PostList = $this->get_index_PostList($post['page']);

            $this->assign('PostList', $PostList);
            $this->display('more_posts');
        } else {
        }
    }

}