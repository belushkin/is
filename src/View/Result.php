<?php

namespace Orders\View;

use Orders\Order;
use Orders\View\Result\Invalid;
use Orders\View\Result\Valid;

class Result
{

    const PATH = 'result';

    /**
     * @param Order $order
     * @return ViewInterface
     */
    public static function create(Order $order)
    {
        if ($order->isValid) {
            return new Valid($order);
        }
        return new Invalid($order);
    }

}
