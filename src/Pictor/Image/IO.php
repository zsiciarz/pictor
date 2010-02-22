<?php

namespace Pictor\Image;

/**
 * Base class for I/O operations.
 *
 * @author Zbyszek
 */
class IO
{
    /**
     * Loads the file and returns image handle.
     *
     * @param string $filename path to file
     */
    abstract public function load($filename);

    /**
     * Saves the image to file.
     * 
     * @param resource $img image handle
     * @param string $filename path to file
     */
    abstract public function save($img, $filename);
}

