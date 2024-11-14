<?php

interface ExchangeInterface
{
    public function getMarketData($symbol);
    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market');
    public function getOrderStatus($orderId);
    public function cancelOrder($orderId);
}
?>
