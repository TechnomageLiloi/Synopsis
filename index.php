<?php

if(!defined('ROOT_DIR')) {
    define('ROOT_DIR', __DIR__);
}

include_once __DIR__ . '/vendor/autoload.php';

$private = json_decode(file_get_contents(__DIR__ . '/Config/Private.json'), true);

$config = array_merge([
    'title' => 'Synopsis',
    'start' => 'Requests.layout();',
    'scripts' => [
    ],
    'prefix' => ''
], $private);

$app = new \Liloi\Synopsis\Application($config);

echo $app->compile();