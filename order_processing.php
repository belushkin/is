<?php

use Orders\Order;
use Orders\OrderDeliveryDetails;
use Orders\OrderProcessor;
use Orders\Processor\Invalid\Processor as InvalidProcessor;
use Orders\Processor\Valid\Processor as ValidProcessor;
use Orders\Processor\Invalid\Formatter as InvalidFormatter;
use Orders\Processor\Valid\Formatter as ValidFormatter;
use Orders\Util\Logger;
use Orders\Util\Reader;
use Orders\Filter\Filter;
use Orders\Filter\ReasonFilter;
use Orders\OrderValidator;
use Orders\View\Result;
use Orders\View\OrderProcessLog;

require_once 'vendor/autoload.php';

$order = new Order();
$order->setOrderId(2);
$order->setName('John');
$order->setItems([ 6654 ]);
$order->setTotalAmount(346.2);

$orderValidator = new OrderValidator(
    file_get_contents('input/minimumAmount')
);
$orderValidator
    ->validate($order);

$reader = new Reader();
$logger = new Logger();

$processor = new InvalidProcessor(new InvalidFormatter());
if ($order->isValid) {
    $filter = new Filter();
    $filter->addFilter(new ReasonFilter());
    $processor = new ValidProcessor(new ValidFormatter($filter), new OrderDeliveryDetails());
}

$orderProcessor = new OrderProcessor($processor);
$orderProcessor
    ->process($order);

$logger->log(Result::PATH, $reader->read(Result::PATH).Result::create($order)->__toString());
$logger->log(OrderProcessLog::PATH,
    $reader->read(OrderProcessLog::PATH) .
    (new OrderProcessLog($processor->getFormatter()->asString($order)))->__toString()
);
