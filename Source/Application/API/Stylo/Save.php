<?php

namespace Application\API\Stylo;

use Application\API\Method;
use Application\Services\Stylo as StyloService;

/**
 * API method: Atom.Render
 *
 * @todo: add tests
 */
class Save extends Method
{
    /**
     * @inheritDoc
     */
    public function get(): array
    {
        $key = $this->getParameter('key');
        $content = $this->getParameter('content');

        StyloService::set($key, $content);

        return [
        ];
    }
}