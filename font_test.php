<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use Pictor\Point as Point, Pictor\Size as Size;

try
{
    $font = new \Pictor\Font('C:\\Windows\\fonts\\arial.ttf', 16);
    $img = new \Pictor\Image();
    $img->load('img/lena.png')
        ->drawText($img->getCenter(), 'LENA', $font, 'F00')
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}