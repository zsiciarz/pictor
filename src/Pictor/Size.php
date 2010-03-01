<?php

namespace Pictor;

/**
 * A size class.
 *
 * @author Zbyszek
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
}

