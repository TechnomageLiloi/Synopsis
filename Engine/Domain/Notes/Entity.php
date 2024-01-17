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
        return $this->getField('key_note');
    }

    public function parseNote(): string
    {
        $urlRoot = ROOT_URL;
        if($urlRoot !== '/')
        {
            $urlRoot .= '/';
        }

        return Parser::parseString(
            str_replace('](', '](' . $urlRoot, $this->getNote())
        );
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

    public function getSeeds(): string
    {
        $rid_full = $this->getKey();
        $rid = explode(':', $rid_full);

        $seeds = [];

        while(count($rid) > 0)
        {
            $rid_seed = implode(':', $rid);

            if($rid_seed == $rid_full)
            {
                $seed = ucfirst(str_replace('-', ' ', end($rid)));
            }
            else
            {
                $seed = sprintf(
                    '<a href="%s">%s</a>',
                    Manager::NoteToAddress($rid_seed),
                    ucfirst(str_replace('-', ' ', end($rid)))
                );
            }

            array_unshift($seeds, $seed);
            array_pop($rid);
        }

        return implode(' &#9654; ', $seeds);
    }
}