<?php if (!defined('THINK_PATH')) exit();?>


<?php if(is_array($CommentList)): $i = 0; $__LIST__ = $CommentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Comment): $mod = ($i % 2 );++$i;?><li class="in">
        <div style="margin: 0px;" class="message ">
            <span class="arrow"></span>
            <a class="name" href="<?php echo U('Home/User/other');?>?user_id=<?php echo ($Comment["comment_user_id"]); ?>"><?php echo ($Comment["user_nickname"]); ?></a>
            <span class="datetime">at <?php echo ($Comment["comment_date"]); ?></span> :
            <span class="body"><?php echo ($Comment["comment_content"]); ?></span>
        </div>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(($count_left) > "0"): ?><a  class="load-comment-btn" id="load-comment-btn-<?php echo ($post_id); ?>-<?php echo ($page); ?>" onclick="onloadcomment(<?php echo ($post_id); ?>,<?php echo ($page); ?>)" href="javascript:void(0);"> <i class="fa fa-chevron-down"></i> </a><?php endif; ?>