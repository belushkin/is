<?php


namespace Orders\View;

class OrderProcessLog implements ViewInterface
{

    const PATH = 'orderProcessLog';

    /**
     * @var string
     */
    private $str;

    /**
     * @param string $str
     */
    public function __construct(string $str)
    {
        $this->str = $str;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->str;
    }

}
