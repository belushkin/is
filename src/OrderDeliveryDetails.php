<?php
/**
 * @author Timofey Khokhlovskii <timofey.khokhlovskii@internetstores.com>
 */

namespace Orders;

class OrderDeliveryDetails
{
    /**
     * @param int $productsCount
     * @return string
     */
    public static function getDeliveryDetails(int $productsCount): string
    {
        if ($productsCount > 1) {
            return 'Order delivery time: 2 days';
        }
        return 'Order delivery time: 1 day';
    }
}
