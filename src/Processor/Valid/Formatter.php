<?php

namespace Orders\Processor\Valid;

use Orders\Filter\FilterInterface;
use Orders\Processor\FormatterInterface;
use Orders\Order;
use Orders\Filter\Filter;

class Formatter implements FormatterInterface
{

    /**
     * @var FilterInterface
     */
    private $filter;

    /**
     * @param Filter $filter
     */
    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param $order Order
     * @return string
     */
    public function asString(Order $order): string
    {
        $lines = explode("\n", $this->format($order));
        $lineWithoutDebugInfo = [];
        foreach ($lines as $line) {
            if ($this->filter->filter($line) === false) {
                $lineWithoutDebugInfo[] = $line;
            }
        }

        return implode("\n", $lineWithoutDebugInfo);
    }

    /**
     * @param $order Order
     * @return string
     */
    private function format(Order $order): string
    {
        ob_start();
        echo "Processing started, OrderId: {$order->orderId}\n";
        echo "Order is valid\n";
        if ($order->isManual) {
            echo "Order \"" . $order->orderId . "\" NEEDS MANUAL PROCESSING\n";
        } else {
            echo "Order \"" . $order->orderId . "\" WILL BE PROCESSED AUTOMATICALLY\n";
        }
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }

}
