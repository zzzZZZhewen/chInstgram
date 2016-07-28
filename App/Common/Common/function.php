<?php
function haha() {
    echo 'haha';
}

function get_datetime() {

    return date('Y-m-d H:i:s');
}

function get_post_count_by_user_id($user_id) {
    $condition['user_id'] = $user_id;
    return M('Post')->where($condition)->count();
}

function get_follower_count_by_user_id($user_id) {
    $condition['followed_user_id'] = $user_id;
    return M('Follow')->where($condition)->count();

}

function get_followed_count_by_user_id($user_id) {
    $condition['follower_id'] = $user_id;
    return M('Follow')->where($condition)->count();

}

function get_comment_count_by_post_id($post_id) {
    $condition['comment_post_id'] = $post_id;
    return M('Comment')->where($condition)->count();
}

function get_like_count_by_post_id($post_id) {
    $condition['post_id'] = $post_id;
    return M('Like')->where($condition)->count();
}
function get_CommentList_by_post_id($post_id, $page = 0) {

    $Model = new \Think\Model();
    $COUNT_COMMENT_PER_PAGE = C('COUNT_COMMENT_PER_PAGE');
    $start_comment_number = $page * $COUNT_COMMENT_PER_PAGE;

    $CommentList = $Model->query("SELECT comment_post_id, comment_user_id, comment_content, chist_user.user_nickname, comment_date
                                        From chist_comment left join chist_user on comment_user_id = user_id
                                        WHERE comment_post_id = $post_id
                                        Order by comment_date desc
                                        LIMIT $start_comment_number,$COUNT_COMMENT_PER_PAGE");

    return $CommentList;
}

function get_user_PostList_by_user_id($page = 0, $user_id = 0) {
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
        $condition['user_id'] = $user_id;
        $result = M('Like')->where($condition)->count();
        if ($result > 0) {
            $PostList[$i]["like_active"] = "active";
        }
        $PostList[$i]["comment_count"] = get_comment_count_by_post_id($post_id);
        $PostList[$i]["like_count"] = get_like_count_by_post_id($post_id);
    }

    return $PostList;
}

function is_followed($followed_user_id, $follower_id) {
    $condition['followed_user_id'] = $followed_user_id;
    $condition['follower_id'] = $follower_id;
    if (M('Follow')->where($condition)->count() > 0)
        return true;
    else
        return false;
}

?>