<?php

namespace Pictor;

/**
 * Handles autoloading of the library classes.
 *
 * @author Zbyszek
 */
class Loader
{
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function loadClass($className)
    {
        
    }
}

