<?php

/**
 * Created by PhpStorm.
 * User: frost
 * Date: 16-7-23
 * Time: 下午11:17
 */

namespace Jconf;

use Yaf\Config\Ini;

class Conf
{
    public static function get($dottedKey)
    {
        $configDir = __DIR__ . '/../../../src/conf';
        list($filename, $key) = explode('.', $dottedKey, 2);

        $filename = $configDir . '/' . $filename . '.ini';
        if (is_file($filename) && is_readable($filename)) {
            $iniConfig = new Ini($filename, APP_ENV);

            if (is_a($iniConfig, 'Yaf\Config\Ini')) {
                $mixedConfig = $iniConfig->get($key);
                if (is_a($mixedConfig->toArray())) {
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
