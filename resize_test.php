<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use Pictor\Point as Point, Pictor\Size as Size;

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png')
        ->resize(new Size(600, 600))
        ->crop($img->getCenter()->translate(-100, -100), new Size(200, 200))
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}