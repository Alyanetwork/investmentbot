<?php

require_once __DIR__ . '/../../models/ExchangeInterface.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class KuCoin implements ExchangeInterface
{
    private $apiKey;
    private $apiSecret;
    private $passphrase;
    private $baseUrl = 'https://api.kucoin.com';

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['kucoin_api_key'];
        $this->apiSecret = $config['kucoin_api_secret'];
        $this->passphrase = $config['kucoin_passphrase'];
    }

    public function getMarketData($symbol)
    {
        $url = $this->baseUrl . "/api/v1/market/orderbook/level1?symbol={$symbol}";
        return HttpClient::get($url);
    }

    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market')
    {
        $url = $this->baseUrl . "/api/v1/orders";
        $params = [
            'symbol' => $symbol,
            'side' => $side,
            'type' => $orderType,
            'size' => $quantity
        ];

        if ($orderType === 'limit') {
            $params['price'] = $price;
        }

        return HttpClient::post($url, $this->getAuthHeaders($params), $params);
    }

    public function getOrderStatus($orderId)
    {
        $url = $this->baseUrl . "/api/v1/orders/{$orderId}";
        return HttpClient::get($url, $this->getAuthHeaders());
    }

    public function cancelOrder($orderId)
    {
        $url = $this->baseUrl . "/api/v1/orders/{$orderId}";
        return HttpClient::delete($url, $this->getAuthHeaders());
    }

    private function getAuthHeaders($params = [])
    {
        $timestamp = time() * 1000;
        $strToSign = $timestamp . 'GET' . '/api/v1/orders';
        $signature = base64_encode(hash_hmac('sha256', $strToSign, $this->apiSecret, true));

        return [
            'KC-API-KEY: ' . $this->apiKey,
            'KC-API-SIGN: ' . $signature,
            'KC-API-TIMESTAMP: ' . $timestamp,
            'KC-API-PASSPHRASE: ' . $this->passphrase
        ];
    }
}
?>
