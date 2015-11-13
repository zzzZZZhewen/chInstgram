<?php if (!defined('THINK_PATH')) exit(); if(is_array($PostList)): $i = 0; $__LIST__ = $PostList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Post): $mod = ($i % 2 );++$i;?><div id="post-<?php echo ($Post["post_id"]); ?>" class="panel post-panel">
        <div class="panel-heading">
            <div class="dir-info">
                <div class="row">
                    <div class="pull-left" style="margin-left: 15px;">
                        <div class="avatar">
                            <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Post["user_id"]); ?>'>
                                <img src="/chinstgram/Uploads/avatar/<?php echo ($Post["user_image_url"]); ?>" alt=""/>
                            </a>
                        </div>
                    </div>
                    <div class="pull-left" style="margin-left: 10px;">
                        <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Post["user_id"]); ?>'><span
                                class="poster-name"><?php echo ($Post["user_nickname"]); ?></span></a>
                    </div>
                    <div class="pull-right" style="margin-right: 15px;">
                        <span class="post-time"><?php echo ($Post["post_datetime"]); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="post-img">
                <img src="/chinstgram/Uploads/posts/thumb1080_<?php echo ($Post["post_url"]); ?>" alt="">
            </div>
        </div>

        <div class="panel-body">
            <div class="post-content">
                                <span style="font-size: 16px;">
                                    <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Post["user_id"]); ?>'><?php echo ($Post["user_nickname"]); ?></a>  <span
                                        style="color: #424F63;"><?php echo ($Post["post_content"]); ?></span>
                                </span>
            </div>
            <div class="post-comment hidden">
                <?php echo ($Post["post_liketimes"]); ?>次赞
                <br/>
                全部<?php echo ($Post["psot_commenttimes"]); ?>条评论
                <br/><a href="javascript:void(0);"><?php echo ($Post[2]["comment_user_nickname"]); ?></a>
                <?php echo ($Post[2]["comment_content"]); ?>
                <br/><a href="javascript:void(0);"><?php echo ($Post[1]["comment_content"]); ?></a>
                <?php echo ($Post[1]["comment_content"]); ?>
                <br/><a href="javascript:void(0);"><?php echo ($Post[0]["comment_content"]); ?></a>
                <?php echo ($Post[0]["comment_content"]); ?>
            </div>
        </div>
        <div class="panel-footer">
            <div class="post-widgets">
                <ul class="nav nav-pills p-option">
                    <li class="post-widget">
                        <a href="javascript:void(0);"><i class="fa fa-heart"></i></a>
                    </li>
                    <li class="post-widget">
                        <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                    </li>
                    <li class="post-widgets-input">
                        <input class="add-comment" type="text" placeholder="添加评论..."/>
                    </li>
                    <li class="hidden">
                        <a href="javascript:void(0);"><i class="fa fa-mail-forward"></i></a>
                    </li>
                    <li class="pull-right">
                        <a href="javascript:void(0);"><i class="fa fa-ellipsis-h"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>