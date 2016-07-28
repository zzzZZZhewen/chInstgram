<?php
namespace Home\Controller;

class IndexController extends CoreController {

    public function index($page = 0) {

        $Model = new \Think\Model();

        $post_count = $this->get_index_PostList_count();
        if ($post_count == 0) {
            $this->assign('no_post', true);
        } else {
            $this->assign('no_post', false);

        }

        $this->assign('post_has_more', $post_count > C('COUNT_POST_PER_PAGE'));

        $this->display();
    }


    public function get_index_PostList($page = 0) {
        $Model = new \Think\Model();

        $COUNT_POST_PER_PAGE = C('COUNT_POST_PER_PAGE');
        $start_post_number = $page * $COUNT_POST_PER_PAGE;
        $this_user_id = (int)$this->User['user_id'];

        $PostList = $Model->query("SELECT post_id,post_content,post_datetime,post_url,chist_post.user_id,user_nickname,user_image_url
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_post.user_id = $this_user_id OR chist_post.user_id IN (
                          SELECT followed_user_id FROM chist_follow WHERE follower_id = $this_user_id
                        )
                        ORDER BY post_datetime DESC
                        LIMIT $start_post_number, $COUNT_POST_PER_PAGE;");

        for ($i = 0; $i < count($PostList); $i ++) {
            $post_id = $PostList[$i]["post_id"];
            //$result = $Model->query("SELECT * FROM chist_like WHERE post_id = $postid AND user_id = $this_user_id;");
            $condition['post_id'] = $post_id;
            $condition['user_id'] = $this_user_id;
            $result = M('Like')->where($condition)->count();
            if ($result > 0) {
                $PostList[$i]["like_active"] = "active";
            }
            $PostList[$i]["comment_count"] = get_comment_count_by_post_id($post_id);
            $PostList[$i]["like_count"] = get_like_count_by_post_id($post_id);
        }

        return $PostList;
    }

    public function get_index_PostList_count() {
        $Model = new \Think\Model();

        $this_user_id = (int)$this->User['user_id'];

        $count = $Model->query("SELECT COUNT(post_id) as count_post_id
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_post.user_id = $this_user_id OR chist_post.user_id IN (
                          SELECT followed_user_id FROM chist_follow WHERE follower_id = $this_user_id
                        )
                        ORDER BY post_datetime DESC;");

        return $count[0]['count_post_id'];
    }


    public function more_index_posts() {
        if (IS_POST) {
            $post = I('post.');

            $PostList = $this->get_index_PostList($post['page']);

            $this->assign('PostList', $PostList);
            $this->display('Index:more_posts');
        } else {
        }
    }

    public function like_post() {
        if (IS_POST) {
            $post = I('post.');

            // sql
            $condition['user_id'] = (int)$this->User['user_id'];
            $condition['post_id'] = $post['post_id'];

            $like_tmp = M('Like')->where($condition)->select();

            // input legal
            if (empty($user_tmp)) {
                $data['res'] = 1;
                M('Like')->add($condition);
            } else {
                $data['res'] = 0;
            }

            $this->ajaxReturn($data);
        } else {
        }
    }

    public function more_comments() {
        if (IS_POST) {

            $post = I('post.');

            $CommentList = get_CommentList_by_post_id($post['post_id'], $post['page']);

            $count_left = get_comment_count_by_post_id($post['post_id']) - ($post['page'] + 1) * C('COUNT_COMMENT_PER_PAGE');


            $this->assign('count_left', $count_left);
            $this->assign('post_id', $post['post_id']);
            $this->assign('page', $post['page'] + 1);
            $this->assign('CommentList', $CommentList);
            $this->display('Index:more_comments');
        } else {
        }
    }

    public function add_comment() {
        if (IS_POST) {
            $Model = D('Comment');

            $post = I('post.');
            $data['comment_content'] = $post['comment_content'];
            $data['comment_post_id'] = $post['post_id'];
            $data['comment_date'] = get_datetime();
            $data['comment_user_id'] = $this->User['user_id'];
            // sql
            if (!$Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $Model->getError()));

            } else {
                //success
                $Model->add();
                $this->ajaxReturn(array('res' => 1,'error' => "comment adding succeeded"));
            }

        } else {
        }
    }

}