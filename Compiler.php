<?php

try
{
    $pharFile = 'Synopsis.phar';

    if(file_exists($pharFile))
    {
        unlink($pharFile);
    }

    $phar = new Phar($pharFile);

    $phar->startBuffering();
    $phar->buildFromDirectory(__DIR__ . '/Source');
    $phar->setDefaultStub('Main.php');
    $phar->stopBuffering();
    $phar->compressFiles(Phar::GZ);

    chmod(__DIR__ . '/Synopsis.phar', 0770);

    echo "Synopsis successfully created" . PHP_EOL;
}
catch (Exception $e)
{
    echo $e->getMessage();
}
