<?php

namespace Home\Model;
use Think\Model;

class CommentModel extends Model{

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('comment_content', 'require', 'Comment cannot be vacant', 0, 'regx'),
        array('comment_content', '0,100', 'Comments contain up to 100 words', 0, 'length'),
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
    );

}