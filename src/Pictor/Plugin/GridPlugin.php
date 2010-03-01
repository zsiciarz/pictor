<?php

namespace Pictor\Plugin;

use \Pictor\Image as Image, \Pictor\Point as Point;

/**
 * A plugin which draws a grid on the image.
 *
 * @author Zbyszek
 */
class GridPlugin extends \Pictor\Plugin
{
    public function draw(Image $image, $handle)
    {
        list( , , $xLines, $yLines) = func_get_args();
        
        $image->drawLine(new Point(0, 0), new Point(250, 250), '#666');
    }
}

