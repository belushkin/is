<?php

namespace Orders;

class Order
{
    /**
     * @var int
     */
    public $orderId;

    /**
     * @var bool
     */
    public $isManual = false;

    /**
     * @var bool
     */
    public $isValid = false;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $deliveryDetails;

    /**
     * @var array
     */
    public $items;

    /**
     * @var float
     */
    public $totalAmount;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @param float $totalAmount
     */
    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string $deliveryDetails
     */
    public function setDeliveryDetails(string $deliveryDetails): void
    {
        $this->deliveryDetails = $deliveryDetails;
    }
}
