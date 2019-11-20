<?php

namespace Orders\Util;

class Logger
{

    /**
     * @param string $filename
     * @param string $data
     * @return void
     */
    public function log(string $filename, string $data): void
    {
        if ($data) {
            file_put_contents($filename, $data);
        }
    }

}
