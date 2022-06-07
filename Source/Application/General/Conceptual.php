<?php

namespace Application\General;

use Rune\Application\Conceptual as ConceptualApplication;
use Library\Data\Adapter;
use Rune\Services\Manager;
use Application\Services\Config as ConfigService;

/**
 * @inheritDoc
 */
class Conceptual extends ConceptualApplication
{
    /**
     * Configuration data object.
     *
     * @var Manager
     */
    private Manager $config;

    /**
     * Application constructor.
     *
     * @param Manager $config Configuration data object.
     */
    public function __construct(Manager $config)
    {
        $this->config = $config;
        ConfigService::setManager($config);
    }

    /**
     * Gets configuration data object.
     *
     * @return Manager Configuration data object.
     */
    public function getConfig(): Manager
    {
        return $this->config;
    }
}