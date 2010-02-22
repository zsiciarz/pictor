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
            if (!is_null($this->io = Image\IO::getIO($filename)))
            {
                $this->io->load($filename);
            }
        }
    }
}


