<?php

namespace Application\API\Stylo;

use Application\API\Method;
use Application\Services\Stylo as StyloService;
use Application\Parser;

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

        $parse = Parser::parseString($content);

        return [
            'right' => $this->render(__DIR__ . '/Right.tpl', [
                'content' => $content,
                'key' => $key
            ]),
            'left' => $this->render(__DIR__ . '/Left.tpl', [
                'parse' => $parse,
                'key' => $key
            ])
        ];
    }
}