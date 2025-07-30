<?php

namespace Liloi\Synopsis\API\Laws\Create;

use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domains\Laws\Manager as DiaryManager;

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