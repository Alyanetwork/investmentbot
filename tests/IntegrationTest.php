<?php

require_once __DIR__ . '/../src/modules/exchanges/Binance.php';
require_once __DIR__ . '/../src/modules/exchanges/KuCoin.php';

function runIntegrationTest()
{
    // Binance Piyasa Verisi
    $binance = new Binance();
    $binanceData = $binance->getMarketData("BTCUSDT");
    echo "Binance BTC/USDT Fiyatı: " . $binanceData['price'] . "\n";

    // KuCoin Piyasa Verisi
    $kucoin = new KuCoin();
    $kucoinData = $kucoin->getMarketData("BTC-USDT");
    echo "KuCoin BTC/USDT Fiyatı: " . $kucoinData['price'] . "\n";

    // Binance'de Alım Emri Verme (TEST MODU)
    $orderId = $binance->placeOrder("BTCUSDT", "buy", 0.001);
    echo "Binance'de Alım Emri ID: " . $orderId . "\n";

    // Emir Durumunu Kontrol Etme
    $orderStatus = $binance->getOrderStatus($orderId);
    echo "Binance'de Alım Emri Durumu: " . $orderStatus['status'] . "\n";
}

runIntegrationTest();
?>
