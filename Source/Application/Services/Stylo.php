<?php

namespace Application\Services;

use Rune\Services\Manager;

class Stylo
{
    public static function keyToPath(string $key): string
    {
        $part = str_replace(':','/', $key);
        return Config::getManager()->get('root') . '/' . $part . '.stylo';
    }

    public static function createMain(string $key): void
    {
        $content = $key === 'Story' ?
            "# Name of story\n\n[text and links]\n\nName of author, Where, When" :
            "[text and links]";

        $path = self::keyToPath($key);
        file_put_contents($path, $content);
    }

    public static function get(string $key): string
    {
        $path = self::keyToPath($key);

        if(!file_exists($path))
        {
            self::createMain($key);
        }

        return file_get_contents($path);
    }

    public static function set(string $key, string $content): void
    {
        $path = self::keyToPath($key);
        file_put_contents($path, $content);
    }
}