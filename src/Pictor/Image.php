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

    public function show()
    {
        $this->io->show($this->handle);

        return $this;
    }

    public function rotate($degrees)
    {
        if ($degrees < 0.0)
        {
            $degrees = 360.0 - $degrees;
        }

        $this->handle = imagerotate($this->handle, $degrees, 0);

        return $this;
    }
}
