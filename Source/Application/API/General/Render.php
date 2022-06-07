<?php

namespace Application\API\General;

use Application\API\Method;

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
        return [
            'render' => $this->render(__DIR__ . '/Render.tpl', [

            ])
        ];
    }
}