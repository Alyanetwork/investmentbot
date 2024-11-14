<?php

require_once __DIR__ . '/../../models/ExchangeInterface.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class Binance implements ExchangeInterface
{
    private $apiKey;
    private $apiSecret;
    private $baseUrl = 'https://api.binance.com';

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['binance_api_key'];
        $this->apiSecret = $config['binance_api_secret'];
    }

    public function getMarketData($symbol)
    {
        $url = $this->baseUrl . "/api/v3/ticker/price?symbol={$symbol}";
        return HttpClient::get($url);
    }

    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market')
    {
        $url = $this->baseUrl . "/api/v3/order";
        $params = [
            'symbol' => $symbol,
            'side' => strtoupper($side),
            'type' => strtoupper($orderType),
            'quantity' => $quantity
        ];

        if ($orderType === 'limit') {
            $params['price'] = $price;
            $params['timeInForce'] = 'GTC';
        }

        $headers = ['X-MBX-APIKEY: ' . $this->apiKey];
        return HttpClient::post($url, $headers, $params);
    }

    public function getOrderStatus($orderId)
    {
        $url = $this->baseUrl . "/api/v3/order?orderId={$orderId}";
        $headers = ['X-MBX-APIKEY: ' . $this->apiKey];
        return HttpClient::get($url, $headers);
    }

    public function cancelOrder($orderId)
    {
        $url = $this->baseUrl . "/api/v3/order?orderId={$orderId}";
        $headers = ['X-MBX-APIKEY: ' . $this->apiKey];
        return HttpClient::delete($url, $headers);
    }
}
?>
