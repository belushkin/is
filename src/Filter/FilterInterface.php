<?php

namespace Orders\Filter;

interface FilterInterface
{

    /**
     * @param string $haystack
     * @return bool|int
     */
    public function filter(string $haystack);

}
