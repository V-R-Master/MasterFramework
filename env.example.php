<?php
/**
 *  全局配置文件，必须按照 key=>value的形式
 *
 *  可以是多维数组
 *
 *  (版本库维护此文件，自己拷贝文件并重命名为 env.php)
 */
return [

    // 数据库配置信息
    'mysql'=>[
    'dbtype'=>'mysql', // 目前只有mysql数据库
    'name' => 'your_db_name', // 数据库名称
    'host' => '', // 数据库地址
    'port' => '', // 端口
    'charset' => 'utf8', // 如 utf8
    'username' => '', // 连接用户名
    'password' => '', // 连接用户的密码
    ]

];