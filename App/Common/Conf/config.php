<?php
return array(
	//'配置项'=>'配置值'

    /* 默认设定 */
    'DEFAULT_MODULE' => 'Home', // 默认模块
    'DEFAULT_CONTROLLER' => 'Index', // 默认控制器名称
    'DEFAULT_ACTION' => 'index', // 默认操作名称
    'DEFAULT_CHARSET' => 'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE' => 'PRC', // 默认时区
    'DEFAULT_AJAX_RETURN' => 'JSON', // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_FILTER' => 'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    'APP_NAME' => 'chInstgram',

    /*数据库配置*/
    'DB_TYPE'=>'mysql',// 数据库类型
    'DB_HOST'=>'127.0.0.1',// 服务器地址
    'DB_NAME'=>'chinst',// 数据库名
    'DB_USER'=>'root',// 用户名
    'DB_PWD'=>'',// 密码
    'DB_PORT'=>3306,// 端口
    'DB_PREFIX'=>'chist_',// 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集

    /* SESSION设置 */
    'SESSION_AUTO_START' => true, // 是否自动开启Session
    'SESSION_OPTIONS' => array (), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE' => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    //'SESSION_PREFIX' => 'chist_', // session 前缀

    /* Cookie设置 */
    'COOKIE_EXPIRE' => 0, // Cookie有效期
    'COOKIE_DOMAIN' => '', // Cookie有效域名
    'COOKIE_PATH' => '/', // Cookie路径
    'COOKIE_PREFIX' => '', // Cookie前缀 避免冲突
    'COOKIE_HTTPONLY' => '', // Cookie httponly设置

    /* 模板引擎设置 */
    'TMPL_CONTENT_TYPE' => 'text/html', // 默认模板输出类型
    'TMPL_DETECT_THEME' => false, // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX' => '.html', // 默认模板文件后缀
    'TMPL_FILE_DEPR' => '/', // 模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符


    //龟䇲
    'COUNT_POST_PER_PAGE'=>'2',
);