<?php

namespace Pictor;

/**
 * Color class for all drawing operations.
 *
 * @author Zbyszek
 */
class Color
{
    public $r = 0, $g = 0, $b = 0;


    /**
     * Converts a HTML/CSS color string (eg. #FF0A60) to RGB values.
     * 
     * @param string $color
     * @return array
     */
    public static function fromHex($color)
    {
        if ($color[0] == '#')
            $color = substr($color, 1);

        if (6 == strlen($color))
        {
            list($r, $g, $b) = array($color[0].$color[1], $color[2].$color[3],
                                     $color[4].$color[5]);
        }
        elseif (3 == strlen($color))
        {
            list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
        }
        else
            return false;

        return array(hexdec($r), hexdec($b), hexdec($b));
    }

    /**
     * Creates the color object.
     *
     * If the first param is a HTML/CSS hex color, it is converted to RGB
     * values. If it is an array, it is assumed that the array has 3 elements
     * corresponding to R, G, and B values respectively. Otherwise all three
     * constructor arguments are channel values.
     * 
     * @param mixed $r
     * @param int $g
     * @param int $b
     */
    public function __construct($r, $g = 0, $b = 0)
    {
        if (is_string($r))
        {
            $colors = self::fromHex($r);
        }
        else if (is_array($r))
        {
            $colors = $r;
        }
        else
        {
            $colors = array($r, $g, $b);
        }

        list($this->r, $this->g, $this->b) = $colors;
    }
}
