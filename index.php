<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

try
{
    $red =  new \Pictor\Color(255, 0, 0);
    $green = new \Pictor\Color(array(0, 255, 0));
    $blue = new \Pictor\Color('#00F');
    $points = array(
      300, 0,
      320, 50,
      280, 100
    );
    $img = new \Pictor\Image();
    $img->load('img/lena.png')
        ->invert()
        ->filter('gaussian_blur')
        ->rotate(-33)
        ->drawRectangle(30, 30, 100, 120, $blue)
        ->filter('contrast', 300)
        ->drawEllipse(250, 250, 30, 30, $green, true)
        ->drawPolygon($points, $red)
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}