<?php

namespace Liloi\Synopsis\Domain\Notes;

use Liloi\Synopsis\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getConfig()->get('table');
    }

    public static function create(string $keyNote): array
    {
        $name = self::getTableName();

        $row = [
            'key_note' => $keyNote,
            'title' => 'Enter the note title',
            'status' => Statuses::ENABLED,
            'note' => '// Enter the note',
            'position' => '1',
        ];

        self::getAdapter()->insert($name, $row);

        return $row;
    }

    public static function load(string $keyNote): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_note="%s";',
            $name, $keyNote
        ));

        if(!$row)
        {
            $row = self::create($keyNote);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_note']);

        self::update($name, $data, sprintf('key_note="%s"', $entity->getKey()));
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        self::getAdapter()->delete($name, sprintf('key_note="%s"', $entity->getKey()));
    }

    public static function AddressToNote(string $URL): string
    {
        $lower = strtolower(trim($URL, '/'));

        if(in_array($lower, ['', 'root']))
        {
            return 'root';
        }

        return 'root:' . str_replace('/', ':', $lower);
    }

    public static function NoteToAddress(string $keyAtom): string
    {
        if($keyAtom === 'root')
        {
            return '/';
        }

        $lower = strtolower(str_replace('root:', '', $keyAtom));
        return '/' . str_replace(':', '/', $lower);
    }

    public static function ridChange(string $ridOld, string $ridNew): void
    {
        $nameTable = self::getTableName();
        self::getAdapter()->request(sprintf(
            'update %s set key_note = "%s" where key_note = "%s"',
            $nameTable,
            $ridNew,
            $ridOld
        ));
    }

    public static function exportText(string $URL): string
    {
        $keyAtom = self::AddressToNote($URL);
        $entity = self::load($keyAtom);

        $export = preg_replace_callback('/\[(.*?)\]\((.*?)\)/', function ($matches) {
            return self::exportText($matches[2]);
        }, $entity->getNote());

        return $export;
    }
}