<?php

namespace Liloi\Synopsis\API\Book\Save;

use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domains\Book\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_day']);

        $entity->setData($_POST['parameters']['data']);
        $entity->setProgram($_POST['parameters']['program']);

        $entity->save();

        return [];
    }
}