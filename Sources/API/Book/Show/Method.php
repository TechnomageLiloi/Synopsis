<?php

namespace Liloi\Synopsis\API\Book\Show;

use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domains\Book\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = DiaryManager::loadCurrent();

        if($entity === null)
        {
            return [
                'render' => $this->render(__DIR__ . '/Create.tpl')
            ];
        }

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}