<?php

/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 16-7-23
 * Time: 下午11:17
 */

namespace Conf;
use Yaf\Config\Ini;

class Conf
{
    public static function get($dottedKey)
    {
        list($filename, $key) = explode('.', $dottedKey, 2);

        //todo CONF_PATH may not be defined
        $filename = CONF_PATH . '/' . $filename . '.ini';
        if (is_file($filename) && is_readable($filename)) {
            $iniConfig = new Ini($filename, APP_ENV);

            if (is_a($iniConfig, 'Yaf\Config\Ini')) {
                $mixedConfig = $iniConfig->get($key);
                if (is_a($mixedConfig, 'Yaf\Config\Ini')) {
                    return $mixedConfig->toArray();
                } else {
                    return $mixedConfig;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
