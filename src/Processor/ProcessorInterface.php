<?php

namespace Orders\Processor;

use Orders\Order;

interface ProcessorInterface {

    /**
     * @param $order Order
     * @return void
     */
    public function process(Order $order): void;

    /**
     * @return FormatterInterface
     */
    public function getFormatter();

}
