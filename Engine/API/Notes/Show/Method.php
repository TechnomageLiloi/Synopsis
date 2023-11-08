<?php

namespace Liloi\Synopsis\API\Notes\Show;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = self::getCurrentURL();
        $keyAtom = NotesManager::AddressToNote($URL);
        $entity = NotesManager::load($keyAtom);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
        ]));
        return $response;
    }
}