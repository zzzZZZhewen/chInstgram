<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('user_email', 'require', '帐号(邮箱)不能为空！', 1, 'regx'),
        array('user_email', 'email', '邮箱地址有误！', 1, 'regx'),
        array('user_email', '', '该帐号(邮箱)已经存在！', 1, 'unique'),
        array('user_email', '0,40', '邮箱不能超过40个字符', 1, 'length'),

        array('user_password', 'require', '密码不能为空！', 1, 'regx'),
        array('user_password_again', 'user_password', '两次密码输入不同', 0, 'confirm'),

        array('user_old_password', 'user_password', '旧密码输入错误', 2, 'confirm',),
        array('user_new_password', '6,16', '密码在6-16个字符以内', 2, 'length'),
        array('user_new_password_again', 'user_new_password', '两次密码输入不同', 2, 'confirm'),

        array('user_realname', '0,10', '真实姓名不能超过10个字符', 0, 'length'),


        array('user_nickname', 'require', '昵称不能为空！', 1, 'regx'),
        array('user_nickname', '', '该昵称已经存在！', 1, 'unique'),
        array('user_nickname', '0,10', '昵称不能超过10个字符', 1, 'length'),

        array('user_tel', '0,20', '手机号不能超过20个数字', 0, 'length'),
        array('user_info', '0,100', '个人描述不能超过100个字符', 0, 'length'),

        array('user_sex', array('保密', '男', '女'), '性别只能是保密、男或者女', 0, 'in'),

        //array('user_password', '8,16', '密码必须在8-16个字符之间哦', 0, 'length'),

        //        array('enroll_tel', 'number', '手机只能是数字吧'),
        //
        //        array('enroll_school', '1,20', '学校长度不能超过20个字符', 0, 'length'),

    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(//        array('password', 'md5', 3, 'function'),
    );

}