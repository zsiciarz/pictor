<?php

namespace Pictor\Image;

/**
 * A selection class representing an independent fragment of an image.
 *
 * @author Zbyszek
 */
class Selection extends \Pictor\Image
{
    protected $image = null;
    
    public function __construct($handle, \Pictor\Image $image)
    {
        $this->handle = $handle;
        $this->image = $image;
    }

    public function deselect()
    {

        return $this->image;
    }
}

