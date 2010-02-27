<?php

namespace Pictor;

/**
 * Image class.
 *
 * @author Zbyszek
 */
class Image
{
    protected $filename = '';

    protected $handle = null;

    /**
     *
     * @var \Pictor\Image\IO
     */
    protected $io = null;

    /**
     * Creates an Image object and optionally loads the file.
     *
     * @param string $filename path to the file
     */
    public function __construct($filename = '')
    {
        if (!empty($filename))
        {
            $this->load($filename);
        }
    }

    /**
     * Frees memory used by image object.
     */
    public function  __destruct()
    {
        if (is_resource($this->handle))
        {
            imagedestroy($this->handle);
        }
    }

    /**
     * Loads the image from a given file.
     *
     * @param string $filename path to the file
     * @return \Pictor\Image for fluent interface
     */
    public function load($filename)
    {
        if (!is_null($this->io = Image\IO::getIO($filename)))
        {
            $this->handle = $this->io->load($filename);
            $this->filename = $filename;
        }

        return $this;
    }

    /**
     * Saves the image to a file.
     *
     * @param string $filename path to the file
     * @return \Pictor\Image for fluent interface
     */
    public function save($filename)
    {
        $this->io->save($this->handle, $filename);

        return $this;
    }

    /**
     * Displays the image to the browser.
     * 
     * @return \Pictor\Image for fluent interface
     */
    public function show()
    {
        $this->io->show($this->handle);

        return $this;
    }

    public function setAntialiasing($antialiasing = false)
    {
        imageantialias($this->handle,   true);

        return $this;
    }

    /**
     * Rotates the image by a given angle.
     * 
     * @param degrees rotation angle
     * @return \Pictor\Image for fluent interface
     */
    public function rotate($degrees)
    {
        if ($degrees < 0.0)
        {
            $degrees = 360.0 - $degrees;
        }

        $this->handle = imagerotate($this->handle, $degrees, 0);

        return $this;
    }

    public function invert()
    {
        imagefilter($this->handle, IMG_FILTER_NEGATE);

        return $this;
    }

    public function filter()
    {
        $args = func_get_args();
        $filter = array_shift($args);
        $filter = constant('IMG_FILTER_'.strtoupper($filter));
        array_unshift($args, $this->handle, $filter);
        call_user_func_array('imagefilter', $args);

        return $this;
    }

    public function drawRectangle($x, $y, $width, $height, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = Color($color);

        $drawfunc = $fill ? 'imagefilledrectangle' : 'imagerectangle';
        $drawfunc($this->handle, $x, $y, $x + $width, $y + $height,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawEllipse($cx, $cy, $width, $height, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = Color($color);

        $drawfunc = $fill ? 'imagefilledellipse' : 'imageellipse';
        $drawfunc($this->handle, $cx, $cy, $width, $height,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawPolygon($points, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = Color($color);

        $drawfunc = $fill ? 'imagefilledpolygon' : 'imagepolygon';
        $drawfunc($this->handle, $points, count($points) / 2,
                  $color->allocate($this->handle));

        return $this;
    }
}
