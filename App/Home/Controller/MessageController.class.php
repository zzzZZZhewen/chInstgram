<?php
/**
 * Created by PhpStorm.
 * User: miaozhewen
 * Date: 15/10/31
 * Time: 上午3:48
 */

namespace Home\Controller;
use Think\Controller;
class MessageController extends CoreController {
    public $Model = null;

    protected function _initialize() {
        parent::_initialize();
        $this->Model = D('User');
    }

    public function index(){
        //redirect(U('Home/Index/index'));
        $this_user_id = $this->User['user_id'];

        $Model = new \Think\Model();

        $chatList = $Model->query("SELECT message_datetime , message_sender_id, message_reciever_id, message_content, message_id
                        FROM chist_message
                        WHERE message_datetime IN (
                          SELECT max(message_datetime) as max_message_datetime
                          FROM chist_message
                          WHERE message_sender_id = $this_user_id OR message_reciever_id = $this_user_id
                          GROUP BY message_sender_id, message_reciever_id
                        )
                        ORDER BY message_datetime DESC ;");

        $user_added = array();
        $index = 0;
        $chat = array();

        for($i = 0; $i < count($chatList); $i++){
            $user_id = $chatList[$i]['message_sender_id'] == $this_user_id ? $chatList[$i]['message_reciever_id'] : $chatList[$i]['message_sender_id'];
            if (empty($user_added[$user_id])) {
                $user_added[$user_id] = true;
                $chat[$index] = $chatList[$i];
                $chat[$index]['user_id'] = $user_id;
                $user = $this->Model->where(array('user_id'=>$user_id))->select();
                $chat[$index] = array_merge($chat[$index],$user[0]);
                $index ++;
            }
        }

        $this->assign('ChatList',$chat);
        $this->display();
    }

    public function chat($user_id=0) {
        if ($user_id == $this->User['user_id'])
            redirect('index');
        $condition['user_id'] = $user_id;
        $other_users = $this->Model->where($condition)->select();
        if (empty($other_users)) {
            redirect(U('index'));
        } else {
            $other_users[0]['user_post_count'] = get_post_count_by_user_id($user_id);
            $other_users[0]['user_followed_count'] = get_followed_count_by_user_id($user_id);
            $other_users[0]['user_follower_count'] = get_follower_count_by_user_id($user_id);
            $other_users[0]['user_is_followed'] = is_followed($user_id, $this->User['user_id']);
            $other_users[0]['user_is_self'] = ($user_id == $this->User['user_id']);
            $this->assign('Other_user', $other_users[0]);
            $this->display();
        }
    }

    public function more_message(){
            $post = I('post.');

            $this_user_id = $this->User['user_id'];

            $user_id = $post['user_id'];

            $condition['user_id'] = $user_id;
            $other_users = $this->Model->where($condition)->select();
            if (empty($other_users)) {
                redirect(U('index'));
            } else {
                $this->assign('Other_user', $other_users[0]);
            }

            $Model = new \Think\Model();

            $MessageList = $Model->query("SELECT message_id, message_sender_id, message_reciever_id, message_content, message_datetime
                        FROM chist_message
                        WHERE (message_sender_id = $this_user_id AND message_reciever_id = $user_id) OR (message_sender_id = $user_id AND message_reciever_id = $this_user_id)
                        ORDER BY message_datetime DESC
                        ;");

            $message_count = count($MessageList);

            $messages = array();

            for($i = 0; $i < $message_count; $i++) {
                $messages[$i] = $MessageList[$message_count - $i - 1];
            }

            $this->assign('Messages', $messages);

            $content = $this->fetch('more_message');
            $this->ajaxReturn(array('res' => 1,'content' => $content, 'last_user_datetime' => $MessageList[0]['message_datetime']));
    }

    public  function add_message() {
        if (IS_POST) {
            $Model = D('Message');

            $post = I('post.');
            $data['message_content'] = $post['message_content'];

            $data['message_reciever_id'] = $post['user_id'];
            $data['message_datetime'] = get_datetime();
            $data['message_sender_id'] = $this->User['user_id'];
            // sql
            if (!$Model->create($data)) {
                //
                $this->ajaxReturn(array('res' => 0, 'error' => $Model->getError()));

            } else {
                //success
                $Model->add();

                $condition['user_id'] = $post['user_id'];
                $other_users = $this->Model->where($condition)->select();
                $this->assign('Other_user', $other_users[0]);

                $messages = array();
                $messages[0] = $data;
                $this->assign('Messages', $messages);
                $content = $this->fetch('more_message');

                $this->ajaxReturn(array('res' => 1,'content' => $content));
            }

        } else {
        }
    }

    public function continue_load_message() {
        if (IS_POST) {
            $Model = D('Message');

            $post = I('post.');

            $data['message_sender_id'] = $post['user_id'];
            $data['message_datetime'] = array('gt', $post['last_user_datetime']);
            $data['message_reciever_id'] = $this->User['user_id'];

            $result = $Model->where($data)->order('message_datetime')->select();
            // sql
            if (!$result) {
                //
                $this->ajaxReturn(array('res' => 0));

            } else {
                //success

                $this_user_id = $this->User['user_id'];
                $user_id = $post['user_id'];
                $condition['user_id'] = $user_id;
                $other_users = $this->Model->where($condition)->select();
                $this->assign('Other_user', $other_users[0]);

                $this->assign('Messages', $result);
                $content = $this->fetch('more_message');


                $this->ajaxReturn(array('res' => 1, 'content' => $content,'last_user_datetime' => $result[count($result) - 1]['message_datetime']));
            }

        } else {
        }
    }

}