<?php

namespace Orders\Filter;

class ReasonFilter implements FilterInterface
{

    /**
     * @var string
     */
    private $needle = 'Reason';

    /**
     * @param string $haystack
     * @return bool|int
     */
    public function filter(string $haystack)
    {
        return strpos($haystack, $this->needle);
    }

}
