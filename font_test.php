<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png');
    $center = $img->getCenter();
    $img->drawEllipse($center->x, $center->y, 10, 10, '#FF0', true);
    $img->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}