<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('user_email', 'require', '帐号(邮箱)不能为空！'),
        array('user_email', 'email', '邮箱地址有误！'),
        array('user_email', '', '帐号(邮箱)已经存在！', 0, 'unique'),
        array('user_password', 'require', '密码不能为空！', 0, 'regex'),
        array('user_password_again', 'user_password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('password', 'md5', 3, 'function'),
    );

}