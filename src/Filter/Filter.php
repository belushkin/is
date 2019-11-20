<?php

namespace Orders\Filter;

class Filter implements FilterInterface
{

    /**
     * @var FilterInterface []
     */
    private $filters = [];

    /**
     * @param FilterInterface $filter
     * @return void
     */
    public function addFilter(FilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    /**
     * @param string $haystack
     * @return bool|int
     */
    public function filter(string $haystack)
    {
        foreach ($this->filters as $filter) {
            if ($filter->filter($haystack) !== false) {
                return true;
            }
        }
        return false;
    }

}