<?php

include __DIR__ . '/Synopsis.phar';

use Rune\Services\Manager as ConfigurationManager;
$config = new ConfigurationManager([
    'root' => __DIR__
]);

$application = new Application\Application($config);
echo $application->compile();