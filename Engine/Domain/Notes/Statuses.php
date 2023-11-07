<?php

namespace Liloi\Synopsis\Domain\Notes;

class Statuses
{
    public const ENABLED = 1;
    public const DISABLED = 2;

    static public array $list = [
        self::ENABLED => 'Enabled',
        self::DISABLED => 'Disabled',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}