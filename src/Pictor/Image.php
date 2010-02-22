<?php

namespace Pictor;

/**
 * Description of Image
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

    public function __construct($filename = '')
    {
        if (!empty($filename))
        {
            $this->load($filename);
        }
    }

    public function load($filename)
    {
        if (!is_null($this->io = Image\IO::getIO($filename)))
        {
            $this->handle = $this->io->load($filename);
            $this->filename = $filename;
        }
    }

    public function save($filename)
    {
        $this->io->save($this->handle, $filename);
    }
}


