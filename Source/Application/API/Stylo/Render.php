<?php

namespace Application\API\Stylo;

use Application\API\Method;
use Application\Services\Story as StoryService;

/**
 * API method: Atom.Render
 *
 * @todo: add tests
 */
class Render extends Method
{
    /**
     * @inheritDoc
     */
    public function get(): array
    {
        $key = $this->getParameter('key');

        return [
            'render' => $this->render(__DIR__ . '/Render.tpl', [

            ])
        ];
    }
}