<?php

namespace Pictor;

/**
 * A Plugin interface.
 *
 * @author Zbyszek
 */
class Plugin
{
    abstract public function draw($image, $handle);
}

