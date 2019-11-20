<?php

namespace Orders\View\Result;

use Orders\Order;
use Orders\View\ViewInterface;

class Invalid implements ViewInterface
{

    /**
     * @var Order
     */
    private $order;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "";
    }

}
