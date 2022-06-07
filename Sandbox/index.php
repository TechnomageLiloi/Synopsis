<?php

include __DIR__ . '/Synopsis.phar';

use Rune\Services\Manager as ConfigurationManager;
$config = new ConfigurationManager([
    'story' => __DIR__ . '/Story.stylo'
]);

$application = new Application\Application($config);
echo $application->compile();