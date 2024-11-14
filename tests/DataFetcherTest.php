<?php

require_once __DIR__ . '/../src/modules/data_fetcher/MarketDataFetcher.php';

$fetcher = new MarketDataFetcher();
$price = $fetcher->getPrice("BTCUSDT");

if ($price && isset($price['price'])) {
    echo "BTCUSDT Fiyatı: " . $price['price'];
} else {
    echo "Fiyat bilgisi alınamadı.";
}
?>
