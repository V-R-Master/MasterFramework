<?php
namespace framework\database;
include 'medoo.php';
use PDO;
/**
 *  查询构造器基类
 *
 *  基础查询使用第三方插件：medoo；
 *  这里也是简单使用单例模式实现
 *
 * Class DBBase
 */
class DBBase
{
    private static $instance = null;

    /**
     * 获取实例入口
     *
     * @return medoo
     * @throws Exception
     */
    public static function getInstance()
    {
        // medoo 所需要的数据库配置信息
        $db_conf = [
            // required
            'database_type' => get_env_conf('db_type'),
            'database_name' => mysql_conf('name'),
            'server' => mysql_conf('host'),
            'username' => mysql_conf('username'),
            'password' => mysql_conf('password'),

            // [optional]
            'charset' => mysql_conf('charset'),
            'port' => mysql_conf('port'),

            // [optional] Table prefix
            'prefix' => mysql_conf('prefix'),

            // [optional] Enable logging (Logging is disabled by default for better performance)
            'logging' => true,

            // [optional] MySQL socket (shouldn't be used with server and port)
            'socket' => '/tmp/mysql.sock',

            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ],

            // [optional] Medoo will execute those commands after connected to the database for initialization
            'command' => [
                'SET SQL_MODE=ANSI_QUOTES'
            ]
        ];

        if (!self::$instance) {
            self::$instance = new medoo($db_conf);
        }
        return self::$instance;
    }

    // 私有的构造方法，外部无法new对象
    private function __construct()
    {

    }

    // 外部无法克隆对象
    private function __clone()
    {
    }
}