<?php

namespace Home\Model;

use Think\Model;

class PostModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('post_content', 'require', 'missing words that is just ... for ... fun ...', 1, 'regx'),
        array('post_content', '0,140', 'more than 140 characters is boring', 0, 'length'),

    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(

        //array('post_datetime', 'time', 1, 'function'),

    );

}