<?php

namespace Pictor;

/**
 * A size/dimensions abstraction.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class Size
{
    public $width = 0, $height = 0;

    /**
     * Creates the size object.
     *
     * If arguments are numeric, they describe width and height. If they are
     * Points, they are considered to be top left and bottom right points of
     * the size rectangle.
     * 
     * @param Point|int|float $w
     * @param Point|int|float $h
     */
    public function __construct($w, $h)
    {
        if ($w instanceof Point && $h instanceof Point)
        {
            $this->width = \abs($w->x - $h->x);
            $this->height = \abs($w->y - $h->y);
        }
        else
        {
            $this->width = $w;
            $this->height = $h;
        }
    }

    /**
     * Returns string representation of the Size object.
     * 
     * @return string
     */
    public function __toString()
    {
        return sprintf('Size(width=%d,height=%d)', $this->width, $this->height);
    }

    /**
     * Allows for quick adjusting of the size (used for margins, borders etc).
     *
     * @param int $dx
     * @param int $dy
     * @return \Pictor\Size
     */
    public function adjust($dx, $dy)
    {
        $this->width += $dx;
        $this->height += $dy;

        return $this;
    }
}

