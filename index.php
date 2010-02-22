<?php
error_reporting(E_ALL);

require_once 'src/Pictor/Loader.php';
$loader = new \Pictor\Loader();
$loader->register();

try
{
    $img = new \Pictor\Image();
    var_dump($img);
}
catch (\Pictor\Exception $e)
{
    die($e->getMessage());
}