<?php

namespace Home\Model;
use Think\Model;

class FollowModel extends Model{

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('follower_id', 'require', 'Need a follower_id', 1, 'regx'),
        array('follower_id', 'number', 'follower_id has to be a number', 1, 'regx'),
        array('followed_user_id', 'require', 'Need a followed_user_id', 1, 'regx'),
        array('followed_user_id', 'number', 'followed_user_id has to be a number', 1, 'regx'),
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
    );

}