<?php

namespace Pictor\Image;

/**
 * Base class for I/O operations.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
abstract class IO
{
    /**
     * Factory method to create concrete IO objects.
     * 
     * @param string $filename
     * @return \Pictor\Image\IO
     */
    static public function getIO($filename)
    {
        $parts = pathinfo($filename);
        $ext = $parts['extension'];

        if ('jpeg' == $ext)
            $ext = 'jpg';
        
        $className = __NAMESPACE__.'\\IO\\'.ucfirst($ext).'IO';
        if (class_exists($className))
        {
            return new $className();
        }

        return null;
    }

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

    /**
     * Displays the image in the browser.
     *
     * @param resource $img image handle
     */
    abstract public function show($img);
}

