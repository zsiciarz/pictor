<?php

namespace Pictor\Image;

/**
 * A selection class representing an independent fragment of an image.
 *
 * @author Zbyszek
 */
class Selection extends \Pictor\Image
{
    public function __construct($handle)
    {
        $this->handle = $handle;
    }
}

