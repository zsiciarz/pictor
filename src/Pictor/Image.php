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
     * Creates an Image object.
     *
     * @param Size $size initial size
     */
    public function __construct(Size $size = null)
    {
        if (!is_null($size))
        {
            $this->handle = imagecreatetruecolor($size->width, $size->height);
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
        if (is_null($this->io))
            $this->io = Image\IO::getIO($filename);

        $this->io->save($this->handle, $filename);

        return $this;
    }

    /**
     * Displays the image to the browser.
     *
     * @param string $format optional format for images not read from disk
     * @return \Pictor\Image for fluent interface
     */
    public function show($format = 'png')
    {
        if (is_null($this->io))
            $this->io = Image\IO::getIO('dummy.'.$format);

        $this->io->show($this->handle);

        return $this;
    }

    /**
     * Returns the width of the image.
     *
     * @return int
     */
    public function getWidth()
    {
        return imagesx($this->handle);
    }

    /**
     * Returns the height of the image.
     *
     * @return int
     */
    public function getHeight()
    {
        return imagesy($this->handle);
    }

    /**
     * Returns image dimensions as a Size object.
     *
     * @return \Pictor\Size
     */
    public function getSize()
    {
        return new Size($this->getWidth(), $this->getHeight());
    }

    /**
     * Returns the center point of the image.
     * 
     * @return \Pictor\Point
     */
    public function getCenter()
    {
        return new Point($this->getWidth() / 2, $this->getHeight() / 2);
    }

    /**
     * Enables or disables line antialiasing.
     *
     * @param bool $antialiasing
     * @return \Pictor\Image for fluent interface
     */
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

    public function resize(Size $newSize)
    {
        $img = imagecreatetruecolor($newSize->width, $newSize->height);
        imagecopyresampled($img, $this->handle, 0, 0, 0, 0,
                           $newSize->width, $newSize->height,
                           $this->getWidth(), $this->getHeight());

        imagedestroy($this->handle);
        $this->handle = $img;

        return $this;
    }

    /**
     * Creates a negative image.
     * 
     * @return \Pictor\Image for fluent interface
     */
    public function invert()
    {
        imagefilter($this->handle, IMG_FILTER_NEGATE);

        return $this;
    }

    /**
     * Filters the image through an arbitrary filter.
     *
     * @param string $filter
     * @param mixed $param,... optional filter parameters
     * @return \Pictor\Image for fluent interface
     */
    public function filter()
    {
        $args = func_get_args();
        $filter = array_shift($args);
        $filter = constant('IMG_FILTER_'.strtoupper($filter));
        array_unshift($args, $this->handle, $filter);
        call_user_func_array('imagefilter', $args);

        return $this;
    }

    public function drawLine(Point $from, Point $to, $color = '000')
    {
        if (!($color instanceof Color))
            $color = new Color($color);

        imageline($this->handle, $from->x, $from->y, $to->x, $to->y,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawRectangle(Point $topLeft, Size $size, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = new Color($color);

        $drawfunc = $fill ? 'imagefilledrectangle' : 'imagerectangle';
        $drawfunc($this->handle, $topLeft->x, $topLeft->y,
                  $topLeft->x + $size->width, $topLeft->y + $size->height,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawEllipse(Point $center, Size $size, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = new Color($color);

        $drawfunc = $fill ? 'imagefilledellipse' : 'imageellipse';
        $drawfunc($this->handle, $center->x, $center->y,
                  $size->width, $size->height,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawPolygon($points, $color = null, $fill = false)
    {
        if (!($color instanceof Color))
            $color = new Color($color);

        $drawfunc = $fill ? 'imagefilledpolygon' : 'imagepolygon';
        $drawfunc($this->handle, $points, count($points) / 2,
                  $color->allocate($this->handle));

        return $this;
    }

    public function drawText(Point $position, $text, Font $font, $color, $angle = 0)
    {
        if (!($color instanceof Color))
            $color = new Color($color);

        imagettftext($this->handle, $font->getSize(), $angle,
                     $position->x, $position->y,
                     $color->allocate($this->handle), $font->getFontFile(), $text);

        return $this;
    }
}
