<?php

namespace Pictor\Image\IO;

/**
 * I/O operations for PNG format.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
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

    /**
     * Displays the image in the browser.
     *
     * @param resource $img image handle
     */
    public function show($img)
    {
        header('Content-type: image/png');
        imagepng($img);
    }
}
