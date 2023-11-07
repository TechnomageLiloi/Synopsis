<?php

namespace Liloi\Synopsis\Domain\Notes;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getNote()
 * @method void setNote(string $value)
 *
 * @method string getPosition()
 * @method void setPosition(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_atom');
    }

    public function parseNote(): string
    {
        return Parser::parseString($this->getNote());
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getUrl(): string
    {
        return Manager::NoteToAddress($this->getKey());
    }
}