<?php if (!defined('THINK_PATH')) exit(); if(is_array($PostList)): $i = 0; $__LIST__ = $PostList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Post): $mod = ($i % 2 );++$i;?><div id="post-<?php echo ($Post["post_id"]); ?>" class="panel post-panel" >
        <div class="panel-heading">
            <div class="dir-info">
                <div class="row">
                    <div class="pull-left" style="margin-left: 15px;">
                        <div class="avatar">
                            <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Post["user_id"]); ?>'>
                                <img src="/chin/Uploads/avatar/<?php echo ($Post["user_image_url"]); ?>" alt=""/>
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
                <img src="/chin/Uploads/posts/thumb1080_<?php echo ($Post["post_url"]); ?>" alt="">
            </div>
        </div>


        <div class="panel-footer">
            <div class="post-widgets">
                <ul class="nav nav-pills p-option">
                    <li class="post-widget">
                        <a class="<?php echo ($Post["like_active"]); ?>" id="like-btn-<?php echo ($Post["post_id"]); ?>" href="javascript:void(0);" onclick="onlike(<?php echo ($Post["post_id"]); ?>)"><i class="fa fa-heart"></i><span style="font-size: 14px;"> <?php echo ($Post["like_count"]); ?></span></a>
                    </li>
                    <li class="post-widget">
                        <a id="comment-btn-<?php echo ($Post["post_id"]); ?>" href="javascript:void(0);" onclick="onaddcomment(<?php echo ($Post["post_id"]); ?>)"><i class="fa fa-comment"></i><span style="line-height: 14px;font-size: 14px"> <?php echo ($Post["comment_count"]); ?></span></a>
                    </li>
                    <li class="post-widget">
                        <form comment-form-<?php echo ($Post["post_id"]); ?> onsubmit="onaddcomment(<?php echo ($Post["post_id"]); ?>); return false;">
                            <input id="comment-input-<?php echo ($Post["post_id"]); ?>" class="add-comment"  type="text" placeholder="comment..."/>
                        </form>
                    </li>
                    <li class="hidden">
                        <a href="javascript:void(0);"><i class="fa fa-mail-forward"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="post-content">
                <span style="font-size: 16px;">
                    <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Post["user_id"]); ?>'><?php echo ($Post["user_nickname"]); ?></a>  
                    <span style="color: #424F63;"><?php echo ($Post["post_content"]); ?></span>
                </span>
            </div>
            <?php if(($Post["comment_count"]) > "0"): ?><a class="load-comment-btn" id="load-comment-btn-<?php echo ($Post["post_id"]); ?>-0" onclick="onloadcomment(<?php echo ($Post["post_id"]); ?>,0)" href="javascript:void(0);"> <i class="fa fa-chevron-down"></i> </a><?php endif; ?>

            <?php if(($Post["comment_count"]) == "0"): ?><a style="display:none;" class="load-comment-btn" id="load-comment-btn-<?php echo ($Post["post_id"]); ?>-0" onclick="onloadcomment(<?php echo ($Post["post_id"]); ?>,0)" href="javascript:void(0);"> <i class="fa fa-chevron-down"></i> </a><?php endif; ?>

            <ul  class="chats normal-chat post-comment" id="post-comment-<?php echo ($Post["post_id"]); ?>" style="display: none; margin: 0;">
            </ul>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>