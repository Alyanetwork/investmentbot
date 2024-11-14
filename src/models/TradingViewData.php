<?php

require_once __DIR__ . '/../../config/config.php';

class TradingViewData
{
    private $apiBaseUrl;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiBaseUrl = $config['tradingview_api_url'];
    }

    public function getMarketData($symbol)
    {
        $url = "{$this->apiBaseUrl}/markets?symbol={$symbol}";
        return HttpClient::get($url);
    }

    public function getHistoricalData($symbol, $interval = '1D')
    {
        $url = "{$this->apiBaseUrl}/historical?symbol={$symbol}&interval={$interval}";
        return HttpClient::get($url);
    }
}
?>
