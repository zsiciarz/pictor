<?php

namespace Pictor;

/**
 * Handles autoloading of the library classes.
 *
 * @author Zbyszek
 */
class Loader
{
    private $dir = '';

    /**
     * Creates the loader and sets library base dir.
     *
     * @param string $dir library dir
     */
    public function __construct($dir = null)
    {
        if (is_null($dir))
        {
            $dir = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..');
        }
        $this->dir = $dir.'/';
    }

    /**
     * Registers the loader on autoload stack.
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Loads the class, correctly handling namespaces.
     * 
     * @param string $className
     */
    public function loadClass($className)
    {
        $path = '';
        if (($pos = strripos($className, '\\')) !== false)
        {
            $ns = substr($className, 0, $pos);
            $className = substr($className, $pos + 1);
            $path = str_replace('\\', '/', $ns).'/';
        }
        $path .= $className.'.php';
        require $this->dir.$path;
    }
}

