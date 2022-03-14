<?php

use App\Config;

/**
 * @param $array
 * @param $key
 * Возвращает значение под ключом после последней точки,
 * key1.key2.key3 => value, где
 * уровень вложенности отделяется точками
 * @param null $default если нет вернет null
 */

function array_get(array $arr, $keys, $default = null)
{   if(is_string($keys)){
    $keys = explode('.', $keys);
}
    for ($i = 0; $i < count($keys); $i++) {

        if (array_key_exists($keys[$i], $arr)) {
            if (is_array($arr[$keys[$i]]) && count($keys) > 1) {
                $key = $keys[$i];
                unset($keys[$i]);
                $keys = array_values($keys);
                $result = array_get($arr[$key], $keys);
                if (is_string($result)) return $result;
            } elseif (is_string($arr[$keys[$i]])) {
                return $arr[$keys[$i]];
            } else return $arr[$keys[$i]];
        } else return $default;
    }
}


function getDbConfigs()
{
    $configs = include_once APP_DIR . DS . 'configs' . DS . 'db.php';
    Config::getInstance($configs);

    return Config::get('db');
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
