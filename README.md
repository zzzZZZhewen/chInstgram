## 简介

ThinkPHP 是一个免费开源的，快速、简单的面向对象的 轻量级PHP开发框架 ，创立于2006年初，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，已经成长为国内最领先和最具影响力的WEB应用开发框架，众多的典型案例确保可以稳定用于商业以及门户级的开发。

## 全面的WEB开发特性支持

最新的ThinkPHP为WEB应用开发提供了强有力的支持，这些支持包括：

*  MVC支持-基于多层模型（M）、视图（V）、控制器（C）的设计模式
*  ORM支持-提供了全功能和高性能的ORM支持，支持大部分数据库
*  模板引擎支持-内置了高性能的基于标签库和XML标签的编译型模板引擎
*  RESTFul支持-通过REST控制器扩展提供了RESTFul支持，为你打造全新的URL设计和访问体验
*  云平台支持-提供了对新浪SAE平台和百度BAE平台的强力支持，具备“横跨性”和“平滑性”，支持本地化开发和调试以及部署切换，让你轻松过渡，打造全新的开发体验。
*  CLI支持-支持基于命令行的应用开发
*  RPC支持-提供包括PHPRpc、HProse、jsonRPC和Yar在内远程调用解决方案
*  MongoDb支持-提供NoSQL的支持
*  缓存支持-提供了包括文件、数据库、Memcache、Xcache、Redis等多种类型的缓存支持

## 大道至简的开发理念

ThinkPHP从诞生以来一直秉承大道至简的开发理念，无论从底层实现还是应用开发，我们都倡导用最少的代码完成相同的功能，正是由于对简单的执着和代码的修炼，让我们长期保持出色的性能和极速的开发体验。在主流PHP开发框架的评测数据中表现卓越，简单和快速开发是我们不变的宗旨。

## 安全性

框架在系统层面提供了众多的安全特性，确保你的网站和产品安全无忧。这些特性包括：

*  XSS安全防护
*  表单自动验证
*  强制数据类型转换
*  输入数据过滤
*  表单令牌验证
*  防SQL注入
*  图像上传检测

## 商业友好的开源协议



www  WEB部署目录（或者子目录）
├─index.php       入口文件
├─README.md       README文件
├─composer.json   Composer定义文件
├─Edison(Public)  资源文件目录
├─ThinkPHP        (ThinkPHP库框架系统目录（可以部署在非web目录下面）)
│  ├─Common       核心公共函数目录
│  ├─Conf         核心配置目录 
│  ├─Lang         核心语言包目录
│  ├─Library      框架类库目录
│  │  ├─Think     核心Think类库包目录
│  │  ├─Behavior  行为类库目录
│  │  ├─Org       Org类库包目录
│  │  ├─Vendor    第三方类库目录
│  │  ├─ ...      更多类库目录
│  ├─Mode         框架应用模式目录
│  ├─Tpl          系统模板目录
│  ├─LICENSE.txt  框架授权协议文件
│  ├─logo.png     框架LOGO文件
│  ├─README.txt   框架README文件
│  └─index.php    框架入口文件
├─Euler （运行时）
└─Newton（Application）
    ├─Common         应用公共模块
    │  ├─Common      应用公共函数目录
    │  └─Conf        应用公共配置文件目录
    ├─Runtime        运行时目录
    │  ├─Cache       模版缓存目录
    │  ├─Data        数据目录
    │  ├─Logs        日志目录
    │  └─Temp        缓存目录模块设计
    ├─Admin          后台模块
    ├─...            其他更多模块
    ├─Module         模块目录
    │  ├─Conf        配置文件目录
    │  ├─Common      公共函数目录
    │  ├─Controller  控制器目录
    │  ├─Model       模型目录
    │  ├─Logic       逻辑目录（可选）
    │  ├─Service     服务目录（可选）
    │  ... 更多分层目录可选
    │  └─View        视图目录
    └─Home           默认生成的Home模块
       ├─Conf        模块配置文件目录
       ├─Common      模块函数公共目录
       ├─Controller  模块控制器目录
       │  ├─SomeController.class.php (someaction)
       │  ... 编写更多控制器
       ├─Model       模块模型目录
       └─View        模块视图文件目录
          ├─SomeController
          │  ├─someaction.html
          ......编写更多前端
          
URL请求
http://serverName/index.php/模块/控制器/操作
REWRITE模式<IfModule mod_rewrite.c>
         RewriteEngine on
         RewriteCond %{REQUEST_FILENAME} !-d
         RewriteCond %{REQUEST_FILENAME} !-f
         RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
         </IfModule>
http://localhost/?m=home&c=index&a=hello&name=thinkphp
读取数据
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function index(){
        $Data     = M('Data');// 实例化Data数据模型
        $result     = $Data->find(1);
        $this->assign('result',$result);
        $this->display();
    }
}
添加数据
<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller{
    public function insert(){
        $Form   =   D('Form');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('数据添加成功！');
            }else{
                $this->error('数据添加错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }
 }

 $Form   =   D('Form');
 $data['title']  =   'ThinkPHP';
 $data['content']    =   '表单内容';
 $Form->add($data);
    也可以支持对象方式操作：
 
 $Form   =   D('Form');
 $Form->title  =   'ThinkPHP';
 $Form->content    =   '表单内容';
 $Form->add();
 
    模型
 <?php
 namespace Home\Model;
 use Think\Model;
 class FormModel extends Model {
     // 定义自动验证
     protected $_validate    =   array(
         array('title','require','标题必须'),
         );
     // 定义自动完成
     protected $_auto    =   array(
         array('create_time','time',1,'function'),
         );
  }
  
 }
 
 更新数据
   public function update(){
      $Form   =   D('Form');
      if($Form->create()) {
          $result =   $Form->save();
          if($result) {
              $this->success('操作成功！');
          }else{
              $this->error('写入错误！');
          }
      }else{
          $this->error($Form->getError());
      }
   }
   $Form = M("Form"); 
    // 要修改的数据对象属性赋值
   $data['title'] = 'ThinkPHP';
   $data['content'] = 'ThinkPHP3.2.3版本发布';
   $Form->where('id=5')->save($data); // 根据条件保存修改的数据
   
   $User = M("User"); // 实例化User对象
   $User->where('id=5')->setInc('score',3); // 用户的积分加3
   $User->where('id=5')->setInc('score'); // 用户的积分加1
   $User->where('id=5')->setDec('score',5); // 用户的积分减5
   $User->where('id=5')->setDec('score'); // 用户的积分减1
   
   删除数据
        很简单，只需要调用delete方法，例如：
 
   $Form = M('Form');
   $Form->delete(5);
        表示删除主键为5的数据，delete方法可以删除单个数据，也可以删除多个数据，这取决于删除条件，例如：
   
   $User = M("User"); // 实例化User对象
   $User->where('id=5')->delete(); // 删除id为5的用户数据
   $User->delete('1,2,5'); // 删除主键为1,2和5的用户数据
   $User->where('status=0')->delete(); // 删除所有状态为0的用户数据
   
   