<?php

namespace App;

class Config
{
    private static $configs = null;

    public static function getInstance(array $config)
    {
        return self::$configs ?? self::$configs = $config;
    }

    public static function get($config, $default = null)
    {
        return self::$configs ? array_get(self::$configs, $config) : $default;
    }

    public function __wakeup()
    {
    }

    public function __construct()
    {
    }

    public function __clone()
    {
    }
}