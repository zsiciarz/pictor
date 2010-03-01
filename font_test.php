<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use Pictor\Point as Point, Pictor\Size as Size;

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png');
    $img->drawEllipse($img->getCenter(), new Size(10, 10), '#FF0', true);
    $img->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}