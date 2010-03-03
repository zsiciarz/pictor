<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use \Pictor\Point as Point, \Pictor\Size as Size;

try
{
    $img = new \Pictor\Image(new Size(600, 300));
    $img->drawRectangle(new Point(0, 0), $img->getSize(), '#EEE', true)
        ->select(new Point(20, 20), $img->getSize()->adjust(-40, -40))
        ->grid(5, 5, '#666') // from plugin GridPlugin
        ->deselect()
        ->border(20, '#399') // BorderPlugin
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}