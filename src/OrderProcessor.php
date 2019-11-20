<?php

namespace Orders;

use Orders\Processor\FormatterInterface;
use Orders\Processor\ProcessorInterface;

class OrderProcessor implements ProcessorInterface, FormatterInterface
{

    /**
     * @var ProcessorInterface
     */
    private $processor;

    /**
     * @param ProcessorInterface $processor
     */
    public function __construct(ProcessorInterface $processor)
    {
        $this->processor = $processor;
    }

    /**
     * @return FormatterInterface
     */
    public function getFormatter()
    {
        return $this->processor->getFormatter();
    }

    /**
     * @param $order Order
     * @return string
     */
    public function asString(Order $order): string
    {
        return $this->getFormatter()->asString($order);
    }

    /**
     * @param $order Order
     */
    public function process(Order $order): void
    {
        $this->processor->process($order);
    }

}