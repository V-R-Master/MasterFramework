<?php
/**
 *  系统函数
 */

/**
 *  根据key得到env的配置信息
 *
 * @param $key
 * @return string
 */
function get_env_conf($key)
{
    $conf = CONF_ENV;
    if (isset($conf[$key])) {
        return $conf[$key];
    }

    return '';
}

/**
 *  获取mysql的配置信息
 *
 * @param $mysql_key
 * @return string
 */
function mysql_conf($mysql_key)
{
    $conf = CONF_ENV;
    $mysql_conf = $conf['mysql'];

    if (isset($mysql_conf) && !empty($mysql_conf)) {
        if (isset($mysql_conf[$mysql_key])) {
            return $mysql_conf[$mysql_key];
        }
    }

    return '';
}