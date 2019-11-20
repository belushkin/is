<?php

namespace Orders\Processor\Valid;

use Orders\Order;
use Orders\OrderDeliveryDetails;
use Orders\Processor\FormatterInterface;
use Orders\Processor\ProcessorInterface;

class Processor implements ProcessorInterface
{

    const LARGE_ITEMS   = [3231, 9823];
    const DELIVERY_COST = 100;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var OrderDeliveryDetails
     */
    private $orderDeliveryDetails;

    /**
     * @param FormatterInterface $formatter
     * @param OrderDeliveryDetails $orderDeliveryDetails
     */
    public function __construct(FormatterInterface $formatter, OrderDeliveryDetails $orderDeliveryDetails)
    {
        $this->orderDeliveryDetails = $orderDeliveryDetails;
        $this->formatter = $formatter;
    }

    /**
     * @return FormatterInterface
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param $order Order
     */
    public function process(Order $order): void
    {
        $this->addDeliveryCostLargeItem($order);
        $deliveryDetails = $this->orderDeliveryDetails->getDeliveryDetails(count($order->items));
        $order->setDeliveryDetails($deliveryDetails);
    }

    /**
     * @param $order Order
     */
    private function addDeliveryCostLargeItem(Order &$order): void
    {
        foreach ($order->items as $item) {
            if (in_array($item, self::LARGE_ITEMS)) {
                $order->totalAmount = $order->totalAmount + self::DELIVERY_COST;
            }
        }
    }
}
