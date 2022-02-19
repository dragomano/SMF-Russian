<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$zipFile = new \PhpZip\ZipFile();

try {
    $zipFile
        ->addDirRecursive(__DIR__ . '/dist_install', '/', \PhpZip\Constants\ZipCompressionMethod::DEFLATED)
        ->saveAsFile('smf21_rus_install.zip')
        ->close();

    $zipFile
        ->addDirRecursive(__DIR__ . '/dist_upgrade', '/', \PhpZip\Constants\ZipCompressionMethod::DEFLATED)
        ->saveAsFile('smf21_rus_upgrade.zip')
        ->close();
} catch(\PhpZip\Exception\ZipException $e) {
    file_put_contents('error.log', $e->getMessage());
}
