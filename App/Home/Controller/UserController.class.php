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
        $this->Model = D('User');
    }

    public function index() {

        $this_user_id = $this->User['user_id'];

        $this->assign('user_post_count', get_post_count_by_user_id($this_user_id));
        $this->assign('user_followed_count', get_followed_count_by_user_id($this_user_id));
        $this->assign('user_follower_count', get_follower_count_by_user_id($this_user_id));

        $this->assign('post_has_more', $this->get_user_PostList_count($this_user_id) > C('COUNT_POST_PER_PAGE'));

        $this->assign('like_has_more', $this->get_like_PostList_count($this_user_id) > C('COUNT_POST_PER_PAGE'));


        $this->display();

    }

    public function get_user_PostList_count($user_id = 0) {
        $Model = new \Think\Model();


        $count = $Model->query("SELECT COUNT(post_id) as count_post_id
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_post.user_id = $user_id;");

        return $count[0]['count_post_id'];
    }

    public function get_user_PostList_by_user_id($page = 0, $user_id = 0) {
        $Model = new \Think\Model();

        $COUNT_POST_PER_PAGE = C('COUNT_POST_PER_PAGE');
        $start_post_number = $page * $COUNT_POST_PER_PAGE;

        $PostList = $Model->query("SELECT post_id,post_content,post_datetime,post_url,chist_post.user_id,user_nickname,user_image_url
                        FROM chist_post LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_post.user_id = $user_id
                        ORDER BY post_datetime DESC
                        LIMIT $start_post_number, $COUNT_POST_PER_PAGE;");


        for ($i = 0; $i < count($PostList); $i ++) {
            $post_id = $PostList[$i]["post_id"];
            //$result = $Model->query("SELECT * FROM chist_like WHERE post_id = $postid AND user_id = $this_user_id;");
            $condition['post_id'] = $post_id;
            $condition['user_id'] = $this->User['user_id'];
            $result = M('Like')->where($condition)->count();
            if ($result > 0) {
                $PostList[$i]["like_active"] = "active";
            }
            $PostList[$i]["comment_count"] = get_comment_count_by_post_id($post_id);
            $PostList[$i]["like_count"] = get_like_count_by_post_id($post_id);
        }

        return $PostList;
    }

    public function more_user_posts() {

        $post = I('post.');

        $PostList = $this->get_user_PostList_by_user_id($post['page'], $post['user_id']);

        $this->assign('PostList', $PostList);
        $this->display('Index/more_posts');

    }

    public function more_like_posts() {
        $post = I('post.');
        $PostList = $this->get_like_PostList_by_user_id($post['page'], $post['user_id']);

        $this->assign('PostList', $PostList);
        $this->display('Index/more_posts');
    }

    private function get_like_PostList_count($user_id) {
        $Model = new \Think\Model();
        $tmp = $Model->query("SELECT count(*) as count_like
                        FROM chist_like LEFT JOIN chist_post ON chist_post.post_id = chist_like.post_id LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_like.user_id = $user_id;");
        return $tmp[0]['count_like'];
    }

    public function get_like_PostList_by_user_id($page = 0, $user_id = 0) {
        $Model = new \Think\Model();

        $COUNT_POST_PER_PAGE = C('COUNT_POST_PER_PAGE');
        $start_post_number = $page * $COUNT_POST_PER_PAGE;

        $PostList = $Model->query("SELECT chist_post.post_id,post_content,post_datetime,post_url,chist_post.user_id,user_nickname,user_image_url
                        FROM chist_like LEFT JOIN chist_post ON chist_post.post_id = chist_like.post_id LEFT JOIN chist_user ON chist_post.user_id = chist_user.user_id
                        WHERE chist_like.user_id = $user_id
                        ORDER BY post_datetime DESC
                        LIMIT $start_post_number, $COUNT_POST_PER_PAGE;");


        for ($i = 0; $i < count($PostList); $i ++) {
            $post_id = $PostList[$i]["post_id"];
            //$result = $Model->query("SELECT * FROM chist_like WHERE post_id = $postid AND user_id = $this_user_id;");
            $condition['post_id'] = $post_id;
            $condition['user_id'] = $this->User['user_id'];
            $result = M('Like')->where($condition)->count();
            if ($result > 0) {
                $PostList[$i]["like_active"] = "active";
            }
            $PostList[$i]["comment_count"] = get_comment_count_by_post_id($post_id);
            $PostList[$i]["like_count"] = get_like_count_by_post_id($post_id);
        }

        return $PostList;
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

    public function other($user_id = 0) {
        $condition['user_id'] = $user_id;
        $other_users = $this->Model->where($condition)->select();
        if (empty($other_users)) {
            redirect(U('index'));
        } else {
            $other_users[0]['user_post_count'] = get_post_count_by_user_id($user_id);
            $other_users[0]['user_followed_count'] = get_followed_count_by_user_id($user_id);
            $other_users[0]['user_follower_count'] = get_follower_count_by_user_id($user_id);
            $other_users[0]['user_is_followed'] = is_followed($user_id, $this->User['user_id']);
            $other_users[0]['user_is_self'] = ($user_id == $this->User['user_id']);
            $this->assign('post_has_more', $this->get_user_PostList_count($user_id) > C('COUNT_POST_PER_PAGE'));
            $this->assign('like_has_more', $this->get_like_PostList_count($user_id) > C('COUNT_POST_PER_PAGE'));
            $this->assign('Other_user', $other_users[0]);
            $this->display();
        }
    }

    public function login() {
        if (IS_POST) {
            // input
            $user_email = I('post.user_email', '');
            $user_password = I('post.user_password', '');

            // sql
            $condition['user_email'] = $user_email;
            $condition['user_password'] = $user_password;

            $user_tmp = $this->Model->where($condition)->select();

            // input legal
            if (!empty($user_tmp)) {
                $data['res'] = 1;
            } else {
                $data['res'] = 0;
            }

            $this->ajaxReturn($data);

        } else {
            // alr
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
            $this->display();
        }
    }

    public function login_success() {
        if (IS_POST) {
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
            // input
            $user_email = I('post.user_email', '');
            $user_password = I('post.user_password', '');

            // sql
            $condition['user_email'] = $user_email;
            $condition['user_password'] = $user_password;

            $user_tmp = $this->Model->where($condition)->select();


            // input legal
            if (!empty($user_tmp)) {
                $data = $user_tmp[0];
                unset($data['user_password']);
                // save global user
                session('User', $data);
                redirect(U('Home/Index/index'));
            } else {

                $this->error('帐号或密码错误');

            }

        } else {
            redirect(U('Home/User/login'));
        }
    }

    public function register() {
        if (IS_POST) {
            // input
            $data['user_email'] = I('post.user_email');
            $data['user_password'] = I('post.user_password');
            $data['user_password_again'] = I('post.user_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $this->Model->getError()));

            } else {
                //success
                $this->ajaxReturn(array('res' => 1));
            }

        } else {
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
            $this->display();
        }
    }

    public function register_success() {
        if (IS_POST) {
            if (session('?User.user_id')) {
                redirect(U('Home/Index/index'));
            }
            // input
            $data['user_email'] = I('post.user_email');
            $data['user_password'] = I('post.user_password');
            $data['user_password_again'] = I('post.user_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);
            $data['user_image_url'] = 'avatar_default.jpg';

            // sql check
            if (!$this->Model->create($data)) {
                //
                $this->error($this->Model->getError());

            } else {
                //success
                // check file existance
                if (empty($_FILES['user_image_url']['tmp_name'])) {
                    $data['user_image_url'] = 'avatar_default.jpg';
                } else {
                    $config = array(
                        'maxSize' => 3145728, // 3mb
                        'rootPath' => './Uploads/',
                        'savePath' => 'avatar/',
                        'saveName' => array('uniqid', ''),
                        'exts' => array('jpg', 'png', 'jpeg', 'pjpeg'),
                        'autoSub' => false,
                    );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->upload();
                    if (!$info) {
                        // 上传错误提示错误信息
                        session('error', $upload->getError());
                        redirect(U('upload_failed'));
                    }

                    //上传成功

                    //处理图片

                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);
                    $image->thumb(500, 500, \Think\Image::IMAGE_THUMB_FILLED)->save('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);

                    $data['user_image_url'] = $info['user_image_url']['savename'];

                }


                $this->Model->add($data);
                unset($data['user_password']);
                unset($data['user_password_again']);
                $data['user_id'] = $this->Model->where(array('user_email' => $data['user_email']))->select()[0]['user_id'];
                session('User', $data);
                $this->display();
            }

        } else {
            redirect(U('Home/Index/index'));
        }
    }

    public function edit() {
        if (IS_POST) {
            // input
            $condition['user_id'] = $this->User['user_id'];

            $data = $this->Model->where($condition)->select()[0];

            $data['user_old_password'] = I('post.user_old_password');
            $data['user_new_password'] = I('post.user_new_password');
            $data['user_new_password_again'] = I('post.user_new_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $this->Model->getError()));

            } else {
                //success
                $this->ajaxReturn(array('res' => 1));
            }

        } else {
            $this->display();
        }
    }

    public function edit_success() {
        if (IS_POST) {
            // input
            $condition['user_id'] = $this->User['user_id'];

            $data = $this->Model->where($condition)->select()[0];

            $data['user_old_password'] = I('post.user_old_password');
            $data['user_new_password'] = I('post.user_new_password');
            $data['user_new_password_again'] = I('post.user_new_password_again');
            $data['user_realname'] = I('post.user_realname', 0);
            $data['user_nickname'] = I('post.user_nickname', 0);
            $data['user_tel'] = I('post.user_tel', 0);
            $data['user_sex'] = I('post.user_sex', '保密');
            $data['user_info'] = I('post.user_info', 0);

            // sql
            if (!$this->Model->create($data)) {
                //
                $this->error($this->Model->getError());
            } else {
                //success
                // check file existance
                if (empty($_FILES['user_image_url']['tmp_name'])) {

                } else {
                    $config = array(
                        'maxSize' => 3145728, // 3mb
                        'rootPath' => './Uploads/',
                        'savePath' => 'avatar/',
                        'saveName' => array('uniqid', ''),
                        'exts' => array('jpg', 'png', 'jpeg', 'pjpeg'),
                        'autoSub' => false,
                    );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->upload();
                    if (!$info) {
                        // 上传错误提示错误信息
                        session('error', $upload->getError());
                        redirect(U('upload_failed'));
                    }

                    //上传成功

                    //处理图片

                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);
                    $width = 500;
                    $height =  500 * $image->height() / $image->width();


                    $image->thumb($width, $height, \Think\Image::IMAGE_THUMB_FILLED)->save('./Uploads/' . $info['user_image_url']['savepath'] . '/' . $info['user_image_url']['savename']);

                    $data['user_image_url'] = $info['user_image_url']['savename'];

                }

                $this->Model->save($data);
                unset($data['user_password']);
                unset($data['user_password_again']);
                unset($data['user_new_password_again']);
                unset($data['user_new_password']);
                unset($data['user_old_password']);
                session('User', $data);
                redirect(U('index'));

            }

        } else {
            redirect(U('index'));
        }
    }

    public function upload_failed() {
        $this->assign('error', I('session.error'));
        session('error', null);
        $this->display();
    }

    public function logout() {
        session('User', null);
        redirect(U('login'));
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

    public function more_album() {
        if (IS_POST) {

            $post = I('post.');

            $PostList = get_user_PostList_by_user_id($post['page'], $post['user_id']);

            $this->assign('PostList', $PostList);

            $count_left = get_post_count_by_user_id($post['user_id']) - C("COUNT_POST_PER_PAGE") *  ($post['page'] + 1);

            $this->assign('count_left', $count_left);

            $this->assign('user_id', $post['user_id']);
            $this->assign('page', $post['page'] + 1);

            $this->display('User:more_album');
        } else {
        }
    }

    public function follow() {
        if (IS_POST) {
            $Model = D('Follow');

            $post = I('post.');
            $data['followed_user_id'] = $post['user_id'];
            $data['follower_id'] = $this->User['user_id'];

            // sql
            if (!$Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $Model->getError()));

            } else {
                //success
                $Model->add();
                $this->ajaxReturn(array('res' => 1,'error' => "follow succeeded"));
            }

        } else {
        }
    }


    public function unfollow() {
        if (IS_POST) {
            $Model = D('Follow');

            $post = I('post.');
            $data['followed_user_id'] = $post['user_id'];
            $data['follower_id'] = $this->User['user_id'];

            // sql
            if (!$Model->where($data)->delete()) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $Model->getError()));

            } else {
                //success
                $Model->add();
                $this->ajaxReturn(array('res' => 1,'error' => "unfollowed"));
            }

        } else {
        }
    }

    public function follow_list($user_id = 0) {
        $Model = new \Think\Model();

        $results = $Model->query("SELECT *
                                    FROM chist_user
                                    WHERE chist_user.user_id IN (
                                      SELECT followed_user_id
                                      FROM chist_follow
                                      WHERE follower_id = $user_id
                                    );
        ");

        for ($i = 0; $i < count($results); $i ++) {
            $user_id = $results[$i]['user_id'];
            $results[$i]['post_count'] = get_post_count_by_user_id($user_id);
            $results[$i]['follow_count'] = get_followed_count_by_user_id($user_id);
            $results[$i]['follower_count'] = get_follower_count_by_user_id($user_id);
        }

        $this->assign('Results',$results);
        $this->assign('title',"follow list");
        $this->display('result');
    }

    public function follower_list($user_id = 0){
        $Model = new \Think\Model();

        $results = $Model->query("SELECT *
                                    FROM chist_user
                                    WHERE chist_user.user_id IN (
                                      SELECT follower_id
                                      FROM chist_follow
                                      WHERE followed_user_id = $user_id
                                    );
        ");

        for ($i = 0; $i < count($results); $i ++) {
            $user_id = $results[$i]['user_id'];
            $results[$i]['post_count'] = get_post_count_by_user_id($user_id);
            $results[$i]['follow_count'] = get_followed_count_by_user_id($user_id);
            $results[$i]['follower_count'] = get_follower_count_by_user_id($user_id);
        }

        $this->assign('Results',$results);
        $this->assign('title',"follower list");
        $this->display('result');
    }

}
