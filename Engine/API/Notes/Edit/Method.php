<?php

namespace Liloi\Synopsis\API\Notes\Edit;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;
use Liloi\Synopsis\Domain\Notes\Statuses as NotesStatuses;

/**
 * API: Rune.Notes.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = NotesManager::AddressToNote($URL);

        $entity = NotesManager::load($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => NotesStatuses::$list
        ]));

        return $response;
    }
}