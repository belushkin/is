<?php

namespace Orders\Util;

class Reader
{

    /**
     * @param string $filename
     * @return string
     */
    public function read(string $filename): string
    {
        return @file_get_contents($filename);
    }

}
