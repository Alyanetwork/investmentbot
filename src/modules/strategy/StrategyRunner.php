<?php

require_once __DIR__ . '/../data_fetcher/MarketDataFetcher.php';
require_once __DIR__ . '/../../models/Strategy.php';

class StrategyRunner
{
    private $strategy;
    private $dataFetcher;

    public function __construct($strategyId)
    {
        $this->strategy = (new Strategy())->getStrategyById($strategyId);
        $this->dataFetcher = new MarketDataFetcher();
    }

    public function run($symbol = "BTCUSDT")
    {
        if ($this->strategy['name'] == "Simple Moving Average Crossover") {
            return $this->movingAverageCrossover($symbol);
        }

        return "Strateji tanımlanmadı";
    }

    private function movingAverageCrossover($symbol)
    {
        $priceData = $this->dataFetcher->getPrice($symbol);
        $prices = array_column($priceData, 'price');

        // Basit bir hareketli ortalama hesaplama (örneğin 50 ve 200 günlük)
        $shortPeriod = 50;
        $longPeriod = 200;

        $shortMA = array_sum(array_slice($prices, -$shortPeriod)) / $shortPeriod;
        $longMA = array_sum(array_slice($prices, -$longPeriod)) / $longPeriod;

        if ($shortMA > $longMA) {
            return "AL sinyali";
        } else if ($shortMA < $longMA) {
            return "SAT sinyali";
        } else {
            return "HAREKET YOK";
        }
    }
}
?>
