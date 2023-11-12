<?php

namespace Liloi\Synopsis\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('Synopsis.Export.Text', '\Liloi\Synopsis\API\Export\Text\Method::execute'));

            $manager->add(new Method('Synopsis.Notes.Show', '\Liloi\Synopsis\API\Notes\Show\Method::execute'));
            $manager->add(new Method('Synopsis.Notes.Edit', '\Liloi\Synopsis\API\Notes\Edit\Method::execute'));
            $manager->add(new Method('Synopsis.Notes.Save', '\Liloi\Synopsis\API\Notes\Save\Method::execute'));
            $manager->add(new Method('Synopsis.Notes.Create', '\Liloi\Synopsis\API\Notes\Create\Method::execute'));

            $manager->add(new Method('Synopsis.Notes.RID.Edit', '\Liloi\Synopsis\API\Notes\RID\Edit\Method::execute'));
            $manager->add(new Method('Synopsis.Notes.RID.Save', '\Liloi\Synopsis\API\Notes\RID\Save\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}