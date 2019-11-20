<?php

namespace Orders;

class OrderValidator
{

    const MINIMUM_NAME_LENGTH = 2;

    /**
     * @var int
     */
    public $minimumAmount;

    /**
     * @param int $minimumAmount
     */
    public function __construct(int $minimumAmount)
    {
        $this->minimumAmount = $minimumAmount;
    }

    /**
     * @param Order $order
     */
    public function validate(Order &$order): void
    {
        $isValid = false;
        if (
            $this->isValidName($order->name) &&
            $this->isValidAmount($order->totalAmount) &&
            $this->isValidItems($order->items)
        ) {
            $isValid = true;
        }
        $order->isValid = $isValid;
    }

    /**
     * @param $name
     * @return bool
     */
    private function isValidName($name): bool
    {
        if (is_string($name) && strlen($name) > self::MINIMUM_NAME_LENGTH) {
            return true;
        }
        return false;
    }

    /**
     * @param $totalAmount
     * @return bool
     */
    private function isValidAmount($totalAmount): bool
    {
        if ($totalAmount > 0 && $totalAmount > $this->minimumAmount) {
            return true;
        }
        return false;
    }

    /**
     * @param array $items
     * @return bool
     */
    private function isValidItems(array $items): bool
    {
        foreach ($items as $itemId) {
            if (!is_int($itemId)) {
                return false;
            }
        }
        return true;
    }

}