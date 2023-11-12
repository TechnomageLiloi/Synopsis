<?php

namespace Liloi\Synopsis\API\Export\Text;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'export' => NotesManager::exportText('/')
        ]));
        return $response;
    }
}