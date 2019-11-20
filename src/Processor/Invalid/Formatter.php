<?php

namespace Orders\Processor\Invalid;

use Orders\Processor\FormatterInterface;
use Orders\Order;

class Formatter implements FormatterInterface
{

    /**
     * @param $order Order
     * @return string
     */
    public function asString(Order $order): string
    {
        ob_start();
        echo "Processing started, OrderId: {$order->orderId}\n";
        echo "Order is invalid\n";
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }

}
