<?php

namespace Pictor\Image\IO;

/**
 * I/O operations for PNG format.
 *
 * @author Zbyszek
 */
class PngIO extends \Pictor\Image\IO
{
    /**
     * Loads the PNG image and returns image handle.
     *
     * @param string $filename path to file
     */
    public function load($filename)
    {
        return imagecreatefrompng($filename);
    }

    /**
     * Saves the PNG image to file.
     *
     * @param resource $img image handle
     * @param string $filename path to file
     */
    public function save($img, $filename)
    {
        return imagepng($img, $filename);
    }
}
