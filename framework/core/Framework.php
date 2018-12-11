<?php

class Framework
{
    /**
     *  启动入口
     */
    public static function run()
    {
        self::init();
        self::autoload();
        self::router();
    }

    /**
     *  定义文件路径及请求路径
     */
    public static function init()
    {
        // 定义文件路径的常量信息
        define('DS', DIRECTORY_SEPARATOR); // 目录分隔符，是在一个预定义常量。在linux下解析为 / ,在windows下解析为 \
        define('ROOT_PATH', getcwd() . DS); // 项目根目录 getcwd:获取当前工作路径根目录
        define('APP_PATH', ROOT_PATH . DS . 'application' . DS);
        define('FRAMEWORK_PATH', ROOT_PATH . DS . 'framework' . DS);
        define('PUBLIC_PATH', ROOT_PATH . DS . 'public' . DS);
        define('CONFIG_PATH', APP_PATH . DS . 'config' . DS);
        define('CONTROLLER_PATH', APP_PATH . DS . 'controller' . DS);
        define('MODEL_PATH', APP_PATH . DS . 'model' . DS);
        define('VIEW_PATH', APP_PATH . DS . 'view' . DS);

        // 定义请求路径
        define('MODEL', isset($_REQUEST['m']) ? $_REQUEST['m'] : 'home'); // 模块名称
        define('CONTROLLER', isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');// 控制器
        define('ACTION', isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index'); // 方法名称

        // 当前控制器和视图的路径
        define('CUR_CONTROLLER_PATH', CONTROLLER_PATH . MODEL . DS);
        define('CUR_VIEW_PATH', VIEW_PATH . MODEL . DS);
    }

    /**
     *  注册自动方法
     */
    public static function autoload()
    {
        spl_autoload_register(array(__CLASS__, 'load')); // 研究下这个函数吧
    }

    /**
     * 加载类，controller和model其余暂时不需要
     * @param string $class_name 类文件名称
     */
    public static function load($class_name)
    {
        if ('Controller' == substr($class_name, -10)) {
            require CUR_CONTROLLER_PATH . "{$class_name}.php";
        }
        if ('Model' == substr($class_name, -5)) {
            require MODEL_PATH . "{$class_name}.php";
        }
    }

    /**
     *  拼接对应的控制器和方法名称
     *  实例化控制器并调用对应的方法
     */
    public static function router()
    {
        $controller_name = CONTROLLER . 'Controller'; // 如 IndexController
        $action_name = ACTION . 'Action'; // 如 indexAction

        // 调用对用的方法
        $controller = new $controller_name;
        $controller->$action_name();
    }
}