<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use \Pictor\Point as Point, \Pictor\Size as Size;

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png');

    $selectionSize = new Size($img->getWidth() / 2, $img->getHeight() / 2);

    $img->select(new Point(0, 0), $selectionSize)
        ->drawRectangle(new Point(0, 0), $selectionSize->adjust(-1, -1), '#0F0')
        ->deselect()
        ->select(new Point (100, 120), new Size(100, 30))
        ->invert()
        ->deselect()
        ->select(new Point(0, 200), new Size(50, 50))
        ->grid(4, 4, '#FFF') // plugins can work on selections too
        ->deselect()
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}