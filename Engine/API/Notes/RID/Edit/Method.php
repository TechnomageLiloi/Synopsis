<?php

namespace Liloi\Synopsis\API\Notes\RID\Edit;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;
use Liloi\Synopsis\Domain\Notes\Statuses as NotesStatuses;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = self::getCurrentURL();
        $RID = NotesManager::AddressToNote($URL);

        $entity = NotesManager::load($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}