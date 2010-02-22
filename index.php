<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

try
{
    $img = new \Pictor\Image();
    $img->load('img/lena.png')
        ->invert()
        ->filter('gaussian_blur')
        ->rotate(-33)
        ->filter('contrast', 300)
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}