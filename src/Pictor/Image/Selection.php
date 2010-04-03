<?php

namespace Pictor\Image;

/**
 * A selection class representing an independent fragment of an image.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class Selection extends \Pictor\Image
{
    protected $image = null;

    protected $parentHandle = null;

    protected $topLeft = null;

    /**
     * Creates the selection object associated with an image.
     *
     * @param resource $handle
     * @param resource $parentHandle
     * @param Image $image
     * @param Point $topLeft
     */
    public function __construct($handle, $parentHandle, \Pictor\Image $image, \Pictor\Point $topLeft)
    {
        $this->handle = $handle;
        $this->parentHandle = $parentHandle;
        $this->image = $image;
        $this->topLeft = $topLeft;
    }

    /**
     * Merges the selection back to the image and returns the image.
     * 
     * @return \Pictor\Image
     */
    public function deselect()
    {
        imagecopy($this->parentHandle, $this->handle,
                  $this->topLeft->x, $this->topLeft->y,
                  0, 0, $this->getWidth(), $this->getHeight());

        imagedestroy($this->handle);
        $this->handle = null;

        return $this->image;
    }
}

