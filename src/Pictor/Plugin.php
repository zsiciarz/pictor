<?php

namespace Pictor;

/**
 * A Plugin interface.
 *
 * @author Zbyszek
 */
abstract class Plugin
{
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

