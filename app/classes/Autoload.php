<?php
class Autoload
{
    public static function init()
    {
        spl_autoload_register([__CLASS__, 'load']);
    }

    private static function load($class_name)
    {
        if (is_file(CLASSES.$class_name.'.php')) {
            require_once CLASSES.$class_name.'.php';
        } elseif (is_file(CONTROLLERS.$class_name.'.php')) {
            require_once CONTROLLERS.$class_name.'.php';
        } elseif (is_file(MODELS.$class_name.'.php')) {
            require_once MODELS.$class_name.'.php';
        }
        return;
    }
}
