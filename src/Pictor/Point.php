<?php

namespace Pictor;

/**
 * A geometry point class.
 *
 * @author Zbyszek
 */
class Point
{
    public $x = 0, $y = 0;

    /**
     * Creates the Point object.
     * 
     * @param Point|array|int|float $x
     * @param int|float $y
     */
    public function __construct($x, $y = 0)
    {
        if ($x instanceof Point)
        {
            $this->x = $x->x;
            $thix->y = $x->y;
        }
        elseif (is_array($x))
        {
            $this->x = $x[0];
            $this->y = $x[1];
        }
        else
        {
            $this->x = $x;
            $this->y = $y;
        }
    }

    /**
     * Returns string representation of the Point object.
     * 
     * @return string
     */
    public function __toString()
    {
        return sprintf('Point(x=%d,y=%d)', $this->x, $this->y);
    }
}

