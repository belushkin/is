<?php

namespace Orders\Processor\Invalid;

use Orders\Processor\FormatterInterface;
use Orders\Processor\ProcessorInterface;
use Orders\Order;

class Processor implements ProcessorInterface
{

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param $order Order
     */
    public function process(Order $order): void
    {
    }

    /**
     * @return FormatterInterface
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

}