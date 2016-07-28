<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('user_email', 'require', 'Hey, where is your user id(email)', 1, 'regx'),
        array('user_email', 'email', 'I have never seen a email so ugly like that！', 1, 'regx'),
        array('user_email', '', 'One email one user', 1, 'unique'),
        array('user_email', '0,40', 'Too many characters in a email I cannot remember', 1, 'length'),

        array('user_password', 'require', 'Need a password', 1, 'regx'),
        array('user_password', '6,16', 'Length of a password should be between 6 and 16 characters', 1, 'length'),
        array('user_password_again', 'user_password', 'Dude, how cant you just input the same password correctly', 0, 'confirm'),

        array('user_old_password', 'user_password', 'Wrong old password, how could you just signed in', 2, 'confirm',),
        array('user_new_password', '6,16', 'Passwords between 6 and 16 characters', 2, 'length'),
        array('user_new_password_again', 'user_new_password', 'Man, you have to input the same password again', 2, 'confirm'),

        array('user_realname', '0,40', 'Don not allow your parents give you a name more than 40 characters', 0, 'length'),


        array('user_nickname', 'require', 'Nickname nickname nickname! It is the most important when you want to survive in the ocean of social network!！', 1, 'regx'),
        array('user_nickname', '', 'This nickname has already been taken！', 1, 'unique'),
        array('user_nickname', '0,10', 'A nickname more than 10 character is ungainly, no people of other gender will like you', 1, 'length'),

        array('user_tel', '0,30', 'Do not have a telephone number more than 30 digits', 0, 'length'),
        array('user_info', '0,100', 'Hey, which part of brief introduction you do not understand(under 100 characters)?', 0, 'length'),

        array('user_sex', array('保密', '男', '女'), 'Gender can only be male or female or ...', 0, 'in'),

        //array('user_password', '8,16', '密码必须在8-16个字符之间哦', 0, 'length'),

        //        array('enroll_tel', 'number', '手机只能是数字吧'),
        //
        //        array('enroll_school', '1,20', '学校长度不能超过20个字符', 0, 'length'),

    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(//        array('password', 'md5', 3, 'function'),
    );

}