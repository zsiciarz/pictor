<?php

/**
 * Packs the library into a Phar archive.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

error_reporting(E_ALL);

$distPath = realpath(dirname(__FILE__).'/dist');
echo 'Starting work in distribution directory: ', $distPath, "\n";

$pharFile = $distPath.'/Pictor.phar';
if (file_exists($pharFile))
{
    echo "Phar file already exists, removing current version...\n";
    unlink($pharFile);
}

try
{
    if (!Phar::canWrite())
        throw new Exception('Phar is readonly, please change that in php.ini');

    $p = new Phar($pharFile, 0, 'Pictor.phar');
    //$p = $p->convertToExecutable(Phar::TAR, Phar::GZ);
    $p->startBuffering();
    echo 'Starting to create phar file using Phar API v. ', Phar::apiVersion(), "\n";

    $srcPath = realpath(dirname(__FILE__).'/src');
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcPath));
    $p->buildFromIterator($iterator, 'src');

    $stub = <<<'EOF'
<?php
Phar::interceptFileFuncs();
Phar::mapPhar('Pictor.phar');
include 'phar://Pictor.phar/Pictor/Loader.php';
$loader = new \Pictor\Loader('..');
$loader->register();
__HALT_COMPILER();
EOF;
    $p->setStub($stub);

    $p->stopBuffering();

    echo 'Phar file succesfully saved to ', $pharFile, "\n";
}
catch (Exception $e)
{
    echo 'ERROR: An exception was thrown: ', $e->getMessage();
}