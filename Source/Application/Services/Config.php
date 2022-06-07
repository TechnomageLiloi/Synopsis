<?php

namespace Application\Services;

use Rune\Services\Manager;

class Config
{
    /**
     * Configuration data object.
     *
     * @var Manager
     */
    static private Manager $config;

    public static function setManager(Manager $config)
    {
        self::$config = $config;
    }

    public static function getManager(): Manager
    {
        return self::$config;
    }
}