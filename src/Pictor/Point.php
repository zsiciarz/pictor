<?php

namespace Pictor;

/**
 * A geometry point class.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
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
        list($this->x, $this->y) = self::fixArguments($x, $y);
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

    /**
     * Translates the Point object.
     *
     * @param Point|array|int|float $x
     * @param int|float $y
     * @return \Pictor\Point
     */
    public function translate($x, $y = 0)
    {
        list($x_, $y_) = self::fixArguments($x, $y);
        $this->x += $x_;
        $this->y += $y_;

        return $this;
    }

    /**
     * Handles the "overloading" of method arguments in the Point class.
     *
     * @param Point|array|int|float $arg1
     * @param int|float $arg2
     * @return array
     */
    private static function fixArguments($arg1, $arg2)
    {
        if ($arg1 instanceof Point)
        {
            return array($arg1->x, $arg1->y);
        }
        elseif (is_array($arg1))
        {
            return $arg1;
        }
        else
        {
            return array($arg1, $arg2);
        }
    }
}

