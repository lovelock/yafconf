<?php

/**
 * Created by PhpStorm.
 * User: frost
 * Date: 16-7-23
 * Time: 下午11:17
 */

class Conf
{
    public static function get($key)
    {
        $configDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'conf';
        $filename = $configDir . DIRECTORY_SEPARATOR . explode('.', $key) . '.ini');

        if (is_file($filename) && is_readable($filename)) {
            $config = (new Yaf\Ini($filename, APP_ENV))->get($key);
            if (is_a($config, 'Yaf\Config\Ini')) {
                $config = $config->toArray();
            } else {
                $config = null;
            }
        }

        return $config;
    }
}