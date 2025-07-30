<?php

namespace Liloi\Synopsis\API\Book\Create;

use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domains\Book\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        DiaryManager::create(
            DiaryManager::URLtoUID($_SERVER['REQUEST_URI'])
        );

        return [];
    }
}