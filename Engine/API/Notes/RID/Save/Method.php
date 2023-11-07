<?php

namespace Liloi\Synopsis\API\Notes\RID\Save;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $ridOld = self::getParameter('rid_old');
        $ridNew = self::getParameter('rid_new');

        NotesManager::ridChange($ridOld, $ridNew);
        return new Response();
    }
}