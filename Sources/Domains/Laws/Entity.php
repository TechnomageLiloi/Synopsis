<?php

namespace Liloi\Synopsis\Domains\Laws;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Map entity.
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Gets `key_law` param.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_law');
    }

    /**
     * Stylo program parse.
     *
     * @return string
     */
    public function parse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    /**
     * Gets data with JSON_PRETTY_PRINT flag.
     *
     * @return string
     */
    public function parseData(): string
    {
        return json_encode(json_decode($this->getData(), true), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Saves law.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}