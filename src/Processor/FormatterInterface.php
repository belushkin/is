<?php

namespace Orders\Processor;

use Orders\Order;

interface FormatterInterface {

    /**
     * @param $order Order
     * @return string
     */
    public function asString(Order $order): string;

}
