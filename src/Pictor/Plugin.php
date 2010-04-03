<?php

namespace Pictor;

/**
 * An interface for image plugins.
 *
 * This file is part of the Pictor image processing library.
 *
 * @package Pictor
 * @version 1.0.0-dev
 * @author Zbigniew Siciarz
 * @date 2009-2010
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
abstract class Plugin
{
    /**
     * Looks for a plugin, autoloading the class if it exists.
     *
     * @param string $name plugin name
     * @return callback
     */
    static public function findPlugin($name)
    {
        $className = __NAMESPACE__.'\\Plugin\\'.ucfirst($name).'Plugin';
        if (class_exists($className))
        {
            return array(new $className(), 'draw');
        }
        
        // plugin not found
        return function(Image $image, $handle) {
            $image->drawEllipse($image->getCenter(), new Size(100, 100), '#F00', true);
        };
    }
    
    abstract public function draw(\Pictor\Image $image, $handle);
}

