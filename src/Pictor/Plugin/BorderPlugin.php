<?php

namespace Pictor\Plugin;

use \Pictor\Image as Image, \Pictor\Point as Point, \Pictor\Size as Size;

/**
 * A plugin which draws a border on the image.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class BorderPlugin extends \Pictor\Plugin
{
    public function draw(Image $image, $handle)
    {
        list( , , $thickness, $color) = func_get_args();
        $size = $image->getSize();
        $hSize = new Size($size->width, $thickness);
        $vSize = new Size($thickness, $size->height);
        $topLeft = new Point(0, 0);
        $bottomLeft = new Point(0, $size->height - $thickness);
        $topRight =  new Point($size->width - $thickness, 0);

        $image->drawRectangle($topLeft,    $hSize, $color, true)
              ->drawRectangle($topLeft,    $vSize, $color, true)
              ->drawRectangle($bottomLeft, $hSize, $color, true)
              ->drawRectangle($topRight,   $vSize, $color, true);
    }
}

