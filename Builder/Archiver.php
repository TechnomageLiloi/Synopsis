<?php
echo "Archiving in PHAR...\n";
$fnDumper = __DIR__ . '/Synopsis.phar';

try
{
    if(file_exists($fnDumper)) {
        unlink($fnDumper);
    }

    echo "\tInitialising Archive...";
    $oPhar = new Phar($fnDumper);
    $oPhar->startBuffering();
    echo "Done.\n\tArchiving...\n";

    $oPhar->setStub(Phar::createDefaultStub('index.php'));
    $oPhar->buildFromDirectory(dirname(__DIR__));

    $oPhar->stopBuffering();
    echo "\tDone archiving.\n";
    chmod($fnDumper, 0777);

} catch (Exception $e) {
    echo $e->getMessage();
}