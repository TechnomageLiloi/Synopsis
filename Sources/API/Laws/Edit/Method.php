<?php

namespace Liloi\Synopsis\API\Laws\Edit;

use Liloi\Synopsis\API\Method as SuperMethod;
use Liloi\Synopsis\Domains\Laws\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_day']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}