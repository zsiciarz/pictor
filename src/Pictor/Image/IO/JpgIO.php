<?php

namespace Pictor\Image\IO;

/**
 * I/O operations for JPG format.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
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
