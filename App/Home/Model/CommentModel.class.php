<?php

namespace Home\Model;
use Think\Model;

class CommentModel extends Model{

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
    );

}