<?php

namespace Liloi\Synopsis;

use Rune\Application\General as GeneralApplication;
use Liloi\Synopsis\Domains\Manager as DomainsManager;
use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Liloi\Synopsis\Exceptions\NotFoundException;
use Liloi\Synopsis\API\Method;

use Liloi\Synopsis\Domains\Config\Keys as ConfigKeys;
use Liloi\Synopsis\Domains\Config\Manager as ConfigManager;

class Application extends GeneralApplication
{
    public function __construct(array $config)
    {
        parent::__construct($config);

        Pool::getSingleton()->set(new Sparkle('connection', function() use ($config) { return $config['connection'];}));
        Pool::getSingleton()->set(new Sparkle('prefix', function() use ($config) { return $config['prefix'];}));
        Pool::getSingleton()->set(new Sparkle('root', function() use ($config) { return $config['root'];}));
        DomainsManager::setConfig(Pool::getSingleton());
        Method::setConfig($config);
    }

    public function compile(): string
    {
//        if($_SERVER['REQUEST_URI'] === '/')
//        {
//            $URI = ConfigManager::load(ConfigKeys::CURRENT)->getString();
//            header(sprintf('Location: %s', $URI), true, 301);
//            exit();
//        }

        if(isset($_POST['method']))
        {
            return json_encode(['response' => $this->api($_POST['method'], $_POST['parameters'])]);
        }

        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }

    /**
     * Gets response of API method.
     *
     * @param string $name API method name.
     * @param array $parameters API parameters.
     * @return array API
     * @throws \Exception
     */
    public function api(string $name, array $parameters): array
    {
        if(empty($parameters)) {
            $parameters = [];
        }

        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        $classMethod = 'Liloi\\Synopsis\\API\\' . ucfirst(str_replace('.', '\\', $name)) . '\\Method';

        if(class_exists($classMethod))
        {
            $apiMethod = new $classMethod();
            return $apiMethod->execute();
        }

        throw new NotFoundException('No API method.');
    }

    public function apiLayout(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/API/Layout.tpl', [
                'config' => $this->getConfig()
            ]),
        ];
    }
}