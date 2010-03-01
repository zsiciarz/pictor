<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use Pictor\Point as Point, Pictor\Size as Size;

try
{
    $font = new \Pictor\Font('C:\\Windows\\fonts\\arial.ttf', 16);
    $verdana = new \Pictor\Font('C:\\Windows\\fonts\\verdana.ttf', 20);
    $img = new \Pictor\Image();
    $img->drawText($img->getCenter(), 'LENA', $font, 'F00')
        ->drawText(new Point(50, 50), 'Verdana', $verdana, '040', -25)
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}