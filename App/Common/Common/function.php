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

function is_followed($followed_user_id, $follower_id) {
    $condition['followed_user_id'] = $followed_user_id;
    $condition['follower_id'] = $follower_id;
    if (M('Follow')->where($condition)->count() > 0)
        return true;
    else
        return false;
}

?>