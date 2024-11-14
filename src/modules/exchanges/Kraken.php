<?php

require_once __DIR__ . '/../../models/ExchangeInterface.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class Kraken implements ExchangeInterface
{
    private $apiKey;
    private $apiSecret;
    private $baseUrl = 'https://api.kraken.com/0';

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['kraken_api_key'];
        $this->apiSecret = $config['kraken_api_secret'];
    }

    public function getMarketData($symbol)
    {
        $url = $this->baseUrl . "/public/Ticker?pair={$symbol}";
        return HttpClient::get($url);
    }

    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market')
    {
        $url = $this->baseUrl . "/private/AddOrder";
        $params = [
            'pair' => $symbol,
            'type' => $side,
            'ordertype' => $orderType,
            'volume' => $quantity
        ];

        if ($orderType === 'limit') {
            $params['price'] = $price;
        }

        $headers = $this->getAuthHeaders($params);
        return HttpClient::post($url, $headers, $params);
    }

    public function getOrderStatus($orderId)
    {
        $url = $this->baseUrl . "/private/QueryOrders";
        $params = ['txid' => $orderId];
        $headers = $this->getAuthHeaders($params);
        return HttpClient::post($url, $headers, $params);
    }

    public function cancelOrder($orderId)
    {
        $url = $this->baseUrl . "/private/CancelOrder";
        $params = ['txid' => $orderId];
        $headers = $this->getAuthHeaders($params);
        return HttpClient::post($url, $headers, $params);
    }

    private function getAuthHeaders($params)
    {
        // Kraken için gerekli imza oluşturma işlemleri
        $nonce = time() * 1000;
        $params['nonce'] = $nonce;

        $postData = http_build_query($params, '', '&');
        $path = "/0/private/QueryOrders";
        $signature = hash_hmac('sha512', $path . hash('sha25
