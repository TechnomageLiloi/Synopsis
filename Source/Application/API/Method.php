<?php

namespace Application\API;

use Judex\Assert;
use Rune\Services\Manager;

/**
 * Abstract for API methods.
 */
abstract class Method
{
    /**
     * List of API parameters.
     *
     * @var array
     */
    private $parameters;

    private $config;

    /**
     * API method constructor.
     *
     * @param array $parameters List of API parameters.
     */
    public function __construct(array $parameters, Manager $config)
    {
        $this->parameters = $parameters;
        $this->config = $config;
    }

    public function getConfig(): Manager
    {
        return $this->config;
    }

    /**
     * Get parameter value by name.
     *
     * @param string $name Parameter name.
     * @return mixed Parameter value.
     */
    public function getParameter(string $name)
    {
        Assert::true(isset($this->parameters[$name]), 'Parameter name is not found.', [
            'parameters' => $this->parameters,
            'name' => $name
        ]);

        return $this->parameters[$name];
    }

    /**
     * Get all list of API parameters.
     *
     * @return array List of API parameters.
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Render template/layout output.
     * @todo Add render to trait.
     *
     * @param string $template Template file.
     * @param array $data Variable values.
     * @return string compiled template
     */
    protected function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    /**
     * API method.
     *
     * @return array Response data list.
     */
    abstract public function get(): array;
}