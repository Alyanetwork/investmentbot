<?php

require_once __DIR__ . '/../src/modules/exchanges/Binance.php';

$binance = new Binance();
$symbol = "BTCUSDT";
$marketData = $binance->getMarketData($symbol);
print_r($marketData);

$orderId = $binance->placeOrder($symbol, "buy", 0.001);
echo "Binance Alım Emri ID: $orderId\n";
?>
