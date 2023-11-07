<?php

namespace Liloi\Synopsis\API\Notes\Save;

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
        $keyAtom = self::getParameter('key_note');
        $entity = NotesManager::load($keyAtom);

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setNote(self::getParameter('note'));

        $entity->save();

        return new Response();
    }
}