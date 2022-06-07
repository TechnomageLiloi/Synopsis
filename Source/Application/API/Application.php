<?php

namespace Application\API;

use Application\General\Conceptual;
use Judex\Assert;

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
        $class_api_method = 'Application\\API\\' . str_replace('.', '\\', $_POST['method']);

        Assert::true(class_exists($class_api_method));

        $parameters = $_POST['parameters'] ?? [];

        /** @var \Application\API\Method $method */
        $method = new $class_api_method($parameters, $this->getConfig());

        return json_encode([
            'response' => $method->get()
        ]);
    }
}