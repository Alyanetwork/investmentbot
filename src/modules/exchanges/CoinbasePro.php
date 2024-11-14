<?php

require_once __DIR__ . '/../../models/ExchangeInterface.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class CoinbasePro implements ExchangeInterface
{
    private $apiKey;
    private $apiSecret;
    private $passphrase;
    private $baseUrl = 'https://api.pro.coinbase.com';

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['coinbase_api_key'];
        $this->apiSecret = $config['coinbase_api_secret'];
        $this->passphrase = $config['coinbase_passphrase'];
    }

    public function getMarketData($symbol)
    {
        $url = $this->baseUrl . "/products/{$symbol}/ticker";
        return HttpClient::get($url);
    }

    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market')
    {
        $url = $this->baseUrl . "/orders";
        $params = [
            'product_id' => $symbol,
            'side' => $side,
            'size' => $quantity,
            'type' => $orderType
        ];

        if ($orderType === 'limit') {
            $params['price'] = $price;
        }

        return HttpClient::post($url, $this->getAuthHeaders(), $params);
    }

    public function getOrderStatus($orderId)
    {
        $url = $this->baseUrl . "/orders/{$orderId}";
        return HttpClient::get($url, $this->getAuthHeaders());
    }

    public function cancelOrder($orderId)
    {
        $url = $this->baseUrl . "/orders/{$orderId}";
        return HttpClient::delete($url, $this->getAuthHeaders());
    }

    private function getAuthHeaders()
    {
        return [
            'CB-ACCESS-KEY: ' . $this->apiKey,
            'CB-ACCESS-SIGN: ' . $this->apiSecret,
            'CB-ACCESS-PASSPHRASE: ' . $this->passphrase
        ];
    }
}
?>
