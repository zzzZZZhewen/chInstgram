<?php if (!defined('THINK_PATH')) exit();?>    <?php if(is_array($Messages)): $i = 0; $__LIST__ = $Messages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Message): $mod = ($i % 2 );++$i; if(($Message["message_sender_id"]) == $User["user_id"]): ?><li class="out">
                <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Other_user["user_id"]); ?>'>
                    <img src="/chin/Uploads/avatar/<?php echo ($User["user_image_url"]); ?>" alt="" class="avatar">
                </a>
                <div class="message">
                    <span class="arrow"></span>
                    <a class="name" href="javascript:void(0);">You</a>
                    <span class="datetime">at <?php echo ($Message["message_datetime"]); ?></span>
                                                <span class="body">
                                                    <?php echo ($Message["message_content"]); ?>
                                                </span>
                </div>
            </li>

        <?php else: ?>
            <li class="in">
                <a href='<?php echo U("User/other");?>?user_id=<?php echo ($Other_user["user_id"]); ?>'>
                    <img src="/chin/Uploads/avatar/<?php echo ($Other_user["user_image_url"]); ?>" alt="" class="avatar">
                </a>
                <div class="message">
                    <span class="arrow"></span>
                    <a class="name" href='<?php echo U("User/other");?>?user_id=<?php echo ($Other_user["user_id"]); ?>'><?php echo ($Other_user["user_nickname"]); ?></a>
                    <span class="datetime">at <?php echo ($Message["message_datetime"]); ?></span>
                                                <span class="body">
                                                    <?php echo ($Message["message_content"]); ?>
                                                </span>
                </div>
            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>