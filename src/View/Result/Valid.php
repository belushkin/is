<?php

namespace Orders\View\Result;

use Orders\Order;
use Orders\View\ViewInterface;

class Valid implements ViewInterface
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
        return $this->order->orderId .
            '-' .
            implode(',', $this->order->items) .
            '-' .
            $this->order->deliveryDetails .
            '-' .
            ($this->order->isManual ? 1 : 0) .
            '-' .
            $this->order->totalAmount .
            '-' .
            $this->order->name . "\n";
    }

}
