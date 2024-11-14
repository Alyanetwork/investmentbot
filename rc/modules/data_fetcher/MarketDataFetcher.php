<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class MarketDataFetcher
{
    private $apiKey;
    private $apiSecret;
    private $apiBaseUrl;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['api_key'];
        $this->apiSecret = $config['api_secret'];
        $this->apiBaseUrl = $config['api_base_url'];
    }

    public function getPrice($symbol = "BTCUSDT")
    {
        $url = $this->apiBaseUrl . "/api/v3/ticker/price?symbol=" . $symbol;
        $headers = [
            'X-MBX-APIKEY: ' . $this->apiKey
        ];
        return HttpClient::get($url, $headers);
    }
}
?>
