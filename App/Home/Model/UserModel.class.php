<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model{

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('user_id', 'require', '用户名不能为空！'),
        array('user_realname', 'require', '真实姓名不能为空！'),
        array('password', 'require', '密码不能为空！', 0, 'regex', 1),
        array('email', 'email', '邮箱地址有误！'),
        array('username', '', '帐号名称已经存在！', 0, 'unique', 1),
        array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        //array('password', 'md5', 3, 'function'),
    );

}