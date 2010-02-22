<?php

namespace Pictor\Image\IO;

/**
 * I/O operations for JPG format.
 *
 * @author Zbyszek
 */
class JpgIO extends \Pictor\Image\IO
{
    /**
     * Loads the JPG image and returns image handle.
     *
     * @param string $filename path to file
     */
    public function load($filename)
    {
        return imagecreatefromjpeg($filename);
    }

    /**
     * Saves the JPG image to file.
     *
     * @param resource $img image handle
     * @param string $filename path to file
     */
    public function save($img, $filename)
    {
        return imagejpeg($img, $filename);
    }

    /**
     * Displays the image in the browser.
     *
     * @param resource $img image handle
     */
    public function show($img)
    {
        header('Content-type: image/jpeg');
        imagejpeg($img);
    }
}
