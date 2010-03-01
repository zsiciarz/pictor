<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

use Pictor\Point as Point, Pictor\Size as Size;

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
        ->setAntialiasing(true)
        ->filter('gaussian_blur')
        ->rotate(-33)
        ->drawLine($img->getCenter(), new Point(0, 0), '#FFF')
        ->drawRectangle(new Point(30, 30), new Size(120, 120), $blue)
        ->filter('contrast', 300)
        ->drawEllipse(new Point(250, 250), new Size(30, 30), $green, true)
        ->drawPolygon($points, $red)
        ->setPoint(new Point(300 + rand(1, 10), 300 + rand(1, 10)), $green)
        ->show();
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}