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
        list( , , $hLines, $vLines, $color) = func_get_args();

        $width = $image->getWidth();
        $height = $image->getHeight();
        $dx = $width / $vLines;
        $dy = $height / $hLines;

        // horizontal lines
        $from = new Point(0, 0);
        $to = new Point($width, 0);
        for ($i = 0; $i <= $hLines; ++$i)
        {
            $from->translate(0, $dy);
            $to->translate(0, $dy);
            $image->drawLine($from, $to, $color);
        }

        // vertical lines
        $from = new Point(0, 0);
        $to = new Point(0, $height);
        for ($i = 0; $i <= $vLines; ++$i)
        {
            $from->translate($dx, 0);
            $to->translate($dx, 0);
            $image->drawLine($from, $to, $color);
        }
    }
}

