<?php

namespace Application;

use Application\General\Conceptual;

/**
 * @inheritDoc
 */
class Application extends Conceptual
{
    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return (new \Application\API\Application($this->getConfig()))->compile();
        }

        return $this->render(__DIR__ . '/Templates/Layout.tpl', [
        ]);
    }
}