$rateLimiter = new RateLimiter(1); // 1 saniye aralıklarla
if ($rateLimiter->canProceed("binance_btcusdt")) {
    $binanceData = $binance->getMarketData("BTCUSDT");
    echo "Binance Fiyatı: " . $binanceData['price'] . "\n";
} else {
    echo "API sınırına ulaşıldı, bekleniyor...\n";
}
