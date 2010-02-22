<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png')
        ->save('img/lena2.png');
    var_dump($img);
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}