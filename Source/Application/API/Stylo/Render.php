<?php

namespace Application\API\Stylo;

use Application\API\Method;
use Application\Services\Stylo as StyloService;

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
        $content = StyloService::get($key);

        return [
            'right' => $this->render(__DIR__ . '/Right.tpl', [
                'content' => $content
            ])
        ];
    }
}