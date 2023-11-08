<?php

namespace Liloi\Synopsis\API\Notes\Create;

use Liloi\API\Response;
use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domain\Notes\Manager as NotesManager;
use Liloi\Synopsis\Exceptions\AccessException;

/**
 * API: Rune.Notes.Create
 */
class Method extends SuperMethod
{
    /**
     * @return Response
     * @throws AccessException
     */
    public static function execute(): Response
    {
        $URL = self::getCurrentURL();
        $ridSuper = NotesManager::AddressToNote($URL);
        NotesManager::create($ridSuper);
        return new Response();
    }
}