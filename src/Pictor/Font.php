<?php

namespace Pictor;

/**
 * A TTF font class.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class Font
{
    private $fontFile = '';

    private $size = 10;

    /**
     * Creates the font object, setting the path to font file.
     * 
     * @param string $fontFile
     */
    public function __construct($fontFile, $size = 10)
    {
        $this->fontFile = $fontFile;
        $this->size = $size;
    }

    /**
     * Returns the path to font file.
     * 
     * @return string
     */
    public function getFontFile()
    {
        return $this->fontFile;
    }

    /**
     * Sets new font size.
     *
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Returns font size.
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
}

