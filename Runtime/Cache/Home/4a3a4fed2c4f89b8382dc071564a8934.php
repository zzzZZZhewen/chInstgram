<?php if (!defined('THINK_PATH')) exit();?>


<?php if(is_array($PostList)): $i = 0; $__LIST__ = $PostList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Post): $mod = ($i % 2 );++$i;?><div class="item">
        <a href="#myModal" data-toggle="modal" onclick="loadbigpic('/chin/Uploads/posts/thumb1080_<?php echo ($Post["post_url"]); ?>')">
            <img style="background-image: url('/chin/Uploads/posts/thumb500_<?php echo ($Post["post_url"]); ?>'); background-size: cover; background-position: center;"  alt=""/>
        </a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(($count_left) > "0"): ?><div style="clear: both;"></div>
    <a style=" margin-top: 20px; margin-bottom: 20px;" id="more-album-btn-<?php echo ($user_id); ?>-<?php echo ($page); ?>" class="btn-more btn btn-primary" onclick="loadalbum(<?php echo ($user_id); ?>,<?php echo ($page); ?>)">more</a><?php endif; ?>
<?php if(($count_left) < "1"): ?><div style="clear: both; margin-bottom: 20px;"></div><?php endif; ?>