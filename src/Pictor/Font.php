<?php

namespace Pictor;

/**
 * A TTF font class.
 *
 * @author Zbyszek
 */
class Font
{
    private $fontFile = '';

    /**
     * Creates the font object, setting the path to font file.
     * 
     * @param string $fontFile
     */
    public function __construct($fontFile)
    {
        $this->fontFile = $fontFile;
    }
}

